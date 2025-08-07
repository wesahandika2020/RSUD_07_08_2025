<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<body onload="window.print()">
	<!--=============== HEADER ===============-->
    <header class="header" id="header">
        <div class="header__container container grid">
            <div class="header__container-address grid">
                <img src="<?= resource_url() . 'images/logos/logo-rsud.png' ?>" alt="" class="header__img">
                <p class="header__address">Jl. Pulau Putri Raya Perumahan Modernland <br> Kelurahan Kelapa Indah Kecamatan Tangerang <br> Telp : 021 2972 0201, 021 2972 0202</p>                   
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
						<p class="identity">: <b><?= $pasien->tanggal_lahir; ?></b></p>
						<p class="identity">: <b><?= $pasien->kelamin; ?></b></p>
                    </div>
                </div>
            </div>
        </div>
	</header>

	<!--=============== MAIN ===============-->
    <main class="main">
        <section class="checklist">
            <div class="checklist__container container">
                <h2 class="section__title section">SURGICAL SAFETY CEKLIST RAWAT JALAN</h2>
                <p class="section__subtitle">Ruang Rawat / Unit Kerja : </b></p>
                <br>               
                <!--=============== CHECKLIST TABLE ===============-->
                <table class="small__font">
                    <tbody>
                        <tr>
                            <th colspan="2"  width="33%">SIGN IN <br> (Sebelum local anastesi)</th>
                            <th colspan="2" width="33%">TIME OUT  <br> (Sebelum insisi)</th>
                            <th colspan="2" width="33%">SIGN OUT  <br> (Sebelum pasien keluar ruang tindakan)</th>
                        </tr>
                        <tr>
                            <th colspan="2" width="33%">Dilakukan oleh perawat dan dokter ahli bedah</th>
                            <th colspan="2" width="33%">Dilakukan oleh perawat dan dokter ahli bedah</th>
                            <th colspan="2" width="33%">Dilakukan oleh perawat dan dokter ahli bedah</th>
                        </tr>                
                        <tr>
                            <th colspan="2" width="33%">VERIFIKASI</th>
                            <th colspan="2" width="33%">KELENGKAPAN TIM DAN FASILITAS</th>
                            <th colspan="2" width="33%">BACA SECARA VERBAL</th>
                        </tr>
                        <tr>
                            <td>Identitas dan gelang pasien :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_gelang == '1' ? '&#128505;' : '-'; ?></td>
                            <td>Lengkap :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_lengkap == '1' ? '&#128505;' : '-'; ?></td>
                            <td>Nama tindakan :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_nama_tindakan == '1' ? '&#128505;' : '-'; ?></td>
                        </tr>
                        <tr>
                            <td>Informed Content :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_informed_concent == '1' ? '&#128505;' : '-'; ?></td>
                            <td>Tidak lengkap :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_tidak_lengkap == '1' ? '&#128505;' : '-'; ?></td>
                            <td><b>PEMERIKSAAN KELENGKAPAN SEBELUM LUKA DI TUTUP</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Alasan :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_alasan_2; ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> Dokter bedah :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_dokter_bedah == '1' ? '&#128505;' : '-'; ?></td>
                            <td><b>PEMERIKSAAN KELENGKAPAN PERALATAN TINDAKAN</td>
                            <td></td>
                            <td>Instrument :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_instrument == '1' ? '&#128505;' : '-'; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Operator :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->nama_dokter_1; ?></td>
                            <td>Instrument :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_instrumentt == '1' ? '&#128505;' : '-'; ?></td>
                            <td>Kassa :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_kassa == '1' ? '&#128505;' : '-'; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Anastesi :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->nama_dokter_2; ?></td>
                            <td>Kassa :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_kassaa == '1' ? '&#128505;' : '-'; ?></td>
                            <td>Jarum:</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_jarum == '1' ? '&#128505;' : '-'; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Tindakan :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_nama_tindakann; ?></td>
                            <td>Jarum :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_jarumm == '1' ? '&#128505;' : '-'; ?></td>
                            <td><b>PERIKSA KELENGKAPAN BAHAN PEMERIKSAAN</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Pemberian Tanda Lokasi Tindakan :</td>
                            <td>ya<?= $surgical_safety_ceklist_rawat_jalan->sscrj_lokasi == '1' ? '&#128505;' : '-'; ?>&nbsp;&nbsp;&nbsp;tidak<?= $surgical_safety_ceklist_rawat_jalan->sscrj_lokasi == '0' ? '&#128505;' : '-'; ?></td>
                            <td><b>BACA SECARA VERBAL</b></td>
                            <td></td>
                            <td>Preprat :</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>PEMERIKSAAN TANDA VITAL</b></td>
                            <td></td>
                            <td><b>Tanggal Tindakan :</b></td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_tanggal_tindakan == '1' ? '&#128505;' : '-'; ?></td>
                            <td> Ya :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_preparat == '1' ? '&#128505;' : '-'; ?></td>
                        </tr>
                        <tr>
                            <td>Tekanan Darah :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_tekanan_darah; ?></td>
                            <td>Identitas Pasien :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_identitas_pasien == '1' ? '&#128505;' : '-'; ?></td>
                            <td>PA :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_preparat_pa == '1' ? '&#128505;' : '-'; ?></td>
                        </tr>
                        <tr>
                            <td>Nadi :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_naddi; ?></td>
                            <td>Nama Tindakan :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_nama_tindakkan == '1' ? '&#128505;' : '-'; ?></td>
                            <td>Kultur :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_preparat_kultur == '1' ? '&#128505;' : '-'; ?></td>
                        </tr>
                        <tr>
                            <td>Pernafasan :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_perrnafasan; ?></td>
                            <td>Prosedur Tindakan :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_prosedur_tindakan == '1' ? '&#128505;' : '-'; ?></td>
                            <td>Sitologi :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_preparat_sitologi == '1' ? '&#128505;' : '-'; ?></td>
                        </tr>
                        <tr>
                            <td>Saturasi O2 :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_saturasi_o2; ?></td>
                            <td>lokasi Tindakan :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_lokasi_tindakan == '1' ? '&#128505;' : '-'; ?></td>
                            <td>Tidak :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_preparat == '0' ? '&#128505;' : '-'; ?></td>
                        </tr>
                        <tr>
                            <td>Suhu :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_suhu; ?></td>
                            <td>Informed Consent :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_informed_consent == '1' ? '&#128505;' : '-'; ?></td>
                            <td>Formulir permintaan pemeriksaan :</td>
                            <td>ya<?=$surgical_safety_ceklist_rawat_jalan->sscrj_formulir_permintaan == '1' ? '&#128505;' : '-'; ?>&nbsp;&nbsp;&nbsp; tidak<?= $surgical_safety_ceklist_rawat_jalan->sscrj_formulir_permintaan == '0' ? '&#128505;' : '-'; ?></td>
                        </tr>
                        <tr>
                            <td><b>RIWAYAT ALERGI</b></td>
                            <td></td>
                            <td><b>ANTIBIOTIK PROFALAKSIS</b></td>
                            <td></td>
                            <td>Telah dilengkapi identitas pasien :</td>
                            <td>ya<?=$surgical_safety_ceklist_rawat_jalan->sscrj_telah_dilengkapi == '1' ? '&#128505;' : '-'; ?>&nbsp;&nbsp;&nbsp; tidak<?= $surgical_safety_ceklist_rawat_jalan->sscrj_telah_dilengkapi == '0' ? '&#128505;' : '-'; ?></td>
                        </tr>
                        <tr>
                            <td>Ada,Keterangan :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_keterangan == '1' ? '&#128505;' : '-'; ?></td>
                            <td>Tidak :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_keterangan == '0' ? '&#128505;' : '-'; ?></td>
                            <td>Penjelasan oleh operator kepala keluwarga pasien :</td>
                            <td>ya<?=$surgical_safety_ceklist_rawat_jalan->sscrj_penjelasan == '1' ? '&#128505;' : '-'; ?>&nbsp;&nbsp;&nbsp; tidak<?= $surgical_safety_ceklist_rawat_jalan->sscrj_penjelasan == '0' ? '&#128505;' : '-'; ?></td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Alasan :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_alasan; ?></td>
                        </tr>
                        <tr>
                            <td><b>RENCANA ANASTESI</b></td>
                            <td></td>
                            <td>Ya</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_ya == '1' ? '&#128505;' : '-'; ?></td>
                            <td><b>OBAT-OBATAN YANG DIBERIKAN SELAMA TINDAKAN</b></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td> Local :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_local == '1' ? '&#128505;' : '-'; ?></td>
                            <td>Nama Obat :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->nama_obat; ?></td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_diberikan == '1' ? '&#128505;' : '-'; ?> Diberikan, Alasan</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_aalasan; ?></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td>Dosis Obat :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_dosis_obat; ?></td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_tidak_diberikan == '1' ? '&#128505;' : '-'; ?>Tidak Diberikan, Alasan</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_allasan; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>jam di Berikan :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_jam_di_berikan_obat; ?></td>
                            <td><b>PEMERIKSAAN TANDA VITAL</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Tidak :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_ya == '0' ? '&#128505;' : '-'; ?></td>
                            <td>Kesadaran :</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_kesaddaran; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>FOTO PEMERIKSAAN RADIOLOGI YANG DI PERLUKAN</b></td>
                            <td></td>
                            <td>Tekanan darah : </td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_tekanann_darah; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_dipasang == '1' ? '&#128505;' : '-'; ?>&nbsp;&nbsp;&nbsp;Dipasang, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tidak Di Pasang</td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_tidak_dipasang == '1' ? '&#128505;' : '-'; ?></td>
                            <td>Nadi : </td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_nadii; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Pernafasan : </td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_pernaffasan; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Saturasi : </td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_saturasi; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Suhu : </td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_ssuhu; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Skala Nyeri : </td>
                            <td><?= $surgical_safety_ceklist_rawat_jalan->sscrj_skala_nyeri; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>PEMERIKSAAN KEMBALI LUKA</b>&nbsp;&nbsp;&nbsp;&nbsp;Ada Rembesan<?=$surgical_safety_ceklist_rawat_jalan->sscrj_ada_rembesan == '1' ? '&#128505;' : '-'; ?></td>
                            <td>Tidak ada Rembesan&nbsp;<?= $surgical_safety_ceklist_rawat_jalan->sscrj_tidak_ada_rembesan == '1' ? '&#128505;' : '-'; ?></td>
                        </tr>
                    </tbody>                   
                </table>
                        <br><br>
                        <tr>
                            <td><b>TANGGAL & JAM VERIFIKASI : </b></td>
                            <td>(<?= date("d/m/Y-H:i", strtotime($surgical_safety_ceklist_rawat_jalan->sscrj_tanggal_sign_in)); ?>)</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <br>
                    <tr>
                        <table class="no__border big__line__spacing small__font">
                            <tbody>
                                <!-- <tr></tr> -->
                                    <tr>
                                        <td class="no__border" width="33%" align="center">
                                            NAMA DAN TANDA TANGAN 
                                        </td>
                                        <td class="no__border" width="33%" align="center">
                                            NAMA DAN TANDA TANGAN
                                        </td>
                                        <td class="no__border" width="33%" align="center">
                                            NAMA DAN TANDA TANGAN
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td class="no__border"  align="center">
                                        </td>
                                        <td class="no__border"  align="center">
                                        </td>
                                        <td class="no__border"  align="center">
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td class="no__border"  align="center">
                                        </td>
                                        <td class="no__border"  align="center">
                                        </td>
                                        <td class="no__border"  align="center">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="no__border"  align="center">
                                            <br>
                                            <br>
                                            <br>
                                        </td>
                                        <td class="no__border"  align="center">
                                            <br>
                                            <br>
                                            <br>
                                        </td>
                                        <td class="no__border"  align="center">
                                            <br>
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="no__border"  align="center">(<b><?=$surgical_safety_ceklist_rawat_jalan->nama_perawat_1; ?></b>)
                                        (<b><?=$surgical_safety_ceklist_rawat_jalan->nama_dokter_3; ?></b>)</td>
                                        <td class="no__border"  align="center">(<b><?=$surgical_safety_ceklist_rawat_jalan->nama_perawat_2; ?></b>)
                                        (<b><?=$surgical_safety_ceklist_rawat_jalan->nama_dokter_4; ?></b>)</td>
                                        <td class="no__border"  align="center">(<b><?=$surgical_safety_ceklist_rawat_jalan->nama_perawat_3; ?></b>)
                                        (<b><?=$surgical_safety_ceklist_rawat_jalan->nama_dokter_5; ?></b>)</td>
                                    </tr>

                                    <tr>
                                        <td class="no__border" width="33%" align="center">
                                            ( Perawat )&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;(Dokter Operator)
                                        </td>
                                        <td class="no__border" width="33%" align="center">
                                            ( Perawat ) &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;(Dokter Operator)
                                        </td>
                                        <td class="no__border" width="33%" align="center">
                                            ( Perawat )&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;(Dokter Operator)
                                        </td>
                                    </tr>
                            </tbody>     
                        </table>
                    </tr>
            </div>
            <!-- <br> -->
            <br>
            <p>Terima kasih atas kerjasamanya telah mengisi formulir ini dengan benar dan jelas</p>
            <p class="page__number">FORM-KEP-110-00</p>
        </section>
    </main>
    </body>
<?php die; ?>
	
