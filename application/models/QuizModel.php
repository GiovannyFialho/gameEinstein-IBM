<? if (!defined('BASEPATH')) exit('No direct script access allowed');

Class QuizModel extends CI_Model {

    public $idConfigQuiz;
    public $dataHoraInicioInscricao;
    public $dataHoraInicioQuiz;

    public function saveNewQuestion($data) 
    {
        if ($this->db->insert("ConfigQuiz", $data)) {
            return $this->db->insert_id();
        }

        return false;
    }

    public function getQuiz()
    {
        $where = "";
        if(isset($this->idConfigQuiz)){
            $where = "WHERE IdConfigQuiz = " . $this->idConfigQuiz;
        }
        $sql = "SELECT
                    IdConfigQuiz,
                    DataHoraInicioInscricao,
                    DataHoraInicioQuiz
                FROM ConfigQuiz
                $where";

        $query = $this->db->query($sql);

        if ($query) {
            return $query->row();
        }

        return false;
    }

    public function updateQuiz($dataUpdate)
    {
        $this->db->where('IdConfigQuiz', $this->idConfigQuiz);
        if ($this->db->update('ConfigQuiz', $dataUpdate)) {
            return true;
        }

        return false;
    }
    
} 