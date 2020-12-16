<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mundo Digital</title>
        <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>/resources/img/ico/logo.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>

        <!-- CSS -->
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url();?>/resources/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.css">


        <!-- JS -->
        <!-- jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- boostrap -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="<?php echo base_url();?>/resources/assets/mail/jqBootstrapValidation.js"></script>
        <script src="<?php echo base_url();?>/resources/assets/mail/contact_me.js"></script>
        <script src="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.js"></script>


        <!-- Font  -->
       
       

    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>/resources/img/logo/logo_banner.png"  alt="Responsive image"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url();?>/Somos">Quienes Somos</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url();?>/Curso">Cursos</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url();?>/Evento">Eventos</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo base_url();?>/Contactanos">Comentarios</a></li>

                        </a></li>
                        <li class="nav-item">
                        <?php
						  $session = \Config\Services::session(); 
						   if($session->has('usuario')){
							 	
                                 ?>
                             <a class="nav-link js-scroll-trigger" href="<?php echo base_url();?>/login/cerrarsesion"><?php echo $session->get('nom'); ?> &nbsp;&nbsp;Salir</a>
							 		
						 <?php
						  }	else{
                              ?>
                            <a class="nav-link js-scroll-trigger" href="<?php echo base_url();?>/login/index">Iniciar</a>  
					
						  <?php
						  } 	
						  ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>