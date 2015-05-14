<?php
class MorceauListe {
	public $founddir;
	public $searchchar;
	public $groupname;

    function __construct($s, $g) {
        $this->searchchar = $s;
        $this->groupname = $g;
		$this->founddir = array();
    }
}
?>