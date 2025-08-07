<?php
    header_excel('REKAP KOREKSI STOK DARAH');
?>
<style>
	.center {
		text-align: center;
	}
</style>
<table width="100%">
    <tr><td colspan="7" class="center">REKAP KOREKSI STOK DARAH</td></tr>
    <tr><td colspan="7" class="center">PERIODE <?= safe_get('tanggal_awal') ?> S.D <?= safe_get('tanggal_akhir') ?></td></tr>
</table>
<table border="1" width="100%">
    <thead>
        <tr>
            <th width="3%">No.</th>
            <th width="10%">Waktu</th>
            <th width="25%" class="left">Nama Barang</th>
            <th width="5%" class="right">Penyesuaian</th>
            <th width="10%" class="left">Satuan</th>
            <th width="10%">Expired Date</th>
            <th width="10%" class="left">User</th>
            <!--<th width="1%"></th>-->
        </tr>
            
    </thead>

    <tbody>
    <?php foreach ($data as $key => $value) { ?>
        <tr class="highlight">
            <td class="center"><?= ++$key ?></td>
            <td class="center"><?= datetimefmysql($value->waktu) ?></td>
            <td><?= $value->nama_barang ?></td>
            <td class="right"><?= (($value->masuk === 0 || $value->masuk == '0.00') ? '-' . $value->keluar : $value->masuk) ?></td>
            <td><?= $value->kemasan ?></td>
            <td class="center"><?= datefmysql($value->ed) ?></td>
            <td><small><i><?= $value->account ?></i></small></td>
        </tr>
    <?php } ?>
    </tbody>
</table>