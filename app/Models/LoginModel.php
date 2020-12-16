<?php namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{

    public function paginas($data)
    {

        $db = \Config\Database::connect();
        $qry = "CALL sp_listar_accesos(?)";
        $result = $db->query($qry, $data);
        $db->close();
        $data = $result->getResultArray();
        $lista = array();
        foreach ($data as $obj) {
            $lista[] = strtoupper("\APP\CONTROLLERS" . "\\" . $obj['v2']);
        }
        return $lista;
    }

    public function login($data)
    {

        $db = \Config\Database::connect();
        $qry = "CALL sp_validarusuario(?,?)";
        $result = $db->query($qry, $data);
        $db->close();
        return $result->getRow();

    }

}
