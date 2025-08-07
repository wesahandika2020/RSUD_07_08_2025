<input type="hidden" id="page-now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <?= form_button('expand', '<i class="fas fa-folder-open mr-1"></i>Expand All', 'id=btn-expand-all class="btn btn-secondary  waves-effect mr-1"') ?>
                        <?= form_button('collapse', '<i class="fas fa-folder mr-1"></i>Collapse All', 'id=btn-collapse-all class="btn btn-secondary waves-effect mr-1"') ?>
                        <div class="custom-search">
                            <input type="text" class="search-query-white" onkeyup="getListItemLaboratorium(1)" id="pencarian" placeholder="Pencarian ...">
                            <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="table-data" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th width="10%" class="text-center">No</th>
                                <th width="70%">Layanan Laboratorium</th>
                                <th width="10%">Kode LIS</th>
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

<?php $this->load->view('js') ?>
<?php $this->load->view('modal') ?>