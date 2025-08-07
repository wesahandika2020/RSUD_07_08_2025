<link rel="stylesheet" href="<?= resource_url() ?>assets/css/printing/printing-sep.css">
<link rel="stylesheet" href="<?= resource_url() ?>assets/node_modules/sweetalert-2/sweetalert2.css">
<script src="<?= resource_url() ?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<script src="<?= resource_url() ?>assets/node_modules/sweetalert-2/sweetalert2.js"></script>
<script type="text/javascript">
    function cetak() {
        setTimeout(function() {
            window.close();
            addJumlahCetak();
        }, 300);
        window.print();
    }

    function addJumlahCetak() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url(URL_VCLAIM . "log_cetak_sep") ?>',
            data: 'no_sep=' + '<?= $sep->noSep ?>',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (!data.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Gagal menambah jumlah cetakan',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error: function(e) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal menambah jumlah cetakan',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    }
</script>
<style type="text/css">
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .tabel-sep {
        empty-cells: show;
        border-radius: 5px;
        border-spacing: 0;
        margin-top: 5px;
        clear: both;
        border-collapse: collapse;
        background: #fff;
        color: #000;
    }

    .tabel-sep thead th {
        border: 1px solid #000;
        font-weight: bold;
    }

    .tabel-sep tbody td {
        border: 1px solid #000;
        padding-left: 10px;
        padding-right: 3px;
        font-weight: bold;
    }

    .tabel-sep .number {
        text-align: center;
    }

    .tabel-sep th rowspan,
    td rowspan {
        vertical-align: middle;
    }

    .tabel-sep th {
        font-weight: bold;
    }

    .tabel-sep td.border-none {
        border-top: none;
        border-left: none;
        border-bottom: none;
    }

    table tr td {
        font-size: 12px;
    }

    .row {
        display: flex;
        /* Menggunakan tata letak flex */
        justify-content: space-between;
        /* Mengatur jarak sejajar antara elemen */
    }

    .col-md-7 {
        width: 55%;
        /* Mengatur lebar kolom menjadi 50% */
        float: left;
        /* Menggunakan float untuk mengatur tata letak */
    }

    .col-md-5 {
        width: 45%;
        /* Mengatur lebar kolom menjadi 50% */
        float: left;
        /* Menggunakan float untuk mengatur tata letak */
    }

    .custom-list {
        list-style-type: none;
        padding-inline-start: 0px;
    }

    .custom-list li::before {
        content: "-";
        margin-right: 5px;
    }

    td {
        vertical-align: top;
        /* padding: 10px; */
        /* border: 1px solid black; */
    }
</style>

<title><?= $title; ?></title>

<body>
    <div class="page">
        <table width="100%">
            <tr>
                <td width="30%" valign="top"><img src="<?= resource_url() ?>images/logos/logo-bpjs.png" alt="Logo BPJS" height="30px"></td>
                <?php if ($sep->jnsPelayanan !== 'Rawat Inap' && $sep->poli !== 'INSTALASI GAWAT DARURAT') : ?>
                    <td width="40%" align="center">
                        <b style="font-weight: bold; font-size: 14px">SURAT ELEGIBILITAS PESERTA</b><br>
                        <b style="font-weight: bold; font-size: 12px"><?= strtoupper($hospital->nama) ?></b>
                    </td>
                <?php else : ?>
                    <td width="40%">
                        <span style="font-size: 14px">SURAT ELEGIBILITAS PESERTA</span><br>
                        <span style="font-size: 12px"><?= strtoupper($hospital->nama) ?></span>
                    </td>
                <?php endif ?>
                <td width="30%" valign="top" style="float: right"></td>
            </tr>
        </table>
        <br>
        <!-- Coba -->
        <div class="row">
            <div class="col-md-7">
                <table width="100%">
                    <tr>
                        <td width="38%">No. SEP</td>
                        <td width="2%">:</td>
                        <td width="60%"><?= $sep->noSep ?></td>
                        <td>&emsp;</td>
                    </tr>
                    <tr>
                        <td>Tgl. SEP</td>
                        <td>:</td>
                        <td><?= $sep->tglSep ?></td>
                        <td>&emsp;</td>
                    </tr>
                    <tr>
                        <td>No. Kartu</td>
                        <td>:</td>
                        <td><?= $sep->peserta->noKartu . "&emsp; ( MR. " . $sep->peserta->noMr . " )" ?> </td>
                        <td>&emsp;</td>
                    </tr>
                    <tr>
                        <td>Nama Peserta</td>
                        <td>:</td>
                        <td><?= strtoupper($sep->peserta->nama) ?></td>
                        <td>&emsp;</td>
                    </tr>
                    <tr>
                        <td>Tgl. Lahir</td>
                        <td>:</td>
                        <td><?= $sep->peserta->tglLahir . "&emsp; Kelamin : " . ($sep->peserta->kelamin == 'L' ? 'Laki-Laki' : 'Perempuan') ?></td>
                        <td>&emsp;</td>
                    </tr>
                    <tr>
                        <td>No. Telp</td>
                        <td>:</td>
                        <td><?= ($pasien != null ? $pasien->telp : '') ?></td>
                        <td>&emsp;</td>
                    </tr>
                    <tr>
                        <td>Sub/Spesialis</td>
                        <td>:</td>
                        <td><?= !empty($sep->poli) ? $sep->poli : '-' ?></td>
                        <td>&emsp;</td>
                    </tr>
                    <tr>
                        <td>Dokter</td>
                        <td>:</td>
                        <td><?= $sep->jnsPelayanan !== 'Rawat Inap' ? $sep->dpjp->nmDPJP : $sep->kontrol->nmDokter ?></td>
                        <td>&emsp;</td>
                    </tr>
                    <tr>
                        <td>Diagnosa Awal</td>
                        <td>:</td>
                        <td><?= $sep->diagnosa ?></td>
                        <td>&emsp;</td>
                    </tr>
                    <tr>
                        <td>Catatan</td>
                        <td>:</td>
                        <td rowspan="2" valign="top">&nbsp;<?= $sep->catatan ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-5">
                <table width="100%">
                    <?php if ($sep->katarak === '1') { ?>
                        <tr>
                            <td width="38%">*PASIEN OPERASI KATARAK</td>
                            <td width="2%">&emsp;</td>
                            <td width="60%">&emsp;</td>
                        </tr>
                    <?php } else { ?>

                        <tr>
                            <td width="38%">&emsp;</td>
                            <td width="2%">&emsp;</td>
                            <td width="60%">&emsp;</td>
                        </tr>

                    <?php } ?>

                    <tr>
                        <td width="38%">Peserta</td>
                        <td width="2%">:</td>
                        <td width="60%"><?= $sep->peserta->jnsPeserta ?></td>
                    </tr>
                    <tr>
                        <td>&emsp;</td>
                        <td>&emsp;</td>
                        <td>&emsp;</td>
                    </tr>
                    <tr>
                        <td>Jns. Rawat</td>
                        <td>:</td>
                        <td><?= $sep->jnsPelayanan ?></td>
                    </tr>
                    <tr>
                        <td>Jns. Kunjungan</td>
                        <td>:</td>
                        <td>
                            <ul style="margin:0%" class="custom-list">
                                <?= $sep->tujuanKunj->nama !== "" ? "<li>" . $sep->tujuanKunj->nama . "</li>" : "" ?>
                                <?= $sep->flagProcedure->nama !== "" ? "<li>" . $sep->flagProcedure->nama . "</li>" : "" ?>
                            </ul>
                        </td>
                    </tr>
                    <?php if ($sep->jnsPelayanan === 'Rawat Inap' || $sep->poli === 'INSTALASI GAWAT DARURAT') : ?>
                        <tr>
                            <td>Poli Perujuk</td>
                            <td>:</td>
                            <td>-</td>
                        </tr>
                    <?php endif ?>
                    <tr>
                        <td>Kls. Hak</td>
                        <td>:</td>
                        <td><?= $sep->peserta->hakKelas; ?></td>
                    </tr>
                    <tr>
                        <td>Kls. Rawat</td>
                        <td>:</td>
                        <td>
                            <?php if ($sep->jnsPelayanan !== 'Rawat Jalan') {
                                echo $sep->kelasRawat;
                            } else {
                                echo "-";
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Penjamin Lain</td>
                        <td>:</td>
                        <td><?= $sep->penjamin ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- End -->
        <div class="row">
            <div class="col-md-8">
                <table width="100%" border="0">
                    <tr>
                        <td width="100%">
                            <span style="font-size:9px;">*Saya menyetujui BPJS Kesehatan untuk :</span>
                            <ol style="font-size:9px; padding: 0; margin: 0 0 0 10px" type="a">
                                <li>membuka dan atau menggunakan informasi medis Pasien untuk keperluan administrasi, pembayaran asuransi atau
                                    jaminan pembiayaan kesehatan</li>
                                <li>memberikan akses informasi medis atau riwayat pelayanan kepada dokter/tenaga medis pada RSUD KOTA TANGERANG
                                    untuk kepentingan pemeliharaan kesehatan, pengobatan, penyembuhan, dan perawatan Pasien</li>
                            </ol>

                            <span style="font-size:9px;">*Saya mengetahui dan memahami :</span>
                            <ol style="font-size:9px; padding: 0; margin: 0 0 0 10px" type="a">
                                <li>Rumah Sakit dapat melakukan koordinasi dengan PT Jasa Raharja / PT Taspen / PT ASABRI / BPJS Ketenagakerjaan atau
                                    Penjamin lainnya, jika Peserta merupakan pasien yang mengalami kecelakaan lalulintas dan / atau kecelakaan kerja</li>
                                <li>SEP bukan sebagai bukti penjaminan peserta</li>
                            </ol>

                            <span style="font-size:9px;">** Dengan tampilnya luaran SEP elektronik ini merupakan hasil validasi terhadap eligibilitas Pasien secara elektronik
                                <br>&emsp;(validasi finger print atau biometrik / sistem validasi lain)
                                <br>&emsp;dan selanjutnya Pasien dapat mengakses pelayanan kesehatan rujukan sesuai ketentuan berlaku.
                                <br>&emsp;Kebenaran dan keaslian atas informasi data Pasien menjadi tanggung jawab penuh FKRTL</span>

                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-5">
                <span width="100%" style="display: flex;justify-content: center;font-size: 12;">

                    <?php $text_barcode = $sep->peserta->noKartu ?>
                    <div row>
                        <div style='display: flex; flex-direction: column;'>
                            <span>Persetujuan</span>
                            <span>Pasien/Keluarga Pasien</span>
                        </div>
                        <div style='display: flex; flex-direction: column;'>
                            <img width="70px" class="qrcode" src="<?php echo site_url('pendaftaran_poli/generate_qrcode_text/' . base64_encode($text_barcode)); ?>" alt="QRCode">
                            <?= strtoupper($sep->peserta->nama) ?>
                        </div>
                    </div>

                </span>

                <div style="margin-top: 1rem; font-size: 10px; text-align: right">
                    Cetakan ke : <?php date_default_timezone_set('Asia/Jakarta');
                                    echo (isset($sep_history->cetakan) ? ($sep_history->cetakan + 1) : 1); ?> ( <?= date("d/m/Y H:i") ?> )
                </div>
            </div>
        </div>
    </div>
</body>