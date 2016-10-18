		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		if ($this->session->userdata('conectado')==true) {
			$username=$this->session->userdata('email');
			$id_user=$this->session->userdata('id');
		?>
			<body>
				
				<?php include("includes/cabecera.php") ?>
				<h2> acceso como administrador a <?php echo $username; ?></h2>
				<h3>bienvenido  su id es <?php echo $id_user; ?></h3>
			
		<?php 
		} else 
		{
			redirect(base_url());
		}
		 ?>

		 </body>
			</html>
