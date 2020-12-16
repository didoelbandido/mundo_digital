<?php namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{

    public function __construct()
    {
        helper(['form', 'url']);
    }

    // Mostrar la Vista
    public function index()
    {
        return view('loginView') ;
    }

    // Agregar Usuario
    public function registrar()
    {
        return view('registrarUsuario');
    }
    

    public function doRegistrar(){

        
        $validation = \Config\Services::validation();
        $respuesta = array();

        $input = $this->validate([
            'user' => [
                'rules' => 'required|min_length[5]|valid_email',
                'errors' => [
                    'required' => 'El Usuario no debe estar vacia',
                    'min_length' => 'El Usuario debe ser mayor de  5 carateres',
                ],
            ],

            'pass' => [
                'rules' => 'required|min_length[5]|max_length[20]',
                'errors' => [
                    'required' => 'La contraseña no debe estar vacia',
                    'min_length' => 'Contraseña debe ser mayor de 5 letras',
                    'max_length' => 'Contraseña no debe exceder de 50 caracteres',
                ],
            ],

        ]);

    }


    // Mudulo de Login
    public function doLogin()
    {

        $validation = \Config\Services::validation();
        $respuesta = array();

        $input = $this->validate([
            'user' => [
                'rules' => 'required|min_length[5]|valid_email',
                'errors' => [
                    'required' => 'El Usuario no debe estar vacia',
                    'min_length' => 'El Usuario debe ser mayor de  5 carateres',
                ],
            ],

            'pass' => [
                'rules' => 'required|min_length[5]|max_length[20]',
                'errors' => [
                    'required' => 'La contraseña no debe estar vacia',
                    'min_length' => 'Contraseña debe ser mayor de 5 letras',
                    'max_length' => 'Contraseña no debe exceder de 50 caracteres',
                ],
            ],

        ]);

        if (!$input) {
            //     $respuesta['error'] = $this->validator->listErrors() ;
            echo view('loginView', [
                'validation' => $this->validator,
            ]) ;

        } else {
            $request = \Config\Services::request();
            $user = $request->getPostGet('user');
            $pass = $request->getPostGet('pass');
            $data = array($user, password_hash($pass, PASSWORD_DEFAULT));
            $modelo = new LoginModel($db);
            $resultado = $modelo->login($data);
            if (isset($resultado) && password_verify($pass, $resultado->v3)) {
                $respuesta['error'] = "";
                $respuesta['ok'] = "Login realizado!";
                $newdata = [
                    'iduser' => $resultado->v1,
                    'usuario' => $resultado->v2,
                    'idtipo' => $resultado->v4,
                    'desuser' => $resultado->v5,
                    'nom'  => $resultado->v6
                ];
                $this->session->set($newdata);
                $p = array($resultado->v1);
                $paginas = $modelo->paginas($p);
                $newpag = [
                    'paginas' => $paginas,
                ];
                $this->session->set($newpag);
                $jus = base_url() . '/Home/index';
                header('Location: ' . $jus);
                exit();

            } else {
                echo  view('loginView', [
                    'validation' => 'Acceso incorrecto',
                ]) ;

            }
        }


    }

    public function cerrarsesion()
    {
        $this->session->destroy();
        $jus = base_url() . '/Home/index';
        header('Location: ' . $jus);
        exit();
    }

  

}
