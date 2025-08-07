<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <?php foreach ($modules as $module) : ?>
                    <?php
                        $mod = '';
                        if ($active == $module->nama) :
                            $mod = '';

                        else :
                            $mod = strtolower($module->nama);
                        endif;

                        $menus = $this->default->getDataMenus($this->session->userdata('id_account_group'), $module->id);
                        // notifikasi
                        $notif_distribusi = $this->default->getNotificationDistribusi($this->session->userdata('id_unit'));
                        $notif_penerimaan = $this->default->getNotificationPenerimaanDistribusi($this->session->userdata('id_unit'));
                        $jumlah_notif_distribusi = ''; $jumlah_notif_penerimaan = '';
                        $sumofnotif = 0;
                        if ($notif_distribusi > 0 and $module->nama === 'Inventory') :
                            $jumlah_notif_distribusi = $notif_distribusi;
                            $sumofnotif++;
                        endif;
                        if ($notif_penerimaan > 0 and $module->nama === 'Inventory') :
                            $jumlah_notif_penerimaan = $notif_penerimaan;
                            $sumofnotif++;
                        endif;
                        // end notifikasi

                        $blinkDistribusiLogistik = $this->default->notifDistribusiLogistik($this->session->userdata('id_unit'));
                        $blinkPenerimaanDistribusi = $this->default->notifPenerimaanDistribuasi($this->session->userdata('id_unit'));
                        $jumlahDistribusiLogistik = ''; $jumlahPenerimaanDistribusi = '';
                        $jumlahNotif = 0;
                        if ($blinkDistribusiLogistik > 0 and $module->nama === 'Inventory') :
                            $jumlahDistribusiLogistik = $blinkDistribusiLogistik;
                            $jumlahNotif++;
                        endif;
                        if ($blinkPenerimaanDistribusi > 0 and $module->nama === 'Inventory') :
                            $jumlahPenerimaanDistribusi = $blinkPenerimaanDistribusi;
                            $jumlahNotif++;
                        endif;
                    ?>
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <!-- <i class="<?= $module->icon; ?>" style="font-size:18px"></i> -->
                            <img src="<?php echo base_url('resources/images/icons/') . $module->iconic ?>" class="iconic iconic-active" width="40px" height="40px" alt="">
                            <span class="badge badge-pill blinker badge-danger text-white ml-auto mb-n3"><?= (($sumofnotif > 0) ? $sumofnotif : '') ?><?php if($this->session->userdata('unit') === 'Bagian Umum'){ if($jumlahNotif > 0){ echo $jumlahNotif;}else{echo '';} } else {echo '';}?></span>
                            <span class="hide-menu ml-2 modul-nama" style="font-size:14px;font-weight:600;">
                                <?= $module->nama; ?>
                            </span>
                        </a>
                        <ul aria-expanded="false" class="collapse">
                            <?php if (count($menus) > 0) : ?>
                                <?php foreach ($menus as $menu) : ?>
                                    <?php  
                                        $notif_distribusi = '';
                                        $notif_penerimaan_distribusi = '';
                                        $distribusiLogistik = '';
                                        $penerimaanDistribusi = '';
                                        // id menu = pendistribusian ke unit
                                        if ($menu->id === '90') :
                                            $notif_distribusi = $jumlah_notif_distribusi;
                                        endif;    
                                        // id menu = penerimaan distribusi
                                        if ($menu->id === '93') :
                                            $notif_penerimaan_distribusi = $jumlah_notif_penerimaan;
                                        endif;
                                        if ($menu->nama === 'Distribusi Logistik') :
                                            $distribusiLogistik = $jumlahDistribusiLogistik;
                                        endif;
                                        if ($menu->id === 'Penerimaan Distribusi Logistik') :
                                            $penerimaanDistribusi = $jumlahPenerimaanDistribusi;
                                        endif;
                                    ?>
                                    <li class="wrapper">
                                        <a style="cursor: pointer;" class="click" onclick="loadMenu('<?= $menu->url ?>','<?= $module->nama ?>','<?= $mod ?>','<?= $menu->nama ?>'); return false;">
                                            <i class="fas fa-fw fa-angle-right mr-1"></i><?= $menu->nama; ?>
                                            <span class="badge badge-pill blinker badge-danger text-white ml-auto"><?= $notif_distribusi ?></span>
                                            <span class="badge badge-pill blinker badge-danger text-white ml-auto"><?= $notif_penerimaan_distribusi ?></span>
                                            <span class="badge badge-pill blinker badge-danger text-white ml-auto"><?= $distribusiLogistik ?></span>
                                            <span class="badge badge-pill blinker badge-danger text-white ml-auto"><?= $penerimaanDistribusi ?></span>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                            <?php endif ?>
                        </ul>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>