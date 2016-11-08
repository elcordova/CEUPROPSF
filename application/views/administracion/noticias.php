<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('includes/cabecera.php');
include('includes/navbar.php');
?>
<script type="text/javascript" src="<?=base_url()?>static/js/noticias/noticias.js"></script>


<div class="container-fluid container" id='contenedor_tabla'>
	<table class="table table-striped table-bordered " cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Identificador</th>
				<th>Titulo </th>
				<th>Fecha</th>
				<th>Acciones</th>				
			</tr>
		</thead>
		<tbody>
			<?php 
			if (isset($noticias)) {
					foreach ($noticias as $noticia) {
				echo "<tr>";
				echo "<td>";
				echo ($noticia['not_id']);
				echo "</td>";
				echo "<td>";
				echo ($noticia['not_tit']);
				echo "</td>";
				echo "<td>";
				echo ($noticia['not_fec_pub']);
				echo "</td>";
				echo "<td>";
				echo "<div class='btn-group' >
				<button type='button' class='btn btn-default' onclick=carga_noticia(".$noticia['not_id'].")>
					<span class='glyphicon glyphicon-edit'></span>
				</button>

				<button type='button' class='btn btn-default'>
					<span class='glyphicon glyphicon-trash'></span>
				</button>

			</div>
		</div>";
		echo "</td>";
		echo "</tr>";	

	}
			}
		
	
	?>
</tbody>
</table>

</div>


	



<div class="container container-fluid">
	<div class="row jumbotron">
		<div >
			<!--$ERROR MUESTRA LOS ERRORES QUE PUEDAN HABER AL SUBIR LA IMAGEN-->
			<?=@$error?>
			<div id="formulario_imagenes" class="col-md-7 col-sm-10 col-lg-7">
				<span><?php echo validation_errors(); ?></span>
				<?=form_open_multipart("Noticias/insert",array('id'=>'form_noticia','class'=>'form-horizontal'))?>

				<div class="form-group">
				<label for="titulo">Titulo de Noticia:</label>
					<input type="text" class="form-control" id="titulo" name="titulo">
				</div>
				<div class="form-group">
					<label for="contenido">Contenido de Noticia:</label>
					<textarea type="text" class="form-control" id="contenido" name="contenido" rows="5"></textarea>
				</div>
				
				<div class="form-group">
					<label class="custom-file">
					  <input type="file" id="file" class="custom-file-input"  name="file">
					  <span class="custom-file-control"></span>
					</label>
				</div>
					<div class="btn-group">
					<input id="guardar" type="submit" value="Guardar Noticia" class="btn  btn-primary "/>
					<input id="cancelar" value="Cancelar" name='cancelar' onclick='limp_form_noticia()' class="btn  btn-primary "/>
				</div>
				<?=form_close()?>
			</div>
			<div class="col-md-3 col-sm-10 col-lg-3 jumbotron jumbotron-fluid" >
				<label for="list">Vista Previa:</label>
				<img id="list" src="" class="img-rounded img-thumbnail"/>
			</div>
		</div>

	</div>
</div>

