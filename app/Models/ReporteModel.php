<?php namespace App\Models;

use CodeIgniter\Model;

class ReporteModel extends Model
{


  public function rep_curso()
    {
    	$db = \Config\Database::connect();
    	$sql = "CALL sp_reporte_curso()";
		$result=$db->query($sql);
    	$db->close();
    	return $result->getResultArray();   


    }
    
}