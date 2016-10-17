<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
            if(!$this->session->logado){
		$this->load->view('login');
            }else{
                $this->load->view('welcome-message');
            }
        }
}

