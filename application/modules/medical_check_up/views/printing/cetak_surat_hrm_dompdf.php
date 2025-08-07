<html>
<title><?= "Hasil Pemeriksaan MCU" ?></title>
<link rel="icon" type="image/png" href="<?= base_url('resources/images/favicons/favicon-32x32.png') ?>" sizes="32x32">
<link rel="icon" type="image/png" href="<?= base_url('resources/images/favicons/favicon-16x16.png') ?>" sizes="16x16">

<head>
    <style>
        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 3cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2.6cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;

            /** Extra personal styles **/
            /* background-color: #03a9f4; */
            color: white;
            padding: 10px 10px 0px 30px;
            /* text-align: center; */
            line-height: 0.2cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2.5cm;

            /** Extra personal styles **/
            /* background-color: #03a9f4; */
            /* text-align: center; */
            /* padding: 0px 10px 10px 10px; */
            /* border-top: 1px solid #000; */
            line-height: 0.4cm;
            color: #f0f0f0;
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

    // Mengganti semua ~ yang tersisa dengan <br>
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

<body>
    <!-- Define header and footer blocks before your content -->
    <div class="watermark" style="padding-left: 100px;">
        <img src="<?= resource_url() . 'images/logos/rsud-bg-mcu.jpg' ?>" width="130%" alt="Watermark">
    </div>

    <header style="font-family: Arial, sans-serif;">
        <table width="100%" style="color:#000; ">
            <thead>
                <tr>
                    <td rowspan="5" style="width:80px; border-right: 1px solid #000; padding-right: 10px;"><img src="<?= resource_url() . 'images/logos/kota-tangerang-bg-white.jpg' ?>" width="70px"></td>
                    <td rowspan="5" style="width:80px; padding-left:20px;"><img src="<?= resource_url() . 'images/logos/rsud-bg-with.jpg' ?>" width="70px">
                </tr>
                <tr>
                    <td colspan="3" align="left"><b style="font-size: 10pt; padding-left:10px;">PEMERINTAH KOTA TANGERANG</b></td>
                </tr>
                <tr>
                    <td colspan="3" align="left"><b style="font-size: 14pt; padding-left:10px;">RUMAH SAKIT UMUM DAERAH</b></td>
                </tr>
                <tr>
                    <td colspan="3" align="left"><b style="font-size: 14pt; padding-left:10px;">KOTA TANGERANG</b></td>
                </tr>
            </thead>
        </table>


    </header>

    <footer style="font-family: Arial, sans-serif;">
        <table width="100%" style="color:#000; padding: 0px 10px 0px 10px;">
            <!-- <tr>
                <td colspan="2" style="vertical-align: top; text-align: left; border-top: 2px solid #646464;"><b style="font-size: 10pt;"></td>
            </tr>
            <tr>
                <td colspan="2" style="vertical-align: top; text-align: left; border-top: 1px solid #646464;"><b style="font-size: 10pt;"></td>
            </tr> -->
            <tr>
                <td style="vertical-align: top; text-align: left; font-size: 10pt; color: #808080;"><b><i>Jl. Pulau Putri Raya Perumahan Modernland, Kelurahan Kelapa Indah<i></b></td>
                <td style="vertical-align: top; text-align: left; font-size: 10pt; color: #808080;"><b><i></i></b></td>
            </tr>
            <tr>
                <td style="vertical-align: top; text-align: left; font-size: 10pt; color: #808080;"><b><i>Kecamatan Tangerang Telp. 021 2972 0201, 021 2972 0202</i></b></td>
                <td style="vertical-align: top; text-align: right; font-size:10pt;"><i style="color: #808080;">Page <span class="pagenum"></span></i></td>
            </tr>
        </table>
        <img style="padding: 0pt;" src="<?= resource_url() . 'images/logos/6_generated.jpg' ?>" width="100%" height="60%" />
    </footer>

    <!-- Status Kesehatan Saat ini -->
    <main style="page-break-after: auto;">
        <h4 align="center">STATUS KESEHATAN SAAT INI</h4>
        <table style="font-size: 10pt;" width="100%" class="table-space">
            <tr>
                <td colspan="2" class="bold">Tanggal MCU</td>
                <td>: <?= date('Y-m-d', strtotime($layanan->tanggal_layanan)) ?></td>
            </tr>
            <tr>
                <td colspan="3" class="bold">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" class="bold">Nama Lengkap</td>
                <td>: <?= $pasien->nama ?></td>
            </tr>
            <tr>
                <td colspan="2" class="bold">Tanggal Lahir</td>
                <td>: <?= date('Y-m-d', strtotime($pasien->tanggal_lahir)) ?></td>
            </tr>
            <tr>
                <td colspan="2" class="bold">Guarantor</td>
                <td>: <?= $hpmcu->guarantor ?></td>
            </tr>
            <tr>
                <td colspan="2" class="bold">Nomor RM</td>
                <td>: <?= $pasien->id_pasien ?></td>
            </tr>
            <tr>
                <td colspan="2" class="bold">Golongan Darah</td>
                <td>: <?= !empty($hpmcu->golongan_darah) ? $hpmcu->golongan_darah : "-" ?></td>
            </tr>
            <tr class="bg-tab">
                <td colspan="3" class="bold">Riwayat Alergi</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 25px;"><?= !empty($hpmcu->riwayat_alergi) ? $hpmcu->riwayat_alergi : "Tidak Ada" ?></td>
            </tr>
            <tr class="bg-tab">
                <td colspan="3" class="bold">Masalah Kondisi Medis</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 25px;"><?= $hpmcu->masalah_kondisi_medis ?? 'Tidak Ada' ?></td>
            </tr>
            <tr class="bg-tab">
                <td colspan="3" class="bold">Riwayat Konsumsi Obat, vitamin, suplemen dan Herbal saat ini</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 25px;"><?= $hpmcu->riwayat_konsumsi_obat ?? 'Tidak Ada' ?></td>
            </tr>
            <tr class="bg-tab">
                <td colspan="3" class="bold">Riwayat Penyakit Dahulu</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 25px;"><?= $hpmcu->riwayat_penyakit_dahulu ?? 'Tidak Ada' ?></td>
            </tr>
            <tr class="bg-tab">
                <td colspan="3" class="bold">Riwayat Penyakit Keluarga</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 25px;"><?= $hpmcu->riwayat_penyakit_keluarga ?? 'Tidak Ada' ?></td>
            </tr>
            <tr class="bg-tab">
                <td colspan="3" class="bold">Yang dihubungi saat darurat</td>
            </tr>
            <tr>
                <td style="padding-left: 25px;">Nama</td>
                <td colspan="2" style="padding-left: 25px;">: <?= $hpmcu->nama_pjwb ?></td>
            </tr>
            <tr>
                <td style="padding-left: 25px;">Hubungan</td>
                <td colspan="2" style="padding-left: 25px;">: <?= $hpmcu->hubungan_pjwb ?></td>
            </tr>
            <tr>
                <td style="padding-left: 25px;">Telp</td>
                <td colspan="2" style="padding-left: 25px;">: <?= $hpmcu->telp_pjwb ?></td>
            </tr>
            <tr>
                <td width="10%">&nbsp;</td>
                <td width="15%">&nbsp;</td>
                <td width="75%">&nbsp;</td>
            </tr>
        </table>
    </main>
    <!-- End Status Kesehatan Saat ini -->

    <!-- Status Analisa Umum Resiko Kesehatan -->
    <main style="page-break-before: always;">
        <h4 align="center">ANALISA UMUM RESIKO KESEHATAN</h4>
        <p class="main">
            Resume ini memuat hasil kondisi kesehatan anda saat ini yang berhubungan dengan parameter-parameter yang
            didapat dari Formulir Health Risk Questioner. Tujuannya untuk membantu anda memahami masalah kesehatan
            anda serta meningkatkan kesadaran dalam tindakan pencegahan terhadap penyakit yang dapat muncul.
        </p>
        <table style="font-size: 10pt;" width="100%" class="table-space">
            <tr class="bg-tab">
                <td colspan="3" class="bold">Faktor Klinis</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 25px;">
                    <table width="100%" class=" td-top">

                        <?php if (count($faktor_klinis) != 0) : ?>
                            <?php foreach ($faktor_klinis as $v) : ?>
                                <tr>
                                    <td width="35%"><?= $v->pemeriksaan ?></td>
                                    <td width="20%"><?= $v->hasil ?></td>
                                    <td width="35%"><?= $v->keterangan ?></td>
                                </tr>

                                <?php if (isset($v->detail) && count($v->detail) > 0) : ?>
                                    <?php foreach ($v->detail as $val) : ?>
                                        <tr>
                                            <td style="padding-left: 30px;" width="35%"><?= $val->detail_pemeriksaan ?></td>
                                            <td width="20%"><?= $val->detail_hasil ?></td>
                                            <td width="35%"><?= $val->detail_keterangan ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4" class="text-center">Tidak Ada</td>
                            </tr>
                        <?php endif; ?>

                    </table>
                </td>
            </tr>

            <tr class="bg-tab">
                <td colspan="3" class="bold">Riwayat Penyakit Saat ini</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 25px;"><?= $hpmcu->riwayat_penyakit_saat_ini ?></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>

            <tr class="bg-tab">
                <td colspan="3" class="bold">Obat-obatan</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 25px;"><?= $hpmcu->obat_obatan ?? 'Tidak Ada' ?></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>

            <tr class="bg-tab">
                <td colspan="3" class="bold">Vaksinasi</td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 25px;"><?= $hpmcu->vaksinasi ?? 'Tidak Ada' ?></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>

            <tr class="bg-tab">
                <td colspan="3" class="bold">Gaya Hidup</td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left: 25px;"><b>Olahraga</b></td>
                <td style="padding-left: 15px;"><?= $hpmcu->olahraga ?></td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left: 25px;"><b>Merokok</b></td>
                <td style="padding-left: 15px;"><?= $hpmcu->merokok ?></td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left: 25px;"><b>Alkohol</b></td>
                <td style="padding-left: 15px;"><?= $hpmcu->alkohol ?></td>
            </tr>
            <tr>
                <td colspan="2" style="padding-left: 25px;"><b>Zat Adiktif Obat</b></td>
                <td style="padding-left: 15px;"><?= $hpmcu->zat_adiktif ?></td>
            </tr>
            <td width="10%">&nbsp;</td>
            <td width="15%">&nbsp;</td>
            <td width="75%">&nbsp;</td>
            </tr>
        </table>
    </main>
    <!-- End Status Analisa Umum Resiko Kesehatan -->

    <!-- Status Kesimpulan dan Saran -->
    <main style="page-break-before: always;">
        <h4 align="center">KESIMPULAN DAN SARAN</h4>

        <b style="font-size: 10pt;">Kesimpulan</b>
        <div style="padding-left: 25px; font-size: 10pt;">
            <?= $hpmcu->kesimpulan ?>
        </div>

        <div style="page-break-before: always;">
            <br>
            <b style="font-size: 10pt;">Saran</b>
            <div style="padding-left: 25px; font-size: 10pt;">
                <?= $hpmcu->saran ?>
            </div>
            <br>
            <table width="100%" style="font-size: 10pt; text-align: center;">
                <tr>
                    <td width="30%"></td>
                    <td width="30%"></td>
                    <td width="30%">Tangerang, <?= get_date_format($hpmcu->created_at) ?></td>
                </tr>
                <?php if (!empty($layanan->ttd_dokter)) : ?>
                    <?php
                    // Informasi untuk QR Code
                    // $lab_number = $data_laboratorium['laboratorium'][$indexData]->kode;
                    $name = $pasien->nama;
                    $birth_date = $pasien->tanggal_lahir;
                    $specimen_date = get_date_format($layanan->tanggal_layanan);
                    $status = $layanan->dokter;

                    // Gabungkan informasi menjadi satu string
                    $text_barcode = "Hasil MCU RSUD Kota Tangerang\n";
                    // $text_barcode .= "Nomor Laboratorium: $lab_number\n";
                    $text_barcode .= "Nama: $name\n";
                    // $text_barcode .= "Tanggal Lahir: $birth_date\n";
                    $text_barcode .= "Tanggal Kunjungan: $specimen_date\n";
                    $text_barcode .= "Dokter: $status";

                    ?>
                    <tr>
                        <td width="30%"></td>
                        <td width="30%"></td>
                        <td width="30%">
                            <img width="100px" class="qrcode" src="<?php echo site_url('pendaftaran_poli/generate_qrcode_text/' . base64_encode($text_barcode)); ?>" alt="QRCode">
                            <!-- <img class="inverted-image" src="<?= base_url('resources/images/ttd_dokter/') . $layanan->ttd_dokter ?>" width="250"> -->
                        </td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td width="30%"></td>
                        <td width="30%"></td>
                        <td width="30%">
                            <br>
                            <br>
                            <br>
                            <br>
                        </td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td width="30%"></td>
                    <td width="30%"></td>
                    <td width="30%"><u><b><?= $hpmcu->nama_dokter ?></b></u></td>
                </tr>
                <tr>
                    <td width="30%"></td>
                    <td width="30%"></td>
                    <td width="30%">NIP. <?= $hpmcu->nip_dokter ?></td>
                </tr>
            </table>
        </div>
    </main>
    <!-- End Status Kesimpulan dan Saran -->

    <!-- Hasil Pemeriksaan MCU -->
    <?php if (!empty($mcu)) : ?>
        <div style="page-break-before: always;">
            <table width="100%" class="tabel-hasil td-top" id="tabel-cetak-lab" style="font-size: 10pt;">
                <thead>
                    <tr>
                        <th colspan="6">
                            <h4 style="font-size: 12pt;" align="center">HASIL PEMERIKSAAN MCU</h4>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="6">
                            <table style="font-size: 10pt;" width="100%">
                                <tr>
                                    <td width="12%" class="bold">Nama</td>
                                    <td width="31%" style="font-weight: normal;"><?= $pasien->nama ?></td>
                                    <td width="12%" class="bold">Tgl.Lahir</td>
                                    <td width="25%" style="font-weight: normal;"><?= $pasien->tanggal_lahir ?> (<?= cekUmurPasien($pasien->tanggal_lahir) ?> Tahun)</td>
                                    <td width="10%" class="bold">Kelamin</td>
                                    <td width="10%" style="font-weight: normal;"><?= (($pasien->kelamin === 'L') ? 'Laki - Laki' : (($pasien->kelamin === 'P') ? 'Perempuan' : '')) ?></td>
                                </tr>
                                <tr>
                                    <td class="bold">Dokter Lab</td>
                                    <td style="font-weight: normal;"><?= $layanan->dokter ?></td>
                                    <td class="bold">Tgl.MCU</td>
                                    <td style="font-weight: normal;"><?= date('Y-m-d', strtotime($layanan->tanggal_layanan)) ?></td>
                                    <td class="bold">No. RM</td>
                                    <td style="font-weight: normal;"><?= $pasien->id_pasien ?></td>
                                </tr>
                            </table>
                            <br>
                        </th>
                    </tr>
                    <tr>
                        <th style="border-bottom: 1px solid #000;" colspan="6"></th>
                    </tr>
                    <tr style="padding: 10px">
                        <th colspan="2" width="10%" style="font-weight: bold; text-align:left;">JENIS PEMERIKSAAN</th>
                        <th colspan="2" width="1%" style="font-weight: bold; text-align:left; padding-bottom: 10px;">&nbsp;</th>
                        <th colspan="2" width="89%" style="font-weight: bold; text-align:left;">HASIL</th>
                    </tr>
                    <tr>
                        <th style="border-top: 1px solid #000;" colspan="6">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- DATA KESEHATAN PRIBADI -->
                    <tr>
                        <td colspan="2"><b>Data Kesehatan Pribadi</b></td>
                        <td colspan="2"></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Dokter Keluarga</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $mcu->dokter_keluarga ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;Nama Dokter</td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $mcu->nama_notlp_dokter ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;Nama Fasilitas Kesehatan</td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $mcu->faskes ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;NoTelp Dokter</td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $mcu->no_tlp ?></td>
                    </tr>

                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Asuransi Kesehatan</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $mcu->asuransi ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Jenis Asuransi</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $mcu->jenis_asuransi ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;Nama Asuransi</td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $mcu->nama_asuransi ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;Nomor Asuransi</td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $mcu->no_asuransi ?></td>
                    </tr>

                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Golongan Darah</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $mcu->gol_darah ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Rhesus</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $mcu->rhesus ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Medical Check Up Paket</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $mcu->keperluan_mcu ?></td>
                    </tr>
                    <!-- END DATA KESEHATAN PRIBADI -->


                    <!-- RIWAYAT PENYAKIT SEKARANG -->
                    
                    <tr>
                        <td style="padding-top: 10px;" colspan="6"><b>Riwayat Penyakit Sekarang</b></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Keluhan Saat ini</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"> <?= $mcu->riwayat_keluhan_saat_ini ?></td>
                    </tr>

                    
                    <tr>
                        <td style="padding-top: 10px;" colspan="2" width="50%"><b>Riwayat Sistem Saraf</b></td>
                        <td colspan="2"></td>
                        <td colspan="2"> <?= !empty($mcu->sum_rss) ? 'Ada' : 'Tidak Ada'; ?></td>
                    </tr>
                    <?php if (!empty($mcu->rss_radang_selaput)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Radang selaput otak</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rss_lumpuh)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Lumpuh</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rss_polio)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Polio</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rss_ayan)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Epilepsi/Ayan</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rss_stroke)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Stroke</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    
                    <tr>
                        <td style="padding-top: 10px;" colspan="2" width="50%"><b>Riwayat Jantung</b></td>
                        <td colspan="2"></td>
                        <td colspan="2"> <?= !empty($mcu->sum_rj) ? 'Ada' : 'Tidak Ada'; ?></td>
                    </tr>
                    <?php if (!empty($mcu->rj_serangan_jantung)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Serangan Jantung</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rj_nyeri_dada)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Nyeri dada</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rj_rasa_berdebar)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Rasa berdebar</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rj_rtekanan_darting)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Tekanan darah tinggi</li>
                            </td>
                        </tr>
                    <?php endif; ?>

                    
                    <tr>
                        <td style="padding-top: 10px;" colspan="2" width="50%"><b>Riwayat Pernapasan</b></td>
                        <td colspan="2"></td>
                        <td colspan="2"> <?= !empty($mcu->sum_rp) ? 'Ada' : 'Tidak Ada'; ?></td>
                    </tr>
                    <?php if (!empty($mcu->rp_difteri)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Difteri</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rp_sinusitis)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Sinusitis</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rp_bronkitis)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Bronkitis</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rp_batuk_darah)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Batuk darah</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rp_tbc)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>TBC/flek paru</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rp_radang_paru)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Radang paru</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rp_asma)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Asma</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rp_sesak_nafas)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Sesak napas</li>
                            </td>
                        </tr>
                    <?php endif; ?>

                    
                    <tr>
                        <td style="padding-top: 10px;" colspan="2" width="50%"><b>Riwayat Ginjal dan Saluran Kemih </b></td>
                        <td colspan="2"></td>
                        <td colspan="2"> <?= !empty($mcu->sum_rgsk) ? 'Ada' : 'Tidak Ada'; ?></td>
                    </tr>
                    <?php if (!empty($mcu->rgsk_sulit_bak)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Sulit buang air kecil</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rgsk_radang_saluran_kemih)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Radang saluran kemih</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rgsk_penyakit_ginjal)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Penyakit ginjal</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rgsk_kencing_batu)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Kencing batu</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rgsk_sulit_menahan_kemih)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Sulit Menahan kemih</li>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <tr>
                        <td colspan="6">&nbsp;</li>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="50%"><b>Riwayat Kulit & Kelamin</b></td>
                        <td colspan="2"></td>
                        <td colspan="2"> <?= !empty($mcu->sum_rkk) ? 'Ada' : 'Tidak Ada'; ?></td>
                    </tr>
                    <?php if (!empty($mcu->rkk_cacar_air)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Cacar Air</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rkk_jamur_kulit)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Jamur Kulit</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rkk_penyakit_kelamin)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Penyakit kelamin</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rkk_tbc_kulit)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>TBC kulit</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rkk_campak)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Campak</li>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <tr>
                        <td colspan="6">&nbsp;</li>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="50%"><b>Riwayat Saluran Cerna</b></td>
                        <td colspan="2"></td>
                        <td colspan="2"> <?= !empty($mcu->sum_rsc) ? 'Ada' : 'Tidak Ada'; ?></td>
                    </tr>
                    <?php if (!empty($mcu->rsc_tifoid)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Tifoid</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rsc_muntah_darah)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Muntah darah</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rsc_sulit_bab)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Sulit BAB</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rsc_maag)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Sakit lambung/maag</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rsc_penyakit_kuning)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Penyakit kuning</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rsc_penyakit_empedu)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Penyakit empedu</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rsc_sulit_menahan_bab)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Sulit menahan BAB</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rsc_gangguan_menelan)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Gangguan menelan</li>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <tr>
                        <td colspan="6">&nbsp;</li>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="50%"><b>Riwayat Sendi & Tulang</b></td>
                        <td colspan="2"></td>
                        <td colspan="2"> <?= !empty($mcu->sum_rst) ? 'Ada' : 'Tidak Ada'; ?></td>
                    </tr>
                    <?php if (!empty($mcu->rst_reumatik)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Radang sendi/reumatik</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rst_tbc_tulang)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>TBC tulang</li>
                            </td>
                        </tr>
                    <?php endif; ?>

                    
                    <tr>
                        <td style="padding-top: 10px;" colspan="2" width="50%"><b>Riwayat Lainnya</b></td>
                        <td colspan="2"></td>
                        <td colspan="2"> <?= !empty($mcu->sum_rl) ? 'Ada' : 'Tidak Ada'; ?></td>
                    </tr>
                    <?php if (!empty($mcu->rl_alergi_makanan)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Alergi makanan</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rl_alergi_obat)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Alergi obat</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rl_malaria)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Malaria</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rl_gangguan_tidur)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Gangguan tidur</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rl_penyakit_jiwa)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Penyakit jiwa</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rl_kanker)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Tumor ganas/kanker</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rl_gangguan_pendengaran)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Gangguan pendengaran</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rl_gangguan_penglihatan)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Gangguan penglihatan</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rl_sulit_konsentrasi)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Sulit konsentrasi</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <!-- END RIWAYAT PENYAKIT SEKARANG -->


                    <!-- RIWAYAT PENYAKIT DAHULU-->
                    
                    <tr>
                        <td style="padding-top: 10px;" colspan="2" width="50%"><b>Riwayat Penyakit Dahulu (pernah anda alami)</b></td>
                        <td colspan="2"></td>
                        <td colspan="2"> <?= !empty($mcu->sum_rpd) ? 'Ada' : 'Tidak Ada'; ?></td>
                    </tr>
                    <?php if (!empty($mcu->rpd_tuberkulosis)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Tuberculosis/Flek Paru</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_sakit_kuning)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Hepatitis/ Sakit Kuning</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_asma)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Asma</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_artritis)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Artritis/Radang sendi</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_serangan_jantung)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Serangan jantung</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_alergi)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Alergi</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_asam_urat)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Aertritis gout/Asam urat</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_kateterisasi)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Operasi By Pass jantung/kateterisasi</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_kelainan_darah)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Kelainan darah</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_patah_tulang)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Patah tulang/pasang pen</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_wasir)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Hemoroid</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_darting)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Hipertensi/darah tinggi</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_diabetes_melitus)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Diabetes melitus/kencing manis saat hamil</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_gondok)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Penyakit Tiroid/gondok</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_tranfusi_darah)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Tranfusi darah</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_nyeri_tulang_belakang)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Nyeri tulang belakang</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_diabetes)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Diabetes/kencing manis</li>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php if (!empty($mcu->rpd_demam_berdarah)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Demam berdarah</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_stres)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Gangguan psikologi/stres</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_penyakit_ginjal)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Penyakit ginjal & saluran kencing</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_nfeksi_menular_seksual)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Infeksi menular seksual</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_stroke)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Stroke</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_epilepsi)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Epilepsi/ayan/kejang</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_vertigo)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Vertigo/pusing berputar</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_demam_tifoid)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Demam tifoid</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_infeksi_hiv)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Infeksi HIV</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_kelainan_jantung_bawaan)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Kelainan Jantung Bawaan</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_malaria)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Malaria</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_covid)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Covid</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_dirawat_rs)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Di rawat di RS</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_tumor)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Tumor/Kanker</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpd_operasi)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Operasi</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if ($mcu->riwayat_lain !== 'Tidak Ada') : ?>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Riwayat lain</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $mcu->riwayat_lain ?></td>
                    <?php endif; ?>
                    <!-- END RIWAYAT PENYAKIT DAHULU-->


                    <!-- RIWAYAT PENYAKIT KELUARGA -->
                    
                    <tr>
                        <td style="padding-top: 10px;" colspan="2" width="50%"><b>Riwayat Penyakit Keluarga (Pernah dialami keluarga anda) </b></td>
                        <td colspan="2"></td>
                        <td colspan="2"> <?= !empty($mcu->sum_rpk) ? 'Ada' : 'Tidak Ada'; ?></td>
                    </tr>
                    <?php if (!empty($mcu->rpk_hipertensi)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Hipertensi/darah tinggi</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpk_tumor)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Tumor/Kanker</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpk_asma)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Asma</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpk_hemoroid)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Hemoroid / Wasir</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpk_alergi)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Alergi</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpk_tb)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Tuberkulosis/flek paru
                            </td>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpk_stroke)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Stroke</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpk_diabetes)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Diabetes Melitus/Kencing manis</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpk_gangguan_jiwa)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Gangguan Jiwa</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpk_sakit_kuning)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Hepatitis/sakit kuning</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpk_kelainan_darah)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Kelainan darah(Hemofilia, Thalasemia, Leukimia, Anemia)</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpk_penyakit_jantung)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Penyakit Jantung</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->rpk_riwayat_lainnya)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Riw. Penyakit Keluarga lainnya</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <!-- END RIWAYAT PENYAKIT KELUARGA -->


                    <!-- RIWAYAT IMUNISASI -->
                    
                    <tr>
                        <td style="padding-top: 10px;" colspan="2" width="50%"><b>Riwayat Imunisasi (Pernah anda dapatkan sebelumnya usia >18 th)</b></td>
                        <td colspan="2"></td>
                        <td colspan="2"> <?= !empty($mcu->sum_ri) ? 'Ada' : 'Tidak Ada'; ?></td>
                    </tr>
                    <?php if (!empty($mcu->ri_difteri)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Difteri</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->ri_hepatitis_b)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Hepatitis B</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->ri_hpv)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Human Papiloma Virus (HPV)/Anti Kanker Leher Rahim</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->ri_bcg)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>BCG</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->ri_pneumonia)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Pneumonia</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->ri_tetanus)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Tetanus</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->ri_cacar_air)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Cacar air/Penah Menderita</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->ri_mengitis)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Meningitis</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->ri_polio)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Polio</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->ri_rotavirus)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Rotavirus</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->ri_influenza)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Influenza</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->ri_thypoid)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Thypoid</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->ri_mmr)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>MMR(Mump, Measles, Rubela)</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->ri_campak)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Campak</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php if (!empty($mcu->ri_covid)) : ?>
                        <tr>
                            <td colspan="6" style="padding-left: 15px;">
                                <li>Covid</li>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <!-- END RIWAYAT IMUNISASI -->


                    <!-- GAYA HIDUP -->
                    <tr>
                        <td colspan="6">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="6"><b>Gaya Hidup</b></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Status Merokok</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2">
                            <?php
                            $Optionst1 = [
                                'Merokok' => 'Merokok',
                                'Pernah Merokok' => 'Pernah Merokok',
                                'Tidak Pernah Merokok' => 'Tidak Pernah Merokok'
                            ];
                            echo isset($Optionst1[$mcu->status_merokok]) ? $Optionst1[$mcu->status_merokok] : 'Nilai tidak valid';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Status Minum Alkohol</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2">
                            <?php
                            $Optionst2 = [
                                'Minum Alkohol' => 'Minum Alkohol',
                                'Pernah Minum Alkohol' => 'Pernah Minum Alkohol',
                                'Tidak Pernah minum alkohol' => 'Tidak Pernah minum alkohol'
                            ];
                            echo isset($Optionst2[$mcu->status_minum_alkohol]) ? $Optionst2[$mcu->status_minum_alkohol] : 'Nilai tidak valid';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Status Zat adiktif obat</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $mcu->zat_adiktif_obat ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Olahraga</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2">
                            <?php
                            $Optionst4 = [
                                'Rutin Berolahraga' => 'Rutin Berolahraga',
                                'Jarang Berolahraga' => 'Jarang Berolahraga',
                                'Tidak Pernah Berolahraga' => 'Tidak Pernah Berolahraga'
                            ];
                            echo isset($Optionst4[$mcu->olahraga]) ? $Optionst4[$mcu->olahraga] : 'Nilai tidak valid';
                            ?>
                        </td>
                    </tr>
                    <!-- END GAYA HIDUP -->


                    <!-- ALERGI & OBAT -->
                    <tr>
                        <td colspan="6">&nbsp;</td>
                    </tr>
                    <!-- <tr>
                        <td colspan="6"><b>Alergi dan Obat</b></td>
                    </tr> -->
                    <tr>
                        <td colspan="2">
                            <b>Alergi</b>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"> <?= !empty($mcu->alergi) ? "Ada" : "Tidak Ada" ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <!-- <b>Obat-obatan Herbal, Suplemen Vitamin</b><br> -->
                            <b>Obat yang saat ini sering dikonsumsi</b>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"> <?= $mcu->obat_obatan ?></td>
                    </tr>
                    <!-- END ALERGI DAN OBAT -->


                    <!-- PEMERIKSAAN FISIK -->
                    <tr>
                        <td colspan="6">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="6"><b>Pemeriksaan Fisik</b></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Tinggi Badan</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"> <?= $resume_medis->tinggi_badan ?? "-"; ?> cm</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Berat Badan</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->berat_badan ?? "-"; ?> Kg</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>BMI</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2">
                            <?php if (!empty($resume_medis->berat_badan)) :
                                $tbM = $resume_medis->tinggi_badan / 100;
                                $m2 = $tbM * $tbM;
                                $bmi = $resume_medis->berat_badan / $m2;
                            ?>
                                <?= number_format($bmi, 4, '.', '') ?> Kg/m²
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Kepala</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->kepala ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Leher</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->leher ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Thorax</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->thorax ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Pulmo</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->pulmo ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Cor</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->cor ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Abdomen</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->abdomen ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Genitalia</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->genitalia ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Ekstrimitas</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->ekstrimitas ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Prognosis</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->prognosis ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Lingkar Kepala</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->lingkar_kepala ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Hidung</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->hidung ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Telinga</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->telinga ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>tenggorok</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->tenggorok ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Mata</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->mata ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Kulit Kelamin</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->kulit_kelamin ?? "-"; ?></td>
                    </tr>
                    <!-- END PEMERIKSAAN FISIK -->

                </tbody>
            </table>
        </div>
    <?php endif ?>

    <!-- Hasil Pemeriksaan Fisik Anamnesa -->
    <?php if (empty($mcu) && !empty($resume_medis)) : ?>
        <div style="page-break-before: always;">
            <table width="100%" class="tabel-hasil td-top" id="tabel-cetak-lab" style="font-size: 10pt;">
                <thead>
                    <tr>
                        <th colspan="6">
                            <h4 style="font-size: 12pt;" align="center">HASIL PEMERIKSAAN MCU</h4>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="6">
                            <table style="font-size: 10pt;" width="100%">
                                <tr>
                                    <td width="12%" class="bold">Nama</td>
                                    <td width="31%" style="font-weight: normal;"><?= $pasien->nama ?></td>
                                    <td width="12%" class="bold">Tgl.Lahir</td>
                                    <td width="25%" style="font-weight: normal;"><?= $pasien->tanggal_lahir ?> (<?= cekUmurPasien($pasien->tanggal_lahir) ?> Tahun)</td>
                                    <td width="10%" class="bold">Kelamin</td>
                                    <td width="10%" style="font-weight: normal;"><?= (($pasien->kelamin === 'L') ? 'Laki - Laki' : (($pasien->kelamin === 'P') ? 'Perempuan' : '')) ?></td>
                                </tr>
                                <tr>
                                    <td class="bold">Dokter Lab</td>
                                    <td style="font-weight: normal;"><?= $layanan->dokter ?></td>
                                    <td class="bold">Tgl.MCU</td>
                                    <td style="font-weight: normal;"><?= date('Y-m-d', strtotime($layanan->tanggal_layanan)) ?></td>
                                    <td class="bold">No. RM</td>
                                    <td style="font-weight: normal;"><?= $pasien->id_pasien ?></td>
                                </tr>
                            </table>
                            <br>
                        </th>
                    </tr>
                    <tr>
                        <th style="border-bottom: 1px solid #000;" colspan="6"></th>
                    </tr>
                    <tr style="padding: 10px">
                        <th colspan="2" width="10%" style="font-weight: bold; text-align:left;">JENIS PEMERIKSAAN</th>
                        <th colspan="2" width="1%" style="font-weight: bold; text-align:left; padding-bottom: 10px;">&nbsp;</th>
                        <th colspan="2" width="89%" style="font-weight: bold; text-align:left;">HASIL</th>
                    </tr>
                    <tr>
                        <th style="border-top: 1px solid #000;" colspan="6">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PEMERIKSAAN FISIK -->
                    <tr>
                        <td colspan="6">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="6"><b>Pemeriksaan Fisik</b></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Tinggi Badan</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"> <?= $resume_medis->tinggi_badan ?? "-"; ?> cm</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Berat Badan</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->berat_badan ?? "-"; ?> Kg</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>BMI</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2">
                            <?php if (!empty($resume_medis->berat_badan)) :
                                $tbM = $resume_medis->tinggi_badan / 100;
                                $m2 = $tbM * $tbM;
                                $bmi = $resume_medis->berat_badan / $m2;
                            ?>
                                <?= number_format($bmi, 4, '.', '') ?> Kg/m²
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Kepala</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->kepala ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Leher</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->leher ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Thorax</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->thorax ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Pulmo</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->pulmo ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Cor</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->cor ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Abdomen</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->abdomen ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Genitalia</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->genitalia ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Ekstrimitas</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->ekstrimitas ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Prognosis</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->prognosis ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Lingkar Kepala</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->lingkar_kepala ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Hidung</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->hidung ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Telinga</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->telinga ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>tenggorok</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->tenggorok ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Mata</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->mata ?? "-"; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-left: 15px;">
                            <li>Kulit Kelamin</li>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="2"><?= $resume_medis->kulit_kelamin ?? "-"; ?></td>
                    </tr>
                    <!-- END PEMERIKSAAN FISIK -->

                </tbody>
            </table>
        </div>
    <?php endif ?>

    <!-- Hasil Laboratorium -->
    <?php if (!empty($data_laboratorium)) : ?>
        <div>
            <?php

            for ($indexData = 0; $indexData < $data_laboratorium['length']; $indexData++) : ?>

                <!-- Content -->
                <?php if (isset($data_laboratorium['lab_value'][$indexData])) : ?>
                    <?php foreach ($data_laboratorium['lab_value'][$indexData]->detail as $key => $value) :

                        if ($value->specimen->date !== null) :

                            $tanggal_terima = $value->specimen->date;
                            $hasil_terima_tanggal = [$tanggal_terima];
                    ?>



                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif ?>
                <?php $result_terima_tanggal = array_unique($hasil_terima_tanggal);
                $ta_trim_specimen = substr($result_terima_tanggal[0], 6, -6) . '-' . substr($result_terima_tanggal[0], 4, -8) . '-' . substr($result_terima_tanggal[0], 0, 4) . ' ' . substr($result_terima_tanggal[0], 8, -4) . ':' . substr($result_terima_tanggal[0], 10, -2); ?>

                <div style="page-break-before: always;">
                    <!-- <table width="100%" cellspacing="0" cellpadding="0" class="tabel-hasil" id="tabel-cetak-lab" style="border-collapse: collapse; font-size: 11px; font-family: Arial;"> -->
                    <table width="100%" cellspacing="0" cellpadding="0" class="tabel-hasil" id="tabel-cetak-lab" style="font-size: 10pt;">
                        <thead>
                            <tr>
                                <th colspan="6">
                                    <h4 style="font-size: 12pt;" align="center">HASIL PEMERIKSAAN LABORATORIUM</h4>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="6">
                                    <table style="font-size: 10pt;" width="100%">
                                        <tr>
                                            <td width="12%" class="bold">Nama</td>
                                            <td width="31%" style="font-weight: normal;"><?= $data_laboratorium['pendaftaran'][$indexData]['pasien']->nama ?></td>
                                            <td width="12%" class="bold">Tgl.Lahir</td>
                                            <td width="25%" style="font-weight: normal;"><?= dateStrips($data_laboratorium['pendaftaran'][$indexData]['pasien']->tanggal_lahir) ?> (<?= cekUmurPasien($data_laboratorium['pendaftaran'][$indexData]['pasien']->tanggal_lahir) ?> Tahun)</td>
                                            <td width="10%" class="bold">Kelamin</td>
                                            <td width="10%" style="font-weight: normal;"><?= (($data_laboratorium['pendaftaran'][$indexData]['pasien']->kelamin === 'L') ? 'Laki - Laki' : (($data_laboratorium['pendaftaran'][$indexData]['pasien']->kelamin === 'P') ? 'Perempuan' : '')) ?></td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Dokter Lab</td>
                                            <td style="font-weight: normal;"><?= $data_laboratorium['pendaftaran'][$indexData]['layanan']->dokter ?></td>
                                            <td class="bold">Tgl.MCU</td>
                                            <td style="font-weight: normal;"><?= date('Y-m-d', strtotime($layanan->tanggal_layanan)) ?></td>
                                            <td class="bold">No. RM</td>
                                            <td style="font-weight: normal;"><?= $pasien->id_pasien ?></td>
                                        </tr>
                                    </table>
                                    <br>

                                </th>
                            </tr>
                            <tr>
                                <th style="border-bottom: 1px solid #000;" colspan="6"></th>
                            </tr>
                            <tr style="padding: 10px">
                                <th width="25%" style="font-weight: bold; text-align:left;">JENIS PEMERIKSAAN</th>
                                <th width="5%" style="font-weight: bold; text-align:left; padding-bottom: 10px;">&nbsp;</th>
                                <th width="15%" style="font-weight: bold; text-align:left;">HASIL</th>
                                <th width="11%" style="font-weight: bold; text-align:left;">SATUAN</th>
                                <th width="19%" style="font-weight: bold; text-align:left;">NILAI RUJUKAN</th>
                                <th width="25%" style="font-weight: bold; text-align:left;">KETERANGAN</th>
                            </tr>
                            <tr>
                                <th style="border-top: 1px solid #000;" colspan="6">&nbsp;</th>
                            </tr>
                        </thead>
                        <?php if (isset($data_laboratorium['lab_value'][$indexData])) : ?>
                            <?php

                            $arr = [];

                            foreach ($data_laboratorium['lab'][$indexData] as $key => $value) {
                                array_push($arr, $value);
                            }

                            $keys = array_column($arr, 'test_group');
                            array_multisort($keys, SORT_ASC, $arr);

                            $byGroup = group_by("test_group", $arr);

                            foreach ($byGroup as $key => $value) : ?>

                                <tr>
                                    <td style="padding-top:10px; font-weight: bold; vertical-align: top;"><?= $key ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom:5px;"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <?php $orderGroup = group_by("order_testnm", $value);

                                foreach ($orderGroup as $a => $b) : ?>

                                    <tr>
                                        <td style="font-weight: bold; vertical-align: top;"><?= $a ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td style="padding-bottom:5px;"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <?php
                                    $arry = [];
                                    array_push($arry, $b);

                                    foreach ($arry as $c => $d) : ?>

                                        <?php
                                        $ref_range = '';

                                        $volume  = array_column($d, 'disp_seq');
                                        array_multisort($volume, SORT_ASC, $d);

                                        foreach ($d as $e => $f) : ?>
                                            <tr>
                                                <?php if (empty($f['nama'])) : ?>
                                                    <td style="padding-bottom:5px; padding-left: 25px; vertical-align: top;"></td>
                                                <?php else : ?>
                                                    <?php foreach ($f['nama'] as $g => $h) :
                                                        if ($h->nama === 'Hitung Jenis') {
                                                    ?>
                                                            <td style="padding-bottom:5px; font-weight: bold; padding-left: 25px; vertical-align: top;"><?= $h->nama ?></td>
                                                        <?php } else { ?>
                                                            <td style="padding-bottom:5px; padding-left: 25px; vertical-align: top;"><?= $h->nama ?></td>
                                                    <?php }
                                                    endforeach; ?>
                                                <?php endif;

                                                if ($f['flag'] === 'N') {
                                                    $flag = '<td align="left"></td>';
                                                    $td_result_value = '<td style="padding-left:10px; vertical-align: top;" align="left">';
                                                } else {
                                                    $flag = '<td align="left" style="color:red; font-weight: bold; text-align: right; vertical-align: top;">' . $f['flag'] . '</td>';
                                                    $td_result_value = '<td style="padding-left:10px; color:red; font-weight: bold; vertical-align: top;" align="left">';
                                                }

                                                if ($f['ref_range'] === '' && $f['unit'] === '' && $f['test_comment'] === '') {
                                                    if (strlen($f['result_value']) < 10) {

                                                        $ref_range = $td_result_value . $f['result_value'] . '
                                </td>
                                <td align="left" style="vertical-align: top;">' . $f['unit'] . '</td>
                                <td align="left" style="vertical-align: top;">' . $f['ref_range'] . '
                                <td align="left" style="vertical-align: top;">' . replaceEnter($f['test_comment']) . '</td>
                                ';
                                                    } else {

                                                        $ref_range = '<td style="padding-left:10px; vertical-align: top;" align="left" colspan="4">' . $f['result_value'] . '
                          </td>';
                                                    }
                                                } else {

                                                    $ref_range = $td_result_value . $f['result_value'] . '
                                </td>
                                <td align="left" style="vertical-align: top;">' . $f['unit'] . '</td>
                                <td align="left" style="vertical-align: top;">' . $f['ref_range'] . '
                                <td align="left" style="vertical-align: top;">' . replaceEnter($f['test_comment']) . '</td>
                                ';
                                                }

                                                ?>

                                                <?= $flag; ?>
                                                <?= $ref_range; ?>

                                            <?php endforeach; ?>

                                            </tr>

                                        <?php endforeach; ?>



                                    <?php endforeach; ?>


                                <?php endforeach; ?>
                            <?php endif ?>

                    </table>
                    <?php if (isset($data_laboratorium['lab_value'][$indexData])) : ?>
                        <?php if (!empty($data_laboratorium['lab_value'][$indexData]->global_comment)) : ?>
                            <p><span style="font-weight:bold;">Catatan</span><br /><?= $data_laboratorium['lab_value'][$indexData]->global_comment ?></p>
                        <?php endif ?>
                    <?php endif ?>

                </div>
            <?php endfor ?>
        </div>
        <br><br>

    <?php endif ?>

    <!-- Hasil Radiologi -->
    <?php if (!empty($data_radiologi)) : ?>
        <?php foreach ($data_radiologi as $data) : ?>
            <?php foreach ($data['radiologi']->detail as $i => $dataRadiologi) : ?>

                <!-- Content -->
                <?php if ($dataRadiologi->tipe === 'general') : ?>
                    <main style="page-break-before: always;">
                        <h4 align="center">LAPORAN RADIOLOGI</h4>

                        <div style="font-size: 10pt;">
                            <table width="100%" class="td-top">
                                <tr>
                                    <td width="15%">No. RM</td>
                                    <td width="1%">:</td>
                                    <td width="34%" class="bold"><?= $data['pendaftaran']['pasien']->no_rm ?></td>
                                    <td width="3%"></td>
                                    <td width="17%">No. Radiologi</td>
                                    <td width="1%">:</td>
                                    <td width="29%" class="bold"><?= $data['radiologi']->kode ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Pasien</td>
                                    <td>:</td>
                                    <td class="bold"><?= $data['pendaftaran']['pasien']->nama ?></td>
                                    <td></td>
                                    <td>Tgl. Lahir/Umur</td>
                                    <td>:</td>
                                    <td class="bold"><?= datefmysql($data['pendaftaran']['pasien']->tanggal_lahir) ?> (<?= createUmur($data['pendaftaran']['pasien']->tanggal_lahir) ?> Tahun)</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td class="bold"><?= $data['pendaftaran']['pasien']->alamat ?></td>
                                    <td></td>
                                    <td>Kelamin</td>
                                    <td>:</td>
                                    <td class="bold"><?= (($data['pendaftaran']['pasien']->kelamin === 'L' ? 'Laki - laki' : 'Perempuan')) ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Layanan</td>
                                    <td>:</td>
                                    <td class="bold"><?= $data['pendaftaran']['layanan']->jenis_layanan ?> <?= (($data['pendaftaran']['layanan']->jenis_layanan === 'Poliklinik' ? $data['pendaftaran']['layanan']->layanan : '')) ?></td>
                                    <td></td>
                                    <td>Dokter Pengirim</td>
                                    <td>:</td>
                                    <td class="bold"><?= $data['radiologi']->dokter ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Klinis</td>
                                    <td>:</td>
                                    <td class="bold">
                                        <?php
                                        if (!empty($data['diagnosa'])) {
                                            foreach ($data['diagnosa'] as $key => $value) {
                                                if ($value->item !== null && $value->item !== '') {
                                                    echo  $value->item . '<br>';
                                                }
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td></td>
                                    <td>Waktu Konfirmasi</td>
                                    <td>:</td>
                                    <td class="bold"><?= (($data['radiologi']->waktu_konfirm !== null) ? time_reformat($data['radiologi']->waktu_konfirm, 'Y-m-d H:i:s', 'd/m/Y H:i') : '') ?></td>
                                </tr>
                                <tr>
                                    <td>Rontgen</td>
                                    <td>:</td>
                                    <td class="bold"><?= $data['radiologi']->kode ?></td>
                                    <td></td>
                                    <td>Tanggal Permintaan</td>
                                    <td>:</td>
                                    <td class="bold"><?= (($data['radiologi']->waktu_order !== null) ? datetimefmysql($data['radiologi']->waktu_order) : '') ?></td>
                                </tr>
                                <tr>
                                    <td>Pemeriksaan</td>
                                    <td>:</td>
                                    <td class="bold"><?= $dataRadiologi->layanan ?></td>
                                    <td></td>
                                    <td>Waktu Expertise</td>
                                    <td>:</td>
                                    <td class="bold"><?= (($data['radiologi']->waktu_hasil !== null) ? time_reformat($data['radiologi']->waktu_hasil, 'Y-m-d H:i:s', 'd/m/Y H:i') : '') ?></td>
                                </tr>
                                <tr>
                                    <td>Penjamin</td>
                                    <td>:</td>
                                    <td class="bold"><?= $data['pendaftaran']['layanan']->penjamin ?></td>
                                </tr>
                            </table>
                            <br><br>
                            <!-- <br><br> -->

                            <b style="font-weight:bold">HASIL PEMERIKSAAN : </b>
                            <div>
                                <!-- <p> -->
                                <?php if (!empty($dataRadiologi->hasil)) : ?>
                                    <?= $dataRadiologi->hasil ?>
                                <?php else : ?>
                                    <?php
                                    $xPacs = (object)$data['pacs'];
                                    $hasil_expertise = str_replace(
                                        'style="margin-bottom:0in;margin-bottom:.0001pt;"',
                                        'style="margin: 0px; padding: 0px;"',
                                        $xPacs->message
                                    );
                                    ?>
                                    <?= $hasil_expertise ?>
                                <?php endif; ?>
                                <!-- </p> -->
                            </div>
                            <br><br>

                            <div width="100%">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="width: 10%; word-wrap: break-word; overflow-wrap: break-word;">
                                            <img width="100px" style="margin-left: -9px;" class="qrcode" src="<?php echo site_url('pendaftaran_poli/generate_qrcode_url/' . $data['radiologi']->kode); ?>" alt="QRCode">
                                        </td>
                                        <td style="width: 90%;">
                                            <p align="left">
                                                Dokter yang memeriksa :
                                                <br><?= $dataRadiologi->dokter ?>
                                                <br>NIP. <?= $dataRadiologi->nip_dokter ?>
                                                <br>Hasil telah divalidasi dan dicetak otomatis oleh sistem dan tidak diperlukan tanda tangan
                                            </p>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>

                    </main>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endif ?>

    <!-- Hasil EKG -->
    <?php if (!empty($hasil_ekg)) : ?>
        <?php foreach ($hasil_ekg->image_paths as $val) : ?>
            <div style="page-break-before: always;">

                <table width="100%" cellspacing="0" cellpadding="0" class="tabel-hasil" id="tabel-cetak-lab" style="font-size: 10pt;">
                    <thead>
                        <tr>
                            <th colspan="6">
                                <h4 style="font-size: 12pt;" align="center">HASIL PEMERIKSAAN EKG</h4>
                            </th>
                        </tr>
                    </thead>
                    <tr>
                        <td colspan="6" style="text-align: center;">
                            <div style="display: flex; justify-content: center;">
                                <img style="width: auto; height: 740px; " src="<?= $val ?>">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        <?php endforeach ?>

    <?php endif ?>

    <!-- <main style="page-break-before: always;">
        Content Page 3
    </main> -->
</body>

</html>