<?php

/*used in jeune.php when a user makes a reference request */
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
	private $new_ref;
	private $login;
	private $encrypted_login;
	public $status;
	private $storage = "../../data/referent.json";
	private $stored_refs;

	public function __construct($data)
	{
		/* assign values with given $data*/
		$this->mail = htmlspecialchars(trim($data["mail"]));
		$this->firstname = htmlspecialchars(trim($data["firstname"]));
		$this->lastname = htmlspecialchars(trim($data["lastname"]));
		$this->user_firstname = $data["user_firstname"];
		$this->user_lastname = $data["user_lastname"];
		$this->user = htmlspecialchars(trim($data["user"]));
		$this->type = htmlspecialchars(trim($data["type"]));
		$this->engagement = htmlspecialchars(trim($data["engagement"]));
		$this->length = htmlspecialchars(trim($data["length"]));
		/* load pre-existing referents */
		$this->stored_refs = json_decode(file_get_contents($this->storage), true);
		/* creates a login for the referent */
		$this->login = $this->createLogin();
		$this->encrypted_login = password_hash($this->login, PASSWORD_DEFAULT);

		/* create a new referent element */
		$this->new_ref = [
			"usertype" => "R",
			"mail" => $this->mail,
			"login" => $this->encrypted_login,
			"firstname" => $this->firstname,
			"lastname" => $this->lastname,
			"user_firstname" => $this->user_firstname,
			"user_lastname" => $this->user_lastname,
			"user" => $this->user,
			"phone" => "",
			"birthdate" => "",
		];

		/* adds ref to json file */
		if ($this->checkFieldValues()) {
			$this->insertRef();
		}
	}

	/*creates a random login based on Jeune and Referent emails. This is probably not secure, and kinda pointless */
	private function createLogin()
	{
		/* create a table of characters */
		$characters = "0123456789";
		$characters .= $this->mail;
		$characters .= $this->user;

		$login = "";

		/* create a 8 letters login based on the table of characters */
		$n = 8;
		for ($i = 0; $i < $n; $i++) {
			$index = rand(0, strlen($characters) - 1);
			$login .= $characters[$index];
		}
		/*make sure it's not a login that already exists */
		foreach ($this->stored_refs as $referent) {
			if (password_verify($login, $referent['login'])) {
				$login = $this->createlogin();
			}
		}
		return $login;
	}


	/* check if user has already made a request for this referent */
	private function resquestExists()
	{
		foreach ($this->stored_refs as $referent) { /*parse through referents */
			if ($this->mail == $referent["mail"] && $this->user == $referent["user"]) { /* if referent and jeune matches */
				$this->status = "Vous avez déjà envoyé une demande à ce référent.";
				return true;
			}
		}
	}

	/* verifies no field was left empty */
	private function checkFieldValues()
	{
		if (empty($this->mail) || empty($this->firstname) || empty($this->lastname) || empty($this->type) || empty($this->engagement) || empty($this->length)) {
			$this->status = "Tous les champs sont obligatoires.";
			return false;
		} elseif (empty($this->user)) {
			$this->status = "erreur innatendue (utilisateur non connecté ou erreur de savoirs-êtres)";
			return false;
		} else {
			return true;
		}
	}

	/* writes the mail in a file under data/mail/ for now. This is written as html*/
	private function send_mail()
	{
		$filename = "../../data/mail/mail_ref/mail" . $this->mail . $this->user . ".html";
		$file = fopen($filename, "w");
		$text = '<html><body>';
		$text .= 'Bonjour, <br><br>';
		$text .= $this->user_firstname . " " . $this->user_lastname . ' vous a envoyé une demande de référencement sur la plateforme jeunes 6.4.<br>';
		$text .= '<a href="http://localhost:8080/page/referent/referent.php">Cliquez ici pour y accéder</a>, et connectez vous à l' . "'" . "aide du login suivant: <br>";
		$text .= $this->login;
		$text .= '</body></html>';
		fwrite($file, $text);
	}

	/* inserts in the file and sends the mail */
	private function insertRef()
	{
		if ($this->resquestExists() == FALSE) { /* check that the Jeune hasn't already made a request to this Referent */
			array_push($this->stored_refs, $this->new_ref); /*add the new referent to the list of referents */
			if (file_put_contents($this->storage, json_encode($this->stored_refs, JSON_PRETTY_PRINT))) { /*replace the file with the new array*/
				$this->send_mail(); /*send mail */
				return $this->status = "demande effectuée avec succès";
			} else {
				return $this->status = "une erreur est survenue, veuillez rééssayer";
			}
		}
	}
}

/* this loads an array of referents */
class loadRefs
{
	private $user;
	private $storage1 = "../../data/referent.json";
	private $storage2 = "../../data/references.json";
	private $load_pending_refs;
	private $load_confirmed_refs;
	private $pending_refs;
	private $confirmed_refs;


	public function __construct($data)
	{
		/*loads pending and confirmed referents into arrays */
		$this->load_pending_refs = json_decode(file_get_contents($this->storage1), true);
		$this->load_confirmed_refs = json_decode(file_get_contents($this->storage2), true);

		$this->user = $data["user"];

		/*filter referents/references to keep only those made by the specified Jeune */
		$this->pending_refs = $this->searchRefs($this->load_pending_refs);
		$this->confirmed_refs = $this->searchRefs($this->load_confirmed_refs);
		/*remove overlapping requests */
		$this->removedoubles();
		/* put stuff in session */
		$_SESSION["pending"] = $this->pending_refs;
		$_SESSION["confirmed"] = $this->confirmed_refs;
	}


	/* searches for reference requests made by the user */
	private function searchRefs($list)
	{
		$refs = array();
		foreach ($list as $reference) { /* parse every confirmed reference */
			if ($reference["user"] == $this->user) { /* if the reference has been sent by the user */
				array_push($refs, $reference); /*add it to the list of refs */
			}
		}
		return $refs;
	}

	/* removes references that have been validated from the pending reference list */
	private function removedoubles()
	{
		foreach ($this->confirmed_refs as $confirmed) {
			$i = -1; /* $i is the current position on the pending_refs list */
			foreach ($this->pending_refs as $pending) {
				$i++;
				if ($confirmed["mail"] == $pending["mail"]) { /* compare every validated reference to every pending reference */

					array_splice($this->pending_refs, $i, 1);
					/* remove the pending reference from the list if they match */
				}
			}
		}
	}
}

/* request from a Jeune to a Consultant */
class requestCons
{
	private $firstname;
	private $lastname;
	private $consultant;
	private $to_keep;
	private $login;
	private $encrypted_login;
	private $stored_cons;
	private $user;
	private $new_cons;
	private $filtered_refs;
	private $storage_cons = "../../data/consultant.json";

	private $confirmed_refs;

	public $errorcons;
	public $successcons;



	public function __construct($data)
	{
		/* load jeune data */
		$this->firstname = $data["firstname"];
		$this->lastname = $data["lastname"];
		$this->user = $data["user"];
		/* load references */
		$this->confirmed_refs = $data["refs"];
		$this->to_keep = $data["ref_array"];
		/* load consultant mail */
		$this->consultant = $data["mail_cons"];
		
		/* load existing consultants */
		$this->stored_cons = json_decode(file_get_contents($this->storage_cons), true);
		/* create a new login for the consultant */
		$this->login = $this->createLogin();
		$this->encrypted_login = password_hash($this->login, PASSWORD_DEFAULT);

		/* keeps only selected references*/
		$this->filtered_refs = $this->filter_ref();

		/* create the consultant object for the json file */
		$this->new_cons = [
			"usertype" => "C",
			"login" => $this->encrypted_login,
			"user" => $this->user,
			"mail" => $this->consultant,
			"refs" => $this->filtered_refs
		];

		/* adds consultant to json file */
		if ($this->checkFieldValues()) {
			$this->insertCons();
		}
	}


	/* check if user has already made a request for this referent  (this is roughly the same as above) */
	private function resquestExists()
	{
		foreach ($this->stored_cons as $consultant) {
			if ($this->consultant == $consultant["mail"] && $this->user == $consultant["user"]) {
				$this->errorcons = "Vous avez déjà envoyé une demande à ce consultant.";
				return true;
			}
		}
	}



	/* verifies no field was left empty (this is roughly the same as above) */
	private function checkFieldValues()
	{
		if (empty($this->consultant) || empty($this->to_keep) || empty($this->confirmed_refs)) {
			$this->errorcons = "Tous les champs sont obligatoires, ou bien vous n'avez pas de références validées";
			return false;
		} else {
			return true;
		}
	}

	/* create a login for the new consultant (this is roughly the same as above) */
	private function createLogin()
	{
		/* create a table of characters */
		$characters = "0123456789";
		$characters .= $this->consultant;
		$characters .= $this->user;

		$login = "";

		/* create a 8 letters login based on the table of characters */
		$n = 8;
		for ($i = 0; $i < $n; $i++) {
			$index = rand(0, strlen($characters) - 1);
			$login .= $characters[$index];
		}
		/*make sure it's not a login that already exists */
		foreach ($this->stored_cons as $consultant) {
			if (password_verify($login, $consultant['login'])) {
				$login = $this->createlogin();
			}
		}
		return $login;
	}

	/* creates a new empty array and puts the selected references into it*/
	private function filter_ref()
	{
		$new_array = array();
		foreach ($this->to_keep as $dunno) {
			array_push($new_array, $this->confirmed_refs[($dunno + 1)]);
		}
		return $new_array;
	}

	/* writes the mail in a file under data/mail/ for now (this is roughly the same as above) */
	private function send_mail()
	{
		$filename = "../../data/mail/mail_cons/mail" . $this->consultant . $this->user . ".html";
		$file = fopen($filename, "w");
		$text = '<html><body>';
		$text .= 'Bonjour, <br><br>';
		$text .= $this->firstname . " " . $this->lastname . ' vous a envoyé son profil et ses références sur la plateforme jeunes 6.4.<br>';
		$text .= '<a href="http://localhost:8080/page/referent/referent.php">Cliquez ici pour y accéder</a>, et connectez vous à l' . "'" . "aide du login suivant: <br>";
		$text .= $this->login;
		$text .= '</body></html>';
		fwrite($file, $text);
	}


	/* inserts in the file and sends the mail (this is roughly the same as above) */
	private function insertCons()
	{
		if ($this->resquestExists() == FALSE) {
			array_push($this->stored_cons, $this->new_cons);
			if (file_put_contents($this->storage_cons, json_encode($this->stored_cons, JSON_PRETTY_PRINT))) {
				$this->send_mail();
				return $this->successcons = "demande effectuée avec succès";
			} else {
				return $this->errorcons = "une erreur est survenue, veuillez rééssayer";
			}
		}
	}
}
