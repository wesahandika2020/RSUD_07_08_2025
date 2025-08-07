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
                    <td style="vertical-align: top; text-align: right; font-size:10pt;"><i style="color: #808080;">Halaman <span class="pagenum"></span></i></td>
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
        <h4 align="center"2>HASIL PEMERIKSAAN KEDOKTERAN OKUPASI</h4>

        <table style="font-size: 10pt;" width="100%" class="table-space">
            <tr>
                <td><b>Nama</b></td>
                <td>: <?= $pasien->nama_pasien ?></td>
            </tr>
            <tr>
                <td><b>Umur</b></td>
                <td>: <?= cekUmurPasien($pasien->tanggal_lahir) ?> Tahun</td>
            </tr>
            <tr>
                <td><b>Jenis Kelamin</b></td>
                <td>: <?= $pasien->kelamin ?></td>
            </tr>
            <tr>
                <td><b>Pekerjaan</b></td>
                <td>: <?= ucwords(strtolower($pasien->pekerjaan)) ?></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td>Keluhan Terkait Pekerjaan</td>
                <td>: <?= $data_form->keluhan_hpdo ?? "-" ?></td>
            </tr>
            <tr>
                <td>Masa Kerja</td>
                <td>: <?= $data_form->masakerja_hpdo; ?></td>
            </tr>
            <tr>
                <td>Deskripsi Kerja</td>
                <td>: <?= $data_form->uraian_hpdo; ?></td>
            </tr>
            <tr>
                <td width="25%">&nbsp;</td>
                <td width="75%">&nbsp;</td>
            </tr>
        </table>

        <table style="font-size: 10pt;" width="100%" class="table-space">
            <tr>
                <td colspan="5"><b>Risiko Kerja :</b></td>
            </tr>
            <tr>
                <td colspan="2"><b>Biologi</b></td>
                <td></td>
                <td colspan="2"><b>Kimia</b></td>
            </tr>
            <tr>
                <td><b>&bull;</b> Bakteri</td>
                <td> : <?= $data_form->bakteri_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                <td></td>
                <td><b>&bull;</b> Debu</td>
                <td> : <?= $data_form->debu_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
            </tr>
            <tr>
                <td><b>&bull;</b> Virus</td>
                <td> : <?= $data_form->virus_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                <td></td>
                <td><b>&bull;</b> Zat Kimia</td>
                <td> : <?= $data_form->zatkimia_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
            </tr>
            <tr>
                <td><b>&bull;</b> Parasit</td>
                <td> : <?= $data_form->parasit_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                <td></td>
                <td><b>&bull;</b> Pestisida</td>
                <td> : <?= $data_form->pestisida_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
            </tr>
            <tr>
                <td><b>&bull;</b> Jamur</td>
                <td> : <?= $data_form->jamur_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                <td></td>
                <td><b>&bull;</b> Asap</td>
                <td> : <?= $data_form->asap_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
            </tr>
            <tr>
                <td><b>&bull;</b>Lainnya </td>
                <td> : <?= $data_form->lainnya_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                <td></td>
                <td><b>&bull;</b> Lain - lain</td>
                <td> : <?= $data_form->lainn_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
            </tr>
            <tr>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td colspan="2"><b>Fisik</b></td>
                <td></td>
                <td colspan="2"><b>Psikososial</b></td>
            </tr>
            <tr>
                <td><b>&bull;</b> Bising</td>
                <td> : <?= $data_form->bising_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                <td></td>
                <td><b>&bull;</b> Beban Kerja Berlebih/Tidak Sesuai</td>
                <td> : <?= $data_form->bebankerja_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
            </tr>
            <tr>
                <td><b>&bull;</b> Ketinggian</td>
                <td> : <?= $data_form->ketinggian_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                <td></td>
                <td><b>&bull;</b> Kerja Gilir/Shift</td>
                <td> : <?= $data_form->kerjagilir_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
            </tr>
            <tr>
                <td><b>&bull;</b> Getaran Tubuh</td>
                <td> : <?= $data_form->gtubuh_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                <td></td>
                <td><b>&bull;</b> Ketidakjelasan Tugas</td>
                <td> : <?= $data_form->ketidakjelasan_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
            </tr>
            <tr>
                <td><b>&bull;</b> Getaran Tangan</td>
                <td> : <?= $data_form->gtangan_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                <td></td>
                <td><b>&bull;</b> Pekerjaan Monoton</td>
                <td> : <?= $data_form->pekerjaan_monoton_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
            </tr>
            <tr>
                <td><b>&bull;</b> Suhu panas/dingin </td>
                <td> : <?= $data_form->suhu_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                <td></td>
                <td><b>&bull;</b> Konflik Di Tempat Kerja</td>
                <td> : <?= $data_form->konflik_kerja_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
            </tr>
            <tr>
                <td><b>&bull;</b> Radiasi</td>
                <td> : <?= $data_form->radiasi_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                <td></td>
                <td><b>&bull;</b> Tuntutan Kerja Tinggi</td>
                <td> : <?= $data_form->tuntutan_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
            </tr>
            <tr>
                <td><b>&bull;</b> Lain - lain</td>
                <td> : <?= $data_form->lain_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                <td colspan="3"></td>
            </tr>

            <tr>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td colspan="2"><b>Ergonomi</b></td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td><b>&bull;</b> Gerak berulang</td>
                <td> : <?= $data_form->gberulang_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                <td></td>
                <td><b>&bull;</b> Posisi Tubuh Janggal</td>
                <td> : <?= $data_form->posisi_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
            </tr>
            <tr>
                <td><b>&bull;</b> Angkat-Angkut Berat</td>
                <td> : <?= $data_form->angkat_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                <td></td>
                <td><b>&bull;</b> Pencahayaan Tidak Sesuai</td>
                <td> : <?= $data_form->pencahayaan_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
            </tr>
            <tr>
                <td><b>&bull;</b> Berdiri Terus >4jam</td>
                <td> : <?= $data_form->berdiri_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                <td></td>
                <td><b>&bull;</b> Bekerja Dengan Monitor >4jam</td>
                <td> : <?= $data_form->bekerja_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
            </tr>
            <tr>
                <td><b>&bull;</b> Duduk Terus >4jam</td>
                <td> : <?= $data_form->duduk_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                <td></td>
                <td><b>&bull;</b> Lain-Lain</td>
                <td> : <?= $data_form->laint_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
            </tr>

            <tr>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td width="35%">&nbsp;</td>
                <td width="15%">&nbsp;</td>
                <td width="1%">&nbsp;</td>
                <td width="35%">&nbsp;</td>
                <td width="14%">&nbsp;</td>
            </tr>            
        </table>

        <table style="font-size: 10pt;" width="100%" class="table-space">   
            <tr>
                <td colspan="3">Berdasarkan Pemeriksaan Self Reporting Quetionnaire 29 (SRQ-29) :</td>
            </tr><tr>
                <td></td>
                <td colspan="2" style="text-align: justify;"><?= ($data_form->keterangan_hpdo) ?></td>
            </tr>
            <tr>
                <td colspan="3">Berdasarkan Pemeriksaan Survey Diagnosis Stress (SDS) :</td>
            </tr>
            
            <tr>
                <td></td>
                <td><b>&bull;</b> Ketaksaan Peran</td>
                <td>: <?= $data_form->ketaksaan == 0 ? '-' : ($data_form->ketaksaan == 1 ? 'Ringan' : ($data_form->ketaksaan == 2 ? 'Sedang' : 'Berat')) ?></td>
            </tr>
            <tr>
                <td></td>
                <td><b>&bull;</b> Konflik peran</td>
                <td>: <?= $data_form->konflikk == 0 ? '-' : ($data_form->konflikk == 1 ? 'Ringan' : ($data_form->konflikk == 2 ? 'Sedang' : 'Berat')) ?></td>
            </tr>
            <tr>
                <td></td>
                <td><b>&bull;</b> Beban kerja kuantitatif</td>
                <td>: <?= $data_form->kuantitatif == 0 ? '-' : ($data_form->kuantitatif == 1 ? 'Ringan' : ($data_form->kuantitatif == 2 ? 'Sedang' : 'Berat')) ?></td>
            </tr>
            <tr>
                <td></td>
                <td><b>&bull;</b> Beban kerja kualitatif</td>
                <td>: <?= $data_form->kualitatif == 0 ? '-' : ($data_form->kualitatif == 1 ? 'Ringan' : ($data_form->kualitatif == 2 ? 'Sedang' : 'Berat')) ?></td>
            </tr>
            <tr>
                <td></td>
                <td><b>&bull;</b> Pengembangan karir</td>
                <td>: <?= $data_form->pengembang == 0 ? '-' : ($data_form->pengembang == 1 ? 'Ringan' : ($data_form->pengembang == 2 ? 'Sedang' : 'Berat')) ?></td>
            </tr>
            <tr>
                <td></td>
                <td><b>&bull;</b> Tanggungjawab terhadap oranglain</td>
                <td>: <?= $data_form->tanggungjewab == 0 ? '-' : ($data_form->tanggungjewab == 1 ? 'Ringan' : ($data_form->tanggungjewab == 2 ? 'Sedang' : 'Berat')) ?></td>
            </tr>
            <tr>
                <td colspan="3">Kesimpulan :</td>
            </tr><tr>
                <td></td>
                <td colspan="2" style="text-align: justify;"><?= ($data_form->kesimpulanhpdo) ?></td>
            </tr>
                <td colspan="3">Saran :</td>
            </tr><tr>
                <td></td>
                <td colspan="2" style="text-align: justify;"><?= ($data_form->saranhpdo) ?></td>
            </tr>
            <tr>
                <td width="5%"></td>
                <td width="30%"></td>
                <td width="60%"></td>
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
                        $tanggal_mysql = $data_form->created_at;
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
                        $text_barcode .= "Perihal : Hasil Pemeriksaan Kedokteran Okupasi\n";
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
                    Dokter Spesialis RSUD Kota Tangerang<br><br>
                    <b><?= $data_form->nama_dokter; ?></b><br>
                    NIP. <?= $data_form->nip; ?>
                </td>
            </tr>
        </table>

    </main>

</body>

</html>