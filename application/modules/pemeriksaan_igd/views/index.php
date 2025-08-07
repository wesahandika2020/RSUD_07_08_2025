<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">
                        <h6><i class="fas fa-hospital-alt m-t-10 m-r-10"></i>Data List Pemeriksaan IGD</h6>
                    </div>
                    <div class="col-9 d-flex justify-content-end">
                        <?= form_button('search', '<i class="fas fa-search"></i> Pencarian Data', 'id=btn-search-data class="btn btn-info waves-effect"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=btn-reload-data class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">
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
                            <th class="center">No</th>
                            <th class="center">No Register</th>
                            <th>No RM</th>
                            <th class="nowrap">Tgl Masuk</th>
                            <th width="18%">Nama</th>
                            <th width="15%" class="center">Dokter</th>
                            <th width="10%" class="center">Jenis IGD</th>
                            <th width="8%" class="center">Cara Bayar</th>
                            <th width="5%" class="center">Status</th>
                            <th width="5%" class="center">Triase</th>
                            <th width="5%" class="center">Resep</th>
                            <th width="10%" class="center">Status Keluar</th>
                            <th width="12%"></th>
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

<?php $this->load->view('modal_search') ?>
<?php $this->load->view('modal_pemeriksaan') ?>
<?php $this->load->view('js') ?>
<?php $this->load->view('pelayanan/diagnosa_form/js') ?>
<?php $this->load->view('pelayanan/tindakan_form/js') ?>
<?php $this->load->view('pelayanan/bhp_form/js') ?>
<?php $this->load->view('pelayanan/darah_form/js') ?>
<?php $this->load->view('pelayanan/konsul_form/modal_konsul') ?>
<?php $this->load->view('pelayanan/tindak_lanjut_form/modal_tindak_lanjut') ?>
<?php $this->load->view('pelayanan/fisioterapi_form/modal-fisioterapi-form') ?>
<?php $this->load->view('pelayanan/laboratorium_form/modal-laboratorium-form'); ?>
<?php $this->load->view('pelayanan/radiologi_form/modal-radiologi-form'); ?>
<?php $this->load->view('pelayanan/operasi_form/modal_operasi_form'); ?>
<?php $this->load->view('pasien/riwayat/modal_riwayat') ?>
<?php $this->load->view('pasien/rekam_medis/modal_rekam_medis') ?>
<?php $this->load->view('pelayanan/rekap_status_bed/modal_rekap_status_bed') ?>
<?php $this->load->view('pelayanan/perlakuan_khusus_form/modal_perlakuan_khusus') ?>
<?php $this->load->view('pelayanan/surat_rujukan_form/modal_surat_rujukan') ?>
<!-- ?php $this->load->view('pelayanan/pengkajian_awal_igd_form/modal_pengkajian_awal_igd') ? -->
<?php $this->load->view('pelayanan/resep_form/modal') ?>
<?php $this->load->view('pelayanan/resep_form/js') ?>
<?php $this->load->view('pelayanan/cppt_form/modal_cppt') ?>
<?php $this->load->view('pelayanan/pkrt_form/js') ?>
<!-- ?php $this->load->view('pelayanan/keperawatan_form/modal_entri_keperawatan') ? -->
<?php $this->load->view('modal_cetak_form_rekam_medis') ?>
<?php $this->load->view('rekam_medis/modal_surat_keterangan_kematian'); ?>
<!-- // SPR -->
<?php $this->load->view('rekam_medis/modal_surat_pengantar_rawat'); ?>
<?php $this->load->view('rekam_medis/modal_tata_tertib'); ?>
<?php $this->load->view('pelayanan/edukasi_form/modal_edukasi') ?>
<!-- RS CLOUD -->
<?php $this->load->view('cloud_rsud/modal_upload_file_rm') ?>
<?php $this->load->view('cloud_rsud/js') ?>
<!-- ?php $this->load->view('pelayanan/pengkajian_neonatus_form/modal_pengkajian_neonatus'); ? -->
<!-- //PIM -->
<!-- <!?php $this->load->view('pemeriksaan_igd/modal_pengkajian_maternal') ?> -->

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
<!-- ?php $this->load->view('rekam_medis/modal_visum_et_repertum'); ? -->
<!-- ?php $this->load->view('rekam_medis/modal_checklist_penerimaan_pasien_rawat_inap'); ?-->

<div id="load-view-formulir"></div>

