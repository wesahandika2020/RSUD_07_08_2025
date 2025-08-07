<input type="hidden" id="page-now">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h6><i class="fas fa-hospital-alt m-t-10 m-r-10"></i>List Data Permintaan Radiologi</h6>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <?= form_dropdown('jenis', $jenis_radiologi, array(), 'class="form-control col-lg-4 mr-1" id=jenis-radiologi') ?>
                        <?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
                        <?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- <div class="table-responsive"> -->
					<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr>
								<th width="4%">No</th>
								<th width="9%">Waktu Order</th>
								<th wdith="7%">No Register</th>
								<th width="6%">No RM</th>
								<th width="19%">Nama Pasien</th>
								<th width="13%">Dokter Pemesan</th>
								<th width="12%">Layanan</th>
								<th width="10%">Jenis</th>
								<th width="10%" class="center">Status</th>
                                <th width="5%" class="left">PACS</th>
								<th width="5%"></th>
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
<?php $this->load->view('pasien/riwayat/modal_riwayat') ?> 
<?php $this->load->view('antrian_radiologi/modal_antrian_radiologi') ?> 	
<?php $this->load->view('antrian_radiologi/js_detail') ?> 
