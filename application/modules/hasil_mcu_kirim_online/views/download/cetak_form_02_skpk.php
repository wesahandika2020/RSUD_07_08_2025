<html>
<title><?= "Ket Pengujian Kesehatan" ?></title>
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
                    <td style="vertical-align: top; text-align: right; font-size:10pt;"><b>FORM-KEP-118-00</b></td>
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
        <h4 align="center" style="margin-bottom: 0px;">SURAT KETERANGAN PENGUJIAN KESEHATAN</h4>
        <h5 align="center" style="margin-top: 0px;">NO.<?= $data_form->no_surat; ?>-MCU-RSUDKT/<?= date("Y"); ?></h5>

        <table style="font-size: 10pt;" width="100%" class="table-space">
            <tr>
                <td colspan="3">Dokter Penguji Tersendiri / Tim Penguji Kesehatan / Tim Khusus Penguji Pegawai Negeri Sipil RSUD KOTA TANGERANG yang ditetapkan berdasarkan Surat Keputusan Menteri Kesehatan No. KP.01.2/4.2/1126/2014 Tanggal 14 April 2014 yang anggota-anggotanya dalam hal ini telah menjalankan tugasnya dengan mengingat sumpah (janji) yang diucapkan mereka pada waktu menerima jabatannya, menerangkan bahwa :</td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td style="text-align: right;">:</td>
                <td class="bold"><?= $pasien->nama_pasien; ?></td>
            </tr>
            <tr>
                <td>NAMA KECIL</td>
                <td style="text-align: right;">:</td>
                <td class="bold"><?= $data_form->nama_kecil; ?></td>
            </tr>
            <tr>
                <td>NIP</td>
                <td style="text-align: right;">:</td>
                <td class="bold"><?= $data_form->nip; ?></td>
            </tr>
            <tr>
                <td>PEKERJAAN</td>
                <td style="text-align: right;">:</td>
                <!-- <td class="bold"><?= $pasien->pekerjaan; ?></td> -->
                <td class="bold">PEGAWAI NEGERI SIPIL</td>
            </tr>
            <tr>
                <td>GOL. RUANG</td>
                <td style="text-align: right;">:</td>
                <td class="bold"><?= $data_form->gol_ruang_skpk; ?></td>
            </tr>
            <tr>
                <td>KARPEG</td>
                <td style="text-align: right;">:</td>
                <td class="bold"><?= $data_form->karpeg; ?></td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td style="text-align: right;">:</td>
                <td class="bold">
                    <b>
                        <?= $pasien->alamat; ?>                      
                        <?php if ($pasien->norumah != NULL ) : ?> NO. <?= $pasien->norumah; ?> <?php endif; ?>                        
                        RT. <?= $pasien->rt; ?> / RW. <?= $pasien->rw; ?>, KEL.<?= $pasien->kel; ?>, KEC.<?= $pasien->kec; ?>, <?= $pasien->kab; ?>, <?= $pasien->prop; ?>
                    </b>
                </td>
            </tr>
            <tr>                
                <td width="19%">&nbsp;</td>
                <td width="1%">&nbsp;</td>
                <td width="80%">&nbsp;</td>
            </tr>
        </table>

        <table style="font-size: 10pt;" width="100%" class="table-space">
            <tr>
                <td colspan="2">
                    <br>Telah diperiksa atas surat permintaan dari <b><?= $data_form->telah_diperiksa; ?>  
                            Tanggal, 
                            <?php
                                $tanggal_mysql = $data_form->tanggal_diperiksa_skpk;

                                $tanggal_diinginkan = strftime("%d %B %Y", strtotime($tanggal_mysql));

                                $tanggal_diinginkan = str_replace(
                                    ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                                    ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                                    $tanggal_diinginkan
                                );

                                $tanggal_diinginkan = preg_replace('/\b(\d{1})\b/', '0$1', $tanggal_diinginkan);

                                echo "<b>$tanggal_diinginkan</b>";
                            ?>
                    </b> dan berpendapat, bahwa yang diperiksa : 
                </td>
            </tr>

            <tr>
                <td colspan="2"><b>Kesimpulan :</b></td>
            </tr>
            <tr>
                <td style="text-align: right;">a.</td>
                <td>Memenuhi syarat untuk semua jenis pekerjaan pada umumnya.</td>
            </tr>
            <tr>
                <td style="text-align: right;">b.</td>
                <td>Memenuhi syarat untuk jenis pekerjaan tertentu.</td>
            </tr>
            <tr>
                <td style="text-align: right;">c.</td>
                <td>Dapat diterima dengan bersyarat untuk (a) dan (b) tersebut di atas (c) dengan pengobatan.</td>
            </tr>
            <tr>
                <td style="text-align: right;">d.</td>
                <td>Untuk sementara belum memenuhi syarat kesehatan dan memerlukan pengobatan/perawatan dan ujian kesehatan diulang setelah selesai pengobatan/perawatan atau ditolak sementara.</td>
            </tr>
            <tr>
                <td style="text-align: right;">e.</td>
                <td>Tidak memenuhi syarat untuk menjalankan tugas sebagai Pegawai Negeri Sipil (PNS)</td>
            </tr>
            <tr>
                <td colspan="2">Hasil pengujian kesehatan ini diberikan atas nama Tim Penguji Kesehatan (Peraturan Pengujian Kesehatan No. 143/menkes/per/VII/77 Tanggal 1 Juli 1997).</td>
            </tr>
            <tr>
                <td colspan="2">Salinan Hasil Keputusan Pengujian Kesehatan Dikirimkan kepada :</td>
            </tr>
            <tr>
                <td style="text-align: right;">1.</td>
                <td><?= $data_form->salinan_hasil_satu; ?></td>
            </tr>
            <tr>
                <td style="text-align: right;">2.</td>
                <td><?= $data_form->salinan_hasil_dua; ?></td>
            </tr>
            <tr>
                <td style="text-align: right;">3.</td>
                <td><?= $data_form->salinan_hasil_tiga; ?></td>
            </tr>
            <tr>
                <td style="text-align: right;">4.</td>
                <td>Arsip.</td>
            </tr>
            <tr>                
                <td width="5%">&nbsp;</td>
                <td width="95%">&nbsp;</td>
            </tr>
        </table>
        
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
                        $tanggal_mysql = $data_form->tanggal_surat;
                        setlocale(LC_TIME, 'id_ID.utf8');
                        $tanggal = strftime("%d %B %Y", strtotime($tanggal_mysql));
                        $bulanInggris = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                        $bulanIndonesia = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        $tanggal = str_replace($bulanInggris, $bulanIndonesia, $tanggal);

                        echo $tanggal;

                        $text_barcode  = "RSUD KOTA TANGERANG\n\n";
                        $text_barcode .= "MENYATAKAN BAHWA :\n\n";
                        $text_barcode .= "Bentuk Surat : Hasil Medical Check-Up\n";
                        $text_barcode .= "Nomor Surat : NO." . $data_form->no_surat. "-MCU-RSUDKT/" . date("Y") . "\n";
                        $text_barcode .= "Tanggal Surat : " . $tanggal . "\n";
                        $text_barcode .= "Perihal :Surat Keterangan Pengujian Kesehatan\n";
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
                    Ketua Tim Penguji Kesehatan RSUD Kota Tangerang<br><br>       
                    <b><?= $data_form->nama_dokter; ?></b><br>
                    NIP. <?= $data_form->nip_dokter; ?>
                </td>
            </tr>
        </table>
        
    </main>

</body>

</html>