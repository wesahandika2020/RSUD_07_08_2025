<?php
	header_excel("Daftar Permintaan Makan Pasien (DPMP) Dapur - ".$periode);
	header("Content-type: application/vnd-ms-excel");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
    
<body>
	<h4>RSUD KOTA TANGERANG
		<br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
		<br> Telepon (021) 29720201-03
	</h4>
	<div>
		<h4>
        DAFTAR PERMINTAAN MAKAN PASIEN (DPMP) DAPUR
			<br>Periode : <?= $periode ?>
            <?= (!empty($penjamin) ? '<br>Penjamin : ' .$penjamin : '' ) ?>
            <?= (!empty($jenis_diet) ? '<br>Jenis Diet : ' .$jenis_diet : '' ) ?>
            <?= (!empty($tempat_layanan) ? '<br>Tempat Layanan : ' .$tempat_layanan : '' ) ?>
            <?= (!empty($ruangan_ranap) ? ' ('.$ruangan_ranap.')' : '' ) ?>
            <?= (!empty($ruangan_ic) ? ' ('.$ruangan_ic.')' : '' ) ?>
            <?= (!empty($jml_data) ? '<br>Jumlah Pasien : ' .$jml_data : '' ) ?>	
            <?= (!empty($jml_data_all) ? '<br>Jumlah Pasien Total : ' .$jml_data_all : '' ) ?>			
		</h4>
	</div>

	<table border="1">
		<thead border="2">
		<tr height="50pt" style="text-transform: uppercase;">
            <th class="center">No.</th>
            <th class="center">SK</th>
            <th class="center">Tgl Masuk</th>
            <th class="center">Tgl Order</th>
            <th class="center">Ruangan</th>
            <th class="center">No Rm</th>
            <th class="center">Nama</th>
            <th class="center">Umur</th>
            <th class="center">Tgl Lahir</th>
            <th class="center">P/L</th>
            <th class="center">Diagnosa Utama</th>
            <th class="center">Dokter</th>
            <th class="center">Diet</th>
            <th class="center">MP</th>
            <th class="center">SP</th>
            <th class="center">MS</th>
            <th class="center">SS</th>
            <th class="center">MM</th>
            <th class="center">SM</th>
            <th class="center">KET</th>
		</tr>
		</thead>	
		<tbody>
			<?php
			foreach ($data as $i => $v) :
                $dataDiet       = '';
                $jnsDiet        = [];
                $bentuk_makanan = [];
                $diet_cair      = [];
                $jnsKDC         = [];
                $jam_pemberian  = '';
                $getJamP        = '';
                $jnsDiet        = [$v->jns_diet_mp, $v->jns_diet_sp, $v->jns_diet_ms, $v->jns_diet_ss, $v->jns_diet_mm, $v->jns_diet_sm];
                $bentuk_makanan = [$v->btk_mkn_mp, $v->btk_mkn_sp, $v->btk_mkn_ms, $v->btk_mkn_ss, $v->btk_mkn_mm, $v->btk_mkn_sm];
                $diet_cair      = [$v->mp_kode, $v->ms_kode, $v->mm_kode, $v->ss_kode, $v->sp_kode, $v->sm_kode];
                $jnsKDC         = [$v->kdc];
            
                if (!is_null($v->dpmp_jam_satu) && (!is_null($v->dpmp_jam_dua) || !is_null($v->dpmp_jam_tiga) || !is_null($v->dpmp_jam_empat) || !is_null($v->dpmp_jam_lima) || !is_null($v->dpmp_jam_enam) || !is_null($v->dpmp_jam_tujuh) || !is_null($v->dpmp_jam_delapan))) {
                    $psh_jam_satu = explode(':', $v->dpmp_jam_satu);
                    $jam_satu = $psh_jam_satu[0];
                    $jam_pemberian .= $jam_satu . ', ';
                } elseif (!is_null($v->dpmp_jam_satu)) {
                    $psh_jam_satu = explode(':', $v->dpmp_jam_satu);
                    $jam_satu = $psh_jam_satu[0];
                    $jam_pemberian .= $jam_satu;
                }

                if (!is_null($v->dpmp_jam_dua) && (!is_null($v->dpmp_jam_tiga) || !is_null($v->dpmp_jam_empat) || !is_null($v->dpmp_jam_lima) || !is_null($v->dpmp_jam_enam) || !is_null($v->dpmp_jam_tujuh) || !is_null($v->dpmp_jam_delapan))) {
                    $psh_jam_dua = explode(':', $v->dpmp_jam_dua);
                    $jam_dua = $psh_jam_dua[0];
                    $jam_pemberian .= $jam_dua . ', ';
                } elseif (!is_null($v->dpmp_jam_dua)) {
                    $psh_jam_dua = explode(':', $v->dpmp_jam_dua);
                    $jam_dua = $psh_jam_dua[0];
                    $jam_pemberian .= $jam_dua;
                }

                if (!is_null($v->dpmp_jam_tiga) && (!is_null($v->dpmp_jam_empat) || !is_null($v->dpmp_jam_lima) || !is_null($v->dpmp_jam_enam) || !is_null($v->dpmp_jam_tujuh) || !is_null($v->dpmp_jam_delapan))) {
                    $psh_jam_tiga = explode(':', $v->dpmp_jam_tiga);
                    $jam_tiga = $psh_jam_tiga[0];
                    $jam_pemberian .= $jam_tiga . ', ';
                } elseif (!is_null($v->dpmp_jam_tiga)) {
                    $psh_jam_tiga = explode(':', $v->dpmp_jam_tiga);
                    $jam_tiga = $psh_jam_tiga[0];
                    $jam_pemberian .= $jam_tiga;
                }

                if (!is_null($v->dpmp_jam_empat) && (!is_null($v->dpmp_jam_lima) || !is_null($v->dpmp_jam_enam) || !is_null($v->dpmp_jam_tujuh) || !is_null($v->dpmp_jam_delapan))) {
                    $psh_jam_empat = explode(':', $v->dpmp_jam_empat);
                    $jam_empat = $psh_jam_empat[0];
                    $jam_pemberian .= $jam_empat . ', ';
                } elseif (!is_null($v->dpmp_jam_empat)) {
                    $psh_jam_empat = explode(':', $v->dpmp_jam_empat);
                    $jam_empat = $psh_jam_empat[0];
                    $jam_pemberian .= $jam_empat;
                }

                if (!is_null($v->dpmp_jam_lima) && (!is_null($v->dpmp_jam_enam) || !is_null($v->dpmp_jam_tujuh) || !is_null($v->dpmp_jam_delapan))) {
                    $psh_jam_lima = explode(':', $v->dpmp_jam_lima);
                    $jam_lima = $psh_jam_lima[0];
                    $jam_pemberian .= $jam_lima . ', ';
                } elseif (!is_null($v->dpmp_jam_lima)) {
                    $psh_jam_lima = explode(':', $v->dpmp_jam_lima);
                    $jam_lima = $psh_jam_lima[0];
                    $jam_pemberian .= $jam_lima;
                }

                if (!is_null($v->dpmp_jam_enam) && (!is_null($v->dpmp_jam_tujuh) || !is_null($v->dpmp_jam_delapan))) {
                    $psh_jam_enam = explode(':', $v->dpmp_jam_enam);
                    $jam_enam = $psh_jam_enam[0];
                    $jam_pemberian .= $jam_enam . ', ';
                } elseif (!is_null($v->dpmp_jam_enam)) {
                    $psh_jam_enam = explode(':', $v->dpmp_jam_enam);
                    $jam_enam = $psh_jam_enam[0];
                    $jam_pemberian .= $jam_enam;
                }

                if (!is_null($v->dpmp_jam_tujuh) && (!is_null($v->dpmp_jam_delapan))) {
                    $psh_jam_tujuh = explode(':', $v->dpmp_jam_tujuh);
                    $jam_tujuh = $psh_jam_tujuh[0];
                    $jam_pemberian .= $jam_tujuh . ', ';
                } elseif (!is_null($v->dpmp_jam_tujuh)) {
                    $psh_jam_tujuh = explode(':', $v->dpmp_jam_tujuh);
                    $jam_tujuh = $psh_jam_tujuh[0];
                    $jam_pemberian .= $jam_tujuh;
                }

                if (!is_null($v->dpmp_jam_delapan)) {
                    $psh_jam_delapan = explode(':', $v->dpmp_jam_delapan);
                    $jam_delapan = $psh_jam_delapan[0];
                    $jam_pemberian .= $jam_delapan;
                }
                
                if (!is_null($jam_pemberian)) {
                    $getJamP = 'JAM ' . $jam_pemberian . ' WIB ';
                }

                if (isset($jnsDiet) && !empty($jnsDiet)) {
                    $newjnsDiet = array_unique($jnsDiet);
                    $dataDiet .= implode(', ', $newjnsDiet) . ' ';
                }

                if (isset($bentuk_makanan) && !empty($bentuk_makanan)) {
                    $newBtkMkn = array_unique($bentuk_makanan);
                    $dataDiet .= implode(', ', $newBtkMkn) . ' ';
                }

                if (isset($diet_cair) && !empty($diet_cair) && implode('', $diet_cair) !== ',,,,,' && implode(', ', $diet_cair) !== ', , , , , ') {
                    $newDietCair = array_unique($diet_cair);
                    $dataDiet .= 'CAIR ' . implode(', ', $newDietCair) . ' ' . implode(', ', $jnsKDC) . ' ' . $getJamP;
                }

			?>
				<tr>
                    <td style="text-align: center"><?= ++$i ?></td>
                    <td style="text-align: center"></td>
                    <td style="text-align: center"><?= $v->tanggal_layanan ?></td>
                    <td style="text-align: center"><?= $v->waktu_dpmp ?></td>
                    <td style="text-align: left"><?= $v->ruangan ?></td>
                    <td style="text-align: center"><?= $v->id_pasien ?></td>
                    <td style="text-align: left"><?= $v->nama ?></td>
                    <td style="text-align: left"><?= hitungUmur($v->tanggal_lahir) ?></td>
                    <td style="text-align: center"><?= $v->tanggal_lahir ?></td>
                    <td style="text-align: center"><?= $v->kelamin ?></td>
                    <td style="text-align: left"><?= ($v->diagnosa != null) ? $v->diagnosa : '' ?></td>
                    <td style="text-align: left"><?= $v->dokter ?></td>
                    <td style="text-align: left"><?= $dataDiet ?></td>
                    <td style="text-align: center"><?= ($v->mp_makan_pasien !== null) ? $v->mp_makan_pasien : '' ?></td>
                    <td style="text-align: center"><?= ($v->sp_makan_pasien !== null) ? $v->sp_makan_pasien : '' ?></td>
                    <td style="text-align: center"><?= ($v->ms_makan_pasien !== null) ? $v->ms_makan_pasien : '' ?></td>
                    <td style="text-align: center"><?= ($v->ss_makan_pasien !== null) ? $v->ss_makan_pasien : '' ?></td>
                    <td style="text-align: center"><?= ($v->mm_makan_pasien !== null) ? $v->mm_makan_pasien : '' ?></td>
                    <td style="text-align: center"><?= ($v->sm_makan_pasien !== null) ? $v->sm_makan_pasien : '' ?></td>
                    <td style="text-align: center"><?= ($v->ket_makan_pasien !== null) ? $v->ket_makan_pasien : '' ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	
</body>
