<input type="hidden" id="pagenow">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
                        <?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        
                    </div>
                </div>
            </div>			
            <input type="hidden" name="id_pasien" id="id-pasien">
            <div class="card-body">
                <div class="table-responsive">
					<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr>
								<th class="center" width="4%">No</th>
								<th class="center" width="9%">Waktu Order</th>
								<th width="6%">No RM</th>
								<th width="20%">Nama Pasien</th>
								<th width="18%">Layanan</th>
								<th width="7%" class="center">Status</th>
								<th width="5%"></th>
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

<?php $this->load->view('modal') ?>
<?php $this->load->view('js') ?>
<?php $this->load->view('pasien/rekam_medis/modal_rekam_medis') ?>