<html>
<title><?= "Ket Kesehatan Jiwa" ?></title>
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
                    <td style="vertical-align: top; text-align: right; font-size:10pt;"><b>FORM-KEP-94a-00</b></td>
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
        <h4 align="center" style="margin-bottom: 0px;">SURAT KETERANGAN KESEHATAN JIWA</h4>
        <h5 align="center" style="margin-top: 0px;">Nomor:445/<?=$data_form->no_surat_skkj_2;?>-IRJ/<?= date("Y"); ?></h5>

        <table style="font-size: 10pt;" width="100%" class="table-space">
            <tr>
                <td colspan="3">Yang bertandatangan di bawah ini menerangkan bahwa :</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td style="text-align: right;">:</td>
                <td><?= $pasien->nama_pasien; ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td style="text-align: right;">:</td>
                <td>
                    <?php
                        $tanggal_lahir = $data_form->tanggal_lahir;
                        $tgl_lahir = strftime("%d %B %Y", strtotime($tanggal_lahir));
                        $tgl_lahir = str_replace(
                            ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                            ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                            $tgl_lahir
                        );
                        $tgl_lahir = preg_replace('/\b(\d{1})\b/', '0$1', $tgl_lahir);
                        echo $tgl_lahir;
                    ?>
                </td>   
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td style="text-align: right;">:</td>
                <td><?= $pasien->kelamin; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td style="text-align: right;">:</td>
                <td style="text-align: left;">
                    <?= $pasien->alamat; ?> 
                    NO <?= $pasien->norumah; ?> 
                    RT<?= $pasien->rt; ?>/RW<?= $pasien->rw; ?>, KEC.<?= $pasien->kec; ?>, KEL.<?= $pasien->kel; ?>, <?= $pasien->kab; ?>, <?= $pasien->prop; ?>
                </td>
            </tr>      

            <?php if (!empty($data_form->valid_1)): ?>
                <tr>
                    <td colspan="3">Berdasarkan pemeriksaan klinis dan MMPI pada nama tersebut diatas, saat ini tidak ditemukan adanya gejala gangguan jiwa (psikopatologi) yang bermakna yang dapat mengganggu fungsi intelektual dan aktivitas sehari-sehari. Dalam situasi tertentu yang membuat terperiksa tidak nyaman, suasana perasaan terperiksa cenderung dapat mudah terpengaruh.</td>
                </tr>        
                <tr>
                    <td colspan="3">Surat keterangan ini dibuat sebagai <b><?= $data_form->keterangan; ?></b> dan tidak dapat digunakan untuk kepentingan hukum lainnya. Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya.</td>
                </tr>     
                <tr>
                    <td colspan="3" >Surat ini berlaku selama 3 bulan terhitung sejak tanggal dikeluarkan.</td>
                </tr>
            <?php endif; ?>    

            <?php if (!empty($data_form->valid_2)): ?>
                <tr>
                    <td colspan="3">Hasil test MMPI tidak dapat diinterprestasi. Berdasarkan pemeriksaan wawancara klinis saat ini tidak ditemukan adanya gejala gangguan jiwa (psikopatologi) yang bermakna yang dapat mengganggu fungsi intelektual dan aktivitas sehari-sehari. Namun pada situasi tertentu yang membuat terperiksa merasa tidak nyaman, suasana emosi terperiksa cenderung dapat terpengaruh.</td>
                </tr>        
                <tr>
                    <td colspan="3">Surat keterangan ini dibuat sebagai <b><?= $data_form->keterangan; ?></b> dan tidak dapat digunakan untuk kepentingan hukum lainnya. Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya.</td>
                </tr>     
                <tr>
                    <td colspan="3" >Surat ini berlaku selama 3 bulan terhitung sejak tanggal dikeluarkan.</td>
                </tr>
            <?php endif; ?>    
            
            <tr>                
                <td width="19%">&nbsp;</td>
                <td width="1%">&nbsp;</td>
                <td width="80%">&nbsp;</td>
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
                        $tanggal_mysql = $data_form->tanggal_skkj_2;
                        setlocale(LC_TIME, 'id_ID.utf8');
                        $tanggal = strftime("%d %B %Y", strtotime($tanggal_mysql));
                        $bulanInggris = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                        $bulanIndonesia = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        $tanggal = str_replace($bulanInggris, $bulanIndonesia, $tanggal);

                        echo $tanggal;

                        $text_barcode  = "RSUD KOTA TANGERANG\n\n";
                        $text_barcode .= "MENYATAKAN BAHWA :\n\n";
                        $text_barcode .= "Bentuk Surat : Hasil Medical Check-Up\n";
                        $text_barcode .= "Nomor Surat : NO.445/" . $data_form->no_surat_skkj_2 . "-IRJ/" . date("Y") . "\n";
                        $text_barcode .= "Tanggal Surat : " . $tanggal . "\n";
                        $text_barcode .= "Perihal : Surat Keterangan Kesehatan Jiwa\n";
                        $text_barcode .= "Dokter : " . $data_form->nama_dokter . "\n";
                        $text_barcode .= $data_form->nrptt_nip . " : " . $data_form->nip_dokter. "\n\n";
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
                    Dokter Spesialis RSUD Kota Tangerang<br><br>
                    <b><?= $data_form->nama_dokter; ?></b><br>
                    <?= $data_form->nrptt_nip; ?>. <?= $data_form->nip_dokter; ?>
                </td>
            </tr>
        </table>

    </main>

</body>

</html>