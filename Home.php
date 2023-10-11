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
    <p>COMP 3512 Assignment 1 Ben Harris-Eze & Matthew Anand</p>   
</header>
        <nav>
 <ul>
            <li><a href="Page - Favourites.php">Favourites</a></li> 
            <li><a href="Page - Search.php">Search</a></li>
</ul>
    <h1>Top Playlists</h1>
    <form method="GET" action = "Page - Playlist Results.php">
    <div class="grid-container">
  <div class="grid-item" id="genre"><a href = "Page - Playlist Results.php?Playlist=TopGenres">Top Genres</a></div>
  <div class="grid-item" id="artist"><a href = "Page - Playlist Results.php?Playlist=TopArtists">Top Artists</a></div>
  <div class="grid-item" id="popSong"><a href = "Page - Playlist Results.php?Playlist=TopPop">Most Popular Songs</a></div>
  <div class="grid-item" id="oneHit"><a href = "Page - Playlist Results.php?Playlist=OneHit">One Hit Wonders</a></div>
  <div class="grid-item" id="longSong"><a href = "Page - Playlist Results.php?Playlist=Acoustic">Longest Acoustic Songs</a></div>
  <div class="grid-item" id="club"><a href = "Page - Playlist Results.php?Playlist=Club">At the Club</a></div>
  <div class="grid-item" id="runSong"><a href = "Page - Playlist Results.php?Playlist=Running">Running Songs</a></div>
  <div class="grid-item" id="study"><a href = "Page - Playlist Results.php?Playlist=Meh">Studying</a></div>
</div>
    </form>


    </body>
    <footer>
    <p>COMP 3512 &copy;  https://github.com/MatthewAnand  |   https://github.com/bharr102  </p>

    </footer>
  
  
</body>
</html>