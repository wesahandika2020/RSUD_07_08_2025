<!-- // LHOPI -->
<!-- untuk membuat bentuk pilihan terlihat rapi pada shift -->
<style>
    .rounded-select {
        border-radius: 8px; /* Sudut tumpul */
        padding: 2px;       /* Jarak dalam */
        border: 1px solid #ccc; /* Warna border */
        outline: none; /* Menghilangkan outline bawaan */
        font-size: 12px; /* Ukuran font */
        background-color: #fff; /* Warna latar */
    }
    .rounded-select:focus {
        border-color: #007bff; /* Warna border saat fokus */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Efek bayangan saat fokus */
    }
</style>


<div class="modal fade" id="modal_lembar_hand_over_pasien_igd" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<!-- <div class="title">
					<h5 id="modal-lembar-hand-over-pasien-igd-title"></h5>
				</div> -->
                <div class="title">
                    <h5 class="modal-title bold" id="modal-lembar-hand-over-pasien-igd-title">
                        FORM LEMBAR HAND OVER PASIEN IGD RSUD KOTA TANGERANG
                    </h5>
                </div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=lembar-hand-over-pasien-igd class="form-horizontal"') ?>
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-lhopi">
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-lhopi">
				<input type="hidden" name="id_pasien" id="id-pasien-lhopi">
				<input type="hidden" name="id_lhopi" id="id-lhopi">
				<input type="hidden" name="action" id="action-lhopi">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Lengkap</td>
                                    <td wdith="80%">: <span id="nama-pasien-lhopi"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. Rekam Medik</td>
                                    <td>: <span id="no-rm-pasien-lhopi"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tgl-lahir-pasien-lhopi"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-pasien-lhopi"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-lhopi">
                                <div class="form-lembar-hand-over-pasien-igd">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                    id="btn-expand-all-lhopi"><i
                                                        class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left" type="button"
                                                    id="btn-collapse-all-lhopi"><i
                                                        class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                            </td>                        
                                        </tr>                     
                                        <tr>
                                            <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse"
                                                            data-target="#data-lembar-hand-over-pasien-igd"><i
                                                                class="fas fa-expand mr-1"></i>Expand
                                                        </button>
                                                        LEMBAR HAND OVER PASIEN IGD
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-lembar-hand-over-pasien-igd">
                                                <table class="table table-sm table-striped" style="margin-top: -15px">
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Pilih</b></td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td>
                                                            <select id="shift-lhopi" name="shift_lhopi" class="rounded-select">
                                                                <option value="" disabled selected hidden>Shift</option>
                                                                <option value="pagi">Pagi</option>
                                                                <option value="sore">Sore</option>
                                                                <option value="malam">Malam</option>
                                                            </select>  
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>BED</b></td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" name="bed_lhopi" id="bed-lhopi" class="custom-form clear-input d-inline-block col-lg-3">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Nama Pasien</b></td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td>
                                                            <!-- <div class="input-group">
                                                                <input type="text" name="namapasien_lhopi" id="namapasien-lhopi" class="custom-form clear-input d-inline-block col-lg-3"disabled>
                                                            </div> -->
                                                            <span id="namapasien-lhopi"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Diagnosa</b></td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td>
                                                            <textarea name="diagnosa_lhopi" id="diagnosa-lhopi" rows="3" class="form-control clear-input" placeholder=""></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Rencana Tatalaksana</b></td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td>
                                                            <textarea name="rencana_tatalaksana_lhopi" id="rencana-tatalaksana-lhopi" rows="3" class="form-control clear-input" placeholder=""></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Keterangan</b></td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td>
                                                            <textarea name="keterangan_lhopi" id="keterangan-lhopi" rows="3" class="form-control clear-input" placeholder=""></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Tanggal</b></td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td>
												            <input type="text" name="tanggal_lhopi" id="tanggal-lhopi" class="custom-form clear-input d-inline-block col-lg-1">            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>DPJP</b></td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="dpjp_lhopi" id="dpjp-lhopi" class="select2c-input ml-2">           
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Yang Mengoverkan</b></td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="mengoverkan_lhopi" id="mengoverkan-lhopi" class="select2c-input ml-2">           
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Yang Menerima</b></td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="menerima_lhopi" id="menerima-lhopi" class="select2c-input ml-2">           
                                                        </td>
                                                    </tr>                    
                                                </table>
                                                <br>
                                                <table width="100%">
                                                    <tr>
                                                        <td width="79%">
                                                            <div class="col-lg-8">
                                                                <button type="button" class="btn btn-info hide mr-1" onclick="simpanLembarHandOverPasien()" id="btn_simpan"><i class="fas fa-fw fa-plus mr-1"></i>Tambah Lembar Hand Over Pasien</button>
                                                                <button type="button" class="btn btn-secondary" id="btn_reset"><i class="fas fa-history mr-1"></i>Reset Form</button>
									                            <button type="button" class="btn btn-success hide" onclick="simpanLembarHandOverPasien()" id="btn_update_lhopi"> <i class="fas fa-edit mr-1"></i>Update Lembar Hand Over Pasien</button>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <br>
                                                <div class="col-lg">
                                                    <div class="card">
                                                        <table class="table table-sm table-striped table-bordered" id="table-list-lhopi">
                                                            <thead style="background-color: #B0C4DE;">
                                                                <tr>
                                                                    <th width="2%" class="center">No</th>
                                                                    <th width="5%" class="center">Tanggal</th>
                                                                    <th width="5%" class="center">Shift</th>
                                                                    <th width="5%" class="center">BED</th>
                                                                    <th width="5%" class="center">Nama Pasien</th>
                                                                    <th width="10%" class="center">Diagnosa</th>
                                                                    <th width="10%" class="center">Rencana Tatalaksana</th>
                                                                    <th width="10%" class="center">Keterangan</th>
                                                                    <th width="10%" class="center">Yang Mengoverkan</th>
                                                                    <th width="10%" class="center">Yang Menerima</th>
                                                                    <th width="10%" class="center">DPJP</th>
                                                                    <!-- <th width="10%" class="center">Petugas</th> -->
                                                                    <th width="8%" class="center">Alat</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="body-table">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </tr>

                                        <tr>
                                            <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="3" class="center bold td-dark">
                                                        <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                            data-toggle="collapse"
                                                            data-target="#data-rencana-pasien-rujukan-dari-luar"><i
                                                                class="fas fa-expand mr-1"></i>Expand
                                                        </button>
                                                        RENCANA PASIEN RUJUKAN DARI LUAR
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="collapse multi-collapse mt-2" id="data-rencana-pasien-rujukan-dari-luar">
                                                <table class="table table-sm table-striped" style="margin-top: -15px">
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Tanggal / Jam</b></td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td>
                                                            <input type="text" name="tanggal_jam_rprdl" id="tanggal-jam-rprdl" class="custom-form clear-input d-inline-block col-lg-2">            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Nama Pasien</b></td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td>
                                                            <!-- <div class="input-group">
                                                                <input type="text" name="piyeetokihh_nama" id="piyeetokihh-nama" class="custom-form clear-input d-inline-block col-lg-3"disabled>
                                                            </div>   -->
                                                            <span id="piyeetokihh-nama"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Asal Rujukan</b></td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td>
                                                            <textarea name="asalrujukan_rprdl" id="asalrujukan-rprdl" rows="3" class="form-control clear-input" placeholder=""></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Diagnosis</b></td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td>
                                                            <textarea name="diagnosis_rprdl" id="diagnosis-rprdl" rows="3" class="form-control clear-input" placeholder=""></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="2%"></td>
                                                        <td width="15%"><b>Rencana</b></td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td>
                                                            <textarea name="rencana_rprdl" id="rencana-rprdl" rows="3" class="form-control clear-input" placeholder=""></textarea>
                                                        </td>
                                                    </tr>                    
                                                </table>
                                                <br>
                                                <table width="100%">
                                                    <tr>
                                                        <td width="79%">
                                                            <div class="col-lg-8">
                                                                <button type="button" class="btn btn-info mr-1" onclick="simpanRencanaPasienRujukanDariLuar()" id="btn_simpan"><i class="fas fa-fw fa-plus mr-1"></i>Tambah Rencana Pasien Rujukan</button>
                                                                <button type="button" class="btn btn-secondary" id="btn_reset"><i class="fas fa-history mr-1"></i>Reset Form</button>
									                            <button type="button" class="btn btn-success hide" onclick="simpanRencanaPasienRujukanDariLuar()" id="btn_update_rprdl"> <i class="fas fa-edit mr-1"></i>Update Rencana Pasien Rujukan</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <br>
                                                <div class="col-lg">
                                                    <div class="card">
                                                        <table class="table table-sm table-striped table-bordered" id="table-list-rprdl">
                                                            <thead style="background-color: #B0C4DE;">
                                                                <tr>
                                                                    <th width="3%" class="center">No</th>
                                                                    <th width="10%" class="center">Tanggal/Jam</th>
                                                                    <th width="10%" class="center">Nama Pasien</th>
                                                                    <th width="10%" class="center">Asal Rujukan</th>
                                                                    <th width="10%" class="center">Diagnosis</th>
                                                                    <th width="10%" class="center">Rencana</th>
                                                                    <!-- <th width="10%" class="center">Petugas</th> -->
                                                                    <th width="10%" class="center">Alat</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="body-table">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div> 
                                        </tr>
                                    </table>                                     
                                </div>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
			</div>
		</div>
	</div>
</div>