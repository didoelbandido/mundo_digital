<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ReporteModel;

class Home extends BaseController
{
	
	 
	public function index()
	{
		
		return view('header').view('portada').view('footer');
	}

	public function doList()
    {
        $cadena="";
        $respuesta = array();
        $modelo = new ReporteModel($db);
        $lista=$modelo->rep_curso();
        foreach ($lista as $row) {
		$cadena.='	<div class="col-sm-4 p-5 text-center"> ';
		$cadena.='	<h3>'.$row['v1'].'</h3>';
		$cadena.='	<div id="circulo" class="bg-primary  mx-auto ">';
		switch ($row['v1']) {
			case 'Libro Digital':
				$cadena.='<p><i class="fas fa-atlas"></i></p>';
				break;
			
			case 'Presencial':
					$cadena.='<p><i class="fas fa-users"></i></p>';
					break;

			default:
			$cadena.='<p><i class="fas fa-laptop-house"></i></p>';
				break;
		}
		
		$cadena.='		</div>';
		$cadena.='		<h3 class="p-3">'.$row['v2'].'</h3>';
		$cadena.='	</div>';
        }
        $respuesta['data']=$cadena;
        
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($respuesta));
    }


	




	//--------------------------------------------------------------------

}
