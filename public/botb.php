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

    // Public //
    // ====== //
    
    public function __construct($dbConnection, $dbUser, $dbPassword) {
        $this->database = new PDO($dbConnection, $dbUser, $dbPassword, self::$pdoOptions);
    }
    
   /**
    * @return an associated array of all scores and all player information.
    */  
    public function getAPIResult() {
        return array(
            "scores" => $this->getScores(),
            "players" => $this->getPlayers()
        );
    }

    // Private //
    // ======= //

   /**
    * Retrieves all available scores from the database.
    *
    */
    private function getScores() {
        $result = $this->database->query("SELECT * FROM scores");
        $retval = array();
        foreach ($result as $scoreEntry) {
            array_push($retval, array(
                'score' => $scoreEntry['score'],
                'wickets' => $scoreEntry['wickets'],
                'overs' => $scoreEntry['overs'],
                'old' => $scoreEntry['other']
            ));
        }
        return $retval;
    }

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
        $query = $this->database->query("SELECT id, ball, name, runs FROM players WHERE id = d}");
        $player = $query->fetch();
        return $this->generatePlayerArray($player);
    }

   /**
    * Gets information about all players.
    *
    * Retrieves id, ball, name and the number of runs of all players.
    *
    * @return Array of key value mappings of player data.
    */
    private function getPlayers() {
        $result = $this->database->query("SELECT id, ball, name, runs FROM players");
        $retval = array();
        foreach ($result as $row) {
            array_push($retval, $this->generatePlayerArray($row));
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
