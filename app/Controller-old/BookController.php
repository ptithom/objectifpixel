<?php

	App::uses('AppController', 'Controller');

	class BookController extends AppController {

		public $uses = array('BookPage');

		public function index(){

			$data['Actue'] = $this->get_last_actue();
		    $data['Book'] = $this->BookPage->find('all');
		
			$this->set($data);

		}

	}

?>
