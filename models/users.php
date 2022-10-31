<?php 

function random_bytes($length = 6) // compatibility - introduced in PHP 7
    {
        $characters = '0123456789';
        $characters_length = strlen($characters);
        $output = '';
        for ($i = 0; $i < $length; $i++)
            $output .= $characters[rand(0, $characters_length - 1)];

        return $output;
    }
    
function GUIDV4() {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = random_bytes(16);
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
            "session_token" => "varchar(255)"
        ];
        $unique_fields = [
           "username"
        ];
        $table = 'users';
        parent::__construct($table, $schema, $unique_fields);
    }

    public function getCurrentSession($session_token){ // get user from session token
        $user = $this->findByField('session_token', $session_token);
        if(!$user) return;
        return $user[0];
    }

    public function createUser($name, $username, $password){ // create management user
        $hashed_password = password_hash($password, PASSWORD_DEFAULT ); // hash password
        $id = $this->insertOne([
            'name' => $name,
            'username' => $username,
            'password' => $hashed_password
        ]); // insert to database
        return $this->findById($id)[0]; // return user
    }

    public function updateUser($name, $username, $password){ // update management user
        $user = $this->findByField('username', $username); // find user with matching username
        if(!$user) return false;
        $user = $user[0];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT ); // hash password
        $this->updateOne($user['id'], [ 
            'name' => $name,
            'username' => $username,
            'password' => $hashed_password
        ]); // save to database
        return true;
    }

    public function authenticateUser($username, $password){ // authenticate management user
        $user = $this->findByField('username', $username); // find user with matching username
        if(!$user) return false;
        $user = $user[0];
        $hashed_password = $user['password'];
        $session_token = GUIDV4(); // create session token
        if ( password_verify ( $password , $hashed_password )) { // verify password against hash
           if ( password_needs_rehash($hashed_password , PASSWORD_DEFAULT)) { // future-proofing - checks if PHP updates hashing method
              $rehashed_password = password_hash($password, PASSWORD_DEFAULT ); // rehash password
              $this->updateOne($user['id'], [ 
                'password' => $rehashed_password,
                'session_token' => $session_token
              ]); // save to database
            }
            else {
                $this->updateOne($user['id'], [
                    'session_token' => $session_token
                  ]);  // save to database
            }
            return $session_token; // return token
        }
        else {
            return false;
        }
    }

    public function logoutSession($session_token){ // logout current user
        $user = $this->findByField('session_token', $session_token);
        if(!$user) return;
        $user = $user[0];
        $this->updateOne($user['id'], [
            'session_token' => ''
        ]);
    }
}
