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
        <li><a href="#noticia">Noticias</a></li>
		<li><a href="#contact">Contactenos</a></li>
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

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content modal-popup">
                    <a href="#" class="close-link"><i class="close"></i></a>
                    <h3 style="color:white">Acceder al Sistema</h3>
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
                        <button type="submit" class="btn btn-submit btn-lg">Ingresar</button>
                    </form>
                </div>
            </div>
</div>

<div class="modal fade " id="modal_noticia" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-popup">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="blog">
                    <div class="blog-item">
                        <img class="img-responsive img-blog" src="<?=base_url()?>public/img/notices/robot.jpg" width="100%" alt="" />
                        <div class="blog-content">
                            <h3 style="color:white" id="n_titulo">Duis sed odio sit amet nibh vulputate cursus</h3>
                            <div class="media">
                                <div class="media-body">
                                    <div class="well" align="justify">
                                        <p>
                                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames 
                                            ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, 
                                            ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris 
                                            placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat 
                                            wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget 
                                            tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non 
                                            enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, 
                                            tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. 
                                            Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus
                                        </p>
                                        <p>
                                            Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
                                            estibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero 
                                            sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.
                                        </p>
                                    </div>
                                   
                                </div>
                            </div><!--/.media-->


                            
                             <div class="well" align="left">
                                <span><i class="icon-user"></i> John</span>
                                <span><i class="icon-calendar"></i> Sept 16th, 2012</span>
                                <span><i class="icon-comment"></i> <a href="#comments">2 Comments</a></span>
                            </div>
                            <hr>

                            <div id="comments">
                                <div id="comments-list">
                                    <h3 style="color:white">2 Comentarios</h3>
                                    <div class="media">
                                        <div class="media-body">
                                            <div class="well" align="justify">
                                                <div class="media-heading">
                                                    <strong>John Doe</strong>&nbsp; <small>27 Aug 2013</small>
                                                </div>
                                                <p>Gracias por esta importante noticia, saludos.</p>
                                            </div>
                                           
                                        </div>
                                    </div><!--/.media-->
                                    <div class="media">
                                        <div class="media-body">
                                            <div class="well" align="justify">
                                                <div class="media-heading">
                                                    <strong>Cristhian Delgado</strong>&nbsp; <small>27 Aug 2013</small>
                                                </div>
                                                <p>Excelente Noticia.</p>
                                            </div>
                                           
                                        </div>
                                        
                                    </div><!--/.media-->
                                   
                                </div><!--/#comments-list-->  
                                <hr>
                                <div id="comment-form">
                                    <h3 style="color:white">Agregar un Comentario</h3>
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" placeholder="Nombre">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <textarea rows="8" class="form-control" placeholder="Comentario"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg">Comentar</button>
                                    </form>
                                </div><!--/#comment-form-->
                            </div><!--/#comments-->
                        </div>
                    </div><!--/.blog-item-->
                </div>
            
        </div>
    </div>
</div>