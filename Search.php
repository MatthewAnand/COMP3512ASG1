<?php

require_once 'includes/config.inc.php';
require_once 'includes/databasestuff.inc.php';

?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet"href = "Styling/Search.css">
            <title>COMP 3512 Assignment 1 Ben Harris-Eze & Matthew Anand</title>
            <meta content="width=device-width,initial-scale=1.0"
                        
        </head>

        <body>
            <header>
                <p>Notes</p>
                <nav>
                    <ul>
                        <a href="Favourites.php">Favourites</a>
                        <a href="Home.php">Home</a>
                        <a href ="PlaylistResults.php"> Playlists</a> 
                    </ul>
                </nav>
            
            </header>   
         
        <div class = "container">
            <main>
                <fieldset> 
                <legend><h1>Song Search</h1></legend> 
        
                <form method="get" action = "Page - BrowseSearchResults.php" class="form">   
                    <p>
            
                    <div > <input type = "radio" name = "choice" value = "title"> <label>Title:<input type="text" name="title" id="title" ></label></div><br><br>
                
                
                    <div ><input type = "radio" name = "choice" value = "artist"> <label for = "artists">Artist:</label></div>
                    <select name="artists" id ="artists">
                        <option value='0'>             </option>  
                        <?php
                            $connstring = "sql:./music.db";
                            $conn = DatabaseHelper::createConnection(array($connstring));
                            $test = new ArtistDatabase($conn);
                            $result = $test->getAll();
                            try{
                                foreach($result as $row){
                                    echo "<option value =".$row['artistID'].">".$row['artistName']."</option>";
                                }
                            }
                            catch(PDOException $ex){
                                echo $ex;
                            }
              
                        ?>
                    </select>
            
            <div >
                <label for = "genres">Genre:</label>
                <select name="genres" id ="genres">
                <option value='0'>                   </option>  
                <?php
                $connstring = "mysql:./music.db";
                $conn = DatabaseHelper::createConnection(array($connstring));
                $test = new GenreDatabase($conn);
                $result = $test->getAll();
               try{
                  foreach($result as $row){
                 echo "<option value =".$row['genreID'].">".$row['genreName']."</option>";
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
                    
                </ul>
            </div>
                &emsp;&emsp;
                

            </div>
                    </p>
                    <input type="submit" value="Submit" class="button">
        </fieldset>

                
        </form>

        </main>
        
        <footer>
            <p>COMP 3512  &copy;  https://github.com/MatthewAnand  |   https://github.com/bharr102 </p>
        </footer>
    </body>

    
    


    </html>