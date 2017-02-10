<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
      

<script type="text/javascript" src="<?=base_url()?>static/js/consultas/examenes.js"></script>

<div class="modal fade" id="modal_examenes">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">Examenes</h4>
					</div>
					<form>
					<div class="modal-body">
						<div class="panel-body">
                     		<div class="row">
														
												<input type="text" class="form-control hidden" id="id_consulta" name="id_noticia">
												<input type="text" class="form-control hidden" id="motilidad_id" name="reflejos_id">
												
												<div class="form-group">
													<label for="recipient-name" class="control-label">Examen de Laboratorio:</label>
													<textarea class="form-control" id="exam_laboratorio"></textarea>
												</div>
												<div class="form-group">
													<label for="message-text" class="control-label">Examen de Diagnostico:</label>
													<textarea class="form-control" id="exam_diagnostico"></textarea>
												</div>

							</div>
						</div>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="button" id='btn_guardar_exam' class="btn btn-primary">Guardar</button>
					</div>
					</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->








	