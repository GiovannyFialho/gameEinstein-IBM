<? if (!defined('BASEPATH')) exit('No direct script access allowed');

Class UsuariosModel extends CI_Model {

    public $idUsuario;
    public $nome;
    public $documento;
    public $email;
    public $senha;

    public function saveNewUser($data) 
    {
        $passHash = $this->hashPassword();

        if ($this->db->insert("Usuarios", $data)) {
            return $this->db->insert_id();
        }

        return false;
    }

    public function getUsers($pag = null)
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
                FROM Usuarios
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

    public function getUser()
    {
        $sql = "SELECT
                    IdUsuario,
                    Nome,
                    Email,
                    Documento,
                    Status
                FROM Usuarios
                WHERE IdUsuario = ?";

        $query = $this->db->query($sql,array($this->idUsuario));

        if ($query) {
            return $query->row();
        }

        return false;
    }

    public function updateUser($dataUpdate)
    {
        $this->db->where('IdUsuario', $this->idUsuario);
        if ($this->db->update('Usuarios', $dataUpdate)) {
            return true;
        }

        return false;
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT 
                    *
                FROM Usuarios
                WHERE Email = ?";
        
        $query = $this->db->query($sql, array($email));

        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function loginUser()
    {
        $sql = "SELECT 
                    *
                FROM Usuarios
                WHERE Email = ?";
        
        $query = $this->db->query($sql,array($this->email));
        
        if ($query->num_rows() != 0) {
            $result = $query->row();

            if (password_verify($this->senha, $result->Senha)) {
                return $result;
            } 
        }

        return false;
    }

    public function checkExistingEmail()
    {
        $sql = "SELECT 
                    *
                FROM Usuarios
                WHERE Email = ?";
        
        $query = $this->db->query($sql, array($this->email));

        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function changePassword()
    {
        $passHash = $this->hashPassword();
        
        $this->db->where('IdUsuario', $this->idUsuario);
        if ($this->db->update('Usuarios', array('Senha' => $passHash))) {
            return true;
        }

        return false;
    }

    private function hashPassword() 
    {
        return password_hash($this->senha, PASSWORD_DEFAULT);
    }
    
} 