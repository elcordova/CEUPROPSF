<script src="<?php echo base_url()?>static/js/user/usuario.js"></script>

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
                        <i class="fa fa-user">  </i><span class="nav-label">     CREAR USUARIO</span></a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                      
                      <div class="panel-body">                        
                        <div class="row">
                            <div id="divFrmUsuario" class="col-md-6 col-md-offset-3" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">    
                                <form id="frmUsu_save">
                                    <!--*************************FORMULARIO*************************** -->
                                    <fieldset class="scheduler-border">
                                      <legend class="scheduler-border"><i class="fa fa-user">  </i><span class="nav-label">     Nuevo Usuario</legend>         
                                      <div class="form-group">
                                        <label for="txtName">C.I:</label>
                                        <input type="text" required="true" onkeypress="return event.charCode >= 48 && event.charCode <= 57" pattern="[0-9]*" class="form-control" id="usu_ced" name="usu_ced" placeholder="Ingrese C.I." maxlength="10"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="txtName">Nombre:</label>
                                        <input type="text" required="true" title="Ingrese solo letras" pattern="[aA-zZ;' ']*" class="form-control" id="usu_nom" name="usu_nom" placeholder="Ingrese Nombre"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="txtName">Apellido:</label>
                                        <input type="text" required="true" title="Ingrese solo letras" pattern="[aA-zZ;' ']*" class="form-control" id="usu_ape" name="usu_ape" placeholder="Ingrese Apellido"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="txtName">Dirección:</label>
                                        <input type="text" required="true" class="form-control" id="usu_dir" name="usu_dir" placeholder="Ingrese Dirección"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="textName">Email</label>
                                        <input type="text" required="true" class="form-control" id="usu_eml" name="usu_eml" value="@" placeholder="Ingrese el Email">
                                      </div>
                                      

                                      <div class="form-group">
                                        <label for="txtName">Password:</label>
                                        <input type="password" required="true"  class="form-control" id="usu_pas" name="usu_pas" value="" placeholder="Ingrese el Password"/>
                                      </div>
                                      <div class="form-group">
                                        <label for="txtName">Tipo Usuario:</label>
                                        <select class='form-control' required="true" id='selectUser' name='selectUser'>
                                                            <option value='-----'>-----</option>
                                                            <option value='2'>Usuario</option>
                                                            <option value='1'>Administrador</option>
                                                        </select>
                                      </div>
                                    </fieldset>                        
                                    <!-- ************* BOTONES ***************-->
                                    <div class="row">
                                      <div align="center">
                                        <button type="submit" class="btn btn-primary btn-large"> <i class="fa fa-save"></i>&nbsp;&nbsp;Guardar</button>
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
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" id="ltUsuario">
                        <i class="fa fa-th-list">  </i><span class="nav-label">    LISTAR USUARIO</a>
                      </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                      
                      <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table data-order='[[ 0, "asc" ]]' class="table table-hovered table-bordered" cellspacing="0" width="100%" id="tbUsuario">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Cedula</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Apellido</th>                                            
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Tipo</th>
                                            <th class="text-center">Direccion</th>
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
              <!-- ************************************* ACORDIONES ****************************-->
                </div>
            </div><!-- /#container-fluid -->
        </div>
  <!-- /#page-content-wrapper -->
      
    <!-- ********************* MODAL **************************************** -->
        <div class="row">
            <div class="modal fade"  id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:500px">
                    <div class="modal-content panel panel-primary">
                        <div class="modal-header panel panel-heading">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           <h4 class="modal-title fa fa-pencil-square-o" id="myModalLabel" style="text-align: center;"></h4>
                        </div>                   
                        <div class="modal-body" >
                            <input type="hidden" id="txtcedula2">
                            <div id="alert" style="display:none;" class="alert alert-danger"></div> 

                            <label >Nombre:</label>                        
                            <input type="text" class="form-control" placeholder="Nombre" name="txtnombre2" id="txtnombre2">

                            <label >Apellido:</label>                        
                            <input type="text" class="form-control" placeholder="Apellido" name="txtapellido2" id="txtapellido2">

                            <label >Direccion:</label>                        
                            <input type="text" class="form-control" placeholder="Direccion" name="txtdireccion2" id="txtdireccion2">

                            <label >Email:</label>                        
                            <input type="text" class="form-control" placeholder="Email" name="txtemail2" id="txtemail2">
            
                            <label >Tipo de Usuario:</label>
                            <select class='form-control' id='selectUser2' name='selectUser2'>
                                <option value='-----'>-----</option>
                                <option value='2'>Usuario</option>
                                <option value='1'>Administrador</option>
                            </select>
                        </div>           
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban">  </i><span class="nav-label"> Cancelar</span></button>
                            <a href="" type="button" class="btn btn-primary" id="btnModalGuardar"><i class="fa fa-save">  </i><span class="nav-label"> Guardar</span></a>
                        </div>                
                    </div>
                 </div>
            </div>    
        </div> 