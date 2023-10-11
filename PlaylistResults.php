<?php

require_once 'includes/config.inc.php';
require_once 'includes/databasestuff.inc.php';

?>

<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">
            <title>COMP 3512 Assignment 1</title>
</head>
<body>
  <header>
  <p>COMP 3512 Assignment 1 Ben Harris-Eze & Matthew Anand</p>
  <ul id="nav">
            <li id="navbar"><a href="Page - Home.php">Home</a></li> 
</ul> 
</header>


<?php
$connstring = "mysql:./music.db";
$conn = DatabaseHelper::createConnection(array($connstring));
$test = new SongDatabase($conn);
    if ($_GET['Playlist'] == 'TopGenres'){
      $result = $test->PlaylistGenre();
      try{
        echo "<h1> Top Genres </h1>";
          echo "<ol>";
        foreach($result as $row){
          echo "<li>".$row['genreName']." - ". $row['num'] . "</td>";
     }
     echo "</ol>";
    }
     catch(PDOException $ex){
         echo $ex;
     }
    }
    if ($_GET['Playlist'] == 'TopArtists'){
      $result = $test->TopArtist();
      try{
        echo "<h1> Top Artists </h1>";
        echo "<ol>";
        foreach($result as $row){
          echo "<li>".$row['artistName']." - ". $row['num'] . "</td>";
     }
     echo "</ol>";
    }
     catch(PDOException $ex){
         echo $ex;
     }
    }
    if ($_GET['Playlist'] == 'TopPop'){
      $result = $test->TopPop();
      try{
        echo "<h1> Most Popular Songs </h1>";
        echo "<ol>";
      foreach($result as $row){
        
        echo "<li>".$row['artistName']." - <a href = 'Page - Single Song Page.php?Song=".$row['title']."'>".$row['title']." </a> - ". $row['popularity'];
        echo"</li>";
    }
    echo "</ol>";
   }
     catch(PDOException $ex){
         echo $ex;
     }
    }
    if ($_GET['Playlist'] == 'OneHit'){
      $result = $test->Single();
      try{
        echo "<h1> One Hit Wonders </h1>";
        echo "<ol>";
      foreach($result as $row){
        
        echo "<li>".$row['artistName']." - <a href = 'Page - Single Song Page.php?Song=".$row['title']."'>".$row['title']." </a> - ". $row['popularity'];
        echo"</li>";
    }
    echo "</ol>";
   }
     catch(PDOException $ex){
         echo $ex;
     }
    }
    if ($_GET['Playlist'] == 'Acoustic'){
      $result = $test->Acoustic();
      try{
        echo "<h1> Longest Acoustic Songs </h1>";
        echo "<ol>";
      foreach($result as $row){
        
        echo "<li>".$row['artistName']." - <a href = 'Page - Single Song Page.php?Song=".$row['title']."'>".$row['title']." </a> - ". $row['acousticness'];
        echo"</li>";
    }
    echo "</ol>";
   }
     catch(PDOException $ex){
         echo $ex;
     }
    }
    if ($_GET['Playlist'] == 'Club'){
      $result = $test->Clubbing();
      try{
        echo "<h1> At The Club </h1>";
        echo "<ol>";
      foreach($result as $row){
        
        echo "<li>".$row['artistName']." - <a href = 'Page - Single Song Page.php?Song=".$row['title']."'>".$row['title']." </a> - ". $row['danceability'];
        echo"</li>";
    }
    echo "</ol>";
   }
     catch(PDOException $ex){
         echo $ex;
     }
    }
    if ($_GET['Playlist'] == 'Running'){
      $result = $test->Running();
      try{
        echo "<h1> Running </h1>";
        echo "<ol>";
      foreach($result as $row){
        
        echo "<li>".$row['artistName']." - <a href = 'Page - Single Song Page.php?Song=".$row['title']."'>".$row['title']." </a> - ". $row['bpm'];
        echo"</li>";
    }
    echo "</ol>";
   }
     catch(PDOException $ex){
         echo $ex;
     }
    }
    if ($_GET['Playlist'] == 'Studying'){
      $result = $test->Meh();
        try{
          echo "<h1> Studying </h1>";
          echo "<ol>";
        foreach($result as $row){
          
          echo "<li>".$row['artistName']." - <a href = 'Page - Single Song Page.php?Song=".$row['title']."'>".$row['title']." </a> - ". $row['bpm'];
          echo"</li>";
      }
      echo "</ol>";
     }
     catch(PDOException $ex){
         echo $ex;
     }
    }
?>
<footer>
<p>COMP 3512 &copy;  https://github.com/MatthewAnand  |  https://github.com/bharr102  </p>
    </footer>
