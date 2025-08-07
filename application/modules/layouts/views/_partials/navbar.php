<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="javascript:0" onclick="backToHome()">
                <!-- Logo icon -->
                <b>
                    <!-- Light Logo icon -->
                    <img src="<?= resource_url() ?>images/logos/<?php echo $hospital->logo ?>" width="50" alt="<?php echo $hospital->nama ?>" class="light-logo" />
                </b>
                <!--End Logo icon -->
                <span class="hidden-xs"><span class="font-bold">&nbsp;SIM</span>RS <?= date('Y'); ?></span>
            </a>
        </div>
        <!-- End Logo -->
        <div class="navbar-collapse">
            <!-- toggle and nav items -->
            <ul class="navbar-nav mr-auto">
                <!-- This is  -->
                <li class="nav-item">
                    <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)">
                        <i class="ti-menu"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)">
                        <i class="icon-menu"></i>
                    </a>
                </li>
                <!-- <div class="brand-text"><?= $hospital->nama; ?></div> -->
                <div id="jam"></div>
                <div style="line-height: 65px; padding-left: 1rem;"><img src="<?php echo resource_url() ?>/images/logos/logo-se-kominfo.png" alt="Logo Terdaftar Sistem Elektronik Nomor: 1656" width="125"></div>
                <div style="line-height: 65px; padding-left: 1rem;"><img src="<?php echo resource_url() ?>images/logos/logo-bsre.png" alt="Logo Balai Besar Sertifikat Elektronik" width="100" style="border-radius: 5%;"></div>
                <input type="hidden" name="nomer_page" id="page-call-navbar">
                <input type="hidden" name="loket_filter" id="loket-filter">
                <div id="audio"></div>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <!-- User Profile -->
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php if ($this->avatar !== NULL && $this->avatar !== '') : ?>
                            <img src="<?= resource_url() ?>images/avatars/<?= $this->avatar ?>" alt="Avatar">
                        <?php else : ?>
                            <img src="<?= resource_url() ?>images/avatars/ava.png" alt="Avatar">
                        <?php endif ?>
                        <span class="hidden-md-down ml-1">HI, <?= $this->session->userdata('nama'); ?> &nbsp;<i class="fa fa-angle-down"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <a>
                            <?php if ($this->avatar !== NULL && $this->avatar !== '') : ?>
                                <img src="<?= resource_url() ?>images/avatars/<?= $this->avatar ?>" alt="Avatar" class="mx-auto d-block img-thumbnail" width="150" height="150" style="border-radius:50%;">
                            <?php else : ?>
                                <img src="<?= resource_url() ?>images/avatars/ava.png" alt="Avatar" class="mx-auto d-block img-thumbnail" width="150" height="150" style="border-radius:50%;">
                            <?php endif ?>
                            <div class="center mt-3 pr-3 pl-3 bold"><?= $this->session->userdata('nama'); ?></div>
                            <div class="center mt-1 pr-3 pl-3 text-muted" style="font-size:12px;"><?= $this->session->userdata('account_group') ?> | Shift <?= $this->session->userdata('shift'); ?></div>
                            <?php if ($this->session->userdata('unit')) : ?>
                            <div class="center pr-3 pl-3 text-muted" style="font-size:12px;">Unit <?= $this->session->userdata('unit') ?></div>
                            <?php endif; ?>
                            <div class="center btn_unit pr-3 pl-3 mt-1 nowrap" style="display:none">
                                <button type="button" onclick="setUnit(295, 'Rawat Jalan')" class="btn btn-xs btn-info">Rawat Jalan</button>
                                <button type="button" onclick="setUnit(303, 'Rawat Inap')" class="btn btn-xs btn-info">Rawat Inap</button>
                                <button type="button" onclick="setUnit(304, 'IGD')" class="btn btn-xs btn-info">IGD</button>
                                <button type="button" onclick="setUnit(305, 'OK Central')" class="btn btn-xs btn-info">OK Central</button>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" onclick="loadMenu('profile/page_profile', 'Profile', 'My Profile', 'My Profile'); return false;" class="dropdown-item">
                            <i class="fas fa-fw fa-user"></i> My Profile
                        </a>
                        <a href="javascript:void(0)" onclick="loadMenu('auth/ganti_password', 'Auth', 'Auth', 'Ganti Password'); return false;" class="dropdown-item">
                            <i class="fas fa-fw fa-exchange-alt"></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a onclick="logout();" class="dropdown-item" style="cursor: pointer;">
                            <i class="fa fa-fw fa-power-off"></i> Logout
                        </a>
                    </div>
                </li>
                <!-- End User Profile -->
            </ul>
        </div>
    </nav>
</header>