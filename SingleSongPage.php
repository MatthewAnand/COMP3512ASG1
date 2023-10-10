<?php

require_once 'config.inc.php';
require_once 'databasestuff.inc.php';

?>
<!DOCTYPE html>
<html>
<head>
    
</head>

<body>
<header>
<p>COMP 3512 Assignment 1 By Ben Harris-Eze Matthew Anand</p>
<ul id="nav">
            <li><a href="Page - Home.php">Home</a></li> 
            <li><a href="Page - Search.php">Search</a></li>
</ul>
</header>

<h1>Song Information</h1>



<div class="grid-container">
<div>
<table>
            <tr>
                <th>Title</th>
                <th>Artist Name</th>
                <th>Artist Type</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Duration</th>
            </tr>
</div>
            <?php
$connstring = "mysql:./music.db";
$conn = DatabaseHelper::createConnection(array($connstring));
$test = new SongDatabase($conn);
if(isset($_GET['id'])){  
    $results = $test->getAllID($_GET['id']);
    try{
      foreach($results as $row){
        echo "<tr>";
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['artist_name']."</td>";
        echo "<td>".$row['type_name']."</td>";
        echo "<td>".$row['genre_name']."</td>";
        echo "<td>".$row['year']."</td>";
        echo "<td>".gmdate('i:s',$row['duration'])."</td>";
        echo"</tr>";
      }
  }
//  }
    catch (PDOException $ex){

      }
    }
    if(isset($_GET['Song'])){  
      $results = $test->getAllTitle($_GET['Song']);
      try{
        foreach($results as $row){
          echo "<tr>";
          echo "<td>".$row['title']."</td>";
          echo "<td>".$row['artist_name']."</td>";
          echo "<td>".$row['type_name']."</td>";
          echo "<td>".$row['genre_name']."</td>";
          echo "<td>".$row['year']."</td>";
          echo "<td>".gmdate('i:s',$row['duration'])."</td>";
          echo"</tr>";
        }
    }
  //  }
      catch (PDOException $ex){
  
        }
      }
    ?>
        </table>
<br><br><br>
<div>
<table>
    <tr>
        <th>BPM</th>
        <th>Energy</th>
        <th>Dancability</th>
        <th>Liveness</th>
        <th>Valence</th>
        <th>Acousticness</th>
        <th>Speechiness</th>
        <th>Popularity</th>
    </tr>
    </div>
    <?php
$connstring = "mysql:./music.db";
$conn = DatabaseHelper::createConnection(array($connstring));
$test = new SongDatabase($conn);
if(isset($_GET['id'])){  
    $results = $test->getAllID($_GET['id']);
    try{
      foreach($results as $row){
        echo "<tr>";
        echo "<td>".$row['bpm']."</td>";
        echo "<td>".$row['energy']."</td>";
        echo "<td>".$row['danceability']."</td>";
        echo "<td>".$row['liveness']."</td>";
        echo "<td>".$row['valence']."</td>";
        echo "<td>".$row['acousticness']."</td>";
        echo "<td>".$row['speechiness']."</td>";
        echo "<td>".$row['popularity']."</td>";
        echo"</tr>";
      }
  }
//  }
    catch (PDOException $ex){

      }
    }
    if(isset($_GET['Song'])){  
      $results = $test->getAllTitle($_GET['Song']);
      try{
        foreach($results as $row){
          echo "<tr>";
          echo "<td>".$row['bpm']."</td>";
          echo "<td>".$row['energy']."</td>";
          echo "<td>".$row['danceability']."</td>";
          echo "<td>".$row['liveness']."</td>";
          echo "<td>".$row['valence']."</td>";
          echo "<td>".$row['acousticness']."</td>";
          echo "<td>".$row['speechiness']."</td>";
          echo "<td>".$row['popularity']."</td>";
          echo"</tr>";
        }
    }
  //  }
      catch (PDOException $ex){
  
        }
      }
    ?>
</table>
    </div>
</body>
<footer>
<p>COMP 3512|  &copy;  https://github.com/MatthewAnand  |  https://github.com/bharr102 </p>
    </footer>

</html>