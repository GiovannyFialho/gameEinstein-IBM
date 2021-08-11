<? if (!defined('BASEPATH')) exit('No direct script access allowed');

Class ScoreModel extends CI_Model {

    public $idScore;
    public $idCadastro;
    public $totalAcertos;
    public $tempoTotalRespostas;
    public $dataCadastro;

    public function getScore()
    {
        $sql = "SELECT
                    Score.IdScore,
                    Score.IdCadastro,
                    Score.TotalAcertos,
                    Score.TempoTotalRespostas,
                    Score.DataCadastro,
                    Cadastros.Nome,
                    Cadastros.Sobrenome,
                    Cadastros.Email,
                    Cadastros.Celular
                FROM Score
                JOIN Cadastros ON Cadastros.IdCadastro = Score.IdCadastro
                ORDER BY Score.TotalAcertos DESC, Score.TempoTotalRespostas ASC";

        $query = $this->db->query($sql);

        if ($query) {
            return array(
                'data'    => $query->result(),
                'numRows' => $query->num_rows(),
            );
        }

        return false;
    }
    
} 