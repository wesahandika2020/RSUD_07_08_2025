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

    .div-style-custom{
        font-size: 40px;
        font-weight: bold;
        text-align: center;
        padding-bottom: 66px;
        padding-top: 66px;
        height:100px;
    }
</style>

<div class="tab-pane fade show active" id="monitor-antrian-call" role="tabpanel" aria-labelledby="monitor-antrian-call-tab">
    <div class="card-body" style="padding-top: 0px;">

        <div class="row">
            
            <div class="col-lg-12">
                <div class="card-header text-center">                     
                    <div class="col-lg-12" style="margin-bottom: 10px;">
                        <button type="button" id="btn-reload" class="btn waves-effect waves-light btn-rounded btn-outline-info" style="width: -webkit-fill-available"><h4 style="margin-bottom: 0px;"><i class="fas fa-history m-r-5"></i>Reload</h4></button>
                    </div>
                    
                    <div class="btn-container">
                        <div class="call-recall">
                            <div>
                                <button class="btn btn-info bold waves-effect waves-light" style="width : 300px;" id="btn-call">Call</button>
                            </div>
                            <div>
                                <button class="btn btn-info bold waves-effect waves-light" style="width : 300px;" id="btn-recall">ReCall</button>
                            </div>
                        </div>                    
                    </div>
                    
                    <input type="hidden" id="kode-ruang">
                    <h1><b>PILIH KODE</b></h1>
                    <div class="row">
                        <div class="col">
                            <div class="card" style="background: lightgrey;">
                                <div >
                                    <input type="radio" name="id_kode" id="kode-a" value="a" class="mr-1">
                                    <label style="padding-top: 8px;" for="kode-a"><h3> <b>KODE A - Poli Umum</b></h3></label>
                                </div>
                                <div class="card-header text-center"><h4><b>No Antrian</b></h4></div>
                                <div class="card-body p-3 div-style-custom" id="ruang-sampling-a"></div>
                                <div class="card-header text-center"><h4><b>Sisa Antrian</b></h4></div>
                                <div class="card-body p-3 div-style-custom" id="ruang-sampling-a-sisa"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="background: lightgrey;">
                                <div>
                                    <input type="radio" name="id_kode" id="kode-b" value="b" class="mr-1">
                                    <label style="padding-top: 8px;" for="kode-b"><h3> <b>KODE B - Poli Khusus</b></h3></label>
                                </div>
                                <div class="card-header text-center"><h4><b>No Antrian</b></h4></div>
                                <div class="card-body p-3 div-style-custom" id="ruang-sampling-b"></div>
                                <div class="card-header text-center"><h4><b>Sisa Antrian</b></h4></div>
                                <div class="card-body p-3 div-style-custom" id="ruang-sampling-b-sisa"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="background: lightgrey;">
                                <div>
                                    <input type="radio" name="id_kode" id="kode-c" value="c" class="mr-1">
                                    <label style="padding-top: 8px;" for="kode-c"><h3> <b>KODE C - Cito</b></h3></label>
                                </div>
                                <div class="card-header text-center"><h4><b>No Antrian</b></h4></div>
                                <div class="card-body p-3 div-style-custom" id="ruang-sampling-c"></div>
                                <div class="card-header text-center"><h4><b>Sisa Antrian</b></h4></div>
                                <div class="card-body p-3 div-style-custom" id="ruang-sampling-c-sisa"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card" style="background: lightgrey;">
                                <div>
                                    <input type="radio" name="id_kode" id="kode-d" value="d" class="mr-1">
                                    <label style="padding-top: 8px;" for="kode-d"><h3> <b>KODE D - Prioritas</b></h3></label>
                                </div>
                                <div class="card-header text-center"><h4><b>No Antrian</b></h4></div>
                                <div class="card-body p-3 div-style-custom" id="ruang-sampling-d"></div>
                                <div class="card-header text-center"><h4><b>Sisa Antrian</b></h4></div>
                                <div class="card-body p-3 div-style-custom" id="ruang-sampling-d-sisa"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>         
        </div>           
    </div>
</div>

<!-- Modal Konfirmasi Sampling Antrian Laboratorium -->
<div id="modal-konfirmasi-sampling" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-konfirmasi-sampling-label"></h3>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-konfirmasi-sampling-lab'); ?>
				<div class="form-group tight">
					<input type="hidden" id="konfrim-nama-ruangan-sampling">
					<input type="hidden" id="konfrim-kode-antrian-sampling">
					<input type="hidden" id="konfrim-type-sampling">
                	<h4>Apakah anda yakin ingin memanggil pasien ??</h4>
					<div class="btn-call-container">
						<button type="button" class="btn btn-info bold waves-effect waves-light" onclick="btnKonfirmasiSampling()"><i class="fas fa-check-circle mr-1" id="btn-konfirmasi-sampling"></i> </button>
					</div>
                </div>
                <?= form_close(); ?>
            </div>
            <!-- <div class="modal-footer">
				
            </div> -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Konfirmasi Antrian Laboratorium -->

<style>
	.btn-call-container {
		display: flex;
		flex-direction: column;
		gap: 1rem;
		margin: 2rem 0;
	}

	.btn-call-container button {
		font-size: 20px;
		border-radius: 10px;
	}
</style>

<?php $this->load->view('js_call_sampling.php'); ?>