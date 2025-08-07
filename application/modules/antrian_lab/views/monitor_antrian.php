<style>
    #button-full-screen {
        opacity: 0;
    }
    #button-full-screen:hover {
        opacity: 1;
    }

    :-webkit-full-screen {
        background-image: url(resources/images/backgrounds/banner-simrs-v5.gif);
        background-size: cover;
        background-position: center;
        padding: 10px 50px 50px 50px;
    }

    :-ms-fullscreen {
        background-color: Fuchsia;
        padding: 10px 50px 50px 50px;
    }

    :fullscreen {
        background-color: LightBlue;
        padding: 10px 50px 50px 50px;
    }

    .div-style-custom{
        font-size: 40px;
        font-weight: bold;
        text-align: center;
        padding-bottom: 66px;
        padding-top: 66px;
        height:100px;
    }
</style>

<div class="tab-pane fade show active" id="monitor-antrian" role="tabpanel" aria-labelledby="monitor-antrian-tab">
    <div class="card-body" style="padding-top: 0px;">
        <div class="row" id="warp-monitor-antrian">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center"><h2><b>ANTRIAN LABORATORIUM</b></h2></div>
                    <!-- <div class="card-body bg-info p-3" style="font-size: 700%;font-weight: bold;text-align: center; height:200px;"><span class="blinker" id="ruang-panggil"></span></div>
                    <div class="card-footer text-center" style="font-size: 200%;font-weight: bold;text-align: center; padding: 1px ;height:50px;" id="lokasi-ruang"></div> -->

                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-6 ">
                <div class="card">
                    <div class="card-header text-center"><h1 style="background: #FB9678;"><b>RUANG ADMIN</b></h1></div>
                    <div class="card-body bg-info p-3" style="font-size: 700%;font-weight: bold;text-align: center; height:200px;"><span class="blinker" id="ruang-panggil-admin"></span></div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header text-center"><h3><b>A</b></h3></div>
                            <div class="card-body bg-primary p-3 div-style-custom" id="ruang-admin-a"></div>
                            <div class="card-header text-center"><h4><b>Sisa Antrian</b></h4></div>
                            <div class="card-body bg-primary p-3 div-style-custom" id="ruang-admin-a-sisa"></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header text-center"><h3><b>B</b></h3></div>
                            <div class="card-body bg-primary p-3 div-style-custom" id="ruang-admin-b"></div>
                            <div class="card-header text-center"><h4><b>Sisa Antrian</b></h4></div>
                            <div class="card-body bg-primary p-3 div-style-custom" id="ruang-admin-b-sisa"></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header text-center"><h3><b>C</b></h3></div>
                            <div class="card-body bg-primary p-3 div-style-custom" id="ruang-admin-c"></div>
                            <div class="card-header text-center"><h4><b>Sisa Antrian</b></h4></div>
                            <div class="card-body bg-primary p-3 div-style-custom" id="ruang-admin-c-sisa"></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header text-center"><h3><b>D</b></h3></div>
                            <div class="card-body bg-primary p-3 div-style-custom" id="ruang-admin-d"></div>
                            <div class="card-header text-center"><h4><b>Sisa Antrian</b></h4></div>
                            <div class="card-body bg-primary p-3 div-style-custom" id="ruang-admin-d-sisa"></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header text-center"><h3><b>E</b></h3></div>
                            <div class="card-body bg-primary p-3 div-style-custom" id="ruang-admin-e"></div>
                            <div class="card-header text-center"><h4><b>Sisa Antrian</b></h4></div>
                            <div class="card-body bg-primary p-3 div-style-custom" id="ruang-admin-e-sisa"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 ">
                <div class="card">
                    <div class="card-header text-center"><h1 style="background: #FEC107;"><b>RUANG SAMPLING</b></h1></div>
                    <div class="card-body bg-info p-3" style="font-size: 700%;font-weight: bold;text-align: center; height:200px;"><span class="blinker" id="ruang-panggil-sampling"></span></div>
                </div>
                <div class="row">
                    <div class="col">
                    <div class="card">
                        <div class="card-header text-center"><h3><b>A</b></h3></div>
                        <div class="card-body bg-warning p-3 div-style-custom" id="ruang-sampling-a"></div>
                        <div class="card-header text-center"><h4><b>Sisa Antrian</b></h4></div>
                        <div class="card-body bg-warning p-3 div-style-custom" id="ruang-sampling-a-sisa"></div>
                    </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header text-center"><h3><b>B</b></h3></div>
                        <div class="card-body bg-warning p-3 div-style-custom" id="ruang-sampling-b"></div>
                        <div class="card-header text-center"><h4><b>Sisa Antrian</b></h4></div>
                        <div class="card-body bg-warning p-3 div-style-custom" id="ruang-sampling-b-sisa"></div>
                    </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header text-center"><h3><b>C</b></h3></div>
                        <div class="card-body bg-warning p-3 div-style-custom" id="ruang-sampling-c"></div>
                        <div class="card-header text-center"><h4><b>Sisa Antrian</b></h4></div>
                        <div class="card-body bg-warning p-3 div-style-custom" id="ruang-sampling-c-sisa"></div>
                    </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header text-center"><h3><b>D</b></h3></div>
                        <div class="card-body bg-warning p-3 div-style-custom" id="ruang-sampling-d"></div>
                        <div class="card-header text-center"><h4><b>Sisa Antrian</b></h4></div>
                        <div class="card-body bg-warning p-3 div-style-custom" id="ruang-sampling-d-sisa"></div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $this->load->view('js_monitor_antrian.php'); ?>
