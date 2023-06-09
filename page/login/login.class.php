<?php
/*session_start();*/
class LoginJeune
{
	private $mail;
	private $password;
	public $error;
	public $success;
	private $storage = "../../data/jeune.json";
	private $stored_users;


	/* constructor */
	public function __construct($mail, $password)
	{
		$this->mail = $mail;
		$this->password = $password;
		$this->stored_users = json_decode(file_get_contents($this->storage), true);
		$this->login();
	}

	/* login function */
	private function login()
	{
		foreach ($this->stored_users as $user) { /* repeat for every user in data.json */
			if ($user['mail'] == $this->mail) { /* if the email matches */
				if (password_verify($this->password, $user['password'])) { /* if the password matches, return success and user info for session */
					$this->success = array(1, $user);
					return $this->success;
				}
			}
		}
		return $this->error = "Mauvais email ou mot de passe";
	}
}


class LoginRef
{
	private $mail;
	private $password;
	public $error;
	public $success;
	private $storage = "../../data/referent.json";
	private $stored_users;

	/* constructor */
	public function __construct($password)
	{
		$this->mail;
		$this->password = $password;
		$this->stored_users = json_decode(file_get_contents($this->storage), true);
		$this->login();
	}

	/* login function */
	private function login()
	{
		foreach ($this->stored_users as $user) { /* same thing as before but without checking for email as there is none */
			if (password_verify($this->password, $user['password'])) {
				$this->success = array(1, $user);
				return $this->success;
			}
		}
		return $this->error = "Mauvais identifiant de connexion";
	}
}

class LoginCons
{
	private $mail;
	private $password;
	public $error;
	public $success;
	private $storage = "../../data/consultant.json";
	private $stored_users;

	/* constructor */
	public function __construct($password)
	{
		$this->mail;
		$this->password = $password;
		$this->stored_users = json_decode(file_get_contents($this->storage), true);
		$this->login();
	}

	/* login function */
	private function login()
	{
		foreach ($this->stored_users as $user) { /* same thing as before but without checking for email as there is none */
			if (password_verify($this->password, $user['password'])) {
				$this->success = array(1, $user);
				return $this->success;
			}
		}
		return $this->error = "Mauvais identifiant de connexion";
	}
}