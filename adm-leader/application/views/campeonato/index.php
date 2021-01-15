<?php $this->load->view('layout/navbar'); ?>

<div class="page-wrap">

    <?php $this->load->view('layout/sidebar'); ?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-flag bg-blue"></i>
                            <div class="d-inline">
                                <h5><?php echo $titulo ?></h5>
                                <span><?php echo $subtitulo ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a title="Home" href="<?php echo base_url('/') ?>"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <?php if ($message = $this->session->flashdata('sucesso')): ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong> &nbsp <?php echo $message ?></strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ik ik-x"></i>
                            </button>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ($message = $this->session->flashdata('error')): ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert bg-danger alert-danger text-white alert-dismissible fade show" role="alert">
                            <strong> &nbsp <?php echo $message ?></strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ik ik-x"></i>
                            </button>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">                     
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table data-table table-sm pl-20 pr-20">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Tipo</th>
                                            <th>País</th>
                                            <th>Temporada atual</th>
                                            <th>Inicio</th>
                                            <th>Fim</th>
                                            <th class="nosort text-right pr-25">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($campeonatos as $campeonato): ?>
                                            <tr>
                                                <td><?php echo $campeonato->league_id ?></td>
                                                <td><?php echo $campeonato->name ?></td>
                                                <td><?php echo $campeonato->type ?></td>
                                                <td><?php echo $campeonato->country ?></td>
                                                <td><?php echo $campeonato->season ?></td>   
                                                <td><?php echo formata_data_banco_sem_hora($campeonato->season_start) ?></td>   
                                                <td><?php echo formata_data_banco_sem_hora($campeonato->season_end) ?></td>   
                                                <td class="text-right">

                                                    <?php if (!$this->core_model->get_by_id('jogo_football', array('match_league_id ' => $campeonato->league_id))) : ?>
                                                        <a href="<?php echo base_url($this->router->fetch_class() . '/core_geral/' . $campeonato->league_id); ?>" data-toggle="tooltip" data-placement="bottom" title="Executar cadastros" class="btn btn-icon btn-success text-white">
                                                            <i class="ik ik-download"></i>
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if ($this->core_model->get_by_id('time_league_football', array('team_league_id ' => $campeonato->league_id))) : ?>
                                                        <a href="<?php echo base_url($this->router->fetch_class() . '/index_time/' . $campeonato->league_id . '/' . $campeonato->name); ?>" data-toggle="tooltip" data-placement="bottom" title="Gerenciar times" class="btn btn-icon btn-success text-white">
                                                            <i class="ik ik-shield"></i>
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if ($this->core_model->get_by_id('jogo_football', array('match_league_id ' => $campeonato->league_id))) : ?>
                                                        <a href="<?php echo base_url($this->router->fetch_class() . '/index_jogo/' . $campeonato->league_id . '/' . $campeonato->name); ?>" data-toggle="tooltip" data-placement="bottom" title="Gerenciar jogos" class="btn btn-icon btn-success text-white">
                                                            <i class="ik ik-aperture"></i>
                                                        </a>
                                                    <?php endif; ?>


                                                    <a data-toggle="tooltip" data-placement="bottom" title="Informações complementares" class="btn btn-icon btn-primary text-white">
                                                        <i class="ik ik-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                        <div class="modal fade" id="user-<?php echo $campeonato->league_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterLabel">
                                                            <i class="fas fa-exclamation-triangle text-danger"></i>
                                                            &nbsp Tem certeza da exclusão do registro?
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Se deseja excluir o registro, clique em <strong>Sim, excluir</strong>.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-toggle="tooltip" data-placement="bottom" title="Cancelar exclusão" type="button" class="btn btn-secondary" data-dismiss="modal">Não, voltar</button>
                                                        <a data-toggle="tooltip" data-placement="bottom" title="Excluir <?php echo $this->router->fetch_class(); ?>" href="<?php echo base_url($this->router->fetch_class() . '/del/' . $user->id); ?>" class="btn btn-danger">
                                                            Sim, excluir
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <footer class="footer">
        <div class="w-100 clearfix">
            <span class="text-center text-sm-left d-md-inline-block">Copyright © <?php echo date('Y') ?> ThemeKit v2.0. Todos os direitos reservados.</span>
            <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Customizado por <i class="fa fa-code"></i><a href="https://softbean.com.br" class="text-dark" target="_blank"> Softbean</a></span>
        </div>
    </footer>

</div>

