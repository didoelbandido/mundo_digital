 



<br>
<br>


 <section class="page-section " id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">CONTACTANOS</h2>
                    <h3 class="section-subheading text-muted">Cualquier consulta envianos un Inbox.</h3>
                </div>

                <?php $validation = \Config\Services::validation(); ?>

                <?=  form_open('Contactanos/doSave', array('id'=> 'frmCon', 'name'=>'frmCon')) ?>

                <!-- <form id="contactForm" name="sentMessage" novalidate="novalidate"> -->
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" name="name" type="text" placeholder="Tu nombre" required />
                                <?php if($validation->getError('name')) {?>
                                <p class="help-block text-danger">
                                    <?= $error = $validation->getError('name'); ?>
                                </p>
                                <?php }?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" name="email" type="email" placeholder="Tu correo" required />
                                <?php if($validation->getError('email')) {?>
                                <p class="help-block text-danger">
                                    <?= $error = $validation->getError('email'); ?>
                                </p>
                                <?php }?>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="phone" name="phone" type="tel" placeholder="Tu celular o telefono" required />
                                <?php if($validation->getError('phone')) {?>
                                <p class="help-block text-danger">
                                    <?= $error = $validation->getError('phone'); ?>
                                </p>
                                <?php }?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message" name="message" placeholder="Tu mensaje" rows="6" required ></textarea>
                                <?php if($validation->getError('message')) {?>
                                <p class="help-block text-danger">
                                    <?= $error = $validation->getError('message'); ?>
                                </p>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        
                        <button class="btn btn-primary btn-xl text-uppercase"  type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </section>

        





        <script >
$(document).ready(function(){
    $('#mainNav').addClass('navbar-shrink');
	var altura = $('#mainNav').offset().top;

	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura ){
			$('#mainNav').addClass('navbar-shrink');
		} else {
			$('#mainNav').addClass('navbar-shrink');
		}
	});

});


</script>
