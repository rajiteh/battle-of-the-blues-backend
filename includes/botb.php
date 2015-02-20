<?php

/*
 * Battle of the Blues Backend
 *
 */

class BotB {
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
    *
    * @param $page integer entry page to retrieve
    * @param $perPage integer entries per page to retrieve
    *
    * @return map containing the url for next page (if exists) and an array of comments
    * Example:
    *    array(
    *       "nextPage" => "/api/comments?page=2",
    *       "comments" => array(
    *           array(
    *               "id" => 15,
    *               "comment" => "Some comment"
    *           )
    *       )
    *    )
    */
   // public function getCommentaries($cursor, $direction, $count=25) {
    public function getCommentaries($page, $perPage, $count=25) {
        if (!is_numeric($page) || $page < 1) throw new Exception('Illegal argument for getCommentaries $page');
        if (!is_numeric($perPage) || $page < 1) throw new Exception('Illegal argument for getCommentaries $perPage');

        $nextPage = null;
        $sql = 'SELECT id, commentary FROM text ORDER BY id DESC LIMIT ' . (($page - 1) * $perPage) . ', ' . ($perPage + 1);
        $result = $this->database->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $count = count($result);
        if ($count > $perPage) {
            $nextPage = $this->baseUrl . "comments?page=" . ($page + 1);
            array_pop($result);
        }
        $retval = array(
            "nextPage" => $nextPage,
            "commentaries" => $result
        );
        return $retval;
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
