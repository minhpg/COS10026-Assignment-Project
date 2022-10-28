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
        $this->conn = new Database(); // initialize database class
        $this->conn->connect(); // initialize database connection
        $table_exists = $this->checkTableExists(); // check table exists
        if(!$table_exists) {
            $this->initialiseTable(); // create table if not exists
        }
    }

    public function query($query) {
        return $this->conn->query($query); // run query
    }

    protected function checkTableExists(){
        $query = "SHOW tables LIKE '$this->table'"; // query to check if table exists
        $results = $this->query($query);
        return $results;
    }

    protected function initialiseTable(){
        $unique_fields = '';
        if(count($this->unique_fields) > 0){
            $unique_fields = ", UNIQUE (".join(', ', $this->unique_fields).")"; // concatenate unique fields array -> string
        }
        $schema_query = $this->arraySchemaToQuery($this->schema); // create schema from array of fields->datatypes (see sample schema above)
        $query = "CREATE TABLE $this->table (
                    id int NOT NULL AUTO_INCREMENT,
                    PRIMARY KEY (id),
                    $schema_query
                    $unique_fields
                )"; // create table
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

    public function findById($id, $return_fields=['*'], $order_by_field = 'id', $order_by = "DESC") { // find row with id
        $select = join(',', $return_fields);
        $order_by_string = "ORDER BY $order_by_field $order_by";
        $query = "SELECT $select FROM $this->table WHERE id = $id $order_by_string";
        return $this->query($query);
    }

    public function getAll($return_fields=['*'], $order_by_field = 'id', $order_by = "DESC") { // get all rows
        $select = join(',', $return_fields);
        $order_by_string = "ORDER BY $order_by_field $order_by";
        $query = "SELECT $select FROM $this->table $order_by_string";
        return $this->query($query);
    }

    public function find($fields, $return_fields=['*'], $order_by_field = 'id', $order_by = "DESC"){ // find row with matching fields
        $select = join(',', $return_fields);
        $values = [];
        foreach($fields as $key=>$value){
            array_push($values, "$key = ".$this->conn->escapeData($value));
        }
        $values_string = join(', ', $values);
        $order_by_string = "ORDER BY $order_by_field $order_by";
        $query = "SELECT $select FROM $this->table WHERE ( $values_string ) $order_by_string";
        return $this->query($query);
    }

    public function findLike($fields, $return_fields=['*'], $order_by_field = 'id', $order_by = "DESC"){ // find rows with matching fields using LIKE 
        $select = join(',', $return_fields);
        $values = [];
        foreach($fields as $key=>$value){
            array_push($values, "$key LIKE ".$this->conn->escapeData($value));
        }
        $values_string = join('AND ', $values);
        $order_by_string = "ORDER BY $order_by_field $order_by";
        $query = "SELECT $select FROM $this->table WHERE ( $values_string ) $order_by_string";
        return $this->query($query);
    }

    public function findByField($field, $value, $return_fields=['*'], $order_by_field = 'id', $order_by = "DESC"){ // find rows with matching field 
        $select = join(',', $return_fields);
        $order_by_string = "ORDER BY $order_by_field $order_by";
        $query = "SELECT $select FROM $this->table WHERE $field = '$value' $order_by_string";
        return $this->query($query);
    }

    public function findByFieldLike($field, $value, $return_fields=['*'], $order_by_field = 'id', $order_by = "DESC"){ // find rows with matching field using LIKE
        $select = join(',', $return_fields);
        $order_by_string = "ORDER BY $order_by_field $order_by";
        $query = "SELECT $select FROM $this->table WHERE $field LIKE '$value' $order_by_string";
        return $this->query($query);
    }

    public function delete($fields){ // delete rows with matching fields
        $values = [];
        foreach($fields as $key=>$value){
            array_push($values, "$key = ".$this->conn->escapeData($value));
        }
        $values_string = join(', ', $values);
        $query = "DELETE FROM $this->table WHERE ( $values_string )";
        return $this->query($query);
    }

    public function deleteById($id) { //  delete row with id
        $query = "DELETE FROM $this->table WHERE id = $id";
        return $this->query($query);
    }

    public function deleteByField($field, $value){ // delete rows with matching field 
        $query = "DELETE FROM $this->table WHERE $field = '$value'";
        return $this->query($query);
    }

    public function insertOne($fields) { // insert row
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

    public function updateOne($id, $fields) { // update row
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