<?php
	header_excel("Check List Makanan Cair - ".$periode);
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
		<h4>CHECK LIST MAKANAN CAIR
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
            <th class="center">Berat</th>
            <th class="center">Diet</th>
            <th class="center" colspan="8">Jam Pemberian</th>
            <th class="center">Freq</th>
            <th class="center">Jumlah (gr)</th>
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
                $getJamP        = '';
                $jnsDiet        = [$v->jns_diet_mp, $v->jns_diet_sp, $v->jns_diet_ms, $v->jns_diet_ss, $v->jns_diet_mm, $v->jns_diet_sm];
                $bentuk_makanan = [$v->btk_mkn_mp, $v->btk_mkn_sp, $v->btk_mkn_ms, $v->btk_mkn_ss, $v->btk_mkn_mm, $v->btk_mkn_sm];
                $diet_cair      = [$v->mp_kode, $v->ms_kode, $v->mm_kode, $v->ss_kode, $v->sp_kode, $v->sm_kode];
                $jnsKDC         = [$v->kdc];
            
                

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
                    $dataDiet .= 'CAIR ' . implode(', ', $newDietCair) . ' ' . implode(', ', $jnsKDC);
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
                    <td style="text-align: left"><?= ($v->dpmp_gram !== null) ? $v->dpmp_gram : '' ?></td>
                    <td style="text-align: left"><?= $dataDiet ?></td>
                    <td class="center"><?= ($v->dpmp_jam_satu !== null) ? 	$v->dpmp_jam_satu : '' ?></td>
                    <td class="center"><?= ($v->dpmp_jam_dua !== null) ? 	$v->dpmp_jam_dua : '' ?></td>
                    <td class="center"><?= ($v->dpmp_jam_tiga !== null) ? 	$v->dpmp_jam_tiga : '' ?></td>
                    <td class="center"><?= ($v->dpmp_jam_empat !== null) ? 	$v->dpmp_jam_empat : '' ?></td>
                    <td class="center"><?= ($v->dpmp_jam_lima !== null) ? 	$v->dpmp_jam_lima : '' ?></td>
                    <td class="center"><?= ($v->dpmp_jam_enam !== null) ? 	$v->dpmp_jam_enam : '' ?></td>
                    <td class="center"><?= ($v->dpmp_jam_tujuh !== null) ? 	$v->dpmp_jam_tujuh : '' ?></td>
                    <td class="center"><?= ($v->dpmp_jam_delapan !== null) ? $v->dpmp_jam_delapan : '' ?></td>
                    <td class="center"><?= $v->freq ?></td>
                    <td class="center"></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	
</body>
