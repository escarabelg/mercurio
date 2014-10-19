<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowes');

class Atividades_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function inserir($dados = null) {
        if ($dados != null) {
            //Selecionando o banco de dados e inserindo os dados obtidos pelo parametro
            $this->db->insert('atividades', $dados);
        }
    }

    public function listar() {
        return $this->db->get('atividades');
    }

    public function alterar($dados = null, $condicao = null) {
        if ($dados != null && $condicao != null) {
            //dando update passando o nome da tabela, os dados e por fim qual a condição de alteração
            $this->db->update('atividades', $dados, $condicao);
        }
    }

    public function obter_atividade_por_id($id = null) {
        if ($id != null) {
            $this->db->where('atividadesId', $id);
            $this->db->limit(1);
            $query = $this->db->get('atividades');

            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return false;
            }
        }
    }

    public function obter_atividadeTipo_por_atividade($id = null) {
        if ($id != null) {
            $sql = "SELECT * FROM atividades a JOIN atividadesTipos at ON a.atividadesTipoId = at.atividadesTiposId WHERE a.atividadesId = ?";

            $query = $this->db->query($sql, array($id));

            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return false;
            }
        }
    }

    public function listar_por_evento($eventoId) {
        $this->db->where('atividadesEventosId', $eventoId);
        return $this->db->get('atividades');
    }

    public function obter_evento_por_atividade($id = null) {
        if ($id != null) {
            $sql = "SELECT * FROM atividades a JOIN eventos e ON a.atividadesEventosId = e.eventosId WHERE a.atividadesId = ?";

            $query = $this->db->query($sql, array($id));

            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return false;
            }
        }
    }

    public function obter_palestrante_por_atividade($id = null) {
        if ($id != null) {
            $sql = "SELECT * FROM atividades a JOIN usuarios u ON a.atividadesPalestrantesId = u.usuariosId WHERE a.atividadesId = ?";

            $query = $this->db->query($sql, array($id));

            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return false;
            }
        }
    }

    public function deletar($id = null) {
        if ($id != null) {
            $this->db->where('atividadesId', $id);
            $this->db->delete('atividades');
        }
    }

}
