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
    
} 