<?php 
require('settings.php');
function printBrowserConsole( $object=null, $label=null ){
    $message = json_encode($object, JSON_PRETTY_PRINT);
    $label = "Debug" . ($label ? " ($label): " : ': ');
    echo "<script>console.log(\"$label\", $message);</script>";
}

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
             $this->connection =  @mysqli_connect(
                $this->host, 
                $this->user, 
                $this->pwd, 
                $this->db 
            ); 
        }

        public function __destruct()
        {
            @mysqli_close($this->connection);
        }
    
        public function query($query)
        {
            printBrowserConsole($query);
            try {
                $results = @mysqli_query($this->connection, $query);
                if (gettype($results) == 'boolean') return $results;
                return @mysqli_fetch_all($results, MYSQLI_ASSOC);
            }
            catch (Exception $e){
                throw new Exception($e.' - '.$query);
            }
        }

        public function lastInsertedId(){
            return @mysqli_insert_id($this->connection);
        }

        public function escapeData($data)
        {
            $string = "";
            if(is_bool($data)) {
                $string = $data ? "true" : "false";
            }
            if(is_array(($data))) {
                $string = "'".@mysqli_escape_string($this->connection, json_encode($data))."'";
            }
            if(is_string($data)){
                $string = "'".@mysqli_escape_string($this->connection, $data)."'";
            }
            if(is_int($data) || is_float($data)){
                $string = strval($data);
            }

            return $string;
        }
    }
?>