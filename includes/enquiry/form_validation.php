<?php 
class ValidateEnquiry {
    private $data, $post_data, $enquiry_schema;
    public $validated, $insert_data;
    function __construct($post_data)
    {   
        $this->enquiry_schema = new Enquiry();
        $this->post_data = $post_data;
        $this->data = [
            "store_related" => [
                "validated" => false,
                "value" => null
            ],
            "nature_of_feedback" => [
                "validated" => false,
                "value" => null
            ],
            "reason" => [
                "validated" => false,
                "value" => null
            ],
            "visit_date" => [
                "validated" => false,
                "value" => null
            ],
            "comment" => [
                "validated" => false,
                "value" => null
            ],
            "first_name" => [
                "validated" => false,
                "value" => null
            ],
            "last_name" => [
                "validated" => false,
                "value" => null
            ],
            "mobile_number" => [
                "validated" => false,
                "value" => null
            ],
            "email" => [
                "validated" => false,
                "value" => null
            ],
            "street_address" => [
                "validated" => false,
                "value" => null
            ],
            "suburb" => [
                "validated" => false,
                "value" => null
            ],
            "state" => [
                "validated" => false,
                "value" => null
            ],
            "postcode" => [
                "validated" => false,
                "value" => null
            ],
            "contact_method" => [
                "validated" => false,
                "value" => null
            ]
        ];
    }


    private function validateStringRegex($field, $pattern) {
        if(!isset($this->post_data[$field])) return;
        $name = $this->post_data[$field];
        if (!preg_match($pattern, $name)) return;
        $this->data[$field]['validated'] = true;
        $this->data[$field]['value'] = $name;
    }

    private function validateAgainstArray($field, $array){
        if(!isset($this->post_data[$field])) return;
        $field_value = $this->post_data[$field];
        if(!in_array($field_value, $array )) return;
        $this->data[$field]['validated'] = true;
        $this->data[$field]['value'] = $field_value;
    }

    private function validateStoreRelated() {
        $field = 'store_related';
        $value = $this->post_data[$field] === 'true' ? true : false;
        $this->data[$field]['validated'] = true;
        $this->data[$field]['value'] = $value;
        return;
    }
    
    private function validateNatureOfFeedback() {
        $field = 'nature_of_feedback';
        $valid_nature = ['complaint','compliment','employment'];
        $this->validateAgainstArray($field, $valid_nature);
    }
    
    private function validateReason() {
        $field = 'reason';
        $this->data[$field]['validated'] = true;
        $this->data[$field]['value'] = $this->post_data[$field];
    }
    
    private function validateVisitDate() {
        $field = 'visit_date';
        if(!isset($this->post_data[$field])) return;
        $visit_date = $this->post_data[$field];
        if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$visit_date)) return;
        $this->data[$field]['validated'] = true;
        $this->data[$field]['value'] = $visit_date;
    }

    private function validateComment() {
        $field = 'comment';
        $this->data[$field]['validated'] = true;
        $this->data[$field]['value'] = $this->post_data[$field];
    }
    
    private function validateFirstName() {
        $pattern = "/^([a-zA-Z' ]+)$/";
        $field = "first_name";
        $this->validateStringRegex($field, $pattern);
    }

    private function validateLastName() {
        $pattern = "/^([a-zA-Z' ]+)$/";
        $field = "last_name";
        $this->validateStringRegex($field, $pattern);
    }
    
    private function validateMobileNumber() {
        $pattern = "/^(?:\+?(61))? ?(?:\((?=.*\)))?(0?[2-57-8])\)? ?(\d\d(?:[- ](?=\d{3})|(?!\d\d[- ]?\d[- ]))\d\d[- ]?\d[- ]?\d{3})$/";
        $field = 'mobile_number';
        $this->validateStringRegex($field, $pattern); 
    }
    
    private function validateEmail() {
        $pattern = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
        $field = "email";
        $this->validateStringRegex($field, $pattern);
    }
    
    private function validateStreetAddress() {
        $pattern = "/^([a-zA-Z' ]+)$/";
        $field = "street_address";
        $this->validateStringRegex($field, $pattern);
    }
    
    private function validateSuburb() {
        $pattern = "/^([a-zA-Z' ]+)$/";
        $field = "suburb";
        $this->validateStringRegex($field, $pattern);
    }
    
    private function validateState() {
        $field = 'state';
        $valid_states = ['ACT', 'SA', 'NSW', 'VIC', 'NT', 'QLD', 'TAS', 'WA'];
        $this->validateAgainstArray($field, $valid_states);
    }
    
    private function validateContactMethod() {
        $field = 'contact_method';
        $valid_states = ['email', 'post', 'phone'];
        $this->validateAgainstArray($field, $valid_states);
    }

    private function validatePostcode() {
        $pattern = "/^\d{4}$/";
        $field = "postcode";
        $this->validateStringRegex($field, $pattern);
    }

    public function validate() {
        $this->validateStoreRelated();
        $this->validateNatureOfFeedback();
        $this->validateReason();
        $this->validateVisitDate();
        $this->validateComment();
        $this->validateFirstName();
        $this->validateLastName();
        $this->validateMobileNumber();
        $this->validateEmail();
        $this->validateStreetAddress();
        $this->validateSuburb();
        $this->validateState();
        $this->validateContactMethod();
        $this->validatePostcode();
        // echo('<code class="mx-auto container">'.json_encode($this->data, JSON_PRETTY_PRINT).'</code>');
        $this->validated = [];
        $this->insert_data = [];
        foreach($this->data as $key=>$value){
            $this->validated[$key] = $value['validated'];
            $this->insert_data[$key] = $value['value'];
        }
        // echo json_encode($this->validated);
        // echo json_encode($this->insert_data);

        foreach($this->validated as $key=>$value){
            if(!$value) return false;
        }
        return true;
    }

    public function saveEnquiry() {
        return $this->enquiry_schema->insertOne($this->insert_data);
    }
}
    
$submitted = false;
$enquiry_validated = false;
$enquiry_error = [
    "store_related" => true,
    "nature_of_feedback" => true,
    "reason" => true,
    "visit_date" => true,
    "comment" => true,
    "first_name" => true,
    "last_name" => true,
    "mobile_number" => true,
    "email" => true,
    "street_address" => true,
    "suburb" => true,
    "state" => true,
    "postcode" => true,
    "contact_method" => true
];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $submitted = true;
    $validation = new ValidateEnquiry($_POST);
    $enquiry_validated = $validation->validate();
    if($enquiry_validated) $validation->saveEnquiry();
    $enquiry_error = $validation->validated;
}
?>