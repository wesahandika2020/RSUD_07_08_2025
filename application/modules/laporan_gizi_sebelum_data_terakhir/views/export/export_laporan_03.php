<?php
	header_excel("Rekapitulasi Diet - ".$jenis_diet. " - ".$periode);
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
        REKAPITULASI DIET
			<br>Periode : <?= $periode ?>
            <?= (!empty($jenis_diet) ? '<br>Jenis Diet : ' .$jenis_diet : '' ) ?>
            <?= (!empty($tempat_layanan) ? '<br>Tempat Layanan : ' .$tempat_layanan : '' ) ?>
            <?= (!empty($ruangan_ranap) ? ' ('.$ruangan_ranap.')' : '' ) ?>
            <?= (!empty($ruangan_ic) ? ' ('.$ruangan_ic.')' : '' ) ?>			
		</h4>
	</div>

    <?php
        if($jenis_diet=='Diet Makan'){
    ?>
        <table>
            <tr>
                <td>
                    <table border="1">
                        <thead border="2">
                            <tr>
                                <th class="center" colspan="9">JENIS DIET</th>
                            </tr>
                            <tr>
                                <th class="center">No</th>	
                                <th class="center">Diet</th>	
                                <th class="center">MP</th>
                                <th class="center">SP</th>
                                <th class="center">MS</th>
                                <th class="center">SS</th>
                                <th class="center">MM</th>
                                <th class="center">SM</th>
                                <th class="center">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no_jns = 0; $jml_total_jns = 0; 
                                $jml_mp_jns = 0; $jml_sp_jns = 0; 
                                $jml_ms_jns = 0; $jml_ss_jns = 0; 
                                $jml_mm_jns = 0; $jml_sm_jns = 0; 

                                foreach ($jenisdiet as $i => $v) :
                                    $no_jns += 1; $jml_total_jns += intval($v->total);
                                    $jml_mp_jns += intval($v->mp); $jml_sp_jns += intval($v->sp);
                                    $jml_ms_jns += intval($v->ms); $jml_ss_jns += intval($v->ss);
                                    $jml_mm_jns += intval($v->mm); $jml_sm_jns += intval($v->sm);
                            ?>
                                <tr>
                                    <td style="text-align: center"><?= $no_jns ?></td>
                                    <td style="text-align: left">  <?= $i ?></td>
                                    <td style="text-align: center"><?= $v->mp ?></td>
                                    <td style="text-align: center"><?= $v->sp ?></td>
                                    <td style="text-align: center"><?= $v->ms ?></td>
                                    <td style="text-align: center"><?= $v->ss ?></td>
                                    <td style="text-align: center"><?= $v->mm ?></td>
                                    <td style="text-align: center"><?= $v->sm ?></td>
                                    <td style="text-align: center"><?= $v->total ?></td>
                                </tr>

                            <?php endforeach ?>
                                <tr>
                                    <td style="text-align: right" colspan="2"><b>JUMLAH</b></td>
                                    <td style="text-align: center"><b><?= $jml_mp_jns ?></b></td>
                                    <td style="text-align: center"><b><?= $jml_sp_jns ?></b></td>
                                    <td style="text-align: center"><b><?= $jml_ms_jns ?></b></td>
                                    <td style="text-align: center"><b><?= $jml_ss_jns ?></b></td>
                                    <td style="text-align: center"><b><?= $jml_mm_jns ?></b></td>
                                    <td style="text-align: center"><b><?= $jml_sm_jns ?></b></td>
                                    <td style="text-align: center"><b><?= $jml_total_jns ?></b></td>
                                </tr>
                        </tbody>
                    </table>
                </td>
                <td width="10px"></td>
                <td>
                    <table border="1">
                        <thead border="2">
                            <tr>
                                <th class="center" colspan="9">BENTUK MAKAN</th>
                            </tr>
                            <tr>
                                <th class="center">No</th>	
                                <th class="center">Bentuk</th>	
                                <th class="center">MP</th>
                                <th class="center">SP</th>
                                <th class="center">MS</th>
                                <th class="center">SS</th>
                                <th class="center">MM</th>
                                <th class="center">SM</th>
                                <th class="center">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no_bentuk = 0; $jml_total_bentuk = 0; 
                                $jml_mp_bentuk = 0; $jml_sp_bentuk = 0; 
                                $jml_ms_bentuk = 0; $jml_ss_bentuk = 0; 
                                $jml_mm_bentuk = 0; $jml_sm_bentuk = 0; 

                                foreach ($bentukmakan as $i => $v) :
                                    $no_bentuk += 1; $jml_total_bentuk += intval($v->total);
                                    $jml_mp_bentuk += intval($v->mp); $jml_sp_bentuk += intval($v->sp);
                                    $jml_ms_bentuk += intval($v->ms); $jml_ss_bentuk += intval($v->ss);
                                    $jml_mm_bentuk += intval($v->mm); $jml_sm_bentuk += intval($v->sm);
                            ?>
                                <tr>
                                    <td style="text-align: center"><?= $no_bentuk ?></td>
                                    <td style="text-align: left">  <?= $i ?></td>
                                    <td style="text-align: center"><?= $v->mp ?></td>
                                    <td style="text-align: center"><?= $v->sp ?></td>
                                    <td style="text-align: center"><?= $v->ms ?></td>
                                    <td style="text-align: center"><?= $v->ss ?></td>
                                    <td style="text-align: center"><?= $v->mm ?></td>
                                    <td style="text-align: center"><?= $v->sm ?></td>
                                    <td style="text-align: center"><?= $v->total ?></td>
                                </tr>

                            <?php endforeach ?>
                                <tr>
                                    <td style="text-align: right" colspan="2"><b>JUMLAH</b></td>
                                    <td style="text-align: center"><b><?= $jml_mp_bentuk ?></b></td>
                                    <td style="text-align: center"><b><?= $jml_sp_bentuk ?></b></td>
                                    <td style="text-align: center"><b><?= $jml_ms_bentuk ?></b></td>
                                    <td style="text-align: center"><b><?= $jml_ss_bentuk ?></b></td>
                                    <td style="text-align: center"><b><?= $jml_mm_bentuk ?></b></td>
                                    <td style="text-align: center"><b><?= $jml_sm_bentuk ?></b></td>
                                    <td style="text-align: center"><b><?= $jml_total_bentuk ?></b></td>
                                </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>

            
    <?php
        } else {    
    ?>
            <table border="1">
					<thead border="2">
						<tr>
                            <th class="center" colspan="10">DIET CAIR</th>
						</tr>
						<tr>
                            <th class="center">No</th>	
							<th class="center">Merek</th>	
							<th class="center">Jenis Susu</th>	
							<th class="center">MP</th>
							<th class="center">SP</th>
							<th class="center">MS</th>
							<th class="center">SS</th>
							<th class="center">MM</th>
							<th class="center">SM</th>
							<th class="center">TOTAL</th>
						</tr>
					</thead>
				<tbody>
                    <?php
                        $no_cair = 0; $jml_total_cair = 0; 
                        $jml_mp_cair = 0; $jml_sp_cair = 0; 
                        $jml_ms_cair = 0; $jml_ss_cair = 0; 
                        $jml_mm_cair = 0; $jml_sm_cair = 0; 

                        foreach ($cair as $i => $v) :
                            $no_cair += 1; $jml_total_cair += intval($v->total);
                            $jml_mp_cair += intval($v->mp); $jml_sp_cair += intval($v->sp);
                            $jml_ms_cair += intval($v->ms); $jml_ss_cair += intval($v->ss);
                            $jml_mm_cair += intval($v->mm); $jml_sm_cair += intval($v->sm);
                    ?>
                        <tr>
                            <td style="text-align: center"><?= $no_cair ?></td>
                            <td style="text-align: left">  <?= $i ?></td>
                            <td style="text-align: left">  <?= $v->jenis_susu ?></td>
                            <td style="text-align: center"><?= $v->mp ?></td>
                            <td style="text-align: center"><?= $v->sp ?></td>
                            <td style="text-align: center"><?= $v->ms ?></td>
                            <td style="text-align: center"><?= $v->ss ?></td>
                            <td style="text-align: center"><?= $v->mm ?></td>
                            <td style="text-align: center"><?= $v->sm ?></td>
                            <td style="text-align: center"><?= $v->total ?></td>
                        </tr>

                    <?php endforeach ?>
                        <tr>
                            <td style="text-align: right" colspan="3"><b>JUMLAH</b></td>
                            <td style="text-align: center"><b><?= $jml_mp_cair ?></b></td>
                            <td style="text-align: center"><b><?= $jml_sp_cair ?></b></td>
                            <td style="text-align: center"><b><?= $jml_ms_cair ?></b></td>
                            <td style="text-align: center"><b><?= $jml_ss_cair ?></b></td>
                            <td style="text-align: center"><b><?= $jml_mm_cair ?></b></td>
                            <td style="text-align: center"><b><?= $jml_sm_cair ?></b></td>
                            <td style="text-align: center"><b><?= $jml_total_cair ?></b></td>
                        </tr>
                </tbody>
            </table>

    <?php
        }
    ?>
                

</body>
