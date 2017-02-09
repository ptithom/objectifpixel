<?php

	App::uses('AppController', 'Controller');

	class OnePixOneWeekController extends AppController {

		public $uses = array('CategoriesPhoto');

		public function index(){

			$data['Actue'] = $this->get_last_actue();


			$categorie = current($this->CategoriesPhoto->find('first',array(
				'conditions' => array('CategoriesPhoto.slug' => "1pix1week")
			)));
	        $data['Photo'] = $this->CategoriesPhoto->Photo->find('all',array(
	        	'conditions' => array('Photo.categories_photo_id' => $categorie['id']),
	        	'order' => array('Photo.date DESC'),
	        ));
		
			$this->set($data);

		}

	}

?>
