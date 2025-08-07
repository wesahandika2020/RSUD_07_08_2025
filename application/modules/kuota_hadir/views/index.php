<link href="<?= base_url() ?>/resources/hospital/dist/css/pages/ribbon-page.css" rel="stylesheet">
<style>
    /* #dashboard-kuota {
        padding: 20px;
    } */

    #button-full-screen {
        opacity: 0;
    }
    #button-full-screen:hover {
        opacity: 1;
    }

    /* Safari syntax */
    :-webkit-full-screen {
        background-image: url(resources/images/backgrounds/banner-backdrop-kuota.png);
        background-size: cover;
        background-position: center;
        padding: 10px 50px 50px 50px;
    }

    /* IE11 */
    :-ms-fullscreen {
        background-color: Fuchsia;
        padding: 10px 50px 50px 50px;
    }

    /* Standard syntax */
    :fullscreen {
        background-color: LightBlue;
        padding: 10px 50px 50px 50px;
    }
</style>
<input type="hidden" id="page-now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div id="tabs-kuota" class="show">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation" style="width: 50%">
                        <button class="nav-link active" id="dashboard-kuota-tab" onclick="dashboardKuotaHadir(null)" data-toggle="tab" data-target="#dashboard-kuota" type="button" role="tab" aria-controls="dashboard-kuota" aria-selected="false" style="width: 100%"><b>Dashboard</b></button>
                    </li>
                    <li class="nav-item" role="presentation" style="width: 50%">
                        <button class="nav-link" id="list-kuota-tab" onclick="getKuotaHadir(1)" data-toggle="tab" data-target="#list-kuota" type="button" role="tab" aria-controls="list-kuota" aria-selected="true" style="width: 100%"><b>List Kuota Hadir</b></button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show" id="list-kuota" role="tabpanel" aria-labelledby="list-kuota-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col d-flex justify-content-start">
                                    <?= form_button('search', '<i class="fas fa-search mr-1"></i> Pencarian', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
                                    <!-- <?= form_button('filter', '<i class="fas fa-plus-circle mr-1"></i>Filter Jadwal', 'id=filter-jadwal class="btn btn-info waves-effect mr-1"') ?> -->
                                    <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                                </div>
                            </div>

                            <!-- <div class="table-responsive"> -->
                            <table id="table-kuota-hadir" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                                <h4 class="modal-title float-right" id="kuota-hadir"></h4>
                                <h4 class="modal-title center"><b>KUOTA HADIR</b></h4>
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="center">No.</th>
                                        <th rowspan="2" class="center">Nama Poli</th>
                                        <th rowspan="2" class="center">Tanggal</th>
                                        <th colspan="3" class="center">Antrian WA</th>
                                        <th colspan="4" class="center">Antrian JKN</th>
                                        <th colspan="4" class="center">Antrian Onsite</th>
                                        <th rowspan="2" class="center">Tidak Daftar</th>
                                        <th rowspan="2" class="center">Terdaftar</th>
                                        <th rowspan="2" class="center">Total</th>
                                        <th rowspan="2" class="center">Jumlah Kuota</th>
                                        <th rowspan="2" class="center"></th>
                                    </tr>
                                    <tr>
                                        <th class="center">S</th>
                                        <th class="center">B</th>
                                        <th class="center">Total</th>
                                        <th class="center">C</th>
                                        <th class="center">CB</th>
                                        <th class="center">B</th>
                                        <th class="center">Total</th>
                                        <th class="center">C</th>
                                        <th class="center">CB</th>
                                        <th class="center">B</th>
                                        <th class="center">Total</th>
                                    </tr>
                                </thead>
                                <!-- <tbody></tbody> -->
                            </table>
                            <!-- </div> -->
                            <div class="row">
                                <div class="col">
                                    <div id="pagination" class="float-left"></div>
                                    <div id="summary" class="float-right text-sm"></div>
                                </div>
                            </div>
                            <small>
                                <ul class="list-unstyled font-weight-bold">
                                    <li> Keterangan :
                                        <ul>
                                            <li>S &nbsp; &nbsp; = Sudah Terlayani dan sudah terdaftar</li>
                                            <li>B &nbsp; &nbsp; = Batal dan tidak terdaftar</li>
                                            <li>C &nbsp; &nbsp; = Sudah Checkin dan sudah terdaftar</li>
                                            <li>CB &nbsp; = Sudah Checkin tidak terdaftar</li>
                                            <li>B &nbsp; &nbsp; = Belum Checkin dan belum terdaftar</li>
                                        </ul>
                                    </li>
                                </ul>
                            </small>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="dashboard-kuota" role="tabpanel" aria-labelledby="dashboard-kuota-tab">
                        <div class="card-body">
                            <div class="col d-flex justify-content-end">
                                <button type="button" id="button-full-screen" class="btn btn-info waves-effect text-right mr-1" onclick="openFullscreen()"><i class="fas fa-fw fa-expand mr-1"></i>Full Screen</button>
                                <button type="button" id="button-full-screen" class="btn btn-danger waves-effect text-right mr-1" onclick="closeFullscreen()"><i class="fas fa-fw fa-compress mr-1 mr-1"></i>Close</button>
                            </div>
                            <div class="float-left">
                                <img src="<?= resource_url() ?>/images/logos/logo-rsud.png" class="modal-title" alt="Logo RSUD" width="80" />
                            </div>
                            <h3 class="modal-title center mt-2"><b id="tanggal-kuota">KUNJUNGAN POLIKLINIK RSUD KOTA TANGERANG</b></h3>
                            <div class="center" id="jam-kuota"></div>
                            <div class="row col d-flex body">
                                <div class="col-lg-12 col-md-6 col-xlg-2 col-xs-12">
                                    <div class="ribbon-wrapper" style="background-color: #00d5ff14;">
                                        <div class="ribbon ribbon-bookmark ribbon-default">Pendaftaran Lantai 1</div>
                                        <div class="col-12">
                                            <div class="row mt-1" style="display: flex; justify-content: center;" id="progress-bar-kuota-lt-1">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-xlg-2 col-xs-12">
                                    <div class="ribbon-wrapper" style="background-color: #0080ff1a;">
                                        <!-- #0089ff08 -->
                                        <div class="ribbon ribbon-bookmark ribbon-default">Pendaftaran Lantai 4</div>
                                        <div class="col-12">
                                            <div class="row mt-1" style="display: flex; justify-content: center;" id="progress-bar-kuota-lt-4">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('modal'); ?>
<?php $this->load->view('js'); ?>