<?php 
// import database settings
require('settings.php');


function printBrowserConsole( $object=null, $label=null ){
    $message = json_encode($object, JSON_PRETTY_PRINT);
    $label = "Debug" . ($label ? " ($label): " : ': ');
    echo "<script>console.log(\"$label\", $message);</script>";
}

// database connection class

class Database{
        private $host, $user, $pwd, $db, $connection;

        function __construct() {
            global $MYSQL_HOST, $MYSQL_USER, $MYSQL_PWD, $MYSQL_DB;
            $this->host = $MYSQL_HOST;
            $this->user = $MYSQL_USER;
            $this->pwd = $MYSQL_PWD;
            $this->db = $MYSQL_DB;
          }

        public function connect()
        {
             $this->connection =  @mysqli_connect( // create database connection
                $this->host, 
                $this->user, 
                $this->pwd, 
                $this->db 
            ); 
        }

        public function __destruct()
        {
            @mysqli_close($this->connection); // close database connection on destroy
        }
    
        public function query($query)
        {
            printBrowserConsole($query);
            try {
                $results = @mysqli_query($this->connection, $query); // run query
                if (gettype($results) == 'boolean') return $results; // return if result return is of type boolean
                return @mysqli_fetch_all($results, MYSQLI_ASSOC); // fetch all results, return as array
            }
            catch (Exception $e){
                throw new Exception($e.' - '.$query);
            }
        }

        public function lastInsertedId(){
            return @mysqli_insert_id($this->connection); // get last inserted id
        }

        public function escapeData($data) // process and sanitize data before query
        {
            $string = "";
            if(is_bool($data)) { // check if boolean
                $string = $data ? "true" : "false"; 
            }
            if(is_array(($data))) { // check if array -> convert to json
                $string = "'".@mysqli_escape_string($this->connection, json_encode($data))."'";
            }
            if(is_string($data)){ // check if string -> escape string
                $string = "'".@mysqli_escape_string($this->connection, $data)."'";
            }
            if(is_int($data) || is_float($data)){ // check if int / float -> convert to string for query
                $string = strval($data);
            }

            return $string;
        }
    }
?>