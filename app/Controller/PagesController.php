<?php


App::uses('AppController', 'Controller');


class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();


	public function home() {

		$this->get_new_event();

	}

	public function get_new_photo(){

		$this->loadModel('Photo');
		$this->loadModel('CategoriesPhoto');

		$data['categories'] = $this->CategoriesPhoto->find('all',array(
			'conditions' => array(
				'CategoriesPhoto.categories_photo_id' => null,
				'CategoriesPhoto.cat_def' => 1
			)
		));

		$list_cat [] = null;
		foreach ($data['categories'] as $key_cat => $value_cat) {
			$list_cat[] .= $value_cat['CategoriesPhoto']['id'];
		}


		$this->Photo->Behaviors->attach('Containable');
		$data['new_photos'] = $this->Photo->find('all', array(
			'conditions' => array('Photo.categories_photo_id' => $list_cat),
			'order' => array('Photo.updated DESC'),
			'limit' => 9
		));
		$data['categories'] = $this->CategoriesPhoto->find('all',array(
			'conditions' => array('CategoriesPhoto.categories_photo_id' => null,'CategoriesPhoto.cat_def' => 1)
		));

		foreach ($data['new_photos'] as $key_photo => $value_photo) {
			foreach ($data['categories'] as $key_cat => $value_cat) {
				if($value_photo['Photo']['categories_photo_id'] == $value_cat['CategoriesPhoto']['id']){
					$data['new_photos'][$key_photo]['CategoriesPhoto'] = $value_cat['CategoriesPhoto'];
				}
			}
		}

		$this->set($data);
	}

	public function get_new_event(){

		$this->loadModel('CategoriesPhoto');
		$this->loadModel('CategoriesInformation');

		$this->CategoriesPhoto->Behaviors->attach('Containable');
		$data['new_events'] = $this->CategoriesPhoto->find('all',array(
			'conditions' => array(
				'CategoriesPhoto.categories_photo_id' => 1,
				'CategoriesPhoto.cat_def' => 1,
				'CategoriesPhoto.event' => 1,
			),
			'order' => array('CategoriesPhoto.date DESC'),
			'limit' => 9
		));

		foreach ($data['new_events'] as $key => &$value) {
			$value['CategoriesInformation'] = current($this->CategoriesInformation->find('first',array(
				'conditions' => array(
					'CategoriesInformation.categories_photo_id' => $value['CategoriesPhoto']['id'],
				),
			)));
		}

		$this->set($data);
	}

	public function contact(){

	}
}
