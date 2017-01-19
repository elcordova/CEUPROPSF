
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
                                            <select class="form-control" id="modulo_cod" style="cursor:pointer;" onchange="mostrarPanelReporte();">
                                                <option value="" disabled selected>-------------</option>
                                                <option value="usuario">Usuario</option>
                                                <option value="paciente">Paciente</option>
                                                <option value="medico">Médico</option>
                                                <option value="evento">Evento</option>
                                                <option value="taller">Taller</option>
                                                <option value="historia">Historia Clínica</option>
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
                                <div id="divFrmEvento" class="col-md-8 col-md-offset-2" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">    
                                    <form id="frmPac" class="form-horizontal">
                                        <!--*************************FORMULARIO*************************** -->
                                        <fieldset class="scheduler-border">
                                            <div align="center">
                                                <legend class="scheduler-border"><i class="fa fa-dedent">  </i><span class="nav-label"> Reporte - Evento</span></legend>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="radio" name="gBusqueda_evento" id="checkBusquedaT_evento" style="cursor: pointer;" checked onclick="mostrarPanel_evento();">
                                                    </span>
                                                    <input type="text" class="form-control" disabled value="Todo">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="radio" name="gBusqueda_evento" id="checkBusquedaA_evento" style="cursor: pointer;" onclick="mostrarPanel_evento();">
                                                    </span>
                                                    <input type="text" class="form-control" disabled value="Búsqueda avanzada">
                                                </div>
                                            </div>

                                            <div id="panelBusqueda_evento">
                                                <div class="col-lg-6">
                                                    <br>
                                                    <div class="btn-group">
                                                      <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Campos</button>
                                                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                      </button>
                                                      <ul class="dropdown-menu" role="menu">
                                                        <li><a onclick="agregarCampo_evento(1);" style="cursor:pointer;">Título</a></li>
                                                        <li><a onclick="agregarCampo_evento(2);" style="cursor:pointer;">Fecha</a></li>
                                                      </ul>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div id="panelCampos_evento">
                                                </div>
                                            </div>

                                        
                                        </fieldset>                        
                                       
                                        
                                    </form>
                                    <hr>
                                    <div class="row">
                                        <div align="center">
                                            <!--<a  target="_blank" href="<?= base_url()?>static/reporte/reporte_h.php">-->
                                            <button onclick="reporteEvento();" class="btn btn-primary btn-large">
                                            <i class="fa fa-file">  </i> Generar Reporte</button>
                                            <!--</a>-->
                                        </div>
                                    </div>
                                </div>
                                <div id="divFrmTaller" class="col-md-8 col-md-offset-2" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">    
                                    <form id="frmPac" class="form-horizontal">
                                        <!--*************************FORMULARIO*************************** -->
                                        <fieldset class="scheduler-border">
                                            <div align="center">
                                                <legend class="scheduler-border"><i class="fa fa-dedent">  </i><span class="nav-label"> Reporte - Taller</span></legend>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="radio" name="gBusqueda_taller" id="checkBusquedaT_taller" style="cursor: pointer;" checked onclick="mostrarPanel_taller();">
                                                    </span>
                                                    <input type="text" class="form-control" disabled value="Todo">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="radio" name="gBusqueda_taller" id="checkBusquedaA_taller" style="cursor: pointer;" onclick="mostrarPanel_taller();">
                                                    </span>
                                                    <input type="text" class="form-control" disabled value="Búsqueda avanzada">
                                                </div>
                                            </div>

                                            <div id="panelBusqueda_taller">
                                                <div class="col-lg-6">
                                                    <br>
                                                    <div class="btn-group">
                                                      <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Campos</button>
                                                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                      </button>
                                                      <ul class="dropdown-menu" role="menu">
                                                        <li><a onclick="agregarCampo_taller(1);" style="cursor:pointer;">Tema</a></li>
                                                        <li><a onclick="agregarCampo_taller(2);" style="cursor:pointer;">Fecha</a></li>
                                                        <li><a onclick="agregarCampo_taller(3);" style="cursor:pointer;">Evento</a></li>
                                                      </ul>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div id="panelCampos_taller">
                                                </div>
                                            </div>

                                        
                                        </fieldset>                        
                                       
                                        
                                    </form>
                                    <hr>
                                    <div class="row">
                                        <div align="center">
                                            <!--<a  target="_blank" href="<?= base_url()?>static/reporte/reporte_h.php">-->
                                            <button onclick="reporteTaller();" class="btn btn-primary btn-large">
                                            <i class="fa fa-file">  </i> Generar Reporte</button>
                                            <!--</a>-->
                                        </div>
                                    </div>
                                </div>
                                <div id="divFrmHistoria" class="col-md-8 col-md-offset-2" style="border: 1px solid #ccc; padding:10px 35px 40px 35px;background-color:#FFF;">    
                                    <form id="frmPac" class="form-horizontal">
                                        <!--*************************FORMULARIO*************************** -->
                                        <fieldset class="scheduler-border">
                                            <div align="center">
                                                <legend class="scheduler-border"><i class="fa fa-plus">  </i><span class="nav-label"> Reporte - Historia Clínica </span></legend>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="radio" name="gBusqueda_historia" id="checkBusquedaT_historia" style="cursor: pointer;" disabled onclick="mostrarPanel_historia();">
                                                    </span>
                                                    <input type="text" class="form-control" disabled value="Todo">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <input type="radio" name="gBusqueda_historia" id="checkBusquedaA_historia" style="cursor: pointer;" checked onclick="mostrarPanel_historia();">
                                                    </span>
                                                    <input type="text" class="form-control" disabled value="Búsqueda avanzada">
                                                </div>
                                            </div>

                                            <div id="panelBusqueda_historia">
                                                <div class="col-lg-6">
                                                    <br>
                                                    <div class="btn-group">
                                                      <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Campos</button>
                                                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                      </button>
                                                      <ul class="dropdown-menu" role="menu">
                                                        <li><a onclick="agregarCampo_historia(1);" style="cursor:pointer;">Cédula</a></li>
                                                        <li><a onclick="agregarCampo_historia(2);" style="cursor:pointer;">Nombres</a></li>
                                                        <li><a onclick="agregarCampo_historia(3);" style="cursor:pointer;">Apellidos</a></li>
                                                      </ul>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div id="panelCampos_historia">
                                                </div>
                                            </div>

                                        
                                        </fieldset>                        
                                       
                                        
                                    </form>
                                    <hr>
                                    <div class="row">
                                        <div align="center">
                                            <!--<a  target="_blank" href="<?= base_url()?>static/reporte/reporte_h.php">-->
                                            <button onclick="reporteHistoria();" class="btn btn-primary btn-large">
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

        $('#divFrmUsuario').hide();
        $('#divFrmPaciente').hide();
        $('#divFrmMedico').hide();
        $('#divFrmEvento').hide();
        $('#divFrmTaller').hide();
        $('#divFrmHistoria').hide();

        $('#panelBusqueda_usuario').hide();
        $('#panelBusqueda_paciente').hide();
        $('#panelBusqueda_medico').hide();
        $('#panelBusqueda_evento').hide();
        $('#panelBusqueda_taller').hide();
        $('#panelBusqueda_historia').hide();
        $('#panelBusqueda_historia').show();

        var contadorCampos_usuario = 0;
        var contadorCampos_paciente = 0;
        var contadorCampos_medico = 0;
        var contadorCampos_evento = 0;
        var contadorCampos_taller = 0;
        var contadorCampos_historia = 0;

        function mostrarPanelReporte(){
            $('#divFrmUsuario').hide();
            $('#divFrmPaciente').hide();
            $('#divFrmMedico').hide();
            $('#divFrmEvento').hide();
            $('#divFrmTaller').hide();
            $('#divFrmHistoria').hide();
            if(document.getElementById('modulo_cod').value=='usuario')$('#divFrmUsuario').show();
            if(document.getElementById('modulo_cod').value=='paciente')$('#divFrmPaciente').show();
            if(document.getElementById('modulo_cod').value=='medico')$('#divFrmMedico').show();
            if(document.getElementById('modulo_cod').value=='evento')$('#divFrmEvento').show();
            if(document.getElementById('modulo_cod').value=='taller')$('#divFrmTaller').show();
            if(document.getElementById('modulo_cod').value=='historia')$('#divFrmHistoria').show();

        }

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

        function mostrarPanel_evento(){
            if(document.getElementById('checkBusquedaA_evento').checked)$('#panelBusqueda_evento').show();
            else $('#panelBusqueda_evento').hide();
        }

        function mostrarPanel_taller(){
            if(document.getElementById('checkBusquedaA_taller').checked)$('#panelBusqueda_taller').show();
            else $('#panelBusqueda_taller').hide();
        }

        function mostrarPanel_historia(){
            if(document.getElementById('checkBusquedaA_historia').checked)$('#panelBusqueda_historia').show();
            else $('#panelBusqueda_historia').hide();
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

        function agregarCampo_paciente(id){
            contadorCampos_paciente++;
            var textCampo = '';
            var textAtributo = '';
            var textValor = '';
            if(id==1){
                textCampo = 'CEDULA';
                textAtributo = 'pac_ced';
                textValor = 'Cédula';
            }
            if(id==2){
                textCampo = 'APELLIDOS';
                textAtributo = 'pac_ape';
                textValor = 'Apellidos';
            }
            if(id==3){
                textCampo = 'NOMBRES';
                textAtributo = 'pac_nom';
                textValor = 'Nombres';
            }
            if(id==4){
                textCampo = 'EMAIL';
                textAtributo = 'pac_cor';
                textValor = 'E-mail';
            }
            if(id==5){
                textCampo = 'DOMICILIO';
                textAtributo = 'pac_dir';
                textValor = 'Domicilio';
            }
            if(id==6){
                textCampo = 'T.SANGRE';
                textAtributo = 'pac_tip_san';
                textValor = 'T. Sangre';
            }
            if(id==7){
                textCampo = 'SEXO';
                textAtributo = 'pac_sex';
                textValor = 'Sexo';
            }
            if(id==8){
                textCampo = 'NACIMIENTO';
                textAtributo = 'pac_fec_nac';
                textValor = 'F. Nacimiento';
            }
            if(id==9){
                textCampo = 'CIVIL';
                textAtributo = 'pac_est_civ';
                textValor = 'E. Civil';
            }
            if(id==10){
                textCampo = 'ESTADO';
                textAtributo = 'pac_est';
                textValor = 'Estado';
            }


            var condiciones = '';
            if(id!=10)condiciones += '<option value="1">CONTIENE</option>';
            if(id!=10)condiciones += '<option value="2">NO CONTIENE</option>';
            condiciones += '<option value="3">IGUAL</option>';
            if(id!=10)condiciones += '<option value="4">VACIO</option>';

            var cajaValor = '';
            if(id!=10)cajaValor =   '<input type="text" class="form-control" id="valor_paciente_'+contadorCampos_paciente+'">';
            if(id==10)cajaValor =   '<select class="form-control" id="valor_usuario_'+contadorCampos_usuario+'" style="cursor: pointer;" onchange="condicion_usuario('+contadorCampos_usuario+');">'+
                                        '<option value="true">Habilitado</option>'+
                                        '<option value="false">Deshabilitado</option>'+
                                    '</select>';

            document.getElementById('panelCampos_paciente').innerHTML += ''+
                                        '<div id="campo_paciente_'+contadorCampos_paciente+'">'+
                                            '<input type="hidden" id="ocultoCampoN_paciente_'+contadorCampos_paciente+'" value="'+textCampo+'">'+
                                            '<input type="hidden" id="ocultoCampo_paciente_'+contadorCampos_paciente+'" value="'+textAtributo+'">'+
                                            '<div class="col-lg-12" id="">'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" name="" id="" value="'+textValor+'" disabled>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<select class="form-control" id="condicion_paciente_'+contadorCampos_paciente+'" style="cursor: pointer;" onchange="condicion_paciente('+contadorCampos_paciente+');">'+
                                                            ''+condiciones+
                                                        '</select>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-5">'+
                                                    '<div class="form-group">'+
                                                        ''+cajaValor+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-1">'+
                                                    '<div class="form-group">'+
                                                        '<button class="btn btn-info" title="Quitar" onclick="quitarCampoPaciente('+contadorCampos_paciente+')"><i class="fa fa-minus-circle"></i></button>'+
                                                    '</div>'+
                                               '</div>'+
                                           '</div>'+
                                        '</div>';  
        }

        function agregarCampo_medico(id){
            contadorCampos_medico++;
            var textCampo = '';
            var textAtributo = '';
            var textValor = '';
            if(id==1){
                textCampo = 'CEDULA';
                textAtributo = 'med_ced';
                textValor = 'Cédula';
            }
            if(id==2){
                textCampo = 'APELLIDOS';
                textAtributo = 'med_ape';
                textValor = 'Apellidos';
            }
            if(id==3){
                textCampo = 'NOMBRES';
                textAtributo = 'med_nom';
                textValor = 'Nombres';
            }
            if(id==4){
                textCampo = 'EMAIL';
                textAtributo = 'med_eml';
                textValor = 'E-mail';
            }
            if(id==5){
                textCampo = 'DOMICILIO';
                textAtributo = 'med_dir';
                textValor = 'Domicilio';
            }
            if(id==6){
                textCampo = 'TELEFONO';
                textAtributo = 'med_tel';
                textValor = 'Teléfono';
            }
            if(id==7){
                textCampo = 'ESTADO';
                textAtributo = 'med_est';
                textValor = 'Estado';
            }


            var condiciones = '';
            if(id!=7)condiciones += '<option value="1">CONTIENE</option>';
            if(id!=7)condiciones += '<option value="2">NO CONTIENE</option>';
            condiciones += '<option value="3">IGUAL</option>';
            if(id!=7)condiciones += '<option value="4">VACIO</option>';

            var cajaValor = '';
            if(id!=7)cajaValor =   '<input type="text" class="form-control" id="valor_medico_'+contadorCampos_medico+'">';
            if(id==7)cajaValor =   '<select class="form-control" id="valor_medico_'+contadorCampos_medico+'" style="cursor: pointer;">'+
                                        '<option value="true">Habilitado</option>'+
                                        '<option value="false">Deshabilitado</option>'+
                                    '</select>';

            document.getElementById('panelCampos_medico').innerHTML += ''+
                                        '<div id="campo_medico_'+contadorCampos_medico+'">'+
                                            '<input type="hidden" id="ocultoCampoN_medico_'+contadorCampos_medico+'" value="'+textCampo+'">'+
                                            '<input type="hidden" id="ocultoCampo_medico_'+contadorCampos_medico+'" value="'+textAtributo+'">'+
                                            '<div class="col-lg-12" id="">'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" name="" id="" value="'+textValor+'" disabled>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<select class="form-control" id="condicion_medico_'+contadorCampos_medico+'" style="cursor: pointer;" onchange="condicion_medico('+contadorCampos_medico+');">'+
                                                            ''+condiciones+
                                                        '</select>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-5">'+
                                                    '<div class="form-group">'+
                                                        ''+cajaValor+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-1">'+
                                                    '<div class="form-group">'+
                                                        '<button class="btn btn-info" title="Quitar" onclick="quitarCampoMedico('+contadorCampos_medico+')"><i class="fa fa-minus-circle"></i></button>'+
                                                    '</div>'+
                                               '</div>'+
                                           '</div>'+
                                        '</div>';  
        }

        function agregarCampo_evento(id){
            contadorCampos_evento++;
            var textCampo = '';
            var textAtributo = '';
            var textValor = '';
            if(id==1){
                textCampo = 'TITULO';
                textAtributo = 'eve_tit';
                textValor = 'Título';
            }
            if(id==2){
                textCampo = 'FECHA';
                textAtributo = 'eve_fec_ini';
                textValor = 'Fecha';
            }
            
           
            var condiciones = '';
            condiciones += '<option value="1">CONTIENE</option>';
            condiciones += '<option value="2">NO CONTIENE</option>';
            condiciones += '<option value="3">IGUAL</option>';
            condiciones += '<option value="4">VACIO</option>';

            var cajaValor = '';
            cajaValor =   '<input type="text" class="form-control" id="valor_evento_'+contadorCampos_evento+'">';
            

            document.getElementById('panelCampos_evento').innerHTML += ''+
                                        '<div id="campo_evento_'+contadorCampos_evento+'">'+
                                            '<input type="hidden" id="ocultoCampoN_evento_'+contadorCampos_evento+'" value="'+textCampo+'">'+
                                            '<input type="hidden" id="ocultoCampo_evento_'+contadorCampos_evento+'" value="'+textAtributo+'">'+
                                            '<div class="col-lg-12" id="">'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" name="" id="" value="'+textValor+'" disabled>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<select class="form-control" id="condicion_evento_'+contadorCampos_evento+'" style="cursor: pointer;" onchange="condicion_evento('+contadorCampos_evento+');">'+
                                                            ''+condiciones+
                                                        '</select>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-5">'+
                                                    '<div class="form-group">'+
                                                        ''+cajaValor+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-1">'+
                                                    '<div class="form-group">'+
                                                        '<button class="btn btn-info" title="Quitar" onclick="quitarCampoEvento('+contadorCampos_evento+')"><i class="fa fa-minus-circle"></i></button>'+
                                                    '</div>'+
                                               '</div>'+
                                           '</div>'+
                                        '</div>';  
        }

        function agregarCampo_taller(id){
            contadorCampos_taller++;
            var textCampo = '';
            var textAtributo = '';
            var textValor = '';
            if(id==1){
                textCampo = 'TEMA';
                textAtributo = 'tal_tem';
                textValor = 'Tema';
            }
            if(id==2){
                textCampo = 'FECHA';
                textAtributo = 'tal_fec';
                textValor = 'Fecha';
            }
            if(id==3){
                textCampo = 'EVENTO';
                textAtributo = 'eve_tit';
                textValor = 'Evento';
            }
            
           
            var condiciones = '';
            condiciones += '<option value="1">CONTIENE</option>';
            condiciones += '<option value="2">NO CONTIENE</option>';
            condiciones += '<option value="3">IGUAL</option>';
            condiciones += '<option value="4">VACIO</option>';

            var cajaValor = '';
            cajaValor =   '<input type="text" class="form-control" id="valor_taller_'+contadorCampos_taller+'">';
            

            document.getElementById('panelCampos_taller').innerHTML += ''+
                                        '<div id="campo_taller_'+contadorCampos_taller+'">'+
                                            '<input type="hidden" id="ocultoCampoN_taller_'+contadorCampos_taller+'" value="'+textCampo+'">'+
                                            '<input type="hidden" id="ocultoCampo_taller_'+contadorCampos_taller+'" value="'+textAtributo+'">'+
                                            '<div class="col-lg-12" id="">'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" name="" id="" value="'+textValor+'" disabled>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<select class="form-control" id="condicion_taller_'+contadorCampos_taller+'" style="cursor: pointer;" onchange="condicion_taller('+contadorCampos_taller+');">'+
                                                            ''+condiciones+
                                                        '</select>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-5">'+
                                                    '<div class="form-group">'+
                                                        ''+cajaValor+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-1">'+
                                                    '<div class="form-group">'+
                                                        '<button class="btn btn-info" title="Quitar" onclick="quitarCampoTaller('+contadorCampos_taller+')"><i class="fa fa-minus-circle"></i></button>'+
                                                    '</div>'+
                                               '</div>'+
                                           '</div>'+
                                        '</div>';  
        }

        function agregarCampo_historia(id){
            contadorCampos_historia++;
            var textCampo = '';
            var textAtributo = '';
            var textValor = '';
            if(id==1){
                textCampo = 'CEDULA';
                textAtributo = 'pac_ced';
                textValor = 'Cédula';
            }
            if(id==3){
                textCampo = 'APELLIDOS';
                textAtributo = 'pac_ape';
                textValor = 'Apellidos';
            }
            if(id==2){
                textCampo = 'NOMBRES';
                textAtributo = 'pac_nom';
                textValor = 'Nombres';
            }
            


            var condiciones = '';
            //if(id!=10)condiciones += '<option value="1">CONTIENE</option>';
            //if(id!=10)condiciones += '<option value="2">NO CONTIENE</option>';
            condiciones += '<option value="3">IGUAL</option>';
            //if(id!=10)condiciones += '<option value="4">VACIO</option>';

            var cajaValor =   '<input type="text" class="form-control" id="valor_historia_'+contadorCampos_historia+'">';


            document.getElementById('panelCampos_historia').innerHTML += ''+
                                        '<div id="campo_paciente_'+contadorCampos_historia+'">'+
                                            '<input type="hidden" id="ocultoCampoN_historia_'+contadorCampos_historia+'" value="'+textCampo+'">'+
                                            '<input type="hidden" id="ocultoCampo_historia_'+contadorCampos_historia+'" value="'+textAtributo+'">'+
                                            '<div class="col-lg-12" id="">'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<input type="text" class="form-control" name="" id="" value="'+textValor+'" disabled>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-3">'+
                                                    '<div class="form-group">'+
                                                        '<select class="form-control" id="condicion_historia_'+contadorCampos_historia+'" style="cursor: pointer;" onchange="condicion_historia('+contadorCampos_historia+');">'+
                                                            ''+condiciones+
                                                        '</select>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-5">'+
                                                    '<div class="form-group">'+
                                                        ''+cajaValor+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-lg-1">'+
                                                    '<div class="form-group">'+
                                                        '<button class="btn btn-info" title="Quitar" onclick="quitarCampoHistoria('+contadorCampos_historia+')"><i class="fa fa-minus-circle"></i></button>'+
                                                    '</div>'+
                                               '</div>'+
                                           '</div>'+
                                        '</div>';  
        }

        function quitarCampoUsuario(id){
            document.getElementById('campo_usuario_'+id).remove();
        }

        function quitarCampoPaciente(id){
            document.getElementById('campo_paciente_'+id).remove();
        }

        function quitarCampoMedico(id){
            document.getElementById('campo_medico_'+id).remove();
        }

        function quitarCampoEvento(id){
            document.getElementById('campo_evento_'+id).remove();
        }

        function quitarCampoTaller(id){
            document.getElementById('campo_taller_'+id).remove();
        }

        function quitarCampoHistoria(id){
            document.getElementById('campo_historia_'+id).remove();
        }



        function condicion_usuario(id){
            if(document.getElementById('condicion_usuario_'+id).value==4){
                document.getElementById('valor_usuario_'+id).value = '';
                $('#valor_usuario_'+id).hide();
            }else{
                $('#valor_usuario_'+id).show();
            }
        }

        function condicion_paciente(id){
            if(document.getElementById('condicion_paciente_'+id).value==4){
                document.getElementById('valor_paciente_'+id).value = '';
                $('#valor_paciente_'+id).hide();
            }else{
                $('#valor_paciente_'+id).show();
            }
        }

        function condicion_medico(id){
            if(document.getElementById('condicion_medico_'+id).value==4){
                document.getElementById('valor_medico_'+id).value = '';
                $('#valor_medico_'+id).hide();
            }else{
                $('#valor_medico_'+id).show();
            }
        }

        function condicion_evento(id){
            if(document.getElementById('condicion_evento_'+id).value==4){
                document.getElementById('valor_evento_'+id).value = '';
                $('#valor_evento_'+id).hide();
            }else{
                $('#valor_evento_'+id).show();
            }
        }

        function condicion_taller(id){
            if(document.getElementById('condicion_taller_'+id).value==4){
                document.getElementById('valor_taller_'+id).value = '';
                $('#valor_taller_'+id).hide();
            }else{
                $('#valor_taller_'+id).show();
            }
        }

        function condicion_historia(id){
            if(document.getElementById('condicion_historia_'+id).value==4){
                document.getElementById('valor_historia_'+id).value = '';
                $('#valor_historia_'+id).hide();
            }else{
                $('#valor_historia_'+id).show();
            }
        }

        function reporteUsuario(){
            var d = new Date();
            var fecha = d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear()+' --- '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
            var autor = 'CEUPROPSF';
            var filtro = 'Todos';
            //var sql = 'select * from usuario, tipo where usuario.usu_tip_cod=tipo.tip_cod';
            var sql = 'select * from usuario where usu_cod=usu_cod';
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

        function reportePaciente(){
            var d = new Date();
            var fecha = d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear()+' --- '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
            var autor = 'CEUPROPSF';
            var filtro = 'Todos';
            var sql = 'select * from paciente where pac_id=pac_id';
            if(document.getElementById('checkBusquedaA_paciente').checked){
                filtro = '';
                for (var i = 1; i <= contadorCampos_paciente; i++) {
                    try{

                        filtro += document.getElementById('ocultoCampoN_paciente_'+i).value+'  '+$('#condicion_paciente_'+i+' option:selected').text()+' '+document.getElementById('valor_paciente_'+i).value+', ';
                        var condicion = '';
                        var valor = document.getElementById("valor_paciente_"+i).value;
                        if(document.getElementById('condicion_paciente_'+i).value==1)condicion = "like upper('%25"+valor+"%25')";
                        if(document.getElementById('condicion_paciente_'+i).value==2)condicion = "not like upper('%25"+valor+"%25')";
                        if(document.getElementById('condicion_paciente_'+i).value==3)condicion = "= ('"+valor+"')";
                        if(document.getElementById('condicion_paciente_'+i).value==4)condicion = "= null";

                        var prefijo = '';
                        if(document.getElementById('ocultoCampoN_paciente_'+i).value!='ESTADO'){
                            prefijo = 'upper';
                        }

                        sql += ' AND '+prefijo+'(paciente.'+document.getElementById('ocultoCampo_paciente_'+i).value+') '+condicion;
                         
                    }catch(e){
                        console.log(e.message);
                    }
                };
                
            }
             console.log(sql);


            window.open('<?= base_url()?>static/reporte/reporte_h.php?reporte=PACIENTE&fecha='+fecha+'&autor='+autor+'&filtro='+filtro+'&sql='+sql+'','_blank');
        }

        function reporteMedico(){
            var d = new Date();
            var fecha = d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear()+' --- '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
            var autor = 'CEUPROPSF';
            var filtro = 'Todos';
            var sql = 'select * from medico where med_cod=med_cod';
            if(document.getElementById('checkBusquedaA_medico').checked){
                filtro = '';
                for (var i = 1; i <= contadorCampos_medico; i++) {
                    try{

                        filtro += document.getElementById('ocultoCampoN_medico_'+i).value+'  '+$('#condicion_medico_'+i+' option:selected').text()+' '+document.getElementById('valor_medico_'+i).value+', ';
                        var condicion = '';
                        var valor = document.getElementById("valor_medico_"+i).value;
                        if(document.getElementById('condicion_medico_'+i).value==1)condicion = "like upper('%25"+valor+"%25')";
                        if(document.getElementById('condicion_medico_'+i).value==2)condicion = "not like upper('%25"+valor+"%25')";
                        if(document.getElementById('condicion_medico_'+i).value==3)condicion = "= ('"+valor+"')";
                        if(document.getElementById('condicion_medico_'+i).value==4)condicion = "= null";

                        var prefijo = '';
                        if(document.getElementById('ocultoCampoN_medico_'+i).value!='ESTADO'){
                            prefijo = 'upper';
                        }

                        sql += ' AND '+prefijo+'(medico.'+document.getElementById('ocultoCampo_medico_'+i).value+') '+condicion;
                         
                    }catch(e){
                        console.log(e.message);
                    }
                };
                
            }
             console.log(sql);


            window.open('<?= base_url()?>static/reporte/reporte_h.php?reporte=MEDICO&fecha='+fecha+'&autor='+autor+'&filtro='+filtro+'&sql='+sql+'','_blank');
        }

        function reporteEvento(){
            var d = new Date();
            var fecha = d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear()+' --- '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
            var autor = 'CEUPROPSF';
            var filtro = 'Todos';
            var sql = 'select * from evento where eve_id=eve_id';
            if(document.getElementById('checkBusquedaA_evento').checked){
                filtro = '';
                for (var i = 1; i <= contadorCampos_evento; i++) {
                    try{

                        filtro += document.getElementById('ocultoCampoN_evento_'+i).value+'  '+$('#condicion_evento_'+i+' option:selected').text()+' '+document.getElementById('valor_evento_'+i).value+', ';
                        var condicion = '';
                        var valor = document.getElementById("valor_evento_"+i).value;
                        if(document.getElementById('condicion_evento_'+i).value==1)condicion = "like upper('%25"+valor+"%25')";
                        if(document.getElementById('condicion_evento_'+i).value==2)condicion = "not like upper('%25"+valor+"%25')";
                        if(document.getElementById('condicion_evento_'+i).value==3)condicion = "= ('"+valor+"')";
                        if(document.getElementById('condicion_evento_'+i).value==4)condicion = "= null";

                        var prefijo = '';
                        if(document.getElementById('ocultoCampoN_evento_'+i).value!='ESTADO'){
                            prefijo = 'upper';
                        }

                        sql += ' AND '+prefijo+'(evento.'+document.getElementById('ocultoCampo_evento_'+i).value+') '+condicion;
                         
                    }catch(e){
                        console.log(e.message);
                    }
                };
                
            }
             console.log(sql);


            window.open('<?= base_url()?>static/reporte/reporte_h.php?reporte=EVENTO&fecha='+fecha+'&autor='+autor+'&filtro='+filtro+'&sql='+sql+'','_blank');
        }

        function reporteTaller(){
            var d = new Date();
            var fecha = d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear()+' --- '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
            var autor = 'CEUPROPSF';
            var filtro = 'Todos';
            var sql = 'select * from taller, evento where taller.eve_id=evento.eve_id';
            if(document.getElementById('checkBusquedaA_taller').checked){
                filtro = '';
                for (var i = 1; i <= contadorCampos_taller; i++) {
                    try{

                        filtro += document.getElementById('ocultoCampoN_taller_'+i).value+'  '+$('#condicion_taller_'+i+' option:selected').text()+' '+document.getElementById('valor_taller_'+i).value+', ';
                        var condicion = '';
                        var valor = document.getElementById("valor_taller_"+i).value;
                        if(document.getElementById('condicion_taller_'+i).value==1)condicion = "like upper('%25"+valor+"%25')";
                        if(document.getElementById('condicion_taller_'+i).value==2)condicion = "not like upper('%25"+valor+"%25')";
                        if(document.getElementById('condicion_taller_'+i).value==3)condicion = "= ('"+valor+"')";
                        if(document.getElementById('condicion_taller_'+i).value==4)condicion = "= null";

                        var prefijo = '';
                        if(document.getElementById('ocultoCampoN_taller_'+i).value!='ESTADO'){
                            prefijo = 'upper';
                        }

                        if(document.getElementById('ocultoCampoN_taller_'+i).value=='EVENTO'){
                            sql += ' AND '+prefijo+'(evento.'+document.getElementById('ocultoCampo_taller_'+i).value+') '+condicion;
                        }else{
                            sql += ' AND '+prefijo+'(taller.'+document.getElementById('ocultoCampo_taller_'+i).value+') '+condicion;
                        }
                         
                    }catch(e){
                        console.log(e.message);
                    }
                };
                
            }
             console.log(sql);
            


            window.open('<?= base_url()?>static/reporte/reporte_h.php?reporte=TALLER&fecha='+fecha+'&autor='+autor+'&filtro='+filtro+'&sql='+sql+'','_blank');
        }

        function reporteHistoria(){
            var d = new Date();
            var fecha = d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear()+' --- '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
            var autor = 'CEUPROPSF';
            var filtro = 'Todos';
            var sql = 'select * from paciente as p, consulta as c where p.pac_id=p.pac_id';
            if(document.getElementById('checkBusquedaA_historia').checked){
                filtro = '';
                for (var i = 1; i <= contadorCampos_historia; i++) {
                    try{

                        filtro += document.getElementById('ocultoCampoN_historia_'+i).value+'  '+$('#condicion_historia_'+i+' option:selected').text()+' '+document.getElementById('valor_historia_'+i).value+', ';
                        var condicion = '';
                        var valor = document.getElementById("valor_historia_"+i).value;
                        if(document.getElementById('condicion_historia_'+i).value==1)condicion = "like upper('%25"+valor+"%25')";
                        if(document.getElementById('condicion_historia_'+i).value==2)condicion = "not like upper('%25"+valor+"%25')";
                        if(document.getElementById('condicion_historia_'+i).value==3)condicion = "= ('"+valor+"')";
                        if(document.getElementById('condicion_historia_'+i).value==4)condicion = "= null";

                        var prefijo = '';
                        if(document.getElementById('ocultoCampoN_historia_'+i).value!='ESTADO'){
                            prefijo = 'upper';
                        }

                        sql += ' AND '+prefijo+'(p.'+document.getElementById('ocultoCampo_historia_'+i).value+') '+condicion;
                         
                    }catch(e){
                        console.log(e.message);
                    }
                };

                sql += ' and p.pac_id=c.pac_id order by c.con_id';
                
            }
             console.log(sql);
             

            window.open('<?= base_url()?>static/reporte/reporte_h2.php?reporte=HISTORIA CLINICA&fecha='+fecha+'&autor='+autor+'&filtro='+filtro+'&sql='+sql+'','_blank');
        }

    </script>
</html>

