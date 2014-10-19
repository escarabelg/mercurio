<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Eventos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('table');
        $this->load->model('eventos_model');
    }

    public function index() {
        $data = array(
            'arquivo' => 'index',
            'controllador' => 'eventos',
            'titulo' => 'login',
        );
        $this->load->view('eventos', $data);
    }

    public function inserir() {
        if ($this->session->userdata('usuario-id') != null) {
            //Chamando o método que faz as regras de validação
            $this->validacao_dos_dados();

            //Irá verificar validar os dados informados no formulario com base nas regras
            if ($this->form_validation->run() === true) {

                //Caso não houver nenhum erro de validação, iremos pegar os dados  via POST
                $dados = elements(array('eventosNome','eventosCriadorId', 'eventosDescricao', 'eventosEmail', 'eventosDataInicio', 'eventosDataTermino', 'eventosLocal', 'eventosCep', 'eventosEndereco', 'eventosBairro', 'eventosNumero', 'eventosEstado', 'eventosCidade', 'eventosValor', 'eventosVisibilidade'), $this->input->post());

                //Agora vamos chamar o model eventos para utilizar o método de inserção no banco de dados
                $this->eventos_model->inserir($dados);

                //Habilitando um flashdata para notificar o sucesso da inserção
                $this->session->set_flashdata('cadastro-ok', 'Cadastro efetuado com Sucesso!');

                //Redirecionando para uma página
                redirect('eventos/listar');
            }
            $data = array(
                'arquivo' => 'inserir',
                'controllador' => 'eventos',
                'titulo' => 'Cadastro de Eventos',
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
                'controllador' => 'eventos',
                'titulo' => 'Lista de Eventos',
                'eventos' => $this->eventos_model->listar()->result(),
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
            $this->validacao_dos_dados_alterar();

            //verificando se os dados informados são validos de acordo com a validação
            if ($this->form_validation->run() === true) {
                //Se não houver nenhum erro de validação iremos pegar os dados informados
                $dados = elements(array('eventosNome', 'eventosDescricao', 'eventosDataInicio', 'eventosDataTermino', 'eventosLocal', 'eventosCep', 'eventosEndereco', 'eventosBairro', 'eventosNumero', 'eventosEstado', 'eventosCidade', 'eventosValor', 'eventosVisibilidade'), $this->input->post());

                //Chamando o modelo de eventos para salvar no banco de dados as alterações
                $this->eventos_model->alterar($dados, array('eventosId' => $this->input->post('eventosId')));

                //Criando um flashdata para informar o sucesso na alteração
                $this->session->set_flashdata('alterar-ok', 'Evento alterado com sucesso!');

                //redirecionando para a listagem de eventos
                redirect('eventos/listar');
            }
            $data = array(
                'arquivo' => 'alterar',
                'controllador' => 'eventos',
                'titulo' => 'Alterar Eventos',
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
            if ($this->input->post('eventosId') != null) {
                //se  houver uma requisição, então será deletado do banco de dados
                $this->eventos_model->deletar($this->input->post('eventosId'));

                //Criando um flashdata para informar o sucesso na alteração
                $this->session->set_flashdata('deletar-ok', 'Evento deletado com sucesso!');

                //redirecionando para a listagem de eventos
                redirect('eventos/listar');
            }
            $data = array(
                'arquivo' => 'deletar',
                'controllador' => 'eventos',
                'titulo' => 'Deletar Evento',
            );
            $this->load->view('sistema', $data);
        } else {
            $this->session->set_flashdata('retrieve-action', 'É necessário estar logado para realizar esta ação!');
            redirect('usuarios/login');
        }
    }

    public function validacao_dos_dados() {
        //Criando regras de validação de dados
        $this->form_validation->set_rules('eventosNome', 'Nome', 'trim|required|max_length[200]|ucwords');
        $this->form_validation->set_rules('eventosDescricao', 'Descrição', 'trim|required|max_length[150]|ucwords');
        $this->form_validation->set_rules('eventosDataInicio', 'Data de inicio', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('eventosDataTermino', 'Data de término', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('eventosCep', 'CEP', 'trim|required|max_length[9]');
        $this->form_validation->set_rules('eventosLocal', 'Local', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('eventosEmail', 'E-mail', 'trim|required|max_length[50]|strtolower|valid_email|is_unique[eventos.eventosEmail]');
        $this->form_validation->set_rules('eventosEndereco', 'Endereço', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('eventosNumero', 'Número', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('eventosCidade', 'Cidade', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('eventosBairro', 'Bairro', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('eventosEstado', 'Estado', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('eventosValor', 'Valor', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('eventosVisibilidade', 'Visibilidade', 'trim|required');
    }

    public function validacao_dos_dados_alterar() {
        //Criando regras de validação de dados
        $this->form_validation->set_rules('eventosNome', 'Nome', 'trim|required|max_length[200]|ucwords');
        $this->form_validation->set_rules('eventosDescricao', 'Descrição', 'trim|required|max_length[150]|ucwords');
        $this->form_validation->set_rules('eventosDataInicio', 'Data de inicio', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('eventosDataTermino', 'Data de término', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('eventosCep', 'CEP', 'trim|required|max_length[9]');
        $this->form_validation->set_rules('eventosLocal', 'Local', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('eventosEndereco', 'Endereço', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('eventosNumero', 'Número', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('eventosCidade', 'Cidade', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('eventosBairro', 'Bairro', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('eventosEstado', 'Estado', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('eventosValor', 'Valor', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('eventosVisibilidade', 'Visibilidade', 'trim|required');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */