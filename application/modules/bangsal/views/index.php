<input type="hidden" id="page-now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('tambah', '<i class="fas fa-plus-circle mr-1"></i>Tambah Bangsal', 'id=btn-tambah class="btn btn-info waves-effect mr-1"') ?>
                        <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <div class="custom-search">
                            <input type="text" class="search-query-white" onkeyup="getListBangsal(1)" id="keyword" placeholder="Pencarian ...">
                            <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="table-data" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th class="center" width="5%">No.</th>
                                <th class="left" width="20%">Nama</th>
                                <th class="center" width="10%">Kode</th>
                                <th class="center" width="15%">Kode Kelas</th>
                                <th class="left" width="15%">Unit</th>
                                <th class="left" width="20%">Keterangan</th>
                                <th class="center" width="5%">Is Active</th>
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

<?php $this->load->view('modal'); ?>
<?php $this->load->view('js'); ?>