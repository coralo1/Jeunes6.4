<?php
/*session_start();*/
class Register
{
    private $email;
    private $raw_password;
    private $encrypted_password;
    private $birthdate;
    private $firstname;
    private $lastname;
    public $error;
    public $success;
    public $return;
    private $storage = "../../data/jeune.json";
    private $stored_users; /* array of all users */
    private $new_user; /* array with the new user */


    public function __construct($email, $password, $birthdate, $firstname, $lastname)
    {
        /* cleans email and password */
        $this->email = htmlspecialchars(trim($email));
        $this->raw_password = htmlspecialchars(trim($password));
        $this->birthdate = $birthdate;
        $this->firstname = htmlspecialchars(trim($firstname));
        $this->lastname = htmlspecialchars(trim($lastname));
        /* encrypts password -> is it really secure ? */
        $this->encrypted_password = password_hash($password, PASSWORD_DEFAULT);
        $this->stored_users = json_decode(file_get_contents($this->storage), true);
        /* creates a new user */
        $this->new_user = [
            "type" => "J",
            "email" => $this->email,
            "password" => $this->encrypted_password,
            "birthdate" => $this->birthdate,
            "firstname" => $this->firstname,
            "lastname" => $this->lastname,
            "network" => "",
            "engagement" => "",
            "length" => "0",
            "autonomie" => "0",
            "analyse" => "0",
            "ecoute" => "0",
            "organise" => "0",
            "passionne" => "0",
            "fiable" => "0",
            "patient" => "0",
            "reflechi" => "0",
            "responsable" => "0",
            "sociable" => "0",
            "optimiste" => "0"
        ];
        if ($this->checkFieldValues()) { /* je sais pas si ça va ici */
            $this->insertUser($email);
        }
    }



    /* checks if either field was not left empty when submitting */
    private function checkFieldValues()
    {
        if (empty($this->email) || empty($this->raw_password) || empty($this->birthdate) || empty($this->firstname) || empty($this->lastname)) {
            $this->error = "Tous les champs sont obligatoires.";
            return false;
        } else {
            return true;
        }
    }

    /* checks if the email already exists */
    private function emailExists()
    {
        foreach ($this->stored_users as $user) {
            if ($this->email == $user['email']) {
                $this->error = "Cet email est déjà utilisé.";
                return true;
            }
        }
    }

    /* adds user to the data.json file */
    private function insertUser($email)
    {
        if ($this->emailExists() == FALSE) {
            array_push($this->stored_users, $this->new_user);
            if (file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))) {
                $this->success = array(1, $email);
                return $this->success;

            } else {
                return $this->error = "Une erreur est survenue, veuillez rééssayer";
            }
        }
    }
}