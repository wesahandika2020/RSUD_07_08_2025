<?php
header_excel('data-barang.xls');
?>
<table>
    <tr>
        <td colspan="13">REKAP DATA BARANG</td>
    </tr>
</table>
<table border="1">
    <thead>
        <tr>
            <th width="3%">No.</th>
            <th width="5%" class="left">Kode</th>
            <th width="15%" class="left">Brg Bidang</th>
            <th width="20%" class="left">Nama</th>
            <th width="20%" class="left">Pabrik</th>
            <th class="right" width="10%">HPP</th>
            <th align="right" width="5%">Margin</th>
            <th width="20%" class="left">Kategori</th>
        </tr>

    </thead>

    <tbody>
        <?php foreach ($data as $key => $value) : ?>
            <tr>
                <td><?= ++$key ?></td>
                <td><?= $value->code ?></td>
                <td><?= $value->bidang ?></td>
                <td><?= $value->nama ?></td>
                <td><?= $value->pabrik ?></td>
                <td align="right"><?= formatcurrency($value->hpp) ?></td>
                <td align="right"><?= formatcurrency($value->margin_non_resep) ?></td>
                <td><?= $value->kategori ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>