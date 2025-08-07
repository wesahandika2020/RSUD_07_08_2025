<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing/printing-sep.css">
<style>
	body {
        font-family: Arial, Helvetica, sans-serif;
    }

    table tr td {
		font-size: 13px;
    }
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
		<table width="100%">
            <tr>
                <td width="30%" valign="top"><img src="<?= resource_url() ?>images/logos/logo-bpjs.png" alt="Logo BPJS" height="30px"></td>
                <td width="40%" align="center">
                    <b style="font-weight: bold; font-size:14px">SURAT RUJUKAN</b><br>
                    <b style="font-weight: bold; font-size:12px"><?= strtoupper($hospital->nama) ?></b>
                </td>
                <td width="30%" valign="top" style="float: right"></td>
            </tr>
        </table>
        <br>
        <table width="100%">
            <tr>
                <td width="15%">No. Rujukan</td>
                <td width="1%">:</td>
                <td width="23%"><?= $data->noRujukan ?></td>
                <td width="2%"></td>
                <td width="20%">No. SEP</td>
                <td width="1%">:</td>
                <td width="25%"><?php echo $data->noSep ?></td>
            </tr>
            <tr>
                <td>Tgl. Rujukan</td>
                <td>:</td>
                <td><?php echo datefmysql($data->tglRujukan) ?></td>
                <td></td>
                <td>Tgl. Rencana Kunjungan</td>
                <td>:</td>
                <td><?php echo datefmysql($data->tglRencanaKunjungan)?></td>
            </tr>
            <tr>
                <td>No. Kartu</td>
                <td>:</td>
                <td><?php echo $data->noKartu ?></td>
                <td></td>
                <td>Kls. Rawat</td>
                <td>:</td>
                <td><?php echo $data->kelasRawat ?></td>
            </tr>
            <tr>
                <td>Nama Peserta</td>
                <td>:</td>
                <td><?php echo $data->nama ?></td>
                <td></td>
                <td>Poli Tujuan</td>
                <td>:</td>
                <td><?php echo $data->namaPoliRujukan ?></td>
            </tr>
            <tr>
                <td>Tgl. Lahir</td>
                <td>:</td>
                <td><?php echo datefmysql($data->tglLahir) ?></td>
                <td></td>
                <td>Jns. Pelayanan</td>
                <td>:</td>
                <td>
					<?php 
						$jnsPelayanan = $data->jnsPelayanan;
						if ($jnsPelayanan == 1) {
							echo 'Rawat Inap';
						} else if ($jnsPelayanan == 2) {
							echo 'Rawat Jalan';
						}
					?>
				</td>
            </tr>
            <tr>
                <td>Jns. Kelamin</td>
                <td>:</td>
                <td>
                    <?php
                    	$kelamin = $data->kelamin;
                    	if ($kelamin == 'L') :
							echo "Laki - laki";
						else :
							echo "Perempuan";
						endif;
                    ?>
                </td>
                <td></td>
                <td>Tipe Rujukan</td>
                <td>:</td>
                <td><?php echo $data->namaTipeRujukan ?></td>
            </tr>
            <tr>
                <td>Catatan</td>
                <td>:</td>
                <td><?php echo $data->catatan ?></td>
                <td></td>
                <td>PPK Dirujuk</td>
                <td>:</td>
                <td><?php echo $data->namaPpkDirujuk ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Diagnosa Rujukan</td>
                <td>:</td>
                <td><?php echo $data->diagRujukan ." - ". $data->namaDiagRujukan ?></td>
            </tr>
        </table>
		<br><br>
        <table width="100%" border="0">
            <tr>
                <td width="60%"></td>
                <td width="20%">Pasien/<br /> Keluarga Pasien</td>
                <td width="20%">Petugas<br /> BPJS Kesehatan</td>
            </tr>
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr>
                <td></td>
                <td align="left"><span style="border-bottom: 1px solid #000"><?= multiprint("&nbsp;", 40) ?></span></td>
                <td align="left"><span style="border-bottom: 1px solid #000"><?= multiprint("&nbsp;", 40) ?></span></td>
            </tr>
        </table>
	</div>
</body>