<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowes');

class Atividades_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('inscricoes_model');
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
    
    public function listar_por_usuario($usuarioId) {
        $sql = "SELECT * FROM atividades a JOIN inscricoes i ON a.atividadesId = i.inscricoesAtividadesId  JOIN usuarios u ON u.usuariosId = i.inscricoesUsuariosId WHERE a.atividadesVisibilidade = 'S' AND u.usuariosId = ?";
        return $this->db->query($sql, $usuarioId);
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

    public function obter_dataAtividade_mostrar_array($atividadesId = null) {
        if ($atividadesId != null) {
            $this->db->where("atividadesId", $atividadesId);
            $query = $this->db->get("atividades");

            if ($query->num_rows() > 0) {
                $diaInicio = substr($query->row()->atividadesDataInicio, -2);
                $diaTermino = substr($query->row()->atividadesDataTermino, -2);
                $ano_mes = substr($query->row()->atividadesDataInicio, 0, 8);
                $totalDeDias = $diaTermino - $diaInicio;
                $dataDaAtividade = array();


                for ($i = 0; $i <= $totalDeDias; $i++) {
                    if ($i == 0) {
                        $dataDaAtividade[$i] = $ano_mes . $diaInicio;
                    }
                    if (strlen($diaInicio) == 2) {
                        $dataDaAtividade[$i] = $ano_mes . $diaInicio++;
                    } else {
                        $dataDaAtividade[$i] = $ano_mes . "0" . $diaInicio++;
                    }
                }
                return $dataDaAtividade;
            } else {
                return false;
            }
        }
    }

}
