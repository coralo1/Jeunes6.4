<?php

class updateRef
{
	private $mail;
	private $firstname;
	private $lastname;
	private $user;
	private $type;
	private $engagement;
	private $length;
	private $savoirs;

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
		$this->user = htmlspecialchars(trim($data["user"]));
		$this->type = htmlspecialchars(trim($data["type"]));
		$this->engagement = htmlspecialchars(trim($data["engagement"]));
		$this->length = htmlspecialchars(trim($data["length"]));
		$this->savoirs = $data["savoirs"];
		/* load pre-existing referents */
		$this->stored_refs = json_decode(file_get_contents($this->storage), true);




		/* assign a random connection ID to the referent */
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
		return $password;
	}


	/* check if user has already made a request for this referent */
	private function resquestExists()
	{
		foreach ($this->stored_refs as $referent) {
			if ($this->mail == $referent["email"] && $this->user == $referent["user"]) {
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
}





class updateUser
{

	private $email;
	private $lastname;
	private $firstname;
	private $birthdate;
	private $network;
	private $length;
	private $autonomie;
	private $analyse;
	private $ecoute;
	private $organise;
	private $passionne;
	private $fiable;
	private $patient;
	private $reflechi;
	private $optimiste;
	private $responsable;
	private $sociable;
	private $stored_users;

	private $storage = "../../data/jeune.json";
	private $encoded_data;
	private $users;

	/* constructor */
	public function __construct($email, $lastname, $firstname, $birthdate, $network, $length, $autonomie, $analyse, $ecoute, $organise, $passionne, $fiable, $patient, $reflechi, $optimiste, $responsable, $sociable)
	{
		$this->email = $email;
		$this->lastname = $lastname;
		$this->firstname = $firstname;
		$this->birthdate = $birthdate;
		$this->network = $network;
		$this->length = $length;
		$this->autonomie = $autonomie;
		$this->analyse = $analyse;
		$this->ecoute = $ecoute;
		$this->organise = $organise;
		$this->passionne = $passionne;
		$this->fiable = $fiable;
		$this->patient = $patient;
		$this->reflechi = $reflechi;
		$this->optimiste = $optimiste;
		$this->responsable = $responsable;
		$this->sociable = $sociable;
		$this->stored_users = json_decode(file_get_contents($this->storage), true);
		$this->update();
	}

	/* login function */
	private function update()
	{
		$this->users = json_decode(file_get_contents($this->storage), true);
		foreach ($this->users as $user) {
			if ($user["email"] == $_POST["email"]) {
				$user["lastname"] = $_POST['lastname'];
				$user["firstname"] = $_POST['firstname'];
				$user["birthdate"] = $_POST['birthdate'];
				$user["network"] = $_POST['network'];
				$user["length"] = $_POST['length'];
				$user["autonomie"] = $_POST['autonomie'];
				$user["analyse"] = $_POST['analyse'];
				$user["ecoute"] = $_POST['ecoute'];
				$user["organise"] = $_POST['organise'];
				$user["passionne"] = $_POST['passionne'];
				$user["fiable"] = $_POST['fiable'];
				$user["patient"] = $_POST['patient'];
				$user["reflechi"] = $_POST['reflechi'];
				$user["responsable"] = $_POST['responsable'];
				$user["sociable"] = $_POST['sociable'];
				$user["optimiste"] = $_POST['optimiste'];
			}
		}
		$this->encoded_data = json_encode($this->users, JSON_PRETTY_PRINT);
		if (file_put_contents($this->storage, $this->encoded_data)) {
			$success = "profil mis à jour";
			return $success;
		} else {
			return $error = "Une erreur est survenue, veuillez rééssayer";
		}
	}
}

if (isset($_POST['submit'])) {

	/*
		$update_user = array(
				"lastname" => $_POST['lastname'],
				"firstname" => $_POST['firstname'],
				"birthdate" => $_POST['birthdate'],
				"network" => $_POST['network'],
				"length" => $_POST['length'],
				"autonomie" => $_POST['autonomie'],
				"analyse" => $_POST['analyse'],
				"ecoute" => $_POST['ecoute'],
				"organise" => $_POST['organise'],
				"passionne" => $_POST['passionne'],
				"fiable" => $_POST['fiable'],
				"patient" => $_POST['patient'],
				"reflechi" => $_POST['reflechi'],
				"responsable" => $_POST['responsable'],
				"sociable" => $_POST['sociable'],
				"optimiste" => $_POST['optimiste'],
		);*/
}
