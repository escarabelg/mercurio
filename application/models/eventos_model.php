<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowes');

class Eventos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function inserir($dados = null) {
        if ($dados != null) {
            //Selecionando o banco de dados e inserindo os dados obtidos pelo parametro
            $this->db->insert('eventos', $dados);
        }
    }

    public function listar() {
        return $this->db->get('eventos');
    }

    public function alterar($dados = null, $condicao = null) {
        if ($dados != null && $condicao != null) {
            //dando update passando o nome da tabela, os dados e por fim qual a condição de alteração
            $this->db->update('eventos', $dados, $condicao);
        }
    }

    public function obter_evento_por_id($id = null) {
        if ($id != null) {
            $this->db->where('eventosId', $id);
            $this->db->limit(1);
            $query = $this->db->get('eventos');

            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return false;
            }
        }
    }

    public function obter_dataEvento_mostrar_array($eventosId = null) {
        if ($eventosId != null) {
            $this->db->where("eventosId", $eventosId);
            $query = $this->db->get("eventos");

            if ($query->num_rows() > 0) {
                $diaInicio = substr($query->row()->eventosDataInicio, -2);
                $diaTermino = substr($query->row()->eventosDataTermino, -2);
                $ano_mes = substr($query->row()->eventosDataInicio, 0, 8);
                $totalDeDias = $diaTermino - $diaInicio;
                $dataDoEvento = array();


                for ($i = 0; $i <= $totalDeDias; $i++) {
                    if ($i == 0) {
                        $dataDoEvento[$i] = $ano_mes . $diaInicio;
                    }
                    if (strlen($diaInicio) == 2) {
                        $dataDoEvento[$i] = $ano_mes . $diaInicio++;
                    } else {
                        $dataDoEvento[$i] = $ano_mes . "0" . $diaInicio++;
                    }
                }
                return $dataDoEvento;
            } else {
                return false;
            }
        }
    }
    
    public function deletar($id = null) {
        if ($id != null) {
            $this->db->where('eventosId', $id);
            $this->db->delete('eventos');
        }
    }

}
