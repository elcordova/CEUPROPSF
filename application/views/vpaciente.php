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
                        CREAR PACIENTE</a>
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
                                            <legend class="scheduler-border">Nuevo Paciente</legend>
                                        </div>
                                                 
                                        <div class="form-group">
                                            <label class="label-control col-sm-2" for="">Cedula:</label>
                                            <div class="col-sm-4">
                                                <input type="text" required="true" class="form-control" id="pac_ced" name="pac_ced" placeholder="Ingrese C.I" maxlength="10">
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
                                            <label class="label-control col-sm-2" for="">Direccion:</label>
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
                                                    <option value="Masculino">AB</option>
                                                    <option value="Femenino">AB-</option>
                                                    <option value="Femenino">A</option>
                                                    <option value="Femenino">A-</option>
                                                    <option value="Femenino">B</option>
                                                    <option value="Femenino">B-</option>
                                                    <option value="Femenino">O</option>
                                                    <option value="Femenino">O-</option>
                                                </select>
                                            </div>
                                            <label class="label-control col-sm-2" for="">Estado Civil:</label>
                                            <div class="col-sm-4">
                                                <select id="pac_est_civ" class="input-field col s12 form-control" name="pac_est_civ" required="true">
                                                    <option value="" disabled selected>------</option>
                                                    <option value="Soltero">Soltero</option>
                                                    <option value="Comprometido">Comprometido</option>
                                                    <option value="Casado">Casado</option>
                                                    <option value="Divorciado">Divorciado</option>
                                                    <option value="Viduo">Viduo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>                        
                                    <!-- ************* BOTONES ***************-->
                                    <div class="row">
                                        <div align="center">
                                            <button type="submit" class="btn btn-primary btn-large">Guardar</button>
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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" id="ltPaciente">
                        LISTAR PACIENTES</a>
                      </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                      
                      <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table data-order='[[ 2, "asc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbPaciente">
                                    <thead>
                                        <tr>
                                            
                                            <th class="text-center">Cedula </th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Apellido</th>
                                            <th class="text-center">Direccion</th>
                                            <th class="text-center">Email</th>                                          
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
  
                </div>
              <!-- ************************************* ACORDIONES ****************************-->
                </div>
            </div><!-- /#container-fluid -->
        </div>
  <!-- /#page-content-wrapper -->
      
    <!-- ********************* MODAL **************************************** -->
        <div class="row">
            <div class="modal fade"  id="modalPaciente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:400px">
                    <div class="modal-content panel panel-primary">
                        <div class="modal-header panel panel-heading">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel" style="text-align: center;"></h4>
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
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <a href="" type="button" class="btn btn-primary" id="btnModalGuardar">Guardar</a>
                        </div>                
                    </div>
                 </div>
            </div>    
        </div> 

  </body>
</html>