
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
                        <i class="fa fa-file">  </i><span class="nav-label"> CREAR REPORTE</span></a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                      
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;"> 
                                    <div align="center">
                                        <legend class="scheduler-border"><i class="fa fa-file-o">  </i><span class="nav-label"> Módulo</span></legend>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Escoger módulo:</label>
                                            <select class="form-control" name="estado_empresa" style="cursor:pointer;">
                                                <option value="" disabled selected>-------------</option>
                                                <option value="usuario">Usuario</option>
                                                <option value="paciente">Paciente</option>
                                                <option value="medico">Médico</option>
                                                <option value="especialidad">Especialidad</option>
                                            </select>
                                        </div>
                                    </div>       
                                </div>
                                    
                            </div>          
                            <br>  
                            <div class="row">
                                <div id="divFrmUsuario" class="col-md-8 col-md-offset-2" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">    
                                    <form id="frmPac" class="form-horizontal">
                                        <!--*************************FORMULARIO*************************** -->
                                        <fieldset class="scheduler-border">
                                            <div align="center">
                                                <legend class="scheduler-border"><i class="fa fa-user">  </i><span class="nav-label"> Reporte - Usuario</span></legend>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="radio" name="gBusqueda_usuario" id="checkBusquedaT_usuario" style="cursor: pointer;" checked onclick="mostrarPanel_usuario();">
                                                    </span>
                                                    <input type="text" class="form-control" disabled value="Todo">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="radio" name="gBusqueda_usuario" id="checkBusquedaA_usuario" style="cursor: pointer;" onclick="mostrarPanel_usuario();">
                                                    </span>
                                                    <input type="text" class="form-control" disabled value="Búsqueda avanzada">
                                                </div>
                                            </div>

                                            <div id="panelBusqueda_usuario">
                                                <div class="col-lg-6">
                                                    <br>
                                                    <div class="btn-group">
                                                      <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Campos</button>
                                                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                      </button>
                                                      <ul class="dropdown-menu" role="menu">
                                                        <li><a onclick="agregarCampo_usuario(1);" style="cursor:pointer;">Cédula</a></li>
                                                        <li><a onclick="agregarCampo_usuario(2);" style="cursor:pointer;">Apellidos</a></li>
                                                        <li><a onclick="agregarCampo_usuario(3);" style="cursor:pointer;">Nombres</a></li>
                                                        <li><a onclick="agregarCampo_usuario(4);" style="cursor:pointer;">Email</a></li>
                                                        <li><a onclick="agregarCampo_usuario(5);" style="cursor:pointer;">Domicilio</a></li>
                                                        <li><a onclick="agregarCampo_usuario(6);" style="cursor:pointer;">Tipo</a></li>
                                                        <li><a onclick="agregarCampo_usuario(7);" style="cursor:pointer;">Estado</a></li>
                                                      </ul>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div id="panelCampos_usuario">
                                                </div>
                                            </div>

                                        
                                        </fieldset>                        
                                       
                                        
                                    </form>
                                    <hr>
                                    <div class="row">
                                        <div align="center">
                                            <!--<a  target="_blank" href="<?= base_url()?>static/reporte/reporte_h.php">-->
                                            <button onclick="reporteUsuario();" class="btn btn-primary btn-large">
                                            <i class="fa fa-file">  </i> Generar Reporte</button>
                                            <!--</a>-->
                                        </div>
                                    </div>
                                </div>
                                <div id="divFrmPaciente" class="col-md-8 col-md-offset-2" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">    
                                    <form id="frmPac" class="form-horizontal">
                                        <!--*************************FORMULARIO*************************** -->
                                        <fieldset class="scheduler-border">
                                            <div align="center">
                                                <legend class="scheduler-border"><i class="fa fa-wheelchair">  </i><span class="nav-label"> Reporte - Paciente</span></legend>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="radio" name="gBusqueda_paciente" id="checkBusquedaT_paciente" style="cursor: pointer;" checked onclick="mostrarPanel_paciente();">
                                                    </span>
                                                    <input type="text" class="form-control" disabled value="Todo">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="radio" name="gBusqueda_paciente" id="checkBusquedaA_paciente" style="cursor: pointer;" onclick="mostrarPanel_paciente();">
                                                    </span>
                                                    <input type="text" class="form-control" disabled value="Búsqueda avanzada">
                                                </div>
                                            </div>

                                            <div id="panelBusqueda_paciente">
                                                <div class="col-lg-6">
                                                    <br>
                                                    <div class="btn-group">
                                                      <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Campos</button>
                                                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                      </button>
                                                      <ul class="dropdown-menu" role="menu">
                                                        <li><a onclick="agregarCampo_paciente(1);" style="cursor:pointer;">Cédula</a></li>
                                                        <li><a onclick="agregarCampo_paciente(2);" style="cursor:pointer;">Apellidos</a></li>
                                                        <li><a onclick="agregarCampo_paciente(3);" style="cursor:pointer;">Nombres</a></li>
                                                        <li><a onclick="agregarCampo_paciente(4);" style="cursor:pointer;">Email</a></li>
                                                        <li><a onclick="agregarCampo_paciente(5);" style="cursor:pointer;">Domicilio</a></li>
                                                        <li><a onclick="agregarCampo_paciente(6);" style="cursor:pointer;">T. Sangre</a></li>
                                                        <li><a onclick="agregarCampo_paciente(7);" style="cursor:pointer;">Sexo</a></li>
                                                        <li><a onclick="agregarCampo_paciente(8);" style="cursor:pointer;">Fecha Nacimiento</a></li>
                                                        <li><a onclick="agregarCampo_paciente(9);" style="cursor:pointer;">Estado Civil</a></li>
                                                        <li><a onclick="agregarCampo_paciente(10);" style="cursor:pointer;">Estado</a></li>
                                                      </ul>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div id="panelCampos_paciente">
                                                </div>
                                            </div>

                                        
                                        </fieldset>                        
                                       
                                        
                                    </form>
                                    <hr>
                                    <div class="row">
                                        <div align="center">
                                            <!--<a  target="_blank" href="<?= base_url()?>static/reporte/reporte_h.php">-->
                                            <button onclick="reportePaciente();" class="btn btn-primary btn-large">
                                            <i class="fa fa-file">  </i> Generar Reporte</button>
                                            <!--</a>-->
                                        </div>
                                    </div>
                                </div>
                                <div id="divFrmMedico" class="col-md-8 col-md-offset-2" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">    
                                    <form id="frmPac" class="form-horizontal">
                                        <!--*************************FORMULARIO*************************** -->
                                        <fieldset class="scheduler-border">
                                            <div align="center">
                                                <legend class="scheduler-border"><i class="fa fa-user-md">  </i><span class="nav-label"> Reporte - Médico</span></legend>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="radio" name="gBusqueda_medico" id="checkBusquedaT_medico" style="cursor: pointer;" checked onclick="mostrarPanel_medico();">
                                                    </span>
                                                    <input type="text" class="form-control" disabled value="Todo">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="radio" name="gBusqueda_medico" id="checkBusquedaA_medico" style="cursor: pointer;" onclick="mostrarPanel_medico();">
                                                    </span>
                                                    <input type="text" class="form-control" disabled value="Búsqueda avanzada">
                                                </div>
                                            </div>

                                            <div id="panelBusqueda_medico">
                                                <div class="col-lg-6">
                                                    <br>
                                                    <div class="btn-group">
                                                      <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Campos</button>
                                                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                      </button>
                                                      <ul class="dropdown-menu" role="menu">
                                                        <li><a onclick="agregarCampo_medico(1);" style="cursor:pointer;">Cédula</a></li>
                                                        <li><a onclick="agregarCampo_medico(2);" style="cursor:pointer;">Apellidos</a></li>
                                                        <li><a onclick="agregarCampo_medico(3);" style="cursor:pointer;">Nombres</a></li>
                                                        <li><a onclick="agregarCampo_medico(4);" style="cursor:pointer;">Email</a></li>
                                                        <li><a onclick="agregarCampo_medico(5);" style="cursor:pointer;">Domicilio</a></li>
                                                        <li><a onclick="agregarCampo_medico(6);" style="cursor:pointer;">Teléfono</a></li>
                                                        <li><a onclick="agregarCampo_medico(7);" style="cursor:pointer;">Estado</a></li>
                                                      </ul>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div id="panelCampos_medico">
                                                </div>
                                            </div>

                                        
                                        </fieldset>                        
                                       
                                        
                                    </form>
                                    <hr>
                                    <div class="row">
                                        <div align="center">
                                            <!--<a  target="_blank" href="<?= base_url()?>static/reporte/reporte_h.php">-->
                                            <button onclick="reporteMedico();" class="btn btn-primary btn-large">
                                            <i class="fa fa-file">  </i> Generar Reporte</button>
                                            <!--</a>-->
                                        </div>
                                    </div>
                                </div>
                                <div id="divFrmEspecialidad" class="col-md-8 col-md-offset-2" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">    
                                    <form id="frmPac" class="form-horizontal">
                                        <!--*************************FORMULARIO*************************** -->
                                        <fieldset class="scheduler-border">
                                            <div align="center">
                                                <legend class="scheduler-border"><i class="fa fa-plus-square">  </i><span class="nav-label"> Reporte - Especialidad</span></legend>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="radio" name="gBusqueda_especialidad" id="checkBusquedaT_especialidad" style="cursor: pointer;" checked onclick="mostrarPanel_especialidad();">
                                                    </span>
                                                    <input type="text" class="form-control" disabled value="Todo">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="radio" name="gBusqueda_especialidad" id="checkBusquedaA_especialidad" style="cursor: pointer;" onclick="mostrarPanel_especialidad();">
                                                    </span>
                                                    <input type="text" class="form-control" disabled value="Búsqueda avanzada">
                                                </div>
                                            </div>

                                            <div id="panelBusqueda_especialidad">
                                                <div class="col-lg-6">
                                                    <br>
                                                    <div class="btn-group">
                                                      <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Campos</button>
                                                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                      </button>
                                                      <ul class="dropdown-menu" role="menu">
                                                        <li><a onclick="agregarCampo_especialidad(1);" style="cursor:pointer;">Nombre</a></li>
                                                        
                                                      </ul>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div id="panelCampos_especialidad">
                                                </div>
                                            </div>

                                        
                                        </fieldset>                        
                                       
                                        
                                    </form>
                                    <hr>
                                    <div class="row">
                                        <div align="center">
                                            <!--<a  target="_blank" href="<?= base_url()?>static/reporte/reporte_h.php">-->
                                            <button onclick="reporteEspecialidad();" class="btn btn-primary btn-large">
                                            <i class="fa fa-file">  </i> Generar Reporte</button>
                                            <!--</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>                             
                        </div> <!-- ********************PANEL BODY CLOSE**************************** -->   
                    </div>
                    </div>           

                  
                </div>
              <!-- ************************************* ACORDIONES ****************************-->
                </div>
            </div><!-- /#container-fluid -->
        </div>
  <!-- /#page-content-wrapper -->
      
  </body>

    <script type="text/javascript">

        $('#panelBusqueda_usuario').hide();
        $('#panelBusqueda_paciente').hide();
        $('#panelBusqueda_medico').hide();
        $('#panelBusqueda_especialidad').hide();

        var contadorCampos_usuario = 0;
        var contadorCampos_paciente = 0;
        var contadorCampos_medico = 0;
        var contadorCampos_especialidad = 0;

        function mostrarPanel_usuario(){
            if(document.getElementById('checkBusquedaA_usuario').checked)$('#panelBusqueda_usuario').show();
            else $('#panelBusqueda_usuario').hide();
        }

        function mostrarPanel_paciente(){
            if(document.getElementById('checkBusquedaA_paciente').checked)$('#panelBusqueda_paciente').show();
            else $('#panelBusqueda_paciente').hide();
        }

        function mostrarPanel_medico(){
            if(document.getElementById('checkBusquedaA_medico').checked)$('#panelBusqueda_medico').show();
            else $('#panelBusqueda_medico').hide();
        }

        function mostrarPanel_especialidad(){
            if(document.getElementById('checkBusquedaA_especialidad').checked)$('#panelBusqueda_especialidad').show();
            else $('#panelBusqueda_especialidad').hide();
        }

        function agregarCampo_usuario(id){
            contadorCampos_usuario++;
            if(id==1){
                document.getElementById('panelCampos_usuario').innerHTML += ''+
                                        '<div id="campo_usuario_'+contadorCampos_usuario+'">'+
                                            '<input type="hidden" id="ocultoCampoN_usuario_'+contadorCampos_usuario+'" value="CEDULA">'+
                                            '<input type="hidden" id="ocultoCampo_usuario_'+contadorCampos_usuario+'" value="usu_ced">'+
                                            '<div class="col-lg-12" id="">'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" name="" id="" value="Cédula" disabled>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<select class="form-control" id="condicion_usuario_'+contadorCampos_usuario+'" style="cursor: pointer;" onchange="condicion_usuario('+contadorCampos_usuario+');">'+
                                                            '<option value="1">CONTIENE</option>'+
                                                            '<option value="2">NO CONTIENE</option>'+
                                                            '<option value="3">IGUAL</option>'+
                                                            '<option value="4">VACIO</option>'+
                                                        '</select>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-5">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" id="valor_usuario_'+contadorCampos_usuario+'">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-1">'+
                                                    '<div class="form-group">'+
                                                        '<button class="btn btn-info" title="Quitar" onclick="quitarCampoUsuario('+contadorCampos_usuario+')"><i class="fa fa-minus-circle"></i></button>'+
                                                    '</div>'+
                                               '</div>'+
                                           '</div>'+
                                        '</div>';
            }
            if(id==2){
                document.getElementById('panelCampos_usuario').innerHTML += ''+
                                        '<div id="campo_usuario_'+contadorCampos_usuario+'">'+
                                            '<input type="hidden" id="ocultoCampoN_usuario_'+contadorCampos_usuario+'" value="APELLIDOS">'+
                                            '<input type="hidden" id="ocultoCampo_usuario_'+contadorCampos_usuario+'" value="usu_ape">'+
                                            '<div class="col-lg-12" id="">'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" name="" id="" value="Apellidos" disabled>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<select class="form-control" id="condicion_usuario_'+contadorCampos_usuario+'" style="cursor: pointer;" onchange="condicion_usuario('+contadorCampos_usuario+');">'+
                                                            '<option value="1">CONTIENE</option>'+
                                                            '<option value="2">NO CONTIENE</option>'+
                                                            '<option value="3">IGUAL</option>'+
                                                            '<option value="4">VACIO</option>'+
                                                        '</select>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-5">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" id="valor_usuario_'+contadorCampos_usuario+'">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-1">'+
                                                    '<div class="form-group">'+
                                                        '<button class="btn btn-info" title="Quitar" onclick="quitarCampoUsuario('+contadorCampos_usuario+')"><i class="fa fa-minus-circle"></i></button>'+
                                                    '</div>'+
                                               '</div>'+
                                           '</div>'+
                                        '</div>';
            }
            if(id==3){
                document.getElementById('panelCampos_usuario').innerHTML += ''+
                                        '<div id="campo_usuario_'+contadorCampos_usuario+'">'+
                                            '<input type="hidden" id="ocultoCampoN_usuario_'+contadorCampos_usuario+'" value="NOMBRES">'+
                                            '<input type="hidden" id="ocultoCampo_usuario_'+contadorCampos_usuario+'" value="usu_nom">'+
                                            '<div class="col-lg-12" id="">'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" name="" id="" value="Nombres" disabled>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<select class="form-control" id="condicion_usuario_'+contadorCampos_usuario+'" style="cursor: pointer;" onchange="condicion_usuario('+contadorCampos_usuario+');">'+
                                                            '<option value="1">CONTIENE</option>'+
                                                            '<option value="2">NO CONTIENE</option>'+
                                                            '<option value="3">IGUAL</option>'+
                                                            '<option value="4">VACIO</option>'+
                                                        '</select>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-5">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" id="valor_usuario_'+contadorCampos_usuario+'">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-1">'+
                                                    '<div class="form-group">'+
                                                        '<button class="btn btn-info" title="Quitar" onclick="quitarCampoUsuario('+contadorCampos_usuario+')"><i class="fa fa-minus-circle"></i></button>'+
                                                    '</div>'+
                                               '</div>'+
                                           '</div>'+
                                        '</div>';
            }
            if(id==4){
                document.getElementById('panelCampos_usuario').innerHTML += ''+
                                        '<div id="campo_usuario_'+contadorCampos_usuario+'">'+
                                            '<input type="hidden" id="ocultoCampoN_usuario_'+contadorCampos_usuario+'" value="E-MAIL">'+
                                            '<input type="hidden" id="ocultoCampo_usuario_'+contadorCampos_usuario+'" value="usu_eml">'+
                                            '<div class="col-lg-12" id="">'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" name="" id="" value="E-mail" disabled>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<select class="form-control" id="condicion_usuario_'+contadorCampos_usuario+'" style="cursor: pointer;" onchange="condicion_usuario('+contadorCampos_usuario+');">'+
                                                            '<option value="1">CONTIENE</option>'+
                                                            '<option value="2">NO CONTIENE</option>'+
                                                            '<option value="3">IGUAL</option>'+
                                                            '<option value="4">VACIO</option>'+
                                                        '</select>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-5">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" id="valor_usuario_'+contadorCampos_usuario+'">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-1">'+
                                                    '<div class="form-group">'+
                                                        '<button class="btn btn-info" title="Quitar" onclick="quitarCampoUsuario('+contadorCampos_usuario+')"><i class="fa fa-minus-circle"></i></button>'+
                                                    '</div>'+
                                               '</div>'+
                                           '</div>'+
                                        '</div>';
            }
            if(id==5){
                document.getElementById('panelCampos_usuario').innerHTML += ''+
                                        '<div id="campo_usuario_'+contadorCampos_usuario+'">'+
                                            '<input type="hidden" id="ocultoCampoN_usuario_'+contadorCampos_usuario+'" value="DOMICILIO">'+
                                            '<input type="hidden" id="ocultoCampo_usuario_'+contadorCampos_usuario+'" value="usu_dir">'+
                                            '<div class="col-lg-12" id="">'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" name="" id="" value="Domicilio" disabled>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<select class="form-control" id="condicion_usuario_'+contadorCampos_usuario+'" style="cursor: pointer;" onchange="condicion_usuario('+contadorCampos_usuario+');">'+
                                                            '<option value="1">CONTIENE</option>'+
                                                            '<option value="2">NO CONTIENE</option>'+
                                                            '<option value="3">IGUAL</option>'+
                                                            '<option value="4">VACIO</option>'+
                                                        '</select>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-5">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" id="valor_usuario_'+contadorCampos_usuario+'">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-1">'+
                                                    '<div class="form-group">'+
                                                        '<button class="btn btn-info" title="Quitar" onclick="quitarCampoUsuario('+contadorCampos_usuario+')"><i class="fa fa-minus-circle"></i></button>'+
                                                    '</div>'+
                                               '</div>'+
                                           '</div>'+
                                        '</div>';
            }
            if(id==6){
                document.getElementById('panelCampos_usuario').innerHTML += ''+
                                        '<div id="campo_usuario_'+contadorCampos_usuario+'">'+
                                            '<input type="hidden" id="ocultoCampoN_usuario_'+contadorCampos_usuario+'" value="TIPO">'+
                                            '<input type="hidden" id="ocultoCampo_usuario_'+contadorCampos_usuario+'" value="tip_des">'+
                                            '<div class="col-lg-12" id="">'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" name="" id="" value="Tipo" disabled>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<select class="form-control" id="condicion_usuario_'+contadorCampos_usuario+'" style="cursor: pointer;" onchange="condicion_usuario('+contadorCampos_usuario+');">'+
                                                            '<option value="1">CONTIENE</option>'+
                                                            '<option value="2">NO CONTIENE</option>'+
                                                            '<option value="3">IGUAL</option>'+
                                                            '<option value="4">VACIO</option>'+
                                                        '</select>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-5">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" id="valor_usuario_'+contadorCampos_usuario+'">'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-1">'+
                                                    '<div class="form-group">'+
                                                        '<button class="btn btn-info" title="Quitar" onclick="quitarCampoUsuario('+contadorCampos_usuario+')"><i class="fa fa-minus-circle"></i></button>'+
                                                    '</div>'+
                                               '</div>'+
                                           '</div>'+
                                        '</div>';
            }
            if(id==7){
                document.getElementById('panelCampos_usuario').innerHTML += ''+
                                        '<div id="campo_usuario_'+contadorCampos_usuario+'">'+
                                            '<input type="hidden" id="ocultoCampoN_usuario_'+contadorCampos_usuario+'" value="ESTADO">'+
                                            '<input type="hidden" id="ocultoCampo_usuario_'+contadorCampos_usuario+'" value="usu_est">'+
                                            '<div class="col-lg-12" id="">'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" name="" id="" value="Estado" disabled>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<select class="form-control" id="condicion_usuario_'+contadorCampos_usuario+'" style="cursor: pointer;" onchange="condicion_usuario('+contadorCampos_usuario+');">'+
                                                            
                                                            '<option value="3">IGUAL</option>'+
                                                            
                                                        '</select>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-5">'+
                                                    '<div class="form-group">'+
                                                        '<select class="form-control" id="valor_usuario_'+contadorCampos_usuario+'" style="cursor: pointer;" onchange="condicion_usuario('+contadorCampos_usuario+');">'+
                                                            '<option value="true">Habilitado</option>'+
                                                            '<option value="false">Deshabilitado</option>'+
                                                        '</select>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-1">'+
                                                    '<div class="form-group">'+
                                                        '<button class="btn btn-info" title="Quitar" onclick="quitarCampoUsuario('+contadorCampos_usuario+')"><i class="fa fa-minus-circle"></i></button>'+
                                                    '</div>'+
                                               '</div>'+
                                           '</div>'+
                                        '</div>';
            }
        }

        function quitarCampoUsuario(id){
            document.getElementById('campo_usuario_'+id).remove();
        }

        function condicion_usuario(id){
            if(document.getElementById('condicion_usuario_'+id).value==4){
                document.getElementById('valor_usuario_'+id).value = '';
                $('#valor_usuario_'+id).hide();
            }else{
                $('#valor_usuario_'+id).show();
            }
        }

        function reporteUsuario(){
            var d = new Date();
            var fecha = d.getDate()+'-'+d.getMonth()+'-'+d.getFullYear()+' --- '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
            var autor = 'CEUPROPSF';
            var filtro = 'Todos';
            var sql = 'select * from usuario, tipo where usuario.usu_tip_cod=tipo.tip_cod';
            if(document.getElementById('checkBusquedaA_usuario').checked){
                filtro = '';
                for (var i = 1; i <= contadorCampos_usuario; i++) {
                    try{
                        filtro += document.getElementById('ocultoCampoN_usuario_'+i).value+'  '+$('#condicion_usuario_'+i+' option:selected').text()+' '+document.getElementById('valor_usuario_'+i).value+', ';
                        var condicion = '';
                        var valor = document.getElementById("valor_usuario_"+i).value;
                        if(document.getElementById('condicion_usuario_'+i).value==1)condicion = "like upper('%25"+valor+"%25')";
                        if(document.getElementById('condicion_usuario_'+i).value==2)condicion = "not like upper('%25"+valor+"%25')";
                        if(document.getElementById('condicion_usuario_'+i).value==3)condicion = "= ('"+valor+"')";
                        if(document.getElementById('condicion_usuario_'+i).value==4)condicion = "= null";

                        var prefijo = '';
                        if(document.getElementById('ocultoCampoN_usuario_'+i).value!='ESTADO'){
                            prefijo = 'upper';
                        }

                        if(document.getElementById('ocultoCampoN_usuario_'+i).value=='TIPO'){
                            sql += ' AND '+prefijo+'(tipo.'+document.getElementById('ocultoCampo_usuario_'+i).value+') '+condicion;
                        }else{
                            sql += ' AND '+prefijo+'(usuario.'+document.getElementById('ocultoCampo_usuario_'+i).value+') '+condicion;
                        }
                         
                    }catch(e){
                        console.log(e.message);
                    }
                };
                
            }
             console.log(sql);
            //sql = "select * from usuario, tipo where usuario.usu_tip_cod=tipo.tip_cod and upper(usuario.usu_ape) like upper('%tello%')";

            window.open('<?= base_url()?>static/reporte/reporte_h.php?reporte=USUARIO&fecha='+fecha+'&autor='+autor+'&filtro='+filtro+'&sql='+sql+'','_blank');
        }
    </script>
</html>

