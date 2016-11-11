	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	if (!$this->session->userdata('conectado')==true) {
		
	?>

	
	
	<?php include("includes/cabecera.php") ?>

	<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

    <?php include("includes/navbar.php") ?>

	<!-- Section: intro -->
    <section id="intro" class="intro">
	
		<div class="slogan">
			<h2>BIENVENIDOS A <span class="text_color">CEUPROPSF</span> </h2>
			<h4>Centro Universitario de Promoción y Prevención de la Salud Familiar</h4>
		</div>
		<div class="page-scroll">
			<a href="#service" class="btn btn-circle">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
		</div>
    </section>
	<!-- /Section: intro -->

	<!-- Section: about -->
    <section id="about" class="home-section text-center">
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Acerca</h2>
					<i class="fa fa-2x fa-angle-down"></i>
					<h5>MISION:</h5>
					<p>En el consultorio para la comunidad Machaleña, cuidamos la vida de nuestros pacientes y luchamos día a día por mejorar su salud.</p>
					<h5>VISIÓN:</h5>
					<p>Ser referente de excelencia en servicios de salud en El Oro. </p>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div>
			<h4>COLABORADORES</h4>
		</div>
		<div class="container fluid">

		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
        <div class="row">
        <!-- <div class="col-xs-4 col-sm-3 col-md-3"> -->
           
            <div class="col-sm-4">
				<div class="wow bounceInUp" data-wow-delay="0.2s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Ing. Fausto Redrován</h5>
                        <p class="subtitle">Coordinador de la Carrera</p>
                        <p class="subtitle">Ingeniería de Sistemas</p>
                        <div class="avatar"><img src="<?=base_url()?>static/img/team/Ing_Fausto.jpg" alt="" class="img-responsive img-circle" /></div>
                    </div>
                </div>
				</div>
            </div>
			<div class="col-sm-4">
				<div class="wow bounceInUp" data-wow-delay="0.5s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Dra. Brigida Agudo Gonzabay</h5>
                        <p class="subtitle">Gestora del Proyecto</p>
                        <p class="subtitle">Ceupropsf</p>
                        <div class="avatar"><img src="<?=base_url()?>static/img/team/2.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
                </div>
				</div>
            </div>
			<div class="col-sm-4">
				<div class="wow bounceInUp" data-wow-delay="0.8s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Dra. Sylvana Cuenca Buele</h5>
                        <p class="subtitle">Coordinadora de la Carrera</p>
                        <p class="subtitle">Ciencias Médicas</p>
                        <div class="avatar"><img src="<?=base_url()?>static/img/team/1.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
                </div>
				</div>
            </div>
                </div>
				</div>
            </div>
        </div>		
		</div>
	</section>
	<!-- /Section: about -->
	

	<!-- Section: services -->
    <section id="service" class="home-section text-center bg-gray">
		
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Nuestros Servicios</h2>
					<i class="fa fa-2x fa-angle-down"></i>
					<p>Somos un equipo de profesionales y personal calificado, con vocación de servicio, principios éticos, morales, dentro del marco legal. Contamos con equipos de tecnología apropiada, cumpliendo buenas prácticas e incentivando proyectos innovadores enfocados a la mejora continua.</p>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">				
			</div>
		</div>
        <div class="row">
            <div class="col-sm-3 col-md-3">
				<div class="wow fadeInLeft" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<img src="<?=base_url()?>static/img/icons/hiper.png" alt="" />
					</div>
					<div class="service-desc">
						<h5>Hipertensión arterial en adultos mayores</h5>
						<p>Medición de la tensión arterial en adultos mayores para la regulación del flujo sanguineo correcto.</p>
					</div>
                </div>
				</div>
            </div>
			<div class="col-sm-3 col-md-3">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<img src="<?=base_url()?>static/img/icons/lact.png" alt="" />
					</div>
					<div class="service-desc">
						<h5>Lactancia Materna</h5>
						<p>Es importante tener presentes estas creencias sobre la lactancia, y saber cuáles tienen fundamento y cuáles no. De otro modo, podrías abandonar la lactancia sin necesidad.</p>
					</div>
                </div>
				</div>
            </div>
			<div class="col-sm-3 col-md-3">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<img src="<?=base_url()?>static/img/icons/diabe.png" alt="" />
					</div>
					<div class="service-desc">
						<h5>Diabetes Mellitus</h5>
						<p>Una enfermedad que se produce cuando el páncreas no puede fabricar insulina suficiente o cuando ésta no logra actuar en el organismo porque las células no responden a su estímulo.</p>
					</div>
                </div>
				</div>
            </div>
			<div class="col-sm-3 col-md-3">
				<div class="wow fadeInRight" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<img src="<?=base_url()?>static/img/icons/gene.png" alt="" />
					</div>
					<div class="service-desc">
						<h5>Medicina General</h5>
						<p>La medicina de familia es la disciplina médica que se encarga de mantener la salud en todos los aspectos, analizando y estudiando el cuerpo humano en forma global.</p>
					</div>
                </div>
				</div>
            </div>
        </div>		
		</div>
	</section>
	<!-- /Section: services -->


	<!-- Section: noticias -->
    <section id="noticia" class="home-section text-center bg-gray">
		
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Noticias</h2>
					<i class="fa fa-2x fa-angle-down"></i>
					<p>Aquí podrá encontrar las noticias acerca de nuestros eventos y demás, CEUPROPSF.</p>
					<div class="btn-group">
                        <a class="btn btn-primary" href="#scroller" data-slide="prev"><i class="icon-angle-left"></i></a>
                        <a class="btn btn-primary" href="#scroller" data-slide="next"><i class="icon-angle-right"></i></a>
                    </div>
					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">
		<hr>

		

       	<div class="row">
                <div class="col-md-12">
                    <div id="scroller" class="carousel slide">
                        <div class="carousel-inner">
                        	
                        	<?php 
                        		$cont = 0;
                        		$active = 'active';
								foreach ($noticias as $noticia) {
									$cont++;
									if($cont==1){
							?>
							<div class="item <?php echo $active ?>">
                                <div class="row">
							<?php
									}
							?>
							
                                    <div class="col-md-4">
                                        <div class="portfolio-item">
                                            <div class="item-inner">
                                                <div align="center">
                                                	<img class="img-responsive" style="max-height:250px; min-height:250px; max-width:450px" src="<?=base_url()?>public/img/notices/<?php echo $noticia['banner'] ?>" alt="">
                                                </div>
                                                <h5>
                                                    <?php echo ($noticia['titulo']); ?>
                                                </h5>
                                                <h9><?php echo ($noticia['fecha_publicacion']); ?></h9>
                                                <div class="overlay">
                                                    <a class="preview btn btn-primary" title="Ver Noticia" data-toggle="modal" data-target="#modal_noticia" onclick="verNoticia(<?php echo ($noticia['id_noticia']); ?>);" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                            
                                
							<?php
									if($cont==3){
										$cont=0;
							?>
								</div><!--/.row-->
                            </div><!--/.item-->
							<?php
									}

									
									$active = '';
								}
							?>
								
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div><!--/.row-->		
		</div>
	</section>
	<!-- /Section: noticias -->

	<!-- Section: contact -->
    <section id="contact" class="home-section text-center">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Contactenos</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">

		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
    <div class="row">
        <div class="col-lg-8">
            <div class="boxed-grey">
                <form id="contact-form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Ingrese su nombre" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email </label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Ingrese su email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Asunto</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Elige uno:</option>
                                <option value="service">Hipertensión Aterial </option>
                                <option value="service">Lactancia Materna </option>
                                <option value="suggestions">Diabetes Mellitus</option>
                                <option value="product">Medicina General</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Mensaje</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Mensaje"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-skin pull-right" id="btnContactUs">
                            Enviar Mensaje</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
		
		<div class="col-lg-4">
			<div class="widget-contact">
				<h5>Oficina principal</h5>
				
				<address>
				  <strong>CEUPROPSF </strong><br>
				  ubicado en las calles 10 de Agosto y Marcel Laniado, Esquina<br>
				  <abbr title="Phone">Telefono:</abbr> (072) 900-000
				</address>

				<address>
				  <strong>Email</strong><br>
				  <a href="mailto:#">ceupropsf@gmail.com</a>
				</address>	
				<address>
				  <strong>Síguenos en:</strong><br>
                       	<ul class="company-social">

                            <li class="social-facebook"><a href="https://www.facebook.com/ceupropsf/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="social-twitter"><a href="https://twitter.com/ceupropsf" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="social-google"><a href="https://plus.google.com/108705010349767747804" target="_blank"><i class="fa fa-google-plus"></i></a></li>

                        </ul>	
				</address>					
			
			</div>	
		</div>
    </div>	

		</div>
	</section>
	<?php 
		}else{
		redirect('Administracion');
		}

		include("includes/footer.php")
		?>
	

	