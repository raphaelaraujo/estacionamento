

<div class="auth-wrapper">
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div  class="lavalite-bg text-center" style="background-image: url(<?php echo base_url('public/img/auth/futebol.jpg') ?>)">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="text-center"><!-- logo-centered -->
                        <a href="../index.html"><img width="200px" height="35px" src="<?php echo base_url('public/src/img/logo.png') ?>" alt=""></a>
                    </div>
                    <br/>

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
                    <form method="POST" action="<?php echo base_url('login/auth') ?>">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Digite seu e-mail" required="" >
                            <i class="ik ik-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" >
                            <i class="ik ik-lock"></i>
                        </div>
                        <div class="sign-btn text-center">
                            <button class="btn btn-theme">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

