<?php
require_once('config.inc.php');
function songId(){
try{

    $pdo= new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $sql="Select song_id FROM songs";
    $sId = $pdo-> Query($sql);
    echo "<ul>";
    while($row = $sId ->fetch()){
        echo "<li>". $row['song_id'] ."</li>";
    }
    echo "</ul>";
    $pdo = null;
}
catch (PDOException $e){
    die($e->getMessage());
  }
}
class DatabaseHelper { 
    /* Returns a connection object to a database */
    public static function createConnection( $values=array() ) { 
    $connString = $values[0]; 
    $pdo = new PDO($connString); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, 
    PDO::ERRMODE_EXCEPTION); 
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, 
    PDO::FETCH_ASSOC); 
    return $pdo; 
    } 
    /*
    Runs the specified SQL query using the passed connection and 
    the passed array of parameters (null if none)
    */
    public static function runQuery($connection, $sql, $parameters) { 
    $statement = null; 
    // if there are parameters then do a prepared statement
    if (isset($parameters)) { 
    // Ensure parameters are in an array
    if (!is_array($parameters)) { 
    $parameters = array($parameters); 
    } 
    // Use a prepared statement if parameters 
    $statement = $connection->prepare($sql); 
    $executedOk = $statement->execute($parameters); 
    if (! $executedOk) throw new PDOException; 
    } else { 
    // Execute a normal query 
    $statement = $connection->query($sql); 
    if (!$statement) throw new PDOException; 
    } 
    return $statement; 
    } 
   }
   
?>