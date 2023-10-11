<?php

require_once 'includes/config.inc.php';
require_once 'includes/databasestuff.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="utf-8">
            <title>COMP 3512 Assignment 1</title>

    </head>

    <body>
    <header>
    <p>COMP 3512 Assignment 1 Ben Harris-Eze & Matthew Anand</p>
    <ul id="nav">
            <li><a href="Page - Home.php">Home</a></li> 
            <li><a href="Page - Search.php">Search</a></li>
</ul>
</header>
<?php
     echo"   <h1>Favourites</h1>";
     echo"     <table>";
     echo"      <tr>";
     echo"         <th>Title</th>";
     echo"           <th>Artist</th>";
     echo "          <th>Year</th>";
     echo"           <th>Genre</th>";
     echo"           <th>Popularity</th>";
     echo"           <th> <a href='Page - Favourites.php?removeall'> Remove all</a></td>";
     echo"</tr>";
       session_start();
         $connstring = "sql:./music.db";
         $conn = DatabaseHelper::createConnection(array($connstring));
         $test = new SongDatabase($conn);
         if(isset($_GET['songID'])){
            if(! isset($_SESSION['Favourites'])){
                $_SESSION['Favourites'] = [];
            }
            $_SESSION['Favourites'] []= $_GET['songID'];
            $_SESSION['Favourites'] = array_unique($_SESSION['Favourites']);
    try{
      foreach($_SESSION['Favourites'] as $songID){
        $songinfo =  $test->getAllID($songID)[0];
            echo "<tr>";
            echo "<td><form id='form".$songID."' method='GET' action ='Page - Single Song Page.php?=".$songID."'><input type='hidden' name='id' value='".$songID."'/>".$songinfo['title']."</form></td>";
            echo "<td>".$songinfo['artistName']."</td>";
            echo "<td>".$songinfo['year']."</td>";
            echo "<td>".$songinfo['genreName']."</td>";
            echo "<td>".$songinfo['popularity']."</td>";
            echo "<td><a href='Page - Favourites.php?remove=".$songID."'> Remove From Favourites</a></td>";
            echo"</tr>";
         }
        }
        catch (Exception $ex){

        }
    }
    else if (isset($_GET['removeall'])){
        session_destroy();
    }
   else if(isset($_GET['remove'])){
    $songid=$_GET['remove'];
    $data = $_SESSION['Favourites'];
    foreach ($_SESSION['Favourites'] as $key => $value){
        if ($value == $songid){
    unset($data[$key]);
    }
}
    $_SESSION['Favourites'] = $data;
    
try{
  foreach($_SESSION['Favourites'] as $songID){
    $songinfo =  $test->getAllID($songID)[0];
        echo "<tr>";
        echo "<td><form id='form".$songID."' method='GET' action ='Page - Single Song Page.php?=".$songID."'><input type='hidden' name='id' value='".$songID."'/>".$songinfo['title']."</form></td>";
        echo "<td>".$songinfo['artistName']."</td>";
        echo "<td>".$songinfo['year']."</td>";
        echo "<td>".$songinfo['genreName']."</td>";
        echo "<td>".$songinfo['popularity']."</td>";
        echo "<td><a href='Page - Favourites.php?remove=".$songID."'> Remove From Favourites</a></td>";
        echo"</tr>";
     }
    }
    catch (Exception $ex){

    }
}
else{
    if(! isset($_SESSION['Favourites'])){
        $_SESSION['Favourites'] = [];
    }
    $_SESSION['Favourites'] = array_unique($_SESSION['Favourites']);
    try{
        foreach($_SESSION['Favourites'] as $songID){
          $songinfo =  $test->getAllID($songID)[0];
              echo "<tr>";
              echo "<td><form id='form".$songID."' method='GET' action ='Page - Single Song Page.php?=".$songID."'><input type='hidden' name='id' value='".$songID."'/>".$songinfo['title']."</form></td>";
              echo "<td>".$songinfo['artistName']."</td>";
              echo "<td>".$songinfo['year']."</td>";
              echo "<td>".$songinfo['genreName']."</td>";
              echo "<td>".$songinfo['popularity']."</td>";
              echo "<td><a href='Page - Favourites.php?remove=".$songID."'> Remove From Favourites</a></td>";
              echo"</tr>";
           }
          }
          catch (Exception $ex){
      
          }
}
        ?>
            </table>
    </body>
    
    <footer>
    <p>COMP 3512  &copy;  https://github.com/MatthewAnand  |  https://github.com/bharr102 </p>
    </footer>
</html>