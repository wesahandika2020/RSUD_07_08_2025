<input type="hidden" name="page_lokasi" id="page-lokasi">
<input type="hidden" name="hal_lokasi" id="hal-lokasi">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('tambah', '<i class="fas fa-plus-square"></i> Tambah Lokasi', 'id=tmbh-lokasi class="btn btn-info waves-effect"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload-lokasi class="btn btn-secondary waves-effect"') ?>&nbsp;
                        <?= form_button('search', '<i class="fas fa-search"></i> Pencarian', 'id=bt-search-lokasi class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <?= form_button('expand', '<i class="fas fa-folder-open"></i> Expand All', 'id=bt-expand-lokasi class="btn btn-secondary  waves-effect"') ?>&nbsp;
                        <?= form_button('collapse', '<i class="fas fa-folder"></i> Collapse All', 'id=bt-collapse-lokasi class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>
                    <div class="table-responsive">
                        <table id="table-satset-lokasi" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>ID Lokasi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div id="pagination-lokasi" class="float-left"></div>
                            <div id="summary-lokasi" class="float-right text-sm"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('lokasi/js'); ?>
<?php $this->load->view('lokasi/modal_search'); ?>