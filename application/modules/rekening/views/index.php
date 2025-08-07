<input type="hidden" name="page_now" id="page_now">
<input type="hidden" id="jenis_view">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('tambah', '<i class="fas fa-plus-square"></i> Tambah Rekening', 'id=bt_tambah_data class="btn btn-info waves-effect"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-search"></i> Pencarian', 'id=bt_search_data class="btn btn-secondary waves-effect"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <?= form_button('expand', '<i class="fas fa-folder-open"></i> Expand All', 'id=bt_expand_all class="btn btn-secondary  waves-effect"') ?>&nbsp;
                        <?= form_button('collapse', '<i class="fas fa-folder"></i> Collapse All', 'id=bt_collapse_all class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="table_data" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
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
<?php $this->load->view('modal_rekening'); ?>
<?php $this->load->view('modal_search'); ?>