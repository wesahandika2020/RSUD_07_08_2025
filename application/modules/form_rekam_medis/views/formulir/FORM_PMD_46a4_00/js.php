<script>

    function resetFormWfh() {
        $('#tabel_wfh .body-table').empty();
    }

    function tambahFORM_PMD_46a4_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetFormWfh();
        entriWfh(layanan.id_pendaftaran, layanan.id, bed, action);
 
    }

    function lihatFORM_PMD_46a4_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetFormWfh();
        entriWfh(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_PMD_46a4_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetFormWfh();
        entriWfh(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function entriWfh(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#btn_simpan_wfh').hide();
        if (action !== 'lihat' ) {
            $('#btn_simpan_wfh').show();
        } else {
            $('#btn_simpan_wfh').hide();
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
				resetFormWfh();
                $('#wfh_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#wfh_id_pendaftaran').val(id_pendaftaran);
                $('#wfh_id_bed, #wfh_bed').val(bed).text(bed);
                if (data.pasien !== null) {
                    $('#id_pasien, #wfh_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#wfh_nama_pasien').text(data.pasien.nama);
                    $('#wfh_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#wfh_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    if (data.pasien.alergi !== null) {
                        $('#wfh_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#wfh_alamat').text(data.pasien.alamat);
                }
                $('.wfh_logo_alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.logo-alergi').show();
                    }
                }

                // grafik length
                if (typeof data.grafik_wfh !== 'undefined' && data.grafik_wfh !== null) {
                    // Mengganti nilai null pada berat_badan dengan 0
                    data.grafik_wfh.forEach(function (v) {
                        v.berat_badan = (v.berat_badan !== null) ? v.berat_badan : 0;
                        v.tinggi_badan = (v.tinggi_badan !== null) ? v.tinggi_badan : 0;
                    });

                    grafik(data.grafik_wfh, id_layanan_pendaftaran, action);

                    $.each(data.grafik_wfh, function (i, v) {
                        let html = /* html */ `
                        <tr class="row-in-${i + 1}">
                            <td class="number-monitoring" align="center">${i + 1}</td>
                            <td align="center">${datetimefmysql(v.waktu)}</td>
                            <td align="center">${v.umur_tahun} Tahun ${v.umur_bulan} Bulan</td>
                            <td align="center">${v.berat_badan} Kg</td>
                            <td align="center">${v.tinggi_badan} Cm</td>
                        </tr>
                        `;
                        $('#tabel_wfh .body-table').append(html);
                    });
                } else {
                    $('#tabel_wfh .body-table').empty();
                }

				$('#modal_wfh').modal('show');
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
            // Konversi nilai berat_badan ke tipe data numerik
            var beratBadanNumeric = parseFloat(v.berat_badan);
            var tinggiBadanNumeric = parseFloat(v.tinggi_badan);

            // Pastikan bahwa nilai beratBadanNumeric adalah angka valid
            if (!isNaN(beratBadanNumeric) && !isNaN(tinggiBadanNumeric)) {
                boyData8.push([tinggiBadanNumeric, beratBadanNumeric]);
            }
        });
        console.log(boyData8);

        var boyData1 = [
            [65, 5.9],
            [85, 9.2],
            [105, 13.2],
            [120, 17.4]
        ];
        
        var boyData2 = [
            [65, 6.3],
            [85, 10],
            [105, 14.3],
            [120, 18.6]
        ];
        
        var boyData3 = [
            [65, 6.9],
            [85, 10.8],
            [105, 15.5],
            [120, 20.4]
        ];
        
        var boyData4 = [
            [65, 7.4],
            [85, 11.7],
            [105, 16.8],
            [120, 22.4]
        ];
        
        var boyData5 = [
            [65, 8.1],
            [85, 12.7],
            [105, 18.4],
            [120, 24.6]
        ];
        
        var boyData6 = [
            [65, 8.8],
            [85, 13.8],
            [105, 20.1],
            [120, 27.2]
        ];
        
        var boyData7 = [
            [65, 9.6],
            [85, 15.1],
            [105, 22],
            [120, 30.1]
        ];
        

        var options = {
            title: {
                text: 'Weight-for-height BOYS',
                align: 'center'
            },
            subtitle: {
                text: '2 to 5 years (z-scores)',
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
                    text: 'Height (cm)'
                },
                accessibility: {
                    rangeDescription: 'Range: 1 to 5.'
                },
                maxPadding: 0.05,
                showLastLabel: true,
                min: 65,
                max: 120,
                tickInterval: 5,
                labels: {
                    // formatter: function () {
                    //     var years = Math.floor(this.value / 12);
                    //     var months = this.value % 12;
                    //     if (months === 0) {
                    //         return years + ' year';
                    //     } else {
                    //         return months;
                    //     }
                    // }
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
                min: 4,
                max: 32,
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

        chart = Highcharts.chart('grafik_wfh', options);
    }

    function simpanWfh() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_wfh") ?>',
            data: $('#form_wfh').serialize(),
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
                        $('#modal_wfh').modal('hide');
                        showListForm($('#wfh_id_pendaftaran').val(), $('#wfh_id_layanan_pendaftaran').val(), $('#wfh_id_pasien').val());
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