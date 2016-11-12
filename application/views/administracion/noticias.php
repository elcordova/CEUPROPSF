<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
<script type="text/javascript" src="<?=base_url()?>static/js/noticias/noticias.js"></script>
   <div class="container-fluid">
   	<!-- inicio de Panel de Acordeones -->
      <div class="well panel panel-default" style="margin-top: 1%">
      	
			
			<!-- inicio de Acordeon #2 -->
			<div class="panel-group" id="accordion2"> 
            <div class="panel panel-primary">
               <div class="panel-heading panel-heading-custom">
				      <h4 class="panel-title">
					      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2"  href="#collapseTwo">
					        NUEVA NOTICIA
					      </a>
				      </h4>
				   </div>
					<div id="collapseTwo" class="panel-collapse collapse in">
						<div class="panel-body">
                     <div class="row">
								
								<!-- form de nueva Noticia -->
								<div class="container-fluid">
									<div class="jumbotron">
							
											<!--$ERROR MUESTRA LOS ERRORES QUE PUEDAN HABER AL SUBIR LA IMAGEN-->
											<?=@$error?>
											<div id="formulario_imagenes" >
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
														<input id="cancelar" value="Cancelar" type="button" name='cancelar' onclick='limp_form_noticia()' class="btn  btn-primary "/>
													</div>

												<?=form_close()?>
											</div>
											<div class="jumbotron jumbotron-fluid" >
												<label for="list">Vista Previa:</label>
												<img id="list" src="" class="img-rounded img-thumbnail"/>
											</div>
	
									</div>
								</div><!-- fin de form de nueva noticia -->
							</div>
						</div>
					</div>
				</div>
			</div> <!-- fin de acordeon #2 -->
			
			<!-- inicio de acordeon #1 -->
			<div class="panel-group" id="accordion"> 
            <div class="panel panel-primary">
               <div class="panel-heading panel-heading-custom">
				      <h4 class="panel-title">
					      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
					        LISTAR NOTICIAS
					      </a>
				      </h4>
				   </div>
					<div id="collapseOne" class="panel-collapse collapse in">
						<div class="panel-body">
                     <div class="row">
								
								<!-- contenedor de tabla de Presentacion de Noticias -->
								<div class="container-fluid" id='contenedor_tabla'>
									
								</div><!-- fin de contenedor de tabla de presentacion de noticias -->
							</div>
						</div>
					</div>
				</div>
			</div><!-- fin de Acordeon #1 -->

		</div> <!-- Fin de Panel de Acordeones -->
	</div>




<!-- modal de edicion de noticias -->
		


		<div class="modal fade" id="modal-editar_noticia">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">Edicion de Noticia</h4>
					</div>
					<?=form_open_multipart("Noticias/actualizar",array('id'=>'form_noticia_edit','class'=>'form-horizontal'))?>
					<div class="modal-body">
						<div class="panel-body">
                     <div class="row">
								<!-- form de Edicion Noticia -->
								<div class="container-fluid ">
									<div class="row ">
										<div>
											
											<!--$ERROR MUESTRA LOS ERRORES QUE PUEDAN HABER AL SUBIR LA IMAGEN-->
											<?=@$error?>
											<div id="formulario_imagenes" class="container-fluid col-sm-8 col-lg-3 col-md-3">
												<span><?php echo validation_errors(); ?></span>
												<input type="text" class="form-control hidden" id="id_noticia" name="id_noticia">
												<div class="form-group">
													<label for="titulo_edit">Titulo de Noticia:</label>
													<input type="text" class="form-control" id="titulo_edit" name="titulo_edit">
												</div>
												<div class="form-group">
													<label for="contenido_edit">Contenido de Noticia:</label>
													<textarea type="text" class="form-control" id="contenido_edit" name="contenido_edit" rows="5"></textarea>
												</div>
												
												
												<div class="form-group">
													<label class="checkbox-inline"><input type="checkbox" id='checkbox_edit_img' name="checkbox_edit_img" >Editar Imagen de Noticia</label>
												</div>

												<div class="form-group" id='bloque_file'>
													<label class="custom-file">
													  <input type="file" id="file_edit" class="custom-file-input"  name="file_edit">
													  <span class="custom-file-control"></span>
													</label>
												</div>
											</div>

											<div class="container-fluid col-sm-8 col-md-3 col-lg-2" id='bloque_imagen_ant' >
												<label for="list">Vista Previa:</label>
												<img id="list_edit" src="" class="img-rounded img-thumbnail"/>
											</div>

											<div class="container-fluid col-sm-8 col-md-3 col-lg-2" id='bloque_imagen_new' >
												<label for="list">Vista Previa:</label>
												<img id="list_edit_new" src="" class="img-rounded img-thumbnail"/>
											</div>

										</div>
									</div>
								</div><!-- fin de form de nueva noticia -->
							</div>
						</div>
					</div>
					<div class="modal-footer">
													<input id="guardar" type="submit" value="Guardar Noticia" class="btn btn-lg  btn-primary "/>
													<input id="cancelar" value="Cancelar" name='cancelar' data-dismiss="modal"  class="btn  btn-primary btn-lg "/>
					</div>
					<?=form_close()?>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->




		        
