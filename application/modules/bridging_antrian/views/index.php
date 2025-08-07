<input type="hidden" name="page_now" id="page-now">
<input type="hidden" name="hal_ini" id="hal-ini">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="wizard-bridging">
                    <ol>
                        <li>STATUS BRIDGING</li>
                        <li>BELUM BRIDGING</li>
                    </ol>
                    <div class="status-bridging">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                                <?= form_button('search', '<i class="fas fa-search"></i> Pencarian', 'id=bt-search class="btn btn-secondary waves-effect"') ?>
                            </div>
                        </div>
                        <!-- <div class="table-responsive"> -->
                        <table id="table-bridging-antrian" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <h4 class="modal-title center"><b>BRIDGING ANTRIAN</b></h4>
                            <thead>
                                <tr>
                                    <th class="center" width="1%">No.</th>
                                    <th class="left" width="15%">Kode Booking</th>
                                    <th class="center" width="15%">No Antrean</th>
                                    <th class="center" width="15%">Nama Poli</th>
                                    <th class="left" width="15%">Dokter</th>
                                    <th class="center" width="10%">Status Kirim</th>
                                    <th class="center" width="10%">Respon</th>
                                    <th class="left" width="19%"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col">
                                <div id="pagination" class="float-left"></div>
                                <div id="summary" class="float-right text-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="belum-bridging">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <?= form_button('integra', '<i class="fas fa-save mr-1"></i>Integrasi', 'id=integra-antrian class="btn btn-info waves-effect mr-1"') ?>
                                <?= form_button('reload', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-bridging class="btn btn-secondary waves-effect"') ?>
                                <?= form_button('cari', '<i class="fas fa-search"></i> Pencarian', 'id=bt-search-bridging class="btn btn-secondary waves-effect"') ?>
                            </div>
                        </div>
                        <!-- <div class="table-responsive"> -->
                        <table id="table-kirim-antrian" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <h4 class="modal-title center"><b>KIRIM ANTRIAN</b></h4>
                            <thead>
                                <tr>
                                    <th class="center" width="1%">No.</th>
                                    <th class="left" width="10%">Kode Booking</th>
                                    <th class="center" width="10%">No Antrean</th>
                                    <th class="center" width="15%">Nama Poli</th>
                                    <th class="left" width="15%">Dokter</th>
                                    <th class="center" width="10%">Status Kirim</th>
                                    <th class="center" width="10%">Respon</th>
                                    <th class="center" width="10%">Hasil</th>
                                    <th class="left" width="19%"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col">
                                <div id="kirim-pagination" class="float-left"></div>
                                <div id="kirim-summary" class="float-right text-sm"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js'); ?>
<?php $this->load->view('modal'); ?>
<?php $this->load->view('modal_search'); ?>