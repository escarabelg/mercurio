<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AtividadesTipos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('table');
        $this->load->model('atividadesTipos_model');
    }

    public function index() {
        $data = array(
            'arquivo' => 'index',
            'controllador' => 'atividadesTipos',
            'titulo' => 'index',
        );
        $this->load->view('sistema', $data);
    }

    public function inserir() {
        if ($this->session->userdata('usuario-id') != null) {
            //Chamando o método que faz as regras de validação
            $this->validacao_dos_dados();

            //Irá verificar validar os dados informados no formulario com base nas regras
            if ($this->form_validation->run() === true) {

                //Caso não houver nenhum erro de validação, iremos pegar os dados  via POST
                $dados = elements(array('atividadesTiposNome'), $this->input->post());

                //Agora vamos chamar o model atividadesTipos para utilizar o método de inserção no banco de dados
                $this->atividadesTipos_model->inserir($dados);

                //Habilitando um flashdata para notificar o sucesso da inserção
                $this->session->set_flashdata('cadastro-ok', 'Cadastro efetuado com Sucesso!');

                //Redirecionando para uma página
                redirect('atividadesTipos/listar');
            }
            $data = array(
                'arquivo' => 'inserir',
                'controllador' => 'atividadesTipos',
                'titulo' => 'Cadastro de Tipos de Atividade',
            );
            $this->load->view('sistema', $data);
        } else {
            $this->session->set_flashdata('retrieve-action', 'É necessário estar logado para realizar esta ação!');
            redirect('usuarios/login');
        }
    }

    public function listar() {
        if ($this->session->userdata('usuario-id') != null) {

            $data = array(
                'arquivo' => 'listar',
                'controllador' => 'atividadesTipos',
                'titulo' => 'Lista de Tipos de Atividade',
                'atividadesTipos' => $this->atividadesTipos_model->listar()->result(),
            );
            $this->load->view('sistema', $data);
         } else {
            $this->session->set_flashdata('retrieve-action', 'É necessário estar logado para realizar esta ação!');
            redirect('usuarios/login');
        }
    }

    public function alterar() {
        if ($this->session->userdata('usuario-id') != null) {

            //Chamando o metodo que define as regras de validação
            $this->validacao_dos_dados();

            //verificando se os dados informados são validos de acordo com a validação
            if ($this->form_validation->run() === true) {
                //Se não houver nenhum erro de validação iremos pegar os dados informados
                $dados = elements(array('atividadesTiposNome'), $this->input->post());

                //Chamando o modelo de atividadesTipospara salvar no banco de dados as alterações
                $this->atividadesTipos_model->alterar($dados, array('atividadesTiposId' => $this->input->post('atividadesTiposId')));

                //Criando um flashdata para informar o sucesso na alteração
                $this->session->set_flashdata('alterar-ok', 'Tipo de Atividade alterado com sucesso!');

                //redirecionando para a listagem de atividadesTipos
                redirect('atividadesTipos/listar');
            }
            $data = array(
                'arquivo' => 'alterar',
                'controllador' => 'atividadesTipos',
                'titulo' => 'Alterar Tipo de Atividade',
            );
            $this->load->view('sistema', $data);
        } else {
            $this->session->set_flashdata('retrieve-action', 'É necessário estar logado para realizar esta ação!');
            redirect('usuarios/login');
        }
    }

    public function deletar() {
        if ($this->session->userdata('usuario-id') != null) {

            //Verificando se existe uma requisição de deleção
            if ($this->input->post('atividadesTiposId') != null) {
                //se  houver uma requisição, então será deletado do banco de dados
                $this->atividadesTipos_model->deletar($this->input->post('atividadesTiposId'));

                //Criando um flashdata para informar o sucesso na alteração
                $this->session->set_flashdata('deletar-ok', 'Tipo de Atividade deletado com sucesso!');

                //redirecionando para a listagem de atividadesTipos
                redirect('atividadesTipos/listar');
            }
            $data = array(
                'arquivo' => 'deletar',
                'controllador' => 'atividadesTipos',
                'titulo' => 'Deletar Tipo de Atividade',
            );
            $this->load->view('sistema', $data);
        } else {
            redirect('usuarios/login');
        }
    }

    public function validacao_dos_dados() {
        //Criando regras de validação de dados
        $this->form_validation->set_rules('atividadesTiposNome', 'Nome', 'trim|required|max_length[200]|ucwords|is_unique[atividadesTipos.atividadesTiposNome]');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */