<script>
    function resetFormHfb() {
        $('#tabel_hfb .body-table').empty();
    }

    function tambahFORM_PMD_46a6_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetFormHfb();
        entriHfb(layanan.id_pendaftaran, layanan.id, bed, action);
 
    }

    function lihatFORM_PMD_46a6_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetFormHfb();
        entriHfb(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_PMD_46a6_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetFormHfb();
        entriHfb(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function entriHfb(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#btn_simpan_hfb').hide();
        if (action !== 'lihat' ) {
            $('#btn_simpan_hfb').show();
        } else {
            $('#btn_simpan_hfb').hide();
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
				resetFormHfb();
                $('#hfb_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#hfb_id_pendaftaran').val(id_pendaftaran);
                $('#hfb_id_bed, #hfb_bed').val(bed).text(bed);
                if (data.pasien !== null) {
                    $('#id_pasien, #hfb_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#hfb_nama_pasien').text(data.pasien.nama);
                    $('#hfb_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#hfb_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    if (data.pasien.alergi !== null) {
                        $('#hfb_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#hfb_alamat').text(data.pasien.alamat);
                }
                $('.hfb_logo_alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.logo-alergi').show();
                    }
                }

                // grafik length
                if (typeof data.grafik_length !== 'undefined' && data.grafik_length !== null) {
                    // Mengganti nilai null pada tinggi_badan dengan 0
                    data.grafik_length.forEach(function (v) {
                        v.tinggi_badan = (v.tinggi_badan !== null) ? v.tinggi_badan : 0;
                    });

                    grafik(data.grafik_length, id_layanan_pendaftaran, action);

                    $.each(data.grafik_length, function (i, v) {
                        let html = /* html */ `
                        <tr class="row-in-${i + 1}">
                            <td class="number-monitoring" align="center">${i + 1}</td>
                            <td align="center">${datetimefmysql(v.waktu)}</td>
                            <td align="center">${v.umur_tahun} Tahun ${v.umur_bulan} Bulan</td>
                            <td align="center">${v.tinggi_badan} Cm</td>
                        </tr>
                        `;
                        $('#tabel_hfb .body-table').append(html);
                    });
                } else {
                    $('#tabel_hfb .body-table').empty();
                }

				$('#modal_hfb').modal('show');
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

        var boyData6 = [];

        $.each(data, function (i, v) {
            // Konversi nilai tinggi_badan ke tipe data numerik
            var tinggiBadanNumeric = parseFloat(v.tinggi_badan);

            // Pastikan bahwa nilai tinggiBadanNumeric adalah angka valid
            if (!isNaN(tinggiBadanNumeric)) {
                boyData6.push([v.umur_bulan_saja, tinggiBadanNumeric]);
            }
        });

        var boyData1 = [
            [0, 44],
            [4, 58],
            [12, 68.8],
            [60, 96]
        ];
        var boyData2 = [
            [0, 46],
            [4, 60],
            [12, 71],
            [60, 101]
        ];
        var boyData3 = [
            [0, 50],
            [4, 64],
            [12, 76],
            [60, 110]
        ];
        var boyData4 = [
            [0, 54],
            [4, 68],
            [12, 80.5],
            [60, 119]
        ];
        var boyData5 = [
            [0, 56],
            [4, 70],
            [12, 83],
            [60, 124]
        ];

        var options = {
            title: {
                text: 'Length/height-for-age BOYS',
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
                { name: '-3', data: boyData1, color: '#DC143C' }, // Ganti warna sesuai keinginan
                { name: '-2', data: boyData2, color: '#ff1493' }, // Ganti warna sesuai keinginan
                { name: '0', data: boyData3, color: '#7FFF00' }, // Ganti warna sesuai keinginan
                { name: '2', data: boyData4, color: '#ff1493' }, // Ganti warna sesuai keinginan
                { name: '3', data: boyData5, color: '#DC143C' }, // Ganti warna sesuai keinginan
                {
                    name: 'Pasien',
                    data: boyData6,
                    color: '#7cb5ec',
                    marker: {
                        enabled: true, // Aktifkan marker hanya untuk seri Pasien
                        radius: 5, // Sesuaikan radius marker sesuai keinginan
                        symbol: 'circle' // Ganti simbol marker sesuai keinginan
                    }
                },
            ]
        };

        chart = Highcharts.chart('grafik_hfb', options);
    }

    function simpanHfb() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_hfb") ?>',
            data: $('#form_hfb').serialize(),
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
                        $('#modal_hfb').modal('hide');
                        showListForm($('#hfb_id_pendaftaran').val(), $('#hfb_id_layanan_pendaftaran').val(), $('#hfb_id_pasien').val());
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