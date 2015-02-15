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
        $team = $this->getTeam($scores['team']);
        $players = $this->getPlayers($scores['team']);
        return array_merge($scores, array(
            "team" => $team,
            "players" => $players        
        ));
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
    public function getCommentaries($page, $perPage=25) {
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

    // Private //
    // ======= //



   /**
    * Retrieves information about a team.
    *
    */
    private function getTeam($team) {
        $team = $this->database->query("SELECT * FROM team WHERE id = ${team}")->fetch(PDO::FETCH_ASSOC);
        return $team;
    }

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
    * Retrieves id, ball, name and the number of runs of all players.
    *
    * @return Array of key value mappings of player data.
    */
    private function getPlayers($team) {
        if (!is_numeric($team)) throw new Exception('Illegal argument for getPlayers $team');
        $result = $this->database->query("SELECT * FROM players WHERE team = ${team} ORDER BY batting_order DESC")->fetchAll(PDO::FETCH_ASSOC);
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
