<?php

	class Photo extends AppModel {

		    public $hasOne = array();
		    public $belonsto = array('BookPage','CategoriesPhoto','Photographe');
		    public $actsAs = array('Containable');
	}

?>