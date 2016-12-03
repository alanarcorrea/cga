<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Moveis extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Moveis_model', 'moveis');
        $this->load->model('Ambientes_model', 'ambientes');
    }

    public function listar($args) {
        if($args == "destaques"){
            $dados['destaques'] = $this->moveis->select_destaques();
            $this->load->view('include/side-menu');
            $this->load->view('moveis_destaques', $dados);
        }
        if($args == "modulos"){
            $dados['moveis'] = $this->moveis->select_moveis();
            $this->load->view('include/side-menu');
            $this->load->view('moveis_modulos', $dados);
        }
        if($args == "desativados"){
            $dados['desativados'] = $this->moveis->select_desativados();
            $this->load->view('include/side-menu');
            $this->load->view('moveis_desativados', $dados);
        }
    }

    public function destacar($id) {
        $this->moveis->destacar($id);
        redirect('moveis/listar');
    }

    public function esconder($id) {
        $this->moveis->esconder($id);
        redirect('moveis/listar');
    }

    public function ativar($id) {
        $this->moveis->ativar($id);
        redirect('moveis/listar');
    }
    
     public function excluir($id) {
        $this->moveis->delete($id);
        redirect('moveis/listar');
    }

    public function desativar($id) {
        $this->moveis->desativar($id);
        redirect('moveis/listar');
    }

    public function cadastrar() {
        $dados['moveis'] = $this->moveis->select();
        $dados['ambientes'] = $this->ambientes->select();
        $this->load->view('include/side-menu');
        $this->load->view('moveis_form_cadastro', $dados);
    }

    public function grava_cadastro() {
        // recebe os dados do formulário
        $dados['descricao'] = $this->input->post('descricao');
        $dados['altura'] = $this->input->post('altura');
        $dados['largura'] = $this->input->post('largura');
        $dados['profundidade'] = $this->input->post('profundidade');
        $dados['preco'] = $this->input->post('preco');
        $dados['ambientes_id'] = $this->input->post('ambientes_id');
        $dados['codigo'] = rand();
        $fotos[] = 0;

        if ($this->moveis->insert($dados)) {
            $lastId =$this->moveis->last();
            
            if (isset($_POST['upload'])) {

                //INFO IMAGEM
                $file = $_FILES['foto'];
                $numFile = count(array_filter($file['name']));

                //PASTA
                $folder = 'fotos';

                //REQUISITOS
                $permite = array('image/jpeg', 'image/png');
                $maxSize = 1024 * 1024 * 5;

                //MENSAGENS
                $msg = array();
                $errorMsg = array(
                    1 => 'O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.',
                    2 => 'O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário HTML',
                    3 => 'o upload do arquivo foi feito parcialmente',
                    4 => 'Não foi feito o upload do arquivo'
                );

                if ($numFile <= 0) {
                    echo 'Selecione uma Imagem!';
                } else {
                    for ($i = 0; $i < $numFile; $i++) {
                        $name = $file['name'][$i];
                        $type = $file['type'][$i];
                        $size = $file['size'][$i];
                        $error = $file['error'][$i];
                        $tmp = $file['tmp_name'][$i];

                        $extensao = @end(explode('.', $name));
                        $novoNome = rand() . ".$extensao";
                        $sql = "INSERT INTO fotografias(descricao, moveis_id) VALUES ('$novoNome', $lastId)";
                        $query = $this->db->query($sql);


                        if ($error != 0)
                            $msg[] = "<b>$name :</b> " . $errorMsg[$error];
                        else if (!in_array($type, $permite))
                            $msg[] = "<b>$name :</b> Erro imagem não suportada!";
                        else if ($size > $maxSize)
                            $msg[] = "<b>$name :</b> Erro imagem ultrapassa o limite de 5MB";
                        else {

                            if (move_uploaded_file($tmp, $folder . '/' . $novoNome))
                                $msg[] = "<b>$name :</b> Upload Realizado com Sucesso!";
                            else
                                $msg[] = "<b>$name :</b> Desculpe! Ocorreu um erro...";
                        }

                        foreach ($msg as $pop) {
                            echo $pop . '<br>';
                        }
                    }
                }

                $mensa = "Módulo corretamente cadastrado";
                $tipo = 1;
            }else{
                $mensa = "Módulo Cadastrado. Erro no envio/cadastro de";
                $tipo = 0;
            }
        } else {
                $mensa = "Módulo Não Cadastrado.";
                $tipo = 0;
        }
        // atribui para variáveis de sessão "flash"
        $this->session->set_flashdata('mensa', $mensa);
        $this->session->set_flashdata('tipo', $tipo);

        // recarrega a view (index)
        redirect(base_url('moveis/listar_modulos'));
    }



public function lastId(){
    $lastId =$this->moveis->last();
    echo $lastId;
}

//configura codigo modulo
//        $ambiente_id = $dados['ambientes_id'];
//        $sigla = $this->ambientes->find_sigla($ambiente_id);
//        $numero = 1 + $this->moveis->conta_moveis($sigla);
//        $codigo = $sigla . "." . $numero;
//        $dados['codigo'] = $codigo;
// define as configurações para upload da foto
}
?>


