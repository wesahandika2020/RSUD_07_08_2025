<style>
    .btn-container {
		/* display: flex; */
		flex-direction: column;
		gap: 5rem;
		margin: 1% 0;
        
	}

	.btn-container button {
		font-size: 90px;
		border-radius: 20px;
	}

    @media screen and (min-width: 660px) {
        .call-recall{
            gap: 5rem; width: 100%; display: flex; justify-content: center; align-content: center;
        }
    }

    .call-recall{
        gap: 10rem; width: 100%; display: flex; justify-content: center; align-content: center;
    }
</style>

<!-- <meta http-equiv="refresh" content="10; URL=<-?= base_url();?>"> -->
<div class="tab-pane fade show active" id="monitor-antrian-call" role="tabpanel" aria-labelledby="monitor-antrian-call-tab">
    <div class="card-body" style="padding-top: 0px;">

        <div class="row">
            
            <div class="col-lg-12">
                <div class="card-header text-center"> <!--   -->
                    
                    <div class="col-lg-12" style="margin-bottom: 10px;">
                        <button type="button" id="btn-reload" class="btn waves-effect waves-light btn-rounded btn-outline-info" style="width: -webkit-fill-available"><h4 style="margin-bottom: 0px;"><i class="fas fa-history m-r-5"></i>Reload</h4></button>
                    </div>
                    <div class="col-lg-12">
                        <h1><b>PILIH RUANGAN</b></h1>
                        <input type="hidden" id="kode-ruang">
                        <input type="radio" name="id_ruangan_rad" id="ruang_1"  value="5" class="mr-1">     <label id="label_r1"  for="ruang_1"><h3>Ruang 1</h3></label>
                        <input type="radio" name="id_ruangan_rad" id="ruang_2A" value="7" class="mr-1 ml-4"><label id="label_r2a" for="ruang_2A"><h3>Ruang 2A</h3></label>
                        <input type="radio" name="id_ruangan_rad" id="ruang_2B" value="1" class="mr-1 ml-4"><label id="label_r2b" for="ruang_2B"><h3>Ruang 2B</h3></label>
                        <input type="radio" name="id_ruangan_rad" id="ruang_3"  value="4" class="mr-1 ml-4"><label id="label_r3"  for="ruang_3"><h3>Ruang 3</h3></label>
                        <input type="radio" name="id_ruangan_rad" id="ruang_4"  value="8" class="mr-1 ml-4"><label id="label_r4"  for="ruang_4"><h3>Ruang 4</h3></label>
                        <input type="radio" name="id_ruangan_rad" id="ruang_5"  value="3" class="mr-1 ml-4"><label id="label_r5"  for="ruang_5"><h3>Ruang 5</h3></label>
                    </div>
                </div>
            </div>         
        </div>

        <div class="col-lg-12 card-header  text-center">
            <h2><b><span id="nama-ruangan"></span></b></h2>
            <h3><span id="sisa-antrian-pasien"></span></h3>
        </div>
        <div class="card-header">
            <div class="btn-container">
                <div class="call-recall">
                    <div>
                        <h3>No Antrian Berikutnya : <span id="antrian-berikutnya"></span></h3>
                        <button class="btn btn-info bold waves-effect waves-light" style="width : 300px;" id="btn-call">Call</button>
                    </div>

                    <div>
                        <h3>No Antrian Saat Ini : <span id="antrian-sekarang"></span></h3>
                        <button class="btn btn-info bold waves-effect waves-light" style="width : 300px;" id="btn-recall">ReCall</button>
                    </div>
                </div>                    
            </div>
        </div>                
    </div>
</div>
<?php $this->load->view('js_monitor_antrian_call.php'); ?>
