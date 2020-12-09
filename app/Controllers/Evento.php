<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\EventoModel;

class Evento extends BaseController
{
 

    public function __construct()
    {
        helper(['form','url','funciones']);
    }

    // Mostrar la Vista
    public function index()
    {
        $modelo = new EventoModel($db);
        $data['comboestado']=generarcombo($modelo->comboEstado());
        return view('header').view('eventoView',$data).view('footer');

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


    // // Listar los Curso
    // public function doList()
    // {
    //     $cadena="";
    //     $respuesta = array();
    //     $modelo = new CursoModel($db);
    //     $lista=$modelo->listar();
    //     foreach ($lista as $row) {
    //     $cadena.='                       <div class="col-lg-3 col-sm-5 mb-3 mb-lg-0 p-3">';
    //     $cadena.='                <div class="portfolio-item">';
    //     $cadena.='                        <a class="portfolio-link" data-toggle="modal" href="#portfolio'.$row['f1'].'">';

    //     if($row['f6'] == null)
    //     {
    //         $cadena.='                        <img class="img-fluid" src="'.base_url().'/resources/upload/logo_banner.png'.'" alt="imagen_del_curso" />';            
    //     }
    //     else
    //     {
    //         $cadena.='                        <img class="img-fluid" src="'.base_url().'/resources/upload/'.$row['f6'].'" alt="imagen_del_curso" />';
    //     }

        
    //     $cadena.='                       </a>';
    //     $cadena.='                          <div class="portfolio-caption">';
    //     $cadena.='                               <div class="portfolio-caption-heading">'.$row['f2'].'</div>';
    //     $cadena.='                             <div class="portfolio-caption-subheading text-muted">Avanzado</div>'; //cambiar por la columna correspondiente con la nueva db
    //     $cadena.='                         </div>';
    //     $cadena.='                     </div>';
    //     $cadena.='             </div>';
    //     $cadena.='             <div class="portfolio-modal modal fade" id="portfolio'.$row['f1'].'" tabindex="-1" role="dialog" aria-hidden="true">';
    //     $cadena.='                         <div class="modal-dialog">';
    //     $cadena.='                            <div class="modal-content">';
    //     $cadena.='                                 <div class="close-modal" data-dismiss="modal"><i class="fas fa-window-close"></i></div>';
    //     $cadena.='                                 <div class="container">';
    //     $cadena.='                                      <div class="row justify-content-center">';
    //     $cadena.='                                         <div class="col-lg-8">';
    //     $cadena.='                                              <div class="modal-body">';
    //     $cadena.='                                                  <h2 class="text-uppercase">'.$row['f2'].'</h2>';
    //     $cadena.='                                                 <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>';//cambiar por la columna correspondiente con la nueva db
    //     if($row['f6'] == null)
    //     {
    //         $cadena.='                                                <img class="img-fluid d-block mx-auto" src="'.base_url().'/resources/upload/logo_banner.png'.'" alt="" />';
    //     }
    //     else
    //     {
    //         $cadena.='                                                <img class="img-fluid d-block mx-auto" src="'.base_url().'/resources/upload/'.$row['f6'].'" alt="" />';
    //     }
        
    //     $cadena.='                                                 <p>'.$row['f3'].'</p>';
    //     $cadena.='                                                  <ul class="list-inline">';
    //     $cadena.='                                                    <li>Date: January 2020</li>';//cambiar con la nueva db
    //     $cadena.='                                                    <li>Docente: '.$row['f4'].'</li>';
    //     $cadena.='                                                    <li>Category: Branding</li>';//cambiar con la nueva db
    //     $cadena.='                                                </ul>';
    //     $cadena.='                                                <button class="btn btn-primary" data-dismiss="modal" type="button">';
    //     $cadena.='                                                    <i class="fas fa-times mr-1"></i>';
    //     $cadena.='                                                    Cerrar Ventana';
    //     $cadena.='                                                 </button>';
    //     $cadena.='                                             </div>';
    //     $cadena.='                                         </div>';
    //     $cadena.='                                     </div>';
    //     $cadena.='                                 </div>';
    //     $cadena.='                             </div>';
    //     $cadena.='                         </div>';
    //     $cadena.='                     </div>';
    //     }
    //     $respuesta['data']=$cadena;
        
    //     header('Content-Type: application/x-json; charset=utf-8');
    //     echo(json_encode($respuesta));
    // }




}