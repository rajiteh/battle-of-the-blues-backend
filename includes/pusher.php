<?php

/*
 * Battle of the Blues Backend
 *
 */

class Pusher {

	public static function queueSubscription($uuid) {
		error_log("Queueing subscription");
		$args = array(
			'uuid' => $uuid,
			'type' => 'subscribe'
			);
		self::enqueue('subscribers','Add_Subscriber', $args);
	}

	public static function queueUnsubscription($uuid) {
		error_log("Queueing unsubscription");
		$args = array(
			'uuid' => $uuid,
			'type' => 'unsubscribe'
			);
		self::enqueue('subscribers','Add_Subscriber', $args);
	}

	public static function queuePushMessage($message) {
		$args = array(
			'message' => $message
			);
		self::enqueue('push', 'Send_Push_Message', $args);
	}

	protected static function enqueue($q, $c, $a) {
		Resque::setBackend(Config::REDIS_DSN);
		Resque::enqueue($q, $c, $a);
	}

}
