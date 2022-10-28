<?php 
require('db.php');
require('models/model.php');
require('models/order.php');
require('models/cart.php');

class ValidateOrder {
    private  $post_data, $order_schema, $date_now;
    public $data, $validated, $insert_data;

    function __construct($post_data)
    {   
        $this->date_now = new DateTime('now');
        $this->order_schema = new Order();
        $this->post_data = $post_data;
        echo(json_encode($_POST));
        $this->cart_id = $post_data['cart_id'];
        $this->data = [
            "notes" => [
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
            "card_number" => [
                "validated" => false,
                "value" => null
            ],
            "card_type" => [
                "validated" => false,
                "value" => null
            ],
            "card_cvv" => [
                "validated" => false,
                "value" => null
            ],
            "card_expiry_month" => [
                "validated" => false,
                "value" => null
            ],
            "card_expiry_year" => [
                "validated" => false,
                "value" => null
            ],
            "card_holder" => [
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

    private function validateNotes() {
        $field = 'notes';
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
    
    /* 
    
        State Codes
    New South Wales	1000–2599, 2620–2899, 2921–2999
    Victoria	3000–3999, 8000–8999
    Queensland	4000–4999, 9000–9999
    South Australia	5000–5999
    Western Australia	6000–6999
    Tasmania	7000–7999
    Australian Capital Territory	0200–0299, 2600–2619, 2900–2920
    Northern Territory	0800–0999 
    
    */

    private function validateState() {
        $field = 'state';
        $valid_states = ['ACT', 'SA', 'NSW', 'VIC', 'NT', 'QLD', 'TAS', 'WA'];
        $this->validateAgainstArray($field, $valid_states);
    }

    private function validatePostcode() {
        $pattern = "/^\d{4}$/";
        $field = "postcode";
        $this->validateStringRegex($field, $pattern);
    }

    private function validateCardholder() {
        $pattern = "/^([a-zA-Z' ]+)$/";
        $field = "card_holder";
        $this->validateStringRegex($field, $pattern);
    }
    
    private function validateCardNumber() {

        $field_number = 'card_number';
        $field_type = 'card_type';
        if(!isset($this->post_data[$field_number])) return;

        $card_number = $this->post_data[$field_number];
        $card_number = str_replace(' ', '', $card_number);
        $cart_types = array(
            "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
            "mastercard" => "/^5[1-5][0-9]{14}$/",
            "amex"       => "/^3[47][0-9]{13}$/",
            "discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
        );
    
        if (preg_match($cart_types['visa'], $card_number))
        {
            $type = "visa";
        }
        else if (preg_match($cart_types['mastercard'], $card_number))
        {
            $type = "mastercard";
        }
        else if (preg_match($cart_types['amex'], $card_number))
        {
            $type = "amex";
        }
        else if (preg_match($cart_types['discover'], $card_number))
        {
            $type = "discover";
        }
        else
        {
            return;
        } 
        $this->data[$field_number]['validated'] = true;
        $this->data[$field_number]['value'] = $card_number;
        $this->data[$field_type]['validated'] = true;
        $this->data[$field_type]['value'] = $type;
    }

    private function validateCVV() {
        $pattern = "/^\d{3}$/";
        $field = "card_cvv";
        $this->validateStringRegex($field, $pattern);
    }

    private function validateExpiry() {
        $field_month = "card_expiry_month";
        $field_year = "card_expiry_year";
        if(!isset($this->post_data[$field_month]) or !isset($this->post_data[$field_month])) return;
        $current_year = $this->date_now->format('Y');
        $current_month = $this->date_now->format('m');
        $post_month = intval($this->post_data[$field_month]);
        $post_year = intval($this->post_data[$field_year]);
        // check if current month > post month, and current year = post year --> expired
        // check if current year > post year --> expired
        if(($current_month > $post_month && $current_year == $post_year) || ($current_year > $post_year)) return;
        $this->data[$field_month]['validated'] = true;
        $this->data[$field_month]['value'] = $post_month;
        $this->data[$field_year]['validated'] = true;
        $this->data[$field_year]['value'] = $post_year;

    }

    private function getTotalCartPrice(){
        $cart_item_schema = new CartItem();
        $cart_items = $cart_item_schema->findItems($this->cart_id);
        $total = 0;
        foreach($cart_items as $item){
            $total += $item['price'];
        }
        return $total;
    }

    public function validate() {
        $this->validateNotes();
        $this->validateFirstName();
        $this->validateLastName();
        $this->validateMobileNumber();
        $this->validateEmail();
        $this->validateStreetAddress();
        $this->validateSuburb();
        $this->validateState();
        $this->validatePostcode();
        $this->validateExpiry();
        $this->validateCVV();
        $this->validateCardNumber();
        $this->validateCardholder();
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

        // "order_timestamp" => "datetime NOT NULL",
        // "order_status" => "varchar(255) NOT NULL",
        // "order_cost" => "float NOT NULL",
        // "cart_id" => "int NOT NULL"

        $this->insert_data['order_timestamp'] = date('Y-m-d H:i:s');
        $this->insert_data['cart_id'] = $this->cart_id;
        $this->insert_data['order_cost'] = $this->getTotalCartPrice();
        $this->insert_data['order_status'] = 'pending';
        // echo json_encode($this->insert_data);

        return true;
    }
    
    public function saveOrder() {
        $cart_schema = new Cart();
        $cart_schema->checkoutCart($this->cart_id);
        return $this->order_schema->insertOne($this->insert_data);
    }
}
    
$enquiry_validated = false;
$enquiry_error = [];

if ($_SERVER['REQUEST_METHOD'] != 'POST' or !$_POST){
    header('location: index.php');
}
else {
    $validation = new ValidateOrder($_POST);
    $enquiry_validated = $validation->validate();
    if($enquiry_validated) {
        $order_id = $validation->saveOrder();
        
        header('location: receipt.php?order_id='.$order_id);
    }
    else {
        // echo json_encode($validation->data);
        header('location: fix_order.php?data='.base64_encode(json_encode($validation->data)));
    }
}


