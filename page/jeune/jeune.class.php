<?php

class createRef
{
	private $mail;
	private $firstname;
	private $lastname;
	private $user_firstname;
	private $user_lastname;
	private $user;
	private $type;
	private $engagement;
	private $length;
	private $savoirs;
	private $new_ref;
	private $password;
	private $encrypted_password;
	public $error;
	public $success;
	private $storage = "../../data/referent.json";
	private $stored_refs;

	public function __construct($data)
	{
		/* assign default values */
		$this->mail = htmlspecialchars(trim($data["mail"]));
		$this->firstname = htmlspecialchars(trim($data["firstname"]));
		$this->lastname = htmlspecialchars(trim($data["lastname"]));
		$this->user_firstname = $data["user_firstname"];
		$this->user_lastname = $data["user_lastname"];
		$this->user = htmlspecialchars(trim($data["user"]));
		$this->type = htmlspecialchars(trim($data["type"]));
		$this->engagement = htmlspecialchars(trim($data["engagement"]));
		$this->length = htmlspecialchars(trim($data["length"]));
		$this->savoirs = $data["savoirs"];
		/* load pre-existing referents */
		$this->stored_refs = json_decode(file_get_contents($this->storage), true);
		/* creates a password for the referent */
		$this->password = $this->createLogin();
		$this->encrypted_password = password_hash($this->password, PASSWORD_DEFAULT);

		/* create a new referent */
		$this->new_ref = [
			"usertype" => "R",
			"mail" => $this->mail,
			"password" => $this->encrypted_password,
			"firstname" => $this->firstname,
			"lastname" => $this->lastname,
			"user_firstname" => $this->user_firstname,
			"user_lastname" => $this->user_lastname,
			"user" => $this->user,
			"phone" => "",
			"birthdate" => "",
			"type" => $this->type,
			"engagement" => $this->engagement,
			"length" => $this->length,
			"autonomie" => $this->savoirs["autonomie"],
			"analyse" => $this->savoirs["analyse"],
			"ecoute" => $this->savoirs["ecoute"],
			"organise" => $this->savoirs["organise"],
			"passionne" => $this->savoirs["passionne"],
			"fiable" => $this->savoirs["fiable"],
			"patient" => $this->savoirs["patient"],
			"reflechi" => $this->savoirs["reflechi"],
			"responsable" => $this->savoirs["responsable"],
			"sociable" => $this->savoirs["sociable"],
			"optimiste" => $this->savoirs["optimiste"]
		];

		/* adds ref to json file */
		if ($this->checkFieldValues()) {
			$this->insertRef();
			$this->send_mail();
		}
	}

	private function createLogin()
	{
		/* create a table of characters */
		$characters = "0123456789";
		$characters .= $this->mail;
		$characters .= $this->user;

		$password = "";

		/* create a 8 letters password based on the table of characters */
		$n = 8;
		for ($i = 0; $i < $n; $i++) {
			$index = rand(0, strlen($characters) - 1);
			$password .= $characters[$index];
		}
		/*make sure it's not a password that already exists */
		foreach ($this->stored_refs as $referent) {
			if (password_verify($password, $referent['password'])) {
				$password = $this->createlogin();
			}
		}
		return $password;
	}


	/* check if user has already made a request for this referent */
	private function resquestExists()
	{
		foreach ($this->stored_refs as $referent) {
			if ($this->mail == $referent["mail"] && $this->user == $referent["user"]) {
				$this->error = "Vous avez déjà envoyé une demande à ce référent.";
				return true;
			}
		}
	}

	/* verifies no field was left empty */
	private function checkFieldValues()
	{
		if (empty($this->mail) || empty($this->firstname) || empty($this->lastname) || empty($this->type) || empty($this->engagement) || empty($this->length)) {
			$this->error = "Tous les champs sont obligatoires.";
			return false;
		} elseif (empty($this->user) || empty($this->savoirs)) {
			$this->error = "erreur innatendue (utilisateur non connecté ou erreur de savoirs-êtres";
			return false;
		} else {
			return true;
		}
	}

	/* writes the mail in a file under data/mail/ for now */
	private function send_mail()
	{
		$filename = "../../data/mail/mail" . $this->mail . $this->user . ".html";
		$file = fopen($filename, "w");
		$text = '<html><body>';
		$text .= 'Bonjour, <br><br>';
		$text .= $this->user_firstname . " " . $this->user_lastname . ' vous a envoyé une demande de référencement sur la plateforme jeunes 6.4.<br>';
		$text .= '<a href="http://localhost:8080/page/referent/referent.php">Cliquez ici pour y accéder</a>, et connectez vous à l' . "'" . "aide du mot de passe suivant : <br>";
		$text .= $this->password;
		$text .= '</body></html>';
		fwrite($file, $text);
	}

	/* inserts in the file and sends the mail */
	private function insertRef()
	{
		if ($this->resquestExists() == FALSE) {
			array_push($this->stored_refs, $this->new_ref);
			if (file_put_contents($this->storage, json_encode($this->stored_refs, JSON_PRETTY_PRINT))) {
				$this->send_mail();
				return $this->success = "demande effectuée avec succès";
			} else {
				return $this->error = "une erreur est survenue, veuillez rééssayer";
			}
		}
	}

}
