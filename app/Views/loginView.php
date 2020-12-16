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
                                        <h1 class="h4 text-gray-900 mb-4">Inicio de Session</h1>
                                    </div>
                                    <form class="user" action="<?php echo base_url(); ?>/login/doLogin">
                                    <?php $validation = \Config\Services::validation();?>
                                    <!-- Error -->
                                        <?php if ($validation->getError('user')) {?>
                                            <div class='alert alert-danger mt-2'>
                                            <?=$error = $validation->getError('user');?>
                                            </div>
                                        <?php }?>
                                        <!-- Error -->
                                        <?php if ($validation->getError('pass')) {?>
                                            <div class='alert alert-danger mt-2'>
                                            <?=$error = $validation->getError('pass');?>
                                            </div>
                                        <?php }?>

                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="user" name="user" aria-describedby="emailHelp"
                                                placeholder="Ingrese Correo...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="pass" name="pass" placeholder="Contraseña ">
                                        </div>

                                       

                                        <button class="btn btn-primary btn-user btn-block" type="submit">Ingresar</button>

                                        <hr>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Olvidaste tu Contraseña?</a>
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

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>/resources/js/login.js"></script>

</body>

</html>