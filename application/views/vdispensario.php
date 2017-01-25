<link href="<?php echo base_url()?>static/css/switch.css" rel="stylesheet">
<script src="<?php echo base_url()?>static/js/user/dispensario.js"></script>
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
                        CREAR DISPENSARIO</a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                      
                      <div class="panel-body">                        
                        <div class="row">
                            <div id="divFrmDispensario" class="col-md-6 col-md-offset-3" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">    
                                <form id="frmDispensario">
                                    <!--*************************FORMULARIO*************************** -->
                                    <fieldset class="scheduler-border">
                                      <legend class="scheduler-border">Nuevo Dispensario</legend>         
                                      <div class="form-group">
                                        <label for="txtName">Nombre:</label>
                                        <input type="text" required="true" class="form-control" id="dis_nom" name="dis_nom" placeholder="Ingrese Nombre"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="txtName">Direccion:</label>
                                        <input type="text" required="true" class="form-control" id="dis_dir" name="dis_dir" placeholder="Ingrese Direccion"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="txtName">Telefono:</label>
                                        <input type="number" required="true" class="form-control" id="dis_tel" name="dis_tel" lenght="10"placeholder="Ingrese Telefono"/>
                                      </div>                                      
                                      <div class="form-group">
                                        <label for="txtName">Email:</label>
                                        <input type="email"  class="form-control" id="dis_eml" name="dis_eml" placeholder="Ingrese Email"/>
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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" id="ltDispensario">
                        LISTAR DISPENSARIO</a>
                      </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                      
                      <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table data-order='[[ 1, "asc" ]]' class="table table-hovered" cellspacing="0" width="100%" id="tbDispensario">
                                    <thead>
                                        <tr>
                                            <th class="text-center"> Nombre </th>
                                            <th class="text-center"> Direccion </th>
                                            <th class="text-center"> Telefono </th>
                                            <th class="text-center"> Email </th>
                                            <th class="text-center"> Activo? </th>
                                            <th class="text-center"> Acción </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tblBodyDis" class="text-justify">
                                        
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
                            <input type="hidden" id="mmed_est">
                            <div id="alert" style="display:none;" class="alert alert-danger"></div> 

                            <label >Nombre:</label>                        
                            <input type="text" class="form-control" placeholder="Nombre" name="mdis_nom" id="mdis_nom">

                            <label >Direccion:</label>                        
                            <input type="text" class="form-control" placeholder="Direccion" name="mdis_dir" id="mdis_dir">

                            <label >Telefono:</label>                        
                            <input type="text" class="form-control" placeholder="Telefono" name="mdis_tel" id="mdis_tel">

                            <label >Email:</label>                        
                            <input type="emal" class="form-control" placeholder="Email" name="mdis_eml" id="mdis_eml">
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