<?php namespace App\Controllers;

use App\Models\CursoModel;

class Curso extends BaseController
{

    public function __construct()
    {
        helper(['form', 'url', 'funciones']);
    }

    // Mostrar la Vista
    public function index()
    {
        $modelo = new CursoModel($db);
        $data['comboestado'] = generarcombo($modelo->comboEstado());
        return view('header') . view('cursoView', $data) . view('footer');
    }

    // Mudulo de Resgistro
    public function doSave()
    {
        $validation = \Config\Services::validation();
        $respuesta = array();

        $input = $this->validate([
            'nombreCurso' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe ingresar un nombre del curso.'
                ],
            ],
            'desCurso' => [
                'rules' => 'required|min_length[20]',
                'errors' => [
                    'required' => 'Debe Ingresar un descripcion del curso',
                    'min_length' => 'Como minimo debe tener mas de 20 caracteres la descripcion del curso',

                ],
            ],
            
            'estadoCurso' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Debe ingresar el estado del curso',
                    'numeric' => 'Solo se acepta numeros',
                ],
            ],
            
            'fotoCurso' => [
                'uploaded[fotoCurso]',
                'mime_in[fotoCurso,image/jpg,image/jpeg,image/png]',
                'max_size[fotoCurso,1024]',
                'errors' => [
                    'uploaded' => 'No se envio una imagen',
                    'mime_in' => 'No se envio un formato aceptado(jpg,jpeg,png)',
                    'max_size' => 'La imagen nodebe exceder de 1mb',
                ],
            ],
            'nivelCurso' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe ingresar el estado del curso'
                ],
            ],
            'objCurso' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Debe Ingresar un descripcion del curso',
                    'min_length' => 'Como minimo debe tener mas de 10 caracteres el objetivo del curso',

                ],
            ],
            'convCurso' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Debe Ingresar un descripcion del curso',
                    'min_length' => 'Como minimo debe tener mas de 10 caracteres la conavalidacion del curso',

                ],
            ],
            'linkCurso' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'Debe Ingresar un descripcion del curso',
                    'min_length' => 'Como minimo debe tener mas de 5 caracteres el link del curso',

                ],
            ],

        ]);

        if (!$input) {
            $respuesta['error'] = $this->validator->listErrors();

        } else {
            $req = \Config\Services::request();
            $nombreCurso = $req->getPostGet('nombreCurso');
            $desCurso = $req->getPostGet('desCurso');
            $estadoCurso = $req->getPostGet('estadoCurso');
            $img = $this->request->getFile('fotoCurso');
            $fot = $img->getRandomName();
            $img->move(ROOTPATH . 'resources/upload', $fot);
            $nivelCurso = $req->getPostGet('nivelCurso');
            $objCurso = $req->getPostGet('objCurso');
            $convCurso = $req->getPostGet('convCurso');
            $linkCurso = $req->getPostGet('linkCurso');
            
            // Orden de la data del procedimiento almacenado
            $data = array($nombreCurso, $desCurso, $estadoCurso, $fot,$nivelCurso,$objCurso,$convCurso,$linkCurso );
            // Llamando al modelo
            $modelo = new CursoModel($db);

            // Verificando si la transaccion se realizo
            if ($modelo->cursoRegistrar($data)) {
                $respuesta['error'] = "";
                $respuesta['ok'] = "Operacion realizada!";

            } else {
                $respuesta['error'] = "Problemas al realizar operacion!";
            }

        }

        header('Content-Type: application/x-json; charset=utf-8');
        echo (json_encode($respuesta));

    }

    // Listar los Curso
    public function doList()
    {
        $cadena = "";
        $respuesta = array();
        $modelo = new CursoModel($db);
        $lista = $modelo->listar();
        foreach ($lista as $row) {
            $cadena .= '                       <div class="col-lg-3 col-sm-5 mb-3 mb-lg-0 p-3">';
            $cadena .= '                <div class="portfolio-item">';
            $cadena .= '                        <a class="portfolio-link" data-toggle="modal" href="#portfolio' . $row['f1'] . '">';

            if ($row['f6'] == null) {
                $cadena .= '                        <img class="img-fluid" width="202" height="58" src="' . base_url() . '/resources/upload/logo_banner.png' . '" alt="imagen_del_curso" />';
            } else {
                $cadena .= '                        <img class="img-fluid" width="202" height="58" src="' . base_url() . '/resources/upload/' . $row['f6'] . '" alt="imagen_del_curso" />';
            }

            $cadena .= '                       </a>';
            $cadena .= '                          <div class="portfolio-caption">';
            $cadena .= '                               <div class="portfolio-caption-heading">' . $row['f2'] . '</div>';
            $cadena .= '                             <div class="portfolio-caption-subheading text-muted">' . $row['f5'] . '</div>'; //cambiar por la columna correspondiente con la nueva db
            $cadena .= '                         </div>';
            $cadena .= '                     </div>';
            $cadena .= '             </div>';
            $cadena .= '             <div class="portfolio-modal modal fade" id="portfolio' . $row['f1'] . '" tabindex="-1" role="dialog" aria-hidden="true">';
            $cadena .= '                         <div class="modal-dialog">';
            $cadena .= '                            <div class="modal-content">';
            $cadena .= '                                 <div class="close-modal" data-dismiss="modal"><i class="fas fa-window-close"></i></div>';
            $cadena .= '                                 <div class="container">';
            $cadena .= '                                      <div class="row justify-content-center">';
            $cadena .= '                                         <div class="col-lg-8">';
            $cadena .= '                                              <div class="modal-body">';
            $cadena .= '                                                  <h2 class="text-uppercase ">' . $row['f2'] . '</h2>';
        

            if ($row['f6'] == null) {
                $cadena .= '                                                <img class="img-fluid d-block mx-auto" src="' . base_url() . '/resources/upload/logo_banner.png' . '" alt="" />';
            } else {
                $cadena .= '                                                <img class="img-fluid d-block mx-auto" src="' . base_url() . '/resources/upload/' . $row['f6'] . '" alt="" />';
            }
            $cadena .= '                                                  <h3>Descripción del curso</h3> <hr>';
            $cadena .= '                                                 <p class="text-justify">' . $row['f3'] . '</p>';
            $cadena .= '                                                  <h3>¿Cuál es el objetivo del curso?</h3> <hr>';
            $cadena .= '                                                 <p class="text-justify">' . $row['f7'] . '</p>';
            $cadena .= '                                                  <h3>¿Cómo se realiza el proceso de convalidación?</h3> <hr>';
            $cadena .= '                                                 <p class="text-justify">' . $row['f8'] . '</p>';
            $cadena .= '                                                  <h3>Link del Curso</h3> <hr>';
            $cadena .= '                                                 <p class="text-justify"><a href='.$row['f9'].'>' . $row['f9'] . '</a></p>';
            $cadena .= '                                                  <ul class="list-inline">';
            $cadena .= '                                                    <li>Nivel del curso: '.$row['f5'].'</li>'; //cambiar con la nueva db
            $cadena .= '                                                    <li>Tipo de Curso: ' . $row['f4'] . '</li>';
            $cadena .= '                                                </ul>';
            $cadena .= '                                                <button class="btn btn-primary" data-dismiss="modal" type="button">';
            $cadena .= '                                                    <i class="fas fa-times mr-1"></i>';
            $cadena .= '                                                    Cerrar Ventana';
            $cadena .= '                                                 </button>';
            $cadena .= '                                             </div>';
            $cadena .= '                                         </div>';
            $cadena .= '                                     </div>';
            $cadena .= '                                 </div>';
            $cadena .= '                             </div>';
            $cadena .= '                         </div>';
            $cadena .= '                     </div>';
        }
        $respuesta['data'] = $cadena;

        header('Content-Type: application/x-json; charset=utf-8');
        echo (json_encode($respuesta));
    }

}
