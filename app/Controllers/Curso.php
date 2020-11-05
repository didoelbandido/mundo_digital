<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CursoModel;

class Curso extends BaseController
{
 

    public function __construct()
    {
        helper(['form','url']);
    }

    // Mostrar la Vista
    public function index()
    {
        return view('header').view('cursoView').view('footer');
    }

    // Mudulo de Resgistro
    public function doSave()
	{
		$validation =  \Config\Services::validation();
		$respuesta = array();
        
        
      $input = $this->validate([
            'nombre' => [
            'rules'  => 'required|min_length[6]|alpha_space',
            'errors' => [
                'required' => 'Debe ingresar un nombre.',
                'min_length' => 'El nombre debe tener minimo 6 caracteres',
                'alpha_space'=> 'El nombre solo debe contener letras'
            ]
             ]           
            ,
            'email' => [
                'rules' => 'required|min_length[5]|valid_email',
                'errors' => [
                    'required'=> 'Debe Ingresar un correo',
                    'min_length'=> 'Como minimo debe tener mas de 5 caracteres el email',
                    'valid_email'=> 'Debe ser un correo valido'

                ]
            ],            
            'phone' => [
                'rules'=> 'required|exact_length[9]|integer',
                'errors'=>[
                    'required'=> 'Debe ingresar un numeor celular',
                    'exact_length'=>'Ingrese un numero de celular valido',
                    'integer'=>'Solo Numeros en el campo de celular'
                ]
            ],
            'message' => [
                'rules'=>'required|min_length[15]',
                'errors'=>[
                    'required'=>'Debe ingresar un mensaje',
                    'min_length'=>'Ingrese un mensaje que tenga mas de 1 palabra'
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
            $nombre = $req -> getPostGet('nombre');
            $email = $req -> getPostGet('email');
            $phone = $req -> getPostGet('phone');
            $message = $req -> getPostGet('message');
            // Orden de la data del procedimiento almacenado
            $data = array($nombre,$email,$phone,$message);
            // Llamando al modelo
            $modelo = new ContactanosModel($db);

            // Verificando si la transaccion se realizo
            if($modelo->mensajeRegistrar($data))
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