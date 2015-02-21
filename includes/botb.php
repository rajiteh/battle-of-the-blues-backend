<?php

/*
 * Battle of the Blues Backend
 *
 */

class BotB {
    const COMMENTS_OLDER = 0x01,
          COMMENTS_NEWER = 0X02;

    private static $pdoOptions = array(
        PDO::ATTR_EMULATE_PREPARES => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
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
        $scores["at_crease"]  = $this->getPlayers();
        return $scores;
    }

   /**
    * Retrieve commentary from the database.
    */
   // public function getCommentaries($cursor, $direction, $count=25) {
    public function getCommentaries($needle, $direction, $perPage=25) {
        if (empty($needle)) { //latest coments
            $sql = 'SELECT id, commentary FROM text ORDER BY id DESC LIMIT '.$perPage;
        } elseif (is_numeric($needle)) {
            if ($direction === self::COMMENTS_NEWER) {
                $sql = 'SELECT * FROM (SELECT id, commentary FROM text WHERE id > '.$needle.' ORDER BY id LIMIT '.$perPage.') sub ORDER BY id DESC';
            } elseif ($direction === self::COMMENTS_OLDER) {
                $sql = 'SELECT id, commentary FROM text WHERE id < '.$needle.' ORDER BY id DESC LIMIT '.$perPage;
            } else {
                throw new Exception("Illegal argument for getCommentaries $direction");
            }
        } else {
            throw new Exception("Illegal argument for getCommentaries $needle");
        }
        if (!is_numeric($perPage) || $perPage < 1) throw new Exception('Illegal argument for getCommentaries $perPage');
        $result = $this->database->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function activateSubscriber($uuid) {
        $sql = 'INSERT INTO subscribers (uuid) VALUES("'.$uuid.'") ON DUPLICATE KEY UPDATE last_seen=NOW(), expired=0';
        $result = $this->database->query($sql);
        return true;
    }

    public function deactivateSubscriber($uuid) {
        $sql = 'UPDATE subscribers SET expired=1 WHERE uuid = "'.$uuid.'"';
        $result = $this->database->query($sql);
    }

    public function getSubscribers($limit=false, $offset=false) {
        $sql = 'SELECT uuid FROM subscribers WHERE expired=0';
        if ($limit != false) {
            $sql = $sql." LIMIT ".$limit;
            if ($offset != false) {
                $sql = $sql." OFFSET ".$offset;
            }
        }
        $result = $this->database->query($sql)->fetchAll(PDO::FETCH_COLUMN, 0);
        return $result;
    }

    public function expireSubscribers($before) {
        $sql = 'UPDATE subscribers SET expired=1 WHERE last_seen < \''.$before.'\'';
        echo $sql."\n";
        $result = $this->database->query($sql);
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
    * Gets information about a player.
    *
    * Retrieves id, ball, name and the number of runs of a player.
    *
    * @param integer $id Numerical player ID.
    *
    * @return Key value mapping of the player data.
    */
    private function getPlayer($id) {
        if (!is_numeric($id)) throw new Exception('Illegal argument for getPlayer $id');
        $query = $this->database->query("SELECT * FROM players WHERE id = ${id}");
        $player = $query->fetch(PDO::FETCH_ASSOC);
        return $player;
    }

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

    // Helpers //
    // ======= //

   /**
    * Helper function to construct a key value map of player data
    *
    * @param a PDO fetch result from 'players' table
    *
    * @return key value mapping of player data
    */
    private function generatePlayerArray($row) {
        return array(
            'name' => $row['name'],
            'score' => $row['runs'],
            'ball' => $row['ball']
        );
    }

}
