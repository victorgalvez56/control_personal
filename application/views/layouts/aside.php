        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">III DIVISION EJERCITO AREQUIPA</li>
                    <li>
                        <a href="<?php echo base_url(); ?>dashboard">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                        <i class="ion ion-person"></i><span>Personal</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                        <li><a href="<?php echo base_url(); ?>control/personal_militar/"><i class="fa fa-circle-o">
                                    </i>Personal Militar</a></li>
                            <li><a href="<?php echo base_url(); ?>control/personal_civil/"><i class="fa fa-circle-o">
                                    </i>Personal Civil</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-heart"></i><span>Valoración Sanitaria</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>control/sanitario_registro/"><i class="fa fa-circle-o">
                                    </i>Registro</a></li>
                            <li><a href="<?php echo base_url(); ?>control/sanitario_mensual/"><i class="fa fa-circle-o">
                                    </i>Mensual</a></li>
                            <li><a href="<?php echo base_url(); ?>control/sanitario_anual/"><i class="fa fa-circle-o">
                                    </i>Anual</a></li>
                        </ul>

                    </li>

                    <li><a href="<?php echo base_url(); ?>control/vehiculos/">
                            <i class="ion ion-android-car"></i><span>Registro Vehicular</span>
                        </a>
                    </li>
                    <li><a href="<?php echo base_url(); ?>control/tarjeta_identidad/">
                            <i class="ion ion-ios-list-outline"></i><span>Tarjeta identidad Seguridad</span>
                        </a>
                    </li>
                    <li><a href="<?php echo base_url(); ?>administrador/reportes/">
                            <i class="ion ion-android-car"></i><span>Reportes</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i><span>Administrador</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>administrador/usuarios"><i class="fa fa-circle-o"></i>Usuarios</a></li>
                            <li><a href="<?php echo base_url(); ?>administrador/permisos"><i class="fa fa-circle-o"></i>Permisos</a></li>

                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>







        <!-- =============================================== -->