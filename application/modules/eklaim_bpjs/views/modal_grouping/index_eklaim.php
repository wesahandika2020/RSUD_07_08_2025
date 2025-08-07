<style>
    .pointer {
        text-decoration: underline;
        cursor: pointer;
        color: initial;
        transition: color 0.3s;
    }

    .pointer:hover {
        font-weight: bold;
        color: blue;
    }

    /* .dropdown-item:hover {
		background-color:rgb(255, 230, 222);
	} */

    #dropdownResult {
        position: absolute;
        /* Agar dropdown berada di bawah input */
        background-color: #fff;
        border: 1px solid #ccc;
        z-index: 1000;
        max-height: 200px;
        /* Maksimum tinggi dropdown */
        overflow-y: auto;
        /* Tampilkan scroll jika konten melebihi max-height */
        width: 100%;
        /* Sesuaikan lebar dengan input atau container */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    #dropdownResultProc {
        position: absolute;
        /* Agar dropdown berada di bawah input */
        background-color: #fff;
        border: 1px solid #ccc;
        z-index: 1000;
        max-height: 200px;
        /* Maksimum tinggi dropdown */
        overflow-y: auto;
        /* Tampilkan scroll jika konten melebihi max-height */
        width: 100%;
        /* Sesuaikan lebar dengan input atau container */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .dropdown-result {
        position: absolute;
        /* Agar dropdown berada di bawah input */
        background-color: #fff;
        border: 1px solid #ccc;
        z-index: 1000;
        max-height: 200px;
        /* Maksimum tinggi dropdown */
        overflow-y: auto;
        /* Tampilkan scroll jika konten melebihi max-height */
        width: 100%;
        /* Sesuaikan lebar dengan input atau container */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .dropdown-result-proc {
        position: absolute;
        /* Agar dropdown berada di bawah input */
        background-color: #fff;
        border: 1px solid #ccc;
        z-index: 1000;
        max-height: 200px;
        /* Maksimum tinggi dropdown */
        overflow-y: auto;
        /* Tampilkan scroll jika konten melebihi max-height */
        width: 100%;
        /* Sesuaikan lebar dengan input atau container */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .dropdown-result-diag {
        position: absolute;
        /* Agar dropdown berada di bawah input */
        background-color: #fff;
        border: 1px solid #ccc;
        z-index: 1000;
        max-height: 200px;
        /* Maksimum tinggi dropdown */
        overflow-y: auto;
        /* Tampilkan scroll jika konten melebihi max-height */
        width: 100%;
        /* Sesuaikan lebar dengan input atau container */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .diagnosa-class {
        position: absolute;
        background-color: #fff;
        border: 1px solid #ccc;
        z-index: 1000;
        max-height: 200px;
        width: 100%;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .prosedur-class {
        position: absolute;
        background-color: #fff;
        border: 1px solid #ccc;
        z-index: 1000;
        max-height: 200px;
        width: 100%;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    #table-eklaim-get {
        border-collapse: collapse;
        border: none;
        width: 100%;
    }

    #table-eklaim-get tbody tr {
        border-top: 1px solid #aaa;
    }

    #table-eklaim-get thead tr {
        border-bottom: 1px solid #aaa;
    }

    #table-eklaim-get th {
        border: none;
        padding: 8px;
    }

    #table-eklaim-get td {
        border-left: 1px solid #aaa;
        border-right: 1px solid #aaa;
        padding: 8px;
        font-weight: bold;
    }

    #jaminan-peserta-sep {
        border-top: 2px solid;
        margin: 20px 0px 20px 0px;
        display: flex;
        gap: 10px;
        justify-content: center;
        padding: 10px;
    }

    #jaminan-peserta-sep table td {
        padding: 0px 10px 0px 10px;
    }

    .tarif-eklaim table td {
        border-bottom: 1px solid #aaa;
        border-top: 1px solid #aaa;
        padding: 5px;
    }

    .grouper_result table td {
        border-bottom: 1px solid #aaa;
        border-top: 1px solid #aaa;
        padding: 10px;
    }

    .zero-padding td {
        padding: 0px !important;
    }

    .invisible_debug td {
        border: 0px !important;
        border-bottom: 0px;
        border-top: 0px;
        padding: 0px !important;
    }

    .tarif-eklaim span {
        color: #aaa;
    }

    .tarif-eklaim label {
        margin: 0px;
        display: grid;
        align-items: center;
    }

    .number-input {
        text-align: center;
    }

    .tarif-input {
        text-align: center;
    }

    .title-mark {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .tooltip-text {
        padding-left: 20px;
        background-color: pink;
        color: black !important;
        font-size: 8pt;
        padding: 10px;
        line-height: 15px;
    }

    .nav-tabs li .nav-link {
        color: #aaa !important;
        font-weight: normal;
        transition: color 0.3s ease;
    }

    .nav-tabs li .nav-link.active {
        color: black !important;
        font-weight: bold;
    }

    .nav-tabs .nav-link:hover {
        color: blue;
    }

    .coding-grouper span {
        color: #aaa;
    }

    .badge {
        color: black !important;
        font-weight: bold;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-fw fa-info mr-1"></i>KLAIM</h4>
                    <button type="button" class="close" style="font-size: 25pt;" data-dismiss="modal" onclick="closeTabEklaim()" aria-hidden="true">&times;</button>
                </div>
                <div class="row" id="label-header-eklaim"></div>
                <div class="modal-body">
                    <?= form_open('', 'id=form-gpr-eklaim role=form class=form-horizontal') ?>
                    <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-gpr">
                    <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-gpr">
                    <input type="hidden" id="id-pasien-gpr">
                    <input type="hidden" name="id_eklaim" id="id-eklaim-gpr">
                    <input type="hidden" id="id-dokter-gpr">
                    <input type="hidden" id="no-ktp-pasien-gpr">

                    <input type="hidden" id="nomor-rm-gpr" name="nomor_rm">
                    <input type="hidden" id="nama-pasien-gpr" name="nama_pasien">
                    <input type="hidden" id="tgl-lahir-gpr" name="tgl_lahir">
                    <input type="hidden" id="gender-gpr" name="gender">
                    <input type="hidden" id="jenis-rawat-gpr" name="jenis_rawat">
                    <input type="hidden" id="is-apgar-gpr" name="is_apgar" value="0">
                    <input type="hidden" id="is-persalinan-gpr" name="is_persalinan" value="0">
                    <input type="hidden" id="is-hd-gpr" name="is_hd" value="0">
                    <!-- <input type="hidden" id="id-konsul-gpr"> -->
                    <!-- <input type="hidden" id="id-spesialis-gpr"> -->
                    <!-- <input type="hidden" id="id-layanan-ranap"> -->
                    <!-- <input type="hidden" name="tgl_lahir" id="tgl_lahir"> -->
                    <input type="hidden" name="icu_los" id="icu_los">
                    <input type="hidden" name="coder_nik" value="<?= $this->session->userdata('nik') ?>" id="coder_nik_gpr">
                    <input type="hidden" name="gpr_diagnosis" id="gpr_diagnosis">
                    <input type="hidden" name="gpr_procedure" id="gpr_procedure">
                    <input type="hidden" name="gpr_diagnosis_inagrouper" id="gpr_diagnosis_inagrouper">
                    <input type="hidden" name="gpr_procedure_inagrouper" id="gpr_procedure_inagrouper">
                    <input type="hidden" name="gpr_method_status" id="gpr_method_status">
                    <input type="hidden" name="gpr_status_klaim" id="gpr_status_klaim">
                    <div class="row p-20">
                        <div class="col-lg-12">
                            <!-- <div class="table-responsive"></div> -->
                            <table id="table-eklaim-get" style="width: 100%;">
                                <thead style="width: 100%; color: #aaa; font-style: italic;">
                                    <tr>
                                        <th class="center">Tanggal Masuk</th>
                                        <th class="center">Tanggal Pulang</th>
                                        <th>Jaminan</th>
                                        <th>No. SEP</th>
                                        <th>Type</th>
                                        <th>CBG</th>
                                        <th>Status</th>
                                        <th>Petugas</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                            <div class="row" id="jaminan-peserta-sep">
                                <table style="padding: 10px;">
                                    <tr>
                                        <td>Jaminan / Cara Bayar</td>
                                        <td>No. NIK</td>
                                        <td>No. Peserta</td>
                                        <td>No. SEP</td>
                                        <td>COB</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!-- <label id="gpr-label-jaminan" style="font-size: medium;">JKN</label> -->
                                            <?= form_dropdown('gpr_cara_bayar', $metode_bayar, array(), 'class="form-control-sm" id=gpr-cara-bayar') ?>
                                        </td>
                                        <td><input readonly type="text" id="gpr-no-nik" name="nomor_nik" class="form-control-sm"></td>
                                        <td><input readonly type="text" id="gpr-no-peserta" name="nomor_kartu" class="form-control-sm"></td>
                                        <td><input readonly type="text" id="gpr-no-sep" name="nomor_sep" class="form-control-sm"></td>
                                        <td>
                                            <?= form_dropdown('gpr_cob', $cob_list, array(), 'class="form-control-sm" id=gpr_cob') ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="tarif-eklaim">
                                <table width=100%>
                                    <tr>
                                        <td width="15%" class="right" style="border-right: 1px solid #aaa;">Jenis Rawat</td>
                                        <td width="50%" colspan="2" class="left" style="border-right: 1px solid #aaa;" id="gpr-jenis-rawat">
                                            <div class="col-lg-12 row">
                                                <input type="radio" checked="1" onchange="chg_jenis('outpatient',this,event);" name="jenis_rawat_type" value="jalan" id="type-jalan">
                                                <label class="ml-1 mr-3" for="type-jalan"><u class="pointer">Jalan</u></label>
                                                <input type="radio" onchange="chg_jenis('inpatient',this,event);" name="jenis_rawat_type" value="inap" id="type-inap">
                                                <label class="ml-1 mr-3" for="type-inap"><u class="pointer">Inap</u></label>

                                                <div class="row tab-upgrade-class">
                                                    <div class="title-mark ml-3 mr-1">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Check jika kelas pelayanan berbeda dengan kelas haknya.
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <input type="checkbox" onchange="chg_upgrade_class(this,event);" name="upgrade_class_ind" value="1" id="upgrade_class_ind">
                                                    <label class="ml-1 mr-3" for="upgrade_class_ind"><u class="pointer">Naik/Turun Kelas</u></label>
                                                </div>

                                                <div class="row tab-chg-icu">
                                                    <div class="title-mark ml-3 mr-1">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Untuk perbaikan tarif:<br />Check jika selama periode perawatan ada episode rawat intensif (ICU/ICCU/NICU/PICU/HCU/dll.)
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <input type="checkbox" onchange="chg_icu(this,event);" name="icu_ind" value="1" id="icu_ind">
                                                    <label class="ml-1 mr-3" for="icu_ind"><u class="pointer">Ada Rawat Intensif</u></label>
                                                </div>

                                                <div class="row tab-executive-class">
                                                    <div class="title-mark ml-3 mr-1">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Check jika mendapatkan pelayanan kelas eksekutif.
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <input type="checkbox" onchange="chg_op_class(this,event);" name="executive_class_ind" value="1" id="executive_class_ind">
                                                    <label class="ml-1 mr-3" for="executive_class_ind"><u class="pointer">Kelas Eksekutif</u></label>
                                                </div>
                                            </div>

                                        </td>
                                        <td width="15%" class="right" style="border-right: 1px solid #aaa;">Kelas Hak</td>
                                        <td width="20%" class="left" id="gpr-hak-kelas">
                                            <div class="col-lg-12 row hak-kelas-inap">
                                                <!-- onchange="chg_ip_class(this,event);"  -->
                                                <input class="tariff_class" type="radio" checked="1" value="kelas_3" id="tariff_class_3" name="tariff_class">
                                                <label for="tariff_class_3" class="pointer ml-1 mr-2">Kelas 3</label>
                                                <input class="tariff_class" type="radio" value="kelas_2" id="tariff_class_2" name="tariff_class">
                                                <label for="tariff_class_2" class="pointer ml-1 mr-2">Kelas 2</label>
                                                <input class="tariff_class" type="radio" value="kelas_1" id="tariff_class_1" name="tariff_class">
                                                <label for="tariff_class_1" class="pointer ml-1 mr-2">Kelas 1</label>
                                            </div>
                                            <div class="col-lg-12 row hak-kelas-jalan">-</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="right" style="border-right: 1px solid #aaa;">Tanggal Rawat</td>
                                        <td class="center" id="gpr-tgl-masuk">
                                            <div class="row col-lg-12 d-flex justify-content-center">
                                                Masuk : <input id="tgl_masuk" type="text" class="custom-form clear-input number-input ml-1 col-lg-6" name="tgl_masuk">
                                            </div>
                                        </td>
                                        <td class="center" style="border-right: 1px solid #aaa;" id="gpr-tgl-pulang">
                                            <div class="row col-lg-12 d-flex justify-content-center">
                                                Pulang : <input id="tgl_pulang" type="text" class="custom-form clear-input number-input ml-1 col-lg-6" name="tgl_pulang">
                                            </div>
                                        </td>
                                        <td class="right" style="border-right: 1px solid #aaa;">Umur</td>
                                        <td class="left" id="gpr-umur"></td>
                                    </tr>
                                    <tr>
                                        <td class="right" style="border-right: 1px solid #aaa;">Cara Masuk</td>
                                        <td colspan="4" class="left" id="gpr-cara-masuk">
                                            <?= form_dropdown('gpr_cara_masuk', $cara_masuk, array(), 'class="custom-form col-lg-3" id=gpr_cara_masuk') ?>
                                        </td>
                                    </tr>
                                    <tr id="tr-upgrade-class">
                                        <td class="right" style="border-right: 1px solid #aaa;">
                                            <div class="right" style="display: flex;justify-content: flex-end;">
                                                <div class="row col-lg-12" style="display: flex;justify-content: flex-end;">
                                                    <div class="title-mark ml-3 mr-1">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Masukkan naik/turun kelas yang diambil pasien.
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    Kelas Pelayanan
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="2" class="left" id="gpr-naik-kelas" style="border-right: 1px solid #aaa;">
                                            <div class="col-lg-12 row">
                                                <input onchange="change_upgrade_class(this,event);" type="radio" checked="1" value="kelas_3" id="upgrade_class_3" name="upgrade_class">
                                                <label for="upgrade_class_3" class="pointer ml-1 mr-3">Kelas 3</label>
                                                <input onchange="change_upgrade_class(this,event);" type="radio" value="kelas_2" id="upgrade_class_2" name="upgrade_class">
                                                <label for="upgrade_class_2" class="pointer ml-1 mr-3">Kelas 2</label>
                                                <input onchange="change_upgrade_class(this,event);" type="radio" value="kelas_1" id="upgrade_class_1" name="upgrade_class">
                                                <label for="upgrade_class_1" class="pointer ml-1 mr-3">Kelas 1</label>
                                                <input onchange="change_upgrade_class(this,event);" type="radio" value="vip" id="upgrade_class_vip" name="upgrade_class">
                                                <label for="upgrade_class_vip" class="pointer ml-1 mr-3">Diatas Kelas 1</label>
                                            </div>
                                        </td>
                                        <td class="right" style="border-right: 1px solid #aaa;">

                                            <div class="right" style="display: flex;justify-content: flex-end;">
                                                <div class="row col-lg-12" style="display: flex;justify-content: flex-end;">
                                                    <div class="title-mark ml-3 mr-1">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Masukkan jumlah hari naik kelas rawat.
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    Lama (<span>hari</span>)
                                                </div>
                                            </div>

                                        </td>
                                        <td class="left" id="gpr-lama-naik-kelas">
                                            <input id="upgrade_class_los" name="upgrade_class_los" type="number" value="0" class="custom-form col-md-3 number-input">
                                        </td>
                                    </tr>
                                    <tr id="gpr-ventilator">
                                        <td class="right" style="border-right: 1px solid #aaa;">
                                            <div class="right" style="display: flex;justify-content: flex-end;">
                                                <div class="row col-lg-12" style="display: flex;justify-content: flex-end;">
                                                    <div class="title-mark ml-3 mr-1">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Masukkan waktu intubasi dan extubasi
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    Ventilator
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="2" class="left" style="border-right: 1px solid #aaa;">
                                            <div class="row col-lg-12">
                                                <div class="row col-lg-2">
                                                    <input type="checkbox" onchange="chg_ventilator_use(this,event);" name="ventilator_use" value="1" id="ventilator_use">
                                                    <label class="ml-1 mr-5" for="ventilator_use"><u class="pointer">Ya</u></label>
                                                </div>
                                                <div class="row col-lg-10">
                                                    <div class="row col-lg-6 gpr-ventilator-input">
                                                        Intubasi : <input type="text" name="ventilator_start_dttm" id="ventilator_start_dttm" class="custom-form clear-input ml-1 number-input col-lg-6">
                                                    </div>
                                                    <div class="row col-lg-6 gpr-ventilator-input">
                                                        Ekstubasi : <input type="text" name="ventilator_stop_dttm" id="ventilator_stop_dttm" class="custom-form clear-input ml-1 number-input col-lg-6">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="right" style="border-right: 1px solid #aaa;">
                                            <div class="right" style="display: flex;justify-content: flex-end;">
                                                <div class="row col-lg-12" style="display: flex;justify-content: flex-end;">
                                                    <div class="title-mark ml-3 mr-1">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Untuk perbaikan tarif:<br />Masukan total jumlah hari rawat intensif
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                    Rawat Intensif (<span>hari</span>)
                                                </div>
                                            </div>
                                        </td>
                                        <td class="left" id="rawat-intensif">
                                            <input id="gpr_icu_los" name="gpr_icu_los" type="number" class="custom-form col-md-3 number-input">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="right" style="border-right: 1px solid #aaa;">LOS</td>
                                        <td class="left" id="gpr-los-hari"></td>
                                        <td class="right" style="border-right: 1px solid #aaa;" id="gpr-los-jam"></td>
                                        <td class="right" style="border-right: 1px solid #aaa;">Berat Lahir (<span>gram</span>)</td>
                                        <td class="left" id="gpr-berat-lahir">
                                            <input type="number" name="gpr_berat_lahir" id="gpr_berat_lahir" class="custom-form clear-input d-inline-block number-input col-lg-3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="right" style="border-right: 1px solid #aaa;">ADL Score</td>
                                        <td class="center" id="gpr-sub-acute">
                                            <div class="row d-flex justify-content-center col-lg-12">
                                                Sub Acute : <input type="text" name="gpr_sub_acute" id="gpr_sub_acute" class="custom-form clear-input ml-1 number-input col-lg-3">
                                            </div>
                                        </td>
                                        <td class="center" id="gpr-chronic" style="border-right: 1px solid #aaa;">
                                            <div class="row d-flex justify-content-center col-lg-12">
                                                Chronic : <input type="text" name="gpr_chronic" id="gpr_chronic" class="custom-form clear-input ml-1 number-input col-lg-3">
                                            </div>
                                        </td>
                                        <td class="right" style="border-right: 1px solid #aaa;">Cara Pulang</td>
                                        <td class="left" id="gpr-berat-lahir">
                                            <?= form_dropdown('gpr_cara_pulang', $cara_pulang, array(), 'class="custom-form" id=gpr-cara-pulang') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="right" style="border-right: 1px solid #aaa;">DPJP</td>
                                        <td class="left" id="gpr-dpjp">
                                            <input type="text" name="gpr_nama_dokter" id="gpr_nama_dokter" class="custom-form clear-input d-inline-block" placeholder="">
                                        </td>
                                        <td class="right" style="border-right: 1px solid #aaa;"></td>
                                        <td class="right" style="border-right: 1px solid #aaa;">Jenis Tarif</td>
                                        <td class="left" id="gpr-jenis-tarif-rs">
                                            <?= form_dropdown('gpr_jenis_tarif', $kode_tarif, array(), 'class="custom-form" id=gpr-jenis-tarif') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="right" style="border-right: 1px solid #aaa;">Pasien TB</td>
                                        <td colspan="2" class="left">
                                            <div class="row col-lg-12">
                                                <div class="row col-lg-2">
                                                    <input type="hidden" name="hdn_is_pasien_tb" id="hdn_is_pasien_tb">
                                                    <input type="checkbox" name="gpr_is_pasien_tb" value="1" onchange="chg_jkn_sitb_noreg(this,event);" id="gpr_is_pasien_tb">
                                                    <label class="ml-1 mr-5" for="gpr_is_pasien_tb"><u class="pointer">Ya</u></label>
                                                </div>
                                                <div class="row col-lg-10 sitb_noreg">
                                                    <div class="row col-lg-6">
                                                        <input type="hidden" name="hdn_sitb_noreg" id="hdn_sitb_noreg">
                                                        <input type="text" name="jkn_sitb_noreg" id="jkn_sitb_noreg" class="custom-form clear-input d-inline-block" placeholder="Nomor Register SITB">
                                                    </div>
                                                    <div id="validasi-sitb-status" class="row col-lg-6 align-items-center">

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr id="tab-is-pasien-covid">
                                        <td class="right" style="border-right: 1px solid #aaa;">Co-Insidense COVID-19</td>
                                        <td colspan="2" class="left">
                                            <div class="row col-lg-12">
                                                <div class="row col-lg-2">
                                                    <input type="checkbox" name="gpr_is_pasien_covid" value="1" onchange="chg_co_insidense(this,event);" id="gpr_is_pasien_covid">
                                                    <label class="ml-1 mr-5" for="gpr_is_pasien_covid"><u class="pointer">Ya</u></label>
                                                </div>
                                                <div class="row col-lg-10 covid19_no_sep">
                                                    <div class="row col-lg-6">
                                                        <input type="text" name="covid19_no_sep" id="covid19_no_sep" class="custom-form clear-input d-inline-block" placeholder="Nomor Klaim COVID-19">
                                                    </div>
                                                    <div class="row col-lg-6">
                                                        <button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="validate_covid19_no_sep()">
                                                            Validasi
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr id="gpr-tarif-poli-eks">
                                        <td colspan="3" class="right" style="border-right: 1px solid #aaa;"></td>
                                        <td class="right" style="border-right: 1px solid #aaa;">
                                            <div class="row">
                                                <div class="title-mark ml-3 mr-1">
                                                    <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                        <span><i class="fas fa-question-circle"></i></span>
                                                        <span class="tooltip-content clearfix">
                                                            <span class="tooltip-text p-t-10">
                                                                Untuk poli eksekutif:<br />Masukkan nilai tagihan untuk poli eksekutif <span style="color:black;font-weight:bold;">yang dibayar oleh pasien</span>. Mohon diisi dengan benar
                                                            </span>
                                                        </span>
                                                    </span>
                                                </div>
                                                Tarif Poli Eks.
                                            </div>
                                        </td>
                                        <td class="left">
                                            <div id="dvinput_pex" style="text-align:left;" class="col-lg-12 row">
                                                <!-- <input type="text" id="tarif-keperawatan" value="0" class="form-control-sm col-md-3 number-input"> -->
                                                <input value="0" id="billing_amount_pex" name="billing_amount_pex" type="number" class="custom-form col-md-6 number-input">
                                                <div class="col-md-6 d-flex" style="align-items: center; justify-content: flex-end;">
                                                    <a style="float:right;">
                                                        <a class="discreet mr-1">Rp</a>
                                                        <a style="font-size:1.2em; font-weight:bold;" id="billing_amount_pex_txt"></a>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>

                                <div class="p-20">
                                    <div class="row" style="justify-content: center;">
                                        <div class="title-mark">
                                            <span class="mytooltip tooltip-effect-3" style="font-size: small; margin-bottom: 5px;">
                                                <span><i class="fas fa-question-circle"></i></span>
                                                <span class="tooltip-content clearfix">
                                                    <span class="tooltip-text p-t-10">
                                                        Total nilai tertagih pada perawatan dalam satu episode, tidak termasuk item tagihan pada <strong>Tarif Non INA-CBG</strong> yang tersebut dibawah.
                                                    </span>
                                                </span>
                                            </span>&nbsp; <span style="margin-bottom: 5px;"><i>Tarif Rumah Sakit :</i> Rp</span>&nbsp;<h4><b id="gpr-total-tarif-rs">5,356,410</b></h4>
                                            <input type="hidden" name="gpr_total_tarif_rs" id="gpr_total_tarif_rs">
                                        </div>
                                    </div>

                                    <table width=100%>
                                        <tr>
                                            <td class="right" style="border-right: 1px solid #aaa;">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif untuk tindakan medik non-operatif dan noninvasif (tidak dilakukan di kamar operasi), seperti
                                                                    contoh : kateterisasi jantung.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Prosedur Non Bedah
                                                    </div>
                                                    <input type="text" id="tarif-prosedur-non-bedah" name="prosedur_non_bedah" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                            <td class="right" style="border-right: 1px solid #aaa;">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif untuk tindakan medik operatif maupun invasif yang dilakukan di kamar operasi.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Prosedur Bedah
                                                    </div>
                                                    <input type="text" id="tarif-prosedur-bedah" name="prosedur_bedah" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                            <td class="right">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif untuk konsul, visite atau pun pemeriksaan oleh dokter umum/spesialis/sub-spesialis dalam satu episode.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Konsultasi
                                                    </div>
                                                    <input type="text" id="tarif-konsultasi" name="konsultasi" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="right" style="border-right: 1px solid #aaa;">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif untuk konsul atau visite tenaga ahli dalam satu episode, seperti contoh: konsul nutrisionis atau fisioterapis.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Tenaga Ahli
                                                    </div>
                                                    <input type="text" id="tarif-tenaga-ahli" name="tenaga_ahli" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                            <td class="right" style="border-right: 1px solid #aaa;">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif untuk tindakan keperawatan seperti buka jahitan, perawatan luka, dan lainnya dalam satu episode.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Keperawatan
                                                    </div>
                                                    <input type="text" id="tarif-keperawatan" name="keperawatan" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                            <td class="right">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif untuk tindakan penunjang di luar laboratorium maupun radiologi dalam satu episode, seperti contoh Echo, EKG, Holter, dll.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Penunjang
                                                    </div>
                                                    <input type="text" id="tarif-penunjang" name="penunjang" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="right" style="border-right: 1px solid #aaa;">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif untuk pemeriksaan radiologi dalam satu episode, meliputi diantaranya X-Ray, USG, MRI, CT-Scan, Angiogram, dll.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Radiologi
                                                    </div>
                                                    <input type="text" id="tarif-radiologi" name="radiologi" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                            <td class="right" style="border-right: 1px solid #aaa;">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif untuk pemeriksaan laboratorium dalam satu episode, meliputi diantaranya Mikrobiologi, Patologi Anatomi, Patologi Klinik, Hematologi, Hemostasis, dll.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Laboratorium
                                                    </div>
                                                    <input type="text" id="tarif-laboratorium" name="laboratorium" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                            <td class="right">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif pemakaian darah dalam satu episode.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Pelayanan Darah
                                                    </div>
                                                    <input type="text" id="tarif-pelayanan-darah" name="pelayanan_darah" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="right" style="border-right: 1px solid #aaa;">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif untuk tindakan rehabilitasi, meliputi Fisioterapi, Terapi Okupasi, Rehabilitasi Psikososial, dll.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Rehabilitasi
                                                    </div>
                                                    <input type="text" id="tarif-rehabilitasi" name="rehabilitasi" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                            <td class="right" style="border-right: 1px solid #aaa;">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif kamar/akomodasi pasien dalam satu episode, termasuk recovery room, tarif administrasi pasien baik rawat jalan maupun rawat inap.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Kamar / Akomodasi
                                                    </div>
                                                    <input type="text" id="tarif-kamar-akomodasi" name="kamar" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                            <td class="right">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif kamar/akomodasi pasien di ruang intensif dalam satu episode. Misal: ICU, ICCU, NICU, PICU, HCU, dll.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Rawat Intensif
                                                    </div>
                                                    <input type="text" id="tarif-rawat-intensif" name="rawat_intensif" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="right" style="border-right: 1px solid #aaa;">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif obat-obatan yg diberikan selama episode pelayanan rawat inap atau rawat jalan (untuk 7 hari) diluar obat kemoterapi dan diluar obat kronis untuk 23 hari.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Obat
                                                    </div>
                                                    <input type="text" id="tarif-obat" name="obat" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                            <td class="right" style="border-right: 1px solid #aaa;">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif obat-obatan yg diberikan kepada pasien rawat jalan untuk 23 hari.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Obat Kronis
                                                    </div>
                                                    <input type="text" id="tarif-obat-kronis" name="obat_kronis" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                            <td class="right">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif obat-obatan kemoterapi rawat jalan maupun rawat inap dalam satu episode pelayanan.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Obat Kemoterapi
                                                    </div>
                                                    <input type="text" id="tarif-obat-kemoterapi" name="obat_kemoterapi" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="right" style="border-right: 1px solid #aaa;">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif alat kesehatan yang diberikan kepada pasien dalam satu episode. Misalkan: Stent, Implan, dll.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Alkes
                                                    </div>
                                                    <input type="text" id="tarif-alkes" name="alkes" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                            <td class="right" style="border-right: 1px solid #aaa;">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    BMHP = Bahan Medis Habis Pakai. Yaitu total tarif bahan medis habis pakai, di luar paket perawatan yang diberikan kepada pasien selama satu episode perawatan, seperti contoh : pemakaian oksigen, jelly, alkohol, dsb.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; BMHP
                                                    </div>
                                                    <input type="text" id="tarif-bmhp" name="bmhp" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                            <td class="right">
                                                <div class="row">
                                                    <div class="col-md-7 title-mark">
                                                        <span class="mytooltip tooltip-effect-3" style="font-size: small;">
                                                            <span><i class="fas fa-question-circle"></i></span>
                                                            <span class="tooltip-content clearfix">
                                                                <span class="tooltip-text p-t-10">
                                                                    Total tarif sewa alat medis yang digunakan dalam tindakan tertentu, seperti contoh: Ventilator, Nebulizer, Syringe Pump, dll.
                                                                </span>
                                                            </span>
                                                        </span>&nbsp; Sewa Alat
                                                    </div>
                                                    <input type="text" id="tarif-sewa-alat" name="sewa_alat" value="0" class="form-control-sm col-md-3 tarif-input">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>

                                    <div style="padding: 20px; display: flex; justify-content: center;">
                                        <div class="row">
                                            <input disabled type="checkbox" class="form-check-input" checked>
                                            <span><i>Menyatakan benar bahwa data tarif yang tersebut di atas adalah benar sesuai dengan kondisi yang sesungguhnya.</i></span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div style="padding: 20px; border-top: 2px solid;">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" style="width: 30px;"> &nbsp; </li>
                                    <li class="nav-item" id="tab-unu-grouper">
                                        <a class="nav-link active" data-toggle="tab" href="#coding-unu-grouper" role="tab">
                                            <span class="hidden-sm-up"></span>
                                            <span class="hidden-xs-down"><u>Coding UNU Grouper</u></span>
                                        </a>
                                    </li>
                                    <li class="nav-item" id="tab-ina-grouper">
                                        <a class="nav-link" data-toggle="tab" href="#coding-ina-grouper" role="tab">
                                            <span class="hidden-sm-up"></span>
                                            <span class="hidden-xs-down"><u>Coding INA Grouper</u></span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border coding-grouper">
                                    <div class="tab-pane p-20 active" id="coding-unu-grouper" role="tabpanel">
                                        <div class="row p-20" style="padding-bottom: 0px;">

                                            <div class="col-lg-9">
                                                <label>Diagnosa (<span>ICD-10</span>):</label>
                                            </div>
                                            <div class="col-lg-3 d-flex justify-content-end">
                                                <input type="text" style="border-radius: 25px;" class="form-control" onkeydown="handleEnterDiagNEW(event, 'unu')" id="search-diagnosa-unu" placeholder="Cari Diagnosa">
                                                <div id="diagnosaResult-unu" class="diagnosa-unu diagnosa-class" style="display: none; margin-top: 40px;"></div>
                                            </div>

                                        </div>
                                        <div style="padding-left: 60px; padding-right: 60px;">
                                            <table id="table-list-diagnosa-unu" width="100%">
                                                <tbody></tbody>

                                            </table>
                                        </div>
                                        <br>
                                        <div class="row p-20" style="border-top: 1px solid #aaa; padding-bottom: 0px;">

                                            <div class="col-lg-9">
                                                <label>Prosedur (<span>ICD-9-CM</span>):</label>
                                            </div>
                                            <div class="col-lg-3 d-flex justify-content-end">
                                                <input type="text" style="border-radius: 25px;" class="form-control" onkeydown="handleEnterProcNEW(event, 'unu')" id="search-prosedur-unu" placeholder="Cari Prosedur">
                                                <div id="prosedurResult-unu" class="prosedur-unu prosedur-class" style="display: none; margin-top: 40px;"></div>
                                            </div>

                                        </div>
                                        <div style="padding-left: 60px; padding-right: 60px;">
                                            <table id="table-list-prosedur-unu" width="100%">
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane p-20" id="coding-ina-grouper" role="tabpanel">
                                        <div class="col-lg-12 d-flex justify-content-end">
                                            <p class="pointer" id="import-coding" onclick="importCodingNew()">[ import coding ]</p>
                                        </div>
                                        <div class="row p-20" style="padding-bottom: 0px;">

                                            <div class="col-lg-9">
                                                <label>Diagnosa (<span>ICD-10</span>):</label>
                                            </div>
                                            <div class="col-lg-3 d-flex justify-content-end">
                                                <input type="text" style="border-radius: 25px;" class="form-control" onkeydown="handleEnterDiagNEW(event, 'ina')" id="search-diagnosa-ina" placeholder="Cari Diagnosa">
                                                <div id="diagnosaResult-ina" class="diagnosa-ina diagnosa-class" style="display: none; margin-top: 40px;"></div>
                                            </div>

                                        </div>
                                        <div style="padding-left: 60px; padding-right: 60px;">
                                            <table id="table-list-diagnosa-ina" width="100%">
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <div class="row p-20" style="border-top: 1px solid #aaa; padding-bottom: 0px;">

                                            <div class="col-lg-9">
                                                <label>Prosedur (<span>ICD-9-CM</span>):</label>
                                            </div>
                                            <div class="col-lg-3 d-flex justify-content-end">
                                                <input type="text" style="border-radius: 25px;" class="form-control" onkeydown="handleEnterProcNEW(event, 'ina')" id="search-prosedur-ina" placeholder="Cari Prosedur">
                                                <div id="prosedurResult-ina" class="prosedur-ina prosedur-class" style="display: none; margin-top: 40px;"></div>
                                            </div>

                                        </div>
                                        <div style="padding-left: 60px; padding-right: 60px;">
                                            <table id="table-list-prosedur-ina" width="100%">
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab Data Klinis -->
                            <div style="padding: 20px; border-top: 2px solid;">
                                <div style="border-bottom: 1px #aaa; padding: 5px; display: flex; justify-content: center;">
                                    <h5>Data Klinis</h5>
                                </div>

                                <table class="xxlist" style="width:100%;">
                                    <tbody>
                                        <tr id="data_klinis_gpr">
                                            <td style="text-align:center; padding:10px; border-top: solid 1px #aaa;" colspan="6">
                                                <div class="frm_title">Tekanan Darah (mmHg):</div>
                                                <div style="display:flex;justify-content:center;gap:10px;">
                                                    <div><input class="form-control-sm" name="jkn_sistole" value="0" id="jkn_sistole" type="text" style="width:60px;text-align:center;">
                                                        <div style="font-size:0.8em;margin-top:0.5em;">Sistole</div>
                                                    </div>
                                                    <div><input class="form-control-sm" name="jkn_diastole" value="0" id="jkn_diastole" type="text" style="width:60px;text-align:center;">
                                                        <div style="font-size:0.8em;margin-top:0.5em;">Diastole</div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <!-- Tab Apgar-->
                            <div id="data-apgar" style="padding: 20px; border-top: 2px solid;">
                                <style>
                                    table.apgar tbody tr td {
                                        padding: 0.3em;
                                        text-align: center;
                                        padding-bottom: 0.5em;
                                    }

                                    table.apgar tbody tr td.apgar-caption {
                                        padding: 0;
                                        text-align: left;
                                        transform:
                                            rotate(20deg) translate(20px, 0px);
                                    }
                                </style>
                                <div style="text-align:center;padding:1em;">APGAR Score</div>
                                <table align="center" class="apgar">
                                    <tbody>
                                        <tr>
                                            <td style="line-height:28px;font-size:0.8em;">1 menit</td>
                                            <td>
                                                <input class="form-control-sm" name="jkn_apgar_1_appearance" value="" id="jkn_apgar_1_appearance" type="text" style="width:30px;text-align:center;">
                                            </td>
                                            <td>
                                                <input class="form-control-sm" name="jkn_apgar_1_pulse" value="" id="jkn_apgar_1_pulse" type="text" style="width:30px;text-align:center;">
                                            </td>
                                            <td>
                                                <input class="form-control-sm" name="jkn_apgar_1_grimace" value="" id="jkn_apgar_1_grimace" type="text" style="width:30px;text-align:center;">
                                            </td>
                                            <td>
                                                <input class="form-control-sm" name="jkn_apgar_1_activity" value="" id="jkn_apgar_1_activity" type="text" style="width:30px;text-align:center;">
                                            </td>
                                            <td>
                                                <input class="form-control-sm" name="jkn_apgar_1_respiration" value="" id="jkn_apgar_1_respiration" type="text" style="width:30px;text-align:center;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="line-height:28px;font-size:0.8em;">5 menit</td>
                                            <td>
                                                <input class="form-control-sm" name="jkn_apgar_5_appearance" value="" id="jkn_apgar_5_appearance" type="text" style="width:30px;text-align:center;">
                                            </td>
                                            <td>
                                                <input class="form-control-sm" name="jkn_apgar_5_pulse" value="" id="jkn_apgar_5_pulse" type="text" style="width:30px;text-align:center;">
                                            </td>
                                            <td>
                                                <input class="form-control-sm" name="jkn_apgar_5_grimace" value="" id="jkn_apgar_5_grimace" type="text" style="width:30px;text-align:center;">
                                            </td>
                                            <td>
                                                <input class="form-control-sm" name="jkn_apgar_5_activity" value="" id="jkn_apgar_5_activity" type="text" style="width:30px;text-align:center;">
                                            </td>
                                            <td>
                                                <input class="form-control-sm" name="jkn_apgar_5_respiration" value="" id="jkn_apgar_5_respiration" type="text" style="width:30px;text-align:center;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="apgar-caption"></td>
                                            <td class="apgar-caption">appear.</td>
                                            <td class="apgar-caption">pulse</td>
                                            <td class="apgar-caption">grimace</td>
                                            <td class="apgar-caption">activity</td>
                                            <td class="apgar-caption">resp.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Tab kelahiran-->
                            <div id="data-kelahiran">
                                <br>
                                <br>
                                <table class="xxlist" style="table-layout:fixed;width:100%;border:0;">
                                    <tbody>
                                        <tr class="jkn_persalinan" style="border-top: solid 1px #aaa;">
                                            <td style="text-align:center;padding:2em; border-top: solid 1px #aaa; border-bottom: solid 1px #aaa;" colspan="2">
                                                <div class="frm_title">Usia Kehamilan (minggu):</div>
                                                <div style="display:flex;justify-content:center;gap:10px;">
                                                    <div>
                                                        <input class="form-control-sm" name="jkn_usia_kehamilan" value="0" id="jkn_usia_kehamilan" type="text" style="width:60px;text-align:center;">
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="text-align:center;padding:2em; border: solid 1px #aaa;" colspan="2">
                                                <div class="frm_title">Riwayat Kehamilan Sebelumnya:</div>
                                                <div style="display:flex;justify-content:center;gap:10px;">
                                                    <div>
                                                        <input class="form-control-sm" name="jkn_gravida" value="0" id="jkn_gravida" type="text" style="width:60px;text-align:center;">
                                                        <div style="font-size:0.8em;margin-top:0.5em;">Gravida</div>
                                                    </div>
                                                    <div>
                                                        <input class="form-control-sm" name="jkn_partus" value="0" id="jkn_partus" type="text" style="width:60px;text-align:center;">
                                                        <div style="font-size:0.8em;margin-top:0.5em;">Partus</div>
                                                    </div>
                                                    <div>
                                                        <input class="form-control-sm" name="jkn_abortus" value="0" id="jkn_abortus" type="text" style="width:60px;text-align:center;">
                                                        <div style="font-size:0.8em;margin-top:0.5em;">Abortus</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="text-align:left;padding:2em; border-top: solid 1px #aaa; border-bottom: solid 1px #aaa;" colspan="2">
                                                <div class="frm_title" style="border-bottom: 1px #aaa; padding: 5px; display: flex; justify-content: center;">Onset Kontraksi:</div>
                                                <div style="display:flex;display:flex;align-items: center;justify-content: center;">
                                                    <div>
                                                        <div class="d-flex align-items-center">
                                                            <input checked="checked" type="radio" id="jkn_ck_spontan" value="spontan" name="jkn_onset_kontraksi">&nbsp;
                                                            <label for="jkn_ck_spontan" class="xlnk">Timbul Spontan</label>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <input type="radio" id="jkn_ck_induksi" value="induksi" name="jkn_onset_kontraksi">&nbsp;
                                                            <label for="jkn_ck_induksi" class="xlnk">Dengan Induksi</label>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <input type="radio" id="jkn_ck_non_spontan_non_induksi" value="non_spontan_non_induksi" name="jkn_onset_kontraksi">&nbsp;
                                                            <label for="jkn_ck_non_spontan_non_induksi" class="xlnk">SC Tanpa Kontraksi/Induksi</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <br><br>
                                <div class="frm_title" style="border-bottom: 1px #aaa; padding: 5px; display: flex; justify-content: center;">Kelahiran:</div>
                                <div style="display: flex;justify-content: center;">
                                    <table id="table-kelahiran-eklaim" class="xxlist table table-hover table-striped table-sm color-table primary-table" style="border:0;border-bottom:1px solid #bbbbbb; width:75%;">
                                        <colgroup>
                                            <col width="60">
                                            <col>
                                            <col>
                                            <col>
                                            <col>
                                            <col width="200">
                                            <col>
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <td style="text-align:center; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa; border-top: solid 1px #aaa;">Urutan</td>
                                                <td style="text-align:center; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa; border-top: solid 1px #aaa;">Waktu Kelahiran</td>
                                                <td style="text-align:center; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa; border-top: solid 1px #aaa;">Cara Kelahiran</td>
                                                <td style="text-align:center; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa; border-top: solid 1px #aaa;">Letak/Presentasi</td>
                                                <td style="text-align:center; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa; border-top: solid 1px #aaa;">Kondisi</td>
                                                <td style="text-align:center; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa; border-top: solid 1px #aaa;">Spesimen SHK</td>
                                                <td style="border-left:0; border-bottom: solid 1px #aaa; border-top: solid 1px #aaa;"></td>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                                <div style="display:flex;justify-content:center;gap:10px;margin-top:0.1em;margin-bottom:1em;">
                                    <input type="button" value="Tambah Kelahiran" onclick="jkn_delivery_add();">
                                </div>
                            </div>

                            <!-- Tab Data Jampersal-->
                            <!-- <div id="data-jampersal" style="padding: 20px; border-top: 2px solid; display:none;">
							<div style="border-bottom: 1px #aaa; padding: 5px; display: flex; justify-content: center;">
								<h5>Form Data Jampersal</h5>
							</div>

							<table class="xxlist" style="table-layout:fixed;width:100%;border:0;">
								<tbody>
									<tr class="jampersal-data" style="display:none; border-top: solid 1px #aaa;">
										<td style="text-align:center;padding:2em;" colspan="2">
											<div class="frm_title">Nomor Rujukan:</div>
											<div style="display:flex;justify-content:center;gap:10px;">
												<input class="form-control-sm" type="text" name="nomor_rujukan" value="" style="width:150px;text-align:center;">
											</div>
										</td>
										<td style="text-align:center;padding:2em;" colspan="2">
											<div class="frm_title">Faskes Perujuk:</div>
											<div style="display:flex;justify-content:center;gap:10px;">
												<input class="form-control-sm" type="text" name="kode_perujuk" value="" style="width:150px;text-align:center;">
											</div>
										</td>
										<td style="text-align:center;padding:2em;" colspan="2">
											<div class="frm_title">Cara Masuk:</div>
											<div style="display:flex;justify-content:center;gap:10px;">
												<div>
													<input checked="checked" type="radio" id="ck_cara_masuk_rujukan_fktp" value="rujukan_fktp" name="cara_masuk">
													&nbsp;<label for="ck_cara_masuk_rujukan_fktp" class="xlnk">Rujukan FKTP</label>
												</div>
												<div>
													<input type="radio" id="ck_cara_masuk_rujukan_fkrtl" value="rujukan_fkrtl" name="cara_masuk">
													&nbsp;<label for="ck_cara_masuk_rujukan_fkrtl" class="xlnk">Rujukan FKRTL</label>
												</div>
												<div>
													<input type="radio" id="ck_cara_masuk_emergensi" value="emergensi" name="cara_masuk">
													&nbsp;<label for="ck_cara_masuk_emergensi" class="xlnk">Emergensi</label>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td style="text-align:center;padding:2em; border-top: solid 1px #aaa; border-bottom: solid 1px #aaa;" colspan="2">
											<div class="frm_title">Usia Kehamilan (minggu):</div>
											<div style="display:flex;justify-content:center;gap:10px;">
												<div>
													<input class="form-control-sm" name="usia_kehamilan" value="" id="usia_kehamilan" type="text" style="width:60px;text-align:center;">
												</div>
											</div>
										</td>
										<td style="text-align:center;padding:2em; border: solid 1px #aaa;" colspan="2">
											<div class="frm_title">Tekanan Darah (mmHg):</div>
											<div style="display:flex;justify-content:center;gap:10px;">
												<div>
													<input class="form-control-sm" name="sistole" value="0" id="sistole" type="text" style="width:60px;text-align:center;">
													<div style="font-size:0.8em;margin-top:0.5em;">Sistole</div>
												</div>
												<div>
													<input class="form-control-sm" name="diastole" value="0" id="diastole" type="text" style="width:60px;text-align:center;">
													<div style="font-size:0.8em;margin-top:0.5em;">Diastole</div>
												</div>
											</div>
										</td>
										<td style="text-align:center;padding:2em; border-top: solid 1px #aaa; border-bottom: solid 1px #aaa;" colspan="2">
											<div class="frm_title">Riwayat Kehamilan Sebelumnya:</div>
											<div style="display:flex;justify-content:center;gap:10px;">
												<div>
													<input class="form-control-sm" name="gravida" value="0" id="gravida" type="text" style="width:60px;text-align:center;">
													<div style="font-size:0.8em;margin-top:0.5em;">Gravida</div>
												</div>
												<div>
													<input class="form-control-sm" name="partus" value="0" id="partus" type="text" style="width:60px;text-align:center;">
													<div style="font-size:0.8em;margin-top:0.5em;">Partus</div>
												</div>
												<div>
													<input class="form-control-sm" name="abortus" value="0" id="abortus" type="text" style="width:60px;text-align:center;">
													<div style="font-size:0.8em;margin-top:0.5em;">Abortus</div>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td style="text-align:left;padding:2em; border-top: solid 1px #aaa; border-bottom: solid 1px #aaa;" colspan="2">
											<div class="frm_title" style="border-bottom: 1px #aaa; padding: 5px; display: flex; justify-content: center;">Onset Kontraksi:</div>
											<div style="display:flex;display:flex;align-items: center;justify-content: center;">
												<div>
													<div>
														<input checked="checked" type="radio" id="ck_spontan" value="spontan" name="onset_kontraksi">
														&nbsp;<label for="ck_spontan" class="xlnk">Timbul Spontan</label>
													</div>
													<div>
														<input type="radio" id="ck_induksi" value="induksi" name="onset_kontraksi">
														&nbsp;<label for="ck_induksi" class="xlnk">Dengan Induksi</label>
													</div>
													<div>
														<input type="radio" id="ck_non_spontan_non_induksi" value="non_spontan_non_induksi" name="onset_kontraksi">
														&nbsp;<label for="ck_non_spontan_non_induksi" class="xlnk">SC Tanpa Kontraksi/Induksi</label>
													</div>
												</div>
											</div>
										</td>
										<td style="text-align:center;padding:2em; border: solid 1px #aaa;" colspan="2">
											<div class="frm_title">Riwayat SC Sebelumnya:</div>
											<div style="display:flex;justify-content:center;gap:10px;">
												<div>
													<input class="form-control-sm" name="riwayat_sc" value="0" id="riwayat_sc" type="text" style="width:60px;text-align:center;">
													<div style="font-size:0.8em;margin-top:0.5em;">Jumlah SC</div>
												</div>
											</div>
										</td>
										<td style="text-align:center;padding:2em; border-top: solid 1px #aaa; border-bottom: solid 1px #aaa;" colspan="2">
											<div class="frm_title">Kuretase:</div>
											<div style="display:flex;justify-content:center;gap:10px;">
												<div><input checked="checked" type="radio" id="ck_kuretase_no" value="0" name="kuretase">&nbsp;<label for="ck_kuretase_no" class="xlnk">Tidak</label></div>
												<div><input type="radio" id="ck_kuretase_yes" value="1" name="kuretase">&nbsp;<label for="ck_kuretase_yes" class="xlnk">Ya</label></div>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="6" style="padding:2em;">
											<div class="frm_title" style="border-bottom: 1px #aaa; padding: 5px; display: flex; justify-content: center;">Kelahiran:</div>
											<div id="persalinan_container">
												<style>
													/* .tr_kelahiran {} */

													.tr_kelahiran:hover td {
														background-color: #f0faff;
													}

													.delete_kelahiran {
														opacity: 0;
														transition: opacity 0.5s ease;
														cursor: pointer;
														height: 28px;
													}

													.klaim_bayi_link {
														opacity: 0;
														transition: opacity 0.5s ease;
														cursor: pointer;
													}

													.tr_kelahiran:hover .delete_kelahiran {
														opacity: 0.5;
													}

													.tr_kelahiran:hover .delete_kelahiran:hover {
														opacity: 1;
													}

													.tr_kelahiran:hover .klaim_bayi_link {
														opacity: 0.5;
													}

													.tr_kelahiran:hover .klaim_bayi_link:hover {
														opacity: 1;
													}

													.klaim_bayi_link.klaim {
														opacity: 1;
													}

													table.apgar tbody tr td {
														padding: 0.3em;
														text-align: center;
														padding-bottom: 0.5em;
													}

													table.apgar tbody tr td.apgar-caption {
														padding: 0;
														text-align: left;
														transform: rotate(20deg) translate(20px, 0px);
													}

													.klaim_bayi_link {
														display: none;
													}
												</style>
												<div style="display:flex;justify-content:center;gap:10px;">
													<div>
														<table class="xxlist" style="border:0;border-bottom:1px solid #bbbbbb;">
															<colgroup>
																<col width="60">
																<col>
																<col>
																<col>
																<col>
																<col>
																<col>
																<col>
															</colgroup>
															<tbody>
																<tr>
																	<td style="text-align:center;">Urutan</td>
																	<td style="text-align:center;">Waktu Kelahiran</td>
																	<td style="text-align:center;">Cara Kelahiran</td>
																	<td style="text-align:center;">Letak/Presentasi</td>
																	<td style="text-align:center;">Kondisi</td>
																	<td style="text-align:center;">Berat Lahir</td>
																	<td style="text-align:center;">APGAR Score</td>
																	<td style="border-left:0;"></td>
																</tr>
																<tr class="tr_kelahiran">
																	<td style="text-align:center;vertical-align:top;">1</td>
																	<td style="text-align:center;vertical-align:top;"><span class="xlnk" id="sp_delivery_dttm_1" onclick="_changedatetime('sp_delivery_dttm_1','delivery_dttm_1','datetime',false,false);">22
																			Jan 2025 10:05</span><input type="hidden" id="delivery_dttm_1" name="delivery_dttm_1" value="2025-01-22 10:05:04"></td>
																	<td style="text-align:left;vertical-align:top;"><input checked="checked" type="radio" onchange="chg_delivery_method('1',this,event);" id="ck_pt_vaginal_1" value="vaginal" name="delivery_method_1">&nbsp;<label for="ck_pt_vaginal_1" class="xlnk">Vaginal</label><br><input type="radio" onchange="chg_delivery_method('1',this,event);" id="ck_pt_sc_1" value="sc" name="delivery_method_1">&nbsp;<label for="ck_pt_sc_1" class="xlnk">Sectio
																			Caesarean</label><br><br>
																		<div id="vaginal_option_1" style="display:block;"><input type="checkbox" id="ckb_manual_1" value="1" name="use_manual_1">&nbsp;<label for="ckb_manual_1" class="xlnk">Manual
																				Aid</label><br><input type="checkbox" id="ckb_forcep_1" value="1" name="use_forcep_1">&nbsp;<label for="ckb_forcep_1" class="xlnk">Forcep</label><br><input type="checkbox" id="ckb_vacuum_1" value="1" name="use_vacuum_1">&nbsp;<label for="ckb_vacuum_1" class="xlnk">Vacuum</label></div>
																	</td>
																	<td style="text-align:left;vertical-align:top;"><input checked="checked" type="radio" id="ck_pt_kepala_1" value="kepala" name="letak_1">&nbsp;<label for="ck_pt_kepala_1" class="xlnk">Kepala</label><br><input type="radio" id="ck_pt_sungsang_1" value="sungsang" name="letak_1">&nbsp;<label for="ck_pt_sungsang_1" class="xlnk">Sungsang</label><br><input type="radio" id="ck_pt_lintang_1" value="lintang" name="letak_1">&nbsp;<label for="ck_pt_lintang_1" class="xlnk">Lintang/Oblique</label></td>
																	<td style="text-align:left;vertical-align:top;"><input checked="checked" type="radio" id="ck_pt_livebirth_1" value="livebirth" name="kondisi_1">&nbsp;<label for="ck_pt_livebirth_1" class="xlnk">Hidup</label><br><input type="radio" id="ck_pt_stillbirth_1" value="stillbirth" name="kondisi_1">&nbsp;<label for="ck_pt_stillbirth_1" class="xlnk">Meninggal</label></td>
																	<td style="vertical-align:top;"><input type="text" style="width:50px;text-align:right;" value="0" class="form-control-sm" name="berat_lahir_1"> <span class="discreet">gram</span></td>
																	<td style="text-align:center;padding:0.5em;vertical-align:top;padding-bottom:1em;">
																		<table align="center" class="apgar">
																			<tbody>
																				<tr>
																					<td style="line-height:28px;font-size:0.8em;">1 menit</td>
																					<td><input class="form-control-sm" name="jkn_apgar_1_appearance" value="" id="jkn_apgar_1_appearance" type="text" style="width:30px;text-align:center;"></td>
																					<td><input class="form-control-sm" name="jkn_apgar_1_pulse" value="" id="jkn_apgar_1_pulse" type="text" style="width:30px;text-align:center;"></td>
																					<td><input class="form-control-sm" name="jkn_apgar_1_grimace" value="" id="jkn_apgar_1_grimace" type="text" style="width:30px;text-align:center;"></td>
																					<td><input class="form-control-sm" name="jkn_apgar_1_activity" value="" id="jkn_apgar_1_activity" type="text" style="width:30px;text-align:center;"></td>
																					<td><input class="form-control-sm" name="jkn_apgar_1_respiration" value="" id="jkn_apgar_1_respiration" type="text" style="width:30px;text-align:center;"></td>
																				</tr>
																				<tr>
																					<td style="line-height:28px;font-size:0.8em;">5 menit</td>
																					<td><input class="form-control-sm" name="jkn_apgar_5_appearance" value="" id="jkn_apgar_5_appearance" type="text" style="width:30px;text-align:center;"></td>
																					<td><input class="form-control-sm" name="jkn_apgar_5_pulse" value="" id="jkn_apgar_5_pulse" type="text" style="width:30px;text-align:center;"></td>
																					<td><input class="form-control-sm" name="jkn_apgar_5_grimace" value="" id="jkn_apgar_5_grimace" type="text" style="width:30px;text-align:center;"></td>
																					<td><input class="form-control-sm" name="jkn_apgar_5_activity" value="" id="jkn_apgar_5_activity" type="text" style="width:30px;text-align:center;"></td>
																					<td><input class="form-control-sm" name="jkn_apgar_5_respiration" value="" id="jkn_apgar_5_respiration" type="text" style="width:30px;text-align:center;"></td>
																				</tr>
																				<tr>
																					<td class="apgar-caption"></td>
																					<td class="apgar-caption">appear.</td>
																					<td class="apgar-caption">pulse</td>
																					<td class="apgar-caption">grimace</td>
																					<td class="apgar-caption">activity</td>
																					<td class="apgar-caption">resp.</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																	<td style="border-left:0;text-align:center;">
																		<i class="fas fa-trash-alt delete_kelahiran" onclick="delivery_delete('1',this,event);"></i>
																		<div style="margin-top:2em;" class="klaim_bayi_link">[ <span onclick="edit_klaim_bayi('1',this,event);" class="xlnk">Klaim</span> ]</div>
																	</td>
																</tr>
																<tr class="tr_kelahiran">
																	<td style="text-align:center;vertical-align:top;">2</td>
																	<td style="text-align:center;vertical-align:top;"><span class="xlnk" id="sp_delivery_dttm_2" onclick="_changedatetime('sp_delivery_dttm_2','delivery_dttm_2','datetime',false,false);">22
																			Jan 2025 10:05</span><input type="hidden" id="delivery_dttm_2" name="delivery_dttm_2" value="2025-01-22 10:05:07"></td>
																	<td style="text-align:left;vertical-align:top;"><input checked="checked" type="radio" onchange="chg_delivery_method('2',this,event);" id="ck_pt_vaginal_2" value="vaginal" name="delivery_method_2">&nbsp;<label for="ck_pt_vaginal_2" class="xlnk">Vaginal</label><br><input type="radio" onchange="chg_delivery_method('2',this,event);" id="ck_pt_sc_2" value="sc" name="delivery_method_2">&nbsp;<label for="ck_pt_sc_2" class="xlnk">Sectio
																			Caesarean</label><br><br>
																		<div id="vaginal_option_2" style="display:block;"><input type="checkbox" id="ckb_manual_2" value="1" name="use_manual_2">&nbsp;<label for="ckb_manual_2" class="xlnk">Manual
																				Aid</label><br><input type="checkbox" id="ckb_forcep_2" value="1" name="use_forcep_2">&nbsp;<label for="ckb_forcep_2" class="xlnk">Forcep</label><br><input type="checkbox" id="ckb_vacuum_2" value="1" name="use_vacuum_2">&nbsp;<label for="ckb_vacuum_2" class="xlnk">Vacuum</label></div>
																	</td>
																	<td style="text-align:left;vertical-align:top;"><input checked="checked" type="radio" id="ck_pt_kepala_2" value="kepala" name="letak_2">&nbsp;<label for="ck_pt_kepala_2" class="xlnk">Kepala</label><br><input type="radio" id="ck_pt_sungsang_2" value="sungsang" name="letak_2">&nbsp;<label for="ck_pt_sungsang_2" class="xlnk">Sungsang</label><br><input type="radio" id="ck_pt_lintang_2" value="lintang" name="letak_2">&nbsp;<label for="ck_pt_lintang_2" class="xlnk">Lintang/Oblique</label></td>
																	<td style="text-align:left;vertical-align:top;"><input checked="checked" type="radio" id="ck_pt_livebirth_2" value="livebirth" name="kondisi_2">&nbsp;<label for="ck_pt_livebirth_2" class="xlnk">Hidup</label><br><input type="radio" id="ck_pt_stillbirth_2" value="stillbirth" name="kondisi_2">&nbsp;<label for="ck_pt_stillbirth_2" class="xlnk">Meninggal</label></td>
																	<td style="vertical-align:top;"><input type="text" style="width:50px;text-align:right;" value="0" class="form-control-sm" name="berat_lahir_2"> <span class="discreet">gram</span></td>
																	<td style="text-align:center;padding:0.5em;vertical-align:top;padding-bottom:1em;">
																		<table align="center" class="apgar">
																			<tbody>
																				<tr>
																					<td style="line-height:28px;font-size:0.8em;">1 menit</td>
																					<td><input class="form-control-sm" name="jkn_apgar_1_appearance" value="" id="jkn_apgar_1_appearance" type="text" style="width:30px;text-align:center;"></td>
																					<td><input class="form-control-sm" name="jkn_apgar_1_pulse" value="" id="jkn_apgar_1_pulse" type="text" style="width:30px;text-align:center;"></td>
																					<td><input class="form-control-sm" name="jkn_apgar_1_grimace" value="" id="jkn_apgar_1_grimace" type="text" style="width:30px;text-align:center;"></td>
																					<td><input class="form-control-sm" name="jkn_apgar_1_activity" value="" id="jkn_apgar_1_activity" type="text" style="width:30px;text-align:center;"></td>
																					<td><input class="form-control-sm" name="jkn_apgar_1_respiration" value="" id="jkn_apgar_1_respiration" type="text" style="width:30px;text-align:center;"></td>
																				</tr>
																				<tr>
																					<td style="line-height:28px;font-size:0.8em;">5 menit</td>
																					<td><input class="form-control-sm" name="jkn_apgar_5_appearance" value="" id="jkn_apgar_5_appearance" type="text" style="width:30px;text-align:center;"></td>
																					<td><input class="form-control-sm" name="jkn_apgar_5_pulse" value="" id="jkn_apgar_5_pulse" type="text" style="width:30px;text-align:center;"></td>
																					<td><input class="form-control-sm" name="jkn_apgar_5_grimace" value="" id="jkn_apgar_5_grimace" type="text" style="width:30px;text-align:center;"></td>
																					<td><input class="form-control-sm" name="jkn_apgar_5_activity" value="" id="jkn_apgar_5_activity" type="text" style="width:30px;text-align:center;"></td>
																					<td><input class="form-control-sm" name="jkn_apgar_5_respiration" value="" id="jkn_apgar_5_respiration" type="text" style="width:30px;text-align:center;"></td>
																				</tr>
																				<tr>
																					<td class="apgar-caption"></td>
																					<td class="apgar-caption">appear.</td>
																					<td class="apgar-caption">pulse</td>
																					<td class="apgar-caption">grimace</td>
																					<td class="apgar-caption">activity</td>
																					<td class="apgar-caption">resp.</td>
																				</tr>
																			</tbody>
																		</table>
																	</td>
																	<td style="border-left:0;text-align:center;">
																		<i class="fas fa-trash-alt delete_kelahiran" onclick="delivery_delete('2',this,event);"></i>
																		<div style="margin-top:2em;" class="klaim_bayi_link">[ <span onclick="edit_klaim_bayi('2',this,event);" class="xlnk">Klaim</span> ]</div>
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
											<div style="display:flex;justify-content:center;gap:10px;margin-top:2em;margin-bottom:1em;"><input type="button" value="Tambah Kelahiran" onclick="delivery_add();"></div>
										</td>
									</tr>
									<tr class="jampersal-data" style="display:none;">
										<td colspan="3" style="padding:2em;">
											<div class="frm_title">Anamnesa:</div>
											<div style="display:flex;justify-content:center;gap:10px;margin-top:1em;margin-bottom:1em;"><textarea style="width:100%;max-width:600px;font-family:courier;" name="anamnesa" placeholder="Anamnesa (naratif)"></textarea></div>
										</td>
										<td colspan="3" style="padding:2em;">
											<div class="frm_title">Indikasi Rawat Inap:</div>
											<div style="display:flex;justify-content:center;gap:10px;margin-top:1em;margin-bottom:1em;"><textarea style="width:100%;max-width:600px;font-family:courier;" name="indikasi_ranap" placeholder="Indikasi rawat inap (naratif)"></textarea></div>
										</td>
									</tr>
									<tr class="jampersal-data" style="display:none;">
										<td colspan="3" style="padding:2em;">
											<div class="frm_title">Diagnosa Primer:</div>
											<div style="display:flex;justify-content:center;gap:10px;margin-top:1em;margin-bottom:1em;"><textarea style="width:100%;max-width:600px;font-family:courier;" name="diagnosa_primer" placeholder="Diagnosa primer (naratif)"></textarea></div>
										</td>
										<td colspan="3" style="padding:2em;">
											<div class="frm_title">Diagnosa Sekunder:</div>
											<div style="display:flex;justify-content:center;gap:10px;margin-top:1em;margin-bottom:1em;"><textarea style="width:100%;max-width:600px;font-family:courier;" name="diagnosa_sekunder" placeholder="Diagnosa sekunder (naratif)"></textarea></div>
										</td>
									</tr>
									<tr class="jampersal-data" style="display:none;">
										<td colspan="3" style="padding:2em;vertical-align:top;">
											<div class="frm_title">Prosedur:</div>
											<div style="display:flex;justify-content:center;gap:10px;margin-top:1em;margin-bottom:1em;"><textarea style="width:100%;max-width:600px;font-family:courier;" name="prosedur" placeholder="Prosedur (naratif)"></textarea></div>
										</td>
										<td colspan="3" style="padding:2em;vertical-align:top;">
											<div class="frm_title">Operasi:</div>
											<div style="display:flex;justify-content:center;gap:10px;margin-top:1em;margin-bottom:1em;"><input type="text" style="width:100%;max-width:600px;font-family:courier;" name="nama_operasi" placeholder="Nama Operasi" value=""></div>
											<div style="display:flex;justify-content:center;gap:10px;margin-top:1em;margin-bottom:1em;"><textarea style="width:100%;max-width:600px;font-family:courier;" name="laporan_operasi" placeholder="Laporan Operasi"></textarea></div>
										</td>
									</tr>
									<tr>
										<td colspan="6">&nbsp;</td>
									</tr>
								</tbody>
							</table>
						</div> -->

                            <div id="btn-after-grouper"></div>
                            <div style="text-align:left; margin:20px;" id="grouper_result"></div>

                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
                <div class="row col-md m-0" style="background-color:#cccccc;">
                    <div class="modal-footer col-lg-4 d-flex justify-content-start" id="left-button-footer"></div>
                    <div class="modal-footer col-lg-8 d-flex justify-content-end" id="right-button-footer"></div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table-line-gray {
            width: 50%;
            border: 1px solid #ccc;
        }

        .table-line-gray td {
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>
    <div id="modal-konfirmasi-validasi-sitb" class="modal fade" role="dialog" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" style="max-width:35%">
            <div class="modal-content">
                <div class="modal-header" style="background-color: black; color: white;">
                    <h4 class="modal-title"></i>Konfirmasi Validasi Register SITB</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <table class="table-line-gray" style="width:90%;">
                            <colgroup>
                                <col width="120">
                                <col>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td style="border-left: 0px;">Nama</td>
                                    <td style="border-right: 0px;"><label id="nama-val-sitb"></label></td>
                                </tr>
                                <tr>
                                    <td style="border-left: 0px;">NIK</td>
                                    <td style="border-right: 0px;"><label id="nik-val-sitb"></label></td>
                                </tr>
                                <tr>
                                    <td style="border-left: 0px;">Jenis Kelamin</td>
                                    <td style="border-right: 0px;"><label id="jk-val-sitb"></label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row col-md m-0" style="background-color:#cccccc;">
                    <div class="modal-footer col-lg p-10 d-flex justify-content-center">
                        <button data-dismiss="modal" type="button" class="btn btn-secondary waves-effect" onclick="konfirmValidasiYa()"></i>Ya (Benar)</button>
                        <button data-dismiss="modal" type="button" class="btn btn-danger waves-effect" onclick="invalidate_jkn_sitb_noreg()"></i>Tidak (Batal)</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('modal_grouping/js_eklaim') ?>
<?php $this->load->view('coding-grouping/js_eklaim_auto') ?>