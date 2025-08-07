<!-- Modal Kunjungan Pasien -->
<div id="modal-kunjungan" class="modal fade" role="dialog" aria-labelledby="modal-kunjungan-label" aria-hidden="true">
    <div class="modal-dialog" style="min-width: 98%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-kunjungan-label">Riwayat Kunjungan Pasien | <span id="judul-kunjungan"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-10" role="main" id="navigation-scroll">
                        <input type="hidden" id="id-pendaftaran-rm">
                        <input type="hidden" id="id-layanan-rhm">
                        <ul class="nav nav-pills justify-content-end" id="tabKunjungan">
                            <li class="nav-item" id="pasien-tab">
                                <!-- <a href="#tab-pasien" class="nav-link active" data-toggle="tab">Data Pasien</a> -->
                            </li>
                            <li class="nav-item" id="kunjungan-tab">
                                <a href="#tab-detail-kunjungan" class="nav-link" data-toggle="tab">Data Riwayat</a>
                            </li>
                        </ul>
                        <hr>
                        <div class="tab-content">
                            <div id="tab-pasien" class="tab-pane active">
                                <div class="row">
                                    
                                </div>
                            </div>
                            <div id="tab-detail-kunjungan" class="tab-pane">
                                <div id="kunjungan-area"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="bs-docs-sidebar hidden-print" role="complementary">
                            <span class="title_nav_side">Program Terapi</span>
                            <div id="kunjungan-scroll">
                                <ul class="nav bs-docs-sidenav" id="list-kjgt">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-2"></i>Close</button>
                <div id="cetak-rehab"> </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Kunjungan Pasien -->



<?php $this->load->view('pemeriksaan_poli/kunjungan/js'); ?>