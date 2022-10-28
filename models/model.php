<?php 
class Model {

    /* Sample schema:

        PersonID int,
        LastName varchar(255),
        FirstName varchar(255),
        Address varchar(255),
        City varchar(255)

        --> 

        [
            'PersonID' => 'int',
            'LastName' => 'varchar(255)',
            'FirstName' => 'varchar(255)',
            'Address' => 'varchar(255)',
            'City' => 'varchar(255)',
        ]
        
    */

    private $table, $conn, $schema, $unique_fields;

    function __construct($table, $schema, $unique_fields = [])
    {       
        $this->unique_fields = $unique_fields;
        $this->table = $table;
        $this->schema = $schema;
        $this->conn = new Database();
        $this->conn->connect();
        $table_exists = $this->checkTableExists();
        if(!$table_exists) {
            $this->initialiseTable();
        }
    }

    public function query($query) {
        return $this->conn->query($query);
    }

    protected function checkTableExists(){
        $query = "SHOW tables LIKE '$this->table'";
        $results = $this->query($query);
        return $results;
    }

    protected function initialiseTable(){
        $unique_fields = '';
        if(count($this->unique_fields) > 0){
            $unique_fields = ", UNIQUE (".join(', ', $this->unique_fields).")";
        }
        $schema_query = $this->arraySchemaToQuery($this->schema);
        $query = "CREATE TABLE $this->table (
                    id int NOT NULL AUTO_INCREMENT,
                    PRIMARY KEY (id),
                    $schema_query
                    $unique_fields
                )";
        return $this->query($query);
    }

    protected function arraySchemaToQuery($array){
        $fields = [];
        foreach($array as $key=>$value){
            array_push($fields, " $key $value");
        }
        $string = join(',', $fields);
        return $string;
    }

    protected function arrayFieldsToQuery($array){
        $fields = [];
        foreach($array as $key=>$value){
            array_push($fields, " $key $value");
        }
        $string = join(',', $fields);
        return $string;
    }

    public function findById($id, $return_fields=['*']) {
        $select = join(',', $return_fields);
        $query = "SELECT $select FROM $this->table WHERE id = $id ORDER BY id DESC";
        return $this->query($query);
    }

    public function getAll($return_fields=['*']) {
        $select = join(',', $return_fields);
        $query = "SELECT $select FROM $this->table ORDER BY id DESC";
        return $this->query($query);
    }

    public function find($fields, $return_fields=['*']){
        $select = join(',', $return_fields);
        $values = [];
        foreach($fields as $key=>$value){
            array_push($values, "$key = ".$this->conn->escapeData($value));
        }
        $values_string = join(', ', $values);
        $query = "SELECT $select FROM $this->table WHERE ( $values_string ) ORDER BY id DESC";
        return $this->query($query);
    }

    public function findByField($field, $value, $return_fields=['*']){
        $select = join(',', $return_fields);
        $query = "SELECT $select FROM $this->table WHERE $field = '$value' ORDER BY id DESC";
        return $this->query($query);
    }

    public function delete($fields){
        $values = [];
        foreach($fields as $key=>$value){
            array_push($values, "$key = ".$this->conn->escapeData($value));
        }
        $values_string = join(', ', $values);
        $query = "DELETE FROM $this->table WHERE ( $values_string )";
        return $this->query($query);
    }

    public function deleteById($id) {
        $query = "DELETE FROM $this->table WHERE id = $id";
        return $this->query($query);
    }

    public function deleteByField($field, $value){
        $query = "DELETE FROM $this->table WHERE $field = '$value'";
        return $this->query($query);
    }

    public function insertOne($fields) {
        $query = $this->parseFieldsInsert($fields);
        $this->query($query);
        return $this->conn->lastInsertedId();
    }

    private function parseFieldsInsert($fields) {
        $cols = [];
        $values = [];
        foreach($fields as $key=>$value){
            array_push($cols, $key);
            array_push($values, $this->conn->escapeData($value));
        }
        $cols_string = join(', ', $cols);
        $values_string = join(', ', $values);
        $query = "INSERT INTO $this->table ( $cols_string )
        VALUES ( $values_string )";
        return $query;
    }

    public function updateOne($id, $fields) {
        $query = $this->parseFieldUpdate($id, $fields);
        return $this->query($query);
    }

    private function parseFieldUpdate($id, $fields) {
        $cols = [];
        $values = [];
        foreach($fields as $key=>$value){
            array_push($cols, $key);
            array_push($values, $this->conn->escapeData($value));
        }
        $update_fields = [];
        foreach($cols as $index=>$value){
            array_push($update_fields, "$value = $values[$index]");
        }
        $string = join(', ', $update_fields);
        $query = "UPDATE $this->table SET $string
        WHERE id=$id";
        return $query;
    }
}
?>