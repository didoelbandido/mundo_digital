<br>
<br>


<section class="page-section " id="contact">
<div class="container">
<div class="text-center">
            <h2 class="section-heading text-uppercase">EVENTOS</h2>
            <h3 class="section-subheading text-muted">Enterate de los mejores eventos AQUI!!</h3>
        </div>

<div class="row">
<div class="col text-right p-5">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventoModal">
<i class="fas fa-plus-square"></i> AGREGAR
</button>
<button type="button" class="btn btn-primary" id="btn_mostrar">
<i class="fas fa-eye"></i> MOSTRAR
</button>

</div>
</div>

<!-- Creando los card de los curso -->
<div class="container border"  id="panelCursos">

<div class="row" id="objCursos">



  
  
  
</div>
</div>
</section>


<!-- Modal Agregar Vista-->
<div class="modal fade" id="eventoModal" tabindex="-1" role="dialog" aria-labelledby="eventoModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">AGREGAR EVENTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="alert alert-danger text-center" role="alert" id="error">
            <span id="msg_error"></span>
        </div>
        <div class="alert alert-success text-center" role="alert" id="succ">
            <span id="msg_ok"></span>
        </div>
        <?php $validation = \Config\Services::validation();?>

                <?=form_open_multipart('#', array('id' => 'frmCurso', 'name' => 'frmCurso'))?>
                <div class="form-group">
                    <label for="nombreEvento">Nombre</label>
                    <input type="text" class="form-control" id="nombreEvento" name="nombreEvento" aria-describedby="nombreEventoHelp" placeholder="Ingresar el nombre del Evento">
                  </div>
                  <div class="form-group">
                    <label for="desEvento">Descripcion</label>
                    <textarea class="form-control" id="desEvento" name="desEvento" rows="3" placeholder="Ingresar una descripcion concisa"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="estadoEvento">Estado</label>
                   <?php  echo form_dropdown('estadoCurso',$comboestado,'#','class="selectpicker form-control" id="estadoCurso" data-live-search="true" title="Seleccionar estado" required'); ?>
                   
                  </div>

                  <div class="form-group">
                    <label for="fotoEvento">Foto</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="fotoEvento" name="fotoEvento">
                      <label class="custom-file-label" for="fotoEvento">Buscar Imagen .jpg, .jpeg o .png</label>
                    </div>
                  </div>
    
                 
                <?=form_close();?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="agregarCurso" >Guardar</button>
      </div>
    </div>
  </div>
</div>



<script src="<?= base_url() ?>/resources/js/curso.js"></script>

<script>
    ruta = '<?= base_url() ?>'

    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });



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