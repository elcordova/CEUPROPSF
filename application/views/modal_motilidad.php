<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
<script type="text/javascript" src="<?=base_url()?>static/js/consultas/motilidad.js"></script>
<div class="modal fade" id="modal_motilidad">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">Motilidad</h4>
					</div>
					<form>
					<div class="modal-body">
						<div class="panel-body">
                     		<div class="row">
														
												<input type="text" class="form-control hidden" id="id_consulta" name="id_noticia">
												<input type="text" class="form-control hidden" id="motilidad_id" name="reflejos_id">
												
												<div class="form-group">
													<label for="ref_bicipital">Activa y Pasiva: </label>
													<input type="text" class="form-control" id="mod_activa_pasiva" name="ref_bicipital">
												</div>

												<div class="form-group">
													<label for="ref_tricipital">Fuerza muscular: </label>
													<input type="text" class="form-control" id="mot_fuerza_muscular" name="ref_tricipital">
												</div>

									</div>
								</div>
							</div>
					<div class="modal-footer">
													<button id="btn_guardar_motilidad" type="button" value="Guardar" class="btn btn-lg  btn-primary "><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></button>
													<button id="btn_cancelar_eg" value="Cancelar" name='cancelar' data-dismiss="modal"  class="btn  btn-primary btn-lg "> <i class="fa fa-ban">  </i><span class="nav-label"> Cancelar</span></button>
					</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->