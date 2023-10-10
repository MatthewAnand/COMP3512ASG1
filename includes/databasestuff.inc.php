<?php
require_once('config.inc.php');
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
   
   Class ArtistDatabase{
    private static $sql = "SELECT * FROM artists";
    public function __construct($connection) { 
        $this->pdo = $connection;
    }
    public function getAll() { 
            $sql = self::$sql;  
            $result = DatabaseHelper::runQuery($this->pdo, $sql, null); 
            return $result->fetchAll(); 
            }  
}
Class SongDatabase{
    private static $sql = "SELECT  duration, title, songID, bpm, energy, danceability, liveness, valence, acousticness, speechiness, popularity,
     artistName, typeID, typeName, year, genreName FROM songs INNER JOIN genres ON songs.genreID = genres.genreID
    INNER JOIN artists ON songs.artistID = artists.artistID INNER JOIN types ON artists.artistTypeID = types.typeID";
    public function __construct($connection) { 
        $this->pdo = $connection;
    }
    public function getAll() { 
            $sql = self::$sql; 
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, null); 
            return $statement->fetchAll(); 
            } 
    public function getAllArtist($artistID){
        $sql = self::$sql . " WHERE artists.artistID=".$artistID." ORDER BY artistName"; 
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
        null); 
        return $statement->fetchAll(); }

        public function getAllGenres($genreID){
            $sql = self::$sql . " WHERE genres.genreID=".$genreID." ORDER BY artistName"; 
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll(); 
       }
       public function getAllID($songID){
        $sql = self::$sql . " WHERE songID=".$songID." ORDER BY artistName"; 
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
        null); 
        return $statement->fetchAll();   
    }
        public function getAllTitle($title){
        $sql = self::$sql . " WHERE title LIKE '".$title."' ORDER BY artistName"; 
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
        null); 
        return $statement->fetchAll();   
        }
        public function getYearBig($year){
            $sql = self::$sql . " WHERE year >= ".$year." ORDER BY artistName"; 
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll();   
            }
            public function getYearSmall($year){
                $sql = self::$sql . " WHERE year <= ".$year." ORDER BY artistName"; 
                $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
                null); 
                return $statement->fetchAll();   
                }
            public function getPopBig($year){
                $sql = self::$sql . " WHERE popularity >= ".$year." ORDER BY artistName"; 
                $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
                null); 
                return $statement->fetchAll();   
                }
            public function getPopSmall($year){
                $sql = self::$sql . " WHERE popularity <= ".$year." ORDER BY artistName"; 
                $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
                null); 
                return $statement->fetchAll();   
                }
        public function SongSortTopPop(){
            $sql = self::$sql . " ORDER BY popularity ASC LIMIT 20"; 
                $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
                null); 
                return $statement->fetchAll();   
        }
        public function PlaylistGenre(){
            $sql = "SELECT genres.genreID, Count(songID) as num, genreName FROM songs INNER JOIN genres on songs.genreID = genres.genreID Group by genres.genreID order by genreName LIMIT 10"; 
                $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
                null); 
                return $statement->fetchAll();  
        }
        public function TopArtist(){
            $sql = "SELECT artistName, count(songID) as num FROM songs INNER JOIN artists ON songs.artistID = artists.artistID GROUP BY artistName order by num DESC LIMIT 10";
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll();  
        }
        public function TopPop(){
            $sql = "SELECT title, popularity, artistName FROM songs INNER JOIN artists ON songs.artistID = artists.artistID GROUP BY artistName ORDER BY popularity DESC LIMIT 10";
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll(); 
        }
        public function Single(){
            $sql = "SELECT title, popularity, count(*) as num, artistName FROM songs INNER JOIN artists ON songs.artistID = artists.artistID GROUP BY artistName HAVING num = 1 ORDER BY popularity DESC LIMIT 10";
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll(); 
        }
        public function Acoustic(){
            $sql = "SELECT title, popularity, artistName, acousticness from  songs INNER JOIN artists ON songs.artistID = artists.artistID WHERE acousticness > 40 GROUP BY artistName ORDER BY duration DESC LIMIT 10";
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll(); 
        }
        public function Clubbing(){
            $sql = "SELECT title, popularity, artistName, ((danceability*1.6)+(energy*1.4)) as calc, danceability from  songs INNER JOIN artists ON songs.artistID = artists.artistID WHERE danceability > 80 GROUP BY artistName ORDER BY calc DESC LIMIT 10";
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll(); 
        }
        public function Running(){
            $sql = "SELECT title, popularity, artistName, ((valence*1.6)+(energy*1.3)) as calc, bpm from  songs INNER JOIN artists ON songs.artistID = artists.artistID WHERE bpm > 120 AND bpm < 125 GROUP BY artistName ORDER BY calc DESC LIMIT 10";
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll(); 
        }
        public function Meh(){
            $sql = "SELECT title, popularity, artistName, ((acousticness*0.8)+(100-speechiness)+(100-valence)) as calc, bpm, speechiness from  songs INNER JOIN artists ON songs.artistID = artists.artistID WHERE bpm >= 100 AND bpm <= 115 AND speechiness >= 1 AND speechiness <= 20 GROUP BY artistName ORDER BY calc DESC LIMIT 10";
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll(); 
        }
        public function GetAllFavourites(){
            
        }
    }
Class GenreDatabase{
    private static $sql = "SELECT * FROM genres ORDER BY 'genreID'";
    public function __construct($connection) { 
        $this->pdo = $connection;
    }
    public function getAll() { 
            $sql = self::$sql; 
            $statement = 
            DatabaseHelper::runQuery($this->pdo, $sql, null); 
            return $statement->fetchAll(); 
            }  
}
Class TypeDatabase{
    private static $sql = "SELECT * FROM types ORDER BY 'typeID'";
    public function __construct($connection) { 
        $this->pdo = $connection;
    }
    public function getAll() { 
            $sql = self::$sql; 
            $statement = 
            DatabaseHelper::runQuery($this->pdo, $sql, null); 
            return $statement->fetchAll(); 
            }  
}