<table width="100%" id="table-kop">
	<tr>
		<td width="15%"><img src="<?= resource_url() ?>images/logos/<?= $hospital->logo ?>" width="80px" height="80px"></td>
		<td width="85%">
			<b class="bold" style="font-size: 16pt;"><?= strtoupper($hospital->nama) ?></b><br>
			<b class="bold" style="font-size: 9pt;"><?= strtoupper($hospital->alamat) ?></b><br>
			<b class="bold" style="font-size: 10pt;">Telp. <?= $hospital->telp ?>, FAX. <?= $hospital->fax ?> Email : <?= $hospital->email ?></b>
		</td>
	</tr>
</table>
<div style="border-bottom: 2px solid black;"></div>