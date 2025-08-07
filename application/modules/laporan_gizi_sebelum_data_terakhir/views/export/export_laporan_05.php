<?php
	header_excel("Daftar Diet Pasien Untuk Pramusaji - ".$periode);
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
		<h4>DAFTAR DIET PASIEN UNTUK PRAMUSAJI
			<br>Periode : <?= $periode ?>
            <?= (!empty($jenis_diet) ? '<br>Jenis Diet : ' .$jenis_diet : '' ) ?>
		</h4>
	</div>

    <?php foreach ($data as $i => $v) : 
        if (count($v) >= 1) {
            $nama_bangsal = str_replace('_', ' ', $i);
            ?>
                <table border="1">
                    <thead border="2">                        
                        <tr style="text-transform: uppercase; background-color: #9cc8ff;">
                            <th class="center" colspan="4"><?= $nama_bangsal ?></th>
                            <th class="center" colspan="2">TOTAL = <?= count($v) ?></th>
                        </tr>
                        <tr style="background-color: #9cc8ff;" >
                            <th class="center">No.</th>
                            <th class="center">Ruangan</th>
                            <th class="center">No RM</th>
                            <th class="center">Nama</th>
                            <th class="center">Tgl Lahir</th>
                            <th class="center">Diet</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($v as $key => $value) : 
                            $dataDiet       = '';
                            $jnsDiet        = [];
                            $bentuk_makanan = [];
                            $diet_cair      = [];
                            $jnsKDC         = [];
                            $getJamP        = '';
                            $jnsDiet        = [$value->jns_diet_mp, $value->jns_diet_sp, $value->jns_diet_ms, $value->jns_diet_ss, $value->jns_diet_mm, $value->jns_diet_sm];
                            $bentuk_makanan = [$value->btk_mkn_mp, $value->btk_mkn_sp, $value->btk_mkn_ms, $value->btk_mkn_ss, $value->btk_mkn_mm, $value->btk_mkn_sm];
                            $diet_cair      = [$value->mp_kode, $value->ms_kode, $value->mm_kode, $value->ss_kode, $value->sp_kode, $value->sm_kode];
                            $jnsKDC         = [$value->kdc];
                        
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
                            <td class="center"><?= ($key + 1) ?></td>
                            <td class="left"><?= $value->ruangan ?></td>
                            <td class="center"><?= $value->id_pasien ?></td>
                            <td class="left"><?= $value->nama ?></td>
                            <td class="center"><?= datefmysql($value->tanggal_lahir) ?></td>
                            <td class="left"><?= $dataDiet ?></td>
                        </tr>
                        <?php endforeach; ?>

                        <tr>
                            <td colspan="6"></td>
                        </tr>
                    </tbody>
                </table>
    <?php } endforeach; ?>
</body>
