<?php $this->load->view('auth/_partials/head'); ?>

<body class="skin-default card-no-border">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label"><?php echo $hospital->nama ?></p>
        </div>
    </div>
    <!-- Main wrapper - style you can find in pages.scss -->
    <section id="wrapper" class="login-register login-sidebar bounceIn animated" style="background-image:url(resources/images/backgrounds/banner-simrs-v6.png);background-size:cover;background-position:center;">
    <!-- <section id="wrapper" class="login-register login-sidebar bounceIn animated" style="background-image:url(resources/images/backgrounds/banner-simrs-v5.gif);background-size:cover;background-position:center;"> -->
        <!-- <div class="login-box card shadow" style="background-image: url('<?= resource_url() . 'images/backgrounds/pattern-v2.png' ?>');"> -->
        <div class="login-box card shadow" style="background-color: rgba(245,245,247,.62);backdrop-filter: saturate(180%) blur(20px);">
            <div class="card-body">
                <div class="text-center">
                    <a href="javascript:void(0)" class="db">
                        <img src="<?= resource_url() ?>/images/logos/logo-rsud.png" class="mt-4" alt="Logo RSUD" width="150" /><br />
                    </a>
                    <div class="client">IP Client : <?php echo $this->input->ip_address() ?></div>
                    <h5>SIMRS <?php echo $hospital->nama ?></h5>
                    <hr>
                    <h5 style="font-weight:500;">Silahkan Login</h5>
                </div>

                <?= form_open('', 'class=form-horizontal id=loginform');  ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group-mixing m-t-20">
                            <div class="input-group-mixing-prepend"><i class="fas fa-user"></i></div>
                            <input type="text" name="account" id="account" class="form-control" placeholder="Username" required="required">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group-mixing m-t-15">
                            <div class="input-group-mixing-prepend"><i class="fas fa-eye toggle-password" toggle="#key"></i></div>
                            <input type="password" name="key" id="key" class="form-control toggle" placeholder="Password" required="required">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group-mixing m-t-15">
                            <div class="input-group-mixing-prepend"><i class="fas fa-home"></i></div>
                            <?php echo form_dropdown('shift', $shift, $shift_now, 'id="shift" class="form-control"') ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group text-center m-t-40">
                            <button class="btn btn-info btn-lg btn-block btn-rounded" onclick="checkShift(); return false;"><i class="fas fa-fw fa-sign-in-alt mr-1"></i>Masuk</button>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <em>SIMRS</em><br>© 2019 - <?= date('Y') ?></p>
                    <img src="<?php echo resource_url() ?>/images/logos/logo-se-kominfo.png" alt="Logo Terdaftar Sistem Elektronik Nomor: 1656" width="150">
                    <p></p><img src="<?php echo resource_url() ?>images/logos/logo-bsre.png" alt="Logo Balai Besar Sertifikat Elektronik" width="150" style="border-radius: 5%;">
                </div>
                <?= form_close() ?>
            </div>
        </div>
        <canvas id="canvas"></canvas>
    </section>
    <!-- End Wrapper -->

    <?php $this->load->view('auth/js') ?>
</body>

</html>