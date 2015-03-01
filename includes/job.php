<?php

/*
 * Battle of the Blues Backend
 *
 */

class Job {

	public static function queueSubscription($uuid) {
		$args = array(
			'uuid' => $uuid,
			'type' => 'subscribe'
			);
		self::enqueue('subscribers','Add_Subscriber', $args);
	}

	public static function queueUnsubscription($uuid) {
		$args = array(
			'uuid' => $uuid,
			'type' => 'unsubscribe'
			);
		self::enqueue('subscribers','Add_Subscriber', $args);
	}

	public static function queuePushMessage($message, $data = array()) {
		$args = array(
			'message' => $message,
			'data' => $data
			);
		self::enqueue('push', 'Send_Push_Message', $args);
	}

	protected static function enqueue($queue, $class, $arguments) {
		Resque::setBackend(Config::REDIS_DSN);
		Resque::enqueue($queue, $class, $arguments);
	}

}
