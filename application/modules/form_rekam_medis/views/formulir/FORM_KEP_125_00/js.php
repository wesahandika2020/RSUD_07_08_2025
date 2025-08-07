<script>

    function resetFormFpgg() {
        $('#tabel_fpgg .body-table').empty();
    }

    function tambahFORM_KEP_125_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetFormFpgg();
        entriFpgg(layanan.id_pendaftaran, layanan.id, bed, action);
 
    }

    function lihatFORM_KEP_125_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetFormFpgg();
        entriFpgg(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_KEP_125_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetFormFpgg();
        entriFpgg(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function entriFpgg(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#btn_simpan_fpgg').hide();
        if (action !== 'lihat' ) {
            $('#btn_simpan_fpgg').show();
        } else {
            $('#btn_simpan_fpgg').hide();
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
				resetFormFpgg();
                $('#fpgg_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#fpgg_id_pendaftaran').val(id_pendaftaran);
                $('#fpgg_id_bed, #fpgg_bed').val(bed).text(bed);
                if (data.pasien !== null) {
                    $('#id_pasien, #fpgg_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#fpgg_nama_pasien').text(data.pasien.nama);
                    $('#fpgg_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#fpgg_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    if (data.pasien.alergi !== null) {
                        $('#fpgg_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#fpgg_alamat').text(data.pasien.alamat);
                }
                $('.fpgg_logo_alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.logo-alergi').show();
                    }
                }

                // grafik lenght
                if (typeof data.grafik_fpgg !== 'undefined' && data.grafik_fpgg !== null) {
                    // Mengganti nilai null pada lingkar_kepala dengan 0
                    data.grafik_fpgg.forEach(function (v) {
                        v.tinggi_badan = (v.tinggi_badan !== null) ? v.tinggi_badan : 0;
                        v.berat_badan = (v.berat_badan !== null) ? v.berat_badan : 0;
                        v.lingkar_kepala = (v.lingkar_kepala !== null) ? v.lingkar_kepala : 0;
                    });

                    grafik1(data.grafik_fpgg, id_layanan_pendaftaran, action);
                    grafik2(data.grafik_fpgg, id_layanan_pendaftaran, action);
                    grafik3(data.grafik_fpgg, id_layanan_pendaftaran, action);

                    $.each(data.grafik_fpgg, function (i, v) {
                        console.log(v);
                        let html = /* html */ `
                        <tr class="row-in-${i + 1}">
                            <td class="number-monitoring" align="center">${i + 1}</td>
                            <td align="center">${datetimefmysql(v.waktu)}</td>
                            <td align="center">${v.umur_minggu} Minggu</td>
                            <td align="center">${v.tinggi_badan} Cm</td>
                            <td align="center">${v.lingkar_kepala} Cm</td>
                            <td align="center">${v.berat_badan} Kg</td>
                        </tr>
                        `;
                        $('#tabel_fpgg .body-table').append(html);
                    });
                } else {
                    $('#tabel_fpgg .body-table').empty();
                }

				$('#modal_fpgg').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
    }

    // GRAFIK lenght
    var chart1;
    function grafik1(data, id_layanan_pendaftaran, action) {

        var boyData1 = [];

        $.each(data, function (i, v) {
            // Konversi nilai tinggi_badan ke tipe data numerik
            var lenghtNumeric = parseFloat(v.tinggi_badan);

            // Pastikan bahwa nilai lenghtNumeric adalah angka valid
            if (!isNaN(lenghtNumeric)) {
                boyData1.push([v.umur_minggu, lenghtNumeric]);
            }
        });

        var lenghtData1 = [
            [23.5, 26.8],
            [28, 32],
            [40, 47],
            [50, 55.4]
        ];
        var lenghtData2 = [
            [23.5, 27.9],
            [28, 33.1],
            [40, 48.1],
            [50, 56.5]
        ];
        var lenghtData3 = [
            [23.5, 30.1],
            [28, 36.4],
            [40, 51.2],
            [50, 59.2]
        ];
        var lenghtData4 = [
            [23.5, 32.8],
            [28, 39.5],
            [40, 54],
            [50, 62.4]
        ];
        var lenghtData5 = [
            [23.5, 34],
            [28, 41],
            [40, 55.5],
            [50, 63.7]
        ];

        var options = {
            title: {
                text: 'Fenton preterm growth chart - girls',
                align: 'right'
            },
            subtitle: {
                text: 'Lenght',
                align: 'right'
            },
            chart: {
                height: 400,
                // width: 2000,
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
                    text: 'Gestational age (weeks)'
                },
                accessibility: {
                    rangeDescription: 'Range: 1 to 5.'
                },
                maxPadding: 0.05,
                showLastLabel: true,
                min: 22,
                max: 50,
                tickInterval: 2,
                // labels: {
                //     formatter: function () {
                //         var years = Math.floor(this.value / 12);
                //         var months = this.value % 12;
                //         if (months === 0) {
                //             return years + ' year';
                //         } else {
                //             return months;
                //         }
                //     }
                // }
            },
            yAxis: {
                title: {
                    text: 'Centimeters'
                },
                accessibility: {
                    rangeDescription: 'Range: 0 to 70 Cm.'
                },
                lineWidth: 2,
                min: 25,
                max: 65,
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
                { name: '-3', data: lenghtData1, color: '#DC143C' }, // Ganti warna sesuai keinginan
                { name: '-2', data: lenghtData2, color: '#ff1493' }, // Ganti warna sesuai keinginan
                { name: '-1', data: lenghtData3, color: '#DAA520' }, // Ganti warna sesuai keinginan
                { name: '0', data: lenghtData4, color: '#32CD32' }, // Ganti warna sesuai keinginan
                { name: '1', data: lenghtData5, color: '#DAA520' }, // Ganti warna sesuai keinginan
                {
                    name: 'Pasien',
                    data: boyData1,
                    color: '#7cb5ec',
                    marker: {
                        enabled: true, // Aktifkan marker hanya untuk seri Pasien
                        radius: 5, // Sesuaikan radius marker sesuai keinginan
                        symbol: 'circle' // Ganti simbol marker sesuai keinginan
                    }
                },
            ]
        };

        chart1 = Highcharts.chart('grafik_fpgg1', options);
    }

    // GRAFIK Head Circumference
    var chart2;
    function grafik2(data, id_layanan_pendaftaran, action) {

        var boyData2 = [];

        $.each(data, function (i, v) {
            // Konversi nilai lingkar_kepala ke tipe data numerik
            var lingkarKepalaNumeric = parseFloat(v.lingkar_kepala);

            // Pastikan bahwa nilai lingkarKepalaNumeric adalah angka valid
            if (!isNaN(lingkarKepalaNumeric)) {
                boyData2.push([v.umur_minggu, lingkarKepalaNumeric]);
            }
        });

        var headData1 = [
            [23.5, 19],
            [36, 30],
            // [28, 23],
            // [40, 32.4],
            [50, 37.2]
        ];
        var headData2 = [
            [23.5, 19.9],
            [36, 30.9],
            // [28, 23.9],
            // [40, 33.3],
            [50, 38.1]
        ];
        var headData3 = [
            [23.5, 21.2],
            [36, 32.7],
            // [28, 36.4],
            // [40, 51.2],
            [50, 39.5]
        ];
        var headData4 = [
            [23.5, 22.9],
            [36, 34.6],
            // [28, 36.4],
            // [40, 51.2],
            [50, 41.1]
        ];
        var headData5 = [
            [23.5, 23.8],
            [36, 35.4],
            // [28, 36.4],
            // [40, 51.2],
            [50, 41.9]
        ];

        var options = {
            title: {
                text: 'Fenton preterm growth chart - girls',
                align: 'right'
            },
            subtitle: {
                text: 'Head Circumference',
                align: 'right'
            },
            chart: {
                height: 400,
                // width: 2000,
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
                    text: 'Gestational age (weeks)'
                },
                accessibility: {
                    rangeDescription: 'Range: 1 to 5.'
                },
                maxPadding: 0.05,
                showLastLabel: true,
                min: 22,
                max: 50,
                tickInterval: 2,
                // labels: {
                //     formatter: function () {
                //         var years = Math.floor(this.value / 12);
                //         var months = this.value % 12;
                //         if (months === 0) {
                //             return years + ' year';
                //         } else {
                //             return months;
                //         }
                //     }
                // }
            },
            yAxis: {
                title: {
                    text: 'Centimeters'
                },
                accessibility: {
                    rangeDescription: 'Range: 0 to 70 Cm.'
                },
                lineWidth: 2,
                min: 15,
                max: 45,
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
                { name: '-3', data: headData1, color: '#DC143C' }, // Ganti warna sesuai keinginan
                { name: '-2', data: headData2, color: '#ff1493' }, // Ganti warna sesuai keinginan
                { name: '-1', data: headData3, color: '#DAA520' }, // Ganti warna sesuai keinginan
                { name: '0', data: headData4, color: '#32CD32' }, // Ganti warna sesuai keinginan
                { name: '1', data: headData5, color: '#DAA520' }, // Ganti warna sesuai keinginan
                {
                    name: 'Pasien',
                    data: boyData2,
                    color: '#7cb5ec',
                    marker: {
                        enabled: true, // Aktifkan marker hanya untuk seri Pasien
                        radius: 5, // Sesuaikan radius marker sesuai keinginan
                        symbol: 'circle' // Ganti simbol marker sesuai keinginan
                    }
                },
            ]
        };

        chart2 = Highcharts.chart('grafik_fpgg2', options);
    }

    // GRAFIK wieght
    var chart3;
    function grafik3(data, id_layanan_pendaftaran, action) {

        var boyData3 = [];

        $.each(data, function (i, v) {
            // Konversi nilai berat_badan ke tipe data numerik
            var beratBadanNumeric = parseFloat(v.berat_badan);

            // Pastikan bahwa nilai beratBadanNumeric adalah angka valid
            if (!isNaN(beratBadanNumeric)) {
                boyData3.push([v.umur_minggu, beratBadanNumeric]);
            }
        });

        // lenght
        var weightData1 = [
            [22.5, 0.4],
            [28, 0.6],
            [36, 1.91],
            [50, 4.61]
        ];
        var weightData2 = [
            [22.5, 0.45],
            [28, 0.77],
            [36, 2.18],
            [50, 5]
        ];
        var weightData3 = [
            [22.5, 0.53],
            [28, 1.1],
            [36, 2.7],
            [50, 5.83]
        ];
        var weightData4 = [
            [22.5, 0.61],
            [28, 1.33],
            [36, 3.29],
            [50, 6.8]
        ];
        var weightData5 = [
            [22.5, 0.68],
            [28, 1.48],
            [36, 3.55],
            [50, 7.26]
        ];

        var options = {
            title: {
                text: 'Fenton preterm growth chart - girls',
                align: 'right'
            },
            subtitle: {
                text: 'Weight',
                align: 'right'
            },
            chart: {
                height: 600,
                // width: 2000,
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
                    text: 'Gestational age (weeks)'
                },
                accessibility: {
                    rangeDescription: 'Range: 1 to 5.'
                },
                maxPadding: 0.05,
                showLastLabel: true,
                min: 22,
                max: 50,
                tickInterval: 2,
                // labels: {
                //     formatter: function () {
                //         var years = Math.floor(this.value / 12);
                //         var months = this.value % 12;
                //         if (months === 0) {
                //             return years + ' year';
                //         } else {
                //             return months;
                //         }
                //     }
                // }
            },
            yAxis: {
                title: {
                    text: 'Kilograms'
                },
                accessibility: {
                    rangeDescription: 'Range: 0 to 10 Kg.'
                },
                lineWidth: 2,
                min: 0,
                max: 7.5,
                tickInterval: 0.5
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
                { name: '-3', data: weightData1, color: '#DC143C' }, // Ganti warna sesuai keinginan
                { name: '-2', data: weightData2, color: '#ff1493' }, // Ganti warna sesuai keinginan
                { name: '-1', data: weightData3, color: '#DAA520' }, // Ganti warna sesuai keinginan
                { name: '0', data: weightData4, color: '#32CD32' }, // Ganti warna sesuai keinginan
                { name: '1', data: weightData5, color: '#DAA520' }, // Ganti warna sesuai keinginan
                {
                    name: 'Pasien',
                    data: boyData3,
                    color: '#7cb5ec',
                    marker: {
                        enabled: true, // Aktifkan marker hanya untuk seri Pasien
                        radius: 5, // Sesuaikan radius marker sesuai keinginan
                        symbol: 'circle' // Ganti simbol marker sesuai keinginan
                    }
                },
            ]
        };

        chart3 = Highcharts.chart('grafik_fpgg3', options);
    }

    function simpanFpgg() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_fpgg") ?>',
            data: $('#form_fpgg').serialize(),
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
                        $('#modal_fpgg').modal('hide');
                        showListForm($('#fpgg_id_pendaftaran').val(), $('#fpgg_id_layanan_pendaftaran').val(), $('#fpgg_id_pasien').val());
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