<?php

/*
 * Battle of the Blues Backend
 *
 */

class Helpers {

    public static function generateCacheKey() {
        $req = $_REQUEST;
    	unset($req["id"]);
    	unset($req["callback"]);
        unset($req["_"]);
    	$wot = $_SERVER["REQUEST_METHOD"].implode(":",array_keys($req)).implode(":",$req);
        return md5($wot);
    }

    public static function getIP() {
        $headers = $_SERVER;
        if (array_key_exists('X-Forwarded-For',$headers)) {
            $the_ip = $headers['X-Forwarded-For'];
        } elseif (array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers)) {
            $the_ip = $headers['HTTP_X_FORWARDED_FOR'];
        } else {
            $the_ip = $headers['REMOTE_ADDR'];
        }
        return $the_ip;
    }

    public static function getRoute() {
        $route = empty($_REQUEST["param"]) ? "" : trim($_REQUEST["param"], '/ ');
        $routeSplit = explode("/", $route);
        return $routeSplit[count($routeSplit) - 1];
    }


}
