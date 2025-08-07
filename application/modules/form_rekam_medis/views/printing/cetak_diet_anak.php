<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<style>
    .laporan-dietetik{
        font-size: 10pt ;
    }
    .judul{
        text-align:center;
        background-color: #d3d3d3;
    }
    .subjudul{
        text-align:center;
    }
    .pl-1 {
        padding-left: 1rem; /* 1rem biasanya setara dengan 16px (tergantung pada pengaturan browser) */
    }
    @media print {
        body {
            -webkit-print-color-adjust: exact; /* Untuk browser berbasis WebKit seperti Chrome */
            print-color-adjust: exact; /* Untuk browser lain */
        }
        @page {
        size: A4; /* Mengatur ukuran kertas A4 */
    }
     /* Memaksa lembaran baru sebelum elemen ini dicetak */
    .page-break-before {
        page-break-before: always;
    }

    /* Memaksa lembaran baru setelah elemen ini dicetak */
    .page-break-after {
        page-break-after: always;
    }

    }
</style>

<body onload="window.print()">
<!-- <body> -->
	<!--=============== HEADER ===============-->
	<header class="header" id="header">
		<div class="header__container2 container">
			<img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
			<div>
				<h1 class="header__title">RSUD KOTA TANGERANG</h1>
				<p class="header__address2">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah
					Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>
			</div>
            <div class="header__container-identity border section">
                <div class="identity__section grid">
                    <div class="identity__section-title">
                        <p class="identity">Nama Lengkap</p>
                        <p class="identity">No. Rekam Medik</p>
                        <p class="identity">Tanggal Lahir</p>
                        <p class="identity">Jenis Kelamin</p>
                    </div>
                    <div class="identity__section-subtitle">
                        <p class="identity">: <b><?= $pasien->nama; ?></b></p>
                        <p class="identity">: <b><?= $pasien->no_rm; ?></b></p>
                        <p class="identity">: <b><?= ($pasien->tanggal_lahir !== '' ? datefmysql($pasien->tanggal_lahir) : '-') ?> (<?= createUmur($pasien->tanggal_lahir) ?> Tahun)</b></p>
                        <p class="identity">: <b><?= $pasien->kelamin; ?></b></p>
                    </div>
                </div>
            </div>
		</div>
	</header>

    <!--=============== MAIN ===============-->

    <main class="main">
        <section class="form__dietetik laporan-dietetik">
			<br>
            <div class="container">
                <table width="100%" class="no__border" style="color:#000; border-bottom: 2px solid #000;">
                    <thead>
                        <tr>
                            <th class="table__little-title no__border">FORMULIR ASUHAN GIZI ANAK</th>
                        </tr>
                    </thead>              
                </table>
                <table class="no__border" style="margin-top: 5px;">
                    <tr>
                        <td class="no__border" width="25%"><small>Ruang / Kelas</small></td>
                        <td class="no__border"><small>: <?= isset($bed) ? str_replace('%20', ' ', $bed) : '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="25%"><small>Tanggal Masuk</small></td>
                        <td class="no__border"><small>: <?= isset($ga->ga_tgl_masuk) ? date('d/m/Y', strtotime($ga->ga_tgl_masuk)) : '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="25%"><small>Tanggal Skrining</small></td>
                        <td class="no__border"><small>: <?= isset($ga->ga_tgl_skrining) ? date('d/m/Y', strtotime($ga->ga_tgl_skrining)) : '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="25%"><small>Diagnosa Medis</small></td>
                        <td class="no__border"><small>: <?= $ga->ga_diagnosa_medis ?? '-' ?></small></td>
                    </tr>
                </table>
                <table class="no__border" style="margin-top: 5px;">
                    <tr>
                        <td class="no__border"><small><b>Risiko malnutrisi berdasarkan hasil skrining gizi oleh perawat, kondisi pasien termasuk kategori :</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1">
                            <small>
                                <?php
                                    if (isset($ga->ga_risiko) && $ga->ga_risiko != '') {
                                        if ($ga->ga_risiko == '1') {
                                            echo 'Risiko rendah (Total skor 0)';
                                        } elseif ($ga->ga_risiko == '2') {
                                            echo 'Risiko sedang (Total skor 1 – 3))';
                                        } elseif ($ga->ga_risiko == '3') {
                                            echo 'Risiko berat (Total skor 4 – 5)';
                                        }
                                    } else {
                                        echo '-';
                                    }
                                ?>
                            </small>
                        </td>
                    </tr>
                </table>
                <table class="no__border" style="margin-top: 5px;">
                    <tr>
                        <td class="no__border judul" colspan="5"><small><b>ASESMEN GIZI</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="5"><small><b>Antropometri :</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1" width="12%"><small>BB</small></td>
                        <td class="no__border" width="10%"><small>: <?= $ga->ga_bb ?? '-' ?> Kg</small></td>
                        <td class="no__border" width="18%"><small>BB/U</small></td>
                        <td class="no__border" width="10%"><small>: <?= $ga->ga_bbu ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small>Kesan : </small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1"><small>PB atau TB</small></td>
                        <td class="no__border"><small>: <?= $ga->ga_bb ?? '-' ?> Cm</small></td>
                        <td class="no__border"><small>PB/U atau TB/U/U</small></td>
                        <td class="no__border"><small>: <?= $ga->ga_bbu ?? '-' ?></small></td>
                        <td class="no__border" rowspan="3"><small><?= nl2br($ga->ga_kesan ?? '-') ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1"><small>BBI</small></td>
                        <td class="no__border"><small>: <?= $ga->ga_bbi ?? '-' ?> Cm</small></td>
                        <td class="no__border"><small>BB/PB atau BB/TB</small></td>
                        <td class="no__border"><small>: <?= $ga->ga_bbpb ?? '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1"><small>LLA</small></td>
                        <td class="no__border"><small>: <?= $ga->ga_lla ?? '-' ?> Cm</small></td>
                        <td class="no__border"><small>HA</small></td>
                        <td class="no__border"><small>: <?= $ga->ga_ha ?? '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="5"><small><b>Biokimia :</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1" colspan="5"><small><?= nl2br($ga->ga_biokimia ?? '-') ?></b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border " colspan="5"><small><b>Klinis / Fisik :</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1" colspan="5"><small><?= nl2br($ga->ga_klinis ?? '-') ?></b></small></td>
                    </tr>
                </table>
                <table class="no__border">
                    <tr>
                        <td class="no__border" colspan="5"><small><b>Riwayat Gizi</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1" colspan="5"><small><b>Alergi Makan :</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1" width="25%"><small>Telur</small></td>
                        <td class="no__border" width="5%"><small><?= $ga->ga_telur == '1' ? '✓' : '✕' ?></small></td>
                        <td class="no__border" width="10%"><small>Udang</small></td>
                        <td class="no__border" width="30%"><small><?= $ga->ga_udang == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1"><small>Susu sapi dan produk olahannya</small></td>
                        <td class="no__border"><small><?= $ga->ga_sapi == '1' ? '✓' : '✕' ?></small></td>
                        <td class="no__border"><small>Ikan</small></td>
                        <td class="no__border"><small><?= $ga->ga_ikan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1"><small>Kacang kedelai/tanah</small></td>
                        <td class="no__border"><small><?= $ga->ga_kedelai == '1' ? '✓' : '✕' ?></small></td>
                        <td class="no__border"><small>Hazelnut/almond</small></td>
                        <td class="no__border"><small><?= $ga->ga_almond == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1"><small>Gluten/gandum</small></td>
                        <td class="no__border"><small><?= $ga->ga_gandum == '1' ? '✓' : '✕' ?></small></td>
                        <td class="no__border"><small>Lainnya</small></td>
                        <td class="no__border"><small><?= $ga->ga_alergi_lainnya ?? '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1" colspan="5"><small><b>Pola Makan :</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1" colspan="5"><small><?= nl2br($ga->ga_pola_makan ?? '-') ?></small></td>
                    </tr>
                </table>
                <table class="no__border">
                    <tr>
                        <td class="no__border"><small><b>Tindak Lanjut :</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1" width="15%"><small>Perlu Asuhan Gizi Lanjut</small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_tindak == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1" width="15%"><small>Belum Perlu Asuhan Gizi Lanjut</small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_tindak == '2' ? '✓' : '✕' ?></small></td>
                    </tr>
                </table>
                <table class="no__border">
                    <tr>
                        <td class="no__border judul" colspan="3"><small><b>DIAGNOSIS GIZI</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border subjudul" width="33.3%"><small><b>PROBLEM</b></small></td>
                        <td class="no__border subjudul" width="33.3%"><small><b>ETIOLOGI</b></small></td>
                        <td class="no__border subjudul" width="33.3%"><small><b>TANDA/GEJALA</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border subjudul"><small><?= $ga->ga_problem ?? '-' ?></small></td>
                        <td class="no__border subjudul"><small><?= $ga->ga_etiologi ?? '-' ?></small></td>
                        <td class="no__border subjudul"><small><?= $ga->ga_gejala ?? '-' ?></small></td>
                    </tr>
                </table>
                <table class="no__border page-break-before">
                    <tr>
                        <td class="no__border judul" colspan="4"><small><b>INTERVENSI GIZI</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="4"><small><b>Preskripsi Diet : <?= $ga->ga_preskripsi ?? '-' ?></b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1" width="25%"><small>Energi</small></td>
                        <td class="no__border" width="25%"><small> : <?= $ga->ga_preskripsi ?? '-' ?></small></td>
                        <td class="no__border" width="25%"><small>Makan Cair</small></td>
                        <td class="no__border" width="25%"><small> : <?= $ga->ga_makanan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1"><small>Lemak</small></td>
                        <td class="no__border"><small> : <?= $ga->ga_lemak ?? '-' ?></small></td>
                        <td class="no__border"><small>Makan Lunak</small></td>
                        <td class="no__border"><small> : <?= $ga->ga_makanan == '2' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1"><small>Protein</small></td>
                        <td class="no__border"><small> : <?= $ga->ga_protein ?? '-' ?></small></td>
                        <td class="no__border"><small>Makan Saring</small></td>
                        <td class="no__border"><small> : <?= $ga->ga_makanan == '3' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1"><small>Karbohidrat</small></td>
                        <td class="no__border"><small> : <?= $ga->ga_karbohidrat ?? '-' ?></small></td>
                        <td class="no__border"><small>Makan Biasa</small></td>
                        <td class="no__border"><small> : <?= $ga->ga_makanan == '4' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1"><small>Cairan</small></td>
                        <td class="no__border"><small> : <?= $ga->ga_karbohidrat ?? '-' ?></small></td>
                        <td class="no__border"><small>Route Diet</small></td>
                        <td class="no__border"><small> : <?= $ga->ga_route ?? '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1"><small></small></td>
                        <td class="no__border"><small></small></td>
                        <td class="no__border"><small>Oral</small></td>
                        <td class="no__border"><small> : <?= $ga->ga_cara_makan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1"><small></small></td>
                        <td class="no__border"><small></small></td>
                        <td class="no__border"><small>NGT</small></td>
                        <td class="no__border"><small> : <?= $ga->ga_cara_makan == '2' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border pl-1"><small></small></td>
                        <td class="no__border"><small></small></td>
                        <td class="no__border"><small>Frekuensi</small></td>
                        <td class="no__border"><small> : <?= $ga->ga_frekuensi ?? '-' ?></small></td>
                    </tr>
                </table>
                <table class="no__border">
                    <tr>
                        <td class="no__border judul"><small><b>RENCANA MONITORING DAN EVALUASI</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small><?= $ga->ga_monitoring ?? '-' ?></small></td>
                    </tr>
                </table>
                <table class="no__border">
                    <tr>
                        <td class="no__border judul" colspan="5"><small><b>MONITORING DAN EVALUASI</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="20%"><small>Tanggal Monev</small></td>
                        <td class="no__border" width="20%"><small>: <?= isset($ga->ga_tgl_monev_1) ? date('d/m/Y', strtotime($ga->ga_tgl_monev_1)) : '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= isset($ga->ga_tgl_monev_2) ? date('d/m/Y', strtotime($ga->ga_tgl_monev_2)) : '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= isset($ga->ga_tgl_monev_3) ? date('d/m/Y', strtotime($ga->ga_tgl_monev_3)) : '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= isset($ga->ga_tgl_monev_4) ? date('d/m/Y', strtotime($ga->ga_tgl_monev_4)) : '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="20%"><small>Antropometri</small></td>
                        <td class="no__border" width="20%"><small>: <?= $ga->ga_antropometri_1 ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_antropometri_2 ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_antropometri_3 ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_antropometri_4 ?? '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="20%"><small>Biokimia</small></td>
                        <td class="no__border" width="20%"><small>: <?= $ga->ga_biokimia_1 ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_biokimia_2 ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_biokimia_3 ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_biokimia_4 ?? '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="20%"><small>Klinis/ Fisik</small></td>
                        <td class="no__border" width="20%"><small>: <?= $ga->ga_klinis_1 ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_klinis_2 ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_klinis_3 ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_klinis_4 ?? '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="20%"><small>Asupan makan</small></td>
                        <td class="no__border" width="20%"><small>: <?= $ga->ga_asupan_1 ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_asupan_2 ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_asupan_3 ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_asupan_4 ?? '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="20%"><small><?= $ga->ga_monitoring_lain ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small>: <?= $ga->ga_monitoring_lain_1 ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_monitoring_lain_2 ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_monitoring_lain_3 ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small><?= $ga->ga_monitoring_lain_4 ?? '-' ?></small></td>
                    </tr>
                </table>
                <!-- <table class="no__border">
                    <tr>
                        <td class="no__border" colspan="3"><small><b>Dalam 1 Bulan terakhir :</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="1%"><small>1.</small></td>
                        <td class="no__border" width="50%"><small>Kesulitan makan</small></td>
                        <td class="no__border" width="1%">:</td>
                        <td class="no__border"><small> <?= $gd->gd_kesulitan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>2.</small></td>
                        <td class="no__border" colspan="2"><small>Makan lebih sedikit dari biasanya</small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border"><small>≺ 1/2 porsi dari biasanya</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_setengah == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border"><small>1/2 - 3/4 porsi dari biasanya</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_tigaperempat == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>3.</small></td>
                        <td class="no__border"><small>Penurunan nafsu makan yang mempengaruhi asupan</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_penurunan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>4.</small></td>
                        <td class="no__border"><small>Perubahan rasa kecap</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_perubahan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>5.</small></td>
                        <td class="no__border"><small>Mual</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_mual == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>6.</small></td>
                        <td class="no__border"><small>Muntah</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_muntah == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>7.</small></td>
                        <td class="no__border"><small>Gangguan / kesulitan mengunyah dan atau menelan</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_gangguan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>8.</small></td>
                        <td class="no__border"><small>Perlu bantuan saat makan / minum</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_perlu == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>10.</small></td>
                        <td class="no__border"><small>Masalah dnegan gigi geligi</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_masalah == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>11.</small></td>
                        <td class="no__border"><small>Diare</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_diare == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>12.</small></td>
                        <td class="no__border"><small>Konstipati</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_konstipati == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>13.</small></td>
                        <td class="no__border"><small>Pendarahn</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_pendarahan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>14.</small></td>
                        <td class="no__border"><small>Banyak bersendawa</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_bersendawa == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>15.</small></td>
                        <td class="no__border"><small>Alergi makan / intoleransi terhadap makanan</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_intoleransi == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>16.</small></td>
                        <td class="no__border"><small>Menjalani diet tertentu</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_diet == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>17.</small></td>
                        <td class="no__border"><small>Makan menggunakan NGT</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_ngt == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><br></td>
                    </tr>
                    <tr>
                        <td class="no__border judul" colspan="4"><small><b>ASESMEN GIZI</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>18.</small></td>
                        <td class="no__border"><small>Merasa lemah / tidak bertenaga</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_lemah == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>19.</small></td>
                        <td class="no__border"><small>Dirawat di RS dalam jangka setahun terakhir</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_dirawat == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>20.</small></td>
                        <td class="no__border" colspan="2"><small>Penurunan BB</small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border"><small>Lebih dari 3 kg dalam 1 bulan terakhir</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_tigakg == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border"><small>Lebih dari 6 kg dalam 1 bulan terakhir</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> <?= $gd->gd_enamkg == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>21.</small></td>
                        <td class="no__border"><small>Penyakit</small></td>
                        <td class="no__border">:</td>
                        <td class="no__border"><small> 
                                <?php
                                    if (isset($gd->gd_penyakit) && $gd->gd_penyakit != '') {
                                        if ($gd->gd_penyakit == '1') {
                                            echo 'Penyakit keganasan ';
                                        } elseif ($gd->gd_penyakit == '2') {
                                            echo 'Infeksi kronis ';
                                        } elseif ($gd->gd_penyakit == '3') {
                                            echo 'Luka bakar ';
                                        } elseif ($gd->gd_penyakit == '4') {
                                            echo 'Cidera kepala ';
                                        } elseif ($gd->gd_penyakit == '5') {
                                            echo 'Gagal ginjal ';
                                        }
                                    } if (isset($gd->gd_penyakit_lainnya) && $gd->gd_penyakit_lainnya != '') {
                                        echo $gd->gd_penyakit_lainnya;
                                    } else {
                                        echo '✕';
                                    }
                                ?>
                            </small>
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>22.</small></td>
                        <td class="no__border" colspan="3"><small>Data penunjang lainnya / Laboratorium</small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border" colspan="3"><small><?= nl2br($gd->gd_laboratorium ?? '-') ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>23.</small></td>
                        <td class="no__border" colspan="3"><small>Klinis / Fisik</small></td>
                    </tr>
                    <tr>
                        <td class="no__border"></td>
                        <td class="no__border" colspan="3"><small><?= nl2br($gd->gd_klinis ?? '-') ?></small></td>
                    </tr>
                </table> -->
                <!-- <table class="no__border">
                    <tr>
                        <td class="no__border judul" colspan="3"><small><b>DIAGNOSIS GIZI</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border subjudul" width="33.33%"><small><b>Problem</b></small></td>
                        <td class="no__border subjudul" width="33.33%"><small><b>Etiologi</b></small></td>
                        <td class="no__border subjudul" width="33.33%"><small><b>Tanda/gejala</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border 
                            <?php if ($gd->gd_problem === null) {
                                echo 'subjudul'; // Menambahkan titik koma
                            } ?>
                        ">
                            <small>
                                <?= nl2br(htmlspecialchars($gd->gd_problem ?? '-')) ?>
                            </small>
                        </td>
                        <td class="no__border 
                            <?php if ($gd->gd_problem === null) {
                                echo 'subjudul'; // Menambahkan titik koma
                            } ?>
                        ">
                            <small>
                                <?= nl2br(htmlspecialchars($gd->gd_etiologi ?? '-')) ?>
                            </small>
                        </td>
                        <td class="no__border 
                            <?php if ($gd->gd_problem === null) {
                                echo 'subjudul'; // Menambahkan titik koma
                            } ?>
                        ">
                            <small>
                                <?= nl2br(htmlspecialchars($gd->gd_gejala ?? '-')) ?>
                            </small>
                        </td>
                    </tr>
                </table> -->
                <!-- <table class="no__border">
                    <tr>
                        <td class="no__border judul" colspan="4"><small><b>INTERVENSI GIZI</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" colspan="4"><small><b>Preskripsi Diet : </b><?= $gd->gd_preskripsi ?? '-' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border" width="20%"><small>Energi</small></td>
                        <td class="no__border" width="40%"><small>: <?= $gd->gd_energi ?? '-' ?></small></td>
                        <td class="no__border" width="20%"><small>Makanan Cair</small></td>
                        <td class="no__border" width="20%"><small>: <?= $gd->gd_jenis_makanan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>Lemak</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_lemak ?? '-' ?></small></td>
                        <td class="no__border"><small>Makanan Lunak</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_jenis_makanan == '2' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>Protein</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_protein ?? '-' ?></small></td>
                        <td class="no__border"><small>Makanan Saring</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_jenis_makanan == '3' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>Karbohidrat</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_karbohidrat ?? '-' ?></small></td>
                        <td class="no__border"><small>Makanan Biasa</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_jenis_makanan == '4' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>Cairan</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_cairan ?? '-' ?></small></td>
                        <td class="no__border"><small>Oral</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_cara_makan == '1' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>Route Diet</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_route ?? '-' ?></small></td>
                        <td class="no__border"><small>NGT</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_cara_makan == '2' ? '✓' : '✕' ?></small></td>
                    </tr>
                    <tr>
                        <td class="no__border"><small>Frekuensi</small></td>
                        <td class="no__border"><small>: <?= $gd->gd_frekuensi ?? '-' ?></small></td>
                        <td class="no__border" colspan="2"></td>
                    </tr>
                    <tr>
                        <td class="no__border judul" colspan="4"><small><b>MONITORING DAN EVALUASI</b></small></td>
                    </tr>
                    <tr>
                        <td class="no__border 
                            <?php if ($gd->gd_monitoring === null) {
                                echo 'subjudul'; // Menambahkan titik koma
                            } ?>
                        " colspan="4">
                            <small>
                                <?= nl2br(htmlspecialchars($gd->gd_monitoring ?? '-')) ?>
                            </small>
                        </td>
                    </tr>
                </table> -->
                <table class="no__border" style="color:#000; border-top: 2px solid #000; margin-top: 20px;">
                    <tr>
                        <td class="no__border subjudul" width="50%">
                            <small>
                                <?php
                                    // Ambil data tanggal dan waktu dari variabel
                                    $tanggal_waktu = $ga->ga_tgl_petugas; // Contoh: "2024-09-17 10:09"

                                    // Ubah string menjadi objek DateTime
                                    $date = new DateTime($tanggal_waktu);

                                    // Format tanggal menjadi "17/09/2024"
                                    $formatted_date = $date->format('d/m/Y');

                                    // Dapatkan jam dari waktu
                                    $formatted_time = $date->format('H:i');

                                    // Cetak hasil
                                    echo "Tanggal, " . $formatted_date . " Pukul: " . $formatted_time;
                                ?>
                            </small>
                        </td>
                        <td class="no__border subjudul"></td>
                    </tr>
                    <tr>
                        <td class="no__border subjudul"><small>Dietesien / Nutrisionist</small></td>
                        <td class="no__border subjudul"><small>Dokter</small></td>
                    </tr>
                    <tr>
                        <td class="no__border subjudul">
                            <?php
                                if (isset($ga->ttd) && $ga->ttd != '') {
                                    echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $ga->ttd . '" alt="ttd-petugas" width="300">';
                                } else {
                                    echo '<br><br><br><br>';
                                }
                            ?>
                            
                        </td>
                        <td class="no__border subjudul">
                            <?php
                                if (isset($ga->ttd_dokter) && $ga->ttd_dokter != '') {
                                    echo '<img src="' . resource_url() . 'images/ttd_dokter/' . $ga->ttd_dokter . '" alt="ttd-dokter" width="300">';
                                } else {
                                    echo '<br><br><br><br>';
                                }
                            ?>
                            
                        </td>
                    </tr>
                    <tr>
                        <td class="no__border subjudul"><small><?= $ga->petugas ?? '-' ?></small></td>
                        <td class="no__border subjudul"><small><?= $ga->dokter ?? '-' ?></small></td>
                    </tr>
                </table>
            </div>
            <br>
            <br>    
            <br>
        </section>      
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer">
        <div class="footer__container container grid">
            <p class="page__number">FORM-GZ-03-01</p>
        </div>
    </footer>
</body>
<?php die; ?>
