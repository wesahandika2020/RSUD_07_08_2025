<?php
header_excel("Laporan Kunjungan Rawat Inap - " . $periode);
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
        <h4>Laporan Kunjungan Rawat Inap
            <br>Periode : <?= $periode ?>
            <?= (!empty($penjamin) ? '<br>Penjamin : ' . $penjamin : '') ?>
            <?= (!empty($kelas_rawat) ? '<br>Kelas Rawat : ' . $kelas_rawat : '') ?>
            <?= (!empty($jenis_rawat) ? '<br>Jenis Layanan : ' . $jenis_rawat : '') ?>
            <?= (!empty($dokter) ? '<br>Dokter : ' . $dokter : '') ?>
        </h4>
    </div>

    <table width="100%" border="1">
        <thead>
            <tr>
                <th class="center">No</th>
                <th class="center">No. RM</th>
                <th class="left">Nama Pasien</th>
                <th class="center">Waktu Masuk</th>
                <th class="center">Waktu Keluar</th>
                <th class="center">Lama Rawat</th>
                <th class="center">Kelas</th>
                <th class="center">Ruangan/ Bangsal</th>
                <th class="left">Dokter</th>
                <th class="center">Penjamin</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($data as $key => $value) {
            ?>
                <tr>
                    <td style="text-align: center;"><?= $no++ ?></td>
                    <td style="text-align: center" style="mso-number-format:'@'"><?= $value->id_pasien ?></td>
                    <td style="text-align: left;"><?= $value->nama_pasien ?></td>
                    <td style="text-align: center;"><?= $value->waktu_masuk ?></td>
                    <td style="text-align: center;"><?= $value->waktu_keluar ?></td>
                    <td style="text-align: center;"><?= $value->total_hari ?></td>
                    <td style="text-align: center;"><?= $value->kelas ?></td>
                    <td style="text-align: center;"><?= $value->bangsal ?></td>
                    <td style="text-align: left;"><?= $value->nama_dokter ?></td>
                    <td style="text-align: center;"><?= $value->penjamin ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="9" style="text-align: right;"><b>Total Pasien: <?= number_format($jumlah, 0, ',', '.') ?></b></td>
                <td style="text-align: right;"><b>Total Hari: <?= number_format($total_hari, 0, ',', '.') ?></b></td>
            </tr>
        </tfoot>
    </table>



</body>