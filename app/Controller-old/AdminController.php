<?php

	App::uses('AppController', 'Controller');

	class AdminController extends AppController {


		public $uses = array('CategoriesPhoto');

		public function connect() {
			$data = "";
			if($this->Session->check('Auth.User')){
        		$this->redirect(array('controller' => 'admin', 'action' => 'dashbord', 'lock' => true));
			}
	        else if($this->request->data){
	        	$this->loadModel('Photographe');
	        	$user = $this->Photographe->find('first',array('conditions' => array('Photographe.email' => $this->request->data['photographe']['email'],'Photographe.passwd' => md5($this->request->data['photographe']['passwd']))));
	        	if(!empty($user)){
	        		if($this->isAuthorized($user)){
		        		$this->Auth->login($user);
		        		$this->redirect(
				            array('controller' => 'admin', 'action' => 'dashbord', 'lock' => true)
				        );
			        }
	        	}else
	        		$data['mess'] = "Error !";
	        }
			$this->set($data);
		}

		public function lock_dashbord(){
			$this->layout = 'admin';
		}

		public function index(){

		}

		public function lock_add_photo(){
			$this->layout = 'admin';
			$this->loadModel('CategoriesPhoto');
			$this->loadModel('Photo');

			$data['categories'] = $this->CategoriesPhoto->Get_AllCatByArbo();

			//if session Auth
			if($this->request->data){

				$data_request = $this->request->data['Photo'];
				$images = $this->request->data['Photo']['images'];

				if($data_request['categories_photo_id']){
					$categorie = current($this->CategoriesPhoto->find('first',array('conditions' => array('CategoriesPhoto.id' => $data_request['categories_photo_id']))));
					if (!file_exists(WWW_ROOT.'files/photo/'.$categorie['name']))
					    mkdir(WWW_ROOT.'files/photo/'.$categorie['name'], 0777, true);
					foreach ($images as $key => $image) {
						if(!empty($image['name'])){			 
							if(in_array(pathinfo($image['name'], PATHINFO_EXTENSION),array('jpg','png','jpeg','PNG','JPEG','JPG'))){
								if(isset($image['error']) && UPLOAD_ERR_OK === $image['error']){
									$nomImage = $image['name'];
									if(move_uploaded_file($image['tmp_name'], WWW_ROOT.'files/photo/'.$categorie['name'].'/'.$nomImage)){

										$data_request['link'] = '/files/photo/'.$categorie['name'].'/'.$nomImage;
										$this->Photo->create();
										$this->Photo->save($data_request);
										$this->Session->setFlash("Save.");

									}else
										$this->Session->setFlash('Problème lors de l\'upload !');
								}else
									$this->Session->setFlash('Une erreur interne a empêché l\'uplaod de l\'image');
							}else
								$this->Session->setFlash('L\'extension du fichier est incorrecte !');
						}
					}
				}else
					$this->Session->setFlash("selectionner un type d'event");
			}else{
				$this->request->data = array(
					'Photo' => array(
						'categories_photo_id' => '',
						'date' => date('Y-m-d'),
						'photographe_id' => '1'
					)
				);
			}
			$this->set($data);

		}

		public function lock_add_actualite(){

			$this->layout = 'admin';
			$this->loadModel('Actualite');
			$this->loadModel('Photographe');
			$data['Photographes'] = $this->Photographe->find('all');

			//if session Auth
			if($this->request->data){
				$data_request = $this->request->data['Actualite'];
				if(!empty($data_request['title']) && !empty($data_request['content'])){

					if(empty($data_request['link']))
						unset($data_request['link']);
				
					if($this->Actualite->save($data_request)){
						$this->Session->setFlash("Actue Save.");

				}else
					$this->Session->setFlash("Remplir les champs de titre et de descritions.");
			}else{
				$this->request->data = array(
					'Actualite' => array(
						'categories_photo_id' => 'NULL',
						'date' => date('Y-m-d'),
					)
				);
			}
			$this->set($data);

		}

		public function lock_add_categorie(){

			$this->layout = 'admin';
			$this->loadModel('CategoriesPhoto');
			$this->loadModel('CategoriesInformation');

			$data['categories'] = $this->CategoriesPhoto->find('all',array('conditions' => array(
				'CategoriesPhoto.categories_photo_id' => null
			)));

			//if session Auth
			if($this->request->data){

				$data_request_cat = $this->request->data['CategoriesPhoto'];
				$data_request_info_cat = $this->request->data['CategoriesInformation'];

				if(!empty($data_request_cat['name'])){
					if(empty($data_request_cat['categories_photo_id']) || $data_request_cat['categories_photo_id'] == 'NULL'){
						unset($data_request_cat['categories_photo_id']);
					}

					$this->CategoriesPhoto->save($data_request_cat);
					$this->Session->setFlash("New cat is save.");
					if(!empty($data_request_info_cat)){

						//save img cat if not empty
						$data_request_info_cat['categories_photo_id'] = $this->CategoriesPhoto->id;
						if(!empty($data_request_info_cat['img_cat']['name'])){
							if (!file_exists(WWW_ROOT.'files/cat/'))
					    		mkdir(WWW_ROOT.'files/cat/', 0777, true);			 
							if(in_array(pathinfo($data_request_info_cat['img_cat']['name'], PATHINFO_EXTENSION),array('jpg','png','jpeg','PNG','JPEG','JPG'))){
								if(isset($data_request_info_cat['img_cat']['error']) && UPLOAD_ERR_OK === $data_request_info_cat['img_cat']['error']){
									$nomImage = $data_request_info_cat['img_cat']['name'];
									if(move_uploaded_file($data_request_info_cat['img_cat']['tmp_name'], WWW_ROOT.'files/cat/'.$nomImage)){
										$data_request['link'] = '/files/cat/'.$nomImage;
									}else
										$this->Session->setFlash('Problème lors de l\'upload !');
								}else
									$this->Session->setFlash('Une erreur interne a empêché l\'uplaod de l\'image');
							}else
								$this->Session->setFlash('L\'extension du fichier est incorrecte !');
						}

						if(empty($data_request['link'])){
							unset($data_request_info_cat['img_cat']);
						}else{
							$data_request_info_cat['img_cat'] = $data_request['link'];
						}
						if($this->CategoriesInformation->save($data_request_info_cat)){
							$this->Session->setFlash("New cat is save with datas.");
						}
					}
				}
			}else{

				$this->request->data = array(
					'CategoriesPhoto' => array(
						'photographe_id' => '1',
						'content' => null,
						'link' => null,
						'title' => null,
						'categories_photo_id' => "NULL",
						'event' => "1"
					)
				);

			}
			$this->set($data);
		}

		public function lock_add_photographe(){
			$this->layout = 'admin';
			$data['Actue'] = $this->get_last_actue();

			$this->loadModel('Photographe');

			//if session Auth
			if($this->request->data){

				$data_request = $this->request->data['Photographe'];
				if(!empty($data_request['name']) && !empty($data_request['passwd']) && !empty($data_request['email'])){
					$test = $this->Photographe->find('first', array(
						'conditions' => array('Photographe.email' => $data_request['email'])
					));
					if(empty($test)){
						$data_request['passwd'] = md5($data_request['passwd']);
						$this->Photographe->save($data_request);
						$this->Session->setFlash("Actue Save.");
					}else{
						$this->Session->setFlash("Erreur cette email est déja utilisé");
					}

				}else
					$this->Session->setFlash("Remplir les champs de email, nom et mot de pass.");
			}else{
				$this->request->data = array(
					'Photographe' => array(
						'type_user' => 'post',
					)
				);
			}
			$this->set($data);
		}

		public function lock_update_photographe(){
			$this->layout = 'admin';

			$this->loadModel('Photographe');

			//if session Auth
			if($this->request->data){

				$data_request = $this->request->data['Photographe'];
				if(!empty($data_request['name']) && !empty($data_request['passwd']) && !empty($data_request['email'])){
					$test = $this->Photographe->find('first', array(
						'conditions' => array('Photographe.passwd' => md5($data_request['passwd']))
					));
					if(!empty($test)){
						if(!empty($data_request['new_passwd'])){
							$data_request['passwd'] = md5($data_request['new_passwd']);
						}else{
							$data_request['passwd'] = md5($data_request['passwd']);
						}
						$this->Photographe->save($data_request);
						$this->Session->setFlash("User Updated.");
						$this->Session->write('Auth.User',array('Photographe' => $data_request));

					}else
						$this->Session->setFlash("Erreur sur le mot de pass");
				}else
					$this->Session->setFlash("Remplir les champs de email, nom et mot de pass.");
			}else{
				$this->request->data = $this->Session->read('Auth.User');
				unset($this->request->data['Photographe']['passwd']);
			}
		}

		public function logout() {
		    $this->redirect($this->Auth->logout());
		}

		public function isAuthorized($user) {
		    if (isset($user['Photographe']['type_user']) && $user['Photographe']['type_user'] === 'admin') {
		        return true;
		    }
		    return parent::isAuthorized($user);
		}
	}

?>
