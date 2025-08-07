<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">
                        <h6><i class="fas fa-hospital-alt m-t-10 m-r-10"></i>Data List Pendataran Poliklinik</h6>
                    </div>
                    <div class="col-9 d-flex justify-content-end">
                        <?= form_button('tambah', '<i class="fas fa-notes-medical"></i> Input Pendaftaran', 'id=bt_tambah_data class="btn btn-info waves-effect"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect"') ?>&nbsp;
                        <?= form_button('search', '<i class="fas fa-search"></i> Pencarian', 'id=bt_search_data class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h6 class="m-t-5">
                            Pasien Baru : <span class="label label-info" id="jml_pasien_baru"></span>&nbsp;&nbsp;
                            Pasien Lama : <span class="label label-success" id="jml_pasien_lama"></span>&nbsp;&nbsp;
                            Pasien Batal : <span class="label label-danger" id="jml_pasien_batal"></span>&nbsp;&nbsp;
                        </h6>
                    </div>
                    <div class="col">
                        <h6 class="d-flex justify-content-end">
							<span class="m-t-5 m-r-5">Filter Shift Klinik:</span>
                            <?= form_dropdown('shifpoli', $shifpoli, array(), 'class="custom-form" style="width:20%" id=shifpoli') ?>
                            <span class="m-t-5 m-r-5 m-l-10">Filter Layanan:</span>
                            <?= form_dropdown('layanan', $layanan, array(), 'class="custom-form" style="width:50%" id=klinik') ?>
                        </h6>
                    </div>
                </div>
                <!-- <div class="table-responsive"> -->
                <table id="table_data" class="table table-hover table-striped table-sm color-table info-table">
                    <thead>
                        <tr>
                            <th width="3%" class="center">No</th>
                            <th width="5%" class="center">No Register</th>
                            <th width="8%" class="center">Tgl Daftar</th>
                            <th width="5%" class="center">No Identitas</th>
                            <th width="5%" class="center">No RM</th>
                            <th width="9%">Nama</th>
                            <th width="8%" class="center">Tgl Keluar</th>
                            <th width="9%">Klinik Tujuan</th>
                            <th width="9%">Cara Bayar</th>
                            <th width="7%">SEP</th>
                            <th width="7%">No Rujukan</th>
                            <th width="8%" class="center">Status</th>
                            <th width="5%" class="center">Status Layanan</th>
                            <th width="7%">Petugas</th>
                            <th width="5%"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <!-- </div> -->
				<div>                    
                    <table>
                        <style type="text/css">
                            #kotak{
                                width:20px;
                                height:10px;
                                display:inline-block;
                            }
                        </style>
                        <tr>
                            <td>
                                <div id="kotak" style="background:#f8f9c0; margin-right:10px;"></div>NIK tidak lengkap, harap segara dilengkapi ! <br />
                                <br>
                            </td>
                        </tr>
                    </table>
                </div>
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

<?php $this->load->view('js'); ?>
<?php $this->load->view('modal_pendaftaran'); ?>
<?php $this->load->view('modal_edit_pendaftaran'); ?>
<?php $this->load->view('modal_cetak_pendaftaran'); ?>
<?php $this->load->view('modal_cetak_form_rekam_medis'); ?>
<?php $this->load->view('modal_cetak_persetujuan_rawat_inap'); ?>
<?php $this->load->view('modal_detail_pendaftaran'); ?>
<?php $this->load->view('modal_search_pendaftaran'); ?>
<?php $this->load->view('modal_edit_klinik'); ?>
<?php $this->load->view('modal_edit_no_rujukan'); ?>
<?php $this->load->view(DIR_VCLAIM . 'modal_vclaim_form'); ?>
<?php $this->load->view('rekam_medis/modal_surat_keterangan_kematian'); ?>
<?php $this->load->view('rekam_medis/modal_visum_et_repertum'); ?>
<?php $this->load->view('pendaftaran/modal_search_advanced'); ?>
<?php $this->load->view('pendaftaran/modal-ket-batal-pendaftaran'); ?>
<?php $this->load->view('modal_cetak_form_rekam_medis'); ?>
<?php $this->load->view('pendaftaran_igd/modal_cetak_persetujuan_rawat_inap'); ?>
<!-- // SPR XXNX -->
<?php $this->load->view('rekam_medis/modal_surat_pengantar_rawat'); ?>
<?php $this->load->view('modal_persetujuan_umum'); ?>
<?php $this->load->view('modal_cetak_ringkasan_riwayat_masuk_dan_keluar'); ?>
<?php $this->load->view('modal_edukasi'); ?>
<?php $this->load->view('rekam_medis/modal_tata_tertib'); ?>