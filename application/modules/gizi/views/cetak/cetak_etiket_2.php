<!DOCTYPE html>
<title><?= $title ?></title>
<link rel="icon" type="image/png" href="<?= base_url() ?>resources/images/favicons/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="<?= base_url() ?>resources/images/favicons/favicon-16x16.png" sizes="16x16" />
<link rel="stylesheet" href="<?= base_url() ?>resources/assets/css/printing-A4-half.css" media="print">
<script src="<?= base_url() ?>resources/assets/node_modules/jquery/jquery-3.5.1.js"></script>
<script>
	function cetak() {
		setTimeout(function() {
			window.close()
		}, 300)
		window.print()
	} 
</script>

<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        background: grey;
    }

    * {
        font: 0.9em verdana;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .container {
        width: 6cm;
        height: 4cm;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5px;
        box-sizing: border-box;
        margin: 0 auto;
        margin-top: 1vh;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        page-break-after: always;
    }
    
    @page {
        margin: 0;
    }

    @media print {
		.container {
			width: 6cm;
			height: initial;
			margin: auto;
			margin-left: auto;
			margin-right: auto;
			border: initial;
			/* border: 1px #D3D3D3 solid; */
			border-radius: initial;
			box-shadow: initial;
            background: initial;
			page-break-after: always;
            display: flex;
            align-items: center;
            justify-content: center;
		}
        .judul{
            font-size: 5vh;
        }
        .responsive-text {
            display: block;
            width: 100%;
            height: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: clamp(0.5em, 1em, 2em);
        }
        /* th, td {
            border: 1px solid #ddd;
            overflow: hidden;
            text-overflow: ellipsis;
        } */
    }
    .responsive-text {
        display: block;
        width: 100%;
        height: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: clamp(0.5em, 1em, 2em);
    }

    h1 { font-size: 20px; margin-bottom: 0; }
    h2 { font-size: 18px; margin-bottom: 0; }
    h3 { font-size: 16px; margin-bottom: 0; }

    .topborder{
        border-top:1px solid #000;
    }

    .bottomborder{
        border-bottom:1px solid #000;
    }
    
    .total{
        border-top:1px solid #000;
        vertical-align: middle;
    }

    .left {
        text-align: left;
    }

    .right {
        text-align: right !important;
    }

    .center {
        text-align: center !important;
    }

    .v-center {
        vertical-align: middle !important;
    }

    .bold { font-weight: bold; }

</style>

<!-- <style>
    body {
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        background: grey;
    }

    * {
        font: 0.9em verdana;
    }

    .container {
        width: 6cm;
        height: 4cm;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5px;
        box-sizing: border-box;
        margin: 0 auto;
        margin-top: 1vh;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        page-break-after: always;
    }

    table {
        height: 100%;
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #ddd;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    td.titik {
        width: 1%;
        min-width: 1%;
        max-width: 1%;
        text-align: center; /* Memusatkan teks ":" di tengah */
    }
    
    td.rata{
        width: 10%;
        min-width: 10%;
        max-width: 10%;
        white-space: nowrap;
    }

    .responsive-text {
        display: block;
        width: 100%;
        height: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: clamp(0.5em, 1em, 2em);
    }

    .bold {
        font-weight: bold;
        }
    .left {
        text-align: left;
    }
    .right {
        text-align: right !important;
    }
    .center {
        text-align: center !important;
    }
    .v-center {
        vertical-align: middle !important;
    }


    @media print {
		.container {
			width: 6cm;
			height: initial;
            display: flex;
            align-items: center;
			margin: auto;
			/* margin-left: 1.5cm; */
			margin-right: auto;
			border: initial;
			border: 1px #D3D3D3 solid;
			border-radius: initial;
			box-shadow: initial;
            background: initial;
			page-break-after: always;
		}
    }

    @page {
        size: 4cm 6cm;
        margin: 0;
    }

</style> -->

<body onload="cetak()">
<!-- <body> -->

    <?php 

        // Inisialisasi variabel
        $bed = '-';
        $hitung_key = array();
        $counter = 0; // Menambahkan counter untuk melacak jumlah data
        
        // Fungsi untuk memformat waktu
        function formatTime($time) {
            if ($time === null) return ['', ''];
            $ek_jm = explode(':', $time);
            $jam = $ek_jm[0] . ':' . $ek_jm[1];
            $bkum_jam = (intval($ek_jm[0]) + 2) % 24;
            $bk_jam = str_pad($bkum_jam, 2, '0', STR_PAD_LEFT) . ':' . $ek_jm[1];
            return [$jam, $bk_jam];
        }

        if ($diet === 'Diet Makan') {
            foreach ($etiket as $key => $value) {
                // Tanggal lahir yang diberikan
                $tanggal_lahir = $value->tanggal_lahir;

                // Membuat objek DateTime dari tanggal lahir
                $lahir = new DateTime($tanggal_lahir);

                // Membuat objek DateTime untuk tanggal saat ini
                $hari_ini = new DateTime();

                // Menghitung selisih antara tanggal saat ini dan tanggal lahir
                $umur_pasien = $hari_ini->diff($lahir);

                // Umur dalam tahun dan bulan
                $umur_tahun = $umur_pasien->y;
                $umur_bulan = $umur_pasien->m;

                $bed = $value->bangsal_ri !== null ? $value->bangsal_ri . ' ruang ' . $value->ruang_ri . ' bed ' . $value->bed_ri : ($value->bangsal_ic !== null ? $value->bangsal_ic . ' ruang ' . $value->ruang_ic . ' bed ' . $value->bed_ic : '-');
                if ($value->jenis_layanan == 'Hemodialisa') {
                    $bed = 'Hemodialisa';
                }

                $diet_map = [
                    'dm_biasa' => 'B ',
                    'dm_p' => 'P ',
                    'dm_rs' => 'RS ',
                    'dm_cr' => 'C ','dm_rg' => 'RG ',
                    'dm_sd' => 'SODE ','dm_dm' => 'DM ',
                    'dm_rk' => 'R. Kal ',
                    'dm_tk' => 'T. Kal ',
                    'dm_dh' => 'DH ',
                    'dm_rl' => 'RL ',
                    'dm_tktp' => 'TKTP ',
                    'dm_dj' => 'DJ ',
                    'dm_rp' => 'RP ',
                    'dm_ts' => 'TS ',
                    'dm_dl' => 'DL ',
                    'dm_rpn' => 'R. Pur '
                ];

                $get_diet = '';
                foreach ($diet_map as $key => $label) {
                    if ($value->$key !== null) {
                        $get_diet .= $label;
                    }
                }

                $keterangan_makan = $value->dpmp_ket ?? '';
                $jam = $jam_cetak_2 ?? null;
                $bk = '-';
                if ($jam !== null) {
                    list($jam, $bk) = formatTime($jam);
                }

                $get_bentuk_makan = array_unique([
                    $value->dm_bm_mp, $value->dm_bm_sp, $value->dm_bm_ms, 
                    $value->dm_bm_ss, $value->dm_bm_mm, $value->dm_bm_sm
                ]);

                echo '
                    <div class="container">
                        <table>
                            <tr>
                                <td class="center" colspan="3">
                                    <img src="' . base_url() . 'resources/images/logos/' . $hospital->logo . '" width="10px" height="10px">&nbsp;&nbsp;&nbsp;
                                    <span class="bold judul">INSTALASI GIZI</span>&nbsp;&nbsp;&nbsp;
                                    <img src="' . base_url() . 'resources/images/logos/' . $hospital->halal_gizi . '" width="10px" height="10px">
                                </td>
                            </tr>
                            <tr>
                                <td class="rata">Nama</td>
                                <td class="titik">:</td>
                                <td>' . $value->nama_pasien . ' / ' . $value->kelamin . '</td>
                            </tr>
                            <tr>
                                <td class="rata">Tanggal Lahir</td>
                                <td class="titik">:</td>
                                <td>' . datefmysql($value->tanggal_lahir) . ' (' . ($umur_tahun < 1 ? $umur_bulan . ' bulan' : $umur_tahun . ' tahun') . ')</td>
                            </tr>

                            <tr>
                                <td class="rata">Kamar</td>
                                <td class="titik">:</td>
                                <td>' . $bed . '</td>
                            </tr>
                            <tr>
                                <td class="rata">No. RM</td>
                                <td class="titik">:</td>
                                <td>' . $value->no_rm . '</td>
                            </tr>
                            <tr>
                                <td class="rata">' . $diet . '</td>
                                <td class="titik">:</td>
                                <td> <span class="bold responsive-text">';
                                    foreach ($get_bentuk_makan as $bentuk) {
                                        echo $bentuk . '&nbsp;';
                                    }
                                    echo'- &nbsp'. $get_diet . $keterangan_makan . '</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="rata">Waktu Makan</td>
                                <td class="titik">:</td>
                                <td>' . $jam . '</td>
                            </tr>
                            <tr>
                                <td class="rata">Batas Konsumsi</td>
                                <td class="titik">:</td>
                                <td>' . $bk . '</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="center">Selamat menikmati, Semoga lekas sembuh</td>
                            </tr>
                        </table>
                    </div>
                ';

            }
        } elseif ($diet === 'Diet Cair') {
            foreach ($etiket as $key => $value) {
                $bed = $value->bangsal_ri !== null ? $value->bangsal_ri . ' ruang ' . $value->ruang_ri . ' bed ' . $value->bed_ri : ($value->bangsal_ic !== null ? $value->bangsal_ic . ' ruang ' . $value->ruang_ic . ' bed ' . $value->bed_ic : '-');
                $jam_keys = [
                    'dc_jam_1' => 'keterangan_makan_satu',
                    'dc_jam_2' => 'keterangan_makan_dua',
                    'dc_jam_3' => 'keterangan_makan_tiga',
                    'dc_jam_4' => 'keterangan_makan_empat',
                    'dc_jam_5' => 'keterangan_makan_lima',
                    'dc_jam_6' => 'keterangan_makan_enam',
                    'dc_jam_7' => 'keterangan_makan_tujuh',
                    'dc_jam_8' => 'keterangan_makan_delapan'
                ];

                // Tanggal lahir yang diberikan
                $tanggal_lahir = $value->tanggal_lahir;

                // Membuat objek DateTime dari tanggal lahir
                $lahir = new DateTime($tanggal_lahir);

                // Membuat objek DateTime untuk tanggal saat ini
                $hari_ini = new DateTime();

                // Menghitung selisih antara tanggal saat ini dan tanggal lahir
                $umur_pasien = $hari_ini->diff($lahir);

                // Umur dalam tahun dan bulan
                $umur_tahun = $umur_pasien->y;
                $umur_bulan = $umur_pasien->m;

                foreach ($jam_keys as $key => $keterangan_jam) {
                    if ($value->$key !== null) {
                        list($jam, $bk) = formatTime($value->$key);
                        array_push($hitung_key, $value->$key);
                        $keterangan_makan = $value->dpmp_ket ?? '';

                        echo '
                            <div class="container">
                                <table>
                                    <tr>
                                        <td class="center" colspan="3">
                                            <img src="' . base_url() . 'resources/images/logos/' . $hospital->logo . '" width="10px" height="10px">&nbsp;&nbsp;&nbsp;
                                            <span class="bold judul">INSTALASI GIZI</span>&nbsp;&nbsp;&nbsp;
                                            <img src="' . base_url() . 'resources/images/logos/' . $hospital->halal_gizi . '" width="10px" height="10px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="rata">Nama</td>
                                        <td class="titik">:</td>
                                        <td>' . $value->nama_pasien . ' / ' . $value->kelamin . '</td>
                                    </tr>
                                    <tr>
                                        <td class="rata">Tanggal Lahir</td>
                                        <td class="titik">:</td>
                                        <td>' . datefmysql($value->tanggal_lahir) . ' (' . ($umur_tahun < 1 ? $umur_bulan . ' bulan' : $umur_tahun . ' tahun') . ')</td>
                                    </tr>

                                    <tr>
                                        <td class="rata">Kamar</td>
                                        <td class="titik">:</td>
                                        <td>' . $bed . '</td>
                                    </tr>
                                    <tr>
                                        <td class="rata">No. RM</td>
                                        <td class="titik">:</td>
                                        <td>' . $value->no_rm . '</td>
                                    </tr>
                                    <tr>
                                        <td class="rata">' . $diet . '</td>
                                        <td class="titik">:</td>
                                        <td>
                                            <span class="bold responsive-text">' . $value->nama_cair . ' ' . $value->dc_keterangan . ' ' . $keterangan_makan . '</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="rata">Waktu Makan</td>
                                        <td class="titik">:</td>
                                        <td>' . $jam . '</td>
                                    </tr>
                                    <tr>
                                        <td class="rata">Batas Konsumsi</td>
                                        <td class="titik">:</td>
                                        <td>' . $bk . '</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="center">Selamat menikmati, Semoga lekas sembuh</td>
                                    </tr>
                                </table>
                            </div>
                        ';
                    }
                }
            }
        } else {
            foreach ($etiket as $key => $value) {

                // Tanggal lahir yang diberikan
                $tanggal_lahir = $value->tanggal_lahir;

                // Membuat objek DateTime dari tanggal lahir
                $lahir = new DateTime($tanggal_lahir);

                // Membuat objek DateTime untuk tanggal saat ini
                $hari_ini = new DateTime();

                // Menghitung selisih antara tanggal saat ini dan tanggal lahir
                $umur_pasien = $hari_ini->diff($lahir);

                // Umur dalam tahun dan bulan
                $umur_tahun = $umur_pasien->y;
                $umur_bulan = $umur_pasien->m;

                $bed = $value->bangsal_ri !== null ? $value->bangsal_ri . ' ruang ' . $value->ruang_ri . ' bed ' . $value->bed_ri : ($value->bangsal_ic !== null ? $value->bangsal_ic . ' ruang ' . $value->ruang_ic . ' bed ' . $value->bed_ic : '-');
                if ($value->jenis_layanan == 'Hemodialisa') {
                    $bed = 'Hemodialisa';
                }

                $diet_map = [
                    'ds_biasa' => 'B ',
                    'ds_p' => 'P ',
                    'ds_rs' => 'RS ',
                    'ds_cr' => 'C ','ds_rg' => 'RG ',
                    'ds_sd' => 'SODE ','ds_dm' => 'DM ',
                    'ds_rk' => 'R. Kal ',
                    'ds_tk' => 'T. Kal ',
                    'ds_dh' => 'DH ',
                    'ds_rl' => 'RL ',
                    'ds_tktp' => 'TKTP ',
                    'ds_dj' => 'DJ ',
                    'ds_rp' => 'RP ',
                    'ds_ts' => 'TS ',
                    'ds_dl' => 'DL ',
                    'ds_rpn' => 'R. Pur '
                ];

                $get_diet = '';
                foreach ($diet_map as $key => $label) {
                    if ($value->$key !== null) {
                        $get_diet .= $label;
                    }
                }

                $keterangan_makan = $value->dpmp_ket ?? '';
                $jam = $jam_cetak_2 ?? null;
                $bk = '-';
                if ($jam !== null) {
                    list($jam, $bk) = formatTime($jam);
                }

                $get_bentuk_makan = array_unique([
                    $value->ds_bm_mp, $value->ds_bm_sp, $value->ds_bm_ms, 
                    $value->ds_bm_ss, $value->ds_bm_mm, $value->ds_bm_sm
                ]);

                echo '
                    <div class="container">
                        <table>
                            <tr>
                                <td class="center" colspan="3">
                                    <img src="' . base_url() . 'resources/images/logos/' . $hospital->logo . '" width="10px" height="10px">&nbsp;&nbsp;&nbsp;
                                    <span class="bold judul">INSTALASI GIZI</span>&nbsp;&nbsp;&nbsp;
                                    <img src="' . base_url() . 'resources/images/logos/' . $hospital->halal_gizi . '" width="10px" height="10px">
                                </td>
                            </tr>
                            <tr>
                                <td class="rata">Nama</td>
                                <td class="titik">:</td>
                                <td>' . $value->nama_pasien . ' / ' . $value->kelamin . '</td>
                            </tr>
                            <tr>
                                <td class="rata">Tanggal Lahir</td>
                                <td class="titik">:</td>
                                <td>' . datefmysql($value->tanggal_lahir) . ' (' . ($umur_tahun < 1 ? $umur_bulan . ' bulan' : $umur_tahun . ' tahun') . ')</td>
                            </tr>

                            <tr>
                                <td class="rata">Kamar</td>
                                <td class="titik">:</td>
                                <td>' . $bed . '</td>
                            </tr>
                            <tr>
                                <td class="rata">No. RM</td>
                                <td class="titik">:</td>
                                <td>' . $value->no_rm . '</td>
                            </tr>
                            <tr>
                                <td class="rata">' . $diet . '</td>
                                <td class="titik">:</td>
                                <td> <span class="bold responsive-text">';
                                    foreach ($get_bentuk_makan as $bentuk) {
                                        echo $bentuk . '&nbsp;';
                                    }
                                    echo'- &nbsp'. $get_diet . $keterangan_makan . '<br>' . $value->nama_cair_2 . ' ' . $value->ds_keterangan . '</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="rata">Waktu Makan</td>
                                <td class="titik">:</td>
                                <td>' . $jam . '</td>
                            </tr>
                            <tr>
                                <td class="rata">Batas Konsumsi</td>
                                <td class="titik">:</td>
                                <td>' . $bk . '</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="center">Selamat menikmati, Semoga lekas sembuh</td>
                            </tr>
                        </table>
                    </div>
                ';

            }
        }

    ?>


    <?php

        // // Fungsi untuk memformat waktu
        // function formatTime($time) {
        //     if ($time === null) return ['', ''];
        //     $ek_jm = explode(':', $time);
        //     $jam = $ek_jm[0] . ':' . $ek_jm[1];
        //     $bkum_jam = (intval($ek_jm[0]) + 2) % 24;
        //     $bk_jam = str_pad($bkum_jam, 2, '0', STR_PAD_LEFT) . ':' . $ek_jm[1];
        //     return [$jam, $bk_jam];
        // }

        // // Inisialisasi variabel
        // $bed = '-';
        // $tipe_diet = $diet;
        // $hitung_key = array();
        // $counter = 0; // Menambahkan counter untuk melacak jumlah data

        // // Proses data berdasarkan jenis diet
        // if ($tipe_diet === 'Diet Makan') {
        //     // Proses untuk jenis diet makan
        //     foreach ($etiket as $key => $value) {
        //         $hitung_key[] = $key;
        //         $bed = $value->bangsal_ri !== null 
        //             ? $value->bangsal_ri . ' ruang ' . $value->ruang_ri . ' bed ' . $value->bed_ri 
        //             : ($value->bangsal_ic !== null 
        //                 ? $value->bangsal_ic . ' ruang ' . $value->ruang_ic . ' bed ' . $value->bed_ic 
        //                 : '-');
        //         if ($value->jenis_layanan == 'Hemodialisa') {
        //             $bed = 'Hemodialisa';
        //         }

        //         // Tanggal lahir yang diberikan
        //         $tanggal_lahir = $value->tanggal_lahir;

        //         // Membuat objek DateTime dari tanggal lahir
        //         $lahir = new DateTime($tanggal_lahir);

        //         // Membuat objek DateTime untuk tanggal saat ini
        //         $hari_ini = new DateTime();

        //         // Menghitung selisih antara tanggal saat ini dan tanggal lahir
        //         $umur_pasien = $hari_ini->diff($lahir);

        //         // Umur dalam tahun
        //         $umur_tahun = $umur_pasien->y;

        //         $get_bentuk_makan = array_unique([
        //             $value->btk_mkn_mp, $value->btk_mkn_sp, $value->btk_mkn_ms, 
        //             $value->btk_mkn_ss, $value->btk_mkn_mm, $value->btk_mkn_sm
        //         ]);

        //         $diet_map = [
        //             'dpmp_rl' => 'RL ', 'dpmp_dj' => 'DJ ', 'dpmp_rs' => 'RS ', 'dpmp_dl' => 'DL ',
        //             'dpmp_ts' => 'TS ', 'dpmp_dh' => 'DH ', 'dpmp_tktp' => 'TKTP ', 'dpmp_tkal' => 'T. Kal ',
        //             'dpmp_rkal' => 'R. Kal ', 'dpmp_rp' => 'RP ', 'dpmp_rpur' => 'R. Pur ', 'dpmp_b' => 'B ',
        //             'dpmp_sonde' => 'SONDE ', 'dpmp_c' => 'C ', 'dpmp_p' => 'P ', 'dpmp_dm' => 'DM ',
        //             'dpmp_rg' => 'RG '
        //         ];

        //         $get_diet = '';
        //         foreach ($diet_map as $key => $label) {
        //             if ($value->$key !== null) {
        //                 $get_diet .= $label;
        //             }
        //         }

        //         $keterangan_makan = $value->ket_makan_pasien ?? '';
        //         $jm = $jam ?? null;
        //         $bk = '-';
        //         if ($jm !== null) {
        //             list($jm, $bk) = formatTime($jm);
        //         }

        //         echo '<div class="page"><table>
        //         <tr>
        //             <td colspan="2" class="center">
        //                 <img src="' . base_url() . 'resources/images/logos/' . $hospital->logo . '" width="10px" height="10px">&nbsp;&nbsp;&nbsp;<span class="bold">INSTALASI GIZI</span>&nbsp;&nbsp;&nbsp;
        //                 <img src="' . base_url() . 'resources/images/logos/' . $hospital->halal_gizi . '" width="10px" height="10px">
        //             </td>
        //         </tr>
        //         <tr>
        //             <td>Nama</td>
        //             <td>: ' . $value->nama_pasien . ' / ' . $value->kelamin . '</td>
        //         </tr>
        //         <tr>
        //             <td>Tanggal Lahir</td>
        //             <td>: ' . datefmysql($value->tanggal_lahir) . ' (' . $umur_tahun . ' tahun)</td>
        //         </tr>
        //         <tr>
        //             <td >Kamar</td>
        //             <td >: ' . $bed . '</td>
        //         </tr>
        //         <tr>
        //             <td >No. RM</td>
        //             <td >: ' . $value->no_rm . '</td>
        //         </tr>
        //         <tr>
        //             <td>Diet</td>
        //             <td>: <span class="bold">';
        //         foreach ($get_bentuk_makan as $bentuk) {
        //             echo $bentuk . '&nbsp;';
        //         }
        //         echo $get_diet . $keterangan_makan . '</span></td>
        //         </tr>
        //         <tr>
        //             <td>Waktu Makan</td>
        //             <td>: ' . $jm . '</td>
        //         </tr>
        //         <tr>
        //             <td>Batas Konsumsi</td>
        //             <td>: ' . $bk . '</td>
        //         </tr>
        //         <tr>
        //             <td colspan="2" class="center">Selamat menikmati, Semoga lekas sembuh</td>
        //         </tr>
        //         </table></div>';

        //         $counter++; // Increment counter untuk setiap data yang ditampilkan
        //     }
        // } else if ($tipe_diet === 'Diet Cair') {
        //     $hitung_key = [];
        //     foreach ($etiket as $value) {
        //         $bed = $value->bangsal_ri !== null ? $value->bangsal_ri . ' ruang ' . $value->ruang_ri . ' bed ' . $value->bed_ri : ($value->bangsal_ic !== null ? $value->bangsal_ic . ' ruang ' . $value->ruang_ic . ' bed ' . $value->bed_ic : '-');
                
        //         $jam_keys = [
        //             'dpmp_jam_satu' => 'keterangan_makan_satu',
        //             'dpmp_jam_dua' => 'keterangan_makan_dua',
        //             'dpmp_jam_tiga' => 'keterangan_makan_tiga',
        //             'dpmp_jam_empat' => 'keterangan_makan_empat',
        //             'dpmp_jam_lima' => 'keterangan_makan_lima',
        //             'dpmp_jam_enam' => 'keterangan_makan_enam',
        //             'dpmp_jam_tujuh' => 'keterangan_makan_tujuh',
        //             'dpmp_jam_delapan' => 'keterangan_makan_delapan'
        //         ];

        //         // Tanggal lahir yang diberikan
        //         $tanggal_lahir = $value->tanggal_lahir;

        //         // Membuat objek DateTime dari tanggal lahir
        //         $lahir = new DateTime($tanggal_lahir);

        //         // Membuat objek DateTime untuk tanggal saat ini
        //         $hari_ini = new DateTime();

        //         // Menghitung selisih antara tanggal saat ini dan tanggal lahir
        //         $umur_pasien = $hari_ini->diff($lahir);

        //         // Umur dalam tahun
        //         $umur_tahun = $umur_pasien->y;

        //         foreach ($jam_keys as $jam_key => $ket_key) {
        //             if ($value->$jam_key !== null) {
        //                 list($jam, $bk_jam) = formatTime($value->$jam_key);
        //                 array_push($hitung_key, $value->$jam_key);
        //                 $keterangan_makan = $value->ket_makan_pasien ?? '';

        //                 echo '<div class="page"><table>
        //                 <tr>
        //                     <td colspan="2" class="center">
        //                         <img src="' . base_url() . 'resources/images/logos/' . $hospital->logo . '" width="10px" height="10px">
        //                         &nbsp;&nbsp;&nbsp;<span class="bold">INSTALASI GIZI</span>&nbsp;&nbsp;&nbsp;
        //                         <img src="' . base_url() . 'resources/images/logos/' . $hospital->halal_gizi . '" width="10px" height="10px">
        //                     </td>
        //                 </tr>
        //                 <tr>
        //                     <td>Nama</td>
        //                     <td>: ' . $value->nama_pasien . ' / ' . $value->kelamin . '</td>
        //                 </tr>
        //                 <tr>
        //                     <td>Tanggal Lahir</td>
        //                     <td>: ' . datefmysql($value->tanggal_lahir) . ' (' . $umur_tahun . ' tahun)</td>
        //                 </tr>
        //                 <tr>
        //                     <td>Kamar</td>
        //                     <td>: ' . $bed . '</td>
        //                 </tr>
        //                 <tr>
        //                     <td>No. RM</td>
        //                     <td>: ' . $value->no_rm . '</td>
        //                 </tr>
        //                 <tr>
        //                     <td>Diet</td>
        //                     <td>: <span class="bold">CAIR ' . $value->nama_cair . ' ' . $value->keterangan_diet_cair . ' ' . $keterangan_makan . '</span></td>
        //                 </tr>
        //                 <tr>
        //                     <td>Waktu Makan</td>
        //                     <td>: ' . $jam . '</td>
        //                 </tr>
        //                 <tr>
        //                     <td>Batas Konsumsi</td>
        //                     <td>: ' . $bk_jam . '</td>
        //                 </tr>
        //                 <tr>
        //                     <td colspan="2" class="center">Selamat menikmati, Semoga lekas sembuh</td>
        //                 </tr>
        //                 </table></div>';

        //                 $counter++; // Increment counter untuk setiap data yang ditampilkan
        //             }
        //         }
        //     }
        // } elseif ($tipe_diet === 'Diet Sharing') {
        //     // Proses untuk jenis diet Sharing
        //     foreach ($etiket as $key => $value) {
        //         $hitung_key[] = $key;
        //         $bed = $value->bangsal_ri !== null 
        //             ? $value->bangsal_ri . ' ruang ' . $value->ruang_ri . ' bed ' . $value->bed_ri 
        //             : ($value->bangsal_ic !== null 
        //                 ? $value->bangsal_ic . ' ruang ' . $value->ruang_ic . ' bed ' . $value->bed_ic 
        //                 : '-');
        //         if ($value->jenis_layanan == 'Hemodialisa') {
        //             $bed = 'Hemodialisa';
        //         }

        //         // Tanggal lahir yang diberikan
        //         $tanggal_lahir = $value->tanggal_lahir;

        //         // Membuat objek DateTime dari tanggal lahir
        //         $lahir = new DateTime($tanggal_lahir);

        //         // Membuat objek DateTime untuk tanggal saat ini
        //         $hari_ini = new DateTime();

        //         // Menghitung selisih antara tanggal saat ini dan tanggal lahir
        //         $umur_pasien = $hari_ini->diff($lahir);

        //         // Umur dalam tahun
        //         $umur_tahun = $umur_pasien->y;

        //         $get_bentuk_makan = array_unique([
        //             $value->btk_mkn_mp, $value->btk_mkn_sp, $value->btk_mkn_ms, 
        //             $value->btk_mkn_ss, $value->btk_mkn_mm, $value->btk_mkn_sm
        //         ]);

        //         $diet_map = [
        //             'dpmp_rl' => 'RL ', 'dpmp_dj' => 'DJ ', 'dpmp_rs' => 'RS ', 'dpmp_dl' => 'DL ',
        //             'dpmp_ts' => 'TS ', 'dpmp_dh' => 'DH ', 'dpmp_tktp' => 'TKTP ', 'dpmp_tkal' => 'T. Kal ',
        //             'dpmp_rkal' => 'R. Kal ', 'dpmp_rp' => 'RP ', 'dpmp_rpur' => 'R. Pur ', 'dpmp_b' => 'B ',
        //             'dpmp_sonde' => 'SONDE ', 'dpmp_c' => 'C ', 'dpmp_p' => 'P ', 'dpmp_dm' => 'DM ',
        //             'dpmp_rg' => 'RG '
        //         ];

        //         $get_diet = '';
        //         foreach ($diet_map as $key => $label) {
        //             if ($value->$key !== null) {
        //                 $get_diet .= $label;
        //             }
        //         }

        //         $keterangan_makan = $value->ket_makan_pasien ?? '';
        //         $jm = $jam ?? null;
        //         $bk = '-';
        //         if ($jm !== null) {
        //             list($jm, $bk) = formatTime($jm);
        //         }

        //         echo '<div class="page"><table>
        //         <tr>
        //             <td colspan="2" class="center">
        //                 <img src="' . base_url() . 'resources/images/logos/' . $hospital->logo . '" width="10px" height="10px">&nbsp;&nbsp;&nbsp;<span class="bold">INSTALASI GIZI</span>&nbsp;&nbsp;&nbsp;
        //                 <img src="' . base_url() . 'resources/images/logos/' . $hospital->halal_gizi . '" width="10px" height="10px">
        //             </td>
        //         </tr>
        //         <tr>
        //             <td>Nama</td>
        //             <td>: ' . $value->nama_pasien . ' / ' . $value->kelamin . '</td>
        //         </tr>
        //         <tr>
        //             <td>Tanggal Lahir</td>
        //             <td>: ' . datefmysql($value->tanggal_lahir) . ' (' . $umur_tahun . ' tahun)</td>
        //         </tr>
        //         <tr>
        //             <td >Kamar</td>
        //             <td >: ' . $bed . '</td>
        //         </tr>
        //         <tr>
        //             <td >No. RM</td>
        //             <td >: ' . $value->no_rm . '</td>
        //         </tr>
        //         <tr>
        //             <td>Diet</td>
        //             <td>: <span class="bold">';
        //                     foreach ($get_bentuk_makan as $bentuk) {
        //                         echo $bentuk . ' ';
        //                     }
        //                     echo $get_diet . $value->nama_cair . $value->keterangan_diet_cair . $keterangan_makan . '</span>
        //             </td>
        //         </tr>
        //         <tr>
        //             <td>Waktu Makan</td>
        //             <td>: ' . $jm . '</td>
        //         </tr>
        //         <tr>
        //             <td>Batas Konsumsi</td>
        //             <td>: ' . $bk . '</td>
        //         </tr>
        //         <tr>
        //             <td colspan="2" class="center">Selamat menikmati, Semoga lekas sembuh</td>
        //         </tr>
        //         </table></div>';

        //         $counter++; // Increment counter untuk setiap data yang ditampilkan
        //     }
        // }
    ?>
</body>

</html>
