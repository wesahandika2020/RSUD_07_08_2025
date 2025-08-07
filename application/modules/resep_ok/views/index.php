<input type="hidden" id="page-now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info btn-lg waves-effect mr-1"') ?>
                        <?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary btn-lg waves-effect mr-1"') ?>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <input type="text" name="keyword" id="keyword" class="form-control" style="width:30%" placeholder="Nama / No. RM...">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
                        <thead>
                            <tr>
                                <th width="3%" class="center">No</th>
                                <th width="5%" class="left">Tanggal</th>
                                <th width="5%" class="left">No. RM</th>
                                <th width="17%" class="left">Nama</th>
                                <th width="20%" class="left">Alamat</th>
                                <th width="8%" class="left">Jenis</th>
                                <th width="8%" class="left">Asal Pasien</th>
                                <th width="10%" class="left">Bangsal</th>
                                <th width="15%" class="left">Dokter</th>
                                <th width="5%" class="left">Cara&nbsp;Bayar</th>
                                <th width="5%" class="left">Status</th>
                                <th width="5%" class="center">Status Keluar</th>
                                <th width="5%" class="center"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col">
                        <div id="pagination" class="float-left"></div>
                        <div id="page-summary" class="float-right text-sm"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('modal') ?>
<?php $this->load->view('js') ?>
<?php $this->load->view('pelayanan/resep_form/modal') ?>
<?php $this->load->view('pelayanan/resep_form/js') ?>