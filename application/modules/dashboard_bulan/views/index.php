<input type="hidden" id="page-now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('filter', '<i class="fas fa-plus-circle mr-1"></i>Filter', 'id=cek-dashboard-bulan class="btn btn-info waves-effect mr-1"') ?>
                        <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>

                <!-- <div class="table-responsive"> -->
                    <table id="table-dashboard-bulan" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <h4 class="modal-title float-right" id="bulan-dashboard-label"></h4>
                        <h4 class="modal-title center"><b>DASHBOARD PER BULAN</b></h4>
                        <thead>
                            <tr>
                                <th class="center" width="0.5%">No.</th>
                                <th class="center" width="1%">Tanggal</th>
                                <th class="center" width="1%">Nama Poli</th>
                                <th class="center" width="1%">Jumlah Antrean</th>
                                <th class="center" width="1%">Waktu Masuk</th>
                                <th class="center" width="8%">Waktu Task 1</th>
                                <th class="center" width="8%">Rata - rata Task 1</th>
                                <th class="center" width="8%">Waktu Task 2</th>
                                <th class="center" width="8%">Rata - rata Task 2</th>
                                <th class="center" width="8%">Waktu Task 3</th>
                                <th class="center" width="8%">Rata - rata Task 3</th>
                                <th class="center" width="8%">Waktu Task 4</th>
                                <th class="center" width="8%">Rata - rata Task 4</th>
                                <th class="center" width="8%">Waktu Task 5</th>
                                <th class="center" width="8%">Rata - rata Task 5</th>
                                <th class="center" width="8%">Waktu Task 6</th>
                                <th class="center" width="8%">Rata - rata Task 6</th>
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
        </div>
    </div>
</div>

<?php $this->load->view('modal'); ?>
<?php $this->load->view('js'); ?>