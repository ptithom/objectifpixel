<?php

	class Photo extends AppModel {

		    public $hasOne = array('BookPage','CategoriesPhoto');
		    public $belonto = array('Photographe');
		    public $actsAs = array('Containable');
	}

?>