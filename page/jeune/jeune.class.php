<?php
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