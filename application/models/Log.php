<? if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Log extends CI_Model {

    public $idUsuario;
    public $idCadastro;
    public $tipoLog;
    public $log;
    
    public function registraAuditoria($logDetalhes, $tipo, $usuario = 0, $cadastro = 0)
    {
        if (!$usuario && !$cadastro) {
            return false;
        }
        
        $this->detalhes = serialize($logDetalhes);
        $this->idTipoLog = $tipo;
        $this->idCadastro = $cadastro;
        $this->idUsuario = $usuario;
        return $this->setLog();
    }

    private function setLog() 
    {
        $data = array(
            'TipoLog' => $this->idTipoLog,
            'IdUsuario' => $this->idUsuario,
            'IdCadastro' => $this->idCadastro,
            'Log' => $this->detalhes
        ); 

        if ($this->db->insert('Log',$data)) {
            return true;
        }

        return false;
    }
}