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
		Resque::enqueue('subscribers','Add_Subscriber', $args);
	}

	public static function queueUnsubscription($uuid) {
		error_log("Queueing unsubscription");
		$args = array(
			'uuid' => $uuid,
			'type' => 'unsubscribe'
			);
		Resque::enqueue('subscribers','Add_Subscriber', $args);
	}

	public static function queuePushMessage($message) {
		$args = array(
			'message' => $message
			);
		Resque::enqueue('push', 'Send_Push_Message', $args);
	}

}
