<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
           //$this->load->verificaSessao();
           $this->load->view('include/side-menu');
           $this->load->view('dashboard');
        }
        
        public function verificaSessao()
        { 
            if (!$this->session->logado) {
                redirect('home/login');
            }
        }
}
