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
?>