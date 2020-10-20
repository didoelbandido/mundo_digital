<?php namespace App\Controllers;
use CodeIgniter\Controller;

class Contactanos extends BaseController
{

    public function __construct()
    {
        helper(['form','url']);
    }


    public function contactanos()
	{
		return view('header').view('contactanos').view('footer');
    }
    
    public function doSave()
	{
		$validation =  \Config\Services::validation();
		$respuesta = array();
        
        
      $input = $this->validate([
            'name' => [
            'rules'  => 'required|min_length[6]|alpha_space',
            'errors' => [
                'required' => 'Debe ingresar un nombre.',
                'min_length' => 'Minimo 6 caracteres',
                'alpha_space'=> 'Solo Letras'
            ]
             ]           
            ,
            'email' => [
                'rules' => 'required|min_length[5]|valid_email',
                'errors' => [
                    'required'=> 'Debe Ingresar un correo',
                    'min_length'=> 'Como minimo debe tener mas de 5 caracteres',
                    'valid_email'=> 'Debe ser un correo valido'

                ]
            ],            
            'phone' => [
                'rules'=> 'required|exact_length[9]|integer',
                'errors'=>[
                    'required'=> 'Debe ingresar un numeor celular',
                    'exact_length'=>'Deben ser 9 digitos',
                    'integer'=>'Solo Numeros'
                ]
            ],
            'message' => [
                'rules'=>'required|min_length[15]',
                'errors'=>[
                    'required'=>'Debe ingresar un mensaje',
                    'min_length'=>'Ingrese un mensaje que tengas mas de 1 palabra'
                ]
            ]
            
            
        ]);

        if(!$input)
        {
            // $respuesta['error'] = $this->validator->listErrors();
            echo  view('header').view('contactanos',['validation'=> $this->validator]).view('footer');

        }
        else
        {
            $respuesta['Ok'] = "Correcto";
        }        


    //    if (!$input) {
    //    	 $respuesta['error'] = $this->validator->listErrors() ;
    //    	  echo view('header').view('portada2', [
    //             'validation' => $this->validator
    //         ]).view('footer');
 
    //     } else {
    //        $request =  \Config\Services::request();
    //         $dni= $request->getPostGet('dni') ;  
    //         $nombre= $request->getPostGet('nombre') ;
    //           $apel= $request->getPostGet('apellidos') ;
    //           $tel= $request->getPostGet('tel') ;
    //           $corr= $request->getPostGet('correo') ;
    //           $dir= $request->getPostGet('dir') ;
    //           $fec= $request->getPostGet('fecha') ;
    //           $est= $request->getPostGet('estado') ;
    //           $data = array($dni,$nombre,$apel,$tel,$corr,$dir,$fec,$est);      
    //            $modelo = new PersonaModelo($db);  
    //            if($modelo->mregistrar($data)){
    //               $respuesta['ok'] = "Operacion realizada";
    //           }else{
    //               $respuesta['error'] = "Problemas al realizar operacion!!";
    //           } 
            
    //     }

		// header('Content-Type: application/x-json; charset=utf-8');
        // echo(json_encode($respuesta));
		

	}

}