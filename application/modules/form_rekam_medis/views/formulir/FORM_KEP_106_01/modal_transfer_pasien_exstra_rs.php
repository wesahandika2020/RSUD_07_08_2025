
<!-- // TPERS-->
<div class="modal fade" id="modal-transfer-pasien-exstra-rs" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
				<div class="title">
					<h5 id="modal-transfer-pasien-exstra-rs-title"><b>FORM TRANSFER PASIEN EXSTRA RUMAH SAKIT</b></h5>
				</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<?= form_open('', 'id=form-transfer-pasien-exstra-rs class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-tpers">
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-tpers">
				<input type="hidden" name="id_pasien" id="id-pasien-tpers">	

                <input type="hidden" name="id_tpers" id="id-tpers">

				<input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">  
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-tpers"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="norm-pasien-tpers"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="ttl-pasien-tpers"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jk-pasien-tpers"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard_form_ranap">
                                <div class="form-transfer-pasien-exstra-rs">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"id="btn_expand_all_tpers"><i
                                                        class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left" type="button"id="btn_collapse_all_tpers"><i
                                                        class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                            </td>
                                        </tr>
										<br>    
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"data-toggle="collapse"
                                                        data-target="#data-transfer-pasien-ekstra-rs"><i class="fas fa-expand mr-1"></i>Expand</button> RINGKASAN PASIEN
                                                </td>
                                            </tr>
                                        </table>
                            
                                        <tr>
                                            <div class="collapse multi-collapse mt-2" id="data-transfer-pasien-ekstra-rs">                                              
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td width="20%" class="bold">Tanggal Masuk </td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="50%">
                                                                    <input type="text" name="tgl_masuk_tpers" id="tgl-masuk-tpers"class="custom-form clear-input d-inline-block col-lg-4"disabled>&nbsp;&nbsp;&nbsp;
                                                                    <b>Tanggal Pindah &nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;</b><input type="text" name="tgl_pindah_tpers" id="tgl-pindah-tpers"class="custom-form clear-input d-inline-block col-lg-4" disabled>
                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold">Unit Kerja</td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="50%">
                                                                    <input type="text" name="unit_tpers" id="unit-tpers"class="custom-form clear-input d-inline-block col-lg-4" disabled>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold">Staf yang kontak tanggal dan pukul</td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="50%">
                                                                    <input type="text" name="staf_tpers" id="staf-tpers"class="custom-form clear-input d-inline-block col-lg-4">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold">Nama</td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="50%">
                                                                    <input type="text" name="nama_tpers" class="select2c-input ml-2" id="nama-tpers">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%"><b>Transportasi</b></td>
                                                                <td width="1%" class="center"><b>:</b></td>
                                                                <td width="50%">
                                                                    <input type="checkbox" name="transportasi_tpers_1"id="transportasi-tpers-1" value="1"class="mr-1"> Ambulance RS
                                                                    <input type="checkbox" name="transportasi_tpers_2"id="transportasi-tpers-2" value="1"class="mr-1 ml-3"> Ambulance Luar
                                                                    <input type="checkbox" name="transportasi_tpers_3"id="transportasi-tpers-3" value="1"class="mr-1 ml-3"> Kendaraan Pribadi
                                                                </td>                 
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold">Alasan merujuk</td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="50%">
                                                                    <input type="checkbox" name="alasan_tpers_1"id="alasan-tpers-1" value="1"class="mr-1"> Fasilitas tidak memadai dengan kebutuhan  
                                                                    <input type="checkbox" name="alasan_tpers_2"id="alasan-tpers-2" value="1"class="mr-1 ml-3"> Tidak ada tempai di ICU
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold"></td>
                                                                <td width="1%" class="bold"></td>
                                                                <td width="50%">
                                                                    <input type="checkbox" name="alasan_tpers_3"id="alasan-tpers-3" value="1"class="mr-1"> Permintaan pasien atau keluarga
                                                                    <input type="checkbox" name="alasan_tpers_4"id="alasan-tpers-4" value="1"class="mr-1 ml-3"> Ruang rawat inap penuh
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold"></td>
                                                                <td width="1%" class="bold"></td>
                                                                <td width="50%">
                                                                    <input type="checkbox" name="alasan_tpers_5"id="alasan-tpers-5" value="1"class="mr-1"> lain-lain 
                                                                    <input type="text" name="alasan_tpers_6" id="alasan-tpers-6"class="custom-form clear-input d-inline-block col-lg-8">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="bold">Dokter yang merujuk (DPJP)</td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="50%">
                                                                    <input type="text" name="dokter_dpjp_tpers" class="select2c-input ml-2" id="dokter-dpjp-tpers">
                                                                </td>
                                                            </tr>                                                                                                                                                            
                                                        </table>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                            <tr>
                                                                <td width="20%" class="bold"> <input type="checkbox" name="ceklis_tpers_1"id="ceklis-tpers-1" value="1"class="mr-1"> &nbsp; Rumah sakit yang dituju  </td> 
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="50%">
                                                                    <input type="text" name="rs_dituju_tpers" id="rs-dituju-tpers"class="custom-form clear-input d-inline-block col-lg-8">
                                                                </td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="20%" class="bold"> <input type="checkbox" name="ceklis_tpers_2"id="ceklis-tpers-2" value="1"class="mr-1"> &nbsp; Ruangan yang di pesan  </td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="50%">
                                                                    <input type="text" name="ruang_tpers" id="ruang-tpers"class="custom-form clear-input d-inline-block col-lg-8">
                                                                </td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="20%" class="bold"> <input type="checkbox" name="ceklis_tpers_3"id="ceklis-tpers-3" value="1"class="mr-1"> &nbsp; Dokter spesialis yang dituju  </td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="50%">
                                                                    <input type="text" name="dokter_sp_tpers" id="dokter-sp-tpers"class="custom-form clear-input d-inline-block col-lg-8">
                                                                </td>
                                                            </tr> 

                                                            <tr>
                                                                <td width="20%" class="bold">Staf yang menerima kontak </td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="50%">
                                                                </td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="20%" class="bold">Nama </td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="50%">
                                                                    <input type="text" name="nama_staf_tpers" id="nama-staf-tpers"class="custom-form clear-input d-inline-block col-lg-8">
                                                                </td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="20%" class="bold">No. Telepon</td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="50%">
                                                                    <input type="text" name="no_staf_tpers" id="no-staf-tpers"class="custom-form clear-input d-inline-block col-lg-8">
                                                                </td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="20%" class="bold">Jika memakai ambulance RS berangkat pukul</td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="50%">
                                                                    <input type="text" name="jika_staf_tpers" id="jika-staf-tpers"class="custom-form clear-input d-inline-block col-lg-8">
                                                                </td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="20%" class="bold">Tiba di tempat pukul</td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="50%">
                                                                    <input type="text" name="tiba_staf_tpers" id="tiba-staf-tpers"class="custom-form clear-input d-inline-block col-lg-8">
                                                                </td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="20%" class="bold">Pendamping</td>
                                                                <td width="1%" class="bold"></td>
                                                                <td width="50%">
                                                                </td>
                                                            </tr> 
                                                            <tr>
                                                                <td width="20%" class="bold">  <input type="checkbox" name="ceklis_tpers_4"id="ceklis-tpers-4" value="1"class="mr-1"> &nbsp; Dokter </td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="50%">
                                                                    <input type="text" name="dokter_pendamping_tpers" class="select2c-input ml-2" id="dokter-pendamping-tpers">
                                                                </td>
                                                            </tr> 

                                                            <tr>
                                                                <td width="20%" class="bold"> <input type="checkbox" name="ceklis_tpers_5"id="ceklis-tpers-5" value="1"class="mr-1"> &nbsp; Perawat  </td>
                                                                <td width="1%" class="bold">:</td>
                                                                <td width="50%">
                                                                    <input type="text" name="perawat_pendamping_tpers" class="select2c-input ml-2" id="perawat-pendamping-tpers">
                                                                </td>
                                                            </tr> 

                                                            <tr>
                                                                <td width="20%" class="bold">
                                                                    <input type="checkbox" name="kel_tpers"id="kel-tpers" value="1"class="mr-1"> &nbsp; Keluarga &nbsp; &nbsp;
                                                                    <input type="checkbox" name="tidak_ada_tpers"id="jtidak-ada-tpers" value="1"class="mr-1"> &nbsp; Tidak ada
                                                                </td>
                                                                <td width="1%" class="bold"></td>
                                                                <td width="50%"></td>
                                                            </tr> 
                                                        </table>
                                                    </div>    
                                                </div>  

                                                <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                    <tr>
                                                        <td width="100%">
                                                            <table class="table table-sm table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="center" colspan="5"></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="10%"  class="center"></th>
                                                                        <th width="10%" class="center"></th>
                                                                        <th width="10%" class="center"><b>CATATAN KLINIS</b></th>
                                                                        <th width="10%" class="center"></th>
                                                                        <th width="10%" class="center"></th>            
                                                                    </tr>
                                                                </thead>
                                                            </table>

                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="2%" class="center"><b>1</td>
                                                                        <td width="15%" class="bold"> Indikasi Masuk RS</td>
                                                                        <td width="1%" class="bold">:</td>
                                                                        <td width="50%">
                                                                            <textarea name="indikasi_tpers" cols="30" rows="3" class="form-control clear-input custom-textarea" id="indikasi-tpers"></textarea>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="2%" class="center"><b>2</td>
                                                                        <td width="15%" class="bold"> Riwayat Kesehatan</td>
                                                                        <td width="1%" class="bold">:</td>
                                                                        <td width="50%">
                                                                            <textarea name="riwayat_kesehatan_tpers" cols="30" rows="3" class="form-control clear-input custom-textarea" id="riwayat-kesehatan-tpers"></textarea>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="2%" class="center"><b>3</td>
                                                                        <td width="15%" class="bold"> Alergi</td>
                                                                        <td width="1%" class="bold">:</td>
                                                                        <td width="50%">
                                                                            <input type="checkbox" name="alergi_tpers_1"id="alergi-tpers-1" value="1"class="mr-1"> Tidak 
                                                                            <input type="checkbox" name="alergi_tpers_2"id="alergi-tpers-2" value="1"class="mr-1 ml-3"> Ya
                                                                            <textarea name="alergi_tpers_3" cols="30" rows="3" class="form-control clear-input custom-textarea" id="alergi-tpers-3"></textarea>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- ini datanya narik -->
                                                                    <tr>
                                                                        <td width="2%" class="center"><b>4</td>
                                                                        <td width="15%" class="bold"> Diagnosa Medis</td>
                                                                        <td width="1%" class="bold">:</td>
                                                                        <td width="50%">
                                                                            <label id="diagnosis-utama-rm"></label>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- ini datanya narik -->
                                                                    <tr>
                                                                        <td width="2%" class="center"><b></td>
                                                                        <td width="15%" class="bold"> Diagnosa Sekunder</td>
                                                                        <td width="1%" class="bold">:</td>
                                                                        <td width="50%">
                                                                            <label id="diagnosis-sekunder-rm"></label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="2%" class="center"></td>
                                                                        <td width="15%" class="bold">Terapi/Tindakan/Pengobatan serta hasil konsultasi selama di RSUD Kota Tangerang</td>
                                                                        <td width="1%" class="bold">:</td>
                                                                        <td width="50%">
                                                                            <input type="checkbox" name="terapi_tpers_1"id="terapi-tpers-1" value="1"class="mr-1"> Tidak ada
                                                                            <input type="checkbox" name="terapi_tpers_2"id="terapi-tpers-2" value="1"class="mr-1 ml-3"> Ada
                                                                            <textarea name="terapi_tpers_3" cols="30" rows="3" class="form-control clear-input custom-textarea" id="terapi-tpers-3"></textarea>                                                   
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                            <!-- DATANYA NARIKK -->
                                                            <table class="table table-sm table-striped table-bordered" id="table-terapi-rm" style="margin-top: -15px">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="center" rowspan="2"><b>No</b></th>
                                                                        <th class="center" rowspan="2"><b>Nama Obat</b></th>
                                                                        <th class="center" rowspan="2"><b>Jumlah</b></th>
                                                                        <th class="center" rowspan="2"><b>Dosis</b></th>
                                                                        <th class="center" rowspan="2"><b>Frekuensi</b></th>
                                                                        <th class="center" rowspan="2"><b>Cara Pemberian</b></th>
                                                                        <th class="center" colspan="6"><b>Jam Pemberian</b></th>
                                                                        <th class="center" rowspan="2"><b>Petunjuk Khusus</b></th>
                                                                        <th class="center" rowspan="2">Petugas</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="center">a</th>
                                                                        <th class="center">b</th>
                                                                        <th class="center">c</th>
                                                                        <th class="center">d</th>
                                                                        <th class="center">e</th>
                                                                        <th class="center">f</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>                                                         

                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>                                                              
                                                                    <tr>
                                                                        <td width="2%" class="center"><b>5</td>
                                                                        <td width="15%" class="bold"> Riwayat Penyakit </td>
                                                                        <td width="1%" class="bold">:</td>
                                                                        <td width="50%">
                                                                            <input type="checkbox" name="rw_penyakit_tpers_1"id="rw-penyakit-tpers-1" value="1"class="mr-1"> Tidak ada 
                                                                            <input type="checkbox" name="rw_penyakit_tpers_2"id="rw-penyakit-tpers-2" value="1"class="mr-1 ml-3"> Ada
                                                                            <textarea name="rw_penyakit_tpers_3" cols="30" rows="3" class="form-control clear-input custom-textarea" id="rw-penyakit-tpers-3"></textarea>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="2%" class="center"><b>6</td>
                                                                        <td width="15%" class="bold"> Intake oral terakhir kapan</td>
                                                                        <td width="1%" class="bold">:</td>
                                                                        <td width="50%">
                                                                            <textarea name="intake_tpers" cols="30" rows="3" class="form-control clear-input custom-textarea" id="intake-tpers"></textarea>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>                                                              
                                                                    <tr>
                                                                        <td><b>Kondisi</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                            <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                                <tr>
                                                                    <td width="2%" class="center"><b>1</td>
                                                                    <td width="10%" class="bold">Kesadaran</td>
                                                                    <td width="1%" class="bold">:</td>
                                                                    <td width="40%">
                                                                        <b>GCS &nbsp; &nbsp;: 
                                                                        <b>E <input type="text" name="E_tpers" id="E-tpers"class="custom-form clear-input d-inline-block col-lg-1">&nbsp; &nbsp;
                                                                        <b>V <input type="text" name="V_tpers" id="V-tpers"class="custom-form clear-input d-inline-block col-lg-1">&nbsp; &nbsp;
                                                                        <b>M <input type="text" name="M_tpers" id="M-tpers"class="custom-form clear-input d-inline-block col-lg-1">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                                                                        <b>Pupil : <input type="text" name="pupil_tpers" id="pupil-tpers"class="custom-form clear-input d-inline-block col-lg-1"> mm &nbsp; &nbsp;
                                                                        <b>Reflek cahaya <input type="text" name="reflek_tpers_1" id="reflek-tpers-1"class="custom-form clear-input d-inline-block col-lg-1">
                                                                        <b>/<input type="text" name="reflek_tpers_2" id="reflek-tpers-2"class="custom-form clear-input d-inline-block col-lg-1">&nbsp; &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="2%" class="center"><b></td>
                                                                    <td width="10%" class="bold"></td>
                                                                    <td width="1%" class="bold"></td>
                                                                    <td width="40%">
                                                                        <b>TD : <input type="text" name="td_tpers_1" id="td-tpers-1"class="custom-form clear-input d-inline-block col-lg-1">
                                                                        <b>/<input type="text" name="td_tpers_2" id="td-tpers-2"class="custom-form clear-input d-inline-block col-lg-1"> mmHg&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <b>Nadi : <input type="text" name="nadi_tpers" id="nadi-tpers"class="custom-form clear-input d-inline-block col-lg-1"> x/menit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <b>Suhu : <input type="text" name="suhu_tpers" id="suhu-tpers"class="custom-form clear-input d-inline-block col-lg-1"> ℃ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <b>Pernafasan : <input type="text" name="pf_tpers" id="pf-tpers"class="custom-form clear-input d-inline-block col-lg-1"> x/menit                        
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="2%" class="center"><b>2</td>
                                                                    <td width="10%" class="bold">Pasien memakai peralatan medis</td>
                                                                    <td width="1%" class="bold">:</td>
                                                                    <td width="40%">
                                                                        <input type="checkbox" name="pasien_mmberi_tpers_1"id="pasien-mmberi-tpers-1" value="1"class="mr-1"> Tidak 
                                                                        <input type="checkbox" name="pasien_mmberi_tpers_2"id="pasien-mmberi-tpers-2" value="1"class="mr-1 ml-3"> Ya,
                                                                        <input type="checkbox" name="infus_tpers"id="infus-tpers" value="1"class="mr-1 ml-3"> Infus
                                                                        <input type="checkbox" name="ett_tpers"id="ett-tpers" value="1"class="mr-1 ml-3"> ETT
                                                                        <input type="checkbox" name="oksigen_tpers"id="oksigen-tpers" value="1"class="mr-1 ml-3"> Oksigen
                                                                        <input type="checkbox" name="cvc_tpers"id="cvc-tpers" value="1"class="mr-1 ml-3"> CVC
                                                                        <input type="checkbox" name="kateter_tpers"id="kateter-tpers" value="1"class="mr-1 ml-3"> Kateter
                                                                        <input type="checkbox" name="bidai_tpers"id="bidai-tpers" value="1"class="mr-1 ml-3"> Bidai
                                                                        <input type="checkbox" name="pupm_tpers"id="pupm-tpers" value="1"class="mr-1 ml-3"> Pupm
                                                                        <input type="checkbox" name="lain_tpers"id="lain-tpers" value="1"class="mr-1 ml-3"> Lain-lain
                                                                        <input type="text" name="peralatan_tpers" id="peralatan-tpers"class="custom-form clear-input d-inline-block col-lg-3">
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>  

                                                <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                    <tr>
                                                        <td width="10%" class="bold"> Pemeriksaan Penunjang Diagnostik </td>
                                                        <td width="1%" class="bold"></td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td width="40%">
                                                            <input type="checkbox" name="pp_dianostik_1"id="pp-dianostik-1" value="1"class="mr-1"> Tidak ada 
                                                            <input type="checkbox" name="pp_dianostik_2"id="pp-dianostik-2" value="1"class="mr-1 ml-3"> Ada
                                                            <textarea name="pp_dianostik_3" cols="30" rows="3" class="form-control clear-input custom-textarea" id="pp-dianostik-3"></textarea>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                     <tr>
                                                        <td width="15%" class="bold">PJ SHIFT</td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td width="50%">
                                                            <input type="text" name="pj_shift_tpers" class="select2c-input ml-2" id="pj-shift-tpers">
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <td width="15%" class="bold">Dokter Pemeriksa</td>
                                                        <td width="1%" class="bold">:</td>
                                                        <td width="50%">
                                                            <input type="text" name="dokter_pem_tpers" class="select2c-input ml-2" id="dokter-pem-tpers">
                                                        </td>
                                                    </tr>
                                                </table>                                               
                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                                                    <button type="button" class="btn btn-info" onclick="CetakTransferPasienEkstraRumahSakit()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
                                                </div>

                                            </div>
                                        </tr>


                                                                                        
                                        

										<table class="table table-no-border table-sm table-striped"
											style="margin-top:-15px">
											<tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button"
														data-toggle="collapse"
														data-target="#data-obvervasi-pasien"><i
														class="fas fa-expand mr-1"></i>Expand</button>OBSERVASI PASIEN SAAT TRANSFER
												</td>
											</tr>
										</table>
										<div class="collapse multi-collapse" id="data-obvervasi-pasien">
                                            <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                <tr>
                                                    <td width="100%">
                                                        <table class="table table-sm table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" colspan="8"><b></b></th>
                                                                </tr>
                                                                <tr>
                                                                    <th width="10%" class="center"><b>Tgl/jam</b></th>
                                                                    <th width="10%" class="center"><b>Keadaan Pasien</b></th>
                                                                    <th width="5%" class="center"><b>TD</b></th>
                                                                    <th width="5%" class="center"><b>N</b></th>
                                                                    <th width="5%" class="center"><b>RR</b></th>
                                                                    <th width="5%"  class="center"><b>S</b></th>               
                                                                    <th width="7%"  class="center"><b>Sp02</b></th>               
                                                                    <th width="10%"  class="center"><b>Oksigen ventilasi</b></th>               
                                                                    <th width="10%"  class="center"><b>Tindakan</b></th>               
                                                                    <th width="10%"  class="center"><b>Evaluasi</b></th>               
                                                                    <th width="20%"  class="center"><b>Nama Petugas</b></th>               
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <tr>
                                                                    <td class="center"> 
                                                                        <input type="text" name="tgl_opst_1" id="tgl-opst-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="keadaan_opst_1" id="keadaan-opst-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="td_opst_1" id="td-opst-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="n_opst_1" id="n-opst-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="rr_opst_1" id="rr-opst-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="s_opst_1" id="s-opst-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="sp02_opst_1" id="sp02-opst-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="oksigen_opst_1" id="oksigen-opst-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="tindakan_opst_1" id="tindakan-opst-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="evaluasi_opst_1" id="evaluasi-opst-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center"> 
                                                                        <input type="text" name="petugas_opst_1" id="petugas-opst-1" class="select2c-input ml-2">
                                                                    </td>                                                                   
                                                                </tr>



                                                                <tr>
                                                                    <td class="center"> 
                                                                        <input type="text" name="tgl_opst_2" id="tgl-opst-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="keadaan_opst_2" id="keadaan-opst-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="td_opst_2" id="td-opst-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="n_opst_2" id="n-opst-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="rr_opst_2" id="rr-opst-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="s_opst_2" id="s-opst-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="sp02_opst_2" id="sp02-opst-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="oksigen_opst_2" id="oksigen-opst-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="tindakan_opst_2" id="tindakan-opst-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="evaluasi_opst_2" id="evaluasi-opst-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center"> 
                                                                        <input type="text" name="petugas_opst_2" id="petugas-opst-2" class="select2c-input ml-2">
                                                                    </td>                                                                   
                                                                </tr>



                                                                <tr>
                                                                    <td class="center"> 
                                                                        <input type="text" name="tgl_opst_3" id="tgl-opst-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="keadaan_opst_3" id="keadaan-opst-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="td_opst_3" id="td-opst-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="n_opst_3" id="n-opst-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="rr_opst_3" id="rr-opst-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="s_opst_3" id="s-opst-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="sp02_opst_3" id="sp02-opst-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="oksigen_opst_3" id="oksigen-opst-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="tindakan_opst_3" id="tindakan-opst-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="evaluasi_opst_3" id="evaluasi-opst-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center"> 
                                                                        <input type="text" name="petugas_opst_3" id="petugas-opst-3" class="select2c-input ml-2">
                                                                    </td>                                                                   
                                                                </tr>



                                                                <tr>
                                                                    <td class="center"> 
                                                                        <input type="text" name="tgl_opst_4" id="tgl-opst-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="keadaan_opst_4" id="keadaan-opst-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="td_opst_4" id="td-opst-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="n_opst_4" id="n-opst-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="rr_opst_4" id="rr-opst-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="s_opst_4" id="s-opst-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="sp02_opst_4" id="sp02-opst-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="oksigen_opst_4" id="oksigen-opst-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="tindakan_opst_4" id="tindakan-opst-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="evaluasi_opst_4" id="evaluasi-opst-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center"> 
                                                                        <input type="text" name="petugas_opst_4" id="petugas-opst-4" class="select2c-input ml-2">
                                                                    </td>                                                                   
                                                                </tr>



                                                                <tr>
                                                                    <td class="center"> 
                                                                        <input type="text" name="tgl_opst_5" id="tgl-opst-5"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="keadaan_opst_5" id="keadaan-opst-5"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="td_opst_5" id="td-opst-5"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="n_opst_5" id="n-opst-5"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="rr_opst_5" id="rr-opst-5"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="s_opst_5" id="s-opst-5"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="sp02_opst_5" id="sp02-opst-5"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="oksigen_opst_5" id="oksigen-opst-5"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="tindakan_opst_5" id="tindakan-opst-5"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="evaluasi_opst_5" id="evaluasi-opst-5"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center"> 
                                                                        <input type="text" name="petugas_opst_5" id="petugas-opst-5" class="select2c-input ml-2">
                                                                    </td>                                                                   
                                                                </tr>



                                                                <tr>
                                                                    <td class="center"> 
                                                                        <input type="text" name="tgl_opst_6" id="tgl-opst-6"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="keadaan_opst_6" id="keadaan-opst-6"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="td_opst_6" id="td-opst-6"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="n_opst_6" id="n-opst-6"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="rr_opst_6" id="rr-opst-6"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="s_opst_6" id="s-opst-6"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="sp02_opst_6" id="sp02-opst-6"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="oksigen_opst_6" id="oksigen-opst-6"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="tindakan_opst_6" id="tindakan-opst-6"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="evaluasi_opst_6" id="evaluasi-opst-6"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center"> 
                                                                        <input type="text" name="petugas_opst_6" id="petugas-opst-6" class="select2c-input ml-2">
                                                                    </td>                                                                   
                                                                </tr>



                                                                <tr>
                                                                    <td class="center"> 
                                                                        <input type="text" name="tgl_opst_7" id="tgl-opst-7"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="keadaan_opst_7" id="keadaan-opst-7"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="td_opst_7" id="td-opst-7"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="n_opst_7" id="n-opst-7"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="rr_opst_7" id="rr-opst-7"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="s_opst_7" id="s-opst-7"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="sp02_opst_7" id="sp02-opst-7"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="oksigen_opst_7" id="oksigen-opst-7"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="tindakan_opst_7" id="tindakan-opst-7"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="evaluasi_opst_7" id="evaluasi-opst-7"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center"> 
                                                                        <input type="text" name="petugas_opst_7" id="petugas-opst-7" class="select2c-input ml-2">
                                                                    </td>                                                                   
                                                                </tr>



                                                                <tr>
                                                                    <td class="center"> 
                                                                        <input type="text" name="tgl_opst_8" id="tgl-opst-8"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="keadaan_opst_8" id="keadaan-opst-8"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="td_opst_8" id="td-opst-8"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="n_opst_8" id="n-opst-8"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="rr_opst_8" id="rr-opst-8"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="s_opst_8" id="s-opst-8"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="sp02_opst_8" id="sp02-opst-8"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="oksigen_opst_8" id="oksigen-opst-8"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="tindakan_opst_8" id="tindakan-opst-8"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="evaluasi_opst_8" id="evaluasi-opst-8"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center"> 
                                                                        <input type="text" name="petugas_opst_8" id="petugas-opst-8" class="select2c-input ml-2">
                                                                    </td>                                                                   
                                                                </tr>




                                                                <tr>
                                                                    <td class="center"> 
                                                                        <input type="text" name="tgl_opst_9" id="tgl-opst-9"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="keadaan_opst_9" id="keadaan-opst-9"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="td_opst_9" id="td-opst-9"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="n_opst_9" id="n-opst-9"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="rr_opst_9" id="rr-opst-9"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="s_opst_9" id="s-opst-9"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="sp02_opst_9" id="sp02-opst-9"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="oksigen_opst_9" id="oksigen-opst-9"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="tindakan_opst_9" id="tindakan-opst-9"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="evaluasi_opst_9" id="evaluasi-opst-9"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center"> 
                                                                        <input type="text" name="petugas_opst_9" id="petugas-opst-9" class="select2c-input ml-2">
                                                                    </td>                                                                   
                                                                </tr>




                                                                <tr>
                                                                    <td class="center"> 
                                                                        <input type="text" name="tgl_opst_10" id="tgl-opst-10"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="keadaan_opst_10" id="keadaan-opst-10"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="td_opst_10" id="td-opst-10"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="n_opst_10" id="n-opst-10"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="rr_opst_10" id="rr-opst-10"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="s_opst_10" id="s-opst-10"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="sp02_opst_10" id="sp02-opst-10"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="oksigen_opst_10" id="oksigen-opst-10"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="tindakan_opst_10" id="tindakan-opst-10"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="evaluasi_opst_10" id="evaluasi-opst-10"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center"> 
                                                                        <input type="text" name="petugas_opst_10" id="petugas-opst-10" class="select2c-input ml-2">
                                                                    </td>                                                                   
                                                                </tr>



                                                                <tr>
                                                                    <td class="center"> 
                                                                        <input type="text" name="tgl_opst_11" id="tgl-opst-11"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="keadaan_opst_11" id="keadaan-opst-11"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="td_opst_11" id="td-opst-11"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="n_opst_11" id="n-opst-11"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="rr_opst_11" id="rr-opst-11"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="s_opst_11" id="s-opst-11"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="sp02_opst_11" id="sp02-opst-11"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="oksigen_opst_11" id="oksigen-opst-11"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="tindakan_opst_11" id="tindakan-opst-11"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="evaluasi_opst_11" id="evaluasi-opst-11"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center"> 
                                                                        <input type="text" name="petugas_opst_11" id="petugas-opst-11" class="select2c-input ml-2">
                                                                    </td>                                                                   
                                                                </tr>



                                                                <tr>
                                                                    <td class="center"> 
                                                                        <input type="text" name="tgl_opst_12" id="tgl-opst-12"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="keadaan_opst_12" id="keadaan-opst-12"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="td_opst_12" id="td-opst-12"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="n_opst_12" id="n-opst-12"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="rr_opst_12" id="rr-opst-12"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="s_opst_12" id="s-opst-12"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="sp02_opst_12" id="sp02-opst-12"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="oksigen_opst_12" id="oksigen-opst-12"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="tindakan_opst_12" id="tindakan-opst-12"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="evaluasi_opst_12" id="evaluasi-opst-12"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center"> 
                                                                        <input type="text" name="petugas_opst_12" id="petugas-opst-12" class="select2c-input ml-2">
                                                                    </td>                                                                   
                                                                </tr>




                                                                <tr>
                                                                    <td class="center"> 
                                                                        <input type="text" name="tgl_opst_13" id="tgl-opst-13"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="keadaan_opst_13" id="keadaan-opst-13"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="td_opst_13" id="td-opst-13"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="n_opst_13" id="n-opst-13"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="rr_opst_13" id="rr-opst-13"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="s_opst_13" id="s-opst-13"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="sp02_opst_13" id="sp02-opst-13"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="oksigen_opst_13" id="oksigen-opst-13"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="tindakan_opst_13" id="tindakan-opst-13"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="evaluasi_opst_13" id="evaluasi-opst-13"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center"> 
                                                                        <input type="text" name="petugas_opst_13" id="petugas-opst-13" class="select2c-input ml-2">
                                                                    </td>                                                                   
                                                                </tr>




                                                                <tr>
                                                                    <td class="center"> 
                                                                        <input type="text" name="tgl_opst_14" id="tgl-opst-14"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="keadaan_opst_14" id="keadaan-opst-14"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="td_opst_14" id="td-opst-14"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="n_opst_14" id="n-opst-14"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="rr_opst_14" id="rr-opst-14"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="s_opst_14" id="s-opst-14"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="sp02_opst_14" id="sp02-opst-14"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="oksigen_opst_14" id="oksigen-opst-14"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="tindakan_opst_14" id="tindakan-opst-14"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="evaluasi_opst_14" id="evaluasi-opst-14"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center"> 
                                                                        <input type="text" name="petugas_opst_14" id="petugas-opst-14" class="select2c-input ml-2">
                                                                    </td>                                                                   
                                                                </tr>



                                                                <tr>
                                                                    <td class="center"> 
                                                                        <input type="text" name="tgl_opst_15" id="tgl-opst-15"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="keadaan_opst_15" id="keadaan-opst-15"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="td_opst_15" id="td-opst-15"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="n_opst_15" id="n-opst-15"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="rr_opst_15" id="rr-opst-15"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="s_opst_15" id="s-opst-15"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="sp02_opst_15" id="sp02-opst-15"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="oksigen_opst_15" id="oksigen-opst-15"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="tindakan_opst_15" id="tindakan-opst-15"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center">
                                                                        <input type="text" name="evaluasi_opst_15" id="evaluasi-opst-15"class="custom-form clear-input d-inline-block col-lg-12">
                                                                    </td>
                                                                    <td class="center"> 
                                                                        <input type="text" name="petugas_opst_15" id="petugas-opst-15" class="select2c-input ml-2">
                                                                    </td>                                                                   
                                                                </tr>


                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                            <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                <tr>
                                                    <td width="15%" class="bold">Tanggal dan jam serah terima pasien</td>
                                                    <td width="1%" class="bold">:</td>
                                                    <td width="50%">
                                                        <input type="text" name="tanggal_opst" id="tanggal-opst"class="custom-form clear-input d-inline-block col-lg-2">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="15%" class="bold">Pasien / Keluarga</td>
                                                    <td width="1%" class="bold">:</td>
                                                    <td width="50%">
                                                        <input type="text" name="pasien_opst" id="pasien-opst"class="custom-form clear-input d-inline-block col-lg-6">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="15%" class="bold">Petugas yang menerima</td>
                                                    <td width="1%" class="bold">:</td>
                                                    <td width="50%">
                                                        <!-- <input type="text" name="petugas_menerima" class="select2c-input ml-2" id="petugas-menerima"> -->
                                                        <input type="text" name="petugas_menerima" id="petugas-menerima"class="custom-form clear-input d-inline-block col-lg-6">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="15%" class="bold">Petugas yang melakukan transfer</td>
                                                    <td width="1%" class="bold">:</td>
                                                    <td width="50%">
                                                        <input type="text" name="petugas_melakukan" class="select2c-input ml-2" id="petugas-melakukan">
                                                    </td>
                                                </tr>
                                            </table>  

											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
												<button type="button" class="btn btn-info" onclick="CetakObservasiPasienSaatTransfer()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
											</div>
										</div>	

                                        <div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Exit / Close</button>
										</div>										
									</table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>



<!-- // TPERS LIHAT -->
<div class="modal fade" id="modal-transfer-pasien-exstra-rs-lihat" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
				<div class="title">
					<h5 id="modal-transfer-pasien-exstra-rs-lihat-title"><b>FORM TRANSFER PASIEN EXSTRA RUMAH SAKIT</b></h5>
				</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<?= form_open('', 'id=form-transfer-pasien-exstra-rs-lihat class="form-horizontal"') ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard_form_ranap">
                                <div class="form-transfer-pasien-exstra-rs-lihat">
                                    <table class="table table-no-border table-sm table-striped">
										<br>    
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" onclick="cetakTransferPasienEkstraRS()">
														<i class="fas fa-print mr-1"></i>CETAK FORM TRANSFER PASIEN EKSTRA RUMAH SAKIT
													</button>
												</td>												
                                            </tr>
                                        </table>
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
												<td colspan="3" class="center bold td-dark">
													<button class="btn btn-info btn-xs mr-1 float-left" type="button" onclick="cetakObservasiPasienSaatTransfer()">
														<i class="fas fa-print mr-1"></i>CETAK FORM OBVERVASI PASIEN SAAT TRANSFER
													</button>
												</td>												
                                            </tr>
                                        </table>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
										</div>
									</table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
