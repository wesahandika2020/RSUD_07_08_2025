<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing/printing-sep.css">
<style>
	body {
        font-family: Arial, Helvetica, sans-serif;
    }
	
	.padding {
        padding-right: 50px;
    }

    /* table tr td {
		font-size: 14px;
    } */
</style>
<script>
	function cetak() {
        setTimeout(function() {
            window.close();
        }, 300);
        window.print();
    }
</script>
<title><?php echo $title ?></title>
<body onload="cetak()">
	<div class="page">
        <div class="padding" >
			<table width="100%">			
				<tr><td colspan="3"></td></tr>
				<tr><td colspan="3"></td></tr>
				<tr>
					<td width="30%" valign="top"><img src="<?= resource_url() ?>images/logos/logo-bpjs.png" alt="Logo BPJS" height="30px"></td>
					<td width="30%" align="center">
						<b style="font-weight: bold; font-size:14px">SURAT RENCANA KONTROL</b><br>
						<b style="font-weight: bold; font-size:12px"><?= strtoupper($hospital->nama) ?></b>
					</td>
					<td width="30%" valign="top" align="right">No. <?php echo $data->noSuratKontrol ?></td>
				</tr>
			</table>
			<br>
			<table width="100%">
				<tr>
					<td width="30%">Kepada Yth</td>
					<td width="1%">:</td>
					<td width="69%"><?php echo $data->namaDokter ?></td>
				</tr>
				<tr>
					<td></td>
					<td>:</td>
					<td>Sp./Sub. <?php echo $data->namaPoliTujuan ?></td>
				</tr>
				<tr>
					<td colspan="3">Mohon Pemeriksaan dan Penanganan Lebih Lanjut :</td>
				</tr>
				<tr>
					<td>Nama Peserta</td>
					<td>:</td>
					 <td><?= $data->sep->peserta->nama ?> (<?php echo $data->sep->peserta->kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' ?>)</td>
				</tr>
				<tr>
					<td>Tgl. Lahir</td>
					<td>:</td>
					<td><?php echo indo_tgl($data->sep->peserta->tglLahir) ?></td>
				</tr>
				<tr>
					<td>Diagnosa</td>
					<td>:</td>
					<td><?php echo $data->sep->diagnosa ?></td>
				</tr>
				<tr>
					<td>Rencana Kontrol</td>
					<td>:</td>
					<td><?php echo datefmysql($data->tglRencanaKontrol) ?></td>
				</tr>
				<tr>
					<td colspan="3">Demikian atas bantuannya, diucapkan banyak terima kasih.</td>
				</tr>
			</table>
			<table width="100%" border="0">
				<tr>
					<td width="50%"></td>
					<td width="20%"></td>
					<td width="30%">Mengetahui DPJP,</td>
				</tr>
				<tr><td colspan="3">&nbsp;</td></tr>
				<tr><td colspan="3">&nbsp;</td></tr>
				<tr><td colspan="3">&nbsp;</td></tr>
				<tr>
					<td></td>
					<td></td>					
					<td align="left"><?php echo $data->namaDokter ?></td>
				</tr>
			</table>
		</div>
	</div>
</body>