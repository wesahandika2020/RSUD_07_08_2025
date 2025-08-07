<input type="hidden" id="page">
<div class="row">
	<div class="col-md-12">
		<div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info btn waves-effect mr-1"') ?>
                        <?= form_button('reset', '<i class="fas fa-sync mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary btn waves-effect"') ?>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
						<span class="m-t-5 m-r-5">Status Penyerahan :</span>
                        <?= form_dropdown('status_penyerahan', $status_penyerahan, array('Semua'), 'class="form-control-sm col-lg-2 mr-3" id=status_penyerahan') ?>
						
						<span class="m-t-5 m-r-5"> Jenis Pelayanan :</span>
                        <?= form_dropdown('jenis_pelayanan', $jenis_pelayanan, array(''), 'class="form-control-sm col-lg-2" id=jenis_pelayanan') ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- <div class="table-responsive"> -->
                    <table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
                        <thead>
                            <tr>
                                <th width="3%" class="center">No</th>
                                <th width="5%" class="center">ID.Resep/Tebus</th>
                                <th width="5%" class="center">Tanggal</th>
                                <th width="18%" class="center">Dokter</th>
                                <th width="5%" class="center">No. RM</th>
                                <th width="17%" class="left">Nama Pasien</th>
                                <th width="10%" class="">Pelayanan</th>
                                <th width="10%" class="center">Cara Bayar</th>
                                <th width="10%" class="center">Status</th>
                                <th width="10%" class="center">Penyerahan</th>
                                <th width="3%" class="right wrapper"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                <!-- </div> -->
                <div class="row">
                    <div class="col-md-12">
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
<?php $this->load->view('pelayanan/resep_form/modal') ?>
<?php $this->load->view('pelayanan/resep_form/js') ?>
<?php $this->load->view('pasien/riwayat/modal_riwayat'); ?>	
<?php $this->load->view('pasien/rekam_medis/modal_rekam_medis') ?>
