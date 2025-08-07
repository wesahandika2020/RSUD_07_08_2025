<script>
    function resetFormHfg() {
        $('#tabel_hfg .body-table').empty();
    }

    function tambahFORM_PMD_47a6_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetFormHfg();
        entriHfg(layanan.id_pendaftaran, layanan.id, bed, action);
 
    }

    function lihatFORM_PMD_47a6_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetFormHfg();
        entriHfg(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_PMD_47a6_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetFormHfg();
        entriHfg(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function entriHfg(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#btn_simpan_hfg').hide();
        if (action !== 'lihat' ) {
            $('#btn_simpan_hfg').show();
        } else {
            $('#btn_simpan_hfg').hide();
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
				resetFormHfg();
                $('#hfg_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#hfg_id_pendaftaran').val(id_pendaftaran);
                $('#hfg_id_bed, #hfg_bed').val(bed).text(bed);
                if (data.pasien !== null) {
                    $('#id_pasien, #hfg_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#hfg_nama_pasien').text(data.pasien.nama);
                    $('#hfg_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#hfg_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    if (data.pasien.alergi !== null) {
                        $('#hfg_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#hfg_alamat').text(data.pasien.alamat);
                }
                $('.hfg_logo_alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.logo-alergi').show();
                    }
                }

                // grafik length
                if (typeof data.grafik_length_girl !== 'undefined' && data.grafik_length_girl !== null) {
                    // Mengganti nilai null pada tinggi_badan dengan 0
                    data.grafik_length_girl.forEach(function (v) {
                        v.tinggi_badan = (v.tinggi_badan !== null) ? v.tinggi_badan : 0;
                    });

                    grafik(data.grafik_length_girl, id_layanan_pendaftaran, action);

                    $.each(data.grafik_length_girl, function (i, v) {
                        let html = /* html */ `
                        <tr class="row-in-${i + 1}">
                            <td class="number-monitoring" align="center">${i + 1}</td>
                            <td align="center">${datetimefmysql(v.waktu)}</td>
                            <td align="center">${v.umur_tahun} Tahun ${v.umur_bulan} Bulan</td>
                            <td align="center">${v.tinggi_badan} Cm</td>
                        </tr>
                        `;
                        $('#tabel_hfg .body-table').append(html);
                    });
                } else {
                    $('#tabel_hfg .body-table').empty();
                }

				$('#modal_hfg').modal('show');
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

        var girlsData6 = [];

        $.each(data, function (i, v) {
            // Konversi nilai tinggi_badan ke tipe data numerik
            var tinggiBadanNumeric = parseFloat(v.tinggi_badan);

            // Pastikan bahwa nilai tinggiBadanNumeric adalah angka valid
            if (!isNaN(tinggiBadanNumeric)) {
                girlsData6.push([v.umur_bulan_saja, tinggiBadanNumeric]);
            }
        });

        var girlsData1 = [
            [0, 44],
            [4, 58],
            [12, 68.8],
            [60, 96]
        ];
        var girlsData2 = [
            [0, 46],
            [4, 60],
            [12, 71],
            [60, 101]
        ];
        var girlsData3 = [
            [0, 50],
            [4, 64],
            [12, 76],
            [60, 110]
        ];
        var girlsData4 = [
            [0, 54],
            [4, 68],
            [12, 80.5],
            [60, 119]
        ];
        var girlsData5 = [
            [0, 56],
            [4, 70],
            [12, 83],
            [60, 124]
        ];

        var options = {
            title: {
                text: 'Length/height-for-age GIRLS',
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
                    text: 'Length/Height (cm)'
                },
                accessibility: {
                    rangeDescription: 'Range: 40 to 125 cm.'
                },
                lineWidth: 2,
                min: 40,
                max: 125,
                tickInterval: 5
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
                { name: '0', data: girlsData3, color: '#7FFF00' }, // Ganti warna sesuai keinginan
                { name: '2', data: girlsData4, color: '#ff1493' }, // Ganti warna sesuai keinginan
                { name: '3', data: girlsData5, color: '#DC143C' }, // Ganti warna sesuai keinginan
                {
                    name: 'Pasien',
                    data: girlsData6,
                    color: '#7cb5ec',
                    marker: {
                        enabled: true, // Aktifkan marker hanya untuk seri Pasien
                        radius: 5, // Sesuaikan radius marker sesuai keinginan
                        symbol: 'circle' // Ganti simbol marker sesuai keinginan
                    }
                },
            ]
        };

        chart = Highcharts.chart('grafik_hfg', options);
    }

    function simpanHfg() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_hfg") ?>',
            data: $('#form_hfg').serialize(),
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
                        $('#modal_hfg').modal('hide');
                        showListForm($('#hfg_id_pendaftaran').val(), $('#hfg_id_layanan_pendaftaran').val(), $('#hfg_id_pasien').val());
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