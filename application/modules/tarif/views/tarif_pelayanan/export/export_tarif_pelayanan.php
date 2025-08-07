<title><?= $title ?></title>

<?php header_excel($title) ?>

<div>
    <div class="page">
        <table border="1" cellspacing="0" cellpadding="0" class="tabel-laporan" width="100%">
            <thead>
                <tr>
                    <th align="center" width="5%">No.</th>
                    <th width="13%" class="left">Instalasi</th>
                    <th width="20%" class="left">Layanan</th>
                    <th width="5%">Kelas</th>
                    <th width="10%" class="left">Jenis</th>
                    <th width="5%" class="left">Bobot</th>
                    <th width="6%" class="right">Jasa Operator</th>
                    <th width="5%" class="right">Jasa Sarana</th>
                    <th width="5%" class="right">BHP</th>
                    <th width="7%" class="right">Total</th>
                </tr>

            </thead>

            <tbody>
                <?php foreach ($data as $key => $value) : ?>
                    <tr>
                        <td align="center"><?= ($key + 1) ?></td>
                        <td><?= $value->instalasi ?></td>
                        <td><?= $value->layanan ?></td>
                        <td align="center"><?= $value->kelas ?></td>
                        <td><?= $value->jenis ?></td>
                        <td><?= $value->bobot ?></td>
                        <td align="right"><?= $value->jasa_nadis ?></td>
                        <td align="right"><?= $value->jasa_klinik ?></td>
                        <td align="right"><?= $value->bhp ?></td>
                        <td align="right"><?= $value->total ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>