<?php $this->load->view('layout/navbar'); ?>

<div class="page-wrap">

    <?php $this->load->view('layout/sidebar'); ?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-users bg-blue"></i>
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

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="calendar">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Adicionar Evento</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open(site_url("calendar/add_event"), array("class" => "form-horizontal")) ?>
                            <div class="form-group">
                                <label for="p-in" class="col-md-4 label-heading">Nome do Evento</label>
                                <div class="col-md-8 ui-front">
                                    <input id="name_event" type="text" class="form-control" name="name" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="p-in" class="col-md-4 label-heading">Descrição</label>
                                <div class="col-md-8 ui-front">
                                    <input type="text" class="form-control" name="description">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="p-in" class="col-md-4 label-heading">Início do evento</label>
                                <div class="col-md-8">
                                    <input id="start_dt" type="text" class="form-control" name="start_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="p-in" class="col-md-4 label-heading">Fim do evento</label>
                                <div class="col-md-8">
                                    <input id="end_dt" type="text" class="form-control" name="end_date">
                                </div>
                            </div>
                            <div class="form-group mb-0" id="addColor">
                                                <label for="colors">Escolha a cor</label>
                                                <ul class="color-selector">
                                                    <li class="bg-aqua">
                                                        <input type="radio" data-color="bg-aqua" checked name="color" id="addColorAqua" value="#3ec5d6">
                                                        <label for="addColorAqua"></label>
                                                    </li>
                                                    <li class="bg-blue">
                                                        <input type="radio" data-color="bg-blue" name="color" id="addColorBlue" value="#19b5fe">
                                                        <label for="addColorBlue"></label>
                                                    </li>
                                                    <li class="bg-light-blue">
                                                        <input type="radio" data-color="bg-light-blue" name="color" id="addColorLightblue" value="#89cff0">
                                                        <label for="addColorLightblue"></label>
                                                    </li>
                                                    <li class="bg-teal">
                                                        <input type="radio" data-color="bg-teal" name="color" id="addColorTeal" value="#008081">
                                                        <label for="addColorTeal"></label>
                                                    </li>
                                                    <li class="bg-yellow">
                                                        <input type="radio" data-color="bg-yellow" name="color" id="addColorYellow" value="#f7ca18">
                                                        <label for="addColorYellow"></label>
                                                    </li>
                                                    <li class="bg-orange">
                                                        <input type="radio" data-color="bg-orange" name="color" id="addColorOrange" value="#ff8000">
                                                        <label for="addColorOrange"></label>
                                                    </li>
                                                    <li class="bg-green">
                                                        <input type="radio" data-color="bg-green" name="color" id="addColorGreen" value="#26c281">
                                                        <label for="addColorGreen"></label>
                                                    </li>
                                                    <li class="bg-lime">
                                                        <input type="radio" data-color="bg-lime" name="color" id="addColorLime" value="#cad900">
                                                        <label for="addColorLime"></label>
                                                    </li>
                                                    <li class="bg-red">
                                                        <input type="radio" data-color="bg-red" name="color" id="addColorRed" value="#f22613">
                                                        <label for="addColorRed"></label>
                                                    </li>
                                                    <li class="bg-purple">
                                                        <input type="radio" data-color="bg-purple" name="color" id="addColorPurple" value="#bf55ec">
                                                        <label for="addColorPurple"></label>
                                                    </li>
                                                    <li class="bg-fuchsia">
                                                        <input type="radio" data-color="bg-fuchsia" name="color" id="addColorFuchsia" value="#df2de3">
                                                        <label for="addColorFuchsia"></label>
                                                    </li>
                                                    <li class="bg-muted">
                                                        <input type="radio" data-color="bg-muted" name="color" id="addColorMuted" value="#6c757d">
                                                        <label for="addColorMuted"></label>
                                                    </li>
                                                    <li class="bg-navy">
                                                        <input type="radio" data-color="bg-navy" name="color" id="addColorNavy" value="#000080">
                                                        <label for="addColorNavy"></label>
                                                    </li>
                                                </ul>
                                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <input type="submit" class="btn btn-primary" value="Cadastrar">
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Atualizar evento</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open(site_url("calendar/edit_event"), array("class" => "form-horizontal")) ?>
                            <div class="form-group">
                                <label for="p-in" class="col-md-4 label-heading">Nome do evento</label>
                                <div class="col-md-8 ui-front">
                                    <input type="text" class="form-control" name="name" value="" id="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="p-in" class="col-md-4 label-heading">Descrição</label>
                                <div class="col-md-8 ui-front">
                                    <input type="text" class="form-control" name="description" id="description">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="p-in" class="col-md-4 label-heading">Início do Evento</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="start_date" id="start_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="p-in" class="col-md-4 label-heading">Fim do evento</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="end_date" id="end_date">
                                </div>
                            </div>
                            <div class="form-group mb-0" id="addColor">
                                                <label for="colors">Escolha a cor</label>
                                                <ul class="color-selector">
                                                    <li class="bg-aqua">
                                                        <input type="radio" data-color="bg-aqua" checked name="color" id="addColorAqua" value="#3ec5d6">
                                                        <label for="addColorAqua"></label>
                                                    </li>
                                                    <li class="bg-blue">
                                                        <input type="radio" data-color="bg-blue" name="color" id="addColorBlue" value="#19b5fe">
                                                        <label for="addColorBlue"></label>
                                                    </li>
                                                    <li class="bg-light-blue">
                                                        <input type="radio" data-color="bg-light-blue" name="color" id="addColorLightblue" value="#89cff0">
                                                        <label for="addColorLightblue"></label>
                                                    </li>
                                                    <li class="bg-teal">
                                                        <input type="radio" data-color="bg-teal" name="color" id="addColorTeal" value="#008081">
                                                        <label for="addColorTeal"></label>
                                                    </li>
                                                    <li class="bg-yellow">
                                                        <input type="radio" data-color="bg-yellow" name="color" id="addColorYellow" value="#f7ca18">
                                                        <label for="addColorYellow"></label>
                                                    </li>
                                                    <li class="bg-orange">
                                                        <input type="radio" data-color="bg-orange" name="color" id="addColorOrange" value="#ff8000">
                                                        <label for="addColorOrange"></label>
                                                    </li>
                                                    <li class="bg-green">
                                                        <input type="radio" data-color="bg-green" name="color" id="addColorGreen" value="#26c281">
                                                        <label for="addColorGreen"></label>
                                                    </li>
                                                    <li class="bg-lime">
                                                        <input type="radio" data-color="bg-lime" name="color" id="addColorLime" value="#cad900">
                                                        <label for="addColorLime"></label>
                                                    </li>
                                                    <li class="bg-red">
                                                        <input type="radio" data-color="bg-red" name="color" id="addColorRed" value="#f22613">
                                                        <label for="addColorRed"></label>
                                                    </li>
                                                    <li class="bg-purple">
                                                        <input type="radio" data-color="bg-purple" name="color" id="addColorPurple" value="#bf55ec">
                                                        <label for="addColorPurple"></label>
                                                    </li>
                                                    <li class="bg-fuchsia">
                                                        <input type="radio" data-color="bg-fuchsia" name="color" id="addColorFuchsia" value="#df2de3">
                                                        <label for="addColorFuchsia"></label>
                                                    </li>
                                                    <li class="bg-muted">
                                                        <input type="radio" data-color="bg-muted" name="color" id="addColorMuted" value="#6c757d">
                                                        <label for="addColorMuted"></label>
                                                    </li>
                                                    <li class="bg-navy">
                                                        <input type="radio" data-color="bg-navy" name="color" id="addColorNavy" value="#000080">
                                                        <label for="addColorNavy"></label>
                                                    </li>
                                                </ul>
                                            </div>
                            
                            <!--
                            <div class="form-group">
                                <label class="col-md-4 label-heading">Cor</label>
                                <div class="col-md-8">
                                    <select name="color" class="form-control" id="color">
                                        <option value="">Selecione</option>
                                        <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                        <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                        <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                        <option style="color:#8B4513;" value="#8B4513">Marrom</option>
                                        <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                        <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                        <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                        <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                        <option style="color:#228B22;" value="#228B22">Verde</option>
                                        <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                                    </select>
                                </div>
                            </div>
                        -->
                        
                            <div class="form-group">
                                <label for="p-in" class="col-md-4 label-heading">Excluir evento</label>
                                <div class="col-md-8">
                                    <input type="checkbox" name="delete" value="1">
                                </div>
                            </div>
                            <input type="hidden" name="eventid" id="event_id" value="0" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <input type="submit" class="btn btn-primary" value="Atualizar">
                            <?php echo form_close() ?>
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