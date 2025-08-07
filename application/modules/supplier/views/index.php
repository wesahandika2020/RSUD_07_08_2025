<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('tambah', '<i class="fas fa-plus-circle"></i> Tambah Supplier', 'id=btn_tambah class="btn btn-info waves-effect mr-1"') ?>
                        <?= form_button('reset', '<i class="fas fa-sync-alt"></i> Reload Data', 'id=btn_reload class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <div class="custom-search">
                            <input type="text" class="search-query-white" onkeyup="getListDataSupplier(1)" id="pencarian" placeholder="Pencarian ...">
                            <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="table_data" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th class="center" width="5%">No.</th>
                                <th width="25%" class="left">Nama</th>
                                <th width="10%" class="left">NPWP</th>
                                <th width="25%" class="left">Alamat</th>
                                <!-- <th width="10%" class="left">Email</th> -->
                                <th width="10%" class="left">Fax</th>
                                <th width="10%" class="left">Telepon</th>
                                <th width="10%" class="left">Kontak</th>
                                <th class="center" width="7%"></th>
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