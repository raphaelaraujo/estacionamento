<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="<?php echo base_url('/') ?>">
            <div class="logo-img">
                <img  width="50px" src="<?php echo base_url('public/img/auth/icone_logo_trat.png') ?>" class="header-brand-img" alt="lavalite"> 
            </div>
            <span class="text-sm-left pl-25">Real Leader</span>
        </a>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">                         
                <div class="nav-item <?php echo($this->router->fetch_class() == 'home' && $this->router->fetch_method() == 'index' ? 'active' : '') ?>">
                    <a data-toggle="tooltip" data-placement="bottom" title="Home" href="<?php echo base_url('/') ?>"><i class="ik ik-home"></i><span>Home</span></a>
                </div>
                <div class="nav-lavel">CADASTRO BÁSICO</div>
                <div class="nav-item <?php echo($this->router->fetch_class() == 'api_football_campeonato' && $this->router->fetch_method() == 'core_competicao' ? 'active' : '') ?>">
                    <a data-toggle="tooltip" data-placement="bottom" title="Gerar tabela de campeonatos" href="<?php echo base_url('api_football_campeonato/core_competicao') ?>"><i class="ik ik-arrow-down-circle"></i><span>Gerar tabela</span></a>
                </div>
                <div class="nav-lavel">ADMINISTRAÇÃO</div>
                <div class="nav-item <?php echo($this->router->fetch_class() == 'api_football_campeonato' && $this->router->fetch_method() == 'index' ? 'active' : '') ?>">
                    <a data-toggle="tooltip" data-placement="bottom" title="Gerenciar Campeonatos" href="<?php echo base_url('api_football_campeonato') ?>"><i class="ik ik-flag"></i><span>Campeonatos</span></a>
                </div>
                <?php if ($this->ion_auth->is_admin()) : ?>
                    <div class="nav-item <?php echo($this->router->fetch_class() == 'usuarios' && $this->router->fetch_method() == 'index' ? 'active' : '') ?>">
                        <a data-toggle="tooltip" data-placement="bottom" title="Gerenciar Usuários" href="<?php echo base_url('usuarios') ?>"><i class="ik ik-users"></i><span>Usuários</span></a>
                    </div>
                <?php endif; ?>                               
            </nav>
        </div>
    </div>
</div>