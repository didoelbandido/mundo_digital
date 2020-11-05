<?php namespace App\Models;

use CodeIgniter\Model;

class CursoModel extends Model
{
    // Ejecutar Registar Curso
    public function cursoRegistrar($data)
    {
        $db  = \Config\Database::connect();
        $db->transStart();
        $qry= "CALL sp_registrar_curso(?,?,?,?,?,@s)";
        $rel = $db->query($qry,$data);
        $respuesta = $db->query('select @s as out_param');
        $db -> transComplete();
        $db -> close();
        return $respuesta -> getRow() -> out_param;
    }

    // Combo del estado de los curso 
    public function comboEstado()
    {
        $db = \Config\Database::connect();
        $qry = "Call sp_listar_estado()";
        $rel = $db->query($qry);
        $db->close();
        return $rel->getResultArray();

    }


}