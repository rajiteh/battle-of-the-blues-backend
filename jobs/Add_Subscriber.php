<?php

/*
 * Battle of the Blues Backend
 *
 */

class Add_Subscriber extends Base_Job {

    public function perform_wrapped()
    {
    	$botb = new BotB(Config::DATABASE_STRING, Config::DATABASE_USER, Config::DATABASE_PASSWORD);
		$uuid = $this->args['uuid'];
		$operation = $this->args['type'];
		if ($operation == 'subscribe') {
			$botb->activateSubscriber($uuid);
		} else {
			$botb->deactivateSubscriber($uuid);
		}
    }

}
