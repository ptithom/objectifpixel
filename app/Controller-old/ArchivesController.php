<?php

	App::uses('AppController', 'Controller');

	class ArchivesController extends AppController {

		public $uses = array('CategoriesPhoto');

		public function categorie($slug_cat = null) {
			
			$data['Actue'] = $this->get_last_actue();

			if(!$this->Session->check("breadscrumps") || empty($slug_cat)){

				$this->Session->write("breadscrumps",array(
		    		"0" => array("name" => "Home", "link" => "/" ),
		    		"1"=> array("name" => "Archive", "link" => "/archives/categorie" )
		    	 ));
			}

	        if(!empty($slug_cat)){
	        	$cat_post = current($this->CategoriesPhoto->find('first',array('conditions' => array('CategoriesPhoto.slug' => $slug_cat))));
	        	$id_cat = $cat_post['id'];
	        }else{
	        	$id_cat = null;
	        }

	        $this->update_breadcrumb($id_cat);
	        $data['categories'] = $this->CategoriesPhoto->find('all',array(
	        	'conditions' => array(
	        		'CategoriesPhoto.categories_photo_id' => $id_cat,

	        		'CategoriesPhoto.cat_def' => 1)
	        	));
	        if(empty($data['categories']) && !empty($slug_cat)){
	        	$this->redirect(array('controller' => 'archives','action' => 'galerie',$slug_cat));
	        }

	        $data['breadcrumbs'] = $this->Session->read("breadscrumps");
	        $this->set($data);
		}

		public function list_event($slug_cat = null) {
			
			$data['Actue'] = $this->get_last_actue();

			if(!$this->Session->check("breadscrumps") || empty($slug_cat)){

				$this->Session->write("breadscrumps",array(
		    		"0" => array("name" => "Home", "link" => "/" ),
		    		"1"=> array("name" => "Archive", "link" => "/archives/categorie" )
		    	 ));
			}

	        if(!empty($slug_cat)){
	        	$cat_post = current($this->CategoriesPhoto->find('first',array('conditions' => array('CategoriesPhoto.slug' => $slug_cat))));
	        	$id_cat = $cat_post['id'];
	        }else{
	        	$id_cat = null;
	        }

	        $this->update_breadcrumb($id_cat);
	        $data['categories'] = $this->CategoriesPhoto->find('all',array(
	        	'conditions' => array(
	        		'CategoriesPhoto.categories_photo_id' => $id_cat,
	        		'CategoriesPhoto.event' => 1,
	        		'CategoriesPhoto.cat_def' => 1)
	        	));
	        if(empty($data['categories']) && !empty($slug_cat)){
	        	$this->redirect(array('controller' => 'archives','action' => 'galerie',$slug_cat));
	        }

	        $data['breadcrumbs'] = $this->Session->read("breadscrumps");
	        $this->set($data);
		}

		public function galerie($name_gal = null){

			$data['Actue'] = $this->get_last_actue();
			$this->loadModel('CategoriesInformation');

			if($name_gal){

				$data['breadcrumbs'] = $this->Session->read("breadscrumps");

				$data['categorie'] = current($this->CategoriesPhoto->find('first',array(
					'conditions' => array('CategoriesPhoto.slug' => $name_gal)
				)));
				$data['categorie']['CategoriesInformation'] = current($this->CategoriesInformation->find('first',array(
					'conditions' => array('CategoriesInformation.categories_photo_id' => $data['categorie']['id']),
				)));
		        $data['Photo'] = $this->CategoriesPhoto->Photo->find('all',array('conditions' => array('Photo.categories_photo_id' => $data['categorie']['id'])));
	    	}
		
			$this->set($data);

		}

	}

?>
