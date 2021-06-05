<!DOCTYPE html>
<html>
    <?php echo $header ?>
    <body>

        <section id="login" class="s-contact">

            <div class="overlay"></div>
            <div class="contact__line"></div>

            <div class="row section-header aos-init aos-animate" data-aos="fade-up">
                <div class="col-full">
                    <h3 class="subhead"><?php echo $h3 ?></h3>
                    <h1 class="display-2 display-2--light"><?php echo $h1 ?></h1>
                </div>
            </div>

            <div class="row contact-content aos-init aos-animate" data-aos="fade-up">

                <div class="contact-login col-8">

                    <?php echo form_open('home/autenticate', $atributos_form_login) ?>

                        <fieldset>
        
                            <div class="form-field">
                                <?php echo form_input('login', set_value('login'), $atributos_login) ?>
                            </div>
                            <div class="form-field">
                                <?php echo form_password('senha', set_value('senha'), $atributos_senha ) ?>
                            </div>
                            <div class="form-field">
                                <?php echo form_submit('enviar', 'Autenticar', array('class' => 'full-width btn--primary')) ?>
                                <div class="submit-loader">
                                    <div class="text-loader">Autenticando
	                                    <div class="s-loader">
	                                        <div class="bounce1"></div>
	                                        <div class="bounce2"></div>
	                                        <div class="bounce3"></div>
	                                    </div>
                                    </div>
                                </div>
                            </div>
        
                        </fieldset>
	
						<div class="row">
							<div class="col-12">
	                    		<a href="<?php echo $Link1 ?>"><?php echo $Texto_Link1 ?></a>
	                    	</div>
	                    </div>
	                    <div class="row">
							<div class="col-12">
	                    		<a href="<?php echo $Link2 ?>"><?php echo $Texto_Link2 ?></a>
	                    	</div>
	                    </div>

                    <?php echo form_close(); ?>

                    <div class="message-warning">

                    </div> 
                    <div class="message-success">

                    </div> 
                </div> 

            </div> 

        </section> 

		<!-- preloader
		================================================== -->
		<div id="preloader">
		    <div id="loader">
		        <div class="line-scale-pulse-out">
		            <div></div>
		            <div></div>
		            <div></div>
		            <div></div>
		            <div></div>
		        </div>
		    </div>
		</div>

    </body>
    
    <?php echo $scripts ?>

	<!-- Formulários de Contato -->
	<script type="text/javascript">

		/* Validação de Acesso */
		$('#formlogin').validate({

			/* submit via ajax */
			submitHandler: function(form) {

				var sLoader = $('.submit-loader');

				$.ajax({

					type: "POST",
					url: "home/autenticate",
					data: $(form).serialize(),
					beforeSend: function() {

						sLoader.slideDown("slow");

					},
					success: function(msg) {
						if ( msg == 1 ) {
							// Message was sent
							sLoader.slideUp("slow");
							$('#formlogin').fadeOut();
							$('.message-warning').fadeOut();
							$('.message-success').html("Usuário Autenticado");
							$('.message-success').fadeIn();
							setTimeout(function() {
								window.location.href = "dashboard";
							}, 1000);
						}
						else{
							// Message was sent
							sLoader.slideUp("slow");
							$('.message-success').fadeOut();
							$('.message-warning').html(msg);
							$('.message-warning').fadeIn();
							setTimeout(function() {
								$('.message-warning').fadeOut();
							}, 5000);
						}
					},
					error: function() {
						sLoader.slideUp("slow");
						$('.message-warning').fadeOut();
						$('.message-warning').html("Dados incorretos, tente novamente.");
						$('.message-warning').slideDown("slow");
						setTimeout(function() {
							$('.message-warning').fadeOut();
						}, 5000);
					}

				});
			}

		});
	</script>

</html> 
