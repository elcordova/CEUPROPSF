<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="<?=base_url()?>static/img/logo2.png" alt="" class="img-responsive img-responsive" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#intro">Inicio</a></li>
        <li><a href="#about">Acerca</a></li>
		<li><a href="#service">Servicios</a></li>
		<li><a href="#contact">Contactenos</a></li>
        <li><a href="<?=base_url()?>index.php/administracion/logout">Cerra Sesion</a></li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
</nav>

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-popup">
                    <a href="#" class="close-link"><i class="close"></i></a>
                    <h3 class="white">Acceder al Sistema</h3>
                    <form action="" method="POST" accept-charset="utf-8" class="popup-form">
                        <input type="text" class="form-control form-white" placeholder="Usuario" id="username" name="username">
                        <input type="password" class="form-control form-white" placeholder="Contraseña" name="password" id="password">
                        <input type="hidden" name="list" value="L1JC1AAR7217B8f3PIl07g"/>
                        
                        <div class="checkbox-holder text-left">
                            <div class="checkbox">
                                <input type="checkbox" value="None" id="squaredOne" name="check" />
                                <label for="squaredOne"><span>Recordarme.</span></label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-submit">Ingresar</button>
                    </form>
                </div>
            </div>
</div>