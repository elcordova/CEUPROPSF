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
						<div class="col-xs-6 col-sm-3 col-md-3">
							<div class="wow bounceInUp" data-wow-delay="0.2s">
								<div class="team boxed-grey">
									<div class="inner">
										<h5>Administra</h5>
										<p class="subtitle">Usuarios</p>
										<div class="avatar"><img src="<?=base_url()?>static/images/user_admin.png" alt="" class="img-responsive img-rounded" /></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-3 col-md-3">
							<div class="wow bounceInUp" data-wow-delay="0.5s">
								<div class="team boxed-grey">
									<div class="inner">
										<h5>Administra</h5>
										<p class="subtitle">Noticias</p>
										<div class="avatar"><img src="<?=base_url()?>static/images/megafone.png" alt="" class="img-responsive img-rounded" /></div>

									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-3 col-md-3">
							<div class="wow bounceInUp" data-wow-delay="0.8s">
								<div class="team boxed-grey">
									<div class="inner">
										<h5>Administra</h5>
										<p class="subtitle">Eventos</p>
										<div class="avatar"><img src="<?=base_url()?>static/images/event.png" alt="" class="img-responsive img-rounded" /></div>

									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-3 col-md-3">
							<div class="wow bounceInUp" data-wow-delay="1s">
								<div class="team boxed-grey">
									<div class="inner">
										<h5>Administra</h5>
										<p class="subtitle">Brigadas</p>
										<div class="avatar"><img src="<?=base_url()?>static/images/brigadas.png" alt="" class="img-responsive img-rounded" /></div>

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

