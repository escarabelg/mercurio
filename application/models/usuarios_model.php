<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowes');

class Usuarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function inserir($dados = null) {
        if ($dados != null) {
            //Selecionando o banco de dados e inserindo os dados obtidos pelo parametro
            $this->db->insert('usuarios', $dados);
        }
    }

    public function autenticar($dados = null) {
        if ($dados != null) {
            //Passando parametros de verificação com base no email e senha informados
            $this->db->where(array('usuariosEmail' => $dados['usuariosEmail']));
            $this->db->where(array('usuariosSenha' => $dados['usuariosSenha']));
            //Definimos que queremos somente retorne 1 registro, 
            $this->db->limit(1);
            // definimos que tabela iremos pesquisar e salvamos em uma query o resultado
            $query = $this->db->get('usuarios');

            //Verificando se realmente existe um usuario com email e senha informados
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function deletar($usuariosId = null) {
        if ($usuariosId != null) {
            $this->db->delete('usuarios', $usuariosId);
        }
    }

    public function alterar($dados = null, $condicao = null) {
        if ($dados != null && $condicao != null) {
            $this->db->update('usuarios', $dados, $condicao);
        }
    }

    public function listar() {
        return $this->db->get('usuarios');
    }

    public function obter_usuario_por_id($usuariosId = null) {
        if ($usuariosId != null) {
            //Passando como parametro de pesquisa o usuarios
            $this->db->where('usuariosId', $usuariosId);
            //Retornar somente 1 registro da pesquisa
            $this->db->limit(1);
            //Retornar o resultado da pesquisa no banco de dados
            return $this->db->get('usuarios');
        } else {
            return false;
        }
    }
    
    public function obter_usuario_por_nome($nome = null) {
        if ($nome != null) {
            //Passando como parametro de pesquisa o usuarios
            $this->db->where('usuariosNome', $nome);
            //Retornar somente 1 registro da pesquisa
            $this->db->limit(1);
            //Retornar o resultado da pesquisa no banco de dados
            return $this->db->get('usuarios');
        } else {
            return false;
        }
    }
    
    
    public function listar_palestrantes() {
        $query = $this->db->get('usuarios');

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function obter_usuario_por_email($dados = null) {
        if ($dados != null) {
            //Passando como parametro de pesquisa o usuarios
            $this->db->where('usuariosEmail', $dados['usuariosEmail']);
            //Retornar somente 1 registro da pesquisa
            $this->db->limit(1);
            //Retornar o resultado da pesquisa no banco de dados
            return $this->db->get('usuarios')->result();
        } else {
            return false;
        }
    }

}
