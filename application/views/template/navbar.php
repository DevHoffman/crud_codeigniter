
<header class="s-header">

    <div class="header-logo">
        <a class="site-logo" href="<?php echo base_url('dashboard') ?>">
            PHP Teste
        </a>
    </div>

    <nav class="header-nav">

        <a href="#0" class="header-nav__close" title="Fechar"><span>Fechar</span></a>

		<a href="<?php echo base_url('perfil') ?>" title="Ir para Perfil">
			<div class="header-nav_perfil" style="background-image: url('<?php echo base_url($usuarioFoto) ?>');">
				<h2>Meu Perfil</h2>
			</div>
		</a>
        <div class="header-nav__content">

            <ul class="header-nav__list">
                <li><a href="<?php echo base_url('usuarios') ?>" title="Usuários">Usuários</a></li>
				<li><a href="<?php echo base_url('perfil') ?>" title="Perfil">Perfil</a></li>
                <li><a href="<?php echo base_url('sair') ?>" title="Sair do Sistema">Logout</a></li>
            </ul>

            <ul class="header-nav__social">
                <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                </li>
            </ul>

        </div> <!-- end header-nav__content -->

    </nav>  <!-- end header-nav -->

	<ul class="header-menu">
        <li class="header-menu-toggle">
			<span class="header-menu-text"><?php echo $usuarioFistName ?></span>
			<span class="header-menu-image" style="background-image: url('<?php echo base_url($usuarioFoto) ?>'); background-position: center; background-size: cover;">
				<b class="header-menu-fist-letter"><?php echo $usuarioFistLetra ?></b>
			</span>
        </li>
	</ul>

</header> 
