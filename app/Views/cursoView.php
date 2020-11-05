<br>
<br>


<section class="page-section " id="contact">
<div class="container">
<div class="text-center">
            <h2 class="section-heading text-uppercase">CURSOS</h2>
            <h3 class="section-subheading text-muted">En esta seccion podras observar todos los cursos disponibles.</h3>
        </div>

<div class="row">
<div class="col text-right p-5">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cursoModal">
<i class="fas fa-plus-square"></i> AGREGAR
</button>

</div>
</div>


<div class="container">
<div class="card">

  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>
</section>


<!-- Modal Agregar Vista-->
<div class="modal fade" id="cursoModal" tabindex="-1" role="dialog" aria-labelledby="cursoModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">AGREGAR CURSO</h5>
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
                    <label for="nombreCurso">Nombre</label>
                    <input type="text" class="form-control" id="nombreCurso" name="nombreCurso" aria-describedby="nombreCursoHelp" placeholder="Ingresar el nombre del Curso">
                  </div>
                  <div class="form-group">
                    <label for="desCurso">Descripcion</label>
                    <textarea class="form-control" id="desCurso" name="desCurso" rows="3" placeholder="Ingresar una descripcion concisa"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="docenteCurso">Docente</label>
                    <input type="text" class="form-control" id="docenteCurso" name="docenteCurso" aria-describedby="docenteCursoHelp" placeholder="Ingresar nombre del docente que guaira el curso">
                  </div>
                  <div class="form-group">
                    <label for="estadoCurso">Estado</label>
                   <?php  echo form_dropdown('estadoCurso',$comboestado,'#','class="selectpicker form-control" id="estadoCurso" data-live-search="true" title="Seleccionar estado" required'); ?>
                   
                  </div>

                  <div class="form-group">
                    <label for="fotoCurso">Foto</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="fotoCurso" name="fotoCurso" lang="es">
                      <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
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