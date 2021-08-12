<? if (!defined('BASEPATH')) exit('No direct script access allowed');

Class GamesModel extends CI_Model {

    public $idGame;
    public $idUser;
    public $score;
    public $gametime;

    public function saveNewGame($data) 
    {
        if ($this->db->insert("games", $data)) {
            return $this->db->insert_id();
        }

        return false;
    }

    public function getGames($pag = null)
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
                FROM games
                ORDER BY score DESC, gametime ASC
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

    public function getGamesForScore()
    {
        $sql = "SELECT SQL_CALC_FOUND_ROWS
                    *
                FROM games
                ORDER BY score DESC, gametime ASC";

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