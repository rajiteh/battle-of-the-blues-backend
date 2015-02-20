<?php

/*
 * Battle of the Blues Backend 
 *
 */

require_once('../vendor/autoload.php');
//Print JSON Headers


$botb = new BotB(Config::DATABASE_STRING, Config::DATABASE_USER, Config::DATABASE_PASSWORD);
$cache = new Cache(Config::REDIS_DSN);
$analytics = new Analytics();
$route = rtrim($_REQUEST["param"], '/');
Resque::setBackend('localhost:6379');
try {
    $resultObject = null;

    //Generate a cache key from the request
    $cacheKey = $cache->generateCacheKey($route);
    $cacheWhitelist = array( "trigger_push" );
    //Check if the request is cached
    if (in_array($route, $cacheWhitelist) || (($resultObject = $cache->get($cacheKey)) === false)) {
        error_log("Cache miss : " . $route);
        /*
         *  GET /comments
         *      Retrieves a list of comments.
         *
         *      Parameters:
         *          page : page number to retrieve (default = 1)
         *          limit: entries retrieved per request (default = 25)
         */
        if ($route == "commentary") {
            $page = !empty($_REQUEST["page"]) ? $_REQUEST["page"] : 1;
            $perPage = !empty($_REQUEST["limit"]) ? $_REQUEST["limit"] : 25;
            $resultObject = $botb->getCommentaries($page, $perPage);
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
    $analytics->storeRouteEvent($route, $_REQUEST);
} catch (Exception $e) {
    http_response_code(500);
    if (Config::DEBUG == '1')
        throw $e;
    else
        $msg = "There was a problem completing your request. Please contact the admins.";

    Renderer::write(array( "exception" => $msg ));

    $analytics->storeEvent("error", $e);
    error_log($e);
}
