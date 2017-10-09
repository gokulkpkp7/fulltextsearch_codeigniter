<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fulltextmodel extends CI_Model {

	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function searchmodel($searchQuery)
	{

		$this->db->where("MATCH(title,description) AGAINST ('$searchQuery' IN NATURAL LANGUAGE MODE) ");
		$query = $this->db->get('search');
		return $query ->result();
	}
}
