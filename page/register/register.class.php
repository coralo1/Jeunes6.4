<?php
/*session_start();*/
class Register
{
	private $mail;
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


	public function __construct($mail, $password, $birthdate, $firstname, $lastname)
	{
		/* cleans email and password + loads data*/
		$this->mail = htmlspecialchars(trim($mail));
		$this->raw_password = htmlspecialchars(trim($password));
		$this->birthdate = $birthdate;
		$this->firstname = htmlspecialchars(trim($firstname));
		$this->lastname = htmlspecialchars(trim($lastname));
		/* encrypts password */
		$this->encrypted_password = password_hash($password, PASSWORD_DEFAULT);
		/* list of existing users */
		$this->stored_users = json_decode(file_get_contents($this->storage), true);
		/* creates a new user */
		$this->new_user = [
			"usertype" => "J",
			"mail" => $this->mail,
			"password" => $this->encrypted_password,
			"birthdate" => $this->birthdate,
			"firstname" => $this->firstname,
			"lastname" => $this->lastname
		];
		if ($this->checkFieldValues()) { /* make sure nothing was empty and add the user */
			$this->insertUser($mail);
		}
	}



	/* checks if any field was not left empty when submitting */
	private function checkFieldValues()
	{
		if (empty($this->mail) || empty($this->raw_password) || empty($this->birthdate) || empty($this->firstname) || empty($this->lastname)) {
			$this->error = "Tous les champs sont obligatoires.";
			return false;
		} else {
			return true;
		}
	}

	/* checks if the email already exists */
	private function mailExists()
	{
		foreach ($this->stored_users as $user) { /* parse through existing users */
			if ($this->mail == $user['mail']) {
				$this->error = "Cet email est déjà utilisé.";
				return true;
			}
		}
	}

	/* adds user to the data.json file */
	private function insertUser($mail)
	{
		if ($this->mailExists() == FALSE) { /* if that user isn't already registered */
			array_push($this->stored_users, $this->new_user); /* add him to the list of users */
			if (file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))) { /*put the list into the file */
				$this->success = 1;
				return $this->success;

			} else {
				return $this->error = "Une erreur est survenue, veuillez rééssayer";
			}
		}
	}
}