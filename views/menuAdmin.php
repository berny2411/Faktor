<body>
    <!-- Left Panel -->

  <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-title">MENU</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-plus-square"></i>Procedimiento</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="fa fa-plus"></i><a href="./admin.php?page=procedimiento/registroProcedimiento">New Procedimiento</a></li>
                            <li><i class="fa fa-search"></i><a href="./admin.php?page=procedimiento/tablaProcedimiento">Ver Procedimiento</a></li>
                            
                        </ul>
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-building-o"></i>Aseguradora</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="fa fa-plus"></i><a href="./admin.php?page=aseguradora/registroAseguradora">Agregar Aseguradora</a></li>
                            <li><i class="fa fa-pencil"></i><a href="./admin.php?page=aseguradora/updAseguradora">Modificar Aseguradora</a></li>
                            <li><i class="fa fa-search"></i><a href="./admin.php?page=aseguradora/tablaAseguradora">Consulta Aseguradora</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file-o"></i>Documentos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-plus-square"></i><a href="./admin.php?page=documentos/vistaCarpetaP&d=C">Procedimiento</a></li>
                            <li><i class="menu-icon fa fa-user-md"></i><a href="./admin.php?page=documentos/vistaCarpetaP&d=P">Personal Medico</a></li>
                        </ul>
                    </li>

                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-user"></i>Usuarios</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="fa fa-plus"></i><a href="./admin.php?page=usuario/altaUsuario">Nuevo Usuario</a></li>
                            <li><i class="fa fa-search"></i><a href="./admin.php?page=usuario/tablaUsuario">Lista Usuario</a></li>
                            
                        </ul>
                    </li>
                    

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="admin.php"><img src="img/SmallLogo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                             <?php include("controller/notificaciones.php");?>
                        </div>

                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i>Mi Perfil</a>

                            <a class="nav-link" href="#"><i class="fa fa-bell-o"></i>Notificaciones <span class="count">13</span></a>

                            <a class="nav-link" href="controller/cerrarSesion.php"><i class="fa fa-power-off"></i>Cerrar Sesion</a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->
