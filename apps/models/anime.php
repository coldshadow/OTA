<?php

class Anime extends DataMapper {
	
	public $has_many = array('user');
	
	public $validation = array(
		array(
			'field' => 'anime_name',
			'label' => 'Anime Name',
			'rules' => array()
		),
		array(
			'field' => 'anime_description',
			'label' => 'Anime Description',
			'rules' => array()
		),
		array(
			'field' => 'anime_episodes',
			'label' => 'Number of Episodes',
			'rules' => array()
		),
		array(
			'field' => 'anime_ova',
			'label' => 'Number of OVAs',
			'rules' => array()
		),
		array(
			'field' => 'anime_alt_name',
			'label' => 'Alternative Name',
			'rules' => array()
		),
		array(
			'field' => 'anime_watched_status',
			'label' => 'Watched Status',
			'rules' => array()
		)
	);
	
	function __construct() {
		parent::DataMapper();
	}
	
}