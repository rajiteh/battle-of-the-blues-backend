<?php

/*
 * Battle of the Blues Backend
 *
 */


require_once __DIR__."/../vendor/autoload.php";

//Analytics
$analytics = array();
$analytics['start'] = microtime(true);
$analytics['query'] = $_REQUEST;
$analytics['ip'] = Helpers::getIP();
$analytics['cached'] = true;
$analytics['exception'] = null;
$analytics['stacktrace'] = null;

//Get the URL endpoint for this request
$route = Helpers::getRoute();

$cacheWhitelist = array( "trigger_push" ); //Routes that should not be cached
$cacheTTL = 259200; // Config::CACHE_TTL; // How long before cache is expired
$cacheKey = Helpers::generateCacheKey($route); //Generate a cache key from the request
$resultObject = array(); //Object to hold the cached/generated response
$disableCaching = false;

try {

    //Initialize cache
    $cache = new \Jamm\Memory\PhpRedisObject('botbCache');

    //Check if the request is cached
    if ($disableCaching || in_array($route, $cacheWhitelist) || //If the request is not cachable?
        (
            $cache->acquire_key($cacheKey, $cacheUnlocker) && //Acquire exclusive access to the key, make sure no other worker is currently querying the database
            ($resultObject = $cache->read($cacheKey)) === false  //If found in cache, assign to resultObject, else proceed.
         )
        ) {

        //Update analytics
        $analytics['cached'] = false;

        //Establish the db connection
        $botb = new BotB(Config::DATABASE_STRING,
            Config::DATABASE_USER,
            Config::DATABASE_PASSWORD);

        //Start checking the routes.
        /*
         *  GET /commentary
         *      Retrieves a list of commentaries.
         *
         *      Parameters:
         *          after  : (optional, mutually exclusive to before) Retrieve the commentaries newer than the comment ID supplied. (exclusive)
         *          before : (optional, mutually exclusive to after) Retrieve the commentaries older than the comment ID supplied. (exclusive)
         *              If no argument is supplied, latest 25 commentaries are retrieved.
         *          limit: (optional) entries retrieved per request (default = 25)
         #
         */
        if ($route == "commentary") {
            $needle = null;
            $direction = null;
            if (!empty($_REQUEST["after"]) &&
                is_numeric($_REQUEST["after"])) {
                $needle = $_REQUEST["after"];
                $direction = BotB::COMMENTS_NEWER;
            } elseif (!empty($_REQUEST["before"]) &&
                is_numeric($_REQUEST["before"])) {
                $needle = $_REQUEST["before"];
                $direction = BotB::COMMENTS_OLDER;
            } else {
                if (empty($_REQUEST["before"]) &&
                    empty($_REQUEST["after"])) {
                    $needle = false;
                } else {
                    throw new Exception("Need one params 'after' or 'before'".
                                        " supplied with a valid ID");
                }
            }
            $perPage = !empty($_REQUEST["limit"]) ? $_REQUEST["limit"] : 25;
            $resultObject = array( 
                "commentaries" => $botb->getCommentaries($needle,
                                                   $direction,
                                                   $perPage)
                );
        }

        /*
         *  GET /stats
         *      Retrieves current match statistics.
         */
        elseif ($route == "stats") {
            $resultObject = $botb->getStats();
        }

        /*
         *  GET /scorecard
         *      Retrieves current match statistics.
         */
        elseif ($route == "scorecard") {
            $resultObject =  $botb->getScorecard();
        }

        /*
         * GET /trigger_push
         *      Sends a push notification to all active subscribers
         */
        elseif ($route == "trigger_push") {
            Job::queuePushMessage("SCORE UPDATE!");
            $resultObject = array("triggered" => true);
        }

        else {
            $cacheTTL = -1;
        }

        //Update the cache with a tag
        if ($cacheTTL > 0) $cache->save($cacheKey, $resultObject, $cacheTTL, $route);

        //Unlock the cache key (this may not be needed?)
        if (!empty($cacheUnlocker)) $cache->unlock_key($cacheUnlocker);
    };

    //If this is a subscribe-related request
    if (!empty($_GET['id']) && $_GET['id'] != 'false') {
        if ($route == "stats") {
            //Mark the user as active
            Job::queueSubscription($_GET['id']);
            $analytics["subscription_accepted"] = true;
        }
        elseif ($route == "unsubscribe") {
            //Mark the user as inactive
            Job::queueUnsubscription($_GET['id']);
            $resultObject = array("unsubscription_accepted" => true);
        } else {
            throw new Exception("Unexpected parameter ID with hwid.");
        }
    }

    if (Config::DEBUG == '1')
        $resultObject['debugResponse'] = $analytics;
    Renderer::write($resultObject);
} catch (Exception $e) {
    //Update analytic object
    $analytics['exception'] = $e->getMessage();
    $analytics['stacktrace'] = $e->getTraceAsString();

    http_response_code(500);
    if (Config::DEBUG == '1') {
        $resultObject['debugResponse'] = $analytics;
        Renderer::write($resultObject);
    } else {
        $msg = "There was a problem completing your request. Please contact ".
               "the admins.";
        Renderer::write(array( "exception" => $msg ));
    }
}
//Store the time taken for the entire request
$analytics['duration'] = microtime(true) - $analytics['start'];

//Record analytic
Analytic::record(
    $route,
    BotB::TYPE_ROUTE,
    $analytics['query'],
    $analytics['cached'],
    $analytics['start'],
    $analytics['duration'],
    $analytics['ip'],
    $analytics['exception'],
    $analytics['stacktrace']
    );