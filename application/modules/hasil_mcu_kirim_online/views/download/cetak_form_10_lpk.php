<html>
<title><?= "Lap Pemeriksaan Kesehatan" ?></title>
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
            text-align:justify;
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

        .ceklis {
            content: "\2713"; /* Unicode karakter untuk ceklis ✓ */
            font-family: DejaVu Sans, sans-serif;
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
                    <td style="vertical-align: top; text-align: right; font-size:10pt;"><b>FORM-MCU-18-00</b></td>
                </tr>
                <tr>
                    <td style="vertical-align: top; text-align: left; font-size:9pt;" >
                        Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat elektronik yang telah diterbitkan oleh Balai Besar Sertifikasi Elektronik (BSrE), Badan Siber dan Sandi Negara
                    </td>
                </tr>
            </table>
        </div>
    </footer>

    <main>
        <h4 align="center" style="margin-bottom: 0px;">LAPORAN PEMERIKSAAN KESEHATAN</h4><br>

        <table style="font-size: 10pt;" width="100%" class="table-space">
            <tr>
                <td colspan="4">RIWAYAT KESEHATAN</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Nama</td>
                <td style="text-align: right;">:</td>
                <td><?= $pasien->nama_pasien; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Tempat/Tanggal Lahir</td>
                <td style="text-align: right;">:</td>
                <td>
                    <?php
                        $tanggal_lahir = $pasien->tanggal_lahir;
                        $tgl_lahir = strftime("%d %B %Y", strtotime($tanggal_lahir));
                        $tgl_lahir = str_replace(
                            ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                            ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                            $tgl_lahir
                        );
                        $tgl_lahir = preg_replace('/\b(\d{1})\b/', '0$1', $tgl_lahir);
                        $tempat_lahir = $pasien->tempat_lahir ? $pasien->tempat_lahir .' / ' : '';
                        echo $tempat_lahir . $tgl_lahir;
                    ?>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Jenis Kelamin</td>
                <td style="text-align: right;">:</td>
                <td><?= $pasien->kelamin ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Alamat</td>
                <td style="text-align: right;">:</td>
                <td style="text-align: left;">
                    <?= $pasien->alamat; ?> 
                    <?= $pasien->norumah ? ' NO '.$pasien->norumah : ''; ?> 
                    <?= $pasien->rt ? ' RT '.$pasien->rt : ''; ?> 
                    <?= $pasien->rw ? ' RW '.$pasien->rw : ''; ?> 
                    <?= $pasien->kec ? ', KEC.'.$pasien->kec : ''; ?> 
                    <?= $pasien->kel ? ', KEL.'.$pasien->kel : ''; ?> 
                    <?= $pasien->kab ? ', '.$pasien->kab : ''; ?> 
                    <?= $pasien->prop ? ', '.$pasien->prop : ''; ?> 
                </td>
            </tr>  
            <tr>
                <td>&nbsp;</td>
                <td>No Telp</td>
                <td style="text-align: right;">:</td>
                <td><?= $pasien->telp ?></td>
            </tr>
            <tr>                
                <td width="3%">&nbsp;</td>
                <td width="22%">&nbsp;</td>
                <td width="1%">&nbsp;</td>
                <td width="75%">&nbsp;</td>
            </tr>
        </table>
        
        <table style="font-size: 10pt; border-collapse: collapse;" width="100%" class="table-border">
            <tr >
                <td width="3%" style="text-align: center;"><b>I</b></td>
                <td width="45%" style="text-align: left;"><b>RIWAYAT KESEHATAN PRIBADI</b></td>
                <td style="text-align: center;"><b>YA</b></td>
                <td style="text-align: center;"><b>TIDAK</b></td>
                <td style="text-align: center;"><b>KETERANGAN</b></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda pernah dirawat di rumah sakit ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_dirawat == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_dirawat == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_dirawat_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda pernah kecelakaan ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_kecelakaan == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_kecelakaan == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_kecelakaan_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda pernah batuk darah / batuk berdarah ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_batuk == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_batuk == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_batuk_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda pernah sakit dada ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_dada == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_dada == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_dada_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda pernah sakit kuning ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_kuning == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_kuning == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_kuning_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda pernah pingsan mendadak ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_pingsan == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_pingsan == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_pingsan_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda pernah kejang-kejang ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_kejang == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_kejang == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_kejang_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda pernah muntah darah ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_muntah == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_muntah == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_muntah_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda pernah sakit ulu hati ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_hati == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_hati == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_hati_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda pernah sakit kencing batu ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_batu == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_batu == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_batu_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda pernah sakit kencing nanah ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_nanah == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_nanah == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_nanah_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda pernah punya riwayat ambien ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_ambien == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_ambien == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_ambien_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah buang air besar Anda berdarah ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_buang == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_buang == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_buang_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda kecanduan narkotik ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_narkotik == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_narkotik == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_narkotik_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda pernah kencing darah ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_darah == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_darah == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_darah_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda pernah sakit jantung ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_jantung == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_jantung == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_jantung_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda pernah terserang asma ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_asma == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_asma == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_asma_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Anda pernah terserang malaria ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_malaria == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_malaria == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_malaria_ket; ?></td>
            </tr>
        </table>
        <div style="page-break-after: always;"></div>

        <table style="font-size: 10pt; border-collapse: collapse;" width="100%" class="table-border">
            <!-- <tr>
                <td class="ceklis" style="text-align: center;"><b>II</b></td>
                <td style="text-align: left;"><b>RIWAYAT KESEHATAN KELUARGA</b></td>
                <td></td>
                <td></td>
                <td></td>
            </tr> -->
            <tr >
                <td width="3%" style="text-align: center;"><b>II</b></td>
                <td width="45%" style="text-align: left;"><b>RIWAYAT KESEHATAN KELUARGA</b></td>
                <td style="text-align: center;"><b>YA</b></td>
                <td style="text-align: center;"><b>TIDAK</b></td>
                <td style="text-align: center;"><b>KETERANGAN</b></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah di keluarga Anda ada yang menderita kelainan jiwa ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_jiwa == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_jiwa == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_jiwa_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Bapak/Ibu Anda penderita kencing manis ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_manis == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_manis == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_manis_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Bapak/Ibu Anda penderita hipertensi ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_hipertensi == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_hipertensi == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_hipertensi_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Bapak/Ibu Anda penderita penyakit jantung ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_penyakit == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_penyakit == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_penyakit_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Bapak/Ibu Anda penderita stroke ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_stroke == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_stroke == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_stroke_ket; ?></td>
            </tr>
            <tr>
                <td></td>
                <td>Apakah Saudara Anda ada yang cacat bawaan ?</td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_cacat == '1' ? '✓' : ''; ?></td>
                <td class="ceklis" style="text-align: center;"><?= $data_form->lpk_cacat == '0' ? '✓' : ''; ?></td>
                <td><?= $data_form->lpk_cacat_ket; ?></td>
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
                        $tanggal_mysql = $data_form->lpk_tanggal;
                        setlocale(LC_TIME, 'id_ID.utf8');
                        $tanggal = strftime("%d %B %Y", strtotime($tanggal_mysql));
                        $bulanInggris = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                        $bulanIndonesia = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        $tanggal = str_replace($bulanInggris, $bulanIndonesia, $tanggal);

                        echo $tanggal;

                        $text_barcode  = "RSUD KOTA TANGERANG\n\n";
                        $text_barcode .= "MENYATAKAN BAHWA :\n\n";
                        $text_barcode .= "Bentuk Surat : Hasil Medical Check-Up\n";
                        $text_barcode .= "Tanggal Surat : " . $tanggal . "\n";
                        $text_barcode .= "Perihal : Laporan Pemeriksaan Kesehatan\n";
                        $text_barcode .= "Dokter : " . $data_form->nama_dokter . "\n";
                        $text_barcode .= "NIP : " . $data_form->nip. "\n\n";
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
                    NIP. <?= $data_form->nip; ?>
                </td>
            </tr>
        </table>

    </main>

</body>

</html>