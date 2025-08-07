<input type="hidden" name="page_now" id="page-now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <?= form_button('tambah', '<i class="fas fa-plus-circle mr-1"></i>Tambah Expertise', 'id=btn-tambah class="btn btn-info waves-effect"') ?>
                        <?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <div class="custom-search">
                            <input type="text" class="search-query-white" onkeyup="getListDataExpertise(1)" id="pencarian" placeholder="Pencarian ...">
                            <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="table-data" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th width="5%" class="center">No.</th>
                                <th width="35%">Nama Layanan</th>
                                <th width="25%">Dokter</th>
                                <th width="15%">Keterangan</th>
                                <th width="10%">Expertise</th>
                                <th></th>
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

<?php $this->load->view('js'); ?>
<?php $this->load->view('modal'); ?>