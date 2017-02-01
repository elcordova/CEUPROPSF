  <link href="<?php echo base_url()?>static/css/switch.css" rel="stylesheet">
  <script src="<?php echo base_url()?>static/js/user/cita.js"></script>
  <link href="<?php echo base_url()?>/static/css/pnotify.custom.min.css" rel="stylesheet" type="text/css">
  <script src="<?php echo base_url() ?>static/js/pnotify.custom.min.js"></script>
  <link href="<?php echo base_url()?>/static/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
  <script src="<?php echo base_url()?>static/js/jquery-ui.min.js"></script>
    
    <!-- Page Content -->
        <div id="page-content-wrapper">
        <div id="usu_cod" data-usucod="<?php echo $this->session->userdata('usu_cod') ?>" data-usutip="<?php echo $this->session->userdata('tipo') ?>" style="display:none;"></div>
            <div class="container-fluid">
              <div class="well panel panel-default" style="margin-top: 1%">
                <!-- ************** ACORDIONES *****************-->
                <div class="panel-group" id="accordion">
  
                  <div class="panel panel-primary">
                    <div class="panel-heading panel-heading-custom">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        CREAR CITA</a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                      
                      <div class="panel-body">

                        <div class="row">
                        <div id="divFrmClient" class="col-md-8 col-md-offset-2" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;"> 
                            <form id="frmCita">
                                <fieldset class="scheduler-border">
                                  <legend class="scheduler-border">Nueva Cita</legend>         
                                  <?php if($this->session->userdata('tipo') == "1" || $this->session->userdata('tipo')== "3"): ?>                                  <div class="form-group">
                                    <label for="txtName">Seleccione al Paciente:</label>
                                    <input class="form-control" id="usuario" name="usuario" style="font-size: 14px" placeholder="Ingrese el Nombre">
                                  </div>
                                  <?php endif; ?>
                                  
                                  <div class="form-group">
                                    <label for="txtName">Especialidad:</label>
                                    <select class="form-control" id="cmbEsp" name="cmbEsp" style="font-size: 14px"></select>
                                  </div>

                                </fieldset>

                                <div class="row">
                                  <div class="col-md-12">
                                      <table data-order='[[ 0, "asc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbCita">
                                          <thead>
                                              <tr>
                                                  <th class="text-center">Cedula</th>
                                                  <th class="text-center">Medico</th>
                                                  <th class="text-center"> Dispensario</th>
                                                   <th class="text-center">Acción</th>
                                              </tr>
                                          </thead>
                                          <tbody id="tblBodyCita" class="text-justify">
                                              
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                            </form>
                        </div>
                        </div>

                      </div>

                    </div>
                  </div>

                  <div class="panel panel-primary">
                    <div class="panel-heading panel-heading-custom">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" id="ltCita">
                        HISTORIAL CITAS</a>
                      </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                      
                      <div class="panel-body">
                        <div class="row">
                              <div class="col-md-12">
                                  <table data-order='[[ 1, "desc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbCitDet">
                                      <thead>
                                          <tr>
                                              <th class="text-center">Turno</th>
                                              <th class="text-center">Fecha | Hora</th>                                              
                                              <th class="text-center">Paciente</th>
                                              <th class="text-center">Medico</th>
                                              <th class="text-center">Especialidad</th>
                                              <th class="text-center">Dispensario</th>
                                              <?php if($this->session->userdata('tipo') != '2') { ?>
                                              <th class="text-center">Activo?</th>
                                              <?php } ?>
                                              <th class="text-center">Acción</th>
                                          </tr>
                                      </thead>
                                      <tbody id="tblBody" class="text-justify">
                                          
                                      </tbody>

                                  </table>
                              </div>
                          </div>
                      </div>

                    </div>
                  </div>
                  
  
                </div>
              <!-- ************************************* ACORDIONES ****************************-->
            </div>
            </div><!-- /#container-fluid -->
        </div>
    <!-- /#page-content-wrapper -->

   <!-- MODAL NUEVA CITA -->
    <div class="modal fade" id="modalCita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-dialog" style="width:320px ;">       
              <div class="modal-content panel panel-primary">

                <div class="modal-header panel panel-heading">

                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel" style="text-align: center;"></h4>

                </div>
              
                <div class="modal-body">
                  <div class="row">
                    <div class="col-xs-12" id="divCmb">
                      <label>Fecha:</label>
                      <input type="date" id="cit_fec" name="cit_fec" class="form-control">
                    </div> 
                  </div>
                  <br>                         
                  <div class="row">
                    <div class="col-xs-12" id="divTablaFiltros">
                      <div class="panel panel-primary filterable table-responsive" style="width:">
                              <div class="panel-heading" >
                                  <h3 class="panel-title" style="text-align: center;">Horarios Disponibles</h3>                  
                              </div>
                              <div style="max-height: 200px;  overflow-y:auto;">
                                <table class="table text-justified table-hover table-bordered table-condensed col-xs-12" id="tabla" style="text-align: center; font-size: 12px">
                                  <thead>                         
                                    <th class="text-center">Horario</th>
                                    <th class="text-center">Seleccionar</th>
                                  </thead>
                                  <tbody id="bodyTbCita">
                                    
                                  </tbody>
                                </table>
                              </div>

                          </div>
                    </div>                
                  </div><!-- final row tabla --> 
                </div>                 
                <div class="modal-footer" >
                  <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelar">Cancelar</button>
                  <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
                </div>
            
              </div>
              </div>
             </div>
       </div>
       <!--MODAL NUEVA CITA --> 

    <!-- MODAL VER CITA -->
    <div class="modal fade" id="modalComentario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-dialog" style="width:500px ;">
              <div class="modal-content panel panel-primary">

                <div class="modal-header panel panel-heading">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Nota</h4>
                </div>              
                <div class="modal-body">
                <fieldset class="scheduler-border">
                <legend class="scheduler-border">Observacion</legend>
                  <div class="row">
                    <input type="hidden" name="mcit_id" id="mcit_id">
                    <?php if($this->session->userdata('tipo') != "2") { ?>
                    <div class="col-xs-12" id="">
                      <textarea class="form-control input-sm" rows="5" name="cit_cmt" id="cit_cmt" placeholder="......" ></textarea>
                    </div>
                    <?php } else { ?>
                    <div class="col-xs-12" id="">
                      <textarea class="form-control input-sm" rows="5" name="cit_cmt" id="cit_cmt" placeholder="......" disabled></textarea>
                    </div>
                    <?php } ?>
                  </div>
                </fieldset>                        
                </div>
                <?php if($this->session->userdata('tipo') != "2") { ?>
                <div class="modal-footer" >
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary" id="btnComentar">Comentar</button>
                </div>
                <?php } ?>
              </div>
              </div>
             </div>
       </div>
       <!--MODAL VER CITA --> 
  </body>
</html>
