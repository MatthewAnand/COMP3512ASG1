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
</header>
<p>
    <form method="get" action="Search.php">
    <input type="submit" value="Show All"> <br>
</form>
    <?php
    if (isset($_GET['Playlist'])){
      return;
    }
    else{
echo "You are Searching By: ";
    if(isset($_GET['artists']) && $_GET['artists'] != 0){
echo "Artist Name";
    }
    else if(isset($_GET['genres']) && $_GET['genres'] != 0){  
        echo "Genres";
    }
  }
        ?>
      <?php
      $connstring = "sql./music.db";
      $conn = DatabaseHelper::createConnection(array($connstring));
      $test = new SongDatabase($conn);
    echo "<table>";
 echo"<tr id='head'>";
    echo "<td><form id='form2' method='GET' action ='Page - Single Song Page.php?=5'><input type='hidden' name='id' value='1'/></form> Title</td>";
    echo "<td> Artist </td>";
    echo "<td> Year </td>";
    echo "<td> Genre </td>";
    echo "<td> Popularity</td>";
    echo "<td>  </td>";
    echo "<td> </td>";
echo "</tr>";
if(isset($_GET['artists']) && $_GET['artists'] != 0){  
    $results = $test->getAllArtist($_GET['artists']);
    try{
      foreach($results as $row){
        echo "<tr>";
        echo "<td><form id='form".$row['song_id']."' method='GET' action ='Page - Single Song Page.php?=".$row['song_id']."'><input type='hidden' name='id' value='".$row['song_id']."'/>".$row['title']."</form></td>";
        echo "<td>".$row['artist_name']."</td>";
        echo "<td>".$row['year']."</td>";
        echo "<td>".$row['genre_name']."</td>";
        echo "<td>".$row['popularity']."</td>";
        echo "<td><a href = 'Page - Favourites.php?song_id=" .$row['song_id']."'> Add to Favourites</td>";
        echo "<td><input form='form".$row['song_id']."' type='submit' value='View'></td>";
        echo"</tr>";
      }
  }
//  }
    catch (PDOException $ex){

      }
    }
    else if(isset($_GET['genres']) && $_GET['genres'] != 0){  
        $results = $test->getAllGenres($_GET['genres']);
        try{
          foreach($results as $row){
            echo "<tr>";
        echo "<td><form id='form".$row['song_id']."' method='GET' action ='Page - Single Song Page.php?=".$row['song_id']."'><input type='hidden' name='id' value='".$row['song_id']."'/>".$row['title']."</form></td>";
        echo "<td>".$row['artist_name']."</td>";
        echo "<td>".$row['year']."</td>";
        echo "<td>".$row['genre_name']."</td>";
        echo "<td>".$row['popularity']."</td>";
        echo "<td><a href = 'Page - Favourites.php?song_id=" .$row['song_id']."'> Add to Favourites</td>";
        echo "<td><input form='form".$row['song_id']."' type='submit' value='View'></td>";
        echo"</tr>";
          }
      }
    //  }
        catch (PDOException $ex){
    
          }
        }
        else if(isset($_GET['title']) && $_GET['title'] != null){  
          $results = $test->getAllTitle($_GET['title']);
          try{
            foreach($results as $row){
              echo "<tr>";
              echo "<td><form id='form".$row['song_id']."' method='GET' action ='Page - Single Song Page.php?=".$row['song_id']."'><input type='hidden' name='id' value='".$row['song_id']."'/>".$row['title']."</form></td>";
              echo "<td>".$row['artist_name']."</td>";
              echo "<td>".$row['year']."</td>";
              echo "<td>".$row['genre_name']."</td>";
              echo "<td>".$row['popularity']."</td>";
              echo "<td><a href = 'Page - Favourites.php?song_id=" .$row['song_id']."'> Add to Favourites</td>";
              echo "<td><input form='form".$row['song_id']."' type='submit' value='View'></td>";
              echo"</tr>";
            }
        }
      //  }
          catch (PDOException $ex){
      
            }
          }
          else if(isset($_GET['YearSmall']) && $_GET['YearSmall'] != null){  
            $results = $test->getYearSmall($_GET['YearSmall']);
            try{
              foreach($results as $row){
                echo "<tr>";
                echo "<td><form id='form".$row['song_id']."' method='GET' action ='Page - Single Song Page.php?=".$row['song_id']."'><input type='hidden' name='id' value='".$row['song_id']."'/>".$row['title']."</form></td>";
                echo "<td>".$row['artist_name']."</td>";
                echo "<td>".$row['year']."</td>";
                echo "<td>".$row['genre_name']."</td>";
                echo "<td>".$row['popularity']."</td>";
                echo "<td><a href = 'Page - Favourites.php?song_id=" .$row['song_id']."'> Add to Favourites</td>";
                echo "<td><input form='form".$row['song_id']."' type='submit' value='View'></td>";
                echo"</tr>";
              }
          }
        //  }
            catch (PDOException $ex){
        
              }
            }
            else if(isset($_GET['YearBig']) && $_GET['YearBig'] != null){  
              $results = $test->getYearBig($_GET['YearBig']);
              try{
                foreach($results as $row){
                  echo "<tr>";
                  echo "<td><form id='form".$row['song_id']."' method='GET' action ='Page - Single Song Page.php?=".$row['song_id']."'><input type='hidden' name='id' value='".$row['song_id']."'/>".$row['title']."</form></td>";
                  echo "<td>".$row['artist_name']."</td>";
                  echo "<td>".$row['year']."</td>";
                  echo "<td>".$row['genre_name']."</td>";
                  echo "<td>".$row['popularity']."</td>";
                  echo "<td><a href = 'Page - Favourites.php?song_id=" .$row['song_id']."'> Add to Favourites</td>";
                  echo "<td><input form='form".$row['song_id']."' type='submit' value='View'></td>";
                  echo"</tr>";
                }
            }
          //  }
              catch (PDOException $ex){
          
                }
              }
              else if(isset($_GET['PopSmall']) && $_GET['PopSmall'] != null){  
                $results = $test->getPopSmall($_GET['PopSmall']);
                try{
                  foreach($results as $row){
                    echo "<tr>";
                    echo "<td><form id='form".$row['song_id']."' method='GET' action ='Page - Single Song Page.php?=".$row['song_id']."'><input type='hidden' name='id' value='".$row['song_id']."'/>".$row['title']."</form></td>";
                    echo "<td>".$row['artist_name']."</td>";
                    echo "<td>".$row['year']."</td>";
                    echo "<td>".$row['genre_name']."</td>";
                    echo "<td>".$row['popularity']."</td>";
                    echo "<td><a href = 'Page - Favourites.php?song_id=" .$row['song_id']."'> Add to Favourites</td>";
                    echo "<td><input form='form".$row['song_id']."' type='submit' value='View'></td>";
                    echo"</tr>";
                  }
              }
            //  }
                catch (PDOException $ex){
            
                  }
                }
                else if(isset($_GET['PopBig']) && $_GET['PopBig'] != null){  
                  $results = $test->getPopBig($_GET['PopBig']);
                  try{
                    foreach($results as $row){
                      echo "<tr>";
                      echo "<td><form id='form".$row['song_id']."' method='GET' action ='Page - Single Song Page.php?=".$row['song_id']."'><input type='hidden' name='id' value='".$row['song_id']."'/>".$row['title']."</form></td>";
                      echo "<td>".$row['artist_name']."</td>";
                      echo "<td>".$row['year']."</td>";
                      echo "<td>".$row['genre_name']."</td>";
                      echo "<td>".$row['popularity']."</td>";
                      echo "<td><a href = 'Page - Favourites.php?song_id=" .$row['song_id']."'> Add to Favourites</td>";
                      echo "<td><input form='form".$row['song_id']."' type='submit' value='View'></td>";
                      echo"</tr>";
                    }
                }
              //  }
                  catch (PDOException $ex){
              
                    }
                  }
      else{
        $result = $test->getAll();
try{
    foreach($result as $row){
      echo "<tr>";
      echo "<td><form id='form".$row['song_id']."' method='GET' action ='Page - Single Song Page.php?=".$row['song_id']."'><input type='hidden' name='id' value='".$row['song_id']."'/>".$row['title']."</form></td>";
      echo "<td>".$row['artist_name']."</td>";
      echo "<td>".$row['year']."</td>";
      echo "<td>".$row['genre_name']."</td>";
      echo "<td>".$row['popularity']."</td>";
      echo "<td><a href = 'Page - Favourites.php?song_id=" .$row['song_id']."'> Add to Favourites</td>";
      echo "<td><input form='form".$row['song_id']."' type='submit' value='View'></td>";
      echo"</tr>";
  }
 }
 catch(PDOException $ex){
     echo $ex;
 }
}
?>
</table>
</p>
</body>
<footer>
<p>COMP 3512 &copy;  https://github.com/MatthewAnand  |  https://github.com/bharr102 </p>

    </footer>
</html> 