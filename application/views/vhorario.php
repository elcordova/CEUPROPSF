 <script src="<?php echo base_url()?>static/js/user/horario.js"></script>
 <!-- Page Content -->
        <div id="page-content-wrapper">

            <div class="container-fluid">
              <div class="well panel panel-default" style="margin-top: 1%">
            	<!-- ************************************************** ACORDIONES *****************************-->
            	<div class="panel-group" id="accordion">
  
				  <div class="panel panel-primary">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" id="crearHorario">
				        CREAR HORARIOS</a>
				      </h4>
				    </div>
				    <div id="collapse1" class="panel-collapse collapse in">
				      <!-- ************************************************** PANEL BODY *****************************-->
				      <div class="panel-body">
				      	<div class="row">
						<div id="divFrmClient" class="col-md-6 col-md-offset-3" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">	
							<form id="frmNewHorario">
								<fieldset class="scheduler-border">
								  <legend class="scheduler-border">Nuevo Horario</legend>		  
								  
								  <div class="form-group">
									<label for="txtName">Horario:</label>
									<input type="text" required="true" class="form-control" id="hor_des" name="hor_des" placeholder="formato: hh:mm"/>
								  </div>
								</fieldset>  
						
							  <div class="row">
								  <div align="center">
									<button type="submit" class="btn btn-primary">Guardar</button>
								  </div>
							  </div>
							</form>
						</div>
						</div>
				      </div>
				      <!-- ************************************************** PANEL BODY *****************************-->
				    </div>
				  </div>

				  <div class="panel panel-primary">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#listar" id="ltHorario">
				        LISTAR HORARIOS</a>
				      </h4>
				    </div>
				    <div id="listar" class="panel-collapse collapse">
				       <!-- ************************************************** PANEL BODY  LISTAR HORARIOS *****************************-->
				      <div class="panel-body">
				      	<div class="row">
		                <div class="col-md-8 col-md-offset-2">
		                    <table data-order='[[ 0, "asc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbHorario">
		                        <thead>
		                            <tr>
		                                <th class="text-center">Horario</th>		                                
		                                <th class="text-center" colspan="2">Acción</th>
		                            </tr>
		                        </thead>
		                        <tbody id="tblBody" class="text-justify">
		                            
		                        </tbody>
		                    </table>
		                </div>
            			</div>
				      </div>
 					<!-- ************************************************** PANEL BODY *****************************-->
				    </div>
				  </div>
  
				</div>
              <!-- ************************************* ACORDIONES ****************************-->
       		</div>
       		</div><!-- /#container-fluid -->
    	</div>
  <!-- /#page-content-wrapper -->

  <!-- ********************* MODAL **************************************** -->
        <div class="row">
            <div class="modal fade"  id="modalHorario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:300px">
                    <div class="modal-content panel panel-primary">
                        <div class="modal-header panel panel-heading">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel" style="text-align: center;"></h4>
                        </div>                   
                        <div class="modal-body" >
                            <input type="hidden" id="txtId">
                            <div id="alert" style="display:none;" class="alert alert-danger"></div>                        
                            <label >Horario:</label>                        
                            <input type="text" class="form-control" placeholder="ejemplo: hh:mm" name="mhor_des" id="mhor_des">

                        </div>           
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <a href="" type="button" class="btn btn-primary" id="btnModalGuardar">Guardar</a>
                        </div>                
                    </div>
                 </div>
            </div>    
        </div>
</body>
</html>
