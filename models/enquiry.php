<?php 
class Enquiry extends Model  {
    function __construct()
    {       
        $schema = [
            "store_related" => "boolean NOT NULL",
            "nature_of_feedback" => "varchar(255) NOT NULL",
            "reason" => "varchar(255) NOT NULL",
            "visit_date" => "date NOT NULL",
            "comment" => "text",
            "first_name" => "varchar(255) NOT NULL",
            "last_name" => "varchar(255) NOT NULL",
            "mobile_number" => "varchar(255) NOT NULL",
            "email" => "varchar(255) NOT NULL",
            "street_address" => "varchar(255) NOT NULL",
            "suburb" => "varchar(255) NOT NULL",
            "state" => "varchar(3) NOT NULL",
            "postcode" => "varchar(32) NOT NULL",
            "contact_method" => "varchar(255) NOT NULL"
        ];
        $unique_fields = [
        ];
        $table = 'enquiries';
        parent::__construct($table, $schema, $unique_fields);
    }
}
?>

