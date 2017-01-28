<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>


<!DOCTYPE html>
	<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CEUPROPSF - El Centro Universitario de Promoción y Prevención de la Salud Familiar</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>static/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url()?>static/css/bootstrap-select.css" rel="stylesheet" type="text/css">


    <!-- Fonts -->
    <link href="<?=base_url()?>static/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="<?=base_url()?>static/css/animate.css" rel="stylesheet" />
    <!-- theme CSS -->
    <link href="<?=base_url()?>static/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>static/css/toastr/toastr.min.css">
		<link rel="shortcut icon" href="<?=base_url()?>static/img/logo1.png">
		<link href="<?php echo base_url()?>static/css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>static/css/dataTables.bootstrap.css">


	<!-- Core JavaScript Files -->
   
    <script src="<?php echo base_url()?>static/js/jquery-1.11.3.min.js"></script>
    <script src="<?=base_url()?>static/js/bootstrap.min.js"></script>
	
		<script src="<?=base_url()?>static/js/wow.min.js"></script>

		<script src="<?=base_url()?>static/js/validate/jquery.validate.min.js"></script>
		<script src="<?=base_url()?>static/js/toastr/toastr.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>static/js/custom.js"></script>
	<script src="<?=base_url()?>static/js/ajaxfileupload.js"></script>
	
    <script src="<?php echo base_url()?>static/js/alls.js"></script>

    <!-- DataTable --> 
    <script type="text/javascript" charset="utf8" src="<?php echo base_url()?>static/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?php echo base_url()?>static/js/dataTables.bootstrap.js"></script>
    <script src="<?=base_url()?>static/js/jquery.uitablefilter.js" charset="utf8" type="text/javascript"></script>
    <!-- Notify -->    
    <script src="<?php echo base_url()?>static/js/notify.js"></script>
    <script src="<?=base_url()?>static/js/bootstrap-select.js"></script>
    <script src="<?=base_url()?>static/js/jquery.easing.min.js"></script>
    <script src="<?=base_url()?>static/js/jquery.scrollTo.js"></script>

</head>
<!-- validacion de session Iniciada -->
				<?php

				if ($this->session->userdata('conectado')==true)
						{
							$username=$this->session->userdata('email');
							$id_user=$this->session->userdata('id');

						} else

							{
								redirect(base_url());
							}

				?>
<!-- fin de validacion de sesion iniciada -->
