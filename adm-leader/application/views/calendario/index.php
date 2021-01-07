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

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Update Calendar Event</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open(site_url("calendar/edit_event"), array("class" => "form-horizontal")) ?>
                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">Event Name</label>
                        <div class="col-md-8 ui-front">
                            <input type="text" class="form-control" name="name" value="" id="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">Description</label>
                        <div class="col-md-8 ui-front">
                            <input type="text" class="form-control" name="description" id="description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">Start Date</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="start_date" id="start_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">End Date</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="end_date" id="end_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="p-in" class="col-md-4 label-heading">Delete Event</label>
                        <div class="col-md-8">
                            <input type="checkbox" name="delete" value="1">
                        </div>
                    </div>
                    <input type="hidden" name="eventid" id="event_id" value="0" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Update Event">
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