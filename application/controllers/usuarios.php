<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('table');
        $this->load->model('usuarios_model');
        $this->load->model('atividades_model');
    }

    public function index() {
        $id = $this->session->userdata('usuario-id');
        $data = array(
            'arquivo' => 'index',
            'controllador' => 'usuarios',
            'titulo' => 'INDEX',
            'atividades' => $this->atividades_model->listar_por_usuario($id)->result(),
        );
        $this->load->view('sistema', $data);
    }

    public function inserir() {

        //Chamando o método que faz as regras de validação
        $this->validacao_dos_dados_inserir();

        //Irá verificar validar os dados informados no formulario com base nas regras
        if ($this->form_validation->run() === true) {

            //Caso não houver nenhum erro de validação, iremos pegar os dados  via POST
            $dados = elements(array('usuariosNome', 'usuariosEmail', 'usuariosSenha', 'usuariosCep', 'usuariosCpf'), $this->input->post());

            //Vamos hashear em MD5 a senha para maior segurança e tal '-'
            $dados['usuariosSenha'] = $dados['usuariosSenha'];

            //Agora vamos chamar o model usuario para utilizar o método de inserção no banco de dados
            $this->usuarios_model->inserir($dados);

            //Habilitando um flashdata para notificar o sucesso da inserção
            $this->session->set_flashdata('cadastro-ok', 'Cadastro Efetuado com Sucesso!');

            //Redirecionando para uma página
            redirect('usuarios/login');
        }
        $data = array(
            'arquivo' => 'inserir',
            'controllador' => 'usuarios',
            'titulo' => 'Cadastro de Usuários',
        );
        $this->load->view('sistema', $data);
    }

    public function alterar() {
        //Verificando se o usuario está logado se estiver ele entra na condição abaixo
        if (element('usuario-id', $this->session->all_userdata()) != null) {
            if (element('usuario-permissao', $this->session->all_userdata()) == 1) {

                //Chamando o metodo que faz as regras de validação
                $this->validacao_dos_dados_alterar();


                //verificando se possui algum erro na validação
                if ($this->form_validation->run() === true) {
                    //caso não houver erro pegamos os dados 
                    $dados = elements(array('usuariosNome', 'usuariosCpf', 'usuariosCep', 'usuariosDataDeNascimento', 'usuariosTitulacoes', 'usuariosEndereco', 'usuariosBairro', 'usuariosNumero', 'usuariosEstado', 'usuariosCidade'), $this->input->post());

                    //E atualizamos os dados no banco
                    $this->usuarios_model->alterar($dados, array('usuariosId' => $this->input->post('usuariosId')));


                    $this->session->set_flashdata('alterar-ok', 'O usuário foi alterado com sucesso!');

                    redirect('usuarios/listar');
                }
                $data = array(
                    'arquivo' => 'alterar',
                    'controllador' => 'usuarios',
                    'titulo' => 'login',
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

    public function listar() {
        //Verificando se o usuario está logado se estiver ele entra na condição abaixo
        if (element('usuario-id', $this->session->all_userdata()) != null) {
            if (element('usuario-permissao', $this->session->all_userdata()) == 1) {
                $data = array(
                    'arquivo' => 'listar',
                    'controllador' => 'usuarios',
                    'titulo' => 'Listar Dados',
                    'usuarios' => $this->usuarios_model->listar()->result(),
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

    public function deletar() {
        //Verificando se o usuario está logado se estiver ele entra na condição abaixo
        if (element('usuario-id', $this->session->all_userdata()) != null) {
            if (element('usuario-permissao', $this->session->all_userdata()) == 1) {
                //Verificando se existe essa requisição no post
                if ($this->input->post('usuariosId') > 0) {
                    //Caso exista mesmo uma requisição será chamado o metodo de deleção do modelo de usuarios
                    $this->usuarios_model->deletar(array('usuariosId' => $this->input->post('usuariosId')));

                    //Habilitando um flashdata para notificar o sucesso do login
                    $this->session->set_flashdata('deletar-ok', 'O usuário foi deletado com sucesso!');

                    redirect('usuarios/listar');
                }
                $data = array(
                    'arquivo' => 'deletar',
                    'controllador' => 'usuarios',
                    'titulo' => 'Deletar Usuário',
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

    public function login() {

        //Metodo que irá definir os padrões de validação
        $this->validacao_login();

        //Irá verificar validar os dados informados no formulario com base nas regras
        if ($this->form_validation->run() === true) {

            //Caso não houver nenhum erro de validação, iremos pegar os dados  via POST
            $dados = elements(array('usuariosEmail', 'usuariosSenha'), $this->input->post());

            //Agora vamos chamar o model usuario para utilizar o método de inserção no banco de dados
            if ($this->usuarios_model->autenticar($dados)) {
                //Caso não houver nenhum erro na autenticação iremos pegar o usuarios do banco de dados
                $dados = $this->usuarios_model->obter_usuario_por_email(array('usuariosEmail' => $dados['usuariosEmail']));

                foreach ($dados as $row) {
                    echo $dados['usuariosEmail'] = $row->usuariosEmail;
                    echo $dados['usuariosId'] = $row->usuariosId;
                    echo $dados['usuariosNome'] = $row->usuariosNome;
                    echo $dados['usuariosPermissao'] = $row->usuariosPermissao;
                }

                //vamos criar uma array para pegar salvar os dados que pegamos na pesquisa
                $newdata = array(
                    'usuario-id' => $dados['usuariosId'],
                    'usuario-email' => $dados['usuariosEmail'],
                    'usuario-nome' => $dados['usuariosNome'],
                    'usuario-permissao' => $dados['usuariosPermissao'],
                    'logged_in' => TRUE
                );

                //Criamos uma sessão com base nos dados que informei no #newdata
                $this->session->set_userdata($newdata);

                //Habilitando um flashdata para notificar o sucesso do login
                $this->session->set_flashdata('login-ok', 'Login Efetuado com Sucesso!');

                //Redirecionando para uma página
                redirect('usuarios/listar');
            } else {
                //Caso o usuario não exista no banco de dados
                //Habilitando um flashdata para notificar o erro do login
                $this->session->set_flashdata('login-erro', 'Email e/ou Senha estão incorretos!');

                //Redirecionando para uma página
                redirect('usuarios/login');
            }
        }

        $data = array(
            'arquivo' => 'login',
            'controllador' => '',
            'titulo' => 'Login',
        );

        $this->load->view('sistema', $data);
    }

    public function logout() {
        //Limpando a sessão
        $this->session->sess_destroy();

        //Habilitando um flashdata para notificar o logout
        $this->session->set_flashdata('logout-ok', 'Logout efetuado com sucesso');

        //Redirecionando para uma página
        redirect('usuarios/login');

        $data = array(
            'arquivo' => 'login',
            'controllador' => '',
            'titulo' => 'logout',
        );
        $this->load->view('sistema', $data);
    }

    public function validacao_login() {
        $this->form_validation->set_rules('usuariosEmail', 'E-mail', 'trim|required|max_length[50]|strtolower|valid_email');
        $this->form_validation->set_rules('usuariosSenha', 'Senha', 'trim|required|strtolower');
    }

    public function validacao_dos_dados_inserir() {
        //Criando regras de validação de dados
        $this->form_validation->set_rules('usuariosNome', 'Nome Completo', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('usuariosCpf', 'CPF', 'trim|required|max_length[14]');
        $this->form_validation->set_rules('usuariosCep', 'CEP', 'trim|required|max_length[9]');
        $this->form_validation->set_rules('usuariosEmail', 'E-mail', 'trim|required|max_length[50]|strtolower|valid_email|is_unique[usuarios.usuariosEmail]');
        $this->form_validation->set_rules('usuariosSenha', 'Senha', 'trim|required|strtolower');
        $this->form_validation->set_rules('usuariosSenha2', 'Repita a Senha', 'trim|required|strtolower|matches[usuariosSenha]');
    }

    public function validacao_dos_dados_alterar() {
        //Criando regras de validação de dados
        $this->form_validation->set_rules('usuariosNome', 'Nome Completo', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('usuariosCpf', 'CPF', 'trim|required|max_length[14]');
        $this->form_validation->set_rules('usuariosCep', 'CEP', 'trim|required|max_length[9]');
        $this->form_validation->set_rules('usuariosDataDeNascimento', 'Data de Nascimento', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('usuariosTitulacoes', 'Titulações', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('usuariosEndereco', 'Endereço', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('usuariosNumero', 'Número', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('usuariosCidade', 'Cidade', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('usuariosBairro', 'Bairro', 'trim|required|max_length[50]|ucwords');
        $this->form_validation->set_rules('usuariosEstado', 'Estado', 'trim|required|max_length[50]|ucwords');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
