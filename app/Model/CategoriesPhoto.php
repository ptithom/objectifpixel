<?php

	class CategoriesPhoto extends AppModel {

		public $actsAs = array('Containable');
	    public $hasMany = array('Photo');
	    public $hasone = 'CategoriesInformation';

	    public function	Get_AllCatByArbo(){

	    	$categories = $this->find('all');
	    	$categories = Hash::combine($categories, '{n}.CategoriesPhoto.id', '{n}');
	    	
			foreach ($categories as $key => $cat) {
				if(!empty($cat['CategoriesPhoto']['categories_photo_id'])){
					$categories[$cat['CategoriesPhoto']['categories_photo_id']]['CategoriesPhoto']['child'][] = $cat;
					unset($categories[$key]);
				}
			}
			return $categories;
	    }
	    
	}

?>