<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('tambah', '<i class="fas fa-plus-square"></i> Buat Surat Keterangan Dokter', 'id=btn_tambah class="btn btn-info waves-effect mr-1"') ?>
                        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=btn_reload class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <div class="custom-search">
                            <input type="text" class="search-query-white" onkeyup="getListMedicalCertificate(1)" id="search" placeholder="Pencarian ...">
                            <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="table_medical_certificate" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th class="center" width="5%">No.</th>
                                <th width="5%" class="center">No. RM</th>
                                <th width="25%" class="left">Nama</th>
                                <th width="15%" class="left">Alamat</th>
                                <th width="15%" class="center">Waktu Berobat</th>
                                <th width="5%" class="left">Selama</th>
<!--                                <th width="20%" class="left">Tgl Istirahat</th>-->
                                <th width="15%" class="left">Status</th>
                                <th class="center" width="10%"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
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

<?php 
	$this->load->view('modal');
	$this->load->view('js');
?>
