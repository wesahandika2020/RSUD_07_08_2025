<html>
<title><?= "Ket Disabilitas" ?></title>
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
                    <td style="vertical-align: top; text-align: right; font-size:10pt;"><b>FORM-MCU-27-00</b></td>
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
        <h4 align="center" style="margin-bottom: 0px;">SURAT KETERANGAN DISABILITAS</h4>
        <h5 align="center" style="margin-top: 0px;">NOMOR : <?=$data_form->nomorskd;?>/MCU_RSUDKT/<?= date("Y"); ?></h5>

        <table style="font-size: 10pt;" width="100%" class="table-space">
            <tr>
                <td colspan="4">Penandatangan di bawah ini, Dokter Pemeriksa di Rumah Sakit Umum Daerah Kota Tangerang menerangkan bahwa :</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Nama</td>
                <td style="text-align: right;">:</td>
                <td><?= $data_form->nama; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tempat/Tanggal Lahir</td>
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
                        $tempat_lahir = $data_form->tempat_lahir ? $data_form->tempat_lahir .' / ' : '';
                        
                        $birthDate = new DateTime($data_form->tanggal_lahir);
                        $today = new DateTime();
                        $age = $today->diff($birthDate)->y;

                        echo $tempat_lahir . $tgl_lahir . ' (Umur: ' . $age . ' tahun)';
                    ?>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Jenis Kelamin</td>
                <td style="text-align: right;">:</td>
                <td><?= $data_form->kelamin == 'P' ? 'Perempuan' : 'Laki-Laki' ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Alamat</td>
                <td style="text-align: right;">:</td>
                <td style="text-align: left;">
                    <?= $data_form->alamat; ?> 
                    <?= $data_form->no_rumah ? ' NO '.$data_form->no_rumah : ''; ?> 
                    <?= $data_form->no_rt ? ' RT '.$data_form->no_rt : ''; ?> 
                    <?= $data_form->no_rw ? ' RW '.$data_form->no_rw : ''; ?> 
                    <?= $data_form->nama_kec ? ', KEC.'.$data_form->nama_kec : ''; ?> 
                    <?= $data_form->nama_kel ? ', KEL.'.$data_form->nama_kel : ''; ?> 
                    <?= $data_form->nama_kab ? ', '.$data_form->nama_kab : ''; ?> 
                    <?= $data_form->nama_prop ? ', '.$data_form->nama_prop : ''; ?> 
                </td>
            </tr>  
            
            <tr>
                <td>&nbsp;</td>
                <td>Ada Disabilitas </td>
                <td style="text-align: right;">:</td>
                <td><?= $data_form->adadisabilitas == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Ya &nbsp;&nbsp;&nbsp;&nbsp;<?= $data_form->adadisabilitasq == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Tidak</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Lokasi Disabilitas</td>
                <td style="text-align: right;">:</td>
                <td><?= $data_form->lokasiskd; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>1. Susunan saraf pusat Sebutkan </td>
                <td style="text-align: right;">:</td>
                <td><?= $data_form->susunanskd; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>2. Organ Penginderaan Sebutkan </td>
                <td style="text-align: right;">:</td>
                <td><?= $data_form->organskd; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>3. Extremitas atas </td>
                <td style="text-align: right;">:</td>
                <td><?= $data_form->ektremitasataskanan == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Kanan &nbsp;&nbsp;&nbsp;&nbsp;<?= $data_form->extremitasataskiri == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Kiri &nbsp;&nbsp;&nbsp;&nbsp;<?= $data_form->extremitasataskeduanya == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Keduanya</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>4. Tangan dominan  </td>
                <td style="text-align: right;">:</td>
                <td><?= $data_form->dominankanan == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Kanan &nbsp;&nbsp;&nbsp;&nbsp;<?= $data_form->dominankiri == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Kiri</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>5. Extremitas bawah  </td>
                <td style="text-align: right;">:</td>
                <td><?= $data_form->ektremitasbawahkanan == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Kanan &nbsp;&nbsp;&nbsp;&nbsp;<?= $data_form->extremitasbawahkiri == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Kiri &nbsp;&nbsp;&nbsp;&nbsp;<?= $data_form->extremitasbawahkeduanya == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Keduanya</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>6. Lain - lain  </td>
                <td style="text-align: right;">:</td>
                <td><?= $data_form->lainskd; ?></td>
            </tr>            
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr> 
            <tr>
                <td colspan="4" style="text-align: center;"><b>ANAMNESIS</b></td>
            </tr>
            <tr>
                <td colspan="4">Setelah melakukan pemeriksaan kesehatan dan kemampuan fungsional bahwa yang bersangkutan benar-benar sebagai penyandang Disabilitas berupa :</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>1. Riwayat Disabilitas </td>
                <td style="text-align: right;">:</td>
                <td>a. <?= $data_form->sejakskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Sejak lahir&nbsp;&nbsp;&nbsp;&nbsp; <?= $data_form->kecelakaanskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Kecelakaan dalam Pekerjaan</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td>&nbsp;</td>
                <td>b. <?= $data_form->kecelaskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Kecelakaan lalu lintas&nbsp;&nbsp;&nbsp;&nbsp; <?= $data_form->strokeskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Akibat Stroke &nbsp;&nbsp;&nbsp;&nbsp; <?= $data_form->kustaskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Akibat Kusta </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td>&nbsp;</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;<?= $data_form->laenskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Lain-lain, Sebutkan : <?= $data_form->ptskd; ?>, pada tahun : <?= $data_form->skdpt; ?> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td>&nbsp;</td>
                <td>c. <?= $data_form->sesudahskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Sesudah sakit, pada tahun :  <?= $data_form->thskd; ?></td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>2. Kemampuan mengurus diri </td>
                <td style="text-align: right;">:</td>
                <td><?= $data_form->kemampuanskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Mampu &nbsp;&nbsp;&nbsp;&nbsp; <?= $data_form->tmskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Tidak mampu</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td>&nbsp;</td>
                <td><?= $data_form->besarbisaskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Sebagian besar bisa, jelaskan yang tidak bisa : <?= $data_form->jelasskd; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td>&nbsp;</td>
                <td><?= $data_form->perluskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Perlu bantuan penuh orang lain</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>3. Bepergian keluar rumah </td>
                <td style="text-align: right;">:</td>
                <td><?= $data_form->bsaskb == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Bisa sendiri  &nbsp;&nbsp;&nbsp;&nbsp; <?= $data_form->anggotaskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> perlu diantar anggota keluarga</td>
            </tr>     
            <tr>                
                <td width="3%">&nbsp;</td>
                <td width="31%">&nbsp;</td>
                <td width="1%">&nbsp;</td>
                <td width="65%">&nbsp;</td>
            </tr>
        </table>
        <div style="page-break-after: always;"></div>

        <table style="font-size: 10pt;" width="100%" class="table-space">
            <tr>
                <td colspan="4" style="text-align: center;"><b>HASIL PEMERIKSAAN</b></td>
            </tr>
            <tr>
                <td colspan="4">4. Jenis / Ragam Disabilitas </td>
            </tr>
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3">a. Disabilitas Fisik </td>
            </tr>
            <tr>
                <td width="2%" colspan="2">&nbsp;</td>
                <td colspan="2">1. Amputasi &nbsp;&nbsp;
                    <?= $data_form->atanganskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Tangan &nbsp;&nbsp;
                    <?= $data_form->akakiskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Kaki*   &nbsp;&nbsp;
                    (<?= $data_form->tangankakiskd; ?>)
                </td>
            </tr>
            <tr>
                <td width="2%" colspan="2">&nbsp;</td>
                <td colspan="2">2. Kelemahan bagian atas anggota gerak atas dan bawah (<?= $data_form->akelemahanskd; ?>)</td>
            </tr>
            <tr>                
                <td width="2%" colspan="2">&nbsp;</td>
                <td colspan="2"> 3. Paraplegi (anggota tubuh bagian bawah yang meliputi kedua tungkai dan organ panggul) (<?= $data_form->aparaplegiskd; ?>)</td>
            </tr>
            <tr>                
                <td width="2%" colspan="2">&nbsp;</td>
                <td colspan="2"> 4. Celebral Palsy (CP) &nbsp;&nbsp;(<?= $data_form->acelebral; ?>)</td>
            </tr>
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3">b. Disabilitas Sensorik</td>
            </tr>
            <tr>
                <td width="2%" colspan="2">&nbsp;</td>
                <td colspan="2">1. Netra</td>
            </tr>   
            <tr>
                <td width="3%" colspan="3">&nbsp;</td>
                <td>a. Buta Total  (<?=  $data_form->anetralskd; ?>)</td>
            </tr>
            <tr>
                <td width="3%" colspan="3">&nbsp;</td>
                <td>b. Persepsi Cahaya / Low Vision (<?=  $data_form->bnetralskd; ?>)</td>
            </tr>
            <tr>
                <td width="2%" colspan="2">&nbsp;</td>
                <td colspan="2">2. Rungu (<?=  $data_form->brunguskd; ?>)</td>
            </tr>  
            <tr>
                <td width="2%" colspan="2">&nbsp;</td>
                <td colspan="2">3. Wicara (<?=  $data_form->bwicaraskd; ?>)</td>
            </tr>  
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3">c. Disabilitas Intelektual </td>
            </tr>
            <tr>
                <td width="2%" colspan="2">&nbsp;</td>
                <td colspan="2">1. Disabilitas Grahita (<?=  $data_form->cgrahitaskd; ?>)</td>
            </tr>  
            <tr>
                <td width="2%" colspan="2">&nbsp;</td>
                <td colspan="2">2. Disabilitas Syndrom (<?=  $data_form->csyndromskd; ?>)</td>
            </tr>  
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3">d. Disabilitas Mental </td>
            </tr>
            <tr>
                <td width="2%" colspan="2">&nbsp;</td>
                <td colspan="2">1. Psikososial (Skizofenia, Bipolar, Anxietas, dan Gangguan Kepribadian)* (<?=  $data_form->dmentallskd; ?>)</td>
            </tr>  
            <tr>
                <td width="2%" colspan="2">&nbsp;</td>
                <td colspan="2"> 2. Disabilitas Perkembangan (Autis / Hiperaktif)* (<?=  $data_form->dperkembanganskd; ?>)</td>
            </tr>  

            
            <tr>
                <td colspan="4">5. Derajat Disabilitas Fisik </td>
            </tr>
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3"> <?= $data_form->derajatskd1 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Derajat 1 : mampu melaksanakan aktifitas atau mempertahankan sikap dengan kesulitan.</td>
            </tr>
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3"> <?= $data_form->derajatskd2 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Derajat 2 : mampu melaksanakan kegiatan atau mempertahankan sikap dengan bantuan alat bantu.</td>
            </tr>
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3"> <?= $data_form->derajatskd3 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Derajat 3 : mapu melaksanakan aktifitas sebagian memerlukan bantuan orang lain, dengan atau tanpa alat bantu.</td>
            </tr>
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3"> <?= $data_form->derajatskd4 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Derajat 4 : dalam melaksanakan aktifitas , tergantung penuh terhadap pengawasan orang lain.</td>
            </tr>
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3"> <?= $data_form->derajatskd5 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Derajat 5 : tidak mampu melakukan aktifitas tanpa bantuan penuh orang lain dan tersedianya lingkungan khusus.</td>
            </tr>
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3"> <?= $data_form->derajatskd6 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Derajat 6 : tidak mampu penuh melaksanakan kegiatan sehari hari meskipun dibantu penuh orang lain.</td>
            </tr>


            <tr>
                <td colspan="4">6. Kemampuan Mobilitas </td>
            </tr>
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3"> a. 
                    &nbsp;&nbsp;<?= $data_form->amjalanskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Jalan
                    &nbsp;&nbsp;<?= $data_form->amperlahanskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> jalan perlahan
                    &nbsp;&nbsp;<?= $data_form->amalatskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> jalan dengan alat bantu
                    &nbsp;&nbsp;<?= $data_form->ammampuskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> tidak mampu jalan
                </td>
            </tr>
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3"> b. 
                    &nbsp;&nbsp;<?= $data_form->bnaikskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Naik tangga
                    &nbsp;&nbsp;<?= $data_form->btanggaskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> naik tangga perlahan
                    &nbsp;&nbsp;<?= $data_form->bnaeikskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> tidak mampu naik tangga
                </td>
            </tr>            
        </table>
        <div style="page-break-after: always;"></div>

        <table style="font-size: 10pt;" width="100%" class="table-space">
            <tr>
                <td colspan="4" style="text-align: center;"><b>HASIL PEMERIKSAAN</b></td>
            </tr>
            <tr>
                <td colspan="4">7. Gangguan Extremitas atas</td>
            </tr>
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3"> a. 
                    &nbsp;&nbsp;<?= $data_form->aextrimskd1 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Kanan
                    &nbsp;&nbsp;<?= $data_form->aextrimskd2 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Kekuatan
                    &nbsp;&nbsp;<?= $data_form->aextrimskd3 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> 5
                    &nbsp;&nbsp;<?= $data_form->aextrimskd4 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> 4
                    &nbsp;&nbsp;<?= $data_form->aextrimskd5 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> 3
                    &nbsp;&nbsp;<?= $data_form->aextrimskd6 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> 2
                    &nbsp;&nbsp;<?= $data_form->aextrimskd7 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> 1
                    &nbsp;&nbsp;<?= $data_form->aextrimskd8 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> 0
                </td>
            </tr>
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3"> b. 
                    &nbsp;&nbsp;<?= $data_form->bextrimskd1 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Kiri
                    &nbsp;&nbsp;<?= $data_form->bextrimskd2 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Kekuatan
                    &nbsp;&nbsp;<?= $data_form->bextrimskd3 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> 5
                    &nbsp;&nbsp;<?= $data_form->bextrimskd4 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> 4
                    &nbsp;&nbsp;<?= $data_form->bextrimskd5 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> 3
                    &nbsp;&nbsp;<?= $data_form->bextrimskd6 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> 2
                    &nbsp;&nbsp;<?= $data_form->bextrimskd7 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> 1
                    &nbsp;&nbsp;<?= $data_form->bextrimskd8 == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> 0
                </td>
            </tr>    
                        
            
            <tr>
                <td colspan="4">8. Alat Bantu yang di gunakan</td>
            </tr>
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3"> a. 
                    &nbsp;&nbsp;<?= $data_form->gunakanskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Tidak
                    &nbsp;&nbsp;<?= $data_form->skdada == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Ada, Sebutkan :
                    &nbsp;&nbsp;(<?= $data_form->skdsebutkan; ?>)
                </td>
            </tr>    
            

            <tr>
                <td colspan="4">9. Penyakit lain</td>
            </tr>
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3"> a. 
                    &nbsp;&nbsp;<?= $data_form->tidakkakd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Tidak
                    &nbsp;&nbsp;<?= $data_form->adaaskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Ada, Sebutkan :
                    &nbsp;&nbsp;(<?= $data_form->sebuttkannskd; ?>)
                </td>
            </tr>  


            <tr>
                <td colspan="4">10. Pengobatan</td>
            </tr>
            <tr>
                <td width="1%">&nbsp;</td>
                <td colspan="3"> a. 
                    &nbsp;&nbsp;<?= $data_form->tidakpskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Tidak
                    &nbsp;&nbsp;<?= $data_form->adapskd == 1 ? '<span class="check-symbol">&#9745</span>' : '<span class="check-symbol">&#9744</span>'; ?> Ada, Sebutkan :
                    &nbsp;&nbsp;(<?= $data_form->sebutkanpskd; ?>)
                </td>
            </tr> 
            
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>

            <tr>
                <td colspan="4"><b>Catatan tambahan lainnya :</b> <br>
                    Dengan surat ini kami menyatakan bahwa yang bersangkutan dengan kondisi disabilitasnya mengalami hambatan dan kesulitan untuk berpartisipasi secara penuh dan efektif. Surat keterangan ini digunakan untuk keperluan 	: <b><?= $data_form->keterangan; ?>
                </td>
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
                        $tanggal_mysql = $data_form->tanggalskd;
                        setlocale(LC_TIME, 'id_ID.utf8');
                        $tanggal = strftime("%d %B %Y", strtotime($tanggal_mysql));
                        $bulanInggris = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                        $bulanIndonesia = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        $tanggal = str_replace($bulanInggris, $bulanIndonesia, $tanggal);

                        echo $tanggal;

                        $text_barcode  = "RSUD KOTA TANGERANG\n\n";
                        $text_barcode .= "MENYATAKAN BAHWA :\n\n";
                        $text_barcode .= "Bentuk Surat : Hasil Medical Check-Up\n";
                        $text_barcode .= "Nomor Surat : NO." . $data_form->nomorskd . "/MCU_RSUDKT/" . date("Y") . "\n";
                        $text_barcode .= "Tanggal Surat : " . $tanggal . "\n";
                        $text_barcode .= "Perihal : Surat Keterangan Disabilitas\n";
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
                    Dokter Medical Check Up RSUD Kota Tangerang<br><br>
                    <b><?= $data_form->nama_dokter; ?></b><br>
                    NIP. <?= $data_form->nip_dokter; ?>
                </td>
            </tr>
        </table>

    </main>

</body>

</html>