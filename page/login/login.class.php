<?php
/*session_start();*/
class LoginUser
{
    private $email;
    private $password;
    public $error;
    public $success;
    private $storage = "../../data/jeune.json";
    private $stored_users;


    /* constructor */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->stored_users = json_decode(file_get_contents($this->storage), true);
        $this->login($email);
    }

    /* login function */
    private function login($email)
    {
        foreach ($this->stored_users as $user) { /* repeat for every user in data.json */
            if ($user['email'] == $this->email) { /* if the email matches */
                if (password_verify($this->password, $user['password'])) { /* if the password matches */
                    $this->success = array(1, $user['email'], $user['type'], $user['birthdate'], $user['firstname'], $user['lastname'], $user['network'], $user['engagement'], $user['length'], $user['autonomie'], $user['analyse'], $user['ecoute'], $user['organise'], $user['passionne'], $user['fiable'], $user['patient'], $user['reflechi'], $user['responsable'], $user['sociable'], $user['optimiste']);
                    return $this->success;
                }
            }
        }
        return $this->error = "Mauvais email ou mot de passe";
    }
}