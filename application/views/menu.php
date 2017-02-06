
<body>
    
    <div id="wrapper">        
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="nav metismenu out" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                    <span>
                        <a href="<?php echo base_url()?>"><img alt="image" class="img-circle" src="<?php echo base_url()?>static/img/logo121.jpg" /></a>
                    </span>                        
                        <span class="clear"> 
                        <span class="block m-t-xs"> <strong class="fa-lg">&nbsp;CEUPROPSF</strong></span>           
                    </div>               
                </li>
                <div class="logo-element">
                    IN+
                </div>                
                <?php if($this->session->userdata('tipo') == '1'): ?> <!-- SI ES ADMINISTRADOR-->
                <input class="hidden" value="0" id="verificar" />
                <li  data-toggle="collapse" data-target="#products"  class="collapsed active">
                  <a href="#"><i class="fa fa-th-large fa-lg"> Administracíon<span class="arrow"></span></i></a>
                </li>
                    <ul class="nav nav-second-level collapse" id="products">
                        <li>
                            <a href="<?php echo base_url()?>chorario/start"  style="cursor:pointer;"><i class="fa fa-dashboard fa-lg"><span class="nav-label"> Horario</span></i></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>cespecialidad/start" style="cursor:pointer;"><i class="fa fa-plus-square fa-lg"><span class="nav-label">  Especialidad</span></i></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>cmedico/start"><i class="fa fa-user-md fa-lg"><span class="nav-label">  Medico</span></i></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>cusuario/start"><i class="fa fa-users fa-lg"><span class="nav-label">  Usuario</span></i></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>cpaciente/start"><i class="fa fa-wheelchair fa-lg"><span class="nav-label">  Pacientes</span></i></a>
                        </li>               
                        <li>
                            <a href="<?php echo base_url()?>cbrigada/start"><i class="fa fa-building-o fa-lg"><span class="nav-label">  Brigada</span></i></a>
                        </li>

                        <li>
                            <a href="<?php echo base_url()?>cconsultas/start"><i class="fa fa-stethoscope fa-lg"><span class="nav-label"> Consultas</span></i></a>
                        </li>                

                        <li>
                            <a href="<?php echo base_url()?>cevento/start"><i class="fa fa-dedent fa-lg"><span class="nav-label"> Evento</span></i></a>
                        </li>

                        <li>
                            <a href="<?php echo base_url()?>Noticias/index"><i class="fa fa-rss-square fa-lg"><span class="nav-label">  Noticias</span></i></a>
                        </li>                   
                    </ul>
                    <li  data-toggle="collapse" data-target="#products1"  id="citas_li" class="collapsed active">
                    <a href="#"><i class="fa fa-book fa-lg"> Citas <span class="arrow"></span></i></a>
                     </li>
                       <ul class="nav nav-second-level collapse" id="products1">
                        <li>
                            <a href="<?php echo base_url()?>cdmh/start"><i class="fa fa-calendar fa-lg"><span class="nav-label"> Agendar Horario</span></i></a>
                        </li>                        
                        <li>
                            <a href="<?php echo base_url()?>ccita/start"><i class="fa fa-book fa-lg"><span class="nav-label"> Cita</span></i></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>cdispensario/start"><i class="fa fa-building-o fa-lg"><span class="nav-label"> Dispensario</span></i></a>
                        </li>
                    </ul>
                <li>
                    <a href="<?php echo base_url()?>creporte/start"><i class="fa fa-file-o fa-lg"><span class="nav-label">  Reportes</span></i></a>
                </li>              

                <li>
                    <a href="<?php echo base_url()?>chistorial/start"><i class="fa fa-files-o fa-lg"> <span class="nav-label">Historial Paciente</span></i></a>
                </li>

                <?php endif; ?>

                <?php if($this->session->userdata('tipo') == '3'): ?><!-- SI ES USUARIO O MEDICO-->
                    <li>
                        <a href="<?php echo base_url()?>cpaciente/start"><i class="fa fa-wheelchair fa-lg"><span class="nav-label">  Pacientes</span></i></a>
                    </li>

                    <li>
                        <a href="<?php echo base_url()?>cmedico/start"><i class="fa fa-user-md fa-lg"><span class="nav-label">  Medico</span></i></a>
                    </li>

                    <li>
                        <a href="<?php echo base_url()?>cbrigada/start"><i class="fa fa-building-o fa-lg"><span class="nav-label">  Brigada</span></i></a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url()?>cconsultas/start"><i class="fa fa-stethoscope fa-lg"><span class="nav-label"> Consultas</span></i></a>
                    </li>
                    <!--
                    <li>
                        <a href="<?php echo base_url()?>ccita/start"><i class="fa fa-book fa-lg"><span class="nav-label"> Cita</span></i></a>
                    </li>-->

                    <li>
                    <a href="<?php echo base_url()?>chistorial/start"><i class="fa fa-files-o fa-lg"> <span class="nav-label">Historial Paciente</span></i></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        </span>
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Bienvenido a CEUPROPSF <?php echo $this->session->userdata('usu_nom') ?></span>
                </li>
                <li>
                    <a href="<?=base_url()?>index.php/administracion/logout"><i class="fa fa-sign-out"></i>Cerra Sesion</a>
                </li>
            </ul>
        </nav>       
        <!-- /#sidebar-wrapper -->