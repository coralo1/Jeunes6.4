<?php

class updateRef
{
	private $mail;
	private $firstname;
	private $lastname;
	private $phone;
	private $birthdate;
	private $user;
	public $error;
	public $success;
	private $storage = "../../data/referent.json";
	private $stored_refs;

	public function __construct($data)
	{
		/* assign default values */
		$this->mail = $data["mail"];
		$this->firstname = htmlspecialchars(trim($data["firstname"]));
		$this->lastname = htmlspecialchars(trim($data["lastname"]));
		$this->phone = $data["phone"];
		$this->birthdate = $data["birthdate"];
		$this->user = $data["user"];
		/* load pre-existing referents */
		$this->stored_refs = json_decode(file_get_contents($this->storage), true);

		if ($this->checkFieldValues()) {
			$this->updateRef();
		}
	}


	/* verifies no field was left empty */
	private function checkFieldValues()
	{
		if (empty($this->firstname) || empty($this->lastname) || empty($this->phone) || empty($this->birthdate)) {
			$this->error = "Tous les champs sont obligatoires.";
			return false;
		} elseif (empty($this->user)) {
			$this->error = "erreur innatendue (pas d'utilisateur spécifié par la demande)";
			return false;
		} else {
			return true;
		}
	}

	/* searches for correct referent and updates information */
	private function updateRef()
	{

		$i = -1;
		foreach ($this->stored_refs as $referent) {
			$i++;
			if ($this->mail == $referent["mail"] && $this->user == $referent["user"]) {
				$referent["firstname"] = $this->firstname;
				$_SESSION["firstname"] = $this->firstname;
				$referent["lastname"] = $this->lastname;
				$_SESSION["lastname"] = $this->lastname;
				$referent["phone"] = $this->phone;
				$_SESSION["phone"] = $this->phone;
				$referent["birthdate"] = $this->birthdate;
				$_SESSION["birthdate"] = $this->birthdate;
				/* create replacement array with the new data at position $i */
				$replacement = array($i => $referent);
				/* replaces the array */
				$this->stored_refs = array_replace($this->stored_refs, $replacement);
			}
		}
		/* put new array in the file */
		if (file_put_contents($this->storage, json_encode($this->stored_refs, JSON_PRETTY_PRINT))) {
			return $this->success = "information mises à jour";
		} else {
			return $this->error = "une erreur est survenue";
		}
	}
}

class confirmRef
{
	private $mail;
	private $lastname;
	private $firstname;
	private $birthdate;
	private $phone;
	private $type;
	private $engagement;
	private $length;
	private $user;
	private $comment;

public function __construct($data){
	$this->mail=$data["mail"];
}


}
