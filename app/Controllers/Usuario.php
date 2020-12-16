<?php namespace App\Controllers;

use App\Models\LoginModel;

class Usuario extends BaseController
{


    public function __construct()
    {
        helper(['form', 'url']);
    }

// Agregar Usuario
    public function index()
    {
        return view('registrarUsuario');
    }
    

    public function doRegistrar(){

        $validation =  \Config\Services::validation();
		$respuesta = array();
        
        
      $input = $this->validate([
            'user' => [
            'rules'  => 'required|max_length[20]',
            'errors' => [
                'required' => 'Debe ingresar un nombre del Evento.',
                'max_length[30]'=> 'Como minimo debe tener mas de 20 caracteres la descripcion del Evento'
            ]
             ],
            'nom' => [
                'rules' => 'required|max_length[30]',
                'errors' => [
                    'required'=> 'Debe Ingresar un descripcion del Evento',
                    'max_length'=> 'Como max 30 caracteres',

                ]
            ],            
            'pass' => [
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Debe una contraseña',
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
            $user = $req -> getPostGet('user');
            $nom = $req -> getPostGet('nom');
            $pass = $req -> getPostGet('pass');
            $passHas= password_hash($pass , PASSWORD_DEFAULT);
            // Orden de la data del procedimiento almacenado
            $data = array($user,$nom,$passHas);
            // Llamando al modelo
            $modelo = new LoginModel($db);

            // Verificando si la transaccion se realizo
            if($modelo->registrar($data))
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