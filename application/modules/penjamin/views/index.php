<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('tambah', '<i class="fas fa-plus-square"></i> Tambah Penjamin', 'id=bt_tambah_penjamin class="btn btn-info waves-effect"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <?= form_button('expand', '<i class="fas fa-folder-open"></i> Expand All', 'id=bt_expand_all class="btn btn-secondary  waves-effect"') ?>&nbsp;
                        <?= form_button('collapse', '<i class="fas fa-folder"></i> Collapse All', 'id=bt_collapse_all class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="table_penjamin" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th width="15%" class="text-center">No</th>
                                <th width="25%" class="text-left">Nama</th>
                                <th width="15%" class="text-right">Reimburse</th>
                                <th width="15%" class="text-right">Reimburse Barang</th>
                                <th width="10%" class="text-left">Kode Rekening</th>
                                <th width="10%" class="text-center">Status</th>
                                <th width="10%"></th>
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

<?php $this->load->view('modal_penjamin'); ?>
<?php $this->load->view('js'); ?>