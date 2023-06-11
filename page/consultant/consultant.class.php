<?php
class loadCons
{
	private $user;
	private $mail;
	private $storage1 = "../../data/referent.json";
	private $storage2 = "../../data/references.json";
	private $load_pending_refs;
	private $load_confirmed_refs;
	private $pending_refs;
	private $confirmed_refs;


	public function __construct($data)
	{

		$this->mail=$data["refs"][0]["mail"]; /* this is the email of the first selected reference */
		$this->user = $data["user"]; /* Jeune who sent the request */
		$this->load_pending_refs = json_decode(file_get_contents($this->storage1), true); /* loads pending refs to load */
		$this->load_confirmed_refs = json_decode(file_get_contents($this->storage2), true);
		/* assign default values */
		

		$this->pending_refs = $this->searchRefs($this->load_pending_refs);

		$this->confirmed_refs = $this->searchRefs($this->load_confirmed_refs);

		$this->removedoubles();

		$_SESSION["pending"] = $this->pending_refs;
		$_SESSION["confirmed"] = $this->confirmed_refs;
	}


	/* select the reference sent by the first */
	private function searchRefs($list)
	{
		foreach ($list as $reference) { /* parse every confirmed reference */
			if ($reference["user"] == $this->user && $this->mail == $reference["mail"]) { /* if the reference has been sent by the user */
				$ref = $reference; /*add it to the list of refs */
			}
		}
		return $ref;
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
					/* remove the pending reference from the list */
				}
			}
		}
	}
}