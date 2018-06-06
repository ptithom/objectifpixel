<?php

	class Actualite extends AppModel {

		    public $belongsto = array('Photographe');
		   	public $actsAs = array('Containable');
	    	public $recursive = -1;

	}

?>