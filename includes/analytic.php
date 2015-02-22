<?php

/*
 * Battle of the Blues Backend
 *
 */

class Analytic {

    public static function record($name, $type, $query, $cached, $start, $duration, $ip, $exception, $stacktrace) {
		$args = array(
			'name' => $name,
			'type' => $type,
			'query' => $query,
			'cached' => $cached,
			'start' =>  $start,
			'duration' => $duration,
			'ip' => $ip,
			'exception' => $exception,
			'stacktrace' => $stacktrace
			);
		Resque::setBackend(Config::REDIS_DSN);
		Resque::enqueue('analytics','Store_Analytic', $args);
    }

}
