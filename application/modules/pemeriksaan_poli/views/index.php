<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">
                        <h6><i class="fas fa-hospital-alt m-t-10 m-r-10"></i>Data List Pemeriksaan Poliklinik</h6>
                    </div>
                    <div class="col-9 d-flex justify-content-end">
                        <?= form_button('search', '<i class="fas fa-search"></i> Pencarian Data', 'id=btn-search-data class="btn btn-info waves-effect"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=btn-reload-data class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-7 row">
						<h4><span class="label label-info ml-3 mr-1" style="padding: 5px 10px 5px 10px;"><b id="kuota-poli"></b></span></h4>
                        <h4><span class="label label-success mr-1"   style="padding: 5px 10px 5px 10px;"><b id="jmlkunjungan-poli"></b></span></h4>
                        <h4><span class="label label-warning mr-1"   style="padding: 5px 10px 5px 10px;"><b id="checkin-poli"></b></span></h4>
                        <h4><span class="label label-primary mr-1"   style="padding: 5px 10px 5px 10px;"><b id="booking-poli"></b></span></h4>
                        <h4><span class="label label-purple mr-1"   style="padding: 5px 10px 5px 10px;"><b id="dokter-poli"></b></span></h4>
                    </div>
                    <div class="col-2">
                        <h6 class="d-flex justify-content-end">
                            <span class="m-t-5 m-r-5">Filter Shift Klinik:</span>
                            <?= form_dropdown('shifpoli', $shifpoli, array(), 'class="custom-form" style="width:50%" id=shifpoli') ?>
                        </h6>
                    </div>
                    <div id="filter_select" class="col-3">
                        <h6 class="d-flex justify-content-start">
                            <span class="m-t-5 m-r-5">Filter Layanan:</span>
                            <?= form_dropdown('layanan', $layanan, array(), 'class="custom-form" style="width:50%" id=layanan') ?>
                        </h6>
                    </div>
                </div>
                <!-- <div class="table-responsive"> -->
                <table id="table_data" class="table table-hover table-striped table-sm color-table info-table">
                    <thead>
                        <tr>
                            <th width="3%" class="wrapper center">No</th>
                            <th width="5%" class="wrapper center">No Register</th>
                            <th width="5%" class="wrapper center">No RM</th>
                            <th width="5%" class="wrapper center">Tgl Masuk</th>
                            <th width="5%" class="wrapper center">Tgl Layanan</th>
                            <th width="13%">Nama</th>
                            <th width="6%" class="wrapper">Klinik</th>
                            <th width="5%" class="center wrapper">No. Antrian</th>
                            <th width="11%" class="wrapper">Dokter</th>
                            <th width="7%" class="wrapper">Cara Bayar</th>
                            <th width="7%" class="center wrapper">Status</th>
                            <th width="3%" class="center wrapper">Resep</th>
                            <th width="3%" class="center wrapper">SKK</th>
                            <th width="3%" class="center wrapper">Lab</th>
                            <th width="3%" class="center wrapper">Rad</th>
                            <th width="8%" class="center wrapper">Status Keluar</th>
                            <th width="8%" class="nowrap"></th>
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
<?php $this->load->view('modal_terapi') ?>
<?php $this->load->view('modal_cetak_form_rekam_medis') ?>
<?php $this->load->view('rekam_medis/modal_surat_keterangan_kematian'); ?>
<!-- // SPR -->
<?php $this->load->view('rekam_medis/modal_surat_pengantar_rawat'); ?>
<!-- SSCRJ -->
<?php $this->load->view('rekam_medis/modal_surgical_safety_ceklist_rawat_jalan'); ?>
<!-- // SKPM -->

<!-- // PDIRJRJ -->
<!-- <!?php $this->load->view('pemeriksaan_poli/rekam_medis_form/modal_form_rekam_medis_rajal') ?> -->

<!-- // PAKARJ-->
<!-- ?php $this->load->view('pemeriksaan_poli/pengkajian_keperawatan_anak_form/modal_form_keperawatan_anak') ? -->

<?php $this->load->view('rekam_medis/modal_tata_tertib'); ?>
<?php $this->load->view('pelayanan/diagnosa_form/js') ?>
<?php $this->load->view('pelayanan/tindakan_form/js') ?>
<?php $this->load->view('pelayanan/bhp_form/js') ?>
<?php $this->load->view('pelayanan/konsul_form/modal_konsul') ?>
<?php $this->load->view('pelayanan/tindak_lanjut_form/modal_tindak_lanjut') ?>
<?php $this->load->view('pelayanan/fisioterapi_form/modal-fisioterapi-form') ?>
<?php $this->load->view('pelayanan/laboratorium_form/modal-laboratorium-form'); ?>
<?php $this->load->view('pelayanan/radiologi_form/modal-radiologi-form'); ?>
<?php $this->load->view('pelayanan/operasi_form/modal_operasi_form'); ?>
<?php $this->load->view('pasien/riwayat/modal_riwayat') ?>
<?php $this->load->view('pasien/rekam_medis/modal_rekam_medis') ?>
<?php $this->load->view('pelayanan/resep_form/modal') ?>
<?php $this->load->view('pelayanan/resep_form/js') ?>
<?php $this->load->view('pelayanan/rekap_status_bed/modal_rekap_status_bed') ?>
<?php $this->load->view('pelayanan/perlakuan_khusus_form/modal_perlakuan_khusus') ?>
<?php $this->load->view('pelayanan/surat_rujukan_form/modal_surat_rujukan') ?>
<?php $this->load->view('pelayanan/pkrt_form/js') ?>
<?php $this->load->view('pemeriksaan_poli/kunjungan/js') ?>
<?php $this->load->view('modal_profil_ringkas') ?>
<?php $this->load->view('modal_rehab_medik_form') ?>
<?php $this->load->view('modal_history_rehab_medik') ?>
<?php $this->load->view('modal_detail_history_rehab_medik') ?>
<?php $this->load->view('modal_gizi_rajal') ?>
<?php $this->load->view('pelayanan/tindak_lanjut_form/js') ?>
<?php $this->load->view('pelayanan/surat_kontrol_form/modal_surat_kontrol_dokter') ?>
<!-- RS CLOUD -->
<?php $this->load->view('cloud_rsud/modal_upload_file_rm') ?>
<?php $this->load->view('cloud_rsud/js') ?>

<!-- ERM -->
<?php $this->load->view('form_rekam_medis/modal_list_form') ?>
<?php $this->load->view('form_rekam_medis/modal_tambah_form') ?>
<?php $this->load->view('form_rekam_medis/js') ?>

<!-- Migrasi ERM -->
<!-- ?php $this->load->view('rekam_medis/modal_skrining_resiko_jatuh_rajal'); ? -->
<!-- ?php $this->load->view('rekam_medis/modal_pemberian_informasi'); ? -->
<!-- ?php $this->load->view('rekam_medis/modal_penolakan_tindakan_kedokteran'); ? -->
<!-- ?php $this->load->view('rekam_medis/modal_persetujuan_tindakan_anestesi'); ? -->
<!-- ?php $this->load->view('rekam_medis/modal_persetujuan_tindakan_kedokteran'); ? -->
<!-- ?php $this->load->view('rekam_medis/modal_persetujuan_tindakan_operasi'); ? -->
<!-- ?php $this->load->view('rekam_medis/modal_surat_keterangan_pemeriksaan_mata'); ? -->
<!-- ?php $this->load->view('rekam_medis/modal_visum_et_repertum'); ? -->
<!-- ?php $this->load->view('rekam_medis/modal_checklist_penerimaan_pasien_rawat_inap'); ?-->

<!-- CPPPT -->
<?php $this->load->view('pelayanan/cppt_form/modal_cppt') ?>
<?php $this->load->view('medical_check_up/modal_hasil_pemeriksaan_mcu') ?>

<div id="load-view-formulir"></div>