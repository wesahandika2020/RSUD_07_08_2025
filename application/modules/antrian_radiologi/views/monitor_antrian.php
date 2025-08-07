<style>
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

    .div-style-custom{
        font-size: 50px;
        font-weight: bold;
        text-align: center;
        padding-bottom: 66px;
        padding-top: 66px;
        height:100px;
    }
</style>

<!-- <meta http-equiv="refresh" content="10; URL=<-?= base_url();?>"> -->
<div class="tab-pane fade show active" id="monitor-antrian" role="tabpanel" aria-labelledby="monitor-antrian-tab">
    <div class="card-body" style="padding-top: 0px;">

        <!-- <div class="col d-flex justify-content-end"> -->
            <!-- <button type="button" id="button-panggil" class="btn btn-info waves-effect text-right mr-1"><i class="fas fa-fw fa-expand mr-1"></i>TESS</button>
            <button type="button" id="button-full-screen" class="btn btn-info waves-effect text-right mr-1" onclick="openFullscreen()"><i class="fas fa-fw fa-expand mr-1"></i>Full Screen</button>
            <button type="button" id="button-full-screen" class="btn btn-danger waves-effect text-right mr-1" onclick="closeFullscreen()"><i class="fas fa-fw fa-compress mr-1 mr-1"></i>Close</button>            
            <div class="card-header text-center" id="testing"><h3><b></b></h3></div>
            <div class="card-header text-center" id="ispanggil"><h3><b></b></h3></div> -->
        <!-- </div> -->

        <div class="row" id="warp-monitor-antrian">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center"><h3><b>ANTRIAN RADIOLOGI</b></h3></div>
                    <div class="card-body bg-info p-3" style="font-size: 700%;font-weight: bold;text-align: center; height:200px;"><span class="blinker" id="ruang-panggil"></span></div>
                    <div class="card-footer text-center" style="font-size: 200%;font-weight: bold;text-align: center; padding: 1px ;height:50px;" id="lokasi-ruang"></div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header text-center"><h3><b>RUANG 1</b></h3></div>
                    <div class="card-body bg-primary p-3 div-style-custom" id="ruang1"></div>
                    <div hidden class="card-header text-center"><h4><b>BERIKUTNYA</b></h4></div>
                    <div hidden class="card-body bg-primary p-3 div-style-custom" id="ruang1-tunda"></div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-header text-center"><h3><b>RUANG 2A</b></h3></div>
                    <div class="card-body bg-warning p-3 div-style-custom" id="ruang2a"></div>
                    <div hidden class="card-header text-center"><h4><b>BERIKUTNYA</b></h4></div>
                    <div hidden class="card-body bg-warning p-3 div-style-custom" id="ruang2a-tunda"></div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-header text-center"><h3><b>RUANG 2B</b></h3></div>
                    <div class="card-body bg-primary p-3 div-style-custom" id="ruang2b"></div>
                    <div hidden class="card-header text-center"><h4><b>BERIKUTNYA</b></h4></div>
                    <div hidden class="card-body bg-primary p-3 div-style-custom" id="ruang2b-tunda"></div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-header text-center"><h3><b>RUANG 3</b></h3></div>
                    <div class="card-body bg-warning p-3 div-style-custom" id="ruang3"></div>
                    <div hidden class="card-header text-center"><h4><b>BERIKUTNYA</b></h4></div>
                    <div hidden class="card-body bg-warning p-3 div-style-custom" id="ruang3-tunda"></div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-header text-center"><h3><b>RUANG 4</b></h3></div>
                    <div class="card-body bg-primary p-3 div-style-custom" id="ruang4"></div>
                    <div hidden class="card-header text-center"><h4><b>BERIKUTNYA</b></h4></div>
                    <div hidden class="card-body bg-primary p-3 div-style-custom" id="ruang4-tunda"></div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header text-center"><h3><b>RUANG 5</b></h3></div>
                    <div class="card-body bg-warning p-3 div-style-custom" id="ruang5"></div>
                    <div hidden class="card-header text-center"><h4><b>BERIKUTNYA</b></h4></div>
                    <div hidden class="card-body bg-warning p-3 div-style-custom" id="ruang5-tunda"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('js_monitor_antrian.php'); ?>
