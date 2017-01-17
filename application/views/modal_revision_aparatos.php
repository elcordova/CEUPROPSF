<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
<script type="text/javascript" src="<?=base_url()?>static/js/consultas/aparatos_sistemas.js"></script>
<div class="modal fade" id="modal_ras">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">Revision por aparatos y sistemas</h4>
					</div>
					<form>
					<div class="modal-body">
						<div class="panel-body">
                     		<div class="row">

												<input type="text" class="form-control hidden" id="id_consulta" >
												<input type="text" class="form-control hidden" id="as_id">

												<div class="form-group">
												<label for="txtName">Aparato o Sistema : </label>
													<select class="selectpicker form-control" id="sel_aparato" name="sel_aparato" data-live-search="true">
													</select>
												</div>

												<div class="form-group">
													<label for="ras_inspeccion">Inspeccion :</label>
													<input type="text" class="form-control" id="ras_inspeccion" name="ras_inspeccion">
												</div>

												
												<div class="form-group">
													<label for="ras_palpacion">Palpacion :</label>
													<input type="text" class="form-control" id="ras_palpacion" name="ras_palpacion">
												</div>


												
												<div class="form-group">
													<label for="ras_percusion">Percusion :</label>
													<input type="text" class="form-control" id="ras_percusion" name="ras_percusion">
												</div>


												<div class="form-group">
													<label for="ras_auscultacion">Auscultacion :</label>
													<input type="text" class="form-control" id="ras_auscultacion" name="sel_auscultacion">
												</div>


												<div class="form-group">
													<label for="ras_tacto_rectal">Tacto Rectal :</label>
													<input type="text" class="form-control" id="ras_tacto_rectal" name="ras_tacto_rectal">
												</div>


												<div class="form-group">
													<label for="ras_sistema_nervioso">Sistema Nervioso :</label>
													<input type="text" class="form-control" id="ras_sistema_nervioso" name="ras_sistema_nervioso">
												</div>


									</div>
								</div>
							</div>
					<div class="modal-footer">
													<button id="btn_guardar_ras" type="button" value="Guardar" class="btn btn-lg  btn-primary "><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></button>
													<button id="btn_cancelar" value="Cancelar" name='cancelar' data-dismiss="modal"  class="btn  btn-primary btn-lg "> <i class="fa fa-ban">  </i><span class="nav-label"> Cancelar</span></button>
					</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->