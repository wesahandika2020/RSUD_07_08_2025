<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">
                        <h6><i class="fas fa-hospital-alt m-t-10 m-r-10"></i>Data List Ins. Pemulasaran Jenazah</h6>
                    </div>
                    <div class="col-9 d-flex justify-content-end">
                        <?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn_search class="btn btn-info waves-effect mr-1"') ?>
                        <?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn_reload class="btn btn-secondary waves-effect mr-1"') ?>
                    </div>
                </div>
            </div>

            

            <div class="card-body">
                <!-- <div class="table-responsive"> -->
					<table id="table_data" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr>
                                <th class="center" width="5%">No</th>
								<th class="center" width="10%">No Register</th>
								<th class="center" width="10%">Tgl Masuk</th>
								<th class="center" width="8%">No RM</th>
								<th class="center" width="20%">Nama</th>
                                <th class="center" width="10%">Ruangan</th>
								<th class="center" width="15%" >Status</th>
                                <th class="center" width="10%" class="center wrapper">Status Keluar</th>
								<th width="8%"></th>
								<!-- <th width="3%"></th> -->
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
<?php $this->load->view('modal') ?>
<?php $this->load->view('modal_jenazah') ?>
<?php $this->load->view('modal_surat_keterangan_kematian') ?>
<?php $this->load->view('pelayanan/bhp_form/js') ?>
<?php $this->load->view('pasien/riwayat/modal_riwayat') ?>
<?php $this->load->view('pasien/rekam_medis/modal_rekam_medis') ?>
<?php $this->load->view('pelayanan/tindakan_form/js') ?>
<?php $this->load->view('bimbingan_rohani/permintaan_bimroh/js')?>
<?php $this->load->view('pelayanan/tindak_lanjut_form/modal_tindak_lanjut') ?>

<!-- ERM -->
<?php $this->load->view('form_rekam_medis/modal_list_form') ?>
<?php $this->load->view('form_rekam_medis/modal_tambah_form') ?>
<?php $this->load->view('form_rekam_medis/js') ?>

<div id="load-view-formulir"></div>