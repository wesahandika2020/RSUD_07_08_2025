<?php
	header_excel("Laporan Pendapatan Berdasarkan Layanan Penunjang - ".$periode);
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
		<h4>Laporan Pendapatan Berdasarkan Layanan Penunjang
			<br>Periode : <?= $periode ?>
            <?= (!empty($penjamin) ? '<br>Penjamin : ' .$penjamin : '' ) ?>
            <?= (!empty($dokter) ? '<br>Dokter : ' .$dokter : '' ) ?>
		</h4>
	</div>

    <table>
    <tr>
        <td>
            <table border="1">
                <thead border="2">
                    <tr height="30pt" style="text-transform: uppercase;">
                        <th style="background-color: #9cc8ff; text-align: center;" colspan="5">Laboratorium</th>
                    </tr>
                    <tr height="30pt" style="text-transform: uppercase;">
                        <th style="background-color: #9cc8ff; text-align: center;">No</th>
                        <th style="background-color: #9cc8ff; text-align: center;">Dokter</th>
                        <th style="background-color: #9cc8ff; text-align: center;">Penjamin</th>
                        <th style="background-color: #9cc8ff; text-align: center;">Jml<br>Kunjungan</th>
                        <th style="background-color: #9cc8ff; text-align: center;">Total</th>
                    </tr>
                </thead>
            <tbody>
                <?php
                $no = 1 ; $jml = $total = $all_jml = $all_total = 0;
                foreach ($data['lab'] as $key_dokter => $penjamin_list) {
                    $nama_dokter = str_replace('_', ' ', $key_dokter);            
                    foreach ($penjamin_list as $key_penjamin => $layanan_list) {
                        $penjamin = str_replace('_', ' ', $key_penjamin);
                        $jml        = $layanan_list[0]->jml;
                        $total      = isset($layanan_list[0]->total) ? $layanan_list[0]->total : 0;
                        $all_jml    += (int)$jml;  
                        $all_total  += (int)$total;  
                ?>
                        <tr>        
                            <td style="text-align: center;"><?= $no++ ?></td>
                            <td style="text-align: left;"><?= $nama_dokter ?></td>
                            <td style="text-align: center;"><?= $penjamin ?></td>
                            <td style="background: #45b1ff33; text-align: center;"><?= $jml ?></td>
                            <td style="background: #45b1ff33; text-align: right;"><?= number_format($total, 0, ",", ".") ?></td>
                        </tr>
                <?php
                    $jml = 0; $total = 0;
                    };
                };
                ?>
                    <tr style="background-color: #45b1ff94;">
                        <td style="text-align: right;" colspan="3"><b>TOTAL SELURUH</b></td>
                        <td style="text-align: center;"><b><?= number_format($all_jml, 0, ",", ".") ?></b></td>
                        <td style="text-align: right;" ><b><?= number_format($all_total, 0, ",", ".") ?></b></td>
                    </tr>        
            </tbody>
            </table>
        </td>

        <td></td>
        <td>
            <table border="1">
                <thead border="2">
                    <tr height="30pt" style="text-transform: uppercase;">
                        <th style="background-color: #9cc8ff; text-align: center;" colspan="5">Radiologi</th>
                    </tr>
                    <tr height="30pt" style="text-transform: uppercase;">
                        <th style="background-color: #9cc8ff; text-align: center;">No</th>
                        <th style="background-color: #9cc8ff; text-align: center;">Dokter</th>
                        <th style="background-color: #9cc8ff; text-align: center;">Penjamin</th>
                        <th style="background-color: #9cc8ff; text-align: center;">Jml<br>Kunjungan</th>
                        <th style="background-color: #9cc8ff; text-align: center;">Total</th>
                    </tr>
                </thead>
            <tbody>
                <?php
                $no = 1 ; $jml = $total = $all_jml = $all_total = 0;
                foreach ($data['rad'] as $key_dokter => $penjamin_list) {
                    $nama_dokter = str_replace('_', ' ', $key_dokter);            
                    foreach ($penjamin_list as $key_penjamin => $layanan_list) {
                        $penjamin = str_replace('_', ' ', $key_penjamin);
                        $jml        = $layanan_list[0]->jml;
                        $total      = isset($layanan_list[0]->total) ? $layanan_list[0]->total : 0;
                        $all_jml    += (int)$jml;  
                        $all_total  += (int)$total;  
                ?>
                        <tr>        
                            <td style="text-align: center;"><?= $no++ ?></td>
                            <td style="text-align: left;"><?= $nama_dokter ?></td>
                            <td style="text-align: center;"><?= $penjamin ?></td>
                            <td style="background: #45b1ff33; text-align: center;"><?= $jml ?></td>
                            <td style="background: #45b1ff33; text-align: right;"><?= number_format($total, 0, ",", ".") ?></td>
                        </tr>
                <?php
                    $jml = 0; $total = 0;
                    };
                };
                ?>
                    <tr style="background-color: #45b1ff94;">
                        <td style="text-align: right;" colspan="3"><b>TOTAL SELURUH</b></td>
                        <td style="text-align: center;"><b><?= number_format($all_jml, 0, ",", ".") ?></b></td>
                        <td style="text-align: right;" ><b><?= number_format($all_total, 0, ",", ".") ?></b></td>
                    </tr>        
            </tbody>
            </table>
        </td>

        <td></td>
        <td>
            <table border="1">
                <thead border="2">
                    <tr height="30pt" style="text-transform: uppercase;">
                        <th style="background-color: #9cc8ff; text-align: center;" colspan="5">OK</th>
                    </tr>
                    <tr height="30pt" style="text-transform: uppercase;">
                        <th style="background-color: #9cc8ff; text-align: center;">No</th>
                        <th style="background-color: #9cc8ff; text-align: center;">Dokter</th>
                        <th style="background-color: #9cc8ff; text-align: center;">Penjamin</th>
                        <th style="background-color: #9cc8ff; text-align: center;">Jml<br>Kunjungan</th>
                        <th style="background-color: #9cc8ff; text-align: center;">Total</th>
                    </tr>
                </thead>
            <tbody>
                <?php
                $no = 1 ; $jml = $total = $all_jml = $all_total = 0;
                foreach ($data['ok'] as $key_dokter => $penjamin_list) {
                    $nama_dokter = str_replace('_', ' ', $key_dokter);            
                    foreach ($penjamin_list as $key_penjamin => $layanan_list) {
                        $penjamin = str_replace('_', ' ', $key_penjamin);
                        $jml        = $layanan_list[0]->jml;
                        $total      = isset($layanan_list[0]->total) ? $layanan_list[0]->total : 0;
                        $all_jml    += (int)$jml;  
                        $all_total  += (int)$total;  
                ?>
                        <tr>        
                            <td style="text-align: center;"><?= $no++ ?></td>
                            <td style="text-align: left;"><?= $nama_dokter ?></td>
                            <td style="text-align: center;"><?= $penjamin ?></td>
                            <td style="background: #45b1ff33; text-align: center;"><?= $jml ?></td>
                            <td style="background: #45b1ff33; text-align: right;"><?= number_format($total, 0, ",", ".") ?></td>
                        </tr>
                <?php
                    $jml = 0; $total = 0;
                    };
                };
                ?>
                    <tr style="background-color: #45b1ff94;">
                        <td style="text-align: right;" colspan="3"><b>TOTAL SELURUH</b></td>
                        <td style="text-align: center;"><b><?= number_format($all_jml, 0, ",", ".") ?></b></td>
                        <td style="text-align: right;" ><b><?= number_format($all_total, 0, ",", ".") ?></b></td>
                    </tr>        
            </tbody>
            </table>
        </td>

        <td></td>
        <td>
            <table border="1">
                <thead border="2">
                    <tr height="30pt" style="text-transform: uppercase;">
                        <th style="background-color: #9cc8ff; text-align: center;" colspan="5">VK</th>
                    </tr>
                    <tr height="30pt" style="text-transform: uppercase;">
                        <th style="background-color: #9cc8ff; text-align: center;">No</th>
                        <th style="background-color: #9cc8ff; text-align: center;">Dokter</th>
                        <th style="background-color: #9cc8ff; text-align: center;">Penjamin</th>
                        <th style="background-color: #9cc8ff; text-align: center;">Jml<br>Kunjungan</th>
                        <th style="background-color: #9cc8ff; text-align: center;">Total</th>
                    </tr>
                </thead>
            <tbody>
                <?php
                $no = 1 ; $jml = $total = $all_jml = $all_total = 0;
                foreach ($data['vk'] as $key_dokter => $penjamin_list) {
                    $nama_dokter = str_replace('_', ' ', $key_dokter);            
                    foreach ($penjamin_list as $key_penjamin => $layanan_list) {
                        $penjamin = str_replace('_', ' ', $key_penjamin);
                        $jml        = $layanan_list[0]->jml;
                        $total      = isset($layanan_list[0]->total) ? $layanan_list[0]->total : 0;
                        $all_jml    += (int)$jml;  
                        $all_total  += (int)$total;  
                ?>
                        <tr>        
                            <td style="text-align: center;"><?= $no++ ?></td>
                            <td style="text-align: left;"><?= $nama_dokter ?></td>
                            <td style="text-align: center;"><?= $penjamin ?></td>
                            <td style="background: #45b1ff33; text-align: center;"><?= $jml ?></td>
                            <td style="background: #45b1ff33; text-align: right;"><?= number_format($total, 0, ",", ".") ?></td>
                        </tr>
                <?php
                    $jml = 0; $total = 0;
                    };
                };
                ?>
                    <tr style="background-color: #45b1ff94;">
                        <td style="text-align: right;" colspan="3"><b>TOTAL SELURUH</b></td>
                        <td style="text-align: center;"><b><?= number_format($all_jml, 0, ",", ".") ?></b></td>
                        <td style="text-align: right;" ><b><?= number_format($all_total, 0, ",", ".") ?></b></td>
                    </tr>        
            </tbody>
            </table>
        </td>
    </tr>
    </table>

        
    
</body>
