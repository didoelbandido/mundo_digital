<br>
<br>


<section class="page-section " id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">COMENTARIOS</h2>
            <h3 class="section-subheading text-muted">Cualquier consulta envianos un Inbox.</h3>
        </div>

        <div class="alert alert-danger text-center" role="alert" id="error">
            <span id="msg_error"></span>
        </div>
        <div class="alert alert-success text-center" role="alert" id="succ">
            <span id="msg_ok"></span>
        </div>

        <?php $validation = \Config\Services::validation(); ?>

        <?= form_open('#', array('id' => 'frmCon', 'name' => 'frmCon')) ?>
        <!-- <form action="#" id="frmCon" name="frmCon" method="post" accept-charset="utf-8"> -->

        <!-- <form id="contactForm" name="sentMessage" novalidate="novalidate"> -->
        <div class="row align-items-stretch mb-5">
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Tu nombre" required />
                    <?php if ($validation->getError('nombre')) { ?>
                        <p class="help-block text-danger">
                            <?= $error = $validation->getError('nombre'); ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <input class="form-control" id="email" name="email" type="email" placeholder="Tu correo" required />
                    <?php if ($validation->getError('email')) { ?>
                        <p class="help-block text-danger">
                            <?= $error = $validation->getError('email'); ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="form-group mb-md-0">
                    <input class="form-control" id="phone" name="phone" type="tel" placeholder="Tu celular o telefono" required />
                    <?php if ($validation->getError('phone')) { ?>
                        <p class="help-block text-danger">
                            <?= $error = $validation->getError('phone'); ?>
                        </p>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-textarea mb-md-0">
                    <textarea class="form-control" id="message" name="message" placeholder="Tu mensaje" rows="6" required></textarea>
                    <?php if ($validation->getError('message')) { ?>
                        <p class="help-block text-danger">
                            <?= $error = $validation->getError('message'); ?>
                        </p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="text-center">

            <button class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar</button>
        </div>
        <?= form_close(); ?>
    </div>
</section>


<?php 
 $session = \Config\Services::session(); 
 if($session->has('usuario') &&  $session->get('idtipo') == 1){
?>
<section class="page-section ">

<div class="container">

    <div class="card">
        <div class="card-header  ">
            <div class="row">
                <div class="col-md-8">
                    <h1>Lista de Comentarios</h1>
                </div>
                <div class="col-md-4  align-self-center text-center ">
                    <button type="button" name="btnMostrar" id="btnMostrar" class=" btn btn-primary ">Mostrar</button>
                    <button type="button" name="btnOcultar" id="btnOcultar" class="btn btn-danger">Ocultar</button>

                </div>

            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive" id="panelTbl">
                <table id="tblComent" class="table table-striped table-bordered" style="width:100%" data-sort-name="f2" data-show-toggle="true" data-search="true" data-pagination="true">
                    <thead>
                        <tr>
                            <th data-field="state" data-radio="true"></th>
                            <th data-field="f1">ID Mensaje</th>
                            <th data-field="f2" data-sortable="true">Nombre</th>
                            <th data-field="f3">E-MAIL</th>
                            <th data-field="f4">Celular</th>
                            <th data-field="f5">Mensaje</th>
                        </tr>
                    </thead>

                    <div class="alert alert-danger text-center" role="alert" id="tbl_error">
                        <span id="tbl_msg_error"></span>
                    </div>

                </table>



            </div>

        </div>
    </div>
</div>

</section>
<?php
 }
else
{

}
?>

<!-- Poner Estatico el navBar -->


<script src="<?= base_url() ?>/resources/js/comentarios.js"></script>

<script>
    ruta = '<?= base_url() ?>'
    $div = $("#panelTbl");
    $table = $('#tblComent')


    function refresh() {
        $.ajax({

            url: ruta + '/Contactanos/doList',
            type: 'POST',
            dataType: 'JSON',
            data: {},
            success: function(e) {
                $('#tblComent').bootstrapTable("destroy")
                $('#tblComent').bootstrapTable({data: e.data})
                $('#tblComent').bootstrapTable('hideColumn', 'f1')
            }
        })
    }





    $(document).ready(function() {
        $('#mainNav').addClass('navbar-shrink');
        var altura = $('#mainNav').offset().top;

        $(window).on('scroll', function() {
            if ($(window).scrollTop() > altura) {
                $('#mainNav').addClass('navbar-shrink');
            } else {
                $('#mainNav').addClass('navbar-shrink');
            }
        });


        doaction();

    });
</script>