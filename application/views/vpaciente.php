<script src="<?php echo base_url()?>static/js/pacientes/pacientes.js"></script>
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
                        <i class="fa fa-wheelchair">  </i><span class="nav-label"> CREAR PACIENTE</span></a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                      
                      <div class="panel-body">                        
                        <div class="row">
                            <div id="divFrmUsuario" class="col-md-8 col-md-offset-2" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">    
                                <form id="frmPac" class="form-horizontal">
                                    <!--*************************FORMULARIO*************************** -->
                                    <fieldset class="scheduler-border">
                                        <div align="center">
                                            <legend class="scheduler-border"><i class="fa fa-wheelchair">  </i><span class="nav-label"> Nuevo Paciente</span></legend>
                                        </div>
                                                 
                                        <div class="form-group">
                                            <label class="label-control col-sm-2" for="">Cédula:</label>
                                            <div class="col-sm-4">
                                                <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" pattern="[0-9]*" required="true" class="form-control" id="pac_ced" name="pac_ced" placeholder="Ingrese C.I" maxlength="10">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control col-sm-2" for="">Nombre:  </label>
                                            <div class="col-sm-4">
                                                <input type="text" required="true" class="form-control" id="pac_nom" name="pac_nom" placeholder="Ingrese Nombre"/>
                                            </div>
                                            <label class="label-control col-sm-2" for="">Apellido:</label>
                                            <div class="col-sm-4">
                                                <input type="text" required="true" class="form-control" id="pac_ape" name="pac_ape" placeholder="Ingrese Apellido"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control col-sm-2" for="txtName">Fecha Nacimiento:</label>
                                            <div class="col-sm-4">
                                                <input type="date" required="true" class="input-field col s4 form-control" id="pac_fec_nac" name="pac_fec_nac"/>
                                            </div>
                                            <label class="label-control col-sm-2" for="txtName">Sexo:</label>
                                            <div class="col-sm-4">
                                                <select id="pac_sex" class="input-field col s12 form-control" name="pac_sex" required="true">
                                                    <option value="" disabled selected>------</option>
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control col-sm-2" for="">Dirección:</label>
                                            <div class="col-sm-10">
                                                <input type="text"  class="form-control" id="pac_dir" name="pac_dir" placeholder="Ingrese la direccion.." required="true"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="label-control col-sm-2" for="">Email:</label>
                                            <div class="col-sm-10">
                                                <input type="email"  class="form-control" id="pac_cor" name="pac_cor" placeholder="Ingrese el email.. " required="true"/>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="label-control col-sm-2" for="">Tipo Sangre:</label>
                                            <div class="col-sm-4">
                                                <select id="pac_tip_san" class="input-field col s12 form-control" name="pac_tip_san" required="true">
                                                    <option value="" disabled selected>------</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                </select>
                                            </div>
                                            <label class="label-control col-sm-2" for="">Estado Civil:</label>
                                            <div class="col-sm-4">
                                                <select id="pac_est_civ" class="input-field col s12 form-control" name="pac_est_civ" required="true">
                                                    <option value="" disabled selected>------</option>
                                                    <option value="Soltero(a)">Soltero(a)</option>
                                                    <option value="Comprometido(a)">Comprometido(a)</option>
                                                    <option value="Casado(a)">Casado(a)</option>
                                                    <option value="Divorciado(a)">Divorciado(a)</option>
                                                    <option value="Viudo(a)">Viudo(a)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>                        
                                    <!-- ************* BOTONES ***************-->
                                    <div class="row">
                                        <div align="center">
                                            <button type="submit" onclick="validarFormulario()" class="btn btn-primary btn-large"><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></button>
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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" id="ltPaciente"><i class="fa fa-th-list">  </i><span class="nav-label"> LISTAR PACIENTES</span></a>
                      </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                      
                      <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                <table data-order='[[ 0, "asc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbPaciente">
                                    <thead>
                                        <tr>
                                            
                                            <th class="text-center">Cédula </th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Apellido</th>
                                            <th class="text-center">Direccion</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Estado</th>                                           
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
  
                </div>
              <!-- ************************************* ACORDIONES ****************************-->
                </div>
            </div><!-- /#container-fluid -->
        </div>
  <!-- /#page-content-wrapper -->
      
    <!-- ********************* MODAL **************************************** -->
        <div class="row">
            <div class="modal fade"  id="modalPaciente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:800px">
                    <div class="modal-content panel panel-primary">
                        <div class="modal-header panel panel-heading">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title fa fa-pencil-square-o" id="myModalLabel" style="text-align: center;"></h4>
                        </div>                   
                        <div class="modal-body" >
                            <form id="frmPac2" class="form-horizontal">
                                <div class="form-group">
                                    <label class="label-control col-sm-2" for="">Cédula:</label>
                                    <div class="col-sm-4">
                                        <input type="text" required="true" disabled class="form-control" id="pac_ced2" name="pac_ced2" placeholder="Ingrese C.I" maxlength="10">
                                    </div>
                                    <div hidden="hidden">
                                        <label aria-hidden="hidden" class="label-control col-sm-2" for="">Estado:</label>
                                        <div class="col-sm-4">
                                            <input hiden="hiden" type="checkbox" required="true" value="Cat" class="form-control" id="pac_est2" name="pac_est2">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label-control col-sm-2" for="">Nombre:  </label>
                                    <div class="col-sm-4">
                                        <input type="text" required="true" class="form-control" id="pac_nom2" name="pac_nom2" placeholder="Ingrese Nombre"/>
                                    </div>
                                    <label class="label-control col-sm-2" for="">Apellido:</label>
                                    <div class="col-sm-4">
                                        <input type="text" required="true" class="form-control" id="pac_ape2" name="pac_ape2" placeholder="Ingrese Apellido"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label-control col-sm-2" for="">Fecha Nacimiento:</label>
                                    <div class="col-sm-4">
                                        <input type="date" required="true" class="input-field col s4 form-control" id="pac_fec_nac2" name="pac_fec_nac2"/>
                                    </div>
                                    <label class="label-control col-sm-2" for="">Sexo:</label>
                                    <div class="col-sm-4">
                                        <select id="pac_sex2" class="input-field col s12 form-control" name="pac_sex2" required="true">
                                            <option value="" disabled selected>------</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label-control col-sm-2" for="">Dirección:</label>
                                    <div class="col-sm-10">
                                        <input type="text"  class="form-control" id="pac_dir2" name="pac_dir2" placeholder="Ingrese la direccion.." required="true"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label-control col-sm-2" for="">Email:</label>
                                    <div class="col-sm-10">
                                        <input type="email"  class="form-control" id="pac_cor2" name="pac_cor2" placeholder="Ingrese el email.. " required="true"/>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="label-control col-sm-2" for="">Tipo Sangre:</label>
                                    <div class="col-sm-4">
                                        <select id="pac_tip_san2" class="input-field col s12 form-control" name="pac_tip_san2" required="true">
                                            <option value="" disabled selected>------</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>
                                    <label class="label-control col-sm-2" for="">Estado Civil:</label>
                                    <div class="col-sm-4">
                                        <select id="pac_est_civ2" class="input-field col s12 form-control" name="pac_est_civ2" required="true">
                                            <option value="" disabled selected>------</option>
                                            <option value="Soltero(a)">Soltero(a)</option>
                                            <option value="Comprometido(a)">Comprometido(a)</option>
                                            <option value="Casado(a)">Casado(a)</option>
                                            <option value="Divorciado(a)">Divorciado(a)</option>
                                            <option value="Viudo(a)">Viudo(a)</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>           
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban">  </i><span class="nav-label"> Cancelar</span></button>
                            <a href="" type="button" class="btn btn-primary" id="btnModalGuardar"><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></a>
                        </div>                
                    </div>
                 </div>
            </div>    
        </div> 

  </body>
</html>
