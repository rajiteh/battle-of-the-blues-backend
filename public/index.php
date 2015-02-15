<?php

/*
 * Battle of the Blues Backend 
 *
 */

//Debug
$_ENV['DATABASE_STRING']   = empty($_ENV['DATABASE_STRING'])   ? 'mysql:host=localhost;dbname=botb;charset=utf8' : $_ENV['DATABASE_STRING'];
$_ENV['DATABASE_USER']     = empty($_ENV['DATABASE_USER'])     ? 'botb' : $_ENV['DATABASE_USER'];
$_ENV['DATABASE_PASSWORD'] = empty($_ENV['DATABASE_PASSWORD']) ? 'botb' : $_ENV['DATABASE_PASSWORD'];
$_ENV['DEBUG']             = empty($_ENV['DEBUG'])             ? '1' : $_ENV['DEBUG'];
//End Debug

require_once('./botb.php');
require_once('./cache.php');
require_once('./analytics.php');

//Print JSON Headers
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');


$botb = new BotB($_ENV['DATABASE_STRING'], $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASSWORD']);
$cache = new Cache();
$analytics = new Analytics();
$route = rtrim($_REQUEST["param"], '/');

try {
    $resultObject = null;

    //Generate a cache key from the request
    $cacheKey = $cache->generateCacheKey($_REQUEST);

    //Check if the request is cached
    if (empty($resultObject = $cache->get($cacheKey))) {
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
        } else {
            throw new Exception("Route not found.");
        }

        //Update the cache
        $cache->set($cacheKey, $resultObject);
    }
    
    echo json_encode($resultObject);
    $analytics->storeRouteEvent($route, $_REQUEST);
} catch (Exception $e) {
    
    if ($_ENV["DEBUG"] == '1')
        $msg = $e->__toString();
    else
        $msg = "There was a problem completing your request. Please contact the admins.";

    echo json_encode(array(
        "exception" => $msg
    ));
    $analytics->storeEvent("error", $e);
    error_log($e);
}


