<?php
class loadCons
{
	private $user;
	private $mail;
	private $storage1 = "../../data/jeune.json";
	private $storage2 = "../../data/references.json";
	private $load_jeunes;
	private $load_confirmed_refs;
	private $jeune;
	private $confirmed_refs;


	public function __construct($data)
	{

		$this->mail=$data["refs"][0]["mail"]; /* this is the email of the first selected reference */
		$this->user = $data["user"]; /* Jeune who sent the request */
		$this->load_jeunes = json_decode(file_get_contents($this->storage1), true); /* loads pending refs to load */
		$this->load_confirmed_refs = json_decode(file_get_contents($this->storage2), true);
		/* assign default values */
		

		$this->jeune = $this->searchJeune($this->load_jeunes);

		$_SESSION["Jeune"] = $this->jeune;
	}


	/* select the wanted Jeune */
	private function searchJeune($list)
	{
		foreach ($list as $jeune) { /* parse every confirmed reference */
			if ($jeune["mail"] == $this->user) { /* if the reference has been sent by the user */
				$target = $jeune; /*add it to the list of refs */
			}
		}
		return $target;
	}

	
}