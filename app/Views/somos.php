


<br>
<!-- Services-->
<div class="container p-5">
<div class="row">
<section class="page-section " id="nosotros">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">NOSOTROS</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-eye fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Vision</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>
                    <div class="col-md-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-bullseye fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Mision</h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                    </div>

                </div>
            </div>
        </section>
</div>
<div class="row">
<img src="<?php echo base_url();?>/resources/img/logo/logo_banner.png" class="rounded mx-auto d-block img-fluid" alt="logo"  />
</div>
</div>





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
