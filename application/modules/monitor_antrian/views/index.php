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
        background-image: url(resources/images/backgrounds/banner-simrs-v5.gif);
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
            <div class="tab-pane fade show active" id="monitor-antrian" role="tabpanel" aria-labelledby="monitor-antrian-tab">
                <div class="card-body">
                    <div class="col d-flex justify-content-end">
                        <button type="button" id="button-full-screen" class="btn btn-info waves-effect text-right mr-1" onclick="openFullscreen()"><i class="fas fa-fw fa-expand mr-1"></i>Full Screen</button>
                        <button type="button" id="button-full-screen" class="btn btn-danger waves-effect text-right mr-1" onclick="closeFullscreen()"><i class="fas fa-fw fa-compress mr-1 mr-1"></i>Close</button>
                    </div>
                    <div class="float-left">
                        <img src="<?= resource_url() ?>/images/logos/logo-rsud.png" class="modal-title" alt="Logo RSUD" width="80" />
                    </div>
                    <h3 class="modal-title center mt-2"><b id="label-monitor-antrian"></b></h3>
                    <div class="center" id="jam-antrian"></div>

                    <div class="row mt-5 col d-flex body" style="display: flex; justify-content: center;">
                        <div class="col-lg-2 col-md-6 col-xlg-12 col-xs-12">
                            <div class="ribbon-wrapper card" style="height: 300px; background-color: #cdb4db;">
                                <div class="ribbon ribbon-bookmark ribbon-white">
                                    <h3><b>LOKET 1</b></h3>
                                </div>
                                <div class="center mt-2" style="display: flex; justify-content: center;">
                                    <h3 class="ribbon-content center" id="loket-satu"></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-xlg-12 col-xs-12">
                            <div class="ribbon-wrapper card" style="height: 300px; background-color: #ffc8dd;">
                                <div class="ribbon ribbon-bookmark ribbon-white">
                                    <h3><b>LOKET 2</b></h3>
                                </div>
                                <div class="center mt-2" style="display: flex; justify-content: center;">
                                    <h3 class="ribbon-content center" id="loket-dua"></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-xlg-12 col-xs-12">
                            <div class="ribbon-wrapper card" style="height: 300px; background-color: #c1fba4;">
                                <div class="ribbon ribbon-bookmark ribbon-white">
                                    <h3><b>LOKET 3</b></h3>
                                </div>
                                <div class="center mt-2" style="display: flex; justify-content: center;">
                                    <h3 class="ribbon-content center" id="loket-tiga"></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-xlg-12 col-xs-12">
                            <div class="ribbon-wrapper card" style="height: 300px; background-color: #bde0fe;">
                                <div class="ribbon ribbon-bookmark ribbon-white">
                                    <h3><b>LOKET 4</b></h3>
                                </div>
                                <div class="center mt-2" style="display: flex; justify-content: center;">
                                    <h3 class="ribbon-content center" id="loket-empat"></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-xlg-12 col-xs-12">
                            <div class="ribbon-wrapper card" style="height: 300px; background-color: #809bce;">
                                <div class="ribbon ribbon-bookmark ribbon-white">
                                    <h3><b>LOKET 5</b></h3>
                                </div>
                                <div class="center mt-2" style="display: flex; justify-content: center;">
                                    <h3 class="ribbon-content center" id="loket-lima"></h3>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-1 col d-flex body" style="display: flex; justify-content: center;">
                        <div class="col-lg-2 col-md-6 col-xlg-12 col-xs-12">
                            <div class="ribbon-wrapper card" style="height: 300px; background-color: #adc178;">
                                <div class="ribbon ribbon-bookmark ribbon-white">
                                    <h3><b>LOKET 6</b></h3>
                                </div>
                                <div class="center mt-2" style="display: flex; justify-content: center;">
                                    <h3 class="ribbon-content center" id="loket-enam"></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-xlg-12 col-xs-12">
                            <div class="ribbon-wrapper card" style="height: 300px; background-color: #ffee93;">
                                <div class="ribbon ribbon-bookmark ribbon-white">
                                    <h3><b>LOKET 7</b></h3>
                                </div>
                                <div class="center mt-2" style="display: flex; justify-content: center;">
                                    <h3 class="ribbon-content center" id="loket-tujuh"></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-xlg-12 col-xs-12">
                            <div class="ribbon-wrapper card" style="height: 300px; background-color: #a2d2ff;">
                                <div class="ribbon ribbon-bookmark ribbon-white">
                                    <h3><b>LOKET 8</b></h3>
                                </div>
                                <div class="center mt-2" style="display: flex; justify-content: center;">
                                    <h3 class="ribbon-content center" id="loket-delapan"></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-xlg-12 col-xs-12">
                            <div class="ribbon-wrapper card" style="height: 300px; background-color: #95b8d1;">
                                <div class="ribbon ribbon-bookmark ribbon-white">
                                    <h3><b>LOKET 9</b></h3>
                                </div>
                                <div class="center mt-2" style="display: flex; justify-content: center;">
                                    <h3 class="ribbon-content center" id="loket-sembilan"></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-xlg-12 col-xs-12">
                            <div class="ribbon-wrapper card" style="height: 300px; background-color: #ffafcc;">
                                <div class="ribbon ribbon-bookmark ribbon-white">
                                    <h3><b>LOKET 10</b></h3>
                                </div>
                                <div class="center mt-2" style="display: flex; justify-content: center;">
                                    <h3 class="ribbon-content center" id="loket-sepuluh"></h3>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js'); ?>