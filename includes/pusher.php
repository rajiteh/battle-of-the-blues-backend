<?php

/*
 * Battle of the Blues Backend
 *
 */

class Pusher {
    const ROUTE_STATS = 'stats',
          ROUTE_COMMENTARY = 'commentary',
          ROUTE_SCORECARD = 'scorecard';

    protected static $botb;
    protected static $cache;

    public function __construct() {
        //Establish the db connection
        $this->botb = new BotB(Config::DATABASE_STRING,
            Config::DATABASE_USER,
            Config::DATABASE_PASSWORD);
        $this->cache = new \Jamm\Memory\PhpRedisObject('botbCache');
    }

    public static function getInstance() {
        return new self();
    }

    public function scoreUpdate() {
        $score = $this->botb->getStats();
        $pushMsg = sprintf("%s: %s/%s (%s)",
            $score['bat'],
            $score['score'],
            $score['wickets'],
            $score['overs']);
        $refreshList = array(self::ROUTE_STATS);
        return $this->sendPush($pushMsg, $refreshList);
    }

    public function commentaryUpdate() {
        $score = $this->botb->getStats();
        $pushMsg = $score['last_comment'];
        $refreshList = array(self::ROUTE_STATS, self::ROUTE_COMMENTARY);
        return $this->sendPush($pushMsg, $refreshList);
    }

    public function scorecardUpdate() {
        $pushMsg = 'Scoreboard updated!';
        $refreshList = array(self::ROUTE_SCORECARD);
        return $this->sendPush($pushMsg, $refreshList);
    }

    protected function sendPush($msg, $refreshList) {
        $cache = 0;
        //Clear cache
        foreach($refreshList as $cacheTag) {
            $cache += $this->cache->del_by_tags($cacheTag);
        }
        Job::queuePushMessage($msg, self::generateRefreshData($refreshList));
        return $cache;
    }

    protected static function generateRefreshData($items) {
        return array('refresh' => $items);
    }


}
