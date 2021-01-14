<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="<?php echo base_url('/') ?>">
            <div class="logo-img">
                <img  width="50px" src="<?php echo base_url('public/img/auth/icone_logo_trat.png') ?>" class="header-brand-img" alt="lavalite"> 
            </div>
<!--            <span class="text-md-right">ThemeKit</span>-->
        </a>
<!--        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>-->
<!--        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>-->
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <!--                <div class="nav-lavel">Navigation</div>
                                <div class="nav-item active">
                                    <a href="index.html"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="pages/navbar.html"><i class="ik ik-menu"></i><span>Navigation</span> <span class="badge badge-success">New</span></a>
                                </div>
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Widgets</span> <span class="badge badge-danger">150+</span></a>
                                    <div class="submenu-content">
                                        <a href="pages/widgets.html" class="menu-item">Basic</a>
                                        <a href="pages/widget-statistic.html" class="menu-item">Statistic</a>
                                        <a href="pages/widget-data.html" class="menu-item">Data</a>
                                        <a href="pages/widget-chart.html" class="menu-item">Chart Widget</a>
                                    </div>
                                </div>                    -->

                <div class="nav-lavel">CADASTRO BÁSICO</div>
                <div class="nav-item">
                    <a data-toggle="tooltip" data-placement="bottom" title="Gerar tabela de campeonatos" href="<?php echo base_url('api_football_campeonato/core_competicao') ?>"><i class="ik ik-arrow-down-circle"></i><span>Gerar tabela</span></a>
                </div>
                <div class="nav-lavel">ADMINISTRAÇÃO</div>
                <div class="nav-item">
                    <a data-toggle="tooltip" data-placement="bottom" title="Gerenciar Campeonatos" href="<?php echo base_url('api_football_campeonato') ?>"><i class="ik ik-flag"></i><span>Campeonatos</span></a>
                </div>
                <?php if ($this->ion_auth->is_admin()) : ?>
                    <div class="nav-item">
                        <a data-toggle="tooltip" data-placement="bottom" title="Gerenciar Usuários" href="<?php echo base_url('usuarios') ?>"><i class="ik ik-users"></i><span>Usuários</span></a>
                    </div>
                <?php endif; ?>                
                <!--                <div class="nav-item">
                                    <a href="<?php echo base_url('api_football_time') ?>"><i class="ik ik-shield"></i><span>Gerenciar Times</span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="<?php echo base_url('api_football_campeonato') ?>"><i class="ik ik-aperture"></i><span>Gerenciar Jogos</span></a>
                                </div>-->                
            </nav>
        </div>
    </div>
</div>