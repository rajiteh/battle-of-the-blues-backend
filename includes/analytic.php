<?php

/*
 * Battle of the Blues Backend
 *
 */

class Analytic {

    public static function record($route, $query, $cached, $start, $duration, $exception=false, $stacktrace=false) {
    	error_log("Queuing analytics");
		$args = array(
			'route' => $route,
			'query' => $query,
			'cached' => $cached,
			'start' =>  $start,
			'duration' => $duration,
			'exception' => $exception,
			'stacktrace' => $stacktrace
			);
		Resque::setBackend(Config::REDIS_DSN);
		Resque::enqueue('analytics','Store_Analytic', $args);
    }

}
