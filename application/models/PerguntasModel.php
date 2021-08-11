<? if (!defined('BASEPATH')) exit('No direct script access allowed');

Class PerguntasModel extends CI_Model {

    public $idPerguntas;
    public $enunciado;
    public $reposta1;
    public $reposta2;
    public $reposta3;
    public $reposta4;
    public $reposta5;

    public function saveNewQuestion($data) 
    {
        if ($this->db->insert("Perguntas", $data)) {
            return $this->db->insert_id();
        }

        return false;
    }

    public function getQuestions($pag = null)
    {
        if ($pag) {
            $limit = 10;
            $offset = 10 * ($pag - 1);
            $query = " LIMIT $offset, $limit ";
        } else {
            $query = "";
        }

        $sql = "SELECT SQL_CALC_FOUND_ROWS
                    *
                FROM Perguntas
                $query";

        $result = $this->db->query($sql);
        $foundRows = $this->db->query("SELECT FOUND_ROWS() as TotalRows");
        
        if ($result) {
            return array(
                'data'    => $result->result(),
                'numRows' => $result->num_rows(),
                'totalRows' => $foundRows->row()->TotalRows
            );
        }

        return false;
    }

    public function getQuestion()
    {
        $sql = "SELECT
                    IdPergunta,
                    Enunciado,
                    Resposta1,
                    Resposta2,
                    Resposta3,
                    Resposta4,
                    Resposta5,
                    RespostaCorreta,
                    Status
                FROM Perguntas
                WHERE IdPergunta = ?";

        $query = $this->db->query($sql,array($this->idPergunta));

        if ($query) {
            return $query->row();
        }

        return false;
    }

    public function updateQuestion($dataUpdate)
    {
        $this->db->where('IdPergunta', $this->idPergunta);
        if ($this->db->update('Perguntas', $dataUpdate)) {
            return true;
        }

        return false;
    }
    
} 