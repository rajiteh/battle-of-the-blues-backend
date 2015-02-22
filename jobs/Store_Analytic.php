<?php

/*
 * Battle of the Blues Backend
 *
 */

class Store_Analytic {

	public function perform() {
		$botb = new BotB(Config::DATABASE_STRING, Config::DATABASE_USER, Config::DATABASE_PASSWORD);
		$args = $this->args;
		$botb->storeAnalytic($args['name'], $args['type'], $args['query'], $args['cached'], $args['start'], $args['duration'], $args['ip'], $args['exception'], $args['stacktrace']);
	}

}