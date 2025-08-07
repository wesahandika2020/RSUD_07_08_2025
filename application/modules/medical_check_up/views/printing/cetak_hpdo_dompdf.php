<!-- // HPDO -->
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


    <!-- Hasil Okupasi -->
    <?php if (!empty($hasil_okupasi)) : ?>
        <div style="font-family: Arial, sans-serif;">
            <h4 style="text-align: center;"><?= uppercaseWords("Hasil Pemeriksaan Kedokteran Okupasi") ?></h4>
            <table style="font-size: 10pt; width: 100%; border-collapse: collapse;" class="td-top">
                <tr>
                    <td width="18%">&nbsp;</td>
                    <td width="18%">&nbsp;</td>
                    <td width="30%">&nbsp;</td>
                    <td width="3%">&nbsp;</td>
                    <td width="31%">&nbsp;</td>
                </tr>
                <tr>
                    <td><b>Nama</b></td>
                    <td colspan="4">: <?= $pasien->nama ?></td>
                </tr>
                <tr>
                    <td><b>Umur</b></td>
                    <td colspan="4">: <?= cekUmurPasien($pasien->tanggal_lahir) ?> Tahun</td>
                </tr>
                <tr>
                    <td><b>Jenis Kelamin</b></td>
                    <td colspan="4">: <?= (($pasien->kelamin === 'L') ? 'Laki - Laki' : (($pasien->kelamin === 'P') ? 'Perempuan' : '')) ?></td>
                </tr>
                <tr>
                    <td><b>Pekerjaan</b></td>
                    <td colspan="4">: <?= ucwords(strtolower($pasien->pekerjaan)) ?></td>
                </tr>
                <tr>
                    <td colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2">Keluhan Terkait Pekerjaan</td>
                    <td colspan="3">: <?= $hasil_okupasi->keluhan_hpdo ?? "-" ?></td>
                </tr>
                <tr>
                    <td colspan="2">Masa Kerja</td>
                    <td colspan="3">: <?= $hasil_okupasi->masakerja_hpdo; ?></td>
                </tr>
                <tr>
                    <td colspan="2">Deskripsi Kerja</td>
                    <td colspan="3">: <?= $hasil_okupasi->uraian_hpdo; ?></td>
                </tr>

                <tr>
                    <td colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <td class="no__border" colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2">Risiko Kerja</td>
                    <td class="no__border">: Fisik</td>
                    <td class="no__border" colspan="2">: </td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Bising</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->bising_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Ketinggian</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->ketinggian_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Getaran Tubuh</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->gtubuh_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Getaran Tangan</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->gtangan_hpdo == 1 ? 'Ya' : 'Tidak' ?> </td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Suhu panas/dingin</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->suhu_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Radiasi</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->radiasi_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Lain - lain</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->lain_hpdo == 1 ? 'Ya' : 'Tidak' ?> </td>
                </tr>
                <tr>
                    <td class="no__border" colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2">&nbsp;</td>
                    <td class="no__border"> Kimia</td>
                    <td class="no__border" colspan="2">: </td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Debu</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->debu_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Zat Kimia</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->zatkimia_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Pestisida</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->pestisida_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Asap</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->asap_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Lain - lain</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->lainn_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2">&nbsp;</td>
                    <td class="no__border"> Biologi</td>
                    <td class="no__border" colspan="2"> : </td>
                </tr>

                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Bakteri</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->bakteri_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Virus</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->virus_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>

                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Parasit</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->parasit_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Jamur</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->jamur_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Lainnya</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->lainnya_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2">&nbsp;</td>
                    <td class="no__border"> Ergonomi</td>
                    <td class="no__border" colspan="2">: </td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Gerak berulang</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->gberulang_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Angkat-Angkut Berat</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->angkat_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Berdiri Terus >4jam</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->berdiri_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Duduk Terus >4jam</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->duduk_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Posisi Tubuh Janggal</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->posisi_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Pencahayaan Tidak Sesuai</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->pencahayaan_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Bekerja Dengan Monitor >4jam</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->bekerja_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Lain-Lain</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->laint_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2">&nbsp;</td>
                    <td class="no__border">Psikososial</td>
                    <td class="no__border" colspan="2">: </td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Beban Kerja Berlebih/Tidak Sesuai</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->bebankerja_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Kerja Gilir/Shift</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->kerjagilir_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Ketidakjelasan Tugas</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->ketidakjelasan_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Pekerjaan Monoton</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->pekerjaan_monoton_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Konflik Di Tempat Kerja</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->konflik_kerja_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" style="padding-left: 20px;">
                        <li>Tuntutan Kerja Tinggi</li>
                    </td>
                    <td class="no__border" colspan="2"> : <?= $hasil_okupasi->tuntutan_hpdo == 1 ? 'Ya' : 'Tidak' ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <!-- <td class="no__border" colspan="5">Berdasarkan Pemeriksaan Self Reporting Quetionnaire 29 (SRQ-29) : Gejala Gangguan mental emosional <b><!= $hasil_okupasi->gejala_hpdo == 1 ? 'Ada' : 'Tidak Ada' ?></b> </td> -->
                    <td class="no__border" colspan="5">Berdasarkan Pemeriksaan Self Reporting Quetionnaire 29 (SRQ-29) :</td>
                </tr>
                <tr>
                    <td class="no__border" colspan="5"><?= $hasil_okupasi->keterangan_hpdo; ?></td>
                </tr>
                <tr>
                    <td class="no__border" colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <td class="no__border" colspan="5">Berdasarkan Pemeriksaan Survey Diagnosis Stress (SDS) :</td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" colspan="2" style="padding-left: 9px;">
                        <b>&bull;</b> Ketaksaan Peran
                    </td>
                    <td class="no__border">:
                        <?= $hasil_okupasi->ketaksaan == 0 ? '-' : ($hasil_okupasi->ketaksaan == 1 ? 'Ringan' : ($hasil_okupasi->ketaksaan == 2 ? 'Sedang' : 'Berat')) ?>
                    </td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" colspan="2" style="padding-left: 9px;">
                        <b>&bull;</b> Konflik peran
                    </td>
                    <td class="no__border"> :
                        <?= $hasil_okupasi->konflikk == 0 ? '-' : ($hasil_okupasi->konflikk == 1 ? 'Ringan' : ($hasil_okupasi->konflikk == 2 ? 'Sedang' : 'Berat')) ?>
                    </td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" colspan="2" style="padding-left: 9px;">
                        <b>&bull;</b> Beban kerja kuantitatif
                    </td>
                    <td class="no__border"> :
                        <?= $hasil_okupasi->kuantitatif == 0 ? '-' : ($hasil_okupasi->kuantitatif == 1 ? 'Ringan' : ($hasil_okupasi->kuantitatif == 2 ? 'Sedang' : 'Berat')) ?>
                    </td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" colspan="2" style="padding-left: 9px;">
                        <b>&bull;</b> Beban kerja kualitatif
                    </td>
                    <td class="no__border"> :
                        <?= $hasil_okupasi->kualitatif == 0 ? '-' : ($hasil_okupasi->kualitatif == 1 ? 'Ringan' : ($hasil_okupasi->kualitatif == 2 ? 'Sedang' : 'Berat')) ?>
                    </td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" colspan="2" style="padding-left: 9px;">
                        <b>&bull;</b> Pengembangan karir
                    </td>
                    <td class="no__border"> :
                        <?= $hasil_okupasi->pengembang == 0 ? '-' : ($hasil_okupasi->pengembang == 1 ? 'Ringan' : ($hasil_okupasi->pengembang == 2 ? 'Sedang' : 'Berat')) ?>
                    </td>
                </tr>
                <tr>
                    <td class="no__border" colspan="2"></td>
                    <td class="no__border" colspan="2" style="padding-left: 9px;">
                        <b>&bull;</b> Tanggungjawab terhadap oranglain
                    </td>
                    <td class="no__border"> :
                        <?= $hasil_okupasi->tanggungjewab == 0 ? '-' : ($hasil_okupasi->tanggungjewab == 1 ? 'Ringan' : ($hasil_okupasi->tanggungjewab == 2 ? 'Sedang' : 'Berat')) ?>
                    </td>
                </tr>
                <tr>
                    <td class="no__border" colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <td width="36%" colspan="2">Kesimpulan</td>
                    <td width="64%" colspan="3" style="margin-left: 10px; word-wrap: break-word; word-break: break-word;">
                        : <?= (($hasil_okupasi->kesimpulanhpdo)); ?>
                    </td>
                </tr>

            </table>

            <div style="page-break-before: always;">
                <table style="font-size: 10pt; width: 100%; border-collapse: collapse;" class="td-top">
                    <tr>
                        <td width="18%">&nbsp;</td>
                        <td width="18%">&nbsp;</td>
                        <td width="30%">&nbsp;</td>
                        <td width="3%">&nbsp;</td>
                        <td width="31%">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="36%" colspan="2">Saran</td>
                        <td width="64%" colspan="3" style="margin-left: 10px; word-wrap: break-word; word-break: break-word;">
                            : <?= (($hasil_okupasi->saranhpdo)); ?>
                        </td>
                    </tr>
                </table>
                <table width="100%" style="font-size: 10pt; text-align: center;">
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="30%"></td>
                        <td width="30%"></td>
                        <td width="30%">Tangerang, <?= get_date_format($hasil_okupasi->created_at) ?></td>
                    </tr>
                    <?php
                    $name = $pasien->nama;
                    $birth_date = $pasien->tanggal_lahir;
                    $specimen_date = get_date_format($hasil_okupasi->created_at);
                    $status = $hasil_okupasi->nama_dokter;

                    $text_barcode = "Hasil Pemeriksaan Okupasi\n";
                    $text_barcode .= "Nama: $name\n";
                    $text_barcode .= "Tanggal: $specimen_date\n";
                    $text_barcode .= "Dokter: $status";

                    ?>
                    <tr>
                        <td width="30%"></td>
                        <td width="30%"></td>
                        <td width="30%">
                            <img width="100px" class="qrcode" src="<?php echo site_url('pendaftaran_poli/generate_qrcode_text/' . base64_encode($text_barcode)); ?>" alt="QRCode">
                        </td>
                    </tr>

                    <tr>
                        <td width="30%"></td>
                        <td width="30%"></td>
                        <td width="30%"><u><b><?= $hasil_okupasi->nama_dokter ?></b></u></td>
                    </tr>
                    <tr>
                        <td width="30%"></td>
                        <td width="30%"></td>
                        <td width="30%">NIP. <?= $hasil_okupasi->nip ?></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php endif ?>
   </body>
</html>