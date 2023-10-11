<?php

require_once 'includes/config.inc.php';
require_once 'includes/databasestuff.inc.php';

?>
<!DOCTYPE html>
    <html>
        <head>
                        
        </head>

        <body>
            <header>
            <p>COMP 3512 Assignment 1 Ben Harris-Eze & Matthew Anand</p>
            <nav>
</header>   
 <ul>
            <li><a href="Page - Favourites.php">Favourites</a></li> 
            <li><a href="Page - Home.php">Home</a></li>
</ul>
        <fieldset> 
         <legend><h1>Song Search</h1></legend> 
         <div>
            <form method="get" action = "Page - BrowseSearchResults.php" class="form">   
             <p>
            
                <div > <input type = "radio" name = "choice" value = "title"> <label>Title:<input type="text" name="title" id="title" ></label></div><br><br>
                
                
                <div ><input type = "radio" name = "choice" value = "artist"> <label for = "artists">Artist:</label> 
                <select name="artists" id ="artists">
                <option value='0'>             </option>  
                <?php
                $connstring = "sql:./music.db";
                $conn = DatabaseHelper::createConnection(array($connstring));
                $test = new ArtistDatabase($conn);
                $result = $test->getAll();
               try{
                  foreach($result as $row){
                 echo "<option value =".$row['artist_id'].">".$row['artist_name']."</option>";
                }
               }
               catch(PDOException $ex){
                   echo $ex;
               }
              
                ?>
            </select>
            </div>
            <div >
                <label for = "genres">Genre:</label>
                <select name="genres" id ="genres">
                <option value='0'>                   </option>  
                <?php
                $connstring = "sql:./music.db";
                $conn = DatabaseHelper::createConnection(array($connstring));
                $test = new GenreDatabase($conn);
                $result = $test->getAll();
               try{
                  foreach($result as $row){
                 echo "<option value =".$row['genre_id'].">".$row['genre_name']."</option>";
                }
               }
               catch(PDOException $ex){
                   echo $ex;
               }
                   
                ?>
             </select>
            </div>
            <br>
            
               
            <div>
                <ul>
                <input type = "radio" name = "choice" value = "year"> <label >Year</label><br><br>
                    
                  <input type = "radio" name = "year" value = "less"/><label>Less Than </label><input type="text" name="YearSmall"><br>
                  <input type = "radio" name = "year" value = "greater"/> <label>Greater Than</label><input type="text" name="YearBig">
                    
            </ul></div>
                &emsp;&emsp;
                

            </div>
                    </p>
                    <input type="submit" value="Submit" class="button">
        </fieldset>

                
        </form>   
    </body>

    
    <footer>
    <p>COMP 3512  &copy;  https://github.com/MatthewAnand  |   https://github.com/bharr102 </p>

    </footer>


    </html>