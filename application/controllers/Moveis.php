<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Moveis extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Moveis_model', 'moveis');
        $this->load->model('Ambientes_model', 'ambientes');   
    }
    
    public function listar(){
        $dados['moveis'] = $this->moveis->select_moveis();
        $dados['destaques'] = $this->moveis->select_destaques();
        $dados['desativados'] = $this->moveis->select_desativados();
        $this->load->view('include/side-menu');
        $this->load->view('moveis_listagem', $dados);
    }
    
    public function destacar($id){
        $this->moveis->destacar($id);
        redirect('moveis/listar');
    }
    
    public function esconder($id){
        $this->moveis->esconder($id);
        redirect('moveis/listar');
    } 
    
    public function ativar($id){
        $this->moveis->ativar($id);
        redirect('moveis/listar');
    }
    
    public function desativar($id){
        $this->moveis->desativar($id);
        redirect('moveis/listar');
    }
    
    public function cadastrar(){
        $dados['moveis'] = $this->moveis->select();
        $dados['ambientes'] = $this->ambientes->select();
        $this->load->view('include/side-menu');
        $this->load->view('moveis_form_cadastro', $dados);
    }
    
      public function grava_cadastro() {
        // recebe os dados do formulário
        $dados['id'] = $this->input->post('id');
        $dados['descricao'] = $this->input->post('descricao');
        $dados['altura'] = $this->input->post('altura');
        $dados['largura'] = $this->input->post('largura');
        $dados['profundidade'] = $this->input->post('profundidade');
        $dados['preco'] = $this->input->post('preco');
        $dados['ambientes_id'] = $this->input->post('ambientes_id');
        
        //configura codigo modulo
        $ambiente_id = $this->input->post('ambientes_id'); 
        $codigo = $this->ambientes->find_codigo($ambiente_id);
        
       
        //dados['codigo'] = $this->input->post('ambientes_id');
        //$dados['codigo']= $this->ambientes->find_codigo($ambiente_id);
        
        // define as configurações para upload da foto
            if ($this->moveis->insert($dados)) {
                $mensa = $codigo."Módulo corretamente cadastrado";
                $tipo = 1;
            } else {
                $mensa = "Módulo não Cadastrado";
                $tipo = 0;
            }
        // atribui para variáveis de sessão "flash"
        $this->session->set_flashdata('mensa', $mensa);
        $this->session->set_flashdata('tipo', $tipo);

        // recarrega a view (index)
        redirect(base_url('moveis/listar'));
    }
    
    public function grava_cadastro2() {
        // recebe os dados do formulário
        $dados = $this->input->post();
        // define as configurações para upload da foto
        $config['upload_path'] = './fotos/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $mensa = "Erro na gravação da foto do módulo" . $this->upload->display_errors();
            $tipo = 0;
        } else {
            $arquivo = $this->upload->data();
            $dados['foto'] = $arquivo['file_name'];

            if ($this->moveis->insert($dados)) {
                $mensa = "Módulo corretamente cadastrado";
                $tipo = 1;
            } else {
                $mensa = "Módulo não Cadastrado";
                $tipo = 0;
            }
        }
        // atribui para variáveis de sessão "flash"
        $this->session->set_flashdata('mensa', $mensa);
        $this->session->set_flashdata('tipo', $tipo);

        // recarrega a view (index)
        redirect(base_url('moveis/listar'));
    }

} 
?>
