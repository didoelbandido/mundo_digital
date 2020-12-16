<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mundo Digital - Login</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>/resources/img/ico/logo.ico" />


    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>


    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="<?php echo base_url(); ?>/resources/css/login.css" rel="stylesheet" />

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Registrar Usuario</h1>
                                    </div>
                                    
                                    <div class="alert alert-danger text-center" role="alert" id="error">
                                        <span id="msg_error"></span>
                                    </div>
                                    <div class="alert alert-success text-center" role="alert" id="succ">
                                        <span id="msg_ok"></span>
                                    </div>
                                    <?php $validation = \Config\Services::validation();?>

                                <?=form_open_multipart('#', array('id' => 'frmUsuario', 'name' => 'frmUsuario'))?>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="user" name="user" aria-describedby="emailHelp"
                                                placeholder="Ingrese Correo...">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="nom" name="nom" aria-describedby="emailHelp"
                                                placeholder="Ingrese su Nombre...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="pass" name="pass" placeholder="Ingresar contraseña... ">
                                        </div>
                                                                              
                                        <button type="button" class="btn btn-primary btn-user btn-block" id="agregarUsuario" >Registrar</button>
                                        

                                        <hr>
                                        <?=form_close();?>
                                    
<!-- a -->


                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url(); ?>/Login">Tienes Cuenta?, Ingresar!!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url(); ?>">Regresar a la pagina Inicial!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <script src="<?= base_url() ?>/resources/js/usuario.js"></script>

<script>
    ruta = '<?= base_url() ?>'

   


    $(document).ready(function() {
       

        doaction();

    });
</script>

</body>

</html>