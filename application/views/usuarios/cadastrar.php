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

                    <?php echo form_open("cadastrar/insert", $atributos_form_login) ?>

                        <fieldset>

                            <div class="form-field">
                                <?php echo form_input($atributos_name) ?>
                            </div>
                            <div class="form-field">
                                <?php echo form_input($atributos_email) ?>
                            </div>
                            <div class="form-field">
                                <?php echo form_input($atributos_login) ?>
                            </div>
                            <div class="form-field">
                                <?php echo form_password($atributos_senha ) ?>
                            </div>
                            <div class="form-field">
                                <?php echo form_password($atributos_senha2 ) ?>
                            </div>

                            <div class="form-field">
							    <div class="switch_box box_3 col-2">
							      	<div class="toggle_switch">
								        <input type="checkbox" class="switch_3" id="admin" name="admin" value="1" />
								        <svg class="checkbox" xmlns="http://www.w3.org/2000/svg" style="isolation:isolate" viewBox="0 0 168 80">
								           <path class="outer-ring" d="M41.534 9h88.932c17.51 0 31.724 13.658 31.724 30.482 0 16.823-14.215 30.48-31.724 30.48H41.534c-17.51 0-31.724-13.657-31.724-30.48C9.81 22.658 24.025 9 41.534 9z" fill="none" stroke="#233043" stroke-width="3" stroke-linecap="square" stroke-miterlimit="3"/>
								           <path class="is_checked" d="M17 39.482c0-12.694 10.306-23 23-23s23 10.306 23 23-10.306 23-23 23-23-10.306-23-23z"/>
								          <path class="is_unchecked" d="M132.77 22.348c7.705 10.695 5.286 25.617-5.417 33.327-2.567 1.85-5.38 3.116-8.288 3.812 7.977 5.03 18.54 5.024 26.668-.83 10.695-7.706 13.122-22.634 5.418-33.33-5.855-8.127-15.88-11.474-25.04-9.23 2.538 1.582 4.806 3.676 6.66 6.25z"/>
								        </svg>
								    </div>
							    </div>
							    <div class="col-10 no-padding text-left">
					  				<p>Sou Administrador</p>
					  			</div>
							</div>


						  	<!-- <input type="checkbox" id="admin" name="admin" value="1" />&nbsp; -->
						  	<hr />
                            <div class="form-field">
                                <?php echo form_submit('enviar', 'Cadastrar', array('class' => 'full-width btn--primary')) ?>
                                <div class="submit-loader">
                                    <div class="text-loader">Cadastrando
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

		/* Validação de Cadastro */
		$('#formcadastro').validate({

			/* submit via ajax */
			submitHandler: function(form) {

				var sLoader = $('.submit-loader');

				$.ajax({

					type: "POST",
					url: "cadastrar/insert",
					data: $(form).serialize(),
					beforeSend: function() {

						sLoader.slideDown("slow");

					},
					success: function(msg) {
						if ( msg == 1 ) {
							// Message was sent
							sLoader.slideUp("slow");
							$('.message-warning').fadeOut();
							$('.message-success').html("Usuario Cadastrado com Sucesso");
							$('.message-success').fadeIn();
							setTimeout(function() {
								$('.message-success').fadeOut();
							}, 5000);
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
					error: function(msg) {

						sLoader.slideUp("slow");
						$('.message-warning').fadeOut();
						$('.message-warning').html("Algo deu errado, tente Novamente.");
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
