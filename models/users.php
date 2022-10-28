<?php 

function GUIDV4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}


class User extends Model  {
    function __construct()
    {       
        $schema = [
            "name" => "varchar(255) NOT NULL",
            "username" => "varchar(255) NOT NULL UNIQUE",
            "password" => "varchar(255) NOT NULL",
            // "email" => "varchar(255) NOT NULL",
            // "mobile_number" => "varchar(255) NOT NULL",
            "session_token" => "varchar(255)"
        ];
        $unique_fields = [
           "username"
        ];
        $table = 'users';
        parent::__construct($table, $schema, $unique_fields);
    }

    public function getCurrentSession($session_token){
        $user = $this->findByField('session_token', $session_token);
        if(!$user) return;
        return $user[0];
    }

    public function createUser($name, $username, $password){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT );
        $id = $this->insertOne([
            'name' => $name,
            'username' => $username,
            'password' => $hashed_password
        ]);
        return $this->findById($id)[0];
    }

    public function updateUser($name, $username, $password){
        $user = $this->findByField('username', $username);
        if(!$user) return false;
        $user = $user[0];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT );
        $this->updateOne($user['id'], [
            'name' => $name,
            'username' => $username,
            'password' => $hashed_password
        ]);
        return true;
    }

    public function authenticateUser($username, $password){
        $user = $this->findByField('username', $username);
        if(!$user) return false;
        $user = $user[0];
        $hashed_password = $user['password'];
        $session_token = GUIDV4();
        if ( password_verify ( $password , $hashed_password )) {
           if ( password_needs_rehash($hashed_password , PASSWORD_DEFAULT)) {
              $rehashed_password = password_hash($password, PASSWORD_DEFAULT );
              $this->updateOne($user['id'], [
                'password' => $rehashed_password,
                'session_token' => $session_token
              ]);
            }
            else {
                $this->updateOne($user['id'], [
                    'session_token' => $session_token
                  ]);  
            }
            return $session_token;
        }
        else {
            return false;
        }
    }

    public function logoutSession($session_token){
        $user = $this->findByField('session_token', $session_token);
        if(!$user) return;
        $user = $user[0];
        $this->updateOne($user['id'], [
            'session_token' => ''
        ]);
    }
}
// $productSchema = new Product();
// foreach($pizzas as $pizza){
//     $productSchema->insertOne($pizza);
// }
// $results = $productSchema->getByField('taxonomy','pizza.personalpan');

?>

