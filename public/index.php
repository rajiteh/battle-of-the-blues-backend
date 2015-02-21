<?php

/*
 * Battle of the Blues Backend 
 *
 */

require_once('../vendor/autoload.php');
//Print JSON Headers


$botb = new BotB(Config::DATABASE_STRING, Config::DATABASE_USER, Config::DATABASE_PASSWORD);
$cache = new Cache(Config::REDIS_DSN);
$route = empty($_REQUEST["param"]) ? "" : rtrim($_REQUEST["param"], '/');
$start = microtime(true);
$query = $_REQUEST;
$cached = true;
$exception = false;
$stacktrace = false;
try {
    $resultObject = null;

    //Generate a cache key from the request
    $cacheKey = $cache->generateCacheKey();
    $cacheWhitelist = array( "trigger_push" );
    //Check if the request is cached
    if (in_array($route, $cacheWhitelist) || (($resultObject = $cache->get($cacheKey)) === false)) {
        $cached = false;
        /*
         *  GET /comments
         *      Retrieves a list of comments.
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
            if (!empty($_REQUEST["after"]) && is_numeric($_REQUEST["after"])) {
                $needle = $_REQUEST["after"];
                $direction = BotB::COMMENTS_NEWER;
            } elseif (!empty($_REQUEST["before"]) && is_numeric($_REQUEST["before"])) {
                $needle = $_REQUEST["before"];
                $direction = BotB::COMMENTS_OLDER;
            } else {
                if (empty($_REQUEST["before"]) && empty($_REQUEST["after"])) {
                    $needle = false;
                } else {
                    throw new Exception("Need one params 'after' or 'before' supplied with a valid ID");
                }
            }
            $perPage = !empty($_REQUEST["limit"]) ? $_REQUEST["limit"] : 25;
            $resultObject = $botb->getCommentaries($needle, $direction, $perPage);
        }
        /*
         *  GET /stats
         *      Retrieves current match statistics.
         */
        elseif ($route == "stats") {
            $resultObject = $botb->getStats();
        }
        elseif ($route == "trigger_push") {
            Pusher::queuePushMessage("SCORE UPDATE!");
            $resultObject = array("triggered" => true);
        } else {
            //throw new Exception("Route not found.");
        }
        //Update the cache
        $cache->set($cacheKey, $resultObject);
    };

    if (!empty($_GET['id']) && $_GET['id'] != 'false') {
        if ($route == "stats") {
            Pusher::queueSubscription($_GET['id']);
            $resultObject["subscription_accepted"] = true;
        }
        elseif ($route == "unsubscribe") {
            Pusher::queueUnsubscription($_GET['id']);
            $resultObject = array("unsubscription_accepted" => true);
        } else {
            throw new Exception("Unexpected parameter ID with hwid.");
        }
    }

    Renderer::write($resultObject);
} catch (Exception $e) {
    http_response_code(500);
    if (Config::DEBUG == '1')
        throw $e;
    else
        $msg = "There was a problem completing your request. Please contact the admins.";

    Renderer::write(array( "exception" => $msg ));
    $exception = $e->getMessage();
    $stacktrace = $e->getTraceAsString();
}
$duration = microtime(true) - $start;
Analytic::record($route, $query, $cached, $start, $duration, $exception, $stacktrace);
