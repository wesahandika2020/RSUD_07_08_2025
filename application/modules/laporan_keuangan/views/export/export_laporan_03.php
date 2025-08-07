<?php
	header_excel("Laporan Pendapatan Berdasarkan Layanan Selain Dokter Spesialis dan Umum - ".$periode);
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
		<h4>Laporan Pendapatan Berdasarkan Layanan Selain Dokter Spesialis dan Umum
			<br>Periode : <?= $periode ?>
            <?= (!empty($penjamin) ? '<br>Penjamin : ' .$penjamin : '' ) ?>
            <?= (!empty($dokter) ? '<br>Dokter : ' .$dokter : '' ) ?>
		</h4>
	</div>

    <table border="1">
		<thead border="2">
            <tr height="30pt" style="text-transform: uppercase;">
                <th style="background-color: #9cc8ff; text-align: center;" rowspan="3">No.</th>	
                <th style="background-color: #9cc8ff; text-align: center;" rowspan="3">Dokter</th>
                <th style="background-color: #9cc8ff; text-align: center;" rowspan="3">Penjamin</th>
                <th style="background-color: #9cc8ff; text-align: center;" colspan="16">Tindakan</th>
                <th style="background-color: #9cc8ff; text-align: center;" rowspan="3">Total Tindakan</th>
                <th style="background-color: #9cc8ff; text-align: center;" rowspan="3">Resep</th>
            </tr>
            <tr height="30pt" style="text-transform: uppercase;">
                <th style="background-color: #9cc8ff; text-align: center;" colspan="2">Poliklinik</th>
                <th style="background-color: #9cc8ff; text-align: center;" colspan="2">IGD</th>
                <th style="background-color: #9cc8ff; text-align: center;" colspan="2">Rawat Inap</th>						
                <th style="background-color: #9cc8ff; text-align: center;" colspan="2">Intensive Care</th>
                <th style="background-color: #9cc8ff; text-align: center;" colspan="2">Medical Check Up</th>
                <th style="background-color: #9cc8ff; text-align: center;" colspan="2">Radiologi</th>
                <th style="background-color: #9cc8ff; text-align: center;" colspan="2">Laboratorium</th>
                <th style="background-color: #9cc8ff; text-align: center;" colspan="2">Hemodialisa</th>
            </tr>
            <tr height="30pt" style="text-transform: uppercase;">
                <th style="background-color: #9cc8ff; text-align: center;">Jml</th>
                <th style="background-color: #9cc8ff; text-align: center;">Total</th>
                <th style="background-color: #9cc8ff; text-align: center;">Jml</th>
                <th style="background-color: #9cc8ff; text-align: center;">Total</th>
                <th style="background-color: #9cc8ff; text-align: center;">Jml</th>
                <th style="background-color: #9cc8ff; text-align: center;">Total</th>
                <th style="background-color: #9cc8ff; text-align: center;">Jml</th>
                <th style="background-color: #9cc8ff; text-align: center;">Total</th>
                <th style="background-color: #9cc8ff; text-align: center;">Jml</th>
                <th style="background-color: #9cc8ff; text-align: center;">Total</th>
                <th style="background-color: #9cc8ff; text-align: center;">Jml</th>
                <th style="background-color: #9cc8ff; text-align: center;">Total</th>
                <th style="background-color: #9cc8ff; text-align: center;">Jml</th>
                <th style="background-color: #9cc8ff; text-align: center;">Total</th>
                <th style="background-color: #9cc8ff; text-align: center;">Jml</th>
                <th style="background-color: #9cc8ff; text-align: center;">Total</th>
            </tr>
		</thead>	
		<tbody>
			<?php
                $no = 1;
				$layanan = '';
				$poli_jml  = 0; $poli_total  = 0;
				$igd_jml   = 0; $igd_total   = 0;
				$ranap_jml = 0; $ranap_total = 0;
				$ic_jml    = 0; $ic_total    = 0;
				$mcu_jml   = 0; $mcu_total   = 0;
				$rad_jml   = 0; $rad_total   = 0;
				$lab_jml   = 0; $lab_total   = 0;
				$hd_jml    = 0; $hd_total    = 0;
				$resep 	   = 0;

				$all_total_tindakan = 0;
				$all_poli_jml  = 0; $all_poli_total  = 0;
				$all_igd_jml   = 0; $all_igd_total   = 0;
				$all_ranap_jml = 0; $all_ranap_total = 0;
				$all_ic_jml    = 0; $all_ic_total    = 0;
				$all_mcu_jml   = 0; $all_mcu_total   = 0;
				$all_rad_jml   = 0; $all_rad_total   = 0;
				$all_lab_jml   = 0; $all_lab_total   = 0;
				$all_hd_jml    = 0; $all_hd_total    = 0;
				$all_resep 	   = 0;

                // var_dump($data); die;
                foreach ($data as $key_dokter => $penjamin_list) {
                    $nama_dokter = str_replace('_', ' ', $key_dokter);
                
                    foreach ($penjamin_list as $key_penjamin => $layanan_list) {
                        $penjamin = str_replace('_', ' ', $key_penjamin);
                
                        foreach ($layanan_list as $key_layanan => $value_layanan) {
                            $layanan = str_replace('_', ' ', $key_layanan);


                            if ($layanan === 'Poliklinik') {
                                $poli_jml = $value_layanan[0]->jml;
                                $poli_total = isset($value_layanan[0]->total) ? $value_layanan[0]->total : 0;
                            }

                            if ($layanan === 'IGD') {
                                $igd_jml = $value_layanan[0]->jml;
                                $igd_total = isset($value_layanan[0]->total) ? $value_layanan[0]->total : 0;
                            }

                            if ($layanan === 'Rawat Inap') {
                                $ranap_jml = $value_layanan[0]->jml;
                                $ranap_total = isset($value_layanan[0]->total) ? $value_layanan[0]->total : 0;
                            }

                            if ($layanan === 'Intensive Care') {
                                $ic_jml = $value_layanan[0]->jml;
                                $ic_total = isset($value_layanan[0]->total) ? $value_layanan[0]->total : 0;
                            }

                            if ($layanan === 'Medical Check Up') {
                                $mcu_jml = $value_layanan[0]->jml;
                                $mcu_total = isset($value_layanan[0]->total) ? $value_layanan[0]->total : 0;
                            }

                            if ($layanan === 'Radiologi') {
                                $rad_jml = $value_layanan[0]->jml;
                                $rad_total = isset($value_layanan[0]->total) ? $value_layanan[0]->total : 0;
                            }

                            if ($layanan === 'Laboratorium') {
                                $lab_jml = $value_layanan[0]->jml;
                                $lab_total = isset($value_layanan[0]->total) ? $value_layanan[0]->total : 0;
                            }

                            if ($layanan === 'Hemodialisa') {
                                $hd_jml = $value_layanan[0]->jml;
                                $hd_total = isset($value_layanan[0]->total) ? $value_layanan[0]->total : 0;
                            }

                            if ($layanan === 'Resep') {
                                $resep = isset($value_layanan[0]->total) ? $value_layanan[0]->total : 0;
                            }
						
						};

                        $total_tindakan = (int)$poli_total + (int)$igd_total + (int)$ranap_total + (int)$ic_total + (int)$mcu_total + (int)$rad_total + (int)$lab_total + (int)$hd_total;
                        $all_total_tindakan += (int)$total_tindakan;
                        $all_poli_jml  += (int)$poli_jml; $all_poli_total  += (int)$poli_total;                        
                        $all_igd_jml   += (int)$igd_jml;  $all_igd_total   += (int)$igd_total;                        
                        $all_ranap_jml += (int)$ranap_jml;$all_ranap_total += (int)$ranap_total;                        
                        $all_ic_jml    += (int)$ic_jml;   $all_ic_total    += (int)$ic_total;                          
                        $all_mcu_jml   += (int)$mcu_jml;  $all_mcu_total   += (int)$mcu_total;                        
                        $all_rad_jml   += (int)$rad_jml;  $all_rad_total   += (int)$rad_total;                           
                        $all_lab_jml   += (int)$lab_jml;  $all_lab_total   += (int)$lab_total;                          
                        $all_hd_jml    += (int)$hd_jml;   $all_hd_total    += (int)$hd_total;                        
                        $all_resep     += (int)$resep;                      

                        ?>

                       
						<tr>
							<td style="text-align: center;"><?= $no++ ?></td>
							<td style="text-align: left;"><?= $nama_dokter ?></td>
							<td style="text-align: center;"><?= $penjamin ?></td>

							<td style="background: #45b1ff33; text-align: center;"><?= $poli_jml ?></td>
							<td style="background: #45b1ff33; text-align: right;"><?= number_format($poli_total, 0, ",", ".") ?></td>

							<td style="background: #45b1ff6e; text-align: center;"><?= $igd_jml ?></td>
							<td style="background: #45b1ff6e; text-align: right;"><?= number_format($igd_total, 0, ",", ".") ?></td>
							
							<td style="background: #45b1ff33; text-align: center;"><?= $ranap_jml ?></td>
							<td style="background: #00ff372vb; text-align: right;"><?= number_format($ranap_total, 0, ",", ".") ?></td>

							<td style="background: #45b1ff6e; text-align: center;"><?= $ic_jml ?></td>
							<td style="background: #45b1ff6e; text-align: right;"><?= number_format($ic_total, 0, ",", ".") ?></td>
							
							<td style="background: #45b1ff33; text-align: center;"><?= $mcu_jml ?></td>
							<td style="background: #45b1ff33; text-align: right;"><?= number_format($mcu_total, 0, ",", ".") ?></td>

							<td style="background: #45b1ff6e; text-align: center;"><?= $rad_jml ?></td>
							<td style="background: #45b1ff6e; text-align: right;"><?= number_format($rad_total, 0, ",", ".") ?></td>
							
							<td style="background: #45b1ff6e; text-align: center;"><?= $lab_jml ?></td>
							<td style="background: #45b1ff6e; text-align: right;"><?= number_format($lab_total, 0, ",", ".") ?></td>

							<td style="background: #45b1ff6e; text-align: center;"><?= $hd_jml ?></td>
							<td style="background: #45b1ff6e; text-align: right;"><?= number_format($hd_total, 0, ",", ".") ?></td>
							
							<td style="background: #45b1ff33; text-align: right;"><b><?= number_format($total_tindakan, 0, ",", ".") ?></b></td>

							<td style="text-align: right;"><?= number_format($resep, 0, ",", ".") ?></td>

						</tr>

                        <?php
                            $layanan = '';
                            $poli_jml  = 0; $poli_total  = 0;                            
                            $igd_jml   = 0; $igd_total   = 0;                            
                            $ranap_jml = 0; $ranap_total = 0;                            
                            $ic_jml    = 0; $ic_total    = 0;                            
                            $mcu_jml   = 0; $mcu_total   = 0;                             
                            $rad_jml   = 0; $rad_total   = 0;                             
                            $lab_jml   = 0; $lab_total   = 0;                             
                            $hd_jml    = 0; $hd_total    = 0;
                            $resep     = 0; 
					};
				};
                
			?>
				<tr style="background-color: #45b1ff94;">
                    <td style="text-align: right;" colspan="3"><b>TOTAL SELURUH</b></td>
                    <td style="text-align: center;"><b><?= number_format($all_poli_jml, 0, ",", ".") ?></b></td>
                    <td style="text-align: right;" ><b><?= number_format($all_poli_total, 0, ",", ".") ?></b></td>
                    <td style="text-align: center;"><b><?= number_format($all_igd_jml, 0, ",", ".") ?></b></td>
                    <td style="text-align: right;" ><b><?= number_format($all_igd_total, 0, ",", ".") ?></b></td>
                    <td style="text-align: center;"><b><?= number_format($all_ranap_jml, 0, ",", ".") ?></b></td>
                    <td style="text-align: right;" ><b><?= number_format($all_ranap_total, 0, ",", ".") ?></b></td>
                    <td style="text-align: center;"><b><?= number_format($all_ic_jml, 0, ",", ".") ?></b></td>
                    <td style="text-align: right;" ><b><?= number_format($all_ic_total, 0, ",", ".") ?></b></td>
                    <td style="text-align: center;"><b><?= number_format($all_mcu_jml, 0, ",", ".") ?></b></td>
                    <td style="text-align: right;" ><b><?= number_format($all_mcu_total, 0, ",", ".") ?></b></td>
                    <td style="text-align: center;"><b><?= number_format($all_rad_jml, 0, ",", ".") ?></b></td>
                    <td style="text-align: right;" ><b><?= number_format($all_rad_total, 0, ",", ".") ?></b></td>
                    <td style="text-align: center;"><b><?= number_format($all_lab_jml, 0, ",", ".") ?></b></td>
                    <td style="text-align: right;" ><b><?= number_format($all_lab_total, 0, ",", ".") ?></b></td>
                    <td style="text-align: center;"><b><?= number_format($all_hd_jml, 0, ",", ".") ?></b></td>
                    <td style="text-align: right;" ><b><?= number_format($all_hd_total, 0, ",", ".") ?></b></td>
                    <td style="text-align: right;" ><b><?= number_format($all_total_tindakan, 0, ",", ".") ?></b></td>
                    <td style="text-align: right;" ><b><?= number_format($all_resep, 0, ",", ".") ?></b></td>
                </tr>
		</tbody>
	</table>
</body>
