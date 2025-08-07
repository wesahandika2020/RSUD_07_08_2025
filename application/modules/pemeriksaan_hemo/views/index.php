<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">
                        <h6><i class="fas fa-hospital-alt m-t-10 m-r-10"></i>Data List Pemeriksaan Hemodialisa</h6>
                    </div>
                    <div class="col-9 d-flex justify-content-end">
                        <?= form_button('search', '<i class="fas fa-search"></i> Pencarian Data', 'id=btn-search-data class="btn btn-info waves-effect"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=btn-reload-data class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- <div class="table-responsive"> -->
                <table id="table_data" class="table table-hover table-striped table-sm color-table info-table">
                    <thead>
                        <tr>
                            <th class="wrapper center">No</th>
                            <th class="center">No Register</th>
                            <th class="center">No RM</th>
                            <th class="center">Tanggal Daftar</th>
                            <th class="center">Tanggal Layanan</th>
                            <th class="center">Nama</th>
                            <th class="center">Dokter</th>
                            <th class="center">Jenis</th>
                            <th class="center">Asal Kunjungan</th>
                            <th class="center">Status</th>
                            <th class="center">Resep</th>
                            <th class="center">SKK</th>
                            <th class="center">Status Keluar</th>
                            <th></th>
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

<?php
    $this->load->view('js');
    $this->load->view('modal');
    // $this->load->view('asuhan_keperawatan/modal');
    // $this->load->view('laporan_hemodialisa/modal');
    $this->load->view('pelayanan/diagnosa_form/js');
    $this->load->view('pelayanan/tindakan_form/js');
    $this->load->view('pelayanan/bhp_form/js');
    $this->load->view('pelayanan/darah_form/js');
    $this->load->view('pelayanan/konsul_form/modal_konsul');
    $this->load->view('pelayanan/tindak_lanjut_form/modal_tindak_lanjut');
    $this->load->view('pelayanan/fisioterapi_form/modal-fisioterapi-form');
    $this->load->view('pelayanan/laboratorium_form/modal-laboratorium-form');
    $this->load->view('pelayanan/radiologi_form/modal-radiologi-form');
    $this->load->view('pasien/riwayat/modal_riwayat');
	$this->load->view('pasien/rekam_medis/modal_rekam_medis');
    $this->load->view('pelayanan/rekap_status_bed/modal_rekap_status_bed');
    $this->load->view('pelayanan/perlakuan_khusus_form/modal_perlakuan_khusus');
    $this->load->view('pelayanan/surat_rujukan_form/modal_surat_rujukan');
    $this->load->view('pelayanan/resep_form/modal');
    $this->load->view('pelayanan/resep_form/js');
    $this->load->view('pelayanan/surat_kontrol_form/modal_surat_kontrol_dokter');

    // ERM
    $this->load->view('form_rekam_medis/modal_list_form');
    $this->load->view('form_rekam_medis/modal_tambah_form');
    $this->load->view('form_rekam_medis/js');
?>

<div id="load-view-formulir"></div>