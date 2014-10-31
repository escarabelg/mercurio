<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowes');

class Inscricoes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function inserir($dados = null) {
        if ($dados != null) {
            $usuarioId = $this->session->userdata('usuario-id');
            $inscricoes = $this->inscricoes_model->listar()->result();

            $contador = 0;
            foreach ($inscricoes as $linha) {
                if ($linha->inscricoesUsuariosId == $usuarioId && $linha->inscricoesAtividadesId == $dados['inscricoesAtividadesId']) {
                    $contador++;
                }
            }
            if ($contador > 0) {
                return false;
            } else {
                $this->db->insert('inscricoes', $dados);
                return true;
            }
        }
    }

    public function listar() {
        return $this->db->get('inscricoes');
    }

    public function inscricao_total_por_evento($eventosId) {
        if ($eventosId != null) {
            $sql = "SELECT count(i.inscricoesId) as inscricoesTotal FROM inscricoes i JOIN atividades a ON i.inscricoesAtividadesId = a.atividadesId JOIN eventos e ON e.eventosId = a.atividadesEventosId WHERE e.eventosId = ?";
            $this->db->limit(1);
            $query = $this->db->query($sql, array($eventosId));


            if ($query->num_rows == 1) {
                return $query->row();
            }
        }
    }

    public function obter_inscricao_por_atividade_e_usuario($usuarioId, $atividadeId) {
        if ($usuarioId != null && $atividadeId != null) {
            $this->db->where('inscricoesAtividadesId', $atividadeId);
            $this->db->where('inscricoesUsuariosId', $usuarioId);
            $this->db->limit(1);
            $query = $this->db->get('inscricoes');

            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return false;
            }
        }
    }

    public function obter_inscricao_por_usuario($usuarioId) {
        if ($usuarioId != null) {
            $this->db->where('inscricoesUsuariosId', $usuarioId);
            $this->db->limit(1);
            $query = $this->db->get('inscricoes');

            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return false;
            }
        }
    }

    public function obter_inscricao_por_atividade($atividadeId) {
        if ($atividadeId != null) {
            $this->db->where('inscricoesAtividadesId', $atividadeId);
            $this->db->limit(1);
            $query = $this->db->get('inscricoes');

            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return false;
            }
        }
    }

    public function obter_inscricoes_por_id($id = null) {
        if ($id != null) {
            $this->db->where('inscricoesId', $id);
            $this->db->limit(1);
            $query = $this->db->get('inscricoes');

            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return false;
            }
        }
    }

    public function deletar($id = null) {
        if ($id != null) {
            $this->db->where('inscricoesId', $id);
            $this->db->delete('inscricoes');
        }
    }

}
