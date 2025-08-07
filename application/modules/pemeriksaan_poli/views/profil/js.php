<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
    var dWidth = $(window).width();
    var dHeight = $(window).height();
    var x = screen.width / 2 - dWidth / 2;
    var y = screen.height / 2 - dHeight / 2;

    $(function() {
        $('#tabProfilRingkas a:last').click(function () {
            if ($('#id-profil-rm').val() !== '') {
                ambilKedatangan($('#id-profil-rm').val())
                $('#list-profil-ringkas li:first').addClass('active');
            }
        });
        $('#dprof-modal').click(function () {
            $('#modal-detail-catatan-penting').modal('hide');
        });

		$('#btn-cetak-prmrj').click(function(){
			const noRm = $('#no-rm').val();

			window.open('<?= base_url('pemeriksaan_poli/ambil_profil_pasien/') ?>' + noRm, 'Cetak Profil Ringkas Medis Rawat Jalan', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
		})
    });

    function profilRingkas(norm) {

        $('#tabProfilRingkas a:last').tab('show');
        $('#profil-ringkas-area').empty();

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pemeriksaan_poli/api/pemeriksaan_poli/ambil_profil_pasien") ?>/id/' + norm,
            cache: false,
            dataType: 'JSON',
            beforeSend: function () {
                showLoader();
            },
            success: function (data) {

                showDataProfil(data.profil);
                showDataRiwayatKedatangan(data.datang);

                $('#modal-profil-ringkas').modal('show');
            },
            complete: function () {
                hideLoader();
            },
            error: function (e) {
                messageCustom('Akses data Gagal', 'Error');
            }
        });

    }

    function showDataProfil(pasien) {

        if (pasien.tanggal_lahir !== null) {
            umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
        }
    
        $('#judul-profil').html('<b>' + pasien.id + '</b> ' + pasien.nama);
        $('#dprof-id-pasien').html(pasien.id + ' / ' + pasien.nama + ' / ' + umur);
        $('#dprof-alergi').val(pasien.alergi);
        $('#no-rm').val(pasien.id);

    }

    function showDataRiwayatKedatangan(datang) {
        $('#list-profil-ringkas').empty();
        $.each(datang, function (i, v) {
            if (i === 0) {
                $('#id-profil-rm').val(v.id);
            }

            let kedatangan = '';
            $.each(v.layanan, function (i, val) {
                let titikAkhir = false;
                if (i == (v.layanan.length - 1)) {
                    titikAkhir = true;
                }
                kedatangan += `${val.ruang}${!titikAkhir ? ', ' : ''}`;
            })

            $('#list-profil-ringkas').append(/* html */ `
                <li class="li_side pointer" onclick="ambilKedatangan(${v.id}, this)">
                    <a style="font-size: 16pt; display: flex; flex-direction: column">
                        ${v.tanggal_kunjungan}
                        <div>
                            (<span style="font-weight: lighter; font-size: 12px">${kedatangan}</span>)
                        </div>
                    </a>
                </li>    
            `);
        });
    }

    function ambilKedatangan(id_pendaftaran, obj) {
        nomer = 1;
        $('.li_side').removeClass('active');
        $(obj).addClass('active');
        $('#tabProfilRingkas a:last').tab('show');
        $('#profil-ringkas-area').empty();

        $.ajax({
            type: 'GET',
            url: '<?= base_url( "pemeriksaan_poli/api/pemeriksaan_poli/ambil_profil_riwayat_pasien" ) ?>/id/' + id_pendaftaran,
            cache: false,
            data: '',
            dataType: 'JSON',
            beforeSend: function () {
                showLoader();
            },
            success: function (data) {
                tampilDataKedatangan(data);
            },
            complete: function () {
                hideLoader();
            },
            error: function (e) {
                messageCustom('Akses data Gagal', 'Error');
            }
        })
    }

    function tampilDataKedatangan(data) {
        let html = '';

        html += /* html */ `
            <div class="row mb-2">
                <div class="col-lg-12 ry_title">
                    <h3 class="title_section float-left">${data.jenis_pendaftaran}</h3>
                    <h5 class="float-right"><b>Tanggal ${data.tanggal_kunjungan}</b></h5>
                </div>
            </div>
        `;

        html += /* html */ `
            <div class="row">
                <div class="col-lg-6">
                    <table class="table table-no-border table-striped table-hover table-sm">
                        <tbody>
                            <tr>
                                <td width="30%"><b>No. Register</b></td>
                                <td><span>${data.no_register}</span></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Daftar</b></td>
                                <td><span>${datetimefmysql(data.tanggal_daftar)}</span></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Keluar</b></td>
                                <td><span>${datetimefmysql(data.tanggal_keluar)}</span></td>
                            </tr>
                            <tr>
                                <td><b>Status</b></td>
                                <td><span>${data.status}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <table class="table table-no-border table-striped table-hover table-sm">
                        <tbody>
                            <tr>
                                <td width="35%"><b>Nama Pen. Jawab</b></td>
                                <td><span>${data.nama_pjwb}</span></td>
                            </tr>
                            <tr>
                                <td><b>Telp Pen. Jawab</b></td>
                                <td><span>${data.telp_pjwb}</span></td>
                            </tr>
                            <tr>
                                <td><b>Alamat Pen. Jawab</b></td>
                                <td><span>${data.alamat_pjwb}</span></td>
                            </tr>
                            <tr>
                                <td><b>Petugas Pendaftaran</b></td>
                                <td><span>${data.petugas_pendaftaran}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        `;

        $('#profil-ringkas-area').append(html);

        html = '';
        $.each(data.layanan, function (i, v) {
            $('#profil-ringkas-area').append(tampilLayananKedatangan(v));
        });

        $('#profil-ringkas-area').append('<br><br><br>');
    }

    function tampilLayananKedatangan(v) {
        let html = '';

        nomer++;
        html = /* html */ `
            <ul class="list-group mb-3">
                <li class="list-group-item bg-theme text-white">
                    <i class="fas fa-hospital-alt m-r-5"></i><b>${v.jenis_layanan}</b>
                </li>
                <li class="list-group-item border-theme">
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-striped table-hover table-sm">
                                <tbody>
                                    <tr>
                                        <td width="30%">Tanggal Masuk</td>
                                        <td><span>: ${datetimefmysql(v.tanggal_layanan)}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Ruangan</td>
                                        <td><span>: ${v.ruang}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Dokter DPJP</td>
                                        <td><span>: ${v.dokter}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table table-striped table-hover table-sm">
                                <tbody>
                                    <tr>
                                        <td width="30%">Tanggal Keluar</td>
                                        <td><span>: ${((v.tanggal_keluar !== null) ? datetimefmysql(v.tanggal_keluar) : '')}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Cara Bayar</td>
                                        <td><span>: ${v.cara_bayar}</span></td>
                                    </tr>
                                    <tr>
                                        <td>Tindak Lanjut</td>
                                        <td><span>: ${v.tindak_lanjut}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
        `;

        html += /* html */ `
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="title">
                                <h6 class="text-error">Uraian Klinis Penting</h6>
                                ${tampilProfilAnamnesa(v.anamnesa)}
                            </div>
                        </div>
                    </div>
        `;

        html += /* html */ `
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="title">
                                <h6 class="text-error">Diagnosa Penting</h6>
                                ${tampilProfilDiagnosa(v.diagnosis)}
                            </div>
                        </div>
                    </div>
        `;

        html += /* html */ `
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="title">
                                <h6 class="text-error">Rencana Tindak Lanjut</h6>
                                ${tampilProfilRTL(v.anamnesa)}
                            </div>
                        </div>
                    </div>
        `;

        html += /* html */ `
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="title">
                                <h6 class="text-error">Catatan Penting</h6>
                                ${tampilProfilCatatanPenting(v.anamnesa)}
                            </div>
                        </div>
                    </div>
        `;


        html += /* html */ `
                    <div class="row">
                        <div class="col-lg-12">
        `;

        
        html += /* html */ `
                        </div>
                    </div>
                </li>
            </ul>
        `;


        return html;
    }

    function tampilProfilAnamnesa(data) {
        let html = '';
        let onclick = '';

        html = /* html */ `
            <table width="100%" class="table table-sm table-striped table-hover color-table info-table">
                <thead>
                    <tr>
                        <th class="center" width="5%">No.</th>
                        <th class="center" width="15%">Tanggal</th>
                        <th class="left">Keluhan Utama</th>
                        <th class="left">Riwayat Penyakit Sekarang</th>
                        <th class="left">Riwayat Penyakit Dahulu</th>
                        <th class="left">Riwayat Penyakit Keluarga</th>
                        <th class="left">Anamnesa Sosial</th>
                    </tr>
                </thead>
                <tbody>
        `;

        $.each(data, function (i, v) {
            onclick = 'onclick="tampilProfilDetailAnamnesa(' + v.id + ')"';
            html += /* html */ `
                <tr>
                    <td class="center">${++i}</td>
                    <td class="center">${((v.waktu !== null) ? datetimefmysql(v.waktu) : '')}</td>
                    <td class="left">${((v.keluhan_utama !== null) ? v.keluhan_utama : '')}</td>
                    <td class="left">${((v.riwayat_penyakit_sekarang !== null) ? v.riwayat_penyakit_sekarang : '')}</td>
                    <td class="left">${((v.riwayat_penyakit_dahulu !== null) ? v.riwayat_penyakit_dahulu : '')}</td>
                    <td class="left">${((v.riwayat_penyakit_keluarga !== null) ? v.riwayat_penyakit_keluarga : '')}</td>
                    <td class="left">${((v.anamnesa_sosial !== null) ? v.anamnesa_sosial : '')}</td>
                </tr>
            `;
        });

        if (data.length === 0) {
            html += /* html */ `
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
            `;
        }

        html += /* html */ `
                </tbody>
            </table>
        `;

        return html;
    }

    function tampilProfilDiagnosa(data) {
        let html = '';
        html = /* html */ `
            <table width="100%" class="table table-sm table-striped table-hover color-table info-table">
                <thead>
                    <tr>
                        <th class="center" width="5%">No.</th>
                        <th class="center" width="15%">Tanggal</th>
                        <th class="left" width="30%">Item</th>
                        <th class="center" width="10%">Diagnosa Akhir</th>
                        <th class="center" width="5%">Prioritas</th>
                        <th class="center nowrap" width="10%">Penyebab Kematian</th>
                        <th class="left" width="25%">Diagnosa Banding</th>
                    </tr>
                </thead>
                <tbody>
        `;

        $.each(data, function (i, v) {
            html += /* html */ `
                    <tr>
                        <td class="center">${++i}</td>
                        <td class="center">${((v.waktu !== null) ? datetimefmysql(v.waktu) : '')}</td>
                        <td class="left">${(v.item)}</td>
                        <td class="center">${((v.diagnosa_akhir !== '0') ? v.diagnosa_akhir = 'Ya' : 'Tidak')}</td>
                        <td class="center">${v.prioritas}</td>
                        <td class="center">${((v.penyebab_kematian !== 'on') ? v.penyebab_kematian = 'Ya' : 'Tidak')}</td>
                        <td class="left">${((v.diagnosa_banding !== null) ? v.diagnosa_banding : '')}</td>
                    </tr>
            `;
        });

        if (data.length === 0) {
            html += /* html */ `
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
            `;
        }

        html += /* html */ `
                </tbody>
            </table>
        `;

        return html;
    }

    function tampilProfilRTL(data) {
        let html = '';
        html = /* html */ `
            <table width="100%" class="table table-sm table-striped table-hover color-table info-table">
                <thead>
                    <tr>
                        <th class="center" width="5%">No.</th>
                        <th class="center" width="15%">Tanggal</th>
                        <th class="left" colspan="5">Rencana Tindak Lanjut</th>
                    </tr>
                </thead>
                <tbody>
        `;

        $.each(data, function (i, v) {
            html += /* html */ `
                    <tr>
                        <td class="center">${++i}</td>
                        <td class="center">${((v.waktu !== null) ? datetimefmysql(v.waktu) : '')}</td>
                        <td class="left">${((v.usul_tindak_lanjut !== null) ? v.usul_tindak_lanjut : '')}</td>
                    </tr>
            `;
        });

        if (data.length === 0) {
            html += /* html */ `
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
            `;
        }

        html += /* html */ `
                </tbody>
            </table>
        `;

        return html;
    }

    function tampilProfilCatatanPenting(data) {
        let html = '';
        let onclick = '';
        html = /* html */ `
            <table width="100%" class="table table-sm table-striped table-hover color-table info-table">
                <thead>
                    <tr>
                        <th class="left">Sistolik</th>
                        <th class="left">Diastolik</th>
                        <th class="left">Suhu</th>
                        <th class="left">Nadi</th>
                        <th class="left">Tinggi Badan</th>
                        <th class="left">Berat Badan</th>
                    </tr>
                </thead>
                <tbody>
        `;

        $.each(data, function (i, v) {

            if(v.tensi_sistolik !== null | v.tensi_diastolik !== null | v.suhu !== null | v.nadi !== null | v.tinggi_badan !== null | v.berat_badan !== null){

                onclick = '<button title="Klik untuk melihat Detail Catatan" onclick="tampilProfilDetailAnamnesa(' + v.id + ')" class="btn btn-secondary btn-xs"><i class="fas fa-eye"></i></button>';

            } else {

                onclick = '';

            }

            html += /* html */ `
                    <tr>
                        <td class="left">${((v.tensi_sistolik !== null) ? v.tensi_sistolik + ' mm/Hg' : '')}</td>
                        <td class="left">${((v.tensi_diastolik !== null) ? v.tensi_diastolik + ' mm/Hg' : '')}</td>
                        <td class="left">${((v.suhu !== null) ? v.suhu + ' &deg; C' : '')}</td>
                        <td class="left">${((v.nadi !== null) ? v.nadi + ' Bpm' : '')}</td>
                        <td class="left">${((v.tinggi_badan !== null) ? v.tinggi_badan + ' Cm' : '')}</td>
                        <td class="left">${((v.berat_badan !== null) ? v.berat_badan + ' Kg' : '')}</td>
                        <td> 
                            ${onclick}
                        </td>
                    </tr>
            `;
        });

        if (data.length === 0) {
            html += /* html */ `
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
            `;
        }

        html += /* html */ `
                </tbody>
            </table>
        `;

        return html;
    }

    function tampilProfilDetailAnamnesa(id) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url( "pemeriksaan_poli/api/pemeriksaan_poli/ambil_detail_profil_anamnesa" ) ?>/id/' + id,
            cache: false,
            data: '',
            dataType: 'JSON',
            beforeSend: function () {
                showLoader();
            },
            success: function (data) {
                $('#dprof-keadaan-umum').val(data.keadaan_umum);
                $('#dprof-kesadaran').val(data.kesadaran);
                $('#dprof-gcs').val(data.gcs);
                
                $('#dprof-rr').val(data.rr);
                
                $('#dprof-kepala').val(data.kepala);
                $('#dprof-thorax').val(data.thorax);
                $('#dprof-cor').val(data.cor);
                $('#dprof-genitalia').val(data.genitalia);
                $('#dprof-pemeriksaan-penunjang').val(data.pemeriksaan_penunjang);
                $('#dprof-status-mentalis').val(data.status_mentalis);
                $('#dprof-status-gizi').val(data.status_gizi);
                $('#dprof-hidung').val(data.hidung);
                $('#dprof-mata').val(data.mata);
                $('#dprof-usul-tindak-lanjut').val(data.usul_tindak_lanjut);

                $('#dprof-leher').val(data.leher);
                $('#dprof-pulmo').val(data.pulmo);
                $('#dprof-abdomen').val(data.abdomen);
                $('#dprof-ekstrimitas').val(data.ekstrimitas);
                $('#dprof-prognosis').val(data.prognosis);
                $('#dprof-lingkar-kepala').val(data.lingkar_kepala);
                $('#dprof-telinga').val(data.telinga);
                $('#dprof-tenggorok').val(data.tenggorok);
                $('#dprof-kulit-kelamin').val(data.kulit_kelamin);

                $('#modal-detail-catatan-penting').modal('show');
            },
            complete: function () {
                hideLoader();
            },
            error: function (e) {
                messageCustom('Akses data Gagal', 'Error');
            }
        })
    }

</script>
