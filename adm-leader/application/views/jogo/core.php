<?php $this->load->view('layout/navbar'); ?>

<div class="page-wrap">

    <?php $this->load->view('layout/sidebar'); ?>

    <div class="main-content">
        <div class="container-fluid">            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">                       
                        <div class="card-body">
                            <form class="forms-sample" name="form_core">
                                <?php foreach ($infomacao as $info): ?>

                                    <div class="row">
                                        <div class="col-md-auto">
                                            <div class="card task-board">                                               
                                                <div class="card-body todo-task">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-sm">
                                                                <img src="<?php echo $info->logo_home_team ?>" width="100" height="100">                                                                
                                                            </div>
                                                            <div class="col-sm">  
                                                                <h4><?php echo $info->goals_home_team ?></h4>
                                                            </div>       
                                                            <div class="col-sm"> 
                                                                <h2>X</h2>
                                                            </div>
                                                            <div class="col-sm">    
                                                                <h4><?php echo $info->goals_away_team ?></h4>   
                                                            </div>
                                                            <div class="col-sm">
                                                                <img src="<?php echo $info->logo_away_team ?>" width="100" height="100">                                                                
                                                            </div>
                                                        </div>
                                                    </div>                                    
                                                </div>
                                            </div>
                                        </div>                                               
                                    </div>
                                <?php endforeach; ?>

                                <div class="row">
                                    <div class="col-md-auto">
                                        <div class="card task-board">
                                            <div class="card-header">
                                                <h2>Escalações</h2>                                                
                                            </div>
                                            <div class="card-body todo-task">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <h3><?php echo $name_home ?> </h3>                                                    
                                                            <?php echo 'Técnico: ' . $coach_home ?>
                                                            <br/>
                                                            <?php echo 'Formação: ' . $formation_home ?> 
                                                            <br/>                                                    
                                                            <br/>
                                                            <h6><b>Jogadores</b></h6> 
                                                            <?php foreach ($home_start as $hs) : ?>
                                                                <?php echo ($hs['player'] . ' - ' . $hs['number'] . '<br/>') ?>    
                                                            <?php endforeach; ?>
                                                            <br/>
                                                            <h6><b>Substitutos</b></h6>
                                                            <?php foreach ($home_subst as $hs) : ?>
                                                                <?php echo ($hs['player'] . ' - ' . $hs['number'] . '<br/>') ?>    
                                                            <?php endforeach; ?>
                                                        </div>                                                        
                                                        <div class="col-sm">
                                                            <h3><?php echo $name_away ?> </h3>                                                    
                                                            <?php echo 'Técnico: ' . $coach_away ?>
                                                            <br/>
                                                            <?php echo 'Formação: ' . $formation_away ?> 
                                                            <br/>                                                    
                                                            <br/>
                                                            <h6><b>Jogadores</b></h6> 
                                                            <?php foreach ($away_start as $as) : ?>
                                                                <?php echo ($as['player'] . ' - ' . $as['number'] . '<br/>') ?>    
                                                            <?php endforeach; ?>
                                                            <br/>
                                                            <h6><b>Substitutos</b></h6>
                                                            <?php foreach ($away_subst as $as) : ?>
                                                                <?php echo ($as['player'] . ' - ' . $as['number'] . '<br/>') ?>    
                                                            <?php endforeach; ?>
                                                        </div>                                                        
                                                    </div>
                                                </div>                                               
                                            </div>
                                        </div>
                                    </div>        
                                    <div class="col-md-8">
                                        <div class="card task-board">
                                            <div class="card-header">
                                                <h3>Estatisticas</h3>                                                
                                            </div>
                                            <div class="card-body todo-task">
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>


                                <a class="btn btn-info" href="<?php echo base_url($this->router->fetch_class() . '/index_jogo/' . $info->match_league_id . '/' . $info->league_id); ?>">Voltar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="w-100 clearfix">
            <span class="text-center text-sm-left d-md-inline-block">Copyright © <?php echo date('Y') ?> ThemeKit v2.0. Todos os direitos reservados.</span>
            <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Criado com <i class="fa fa-file-code text-danger"></i> por <a href="https://softbean.com.br" class="text-dark" target="_blank">Softbean</a></span>
        </div>
    </footer>

</div>