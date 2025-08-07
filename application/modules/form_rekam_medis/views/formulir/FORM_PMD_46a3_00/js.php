<script>

    function resetFormWfb() {
        $('#tabel_wfb .body-table').empty();
    }

    function tambahFORM_PMD_46a3_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetFormWfb();
        entriWfb(layanan.id_pendaftaran, layanan.id, bed, action);
 
    }

    function lihatFORM_PMD_46a3_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetFormWfb();
        entriWfb(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_PMD_46a3_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetFormWfb();
        entriWfb(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function entriWfb(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#btn_simpan_wfb').hide();
        if (action !== 'lihat' ) {
            $('#btn_simpan_wfb').show();
        } else {
            $('#btn_simpan_wfb').hide();
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
				resetFormWfb();
                $('#wfb_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#wfb_id_pendaftaran').val(id_pendaftaran);
                $('#wfb_id_bed, #wfb_bed').val(bed).text(bed);
                if (data.pasien !== null) {
                    $('#id_pasien, #wfb_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#wfb_nama_pasien').text(data.pasien.nama);
                    $('#wfb_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#wfb_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    if (data.pasien.alergi !== null) {
                        $('#wfb_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#wfb_alamat').text(data.pasien.alamat);
                }
                $('.wfb_logo_alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.logo-alergi').show();
                    }
                }

                // grafik length
                if (typeof data.grafik_weight !== 'undefined' && data.grafik_weight !== null) {
                    // Mengganti nilai null pada berat_badan dengan 0
                    data.grafik_weight.forEach(function (v) {
                        v.berat_badan = (v.berat_badan !== null) ? v.berat_badan : 0;
                    });

                    grafik(data.grafik_weight, id_layanan_pendaftaran, action);

                    $.each(data.grafik_weight, function (i, v) {
                        let html = /* html */ `
                        <tr class="row-in-${i + 1}">
                            <td class="number-monitoring" align="center">${i + 1}</td>
                            <td align="center">${datetimefmysql(v.waktu)}</td>
                            <td align="center">${v.umur_tahun} Tahun ${v.umur_bulan} Bulan</td>
                            <td align="center">${v.berat_badan} Kg</td>
                        </tr>
                        `;
                        $('#tabel_wfb .body-table').append(html);
                    });
                } else {
                    $('#tabel_wfb .body-table').empty();
                }

				$('#modal_wfb').modal('show');
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
            // Konversi nilai berat_badan ke tipe data numerik
            var beratBadanNumeric = parseFloat(v.berat_badan);

            // Pastikan bahwa nilai beratBadanNumeric adalah angka valid
            if (!isNaN(beratBadanNumeric)) {
                boyData6.push([v.umur_bulan_saja, beratBadanNumeric]);
            }
        });

        var boyData1 = [
            [0, 2.1],
            [4, 4.9],
            [12, 6.9],
            [60, 12.4]
        ];
        var boyData2 = [
            [0, 2.5],
            [4, 5.6],
            [12, 7.7],
            [60, 14.1]
        ];
        var boyData3 = [
            [0, 3.3],
            [4, 7],
            [12, 9.6],
            [60, 18.3]
        ];
        var boyData4 = [
            [0, 4.4],
            [4, 8.7],
            [12, 12],
            [60, 24.2]
        ];
        var boyData5 = [
            [0, 5],
            [4, 9.7],
            [12, 13.3],
            [60, 27.9]
        ];

        var options = {
            title: {
                text: 'Weight-for-age BOYS',
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
                    text: 'Weight (kg)'
                },
                accessibility: {
                    rangeDescription: 'Range: 4 to 30 Kg.'
                },
                lineWidth: 2,
                min: 0,
                max: 30,
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

        chart = Highcharts.chart('grafik_wfb', options);
    }

    function simpanWfb() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_wfb") ?>',
            data: $('#form_wfb').serialize(),
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
                        $('#modal_wfb').modal('hide');
                        showListForm($('#wfb_id_pendaftaran').val(), $('#wfb_id_layanan_pendaftaran').val(), $('#wfb_id_pasien').val());
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