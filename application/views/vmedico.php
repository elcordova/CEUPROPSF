<link href="<?php echo base_url()?>/static/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url()?>static/js/alls.js"></script>
<script src="<?php echo base_url()?>static/js/user/medico.js"></script>
<script src="<?php echo base_url()?>static/js/jquery-ui.min.js"></script>
<!-- Page Content -->
        <div id="page-content-wrapper">

            <div class="container-fluid">
              <div class="well panel panel-default" style="margin-top: 1%">
                <!-- ************** ACORDIONES *****************-->
                <div class="panel-group" id="accordion">

                  <div class="panel panel-primary">
                      <div class="panel-heading panel-heading-custom">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        <i class="fa fa-user-md">  </i><span class="nav-label">     CREAR MEDICO</a>
                        </h4>
                      </div>

                      <div id="collapse1" class="panel-collapse collapse in">

                      <div class="panel-body">
                        <div class="row">
                            <div id="divFrmMedico" class="col-md-6 col-md-offset-3" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">
                                <form id="frmMed">
                                    <!--*************************FORMULARIO*************************** -->
                                    <fieldset class="scheduler-border">
                                      <legend class="scheduler-border"><i class="fa fa-user-md">  </i><span class="nav-label"> Nuevo Medico</legend>
                                      <div class="form-group">
                                        <label for="txtName">Cedula:</label>
                                        <input type="text" required="true" class="form-control" id="med_ced" name="med_ced" placeholder="Ingrese C.I" maxlength="10"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="txtName">Nombre:</label>
                                        <input type="text" required="true" class="form-control" id="med_nom" name="med_nom" placeholder="Ingrese Nombre"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="txtName">Apellido:</label>
                                        <input type="text" required="true" class="form-control" id="med_ape" name="med_ape" placeholder="Ingrese Apellido"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="txtName">Dirección:</label>
                                        <input type="text" required="true" class="form-control" id="med_dir" name="med_dir" placeholder="Ingrese Dirección"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="txtName">Telefono:</label>
                                        <input type="text"  class="form-control" id="med_tel" name="med_tel" placeholder="Ingrese Telefono" maxlength="10" />
                                      </div>
                                      <div class="form-group">
                                        <label for="txtName">Email:</label>
                                        <input type="email"  class="form-control" id="med_eml" name="med_eml" placeholder="Ingrese Email"/>
                                      </div>
                                    </fieldset>
                                    <!-- ************* BOTONES ***************-->
                                    <div class="row">
                                      <div align="center">
                                        <button type="submit" class="btn btn-primary btn-large"><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></button>
                                      </div>
                                    </div>
                                    <!-- ************* BOTONES ***************-->
                                </form>
                            </div>
                        </div>
                      </div> <!-- ********************PANEL BODY CLOSE**************************** -->
                      </div>
                  </div>

                  <div class="panel panel-primary">
                    <div class="panel-heading panel-heading-custom">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" id="ltMedico">
                        <i class="fa fa-th-list">  </i><span class="nav-label"> LISTAR MEDICO</span></a>
                      </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">

                      <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table data-order='[[ 2, "asc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbMedico">
                                    <thead>
                                        <tr>
                                            <th class="text-center"> Cedula </th>
                                            <th class="text-center"> Nombre </th>
                                            <th class="text-center"> Apellido </th>
                                            <th class="text-center"> Telefono </th>
                                            <th class="text-center"> Email </th>
                                            <th class="text-center" colspan="2">Acción</th>
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

                  <!-- CREAR BRIGADA -->
                    <div class="panel panel-primary">
                      <div class="panel-heading" role="tab" id="headingSaveBrigada">
                          <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseAsignar" aria-expanded="true" aria-controls="collapseAsignar" id="AsigEsp">
                            ASIGNAR ESPECIALIDAD
                          </a>
                          </h4>
                      </div>

                      <div id="collapseAsignar" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSaveBrigada">
                        <div class="panel-body">
                          <span id="ars"></span>
                          <div class="row">
                            <div class="col-md-10 col-md-offset-1" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">  
                              <div class="col-md-1"></div>
                              <div class="col-md-10">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Datos del Medico</legend>
                                    
                                    <div class="form-group col-xs-6">
                                    <label for="txtCedula">C.I.</label>
                                    <input type="text" required="true" class="form-control" id="amed_ced" name="amed_ced" placeholder="Ingrese C.I." maxlength="13" required />
                                    </div>

                                    <div class="form-group col-xs-6">
                                    <label for="txtNombre">Medico:</label>
                                    <input type="text" required="true" class="form-control" id="amed_nom" name="amed_nom" placeholder="Apellido Nombre"/>
                                    </div>

                                    <div class="form-group col-xs-6">
                                    <label for="txtEmail">E-mail:</label>
                                    <input type="email"  class="form-control" id="amed_eml" name="amed_eml" placeholder="Ingrese Email"/>
                                    </div>

                                    <div class="form-group col-xs-6">
                                    <label for="txtDireccion">Dirección:</label>
                                    <input type="text" required="true" class="form-control" id="amed_dir" name="amed_dir" placeholder="Ingrese Dirección"/>
                                    </div>

                                    <div class="form-group col-xs-6">
                                    <label for="txtTelefono">Teléfono:</label>
                                    <input type="text" class="form-control" id="amed_tel" name="amed_tel" placeholder="Ingrese Telefono"/>
                                    </div>                                   

                                </fieldset>
                              </div>
                              
                              <br>
                              <hr>
                              <br>

                              <div class="form-group col-xs-12 col-sm-10">
                                  <div id="wait" style="display:none;width:50px;height:50px;position:absolute;top:50%;left:50%;padding:1px;">
                                        <img src="<?=base_url()?>static/images/espera.gif" width="50" height="50" />
                                  </div>
                              </div>
                              
                                <div class="row">
                                <br>                                
                                <legend class="scheduler-border"></legend>
                                <legend class="scheduler-border">Asignación de Especialidad</legend>                                              
                                              <br>
                                              <br>
                                              <div class="col-md-10 col-md-offset-1">
                                                  <div class="table-responsive">
                                                  <table data-order='[[ 0, "asc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbEsp1">
                                                      <thead>
                                                          <tr>
                                                              
                                                              <th class="text-center">Descripcion </th>                                                         
                                                              <th class="text-center">Asignar</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody id="tblBodyMedico" class="text-justify">
                                                          
                                                      </tbody>
                                                  </table>
                                                 </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                            <br>
                                            <button type="button" class="btn btn-primary btn-large col-md-offset-9" id="btnGuardarAsignacion" style="border-radius: 8px 8px 8px 8px;">
                                              <i class="fa fa-save"></i>
                                              GUARDAR ASIGNACION
                                            </button>
                                          </div>
                            </div>
                          </div>
                        </div>
                        </div>
                      </div>
                    <!-- END CREAR BRIGADA -->

                    <!-- LISTAR ASIGNACIONES -->                    
                    <div class="panel panel-primary">
                      <div class="panel-heading panel-heading-custom">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" id="ltAsig">
                        <i class="fa fa-th-list">  </i><span class="nav-label"> LISTAR ASIGNACION</span></a>
                      </h4>
                      </div>
                      <div id="collapse3" class="panel-collapse collapse">

                      <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <table data-order='' class="table table-hovered table-bordered table-striped" cellspacing="0" id="tablaEspecialidadDos">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th class="text-center"> Cedula </th>
                                            <th class="text-center"> Medico </th>                                            
                                            <th class="text-center"> Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tblEsp2" class="text-justify">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                      </div>
                      </div>
                  </div>

                
              <!-- ************************************* ACORDIONES ****************************-->
                
            <!-- /#container-fluid -->
        
  <!-- /#page-content-wrapper -->

    <!-- ********************* MODAL **************************************** -->
        <div class="row">
            <div class="modal fade"  id="modalMedico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:400px">
                    <div class="modal-content panel panel-primary">
                        <div class="modal-header panel panel-heading">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title fa fa-pencil-square-o" id="myModalLabel" style="text-align: center;"></h4>
                        </div>
                        <div class="modal-body" >
                            <input type="hidden" id="txtId">
                            <div id="alert" style="display:none;" class="alert alert-danger"></div>

                            <label >Nombre:</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="mmed_nom" id="mmed_nom">

                            <label >Apellido:</label>
                            <input type="text" class="form-control" placeholder="Apellido" name="mmed_ape" id="mmed_ape">

                            <label >Direccion:</label>
                            <input type="text" class="form-control" placeholder="Direccion" name="mmed_dir" id="mmed_dir">

                            <label >Telefono:</label>
                            <input type="text" class="form-control" placeholder="Email" name="mmed_tel" id="mmed_tel">

                            <label >Email:</label>
                            <input type="emal" class="form-control" placeholder="Email" name="mmed_eml" id="mmed_eml">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban">  </i><span class="nav-label"> Cancelar</span></button>
                            <a href="" type="button" class="btn btn-primary" id="btnModalGuardar"><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></a>
                        </div>
                    </div>
                 </div>
            </div>
        </div>

<!-- MODAL NUEVA ASIGNACION -->
    <div class="modal fade" id="modalAsig" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-dialog" style="width:400px ;">       
                  <div class="modal-content panel panel-primary">

                    <div class="modal-header panel panel-heading">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="tema" style="text-align: center;"></h4>
                    </div>
                  
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-10 col-xs-offset-1" id="divTablaFiltros">
                          <div class="panel panel-primary filterable table-responsive">
                                  <div class="panel-heading" >
                                      <h3 class="panel-title" style="text-align: center;">Especialidades</h3>
                                  </div>
                                  <div style="max-height: 400px;  overflow-y:auto;">
                                    <table class="table text-justified table-hover table-bordered table-condensed col-xs-12" id="tabla" style="text-align: center; font-size: 12px">
                                      <thead>                         
                                        <th class="text-center">Especialidad</th>
                                        <th class="text-center">Seleccionar</th>
                                      </thead>
                                      <tbody id="bodyTbAsig">
                                        
                                      </tbody>
                                    </table>
                                  </div>
                              </div>
                        </div>                
                      </div><!-- final row tabla -->                                       
                    </div>              

                    <div class="modal-footer" >
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelar">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="abtnGuardar">Guardar</button>
                    </div>

                  </div>           
                </div>
              </div>
        </div>