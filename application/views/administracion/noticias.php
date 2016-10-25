<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include('includes/cabecera.php');
include('includes/navbar.php');
if ($estado) {
	?>

<script type="text/javascript">
	$(document).ready(function(){
    $('table').DataTable();});
</script>

	<div class="container-fluid container">
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
			foreach ($noticias as $noticia) {
				echo "<tr>";
				echo "<td>";
				echo ($noticia['id_noticia']);
				echo "</td>";
				echo "<td>";
				echo ($noticia['titulo']);
				echo "</td>";
				echo "<td>";
				echo ($noticia['fecha_publicacion']);
				echo "</td>";
				echo "<td>";
				echo "<div class='btn-group' >
    <button type='button' class='btn btn-default'>
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
			?>
		</tbody>
	</table>

	</div>

	<?php  
}else{
	echo "NADA QUE MOSTRAR";
}
?>




<div class="container container-fluid">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<!--$ERROR MUESTRA LOS ERRORES QUE PUEDAN HABER AL SUBIR LA IMAGEN-->
			<?=@$error?>
			<div id="formulario_imagenes">
				<span><?php echo validation_errors(); ?></span>
				<?=form_open_multipart("Noticias/insert")?>
				<label>Título:</label><input type="text" id="titulo" name="titulo" />
				<label>Contenido:</label><input type="text" id="contenido" name="contenido" />
				<label>Imagen 1:</label><input type="file" id="file" name="file" /><br /><br />
				<input type="submit" value="Subir imágenes" />
				<?=form_close()?>
			</div>
		</div>

	</div>

