<?php $this->load->view('layout/navbar'); ?>

<div class="page-wrap">

    <?php $this->load->view('layout/sidebar'); ?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="<?php echo $icone_view ?> bg-blue"></i>
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
                                    <a data-toggle="tooltip" data-placement="bottom" title="Home" href="<?php echo base_url('/') ?>"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Listar <?php $this->router->fetch_class()?>" href="<?php echo base_url($this->router->fetch_class()) ?>">Listar <?php echo $this->router->fetch_class() ?></i></a>
                                </li>
                                <li data-toggle="tooltip" data-placement="bottom" class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><?php echo isset($usuario) ? $usuario->data_ultima_alteracao : '' ?></div>
                        <div class="card-body">
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Nome do usuário</font>
                                        </font>
                                    </label>
                                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nome do usuário">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Endereço de e-mail</font>
                                        </font>
                                    </label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="O email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Senha</font>
                                        </font>
                                    </label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputConfirmPassword1">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Confirme a Senha</font>
                                        </font>
                                    </label>
                                    <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Senha">
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input">
                                        <span class="custom-control-label">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">&nbsp;Lembre de mim</font>
                                            </font>
                                        </span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Enviar</font>
                                    </font>
                                </button>
                                <button class="btn btn-light">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Cancelar</font>
                                    </font>
                                </button>
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
            <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Criado com <i class="fa fa-heart text-danger"></i> por <a href="https://softbean.com.br" class="text-dark" target="_blank">Softbean</a></span>
        </div>
    </footer>

</div>