<script>

    function resetFormCfg() {
        $('#tabel_cfg .body-table').empty();
    }

    function tambahFORM_PMD_47a5_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetFormCfg();
        entriCfg(layanan.id_pendaftaran, layanan.id, bed, action);
 
    }

    function lihatFORM_PMD_47a5_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetFormCfg();
        entriCfg(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_PMD_47a5_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetFormCfg();
        entriCfg(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function entriCfg(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#btn_simpan_cfg').hide();
        if (action !== 'lihat' ) {
            $('#btn_simpan_cfg').show();
        } else {
            $('#btn_simpan_cfg').hide();
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
				resetFormCfg();
                $('#cfg_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#cfg_id_pendaftaran').val(id_pendaftaran);
                $('#cfg_id_bed, #cfg_bed').val(bed).text(bed);
                if (data.pasien !== null) {
                    $('#id_pasien, #cfg_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#cfg_nama_pasien').text(data.pasien.nama);
                    $('#cfg_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#cfg_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    if (data.pasien.alergi !== null) {
                        $('#cfg_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#cfg_alamat').text(data.pasien.alamat);
                }
                $('.cfg_logo_alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.logo-alergi').show();
                    }
                }

                // grafik length
                if (typeof data.grafik_head_girls !== 'undefined' && data.grafik_head_girls !== null) {
                    // Mengganti nilai null pada lingkar_kepala dengan 0
                    data.grafik_head_girls.forEach(function (v) {
                        v.lingkar_kepala = (v.lingkar_kepala !== null) ? v.lingkar_kepala : 0;
                    });

                    grafik(data.grafik_head_girls, id_layanan_pendaftaran, action);

                    $.each(data.grafik_head_girls, function (i, v) {
                        console.log(v);
                        let html = /* html */ `
                        <tr class="row-in-${i + 1}">
                            <td class="number-monitoring" align="center">${i + 1}</td>
                            <td align="center">${datetimefmysql(v.waktu)}</td>
                            <td align="center">${v.umur_tahun} Tahun ${v.umur_bulan} Bulan</td>
                            <td align="center">${v.lingkar_kepala} Cm</td>
                        </tr>
                        `;
                        $('#tabel_cfg .body-table').append(html);
                    });
                } else {
                    $('#tabel_cfg .body-table').empty();
                }

				$('#modal_cfg').modal('show');
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

        var girlsData8 = [];

        $.each(data, function (i, v) {
            // Konversi nilai lingkar_kepala ke tipe data numerik
            var lingkarKepalaNumeric = parseFloat(v.lingkar_kepala);

            // Pastikan bahwa nilai lingkarKepalaNumeric adalah angka valid
            if (!isNaN(lingkarKepalaNumeric)) {
                girlsData8.push([v.umur_bulan_saja, lingkarKepalaNumeric]);
            }
        });

        // -3
        var girlsData1 = [
            [0, 30,7],
            [4, 38],
            [12, 42.2],
            [60, 46.3]
        ];

        // -2
        var girlsData2 = [
            [0, 31.9],
            [4, 39.2],
            [12, 43.5],
            [60, 47.7]
        ];

        // -1
        var girlsData3 = [
            [0, 33.2],
            [4, 40.4],
            [12, 44.8],
            [60, 49.2]
        ];

        // 0
        var girlsData4 = [
            [0, 34.5],
            [4, 41.6],
            [12, 46.1],
            [60, 50.7]
        ];

        // 1
        var girlsData5 = [
            [0, 35.7],
            [4, 42.8],
            [12, 47.4],
            [60, 52.2]
        ];
        
        // 2
        var girlsData6 = [
            [0, 37],
            [4, 44],
            [12, 48.6],
            [60, 53.7]
        ];

        // 3
        var girlsData7 = [
            [0, 38.3],
            [4, 45.2],
            [12, 49.9],
            [60, 55.2]
        ];

        var options = {
            title: {
                text: 'Head circumference-for-age GIRLS',
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
                { name: '-3', data: girlsData1, color: '#DC143C' }, // Ganti warna sesuai keinginan
                { name: '-2', data: girlsData2, color: '#ff1493' }, // Ganti warna sesuai keinginan
                { name: '-1', data: girlsData3, color: '#DAA520' }, // Ganti warna sesuai keinginan
                { name: '0', data: girlsData4, color: '#32CD32' }, // Ganti warna sesuai keinginan
                { name: '1', data: girlsData5, color: '#DAA520' }, // Ganti warna sesuai keinginan
                { name: '2', data: girlsData6, color: '#ff1493' }, // Ganti warna sesuai keinginan
                { name: '3', data: girlsData7, color: '#DC143C' }, // Ganti warna sesuai keinginan
                {
                    name: 'Pasien',
                    data: girlsData8,
                    color: '#7cb5ec',
                    marker: {
                        enabled: true, // Aktifkan marker hanya untuk seri Pasien
                        radius: 5, // Sesuaikan radius marker sesuai keinginan
                        symbol: 'circle' // Ganti simbol marker sesuai keinginan
                    }
                },
            ]
        };

        chart = Highcharts.chart('grafik_cfg', options);
    }

    function simpanCfg() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_cfg") ?>',
            data: $('#form_cfg').serialize(),
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
                        $('#modal_cfg').modal('hide');
                        showListForm($('#cfg_id_pendaftaran').val(), $('#cfg_id_layanan_pendaftaran').val(), $('#cfg_id_pasien').val());
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