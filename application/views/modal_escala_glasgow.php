<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
<script type="text/javascript" src="<?=base_url()?>static/js/consultas/escala_glasgow.js"></script>
<div class="modal fade" id="modal_eg">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">Escala de Glasgow</h4>
					</div>
					<form>
					<div class="modal-body">
						<div class="panel-body">
                     		<div class="row">
														
												<input type="text" class="form-control hidden" id="id_consulta" name="id_noticia">
												<input type="text" class="form-control hidden" id="eg_id" name="sg_id">
												
												<div class="form-group">
													<label for="txt_fc">O: </label>
													<input type="text" class="form-control" id="eg_o" name="eg_o">
												</div>

												<div class="form-group">
													<label for="txt_ta">M: </label>
													<input type="text" class="form-control" id="eg_m" name="eg_m">
												</div>

												<div class="form-group">
													<label for="txt_tem">V: </label>
													<input type="text" class="form-control" id="eg_v" name="eg_v">
												</div>

												<div class="form-group">
													<label for="txt_fr">Total:</label>
													<input type="text" class="form-control" id="eg_total" name="eg_total">
												</div>
									</div>
								</div>
							</div>
					<div class="modal-footer">
													<button id="btn_guardar_eg" type="button" value="Guardar" class="btn btn-lg  btn-primary "><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></button>
													<button id="btn_cancelar_eg" value="Cancelar" name='cancelar' data-dismiss="modal"  class="btn  btn-primary btn-lg "> <i class="fa fa-ban">  </i><span class="nav-label"> Cancelar</span></button>
					</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->