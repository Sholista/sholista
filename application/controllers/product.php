<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
	public function index()
	{
        /*
	    $query=$this->input->get('query');
	    require_once (APPPATH.'libraries/simpleupcapi/SimpleUPCAPI.php');
	    $obj=new SimpleUPCAPI();
	    $result=$obj->searchProduct($query);
        */
        $header['title'] = 'Shopping Lists that are Awesome - Sholista.com';
		$this->load->view('templates/header', $header);
		$this->load->view('product');
		$this->load->view('templates/footer');
	}




}
