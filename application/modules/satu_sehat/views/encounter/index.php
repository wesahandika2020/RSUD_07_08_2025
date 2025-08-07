<input type="hidden" name="page_now" id="page-encounter">
<input type="hidden" name="hal_ini" id="hal-encounter">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="wizard-encounter">
                    <ol>
                        <li>INTEGRASI</li>
                        <li>BELUM INTEGRASI</li>
                        <li>DAFTAR ENCOUNTER</li>
                        <li>DAFTAR CONDITION</li>
                    </ol>
                    <div class="status-bridging">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload-encounter class="btn btn-secondary waves-effect"') ?>
                                <?= form_button('search', '<i class="fas fa-search"></i> Pencarian', 'id=bt-search-encounter class="btn btn-secondary waves-effect"') ?>
                            </div>
                        </div>
                        <!-- <div class="table-responsive"> -->
                        <table id="table-satset-encounter" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <h4 class="modal-title center"><b>INTEGRASI ENCOUNTER KUNJUNGAN</b></h4>
                            <thead>
                                <tr>
                                    <th class="center" width="5%">No.</th>
                                    <th class="center" width="10%">Tanggal</th>
                                    <th class="left" width="10%">RM</th>
                                    <th class="left" width="20%">Nama</th>
                                    <th class="center" width="10%">NIK</th>
                                    <th class="center" width="10%">Poli</th>
                                    <th class="center" width="15%">Encounter</th>
                                    <th class="center" width="5%">in Progress</th>
                                    <th class="center" width="5%">Finish</th>
                                    <th class="center" width="10%"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col">
                                <div id="pagination-encounter" class="float-left"></div>
                                <div id="summary-encounter" class="float-right text-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="belum-bridging">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <?= form_button('integra', '<i class="fas fa-save mr-1"></i>Integrasi', 'id=integra-encounter class="btn btn-info waves-effect mr-1"') ?>
                                <?= form_button('reload', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload-int-encounter class="btn btn-secondary waves-effect"') ?>
                                <?= form_button('cari', '<i class="fas fa-search"></i> Pencarian', 'id=bt-integrasi-encounter class="btn btn-secondary waves-effect"') ?>
                            </div>
                        </div>
                        <!-- <div class="table-responsive"> -->
                        <table id="table-satset-kirim-encounter" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <h4 class="modal-title center"><b>KIRIM ENCOUNTER</b></h4>
                            <thead>
                                <tr>
                                    <th class="center" width="5%">No.</th>
                                    <th class="center" width="10%">Tanggal</th>
                                    <th class="center" width="15%">RM</th>
                                    <th class="left" width="25%">Nama</th>
                                    <th class="center" width="20%">NIK</th>
                                    <th class="center" width="15%">Poli</th>
                                    <th class="left" width="10%"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col">
                                <div id="kirim-pagination-encounter" class="float-left"></div>
                                <div id="kirim-summary-encounter" class="float-right text-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="daftar-encounter">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <?= form_button('list_encounter', '<i class="fas fa-save mr-1"></i>Lihat RM', 'id=list-encounter class="btn btn-info waves-effect mr-1"') ?>
                            </div>
                        </div>
                        <!-- <div class="table-responsive"> -->
                        <table id="table-satset-list-encounter" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <h4 class="modal-title center"><b>DAFTAR ENCOUNTER</b></h4>
                            <h4 class="modal-title right"><b><span id="list-pasien"></span></b></h4>
                            <thead>
                                <tr>
                                    <th class="center" width="5%">No.</th>
                                    <th class="left" width="30%">Lokasi</th>
                                    <th class="left" width="15%">Dokter</th>
                                    <th class="center" width="20%">Mulai</th>
                                    <th class="center" width="20%">Selesai</th>
                                    <th class="center" width="10%">Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col">
                                <div id="kirim-pagination-list-encounter" class="float-left"></div>
                                <div id="kirim-summary-list-encounter" class="float-right text-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="daftar-condition">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <?= form_button('list_condition', '<i class="fas fa-save mr-1"></i>Lihat RM', 'id=list-condition class="btn btn-info waves-effect mr-1"') ?>
                            </div>
                        </div>
                        <!-- <div class="table-responsive"> -->
                        <table id="table-satset-list-condition" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <h4 class="modal-title center"><b>DAFTAR CONDITION</b></h4>
                            <h4 class="modal-title right"><b><span id="list-kondisi-pasien"></span></b></h4>
                            <thead>
                                <tr>
                                    <th class="center" width="5%">No.</th>
                                    <th class="center" width="10%">Tanggal</th>
                                    <th class="center" width="5%">Kode</th>
                                    <th class="left" width="20%">Diagnosis</th>
                                    <th class="left" width="60%">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col">
                                <div id="kirim-pagination-list-condition" class="float-left"></div>
                                <div id="kirim-summary-list-condition" class="float-right text-sm"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('encounter/js'); ?>
<?php $this->load->view('encounter/modal_search'); ?>