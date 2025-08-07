<!-- // PDIRJRJ + -->
<!-- FORM ENTRI REKAM MEDIS -->
<div class="modal fade" id="modal_form_rekam_medis_rajal_rm" role="dialog" data-backdrop="static"
    aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_form_rekam_medis_rajal_rm">FORM ENTRI REKAM MEDIS</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_entri_rekam_medis class=form-horizontal') ?>
                <!-- <input type="hidden" name="id_rekam_medis" id="id-rekam-medis"> -->
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-efrm">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-pdirjrj">
                <input type="hidden" name="id_efrm" id="id-efrm">
                <input type="hidden" name="id_pasien" id="id-pasien-pdirjrj">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">

                <!-- header -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="rm-nama-pasien-pdirjrj"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-rm-pdirjrj"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="rm-tanggal-lahir-pdirjrj"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="rm-jenis-kelamin-pdirjrj"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Nama Poliklinik</td>
                                    <td wdith="70%">: <span id="rm-poli-pdirjrj"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end header -->

                <!-- content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-rekam-medis">
                                <ol>
                                    <li>Pengkajian dan Intervensi Resiko Jatuh Rawat Jalan </li>
                                </ol>
                                <div class="form-pengkajian-dan-intervensi-resiko-jatuh-rawat-jalan">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-sm table-striped" style="margin-top: -15px">
                                                <tr>
                                                    <td width="100%">
                                                        <h5 class="center"><b>Pengkajian dan Intervensi Resiko Jatuh Rawat Jalan</b></h5>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-pengkajian-dan-intervensi-resiko-jatuh-rawat-jalan">
                                    <div class="row">   
                                        <tr>                                       
                                            <td width="100%">
                                                <table class="table table-sm table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="center" colspan="9"><b></b></th>
                                                        </tr>
                                                        <tr>
                                                            <th width="5%" class="center"><b>Pengkajian</b></th>
                                                            <th width="2%" class="center"><b>No</b></th>
                                                            <th width="40%" class="center"><b>Penilaian/Pengkajian</b></th>
                                                            <th width="5%" class="center"><b>Ya</b></th>
                                                            <th width="5%" class="center"><b>Tidak</b></th>                                                                  
                                                        </tr>
                                                    </thead>   
                                                    <tbody>
                                                        <tr>
                                                            <td class="center"></td>
                                                            <td class="center">a.</td>
                                                            <td>Cara berjalan (salah satu atau lebih)</td>
                                                            <td></td> 
                                                            <td></td> 
                                                        </tr>
                                                        <tr>
                                                            <td class="center"></td>
                                                            <td class="center"></td>
                                                            <td>
                                                                <input type="checkbox" name="pengkajian_pdirjrj_1"
                                                                    id="pengkajian-pdirjrj-1" value="1"class="mr-1">
                                                                   1. Tidak / Seimbang / Sempoyongan / Limbung
                                                                </td>
                                                            <td class="center">
                                                                <input type="radio" name="pengkajian_pdirjrj_2"
                                                                id="pengkajian-pdirjrj-2" class="mr-1" value="1">
                                                            </td> 
                                                            <td class="center">
                                                                <input type="radio" name="pengkajian_pdirjrj_2"
                                                                id="pengkajian-pdirjrj-3" class="mr-1" value="0">
                                                            </td> 
                                                        </tr>

                                                        <tr>
                                                            <td class="center"></td>
                                                            <td class="center"></td>
                                                            <td>
                                                                <input type="checkbox" name="pengkajian_pdirjrj_4"
                                                                    id="pengkajian-pdirjrj-4" value="1"class="mr-1">
                                                                   2. Jalan dengan menggunakan alat bantu (kruk, tripot kursi roda, orang lain)
                                                                </td>
                                                            <td class="center">
                                                                <input type="radio" name="pengkajian_pdirjrj_5"
                                                                id="pengkajian-pdirjrj-5" class="mr-1" value="1">
                                                            </td> 
                                                            <td class="center">
                                                                <input type="radio" name="pengkajian_pdirjrj_5"
                                                                id="pengkajian-pdirjrj-6" class="mr-1" value="0">
                                                            </td> 
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td class="center"></td>
                                                            <td class="center">b.</td>
                                                            <td>
                                                                <input type="checkbox" name="pengkajian_pdirjrj_7"
                                                                    id="pengkajian-pdirjrj-7" value="1"class="mr-1">
                                                                    Menopang saat akan duduk : tampak memegang pinggiran kursi atau meja / benda lain sebagaai penopang saat akan duduk
                                                                </td>
                                                            <td class="center">
                                                                <input type="radio" name="pengkajian_pdirjrj_8"
                                                                id="pengkajian-pdirjrj-8" class="mr-1" value="1">
                                                            </td> 
                                                            <td class="center">
                                                                <input type="radio" name="pengkajian_pdirjrj_8"
                                                                id="pengkajian-pdirjrj-9" class="mr-1" value="0">
                                                            </td> 
                                                        </tr>
                                                    </tbody>                                                  
                                                </table>
                                                <table class="table table-sm table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="center" colspan="9"><b></b></th>
                                                        </tr>
                                                        <tr>
                                                            <th width="5%" class="center"><b>Hasil</b></th>
                                                            <th width="2%" class="center"><b>No</b></th>
                                                            <th width="20%" class="center"><b>Hasil</b></th>
                                                            <th width="20%" class="center"><b>Penilaian / Pengkajian</b></th>
                                                            <th width="30%" class="center"><b>Keterangan</b></th>                                                                
                                                        </tr>
                                                    </thead>   
                                                    <tbody>
                                                        <tr>
                                                            <td class="center"></td>
                                                            <td class="center">1.</td>
                                                            <td>
                                                                <input type="checkbox" name="hasil_pdirjrj_1"
                                                                    id="hasil-pdirjrj-1" value="1"class="mr-1">
                                                                    Tidak Beresiko
                                                                </td>
                                                            <td>
                                                                <input type="checkbox" name="hasil_pdirjrj_2"
                                                                    id="hasil-pdirjrj-2" value="1"class="mr-1">
                                                                    Tidak ditemukan a dan b
                                                                </td>
                                                            <td class="center">
                                                            <input type="text" name="hasil_pdirjrj_3" id="hasil-pdirjrj-3"
                                                                class="custom-form clear-input">
                                                            </td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="center"></td>
                                                            <td class="center">2.</td>
                                                            <td>
                                                                <input type="checkbox" name="hasil_pdirjrj_4"
                                                                    id="hasil-pdirjrj-4" value="1"class="mr-1">
                                                                    Resiko rendah
                                                                </td>
                                                            <td>
                                                                <input type="checkbox" name="hasil_pdirjrj_5"
                                                                    id="hasil-pdirjrj-5" value="1"class="mr-1">
                                                                    Ditemukan  salah satu a / b
                                                                </td>
                                                            <td class="center">
                                                            <input type="text" name="hasil_pdirjrj_6" id="hasil-pdirjrj-6"
                                                                class="custom-form clear-input">
                                                            </td>
                                                        </tr>  
                                                        <tr>
                                                            <td class="center"></td>
                                                            <td class="center">3.</td>
                                                            <td>
                                                                <input type="checkbox" name="hasil_pdirjrj_7"
                                                                    id="hasil-pdirjrj-7" value="1"class="mr-1">
                                                                    Resiko tinggi
                                                                </td>
                                                            <td>
                                                                <input type="checkbox" name="hasil_pdirjrj_8"
                                                                    id="hasil-pdirjrj-8" value="1"class="mr-1">
                                                                    Ditemukan a dan b
                                                                </td>
                                                            <td class="center">
                                                            <input type="text" name="hasil_pdirjrj_9" id="hasil-pdirjrj-9"
                                                                class="custom-form clear-input">
                                                            </td>
                                                        </tr>                                                
                                                    </tbody>                                                  
                                                </table>
                                                <table class="table table-sm table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="center" colspan="9"><b></b></th>
                                                        </tr>
                                                        <tr>
                                                            <th width="5%" class="center"><b>Intervensi</b></th>
                                                            <th width="2%" class="center"><b>No</b></th>
                                                            <th width="20%" class="center"><b>Hasil Kajian</b></th>
                                                            <th width="20%" class="center"><b>Tindakan</b></th>
                                                            <th width="5%" class="center"><b>Ya</b></th>
                                                            <th width="5%" class="center"><b>Tidak</b></th> 
                                                            <th width="25%" class="center"><b>Ttd/Nama Petugas</b></th>                                                                
                                                        </tr>
                                                    </thead>   
                                                    <tbody>
                                                        <tr>
                                                            <td class="center"></td>
                                                            <td class="center">1.</td>
                                                            <td>
                                                                <input type="checkbox" name="intervensi_pdirjrj_1"
                                                                    id="intervensi-pdirjrj-1" value="1"class="mr-1">
                                                                    Tidak Beresiko
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" name="intervensi_pdirjrj_2"
                                                                    id="intervensi-pdirjrj-2" value="1"class="mr-1">
                                                                    Tidak ada tindakan
                                                            </td>
                                                            <td class="center">
                                                                <input type="radio" name="intervensi_pdirjrj_3"
                                                                id="intervensi-pdirjrj-3" class="mr-1" value="1">
                                                            </td> 
                                                            <td class="center">
                                                                <input type="radio" name="intervensi_pdirjrj_3"
                                                                id="intervensi-pdirjrj-4" class="mr-1" value="0">
                                                            </td>
                                                            <td class="center">
                                                            <input type="text" name="perawat_pdirjrj_1" id="perawat-pdirjrj-1"
                                                                class="select2c-input ml-2">
                                                            </td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="center"></td>
                                                            <td class="center">2.</td>
                                                            <td>
                                                                <input type="checkbox" name="intervensi_pdirjrj_5"
                                                                    id="intervensi-pdirjrj-5" value="1"class="mr-1">
                                                                    Resiko rendah
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" name="intervensi_pdirjrj_6"
                                                                    id="intervensi-pdirjrj-6" value="1"class="mr-1">
                                                                    Edukasi
                                                            <td class="center">
                                                                <input type="radio" name="intervensi_pdirjrj_7"
                                                                id="intervensi-pdirjrj-7" class="mr-1" value="1">
                                                            </td> 
                                                            <td class="center">
                                                                <input type="radio" name="intervensi_pdirjrj_7"
                                                                id="intervensi-pdirjrj-8" class="mr-1" value="0">
                                                            </td>
                                                            <td class="center">
                                                            <input type="text" name="perawat_pdirjrj_2" id="perawat-pdirjrj-2"
                                                                class="select2c-input ml-2">
                                                            </td>
                                                        </tr> 
                                                        <tr>
                                                            <td class="center"></td>
                                                            <td class="center">2.</td>
                                                            <td>
                                                                <input type="checkbox" name="intervensi_pdirjrj_9"
                                                                    id="intervensi-pdirjrj-9" value="1"class="mr-1">
                                                                    Resiko tinggi
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" name="intervensi_pdirjrj_10"
                                                                    id="intervensi-pdirjrj-10" value="1"class="mr-1">
                                                                    Kalung resiko jatuh
                                                            <td class="center">
                                                                <input type="radio" name="intervensi_pdirjrj_11"
                                                                id="intervensi-pdirjrj-11" class="mr-1" value="1">
                                                            </td> 
                                                            <td class="center">
                                                                <input type="radio" name="intervensi_pdirjrj_11"
                                                                id="intervensi-pdirjrj-12" class="mr-1" value="0">
                                                            </td>
                                                            <td class="center">
                                                            <input type="text" name="perawat_pdirjrj_3" id="perawat-pdirjrj-3"
                                                                class="select2c-input ml-2">
                                                            </td>
                                                        </tr>                                            
                                                    </tbody>                                                  
                                                </table>
                                            </td>
                                        </tr> 
                                    </div>                                                   
                                    </div>                                      
                                </div>              
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button id="btn-simpan" type="button" class="btn btn-info"onclick="konfirmasiSimpanEntriFormRekamMedis()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Entervensi Rajal -->
<!-- <!?php $this->load->view('rekam_medis_form/js') ?> -->
