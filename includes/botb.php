<?php

/*
 * Battle of the Blues Backend
 *
 */

class BotB {
    const COMMENTS_OLDER = 0x01,
          COMMENTS_NEWER = 0X02;

    const TYPE_ROUTE = 'route',
          TYPE_JOB = 'job';

    private static $pdoOptions = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true
    );
    protected $database;
    protected $baseUrl;

    // Public //
    // ====== //

    public function __construct($dbConnection, $dbUser, $dbPassword, $baseUrl = '/') {
        $this->database = new PDO($dbConnection, $dbUser, $dbPassword, self::$pdoOptions);
        $this->baseUrl = $baseUrl;
    }

   /**
    * Get match statistics (Score and player information)
    *
    * @return an associated array of all scores and all player information.
    */
    public function getStats() {
        $scores = $this->getScores();
        $scores["crease"]  = $this->getPlayers();
        return $scores;
    }

   /**
    * Retrieve commentary from the database.
    */
    public function getCommentaries($needle, $direction, $perPage=25) {
        if (!is_numeric($perPage) || $perPage < 1) throw new Exception('Illegal argument for getCommentaries : ${perPage}');
        if (empty($needle)) { //latest coments
            $sql = 'SELECT id, commentary FROM text ORDER BY id DESC LIMIT '.$perPage;
        } elseif (is_numeric($needle)) {
            if ($direction === self::COMMENTS_NEWER) {
                $sql = 'SELECT * FROM (SELECT id, commentary FROM text WHERE id > '.$needle.' ORDER BY id LIMIT '.$perPage.') sub ORDER BY id DESC';
            } elseif ($direction === self::COMMENTS_OLDER) {
                $sql = 'SELECT id, commentary FROM text WHERE id < '.$needle.' ORDER BY id DESC LIMIT '.$perPage;
            } else {
                throw new Exception("Illegal argument for getCommentaries : ${direction}");
            }
        } else {
            throw new Exception("Illegal argument for getCommentaries : ${needle}");
        }
        $result = $this->database->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function activateSubscriber($uuid) {
        $stmt = $this->database->prepare('INSERT INTO subscribers (uuid) VALUES(:uuid) ON DUPLICATE KEY UPDATE last_seen=NOW(), expired=0');
        $stmt->bindParam(':uuid',$uuid);
        $stmt->execute();
        return true;
    }

    public function deactivateSubscriber($uuid) {
        $stmt = $this->database->prepare('UPDATE subscribers SET expired=1 WHERE uuid = :uuid');
        $stmt->bindParam(':uuid',$uuid);
        $stmt->execute();
        return true;
    }

    public function getSubscribers($limit=false, $offset=false) {
        $sql = 'SELECT uuid FROM subscribers WHERE expired=0';
        if ($limit != false) {
            if (!is_numeric($limit)) { throw new Exception("Invalid argument for getSubscribers : ${limit}"); }
            $sql = $sql." LIMIT ".$limit;
            if ($offset != false) {
                if (!is_numeric($offset)) { throw new Exception("Invalid argument for getSubscribers : ${offset}"); }
                $sql = $sql." OFFSET ".$offset;
            }
        }
        $result = $this->database->query($sql)->fetchAll(PDO::FETCH_COLUMN, 0);
        return $result;
    }

    public function expireSubscribers($before) {
        $sql = 'UPDATE subscribers SET expired=1 WHERE last_seen < \''.$before.'\'';
        $result = $this->database->query($sql);
    }

    public function storeAnalytic($name, $type, $query, $cached, $start, $duration, $ip, $exception, $stacktrace) {
        if (!($type == self::TYPE_JOB || $type == self::TYPE_ROUTE)) { throw new Exception("Invalid argument type for storeAnalytic : ${type}");}
        if (!is_string($query)) {
            $query = json_encode($query);
        }
        if ($cached == true) {
            $cached = 1;
        } else {
            $cached = 0;
        }
        $stmt = $this->database->prepare("INSERT INTO analytics (name, type, query, cached, start, duration, ip, exception, stacktrace)".
            " VALUES (:name, :type, :query, :cached, :start, :duration, :ip, :exception, :stacktrace)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':query', $query);
        $stmt->bindParam(':cached', $cached);
        $stmt->bindParam(':start', $start);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':ip', $ip);
        $stmt->bindParam(':exception', $exception);
        $stmt->bindParam(':stacktrace', $stacktrace);
        $stmt->execute();
    }
    // Private //
    // ======= //


   /**
    * Retrieves all available scores from the database.
    *
    */
    private function getScores() {
        $currentScore = $this->database->query("SELECT * FROM score LIMIT 0,1")->fetch(PDO::FETCH_ASSOC);
        return $currentScore;
    }

    // == Player


   /**
    * Gets information about all players.
    *
    * Retrieves id, ball, name and the number of runs of the 2 players at the crease.
    *
    * @return Array of key value mappings of player data.
    */
    private function getPlayers() {
        $result = $this->database->query("SELECT * FROM players ORDER BY name LIMIT 2")->fetchAll(PDO::FETCH_ASSOC);
        $retval = array();
        foreach ($result as $row) {
            array_push($retval, $row);
        }
        return $retval;
    }

}
