<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('tambah', '<i class="fas fa-plus-square"></i> Tambah Formulir', 'id=bt_tambah_form class="btn btn-info waves-effect"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-search"></i> Pencarian', 'id=bt_search_formulir class="btn btn-secondary waves-effect"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <?= form_button('expand', '<i class="fas fa-folder-open"></i> Expand All', 'id=bt_expand_all class="btn btn-secondary  waves-effect"') ?>&nbsp;
                        <?= form_button('collapse', '<i class="fas fa-folder"></i> Collapse All', 'id=bt_collapse_all class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="table_form_rekam_medis" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Formulir </th>
                                <th>No Formulir</th>
                                <th>Kategori Formulir</th>
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

<?php $this->load->view('modal_form_rm'); ?>
<?php $this->load->view('modal_search_formulir'); ?>
<?php $this->load->view('js'); ?>