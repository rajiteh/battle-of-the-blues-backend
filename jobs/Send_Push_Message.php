<?php

/*
 * Battle of the Blues Backend
 *
 */
use Gomoob\Pushwoosh\Client\Pushwoosh;
use Gomoob\Pushwoosh\Model\Notification\Notification;
use Gomoob\Pushwoosh\Model\Request\CreateMessageRequest;

class Send_Push_Message extends Base_Job {

    public function perform_wrapped()
    {
        $botb = new BotB(Config::DATABASE_STRING, Config::DATABASE_USER, Config::DATABASE_PASSWORD);
        $pw = Pushwoosh::create()
            ->setApplication(Config::PUSHWOOSH_APP)
            ->setAuth(Config::PUSHWOOSH_TOKEN);

        $message = $this->args['message'];
        $data = array();
        if (array_key_exists('data', $this->args))
            $data = $this->args['data'];

    	$expire = date('Y-m-d G:i:s', strtotime('now') - Config::SUBSCRIBER_TTL);
        $botb->expireSubscribers($expire);

    	$batchSize = 999;
    	$offset = 0;
    	$uuids = array();
        $errors = array();
    	do {
    		$uuids = $botb->getSubscribers($batchSize, $offset);
    		if (count($uuids) == 0) break;

		   	$notification = Notification::create()
                ->setContent($message)
                ->setData($data)
                ->setDevices($uuids);

    		$request = CreateMessageRequest::create()
                        ->addNotification($notification);

            if (Config::DEBUG == '1') {
                echo "\nCount ".count($uuids).".\n";
                echo "\nOffset ${offset}.\n";
            }

            $response = $pw->createMessage($request);
            if(!$response->isOk()) {
                array_merge($errors, array(
                    'response' => $response,
                    'offset' => $offset
                    )
                );
            }
            $offset++;
		} while(true);

        if (count($errors) > 0) {
            throw new Exception(json_encode($errors));
        }

    }

}
