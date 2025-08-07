<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">
                        <h6><i class="fas fa-hospital-alt m-t-10 m-r-10"></i>Data List Pendataran Radiologi</h6>
                    </div>
                    <div class="col-9 d-flex justify-content-end">
                        <?= form_button('tambah', '<i class="fas fa-notes-medical mr-1"></i>Input Pendaftaran', 'id=btn-tambah-data class="btn btn-info waves-effect mr-1"') ?>
                        <?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload-data class="btn btn-secondary waves-effect mr-1"') ?>
                        <?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search-data class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h6 class="m-t-5">
                            Pasien Baru : <span class="label label-info" id="jml-pasien-baru"></span>&nbsp;&nbsp;
                            Pasien Lama : <span class="label label-success" id="jml-pasien-lama"></span>&nbsp;&nbsp;
                            Pasien Batal : <span class="label label-danger" id="jml-pasien-batal"></span>&nbsp;&nbsp;
                        </h6>
                    </div>
                    <div class="col">
                        <h6 class="d-flex justify-content-end">
                            
                        </h6>
                    </div>
                </div>
                <!-- <div class="table-responsive"> -->
                <table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
                    <thead>
                        <tr>
                            <th width="5%" class="center">No</th>
                            <th width="8%" class="center">No Register</th>
                            <th width="5%" class="center">No RM</th>
                            <th width="10%">Tgl Daftar</th>
                            <th width="17%">Nama</th>
                            <th width="10%">Tgl Keluar</th>
                            <th width="7%">Cara Bayar</th>
                            <th width="10%" class="center">Status</th>
                            <th width="7%">Petugas</th>
                            <th width="16%"></th>
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
	$this->load->view('pendaftaran/penunjang/modal-edit-pendaftaran'); 
    $this->load->view('pelayanan/radiologi_form/modal-radiologi-form');
    $this->load->view('pelayanan/tindak_lanjut_form/modal_tindak_lanjut'); 
    $this->load->view('modal_cetak_pendaftaran'); 
    $this->load->view('pendaftaran/modal_search_advanced');
?>