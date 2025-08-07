<!-- // CPTDI --> 
<style>
    .ml-10 { margin-left: 10px; }
    .ml-20 { margin-left: 20px; }
    .ml-50 { margin-left: 50px; }
    .ml-60 { margin-left: 60px; }
    .ml-65 { margin-left: 65px; }
    .ml-70 { margin-left: 70px; }
    .ml-100 { margin-left: 100px; }
    .ml-105 { margin-left: 105px; }
    .ml-110 { margin-left: 110px; }
    .ml-112 { margin-left: 112px; }
    .ml-125 { margin-left: 125px; }
    .ml-150 { margin-left: 150px; }
    .ml-112 { margin-left: 112px; }
    .ml-120 { margin-left: 120px; }
    .ml-200 { margin-left: 200px; }
    .label-separator {
        display: inline-block;
        width: 200px; /* ubah ini sesuai kebutuhan */
    }
</style>

<div class="modal fade" id="modal_cheklist_persiapan_tindakan_diagnostik_invasif" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 85%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal_cheklist_persiapan_tindakan_diagnostik_invasif">FORM CHEKLIST PERSIAPAN TINDAKAN DIAGNOSTIK INVASIF DAN INTERVENSI NON BEDAH</h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_cheklist_persiapan_tindakan_diagnostik_invasif class=form-horizontal') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-cptdi">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-cptdi">
                <input type="hidden" name="id_pasien" id="id-pasien-cptdi">
                <input type="hidden" name="id_cptdi" id="id-cptdi">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="20%" class="bold">Nama Pasien</td>
                                    <td wdith="80%">: <span id="nama-pasien-cptdi"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">No. RM</td>
                                    <td>: <span id="no-cptdi"></span></td>
                                </tr>
                                <tr>
                                    <td class="bold">Jenis Kelamin</td>
                                    <td>: <span id="jenis-kelamin-cptdi"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-cptdi">
                                <div class="form-cptdi">
                                    <table class="table table-no-border table-sm table-striped">
                                        <tr>
                                            <td colspan="6">
                                                <button class="btn btn-info btn-xs mr-1 float-left" type="button" id="btn-expand-all-cptdi">
                                                    <i class="fas fa-fw fa-expand mr-1"></i>Expand All
                                                </button>
                                                <button class="btn btn-warning btn-xs mr-1 float-left" type="button" id="btn-collapse-all-cptdi">
                                                    <i class="fas fa-fw fa-compress mr-1"></i>Collapse All
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="center bold" colspan="6">DATA IDENTITAS</td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="bold">Tanggal / Jam Masuk</td>
                                            <td width="1%" class="bold">:</td>
                                            <td width="79%">
                                                <input type="text" name="tgljammasuk_cptdi" id="tgljammasuk-cptdi" class="custom-form clear-input col-lg-2" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Diagnosis medis</td>
                                            <td class="bold">:</td>
                                            <td><span id="diagnosis-cptdi"></span></td>
                                        </tr>
                                        <tr>
                                            <td class="bold" colspan="6">Berikan tanda (✓) pada kolom yang sesuai</td>
                                        </tr>
                                        <tr>
                                            <td class="bold align-top">Tujuan tindakan</td>
                                            <td class="bold align-top">:</td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="d-flex mb-1">
                                                        <label class="mr-5" style="min-width: 220px;">
                                                            <input type="checkbox" name="tujuan_cptdi_1" id="tujuan-cptdi-1" value="1" class="mr-1">Angiografi
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" name="tujuan_cptdi_2" id="tujuan-cptdi-2" value="1" class="mr-1">PTCA/Cath Standby PCI
                                                        </label>
                                                    </div>
                                                    <div class="d-flex mb-1">
                                                        <label class="mr-5" style="min-width: 220px;">
                                                            <input type="checkbox" name="tujuan_cptdi_3" id="tujuan-cptdi-3" value="1" class="mr-1">Phlebectomy
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" name="tujuan_cptdi_4" id="tujuan-cptdi-4" value="1" class="mr-1">Endovenous Laser
                                                        </label>
                                                    </div>
                                                    <div class="d-flex mb-1">
                                                        <label class="mr-5" style="min-width: 220px;">
                                                            <input type="checkbox" name="tujuan_cptdi_5" id="tujuan-cptdi-5" value="1" class="mr-1">DSE / TEE / Endoskopi
                                                        </label>
                                                        <label class="d-flex align-items-center">
                                                            <input type="checkbox" name="tujuan_cptdi_6" id="tujuan-cptdi-6" value="1" class="mr-1">Lain-lain:
                                                            <input type="text" name="tujuan_cptdi_7" id="tujuan-cptdi-7" class="form-control ml-2" style="width: 600px;" placeholder="">
                                                        </label>
                                                    </div>
                                                    <div class="d-flex mb-1">
                                                        <label class="mr-5" style="min-width: 220px;">
                                                            <input type="checkbox" name="tujuan_cptdi_8" id="tujuan-cptdi-8" value="1" class="mr-1">Mandiri
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" name="tujuan_cptdi_9" id="tujuan-cptdi-9" value="1" class="mr-1">Menggunakan kursi roda
                                                        </label>
                                                    </div>
                                                    <div class="d-flex mb-1">
                                                        <label class="mr-5" style="min-width: 220px;">
                                                            <input type="checkbox" name="tujuan_cptdi_10" id="tujuan-cptdi-10" value="1" class="mr-1">Jalan dengan bantuan
                                                        </label>
                                                        <label>
                                                            <input type="checkbox" name="tujuan_cptdi_11" id="tujuan-cptdi-11" value="1" class="mr-1">Menggunakan brankar
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- ASESMEN PRA TINDAKAN -->
                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"data-toggle="collapse"
                                                        data-target="#data-asesmenpratindakan-cptdi"><i class="fas fa-expand mr-1"></i>Expand</button>ASESMEN PRA TINDAKAN
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="collapse multi-collapse" id="data-asesmenpratindakan-cptdi">
                                            <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="10"></td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%">1.</td>
                                                    <td colspan="4"> Keluhan utama (Tuliskan keluhan pasien dan pemeriksaan fisik yang ditemukan saat pengkajian)</td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top">2.</td>
                                                    <td colspan="4"> <span class="mr-2">Status psikologis : </span> 
                                                        <input type="checkbox" name="statuspsikologis_cptdi_1" id="statuspsikologis-cptdi-1" value="1" class="mr-1">Tenang
                                                        <input type="checkbox" name="statuspsikologis_cptdi_2" id="statuspsikologis-cptdi-2" value="1" class="mr-1 ml-3">Takut
                                                        <input type="checkbox" name="statuspsikologis_cptdi_3" id="statuspsikologis-cptdi-3" value="1" class="mr-1 ml-3">Gelisah
                                                        <input type="checkbox" name="statuspsikologis_cptdi_4" id="statuspsikologis-cptdi-4" value="1" class="mr-1 ml-3">Marah
                                                        <input type="checkbox" name="statuspsikologis_cptdi_5" id="statuspsikologis-cptdi-5" value="1" class="mr-1 ml-3">Lain-lain, sebutkan:
                                                        <input type="text" name="statuspsikologis_cptdi_6" id="statuspsikologis-cptdi-6" class="custom-form clear-input d-inline-block col-lg-5" placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top">3.</td>
                                                    <td colspan="4"> <span class="mr-2"> Riwayat penyakit dahulu : </span> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4"> <span class="mr-2"></span> 
                                                        <input type="checkbox" name="riwayatpenyakit_cptdi_1" id="riwayatpenyakit-cptdi-1" value="1" class="mr-1">Hipertensi
                                                        <input type="checkbox" name="riwayatpenyakit_cptdi_2" id="riwayatpenyakit-cptdi-2" value="1" class="mr-1 ml-3">Asma
                                                        <input type="checkbox" name="riwayatpenyakit_cptdi_3" id="riwayatpenyakit-cptdi-3" value="1" class="mr-1 ml-3">Diabetes mellitus
                                                        <input type="checkbox" name="riwayatpenyakit_cptdi_4" id="riwayatpenyakit-cptdi-4" value="1" class="mr-1 ml-3">Penyakit jantung bawaan
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4"> <span class="mr-2"></span> 
                                                        <input type="checkbox" name="riwayatpenyakit_cptdi_5" id="riwayatpenyakit-cptdi-5" value="1" class="mr-1">Penyakit ginjal
                                                        <input type="checkbox" name="riwayatpenyakit_cptdi_6" id="riwayatpenyakit-cptdi-6" value="1" class="mr-1 ml-3">Kanker
                                                        <input type="checkbox" name="riwayatpenyakit_cptdi_7" id="riwayatpenyakit-cptdi-7" value="1" class="mr-1 ml-3">Riwayat operasi
                                                        <input type="checkbox" name="riwayatpenyakit_cptdi_8" id="riwayatpenyakit-cptdi-8" value="1" class="mr-1 ml-3">Riwayat tuberkulosis
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4"> <span class="mr-2"></span> 
                                                        <input type="checkbox" name="riwayatpenyakit_cptdi_9" id="riwayatpenyakit-cptdi-9" value="1" class="mr-1">Lain-lain : 
                                                        <input type="text" name="riwayatpenyakit_cptdi_10" id="riwayatpenyakit-cptdi-10" class="custom-form clear-input d-inline-block col-lg-5" placeholder="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top">4.</td>
                                                    <td colspan="4">
                                                        <span class="mr-2">Sistem pernafasan :</span>
                                                        <span class="label-separator">Warna sputum :</span>
                                                        <input type="text" name="sistempernafasan_cptdi_1" id="sistempernafasan-cptdi-1" class="custom-form clear-input d-inline-block col-lg-2">
                                                        <span class="label-separator ml-3">Konsisten sputum :</span>
                                                        <input type="checkbox" name="sistempernafasan_cptdi_2" id="sistempernafasan-cptdi-2" value="1" class="mr-1">Kental
                                                        <input type="checkbox" name="sistempernafasan_cptdi_3" id="sistempernafasan-cptdi-3" value="1" class="mr-1 ml-3">Encer
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4">
                                                        <div class="ml-112">
                                                            <span class="label-separator">Jumlah sputum :</span>
                                                            <input type="text" name="sistempernafasan_cptdi_4" id="sistempernafasan-cptdi-4" class="custom-form clear-input d-inline-block col-lg-2">cc &nbsp;&nbsp;
                                                            <span class="label-separator ml-4">Lain-lain :</span>
                                                            <input type="text" name="sistempernafasan_cptdi_5" id="sistempernafasan-cptdi-5" class="custom-form clear-input d-inline-block col-lg-2">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top">5.</td>
                                                    <td colspan="4">
                                                        <span class="mr-2">Sistem Pencernaan :</span>
                                                        <span class="label-separator">Muntah darah :</span>
                                                        <input type="checkbox" name="sistempencernaan_cptdi_1" id="sistempencernaan-cptdi-1" value="1" class="mr-1">Ya
                                                        <input type="checkbox" name="sistempencernaan_cptdi_2" id="sistempencernaan-cptdi-2" value="1" class="mr-1 ml-3">Tidak
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4">
                                                        <div class="ml-120">
                                                            <span class="label-separator">BAB :</span>
                                                            <input type="checkbox" name="sistempencernaan_cptdi_3" id="sistempencernaan-cptdi-3" value="1" class="mr-1">Normal
                                                            <input type="checkbox" name="sistempencernaan_cptdi_4" id="sistempencernaan-cptdi-4" value="1" class="mr-1 ml-3">Hitam
                                                            <input type="checkbox" name="sistempencernaan_cptdi_5" id="sistempencernaan-cptdi-5" value="1" class="mr-1 ml-3">Darah Segar
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top">6.</td>
                                                    <td colspan="4">
                                                        <span class="mr-2">Sistem perkemihan :</span>
                                                        <span class="label-separator">Urin /24 jam :</span>
                                                        <input type="text" name="sistemkemih_cptdi" id="sistemkemih-cptdi" class="custom-form clear-input d-inline-block col-lg-2"> cc
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top">7.</td>
                                                    <td colspan="4">
                                                        <span class="mr-2">Riwayat pengobatan : </span>
                                                        <span class="label-separator">Double antiplatelet :</span>
                                                        <input type="checkbox" name="riwayatpengob_cptdi_1" id="riwayatpengob-cptdi-1" value="1" class="mr-1">Tidak
                                                        <input type="checkbox" name="riwayatpengob_cptdi_2" id="riwayatpengob-cptdi-2" value="1" class="mr-1 ml-3">Ya, Lama penggunaan :
                                                        <input type="text" name="riwayatpengob_cptdi_3" id="riwayatpengob-cptdi-3" class="custom-form clear-input d-inline-block col-lg-4">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4">
                                                        <div class="ml-125">
                                                            <span class="label-separator">Beta blocker :</span>
                                                            <input type="checkbox" name="riwayatpengob_cptdi_4" id="riwayatpengob-cptdi-4" value="1" class="mr-1">Tidak
                                                            <input type="checkbox" name="riwayatpengob_cptdi_5" id="riwayatpengob-cptdi-5" value="1" class="mr-1 ml-3">Ya, Lama penggunaan :
                                                            <input type="text" name="riwayatpengob_cptdi_6" id="riwayatpengob-cptdi-6" class="custom-form clear-input d-inline-block col-lg-4">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4">
                                                        <div class="ml-125">
                                                            <span class="label-separator">Simarc :</span>
                                                            <input type="checkbox" name="riwayatpengob_cptdi_7" id="riwayatpengob-cptdi-7" value="1" class="mr-1">Tidak
                                                            <input type="checkbox" name="riwayatpengob_cptdi_8" id="riwayatpengob-cptdi-8" value="1" class="mr-1 ml-3">Ya, Lama penggunaan :
                                                            <input type="text" name="riwayatpengob_cptdi_9" id="riwayatpengob-cptdi-9" class="custom-form clear-input d-inline-block col-lg-4">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top">8.</td>
                                                    <td colspan="4">
                                                        <span class="mr-2">Riwayat alergi : </span>&nbsp;&nbsp;&nbsp;
                                                        <input type="checkbox" name="riwayatalergi_cptdi_1" id="riwayatalergi-cptdi-1" value="1" class="mr-1"> Tidak ada &nbsp;
                                                        <input type="checkbox" name="riwayatalergi_cptdi_2" id="riwayatalergi-cptdi-2" value="1" class="mr-1 ml-3">Ya, &nbsp; Sebutkan &nbsp;
                                                        <input type="text" name="riwayatalergi_cptdi_3" id="riwayatalergi-cptdi-3" class="custom-form clear-input d-inline-block col-lg-4">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top">9.</td>
                                                    <td colspan="4">
                                                        <div class="d-flex align-items-center flex-wrap">
                                                            <span class="mr-3">Tanda-tanda vital :</span>

                                                            <span class="mr-2">Tekanan darah :</span>
                                                            <input type="text" name="ttv_cptdi_1" id="ttv-cptdi-1" class="custom-form clear-input d-inline-block col-lg-1 mr-1">
                                                            <span class="mr-4">mmHg</span>

                                                            <span class="mr-2">Nadi :</span>
                                                            <input type="text" name="ttv_cptdi_2" id="ttv-cptdi-2" class="custom-form clear-input d-inline-block col-lg-1 mr-1">
                                                            <span>x/menit</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4">
                                                        <div class="d-flex align-items-center flex-wrap ml-112">
                                                            <span class="mr-2">Pernapasan :</span>
                                                            <input type="text" name="ttv_cptdi_3" id="ttv-cptdi-3" class="custom-form clear-input d-inline-block col-lg-1 mr-1">
                                                            <span class="mr-4">x/menit</span>

                                                            <span class="mr-2">Saturasi :</span>
                                                            <input type="text" name="ttv_cptdi_4" id="ttv-cptdi-4" class="custom-form clear-input d-inline-block col-lg-1 mr-1">
                                                            <span>%</span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top">10.</td>
                                                    <td colspan="4">
                                                        <span class="mr-2">Tes Allen  &nbsp;&nbsp;&nbsp;  Kanan : </span>
                                                        <span class="label-separator">Radialis kanan, kondisi </span> &nbsp;&nbsp;&nbsp;
                                                        <input type="checkbox" name="testalent_cptdi_1" id="testalent-cptdi-1" value="1" class="mr-1">Adekuat
                                                        <input type="checkbox" name="testalent_cptdi_2" id="testalent-cptdi-2" value="1" class="mr-1 ml-3">Tidak adekuat
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4">
                                                        <span class="mr-2 ml-65"> Kiri : &nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                        <span class="label-separator">Radialis kiri, kondisi </span> &nbsp;&nbsp;&nbsp;
                                                        <input type="checkbox" name="testalent_cptdi_3" id="testalent-cptdi-3" value="1" class="mr-1">Adekuat
                                                        <input type="checkbox" name="testalent_cptdi_4" id="testalent-cptdi-4" value="1" class="mr-1 ml-3">Tidak adekuat
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top">11.</td>
                                                    <td colspan="4">
                                                        <span class="mr-2">Arteri Dorsalis Pedis : </span>
                                                        <span class="label-separator">Pedis kanan, kondisi </span>
                                                        <input type="checkbox" name="arteridor_cptdi_1" id="arteridor-cptdi-1" value="1" class="mr-1">Adekuat
                                                        <input type="checkbox" name="arteridor_cptdi_2" id="arteridor-cptdi-2" value="1" class="mr-1 ml-3">Tidak adekuat
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4">
                                                        <span class="mr-2 ml-110"> : </span>
                                                        <span class="label-separator">Pedis kiri, kondisi </span>
                                                        <input type="checkbox" name="arteridor_cptdi_3" id="arteridor-cptdi-3" value="1" class="mr-1">Adekuat
                                                        <input type="checkbox" name="arteridor_cptdi_4" id="arteridor-cptdi-4" value="1" class="mr-1 ml-3">Tidak adekuat
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top">12.</td>
                                                    <td colspan="4">
                                                        <div class="d-flex align-items-center flex-wrap">
                                                            <span class="mr-3">Berat badan :</span>
                                                            <input type="text" name="bb_cptdi" id="bb-cptdi" class="custom-form clear-input d-inline-block col-lg-1 mr-1">
                                                            <span>kg</span>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <span class="mr-2">Tinggi badan :</span>
                                                            <input type="text" name="tb_cptdi" id="tb-cptdi" class="custom-form clear-input d-inline-block col-lg-1 mr-1">
                                                            <span>cm</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top">13.</td>
                                                    <td colspan="4">
                                                        <span class="mr-2">Keluhan nyeri : </span>&nbsp;&nbsp;&nbsp;
                                                        <input type="checkbox" name="keluhannyeri_cptdi_1" id="keluhannyeri-cptdi-1" value="1" class="mr-1"> Tidak &nbsp;
                                                        <input type="checkbox" name="keluhannyeri_cptdi_2" id="keluhannyeri-cptdi-2" value="1" class="mr-1 ml-3">Ya, &nbsp; Lokasi &nbsp;
                                                        <input type="text" name="keluhannyeri_cptdi_3" id="keluhannyeri-cptdi-3" class="custom-form clear-input d-inline-block col-lg-4">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4">
                                                        <span class="mr-2">Pencetus nyeri (P) : </span>&nbsp;&nbsp;&nbsp;
                                                        <input type="text" name="keluhannyeri_cptdi_4" id="keluhannyeri-cptdi-4" class="custom-form clear-input d-inline-block col-lg-3 mr-1">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <span class="mr-2">Skala (S) : </span>
                                                        <input type="text" name="keluhannyeri_cptdi_5" id="keluhannyeri-cptdi-5" class="custom-form clear-input d-inline-block col-lg-3 mr-1">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4">
                                                        <span class="mr-2">Kualitas (Q) : </span>&nbsp;&nbsp;&nbsp;
                                                        <input type="text" name="keluhannyeri_cptdi_6" id="keluhannyeri-cptdi-6" class="custom-form clear-input d-inline-block col-lg-3 mr-1">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <span class="mr-2">Lamanya (T) : </span>
                                                        <input type="text" name="keluhannyeri_cptdi_7" id="keluhannyeri-cptdi-7" class="custom-form clear-input d-inline-block col-lg-3 mr-1">Menit
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4">
                                                        <span class="mr-2">Penjalaran (R) : </span>&nbsp;&nbsp;&nbsp;
                                                        <input type="checkbox" name="keluhannyeri_cptdi_8" id="keluhannyeri-cptdi-8" value="1" class="mr-1"> Tidak &nbsp;
                                                        <input type="checkbox" name="keluhannyeri_cptdi_9" id="keluhannyeri-cptdi-9" value="1" class="mr-1 ml-3">Ya, &nbsp; Ke &nbsp;
                                                        <input type="text" name="keluhannyeri_cptdi_10" id="keluhannyeri-cptdi-10" class="custom-form clear-input d-inline-block col-lg-2">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top">14.</td>
                                                    <td colspan="4">
                                                        <span class="mr-2">Kebutuhan edukasi : </span>
                                                        <input type="checkbox" name="kebutuhanedu_cptdi_1" id="kebutuhanedu-cptdi-1" value="1" class="mr-1"> Obat-obatan
                                                        <input type="checkbox" name="kebutuhanedu_cptdi_2" id="kebutuhanedu-cptdi-2" value="1" class="mr-1 ml-3">Diet dan nutrisi
                                                        <input type="checkbox" name="kebutuhanedu_cptdi_3" id="kebutuhanedu-cptdi-3" value="1" class="mr-1 ml-3">Diagnosis dan manajemen
                                                        <input type="checkbox" name="kebutuhanedu_cptdi_4" id="kebutuhanedu-cptdi-4" value="1" class="mr-1 ml-3">Perawatan luka 
                                                        <input type="checkbox" name="kebutuhanedu_cptdi_5" id="kebutuhanedu-cptdi-5" value="1" class="mr-1 ml-3">Rehabilitasi  
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4">
                                                        <span class="mr-2 ml-105"> : </span>
                                                        <input type="checkbox" name="kebutuhanedu_cptdi_6" id="kebutuhanedu-cptdi-6" value="1" class="mr-1">Manajemen nyeri 
                                                        <input type="checkbox" name="kebutuhanedu_cptdi_7" id="kebutuhanedu-cptdi-7" value="1" class="mr-1 ml-3">Diagnostik non invasif 
                                                        <input type="checkbox" name="kebutuhanedu_cptdi_8" id="kebutuhanedu-cptdi-8" value="1" class="mr-1"> Intervensi non bedah &nbsp;&nbsp;
                                                        <input type="checkbox" name="kebutuhanedu_cptdi_9" id="kebutuhanedu-cptdi-9" value="1" class="mr-1">Lain-lain &nbsp;&nbsp;
                                                        <input type="text" name="kebutuhanedu_cptdi_10" id="kebutuhanedu-cptdi-10" class="custom-form clear-input d-inline-block col-lg-4">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top">15.</td>
                                                    <td colspan="4">
                                                        <span class="mr-2">Laboratorium &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </span>
                                                        <span class="mr-2 "> Hb </span>
                                                        <input type="text" name="labroturiem_cptdi_1" id="labroturiem-cptdi-1" class="custom-form clear-input d-inline-block col-lg-4"> &nbsp;&nbsp;
                                                        <span class="mr-2 "> Ur </span>
                                                        <input type="text" name="labroturiem_cptdi_2" id="labroturiem-cptdi-2" class="custom-form clear-input d-inline-block col-lg-4"> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4">
                                                        <span class="mr-2 ml-105"></span>
                                                        <span class="mr-2 "> Ht </span>
                                                        <input type="text" name="labroturiem_cptdi_3" id="labroturiem-cptdi-3" class="custom-form clear-input d-inline-block col-lg-4"> &nbsp;&nbsp;
                                                        <span class="mr-2 "> Cr </span>
                                                        <input type="text" name="labroturiem_cptdi_4" id="labroturiem-cptdi-4" class="custom-form clear-input d-inline-block col-lg-4"> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4">
                                                        <span class="mr-2 ml-105"></span>
                                                        <span class="mr-2 "> Leukosit </span>
                                                        <input type="text" name="labroturiem_cptdi_5" id="labroturiem-cptdi-5" class="custom-form clear-input d-inline-block col-lg-3"> &nbsp;&nbsp;
                                                        <span class="mr-2 "> HbSag </span>
                                                        <input type="text" name="labroturiem_cptdi_6" id="labroturiem-cptdi-6" class="custom-form clear-input d-inline-block col-lg-4"> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4">
                                                        <span class="mr-2 ml-105"></span>
                                                        <span class="mr-2 "> Na </span>
                                                        <input type="text" name="labroturiem_cptdi_7" id="labroturiem-cptdi-7" class="custom-form clear-input d-inline-block col-lg-4"> &nbsp;&nbsp;
                                                        <span class="mr-2 "> K </span>
                                                        <input type="text" name="labroturiem_cptdi_8" id="labroturiem-cptdi-8" class="custom-form clear-input d-inline-block col-lg-4"> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top">16.</td>
                                                    <td colspan="4">
                                                        <span class="mr-2"> Skrining jatuh &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </span>
                                                        <span class="mr-2 "> Skor </span>
                                                        <input type="text" name="skrining_cptdi_1" id="skrining-cptdi-1" class="custom-form clear-input d-inline-block col-lg-2"> &nbsp;&nbsp;
                                                        <input type="checkbox" name="skrining_cptdi_2" id="skrining-cptdi-2" value="1" class="mr-1">Risiko tinggi
                                                        <input type="checkbox" name="skrining_cptdi_3" id="skrining-cptdi-3" value="1" class="mr-1 ml-3">Risiko rendah
                                                        <input type="checkbox" name="skrining_cptdi_4" id="skrining-cptdi-4" value="1" class="mr-1 ml-3">Risiko sedang
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top">17.</td>
                                                    <td colspan="4">
                                                        <span class="mr-2">Hasil Echo : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                                                        <input type="checkbox" name="hasilecho_cptdi_1" id="hasilecho-cptdi-1" value="1" class="mr-1"> Tidak Ada &nbsp;
                                                        <input type="checkbox" name="hasilecho_cptdi_2" id="hasilecho-cptdi-2" value="1" class="mr-1 ml-3">Ada, &nbsp; kesan &nbsp;
                                                        <input type="text" name="hasilecho_cptdi_3" id="hasilecho-cptdi-3" class="custom-form clear-input d-inline-block col-lg-4">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td colspan="5"> <span class="mr-2"> <b>Masalah keperawatan </b></span> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4"> <span class="mr-2"></span> 
                                                        <input type="checkbox" name="mskep_cptdi_1" id="mskep-cptdi-1" value="1" class="mr-1">Penurunan curah jantung
                                                        <input type="checkbox" name="mskep_cptdi_2" id="mskep-cptdi-2" value="1" class="mr-1 ml-3">Nyeri
                                                        <input type="checkbox" name="mskep_cptdi_3" id="mskep-cptdi-3" value="1" class="mr-1 ml-3">Risiko perdarahan
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4"> <span class="mr-2"></span> 
                                                        <input type="checkbox" name="mskep_cptdi_4" id="mskep-cptdi-4" value="1" class="mr-1">Penurunan perfusi jaringan
                                                        <input type="checkbox" name="mskep_cptdi_5" id="mskep-cptdi-5" value="1" class="mr-1 ml-3">Risiko tinggi infeksi
                                                        <input type="checkbox" name="mskep_cptdi_6" id="mskep-cptdi-6" value="1" class="mr-1 ml-3">Risiko jatuh
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td colspan="5"> <span class="mr-2"> <b>Rencana tindakan keperawatan (mandiri)</b></span> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4"> <span class="mr-2"></span> 
                                                        <input type="checkbox" name="rctindkep_cptdi_1" id="rctindkep-cptdi-1" value="1" class="mr-1">Manajemen nyeri 
                                                        <input type="checkbox" name="rctindkep_cptdi_2" id="rctindkep-cptdi-2" value="1" class="mr-1 ml-3">Monitoring tanda-tanda vital
                                                        <input type="checkbox" name="rctindkep_cptdi_3" id="rctindkep-cptdi-3" value="1" class="mr-1 ml-3">Monitoring perubahan kesadaran
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td width="1%" class="align-top"></td>
                                                    <td colspan="4"> <span class="mr-2"></span> 
                                                        <input type="checkbox" name="rctindkep_cptdi_4" id="rctindkep-cptdi-4" value="1" class="mr-1">Monitoring perdarahan &nbsp;&nbsp;&nbsp;
                                                        <input type="checkbox" name="rctindkep_cptdi_5" id="rctindkep-cptdi-5" value="1" class="mr-1">
                                                        <input type="text" name="rctindkep_cptdi_6" id="rctindkep-cptdi-6" class="custom-form clear-input d-inline-block col-lg-4">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td colspan="5"> 
                                                        <span class="mr-2"><b>Tanggal dan Jam</b></span>
                                                        <!-- <input type="text" name="tanggaljam_cptdi" id="tanggaljam-cptdi" class="custom-form clear-input d-inline-block col-lg-1" value="<?= date('d/m/Y H:i') ?>" placeholder=""> -->
                                                        <input type="text" name="tanggaljam_cptdi" id="tanggaljam-cptdi"class="custom-form clear-input d-inline-block col-lg-2">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1%"></td>
                                                    <td colspan="5"> 
                                                        <span class="mr-2"><b>Perawat</b></span>
                                                        <input type="text" name="perawat_cptdi" id="perawat-cptdi" class="select2c-input ml-2">
                                                    </td>
                                                </tr>
                                                
                                            </table>
                                        </div>

                                        <!-- // GRAFIK OBSERVASI -->
                                        <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"
                                                        data-toggle="collapse" data-target="#data-grafik-observasi"><i
                                                        class="fas fa-expand mr-1"></i>Expand</button>Grafik Observasi
                                                </td>
                                            </tr>
                                        </table>
                                        
                                        <div class="collapse multi-collapse mt-2" id="data-grafik-observasi">                                      
                                            <div class="row">                                                                         
                                                <div class="col-lg-12">
                                                    <div style="background-color: white; padding: .3rem; border-radius: 10px; margin-bottom: .5rem" aria-label="Ini adalah grafik Observasi :*"> 
                                                        <div class="card-body">
                                                            <!-- <div id="grafik_observasi"></div> -->
                                                            <!-- <div id="dummy-tampilan" style="margin-bottom: 10px;"></div> -->
                                                            <div id="grafik_observasi"></div>

                                                            <div style="display: flex;justify-content: center;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="table table-sm table-striped table-bordered">                                                  
                                                        <tr>
                                                            <td class="center" width="10%"><b>Saturasi oksigen</b></td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="saturasy_cptdi_1" id="saturasy-cptdi-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="saturasy_cptdi_2" id="saturasy-cptdi-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="saturasy_cptdi_3" id="saturasy-cptdi-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="saturasy_cptdi_4" id="saturasy-cptdi-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="saturasy_cptdi_5" id="saturasy-cptdi-5"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="saturasy_cptdi_6" id="saturasy-cptdi-6"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="saturasy_cptdi_7" id="saturasy-cptdi-7"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="saturasy_cptdi_8" id="saturasy-cptdi-8"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                        </tr>  
                                                        <tr>
                                                            <td class="center" width="10%"><b>Pulsasi distal</b></td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="pulsasi_cptdi_1" id="pulsasi-cptdi-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="pulsasi_cptdi_2" id="pulsasi-cptdi-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="pulsasi_cptdi_3" id="pulsasi-cptdi-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="pulsasi_cptdi_4" id="pulsasi-cptdi-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="pulsasi_cptdi_5" id="pulsasi-cptdi-5"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="pulsasi_cptdi_6" id="pulsasi-cptdi-6"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="pulsasi_cptdi_7" id="pulsasi-cptdi-7"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="pulsasi_cptdi_8" id="pulsasi-cptdi-8"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                        </tr>  
                                                        <tr>
                                                            <td class="center" width="10%"><b>Reflek menelan</b></td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="reflek_cptdi_1" id="reflek-cptdi-1"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="reflek_cptdi_2" id="reflek-cptdi-2"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="reflek_cptdi_3" id="reflek-cptdi-3"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="reflek_cptdi_4" id="reflek-cptdi-4"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="reflek_cptdi_5" id="reflek-cptdi-5"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="reflek_cptdi_6" id="reflek-cptdi-6"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="reflek_cptdi_7" id="reflek-cptdi-7"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                            <td width="10%" class="center">
                                                                <input type="text" name="reflek_cptdi_8" id="reflek-cptdi-8"class="custom-form clear-input d-inline-block col-lg-12">
                                                            </td>
                                                        </tr>  
                                                    </table>
                                                    <table class="table table-sm table-striped table-bordered alatGrafikObservasi">                                                  
                                                        <tr>
                                                            <td width="10%" class="center"><b>Blood Pressure</b></td>
                                                            <td width="10%" class="center" style="background-color: #6d7373ff; color: black;"><input type="number" name="bloodpressure_cptdi" id="bloodpressure-cptdi"class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                            <td width="3%" class="center" style="color: red;"><b>Nadi(Pulse)</b></td>                                                           
                                                            <td width="10%" class="center" style="background-color: #e8a9a9ff; color: black;"><input type="number" name="nadipulse_cptdi" id="nadipulse-cptdi"class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                            <td width="3%" class="center" style="color: green;"><b>Pernafasan(Respiration)</b></td> 
                                                            <td width="10%" class="center" style="background-color: #beeec7ff; color: black;"><input type="number" name="pernafasan_cptdi" id="pernafasan-cptdi"class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                            <td width="3%" class="center" style="color: blue;"><b>Suhu(Temperature)</b></td> 
                                                            <td width="10%" class="center" style="background-color: #9287f5ff; color: black;"><input type="number" name="suhu_cptdi" id="suhu-cptdi"class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                            <td width="5%" class="center">Jam</td> 
                                                            <td width="7%" class="center"><input type="text" name="jamgo_cptdi" id="jamgo-cptdi"class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                            <td width="5%" class="center">Tanggal</td> 
                                                            <td width="10%" class="center"><input type="text" name="tglgo_cptdi" id="tglgo-cptdi"class="custom-form clear-input d-inline-block col-lg-10"></td>
                                                            <td width="7%" class="center">
                                                                <button type="button" class="btn btn-info btn-xs float-center" id="btn-cptdi-chart">Tambah</button>
                                                            </td>
                                                        </tr>  
                                                    </table>
                                                    <div class="card">
                                                        <table class="table table-sm table-striped table-bordered" id="tabel-grafik-observasi">
                                                            <thead>
                                                                <tr>
                                                                    <th width="3%" class="center" style="background-color: #B0E0E6; color: black;"><b>No</b></th>
                                                                    <th width="5%" class="center" style="background-color: #B0E0E6; color: black;"><b>Blood Pressur</b></th>
                                                                    <th width="5%" class="center" style="background-color: #B0E0E6; color: red;"><b>Nadi(Pulse)</b></th>
                                                                    <th width="5%" class="center" style="background-color: #B0E0E6; color: green;"><b>Pernafasan(Respiration)</b></th>
                                                                    <th width="5%" class="center" style="background-color: #B0E0E6; color: blue;"><b>Suhu(Temperature)</b></th>
                                                                    <th width="7%" class="center" style="background-color: #B0E0E6; color: black;"><b>Jam</b></th>
                                                                    <th width="10%" class="center" style="background-color: #B0E0E6; color: black;"><b>Tanggal</b></th>
                                                                    <th width="20%" class="center alatGrafikObservasi" colspan="2" style="background-color: #B0E0E6; color: black;"><b>Alat</b></th>
                                                                </tr>                                                       
                                                            </thead>
                                                            <tbody class="body-table">
                                                            </tbody>                                                                                                                                                                                   
                                                        </table>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>

                                        <table class="table table-no-border table-sm table-striped"
                                            style="margin-top:-15px">
                                            <tr>
                                                <td colspan="3" class="center bold td-dark">
                                                    <button class="btn btn-info btn-xs mr-1 float-left" type="button"data-toggle="collapse"
                                                        data-target="#data-observasiintra-cptdi"><i class="fas fa-expand mr-1"></i>Expand</button>OBSERVASI INTRA DAN PASKA TINDAKAN
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="collapse multi-collapse" id="data-observasiintra-cptdi">
                                            <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                                                <tr>
                                                    <td colspan="12"></td>
                                                </tr>
                                                <tr>
                                                    <td width="10%">Pasien tiba di RR jam</td>
                                                    <td width="1%">:</td>
                                                    <td width="10%">
                                                        <input type="text" name="pasientiba_cptdi_1" id="pasientiba-cptdi-1" class="custom-form clear-input d-inline-block col-lg-5">
                                                    </td>
                                                    <td width="7%">Lokasi pungsi / sayatan</td>
                                                    <td width="1%">:</td>
                                                    <td width="15%">
                                                        <input type="text" name="pasientiba_cptdi_2" id="pasientiba-cptdi-2" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                    <td width="3%">Jumlah</td>
                                                    <td width="1%">:</td>
                                                    <td width="15%">
                                                        <input type="text" name="pasientiba_cptdi_3" id="pasientiba-cptdi-3" class="custom-form clear-input d-inline-block col-lg-5">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%">Terpasang sheath</td>
                                                    <td width="1%">:</td>
                                                    <td colspan="10">
                                                        <input type="checkbox" name="terpasang_cptdi_1" id="terpasang-cptdi-1" value="1" class="mr-1">Ya
                                                        <input type="checkbox" name="terpasang_cptdi_2" id="terpasang-cptdi-2" value="1" class="mr-1 ml-3">Tidak &nbsp;&nbsp; Lokasi ,
                                                        <input type="text" name="terpasang_cptdi_3" id="terpasang-cptdi-3" class="custom-form clear-input d-inline-block col-lg-5">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%">Pulsasi A. Radialis</td>
                                                    <td width="1%">:</td>
                                                    <td colspan="3">
                                                        <input type="checkbox" name="pulsasia_cptdi_1" id="pulsasia-cptdi-1" value="1" class="mr-1">Kanan
                                                        <input type="checkbox" name="pulsasia_cptdi_2" id="pulsasia-cptdi-2" value="1" class="mr-1 ml-3">Adekuat
                                                        <input type="checkbox" name="pulsasia_cptdi_3" id="pulsasia-cptdi-3" value="1" class="mr-1 ml-4">Tidak adekuat
                                                    </td>
                                                    <td colspan="3">
                                                        <input type="checkbox" name="pulsasia_cptdi_4" id="pulsasia-cptdi-4" value="1" class="mr-1 ml-3">Kiri : 
                                                        <input type="checkbox" name="pulsasia_cptdi_5" id="pulsasia-cptdi-5" value="1" class="mr-1 ml-3">Adekuat
                                                        <input type="checkbox" name="pulsasia_cptdi_6" id="pulsasia-cptdi-6" value="1" class="mr-1 ml-3">Tidak adekuat
                                                    </td>
                                                    <td colspan="4"></td>
                                                </tr>
                                                <tr>
                                                    <td width="10%">Pulsasi A. Dorsalis Pedis </td>
                                                    <td width="1%">:</td>
                                                    <td colspan="3">
                                                        <input type="checkbox" name="pulsasidor_cptdi_1" id="pulsasidor-cptdi-1" value="1" class="mr-1">Kanan
                                                        <input type="checkbox" name="pulsasidor_cptdi_2" id="pulsasidor-cptdi-2" value="1" class="mr-1 ml-3">Adekuat
                                                        <input type="checkbox" name="pulsasidor_cptdi_3" id="pulsasidor-cptdi-3" value="1" class="mr-1 ml-4">Tidak adekuat
                                                    </td>
                                                    <td colspan="3">
                                                        <input type="checkbox" name="pulsasidor_cptdi_4" id="pulsasidor-cptdi-4" value="1" class="mr-1 ml-3">Kiri : 
                                                        <input type="checkbox" name="pulsasidor_cptdi_5" id="pulsasidor-cptdi-5" value="1" class="mr-1 ml-3">Adekuat
                                                        <input type="checkbox" name="pulsasidor_cptdi_6" id="pulsasidor-cptdi-6" value="1" class="mr-1 ml-3">Tidak adekuat
                                                    </td>
                                                    <td colspan="4"></td>
                                                </tr>
                                                <tr>
                                                    <td width="10%">Alat yang terpasang </td>
                                                    <td width="1%">:</td>
                                                    <td colspan="3">
                                                        <input type="checkbox" name="alatyt_cptdi_1" id="alatyt-cptdi-1" value="1" class="mr-1">IV. Cath
                                                        <input type="checkbox" name="alatyt_cptdi_2" id="alatyt-cptdi-2" value="1" class="mr-1 ml-4">Dowercath/Kondom
                                                    </td>
                                                    <td colspan="3">
                                                        <input type="checkbox" name="alatyt_cptdi_3" id="alatyt-cptdi-3" value="1" class="mr-1 ml-3">IABP 
                                                        <input type="checkbox" name="alatyt_cptdi_4" id="alatyt-cptdi-4" value="1" class="mr-1 ml-3">Ventilator
                                                    </td>
                                                    <td colspan="4"></td>
                                                </tr>
                                                <tr>
                                                    <td width="10%"></td>
                                                    <td width="1%"></td>
                                                    <td colspan="3">
                                                        <input type="checkbox" name="alatyt_cptdi_5" id="alatyt-cptdi-5" value="1" class="mr-1">TPM
                                                        <input type="checkbox" name="alatyt_cptdi_6" id="alatyt-cptdi-6" value="1" class="mr-1 ml-4">PPM
                                                    </td>
                                                    <td colspan="7">
                                                        <input type="checkbox" name="alatyt_cptdi_7" id="alatyt-cptdi-7" value="1" class="mr-1 ml-3">Lain-lain 
                                                        <input type="text" name="alatyt_cptdi_8" id="alatyt-cptdi-8" class="custom-form clear-input d-inline-block col-lg-10">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%">Jenis anestesi</td>
                                                    <td width="1%">:</td>
                                                    <td width="12">
                                                        <input type="checkbox" name="jenisanest_cptdi_1" id="jenisanest-cptdi-1" value="1" class="mr-1">Umum
                                                        <input type="checkbox" name="jenisanest_cptdi_2" id="jenisanest-cptdi-2" value="1" class="mr-1 ml-4">Lokal
                                                    </td>
                                                    <td colspan="7"> Dosis pemberian &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pre prosedur  :  
                                                        <input type="text" name="jenisanest_cptdi_3" id="jenisanest-cptdi-3" class="custom-form clear-input d-inline-block col-lg-7">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%"></td>
                                                    <td width="1%"></td>
                                                    <td width="12"></td>
                                                    <td colspan="7">
                                                        <span style="display:inline-block; width:110px;"></span> <!-- ganti px sesuai kebutuhan -->
                                                        intra prosedur :
                                                        <input type="text" name="jenisanest_cptdi_4" id="jenisanest-cptdi-4" class="custom-form clear-input d-inline-block col-lg-7">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%"></td>
                                                    <td width="1%"></td>
                                                    <td width="12"></td>
                                                    <td colspan="7">
                                                        <span style="display:inline-block; width:110px;"></span> <!-- ganti px sesuai kebutuhan -->
                                                        Post prosedur :
                                                        <input type="text" name="jenisanest_cptdi_5" id="jenisanest-cptdi-5" class="custom-form clear-input d-inline-block col-lg-7">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%">Sedasi</td>
                                                    <td width="1%">:</td>
                                                    <td colspan="10"> 
                                                        <input type="text" name="sedasi_cptdi" id="sedasi-cptdi" class="custom-form clear-input d-inline-block col-lg-7">
                                                    </td>                                                   
                                                </tr>
                                                <tr>
                                                    <td width="10%">Antikoagulan</td>
                                                    <td width="1%">:</td>
                                                    <td width="12">
                                                        <input type="checkbox" name="antikoagulan_cptdi_1" id="antikoagulan-cptdi-1" value="1" class="mr-1">Umum
                                                        <input type="checkbox" name="antikoagulan_cptdi_2" id="antikoagulan-cptdi-2" value="1" class="mr-1 ml-4">Lokal
                                                    </td>
                                                    <td colspan="7"> Dosis pemberian &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pre prosedur  :  
                                                        <input type="text" name="antikoagulan_cptdi_3" id="antikoagulan-cptdi-3" class="custom-form clear-input d-inline-block col-lg-7">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%"></td>
                                                    <td width="1%"></td>
                                                    <td width="12"></td>
                                                    <td colspan="7">
                                                        <span style="display:inline-block; width:110px;"></span> <!-- ganti px sesuai kebutuhan -->
                                                        intra prosedur :
                                                        <input type="text" name="antikoagulan_cptdi_4" id="antikoagulan-cptdi-4" class="custom-form clear-input d-inline-block col-lg-7">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%"></td>
                                                    <td width="1%"></td>
                                                    <td width="12"></td>
                                                    <td colspan="7">
                                                        <span style="display:inline-block; width:110px;"></span> <!-- ganti px sesuai kebutuhan -->
                                                        Post prosedur :
                                                        <input type="text" name="antikoagulan_cptdi_5" id="antikoagulan-cptdi-5" class="custom-form clear-input d-inline-block col-lg-7">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%">Hematoma</td>
                                                    <td width="1%">:</td>
                                                    <td colspan="10">
                                                        <input type="checkbox" name="hematoma_cptdi_1" id="hematoma-cptdi-1" value="1" class="mr-1">Tidak
                                                        <input type="checkbox" name="hematoma_cptdi_2" id="hematoma-cptdi-2" value="1" class="mr-1 ml-3">Ya &nbsp;Lokasi :
                                                        <input type="text" name="hematoma_cptdi_3" id="hematoma-cptdi-3" class="custom-form clear-input d-inline-block col-lg-3"> Ukuran :
                                                        <input type="text" name="hematoma_cptdi_4" id="hematoma-cptdi-4" class="custom-form clear-input d-inline-block col-lg-3">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%">Leserasi</td>
                                                    <td width="1%">:</td>
                                                    <td colspan="10">
                                                        <input type="checkbox" name="leserasi_cptdi_1" id="leserasi-cptdi-1" value="1" class="mr-1">Tidak
                                                        <input type="checkbox" name="leserasi_cptdi_2" id="leserasi-cptdi-2" value="1" class="mr-1 ml-3">Ya &nbsp;Lokasi :
                                                        <input type="text" name="leserasi_cptdi_3" id="leserasi-cptdi-3" class="custom-form clear-input d-inline-block col-lg-3"> Ukuran :
                                                        <input type="text" name="leserasi_cptdi_4" id="leserasi-cptdi-4" class="custom-form clear-input d-inline-block col-lg-3">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%">Reaksi alergi</td>
                                                    <td width="1%">:</td>
                                                    <td colspan="10">
                                                        <input type="checkbox" name="reaksif_cptdi_1" id="reaksif-cptdi-1" value="1" class="mr-1">Tidak
                                                        <input type="checkbox" name="reaksif_cptdi_2" id="reaksif-cptdi-2" value="1" class="mr-1 ml-3">Ya &nbsp;
                                                        <input type="text" name="reaksif_cptdi_3" id="reaksif-cptdi-3" class="custom-form clear-input d-inline-block col-lg-5">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="12"><b>Keseimbangan cairan</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="10%">Intake</td>
                                                    <td width="1%">:</td>
                                                    <td colspan="3">
                                                        Minum 
                                                        <input type="text" name="intaker_cptdi_1" id="intaker-cptdi-1" class="custom-form clear-input d-inline-block col-lg-10">&nbsp;ml
                                                    </td>
                                                    <td colspan="5">Output : Perdarahan 
                                                        <input type="text" name="intaker_cptdi_2" id="intaker-cptdi-2" class="custom-form clear-input d-inline-block col-lg-5">&nbsp;ml
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%"></td>
                                                    <td width="1%"></td>
                                                    <td colspan="3">
                                                        IV Line  
                                                        <input type="text" name="intaker_cptdi_3" id="intaker-cptdi-3" class="custom-form clear-input d-inline-block col-lg-10">&nbsp;ml
                                                    </td>
                                                    <td colspan="5"> Urine 
                                                        <input type="text" name="intaker_cptdi_4" id="intaker-cptdi-4" class="custom-form clear-input d-inline-block col-lg-5">&nbsp;ml
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <td width="10%"></td>
                                                    <td width="1%"></td>
                                                    <td colspan="3">
                                                        <input type="text" name="intaker_cptdi_5" id="intaker-cptdi-5" class="custom-form clear-input d-inline-block col-lg-10">&nbsp;ml
                                                    </td>
                                                    <td colspan="5">
                                                        <input type="text" name="intaker_cptdi_6" id="intaker-cptdi-6" class="custom-form clear-input d-inline-block col-lg-5">&nbsp;ml
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="12"><b>instruksi paska tindakan</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="10%">Immobilisasi sampai jam</td>
                                                    <td width="1%">:</td>
                                                    <td colspan="10"> 
                                                        <input type="text" name="imobil_cptdi_1" id="imobil-cptdi-1" class="custom-form clear-input d-inline-block col-lg-1">&nbsp;(6 -7 jam paska anestesi spinal)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%">EKG</td>
                                                    <td width="1%">:</td>
                                                    <td colspan="3">
                                                        <input type="text" name="imobil_cptdi_2" id="imobil-cptdi-2" class="custom-form clear-input d-inline-block col-lg-10">&nbsp;
                                                    </td>
                                                    <td colspan="5">Foto Rontgen 
                                                        <input type="text" name="imobil_cptdi_3" id="imobil-cptdi-3" class="custom-form clear-input d-inline-block col-lg-5">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%">Antibiotik</td>
                                                    <td width="1%">:</td>
                                                    <td colspan="3">
                                                        <input type="text" name="imobil_cptdi_4" id="imobil-cptdi-4" class="custom-form clear-input d-inline-block col-lg-10">&nbsp;
                                                    </td>
                                                    <td colspan="5">Dosis 
                                                        <input type="text" name="imobil_cptdi_5" id="imobil-cptdi-5" class="custom-form clear-input d-inline-block col-lg-5">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="10%">Hidrasi</td>
                                                    <td width="1%">:</td>
                                                    <td colspan="10">
                                                        <input type="text" name="imobil_cptdi_6" id="imobil-cptdi-6" class="custom-form clear-input d-inline-block col-lg-4">&nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="12"><b>Masalah keperawatan</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="12"> 
                                                        <input type="checkbox" name="maskeptan_cptdi_1" id="maskeptan-cptdi-1" value="1" class="mr-1">Penurunan curah jantung &nbsp;
                                                        <input type="checkbox" name="maskeptan_cptdi_2" id="maskeptan-cptdi-2" value="1" class="mr-1 ml-3">Nyeri &nbsp;
                                                        <input type="checkbox" name="maskeptan_cptdi_3" id="maskeptan-cptdi-3" value="1" class="mr-1 ml-3">Resiko perdarahan
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="12"> 
                                                        <input type="checkbox" name="maskeptan_cptdi_4" id="maskeptan-cptdi-4" value="1" class="mr-1">Penurunan perfusi jaringan &nbsp;
                                                        <input type="checkbox" name="maskeptan_cptdi_5" id="maskeptan-cptdi-5" value="1" class="mr-1 ml-3">Resiko tinggi infeksi &nbsp;
                                                        <input type="checkbox" name="maskeptan_cptdi_6" id="maskeptan-cptdi-6" value="1" class="mr-1 ml-3">Gangguan mobilitas fisik
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="12"> 
                                                        <input type="checkbox" name="maskeptan_cptdi_7" id="maskeptan-cptdi-7" value="1" class="mr-1">&nbsp;
                                                        <input type="text" name="maskeptan_cptdi_8" id="maskeptan-cptdi-8" class="custom-form clear-input d-inline-block col-lg-3"> &nbsp;
                                                        <input type="checkbox" name="maskeptan_cptdi_9" id="maskeptan-cptdi-9" value="1" class="mr-1 ml-3">
                                                        <input type="text" name="maskeptan_cptdi_10" id="maskeptan-cptdi-10" class="custom-form clear-input d-inline-block col-lg-3"> &nbsp;
                                                        <input type="checkbox" name="maskeptan_cptdi_11" id="maskeptan-cptdi-11" value="1" class="mr-1 ml-3"> &nbsp;
                                                        <input type="text" name="maskeptan_cptdi_12" id="maskeptan-cptdi-12" class="custom-form clear-input d-inline-block col-lg-3"> &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="12"><b>Rencana tindakan keperawatan (mandiri)</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="12"> 
                                                        <input type="checkbox" name="tdmandiri_cptdi_1" id="tdmandiri-cptdi-1" value="1" class="mr-1">Manajemen nyeri &nbsp;
                                                        <input type="checkbox" name="tdmandiri_cptdi_2" id="tdmandiri-cptdi-2" value="1" class="mr-1 ml-3">Monitoring tanda-tanda vital &nbsp;
                                                        <input type="checkbox" name="tdmandiri_cptdi_3" id="tdmandiri-cptdi-3" value="1" class="mr-1 ml-3">
                                                        <input type="text" name="tdmandiri_cptdi_4" id="tdmandiri-cptdi-4" class="custom-form clear-input d-inline-block col-lg-3"> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="12"> 
                                                        <input type="checkbox" name="tdmandiri_cptdi_5" id="tdmandiri-cptdi-5" value="1" class="mr-1">Manajemen nyeri &nbsp;
                                                        <input type="checkbox" name="tdmandiri_cptdi_6" id="tdmandiri-cptdi-6" value="1" class="mr-1 ml-3">Monitoring tanda-tanda vital &nbsp;
                                                        <input type="checkbox" name="tdmandiri_cptdi_7" id="tdmandiri-cptdi-7" value="1" class="mr-1 ml-3">
                                                        <input type="text" name="tdmandiri_cptdi_8" id="tdmandiri-cptdi-8" class="custom-form clear-input d-inline-block col-lg-3"> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="12"> 
                                                        Keputusan Rawat
                                                        <input type="text" name="tdmandiri_cptdi_9" id="tdmandiri-cptdi-9" class="custom-form clear-input d-inline-block col-lg-2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input type="checkbox" name="tdmandiri_cptdi_10" id="tdmandiri-cptdi-10" value="1" class="mr-1">ODC &nbsp;
                                                        <input type="checkbox" name="tdmandiri_cptdi_11" id="tdmandiri-cptdi-11" value="1" class="mr-1 ml-3">Dirawat di
                                                        <input type="text" name="tdmandiri_cptdi_12" id="tdmandiri-cptdi-12" class="custom-form clear-input d-inline-block col-lg-3"> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="10"> 
                                                        <span class="mr-2"><b>Tanggal dan Jam</b></span>
                                                        <!-- <input type="text" name="tanggaljagm_cptdi" id="tanggaljagm-cptdi" class="custom-form clear-input d-inline-block col-lg-1" value="<?= date('d/m/Y H:i') ?>" placeholder=""> -->
                                                        <input type="text" name="tanggaljagm_cptdi" id="tanggaljagm-cptdi"class="custom-form clear-input d-inline-block col-lg-2">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="10"> 
                                                        <span class="mr-2"><b>Yang mengobservasi</b></span>
                                                        <input type="text" name="perawatobsser_cptdi" id="perawatobsser-cptdi" class="select2c-input ml-2">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>                   
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
                <button id="btn-simpan"  type="button" class="btn btn-info" onclick="konfirmasisimpanCheklisPersiapanTindakanDiagInvasi()"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</button>
                <button type="button" class="btn btn-success hide" onclick="konfirmasiCetakCheklisPersiapanTindakanDiagInvasi()" id="btn_cetak_cptdi"><i class="fas fa-fw fa-print mr-1"></i>Print</button>
            </div>
        </div>
    </div>
</div>

<div id="modal-edit-grafik-observasi" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-edit-grafik-observasi-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Grafik Observasi</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'role=form class=form-horizontal id=form-edit-grafik-observasi'); ?>
                <table class="table table-sm table-striped table-bordered" id="table-edit-grafik-observasi"> 
                    <tbody>
                        <tr>
                            <input type="hidden" name="id" id="id-edit-cptdi">
                            <input type="hidden" name="id_layanan_pendaftaran" id="edit-id-layanan-pendaftaran-cptdi">
                            <input type="hidden" name="id_pendaftaran" id="edit-id-pendaftaran-cptdi">
                            <td width="5%" class="center">BP</td>
                            <td width="10%"><input type="number" name="bloodpressure_cptdi" id="edit-bloodpressure-cptdi"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td width="5%" class="center">N</td>                                                           
                            <td width="10%"><input type="number" name="nadipulse_cptdi" id="edit-nadipulse-cptdi"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td width="5%" class="center">P</td> 
                            <td width="10%"><input type="number" name="pernafasan_cptdi" id="edit-pernafasan-cptdi"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td width="5%" class="center">S</td> 
                            <td width="10%"><input type="number" name="suhu_cptdi" id="edit-suhu-cptdi"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td width="5%" class="center">Jam</td> 
                            <td width="10%"><input type="text" name="jamgo_cptdi" id="edit-jamgo-cptdi"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td width="5%" class="center">Tanggal</td> 
                            <td width="10%"><input type="text" name="tglgo_cptdi" id="edit-tglgo-cptdi"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td width="10%">
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-info btn-xs" id="btn-update-grafik-observasi">Update</button>
                                    <button type="button" class="btn btn-secondary btn-xxs edit-button ml-1" data-dismiss="modal" style="background-color: yellow; color: black;"><i class="fas fa-fw fa-times-circle mr-1"></i>Batal</button>
                                </div>
                            </td>                                                   
                        </tr>  
                    </tbody>
                </table>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
