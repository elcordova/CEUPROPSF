<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
<script type="text/javascript" src="<?=base_url()?>static/js/consultas/pares_craneales.js"></script>

<div class="modal fade" id="modal_pc">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">Pares Craneales</h4>
					</div>
					<form>
					<div class="modal-body">
						<div class="panel-body">
                     		<div class="row">
														
												<input type="text" class="form-control hidden" id="id_consulta" name="id_noticia">
												<input type="text" class="form-control hidden" id="pc_id" name="sg_id">
												
												<div class="form-group">
													<label for="pc_olfatorio">Olfatorio : </label>
													<input type="text" class="form-control" id="pc_olfatorio" name="pc_olfatorio">
												</div>

												<div class="form-group">
													<label for="pc_optico">Optico: </label>
													<input type="text" class="form-control" id="pc_optico" name="pc_optico">
												</div>

												<div class="form-group">
													<label for="pc_moc">MOC: </label>
													<input type="text" class="form-control" id="pc_moc" name="pc_moc">
												</div>

												<div class="form-group">
													<label for="pc_patetico">patetico:</label>
													<input type="text" class="form-control" id="pc_patetico" name="pc_patetico">
												</div>

												<div class="form-group">
													<label for="pc_trigemino">trigemino:</label>
													<input type="text" class="form-control" id="pc_trigemino" name="pc_trigemino">
												</div>
									
												<div class="form-group">
													<label for="pc_moe">moe:</label>
													<input type="text" class="form-control" id="pc_moe" name="pc_moe">
												</div>

												<div class="form-group">
													<label for="pc_fascial">fascial:</label>
													<input type="text" class="form-control" id="pc_fascial" name="pc_fascial">
												</div>

												<div class="form-group">
													<label for="pc_vestibulococlear">vestibulococlear:</label>
													<input type="text" class="form-control" id="pc_vestibulococlear" name="pc_vestibulococlear">
												</div>

												<div class="form-group">
													<label for="pc_glosofaringeo">glosofaringeo:</label>
													<input type="text" class="form-control" id="glosofaringeo" name="glosofaringeo">
												</div>

												<div class="form-group">
													<label for="pc_neumogastrico">neumogastrico:</label>
													<input type="text" class="form-control" id="pc_neumogastrico" name="pc_neumogastrico">
												</div>

												<div class="form-group">
													<label for="pc_espinal">espinal:</label>
													<input type="text" class="form-control" id="pc_espinal" name="pc_espinal">
												</div>

												<div class="form-group">
													<label for="pc_hipogloso">hipogloso:</label>
													<input type="text" class="form-control" id="pc_hipogloso" name="pc_hipogloso">
												</div>
									</div>
								</div>
							</div>
					<div class="modal-footer">
													<button id="btn_guardar_pc" type="button" value="Guardar" class="btn btn-lg  btn-primary "><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></button>
													<button id="btn_cancelar_pc" value="Cancelar" name='cancelar' data-dismiss="modal"  class="btn  btn-primary btn-lg "> <i class="fa fa-ban">  </i><span class="nav-label"> Cancelar</span></button>
					</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->