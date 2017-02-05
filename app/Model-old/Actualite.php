<?php

	class Actualite extends AppModel {

		    public $belongto = array('Photographe');
		   	public $actsAs = array('Containable');
	    	public $recursive = -1;

	}

?>