<!-- // PNCS-->
<div class="modal fade" id="modal_pengkajian_nyeri_comfort_scale" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                <h5 class="modal-title bold" id="modal_pengkajian_nyeri_comfort_scale">PENGKAJIAN NYERI COMFORT SCALE</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_pengkajian_nyeri_comfort_scale class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-pncs">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-pncs">
                <input type="hidden" name="id_pasien" id="id-pasien-pncs">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">   
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <tr>
                                <td width="20%" class="bold">Nama Pasien</td>
                                <td wdith="80%">: <span id="nama-pasien-pncs"></span></td>
                            </tr>
                            <tr>
                                <td class="bold">No. RM</td>
                                <td>: <span id="no-rm-pncs"></span></td>
                            </tr>
                            <tr>
                                <td class="bold">Tanggal Lahir</td>
                                <td>: <span id="tgl-lahir-pncs"></span></td>
                            </tr>
                            <tr>
                                <td class="bold">Jenis Kelamin</td>
                                <td>: <span id="jenis-kelamin-pncs"></span></td>
                            </tr>
                        </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <tr>
                            <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                            <td wdith="70%">: <span id="bed-pncs"></span></td>
                            </tr>
                            <tr>
                            <td colspan="2">
                                <div class="ek-logo-pasien-alergi">
                                <img src="<?= resource_url() ?>images/diagnosa/alergi.jpg" alt="ek-logo-pasien-alergi" class="img-thumbnail rounded" width="20%">
                                </div>
                            </td>
                            </tr>
                        </table>
                        </div>
                    </div>
                    </div>
                    <table class="table table-no-border table-sm table-striped"
                        style="margin-top:-15px">
                        <tr>
                            <td colspan="3" class="center bold td-dark">
                                <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                    data-toggle="collapse"
                                    data-target="#data-pengkajian-nyeri-comfort-scale"><i
                                        class="fas fa-expand mr-1"></i>Expand
                                </button>
                                PENGKAJIAN NYERI COMFORT SCALE
                            </td>
                        </tr>
                    </table>
                    <div class="collapse multi-collapse mt-2" id="data-pengkajian-nyeri-comfort-scale">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="well">
                                    <div class="form-pengkajian-pncs">
                                        <table class="table table-no-border table-sm table-striped">
                                        </table>
                                        <div class="col">
                                            <div id="buka-tutup-pncs"></div>
                                            <div class="row">
                                                <table class="table table-no-border table-sm table-striped"id="tabel-pncs">
                                                    <thead>
                                                        <tr>
                                                            <th class="center"><b>No</b></th>
                                                            <th class="center"><b>Tanggal</b></th>
                                                            <th class="center"><b>Jam</b></th>
                                                            <th class="center"><b>Jumlah Skor</b></th>
                                                            <th class="center"><b>paraf</b></th>
                                                            <th class="center"><b>Nama Perawat</b></th>
                                                            <th class="center"><b>Petugas</b></th>
                                                            <th class="center" colspan="2"><b>Alat</b></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="body-table">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_close() ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button id="btn-simpan" type="button" class="btn btn-info" onclick="konfirmasiSimpanPengkajianNyeriComfortScale()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
            </div>

        </div>
    </div>
</div>
<!-- End Modal Pengkajian Nyeri Comfort Scale

<!-- // PNCS EDIT -->>
<div id="modal-edit-pengkajian-nyeri-comfort-scale" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 75%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Pengkajian Nyeri Confort Scale</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-pengkajian-nyeri-comfort-scale'); ?>
                <input type="hidden" name="id" id="id-pengkajian-nyeri-comfort-scale">
                <table class="table table-no-border table-sm table-striped">
                        <tr>
                            <td>
                                Tanggal Pengkajian
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <input type="text" name="pncs_tanggal_pengkajian" id="edit-pncs-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="dd/mm/yyyy">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jam Pengkajian
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <input type="text" name="pncs_jam" id="edit-pncs-jam" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="masukan jam">
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-pncs">
                        <thead>
                            <tr>
                                <th width="5%" class="center">no</th>
                                <th width="15%" class="center"><b>Kategori</b></th>
                                <th width="60%" class="center"><b></b></th>
                                <th width="10%" class="center"><b>Skor</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="center"> <b> 1 </b> </td>
                                <td> <input type="hidden" id="kategori-edit-kewaspadaan-pncs"> <b> Kewaspadaan </b> </td>
                                <td> 1 - tidur pulas/nyenyak </td>
                                <td class="center">
                                    <input type="radio" name="kewaspadaan_pncs" id="edit-kewaspadaan-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - tidur kurang nyenyak </td>
                                <td class="center">
                                    <input type="radio" name="kewaspadaan_pncs" id="edit-kewaspadaan-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()"> 2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - gelisah </td>
                                <td class="center">
                                    <input type="radio" name="kewaspadaan_pncs" id="edit-kewaspadaan-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()"> 3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - sadar sepenuhnya dan waspada </td>
                                <td class="center">
                                    <input type="radio" name="kewaspadaan_pncs" id="edit-kewaspadaan-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()"> 4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - hiper alert </td>
                                <td class="center">
                                    <input type="radio" name="kewaspadaan_pncs" id="edit-kewaspadaan-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()"> 5
                                </td> 
                            </tr>


                            <tr>
                                <td class="center"> <b> 2 </b> </td>
                                <td> <input type="hidden" id="kategori-edit-ketenangan-pncs"> <b> Ketenangan </b> </td>
                                <td> 1 - tenang </td>
                                <td class="center">
                                    <input type="radio" name="ketenangan_pncs" id="edit-ketenangan-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - agak cemas </td>
                                <td class="center">
                                    <input type="radio" name="ketenangan_pncs" id="edit-ketenangan-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()"> 2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - cemas </td>
                                <td class="center">
                                    <input type="radio" name="ketenangan_pncs" id="edit-ketenangan-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()"> 3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - sangat cemas </td>
                                <td class="center">
                                    <input type="radio" name="ketenangan_pncs" id="edit-ketenangan-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()"> 4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - panik </td>
                                <td class="center">
                                    <input type="radio" name="ketenangan_pncs" id="edit-ketenangan-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()"> 5
                                </td> 
                            </tr>


                            <tr>
                                <td class="center"> <b> 3 </b> </td>
                                <td><input type="hidden" id="kategori-edit-distress-pncs"><b> Distress pernapasan </b> </td>
                                <td> 1 - tidak ada respirasi spontan dan tidak ada batuk </td>
                                <td class="center">
                                    <input type="radio" name="distress_pncs" id="edit-distress-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - respirasi spontan dengan sedikit / tidak ada respons terhadap ventilasi </td>
                                <td class="center">
                                    <input type="radio" name="distress_pncs" id="edit-distress-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()">  2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - kadang-kadang batuk atau terdapat tahanan terhadap ventilasi </td>
                                <td class="center">
                                    <input type="radio" name="distress_pncs" id="edit-distress-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()">  3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - sering batuk, terdapat tahanan / perlawanan terhadap ventilator </td>
                                <td class="center">
                                    <input type="radio" name="distress_pncs" id="edit-distress-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()">  4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - melawan secara aktif terhadap ventilator, batuk terus - menerus / tersedak </td>
                                <td class="center">
                                    <input type="radio" name="distress_pncs" id="edit-distress-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()">  5
                                </td> 
                            </tr>



                            <tr>
                                <td class="center"> <b> 4 </b> </td>
                                <td> <input type="hidden" id="kategori-edit-menangis-pncs"> <b> Menangis </b> </td>
                                <td> 1 - bernapas dengan tenang, tidak menangis </td>
                                <td class="center">
                                    <input type="radio" name="menangis_pncs" id="edit-menangis-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - terisak-isak </td>
                                <td class="center">
                                    <input type="radio" name="menangis_pncs" id="edit-menangis-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()"> 2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - meraung </td>
                                <td class="center">
                                    <input type="radio" name="menangis_pncs" id="edit-menangis-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()"> 3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - menangis </td>
                                <td class="center">
                                    <input type="radio" name="menangis_pncs" id="edit-menangis-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()"> 4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - berteriak </td>
                                <td class="center">
                                    <input type="radio" name="menangis_pncs" id="edit-menangis-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()">  5
                                </td> 
                            </tr>


                            <tr>
                                <td class="center"> <b> 5 </b> </td>
                                <td> <input type="hidden" id="kategori-edit-pergerakan-pncs"> <b> Pergerakan </b> </td>
                                <td> 1 - tidak ada pergerakan </td>
                                <td class="center">
                                    <input type="radio" name="pergerakan_pncs" id="edit-pergerakan-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - kadang-kadang bergerak perlahan </td>
                                <td class="center">
                                    <input type="radio" name="pergerakan_pncs" id="edit-pergerakan-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()"> 2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - sering bergerak perlahan </td>
                                <td class="center">
                                    <input type="radio" name="pergerakan_pncs" id="edit-pergerakan-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()"> 3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - pergerakan aktif / gelisah </td>
                                <td class="center">
                                    <input type="radio" name="pergerakan_pncs" id="edit-pergerakan-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()"> 4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - pergerakan aktif termasuk badan dan kepala </td>
                                <td class="center">
                                    <input type="radio" name="pergerakan_pncs" id="edit-pergerakan-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()"> 5
                                </td> 
                            </tr>

                            <tr>
                                <td class="center"> <b> 6 </b> </td>
                                <td> <input type="hidden" id="kategori-edit-tonus-pncs"> <b> Tonus otot </b> </td>
                                <td> 1 - otot relaks sepenuhnya, tidak ada tonus otot </td>
                                <td class="center">
                                    <input type="radio" name="tonus_pncs" id="edit-tonus-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - penurunan tonus otot </td>
                                <td class="center">
                                    <input type="radio" name="tonus_pncs" id="edit-tonus-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()"> 2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - tonus otot normal </td>
                                <td class="center">
                                    <input type="radio" name="tonus_pncs" id="edit-tonus-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()"> 3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - peningkatan tonus otot dan fleksi jari tangan dan kaki </td>
                                <td class="center">
                                    <input type="radio" name="tonus_pncs" id="edit-tonus-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()"> 4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - kekakuan otot exstrim dan fleksi jari tangan dan kaki </td>
                                <td class="center">
                                    <input type="radio" name="tonus_pncs" id="edit-tonus-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()"> 5
                                </td> 
                            </tr>


                            <tr>
                                <td class="center"> <b> 7 </b> </td>
                                <td> <input type="hidden" id="kategori-edit-tegangan-pncs"> <b> Tegangan Wajah </b> </td>
                                <td> 1 - otot wajah relaks sepenuhnya </td>
                                <td class="center">
                                    <input type="radio" name="tegangan_pncs" id="edit-tegangan-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - tonus otot wajah normal, tidak terlihat tegangan otot wajah yang nyata </td>
                                <td class="center">
                                    <input type="radio" name="tegangan_pncs" id="edit-tegangan-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()"> 2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - tegangan beberapa otot wajah terlihat nyata </td>
                                <td class="center">
                                    <input type="radio" name="tegangan_pncs" id="edit-tegangan-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()"> 3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - tegangan hampir di seluruh otot wajah </td>
                                <td class="center">
                                    <input type="radio" name="tegangan_pncs" id="edit-tegangan-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()"> 4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - seluruh otot wajah tegang, meringis </td>
                                <td class="center">
                                    <input type="radio" name="tegangan_pncs" id="edit-tegangan-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()"> 5
                                </td> 
                            </tr>


                            <tr>
                                <td class="center"> <b> 8 </b> </td>
                                <td> <input type="hidden" id="kategori-edit-tekanan-pncs"> <b> Tekanan darah basal </b> </td>
                                <td> 1 - tekanan darah di bawah batas normal </td>
                                <td class="center">
                                    <input type="radio" name="tekanan_pncs" id="edit-tekanan-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - tekanan darah berada di batas normal secara konsisten </td>
                                <td class="center">
                                    <input type="radio" name="tekanan_pncs" id="edit-tekanan-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()"> 2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - peningkatan tekanan darah sesekali  ≥15% di atas batas normal (1-3 kali dalam observasi selama 2 menit) </td>
                                <td class="center">
                                    <input type="radio" name="tekanan_pncs" id="edit-tekanan-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()"> 3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - seringnya peningkatan tekanan darah  ≥15% di atas batas normal (>3 kali dalam observasi selama 2 menit) </td>
                                <td class="center">
                                    <input type="radio" name="tekanan_pncs" id="edit-tekanan-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()"> 4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - peningkatan tekanan darah terus - menerus  ≥15% </td>
                                <td class="center">
                                    <input type="radio" name="tekanan_pncs" id="edit-tekanan-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()"> 5
                                </td> 
                            </tr>



                            <tr>
                                <td class="center"> <b> 9 </b> </td>
                                <td> <input type="hidden" id="kategori-edit-denyut-pncs"> <b> Denyut jantung basal </b> </td>
                                <td> 1 - denyut jantung di bawah batas normal </td>
                                <td class="center">
                                    <input type="radio" name="denyut_pncs" id="edit-denyut-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1

                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - denyut jantung berada di batas normal secara konsisten </td>
                                <td class="center">
                                    <input type="radio" name="denyut_pncs" id="edit-denyut-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()"> 2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - peningkatan denyut jantung sesekali  ≥15% di atas batas normal (1-3 kali dalam observasi selama 2 menit) </td>
                                <td class="center">
                                    <input type="radio" name="denyut_pncs" id="edit-denyut-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()"> 3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - seringnya peningkatan denyut jantung  ≥15% di atas batas normal (>3 kali dalam observasi selama 2 menit) </td>
                                <td class="center">
                                    <input type="radio" name="denyut_pncs" id="edit-denyut-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()"> 4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - peningkatan denyut jantung terus - menerus  ≥15% </td>
                                <td class="center">
                                    <input type="radio" name="denyut_pncs" id="edit-denyut-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()"> 5
                                </td> 
                            </tr>
                            <tr>
                                <td colspan="3" class="bold">JUMLAH SKOR</td>
                                <td colspan="2" class="center"><input type="number" min="0" name="jumlah_skor_pncs" id="edit-jumlah-skor-pncs" class="custom-form clear-input center" placeholder="Jumlah" value="0" readonly></td>
                            </tr>
                            <tr>
                                <td class="bold">Paraf</td>
                                <td colspan="2"><input type="checkbox" name="paraf_pncs" id="edit-paraf-pncs" class="mr-1" ></td>
                            </tr>
                            <tr>
                                <td class="bold">Perawat</td>
                                <td colspan="5">
                                    <input type="text" name="perawat_pncs" id="edit-perawat-pncs" class="select2c-input ml-2">                                 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <hr>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer" id="update-pncs">
            </div>
        </div>
    </div>
</div>













