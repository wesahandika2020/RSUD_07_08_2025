<html>
<title><?= "Resum Medis Pasien" ?></title>
<link rel="icon" type="image/png" href="<?= base_url('resources/images/favicons/favicon-32x32.png') ?>" sizes="32x32">
<link rel="icon" type="image/png" href="<?= base_url('resources/images/favicons/favicon-16x16.png') ?>" sizes="16x16">

<head>
    <style>
        @page {
            margin: 0cm 0cm;
        }

        body {
            margin-top: 3.5cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2.6cm;
            vertical-align: top;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
            color: white;
            padding: 10px 10px 0px 30px;
            line-height: 0.5cm;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            line-height: 0.4cm;
            color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .footer-bg {
            position: absolute;
            top: 45px;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .footer-content {
            /* position: relative; */
            /* z-index: 0; */
            width: 100%;
            padding: 0px 10px;
            color: #000;
        }

        .watermark {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.15;
            z-index: -1;
        }

        .pagenum:before {
            content: counter(page);
        }

        .main {
            font-size: 10pt;
            text-align: justify;
        }

        .bold {
            font-weight: bold;
        }

        .bg-tab {
            background-color: #e0e0e0;
        }

        .table-space td {
            padding: 3px;
            vertical-align: top;
        }

        .table-border td {
            padding: 3px;
            border: 1px solid #000;
        }

        .td-top>tbody>tr>td {
            vertical-align: top;
        }

        .inverted-image {
            filter: invert(10) brightness(0.8);
        }
    </style>
</head>

<?php

function timeExplode($time = NULL)
{
    if ($time != NULL) {
        $time1 = explode(":", $time);
        $time2 = $time1[0] . ':' . $time1[1];
        return $time2;
    } else {
        return '-';
    }
}

function tanggal_indonesia($tanggal)
{
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $pecahkan = explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}

function group_by($key, $data)
{
    $result = array();

    foreach ($data as $val) {
        if (array_key_exists($key, $val)) {
            $result[$val[$key]][] = $val;
        } else {
            $result[""][] = $val;
        }
    }

    return $result;
}

function replaceEnter($text)
{
    $text_rpl = trim($text, "~");
    $result = str_replace("~", "<br>", $text_rpl);
    return $result;
}

function cekUmurPasien($tanggal_lahir)
{
    $tgl1 = date_create($tanggal_lahir);
    $tgl2 = date_create(date('Y-m-d'));
    $sql = date_diff($tgl2, $tgl1);
    $hasil = $sql->format('%a');
    $hasil_sql = floor($hasil / 365);
    return $hasil_sql;
}
?>

<body onload="window.print()">
    <div class="watermark" style="padding-left: 100px;">
        <img src="<?= resource_url() . 'images/logos/rsud-bg-mcu.jpg' ?>" width="130%" alt="Watermark">
    </div>

    <header style="font-family: Arial, sans-serif;">
        <table width="98%" style="color:#000; border-bottom: 2px solid #000;">
            <thead>
                <tr>
                    <td rowspan="3" style="width:80px"><img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" width="70px" height="70px"></td>
                    <td colspan="3" align="center"><b style="font-weight:bold; font-size: 16pt;">RSUD KOTA TANGERANG</b></td>
                    <td rowspan="3" style="width:80px"><img src="<?= resource_url() . 'images/logos/logo-nars-rsud.png' ?>" width="70px" height="70px"></td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><b style="font-weight:bold; font-size: 11pt;">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah Kecamatan Tangerang</td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><b style="font-weight:bold; font-size: 10pt;">Telp. 021 2972 0201 FAX. 021 2972 0202 </b></td>
                </tr>
            </thead>
        </table>
    </header>

    <footer>
        <div class="footer-bg">
            <img src="<?= resource_url() . 'images/logos/6_generated.jpg' ?>" style="width:100%; height:200%;" />
        </div>
        <div class="footer-content">
            <table width="100%">
                <tr>
                    <td style="vertical-align: top; text-align: right; font-size:10pt;"><b>FORM-MCU-21-00</b></td>
                </tr>
                <tr>
                    <td style="vertical-align: top; text-align: left; font-size:9pt;" >
                        Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat elektronik yang telah diterbitkan oleh Balai Besar Sertifikasi Elektronik (BSrE), Badan Siber dan Sandi Negara
                    </td>
                </tr>
            </table>
        </div>
    </footer>

    <main style="page-break-after: auto;">
        <br>
        <table style="font-size: 10pt;" width="100%" class="table-space">
            <tr>
                <td>No. Rekam Medis</td>
                <td>:</td>
                <td><?= $data_form->no_rm; ?></td>
                <td>Status</td>
                <td>:</td>
                <td><?= $data_form->status_kawin; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $data_form->nama_pasien; ?></td>
                <td>Pekerjaan</td>
                <td>:</td>
                <td><?= $data_form->nama_pekerjaan; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $data_form->jenis_kelamin; ?></td>
                <td>Unit Kerja</td>
                <td>:</td>
                <td><?= $data_form->mcu_unit_kerja; ?></td>
            </tr>
            <tr>
                <td>Tempat/Tgl. Lahir</td>
                <td>:</td>
                <td><?= $data_form->tempat_lahir; ?> <?= datefmysql($data_form->tanggal_lahir); ?></td>
                <td>Tgl Pemeriksaan</td>
                <td>:</td>
                <td><?= $data_form->tanggal_daftar; ?></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td><?= $data_form->agama; ?> </td>
                <td>Keperluan</td>
                <td>:</td>
                <td><?= $data_form->keperluan; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td colspan="6"><?= $data_form->alamat_pasien; ?> </td>
            </tr>
            <tr>                
                <td width="19%">&nbsp;</td>
                <td width="1%">&nbsp;</td>
                <td width="30%">&nbsp;</td>
                <td width="19%">&nbsp;</td>
                <td width="1%">&nbsp;</td>
                <td width="30%">&nbsp;</td>
            </tr>
        </table>


        <table style="font-size: 10pt;" width="100%" class="table-space">
            <thead>
                <tr>
                    <th colspan="4" style="border: 1px solid #000">
                        <b style="font-size: 18pt;">HASIL RESUME MEDICAL CHECK UP</b>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><b>A.</b></td>
                    <td colspan="3"><b>ANAMNESA</b></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>1.Keluhan Saat Ini</td>
                    <td>:</td>
                    <td><?= $data_form->keluhan_utama; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>2. RPD (Riwayat Penyakit Terdahulu)</td>
                    <td>:</td>
                    <td><?= $data_form->riwayat_penyakit_dahulu; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>3. RPD (Riwayat Penyakit Keluarga)</td>
                    <td>:</td>
                    <td><?= $data_form->riwayat_penyakit_keluarga; ?></td>
                </tr>
                <tr>
                    <td><b>B.</b></td>
                    <td colspan="3"><b>PEMERIKSAAN FISIK</b></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Tinggi Badan</td>
                    <td>:</td>
                    <td><?= $data_form->tinggi_badan; ?> Cm</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Berat Badan</td>
                    <td>:</td>
                    <td><?= $data_form->berat_badan; ?> Kg</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>BMI</td>
                    <td>:</td>
                    <td>
                        <?php 
                            if ($data_form->berat_badan !== null && $data_form->tinggi_badan !== null) {
                                echo number_format($data_form->berat_badan / (($data_form->tinggi_badan / 100) ** 2), 4, '.', '');
                            }
                        ?>Kg/m²
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Tekanan Darah</td>
                    <td>:</td>
                    <td><?= $data_form->tensi_sistolik; ?>/<?= $data_form->tensi_diastolik; ?> mmhg</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Nadi</td>
                    <td>:</td>
                    <td><?= $data_form->nadi; ?> x/m</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Respirasi</td>
                    <td>:</td>
                    <td><?= $data_form->rr; ?> x/m</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Kepala</td>
                    <td>:</td>
                    <td><?= $data_form->kepala; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Kulit</td>
                    <td>:</td>
                    <td><?= $data_form->kulit_kelamin; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Mata</td>
                    <td>:</td>
                    <td><?= $data_form->mata; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Persepsi warna</td>
                    <td>:</td>
                    <td><?= $data_form->mcu_persepsi_warna; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Visus Jauh (Kacamata)</td>
                    <td>:</td>
                    <td>OD : <?= $data_form->mcu_jauh_od; ?> &nbsp;&nbsp; OS : <?= $data_form->mcu_jauh_os; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Visus Dekat</td>
                    <td>:</td>
                    <td>OD : <?= $data_form->mcu_dekat_od; ?> &nbsp;&nbsp; OS : <?= $data_form->mcu_dekat_os; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Konjungtiva</td>
                    <td>:</td>
                    <td><?= $data_form->mcu_konjungtiva; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Sklera</td>
                    <td>:</td>
                    <td><?= $data_form->mcu_sklera; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Komea</td>
                    <td>:</td>
                    <td><?= $data_form->mcu_komea; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Telinga</td>
                    <td>:</td>
                    <td><?= $data_form->telinga; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Hidung</td>
                    <td>:</td>
                    <td><?= $data_form->hidung; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Tenggorokan</td>
                    <td>:</td>
                    <td><?= $data_form->tenggorok; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Gigi dan Mulut</td>
                    <td>:</td>
                    <td><?= $data_form->mcu_gdm; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Leher</td>
                    <td>:</td>
                    <td><?= $data_form->leher; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Dada</td>
                    <td>:</td>
                    <td><?= $data_form->thorax; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Jantung</td>
                    <td>:</td>
                    <td><?= $data_form->mcu_jantung; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Paru-paru</td>
                    <td>:</td>
                    <td><?= $data_form->pulmo; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Abdomen</td>
                    <td>:</td>
                    <td><?= $data_form->abdomen; ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>Anggota Gerak</td>
                    <td>:</td>
                    <td><?= $data_form->ekstrimitas; ?></td>
                </tr>
                <tr>
                    <td><b>C.</b></td>
                    <td><b>PEMERIKSAAN PENUNJANG</b></td>
                    <td>:</td>
                    <td><?= $data_form->pemeriksaan_penunjang; ?></td>
                </tr>
                <tr>
                    <td><b>D.</b></td>
                    <td><b>Kesimpulan</b></td>
                    <td>:</td>
                    <td><?= $data_form->kritik; ?></td>
                </tr>
                <tr>
                    <td><b>E.</b></td>
                    <td><b>Saran</b></td>
                    <td>:</td>
                    <td><?= $data_form->saran; ?></td>
                </tr>
                <tr>
                    <td><b>F.</b></td>
                    <td><b>Status Kesehatan</b></td>
                    <td>:</td>
                    <td><?= $data_form->mcu_status_kesehatan; ?></td>
                </tr>
                <tr>
                    <td width="1%">&nbsp;</td>
                    <td width="39%">&nbsp;</td>
                    <td width="1%">&nbsp;</td>
                    <td width="59%">&nbsp;</td>
                </tr>
            </tbody>
        </table>
        
        <br>

        <table style="font-size: 10pt; border-collapse: collapse; page-break-inside: avoid;" width="100%">
            <tr align="left">
                <td width="55%"></td>
                <td width="20%">Dikeluarkan di</td>
                <td width="25%">: Kota Tangerang</td>
            </tr>
            <tr>
                <td></td>
                <td>Pada tanggal</td>
                <td>:
                    <?php
                        $tanggal_mysql = $data_form->mcu_tanggal_surat;
                        setlocale(LC_TIME, 'id_ID.utf8');
                        $tanggal = strftime("%d %B %Y", strtotime($tanggal_mysql));
                        $bulanInggris = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                        $bulanIndonesia = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        $tanggal = str_replace($bulanInggris, $bulanIndonesia, $tanggal);

                        echo $tanggal;

                        $text_barcode  = "RSUD KOTA TANGERANG\n\n";
                        $text_barcode .= "MENYATAKAN BAHWA :\n\n";
                        $text_barcode .= "Bentuk Surat : Hasil Resum Medical Check-Up\n";
                        $text_barcode .= "Tanggal Surat : " . $tanggal . "\n";
                        $text_barcode .= "Dokter : " . $data_form->nama_dokter . "\n";
                        $text_barcode .= "NIP : " . $data_form->nip_dokter. "\n\n";
                        $text_barcode .= "SURAT ADALAH BENAR TERTANDATANGANI SECARA ELEKTRONIK";
                    ?>
                </td>
            </tr>
            <tr style="font-size:8pt;">
                <td width="55%"></td>
                <td width="8%" align="center">
                    <div style="text-align:center;">
                        <?php if ($pasien->cekbarcode == 'esign'): ?>
                            <img width="100px" class="qrcode" src="<?php echo site_url('hasil_mcu_kirim_online/generate_qrcode_text/' . base64_encode($text_barcode)); ?>" alt="QRCode">
                        <?php endif; ?>
                    </div>
                </td>
                <td width="37%">
                    Ditandatangani secara elektronik oleh:<br>
                    Dokter Medical Check Up RSUD KOTA TANGERANG<br><br>
                    <b><?= $data_form->nama_dokter; ?></b><br>
                    NIP. <?= $data_form->nip_dokter; ?>
                </td>
            </tr>
        </table>       

    </main>

</body>

</html>