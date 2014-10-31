<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowes');

class AtividadesTipos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function inserir($dados = null) {
        if ($dados != null) {
            //Selecionando o banco de dados e inserindo os dados obtidos pelo parametro
            $this->db->insert('atividadesTipos', $dados);
        }
    }

    public function listar() {
        return $this->db->get('atividadesTipos');
    }

    public function alterar($dados = null, $condicao = null) {
        if ($dados != null && $condicao != null) {
            //dando update passando o nome da tabela, os dados e por fim qual a condição de alteração
            $this->db->update('atividadesTipos', $dados, $condicao);
        }
    }

    public function obter_atividadesTipos_por_id($id = null) {
        if ($id != null) {
            $this->db->where('atividadesTiposId', $id);
            $this->db->limit(1);
            $query = $this->db->get('atividadesTipos');

            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return false;
            }
        }
    }
    
    public function obter_atividadesTipos_por_nome($nome = null) {
        if ($nome != null) {
            $this->db->where('atividadesTiposNome', $nome);
            $this->db->limit(1);
            return $this->db->get('atividadesTipos');

        }
    }
    
    public function deletar($id = null) {
        if($id != null) {
            $this->db->where('atividadesTiposId', $id);
            $this->db->delete('atividadesTipos');
        }
    }

}
