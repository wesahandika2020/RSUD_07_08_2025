<div class="page page_break">
	<style>
		.table-echo {
			border: 1px solid #000;
			padding-left: 8px;
			padding-right: 8px;
		}
	</style>
	<table width="100%" class="td-top" style="color:#000; border-bottom: 2px solid #000;">
		<tr>
			<td rowspan="3" style="width:70px"><img src="<?= resource_url() ?>images/logos/<?= $hospital->logo ?>" width="70px" height="70px"></td>
			<td colspan="3" align="center"><b style="font-weight:bold; font-size: 16pt;"><?= strtoupper($hospital->nama) ?></b></td>
			<td rowspan="3" style="width:70px">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" align="center"><b style="font-weight:bold; font-size: 11pt;"><?= strtoupper($hospital->alamat) ?></b></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><b style="font-weight:bold; font-size: 10pt;">Telp. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?> Email : <?= $hospital->email ?></b></td>
		</tr>
	</table>
	<br><br>
	<table width="100%" class="td-top table-echo">
		<tr>
			<td>
				<table width="100%">
					<tr>
						<td width="8%">Name</td>
						<td width="2%">:</td>
						<td width="24%"><?= $pendaftaran['pasien']->nama ?></td>
						<td width="12%">No. RM</td>
						<td wdith="2%">:</td>
						<td width="24%"><?= $pendaftaran['pasien']->no_rm ?></td>
						<td width="10%">DOB</td>
						<td wdith="2%">:</td>
						<td width="24%"><?= datefmysql($pendaftaran['pasien']->tanggal_lahir) ?></td>
					</tr>
					<tr>
						<td>Age</td>
						<td>:</td>
						<td><?= createUmur2($pendaftaran['pasien']->tanggal_lahir) ?></td>
						<td>Weight</td>
						<td>:</td>
						<td><?= $echo->profil_pasien->berat_badan ?> Kg</td>
						<td>Height</td>
						<td>:</td>
						<td><?= $echo->profil_pasien->tinggi_badan ?> Cm</td>
					</tr>
					<tr>
						<td>Address</td>
						<td>:</td>
						<td style="font-size: 9pt;"><?= $pendaftaran['pasien']->alamat ?></td>
						<td>Request By</td>
						<td>:</td>
						<td><?= $echo->tenaga_medis_request ?></td>
						<td>Date Tracking</td>
						<td>:</td>
						<td><?= datefmysql($echo->date_tracking) ?></td>
					</tr>
					<tr>
						<td colspan="9">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr><td><hr></td></tr>
		<tr>
			<td>
				<center><h2>Working Diagnosis and Clinical Question</h2></center>
			</td>
		</tr>
		<tr><td><hr></td></tr>
		<?php $measurement = $echo->measurement ?>
		<tr>
			<td>
				<h3>MEASUREMENT :</h3>
				<table width="100%">
					<tr>
						<td width="15%"></td>
						<td width="20%"></td>
						<td width="3%"></td>
						<td width="30%"></td>
						<td width="32%">Normal Value</td>
					</tr>
					<tr>
						<td class="bold">Aorta</td>
						<td>Root Diameter</td>
						<td>:</td>
						<td><?= $measurement->aorta->root_diameter ?></td>
					</tr>
					<tr>
     					<td class="bold">Left Atrium</td>
     					<td>Dimension</td>
     					<td>:</td>
     					<td><?= $measurement->left_atrium->dimension ?></td>
     					<td>( 15 - 40 mm)</td>
     				</tr>
     				<tr>
     					<td></td>
     					<td>LA / Ao Ratio</td>
     					<td>:</td>
     					<td><?= $measurement->left_atrium->laao_ratio ?></td>
     					<td>( < 1->3)</td>
     				</tr>
     				<tr>
     					<td></td>
     					<td>AVO</td>
     					<td>:</td>
     					<td><?= $measurement->left_atrium->avo ?></td>
     					<td></td>
     				</tr>
     				<tr>
     					<td class="bold">Right Ventricle</td>
     					<td>Dimension</td>
     					<td>:</td>
     					<td><?= $measurement->right_ventricle->dimension ?></td>
     					<td>( < 30 mm)</td>
     				</tr>
     				<tr>
     					<td class="bold">Left Ventricle</td>
     					<td>EDD</td>
     					<td>:</td>
     					<td><?= $measurement->left_ventricle->edd ?></td>
     					<td>( 35 - 52 mm)</td>
     				</tr>
     				<tr>
     					<td></td>
     					<td>ESD</td>
     					<td>:</td>
     					<td><?= $measurement->left_ventricle->esd ?></td>
     					<td>( 26 - 36 mm)</td>
     				</tr>
     				<tr>
     					<td></td>
     					<td>IVS Diastole</td>
     					<td>:</td>
     					<td><?= $measurement->left_ventricle->ivs_diastole ?></td>
     					<td>( 7 - 11 mm)</td>
     				</tr>
     				<tr>
     					<td></td>
     					<td>IVS Systole</td>
     					<td>:</td>
     					<td><?= $measurement->left_ventricle->ivs_systole ?></td>
     					<td></td>
     				</tr>
     				<tr>
     					<td></td>
     					<td>IVS Fract. Thickening %</td>
     					<td>:</td>
     					<td><?= $measurement->left_ventricle->ivs_fract ?></td>
     					<td>( > 30%)</td>
     				</tr>
     				<tr>
     					<td></td>
     					<td>PW Diastole</td>
     					<td>:</td>
     					<td><?= $measurement->left_ventricle->pw_diastole ?></td>
     					<td>( 7 - 11 mm)</td>
     				</tr>
     				<tr>
     					<td></td>
     					<td>PW Systole</td>
     					<td>:</td>
     					<td><?= $measurement->left_ventricle->pw_systole ?></td>
     					<td>( mm)</td>
     				</tr>
     				<tr>
     					<td></td>
     					<td>PW Fract. Thickening %</td>
     					<td>:</td>
     					<td><?= $measurement->left_ventricle->pw_fract ?></td>
     					<td>( > 30%)</td>
     				</tr>
     				<tr>
     					<td></td>
     					<td>EF</td>
     					<td>:</td>
     					<td><?= $measurement->left_ventricle->ef ?></td>
     					<td>( 53 - 77% )</td>
     				</tr>
     				<tr>
     					<td></td>
     					<td>IVS / PW Ratio</td>
     					<td>:</td>
     					<td><?= $measurement->left_ventricle->ivspwratio ?></td>
     					<td>( < 1.3 )</td>
     				</tr>
     				<tr>
     					<td class="bold">Mitral Valve</td>
     					<td>EPSS</td>
     					<td>:</td>
     					<td><?= $measurement->mitral_valve->epss ?></td>
     					<td>( < 10 mm )</td>
     				</tr>
     				<tr>
     					<td></td>
     					<td>MVA</td>
     					<td>:</td>
     					<td><?= $measurement->mitral_valve->mva ?></td>
     					<td>( > 3 cm )</td>
     				</tr>
				</table>
			</td>
		</tr>
		<tr><td><hr></td></tr>
		<tr>
     		<td>
     			<h3 class="bold">FINDINGS AND COMMENTS : </h3>
     		</td>
     	</tr>
     	<tr>
     		<td>
     			<?= $echo->finding ?>
     		</td>
     	</tr>
     	<tr>
 			<td>&nbsp;</td>
 		</tr>
     	<tr>
     		<td>
     			<h3 class="bold">DIAGNOSTIC IMPRESSION : </h3>
     		</td>
     	</tr>
     	<tr>
     		<td>
     			<?= $echo->diag_impression ?>
     		</td>
     	</tr>
     	<tr>
     		<td style="text-align: right;">
     			CARDIOLOGIST
     		</td>
     	</tr>
     	<tr>
 			<td>&nbsp;</td>
 		</tr>
 		<tr>
     		<td style="text-align: right;">
				 <?= $echo->dokter_penanggung_jawab ?><br>
				 <em><small>- Dokter Penanggung Jawab -</small></em>
     		</td>
     	</tr>
	</table>
</div>