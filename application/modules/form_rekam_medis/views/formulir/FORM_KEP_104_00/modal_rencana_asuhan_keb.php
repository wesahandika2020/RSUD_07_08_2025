<!-- // RAK-->
<div class="modal fade" id="modal_rencana_asuhan_keb" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_rencana_asuhan_keb">FORM RENCANA ASUHAN KEBIDANAN</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_rencana_asuhan_keb class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-rak">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-rak">
                <input type="hidden" name="id_pasien" id="id-pasien-rak">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">  
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-rak"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-rm-rak"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Tanggal Lahir</td>
                                    <td>: <span id="tgl-lahir-rak"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-rak"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                                    <td wdith="70%">: <span id="bed-rak"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <!-- end header -->
               
                <!-- content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="data-rencana-asuhan-kebidanan-104-00">
                                <div class="col-lg">
                                    <table class="table table-sm table-striped" style="margin-top: -15px">
                                        <tr>
                                            <td width="100%">
                                                <h5 class="center"><b>Rencana Asuhan Kebidanan</b></h5>
                                            </td>
                                        </tr>
                                    </table>
                                    <div id="buka-tutup-rak">
                                    </div>
                                    <table class="table table-no-border table-sm table-striped" id="tabel-rak">
                                        <thead class="text-center"> 
                                            <tr>
                                                <td class="center"><b>No</td>
                                                <td class="center"><b>Tanggal</td>                                            
                                                <td class="center"><b>Petugas</td>                                               
                                                <td class="center" colspan="2"><b>Alat</b></td>
                                            </tr>
                                        </thead>
                                        <tbody class="body-table">
                                        </tbody>
                                    </table>
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:15px">
                                        <tr>
                                            <td>
                                                <br>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table class="table table-no-border table-sm table-striped" style="margin-top:15px">
                                        <tr>
                                            <td>
                                                Terimakasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanRencanaAsuhanKebidanan()"><span><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Rencana Asuhan Kebidanan





<!-- // RAK EDIT -->
<div id="modal-edit-rencana-asuhan-kebidanan-104-00" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Rencana Asuhan Kebidanan</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-rencana-asuhan-kebidanan-104-00'); ?>
                <input type="hidden" name="id" id="id-rencana-asuhan-kebidanan-104-00">
                    <table class="table table-no-border table-sm table-striped">
                        <tr>
                            <td>
                                <b>Tanggal
                            </td>
                            <td>
                                <b>:
                            </td>
                            <td>
                                <input type="text" name="tanggal_rak" id="edit-tanggal-rak" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="dd/mm/yyyy">
                            </td>
                        </tr>
                    </table>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                        <thead>
                            <tr>
                                <th width="5%" class="center">no</th>
                                <th width="30%" class="center"><b>Diagnosa/Masalah/Kebutuhan</b></th>
                                <th width="30%" class="center"><b>Intervensi</b></th>
                                <th width="10%" class="center"><b>Pagi</b></th>
                                <th width="10%" class="center"><b>Siang</b></th>
                                <th width="10%" class="center"><b>Malam</b></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="center"> <b> 1 </b> </td>
                                <td> 
                                    G <input type="text" name="g_rak_1" id="edit-g-rak-1"class="custom-form clear-input d-inline-block col-lg-2"> &nbsp;&nbsp;
                                    P <input type="text" name="p_rak_1" id="edit-p-rak-1"class="custom-form clear-input d-inline-block col-lg-2"> &nbsp;&nbsp;
                                    A <input type="text" name="a_rak_1" id="edit-a-rak-1"class="custom-form clear-input d-inline-block col-lg-2">                                                                                                     
                                </td>  
                                <td> 
                                    <input type="checkbox" name="losp_rak "id="edit-losp-rak" value="1"class="mr-1">
                                    Lakukan observasi sesuai partograf    
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_1 "id="edit-pagi-rak-1" value="1" class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_1 "id="edit-siang-rak-1" value="1" class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_1 "id="edit-malam-rak-1" value="1" class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    Hamil <input type="text" name="hm_rak_1" id="edit-hm-rak-1"class="custom-form clear-input d-inline-block col-lg-2"> Minggu
                                </td>  
                                <td> 
                                    <input type="checkbox" name="ds3m_rak "id="edit-ds3m-rak" value="1"class="mr-1">
                                    Djj setiap 30 menit   
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_2 "id="edit-pagi-rak-2" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_2 "id="edit-siang-rak-2" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_2 "id="edit-malam-rak-2" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="pkI_rak "id="edit-pkI-rak" value="1"class="mr-1">  Persalinan Kala I
                                </td>  
                                <td> 
                                    <input type="checkbox" name="hks3m_rak "id="edit-hks3m-rak" value="1"class="mr-1">
                                    His/kontraksi setiap 30 menit 
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_3 "id="edit-pagi-rak-3" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_3 "id="edit-siang-rak-3" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_3 "id="edit-malam-rak-3" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="bI_rak "id="edit-bI-rak" value="1"class="mr-1">  Belum Inpartu
                                </td>  
                                <td> 
                                    <input type="checkbox" name="ns3m_rak "id="edit-ns3m-rak" value="1"class="mr-1">
                                    Nadi setiap 30 menit 
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_4 "id="edit-pagi-rak-4" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_4 "id="edit-siang-rak-4" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_4 "id="edit-malam-rak-4" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="rptm_rak "id="edit-rptm-rak" value="1"class="mr-1">  Resiko Persalinan tak maju
                                </td>  
                                <td> 
                                    <input type="checkbox" name="pss4j_rak "id="edit-pss4j-rak" value="1"class="mr-1">
                                    Pembukaan serviks setiap 4 jam
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_5 "id="edit-pagi-rak-5" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_5 "id="edit-siang-rak-5" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_5 "id="edit-malam-rak-5" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="cemas_rak "id="edit-cemas-rak" value="1"class="mr-1">  Cemas
                                </td>  
                                <td> 
                                    <input type="checkbox" name="tddss4j_rak "id="edit-tddss4j-rak" value="1"class="mr-1">
                                    Tekanan darah dan suhu setiap 4 jam
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_6 "id="edit-pagi-rak-6" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_6 "id="edit-siang-rak-6" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_6 "id="edit-malam-rak-6" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="N_rak "id="edit-N-rak" value="1"class="mr-1">  Nyeri
                                </td>  
                                <td> 
                                    <input type="checkbox" name="pus24j_rak "id="edit-pus24j-rak" value="1"class="mr-1">
                                    Produksi urin setiap 2-4 jam
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_7 "id="edit-pagi-rak-7" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_7 "id="edit-siang-rak-7" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_7 "id="edit-malam-rak-7" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="ke_rak "id="edit-ke-rak" value="1"class="mr-1">  Kebutuhan edukasi
                                </td>  
                                <td> 
                                    <input type="checkbox" name="fiumpp_rak "id="edit-fiumpp-rak" value="1"class="mr-1">
                                    Fasilitasi ibu untuk memilih pendamping persalinan
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_8 "id="edit-pagi-rak-8" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_8 "id="edit-siang-rak-8" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_8 "id="edit-malam-rak-8" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="fiumdm_rak "id="edit-fiumdm-rak" value="1"class="mr-1">
                                    Fasilitasi ibu untuk makan dan minum
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_9 "id="edit-pagi-rak-9" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_9 "id="edit-siang-rak-9" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_9 "id="edit-malam-rak-9" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="fiub_rak "id="edit-fiub-rak" value="1"class="mr-1">
                                    Fasilitasi ibu untuk berkemih
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_10 "id="edit-pagi-rak-10" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_10 "id="edit-siang-rak-10" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_10 "id="edit-malam-rak-10" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="ajiumk_rak "id="edit-ajiumk-rak" value="1"class="mr-1">
                                    Anjurkan ibu untuk miring kiri
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_11 "id="edit-pagi-rak-11" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_11 "id="edit-siang-rak-11" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_11 "id="edit-malam-rak-11" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="atrumn_rak "id="edit-atrumn-rak" value="1"class="mr-1">
                                    Ajarkan teknik relaksi untuk mengurangi nyeri
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_12 "id="edit-pagi-rak-12" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_12 "id="edit-siang-rak-12" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_12 "id="edit-malam-rak-12" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="lsppsh_rak "id="edit-lsppsh-rak" value="1"class="mr-1">
                                    Lakukan sakral presure pada saat his
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_13 "id="edit-pagi-rak-13" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_13 "id="edit-siang-rak-13" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_13 "id="edit-malam-rak-13" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="akumd_rak "id="edit-akumd-rak" value="1"class="mr-1">
                                    Ajak keluarga untuk memberi dukungan
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_14 "id="edit-pagi-rak-14" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_14 "id="edit-siang-rak-14" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_14 "id="edit-malam-rak-14" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="bepdkk_rak "id="edit-bepdkk-rak" value="1"class="mr-1">
                                    Berikan edukasi proses dan kemajuan kehamilan
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_15 "id="edit-pagi-rak-15" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_15 "id="edit-siang-rak-15" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_15 "id="edit-malam-rak-15" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="bepp_rak "id="edit-bepp-rak" value="1"class="mr-1">
                                    Berikan edukasi posisi persalinan
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_16 "id="edit-pagi-rak-16" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_16 "id="edit-siang-rak-16" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_16 "id="edit-malam-rak-16" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="BetI_rak "id="edit-BetI-rak" value="1"class="mr-1">
                                    Berikan edukasi tentang IMD
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_17 "id="edit-pagi-rak-17" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_17 "id="edit-siang-rak-17" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_17 "id="edit-malam-rak-17" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            
                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Saap_rak "id="edit-Saap-rak" value="1"class="mr-1">
                                    Siapkan alat-alat partus
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_18 "id="edit-pagi-rak-18" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_18 "id="edit-siang-rak-18" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_18 "id="edit-malam-rak-18" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Kddaadpt_rak "id="edit-Kddaadpt-rak" value="1"class="mr-1">
                                    Kolaborasi dengan dokter apabila ada kondisi patologis
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_19 "id="edit-pagi-rak-19" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_19 "id="edit-siang-rak-19" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_19 "id="edit-malam-rak-19" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"> <b> 2 </b> </td>
                                <td> 
                                    Janin Presentasi <input type="text" name="JP_rak" id="edit-JP-rak"class="custom-form clear-input d-inline-block col-lg-4">                                                                    
                                </td>  
                                <td> 
                                    <input type="checkbox" name="LoDdkj_rak "id="edit-LoDdkj-rak" value="1"class="mr-1">
                                    Lakukan observasi DJJ dan kesejahteraan janin    
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_20 "id="edit-pagi-rak-20" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_20 "id="edit-siang-rak-20" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_20 "id="edit-malam-rak-20" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="TH_rak "id="edit-TH-rak" value="1"class="mr-1">  Tunggal Hidup                                                                   
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Logj_rak "id="edit-Logj-rak" value="1"class="mr-1">
                                    Lakukan observasi gerakan janin 
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_21 "id="edit-pagi-rak-21" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_21 "id="edit-siang-rak-21" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_21 "id="edit-malam-rak-21" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="kosong_rak "id="edit-kosong-rak" value="1"class="mr-1">  
                                    <input type="text" name="kosoong_rak" id="edit-kosoong-rak"class="custom-form clear-input d-inline-block col-lg-4">         
                                </td>  
                                <td> 
                                    <input type="checkbox" name="siapkan_rak "id="edit-siapkan-rak" value="1"class="mr-1">
                                    Siapkan alat-alat resusitasi dan perlengkapan untuk bayi
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_22 "id="edit-pagi-rak-22" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_22 "id="edit-siang-rak-22" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_22 "id="edit-malam-rak-22" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="Rgj_rak "id="edit-Rgj-rak" value="1"class="mr-1"> Resiko gawat janin          
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Kddaadp_rak "id="edit-Kddaadp-rak" value="1"class="mr-1">
                                    Kalaborasi dengan dokter apabila ada kondisi patologis
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_23 "id="edit-pagi-rak-23" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_23 "id="edit-siang-rak-23" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_23 "id="edit-malam-rak-23" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"> <b> 3 </b> </td>
                                <td> 
                                    G <input type="text" name="GG_rak" id="edit-GG-rak"class="custom-form clear-input d-inline-block col-lg-2"> &nbsp;&nbsp;
                                    P <input type="text" name="PP_rak" id="edit-PP-rak"class="custom-form clear-input d-inline-block col-lg-2"> &nbsp;&nbsp;
                                    A <input type="text" name="AA_rak" id="edit-AA-rak"class="custom-form clear-input d-inline-block col-lg-2">                                                                    
                                </td>  
                                <td> 
                                    <input type="checkbox" name="PtkII_rak "id="edit-PtkII-rak" value="1"class="mr-1">
                                    Pastikan tanda kala II    
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_24 "id="edit-pagi-rak-24" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_24 "id="edit-siang-rak-24" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_24 "id="edit-malam-rak-24" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    Hamil <input type="text" name="Hmm_rak" id="edit-Hmm-rak"class="custom-form clear-input d-inline-block col-lg-2"> Minggu
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Api_rak "id="edit-Api-rak" value="1"class="mr-1">
                                    Atur posisi ibu   
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_25 "id="edit-pagi-rak-25" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_25 "id="edit-siang-rak-25" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_25 "id="edit-malam-rak-25" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    Persalinan Kala II
                                </td>  
                                <td> 
                                    <input type="checkbox" name="PkII_rak "id="edit-PkII-rak" value="1"class="mr-1">
                                    Ajarkan cara meneran dengan baik dan benar
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_26 "id="edit-pagi-rak-26" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_26 "id="edit-siang-rak-26" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_26 "id="edit-malam-rak-26" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="Rpm_rak "id="edit-Rpm-rak" value="1"class="mr-1">  Risiko partus macet
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Pmjah_rak "id="edit-Pmjah-rak" value="1"class="mr-1">
                                    Pimpin meneran jika ada his
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_27 "id="edit-pagi-rak-27" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_27 "id="edit-siang-rak-27" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_27 "id="edit-malam-rak-27" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="Raj_rak "id="edit-Raj-rak" value="1"class="mr-1">  Risiko asfiksia janin
                                </td>  
                                <td> 
                                    <input type="checkbox" name="oDsm_rak "id="edit-oDsm-rak" value="1"class="mr-1">
                                    Observasi DJJ setiap 10 menit/setelah ibu meneran
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_28 "id="edit-pagi-rak-28" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_28 "id="edit-siang-rak-28" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_28 "id="edit-malam-rak-28" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Pk_rak "id="edit-Pk-rak" value="1"class="mr-1">
                                    Pecahkan ketuban
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_29 "id="edit-pagi-rak-29" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_29 "id="edit-siang-rak-29" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_29 "id="edit-malam-rak-29" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Lebp_rak "id="edit-Lebp-rak" value="1"class="mr-1">
                                    Lakukan episiotomi bila perlu
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_30 "id="edit-pagi-rak-30" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_30 "id="edit-siang-rak-30" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_30 "id="edit-malam-rak-30" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Lb_rak "id="edit-Lb-rak" value="1"class="mr-1">
                                    Lahirkan bayi
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_31 "id="edit-pagi-rak-31" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_31 "id="edit-siang-rak-31" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_31 "id="edit-malam-rak-31" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Lbdpi_rak "id="edit-Lbdpi-rak" value="1"class="mr-1">
                                    Letakan bayi diatas perut ibu, dengan posisi kepala lebih rendah
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_32 "id="edit-pagi-rak-32" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_32 "id="edit-siang-rak-32" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_32 "id="edit-malam-rak-32" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Bjnb_rak "id="edit-Bjnb-rak" value="1"class="mr-1">
                                    Bersihkan jalan nafas bayi
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_33 "id="edit-pagi-rak-33" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_33 "id="edit-siang-rak-33" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_33 "id="edit-malam-rak-33" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Kbslr_rak "id="edit-Kbslr-rak" value="1"class="mr-1">
                                    Keringkan bayi sambil lakukan rangsang taktil dengan kain/selimut diatas perut ibu
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_34 "id="edit-pagi-rak-34" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_34 "id="edit-siang-rak-34" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_34 "id="edit-malam-rak-34" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Gkyb_rak "id="edit-Gkyb-rak" value="1"class="mr-1">
                                    Ganti kain yang basah, dan pastikan kepala bayi tertutup dengan baik
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_35 "id="edit-pagi-rak-35" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_35 "id="edit-siang-rak-35" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_35 "id="edit-malam-rak-35" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Nsabm_rak "id="edit-Nsabm-rak" value="1"class="mr-1">
                                    Nilai sekilas apakah bayi menangis kuat, dan tonus otot baik
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_36 "id="edit-pagi-rak-36" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_36 "id="edit-siang-rak-36" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_36 "id="edit-malam-rak-36" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Cjk_rak "id="edit-Cjk-rak" value="1"class="mr-1">
                                    Cek janin kedua
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_37 "id="edit-pagi-rak-37" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_37 "id="edit-siang-rak-37" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_37 "id="edit-malam-rak-37" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Kddaakp_rak "id="edit-Kddaakp-rak" value="1"class="mr-1">
                                    Kolaborasi dengan dokter apabila ada kondisi patologis
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_38 "id="edit-pagi-rak-38" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_38 "id="edit-siang-rak-38" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_38 "id="edit-malam-rak-38" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"> <b> 4 </b> </td>
                                <td> 
                                    P <input type="text" name="p2_rak" id="edit-p2-rak"class="custom-form clear-input d-inline-block col-lg-2"> &nbsp;&nbsp;
                                    A <input type="text" name="a2_rak" id="edit-a2-rak"class="custom-form clear-input d-inline-block col-lg-2">                                                                    
                                </td>  
                                <td> 
                                    <input type="checkbox" name="ls1_rak "id="edit-ls1-rak" value="1"class="mr-1">
                                    Lakukan segera (1 menit pertama setelah bayi lahir) penyuntikan Oksitosin 10 iu secara IM di 1/3 bagian atas paha bagian luar.   
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_39 "id="edit-pagi-rak-39" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_39 "id="edit-siang-rak-39" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_39 "id="edit-malam-rak-39" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    Persalinan Kala III
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Jdptp_rak "id="edit-Jdptp-rak" value="1"class="mr-1">
                                    Jepit dan potong tali pusat (2 menit setelah bayi lahir) 
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_40 "id="edit-pagi-rak-40" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_40 "id="edit-siang-rak-40" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_40 "id="edit-malam-rak-40" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="Rrp_rak "id="edit-Rrp-rak" value="1"class="mr-1">  Resiko retensio plasenta
                                </td>  
                                <td> 
                                    <input type="checkbox" name="FbuI_rak "id="edit-FbuI-rak" value="1"class="mr-1">
                                    Fasilitasi bayi untuk IMD dan perhatikan kehangatan bayi
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_41 "id="edit-pagi-rak-41" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_41 "id="edit-siang-rak-41" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_41 "id="edit-malam-rak-41" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Bidpp_rak "id="edit-Bidpp-rak" value="1"class="mr-1">
                                    Beritahu ibu dan pendamping persalinan untuk ikut mengawasi bayi
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_42 "id="edit-pagi-rak-42" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_42 "id="edit-siang-rak-42" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_42 "id="edit-malam-rak-42" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Lptpt_rak "id="edit-Lptpt-rak" value="1"class="mr-1">
                                    Lakukan peregangan tali pusat terkendali
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_43 "id="edit-pagi-rak-43" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_43 "id="edit-siang-rak-43" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_43 "id="edit-malam-rak-43" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="llp_rak "id="edit-llp-rak" value="1"class="mr-1">
                                    Lahirkan plasenta
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_44 "id="edit-pagi-rak-44" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_44 "id="edit-siang-rak-44" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_44 "id="edit-malam-rak-44" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Mum_rak "id="edit-Mum-rak" value="1"class="mr-1">
                                    Masase'uterus minimal 15 detik, pastikan kontraksi baik
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_45" id="edit-pagi-rak-45" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_45" id="edit-siang-rak-45" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_45" id="edit-malam-rak-45" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Pjl_rak "id="edit-Pjl-rak" value="1"class="mr-1">
                                    Periksa jalan lahir dan perkirakan darah yang keluar
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_46 "id="edit-pagi-rak-46" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_46 "id="edit-siang-rak-46" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_46 "id="edit-malam-rak-46" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Nkp_rak "id="edit-Nkp-rak" value="1"class="mr-1">
                                    Nilai kelengkapan plasenta
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_47 "id="edit-pagi-rak-47" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_47 "id="edit-siang-rak-47" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_47 "id="edit-malam-rak-47" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Kddaakpy_rak "id="edit-Kddaakpy-rak" value="1"class="mr-1">
                                    Kolaborasi dengan dokter apabila ada kondisi patologis
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_48 "id="edit-pagi-rak-48" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_48 "id="edit-siang-rak-48" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_48 "id="edit-malam-rak-48" value="1"class="mr-1"> 
                                </td> 
                            </tr>
                          
                            <tr>
                                <td class="center"> <b> 5 </b> </td>
                                <td> 
                                    P <input type="text" name="PP3_rak" id="edit-PP3-rak" class="custom-form clear-input d-inline-block col-lg-2"> &nbsp;&nbsp;
                                    A <input type="text" name="AA3_rak" id="edit-AA3-rak" class="custom-form clear-input d-inline-block col-lg-2">                                                                    
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Lbttv_rak "id="edit-Lbttv-rak" value="1"class="mr-1">
                                    Lakukan observasi tanda-tanda vital  
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_49 "id="edit-pagi-rak-49" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_49 "id="edit-siang-rak-49" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_49 "id="edit-malam-rak-49" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    Persalinan Kala IV
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Pjll_rak "id="edit-Pjll-rak" value="1"class="mr-1">
                                    Periksa jalan lahir, lakukan tindakan aseptik pada daerah perineum
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_50 "id="edit-pagi-rak-50" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_50 "id="edit-siang-rak-50" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_50 "id="edit-malam-rak-50" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="RP_rak "id="edit-RP-rak" value="1"class="mr-1">  Resiko Perdarahan
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Gal_rak "id="edit-Gal-rak" value="1"class="mr-1">
                                    Gunakan anastesi lokal pada perineum yang akan di jahit
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_51 "id="edit-pagi-rak-51" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_51 "id="edit-siang-rak-51" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_51 "id="edit-malam-rak-51" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    <input type="checkbox" name="Kee_rak "id="edit-Kee-rak" value="1"class="mr-1">  Kebutuhan edukasi
                                </td>  
                                <td> 
                                    <input type="checkbox" name="Lhp_rak "id="edit-Lhp-rak" value="1"class="mr-1">
                                    Lakukan hecting perineum
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_52 "id="edit-pagi-rak-52" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_52 "id="edit-siang-rak-52" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_52 "id="edit-malam-rak-52" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Kbpdp_rak "id="edit-Kbpdp-rak" value="1"class="mr-1">
                                    Kompres betadine pada daerah perineum yang di hecting
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_53 "id="edit-pagi-rak-53" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_53 "id="edit-siang-rak-53" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_53 "id="edit-malam-rak-53" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Ottv_rak "id="edit-Ottv-rak" value="1"class="mr-1">
                                    Observasi tanda-tanda vital, kontraksi uterus, dan perdarahan post partum sesuai partograf
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_54 "id="edit-pagi-rak-54" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_54 "id="edit-siang-rak-54" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_54 "id="edit-malam-rak-54" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Aium_rak "id="edit-Aium-rak" value="1"class="mr-1">
                                    Ajarkan ibu untuk memeriksa dan melakukan massage pada rahim
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_55 "id="edit-pagi-rak-55" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_55 "id="edit-siang-rak-55" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_55 "id="edit-malam-rak-55" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Becpjp_rak "id="edit-Becpjp-rak" value="1"class="mr-1">
                                    Berikan edukasi cara perawatan jahitan perineum
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_56 "id="edit-pagi-rak-56" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_56 "id="edit-siang-rak-56" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_56 "id="edit-malam-rak-56" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Betbpp_rak "id="edit-Betbpp-rak" value="1"class="mr-1">
                                    Berikan edukasi tanda bahaya post partum
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_57 "id="edit-pagi-rak-57" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_57 "id="edit-siang-rak-57" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_57 "id="edit-malam-rak-57" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="PkRr_rak "id="edit-PkRr-rak" value="1"class="mr-1">
                                    Pindahkan ke ruang rawat kebidanan jika dalam 2 jam observasi kala IV tidak ada kondisi patologis
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_58 "id="edit-pagi-rak-58" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_58 "id="edit-siang-rak-58" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_58 "id="edit-malam-rak-58" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="Kddaa_rak "id="edit-Kddaa-rak" value="1"class="mr-1">
                                    Kolaborasi dengan dokter apabila ada kondisi patologis
                                </td>
                                <td class="center">
                                    <input type="checkbox" name="pagi_rak_59 "id="edit-pagi-rak-59" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="siang_rak_59 "id="edit-siang-rak-59" value="1"class="mr-1"> 
                                </td> 
                                <td class="center">
                                    <input type="checkbox" name="malam_rak_59 "id="edit-malam-rak-59" value="1"class="mr-1"> 
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"></td>
                                <td> 
                                    Lain - lain  <textarea name="lain_rak" id="edit-lain-rak" rows="2" class="form-control clear-input" placeholder=""></textarea>                                                                
                                </td>  
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-rak">
            </div>
        </div>
    </div>
</div>













