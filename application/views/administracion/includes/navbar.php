<nav class="navbar navbar-custom" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>

                <a class="navbar-brand" href="<?php echo base_url()?>Administracion">
                    <img src="<?=base_url()?>static/img/logo121.png" alt="" class="img-responsive img-responsive" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#intro">Inicio</a></li>
        <li><a href="<?php echo base_url()?>cusuario/start">Usuarios</a></li>
		<li><a href="<?php echo base_url()?>Noticias/index">Noticas</a></li>
		<li><a href="#contact">Eventos</a></li>
        <li><a href="<?=base_url()?>index.php/administracion/logout">Cerra Sesion</a></li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
</nav>
