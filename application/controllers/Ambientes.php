<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ambientes extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Ambientes_model', 'ambientes');   
    }
    
    public function listar(){
        $dados['ambientes'] = $this->ambientes->select();
        $dados['desativados'] = $this->ambientes->select_desativados();
        $this->load->view('include/side-menu');
        $this->load->view('ambientes_listagem', $dados);
    }
    
    
    public function ativar($id){
        $this->ambientes->ativar($id);
        redirect('ambientes/listar');
    }
    
    public function desativar($id){
        $this->ambientes->desativar($id);
        redirect('ambientes/listar');
    }
    
    public function cadastrar(){
        $dados['ambientes'] = $this->ambientes->select();
        $this->load->view('include/side-menu');
        $this->load->view('ambientes_form_cadastro', $dados);
    }
    
      public function grava_cadastro() {
        // recebe os dados do formulário
        $dados = $this->input->post();
        // define as configurações para upload da foto
            if ($this->ambientes->insert($dados)) {
                $mensa = "Ambiente corretamente cadastrado";
                $tipo = 1;
            } else {
                $mensa = "Ambiente não Cadastrado";
                $tipo = 0;
            }
        // atribui para variáveis de sessão "flash"
        $this->session->set_flashdata('mensa', $mensa);
        $this->session->set_flashdata('tipo', $tipo);

        // recarrega a view (index)
        redirect(base_url('ambientes/listar'));
    }
    
   public function excluir($id) {
        $this->ambientes->find($id);

        if ($this->ambientes->delete($id)) {
            $mensa .= "Ambiente corretamente excluído";
            $tipo = 1;

        } else {
            $mensa .= "Não foi possível excluir o ambiente";
            $tipo = 0;
        }

        // atribui para variáveis de sessão "flash"
        $this->session->set_flashdata('mensa', $mensa);
        $this->session->set_flashdata('tipo', $tipo);

        // recarrega a view (index)
        redirect('ambientes/listar');
    }
    
    public function alterar($id) {
        $dados['ambiente'] = $this->ambientes->find($id);
        $this->load->view('include/side-menu');
        $this->load->view('ambientes_form_alterar', $dados);
    }

    public function grava_alteracao() {
        $dados = $this->input->post();
        
        $mensa = "";

        if ($this->ambientes->update($dados)) {
            $mensa .="Dados do ambiente alterados corretamente";
            $tipo = 1;
        } else {
            $mensa .= "Dados do ambiente não foram alterados";
            $tipo = 0;
        }

        $this->session->set_flashdata('mensa', $mensa);
        $this->session->set_flashdata('tipo', $tipo);

        redirect('ambientes/listar');
    }
    

} 
?>
