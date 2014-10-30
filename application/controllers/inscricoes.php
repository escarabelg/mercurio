<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inscricoes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('table');
        $this->load->model('atividades_model');
        $this->load->model('eventos_model');
        $this->load->model('usuarios_model');
        $this->load->model('inscricoes_model');
    }

    public function index() {
        $data = array(
            'arquivo' => 'index',
            'controllador' => 'inscricoes',
            'titulo' => 'INDEX',
        );
        $this->load->view('inscricoes', $data);
    }

    public function inserir() {
        if ($this->session->userdata('usuario-id') != null) {

            //Chamando o método que faz as regras de validação
            //Irá verificar validar os dados informados no formulario com base nas regras
            if ($this->input->post('inscricoesEventosId') != null && $this->input->post('inscricoesAtividadesId') != null) {

                //Caso não houver nenhum erro de validação, iremos pegar os dados  via POST
                $dados = elements(array('inscricoesAtividadesId', 'inscricoesUsuariosId', 'inscricoesStatus'), $this->input->post());
                $dados['inscricoesStatus'] = 'A';
                //Agora vamos chamar o model inscricoes para utilizar o método de inserção no banco de dados
                if ($this->inscricoes_model->inserir($dados) == true) {

                    //Habilitando um flashdata para notificar o sucesso da inserção
                    $this->session->set_flashdata('cadastro-ok', 'Inscrição efetuada com Sucesso!');

                    //Redirecionando para uma página
                    redirect('inscricoes/listar');
                } else {
                    //Habilitando um flashdata para notificar o sucesso da inserção
                    $this->session->set_flashdata('cadastro-erro', 'Você já está inscrito nesta atividade!');

                    //Redirecionando para uma página
                    redirect('inscricoes/listar');
                }
            }


            $data = array(
                'arquivo' => 'inserir',
                'controllador' => 'inscricoes',
                'titulo' => 'Cadastro de Atividades',
                'eventos' => $this->eventos_model->listar()->result(),
            );
            if ($this->input->post('inscricoesEventosId') != NULL) {
                $data['atividades'] = $this->atividades_model->listar_por_evento($this->input->post('inscricoesEventosId'))->result();
            }

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
                'controllador' => 'inscricoes',
                'titulo' => 'Lista de Atividades',
                'inscricoes' => $this->inscricoes_model->listar()->result(),
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
                $dados = elements(array('inscricoesNome', 'inscricoesEventosId', 'inscricoesPalestrantesId', 'inscricoesTipoId', 'inscricoesDescricao', 'inscricoesValor', 'inscricoesDataInicio', 'inscricoesDataTermino', 'inscricoesLocal', 'inscricoesVisibilidade', 'inscricoesVagas', 'inscricoesCargaHoraria'), $this->input->post());

                //Chamando o modelo de inscricoes para salvar no banco de dados as alterações
                $this->inscricoes_model->alterar($dados, array('inscricoesId' => $this->input->post('inscricoesId')));

                //Criando um flashdata para informar o sucesso na alteração
                $this->session->set_flashdata('alterar-ok', 'Inscrição alterada com sucesso!');

                //redirecionando para a listagem de inscricoes
                redirect('inscricoes/listar');
            }
            $data = array(
                'arquivo' => 'alterar',
                'controllador' => 'inscricoes',
                'titulo' => 'Alterar Atividades',
                'inscricoes' => $this->inscricoesTipos_model->listar()->result(),
                'eventos' => $this->eventos_model->listar()->result(),
                'usuarios' => $this->usuarios_model->listar_palestrantes()->result(),
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
            if ($this->input->post('inscricoesId') != null) {
                //se  houver uma requisição, então será deletado do banco de dados
                $this->inscricoes_model->deletar($this->input->post('inscricoesId'));

                //Criando um flashdata para informar o sucesso na alteração
                $this->session->set_flashdata('deletar-ok', 'Inscrição deletada com sucesso!');

                //redirecionando para a listagem de inscricoes
                redirect('inscricoes/listar');
            }
            $data = array(
                'arquivo' => 'deletar',
                'controllador' => 'inscricoes',
                'titulo' => 'Deletar Atividade',
            );
            $this->load->view('sistema', $data);
        } else {
            $this->session->set_flashdata('retrieve-action', 'É necessário estar logado para realizar esta ação!');
            redirect('usuarios/login');
        }
    }

    public function validacao_dos_dados() {
        //Criando regras de validação de dados
        $this->form_validation->set_rules('inscricoesNome', 'Nome', 'trim|required|max_length[200]|ucwords');
        $this->form_validation->set_rules('inscricoesDescricao', 'Descrição', 'trim|required|max_length[150]|ucwords');
        $this->form_validation->set_rules('inscricoesLocal', 'Local', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('inscricoesDataInicio', 'Data de inicio', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('inscricoesDataTermino', 'Data de término', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('inscricoesValor', 'Valor', 'trim|required|max_length[5]|numeric');
        $this->form_validation->set_rules('inscricoesCargaHoraria', 'Carga Horária', 'trim|required|max_length[4]|numeric');
        $this->form_validation->set_rules('inscricoesVagas', 'Vagas', 'trim|required|max_length[4]|numeric');
        $this->form_validation->set_rules('inscricoesVisibilidade', 'Visibilidade', 'trim|required');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */