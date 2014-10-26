<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Atividades extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('table');
        $this->load->model('atividadesTipos_model');
        $this->load->model('eventos_model');
        $this->load->model('usuarios_model');
        $this->load->model('atividades_model');
    }

    public function index() {
        $data = array(
            'arquivo' => 'index',
            'controllador' => 'atividades',
            'titulo' => 'login',
        );
        $this->load->view('atividades', $data);
    }

    public function inserir() {
        if ($this->session->userdata('usuario-id') != null) {
            if (element('usuario-permissao', $this->session->all_userdata()) == 1) {
                if($this->input->post('cadastrar') != null) {
                    //Chamando o método que faz as regras de validação
                    $this->validacao_dos_dados();

                    //Irá verificar validar os dados informados no formulario com base nas regras
                    if ($this->form_validation->run() === true) {

                        //Caso não houver nenhum erro de validação, iremos pegar os dados  via POST
                        $dados = elements(array('atividadesNome', 'atividadesDescricao', 'atividadesValor', 'atividadesDataInicio', 'atividadesDataTermino', 'atividadesLocal', 'atividadesVisibilidade', 'atividadesVagas', 'atividadesCargaHoraria'), $this->input->post());

                        $dados['atividadesEventosId'] = $this->input->post('atividadesEventosId');
                        $dados['atividadesTipoId'] = $this->input->post('atividadesTipoId');
                        $dados['atividadesPalestrantesId'] = $this->input->post('atividadesPalestrantesId');
                        //Agora vamos chamar o model atividades para utilizar o método de inserção no banco de dados
                        $this->atividades_model->inserir($dados);

                        //Habilitando um flashdata para notificar o sucesso da inserção
                        $this->session->set_flashdata('cadastro-ok', 'Cadastro efetuado com Sucesso!');

                        //Redirecionando para uma página
                        redirect('atividades/listar');
                    }
                }
                $data = array(
                    'arquivo' => 'inserir',
                    'controllador' => 'atividades',
                    'titulo' => 'Cadastro de Atividades',
                    'atividades' => $this->atividadesTipos_model->listar()->result(),
                    'eventos' => $this->eventos_model->listar()->result(),
                    'usuarios' => $this->usuarios_model->listar_palestrantes()->result(),
                );
                if($this->input->post('atividadesEventosId') != null) {
                    $data['data'] = $this->eventos_model->obter_dataEvento_mostrar_array($this->input->post('atividadesEventosId'));
                }
                $this->load->view('sistema', $data);
            } else {
                $this->session->set_flashdata('sem-permissao', 'É necessário ser administrador para realizar essa ação!');
                redirect('usuarios/login');
            }
        } else {
            $this->session->set_flashdata('retrieve-action', 'É necessário estar logado para realizar esta ação!');
            redirect('usuarios/login');
        }
    }

    public function listar() {
        if ($this->session->userdata('usuario-id') != null) {
            if (element('usuario-permissao', $this->session->all_userdata()) == 1) {

                $data = array(
                    'arquivo' => 'listar',
                    'controllador' => 'atividades',
                    'titulo' => 'Lista de Atividades',
                    'atividades' => $this->atividades_model->listar()->result(),
                );
                $this->load->view('sistema', $data);
            } else {
                $this->session->set_flashdata('sem-permissao', 'É necessário ser administrador para realizar essa ação!');
                redirect('usuarios/login');
            }
        } else {
            $this->session->set_flashdata('retrieve-action', 'É necessário estar logado para realizar esta ação!');
            redirect('usuarios/login');
        }
    }

    public function alterar() {
        if ($this->session->userdata('usuario-id') != null) {
            if (element('usuario-permissao', $this->session->all_userdata()) == 1) {
                if($this->input->post('alterar') != null) {

                //Chamando o metodo que define as regras de validação
                $this->validacao_dos_dados();

                //verificando se os dados informados são validos de acordo com a validação
                if ($this->form_validation->run() === true) {
                    //Se não houver nenhum erro de validação iremos pegar os dados informados
                    $dados = elements(array('atividadesNome', 'atividadesEventosId', 'atividadesPalestrantesId', 'atividadesTipoId', 'atividadesDescricao', 'atividadesValor', 'atividadesDataInicio', 'atividadesDataTermino', 'atividadesLocal', 'atividadesVisibilidade', 'atividadesVagas', 'atividadesCargaHoraria'), $this->input->post());

                    //Chamando o modelo de atividades para salvar no banco de dados as alterações
                    $this->atividades_model->alterar($dados, array('atividadesId' => $this->input->post('atividadesId')));

                    //Criando um flashdata para informar o sucesso na alteração
                    $this->session->set_flashdata('alterar-ok', 'Atividade alterada com sucesso!');

                    //redirecionando para a listagem de atividades
                    redirect('atividades/listar');
                }
                }
                $data = array(
                    'arquivo' => 'alterar',
                    'controllador' => 'atividades',
                    'titulo' => 'Alterar Atividades',
                    'atividades' => $this->atividadesTipos_model->listar()->result(),
                    'eventos' => $this->eventos_model->listar()->result(),
                    'usuarios' => $this->usuarios_model->listar_palestrantes()->result(),
                );
                if($this->input->post('atividadesEventosId') != null) {
                    $data['data'] = $this->eventos_model->obter_dataEvento_mostrar_array($this->input->post('atividadesEventosId'));
                }
                $this->load->view('sistema', $data);
            } else {
                $this->session->set_flashdata('sem-permissao', 'É necessário ser administrador para realizar essa ação!');
                redirect('usuarios/login');
            }
        } else {
            $this->session->set_flashdata('retrieve-action', 'É necessário estar logado para realizar esta ação!');
            redirect('usuarios/login');
        }
    }

    public function deletar() {
        if ($this->session->userdata('usuario-id') != null) {
            if (element('usuario-permissao', $this->session->all_userdata()) == 1) {
                //Verificando se existe uma requisição de deleção
                if ($this->input->post('atividadesId') != null) {
                    //se  houver uma requisição, então será deletado do banco de dados
                    $this->atividades_model->deletar($this->input->post('atividadesId'));

                    //Criando um flashdata para informar o sucesso na alteração
                    $this->session->set_flashdata('deletar-ok', 'Atividade deletada com sucesso!');

                    //redirecionando para a listagem de atividades
                    redirect('atividades/listar');
                }
                $data = array(
                    'arquivo' => 'deletar',
                    'controllador' => 'atividades',
                    'titulo' => 'Deletar Atividade',
                );
                $this->load->view('sistema', $data);
            } else {
                $this->session->set_flashdata('sem-permissao', 'É necessário ser administrador para realizar essa ação!');
                redirect('usuarios/login');
            }
        } else {
            $this->session->set_flashdata('retrieve-action', 'É necessário estar logado para realizar esta ação!');
            redirect('usuarios/login');
        }
    }

    public function validacao_dos_dados() {
        //Criando regras de validação de dados
        $this->form_validation->set_rules('atividadesNome', 'Nome', 'trim|required|max_length[200]|ucwords');
        $this->form_validation->set_rules('atividadesDescricao', 'Descrição', 'trim|required|max_length[150]|ucwords');
        $this->form_validation->set_rules('atividadesLocal', 'Local', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('atividadesDataInicio', 'Data de inicio', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('atividadesDataTermino', 'Data de término', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('atividadesValor', 'Valor', 'trim|required|max_length[5]|numeric');
        $this->form_validation->set_rules('atividadesCargaHoraria', 'Carga Horária', 'trim|required|max_length[4]|numeric');
        $this->form_validation->set_rules('atividadesVagas', 'Vagas', 'trim|required|max_length[4]|numeric');
        $this->form_validation->set_rules('atividadesVisibilidade', 'Visibilidade', 'trim|required');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */