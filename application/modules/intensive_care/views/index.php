<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-7">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info waves-effect"') ?>
                        <?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                        <?= form_button('export', '<i class="fas fa-download mr-1"></i>Export Data', 'id=btn-export class="btn btn-success waves-effect"') ?>
					</div>
					<div class="col-lg-5 d-flex justify-content-end">
						<span class="m-t-5 m-r-5">Status Pasien :</span>
                        <?= form_dropdown('status_pasien_icare', $status_pasien_icare, array('Semua'), 'class="form-control-sm col-lg-2 mr-3" id=status_pasien_icare') ?>
						
						<?= form_dropdown('bangsal_search', $bangsal_filter, array(), 'class="form-control-sm" style="width:50%" id=bangsal-search') ?>
					</div>
                </div>
            </div>
            <div class="card-body">
                <!-- <div class="table-responsive"> -->
					<table id="table-data-icare" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr>						
								<th width="4%" class="center">No</th>
								<th width="6%" class="center">No. Register</th>
								<th width="7%" class="center">Tgl. Masuk</th>
								<th width="7%" class="center">Tgl. Checkout</th>
								<th width="5%" class="center">No. RM</th>
								<th width="15%">Nama</th>
								<th width="8%">Bed</th>
								<th width="15%">Dokter</th>
								<th width="8%" class="center">Cara Bayar</th>
								<th width="4%" class="center">Resep</th>
								<th width="9%" class="center">Status</th>
								<th width="15%"></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
                <!-- </div> -->
                <div class="row">
                    <div class="col">
                        <div id="icare-pagination" class="float-left"></div>
                        <div id="icare-summary" class="float-right text-sm"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js') ?>
<?php $this->load->view('modal') ?>
<?php $this->load->view('pelayanan/diagnosa_form/js') ?>
<?php $this->load->view('pelayanan/tindakan_form/js') ?>
<?php $this->load->view('pelayanan/bhp_form/js') ?>
<?php $this->load->view('pelayanan/darah_form/js') ?>
<?php $this->load->view('pelayanan/tindak_lanjut_form_icare/modal_tindak_lanjut') ?>
<?php $this->load->view('pelayanan/fisioterapi_form/modal-fisioterapi-form') ?>
<?php $this->load->view('pelayanan/laboratorium_form/modal-laboratorium-form'); ?>
<?php $this->load->view('pelayanan/radiologi_form/modal-radiologi-form'); ?>
<?php $this->load->view('pelayanan/operasi_form/modal_operasi_form'); ?>
<?php $this->load->view('pelayanan/bimroh_form/modal_bimroh_form'); ?>
<?php $this->load->view('pelayanan/talqin_form/modal_talqin_form'); ?>
<?php $this->load->view('pasien/riwayat/modal_riwayat') ?>
<?php $this->load->view('pasien/rekam_medis/modal_rekam_medis') ?>
<?php $this->load->view('order_intensive_care/bed_form') ?>
<?php $this->load->view('pelayanan/waktu_rawat_icare_form/modal_waktu_rawat') ?>
<?php $this->load->view('pelayanan/vital_sign_form/modal_vital_sign') ?>
<!-- <!?php $this->load->view('pemeriksaan_hemo/laporan_hemodialisa/modal') ?> -->
<?php $this->load->view('pelayanan/perlakuan_khusus_form/modal_perlakuan_khusus') ?>
<!-- ?php $this->load->view('pelayanan/pengkajian_awal_icare_form/modal_pengkajian_awal') ? -->
<!-- ?php $this->load->view('pelayanan/pengkajian_anak_form/modal_pengkajian_anak'); ? -->
<!-- ?php $this->load->view('pelayanan/pengkajian_neonatus_form/modal_pengkajian_neonatus'); ? -->
<!-- ?php $this->load->view('pelayanan/pengkajian_awal_form/modal_pengkajian_medis_igd') ? -->
<?php $this->load->view('pelayanan/resep_form_icare/modal') ?>
<?php $this->load->view('pelayanan/resep_form_icare/js') ?>
<?php $this->load->view('pelayanan/cppt_form/modal_cppt') ?>
<?php $this->load->view('pelayanan/edukasi_form/modal_edukasi') ?>
<?php $this->load->view('pelayanan/surat_aps_form/modal_surat_aps') ?>
<?php $this->load->view('pelayanan/surat_kontrol_form_icare/modal_surat_kontrol') ?>
<?php $this->load->view('pelayanan/surat_rujukan_form/modal_surat_rujukan') ?>
<!-- ?php $this->load->view('pelayanan/keperawatan_form/modal_entri_keperawatan') ? -->
<!-- ?php $this->load->view('modal_resume_medis'); ? -->
<?php $this->load->view('pelayanan/pkrt_form/js') ?>
<?php $this->load->view('pelayanan/konfirmasi_visit_form/modal_konfirmasi_visit_anestesi') ?>
<?php $this->load->view('gizi/modal_gizi') ?>
<!-- IC WH-->
<?php $this->load->view('modal_cetak_form_intensive_care') ?>
<!-- RS CLOUD -->
<?php $this->load->view('cloud_rsud/modal_upload_file_rm') ?>
<?php $this->load->view('cloud_rsud/js') ?>

<!-- ERM -->
<?php $this->load->view('form_rekam_medis/modal_list_form') ?>
<?php $this->load->view('form_rekam_medis/modal_tambah_form') ?>
<?php $this->load->view('form_rekam_medis/js') ?>

<!-- Migrasi ERM -->
<!-- ?php $this->load->view('modal_checklist_penerimaan_pasien_rawat_inap'); ?-->

<div id="load-view-formulir"></div>

