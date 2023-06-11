<?php

class updateRef
{
	private $mail;
	private $firstname;
	private $lastname;
	private $phone;
	private $birthdate;
	private $user;
	public $updateerror;
	public $updatesuccess;
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
			$this->updateerror = "Tous les champs sont obligatoires.";
			return false;
		} elseif (empty($this->user)) {
			$this->updateerror = "erreur innatendue (pas d'utilisateur spécifié par la demande)";
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
			return $this->updatesuccess = "information mises à jour";
		} else {
			return $this->updateerror = "une erreur est survenue";
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
	private $presentation;
	private $length;
	private $user;
	private $comment;
	private $savoirs;
	public $error;
	public $success;
	private $storage = "../../data/references.json";
	private $stored_refs;
	private $new_ref;

	public function __construct($data)
	{
		$this->mail = $data["mail"];
		$this->lastname = $data["lastname"];
		$this->firstname = $data["firstname"];
		$this->birthdate = $data["birthdate"];
		$this->phone = $data["phone"];
		$this->presentation = $data["presentation"];
		$this->length = $data["length"];
		$this->user = $data["user"];
		$this->comment = $data["comment"];
		$this->savoirs = $data["confirm_savoirs"];
		$this->stored_refs = json_decode(file_get_contents($this->storage), true);

		/* how the reference will be stored in the file */
		$this->new_ref = [
			"usertype" => "reference",
			"mail" => $this->mail,
			"firstname" => $this->firstname,
			"lastname" => $this->lastname,
			"user" => $this->user,
			"phone" => $this->phone,
			"birthdate" => $this->birthdate,
			"presentation" => $this->presentation,
			"length" => $this->length,
			"comment" => $this->comment,
			"savoirs" => $this->savoirs
		];

		$this->createRef();
	}

	/* make sure that the referent hasn't already confirmed reference */
	private function referenceExists()
	{
		foreach ($this->stored_refs as $reference) { /* parse references */
			if ($this->mail == $reference["mail"] && $this->user == $reference["user"]) { /* if there's already a reference for this referent for this user */
				$this->error = "Vous avez déjà validé une référence pour cet utilisateur."; /* give an error */
				return true;
			}
		}
	}
	private function createRef()
	{
		if ($this->referenceExists() == FALSE) {
			array_push($this->stored_refs, $this->new_ref);
			if (file_put_contents($this->storage, json_encode($this->stored_refs, JSON_PRETTY_PRINT))) {
				$this->success = "référence validée";
				return $this->success;
			} else {
				return $this->error = "Une erreur est survenue, veuillez rééssayer";
			}
		}
	}
}
