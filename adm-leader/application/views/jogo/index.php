<?php $this->load->view('layout/navbar'); ?>

<div class="page-wrap">

    <?php $this->load->view('layout/sidebar'); ?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-aperture bg-blue"></i>
                            <div class="d-inline">
                                <h5><?php echo $titulo ?></h5>                                
                                <span><?php echo $subtitulo . '<b>' . $nome_campeonato . '</b>' ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a title="Home" href="<?php echo base_url('/') ?>"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a data-toggle="tooltip" data-placement="bottom" title="<?php $this->router->fetch_class() ?>" href="<?php echo base_url($this->router->fetch_class()) ?>">Campeonatos Cadastrados</a>
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
                                            <th>Rodada</th>
                                            <th>Local</th> 
                                            <th>Data/hora</th>   
                                            <th>Mandante</th>
                                            <th>Visitante</th>                                                                                                
                                            <th>Situação</th>
                                            <th>Final (tempo regular)</th>    
                                            <th class="nosort text-right pr-25">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($jogos as $jogo): ?>
                                            <tr>
                                                <td><?php echo $jogo->match_id ?></td>
                                                <td><?php echo substr($jogo->round, 17) ?></td>
                                                <td><?php echo $jogo->venue ?></td>
                                                <td><?php echo date_format(date_create($jogo->event_date), 'd/m/Y H:i') ?></td>
                                                <td><?php echo $jogo->home_team_name ?></td>
                                                <td><?php echo $jogo->away_team_name ?></td>                                                                                                
                                                <td><?php echo $jogo->status ?></td>
                                                <td style="text-align: center"><b><?php echo $jogo->full_time ?></b></td>                                                
                                                <td class="text-right">                                             
                                                    <!--<?php if ($jogo->status_code == 'FT' || $jogo->status_code == 'AET' || $jogo->status_code == 'PEN'): ?>-->
                                                        <a data-toggle="tooltip" data-placement="bottom" title="Detalhes do jogo" href="<?php echo base_url($this->router->fetch_class() . '/info_jogo/' . $jogo->match_id); ?>" class="btn btn-icon btn-info">
                                                            <i class="ik ik-book-open"></i>                                                            
                                                        </a>
                                                        <!--<?php endif; ?>-->
                                                </td>

                                            </tr>                                           
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

