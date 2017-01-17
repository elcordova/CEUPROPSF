<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>
<script type="text/javascript" src="<?=base_url()?>static/js/consultas/fisico_regional.js"></script>
<div class="modal fade" id="modal_fr">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">Examen Físico Regional</h4>
					</div>
					<form>
					<div class="modal-body">
						<div class="panel-body">
                     		<div class="row">
														
											
												<input type="text" class="form-control hidden" id="id_consulta" name="id_noticia">
												<input type="text" class="form-control hidden" id="efr_id" name="efr_id">
												
												<div class="form-group">
													<label for="efr_cabeza">Cabeza:</label>
													<input type="text" class="form-control" id="efr_cabeza" name="efr_cabeza">
												</div>


												
												<div class="form-group">
													<label for="efr_oidos">Oidos :</label>
													<input type="text" class="form-control" id="efr_oidos" name="efr_oidos">
												</div>


												<div class="form-group">
													<label for="efr_ojos">Ojos :</label>
													<input type="text" class="form-control" id="efr_ojos" name="efr_ojos">
												</div>


												<div class="form-group">
													<label for="efr_nariz">Nariz :</label>
													<input type="text" class="form-control" id="efr_nariz" name="efr_nariz">
												</div>


												<div class="form-group">
													<label for="efr_boca">Boca :</label>
													<input type="text" class="form-control" id="efr_boca" name="efr_boca">
												</div>

												
												<div class="form-group">
													<label for="efr_cuello">Cuello :</label>
													<input type="text" class="form-control" id="efr_cuello" name="efr_cuello">
												</div>

									</div>
								</div>
							</div>
					<div class="modal-footer">
													<button id="btn_guardar_efr" type="button" value="Guardar" class="btn btn-lg  btn-primary "><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></button>
													<button id="btn_cancelar" value="Cancelar" name='cancelar' data-dismiss="modal"  class="btn  btn-primary btn-lg "> <i class="fa fa-ban">  </i><span class="nav-label"> Cancelar</span></button>
					</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->