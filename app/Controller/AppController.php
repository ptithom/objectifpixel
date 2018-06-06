<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	//public $components = array('DebugKit.Toolbar' => array('panels' => array('history', 'session')),'Session', 'Auth');
	public $components = array('DebugKit.Toolbar','Session', 'Auth');
	public $helpers = array('Text', 'Form', 'Html', 'Session', 'Cache','Image');

	function beforeFilter() {
        $this->Auth->loginAction = array('controller' => 'admin', 'action' => 'connect', 'lock'=> false ); //autoriser l'accés a l'admin après autorisation
        $this->Auth->authorize = array('Controller'); //autoriser certaine fonctionnalité aux enregistré function isAuthorized
        if (!isset($this->request->params['prefix'])){
            $this->Auth->allow();
        }
        $data['Actue_footer'] = $this->get_last_actue();
        $data['Pictures_footer'] = $this->get_last_pictures();
        $this->set($data);
    }

    public function isAuthorized($user) {
	    $this->redirect(array('controller' => 'admin', 'action' => 'connect', 'lock' => false));
	 }

	public function update_breadcrumb($id_cat){

		$breadcrumbs = array(
    		"0" => array("name" => "Home", "link" => "/" ),
    		"1"=> array("name" => "Archive", "link" => "/archives/categorie" )
    	 );
		if(!empty($id_cat)){

			$this->loadModel('CategoriesPhoto');
		    $cat_post = current($this->CategoriesPhoto->find('first',array('conditions' => array('CategoriesPhoto.id' => $id_cat))));
	    	$parrent_id_cat = $cat_post['categories_photo_id'];
	   		$flag = 0;
	        $arbo_cat[0]['name'] = $cat_post['slug'];
	        $arbo_cat[0]['link'] = '/archives/categorie/'.$cat_post['slug'];
	        do{
	        	if(!empty($parrent_id_cat)){
	        		$data['categories'] = current($this->CategoriesPhoto->find('all',array('conditions' => array('CategoriesPhoto.id' => $parrent_id_cat ))));
		        	if(empty($data['categories'])){
		        		$flag = 1;
		        	}else{
		        		$parrent_id_cat = $data['categories']['CategoriesPhoto']['categories_photo_id'];
		        		$size_arbo = count($arbo_cat);
		        		$arbo_cat[$size_arbo]['name'] = $data['categories']['CategoriesPhoto']['slug'];
		        		$arbo_cat[$size_arbo]['link'] = '/archives/categorie/'.$data['categories']['CategoriesPhoto']['slug'];
		        	}
	        	}else{
	        		$flag = 1;
	        	}

	        } while ($flag == 0);
	        foreach (array_reverse($arbo_cat) as $key => $value) {
	        	$breadcrumbs[count($breadcrumbs)] = $value;
	        }
	    }
        $this->Session->write("breadscrumps",$breadcrumbs);

	}

	public function get_last_actue(){

		$this->loadModel('Photographe');
		$actue = $this->Photographe->Actualite->find('first',array(
			'order' => array('Actualite.created DESC'),
		));

		if(!empty($actue['Actualite']['photographe_id'])){
			$actue["Photographe"] = current($this->Photographe->find('first',array(
				'conditions' => array('Photographe.id' => $actue['Actualite']['photographe_id'])
			)));	
		}
		return $actue;

	}

	public function get_last_pictures(){

		$this->loadModel('Photo');
		$this->loadModel('CategoriesPhoto');
		$data['new_photos'] = $this->Photo->find('all', array(
			'order' => array('Photo.updated DESC'),
			'limit' => 9
		));

		foreach($data['new_photos'] as &$photo){
			$photo['CategoriesPhoto'] = current($this->CategoriesPhoto->find('first', array(
				'conditions' => array('CategoriesPhoto.id' => $photo['Photo']['categories_photo_id'])
			)));
		}

		return $data['new_photos'];
		
	}


	
}
