<?php namespace App\Models;

use CodeIgniter\Model;

class ContactanosModel extends Model
{
    public function mensajeListar()
    {
        $db = \Config\Database::connect();
        $qry = "Call sp_listar_mensajes()";
        $rel = $db->query($qry);
        $db->close();
        return $rel->getResultArray();


    }

    public function mensajeRegistrar($data)
    {
        $db  = \Config\Database::connect();
        $db->transStart();
        $qry= "CALL sp_registrar_mensaje(?,?,?,?,@s)";
        $rel = $db->query($qry,$data);
        $respuesta = $db->query('select @s as out_param');
        $db -> transComplete();
        $db -> close();
        return $respuesta -> getRow() -> out_param;
    }


}