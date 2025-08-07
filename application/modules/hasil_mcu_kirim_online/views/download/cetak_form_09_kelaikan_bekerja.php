<html>
<title><?= "Ket Sehat" ?></title>
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
                    <td style="vertical-align: top; text-align: right; font-size:10pt;"><b>FORM-MCU-16-00</b></td>
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
        <h4 align="center" style="margin-bottom: 0px;">SERTIFIKAT KELAIKAN BEKERJA</h4>
        <h5 align="center" style="margin-top: 0px;">NO.<?= $data_form->kb_nomor_1; ?>/<?= $data_form->kb_nomor_2; ?>-MCU-RSUDKT/<?= date("Y"); ?></h5>

        <table style="font-size: 10pt;" width="100%" class="table-space">
            <tr>
                <td colspan="3">Saya yang bertanda tangan dibawah ini :</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td style="text-align: right;">:</td>
                <td class="bold">dr. Sri Roslina MKK,Spok</td>
            </tr>
            <tr>
                <td>NIP</td>
                <td style="text-align: right;">:</td>
                <td class="bold">197311232003122003</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td style="text-align: right;">:</td>
                <td class="bold">Doker Spesialis Okupasi</td>
            </tr>
            <tr>
                <td colspan="3">Berdasarkan permintaan dari <?= $data_form->kb_permintaan_dari; ?>. Nomor <?= $data_form->kb_permintaan_nomor; ?> tanggal <?= datefmysql($data_form->kb_permintaan_tanggal); ?> untuk melakukan penilaian kelaikan kerja pada pekerja :</td>
            </tr>
            <tr>
                <td>a. Nama</td>
                <td style="text-align: right;">:</td>
                <td class="bold"><?= $data_form->nama; ?></td>
            </tr>
            <tr>
                <td>b. No. Identitas</td>
                <td style="text-align: right;">:</td>
                <td class="bold"><?= $data_form->no_identitas; ?></td>
            </tr>
            <tr>
                <td>c. Tanggl lahir</td>
                <td style="text-align: right;">:</td>
                <td class="bold">
                    <?php
                        $tanggal_mysql = $data_form->tanggal_lahir;
                        setlocale(LC_TIME, 'id_ID.utf8');
                        $tanggal = strftime("%d %B %Y", strtotime($tanggal_mysql));
                        $bulanInggris = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                        $bulanIndonesia = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        $tanggal = str_replace($bulanInggris, $bulanIndonesia, $tanggal);
                        echo $tanggal;
                    ?>
            </tr>
            <tr>
                <td>d. Jenis Kelamin</td>
                <td style="text-align: right;">:</td>
                <td class="bold"><?= $data_form->kelamin == 'P' ? 'Perempuan' : 'Laki-Laki' ?></td>
            </tr>
            <tr>
                <td>e. Pekerjaan</td>
                <td style="text-align: right;">:</td>
                <td class="bold"><?= $data_form->nama_pekerjaan; ?></td>
            </tr>
            <tr>
                <td colspan="3">Telah dilakukan pemeriksaan berupa anamnesis, pemeriksaan fisik, pemeriksaan penunjang dan analisis pekerjaan. Maka saya menyatakan bahwa yang bersangkutan :</td>
            </tr>
            <tr>
                <td colspan="3"><b><?= $data_form->kb_keterangan; ?></b></td>
            </tr>
            <tr>
                <td colspan="3">Sertifikat ini hanya digunakan untuk kepentingan hal tersebut diatas, dan tidak dapat digunakan untuk kepentingan lainnya</td>
            </tr>
            <tr>                
                <td width="19%">&nbsp;</td>
                <td width="1%">&nbsp;</td>
                <td width="70%">&nbsp;</td>
            </tr>
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
                        $tanggal_mysql = $data_form->kb_tanggal;
                        setlocale(LC_TIME, 'id_ID.utf8');
                        $tanggal = strftime("%d %B %Y", strtotime($tanggal_mysql));
                        $bulanInggris = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                        $bulanIndonesia = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        $tanggal = str_replace($bulanInggris, $bulanIndonesia, $tanggal);
                        echo $tanggal;

                        $text_barcode  = "RSUD KOTA TANGERANG\n\n";
                        $text_barcode .= "MENYATAKAN BAHWA :\n\n";
                        $text_barcode .= "Bentuk Surat : Hasil Medical Check-Up\n";
                        $text_barcode .= "Nomor Surat : NO." . $data_form->kb_nomor_1 . "/" . $data_form->kb_nomor_2 . "-MCU-RSUDKT/" . date("Y") . "\n";
                        $text_barcode .= "Tanggal Surat : " . $tanggal . "\n";
                        $text_barcode .= "Perihal : Sertifikat Kelaikan Bekerja\n";
                        $text_barcode .= "Dokter : dr. Sri Roslina MKK,Spok\n";
                        $text_barcode .= "SIP : 446/DSP.015/SIP.I/DPMPTSP.2017\n\n";
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
                    Dokter Medical Check Up RSUD Kota Tangerang<br><br>
                    <b>dr. Sri Roslina MKK,Spok</b><br>
                    SIP No. 446/DSP.015/SIP.I/DPMPTSP.2017
                </td>
            </tr>
        </table>

    </main>

</body>

</html>