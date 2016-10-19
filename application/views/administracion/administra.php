		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		if ($this->session->userdata('conectado')==true) {
			$username=$this->session->userdata('email');
			$id_user=$this->session->userdata('id');
		?>
			<?php include("includes/cabecera.php") ?>
			<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
			<div id="preloader">
			  <div id="load"></div>
			</div>
			<?php include("includes/navbar.php") ?>
				<div class="container">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
        <div class="row">
            <div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.2s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Dra. Maritza Agudo</h5>
                        <p class="subtitle">Gestora del Proyecto</p>
                        <div class="avatar"><img src="<?=base_url()?>static/img/team/1.jpg" alt="" class="img-responsive img-circle" /></div>
                    </div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.5s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Dr. Nombre 2</h5>
                        <p class="subtitle">Cargo 2</p>
                        <div class="avatar"><img src="<?=base_url()?>static/img/team/2.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.8s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Dr. Nombre 3</h5>
                        <p class="subtitle">Cargo 3</p>
                        <div class="avatar"><img src="<?=base_url()?>static/img/team/3.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="1s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Dr. Nombre 4</h5>
                        <p class="subtitle">Cargo 4</p>
                        <div class="avatar"><img src="<?=base_url()?>static/img/team/4.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
                </div>
				</div>
            </div>
        </div>		
		</div>

				<?php include("includes/footer.php") ?>
		<?php 
		} else 
		{
			redirect(base_url());
		}
		 ?>

		 </body>
			</html>

