<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowes');

class Arquivos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->helper('file');
    }

    public function inserir($dados = null, $arquivo = null) {
        if ($dados != null && $arquivo != null) {
            //Selecionando o banco de dados e inserindo os dados obtidos pelo parametro
            
            
            if (!write_file($arquivo)) {
                return false;
            } else {
                $dados['arquivosFile'] = base_url().$arquivo;
                $this->db->insert('arquivos', $dados);
            }
            
        }
    }

    public function listar() {
        return $this->db->get('arquivos');
    }

    public function listar_por_evento($eventoId) {
        $this->db->where('arquivosEventosId',$eventoId);
        $this->db->where('arquivosStatus', 'P');
        return $this->db->get('arquivos');
    }
    
    public function listar_por_evento_total($eventoId) {
        $this->db->where('arquivosEventosId',$eventoId);
        return $this->db->get('arquivos');
    }
    
    public function avaliar($dados = null, $condicao = null) {
        if ($dados != null && $condicao != null) {
            //dando update passando o nome da tabela, os dados e por fim qual a condição de alteração
            $this->db->update('arquivos', $dados, $condicao);
        }
    }

    public function obter_arquivo_por_id($id = null) {
        if ($id != null) {
            $this->db->where('arquivosId', $id);
            $this->db->limit(1);
            $query = $this->db->get('arquivos');

            if ($query->num_rows() > 0) {
                return $query->row();
            } else {
                return false;
            }
        }
    }

    public function deletar($id = null) {
        if ($id != null) {
            $this->db->where('arquivosId', $id);
            $this->db->delete('arquivos');
        }
    }

}
