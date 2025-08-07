<script>

    function resetFormCfb() {
        $('#tabel_cfb .body-table').empty();
    }

    function tambahFORM_PMD_46a5_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetFormCfb();
        entriCfb(layanan.id_pendaftaran, layanan.id, bed, action);
 
    }

    function lihatFORM_PMD_46a5_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetFormCfb();
        entriCfb(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_PMD_46a5_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetFormCfb();
        entriCfb(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function entriCfb(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#btn_simpan_cfb').hide();
        if (action !== 'lihat' ) {
            $('#btn_simpan_cfb').show();
        } else {
            $('#btn_simpan_cfb').hide();
        }

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        $.ajax({
			type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_keperawatan") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				resetFormCfb();
                $('#cfb_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#cfb_id_pendaftaran').val(id_pendaftaran);
                $('#cfb_id_bed, #cfb_bed').val(bed).text(bed);
                if (data.pasien !== null) {
                    $('#id_pasien, #cfb_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#cfb_nama_pasien').text(data.pasien.nama);
                    $('#cfb_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#cfb_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    if (data.pasien.alergi !== null) {
                        $('#cfb_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#cfb_alamat').text(data.pasien.alamat);
                }
                $('.cfb_logo_alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.logo-alergi').show();
                    }
                }

                // grafik length
                if (typeof data.grafik_head !== 'undefined' && data.grafik_head !== null) {
                    // Mengganti nilai null pada lingkar_kepala dengan 0
                    data.grafik_head.forEach(function (v) {
                        v.lingkar_kepala = (v.lingkar_kepala !== null) ? v.lingkar_kepala : 0;
                    });

                    grafik(data.grafik_head, id_layanan_pendaftaran, action);

                    $.each(data.grafik_head, function (i, v) {
                        console.log(v);
                        let html = /* html */ `
                        <tr class="row-in-${i + 1}">
                            <td class="number-monitoring" align="center">${i + 1}</td>
                            <td align="center">${datetimefmysql(v.waktu)}</td>
                            <td align="center">${v.umur_tahun} Tahun ${v.umur_bulan} Bulan</td>
                            <td align="center">${v.lingkar_kepala} Cm</td>
                        </tr>
                        `;
                        $('#tabel_cfb .body-table').append(html);
                    });
                } else {
                    $('#tabel_cfb .body-table').empty();
                }

				$('#modal_cfb').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
    }

    // MP-A + GRAFIK
    var chart;

    function grafik(data, id_layanan_pendaftaran, action) {

        var boyData8 = [];

        $.each(data, function (i, v) {
            // Konversi nilai lingkar_kepala ke tipe data numerik
            var lingkarKepalaNumeric = parseFloat(v.lingkar_kepala);

            // Pastikan bahwa nilai lingkarKepalaNumeric adalah angka valid
            if (!isNaN(lingkarKepalaNumeric)) {
                boyData8.push([v.umur_bulan_saja, lingkarKepalaNumeric]);
            }
        });

        // -3
        var boyData1 = [
            [0, 30,7],
            [4, 38],
            [12, 42.2],
            [60, 46.3]
        ];

        // -2
        var boyData2 = [
            [0, 31.9],
            [4, 39.2],
            [12, 43.5],
            [60, 47.7]
        ];

        // -1
        var boyData3 = [
            [0, 33.2],
            [4, 40.4],
            [12, 44.8],
            [60, 49.2]
        ];

        // 0
        var boyData4 = [
            [0, 34.5],
            [4, 41.6],
            [12, 46.1],
            [60, 50.7]
        ];

        // 1
        var boyData5 = [
            [0, 35.7],
            [4, 42.8],
            [12, 47.4],
            [60, 52.2]
        ];
        
        // 2
        var boyData6 = [
            [0, 37],
            [4, 44],
            [12, 48.6],
            [60, 53.7]
        ];

        // 3
        var boyData7 = [
            [0, 38.3],
            [4, 45.2],
            [12, 49.9],
            [60, 55.2]
        ];

        var options = {
            title: {
                text: 'Head circumference-for-age BOYS',
                align: 'center'
            },
            subtitle: {
                text: 'Birth to 5 years (z-scores)',
                align: 'center'
            },
            chart: {
                height: 500,
                type: 'spline',
                resetZoomButton: {
                    position: {
                        x: 0,
                        y: 0
                    }
                }
            },

            xAxis: {
                reversed: false,
                title: {
                    enabled: true,
                    text: 'Age (completed months and years)'
                },
                accessibility: {
                    rangeDescription: 'Range: 1 to 5.'
                },
                maxPadding: 0.05,
                showLastLabel: true,
                min: 0,
                max: 60,
                tickInterval: 2,
                labels: {
                    formatter: function () {
                        var years = Math.floor(this.value / 12);
                        var months = this.value % 12;
                        if (months === 0) {
                            return years + ' year';
                        } else {
                            return months;
                        }
                    }
                }
            },

            yAxis: {
                title: {
                    text: 'Head circumference (cm)'
                },
                accessibility: {
                    rangeDescription: 'Range: 30 to 56 cm.'
                },
                lineWidth: 2,
                min: 30,
                max: 56,
                tickInterval: 2
            },
            tooltip: {
                enabled: false,
            },
            plotOptions: {
                spline: {
                    marker: {
                        enabled: false
                    }
                },
                series: {
                    marker: {
                        enabled: false
                    },
                    states: {
                        hover: {
                            enabled: false
                        }
                    }
                }
            },
            series: [
                { name: '-3', data: boyData1, color: '#DC143C' }, // Ganti warna sesuai keinginan
                { name: '-2', data: boyData2, color: '#ff1493' }, // Ganti warna sesuai keinginan
                { name: '-1', data: boyData3, color: '#DAA520' }, // Ganti warna sesuai keinginan
                { name: '0', data: boyData4, color: '#32CD32' }, // Ganti warna sesuai keinginan
                { name: '1', data: boyData5, color: '#DAA520' }, // Ganti warna sesuai keinginan
                { name: '2', data: boyData6, color: '#ff1493' }, // Ganti warna sesuai keinginan
                { name: '3', data: boyData7, color: '#DC143C' }, // Ganti warna sesuai keinginan
                {
                    name: 'Pasien',
                    data: boyData8,
                    color: '#7cb5ec',
                    marker: {
                        enabled: true, // Aktifkan marker hanya untuk seri Pasien
                        radius: 5, // Sesuaikan radius marker sesuai keinginan
                        symbol: 'circle' // Ganti simbol marker sesuai keinginan
                    }
                },
            ]
        };

        chart = Highcharts.chart('grafik_cfb', options);
    }

    function simpanCfb() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_cfb") ?>',
            data: $('#form_cfb').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {
                    if (data.respon.show !== null) {
                        if (data.respon.add_show !== undefined) {
                            if (data.respon.id !== undefined) {
                                $(data.respon.id).addClass('show');
                            }
                        } else {
                            if (data.respon.id !== undefined) {
                                $(data.respon.id).addClass('show');
                            }
                        }
                        if (data.respon.status === false) {
                            bootbox.dialog({
                                message: data.respon.message,
                                title: "Penyimpanan Data Gagal",
                                buttons: {
                                    batal: {
                                        label: '<i class=" fas fa-times-circle"></i> Close',
                                        className: "btn-danger",
                                        callback: function() {
                                        }
                                    }
                                }
                            });
                        }
                    }
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if (data.status) {
                        messageAddSuccess();
                        $('#modal_cfb').modal('hide');
                        showListForm($('#cfb_id_pendaftaran').val(), $('#cfb_id_layanan_pendaftaran').val(), $('#cfb_id_pasien').val());
                    } else {
                        messageAddFailed();
                    }
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed();
            }
        });
    }


</script>