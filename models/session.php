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

function GUIDV4()
{
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


class Session extends Model
{
    function __construct()
    {
        $schema = [
            "token" => "varchar(255) NOT NULL",
        ];
        $unique_fields = [];
        $table = 'sessions';
        parent::__construct($table, $schema, $unique_fields);
    }

    public function createSession()
    {
        $session_token = GUIDV4(); // create token
        $this->insertOne([
            "token" => $session_token
        ]); // insert new session
        return $this->getSession($session_token);
    }

    public function getSession($session_token)
    {
        $session = $this->findByField('token', $session_token); // find session
        if (count($session) > 0) {
            return $session[0];
        }
        return;
    }
}
