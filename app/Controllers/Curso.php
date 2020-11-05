<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CursoModel;

class Curso extends BaseController
{
 

    public function __construct()
    {
        helper(['form','url','funciones']);
    }

    // Mostrar la Vista
    public function index()
    {
        $modelo = new CursoModel($db);
        $data['comboestado']=generarcombo($modelo->comboEstado());
        return view('header').view('cursoView',$data).view('footer');
    }

 

    // Mudulo de Resgistro
    public function doSave()
	{
		$validation =  \Config\Services::validation();
		$respuesta = array();
        
        
      $input = $this->validate([
            'nombreCurso' => [
            'rules'  => 'required|alpha_space',
            'errors' => [
                'required' => 'Debe ingresar un nombre del curso.',
                'alpha_space'=> 'El nombre solo debe contener letras'
            ]
             ]           
            ,
            'desCurso' => [
                'rules' => 'required|min_length[20]',
                'errors' => [
                    'required'=> 'Debe Ingresar un descripcion del curso',
                    'min_length'=> 'Como minimo debe tener mas de 20 caracteres la descripcion del curso',

                ]
            ],            
            'docenteCurso' => [
                'rules'=> 'required|alpha_space',
                'errors'=>[
                    'required' => 'Debe ingresar un nombre del docente del curso.',
                    'alpha_space'=> 'El nombre solo debe contener letras'
                ]
            ],
            'estadoCurso' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required'=>'Debe ingresar el estado del curso',
                    'numeric'=>'Solo se acepta numeros'
                ]
            ],
            'fotoCurso' => [
                 'uploaded[fotoCurso]',
                 'mime_in[fotoCurso,image/jpg,image/jpeg,image/png]',
                 'max_size[fotoCurso,1024]',
                 'errors'=>[
                    'uploaded'=> 'No se envio una imagen',
                    'mime_in' => 'No se envio un formato aceptado(jpg,jpeg,png)',
                    'max_size' => 'La imagen nodebe exceder de 1mb'
                 ]
             ]
        ]);

        if(!$input)
        {
            $respuesta['error'] = $this->validator->listErrors();
            

        }
        else
        {
            $req = \Config\Services::request();
            $nombreCurso = $req -> getPostGet('nombreCurso');
            $desCurso = $req -> getPostGet('desCurso');
            $docenteCurso = $req -> getPostGet('docenteCurso');
            $estadoCurso = $req -> getPostGet('estadoCurso');
            $img = $this -> request -> getFile('fotoCurso');
            $fot = $img->getRandomName();
            $img->move(ROOTPATH.'resources/upload',$fot);
            // Orden de la data del procedimiento almacenado
            $data = array($nombreCurso,$desCurso,$docenteCurso,$estadoCurso,$fot);
            // Llamando al modelo
            $modelo = new CursoModel($db);

            // Verificando si la transaccion se realizo
            if($modelo->cursoRegistrar($data))
            {
                $respuesta['error'] = "";
                $respuesta['ok'] = "Operacion realizada!";

            }
            else
            {
                $respuesta['error'] = "Problemas al realizar operacion!";
            }

            
        }        



		header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($respuesta));
		

    }




}