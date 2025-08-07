<title><?= $title; ?></title>

<?= header_excel('Data Pasien') ?>

<body>
    <div class="page">
        <h2><?= $title; ?></h2>

        <table border="1" style="border-collapse: collapse" width="100%">
            <tr>
                <th>No. RM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Golongan Darah</th>
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
                <th>Status Pernikahan</th>
                <th>No. Telp</th>
                <th>Alamat</th>
            </tr>
            <?php foreach ($data as $value) : ?>
                <tr>
                    <td align="center"><?= "'" . $value->id ?></td>
                    <td><?= $value->nama ?></td>
                    <td><?= ($value->kelamin === 'L') ? 'Laki - laki' : 'Perempuan' ?></td>
                    <td><?= $value->tempat_lahir ?></td>
                    <td><?= datefmysql($value->tanggal_lahir) ?></td>
                    <td><?= $value->agama ?></td>
                    <td><?= $value->gol_darah ?></td>
                    <td><?= $value->pendidikan ?></td>
                    <td><?= $value->pekerjaan ?></td>
                    <td><?= $value->status_kawin ?></td>
                    <td><?= $value->telp ?></td>
                    <td><?= $value->alamat ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>