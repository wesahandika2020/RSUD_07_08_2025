<input name="page_now" type="hidden" id="page-now">
<input name="page_sum" type="hidden" id="page-now-sum">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('tambah', '<i class="fas fa-plus-circle mr-1"></i>Tambah Bed', 'id=btn-tambah class="btn btn-info waves-effect mr-1"') ?>
                        <?= form_button('summary', '<i class="fas fa-bed mr-1"></i>Summary Data Bed', 'id=btn-summary class="btn btn-success waves-effect mr-1"') ?>
                        <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <div class="custom-search">
                            <input type="text" class="search-query-white" onkeyup="getListBed(1)" id="keyword" placeholder="Pencarian ...">
                            <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>

                <!-- ?= var_dump($_SESSION) ? -->
                <div class="table-responsive">
                    <table id="table-data" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th class="center" width="5%">No.</th>
                                <th class="left" width="12%">Nama Bangsal</th>
                                <th class="center" width="10%">Kelas</th>
                                <th class="center" width="8%">No. Kamar</th>
                                <th class="center" width="7%">No. Bed</th>
                                <th class="center" width="10%">Perbaikan/Rusak</th>
                                <th class="center" width="10%">Melebihi Kapasitas</th>
                                <th class="center" width="8%">ICU Bedah</th>
                                <th class="center" width="12%">Status</th>
                                <th class="left" width="8%">Keterangan</th>
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