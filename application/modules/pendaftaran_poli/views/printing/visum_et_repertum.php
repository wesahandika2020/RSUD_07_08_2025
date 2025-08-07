<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?= resource_url() . 'assets/css/print-form-rekam-medis.css' ?>">

<title>Document</title>

<body onload="window.print()">
	<!--=============== MAIN ===============-->
    <main class="main">
        <section class="visum__et__repertum">
            <div class="visum__et__repertum__container container section">
                <table class="no__border small__font" style="font-family: 'Times New Roman', Times, serif;">
                    <tbody>
                        <tr>
                            <td class="no__border" align="center">VISUM ET REPERTUM</td>
                        </tr>
                        <tr>
                            <td class="no__border" align="center">No : </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <hr class="container">

                <table class="no__border justify small__font" style="font-family: 'Times New Roman', Times, serif; line-height: 2;">
                    <tbody>
                        <tr>
                            <td class="no__border">Atas permintaan tertulis dari Kepolisian Negara Republik Indonesia Daerah Kota Tangerang Resort Kota Tangerang, melalui surat <b><?= $visum_et_repertum->nomor_surat; ?></b> bulan <b><?= $visum_et_repertum->bulan_surat; ?></b> tahun <b><?= $visum_et_repertum->tahun_surat; ?></b>, Nomor Polisi <b><?= $visum_et_repertum->nomor_polisi; ?></b>, yang ditanda tangani oleh <b><?= $visum_et_repertum->ditandatangani_oleh; ?></b>, pangkat <b><?= $visum_et_repertum->pangkat; ?></b>, NRP <b><?= $visum_et_repertum->nrp; ?></b>, dan diterima tanggal <b><?= date("d/m/Y H:i", strtotime($visum_et_repertum->diterima)); ?></b>, maka dengan ini saya sebagai dokter yang bekerja di RSUD KOTA TANGERANG, menerangkan bawah tanggal <b><?= date("d/m/Y H:i", strtotime($visum_et_repertum->diperiksa)); ?></b> wib di Instalasi Gawat Darurat, Rumah Sakit Umum Daerah Kota Tangaerang telah memeriksa pasien yang berdasarkan surat permintaan tersebut diatas, bernama <b><?= $pasien->nama; ?></b>, umur <b><?= createUmur2($pasien->tanggal_lahir) ?></b>, jenis kelamin <b><?= $pasien->kelamin; ?></b>, pekerjaan <b><?= $pasien->pekerjaan; ?></b>, alamat rumah <b><?= $pasien->alamat; ?></b></td>
                        </tr>                        
                    </tbody>
                </table>
                <br>
                <table class="no__border justify small__font" style="font-family: 'Times New Roman', Times, serif;">
                    <tbody>
                        <tr>
                            <td class="no__border" colspan="6">Hasil Pemeriksaan : </td>
                        </tr>                        
                        <tr>
                            <td class="no__border" colspan="6">Dari hasil pemeriksaan luar atas tubuh pasien tersebut diatas ditemukan fakta-fakta sebagai berikut : </td>
                        </tr> 
                        <tr>
                            <td class="no__border" width="1%">A.</td>
                            <td class="no__border" colspan="6">Fakta yang berkaitan dengan identitas pasien</td>
                        </tr>  
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">1)</td>
                            <td class="no__border" colspan="5">Pasien</td>
                        </tr>  
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">a.</td>
                            <td class="no__border" colspan="2">Jenis Kelamin</td>
                            <td class="no__border" colspan="2">: <b><?= $pasien->kelamin; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">b.</td>
                            <td class="no__border" colspan="2">Umur</td>
                            <td class="no__border" colspan="2">: <b><?= createUmur2($pasien->tanggal_lahir) ?></b> Tahun</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">c.</td>
                            <td class="no__border" colspan="2">Berat Badan</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->berat_badan; ?></b> Kg</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">d.</td>
                            <td class="no__border" colspan="2">Panjang Badan</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->panjang_badan; ?></b> m</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">e.</td>
                            <td class="no__border" colspan="2">Warna Kulit</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->warna_kulit; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">f.</td>
                            <td class="no__border" colspan="2">Warna Pelangi Mata</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->warna_pelangi_mata; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">g.</td>
                            <td class="no__border" colspan="2">Ciri Rambut</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->ciri_rambut; ?></b>, warna rambut <b><?= $visum_et_repertum->warna_rambut; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">h.</td>
                            <td class="no__border" colspan="2">Keadaan gizi</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->keadaan_gizi; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">2)</td>
                            <td class="no__border" colspan="5">Identitas Pasien</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">a.</td>
                            <td class="no__border" colspan="2">Tato</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->tato == 'Ada' ? $visum_et_repertum->tato . ' di ' . $visum_et_repertum->posisi_tato: $visum_et_repertum->tato; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">b.</td>
                            <td class="no__border" colspan="2">Jaringan parut</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->jaringan_parut == 'Ada' ? $visum_et_repertum->jaringan_parut . ' di ' . $visum_et_repertum->posisi_jaringan_parut: $visum_et_repertum->jaringan_parut; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">c.</td>
                            <td class="no__border" colspan="2">Tahi lalat</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->tahi_lalat == 'Ada' ? $visum_et_repertum->tahi_lalat . ' di ' . $visum_et_repertum->posisi_tahi_lalat: $visum_et_repertum->tahi_lalat; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">d.</td>
                            <td class="no__border" colspan="2">Tanda lahir</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->tanda_lahir == 'Ada' ? $visum_et_repertum->tanda_lahir . ' di ' . $visum_et_repertum->posisi_tanda_lahir: $visum_et_repertum->tanda_lahir; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">e.</td>
                            <td class="no__border" colspan="2">Cacat fisik</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->cacat_fisik	 == 'Ada' ? $visum_et_repertum->cacat_fisik	 . ' di ' . $visum_et_repertum->posisi_cacat_fisik	: $visum_et_repertum->cacat_fisik	; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">f.</td>
                            <td class="no__border" colspan="2">Pakaian</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->pakaian . ', warna ' . $visum_et_repertum->warna_pakaian . ', bahan ' . $visum_et_repertum->bahan_pakaian . ', merk ' . $visum_et_repertum->merk_pakaian . ' ukuran ' . $visum_et_repertum->ukuran_pakaian . ', gambar lambang ' . $visum_et_repertum->gambar_lambang_pakaian . ' tampak ' . $visum_et_repertum->tampak_pakaian . '. ' . $visum_et_repertum->celana . ': warna ' . $visum_et_repertum->warna_celana . ', ukuran ' . $visum_et_repertum->ukuran_celana . ' merk ' . $visum_et_repertum->merk_celana; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">g.</td>
                            <td class="no__border" colspan="2">Perhiasan</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->perhiasan; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">h.</td>
                            <td class="no__border" colspan="2">Lain-lain</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->lain_lain_identitas_pasien; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%">B.</td>
                            <td class="no__border" colspan="6">Fakta dari pemeriksaan tubuh bagian luar</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">1)</td>
                            <td class="no__border" colspan="5">Permukaan kulit</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" colspan="5">Tubuh : <b><?= $visum_et_repertum->tubuh; ?></b></td>                            
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">a.</td>
                            <td class="no__border" colspan="4">Kepala</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border" width="29%">Daerah berambut</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->daerah_berambut == 'Ada kelainan' ? $visum_et_repertum->daerah_berambut . ' ' . $visum_et_repertum->kelainan_daerah_rambut : $visum_et_repertum->daerah_berambut; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border" width="29%">Bentuk kepala</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->wajah == 'Ada kelainan' ? $visum_et_repertum->bentuk_kepala . ' ' . $visum_et_repertum->kelainan_bentuk_kepala : $visum_et_repertum->bentuk_kepala; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border" width="29%">Wajah</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->wajah == 'Ada kelainan' ? $visum_et_repertum->wajah . ' ' . $visum_et_repertum->kelainan_wajah : $visum_et_repertum->wajah; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">b.</td>
                            <td class="no__border" colspan="2">Leher</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->leher == 'Ada kelainan' ? $visum_et_repertum->leher . ' ' . $visum_et_repertum->kelainan_leher : $visum_et_repertum->leher; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">c.</td>
                            <td class="no__border" colspan="2">Bahu</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->bahu == 'Ada kelainan' ? $visum_et_repertum->bahu . ' ' . $visum_et_repertum->kelainan_bahu : $visum_et_repertum->bahu; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">d.</td>
                            <td class="no__border" colspan="2">Dada</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->dada == 'Ada kelainan' ? $visum_et_repertum->dada . ' ' . $visum_et_repertum->kelainan_dada : $visum_et_repertum->dada; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">e.</td>
                            <td class="no__border" colspan="2">Punggung</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->punggung == 'Ada kelainan' ? $visum_et_repertum->punggung . ' ' . $visum_et_repertum->kelainan_punggung : $visum_et_repertum->punggung; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">f.</td>
                            <td class="no__border" colspan="2">Perut</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->perut == 'Ada kelainan' ? $visum_et_repertum->perut . ' ' . $visum_et_repertum->kelainan_perut : $visum_et_repertum->perut; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">g.</td>
                            <td class="no__border" colspan="2">Bokong</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->bokong == 'Ada kelainan' ? $visum_et_repertum->bokong . ' ' . $visum_et_repertum->kelainan_bokong : $visum_et_repertum->bokong; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">h.</td>
                            <td class="no__border" colspan="2">Dubur</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->dubur == 'Ada kelainan' ? $visum_et_repertum->dubur . ' ' . $visum_et_repertum->kelainan_dubur : $visum_et_repertum->dubur; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">i.</td>
                            <td class="no__border" colspan="4">Anggota gerak</td>                            
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border">Anggota gerak atas</td>
                            <td class="no__border" colspan="2"></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border"></td>
                            <td class="no__border" width="10%">a. Kanan</td>
                            <td class="no__border">: <b><?= $visum_et_repertum->anggota_gerak_atas_kanan; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border"></td>
                            <td class="no__border" width="10%">b. Kiri</td>
                            <td class="no__border">: <b><?= $visum_et_repertum->anggota_gerak_atas_kiri; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border">Anggota gerak bawah</td>
                            <td class="no__border" colspan="2"></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border"></td>
                            <td class="no__border" width="10%">a. Kanan</td>
                            <td class="no__border">: <b><?= $visum_et_repertum->anggota_gerak_bawah_kanan; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border"></td>
                            <td class="no__border" width="10%">b. Kiri</td>
                            <td class="no__border">: <b><?= $visum_et_repertum->anggota_gerak_bawah_kiri; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">2)</td>
                            <td class="no__border" colspan="5">Bagian tubuh tertentu</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">a.</td>
                            <td class="no__border" colspan="4">Mata</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border">Alis mata</td>
                            <td class="no__border" colspan="2">: <b><?= 'warna ' . $visum_et_repertum->alis_mata; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border">Bulu mata</td>
                            <td class="no__border" colspan="2">: <b><?= 'warna ' . $visum_et_repertum->bulu_mata; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border">Selaput kelopak mata</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->selaput_kelopak_mata; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border">Selaput biji mata</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->selaput_biji_mata; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border">Selaput bening mata</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->selaput_bening_mata; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border">Pupil mata</td>
                            <td class="no__border" colspan="2">: <b><?= 'bentuk ' . $visum_et_repertum->bentuk_pupil . ', ukuran ' . $visum_et_repertum->ukuran_pupil . ', garis tengah ' . $visum_et_repertum->garis_tengah . ', kanan ' .$visum_et_repertum->garis_kanan . ', kiri ' . $visum_et_repertum->garis_kiri; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border">Pelangi mata</td>
                            <td class="no__border" colspan="2">: <b><?= 'Warna ' . $visum_et_repertum->selaput_bening_mata; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">b.</td>
                            <td class="no__border" colspan="4">Hidung</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border">Bentuk hidung</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->bentuk_hidung; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border">Permukaan kulit hidung</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->permukaan_kulit_hidung; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border">Lubang hidung</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->lubang_hidung; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">c.</td>
                            <td class="no__border" colspan="4">Telinga</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border">Bentuk telinga</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->bentuk_telinga; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border">Permukaan telinga</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->permukaan_telinga; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border">Lubang telinga</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->lubang_telinga; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">d.</td>
                            <td class="no__border" colspan="4">Mulut</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%"></td>
                            <td class="no__border" width="1%">&#8226;</td>
                            <td class="no__border">Bibir atas</td>
                            <td class="no__border" colspan="2">: <b><?= $visum_et_repertum->bibir_atas; ?></b></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table class="no__border justify small__font" style="font-family: 'Times New Roman', Times, serif;">
                    <tbody>
                        <tr>
                            <td class="no__border" align="center">KESIMPULAN</td>
                        </tr>
                        <tr>
                            <td class="no__border"><b><?= $visum_et_repertum->kesimpulan; ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border">Demikianlah visum et repertum ini dibuat sejujur jujurnya dengan menggunakan keilmuan yang sebaik-baiknya, serta mengingat sumpah jabatan sesuai dengan kitab Undang Undang Hukum Acara Pidana. ----------------------------------</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table class="no__border small__font" style="font-family: 'Times New Roman', Times, serif;">
                    <tbody>
                        <tr>
                            <td class="no__border" width="50%"></td>
                            <td class="no__border">Tangerang, <b><?= date("d/m/Y H:i", strtotime($visum_et_repertum->updated_on)); ?></b></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="50%"></td>
                            <td class="no__border">Dokter Jaga pada Instalasi Gawat Darurat</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="50%"></td>
                            <td class="no__border">Rumah Sakit Umum Kota Tangerang <br><br><br><br><br><br></td>
                        </tr>
                        <tr>
                            <td class="no__border" width="50%"></td>
                            <td class="no__border">( <b><?= $visum_et_repertum->nama_dokter_jaga_igd; ?></b> )</td>
                        </tr>
                        <tr>
                            <td class="no__border" width="50%"></td>
                            <td class="no__border">NO. SIP <b><?= $visum_et_repertum->nip_dokter_jaga_igd; ?></b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
<?php die; ?>
