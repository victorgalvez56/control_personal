        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">      
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php echo base_url();?>dashboard">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>

                    <li><a href="<?php echo base_url();?>personal/personal/add">
                            <i class="ion ion-person-add"></i><span>Registro Personal</span>
                        </a>
                    </li>   
                    <li><a href="<?php echo base_url();?>movimientos/cajas/add">
                            <i class="ion ion-person"></i><span>Listado Personal</span>
                        </a>
                    </li> 
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-print"></i><span>Reportes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>reportes/cajas"><i class="fa fa-circle-o">
                                
                            </i>Cajas</a></li>
                            <li><a href="<?php echo base_url();?>reportes/ventas"><i class="fa fa-circle-o">
                                
                            </i>Ventas</a></li>
                            <li><a href="<?php echo base_url();?>reportes/abastecimientos"><i class="fa fa-circle-o"></i>Abastecimientos</a></li>
                        </ul>
                      
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i><span>Administrador</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>administrador/usuarios"><i class="fa fa-circle-o"></i>Usuarios</a></li>                            
                            <li><a href="<?php echo base_url();?>administrador/permisos"><i class="fa fa-circle-o"></i>Permisos</a></li>
                            
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
                    



                      
    

        <!-- =============================================== -->