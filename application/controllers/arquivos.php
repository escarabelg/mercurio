
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Arquivos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('table');
        $this->load->model('eventos_model');
        $this->load->model('usuarios_model');
        $this->load->model('atividades_model');
        $this->load->model('arquivos_model');
    }

    public function index() {
        $data = array(
            'arquivo' => 'index',
            'controllador' => 'arquivos',
            'titulo' => 'login',
        );
        $this->load->view('arquivos', $data);
    }

    public function inserir() {
        if ($this->session->userdata('usuario-id') != null) {
            //Chamando o método que faz as regras de validação
            $this->validacao_dos_dados();

            //Irá verificar validar os dados informados no formulario com base nas regras
            if ($this->form_validation->run() === true) {

                //Caso não houver nenhum erro de validação, iremos pegar os dados  via POST
                $dados = elements(array('arquivosCriadorId', 'arquivosEventosId', 'arquivosOrientadorId', 'arquivosTitulo'), $this->input->post());

                //Agora vamos chamar o model arquivos para utilizar o método de inserção no banco de dados
                $this->arquivos_model->inserir($dados, $this->input->post('arquivosFile'));

                //Habilitando um flashdata para notificar o sucesso da inserção
                $this->session->set_flashdata('cadastro-ok', 'Envio efetuado com Sucesso!');

                //Redirecionando para uma página
                redirect('arquivos/listar');
            }
            $data = array(
                'arquivo' => 'inserir',
                'controllador' => 'arquivos',
                'titulo' => 'Envio de Arquivos',
                'usuarios' => $this->usuarios_model->listar()->result(),
                'eventos' => $this->eventos_model->listar()->result(),
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
                'controllador' => 'arquivos',
                'titulo' => 'Lista de Arquivos',
                'eventos' => $this->eventos_model->listar()->result(),
            );
            if ($this->input->post('arquivosEventosId') != null) {
                $data['arquivos'] = $this->arquivos_model->listar_por_evento_total($this->input->post('arquivosEventosId'))->result();
            }

            $this->load->view('sistema', $data);
        } else {
            $this->session->set_flashdata('retrieve-action', 'É necessário estar logado para realizar esta ação!');
            redirect('usuarios/login');
        }
    }

    public function avaliar() {
        if ($this->session->userdata('usuario-id') != null) {

            $data = array(
                'arquivo' => 'avaliar',
                'controllador' => 'arquivos',
                'titulo' => 'Avaliar Arquivos',
                'eventos' => $this->eventos_model->listar()->result(),
            );
            if ($this->input->post('arquivosEventosId') != null) {
                $data['arquivos'] = $this->arquivos_model->listar_por_evento($this->input->post('arquivosEventosId'))->result();
            }

            $this->load->view('sistema', $data);
            if ($this->input->post('arquivosEventosId') != null && $this->input->post('arquivosId') != null) {
                $dados = elements(array('arquivosDescricao', 'arquivosStatus'), $this->input->post());
                $this->arquivos_model->avaliar($dados, array('arquivosId' => $this->input->post('arquivosId')));

                $this->session->set_flashdata('avaliar-ok', 'Artigo avaliado com sucesso!');
                redirect('arquivos/avaliar');
            }
        } else {
            $this->session->set_flashdata('retrieve-action', 'É necessário estar logado para realizar esta ação!');
            redirect('usuarios/login');
        }
    }

    public function deletar() {
        if ($this->session->userdata('usuario-id') != null) {

            //Verificando se existe uma requisição de deleção
            if ($this->input->post('arquivosId') != null) {
                //se  houver uma requisição, então será deletado do banco de dados
                $this->arquivos_model->deletar($this->input->post('arquivosId'));

                //Criando um flashdata para informar o sucesso na alteração
                $this->session->set_flashdata('deletar-ok', 'Arquivo deletado com sucesso!');

                //redirecionando para a listagem de arquivos
                redirect('arquivos/listar');
            }
            $data = array(
                'arquivo' => 'deletar',
                'controllador' => 'arquivos',
                'titulo' => 'Deletar Arquivo',
            );
            $this->load->view('sistema', $data);
        } else {
            $this->session->set_flashdata('retrieve-action', 'É necessário estar logado para realizar esta ação!');
            redirect('usuarios/login');
        }
    }

    public function validacao_dos_dados() {
        //Criando regras de validação de dados
        $this->form_validation->set_rules('arquivosTitulo', 'Titulo', 'trim|required|max_length[200]|ucwords');
        $this->form_validation->set_rules('arquivosFile', 'Arquivo', 'trim|required');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */