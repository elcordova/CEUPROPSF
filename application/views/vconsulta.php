<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
<script type="text/javascript" src="<?=base_url()?>static/js/consultas/consulta.js"></script>
   <div class="container-fluid">
   	<!-- inicio de Panel de Acordeones -->
      <div class="well panel panel-default" style="margin-top: 1%">
      	
			
			<!-- inicio de Acordeon #2 -->
			<div class="panel-group" id="accordion2"> 
            <div class="panel panel-primary">
               <div class="panel-heading panel-heading-custom">
					      <h4 class="panel-title">
						      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2"  href="#collapseTwo">
						        <i class="fa fa-rss-square">  </i><span class="nav-label"> NUEVA CONSULTA</span>
						      </a>
					      </h4>
				   		 </div>
					<div id="collapseTwo" class="panel-collapse collapse in">
						<div class="panel-body">
							<div class="col-md-12 " id="div_consulta">
								<div id="divFrmEsp" class="col-md-7 " style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">
									<form id="frmConsulta">
										<fieldset class="scheduler-border">
											<legend class="scheduler-border"><i class="fa fa-plus-square">  </i><span class="nav-label"> Nueva Consulta</span></legend>


											<div class="form-group">
											<label for="txtName">Paciente:</label>
 												<input type="text" class="form-control" id="input_ced_pac"  placeholder="Cedula de Paciente" aria-describedby="sizing-addon1">
												<button class="btn btn-info" type="button" id="btn_buscar" >Buscar </button>
											</div>
											
											<input type="text" class="hide form-control" id="pac_cod" name="id_pac"  placeholder="id de paciente" aria-describedby="sizing-addon1">
											<input type="text" class=" hide form-control" id="dbm_id" name="dbm_id"  placeholder="detalle de brigada medico" aria-describedby="sizing-addon1">

											<input type="text" class=" hide form-control" id="cod_consulta" name="dbm_id"  placeholder="codigo de consulta" aria-describedby="sizing-addon1">

											<div class="form-group">
												<label for="txtName">Brigada: </label>
													<select class="selectpicker form-control" id="sel_brigada" name="sel_brigada" data-live-search="true">
													</select>
												</div>
											
											<div class="form-group">
												<label for="txtName">Especialidad:</label>
												<select class="selectpicker form-control" id="sel_especialidad" name="sel_especialidad" data-live-search="true">
												</select>
											</div>

											<div class="form-group">
												<label for="txtName">Medico:</label>
												<select class="selectpicker form-control" id="sel_medico" name="sel_medico" data-live-search="true">
												</select>
											</div>
											<div class="form-group">
												<label for="txtName">Observacion:</label>
 												<textarea type="text" class="form-control" id="con_observacion"  aria-describedby="sizing-addon1"></textarea>
											</div>
										</fieldset>
										<div class="row">
											<div align="center">
												<button class="btn btn-primary" id="sub_boton"><i class="fa fa-save">  </i><span class="nav-label">Generar</span></button>
											</div>
										</div>
									</form>
								</div>
								<div id="divFrmEsp" class="col-md-5 " style="padding:10px 35px 40px 35px;background-color:#FFF;">
									<div>
											<blockquote id="dat_paci">
												<p>datos de paciente</p>
											</blockquote>
											</div>
								</div>
								<div id="divExamenes" class="col-md-7" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">
										<button type="button" id="btn_sv" class="btn btn-info col-md-11">Signos Vitales</button>
										<button type="button" id="btn_sg" class="btn btn-info col-md-11">Examen Somatico General</button>
										<button type="button" id="btn_efr" class="btn btn-info col-md-11">Examen Físico Regional</button>
										<button type="button" id="btn_ras" class="btn btn-info col-md-11">Revison por aparatos y sistemas</button>
										<button type="button" id="btn_eg" class="btn btn-info col-md-11">Escala de GLASGOW</button>
										<button type="button" id="btn_pc" class="btn btn-info col-md-11">Pares Craneales</button>
										<button type="button" id="btn_reflejos" class="btn btn-info col-md-11">Reflejos</button>
										<button type="button" id="btn_motilidad" class="btn btn-info col-md-11">Motilidad</button>
										<button type="button" id="btn_sensibilidad" class="btn btn-info col-md-11">Sensibilidad</button>
										<button type="button" id="btn_examenes" class="btn btn-info col-md-11">Examen de Laboratorio y Diagnostico</button>
								</div>
							</div>
									<button type="button"  id="btn_salir_gen" class="btn btn-warning col-md-12 hidden ">Salir</button>
									
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
					        <i class="fa fa-th-list">  </i><span class="nav-label"> LISTAR CONSULTAS</span>
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


	 <!-- MODAL VER CITA -->
    <div class="modal fade" id="modalObservacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-dialog" style="width:500px ;">
              <div class="modal-content panel panel-primary">

                <div class="modal-header panel panel-heading">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Observacion</h4>
                </div>              
                <div class="modal-body">
                <fieldset class="scheduler-border">
                <legend class="scheduler-border">Observacion</legend>
                  <div class="row">
                    <input type="hidden" name="con_id" id="con_id">
                    
                    <div class="col-xs-12" id="">
                      <textarea class="form-control input-sm" rows="5" name="con_obs" id="con_obs" placeholder="......" ></textarea>
                    </div>
                  </div>
                </fieldset>                        
                </div>
                
                <div class="modal-footer" >
                  <button type="button" class="btn btn-default"  data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary" id="guardarObservacion" name="guardarObservacion">Guardar</button>
                </div>
              </div>
              </div>
             </div>
       </div>
       <!--MODAL VER CITA --> 
















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
													<button id="guardar" type="submit" value="Guardar Noticia" class="btn btn-lg  btn-primary "><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></button>
													<button id="cancelar" value="Cancelar" name='cancelar' data-dismiss="modal"  class="btn  btn-primary btn-lg "> <i class="fa fa-ban">  </i><span class="nav-label"> Cancelar</span></button>
					</div>
					<?=form_close()?>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
