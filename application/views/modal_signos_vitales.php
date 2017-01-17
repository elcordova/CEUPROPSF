<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
<script type="text/javascript" src="<?=base_url()?>static/js/consultas/signos_vitales.js"></script>
<div class="modal fade" id="modal_sv">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">Signos Vitales</h4>
					</div>
					<form>
					<div class="modal-body">
						<div class="panel-body">
                     		<div class="row">
														
											
												<input type="text" class="form-control hidden" id="id_consulta" name="id_noticia">
												<input type="text" class="form-control hidden" id="id_sv" name="id_sv">
												
												<div class="form-group">
													<label for="txt_fc">Frecuencia Cardiaca (fc):</label>
													<input type="text" class="form-control" id="txt_fc" name="fc">
												</div>


												
												<div class="form-group">
													<label for="txt_ta">Tension Arterial (ta):</label>
													<input type="text" class="form-control" id="txt_ta" name="txt_ta">
												</div>


												<div class="form-group">
													<label for="txt_tem">Temperatura (t):</label>
													<input type="text" class="form-control" id="txt_tem" name="txt_tem">
												</div>


												<div class="form-group">
													<label for="txt_fr">Frecuencia Respiratoria (fr):</label>
													<input type="text" class="form-control" id="txt_fr" name="txt_fr">
												</div>


												<div class="form-group">
													<label for="txt_peso">Peso:</label>
													<input type="text" class="form-control" id="txt_peso" name="txt_peso">
												</div>

												
												<div class="form-group">
													<label for="txt_talla">Talla:</label>
													<input type="text" class="form-control" id="txt_talla" name="txt_talla">
												</div>



												<div class="form-group">
													<label for="txt_imc">Indice de Masa Corporal (imc):</label>
													<input type="text" class="form-control" id="txt_imc" name="txt_imc">
												</div>

												
												<div class="form-group">
													<label for="txt_cintura">Cintura:</label>
													<input type="text" class="form-control" id="txt_cintura" name="txt_cintura">
												</div>



												<div class="form-group">
													<label for="txt_cadera">Cadera:</label>
													<input type="text" class="form-control" id="txt_cadera" name="txt_cadera">
												</div>


												<div class="form-group">
													<label for="txt_icc">Insuficiencia Cardiaca Crónica (icc):</label>
													<input type="text" class="form-control" id="txt_icc" name="txt_icc">
												</div>


									</div>
								</div>
							</div>
					<div class="modal-footer">
													<button id="btn_guardar" type="button" value="Guardar" class="btn btn-lg  btn-primary "><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></button>
													<button id="btn_cancelar" value="Cancelar" name='cancelar' data-dismiss="modal"  class="btn  btn-primary btn-lg "> <i class="fa fa-ban">  </i><span class="nav-label"> Cancelar</span></button>
					</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->