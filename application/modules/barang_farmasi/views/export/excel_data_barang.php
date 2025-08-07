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
            <th align="center" width="3%">No.</th> <!-- 1 -->
            <th align="center" width="20%" class="left">Nama</th> <!-- 2 -->
            <th align="center" width="10%" class="left">Kekuatan</th> <!-- 3 -->
            <th align="center" width="10%" class="left">Satuan</th> <!-- 4 -->
            <th align="center" width="10%" class="left">Sediaan</th> <!-- 5 -->
            <th align="center" width="20%" class="left">Pabrik</th> <!-- 6 -->
            <th align="center" width="5%">Generik</th> <!-- 7 -->
            <th align="center" width="5%">Form</th> <!-- 8 -->
            <th align="center" width="10%" class="left">Golongan</th> <!-- 9 -->
            <th align="center" width="5%">H.A</th> <!-- 10 -->
            <th width="10%" class="left">Kategori</th> <!-- 11 -->
            <th width="10%" class="left">Obat Kronis</th>
            <th align="center" width="5%" class="right">Hna</th> <!-- 12 -->
            <th align="center" width="5%" class="right">Hpp</th> <!-- 13 -->
            <th align="center" width="5%" class="right">Harga Jual</th> <!-- 14 -->
            <th align="center" class="right">Margin Resep (%)</th> <!-- 15 -->
            <th align="center" class="right">Margin Non Resep (%)</th> <!-- 16 -->
            <th align="center" class="right">Margin Resep (Rp)</th> <!-- 17 -->
            <th align="center" class="right">Margin Non Resep (Rp)</th> <!-- 18 -->
            <th colspan="3">Kemasan</th>
            <th colspan="3">Kandungan</th>
        </tr>

    </thead>

    <tbody>
        <?php foreach ($data as $key => $value) : ?>
        <tr>
            <td align="center"><?= ++$key ?></td> <!-- 1 -->
            <td><?= $value->nama_lengkap ?></i></td> <!-- 2 -->
            <td align="right"><?= $value->kekuatan ?></td> <!-- 3 -->
            <td><?= $value->satuan ?></td> <!-- 4 -->
            <td><?= $value->sediaan ?></td> <!-- 5 -->
            <td><?= $value->pabrik ?></td> <!-- 6 -->
            <td><?= ($value->generik === '0')?'Tidak':'Ya' ?></td> <!-- 7 -->
            <td><?= $value->formularium ?></td> <!-- 8 -->
            <td><?= $value->perundangan ?></td> <!-- 9 -->
            <td><?= $value->high_alert ?></td> <!-- 10 -->
            <td><?= $value->kategori ?></td> <!-- 11 -->
            <td><?= ($value->is_obat_kronis === '1')?'Ya':'Tidak' ?></td>
            <td align="right"><?= formatcurrency($value->hna) ?></td> <!-- 12 -->
            <td align="right"><?= formatcurrency($value->hpp) ?></td> <!-- 13 -->
            <td align="right"><?= formatcurrency($value->hpp+($value->hpp*($value->margin_resep/100))) ?></td> <!-- 14 -->
            <td><?= $value->margin_resep ?></td> <!-- 15 -->
            <td><?= $value->margin_non_resep ?></td> <!-- 16 -->
            <td><?= formatcurrency(($value->margin_non_resep / 100) * $value->hpp) ?></td> <!-- 17 -->
            <td><?= formatcurrency(($value->margin_non_resep / 100) * $value->hpp) ?></td> <!-- 18 -->
            <?php foreach ($value->kemasan as $packing) : ?>
                <td><?= $packing->kemasan ?></td>
                <td><?= $packing->isi ?></td>
                <td><?= $packing->satuan ?></td>    
            <?php endforeach ?>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>