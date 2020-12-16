<?php namespace App\Models;

use CodeIgniter\Model;

class EventoModel extends Model
{
    // Ejecutar Registar evento
    public function eventoRegistrar($data)
    {
        $db  = \Config\Database::connect();
        $db->transStart();
        $qry= "CALL sp_registrar_evento(?,?,?,?,?,?,?,?,@s)";
        $rel = $db->query($qry,$data);
        $respuesta = $db->query('select @s as out_param');
        $db -> transComplete();
        $db -> close();
        return $respuesta -> getRow() -> out_param;
    }

    // Combo del estado de los evento 
    public function comboEstado()
    {
        $db = \Config\Database::connect();
        $qry = "Call sp_listar_estado_evento()";
        $rel = $db->query($qry);
        $db->close();
        return $rel->getResultArray();

    }

    public function listar()
    {
        $db = \Config\Database::connect();
        $qry = "Call sp_listar_evento()";
        $rel = $db->query($qry);
        $db->close();
        return $rel->getResultArray();


    }


}