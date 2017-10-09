<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FullTextController extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome');
	}

	public function search()
	{
		$this->load->model('fulltextmodel');

		if($this->input->post()){

			$query = $this->input->post('query');

			if($data['result'] = $this->fulltextmodel->searchmodel($query)){

				echo json_encode($data);	
			}

		}else{

			$this->load->view('fulltextview');
		}
	}
}
