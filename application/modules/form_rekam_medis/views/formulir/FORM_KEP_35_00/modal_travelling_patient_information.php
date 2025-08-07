
<!-- // TPI-->
<div class="modal fade" id="modal_travelling_patient_information" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
				<div class="title">
					<h5 id="modal_travelling_patient_information-title"><b>FORM TRAVELLING PATIENT INFORMATION</b></h5>
				</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<?= form_open('', 'id=form_travelling_patient_information class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-tpi">
				<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-tpi">
				<input type="hidden" name="id_pasien" id="id-pasien-tpi">	
				<input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">  


                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard_form_ranap">
                                <div class="form_travelling_patient_information">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"id="btn_expand_all_tpi"><i
                                                        class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left" type="button"id="btn_collapse_all_tpi"><i
                                                        class="fas fa-fw fa-compress mr-1"></i>Collapse All</button>
                                            </td>
                                        </tr>
										<br>    
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"data-toggle="collapse"
                                                        data-target="#data-traveling"><i class="fas fa-expand mr-1"></i>Expand</button> TRAVELLING PATIENT INFORMATION
                                                </td>
                                            </tr>
                                        </table>
                            
                                        <tr>
                                            <div class="collapse multi-collapse mt-2" id="data-traveling">                                            
                                                <div class="row">

                                                    <tr>                                       
                                                        <td width="100%">
                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Name </i> / Nama</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%" class="center">
                                                                            <textarea name="name" cols="30" rows="2" class="form-control clear-input custom-textarea" id="name" disabled></textarea>
                                                                        </td>                                                              
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Date of Birth </i> / Tgl.Lahir</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%" class="center">
                                                                            <textarea name="date_of_birth" cols="30" rows="2" class="form-control clear-input custom-textarea" id="date-of-birth" disabled></textarea>
                                                                        </td>                                                              
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Home Address </i> / Alamat</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%" class="center">
                                                                            <textarea name="home_address" cols="30" rows="2" class="form-control clear-input custom-textarea" id="home-address" disabled></textarea>
                                                                        </td>                                                              
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Diagnosis </i> / Diagnosa</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%">
                                                                            <label id="diagnosis"></label>
                                                                        </td>                                                              
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Dialysis Treatment per week </i> / Tindakan HD Per Minggu</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%" class="center">
                                                                            <textarea name="dialysis" cols="30" rows="2" class="form-control clear-input custom-textarea" id="dialysis"></textarea>
                                                                        </td>                                                              
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Duration Of Dialys </i> / Lamanya HD</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%" class="center">
                                                                            <textarea name="duration" cols="30" rows="2" class="form-control clear-input custom-textarea" id="duration"></textarea>
                                                                        </td>                                                              
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Dialisat Concentrate </i> / Cairan Konsentrat</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%" class="center">
                                                                            <textarea name="dialisat" cols="30" rows="2" class="form-control clear-input custom-textarea" id="dialisat"></textarea>
                                                                        </td>                                                              
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Dry Weight </i> / BB kering</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%" class="center">
                                                                            <textarea name="dry_weight" cols="30" rows="2" class="form-control clear-input custom-textarea" id="dry-weight"></textarea>
                                                                        </td>                                                              
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Acces Vascular </i> / Sarang Hubungan Sirkulasi</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%" class="center">
                                                                            <textarea name="acces_vascular" cols="30" rows="2" class="form-control clear-input custom-textarea" id="acces-vascular"></textarea>
                                                                        </td>                                                              
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Average Weight Gain Between Treatment </i> / Kenaikan BB Per Tindakan HD</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%" class="center">
                                                                            <textarea name="average_weight" cols="30" rows="2" class="form-control clear-input custom-textarea" id="average-weight"></textarea>
                                                                        </td>                                                              
                                                                    </tr>
                                                                </tbody> 
                                                            </table>

                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="29%"> <b> <i>  Average Blood Presure </i> / Tekanan Darah rata-rata</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="35%" class="center"> <b> <i> Pre </i> /Sebelum
                                                                            <textarea name="average_blood_pre" cols="30" rows="2" class="form-control clear-input custom-textarea" id="average-blood-pre"></textarea>
                                                                        </td>                                                              
                                                                        <td width="35%" class="center"> <b> <i> Post </i> /Sesudah
                                                                            <textarea name="average_blood_post" cols="30" rows="2" class="form-control clear-input custom-textarea" id="average-blood-post"></textarea>
                                                                        </td>                                                              
                                                                    </tr>
                                                                </tbody> 
                                                            </table>

                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Dialyser Type </i> / Jenis Dialiser</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%" class="center">
                                                                            <textarea name="dialyser_type" cols="30" rows="2" class="form-control clear-input custom-textarea" id="dialyser-type"></textarea>
                                                                        </td>                                                              
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Blood Flow Pressure </i> / Kecepatan Aliran Darah</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%" class="center">
                                                                            <textarea name="blood_flow" cols="30" rows="2" class="form-control clear-input custom-textarea" id="blood-flow"></textarea>
                                                                        </td>                                                              
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Heparinitation </i> / Heparinisasi</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%" class="center">
                                                                            <textarea name="heparinitation" cols="30" rows="2" class="form-control clear-input custom-textarea" id="heparinitation"></textarea>
                                                                        </td>                                                              
                                                                    </tr>
                                                                </tbody> 
                                                            </table>

                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="11%"> <b> <i>  Loading dose  </i> / Dosis Awal</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="10%" class="center">
                                                                            <textarea name="loading_dose" cols="30" rows="2" class="form-control clear-input custom-textarea" id="loading-dose"></textarea>
                                                                        </td>   
                                                                        <td width="1%" class="center"><b>IU,</td>

                                                                        <td width="7%" class="center"> <b> <i>  Maintenance Dose  </i> / Dosis Lanjut</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="10%" class="center">
                                                                            <textarea name="maintenance_dose" cols="30" rows="2" class="form-control clear-input custom-textarea" id="maintenance-dose"></textarea>
                                                                        </td> 
                                                                        <td width="1%" class="center"><b>IU </i> /Jam </td>
                                                                    </tr>
                                                                </tbody> 
                                                            </table>

                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Blood Group </i> / Gol. Darah / Rhesus</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%" class="center">
                                                                            <textarea name="blood_group" cols="30" rows="2" class="form-control clear-input custom-textarea" id="blood-group"></textarea>
                                                                        </td>                                                              
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Blood Transfusion Result </i> / Tranfusi Darah Terakhir</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%" class="center">
                                                                            <textarea name="blood_tranfusion" cols="30" rows="2" class="form-control clear-input custom-textarea" id="blood-tranfusion"></textarea>
                                                                        </td>                                                              
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Date Of Laboratorium Result </i> / Tgl. Hasil Laboratorium Terakhir</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%" class="center">
                                                                            <input type="date" name="date_of_laboratorium" class="custom-form col-lg-3" id="date-of-laboratorium">
                                                                        </td>                                                              
                                                                    </tr>
                                                                </tbody> 
                                                            </table>

                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="5%" class="center"> <b> <i>HB</i> : </td>
                                                                        <td width="5%" class="center">
                                                                            <textarea name="hb_ereum_pre" cols="30" rows="2" class="form-control clear-input custom-textarea" id="hb-ereum-pre"></textarea>
                                                                        </td>  
                                                                        <td width="5%" class="center"> <b> <i>Ureum Pre / Post </i> : </td>
                                                                        <td width="5%" class="center">
                                                                            <textarea name="hb_ureum_post" cols="30" rows="2" class="form-control clear-input custom-textarea" id="hb-ureum-post"></textarea>
                                                                        </td>
                                                                        <td width="5%" class="center"> <b> <i>Cratinin Pre / Post : </i>  </td>
                                                                        <td width="5%" class="center">
                                                                            <textarea name="cratine_pre" cols="30" rows="2" class="form-control clear-input custom-textarea" id="cratine-pre"></textarea>
                                                                        </td>
                                                                        <td width="5%" class="center"> <b> <i>Kalium : </i>  </td>
                                                                        <td width="5%" class="center">
                                                                            <textarea name="kalium" cols="30" rows="2" class="form-control clear-input custom-textarea" id="kalium"></textarea>
                                                                        </td>
                                                                        <td width="5%" class="center"> <b> <i>Phospor : </i>  </td>
                                                                        <td width="5%" class="center">
                                                                            <textarea name="phospor" cols="30" rows="2" class="form-control clear-input custom-textarea" id="phospor"></textarea>
                                                                        </td>
                                                                        <td width="5%" class="center"> <b> <i>HBSAg : </i>  </td>
                                                                        <td width="5%" class="center">
                                                                            <textarea name="hbsag" cols="30" rows="2" class="form-control clear-input custom-textarea" id="hbsag"></textarea>
                                                                        </td>
                                                                        <td width="5%" class="center"> <b> <i>Anti  </i> HCV : </td>
                                                                        <td width="5%" class="center">
                                                                            <textarea name="anti_hcv" cols="30" rows="2" class="form-control clear-input custom-textarea" id="anti-hcv"></textarea>
                                                                        </td>
                                                                        <td width="5%" class="center"> <b> <i>Anti  </i> HIV : </td>
                                                                        <td width="5%" class="center">
                                                                            <textarea name="anti_hiv" cols="30" rows="2" class="form-control clear-input custom-textarea" id="anti-hiv"></textarea>
                                                                        </td>

                                                                    </tr>
                                                                </tbody> 
                                                            </table>

                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Medication </i> / Terapi Obat-Obatan</td>                                                             
                                                                    </tr>
                                                                </tbody> 
                                                            </table>

                                                            <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                                <tr>
                                                                    <td width="100%">
                                                                    <table class="table table-sm table-striped table-bordered">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="2%" class="center">1</td>
                                                                                    <td width="5%" class="center">Nama Obat</td>
                                                                                    <td width="30%"> 
                                                                                        <input type="text" name="nama_medication_1" id="nama-medication-1" class="select2c-input ml-2 center-input">
                                                                                    </td> 
                                                                                    <td width="5%" class="center">Dosis</td>
                                                                                    <td width="30%"> 
                                                                                        <input type="text" name="dosis_1" id="dosis-1" class="custom-form clear-input d-inline-block col-lg-8" placeholder="dosis">
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="2%" class="center">2</td>
                                                                                    <td width="5%" class="center">Nama Obat</td>
                                                                                    <td width="25%"> 
                                                                                        <input type="text" name="nama_medication_2" id="nama-medication-2" class="select2c-input ml-2 center-input">
                                                                                    </td> 
                                                                                    <td width="5%" class="center">Dosis</td>
                                                                                    <td width="30%"> 
                                                                                        <input type="text" name="dosis_2" id="dosis-2" class="custom-form clear-input d-inline-block col-lg-8" placeholder="dosis">
                                                                                    </td>                                                            
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="2%" class="center">3</td>
                                                                                    <td width="5%" class="center">Nama Obat</td>
                                                                                    <td width="25%"> 
                                                                                        <input type="text" name="nama_medication_3" id="nama-medication-3" class="select2c-input ml-2 center-input">
                                                                                    </td>  
                                                                                    <td width="5%" class="center">Dosis</td>
                                                                                    <td width="30%"> 
                                                                                        <input type="text" name="dosis_3" id="dosis-3" class="custom-form clear-input d-inline-block col-lg-8" placeholder="dosis">
                                                                                    </td>                                                            
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="2%" class="center">4</td>
                                                                                    <td width="5%" class="center">Nama Obat</td>
                                                                                    <td width="25%"> 
                                                                                        <input type="text" name="nama_medication_4" id="nama-medication-4" class="select2c-input ml-2 center-input">
                                                                                    </td> 
                                                                                    <td width="5%" class="center">Dosis</td>
                                                                                    <td width="30%"> 
                                                                                        <input type="text" name="dosis_4" id="dosis-4" class="custom-form clear-input d-inline-block col-lg-8" placeholder="dosis">
                                                                                    </td>                                                             
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="2%" class="center">5</td>
                                                                                    <td width="5%" class="center">Nama Obat</td>
                                                                                    <td width="25%"> 
                                                                                        <input type="text" name="nama_medication_5" id="nama-medication-5" class="select2c-input ml-2 center-input">
                                                                                    </td> 
                                                                                    <td width="5%" class="center">Dosis</td>
                                                                                    <td width="30%"> 
                                                                                        <input type="text" name="dosis_5" id="dosis-5" class="custom-form clear-input d-inline-block col-lg-8" placeholder="dosis">
                                                                                    </td>                                                              
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="2%" class="center">6</td>
                                                                                    <td width="5%" class="center">Nama Obat</td>
                                                                                    <td width="25%"> 
                                                                                        <input type="text" name="nama_medication_6" id="nama-medication-6" class="select2c-input ml-2 center-input">
                                                                                    </td> 
                                                                                    <td width="5%" class="center">Dosis</td>
                                                                                    <td width="30%"> 
                                                                                        <input type="text" name="dosis_6" id="dosis-6" class="custom-form clear-input d-inline-block col-lg-8" placeholder="dosis">
                                                                                    </td>                                                             
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="2%" class="center">7</td>
                                                                                    <td width="5%" class="center">Nama Obat</td>
                                                                                    <td width="25%"> 
                                                                                        <input type="text" name="nama_medication_7" id="nama-medication-7" class="select2c-input ml-2 center-input">
                                                                                    </td>  
                                                                                    <td width="5%" class="center">Dosis</td>
                                                                                    <td width="30%"> 
                                                                                        <input type="text" name="dosis_7" id="dosis-7" class="custom-form clear-input d-inline-block col-lg-8" placeholder="dosis">
                                                                                    </td>                                                            
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="2%" class="center">8</td>
                                                                                    <td width="5%" class="center">Nama Obat</td>
                                                                                    <td width="25%"> 
                                                                                        <input type="text" name="nama_medication_8" id="nama-medication-8" class="select2c-input ml-2 center-input">
                                                                                    </td>  
                                                                                    <td width="5%" class="center">Dosis</td>
                                                                                    <td width="30%"> 
                                                                                        <input type="text" name="dosis_8" id="dosis-8" class="custom-form clear-input d-inline-block col-lg-8" placeholder="dosis">
                                                                                    </td>                                                            
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="2%" class="center">9</td>
                                                                                    <td width="5%" class="center">Nama Obat</td>
                                                                                    <td width="25%"> 
                                                                                        <input type="text" name="nama_medication_9" id="nama-medication-9" class="select2c-input ml-2 center-input">
                                                                                    </td> 
                                                                                    <td width="5%" class="center">Dosis</td>
                                                                                    <td width="30%"> 
                                                                                        <input type="text" name="dosis_9" id="dosis-9" class="custom-form clear-input d-inline-block col-lg-8" placeholder="dosis">
                                                                                    </td>                                                              
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="2%" class="center">10</td>
                                                                                    <td width="5%" class="center">Nama Obat</td>
                                                                                    <td width="25%"> 
                                                                                        <input type="text" name="nama_medication_10" id="nama-medication-10" class="select2c-input ml-2 center-input">
                                                                                    </td>  
                                                                                    <td width="5%" class="center">Dosis</td>
                                                                                    <td width="30%"> 
                                                                                        <input type="text" name="dosis_10" id="dosis-10" class="custom-form clear-input d-inline-block col-lg-8" placeholder="dosis">
                                                                                    </td>                                                            
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="2%" class="center">11</td>
                                                                                    <td width="5%" class="center">Nama Obat</td>
                                                                                    <td width="25%"> 
                                                                                        <input type="text" name="nama_medication_11" id="nama-medication-11" class="select2c-input ml-2 center-input">
                                                                                    </td> 
                                                                                    <td width="5%" class="center">Dosis</td>
                                                                                    <td width="30%"> 
                                                                                        <input type="text" name="dosis_11" id="dosis-11" class="custom-form clear-input d-inline-block col-lg-8" placeholder="dosis">
                                                                                    </td>                                                             
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="2%" class="center">12</td>
                                                                                    <td width="5%" class="center">Nama Obat</td>
                                                                                    <td width="25%"> 
                                                                                        <input type="text" name="nama_medication_12" id="nama-medication-12" class="select2c-input ml-2 center-input">
                                                                                    </td> 
                                                                                    <td width="5%" class="center">Dosis</td>
                                                                                    <td width="30%"> 
                                                                                        <input type="text" name="dosis_12" id="dosis-12" class="custom-form clear-input d-inline-block col-lg-8" placeholder="dosis">
                                                                                    </td>                                                             
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="2%" class="center">13</td>
                                                                                    <td width="5%" class="center">Nama Obat</td>
                                                                                    <td width="25%"> 
                                                                                        <input type="text" name="nama_medication_13" id="nama-medication-13" class="select2c-input ml-2 center-input">
                                                                                    </td>  
                                                                                    <td width="5%" class="center">Dosis</td>
                                                                                    <td width="30%"> 
                                                                                        <input type="text" name="dosis_13" id="dosis-13" class="custom-form clear-input d-inline-block col-lg-8" placeholder="dosis">
                                                                                    </td>                                                           
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="2%" class="center">14</td>
                                                                                    <td width="5%" class="center">Nama Obat</td>
                                                                                    <td width="25%"> 
                                                                                        <input type="text" name="nama_medication_14" id="nama-medication-14" class="select2c-input ml-2 center-input">
                                                                                    </td>  
                                                                                    <td width="5%" class="center">Dosis</td>
                                                                                    <td width="30%"> 
                                                                                        <input type="text" name="dosis_14" id="dosis-14" class="custom-form clear-input d-inline-block col-lg-8" placeholder="dosis">
                                                                                    </td>                                                            
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="2%" class="center">15</td>
                                                                                    <td width="5%" class="center">Nama Obat</td>
                                                                                    <td width="25%"> 
                                                                                        <input type="text" name="nama_medication_15" id="nama-medication-15" class="select2c-input ml-2 center-input">
                                                                                    </td>  
                                                                                    <td width="5%" class="center">Dosis</td>
                                                                                    <td width="30%"> 
                                                                                        <input type="text" name="dosis_15" id="dosis-15" class="custom-form clear-input d-inline-block col-lg-8" placeholder="dosis">
                                                                                    </td>                                                            
                                                                                </tr>
                                                                            </tbody> 
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="25%"> <b> <i>  Problem During Dialysis </i> / Permasalahan Selama HD</td>
                                                                        <td width="1%" class="center"><b>:</td>
                                                                        <td width="60%" class="center">
                                                                            <textarea name="problem_during" cols="30" rows="2" class="form-control clear-input custom-textarea" id="problem-during"></textarea>
                                                                        </td>                                                              
                                                                    </tr>
                                                                </tbody> 
                                                            </table>

                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="30%" class="center"></td>
                                                                        <td width="30%" class="center"></td>
                                                                        <td width="30%"> <b> Tangerang</td>                                                              
                                                                    </tr>


                                                                    <tr>
                                                                        <td width="30%" class="center"></td>
                                                                        <td width="30%" class="center"></td>
                                                                        <td width="30%">
                                                                            <input type="date" name="tanggal_tpi" class="custom-form col-lg-4" id="tanggal-tpi"> <b> <i> Your Sincerly
                                                                        </td>                                                           
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="30%" class="center"></td>
                                                                        <td width="30%" class="center"></td>
                                                                        <td width="30%"> 
                                                                            <input type="text" name="nephrologist_consultant" id="nephrologist-consultant" class="select2c-input ml-2 center-input"> <br> <b> <i>  Nephrologist Consultant
                                                                        </td>                                                              
                                                                    </tr>
                                                                </tbody> 
                                                            </table>
                                                        </td>
                                                    </tr> 
   
                                                </div>                                               
                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                                                    <button type="button" class="btn btn-info" onclick="CetakSuratTravelling()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
                                                </div>
                                            </div>
                                        </tr>									
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
