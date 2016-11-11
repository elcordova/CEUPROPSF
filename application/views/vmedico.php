<script src="<?php echo base_url()?>static/js/user/medico.js"></script>
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
                        CREAR MEDICO</a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                      
                      <div class="panel-body">                        
                        <div class="row">
                            <div id="divFrmUsuario" class="col-md-6 col-md-offset-3" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">    
                                <form id="frmMed">
                                    <!--*************************FORMULARIO*************************** -->
                                    <fieldset class="scheduler-border">
                                      <legend class="scheduler-border">Nuevo Medico</legend>         
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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" id="ltMedico">
                        LISTAR MEDICO</a>
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
  
                </div>
              <!-- ************************************* ACORDIONES ****************************-->
                </div>
            </div><!-- /#container-fluid -->
        </div>
  <!-- /#page-content-wrapper -->
      
    <!-- ********************* MODAL **************************************** -->
        <div class="row">
            <div class="modal fade"  id="modalMedico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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