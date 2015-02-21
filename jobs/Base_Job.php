<?php

/*
 * Battle of the Blues Backend
 *
 */

abstract class Base_Job
{
	abstract protected function perform_wrapped();

	public function perform() {
		$start = microtime(true);
		$route = get_called_class();
		$query = $this->args;
		$exception = false;
		$stacktrace = false;
		try {
			$this->perform_wrapped();
		} catch (Exception $e) {
			$exception = $e->getMessage();
			$stacktrace = $e->getTraceAsString();
		}
		$duration = microtime(true) - $start;
		Analytic::record($route, $query, false, $start, $duration, $exception, $stacktrace);
	}
}