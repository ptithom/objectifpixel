<?php

	App::uses('AppController', 'Controller');

	class AdminController extends AppController {


		public $uses = array('CategoriesPhoto');

		public function connect() {

            $this->layout = 'admin';
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

		public function lock_categories(){
            $this->layout = 'admin';
            $this->loadModel('CategoriesPhoto');
            $this->loadModel('CategoriesInformation');

            $data['categories'] = $this->CategoriesPhoto->Get_AllCatByArbo();

            $this->set($data);

        }

        public function lock_actualites(){
            $this->layout = 'admin';
            $this->loadModel('Actualite');

            $photographe_id = $this->Session->read('Auth.User.Photographe.id');

            $data['actualites'] = $this->Actualite->find('all',array('conditions' => array('Actualite.photographe_id' => $photographe_id)));
            $this->set($data);

        }


		public function lock_update_photo( $id_categorie = null){
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
					if (!file_exists(WWW_ROOT.'files/photo/'.$categorie['slug']))
					    mkdir(WWW_ROOT.'files/photo/'.$categorie['slug'], 0777, true);
					foreach ($images as $key => $image) {
						if(!empty($image['name'])){			 
							if(in_array(pathinfo($image['name'], PATHINFO_EXTENSION),array('jpg','png','jpeg','PNG','JPEG','JPG'))){
								if(isset($image['error']) && UPLOAD_ERR_OK === $image['error']){
									$nomImage = $image['name'];
									if(move_uploaded_file($image['tmp_name'], WWW_ROOT.'files/photo/'.$categorie['slug'].'/'.$nomImage)){

										$data_request['link'] = '/files/photo/'.$categorie['slug'].'/'.$nomImage;
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

                    $this->request->data = null;
                    return $this->redirect("/l/Admin/update_photo/".$data_request['categories_photo_id']);

                }else
					$this->Session->setFlash("selectionner un type d'event");
			}else{

			    if(!empty($id_categorie)){
                    $data['photographies'] = $this->CategoriesPhoto->Photo->find('all',array('conditions' => array('Photo.categories_photo_id' => $id_categorie)));

                    $this->request->data = array(
                        'Photo' => array(
                            'categories_photo_id' => $id_categorie,
                            'date' => date('Y-m-d'),
                            'photographe_id' => $this->Session->read('Auth.User.Photographe.id')
                        )
                    );

                }else{
                    $this->request->data = array(
                        'Photo' => array(
                            'categories_photo_id' => '',
                            'date' => date('Y-m-d'),
                            'photographe_id' => $this->Session->read('Auth.User.Photographe.id')
                        )
                    );
                }

			}
			$this->set($data);

		}

		public function lock_update_actualite($id_actu = null){

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
				
					if($this->Actualite->save($data_request))
						$this->Session->setFlash("Actue Save.");

				}else
					$this->Session->setFlash("Remplir les champs de titre et de descritions.");
			}else{
                if(!empty($id_actu)){
                    $this->request->data = $this->Actualite->find('first',array('conditions' => array('Actualite.id' => $id_actu)));
                    }else {

                    $this->request->data = array(
                        'Actualite' => array(
                            'categories_photo_id' => 'NULL',
                            'date' => date('Y-m-d'),
                        )
                    );
                }
			}
			$this->set($data);

		}

		public function lock_update_categorie($id_categorie = null){

			$this->layout = 'admin';
			$this->loadModel('CategoriesPhoto');
			$this->loadModel('CategoriesInformation');

			$data['categories'] = $this->CategoriesPhoto->find('all',array('conditions' => array(
				'CategoriesPhoto.categories_photo_id' => null
			)));

			//if session Auth
			if($this->request->data){

				$data_request_cat = $this->request->data['CategoriesPhoto'];
                $data_request_cat['date'] = $this->request->data['CategoriesInformation']['date'];
				$data_request_info_cat = $this->request->data['CategoriesInformation'];
                $msg_error = '';
				if(!empty($data_request_cat['slug'])){
					if(empty($data_request_cat['categories_photo_id']) || $data_request_cat['categories_photo_id'] == 'NULL'){
						unset($data_request_cat['categories_photo_id']);
					}

					$this->CategoriesPhoto->save($data_request_cat);
                    $msg_error .= "New cat is save.";
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
										$msg_error .= 'Problème lors de l\'upload !';
								}else
                                    $msg_error .= 'Une erreur interne a empêché l\'uplaod de l\'image (error upload : '. $data_request_info_cat['img_cat']['error'] .')';
							}else
                                $msg_error .= 'L\'extension du fichier est incorrecte !';

						}
						if(!empty($msg_error)){
                            $this->Session->setFlash($msg_error);
                        }

						if(empty($data_request['link'])){
							unset($data_request_info_cat['img_cat']);
						}else{
							$data_request_info_cat['img_cat'] = $data_request['link'];
						}
						if($this->CategoriesInformation->save($data_request_info_cat)){
                            $msg_error .= "New cat informations is save with datas.";
                            $this->request->data = null;
                            if(!empty($msg_error)){
                                $this->Session->setFlash($msg_error);
                            }

                            return $this->redirect("/l/Admin/update_categorie/".$data_request_info_cat['categories_photo_id']);
                        }
					}
                    if(!empty($msg_error)){
                        $this->Session->setFlash($msg_error);
                    }

				}
			}else{

                if(!empty($id_categorie)){
                    $this->request->data = $this->CategoriesPhoto->find('first',array('conditions' => array('CategoriesPhoto.id' => $id_categorie)));
                    $this->request->data['CategoriesInformation'] = current($this->CategoriesInformation->find('first',array('conditions' => array('CategoriesInformation.categories_photo_id' => $this->request->data['CategoriesPhoto']['id']),)));
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

			}


            $data["options_cat"]['NULL'] = 'Catégorgie racine';
            foreach ($data["categories"] as $key => $categorie) {
                $categorie = current($categorie);
                $data["options_cat"][$categorie['id']] = $categorie['slug'];
            }



            $this->set($data);
		}

		public function lock_update_photographe($id_photographe = null){
			$this->layout = 'admin';

			$this->loadModel('Photographe');

			//if session Auth
			if($this->request->data){

				$data_request = $this->request->data['Photographe'];
				if(!empty($data_request['name']) && !empty($data_request['passwd']) && !empty($data_request['email'])){
					$test = $this->Photographe->find('first', array(
						'conditions' => array('Photographe.email' => $data_request['email'])
					));

					if(empty($test) || !empty($data_request['id'])){
					    if(!empty($data_request['id']))
						$data_request['passwd'] = md5($data_request['passwd']);
						$this->Photographe->save($data_request);
						$this->Session->setFlash("Save.");
                        return $this->redirect("/l/Admin/update_photographe/".$this->Photographe->id);
					}else{
						$this->Session->setFlash("Erreur cette email est déja utilisé");
					}

				}else
					$this->Session->setFlash("Remplir les champs de email, nom et mot de pass.");
			}else{
                if(!empty($id_photographe)){
                    $this->request->data = $this->Photographe->find('first',array('conditions' => array('Photographe.id' => $id_photographe)));
                    unset($this->request->data['Photographe']['passwd']);
                }else {
                    $this->request->data = array(
                        'Photographe' => array(
                            'type_user' => 'post',
                        )
                    );
                }
			}
		}


		public function logout() {
		    $this->redirect($this->Auth->logout());
		}

		public function lock_delete_categorie($id_categorie){

		    if(!empty($id_categorie)){

                $this->loadModel('CategoriesPhoto');
                $this->loadModel('CategoriesInformation');

                if($this->CategoriesPhoto->deleteAll(array('CategoriesPhoto.id' => $id_categorie), false)){
                    $this->CategoriesInformation->deleteAll( array('CategoriesInformation.categories_photo_id' => $id_categorie), false);
                    $this->Session->setFlash("ID : $id_categorie DELETE");
                }


            }

            return $this->redirect("/l/Admin/categories");

        }

        public function lock_delete_actualite($id_actu){

            if(!empty($id_actu)){

                $this->loadModel('Actualite');

                if($this->Actualite->deleteAll(array('Actualite.id' => $id_actu), false)){
                     $this->Session->setFlash("ID : $id_actu DELETE");
                }

            }
            return $this->redirect("/l/Admin/actualites");

        }

        public function lock_delete_photo($id_photo){

            if(!empty($id_photo)){

                $this->loadModel('Photo');
                $photo = $this->Photo->find('first',array("conditions" => array('Photo.id' => $id_photo)));
                if($this->Photo->deleteAll(array('Photo.id' => $id_photo), false)){
                    $this->Session->setFlash("ID : $id_photo DELETE");
                }
                return $this->redirect("/l/Admin/update_photo/".$photo['Photo']['categories_photo_id']);
            }
            return $this->redirect($this->referer());

        }

		public function isAuthorized($user) {
		    if (isset($user['Photographe']['type_user']) && $user['Photographe']['type_user'] === 'admin') {
		        return true;
		    }
		    return parent::isAuthorized($user);
		}

    }
