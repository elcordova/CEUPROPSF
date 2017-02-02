<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="<?=base_url()?>static/img/logo121.png" alt="" class="img-responsive img-responsive" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#intro">Inicio</a></li>
        <li><a href="#about">Acerca</a></li>
		<li><a href="#service">Servicios</a></li>
        <li><a href="#noticia">Noticias</a></li>
		<li><a href="#contact">Contáctenos</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sistema <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#" data-toggle="modal" data-target="#modal1">Login</a></li>
          </ul>
        </li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
</nav>
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <img class="img" id="img_logo" src="<?=base_url()?>static/img/logo12.png">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <!-- Begin # Login Form -->
                    <form action="" method="POST" accept-charset="utf-8" class="popup-form">
                        <div class="modal-body">
                            <div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Ingrese su correo y contraseña</span>
                            </div>
                            <input id="username" class="form-control" type="text" placeholder="Usuario" name="username" required>
                            <input id="password" class="form-control" type="password" placeholder="Contraseña" name="password" required>                            
                         </div>
                        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
                            </div>                            
                        </div>
                    </form>
                    <!-- End # Login Form -->
                    
                    <!-- Begin | Lost Password Form -->
                    <form id="lost-form" style="display:none;">
                        <div class="modal-body">
                            <div id="div-lost-msg">
                                <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-lost-msg">Type your e-mail.</span>
                            </div>
                            <input id="lost_email" class="form-control" type="text" placeholder="E-Mail (type ERROR for error effect)" required>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                            </div>
                            <div>
                                <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                                <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
                            </div>
                        </div>
                    </form>
                    <!-- End | Lost Password Form -->                   
                </div>
                <!-- End # DIV Form -->
                
            </div>
        </div>
    </div>


<div class="modal fade " id="modal_noticia" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="blog">
                    <div class="blog-item">
                        <h3 style="color:white" id="n_titulo"></h3>
                        <img class="img-responsive img-blog" src="" 
                        width="100%" style="max-height:450px; cursor:pointer;" title="Ver imagen completa" id="n_imagen"/>
                        <div class="blog-content">
                            <div class="media">
                                <div class="media-body">
                                    <div class="well" align="justify" id="n_contenido">
                                        <p>
                                            
                                        </p>
                                    </div>
                                   
                                </div>
                            </div><!--/.media-->


                            
                             <div class="well" align="left">
                                <span><i class="icon-user"></i> CEUPROPSF</span>
                                <span><i class="icon-calendar"></i> <span id="n_fecha"></span></span>
                                <span><i class="icon-comment"></i> <a href="#comments"><span id="n_comentario"></span></a></span>
                            </div>
                            <hr>

                            <div id="comments">
                                <div id="comments-list">
                                    <h3 style="color:white" id="n_comentario2"></h3>
                                    <h6 style="color:white"><a href="#comment-form">Comentar</a></h6>
                                    <div id="lista_comentarios">
                                        <!--<div class="media">
                                            <div class="media-body">
                                                <div class="well" align="justify">
                                                    <div class="media-heading">
                                                        <strong>John Doe</strong>&nbsp; <small>27 Aug 2013</small>
                                                    </div>
                                                    <p>Gracias por esta importante noticia, saludos.</p>
                                                </div>
                                               
                                            </div>
                                        </div>-->
                                    </div>
                                    
                                   
                                </div><!--/#comments-list-->  
                                <hr>
                                
                                <div id="comment-form">
                                    <h3 style="color:white">Agregar un Comentario</h3>
                                    <form class="form-horizontal" id="form_comentario">
                                        <div class="form-group">
                                            <input type="hidden" id="not_codigo">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" placeholder="Nombre" id="come_nombre" name="come_nombre">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control" placeholder="Email" id="come_correo" name="come_correo">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <textarea rows="8" class="form-control" placeholder="Comentario" id="come_contenido" name="come_contenido"></textarea>
                                            </div>
                                        </div>
                                        <input class="btn btn-primary btn-lg" value="Comentar" onclick="agregarComentario(); return false;">
                                    </form>>
                                </div><!--/#comment-form-->
                            </div><!--/#comments-->
                        </div>
                    </div><!--/.blog-item-->
                </div>
            
        </div>
    </div>
</div>