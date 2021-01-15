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


                                    <div class="form-group row ">
                                        <img src="<?php echo $info->logo_home_team ?>" alt="Girl in a jacket" width="100" height="100">
                                        &nbsp;
                                        <h4><?php echo $info->goals_home_team ?></h4>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <h4>X</h4>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <h4><?php echo $info->goals_away_team ?></h4>
                                        &nbsp;
                                        <img src="<?php echo $info->logo_away_team ?>" alt="Girl in a jacket" width="100" height="100">
                                    </div>



                                <?php endforeach; ?>
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