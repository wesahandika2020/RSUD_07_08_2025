<!-- <meta http-equiv="refresh" content="90; URL=<?= base_url();?>"> -->
<input type="hidden" name="page_now" id="page-now">
<input type="hidden" name="page_lantai" id="page-lantai">

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>&nbsp;
                    </div>
                </div>
                <!-- <div class="table-responsive"> -->
                    <table id="table-monitor-akun" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <h4 class="modal-title center" id="monitor-akun-label"></h4>
                        <h4 class="modal-title center"><b></b></h4>
                        <thead>
                            <tr>
                                <th class="left" width="10%">No.</th>
                                <th class="left" width="10%">Kode Booking</th>
                                <th class="center" width="15%">Huruf Antrean</th>
                                <th class="center" width="10%">Urutan</th>
                                <th class="center" width="10%">Loket</th>
                                <th class="center" width="20%">Waktu Panggil</th>
                                <th class="left" width="25%">Nama Akun</th>
                            </tr>
                        </thead>
                        <tbody ></tbody>
                    </table>
                <!-- </div> -->
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

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <!-- <div class="table-responsive"> -->
                    <table id="table-monitor-akun-lantai-dua" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <h4 class="modal-title center" id="monitor-akun-lantai-dua-label"></h4>
                        <h4 class="modal-title center"><b></b></h4>
                        <thead>
                            <tr>
                                <th class="left" width="10%">No.</th>
                                <th class="left" width="10%">Kode Booking</th>
                                <th class="center" width="15%">Huruf Antrean</th>
                                <th class="center" width="10%">Urutan</th>
                                <th class="center" width="10%">Loket</th>
                                <th class="center" width="20%">Waktu Panggil</th>
                                <th class="left" width="25%">Nama Akun</th>
                            </tr>
                        </thead>
                        <tbody ></tbody>
                    </table>
                <!-- </div> -->
                <div class="row">
                    <div class="col">
                        <div id="pagination2" class="float-left"></div>
                        <div id="summary2" class="float-right text-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js'); ?>