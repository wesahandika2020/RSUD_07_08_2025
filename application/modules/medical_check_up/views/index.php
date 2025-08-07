<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">
                        <h6><i class="fas fa-hospital-alt m-t-10 m-r-10"></i>Data List Medical Check up</h6>
                    </div>
                    <div class="col-9 d-flex justify-content-end">
                        <button type="button" class="btn btn-success waves-effect m-r-5" onclick="inportCSVHasilMCU()"><i class="fas fa-download mr-1"></i> Import CSV Hasil MCU</button>
                        <?= form_button('search', '<i class="fas fa-search"></i> Pencarian Data', 'id=btn-search-data class="btn btn-info waves-effect"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=btn-reload-data class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">

                    </div>
                    <div id="filter_select" class="col">
                        <h6 class="d-flex justify-content-end">
                            <span class="m-t-5 m-r-5">Filter Layanan :</span>
                            <?= form_dropdown('layanan', $layanan, array(), 'class="custom-form" style="width:50%" id=layanan') ?>
                        </h6>
                    </div>
                </div>
                <!-- <div class="table-responsive"> -->
                <table id="table_data" class="table table-hover table-striped table-sm color-table info-table">
                    <thead>
                        <tr>
                            <th class="wrapper center">No</th>
                            <th class="wrapper center">No Register</th>
                            <th class="wrapper">No RM</th>
                            <th class="wrapper">Tgl Masuk</th>
                            <th class="wrapper" width="18%">Nama</th>
                            <th class="wrapper">Klinik</th>
                            <th class="wrapper">Dokter</th>
                            <th class="wrapper">Cara Bayar</th>
                            <th width="13%" class="center wrapper">Status</th>
                            <th width="5%" class="center wrapper">Resep</th>
                            <th width="10%" class="center wrapper">Status Keluar</th>
                            <th width="14%" class="nowrap"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <!-- </div> -->
                <div class="row">
                    <div class="col">
                        <div id="pagination" class="float-left"></div>
                        <div id="summary" class="float-right text-sm"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js') ?>
<?php $this->load->view('modal_search') ?>
<?php $this->load->view('modal_pemeriksaan') ?>
<?php $this->load->view('modul_sk_dinkes'); ?>
<?php $this->load->view('pelayanan/konsul_form/modal_konsul') ?>
<?php $this->load->view('pelayanan/laboratorium_form/modal-laboratorium-form'); ?>
<?php $this->load->view('pelayanan/radiologi_form/modal-radiologi-form'); ?>
<?php $this->load->view('pelayanan/perlakuan_khusus_form/modal_perlakuan_khusus') ?>
<?php $this->load->view('pelayanan/tindak_lanjut_form/modal_tindak_lanjut') ?>
<?php $this->load->view('pelayanan/tindakan_form/js') ?>
<?php $this->load->view('pelayanan/diagnosa_form/js') ?>
<?php $this->load->view('pasien/riwayat/modal_riwayat') ?>
<?php $this->load->view('pasien/rekam_medis/modal_rekam_medis') ?>
<?php $this->load->view('modal_cetak_mcu') ?>
<?php $this->load->view('modal_skpk'); ?>
<?php $this->load->view('modal_sks') ?>
<?php $this->load->view('modal_surat_narkoba') ?>
<?php $this->load->view('modal_resume_medis') ?>
<!-- // SKKJ1 -->
<?php $this->load->view('modal_skkj_1') ?>
<!-- // SKKJ2 -->
<?php $this->load->view('modal_skkj_2') ?>
<!-- // SKKJ3 -->
<?php $this->load->view('modal_skkj_3') ?>
<?php $this->load->view('pelayanan/resep_form/modal') ?>
<?php $this->load->view('pelayanan/resep_form/js') ?>

<!-- SKB -->
<?php $this->load->view('modal_kelaikan_bekerja') ?>
<!-- lpk -->
<?php $this->load->view('modal_lpk') ?>
<!-- // SKM -->
<?php $this->load->view('modal_skm') ?>
<!-- // SKD -->
<?php $this->load->view('modal_skd') ?>
<!-- // SKTD -->
<?php $this->load->view('modal_sktd') ?>
<!-- // HPDO -->
<?php $this->load->view('modal_hpdo') ?>

<!-- Upload File  -->
<?php $this->load->view('cloud_rsud/modal_upload_file_rm') ?>
<?php $this->load->view('cloud_rsud/js') ?>

<?php $this->load->view('modal_hasil_pemeriksaan_mcu') ?>
<?php $this->load->view('upload_csv/modal_import_csv_mcu') ?>