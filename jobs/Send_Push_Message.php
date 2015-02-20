<?php

/*
 * Battle of the Blues Backend
 *
 */
use Gomoob\Pushwoosh\Client\Pushwoosh;
use Gomoob\Pushwoosh\Model\Notification\Notification;
use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;

class Send_Push_Message {

    public function perform()
    {
    	echo "\nStarting Send_Push_Message\n";
        $botb = new BotB(Config::DATABASE_STRING, Config::DATABASE_USER, Config::DATABASE_PASSWORD);
        $pw = Pushwoosh::create()
                ->setApplication(Config::PUSHWOOSH_APP)
                ->setAuth(Config::PUSHWOOSH_TOKEN);
    	$message = $this->args['message'];

    	$expire = date('Y-m-d G:i:s', strtotime('now') - 60);
        $botb->expireSubscribers($expire);

    	$batchSize = 999;
    	$offset = 0;
    	$uuids = array();
    	do {
    		echo "\nOffset ${offset}.\n";
    		$uuids = $botb->getSubscribers($batchSize, $offset);
    		if (count($uuids) == 0) break;
		   	$notification = Notification::create()
	    	                  ->setContent($message);
    		foreach($uuids as $uuid) {
    			$notification->addDevice($uuid);
    		}
    		$request = CreateMessageRequest::create()
                        ->addNotification($notification);
    		$offset++;
    		echo "\nCount ".count($uuids).".\n";
            $response = $pw->createMessage($request);
            if($response->isOk()) {
                echo "\nOK\n";
                print_r($response);
            } else {
                echo "\nBAD\n";
            }
		} while(true);
		echo "\nDone\n";
    }

}
