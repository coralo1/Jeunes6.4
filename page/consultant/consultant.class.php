<?php
class loadCons
{
	private $user;
	private $mail;
	private $storage1 = "../../data/jeune.json";
	private $load_jeunes;
	private $jeune;


	public function __construct($data)
	{

		$this->mail=$data["refs"][0]["mail"]; /* this is the email of the first selected reference */
		$this->user = $data["user"]; /* Jeune who sent the request */
		$this->load_jeunes = json_decode(file_get_contents($this->storage1), true); /* list of jeunes */
		/* assign default values */
		

		$this->jeune = $this->searchJeune($this->load_jeunes);

		$_SESSION["Jeune"] = $this->jeune;
	}


	/* select the wanted Jeune */
	private function searchJeune($list)
	{
		foreach ($list as $jeune) { /* parse every jeune */
			if ($jeune["mail"] == $this->user) { /* if the wanted jeune has a matching email */
				$target = $jeune; /*return it */
			}
		}
		return $target;
	}

	
}