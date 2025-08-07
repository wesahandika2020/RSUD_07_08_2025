<!-- Modal Asessment -->
<div id="modal-asessment-foto" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-asessment-foto-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-asessment-foto-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-asessment role=form class="form-horizontal form-custom"') ?>
                <!-- Input Hidden Form -->
                <input type="hidden" name="id-pasienas" id="id-pasienas">
                <input type="hidden" name="id_layananas" id="id-layananas">
                <input type="hidden" name="jenis_rawatas" id="jenis-rawatas">
                <input type="hidden" name="jenis_layanan" value="IGD" id="jenis-layanan">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-form-asessment-foto">
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>Data Pasien</li>
                                    <li>Pengkajian Awal Medis</li>
                                    <li>Pengkajian Awal Keperawatan</li>
                                </ol>

                                <!-- Data bwizard -->
                                <!-- Data Pasien -->
                                <div class="form-info-pasien">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <table class="table table-sm table-detail table-striped">
                                                <tr>
                                                    <td width="30%"><b>Nama</b></td>
                                                    <td><span id="nama-detailas"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No. RM</b></td>
                                                    <td><span id="no-rm-detailas"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>No. Register</b></td>
                                                    <td><span id="no-register-detailas"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Kelamin</b></td>
                                                    <td><span id="kelamin-detailas"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Umur/Tgl. Lahir</b></td>
                                                    <td><span id="umur-detailas"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Alamat</b></td>
                                                    <td><span id="alamat-detailas"></span></td>
                                                </tr>
                                                <tr id="subspesialis-rowas">
                                                    <td><b>Sub Spesialis</b></td>
                                                    <td><?= form_dropdown('subspesialisas', array(), array(), 'id=subspesialisas class="custom-form validasi-input col-lg-6"') ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-lg-6">
                                            <table class="table table-sm table-detail table-striped">
                                                <tr>
                                                    <td width="40%"><b>Instansi Perujuk</b></td>
                                                    <td><span id="instansi-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Tenaga Medis Perujuk</b></td>
                                                    <td><span id="nadis-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama P. Jawab</b></td>
                                                    <td><span id="nama-pjwb-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Alamat P. Jawab</b></td>
                                                    <td><span id="alamat-pjwb-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Telp P. Jawab</b></td>
                                                    <td><span id="telp-pjwb-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama P. Jawab Keuangan</b></td>
                                                    <td><span id="nama-pjwb-keuangan-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Alamat P. Jawab Keuangan</b></td>
                                                    <td><span id="alamat-pjwb-keuangan-detail"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Telp P. Jawab Keuangan</b></td>
                                                    <td><span id="telp-pjwb-keuangan-detail"></span></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <!-- End Data Pasien -->

                                <!-- Form Asessment Medis -->
                                <div class="form-asessment-medis">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5 class="center"><b>Pengkajian Awal Medis</b></h5>
                                            <h6 class="center">( Diisi Oleh Dokter )</h6>
                                            <hr>
                                            <div id="keluhanutama">
                                                
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-2 col-form-label-custom">Keluhan utama</label>
                                                            <div class="col-lg-10">
                                                                <textarea name="keluta" id="keluta" class="custom-textarea" placeholder="Keluhan utama" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-2 col-form-label-custom">Riwayat penyakit sekarang</label>
                                                            <div class="col-lg-10">
                                                                <textarea name="riwpensk" id="riwpensk" placeholder="Riwayat penyakit sekarang" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-2 col-form-label-custom">Riwayat penyakit Dahulu</label>
                                                            <div class="col-lg-10">
                                                                <!-- <textarea name="riwpendu" id="riwpendu" placeholder="Riwayat penyakit sekarang" class="custom-textarea" rows="4"></textarea> -->
                                                                <div class="row" style="border: 1px solid grey; border-radius: 3px; margin: 0% 0.12%;">
                                                                    <div class="col-md-1" style="margin: 1% 0 1% 2%;">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <input type="checkbox" name="tdkrpd" class="custom-control-input" id="tdkrpd">
                                                                                <label class="custom-control-label" for="tdkrpd">Tidak</label>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <input type="checkbox" name="yrpd" class="custom-control-input" id="yrpd">
                                                                                <label class="custom-control-label" for="yrpd">Ya</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin: 1% 0 1% 2%;">
                                                                        <textarea name="text_yrpd" id="text_yrpd" class="custom-textarea" rows="4" placeholder="Jika ada penyakit dahulu"></textarea>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-2 col-form-label-custom">Riwayat Penyakit Keluarga</label>
                                                            <div class="col-lg-10">
                                                                <!-- <textarea name="riwpendu" id="riwpendu" placeholder="Riwayat penyakit sekarang" class="custom-textarea" rows="4"></textarea> -->
                                                                <div class="row" style="border: 1px solid grey; border-radius: 3px; margin: 0% 0.12%;">
                                                                    <div class="col-md-1" style="margin: 1% 0 1% 2%;">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <input type="checkbox" name="rpk_tidak" class="custom-control-input" id="rpk_tidak">
                                                                                <label class="custom-control-label" for="rpk_tidak">Tidak</label>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <input type="checkbox" name="rpk_ya" class="custom-control-input" id="rpk_ya">
                                                                                <label class="custom-control-label" for="rpk_ya">Ya, Hasil.....</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin: 1% 0 1% 2%;">
                                                                        <textarea name="rpk_lain" id="rpk_lain" class="custom-textarea" rows="4" placeholder="Input Lain - lain"></textarea>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-2 col-form-label-custom">Riwayat Pekerjaan, Sosial Ekonomi, Kejiwaan dan Kebiasaan <p style="font-size: 9px; color: red">( termasuk riwayat perkawinan, obstetri, imunisasi tumuh kembang )</p></label>
                                                            <div class="col-lg-10">
                                                                <textarea name="rpsekk" id="rpsekk" placeholder="Riwayat Pekerjaan dan lainlain" class="custom-textarea" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-2 col-form-label-custom">Alergi</label>
                                                            <div class="col-lg-10">
                                                                <!-- <textarea name="riwpendu" id="riwpendu" placeholder="Riwayat penyakit sekarang" class="custom-textarea" rows="4"></textarea> -->
                                                                <div class="row" style="border: 1px solid grey; border-radius: 3px; margin: 0% 0.12%;">
                                                                    <div class="col-md-1" style="margin: 1% 0 1% 2%;">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <input type="checkbox" name="talg" class="custom-control-input" id="talg">
                                                                                <label class="custom-control-label" for="talg">Tidak</label>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <input type="checkbox" name="yalg" class="custom-control-input" id="yalg">
                                                                                <label class="custom-control-label" for="yalg">Ya</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin: 1% 0 1% 2%;">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <textarea name="s_yalg" id="s_yalg" class="custom-textarea" rows="4" placeholder="Sebutkan..."></textarea>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <textarea name="r_yalg" id="r_yalg" class="custom-textarea" rows="4" placeholder="Reaksi..."></textarea>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <hr>
                                            <h6><b>PEMERIKSAAN FISIK</b></h6>
                                            <button class="btn btn-info btn-xxs" type="button" data-toggle="collapse" data-target="#pemeriksaanFisik" aria-expanded="false" aria-controls="pemeriksaanFisik">
                                                <i class="fas fa-expand m-r-5"></i>Open Input Pemeriksaan Fisik
                                            </button>
                                            <br/><br/><br/>
                                            <div class="collapse" id="pemeriksaanFisik">
                                                
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Kepala</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="kepala" id="kepala" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Mata</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="mata" id="mata" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Mulut</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="mulut" id="mulut" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Leher</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="leher" id="leher" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Thorax</label>
                                                            <div class="col-lg-8">
                                                                <div class="row tight">
                                                                    <label class="col-lg-3">Cor</label>
                                                                    <div class="col-lg-9"> 
                                                                        <textarea name="cor" id="cor" class="custom-textarea" rows="4"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row tight">
                                                                    <label class="col-lg-3">Pulmo</label>
                                                                    <div class="col-lg-9">
                                                                        <textarea name="pulmo" id="pulmo" class="custom-textarea" rows="4"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Abdomen</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="abdomen" id="abdomen" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Ekstermitas</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="ekstrimitas" id="ekstrimitas" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Kulit Kelamin</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="kulit_kelamin" id="kulit-kelamin" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Status Lokalis</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="status_lokalis" id="status_lokalis" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Diagnosis Awal</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="diag_awal" id="diag_awal" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-4 col-form-label-custom">Diagnosis Banding</label>
                                                            <div class="col-lg-8">
                                                                <textarea name="diag_awal" id="diag_awal" class="custom-textarea" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h6><b>PEMERIKSAAN PENUNJANG</b></h6>
                                            <button class="btn btn-info btn-xxs" type="button" data-toggle="collapse" data-target="#pemeriksaanPenunjang" aria-expanded="false" aria-controls="pemeriksaanPenunjang">
                                                <i class="fas fa-expand m-r-5"></i>Open Input Pemeriksaan Penunjang
                                            </button>
                                            <br/><br/><br/>
                                            <div class="collapse" id="pemeriksaanPenunjang">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-1 col-form-label-custom">Lab</label>
                                                            <div class="col-lg-11">
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <input type="checkbox" name="dpl" class="custom-control-input" id="dpl">
                                                                                <label class="custom-control-label" for="dpl">DPL</label>
                                                                            </div> 
                                                                            <div class="col-lg-12">
                                                                                <input type="checkbox" name="ckckmb" class="custom-control-input" id="ckckmb">
                                                                                <label class="custom-control-label" for="ckckmb">CK/CKMB</label>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <input type="checkbox" name="agd" class="custom-control-input" id="agd">
                                                                                <label class="custom-control-label" for="agd">AGD</label>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <input type="checkbox" name="gds" class="custom-control-input" id="gds">
                                                                                <label class="custom-control-label" for="gds">GDS</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <input type="checkbox" name="elektrolit" class="custom-control-input" id="elektrolit">
                                                                                <label class="custom-control-label" for="elektrolit">Elektrolit</label>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <input type="checkbox" name="ureumcre" class="custom-control-input" id="ureumcre">
                                                                                <label class="custom-control-label" for="ureumcre">Ureum Creatinin</label>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <input type="checkbox" name="urin" class="custom-control-input" id="urin">
                                                                                <label class="custom-control-label" for="urin">Urin</label>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <input type="checkbox" name="lainlain" class="custom-control-input" id="lainlain">
                                                                                <label class="custom-control-label" for="lainlain">Lain-lain, sebutkan.....</label>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <br/>
                                                                        
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <textarea name="lain_inp" id="lain_inp" class="custom-textarea" rows="4" placeholder="Input Lain - lain"></textarea>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-1 col-form-label-custom">X-Ray</label>
                                                            <div class="col-lg-11">
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <input type="checkbox" name="x_thorax" class="custom-control-input" id="x_thorax">
                                                                                <label class="custom-control-label" for="x_thorax">Thorax</label>
                                                                            </div> 
                                                                            <div class="col-lg-12">
                                                                                <input type="checkbox" name="x_abd3p" class="custom-control-input" id="x_abd3p">
                                                                                <label class="custom-control-label" for="x_abd3p">Abdomen 3 Posisi</label>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <input type="checkbox" name="x_ctscan" class="custom-control-input" id="x_ctscan">
                                                                                <label class="custom-control-label" for="x_ctscan">CT-SCAN</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <input type="checkbox" name="x_tdkada" class="custom-control-input" id="x_tdkada">
                                                                                <label class="custom-control-label" for="x_tdkada">Tidak Ada</label>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <input type="checkbox" name="x_lainlain" class="custom-control-input" id="x_lainlain">
                                                                                <label class="custom-control-label" for="x_lainlain">Lain-lain, sebutkan.....</label>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <br/>
                                                                        
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <textarea name="x_lain" id="x_lain" class="custom-textarea" rows="4" placeholder="Input Lain - lain"></textarea>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-1 col-form-label-custom">EKG</label>
                                                            <div class="col-lg-11">
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <input type="checkbox" name="ekg_tidak" class="custom-control-input" id="ekg_tidak">
                                                                                <label class="custom-control-label" for="ekg_tidak">Tidak</label>
                                                                            </div> 
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <input type="checkbox" name="ekg_ya" class="custom-control-input" id="ekg_ya">
                                                                                <label class="custom-control-label" for="ekg_ya">Ya, Hasil.....</label>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <br/>
                                                                        
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <textarea name="ekg_lain" id="ekg_lain" class="custom-textarea" rows="4" placeholder="Input Lain - lain"></textarea>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row tight">
                                                <label class="col-lg-2 col-form-label-custom">Terapi/Tindakan/Instruksi Lain</label>
                                                <div class="col-lg-10">
                                                    <textarea name="tertiinl" id="tertiinl" class="custom-textarea" placeholder="Terapi / Tindakan / Instruksi Lain ..." rows="4"></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row" id="req_asmawdpjp"></div> 
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Asessment Medis -->

                                <!-- Form Asessment Keperawatan -->
                                <div class="form-asessment-perawat">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5 class="center"><b>Pengkajian Awal Keperawatan</b></h5>
                                            <h6 class="center">( Diisi Oleh Perawat )</h6>
                                            <hr>
                                            <div id="pawalkep">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-2 col-form-label-custom">Informasi diperoleh dari</label>
                                                            <div class="col-lg-10">
                                                                <div class="row" style="border: 1px solid grey; border-radius: 3px; margin: 0% 0.12%;">
                                                                    <div class="col-md-12" style="margin: 1% 0 0% 2%;">
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <input type="checkbox" name="infodarpas" class="custom-control-input" id="infodarpas">
                                                                                <label class="custom-control-label" for="infodarpas">Pasien</label>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <input type="checkbox" name="infodarkel" class="custom-control-input" id="infodarkel">
                                                                                <label class="custom-control-label" for="infodarkel">Keluarga</label>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <input type="checkbox" name="infodarlain" class="custom-control-input" id="infodarlain">
                                                                                <label class="custom-control-label" for="infodarlain">Lain-lain</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="margin: 1% 0 1% 0%;">
                                                                        <textarea name="text_infodarlain" id="text_infodarlain" class="custom-textarea" rows="4" placeholder="Sebutkan..."></textarea>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-2 col-form-label-custom">Cara Masuk</label>
                                                            <div class="col-lg-10">
                                                                <div class="row" style="border: 1px solid grey; border-radius: 3px; margin: 0% 0.12%;">
                                                                    <div class="col-md-12" style="margin: 1% 0 1% 2%;">
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <input type="checkbox" name="cmjtb" class="custom-control-input" id="cmjtb">
                                                                                        <label class="custom-control-label" for="cmjtb">Jalan tanpa bantuan</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="checkbox" name="cmjdb" class="custom-control-input" id="cmjdb">
                                                                                        <label class="custom-control-label" for="cmjdb">Jalan dengan bantuan</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <input type="checkbox" name="cmkuro" class="custom-control-input" id="cmkuro">
                                                                                        <label class="custom-control-label" for="cmkuro">Kursi roda</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <input type="checkbox" name="cmbran" class="custom-control-input" id="cmbran">
                                                                                        <label class="custom-control-label" for="cmbran">Brankar</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-2 col-form-label-custom">Keluhan Utama</label>
                                                            <div class="col-lg-10">
                                                                <textarea name="pakkelut" id="pakkelut" placeholder="Keluhan utama..." class="custom-textarea" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-2 col-form-label-custom">Riwayat Penyakit Sekarang</label>
                                                            <div class="col-lg-10">
                                                                <textarea name="pakrps" id="pakrps" placeholder="Riwayat Penyakit Sekarang..." class="custom-textarea" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-2 col-form-label-custom">Riwayat Penyakit Terdahulu</label>
                                                            <div class="col-lg-10">
                                                                <div class="row" style="border: 1px solid grey; border-radius: 3px; margin: 0% 0.12%;">
                                                                    <div class="col-md-12" style="margin: 1% 0 1% 2%;">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <input type="checkbox" name="rptasma" class="custom-control-input" id="rptasma">
                                                                                <label class="custom-control-label" for="rptasma">Asma</label>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input type="checkbox" name="rpthip" class="custom-control-input" id="rpthip">
                                                                                <label class="custom-control-label" for="rpthip">Hipertensi</label>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input type="checkbox" name="rptjan" class="custom-control-input" id="rptjan">
                                                                                <label class="custom-control-label" for="rptjan">Jantung</label>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input type="checkbox" name="rptdiab" class="custom-control-input" id="rptdiab">
                                                                                <label class="custom-control-label" for="rptdiab">Diabetes</label>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input type="checkbox" name="rpthep" class="custom-control-input" id="rpthep">
                                                                                <label class="custom-control-label" for="rpthep">Hepatitis</label>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input type="checkbox" name="rptlain2" class="custom-control-input" id="rptlain2">
                                                                                <label class="custom-control-label" for="rptlain2">Lain-lain</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="margin: 0% 0 1% 0%;">
                                                                        <textarea name="text_rptlain2" id="text_rptlain2" class="custom-textarea" rows="4" placeholder="Sebutkan..."></textarea>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-2 col-form-label-custom">Riwayat Penyakit Keluarga</label>
                                                            <div class="col-lg-10">
                                                                <div class="row" style="border: 1px solid grey; border-radius: 3px; margin: 0% 0.12%;">
                                                                    <div class="col-md-12" style="margin: 1% 0 1% 2%;">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <input type="checkbox" name="rpkelasma" class="custom-control-input" id="rpkelasma">
                                                                                <label class="custom-control-label" for="rpkelasma">Asma</label>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input type="checkbox" name="rpkelhip" class="custom-control-input" id="rpkelhip">
                                                                                <label class="custom-control-label" for="rpkelhip">Hipertensi</label>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input type="checkbox" name="rpkeljan" class="custom-control-input" id="rpkeljan">
                                                                                <label class="custom-control-label" for="rpkeljan">Jantung</label>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input type="checkbox" name="rpkeldiab" class="custom-control-input" id="rpkeldiab">
                                                                                <label class="custom-control-label" for="rpkeldiab">Diabetes</label>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <input type="checkbox" name="rpkellain2" class="custom-control-input" id="rpkellain2">
                                                                                <label class="custom-control-label" for="rpkellain2">Lain-lain</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12" style="margin: 0% 0 1% 0%;">
                                                                        <textarea name="text_rpkellain2" id="text_rpkellain2" class="custom-textarea" rows="4" placeholder="Sebutkan..."></textarea>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-2 col-form-label-custom">Pemeriksaan Fisik dan Tanda-Tanda Vital</label>
                                                            <div class="col-lg-10">
                                                                <div class="row" style="border: 1px solid grey; border-radius: 3px; margin: 0% 0.12%;">
                                                                    <div class="col-md-12" style="margin: 1% 0 1% 0%;">
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <label style="text-align: left;">Kesadaran : </label>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <input type="checkbox" name="pftvkcm" class="custom-control-input" id="pftvkcm">
                                                                                        <label class="custom-control-label" for="pftvkcm">CM</label>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <input type="checkbox" name="pftvkapatis" class="custom-control-input" id="pftvkapatis">
                                                                                        <label class="custom-control-label" for="pftvkapatis">Apatis</label>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <input type="checkbox" name="pftvksam" class="custom-control-input" id="pftvksam">
                                                                                        <label class="custom-control-label" for="pftvksam">Samnolen</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row" style="margin: 1% 0 1% 2%;">
                                                                                    <div class="col-md-3" >
                                                                                        <input type="checkbox" name="pftvksop" class="custom-control-input" id="pftvksop">
                                                                                        <label class="custom-control-label" for="pftvksop">Sopor</label>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <input type="checkbox" name="pftvkkom" class="custom-control-input" id="pftvkkom">
                                                                                        <label class="custom-control-label" for="pftvkkom">Koma</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <label style="text-align: left;">GCS : </label>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <label class="control-label" >E =</label>
                                                                                        <input type="input" name="gcse" class="control-input" id="gcse" maxlength="2" size="2">
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <label class="control-label" >M =</label>
                                                                                        <input type="input" name="gcsm" class="control-input" id="gcsm" maxlength="2" size="2">
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <label class="control-label" >V =</label>
                                                                                        <input type="input" name="gcsv" class="control-input" id="gcsv" maxlength="2" size="2">
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <label class="control-label" >Total =</label>
                                                                                        <input type="input" name="gcsm" class="control-input" id="gcsm" maxlength="2" size="2">
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            <div class="col-md-4" style="border-left: 1px solid grey;  ">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <label class="control-label" >Tekanan Darah</label>
                                                                                        <input style="margin: 0% 0 0% 2%;" type="input" name="pftvtd" class="control-input" id="pftvtd" maxlength="3" size="3">
                                                                                        <label class="control-label" >mmHg</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <label class="control-label" >Frekuensi Nadi</label>
                                                                                        <input style="margin: 0% 0 0% 2%;" type="input" name="pftvfrn" class="control-input" id="pftvfrn" maxlength="3" size="3">
                                                                                        <label class="control-label" >x/mnt</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <label class="control-label" >Suhu</label>
                                                                                        <input style="margin: 0% 0 0% 2%;" type="input" name="pftvsuhu" class="control-input" id="pftvsuhu" maxlength="3" size="3">
                                                                                        <label class="control-label" >°C</label>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <label class="control-label" >Frekuensi Nafas</label>
                                                                                        <input style="margin: 0% 0 0% 2%;" type="input" name="pftvfrnaf" class="control-input" id="pftvfrnaf" maxlength="3" size="3">
                                                                                        <label class="control-label" >x/mnt</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-2 col-form-label-custom">Riwayat Pekerjaan, Sosial Ekonomi, Kejiwaan dan Kebiasaan <p style="font-size: 9px; color: red">( termasuk riwayat perkawinan, obstetri, imunisasi tumuh kembang )</p></label>
                                                            <div class="col-lg-10">
                                                                <textarea name="rpsekk" id="rpsekk" placeholder="Riwayat Pekerjaan dan lainlain" class="custom-textarea" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row tight">
                                                            <label class="col-lg-2 col-form-label-custom">Alergi</label>
                                                            <div class="col-lg-10">
                                                                <!-- <textarea name="riwpendu" id="riwpendu" placeholder="Riwayat penyakit sekarang" class="custom-textarea" rows="4"></textarea> -->
                                                                <div class="row" style="border: 1px solid grey; border-radius: 3px; margin: 0% 0.12%;">
                                                                    <div class="col-md-1" style="margin: 1% 0 1% 2%;">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <input type="checkbox" name="talg" class="custom-control-input" id="talg">
                                                                                <label class="custom-control-label" for="talg">Tidak</label>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <input type="checkbox" name="yalg" class="custom-control-input" id="yalg">
                                                                                <label class="custom-control-label" for="yalg">Ya</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-10" style="margin: 1% 0 1% 2%;">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <textarea name="s_yalg" id="s_yalg" class="custom-textarea" rows="4" placeholder="Sebutkan..."></textarea>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <textarea name="r_yalg" id="r_yalg" class="custom-textarea" rows="4" placeholder="Reaksi..."></textarea>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <br/><br/>
                                            <div class="row" id="req_asmawper"></div> 
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Anamnesa Keperawatan -->
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpan()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Pemeriksaan -->



<!-- Modal Edit Operator -->
<div id="modal-edit-operator" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-edit-operator-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-edit-operator-label">Edit Operator</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-edit-operator role=form class="form-horizontal form-custom"') ?>
                <!-- Input Hidden Form -->
                <input type="hidden" name="id_tarif_tindakan" id="id-tarif-tindakan-eo">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group tight">
                            <label>Tindakan</label>
                            <h5 id="tindakan-label-eo"></h5>
                        </div>
                        <div class="form-group tight">
                            <label>Profesi</label>
                            <?= form_dropdown('profesi', $profesi, array(), 'class=form-control id=profesi-eo') ?>
                        </div>
                        <div class="form-group tight">
                            <label>Operator</label>
                            <input type="text" name="operator" class="select2-input" id="operator-eo">
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanEditOperator()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- End Modal Edit Operator -->