<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowes');

class AtividadePresenca_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function inserir($dados = null) {
        if ($dados != null) {
            //Selecionando o banco de dados e inserindo os dados obtidos pelo parametro
            $this->db->insert('atividadePresenca', $dados);
        }
    }

    public function listar() {
        return $this->db->get('atividadePresenca');
    }
    public function alterar($dados = null, $condicao = null) {
        if ($dados != null && $condicao != null) {
            //dando update passando o nome da tabela, os dados e por fim qual a condição de alteração
            $this->db->update('atividadePresenca', $dados, $condicao);
        }
    }

    public function obter_atividade_por_id($id = null) {
        if ($id != null) {
            $this->db->where('atividadePresencaId', $id);
            $this->db->limit(1);
            $query = $this->db->get('atividadePresenca');

            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return false;
            }
        }
    }

    public function obter_atividadeTipo_por_atividade($id = null) {
        if ($id != null) {
            $sql = "SELECT * FROM atividadePresenca a JOIN atividadePresencaTipos at ON a.atividadePresencaTipoId = at.atividadePresencaTiposId WHERE a.atividadePresencaId = ?";

            $query = $this->db->query($sql, array($id));

            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return false;
            }
        }
    }

    public function obter_evento_por_atividade($id = null) {
        if ($id != null) {
            $sql = "SELECT * FROM atividadePresenca a JOIN eventos e ON a.atividadePresencaEventosId = e.eventosId WHERE a.atividadePresencaId = ?";

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
            $sql = "SELECT * FROM atividadePresenca a JOIN usuarios u ON a.atividadePresencaPalestrantesId = u.usuariosId WHERE a.atividadePresencaId = ?";

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
            $this->db->where('atividadePresencaId', $id);
            $this->db->delete('atividadePresenca');
        }
    }
    
    public function data() {
        echo "dfffdf";
    }

}
