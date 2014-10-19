<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AtividadePresenca extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('table');
        $this->load->model('atividadePresenca_model');
        $this->load->model('atividades_model');
        $this->load->model('eventos_model');
        $this->load->model('inscricoes_model');
        $this->load->model('usuarios_model');
    }

    public function index() {
        $data = array(
            'arquivo' => 'index',
            'controllador' => 'atividadePresenca',
            'titulo' => 'login',
        );
        $this->load->view('atividadePresenca', $data);
    }

    public function inserir() {
        if ($this->session->userdata('usuario-id') != null) {
            if (element('usuario-permissao', $this->session->all_userdata()) == 1) {
                if ($this->input->post('cadastrar') != null) {
                    //Chamando o método que faz as regras de validação
                    //Caso não houver nenhum erro de validação, iremos pegar os dados  via POST
                    $dados = elements(array('atividadePresencaData', 'atividadePresencaUsuariosId', 'atividadePresencaAtividadeId', 'atividadePresencaIs'), $this->input->post());

                    //Agora vamos chamar o model atividadePresenca para utilizar o método de inserção no banco de dados
                    $this->atividadePresenca_model->inserir($dados);

                    //Habilitando um flashdata para notificar o sucesso da inserção
                    $this->session->set_flashdata('cadastro-ok', 'Cadastro efetuado com Sucesso!');

                    //Redirecionando para uma página
                    redirect('atividadePresenca/listar');
                }
                $data = array(
                    'arquivo' => 'inserir',
                    'controllador' => 'atividadePresenca',
                    'titulo' => 'Registro de Presença de Atividades',
                    'atividades' => $this->atividades_model->listar()->result(),
                    'eventos' => $this->eventos_model->listar()->result(),
                    'inscricoes' => $this->inscricoes_model->listar()->result(),
                );
                $this->load->view('sistema', $data);
            } else {
                $this->session->set_flashdata('sem-permissao', 'É necessário ser administrador para realizar essa ação!');
                redirect('usuarios/login');
            }
        } else {
            redirect('usuarios/login');
        }
    }

    public function listar() {
        if ($this->session->userdata('usuario-id') != null) {
            if (element('usuario-permissao', $this->session->all_userdata()) == 1) {

                $data = array(
                    'arquivo' => 'listar',
                    'controllador' => 'atividadePresenca',
                    'titulo' => 'Lista de Atividades',
                    'atividadePresenca' => $this->atividadePresenca_model->listar()->result(),
                );
                $this->load->view('sistema', $data);
            } else {
                $this->session->set_flashdata('sem-permissao', 'É necessário ser administrador para realizar essa ação!');
                redirect('usuarios/login');
            }
        }
    }

    public function alterar() {
        if ($this->session->userdata('usuario-id') != null) {
            if (element('usuario-permissao', $this->session->all_userdata()) == 1) {
                //Chamando o metodo que define as regras de validação
                $this->validacao_dos_dados();

                //verificando se os dados informados são validos de acordo com a validação
                if ($this->form_validation->run() === true) {
                    //Se não houver nenhum erro de validação iremos pegar os dados informados
                    $dados = elements(array('atividadePresencaNome', 'atividadePresencaEventosId', 'atividadePresencaPalestrantesId', 'atividadePresencaTipoId', 'atividadePresencaDescricao', 'atividadePresencaValor', 'atividadePresencaDataInicio', 'atividadePresencaDataTermino', 'atividadePresencaLocal', 'atividadePresencaVisibilidade', 'atividadePresencaVagas', 'atividadePresencaCargaHoraria'), $this->input->post());

                    //Chamando o modelo de atividadePresenca para salvar no banco de dados as alterações
                    $this->atividadePresenca_model->alterar($dados, array('atividadePresencaId' => $this->input->post('atividadePresencaId')));

                    //Criando um flashdata para informar o sucesso na alteração
                    $this->session->set_flashdata('alterar-ok', 'Atividade alterada com sucesso!');

                    //redirecionando para a listagem de atividadePresenca
                    redirect('atividadePresenca/listar');
                }
                $data = array(
                    'arquivo' => 'alterar',
                    'controllador' => 'atividadePresenca',
                    'titulo' => 'Alterar Atividades',
                    'atividadePresenca' => $this->atividadePresencaTipos_model->listar()->result(),
                    'eventos' => $this->eventos_model->listar()->result(),
                    'usuarios' => $this->usuarios_model->listar_palestrantes()->result(),
                );
                $this->load->view('sistema', $data);
            } else {
                $this->session->set_flashdata('sem-permissao', 'É necessário ser administrador para realizar essa ação!');
                redirect('usuarios/login');
            }
        } else {
            redirect('usuarios/login');
        }
    }

    public function deletar() {
        if ($this->session->userdata('usuario-id') != null) {
            if (element('usuario-permissao', $this->session->all_userdata()) == 1) {
                //Verificando se existe uma requisição de deleção
                if ($this->input->post('atividadePresencaId') != null) {
                    //se  houver uma requisição, então será deletado do banco de dados
                    $this->atividadePresenca_model->deletar($this->input->post('atividadePresencaId'));

                    //Criando um flashdata para informar o sucesso na alteração
                    $this->session->set_flashdata('deletar-ok', 'Atividade deletada com sucesso!');

                    //redirecionando para a listagem de atividadePresenca
                    redirect('atividadePresenca/listar');
                }
                $data = array(
                    'arquivo' => 'deletar',
                    'controllador' => 'atividadePresenca',
                    'titulo' => 'Deletar Atividade',
                );
                $this->load->view('sistema', $data);
            } else {
                $this->session->set_flashdata('sem-permissao', 'É necessário ser administrador para realizar essa ação!');
                redirect('usuarios/login');
            }
        } else {
            redirect('usuarios/login');
        }
    }

    public function validacao_dos_dados() {
        //Criando regras de validação de dados
        $this->form_validation->set_rules('atividadePresencaData', 'Data', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('atividadePresencaIs', 'Status', 'trim|required|max_length[1]');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */