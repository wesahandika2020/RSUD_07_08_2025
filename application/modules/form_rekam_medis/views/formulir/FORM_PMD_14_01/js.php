<script>
    var nomer = 1;
    $(function() {

        nomer++;

        $("#wizard-operasi").bwizard();

        // RPPPP TANGGAL JAM TAHUN dan HARI / CKP / AAAS /APB/ CPKJI
        $('#tanggal-rpppp, #jam-tanggal-cpo, #tanggal-jam-ckio, #jam-tanggal-po, #aaas-tanggal-pemeriksaan-pasien,#apbwh-tanggal, #apbwh-tanggal-d, #apbwh-tanggal-p').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            maxDate: new Date()
        }).on('dp.change', function() {
            const date = $(this).val().split(' ')[0].split('/');
            const tanggal = date[0];
            const bulan = date[1];
            const tahun = date[2];
            const namaHari = new Date(`${tahun}-${bulan}-${tanggal}`).toLocaleDateString('id-ID', {
                weekday: 'long'
            });
            $('#hari-rpppp').val(namaHari);
        });

        // RPPPP DOKTER /CKP / APB / CPKJI
        $('#tim-dpjp, #paraf-dokter-rpppp, #dokter-operator-ckp, #apbwh-dokter, #dokterr-1')
            .select2c({
                ajax: {
                    url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                    dataType: 'json',
                    quietMillis: 100,
                    data: function(term,
                        page) { // page is the one-based page number tracked by Select2
                        return {
                            q: term, //search term
                            page: page, // page number
                            jenis: 18,
                        };
                    },
                    results: function(data, page) {
                        var more = (page * 20) < data
                            .total; // whether or not there are more results available

                        // notice we return the value of more so Select2 knows if more results can be loaded
                        return {
                            results: data.data,
                            more: more
                        };
                    }
                },
                formatResult: function(data) {
                    var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                    return markup;
                },
                formatSelection: function(data) {
                    return data.nama;
                }
            });


        // RPPPP PERAWAT  / CKP / AAAS / CPKJI
        $('#tim-perawatt-1, #tim-perawatt-2, #tim-perawatt-3, #perawat-ruangan-pfp, #perawat-penerima-ot-ppo, #perawat-ot-po, #perawwat-ruangan-pr, #perawwat-anastesi-pa, #perawwat-kamar-bedah, #perawat-instrument-1, #perawat-instrument-2, #perawwat-ruangan-prr, #perawwat-anastesi-paa, #perawwat-kamar-bedahh, #perawat-cpo, #perawatt-cpo, #perawwat-ruangan-prrr, #perawwat-anastesi-paaa, #perawwat-kamar-bedahhh, #aaas-perawat, #aaas-pemeriksa-asesmen-anestesi, #perawwat-2, #peerawat-1, #peerawat-2, #peerawat-3')
            .select2c({
                ajax: {
                    url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                    dataType: 'json',
                    quietMillis: 100,
                    data: function(term,
                        page) { // page is the one-based page number tracked by Select2
                        return {
                            q: term, //search term
                            page: page, // page number
                            jenis: $('#c_profesi').val(),
                        };
                    },
                    results: function(data, page) {
                        var more = (page * 20) < data
                            .total; // whether or not there are more results available

                        // notice we return the value of more so Select2 knows if more results can be loaded
                        return {
                            results: data.data,
                            more: more
                        };
                    }
                },
                formatResult: function(data) {
                    var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                    return markup;
                },
                formatSelection: function(data) {
                    return data.nama;
                }
            });


        // CPKJI
        $('#tanggal-c')
            .datetimepicker({
                format: 'DD/MM/YYYY',
                pickSecond: false,
                pick12HourFormat: false,
                maxDate: new Date(),
                beforeShow: function(i) {
                    if ($(i).attr('readonly')) {
                        return false;
                    }
                }
            });


        // CKP JAM / CKPJI
        $('#jam-pfp, #jam-ppo, #time-out-ckio-2, #time-out-ckio-5, #time-out-ckio-8, #time-out-ckio-11, #catatan-keperawatan-intra-operasi-81, #catatan-keperawatan-intra-operasi-84, #catatan-keperawatan-intra-operasi-87, #catatan-keperawatan-intra-operasi-90, #catatan-keperawatan-sesudah-operasi-2, #catatan-keperawatan-sesudah-operasi-5, #ceklis-persiapan-operasiii-1, #ceklis-persiapan-operasiii-4, #ceklis-persiapan-operasiii-7, #jam-cpo-1, #jam-cpo-2, #time-out-ckio-10, #jam-mulai-c, #jam-selesai-c')
            .on('click', function() {
                $(this).timepicker({
                    format: 'HH:mm',
                    showInputs: false,
                    showMeridian: false
                });
            })

        // CKP JAM
        $('#jam-ckp')
            .on('click', function() {
                $(this).timepicker({
                    format: 'HH:mm',
                    showInputs: false,
                    showMeridian: false
                });
            })

        // RPPPPP
        $('[name="nutrisi_3"]').on('change', function() {
            if ($(this).attr('id') === 'nutrisi-4' && $(this).is(':checked')) {
                $('#nutrisi-5').prop('disabled', false);
            } else {
                $('#nutrisi-5').prop('disabled', true);
            }
        })

        // CKP
        $('#ckp-btn-expand-all').click(function() {
            $('.collapse').addClass('show');
        });

        $('#ckp-btn-collapse-all').click(function() {
            $('.collapse').removeClass('show');
        });

        $('#catatan-keperawatan-intra-operasi-10').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-operasi-11').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-operasi-11').val('');
                $('#catatan-keperawatan-intra-operasi-11').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-intra-operasi-23').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-operasi-24').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-operasi-24').val('');
                $('#catatan-keperawatan-intra-operasi-24').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-intra-operasi-32').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-operasi-33').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-operasi-33').val('');
                $('#catatan-keperawatan-intra-operasi-33').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-intra-operasi-40').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-operasi-41').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-operasi-41').val('');
                $('#catatan-keperawatan-intra-operasi-41').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-intra-operasi-44').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-operasi-45').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-operasi-45').val('');
                $('#catatan-keperawatan-intra-operasi-45').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-intra-operasi-66').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-operasi-67').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-operasi-67').val('');
                $('#catatan-keperawatan-intra-operasi-67').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-intra-operasi-71').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-operasi-72').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-operasi-72').val('');
                $('#catatan-keperawatan-intra-operasi-72').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-intra-operasi-75').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-operasi-76').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-operasi-76').val('');
                $('#catatan-keperawatan-intra-operasi-76').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-intra-operasi-80').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-operasi-81').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-operasi-81').val('');
                $('#catatan-keperawatan-intra-operasi-81').prop('disabled', true);
            }
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-operasi-82').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-operasi-82').val('');
                $('#catatan-keperawatan-intra-operasi-82').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-intra-operasi-83').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-operasi-84').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-operasi-84').val('');
                $('#catatan-keperawatan-intra-operasi-84').prop('disabled', true);
            }
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-operasi-85').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-operasi-85').val('');
                $('#catatan-keperawatan-intra-operasi-85').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-intra-operasi-86').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-operasi-87').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-operasi-87').val('');
                $('#catatan-keperawatan-intra-operasi-87').prop('disabled', true);
            }
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-operasi-88').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-operasi-88').val('');
                $('#catatan-keperawatan-intra-operasi-88').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-intra-operasi-89').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-operasi-90').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-operasi-90').val('');
                $('#catatan-keperawatan-intra-operasi-90').prop('disabled', true);
            }
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-operasi-91').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-operasi-91').val('');
                $('#catatan-keperawatan-intra-operasi-91').prop('disabled', true);
            }
        });


        $('#catatan-keperawatan-intra-op-11').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-op-12').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-op-12').val('');
                $('#catatan-keperawatan-intra-op-12').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-intra-op-19').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-op-20').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-op-20').val('');
                $('#catatan-keperawatan-intra-op-20').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-intra-op-26').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-op-27').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-op-27').val('');
                $('#catatan-keperawatan-intra-op-27').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-intra-op-33').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-op-34').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-op-34').val('');
                $('#catatan-keperawatan-intra-op-34').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-intra-op-44').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-op-45').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-op-45').val('');
                $('#catatan-keperawatan-intra-op-45').prop('disabled', true);
            }
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-intra-op-46').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-intra-op-46').val('');
                $('#catatan-keperawatan-intra-op-46').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-sesudah-op-10').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-sesudah-op-11').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-sesudah-op-11').val('');
                $('#catatan-keperawatan-sesudah-op-11').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-sesudah-op-17').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-sesudah-op-18').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-sesudah-op-18').val('');
                $('#catatan-keperawatan-sesudah-op-18').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-sesudah-op-26').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-sesudah-op-27').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-sesudah-op-27').val('');
                $('#catatan-keperawatan-sesudah-op-27').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-sesudah-op-35').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-sesudah-op-36').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-sesudah-op-36').val('');
                $('#catatan-keperawatan-sesudah-op-36').prop('disabled', true);
            }
        });

        $('#catatan-keperawatan-sesudah-op-43').click(function() {
            if ($(this).is(":checked")) {
                $('#catatan-keperawatan-sesudah-op-44').prop('disabled', false);
            } else {
                $('#catatan-keperawatan-sesudah-op-44').val('');
                $('#catatan-keperawatan-sesudah-op-44').prop('disabled', true);
            }
        });

        // SSCKO 1 
        $('#buka-tutup-surgical-safety-ceklis-kamar-operasi').one('click', function() {
            $('#sscko-dokter-anestesi-sign-in, #sscko-dokter-anestesi-time-out, #sscko-dokter-anestesi-sign-out')
                .select2c({
                    ajax: {
                        url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                        dataType: 'json',
                        quietMillis: 100,
                        data: function(term,
                            page) { // page is the one-based page number tracked by Select2
                            return {
                                q: term, //search term
                                page: page, // page number
                                jenis: 18,
                            };
                        },
                        results: function(data, page) {
                            var more = (page * 20) < data
                                .total; // whether or not there are more results available

                            // notice we return the value of more so Select2 knows if more results can be loaded
                            return {
                                results: data.data,
                                more: more
                            };
                        }
                    },
                    formatResult: function(data) {
                        var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                        return markup;
                    },
                    formatSelection: function(data) {
                        return data.nama;
                    }
                });


            // SSCKO 2 
            $('#sscko-perawat-sign-in, #sscko-perawat-time-out, #sscko-perawat-sign-out')
                .select2c({
                    ajax: {
                        url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                        dataType: 'json',
                        quietMillis: 100,
                        data: function(term,
                            page) { // page is the one-based page number tracked by Select2
                            return {
                                q: term, //search term
                                page: page, // page number
                                jenis: $('#c_profesi').val(),
                            };
                        },
                        results: function(data, page) {
                            var more = (page * 20) < data
                                .total; // whether or not there are more results available

                            // notice we return the value of more so Select2 knows if more results can be loaded
                            return {
                                results: data.data,
                                more: more
                            };
                        }
                    },
                    formatResult: function(data) {
                        var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                        return markup;
                    },
                    formatSelection: function(data) {
                        return data.nama;
                    }
                });

            // SSCKO 3 
            $(' #sscko-tanggal-sign-in, #sscko-tanggal-time-out, #sscko-tanggal-sign-out')
                .datetimepicker({
                    format: 'DD/MM/YYYY HH:mm',
                    maxDate: new Date(),
                    beforeShow: function(i) {
                        if ($(i).attr('readonly')) {
                            return false;
                        }
                    }
                });

            // SSCKO 4
            $('#sscko-tanggal-tindakan')
                .datetimepicker({
                    format: 'DD/MM/YYYY',
                    maxDate: new Date(),
                    beforeShow: function(i) {
                        if ($(i).attr('readonly')) {
                            return false;
                        }
                    }
                });



            // SSCKO 5 
            $('input[type=radio][name=sscko_alergi]').change(function() {
                if (this.value == '0') {
                    $('#sscko-sebut').val('');
                    $('#sscko-sebut').prop('disabled', true);
                } else {
                    $('#sscko-sebut').val('');
                    $('#sscko-sebut').prop('disabled', false);
                }
            });


            $('input[type=radio][name=sscko_rencana]').change(function() {
                if (this.value == '0') {
                    $('#sscko-jenis').val('');
                    $('#sscko-jenis').prop('disabled', true);
                } else {
                    $('#sscko-jenis').val('');
                    $('#sscko-jenis').prop('disabled', false);
                }
            });

        })

        // showFormSurgicalSafetyCeklisOperasi(nomer);
        showFormSurgicalSafetyCeklisKamarOperasi(nomer);
    })

    var canvas = $('#plo-gambar')[0];
    var context = canvas.getContext('2d');
    var isCanvasChanged = false;

    var isDrawing = false;
    var lastX = 0;
    var lastY = 0;
    var color = "red";
    var lineWidth = 2;
    var img = new Image();
    img.onload = function() {
        // Menggambar gambar sebagai latar belakang
        context.drawImage(img, 0, 0, canvas.width, canvas.height);
    }
    img.src = 'resources/images/attributes/penandaan area operasi.jpg';

    canvas.addEventListener("mousedown", function(e) {
        isDrawing = true;
        lastX = e.offsetX;
        lastY = e.offsetY;
    });

    canvas.addEventListener("mousemove", function(e) {
        if (isDrawing) {
            context.beginPath();
            context.moveTo(lastX, lastY);
            context.lineTo(e.offsetX, e.offsetY);
            context.strokeStyle = color;
            context.lineWidth = lineWidth;
            context.stroke();
            lastX = e.offsetX;
            lastY = e.offsetY;
            isCanvasChanged = true; // Mengubah status perubahan canvas menjadi true
        }
    });

    canvas.addEventListener("mouseup", function(e) {
        isDrawing = false;
    });

    canvas.addEventListener("mouseleave", function(e) {
        isDrawing = false;
    });

    function setColor(c) {
        color = c;
    }

    function setLineWidth(w) {
        lineWidth = w;
    }

    function clearCanvasPlo() {
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.drawImage(img, 0, 0, canvas.width, canvas.height);
        isCanvasChanged = false; // Mengubah status perubahan canvas menjadi false saat membersihkan canvas
    }


    $('#plo-tanggal').datetimepicker({
        format: 'DD/MM/YYYY',
        pickSecond: false,
        pick12HourFormat: false,
        maxDate: new Date(),
        beforeShow: function(i) {
            if ($(i).attr('readonly')) {
                return false;
            }
        }
    });

    $('#plo-tanggal-pasien, #plo-tanggal-dokter').datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
        pickSecond: false,
        pick12HourFormat: false,
        maxDate: new Date(),
        beforeShow: function(i) {
            if ($(i).attr('readonly')) {
                return false;
            }
        }
    });

    $('#plo-dokter').select2c({
        ajax: {
            url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
                return {
                    q: term, //search term
                    page: page, // page number
                };
            },
            results: function(data, page) {
                var more = (page * 20) < data
                    .total; // whether or not there are more results available

                // notice we return the value of more so Select2 knows if more results can be loaded
                return {
                    results: data.data,
                    more: more
                };
            }
        },
        formatResult: function(data) {
            var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
            return markup;
        },
        formatSelection: function(data) {
            return data.nama;
        }
    })

    function timerzmysql(waktu) {
        var tm = waktu.split(':');
        return tm[0] + ':' + tm[1];
    }

    function bukaLebar(title, num) {
        let html = /* html */ `
        <div class="accordion">
            <div class="card">
                <div class="card-header" id="heading-${num}">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-${num}" aria-expanded="false" aria-controls="collapse-${num}">
                            ${title}
                        </button>
                    </h2>
                </div>
                <div id="collapse-${num}" class="collapse" aria-labelledby="heading-${num}">
                    <div class="card-body">       
    `;

        return html;
    }

    function tutupRapet(title, num) {
        let html = /* html */ `
                    </div>
                </div>
            </div>
        </div>
    `;

        return html;
    }

    function removeList(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function removeListTable(el) {
        var parent = el.parentNode.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function lihatFORM_PMD_14_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        entriOperasi(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_PMD_14_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        entriOperasi(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_PMD_14_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        entriOperasi(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriOperasi(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        $('#btn-simpan').hide();

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat') {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }

        resetFormOperasi();
        let id_translucent = "<?= $this->session->userdata('id_translucent') ?>";
        let nama = "<?= $this->session->userdata('nama') ?>";
        let id_profesi_nadis = "<?= $this->session->userdata('id_profesi_nadis') ?>";
        let profesi_nadis = "<?= $this->session->userdata('profesi_nadis') ?>";
        // $('#id-ok').val(id_ok);

        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_operasi/api/Order_operasi/get_data_entri_operasi") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('#ok-id-pasien').val(data.pasien.no_rm);
                $('#ok-id-pendaftaran').val(id_pendaftaran);
                $('#ok-id-layanan-pendaftaran').val(id_layanan_pendaftaran);
                if (data.pasien !== null) {
                    $('#nama-pasien, #nama-pasien-2').text(data.pasien.nama);
                    $('#no-rm').text(data.pasien.no_rm);
                    $('#tanggal-lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    $('#agama').text(data.pasien.agama);
                    $('#alamat').text(data.pasien.alamat);
                }

                // RPPPPP AWAL
                let rencana_pelayanan_pasien_pasca_pembedahan = data.rencana_pelayanan_pasien_pasca_pembedahan;

                if (rencana_pelayanan_pasien_pasca_pembedahan !== null) {
                    $('#id-rpppp').val(rencana_pelayanan_pasien_pasca_pembedahan.id);
                    $('#tanggal-rpppp').val((data.rencana_pelayanan_pasien_pasca_pembedahan.tanggal_rpppp !== null ? datetimefmysql(data.rencana_pelayanan_pasien_pasca_pembedahan.tanggal_rpppp) : ''));
                    $('#hari-rpppp').val(data.rencana_pelayanan_pasien_pasca_pembedahan.hari_rpppp);
                    $('#diagnosis-kerja').val(data.rencana_pelayanan_pasien_pasca_pembedahan.diagnosis_kerja);
                    $('#masalah-kebutuhan-prioritas').val(data.rencana_pelayanan_pasien_pasca_pembedahan.masalah_kebutuhan_prioritas);

                    const kewaspadaan = JSON.parse(data.rencana_pelayanan_pasien_pasca_pembedahan.kewaspadaan);
                    if (kewaspadaan.kewaspadaan_1 !== null) {
                        $('#kewaspadaan-1').prop('checked', true)
                    }
                    if (kewaspadaan.kewaspadaan_2 !== null) {
                        $('#kewaspadaan-2').prop('checked', true)
                    }
                    if (kewaspadaan.kewaspadaan_3 !== null) {
                        $('#kewaspadaan-3').prop('checked', true)
                    }
                    if (kewaspadaan.kewaspadaan_4 !== null) {
                        $('#kewaspadaan-4').prop('checked', true)
                    }

                    // if (rks_anc.anc_3 !== null) {$('#anc-3').prop('checked', true)} contoh cekbox
                    // if (rks_anc.anc_2 !== null) { $('#anc-2').val(rks_anc.anc_2);}  contoh text

                    if (data.rencana_pelayanan_pasien_pasca_pembedahan.tim_dokter !== null) {
                        $('#tim-dokter').prop('checked', true)
                    }
                    // if (data.rencana_pelayanan_pasien_pasca_pembedahan.id_dokter_1 !== null) { $('#tim-dpjp').select2c('readonly', true)}
                    $('#tim-dpjp').val(data.rencana_pelayanan_pasien_pasca_pembedahan.id_dokter_1);
                    $('#s2id_tim-dpjp a .select2c-chosen').html(data.rencana_pelayanan_pasien_pasca_pembedahan.nama_dokter_1);

                    if (data.rencana_pelayanan_pasien_pasca_pembedahan.tim_perawat !== null) {
                        $('#tim-perawat').prop('checked', true)
                    }
                    // if (data.rencana_pelayanan_pasien_pasca_pembedahan.id_perawat_1 !== null) { $('#tim-perawat-1').select2c('readonly', true)}
                    $('#tim-perawatt-1').val(data.rencana_pelayanan_pasien_pasca_pembedahan.id_perawat_1);
                    $('#s2id_tim-perawatt-1 a .select2c-chosen').html(data.rencana_pelayanan_pasien_pasca_pembedahan.nama_perawat_1);
                    // if (data.rencana_pelayanan_pasien_pasca_pembedahan.id_perawat_2 !== null) { $('#tim-perawat-2').select2c('readonly', true)}
                    $('#tim-perawatt-2').val(data.rencana_pelayanan_pasien_pasca_pembedahan.id_perawat_2);
                    $('#s2id_tim-perawatt-2 a .select2c-chosen').html(data.rencana_pelayanan_pasien_pasca_pembedahan.nama_perawat_2);
                    // if (data.rencana_pelayanan_pasien_pasca_pembedahan.id_perawat_3 !== null) { $('#tim-perawat-3').select2c('readonly', true)}
                    $('#tim-perawatt-3').val(data.rencana_pelayanan_pasien_pasca_pembedahan.id_perawat_3);
                    $('#s2id_tim-perawatt-3 a .select2c-chosen').html(data.rencana_pelayanan_pasien_pasca_pembedahan.nama_perawat_3);

                    const pemeriksaan = JSON.parse(data.rencana_pelayanan_pasien_pasca_pembedahan.pemeriksaan);
                    if (pemeriksaan.pemeriksaan_1 !== null) {
                        $('#pemeriksaan-1').prop('checked', true)
                    }
                    if (pemeriksaan.pemeriksaan_2 !== null) {
                        $('#pemeriksaan-2').prop('checked', true)
                    }
                    if (pemeriksaan.pemeriksaan_3 !== null) {
                        $('#pemeriksaan-3').val(pemeriksaan.pemeriksaan_3);
                    }

                    $('#prosedur-tindakan').val(data.rencana_pelayanan_pasien_pasca_pembedahan.prosedur_tindakan);

                    const nutrisi_rpppp = JSON.parse(data.rencana_pelayanan_pasien_pasca_pembedahan.nutrisi_rpppp);
                    if (nutrisi_rpppp.nutrisi_1 !== null) {
                        $('#nutrisi-1').val(nutrisi_rpppp.nutrisi_1);
                    }
                    if (nutrisi_rpppp.nutrisi_2 !== null) {
                        $('#nutrisi-2').val(nutrisi_rpppp.nutrisi_2);
                    }
                    if (nutrisi_rpppp.nutrisi_3 === '0') {
                        $('#nutrisi-3').prop('checked', true).change()
                    }
                    if (nutrisi_rpppp.nutrisi_3 === '1') {
                        $('#nutrisi-4').prop('checked', true).change()
                    }
                    if (nutrisi_rpppp.nutrisi_5 !== null) {
                        $('#nutrisi-5').val(nutrisi_rpppp.nutrisi_5);
                    }

                    const aktivitas_rpppp = JSON.parse(data.rencana_pelayanan_pasien_pasca_pembedahan.aktivitas_rpppp);
                    if (aktivitas_rpppp.aktivitas_1 !== null) {
                        $('#aktivitas-1').prop('checked', true)
                    }
                    if (aktivitas_rpppp.aktivitas_2 !== null) {
                        $('#aktivitas-2').prop('checked', true)
                    }
                    if (aktivitas_rpppp.aktivitas_3 !== null) {
                        $('#aktivitas-3').prop('checked', true)
                    }

                    const pengobatann = JSON.parse(data.rencana_pelayanan_pasien_pasca_pembedahan.pengobatann);
                    if (pengobatann.pengobatann_1 !== null) {
                        $('#pengobatann-1').prop('checked', true)
                    }
                    if (pengobatann.pengobatann_2 !== null) {
                        $('#pengobatann-2').prop('checked', true)
                    }
                    if (pengobatann.pengobatann_3 !== null) {
                        $('#pengobatann-3').val(pengobatann.pengobatann_3);
                    }

                    const keperawwatan = JSON.parse(data.rencana_pelayanan_pasien_pasca_pembedahan.keperawwatan);
                    if (keperawwatan.keperawwatan_1 !== null) {
                        $('#keperawwatan-1').prop('checked', true)
                    }
                    if (keperawwatan.keperawwatan_2 !== null) {
                        $('#keperawwatan-2').prop('checked', true)
                    }
                    if (keperawwatan.keperawwatan_3 !== null) {
                        $('#keperawwatan-3').prop('checked', true)
                    }
                    if (keperawwatan.keperawwatan_4 !== null) {
                        $('#keperawwatan-4').prop('checked', true)
                    }

                    if (data.rencana_pelayanan_pasien_pasca_pembedahan.tindakan_rehabilitan_medik === '0') {
                        $('#tindakan-rehabilitan-medik-1').prop('checked', true).change()
                    }
                    if (data.rencana_pelayanan_pasien_pasca_pembedahan.tindakan_rehabilitan_medik === '1') {
                        $('#tindakan-rehabilitan-medik-2').prop('checked', true).change()
                    }

                    $('#konsultasi-rpppp').val(data.rencana_pelayanan_pasien_pasca_pembedahan.konsultasi_rpppp)
                    $('#sasaran-rpppp').val(data.rencana_pelayanan_pasien_pasca_pembedahan.sasaran_rpppp)
                    $('#planing-rpppp').val(data.rencana_pelayanan_pasien_pasca_pembedahan.planing_rpppp)


                    if (data.rencana_pelayanan_pasien_pasca_pembedahan.nama_jelas_rpppp !== null) {
                        $('#nama-jelas-rpppp').prop('checked', true)
                    }
                    // if (data.rencana_pelayanan_pasien_pasca_pembedahan.id_dokter_2 !== null) { $('#paraf-dokter-rpppp').select2c('readonly', true)}
                    $('#paraf-dokter-rpppp').val(data.rencana_pelayanan_pasien_pasca_pembedahan.id_dokter_2);
                    $('#s2id_paraf-dokter-rpppp a .select2c-chosen').html(data.rencana_pelayanan_pasien_pasca_pembedahan.nama_dokter_2);

                }
                // RPPPPP AKHIR


                // CKP AWAL  // BATAS A AWAL
                let catatan_keperawatan_perioperatif = data.catatan_keperawatan_perioperatif;
                // grafikOperasi(data.catatan_keperawatan_perioperatif?.grafik_ckp)
                if (catatan_keperawatan_perioperatif !== null) {
                    $('#id-ckp').val(catatan_keperawatan_perioperatif.id);
                    const suhu_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.suhu_ckp);
                    if (suhu_ckp.suhu_ckp_1 !== null) {
                        $('#suhu-ckp-1').val(suhu_ckp.suhu_ckp_1);
                    }
                    if (suhu_ckp.suhu_ckp_2 !== null) {
                        $('#suhu-ckp-2').val(suhu_ckp.suhu_ckp_2);
                    }
                    if (suhu_ckp.suhu_ckp_3 !== null) {
                        $('#suhu-ckp-3').val(suhu_ckp.suhu_ckp_3);
                    }
                    if (suhu_ckp.suhu_ckp_4 !== null) {
                        $('#suhu-ckp-4').val(suhu_ckp.suhu_ckp_4);
                    }
                    if (suhu_ckp.suhu_ckp_5 !== null) {
                        $('#suhu-ckp-5').val(suhu_ckp.suhu_ckp_5);
                    }
                    if (suhu_ckp.suhu_ckp_6 !== null) {
                        $('#suhu-ckp-6').val(suhu_ckp.suhu_ckp_6);
                    }
                    if (suhu_ckp.suhu_ckp_7 !== null) {
                        $('#suhu-ckp-7').val(suhu_ckp.suhu_ckp_7);
                    }

                    const status_mental_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.status_mental_ckp);
                    if (status_mental_ckp.status_mental_ckp_1 !== null) {
                        $('#status-mental-ckp-1').prop('checked', true)
                    }
                    if (status_mental_ckp.status_mental_ckp_2 !== null) {
                        $('#status-mental-ckp-2').prop('checked', true)
                    }
                    if (status_mental_ckp.status_mental_ckp_3 !== null) {
                        $('#status-mental-ckp-3').prop('checked', true)
                    }
                    if (status_mental_ckp.status_mental_ckp_4 !== null) {
                        $('#status-mental-ckp-4').prop('checked', true)
                    }
                    if (status_mental_ckp.status_mental_ckp_5 !== null) {
                        $('#status-mental-ckp-5').prop('checked', true)
                    }

                    const riwayat_penyakit_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.riwayat_penyakit_ckp);
                    if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_1 === '0') {
                        $('#riwayat-penyakit-ckp-1').prop('checked', true).change()
                    }
                    if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_1 === '1') {
                        $('#riwayat-penyakit-ckp-2').prop('checked', true).change()
                    }
                    if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_3 !== null) {
                        $('#riwayat-penyakit-ckp-3').prop('checked', true).change()
                    }
                    if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_4 !== null) {
                        $('#riwayat-penyakit-ckp-4').prop('checked', true).change()
                    }
                    if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_5 !== null) {
                        $('#riwayat-penyakit-ckp-5').prop('checked', true).change()
                    }
                    if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_6 !== null) {
                        $('#riwayat-penyakit-ckp-6').prop('checked', true).change()
                    }
                    if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_7 !== null) {
                        $('#riwayat-penyakit-ckp-7').prop('checked', true).change()
                    }
                    if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_8 !== null) {
                        $('#riwayat-penyakit-ckp-8').prop('checked', true).change()
                    }
                    if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_9 !== null) {
                        $('#riwayat-penyakit-ckp-9').val(riwayat_penyakit_ckp.riwayat_penyakit_ckp_9);
                    }

                    $('#pengobatan-saat-ini-ckp').val(data.catatan_keperawatan_perioperatif.pengobatan_saat_ini_ckp);
                    $('#operasi-sebelumnya-ckp').val(data.catatan_keperawatan_perioperatif.operasi_sebelumnya_ckp);

                    const alergi_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.alergi_ckp);
                    if (alergi_ckp.alergi_ckp === '0') {
                        $('#alergi-ckp-1').prop('checked', true).change()
                    }
                    if (alergi_ckp.alergi_ckp === '1') {
                        $('#alergi-ckp-2').prop('checked', true).change()
                    }
                    if (alergi_ckp.alergi_ckp_3 !== null) {
                        $('#alergi-ckp-3').val(alergi_ckp.alergi_ckp_3);
                    }
                    if (alergi_ckp.alergi_ckp_4 !== null) {
                        $('#alergi-ckp-4').val(alergi_ckp.alergi_ckp_4);
                    }

                    const gol_darah_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.gol_darah_ckp);
                    if (gol_darah_ckp.gol_darah_ckp_1 !== null) {
                        $('#gol-darah-ckp-1').val(gol_darah_ckp.gol_darah_ckp_1);
                    }
                    if (gol_darah_ckp.gol_darah_ckp_2 !== null) {
                        $('#gol-darah-ckp-2').val(gol_darah_ckp.gol_darah_ckp_2);
                    }

                    const standar_kewaspadaan_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.standar_kewaspadaan_ckp);
                    if (standar_kewaspadaan_ckp.standar_kewaspadaan_ckp_1 !== null) {
                        $('#standar-kewaspadaan-ckp-1').val(standar_kewaspadaan_ckp.standar_kewaspadaan_ckp_1);
                    }
                    if (standar_kewaspadaan_ckp.standar_kewaspadaan_ckp_2 !== null) {
                        $('#standar-kewaspadaan-ckp-2').val(standar_kewaspadaan_ckp.standar_kewaspadaan_ckp_2);
                    }

                    $('#rencana-tindakan-operasi-ckp').val(data.catatan_keperawatan_perioperatif.rencana_tindakan_operasi_ckp);
                    $('#dokter-operator-ckp').val(data.catatan_keperawatan_perioperatif.dokter_operator_ckp);
                    $('#s2id_dokter-operator-ckp a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_dokter_1);
                    $('#rencana-perawatan-pasca-operasi-ckp').val(data.catatan_keperawatan_perioperatif.rencana_perawatan_pasca_operasi_ckp);
                    // BATAS A AKHIR

                    // BATAS B AWAL
                    const verifikasi_pasien_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.verifikasi_pasien_ckp);
                    if (verifikasi_pasien_ckp.verifikasi_pasien_1 !== null) {
                        $('#verifikasi-pasien-1').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_1 !== null) {
                        $('#verifikasi-pasien-2').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_3 !== null) {
                        $('#verifikasi-pasien-3').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_4 !== null) {
                        $('#verifikasi-pasien-4').val(verifikasi_pasien_ckp.verifikasi_pasien_4);
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_5 !== null) {
                        $('#verifikasi-pasien-5').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_6 !== null) {
                        $('#verifikasi-pasien-6').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_7 !== null) {
                        $('#verifikasi-pasien-7').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_8 !== null) {
                        $('#verifikasi-pasien-8').val(verifikasi_pasien_ckp.verifikasi_pasien_8);
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_9 !== null) {
                        $('#verifikasi-pasien-9').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_10 !== null) {
                        $('#verifikasi-pasien-10').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_11 !== null) {
                        $('#verifikasi-pasien-11').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_12 !== null) {
                        $('#verifikasi-pasien-12').val(verifikasi_pasien_ckp.verifikasi_pasien_12);
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_13 !== null) {
                        $('#verifikasi-pasien-13').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_14 !== null) {
                        $('#verifikasi-pasien-14').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_15 !== null) {
                        $('#verifikasi-pasien-15').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_16 !== null) {
                        $('#verifikasi-pasien-16').val(verifikasi_pasien_ckp.verifikasi_pasien_16);
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_17 !== null) {
                        $('#verifikasi-pasien-17').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_18 !== null) {
                        $('#verifikasi-pasien-18').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_19 !== null) {
                        $('#verifikasi-pasien-19').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_20 !== null) {
                        $('#verifikasi-pasien-20').val(verifikasi_pasien_ckp.verifikasi_pasien_20);
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_21 !== null) {
                        $('#verifikasi-pasien-21').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_22 !== null) {
                        $('#verifikasi-pasien-22').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_23 !== null) {
                        $('#verifikasi-pasien-23').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_24 !== null) {
                        $('#verifikasi-pasien-24').val(verifikasi_pasien_ckp.verifikasi_pasien_24);
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_25 !== null) {
                        $('#verifikasi-pasien-25').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_26 !== null) {
                        $('#verifikasi-pasien-26').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_27 !== null) {
                        $('#verifikasi-pasien-27').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_28 !== null) {
                        $('#verifikasi-pasien-28').val(verifikasi_pasien_ckp.verifikasi_pasien_28);
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_29 !== null) {
                        $('#verifikasi-pasien-29').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_30 !== null) {
                        $('#verifikasi-pasien-30').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_31 !== null) {
                        $('#verifikasi-pasien-31').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_32 !== null) {
                        $('#verifikasi-pasien-32').val(verifikasi_pasien_ckp.verifikasi_pasien_32);
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_33 !== null) {
                        $('#verifikasi-pasien-33').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_34 !== null) {
                        $('#verifikasi-pasien-34').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_35 !== null) {
                        $('#verifikasi-pasien-35').prop('checked', true)
                    }
                    if (verifikasi_pasien_ckp.verifikasi_pasien_36 !== null) {
                        $('#verifikasi-pasien-36').val(verifikasi_pasien_ckp.verifikasi_pasien_36);
                    }

                    const persiapan_fisik_pasien_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.persiapan_fisik_pasien_ckp);
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_1 !== null) {
                        $('#persiapan-fisik-pasien-1').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_2 !== null) {
                        $('#persiapan-fisik-pasien-2').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_3 !== null) {
                        $('#persiapan-fisik-pasien-3').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_4 !== null) {
                        $('#persiapan-fisik-pasien-4').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_4);
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_5 !== null) {
                        $('#persiapan-fisik-pasien-5').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_6 !== null) {
                        $('#persiapan-fisik-pasien-6').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_7 !== null) {
                        $('#persiapan-fisik-pasien-7').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_8 !== null) {
                        $('#persiapan-fisik-pasien-8').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_8);
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_9 !== null) {
                        $('#persiapan-fisik-pasien-9').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_10 !== null) {
                        $('#persiapan-fisik-pasien-10').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_11 !== null) {
                        $('#persiapan-fisik-pasien-11').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_12 !== null) {
                        $('#persiapan-fisik-pasien-12').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_12);
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_13 !== null) {
                        $('#persiapan-fisik-pasien-13').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_14 !== null) {
                        $('#persiapan-fisik-pasien-14').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_15 !== null) {
                        $('#persiapan-fisik-pasien-15').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_16 !== null) {
                        $('#persiapan-fisik-pasien-16').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_16);
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_17 !== null) {
                        $('#persiapan-fisik-pasien-17').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_18 !== null) {
                        $('#persiapan-fisik-pasien-18').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_19 !== null) {
                        $('#persiapan-fisik-pasien-19').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_20 !== null) {
                        $('#persiapan-fisik-pasien-20').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_20);
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_21 !== null) {
                        $('#persiapan-fisik-pasien-21').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_22 !== null) {
                        $('#persiapan-fisik-pasien-22').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_23 !== null) {
                        $('#persiapan-fisik-pasien-23').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_24 !== null) {
                        $('#persiapan-fisik-pasien-24').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_24);
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_25 !== null) {
                        $('#persiapan-fisik-pasien-25').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_26 !== null) {
                        $('#persiapan-fisik-pasien-26').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_27 !== null) {
                        $('#persiapan-fisik-pasien-27').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_28 !== null) {
                        $('#persiapan-fisik-pasien-28').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_28);
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_29 !== null) {
                        $('#persiapan-fisik-pasien-29').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_30 !== null) {
                        $('#persiapan-fisik-pasien-30').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_31 !== null) {
                        $('#persiapan-fisik-pasien-31').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_32 !== null) {
                        $('#persiapan-fisik-pasien-32').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_32);
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_33 !== null) {
                        $('#persiapan-fisik-pasien-33').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_34 !== null) {
                        $('#persiapan-fisik-pasien-34').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_35 !== null) {
                        $('#persiapan-fisik-pasien-35').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_36 !== null) {
                        $('#persiapan-fisik-pasien-36').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_36);
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_37 !== null) {
                        $('#persiapan-fisik-pasien-37').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_38 !== null) {
                        $('#persiapan-fisik-pasien-38').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_39 !== null) {
                        $('#persiapan-fisik-pasien-39').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_40 !== null) {
                        $('#persiapan-fisik-pasien-40').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_40);
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_41 !== null) {
                        $('#persiapan-fisik-pasien-41').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_41);
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_42 !== null) {
                        $('#persiapan-fisik-pasien-42').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_43 !== null) {
                        $('#persiapan-fisik-pasien-43').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_44 !== null) {
                        $('#persiapan-fisik-pasien-44').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_45 !== null) {
                        $('#persiapan-fisik-pasien-45').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_45);
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_46 !== null) {
                        $('#persiapan-fisik-pasien-46').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_47 !== null) {
                        $('#persiapan-fisik-pasien-47').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_48 !== null) {
                        $('#persiapan-fisik-pasien-48').prop('checked', true)
                    }
                    if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_49 !== null) {
                        $('#persiapan-fisik-pasien-49').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_49);
                    }

                    $('#perawat-ruangan-pfp').val(data.catatan_keperawatan_perioperatif.perawat_ruangan_pfp);
                    $('#s2id_perawat-ruangan-pfp a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_1);
                    $('#jam-pfp').val(data.catatan_keperawatan_perioperatif.jam_pfp);
                    $('#perawat-penerima-ot-ppo').val(data.catatan_keperawatan_perioperatif.perawat_penerima_ot_ppo);
                    $('#s2id_perawat-penerima-ot-ppo a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_2);
                    $('#jam-ppo').val(data.catatan_keperawatan_perioperatif.jam_ppo);

                    const site_marketing = JSON.parse(data.catatan_keperawatan_perioperatif.site_marketing);
                    if (site_marketing.site_marketing === '1') {
                        $('#site-marketing-1').prop('checked', true).change()
                    }
                    if (site_marketing.site_marketing === '0') {
                        $('#site-marketing-2').prop('checked', true).change()
                    }

                    $('#perawat-ot-po').val(data.catatan_keperawatan_perioperatif.perawat_ot_po);
                    $('#s2id_perawat-ot-po a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_3);
                    $('#jam-tanggal-po').val((data.catatan_keperawatan_perioperatif.jam_tanggal_po !== null ? datetimefmysql(data.catatan_keperawatan_perioperatif.jam_tanggal_po) : ''));
                    // BATAS B AKHIR

                    //  ASUHAN KEPERAWATAN 1 AWAL
                    const asuhan_keperawatan_ak_1 = JSON.parse(data.catatan_keperawatan_perioperatif.asuhan_keperawatan_ak_1);
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_1 !== null) {
                        $('#asuhan-keperawatan-ak-1').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_2 !== null) {
                        $('#asuhan-keperawatan-ak-2').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_3 !== null) {
                        $('#asuhan-keperawatan-ak-3').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_4 !== null) {
                        $('#asuhan-keperawatan-ak-4').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_5 !== null) {
                        $('#asuhan-keperawatan-ak-5').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_6 !== null) {
                        $('#asuhan-keperawatan-ak-6').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_7 !== null) {
                        $('#asuhan-keperawatan-ak-7').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_8 !== null) {
                        $('#asuhan-keperawatan-ak-8').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_9 !== null) {
                        $('#asuhan-keperawatan-ak-9').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_10 !== null) {
                        $('#asuhan-keperawatan-ak-10').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_11 !== null) {
                        $('#asuhan-keperawatan-ak-11').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_12 !== null) {
                        $('#asuhan-keperawatan-ak-12').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_13 !== null) {
                        $('#asuhan-keperawatan-ak-13').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_14 !== null) {
                        $('#asuhan-keperawatan-ak-14').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_15 !== null) {
                        $('#asuhan-keperawatan-ak-15').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_16 !== null) {
                        $('#asuhan-keperawatan-ak-16').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_17 !== null) {
                        $('#asuhan-keperawatan-ak-17').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_18 !== null) {
                        $('#asuhan-keperawatan-ak-18').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_19 !== null) {
                        $('#asuhan-keperawatan-ak-19').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_20 !== null) {
                        $('#asuhan-keperawatan-ak-20').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_21 !== null) {
                        $('#asuhan-keperawatan-ak-21').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_22 !== null) {
                        $('#asuhan-keperawatan-ak-22').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_23 !== null) {
                        $('#asuhan-keperawatan-ak-23').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_24 !== null) {
                        $('#asuhan-keperawatan-ak-24').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_25 !== null) {
                        $('#asuhan-keperawatan-ak-25').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_26 !== null) {
                        $('#asuhan-keperawatan-ak-26').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_27 !== null) {
                        $('#asuhan-keperawatan-ak-27').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_28 !== null) {
                        $('#asuhan-keperawatan-ak-28').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_29 !== null) {
                        $('#asuhan-keperawatan-ak-29').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_30 !== null) {
                        $('#asuhan-keperawatan-ak-30').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_31 !== null) {
                        $('#asuhan-keperawatan-ak-31').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_32 !== null) {
                        $('#asuhan-keperawatan-ak-32').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_33 !== null) {
                        $('#asuhan-keperawatan-ak-33').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_34 !== null) {
                        $('#asuhan-keperawatan-ak-34').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_35 !== null) {
                        $('#asuhan-keperawatan-ak-35').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_36 !== null) {
                        $('#asuhan-keperawatan-ak-36').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_37 !== null) {
                        $('#asuhan-keperawatan-ak-37').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_38 !== null) {
                        $('#asuhan-keperawatan-ak-38').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_39 !== null) {
                        $('#asuhan-keperawatan-ak-39').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_40 !== null) {
                        $('#asuhan-keperawatan-ak-40').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_41 !== null) {
                        $('#asuhan-keperawatan-ak-41').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_42 !== null) {
                        $('#asuhan-keperawatan-ak-42').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_43 !== null) {
                        $('#asuhan-keperawatan-ak-43').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_44 !== null) {
                        $('#asuhan-keperawatan-ak-44').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_45 !== null) {
                        $('#asuhan-keperawatan-ak-45').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_46 !== null) {
                        $('#asuhan-keperawatan-ak-46').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_47 !== null) {
                        $('#asuhan-keperawatan-ak-47').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_48 !== null) {
                        $('#asuhan-keperawatan-ak-48').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_49 !== null) {
                        $('#asuhan-keperawatan-ak-49').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_50 !== null) {
                        $('#asuhan-keperawatan-ak-50').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_51 !== null) {
                        $('#asuhan-keperawatan-ak-51').val(asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_51);
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_52 !== null) {
                        $('#asuhan-keperawatan-ak-52').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_53 !== null) {
                        $('#asuhan-keperawatan-ak-53').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_54 !== null) {
                        $('#asuhan-keperawatan-ak-54').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_55 !== null) {
                        $('#asuhan-keperawatan-ak-55').val(asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_55);
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_56 !== null) {
                        $('#asuhan-keperawatan-ak-56').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_57 !== null) {
                        $('#asuhan-keperawatan-ak-57').val(asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_57);
                    }

                    $('#perawwat-ruangan-pr').val(data.catatan_keperawatan_perioperatif.perawwat_ruangan_pr);
                    $('#s2id_perawwat-ruangan-pr a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_4);
                    $('#perawwat-anastesi-pa').val(data.catatan_keperawatan_perioperatif.perawwat_anastesi_pa);
                    $('#s2id_perawwat-anastesi-pa a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_5);
                    $('#perawwat-kamar-bedah').val(data.catatan_keperawatan_perioperatif.perawwat_kamar_bedah);
                    $('#s2id_perawwat-kamar-bedah a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_6);
                    //  ASUHAN KEPERAWATAN 1 AKHIR

                    // CATATAN KEPEERAWATAN INTARA OPERASI AWAL
                    const time_out_ckio = JSON.parse(data.catatan_keperawatan_perioperatif.time_out_ckio);
                    if (time_out_ckio.time_out_ckio_1 === '1') {
                        $('#time-out-ckio-1').prop('checked', true).change()
                    }
                    if (time_out_ckio.time_out_ckio_2 !== null) {
                        $('#time-out-ckio-2').val(time_out_ckio.time_out_ckio_2);
                    }
                    if (time_out_ckio.time_out_ckio_1 === '0') {
                        $('#time-out-ckio-3').prop('checked', true).change()
                    }
                    if (time_out_ckio.time_out_ckio_4 === '1') {
                        $('#time-out-ckio-4').prop('checked', true).change()
                    }
                    if (time_out_ckio.time_out_ckio_5 !== null) {
                        $('#time-out-ckio-5').val(time_out_ckio.time_out_ckio_5);
                    }
                    if (time_out_ckio.time_out_ckio_4 === '0') {
                        $('#time-out-ckio-6').prop('checked', true).change()
                    }
                    if (time_out_ckio.time_out_ckio_7 === '1') {
                        $('#time-out-ckio-7').prop('checked', true).change()
                    }
                    if (time_out_ckio.time_out_ckio_8 !== null) {
                        $('#time-out-ckio-8').val(time_out_ckio.time_out_ckio_8);
                    }
                    if (time_out_ckio.time_out_ckio_7 === '0') {
                        $('#time-out-ckio-9').prop('checked', true).change()
                    }
                    if (time_out_ckio.time_out_ckio_10 !== null) {
                        $('#time-out-ckio-10').val(time_out_ckio.time_out_ckio_10);
                    }
                    if (time_out_ckio.time_out_ckio_11 !== null) {
                        $('#time-out-ckio-11').val(time_out_ckio.time_out_ckio_11);
                    }

                    const catatan_keperawatan_intra_operasi = JSON.parse(data.catatan_keperawatan_perioperatif.catatan_keperawatan_intra_operasi);
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_1 !== null) {
                        $('#catatan-keperawatan-intra-operasi-1').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_1);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_2 !== null) {
                        $('#catatan-keperawatan-intra-operasi-2').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_3 !== null) {
                        $('#catatan-keperawatan-intra-operasi-3').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_4 !== null) {
                        $('#catatan-keperawatan-intra-operasi-4').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_5 !== null) {
                        $('#catatan-keperawatan-intra-operasi-5').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_6 !== null) {
                        $('#catatan-keperawatan-intra-operasi-6').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_7 !== null) {
                        $('#catatan-keperawatan-intra-operasi-7').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_8 !== null) {
                        $('#catatan-keperawatan-intra-operasi-8').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_9 !== null) {
                        $('#catatan-keperawatan-intra-operasi-9').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_10 !== null) {
                        $('#catatan-keperawatan-intra-operasi-10').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_11 !== null) {
                        $('#catatan-keperawatan-intra-operasi-11').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_11);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_12 !== null) {
                        $('#catatan-keperawatan-intra-operasi-12').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_13 !== null) {
                        $('#catatan-keperawatan-intra-operasi-13').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_14 !== null) {
                        $('#catatan-keperawatan-intra-operasi-14').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_15 !== null) {
                        $('#catatan-keperawatan-intra-operasi-15').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_16 === 'kiri') {
                        $('#catatan-keperawatan-intra-operasi-16').prop('checked', true).change()
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_16 === 'kanan') {
                        $('#catatan-keperawatan-intra-operasi-17').prop('checked', true).change()
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_18 !== null) {
                        $('#catatan-keperawatan-intra-operasi-18').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_19 === '1') {
                        $('#catatan-keperawatan-intra-operasi-19').prop('checked', true).change()
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_19 === '2') {
                        $('#catatan-keperawatan-intra-operasi-20').prop('checked', true).change()
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_21 !== null) {
                        $('#catatan-keperawatan-intra-operasi-21').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_22 !== null) {
                        $('#catatan-keperawatan-intra-operasi-22').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_23 !== null) {
                        $('#catatan-keperawatan-intra-operasi-23').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_24 !== null) {
                        $('#catatan-keperawatan-intra-operasi-24').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_24);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_25 !== null) {
                        $('#catatan-keperawatan-intra-operasi-25').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_25);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_26 !== null) {
                        $('#catatan-keperawatan-intra-operasi-26').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_27 !== null) {
                        $('#catatan-keperawatan-intra-operasi-27').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_28 !== null) {
                        $('#catatan-keperawatan-intra-operasi-28').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_29 !== null) {
                        $('#catatan-keperawatan-intra-operasi-29').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_30 === '1') {
                        $('#catatan-keperawatan-intra-operasi-30').prop('checked', true).change()
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_30 === '2') {
                        $('#catatan-keperawatan-intra-operasi-31').prop('checked', true).change()
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_32 !== null) {
                        $('#catatan-keperawatan-intra-operasi-32').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_33 !== null) {
                        $('#catatan-keperawatan-intra-operasi-33').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_33);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_34 !== null) {
                        $('#catatan-keperawatan-intra-operasi-34').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_35 === '1') {
                        $('#catatan-keperawatan-intra-operasi-35').prop('checked', true).change()
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_35 === '2') {
                        $('#catatan-keperawatan-intra-operasi-36').prop('checked', true).change()
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_37 !== null) {
                        $('#catatan-keperawatan-intra-operasi-37').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_38 === '1') {
                        $('#catatan-keperawatan-intra-operasi-38').prop('checked', true).change()
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_38 === '2') {
                        $('#catatan-keperawatan-intra-operasi-39').prop('checked', true).change()
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_40 !== null) {
                        $('#catatan-keperawatan-intra-operasi-40').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_41 !== null) {
                        $('#catatan-keperawatan-intra-operasi-41').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_41);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_42 !== null) {
                        $('#catatan-keperawatan-intra-operasi-42').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_43 !== null) {
                        $('#catatan-keperawatan-intra-operasi-43').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_44 !== null) {
                        $('#catatan-keperawatan-intra-operasi-44').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_45 !== null) {
                        $('#catatan-keperawatan-intra-operasi-45').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_45);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_46 !== null) {
                        $('#catatan-keperawatan-intra-operasi-46').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_47 !== null) {
                        $('#catatan-keperawatan-intra-operasi-47').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_48 !== null) {
                        $('#catatan-keperawatan-intra-operasi-48').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_49 !== null) {
                        $('#catatan-keperawatan-intra-operasi-49').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_50 !== null) {
                        $('#catatan-keperawatan-intra-operasi-50').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_51 !== null) {
                        $('#catatan-keperawatan-intra-operasi-51').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_52 !== null) {
                        $('#catatan-keperawatan-intra-operasi-52').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_53 !== null) {
                        $('#catatan-keperawatan-intra-operasi-53').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_54 !== null) {
                        $('#catatan-keperawatan-intra-operasi-54').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_55 !== null) {
                        $('#catatan-keperawatan-intra-operasi-55').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_56 !== null) {
                        $('#catatan-keperawatan-intra-operasi-56').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_57 !== null) {
                        $('#catatan-keperawatan-intra-operasi-57').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_57);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_58 !== null) {
                        $('#catatan-keperawatan-intra-operasi-58').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_59 !== null) {
                        $('#catatan-keperawatan-intra-operasi-59').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_60 !== null) {
                        $('#catatan-keperawatan-intra-operasi-60').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_61 === '1') {
                        $('#catatan-keperawatan-intra-operasi-61').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_61 === '2') {
                        $('#catatan-keperawatan-intra-operasi-62').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_63 !== null) {
                        $('#catatan-keperawatan-intra-operasi-63').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_64 === '1') {
                        $('#catatan-keperawatan-intra-operasi-64').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_64 === '2') {
                        $('#catatan-keperawatan-intra-operasi-65').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_66 !== null) {
                        $('#catatan-keperawatan-intra-operasi-66').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_67 !== null) {
                        $('#catatan-keperawatan-intra-operasi-67').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_67);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_68 !== null) {
                        $('#catatan-keperawatan-intra-operasi-68').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_68);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_69 !== null) {
                        $('#catatan-keperawatan-intra-operasi-69').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_70 !== null) {
                        $('#catatan-keperawatan-intra-operasi-70').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_71 !== null) {
                        $('#catatan-keperawatan-intra-operasi-71').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_72 !== null) {
                        $('#catatan-keperawatan-intra-operasi-72').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_72);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_73 !== null) {
                        $('#catatan-keperawatan-intra-operasi-73').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_74 !== null) {
                        $('#catatan-keperawatan-intra-operasi-74').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_75 !== null) {
                        $('#catatan-keperawatan-intra-operasi-75').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_76 !== null) {
                        $('#catatan-keperawatan-intra-operasi-76').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_76);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_77 !== null) {
                        $('#catatan-keperawatan-intra-operasi-77').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_77);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_78 === '1') {
                        $('#catatan-keperawatan-intra-operasi-78').prop('checked', true).change()
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_78 === '0') {
                        $('#catatan-keperawatan-intra-operasi-79').prop('checked', true).change()
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_80 !== null) {
                        $('#catatan-keperawatan-intra-operasi-80').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_81 !== null) {
                        $('#catatan-keperawatan-intra-operasi-81').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_81);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_82 !== null) {
                        $('#catatan-keperawatan-intra-operasi-82').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_82);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_83 !== null) {
                        $('#catatan-keperawatan-intra-operasi-83').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_84 !== null) {
                        $('#catatan-keperawatan-intra-operasi-84').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_84);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_85 !== null) {
                        $('#catatan-keperawatan-intra-operasi-85').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_85);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_86 !== null) {
                        $('#catatan-keperawatan-intra-operasi-86').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_87 !== null) {
                        $('#catatan-keperawatan-intra-operasi-87').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_87);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_88 !== null) {
                        $('#catatan-keperawatan-intra-operasi-88').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_88);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_89 !== null) {
                        $('#catatan-keperawatan-intra-operasi-89').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_90 !== null) {
                        $('#catatan-keperawatan-intra-operasi-90').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_90);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_91 !== null) {
                        $('#catatan-keperawatan-intra-operasi-91').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_91);
                    }

                    const catatan_keperawatan_intra_op = JSON.parse(data.catatan_keperawatan_perioperatif.catatan_keperawatan_intra_op);
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_1 !== null) {
                        $('#catatan-keperawatan-intra-op-1').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_1);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_2 !== null) {
                        $('#catatan-keperawatan-intra-op-2').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_2);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_3 !== null) {
                        $('#catatan-keperawatan-intra-op-3').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_3);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_4 !== null) {
                        $('#catatan-keperawatan-intra-op-4').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_5 !== null) {
                        $('#catatan-keperawatan-intra-op-5').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_6 !== null) {
                        $('#catatan-keperawatan-intra-op-6').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_7 !== null) {
                        $('#catatan-keperawatan-intra-op-7').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_8 !== null) {
                        $('#catatan-keperawatan-intra-op-8').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_9 !== null) {
                        $('#catatan-keperawatan-intra-op-9').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_10 !== null) {
                        $('#catatan-keperawatan-intra-op-10').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_11 !== null) {
                        $('#catatan-keperawatan-intra-op-11').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_12 !== null) {
                        $('#catatan-keperawatan-intra-op-12').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_12);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_13 !== null) {
                        $('#catatan-keperawatan-intra-op-13').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_14 !== null) {
                        $('#catatan-keperawatan-intra-op-14').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_15 !== null) {
                        $('#catatan-keperawatan-intra-op-15').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_16 !== null) {
                        $('#catatan-keperawatan-intra-op-16').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_16);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_17 !== null) {
                        $('#catatan-keperawatan-intra-op-17').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_18 !== null) {
                        $('#catatan-keperawatan-intra-op-18').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_18);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_19 !== null) {
                        $('#catatan-keperawatan-intra-op-19').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_20 !== null) {
                        $('#catatan-keperawatan-intra-op-20').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_20);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_21 !== null) {
                        $('#catatan-keperawatan-intra-op-21').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_22 !== null) {
                        $('#catatan-keperawatan-intra-op-22').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_23 !== null) {
                        $('#catatan-keperawatan-intra-op-23').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_23);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_24 !== null) {
                        $('#catatan-keperawatan-intra-op-24').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_24);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_25 !== null) {
                        $('#catatan-keperawatan-intra-op-25').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_25);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_26 !== null) {
                        $('#catatan-keperawatan-intra-op-26').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_27 !== null) {
                        $('#catatan-keperawatan-intra-op-27').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_27);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_28 !== null) {
                        $('#catatan-keperawatan-intra-op-28').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_29 !== null) {
                        $('#catatan-keperawatan-intra-op-29').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_29);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_30 !== null) {
                        $('#catatan-keperawatan-intra-op-30').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_30);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_31 !== null) {
                        $('#catatan-keperawatan-intra-op-31').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_32 !== null) {
                        $('#catatan-keperawatan-intra-op-32').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_33 !== null) {
                        $('#catatan-keperawatan-intra-op-33').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_34 !== null) {
                        $('#catatan-keperawatan-intra-op-34').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_34);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_35 !== null) {
                        $('#catatan-keperawatan-intra-op-35').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_36 !== null) {
                        $('#catatan-keperawatan-intra-op-36').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_36);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_37 !== null) {
                        $('#catatan-keperawatan-intra-op-37').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_38 !== null) {
                        $('#catatan-keperawatan-intra-op-38').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_39 !== null) {
                        $('#catatan-keperawatan-intra-op-39').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_40 !== null) {
                        $('#catatan-keperawatan-intra-op-40').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_40);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_41 !== null) {
                        $('#catatan-keperawatan-intra-op-41').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_42 !== null) {
                        $('#catatan-keperawatan-intra-op-42').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_42);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_43 !== null) {
                        $('#catatan-keperawatan-intra-op-43').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_44 !== null) {
                        $('#catatan-keperawatan-intra-op-44').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_45 !== null) {
                        $('#catatan-keperawatan-intra-op-45').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_45);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_46 !== null) {
                        $('#catatan-keperawatan-intra-op-46').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_46);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_47 !== null) {
                        $('#catatan-keperawatan-intra-op-47').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_47);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_48 !== null) {
                        $('#catatan-keperawatan-intra-op-48').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_48);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_49 !== null) {
                        $('#catatan-keperawatan-intra-op-49').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_49);
                    }
                    if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_50 !== null) {
                        $('#catatan-keperawatan-intra-op-50').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_50);
                    }
                    $('#tanggal-jam-ckio').val((data.catatan_keperawatan_perioperatif.tanggal_jam_ckio !== null ? datetimefmysql(data.catatan_keperawatan_perioperatif.tanggal_jam_ckio) : ''));
                    $('#perawat-instrument-1').val(data.catatan_keperawatan_perioperatif.perawat_instrument_1);
                    $('#s2id_perawat-instrument-1 a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_7);
                    $('#perawat-instrument-2').val(data.catatan_keperawatan_perioperatif.perawat_instrument_2);
                    $('#s2id_perawat-instrument-2 a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_8);
                    // CATATAN KEPEERAWATAN INTARA OPERASI AKHIR

                    // ASUHAN KEPERAWATAN 2 AWAL
                    const asuhan_keperawatan_ak_2 = JSON.parse(data.catatan_keperawatan_perioperatif.asuhan_keperawatan_ak_2);
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_1 !== null) {
                        $('#asuhan-keperawatannnnn-ak-1').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_2 !== null) {
                        $('#asuhan-keperawatannnnn-ak-2').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_3 !== null) {
                        $('#asuhan-keperawatannnnn-ak-3').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_4 !== null) {
                        $('#asuhan-keperawatannnnn-ak-4').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_5 !== null) {
                        $('#asuhan-keperawatannnnn-ak-5').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_6 !== null) {
                        $('#asuhan-keperawatannnnn-ak-6').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_7 !== null) {
                        $('#asuhan-keperawatannnnn-ak-7').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_8 !== null) {
                        $('#asuhan-keperawatannnnn-ak-8').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_9 !== null) {
                        $('#asuhan-keperawatannnnn-ak-9').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_10 !== null) {
                        $('#asuhan-keperawatannnnn-ak-10').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_11 !== null) {
                        $('#asuhan-keperawatannnnn-ak-11').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_12 !== null) {
                        $('#asuhan-keperawatannnnn-ak-12').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_13 !== null) {
                        $('#asuhan-keperawatannnnn-ak-13').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_14 !== null) {
                        $('#asuhan-keperawatannnnn-ak-14').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_15 !== null) {
                        $('#asuhan-keperawatannnnn-ak-15').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_16 !== null) {
                        $('#asuhan-keperawatannnnn-ak-16').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_17 !== null) {
                        $('#asuhan-keperawatannnnn-ak-17').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_17);
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_18 !== null) {
                        $('#asuhan-keperawatannnnn-ak-18').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_19 !== null) {
                        $('#asuhan-keperawatannnnn-ak-19').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_20 !== null) {
                        $('#asuhan-keperawatannnnn-ak-20').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_20);
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_21 !== null) {
                        $('#asuhan-keperawatannnnn-ak-21').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_22 !== null) {
                        $('#asuhan-keperawatannnnn-ak-22').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_23 !== null) {
                        $('#asuhan-keperawatannnnn-ak-23').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_23);
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_24 !== null) {
                        $('#asuhan-keperawatannnnn-ak-24').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_25 !== null) {
                        $('#asuhan-keperawatannnnn-ak-25').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_26 !== null) {
                        $('#asuhan-keperawatannnnn-ak-26').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_27 !== null) {
                        $('#asuhan-keperawatannnnn-ak-27').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_28 !== null) {
                        $('#asuhan-keperawatannnnn-ak-28').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_29 !== null) {
                        $('#asuhan-keperawatannnnn-ak-29').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_30 !== null) {
                        $('#asuhan-keperawatannnnn-ak-30').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_31 !== null) {
                        $('#asuhan-keperawatannnnn-ak-31').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_32 !== null) {
                        $('#asuhan-keperawatannnnn-ak-32').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_33 !== null) {
                        $('#asuhan-keperawatannnnn-ak-33').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_34 !== null) {
                        $('#asuhan-keperawatannnnn-ak-34').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_35 !== null) {
                        $('#asuhan-keperawatannnnn-ak-35').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_36 !== null) {
                        $('#asuhan-keperawatannnnn-ak-36').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_37 !== null) {
                        $('#asuhan-keperawatannnnn-ak-37').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_38 !== null) {
                        $('#asuhan-keperawatannnnn-ak-38').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_39 !== null) {
                        $('#asuhan-keperawatannnnn-ak-39').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_40 !== null) {
                        $('#asuhan-keperawatannnnn-ak-40').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_41 !== null) {
                        $('#asuhan-keperawatannnnn-ak-41').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_41);
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_42 !== null) {
                        $('#asuhan-keperawatannnnn-ak-42').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_43 !== null) {
                        $('#asuhan-keperawatannnnn-ak-43').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_43);
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_44 !== null) {
                        $('#asuhan-keperawatannnnn-ak-44').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_45 !== null) {
                        $('#asuhan-keperawatannnnn-ak-45').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_46 !== null) {
                        $('#asuhan-keperawatannnnn-ak-46').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_47 !== null) {
                        $('#asuhan-keperawatannnnn-ak-47').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_48 !== null) {
                        $('#asuhan-keperawatannnnn-ak-48').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_49 !== null) {
                        $('#asuhan-keperawatannnnn-ak-49').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_50 !== null) {
                        $('#asuhan-keperawatannnnn-ak-50').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_51 !== null) {
                        $('#asuhan-keperawatannnnn-ak-51').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_52 !== null) {
                        $('#asuhan-keperawatannnnn-ak-52').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_53 !== null) {
                        $('#asuhan-keperawatannnnn-ak-53').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_54 !== null) {
                        $('#asuhan-keperawatannnnn-ak-54').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_55 !== null) {
                        $('#asuhan-keperawatannnnn-ak-55').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_56 !== null) {
                        $('#asuhan-keperawatannnnn-ak-56').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_57 !== null) {
                        $('#asuhan-keperawatannnnn-ak-57').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_58 !== null) {
                        $('#asuhan-keperawatannnnn-ak-58').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_59 !== null) {
                        $('#asuhan-keperawatannnnn-ak-59').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_60 !== null) {
                        $('#asuhan-keperawatannnnn-ak-60').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_61 !== null) {
                        $('#asuhan-keperawatannnnn-ak-61').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_62 !== null) {
                        $('#asuhan-keperawatannnnn-ak-62').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_63 !== null) {
                        $('#asuhan-keperawatannnnn-ak-63').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_63);
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_64 !== null) {
                        $('#asuhan-keperawatannnnn-ak-64').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_65 !== null) {
                        $('#asuhan-keperawatannnnn-ak-65').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_66 !== null) {
                        $('#asuhan-keperawatannnnn-ak-66').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_67 !== null) {
                        $('#asuhan-keperawatannnnn-ak-67').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_68 !== null) {
                        $('#asuhan-keperawatannnnn-ak-68').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_68);
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_69 !== null) {
                        $('#asuhan-keperawatannnnn-ak-69').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_70 !== null) {
                        $('#asuhan-keperawatannnnn-ak-70').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_70);
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_71 !== null) {
                        $('#asuhan-keperawatannnnn-ak-71').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_72 !== null) {
                        $('#asuhan-keperawatannnnn-ak-72').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_73 !== null) {
                        $('#asuhan-keperawatannnnn-ak-73').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_74 !== null) {
                        $('#asuhan-keperawatannnnn-ak-74').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_75 !== null) {
                        $('#asuhan-keperawatannnnn-ak-75').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_76 !== null) {
                        $('#asuhan-keperawatannnnn-ak-76').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_77 !== null) {
                        $('#asuhan-keperawatannnnn-ak-77').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_78 !== null) {
                        $('#asuhan-keperawatannnnn-ak-78').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_79 !== null) {
                        $('#asuhan-keperawatannnnn-ak-79').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_80 !== null) {
                        $('#asuhan-keperawatannnnn-ak-80').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_81 !== null) {
                        $('#asuhan-keperawatannnnn-ak-81').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_82 !== null) {
                        $('#asuhan-keperawatannnnn-ak-82').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_82);
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_83 !== null) {
                        $('#asuhan-keperawatannnnn-ak-83').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_84 !== null) {
                        $('#asuhan-keperawatannnnn-ak-84').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_85 !== null) {
                        $('#asuhan-keperawatannnnn-ak-85').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_86 !== null) {
                        $('#asuhan-keperawatannnnn-ak-86').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_87 !== null) {
                        $('#asuhan-keperawatannnnn-ak-87').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_87);
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_88 !== null) {
                        $('#asuhan-keperawatannnnn-ak-88').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_89 !== null) {
                        $('#asuhan-keperawatannnnn-ak-89').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_89);
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_90 !== null) {
                        $('#asuhan-keperawatannnnn-ak-90').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_91 !== null) {
                        $('#asuhan-keperawatannnnn-ak-91').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_92 !== null) {
                        $('#asuhan-keperawatannnnn-ak-92').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_93 !== null) {
                        $('#asuhan-keperawatannnnn-ak-93').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_94 !== null) {
                        $('#asuhan-keperawatannnnn-ak-94').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_95 !== null) {
                        $('#asuhan-keperawatannnnn-ak-95').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_96 !== null) {
                        $('#asuhan-keperawatannnnn-ak-96').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_97 !== null) {
                        $('#asuhan-keperawatannnnn-ak-97').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_98 !== null) {
                        $('#asuhan-keperawatannnnn-ak-98').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_99 !== null) {
                        $('#asuhan-keperawatannnnn-ak-99').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_99);
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_100 !== null) {
                        $('#asuhan-keperawatannnnn-ak-100').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_101 !== null) {
                        $('#asuhan-keperawatannnnn-ak-101').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_101);
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_102 !== null) {
                        $('#asuhan-keperawatannnnn-ak-102').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_103 !== null) {
                        $('#asuhan-keperawatannnnn-ak-103').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_104 !== null) {
                        $('#asuhan-keperawatannnnn-ak-104').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_105 !== null) {
                        $('#asuhan-keperawatannnnn-ak-105').prop('checked', true)
                    }
                    if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_106 !== null) {
                        $('#asuhan-keperawatannnnn-ak-106').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_106);
                    }

                    $('#perawwat-ruangan-prr').val(data.catatan_keperawatan_perioperatif.perawwat_ruangan_prr);
                    $('#s2id_perawwat-ruangan-prr a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_9);
                    $('#perawwat-anastesi-paa').val(data.catatan_keperawatan_perioperatif.perawwat_anastesi_paa);
                    $('#s2id_perawwat-anastesi-paa a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_10);
                    $('#perawwat-kamar-bedahh').val(data.catatan_keperawatan_perioperatif.perawwat_kamar_bedahh);
                    $('#s2id_perawwat-kamar-bedahh a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_11);
                    // ASUHAN KEPERAWATAN 2 AKHIR

                    // CATATAN KEPERAWATAN SESUDAH OPERASI AWAL  
                    const catatan_keperawatan_sesudah_operasi = JSON.parse(data.catatan_keperawatan_perioperatif.catatan_keperawatan_sesudah_operasi);
                    if (catatan_keperawatan_sesudah_operasi.catatan_keperawatan_sesudah_operasi_1 !== null) {
                        $('#catatan-keperawatan-sesudah-operasi-1').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_operasi.catatan_keperawatan_sesudah_operasi_2 !== null) {
                        $('#catatan-keperawatan-sesudah-operasi-2').val(catatan_keperawatan_sesudah_operasi.catatan_keperawatan_sesudah_operasi_2);
                    }
                    if (catatan_keperawatan_sesudah_operasi.catatan_keperawatan_sesudah_operasi_3 !== null) {
                        $('#catatan-keperawatan-sesudah-operasi-3').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_operasi.catatan_keperawatan_sesudah_operasi_4 !== null) {
                        $('#catatan-keperawatan-sesudah-operasi-4').val(catatan_keperawatan_sesudah_operasi.catatan_keperawatan_sesudah_operasi_4);
                    }
                    if (catatan_keperawatan_sesudah_operasi.catatan_keperawatan_sesudah_operasi_5 !== null) {
                        $('#catatan-keperawatan-sesudah-operasi-5').val(catatan_keperawatan_sesudah_operasi.catatan_keperawatan_sesudah_operasi_5);
                    }


                    const catatan_keperawatan_sesudah_op = JSON.parse(data.catatan_keperawatan_perioperatif.catatan_keperawatan_sesudah_op);
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_1 !== null) {
                        $('#catatan-keperawatan-sesudah-op-1').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_2 !== null) {
                        $('#catatan-keperawatan-sesudah-op-2').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_3 !== null) {
                        $('#catatan-keperawatan-sesudah-op-3').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_4 !== null) {
                        $('#catatan-keperawatan-sesudah-op-4').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_5 !== null) {
                        $('#catatan-keperawatan-sesudah-op-5').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_6 !== null) {
                        $('#catatan-keperawatan-sesudah-op-6').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_7 !== null) {
                        $('#catatan-keperawatan-sesudah-op-7').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_8 !== null) {
                        $('#catatan-keperawatan-sesudah-op-8').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_9 !== null) {
                        $('#catatan-keperawatan-sesudah-op-9').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_10 !== null) {
                        $('#catatan-keperawatan-sesudah-op-10').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_11 !== null) {
                        $('#catatan-keperawatan-sesudah-op-11').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_11);
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_12 !== null) {
                        $('#catatan-keperawatan-sesudah-op-12').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_13 !== null) {
                        $('#catatan-keperawatan-sesudah-op-13').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_13);
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_14 !== null) {
                        $('#catatan-keperawatan-sesudah-op-14').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_15 !== null) {
                        $('#catatan-keperawatan-sesudah-op-15').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_16 !== null) {
                        $('#catatan-keperawatan-sesudah-op-16').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_17 !== null) {
                        $('#catatan-keperawatan-sesudah-op-17').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_18 !== null) {
                        $('#catatan-keperawatan-sesudah-op-18').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_18);
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_19 !== null) {
                        $('#catatan-keperawatan-sesudah-op-19').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_20 !== null) {
                        $('#catatan-keperawatan-sesudah-op-20').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_21 !== null) {
                        $('#catatan-keperawatan-sesudah-op-21').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_22 !== null) {
                        $('#catatan-keperawatan-sesudah-op-22').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_23 !== null) {
                        $('#catatan-keperawatan-sesudah-op-23').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_24 !== null) {
                        $('#catatan-keperawatan-sesudah-op-24').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_25 !== null) {
                        $('#catatan-keperawatan-sesudah-op-25').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_26 !== null) {
                        $('#catatan-keperawatan-sesudah-op-26').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_27 !== null) {
                        $('#catatan-keperawatan-sesudah-op-27').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_27);
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_28 !== null) {
                        $('#catatan-keperawatan-sesudah-op-28').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_29 !== null) {
                        $('#catatan-keperawatan-sesudah-op-29').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_30 !== null) {
                        $('#catatan-keperawatan-sesudah-op-30').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_31 !== null) {
                        $('#catatan-keperawatan-sesudah-op-31').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_32 !== null) {
                        $('#catatan-keperawatan-sesudah-op-32').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_33 !== null) {
                        $('#catatan-keperawatan-sesudah-op-33').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_34 !== null) {
                        $('#catatan-keperawatan-sesudah-op-34').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_35 !== null) {
                        $('#catatan-keperawatan-sesudah-op-35').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_36 !== null) {
                        $('#catatan-keperawatan-sesudah-op-36').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_36);
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_37 !== null) {
                        $('#catatan-keperawatan-sesudah-op-37').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_38 !== null) {
                        $('#catatan-keperawatan-sesudah-op-38').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_39 !== null) {
                        $('#catatan-keperawatan-sesudah-op-39').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_40 === '1') {
                        $('#catatan-keperawatan-sesudah-op-40').prop('checked', true).change
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_40 === '2') {
                        $('#catatan-keperawatan-sesudah-op-41').prop('checked', true).change
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_42 !== null) {
                        $('#catatan-keperawatan-sesudah-op-42').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_43 !== null) {
                        $('#catatan-keperawatan-sesudah-op-43').prop('checked', true)
                    }
                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_44 !== null) {
                        $('#catatan-keperawatan-sesudah-op-44').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_44);
                    }
                    // CATATAN KEPERAWATAN SESUDAH OPERASI AKHIR    

                    // CEKLIS PERSIAPAN OPERASI AWAL
                    const ceklis_persiapan_operasi = JSON.parse(data.catatan_keperawatan_perioperatif.ceklis_persiapan_operasi);
                    if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_1 !== null) {
                        $('#ceklis-persiapan-operasi-1').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_2 !== null) {
                        $('#ceklis-persiapan-operasi-2').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_3 !== null) {
                        $('#ceklis-persiapan-operasi-3').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_4 !== null) {
                        $('#ceklis-persiapan-operasi-4').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_5 !== null) {
                        $('#ceklis-persiapan-operasi-5').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_6 !== null) {
                        $('#ceklis-persiapan-operasi-6').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_7 !== null) {
                        $('#ceklis-persiapan-operasi-7').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_8 !== null) {
                        $('#ceklis-persiapan-operasi-8').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_9 !== null) {
                        $('#ceklis-persiapan-operasi-9').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_10 !== null) {
                        $('#ceklis-persiapan-operasi-10').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_11 !== null) {
                        $('#ceklis-persiapan-operasi-11').val(ceklis_persiapan_operasi.ceklis_persiapan_operasi_11);
                    }
                    if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_12 !== null) {
                        $('#ceklis-persiapan-operasi-12').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_13 !== null) {
                        $('#ceklis-persiapan-operasi-13').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_14 !== null) {
                        $('#ceklis-persiapan-operasi-14').val(ceklis_persiapan_operasi.ceklis_persiapan_operasi_14);
                    }
                    if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_15 !== null) {
                        $('#ceklis-persiapan-operasi-15').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_16 !== null) {
                        $('#ceklis-persiapan-operasi-16').prop('checked', true)
                    }

                    const ceklis_persiapan_operasii = JSON.parse(data.catatan_keperawatan_perioperatif.ceklis_persiapan_operasii);
                    if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_1 !== null) {
                        $('#ceklis-persiapan-operasii-1').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_2 !== null) {
                        $('#ceklis-persiapan-operasii-2').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_3 !== null) {
                        $('#ceklis-persiapan-operasii-3').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_4 !== null) {
                        $('#ceklis-persiapan-operasii-4').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_5 !== null) {
                        $('#ceklis-persiapan-operasii-5').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_6 !== null) {
                        $('#ceklis-persiapan-operasii-6').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_7 !== null) {
                        $('#ceklis-persiapan-operasii-7').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_8 !== null) {
                        $('#ceklis-persiapan-operasii-8').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_9 !== null) {
                        $('#ceklis-persiapan-operasii-9').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_10 !== null) {
                        $('#ceklis-persiapan-operasii-10').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_11 !== null) {
                        $('#ceklis-persiapan-operasii-11').val(ceklis_persiapan_operasii.ceklis_persiapan_operasii_11);
                    }
                    if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_12 !== null) {
                        $('#ceklis-persiapan-operasii-12').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_13 !== null) {
                        $('#ceklis-persiapan-operasii-13').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_14 !== null) {
                        $('#ceklis-persiapan-operasii-14').val(ceklis_persiapan_operasii.ceklis_persiapan_operasii_14);
                    }
                    if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_15 !== null) {
                        $('#ceklis-persiapan-operasii-15').prop('checked', true)
                    }
                    if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_16 !== null) {
                        $('#ceklis-persiapan-operasii-16').prop('checked', true)
                    }

                    const ceklis_persiapan_operasiii = JSON.parse(data.catatan_keperawatan_perioperatif.ceklis_persiapan_operasiii);
                    if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_1 !== null) {
                        $('#ceklis-persiapan-operasiii-1').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_1);
                    }
                    if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_2 !== null) {
                        $('#ceklis-persiapan-operasiii-2').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_2);
                    }
                    if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_3 !== null) {
                        $('#ceklis-persiapan-operasiii-3').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_3);
                    }
                    if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_4 !== null) {
                        $('#ceklis-persiapan-operasiii-4').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_4);
                    }
                    if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_5 !== null) {
                        $('#ceklis-persiapan-operasiii-5').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_5);
                    }
                    if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_6 !== null) {
                        $('#ceklis-persiapan-operasiii-6').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_6);
                    }
                    if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_7 !== null) {
                        $('#ceklis-persiapan-operasiii-7').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_7);
                    }
                    if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_8 !== null) {
                        $('#ceklis-persiapan-operasiii-8').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_8);
                    }
                    if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_9 !== null) {
                        $('#ceklis-persiapan-operasiii-9').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_9);
                    }



                    // MASIH DIKOSONGKAN BINGUNG CARANYA KEK GIMANA TD BP
                    // MASIH DIKOSONGKAN BINGUNG CARANYA KEK GIMANA
                    // MASIH DIKOSONGKAN BINGUNG CARANYA KEK GIMANA


                    $('#keterangan-cpo').val(data.catatan_keperawatan_perioperatif.keterangan_cpo);

                    const jam_cpo = JSON.parse(data.catatan_keperawatan_perioperatif.jam_cpo);
                    if (jam_cpo.jam_cpo_1 !== null) {
                        $('#jam-cpo-1').val(jam_cpo.jam_cpo_1);
                    }
                    if (jam_cpo.jam_cpo_2 !== null) {
                        $('#jam-cpo-2').val(jam_cpo.jam_cpo_2);
                    }

                    $('#perawat-cpo').val(data.catatan_keperawatan_perioperatif.perawat_cpo);
                    $('#s2id_perawat-cpo a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_12);
                    $('#barang-cpo').val(data.catatan_keperawatan_perioperatif.barang_cpo);

                    $('#perawatt-cpo').val(data.catatan_keperawatan_perioperatif.perawatt_cpo);
                    $('#s2id_perawatt-cpo a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_13);
                    $('#jam-tanggal-cpo').val((data.catatan_keperawatan_perioperatif.jam_tanggal_cpo !== null ? datetimefmysql(data.catatan_keperawatan_perioperatif.jam_tanggal_cpo) : ''));
                    // CEKLIS PERSIAPAN OPERASI AWAL  

                    //   ASUHAN KEPERAWATAN 3 AWAL
                    const asssuhan_keperawatan_ak_3 = JSON.parse(data.catatan_keperawatan_perioperatif.asssuhan_keperawatan_ak_3);
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_1 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-1').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_2 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-2').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_3 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-3').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_4 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-4').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_5 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-5').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_6 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-6').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_7 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-7').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_8 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-8').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_9 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-9').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_10 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-10').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_11 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-11').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_12 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-12').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_13 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-13').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_14 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-14').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_15 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-15').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_16 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-16').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_17 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-17').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_17);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_18 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-18').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_19 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-19').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_20 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-20').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_20);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_21 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-21').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_22 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-22').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_23 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-23').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_23);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_24 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-24').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_25 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-25').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_26 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-26').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_27 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-27').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_28 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-28').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_29 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-29').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_30 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-30').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_31 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-31').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_32 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-32').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_33 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-33').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_34 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-34').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_35 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-35').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_36 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-36').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_37 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-37').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_38 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-38').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_39 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-39').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_40 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-40').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_41 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-41').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_41);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_42 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-42').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_43 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-43').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_44 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-44').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_44);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_45 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-45').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_46 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-46').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_47 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-47').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_47);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_48 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-48').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_49 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-49').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_50 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-50').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_51 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-51').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_52 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-52').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_53 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-53').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_53);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_54 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-54').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_55 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-55').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_56 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-56').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_57 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-57').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_58 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-58').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_59 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-59').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_60 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-60').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_61 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-61').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_62 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-62').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_62);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_63 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-63').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_64 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-64').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_65 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-65').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_65);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_66 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-66').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_67 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-67').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_68 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-68').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_68);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_69 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-69').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_70 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-70').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_71 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-71').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_72 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-72').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_73 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-73').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_74 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-74').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_75 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-75').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_76 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-76').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_77 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-77').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_77);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_78 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-78').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_79 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-79').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_80 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-80').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_80);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_81 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-81').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_82 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-82').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_83 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-83').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_84 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-84').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_85 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-85').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_86 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-86').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_86);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_87 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-87').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_88 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-88').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_89 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-89').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_90 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-90').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_91 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-91').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_92 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-92').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_92);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_93 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-93').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_94 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-94').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_95 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-95').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_96 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-96').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_97 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-97').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_98 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-98').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_98);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_99 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-99').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_100 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-100').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_101 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-101').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_102 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-102').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_103 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-103').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_103);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_104 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-104').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_105 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-105').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_105);
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_106 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-106').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_107 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-107').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_108 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-108').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_109 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-109').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_110 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-110').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_111 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-111').prop('checked', true)
                    }
                    if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_112 !== null) {
                        $('#asssuhan-keperawatannnnn-ak-112').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_112);
                    }

                    $('#perawwat-ruangan-prrr').val(data.catatan_keperawatan_perioperatif.perawwat_ruangan_prrr);
                    $('#s2id_perawwat-ruangan-prrr a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_14);

                    $('#perawwat-anastesi-paaa').val(data.catatan_keperawatan_perioperatif.perawwat_anastesi_paaa);
                    $('#s2id_perawwat-anastesi-paaa a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_15);

                    $('#perawwat-kamar-bedahhh').val(data.catatan_keperawatan_perioperatif.perawwat_kamar_bedahhh);
                    $('#s2id_perawwat-kamar-bedahhh a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_16);
                    //   ASUHAN KEPERAWATAN 3 AKHIR

                }
                // CKP AKHIR

                // ASESSMENT ANESTESI/SEDASI KAMAR OPERASI AWAL
                let assesmen_awal_anestesi_sedassi = data.assesmen_awal_anestesi_sedassi;

                if (assesmen_awal_anestesi_sedassi !== null) {
                    $('#id-aaas').val(assesmen_awal_anestesi_sedassi.id);
                    $('#aaas-diagnosis').val(data.assesmen_awal_anestesi_sedassi.aaas_diagnosis);
                    $('#aaas-rot').val(data.assesmen_awal_anestesi_sedassi.aaas_rot);

                    $('#aaas-perawat').val(data.assesmen_awal_anestesi_sedassi.aaas_perawat);
                    $('#s2id_aaas-perawat a .select2c-chosen').html(data.assesmen_awal_anestesi_sedassi.nama_perawat_1);

                    const aaas_anamnesa = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_anamnesa);
                    if (aaas_anamnesa.aaas_anamnesa === 'Pasien') {
                        $('#aaas-anamnesa-1').prop('checked', true).change()
                    }
                    if (aaas_anamnesa.aaas_anamnesa === 'Keluarga') {
                        $('#aaas-anamnesa-2').prop('checked', true).change()
                    }
                    if (aaas_anamnesa.aaas_anamnesa === 'Lainnya') {
                        $('#aaas-anamnesa-3').prop('checked', true).change()
                    }
                    if (aaas_anamnesa.aaas_anamnesa_4 !== null) {
                        $('#aaas-anamnesa-4').val(aaas_anamnesa.aaas_anamnesa_4);
                    }

                    const aaas_riwayat_anestesi = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_riwayat_anestesi);
                    if (aaas_riwayat_anestesi.aaas_riwayat_anestesi === 'Normal') {
                        $('#aaas-riwayat-anestesi-1').prop('checked', true).change()
                    }
                    if (aaas_riwayat_anestesi.aaas_riwayat_anestesi === 'Kering') {
                        $('#aaas-riwayat-anestesi-2').prop('checked', true).change()
                    }
                    if (aaas_riwayat_anestesi.aaas_riwayat_anestesi === 'Ada cairan dari luka') {
                        $('#aaas-riwayat-anestesi-3').prop('checked', true).change()
                    }
                    if (aaas_riwayat_anestesi.aaas_riwayat_anestesi_4 !== null) {
                        $('#aaas-riwayat-anestesi-4').val(aaas_riwayat_anestesi.aaas_riwayat_anestesi_4);
                    }

                    const aaas_komplikasi = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_komplikasi);
                    if (aaas_komplikasi.aaas_komplikasi === 'Normal') {
                        $('#aaas-komplikasi-1').prop('checked', true).change()
                    }
                    if (aaas_komplikasi.aaas_komplikasi === 'Kering') {
                        $('#aaas-komplikasi-2').prop('checked', true).change()
                    }
                    if (aaas_komplikasi.aaas_komplikasi === 'Ada cairan dari luka') {
                        $('#aaas-komplikasi-3').prop('checked', true).change()
                    }
                    if (aaas_komplikasi.aaas_komplikasi_4 !== null) {
                        $('#aaas-komplikasi-4').val(aaas_komplikasi.aaas_komplikasi_4);
                    }

                    $('#aaas-konsumsi-obat').val(data.assesmen_awal_anestesi_sedassi.aaas_konsumsi_obat);

                    const aaas_riwayat_alergi = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_riwayat_alergi);
                    if (aaas_riwayat_alergi.aaas_riwayat_alergi === 'Normal') {
                        $('#aaas-riwayat-alergi-1').prop('checked', true).change()
                    }
                    if (aaas_riwayat_alergi.aaas_riwayat_alergi === 'Kering') {
                        $('#aaas-riwayat-alergi-2').prop('checked', true).change()
                    }
                    if (aaas_riwayat_alergi.aaas_riwayat_alergi === 'Ada cairan dari luka') {
                        $('#aaas-riwayat-alergi-3').prop('checked', true).change()
                    }
                    if (aaas_riwayat_alergi.aaas_riwayat_alergi_4 !== null) {
                        $('#aaas-riwayat-alergi-4').val(aaas_riwayat_alergi.aaas_riwayat_alergi_4);
                    }

                    $('#aaas-tanda').val(data.assesmen_awal_anestesi_sedassi.aaas_tanda);

                    const aaas_berat = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_berat);
                    if (aaas_berat.aaas_berat_1 !== null) {
                        $('#aaas-berat-1').val(aaas_berat.aaas_berat_1);
                    }
                    if (aaas_berat.aaas_berat_2 !== null) {
                        $('#aaas-berat-2').val(aaas_berat.aaas_berat_2);
                    }
                    if (aaas_berat.aaas_berat_3 !== null) {
                        $('#aaas-berat-3').val(aaas_berat.aaas_berat_3);
                    }
                    if (aaas_berat.aaas_berat_4 !== null) {
                        $('#aaas-berat-4').val(aaas_berat.aaas_berat_4);
                    }
                    if (aaas_berat.aaas_berat_5 !== null) {
                        $('#aaas-berat-5').val(aaas_berat.aaas_berat_5);
                    }
                    if (aaas_berat.aaas_berat_6 !== null) {
                        $('#aaas-berat-6').val(aaas_berat.aaas_berat_6);
                    }

                    const aaas_skor_nyeri = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_skor_nyeri);
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '1') {
                        $('#aaas-skor-nyeri-1').prop('checked', true).change()
                    }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '2') {
                        $('#aaas-skor-nyeri-2').prop('checked', true).change()
                    }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '3') {
                        $('#aaas-skor-nyeri-3').prop('checked', true).change()
                    }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '4') {
                        $('#aaas-skor-nyeri-4').prop('checked', true).change()
                    }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '5') {
                        $('#aaas-skor-nyeri-5').prop('checked', true).change()
                    }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '6') {
                        $('#aaas-skor-nyeri-6').prop('checked', true).change()
                    }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '7') {
                        $('#aaas-skor-nyeri-7').prop('checked', true).change()
                    }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '8') {
                        $('#aaas-skor-nyeri-8').prop('checked', true).change()
                    }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '9') {
                        $('#aaas-skor-nyeri-9').prop('checked', true).change()
                    }
                    if (aaas_skor_nyeri.aaas_skor_nyeri === '10') {
                        $('#aaas-skor-nyeri-10').prop('checked', true).change()
                    }

                    const aaas_evaluasi = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_evaluasi);
                    if (aaas_evaluasi.aaas_evaluasi_1 === '0') {
                        $('#aaas-evaluasi-1').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_1 === '1') {
                        $('#aaas-evaluasi-2').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_3 === '0') {
                        $('#aaas-evaluasi-3').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_3 === '1') {
                        $('#aaas-evaluasi-4').prop('checked', true).change()
                    }

                    if (aaas_evaluasi.aaas_evaluasi_5 === '0') {
                        $('#aaas-evaluasi-5').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_5 === '1') {
                        $('#aaas-evaluasi-6').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_7 !== null) {
                        $('#aaas-evaluasi-7').val(aaas_evaluasi.aaas_evaluasi_7);
                    }

                    if (aaas_evaluasi.aaas_evaluasi_8 === '0') {
                        $('#aaas-evaluasi-8').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_8 === '1') {
                        $('#aaas-evaluasi-9').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_10 !== null) {
                        $('#aaas-evaluasi-10').val(aaas_evaluasi.aaas_evaluasi_10);
                    }

                    if (aaas_evaluasi.aaas_evaluasi_11 === '0') {
                        $('#aaas-evaluasi-11').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_11 === '1') {
                        $('#aaas-evaluasi-12').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_13 !== null) {
                        $('#aaas-evaluasi-13').val(aaas_evaluasi.aaas_evaluasi_13);
                    }

                    if (aaas_evaluasi.aaas_evaluasi_14 === '0') {
                        $('#aaas-evaluasi-14').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_14 === '1') {
                        $('#aaas-evaluasi-15').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_16 === '0') {
                        $('#aaas-evaluasi-16').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_16 === '1') {
                        $('#aaas-evaluasi-17').prop('checked', true).change()
                    }

                    if (aaas_evaluasi.aaas_evaluasi_18 === '1') {
                        $('#aaas-evaluasi-18').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_18 === '2') {
                        $('#aaas-evaluasi-19').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_18 === '3') {
                        $('#aaas-evaluasi-20').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_18 === '4') {
                        $('#aaas-evaluasi-21').prop('checked', true).change()
                    }

                    if (aaas_evaluasi.aaas_evaluasi_22 === '0') {
                        $('#aaas-evaluasi-22').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_22 === '1') {
                        $('#aaas-evaluasi-23').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_24 === '0') {
                        $('#aaas-evaluasi-24').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_24 === '1') {
                        $('#aaas-evaluasi-25').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_26 === '0') {
                        $('#aaas-evaluasi-26').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_26 === '1') {
                        $('#aaas-evaluasi-27').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_28 === '0') {
                        $('#aaas-evaluasi-28').prop('checked', true).change()
                    }
                    if (aaas_evaluasi.aaas_evaluasi_28 === '1') {
                        $('#aaas-evaluasi-29').prop('checked', true).change()
                    }

                    const aaas_pernafasan = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_pernafasan);
                    if (aaas_pernafasan.aaas_pernafasan_1 !== null) {
                        $('#aaas-pernafasan-1').prop('checked', true).change()
                    }
                    if (aaas_pernafasan.aaas_pernafasan_2 !== null) {
                        $('#aaas-pernafasan-2').prop('checked', true).change()
                    }
                    if (aaas_pernafasan.aaas_pernafasan_3 !== null) {
                        $('#aaas-pernafasan-3').prop('checked', true).change()
                    }
                    if (aaas_pernafasan.aaas_pernafasan_4 !== null) {
                        $('#aaas-pernafasan-4').prop('checked', true).change()
                    }
                    if (aaas_pernafasan.aaas_pernafasan_5 !== null) {
                        $('#aaas-pernafasan-5').prop('checked', true).change()
                    }
                    if (aaas_pernafasan.aaas_pernafasan_6 !== null) {
                        $('#aaas-pernafasan-6').prop('checked', true).change()
                    }
                    if (aaas_pernafasan.aaas_pernafasan_7 !== null) {
                        $('#aaas-pernafasan-7').prop('checked', true).change()
                    }
                    if (aaas_pernafasan.aaas_pernafasan_8 !== null) {
                        $('#aaas-pernafasan-8').prop('checked', true).change()
                    }
                    if (aaas_pernafasan.aaas_pernafasan_9 !== null) {
                        $('#aaas-pernafasan-9').prop('checked', true).change()
                    }
                    if (aaas_pernafasan.aaas_pernafasan_10 !== null) {
                        $('#aaas-pernafasan-10').prop('checked', true).change()
                    }

                    const aaas_kardiovaskular = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_kardiovaskular);
                    if (aaas_kardiovaskular.aaas_kardiovaskular_1 !== null) {
                        $('#aaas-kardiovaskular-1').prop('checked', true).change()
                    }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_2 !== null) {
                        $('#aaas-kardiovaskular-2').prop('checked', true).change()
                    }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_3 !== null) {
                        $('#aaas-kardiovaskular-3').prop('checked', true).change()
                    }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_4 !== null) {
                        $('#aaas-kardiovaskular-4').prop('checked', true).change()
                    }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_5 !== null) {
                        $('#aaas-kardiovaskular-5').prop('checked', true).change()
                    }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_6 !== null) {
                        $('#aaas-kardiovaskular-6').prop('checked', true).change()
                    }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_7 !== null) {
                        $('#aaas-kardiovaskular-7').prop('checked', true).change()
                    }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_8 !== null) {
                        $('#aaas-kardiovaskular-8').prop('checked', true).change()
                    }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_9 !== null) {
                        $('#aaas-kardiovaskular-9').prop('checked', true).change()
                    }
                    if (aaas_kardiovaskular.aaas_kardiovaskular_10 !== null) {
                        $('#aaas-kardiovaskular-10').prop('checked', true).change()
                    }

                    const aaas_neuro = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_neuro);
                    if (aaas_neuro.aaas_neuro_1 !== null) {
                        $('#aaas-neuro-1').prop('checked', true).change()
                    }
                    if (aaas_neuro.aaas_neuro_2 !== null) {
                        $('#aaas-neuro-2').prop('checked', true).change()
                    }
                    if (aaas_neuro.aaas_neuro_3 !== null) {
                        $('#aaas-neuro-3').prop('checked', true).change()
                    }
                    if (aaas_neuro.aaas_neuro_4 !== null) {
                        $('#aaas-neuro-4').prop('checked', true).change()
                    }
                    if (aaas_neuro.aaas_neuro_5 !== null) {
                        $('#aaas-neuro-5').prop('checked', true).change()
                    }
                    if (aaas_neuro.aaas_neuro_6 !== null) {
                        $('#aaas-neuro-6').prop('checked', true).change()
                    }
                    if (aaas_neuro.aaas_neuro_7 !== null) {
                        $('#aaas-neuro-7').prop('checked', true).change()
                    }
                    if (aaas_neuro.aaas_neuro_8 !== null) {
                        $('#aaas-neuro-8').prop('checked', true).change()
                    }

                    const aaas_renal = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_renal);
                    if (aaas_renal.aaas_renal_1 !== null) {
                        $('#aaas-renal-1').prop('checked', true).change()
                    }
                    if (aaas_renal.aaas_renal_2 !== null) {
                        $('#aaas-renal-2').prop('checked', true).change()
                    }
                    if (aaas_renal.aaas_renal_3 !== null) {
                        $('#aaas-renal-3').prop('checked', true).change()
                    }
                    if (aaas_renal.aaas_renal_4 !== null) {
                        $('#aaas-renal-4').prop('checked', true).change()
                    }

                    const aaas_hepato = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_hepato);
                    if (aaas_hepato.aaas_hepato_1 !== null) {
                        $('#aaas-hepato-1').prop('checked', true).change()
                    }
                    if (aaas_hepato.aaas_hepato_2 !== null) {
                        $('#aaas-hepato-2').prop('checked', true).change()
                    }
                    if (aaas_hepato.aaas_hepato_3 !== null) {
                        $('#aaas-hepato-3').prop('checked', true).change()
                    }
                    if (aaas_hepato.aaas_hepato_4 !== null) {
                        $('#aaas-hepato-4').prop('checked', true).change()
                    }
                    if (aaas_hepato.aaas_hepato_5 !== null) {
                        $('#aaas-hepato-5').prop('checked', true).change()
                    }
                    if (aaas_hepato.aaas_hepato_6 !== null) {
                        $('#aaas-hepato-6').prop('checked', true).change()
                    }

                    const aaas_lain = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_lain);
                    if (aaas_lain.aaas_lain_1 !== null) {
                        $('#aaas-lain-1').prop('checked', true).change()
                    }
                    if (aaas_lain.aaas_lain_2 !== null) {
                        $('#aaas-lain-2').prop('checked', true).change()
                    }
                    if (aaas_lain.aaas_lain_3 !== null) {
                        $('#aaas-lain-3').prop('checked', true).change()
                    }
                    if (aaas_lain.aaas_lain_4 !== null) {
                        $('#aaas-lain-4').prop('checked', true).change()
                    }
                    if (aaas_lain.aaas_lain_5 !== null) {
                        $('#aaas-lain-5').prop('checked', true).change()
                    }
                    if (aaas_lain.aaas_lain_6 !== null) {
                        $('#aaas-lain-6').prop('checked', true).change()
                    }
                    if (aaas_lain.aaas_lain_7 !== null) {
                        $('#aaas-lain-7').prop('checked', true).change()
                    }
                    if (aaas_lain.aaas_lain_8 !== null) {
                        $('#aaas-lain-8').prop('checked', true).change()
                    }
                    if (aaas_lain.aaas_lain_9 !== null) {
                        $('#aaas-lain-9').prop('checked', true).change()
                    }
                    if (aaas_lain.aaas_lain_10 !== null) {
                        $('#aaas-lain-10').prop('checked', true).change()
                    }
                    if (aaas_lain.aaas_lain_11 !== null) {
                        $('#aaas-lain-11').prop('checked', true).change()
                    }

                    const aaas_hematologi = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_hematologi);
                    if (aaas_hematologi.aaas_hematologi_1 !== null) {
                        $('#aaas-hematologi-1').val(aaas_hematologi.aaas_hematologi_1);
                    }
                    if (aaas_hematologi.aaas_hematologi_2 !== null) {
                        $('#aaas-hematologi-2').val(aaas_hematologi.aaas_hematologi_2);
                    }
                    if (aaas_hematologi.aaas_hematologi_3 !== null) {
                        $('#aaas-hematologi-3').val(aaas_hematologi.aaas_hematologi_3);
                    }
                    if (aaas_hematologi.aaas_hematologi_4 !== null) {
                        $('#aaas-hematologi-4').val(aaas_hematologi.aaas_hematologi_4);
                    }
                    if (aaas_hematologi.aaas_hematologi_5 !== null) {
                        $('#aaas-hematologi-5').val(aaas_hematologi.aaas_hematologi_5);
                    }
                    if (aaas_hematologi.aaas_hematologi_6 !== null) {
                        $('#aaas-hematologi-6').val(aaas_hematologi.aaas_hematologi_6);
                    }

                    const aaas_serum = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_serum);
                    if (aaas_serum.aaas_serum_1 !== null) {
                        $('#aaas-serum-1').val(aaas_serum.aaas_serum_1);
                    }
                    if (aaas_serum.aaas_serum_2 !== null) {
                        $('#aaas-serum-2').val(aaas_serum.aaas_serum_2);
                    }
                    if (aaas_serum.aaas_serum_3 !== null) {
                        $('#aaas-serum-3').val(aaas_serum.aaas_serum_3);
                    }
                    if (aaas_serum.aaas_serum_4 !== null) {
                        $('#aaas-serum-4').val(aaas_serum.aaas_serum_4);
                    }

                    const aaas_fungsi = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_fungsi);
                    if (aaas_fungsi.aaas_fungsi_1 !== null) {
                        $('#aaas-fungsi-1').val(aaas_fungsi.aaas_fungsi_1);
                    }
                    if (aaas_fungsi.aaas_fungsi_2 !== null) {
                        $('#aaas-fungsi-2').val(aaas_fungsi.aaas_fungsi_2);
                    }
                    if (aaas_fungsi.aaas_fungsi_3 !== null) {
                        $('#aaas-fungsi-3').val(aaas_fungsi.aaas_fungsi_3);
                    }
                    if (aaas_fungsi.aaas_fungsi_4 !== null) {
                        $('#aaas-fungsi-4').val(aaas_fungsi.aaas_fungsi_4);
                    }
                    if (aaas_fungsi.aaas_fungsi_5 !== null) {
                        $('#aaas-fungsi-5').val(aaas_fungsi.aaas_fungsi_5);
                    }
                    if (aaas_fungsi.aaas_fungsi_6 !== null) {
                        $('#aaas-fungsi-6').val(aaas_fungsi.aaas_fungsi_6);
                    }
                    if (aaas_fungsi.aaas_fungsi_7 !== null) {
                        $('#aaas-fungsi-7').val(aaas_fungsi.aaas_fungsi_7);
                    }
                    if (aaas_fungsi.aaas_fungsi_8 !== null) {
                        $('#aaas-fungsi-8').val(aaas_fungsi.aaas_fungsi_8);
                    }


                    const aaas_ginjal = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_ginjal);
                    if (aaas_ginjal.aaas_ginjal_1 !== null) {
                        $('#aaas-ginjal-1').val(aaas_ginjal.aaas_ginjal_1);
                    }
                    if (aaas_ginjal.aaas_ginjal_2 !== null) {
                        $('#aaas-ginjal-2').val(aaas_ginjal.aaas_ginjal_2);
                    }

                    const aaas_edokorin = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_edokorin);
                    if (aaas_edokorin.aaas_edokorin_1 !== null) {
                        $('#aaas-edokorin-1').val(aaas_edokorin.aaas_edokorin_1);
                    }
                    if (aaas_edokorin.aaas_edokorin_2 !== null) {
                        $('#aaas-edokorin-2').val(aaas_edokorin.aaas_edokorin_2);
                    }
                    if (aaas_edokorin.aaas_edokorin_3 !== null) {
                        $('#aaas-edokorin-3').val(aaas_edokorin.aaas_edokorin_3);
                    }
                    if (aaas_edokorin.aaas_edokorin_4 !== null) {
                        $('#aaas-edokorin-4').val(aaas_edokorin.aaas_edokorin_4);
                    }
                    if (aaas_edokorin.aaas_edokorin_5 !== null) {
                        $('#aaas-edokorin-5').val(aaas_edokorin.aaas_edokorin_5);
                    }
                    if (aaas_edokorin.aaas_edokorin_6 !== null) {
                        $('#aaas-edokorin-6').val(aaas_edokorin.aaas_edokorin_6);
                    }

                    const aaas_agd = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_agd);
                    if (aaas_agd.aaas_agd_1 !== null) {
                        $('#aaas-agd-1').val(aaas_agd.aaas_agd_1);
                    }
                    if (aaas_agd.aaas_agd_2 !== null) {
                        $('#aaas-agd-2').val(aaas_agd.aaas_agd_2);
                    }
                    if (aaas_agd.aaas_agd_3 !== null) {
                        $('#aaas-agd-3').val(aaas_agd.aaas_agd_3);
                    }
                    if (aaas_agd.aaas_agd_4 !== null) {
                        $('#aaas-agd-4').val(aaas_agd.aaas_agd_4);
                    }
                    if (aaas_agd.aaas_agd_5 !== null) {
                        $('#aaas-agd-5').val(aaas_agd.aaas_agd_5);
                    }

                    const aaas_pemeriksaan = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_pemeriksaan);
                    if (aaas_pemeriksaan.aaas_pemeriksaan_1 !== null) {
                        $('#aaas-pemeriksaan-1').val(aaas_pemeriksaan.aaas_pemeriksaan_1);
                    }
                    if (aaas_pemeriksaan.aaas_pemeriksaan_2 !== null) {
                        $('#aaas-pemeriksaan-2').val(aaas_pemeriksaan.aaas_pemeriksaan_2);
                    }
                    if (aaas_pemeriksaan.aaas_pemeriksaan_3 !== null) {
                        $('#aaas-pemeriksaan-3').val(aaas_pemeriksaan.aaas_pemeriksaan_3);
                    }
                    if (aaas_pemeriksaan.aaas_pemeriksaan_4 !== null) {
                        $('#aaas-pemeriksaan-4').val(aaas_pemeriksaan.aaas_pemeriksaan_4);
                    }
                    if (aaas_pemeriksaan.aaas_pemeriksaan_5 !== null) {
                        $('#aaas-pemeriksaan-5').val(aaas_pemeriksaan.aaas_pemeriksaan_5);
                    }
                    if (aaas_pemeriksaan.aaas_pemeriksaan_6 !== null) {
                        $('#aaas-pemeriksaan-6').val(aaas_pemeriksaan.aaas_pemeriksaan_6);
                    }

                    $('#aaas-sedasi').val(data.assesmen_awal_anestesi_sedassi.aaas_sedasi);
                    $('#aaas-ga').val(data.assesmen_awal_anestesi_sedassi.aaas_ga);

                    const aaas_regional = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_regional);
                    if (aaas_regional.aaas_regional_1 === 'Spinal') {
                        $('#aaas-regional-1').prop('checked', true).change()
                    }
                    if (aaas_regional.aaas_regional_1 === 'Epidural') {
                        $('#aaas-regional-2').prop('checked', true).change()
                    }
                    if (aaas_regional.aaas_regional_1 === 'Kaudal') {
                        $('#aaas-regional-3').prop('checked', true).change()
                    }
                    if (aaas_regional.aaas_regional_1 === 'Block Prifer') {
                        $('#aaas-regional-4').prop('checked', true).change()
                    }

                    const aaas_teknik = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_teknik);
                    if (aaas_teknik.aaas_teknik_1 === 'Hipotensi') {
                        $('#aaas-teknik-1').prop('checked', true).change()
                    }
                    if (aaas_teknik.aaas_teknik_1 === 'Ventilasi satu Paru') {
                        $('#aaas-teknik-2').prop('checked', true).change()
                    }
                    if (aaas_teknik.aaas_teknik_1 === 'TCI') {
                        $('#aaas-teknik-3').prop('checked', true).change()
                    }
                    if (aaas_teknik.aaas_teknik_1 === '1') {
                        $('#aaas-teknik-4').prop('checked', true).change()
                    }
                    if (aaas_teknik.aaas_teknik_5 !== null) {
                        $('#aaas-teknik-5').val(aaas_teknik.aaas_teknik_5);
                    }

                    const aaas_monitoring = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_monitoring);
                    if (aaas_monitoring.aaas_monitoring_1 === 'EKG Lead') {
                        $('#aaas-monitoring-1').prop('checked', true).change()
                    }
                    if (aaas_monitoring.aaas_monitoring_1 === 'SpO2') {
                        $('#aaas-monitoring-2').prop('checked', true).change()
                    }
                    if (aaas_monitoring.aaas_monitoring_1 === 'NIBP') {
                        $('#aaas-monitoring-3').prop('checked', true).change()
                    }
                    if (aaas_monitoring.aaas_monitoring_1 === 'Temp') {
                        $('#aaas-monitoring-4').prop('checked', true).change()
                    }
                    if (aaas_monitoring.aaas_monitoring_1 === 'CVP') {
                        $('#aaas-monitoring-5').prop('checked', true).change()
                    }
                    if (aaas_monitoring.aaas_monitoring_1 === 'Arteri Line') {
                        $('#aaas-monitoring-6').prop('checked', true).change()
                    }
                    if (aaas_monitoring.aaas_monitoring_1 === 'ELCO2') {
                        $('#aaas-monitoring-7').prop('checked', true).change()
                    }
                    if (aaas_monitoring.aaas_monitoring_1 === 'BIS') {
                        $('#aaas-monitoring-8').prop('checked', true).change()
                    }
                    if (aaas_monitoring.aaas_monitoring_1 === '1') {
                        $('#aaas-monitoring-9').prop('checked', true).change()
                    }
                    if (aaas_monitoring.aaas_monitoring_10 !== null) {
                        $('#aaas-monitoring-10').val(aaas_monitoring.aaas_monitoring_10);
                    }

                    const aaas_alat = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_alat);
                    if (aaas_alat.aaas_alat_1 === 'Bronchoscopy') {
                        $('#aaas-alat-1').prop('checked', true).change()
                    }
                    if (aaas_alat.aaas_alat_1 === 'Glidecsope') {
                        $('#aaas-alat-2').prop('checked', true).change()
                    }
                    if (aaas_alat.aaas_alat_1 === 'USG') {
                        $('#aaas-alat-3').prop('checked', true).change()
                    }
                    if (aaas_alat.aaas_alat_1 === '1') {
                        $('#aaas-alat-4').prop('checked', true).change()
                    }
                    if (aaas_alat.aaas_alat_5 !== null) {
                        $('#aaas-alat-5').val(aaas_alat.aaas_alat_5);
                    }

                    const aaas_pasca = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_pasca);
                    if (aaas_pasca.aaas_pasca_1 === 'Rawat Inap') {
                        $('#aaas-pasca-1').prop('checked', true).change()
                    }
                    if (aaas_pasca.aaas_pasca_1 === 'Rawat Jalan') {
                        $('#aaas-pasca-2').prop('checked', true).change()
                    }
                    if (aaas_pasca.aaas_pasca_1 === 'Rawat Khusus') {
                        $('#aaas-pasca-3').prop('checked', true).change()
                    }
                    if (aaas_pasca.aaas_pasca_1 === 'ICU') {
                        $('#aaas-pasca-4').prop('checked', true).change()
                    }
                    if (aaas_pasca.aaas_pasca_1 === 'HCU') {
                        $('#aaas-pasca-5').prop('checked', true).change()
                    }
                    if (aaas_pasca.aaas_pasca_1 === 'APS') {
                        $('#aaas-pasca-6').prop('checked', true).change()
                    }
                    if (aaas_pasca.aaas_pasca_1 === '1') {
                        $('#aaas-pasca-7').prop('checked', true).change()
                    }
                    if (aaas_pasca.aaas_pasca_8 !== null) {
                        $('#aaas-pasca-8').val(aaas_pasca.aaas_pasca_8);
                    }

                    const aaas_ps = JSON.parse(data.assesmen_awal_anestesi_sedassi.aaas_ps);
                    if (aaas_ps.aaas_ps_1 === '1') {
                        $('#aaas-ps-1').prop('checked', true).change()
                    }
                    if (aaas_ps.aaas_ps_1 === '2') {
                        $('#aaas-ps-2').prop('checked', true).change()
                    }
                    if (aaas_ps.aaas_ps_1 === '3') {
                        $('#aaas-ps-3').prop('checked', true).change()
                    }
                    if (aaas_ps.aaas_ps_1 === '4') {
                        $('#aaas-ps-4').prop('checked', true).change()
                    }
                    if (aaas_ps.aaas_ps_1 === '5') {
                        $('#aaas-ps-5').prop('checked', true).change()
                    }
                    if (aaas_ps.aaas_ps_1 === '6') {
                        $('#aaas-ps-6').prop('checked', true).change()
                    }

                    $('#aaas-penyulit').val(data.assesmen_awal_anestesi_sedassi.aaas_penyulit);

                    $('#aaas-puasa').val(data.assesmen_awal_anestesi_sedassi.aaas_puasa);

                    $('#aaas-premedikal').val(data.assesmen_awal_anestesi_sedassi.aaas_premedikal);

                    $('#aaas-catatan').val(data.assesmen_awal_anestesi_sedassi.aaas_catatan);

                    $('#aaas-tanggal-pemeriksaan-pasien').val((data.assesmen_awal_anestesi_sedassi.aaas_tanggal_pemeriksaan_pasien !== null ? datetimefmysql(data.assesmen_awal_anestesi_sedassi.aaas_tanggal_pemeriksaan_pasien) : ''));

                    $('#aaas-pemeriksa-asesmen-anestesi').val(data.assesmen_awal_anestesi_sedassi.aaas_pemeriksa_asesmen_anestesi);
                    $('#s2id_aaas-pemeriksa-asesmen-anestesi a .select2c-chosen').html(data.assesmen_awal_anestesi_sedassi.nama_perawat_2);

                    if (assesmen_awal_anestesi_sedassi.aaas_pemeriksa == '1') {
                        $('#aaas-pemeriksa').prop('checked', true);
                    }


                }
                //  ASESSMENT ANESTESI/SEDASI KAMAR OPERASI AKHIR

                //ASESSMENT PRA BEDAH AWAL

                let asesment_pra_bedahh = data.asesment_pra_bedahh;

                if (asesment_pra_bedahh !== null) {
                    $('#id-apb').val(asesment_pra_bedahh.id);
                    $('#apbwh-tanggal').val((data.asesment_pra_bedahh.apbwh_tanggal !== null ? datetimefmysql(data.asesment_pra_bedahh.apbwh_tanggal) : ''));
                    const apbwh_riwayat_alergi = JSON.parse(data.asesment_pra_bedahh.apbwh_riwayat_alergi);
                    if (apbwh_riwayat_alergi.apbwh_riwayat_alergi === '0') {
                        $('#riwayat-alergi-1').prop('checked', true).change()
                    }
                    if (apbwh_riwayat_alergi.apbwh_riwayat_alergi === '1') {
                        $('#riwayat-alergi-2').prop('checked', true).change()
                    }
                    if (apbwh_riwayat_alergi.apbwh_riwayat_alergi_3 !== null) {
                        $('#riwayat-alergi-3').val(apbwh_riwayat_alergi.apbwh_riwayat_alergi_3);
                    }

                    const apbwh_suhu = JSON.parse(data.asesment_pra_bedahh.apbwh_suhu);
                    if (apbwh_suhu.apbwh_suhu_1 !== null) {
                        $('#apbwh-suhu-1').val(apbwh_suhu.apbwh_suhu_1);
                    }
                    if (apbwh_suhu.apbwh_suhu_2 !== null) {
                        $('#apbwh-suhu-2').val(apbwh_suhu.apbwh_suhu_2);
                    }
                    if (apbwh_suhu.apbwh_suhu_3 !== null) {
                        $('#apbwh-suhu-3').val(apbwh_suhu.apbwh_suhu_3);
                    }
                    if (apbwh_suhu.apbwh_suhu_4 !== null) {
                        $('#apbwh-suhu-4').val(apbwh_suhu.apbwh_suhu_4);
                    }
                    if (apbwh_suhu.apbwh_suhu_5 !== null) {
                        $('#apbwh-suhu-5').val(apbwh_suhu.apbwh_suhu_5);
                    }
                    if (apbwh_suhu.apbwh_suhu_6 !== null) {
                        $('#apbwh-suhu-6').val(apbwh_suhu.apbwh_suhu_6);
                    }

                    const apbwh_status_nutrisi = JSON.parse(data.asesment_pra_bedahh.apbwh_status_nutrisi);
                    if (apbwh_status_nutrisi.apbwh_status_nutrisi === 'Obesitas') {
                        $('#apbwh-status-nutrisi-1').prop('checked', true).change()
                    }
                    if (apbwh_status_nutrisi.apbwh_status_nutrisi === 'Over Weight') {
                        $('#apbwh-status-nutrisi-2').prop('checked', true).change()
                    }
                    if (apbwh_status_nutrisi.apbwh_status_nutrisi === 'Normo Weight') {
                        $('#apbwh-status-nutrisi-3').prop('checked', true).change()
                    }

                    $('#apbwh-keluhan-utama').val(data.asesment_pra_bedahh.apbwh_keluhan_utama);
                    $('#apbwh-rps').val(data.asesment_pra_bedahh.apbwh_rps);
                    $('#apbwh-rpd').val(data.asesment_pra_bedahh.apbwh_rpd);
                    $('#apbwh-pemeriksaan-fisik').val(data.asesment_pra_bedahh.apbwh_pemeriksaan_fisik);

                    $('#apbwh-pemeriksaan-banding').val(data.asesment_pra_bedahh.apbwh_pemeriksaan_banding);
                    $('#apbwh-laboratorium').val(data.asesment_pra_bedahh.apbwh_laboratorium);
                    $('#apbwh-diagnosis').val(data.asesment_pra_bedahh.apbwh_diagnosis);
                    $('#apbwh-diagnosis-banding').val(data.asesment_pra_bedahh.apbwh_diagnosis_banding);
                    $('#apbwh-permasalahan').val(data.asesment_pra_bedahh.apbwh_permasalahan);

                    $('#apbwh-rto').val(data.asesment_pra_bedahh.apbwh_rto);

                    const apbwh_rawat_inap = JSON.parse(data.asesment_pra_bedahh.apbwh_rawat_inap);
                    if (apbwh_rawat_inap.apbwh_rawat_inap === '0') {
                        $('#apbwh-rawat-inap-1').prop('checked', true).change()
                    }
                    if (apbwh_rawat_inap.apbwh_rawat_inap === '1') {
                        $('#apbwh-rawat-inap-2').prop('checked', true).change()
                    }
                    if (apbwh_rawat_inap.apbwh_rawat_inap_3 !== null) {
                        $('#apbwh-rawat-inap-3').val(apbwh_rawat_inap.apbwh_rawat_inap_3);
                    }

                    const apbwh_pasien = JSON.parse(data.asesment_pra_bedahh.apbwh_pasien);
                    if (apbwh_pasien.apbwh_pasien_1 !== null) {
                        $('#apbwh-pasien-1').prop('checked', true).change()
                    }
                    if (apbwh_pasien.apbwh_pasien_2 !== null) {
                        $('#apbwh-pasien-2').prop('checked', true).change()
                    }
                    if (apbwh_pasien.apbwh_pasien_3 !== null) {
                        $('#apbwh-pasien-3').val(apbwh_pasien.apbwh_pasien_3);
                    }
                    if (apbwh_pasien.apbwh_pasien_4 !== null) {
                        $('#apbwh-pasien-4').val(apbwh_pasien.apbwh_pasien_4);
                    }
                    if (apbwh_pasien.apbwh_pasien_5 !== null) {
                        $('#apbwh-pasien-5').prop('checked', true).change()
                    }
                    if (apbwh_pasien.apbwh_pasien_6 !== null) {
                        $('#apbwh-pasien-6').val(apbwh_pasien.apbwh_pasien_6);
                    }


                    $('#apbwh-tanggal-d').val((data.asesment_pra_bedahh.apbwh_tanggal_d !== null ? datetimefmysql(data.asesment_pra_bedahh.apbwh_tanggal_d) : ''));
                    $('#apbwh-tanggal-p').val((data.asesment_pra_bedahh.apbwh_tanggal_p !== null ? datetimefmysql(data.asesment_pra_bedahh.apbwh_tanggal_p) : ''));

                    $('#apbwh-dokter').val(data.asesment_pra_bedahh.apbwh_dokter);
                    $('#s2id_apbwh-dokter a .select2c-chosen').html(data.asesment_pra_bedahh.nama_dokter);

                    $('#apbwh-pasient').val(data.asesment_pra_bedahh.apbwh_pasient);

                    if (asesment_pra_bedahh.apbwh_ttd_dokter == '1') {
                        $('#apbwh-ttd-dokter').prop('checked', true);
                    }
                    if (asesment_pra_bedahh.apbwh_ttd_pasien == '1') {
                        $('#apbwh-ttd-pasien').prop('checked', true);
                    }
                }
                //ASESSMENT PRA BEDAH AKHIR

                // CATATAN PERHITUNGAN KASA / JARUM / INSTRUMEN AWAL
                let catatan_perhitungan_kasa_jarum_instrumen = data.catatan_perhitungan_kasa_jarum_instrumen;
                if (catatan_perhitungan_kasa_jarum_instrumen !== null) {
                    $('#id-cpkji').val(catatan_perhitungan_kasa_jarum_instrumen.id);

                    // console.log('id_cpkji');
                    const raytec = JSON.parse(data.catatan_perhitungan_kasa_jarum_instrumen.raytec);
                    if (raytec.raytec_1 !== null) {
                        $('#raytec-1').val(raytec.raytec_1);
                    }
                    if (raytec.raytec_2 !== null) {
                        $('#raytec-2').val(raytec.raytec_2);
                    }
                    if (raytec.raytec_3 !== null) {
                        $('#raytec-3').val(raytec.raytec_3);
                    }
                    if (raytec.raytec_4 !== null) {
                        $('#raytec-4').val(raytec.raytec_4);
                    }
                    if (raytec.raytec_5 !== null) {
                        $('#raytec-5').val(raytec.raytec_5);
                    }
                    if (raytec.raytec_6 !== null) {
                        $('#raytec-6').val(raytec.raytec_6);
                    }
                    if (raytec.raytec_7 !== null) {
                        $('#raytec-7').val(raytec.raytec_7);
                    }
                    if (raytec.raytec_8 !== null) {
                        $('#raytec-8').val(raytec.raytec_8);
                    }
                    if (raytec.raytec_9 !== null) {
                        $('#raytec-9').val(raytec.raytec_9);
                    }
                    if (raytec.raytec_10 !== null) {
                        $('#raytec-10').val(raytec.raytec_10);
                    }

                    const laps = JSON.parse(data.catatan_perhitungan_kasa_jarum_instrumen.laps);
                    if (laps.laps_1 !== null) {
                        $('#laps-1').val(laps.laps_1);
                    }
                    if (laps.laps_2 !== null) {
                        $('#laps-2').val(laps.laps_2);
                    }
                    if (laps.laps_3 !== null) {
                        $('#laps-3').val(laps.laps_3);
                    }
                    if (laps.laps_4 !== null) {
                        $('#laps-4').val(laps.laps_4);
                    }
                    if (laps.laps_5 !== null) {
                        $('#laps-5').val(laps.laps_5);
                    }
                    if (laps.laps_6 !== null) {
                        $('#laps-6').val(laps.laps_6);
                    }
                    if (laps.laps_7 !== null) {
                        $('#laps-7').val(laps.laps_7);
                    }
                    if (laps.laps_8 !== null) {
                        $('#laps-8').val(laps.laps_8);
                    }
                    if (laps.laps_9 !== null) {
                        $('#laps-9').val(laps.laps_9);
                    }
                    if (laps.laps_10 !== null) {
                        $('#laps-10').val(laps.laps_10);
                    }

                    const depper = JSON.parse(data.catatan_perhitungan_kasa_jarum_instrumen.depper);
                    if (depper.depper_1 !== null) {
                        $('#depper-1').val(depper.depper_1);
                    }
                    if (depper.depper_2 !== null) {
                        $('#depper-2').val(depper.depper_2);
                    }
                    if (depper.depper_3 !== null) {
                        $('#depper-3').val(depper.depper_3);
                    }
                    if (depper.depper_4 !== null) {
                        $('#depper-4').val(depper.depper_4);
                    }
                    if (depper.depper_5 !== null) {
                        $('#depper-5').val(depper.depper_5);
                    }
                    if (depper.depper_6 !== null) {
                        $('#depper-6').val(depper.depper_6);
                    }
                    if (depper.depper_7 !== null) {
                        $('#depper-7').val(depper.depper_7);
                    }
                    if (depper.depper_8 !== null) {
                        $('#depper-8').val(depper.depper_8);
                    }
                    if (depper.depper_9 !== null) {
                        $('#depper-9').val(depper.depper_9);
                    }
                    if (depper.depper_10 !== null) {
                        $('#depper-10').val(depper.depper_10);
                    }

                    const blade = JSON.parse(data.catatan_perhitungan_kasa_jarum_instrumen.blade);
                    if (blade.blade_1 !== null) {
                        $('#blade-1').val(blade.blade_1);
                    }
                    if (blade.blade_2 !== null) {
                        $('#blade-2').val(blade.blade_2);
                    }
                    if (blade.blade_3 !== null) {
                        $('#blade-3').val(blade.blade_3);
                    }
                    if (blade.blade_4 !== null) {
                        $('#blade-4').val(blade.blade_4);
                    }
                    if (blade.blade_5 !== null) {
                        $('#blade-5').val(blade.blade_5);
                    }
                    if (blade.blade_6 !== null) {
                        $('#blade-6').val(blade.blade_6);
                    }
                    if (blade.blade_7 !== null) {
                        $('#blade-7').val(blade.blade_7);
                    }
                    if (blade.blade_8 !== null) {
                        $('#blade-8').val(blade.blade_8);
                    }
                    if (blade.blade_9 !== null) {
                        $('#blade-9').val(blade.blade_9);
                    }
                    if (blade.blade_10 !== null) {
                        $('#blade-10').val(blade.blade_10);
                    }

                    const tape = JSON.parse(data.catatan_perhitungan_kasa_jarum_instrumen.tape);
                    if (tape.tape_1 !== null) {
                        $('#tape-1').val(tape.tape_1);
                    }
                    if (tape.tape_2 !== null) {
                        $('#tape-2').val(tape.tape_2);
                    }
                    if (tape.tape_3 !== null) {
                        $('#tape-3').val(tape.tape_3);
                    }
                    if (tape.tape_4 !== null) {
                        $('#tape-4').val(tape.tape_4);
                    }
                    if (tape.tape_5 !== null) {
                        $('#tape-5').val(tape.tape_5);
                    }
                    if (tape.tape_6 !== null) {
                        $('#tape-6').val(tape.tape_6);
                    }
                    if (tape.tape_7 !== null) {
                        $('#tape-7').val(tape.tape_7);
                    }
                    if (tape.tape_8 !== null) {
                        $('#tape-8').val(tape.tape_8);
                    }
                    if (tape.tape_9 !== null) {
                        $('#tape-9').val(tape.tape_9);
                    }
                    if (tape.tape_10 !== null) {
                        $('#tape-10').val(tape.tape_10);
                    }

                    const jjarum = JSON.parse(data.catatan_perhitungan_kasa_jarum_instrumen.jjarum);
                    if (jjarum.jjarum_1 !== null) {
                        $('#jjarum-1').val(jjarum.jjarum_1);
                    }
                    if (jjarum.jjarum_2 !== null) {
                        $('#jjarum-2').val(jjarum.jjarum_2);
                    }
                    if (jjarum.jjarum_3 !== null) {
                        $('#jjarum-3').val(jjarum.jjarum_3);
                    }
                    if (jjarum.jjarum_4 !== null) {
                        $('#jjarum-4').val(jjarum.jjarum_4);
                    }
                    if (jjarum.jjarum_5 !== null) {
                        $('#jjarum-5').val(jjarum.jjarum_5);
                    }
                    if (jjarum.jjarum_6 !== null) {
                        $('#jjarum-6').val(jjarum.jjarum_6);
                    }
                    if (jjarum.jjarum_7 !== null) {
                        $('#jjarum-7').val(jjarum.jjarum_7);
                    }
                    if (jjarum.jjarum_8 !== null) {
                        $('#jjarum-8').val(jjarum.jjarum_8);
                    }
                    if (jjarum.jjarum_9 !== null) {
                        $('#jjarum-9').val(jjarum.jjarum_9);
                    }
                    if (jjarum.jjarum_10 !== null) {
                        $('#jjarum-10').val(jjarum.jjarum_10);
                    }

                    const pledget = JSON.parse(data.catatan_perhitungan_kasa_jarum_instrumen.pledget);
                    if (pledget.pledget_1 !== null) {
                        $('#pledget-1').val(pledget.pledget_1);
                    }
                    if (pledget.pledget_2 !== null) {
                        $('#pledget-2').val(pledget.pledget_2);
                    }
                    if (pledget.pledget_3 !== null) {
                        $('#pledget-3').val(pledget.pledget_3);
                    }
                    if (pledget.pledget_4 !== null) {
                        $('#pledget-4').val(pledget.pledget_4);
                    }
                    if (pledget.pledget_5 !== null) {
                        $('#pledget-5').val(pledget.pledget_5);
                    }
                    if (pledget.pledget_6 !== null) {
                        $('#pledget-6').val(pledget.pledget_6);
                    }
                    if (pledget.pledget_7 !== null) {
                        $('#pledget-7').val(pledget.pledget_7);
                    }
                    if (pledget.pledget_8 !== null) {
                        $('#pledget-8').val(pledget.pledget_8);
                    }
                    if (pledget.pledget_9 !== null) {
                        $('#pledget-9').val(pledget.pledget_9);
                    }
                    if (pledget.pledget_10 !== null) {
                        $('#pledget-10').val(pledget.pledget_10);
                    }

                    const drain = JSON.parse(data.catatan_perhitungan_kasa_jarum_instrumen.drain);
                    if (drain.drain_1 !== null) {
                        $('#drain-1').val(drain.drain_1);
                    }
                    if (drain.drain_2 !== null) {
                        $('#drain-2').val(drain.drain_2);
                    }
                    if (drain.drain_3 !== null) {
                        $('#drain-3').val(drain.drain_3);
                    }
                    if (drain.drain_4 !== null) {
                        $('#drain-4').val(drain.drain_4);
                    }
                    if (drain.drain_5 !== null) {
                        $('#drain-5').val(drain.drain_5);
                    }
                    if (drain.drain_6 !== null) {
                        $('#drain-6').val(drain.drain_6);
                    }
                    if (drain.drain_7 !== null) {
                        $('#drain-7').val(drain.drain_7);
                    }
                    if (drain.drain_8 !== null) {
                        $('#drain-8').val(drain.drain_8);
                    }
                    if (drain.drain_9 !== null) {
                        $('#drain-9').val(drain.drain_9);
                    }
                    if (drain.drain_10 !== null) {
                        $('#drain-10').val(drain.drain_10);
                    }

                    const innstrumen = JSON.parse(data.catatan_perhitungan_kasa_jarum_instrumen.innstrumen);
                    if (innstrumen.innstrumen_1 !== null) {
                        $('#innstrumen-1').val(innstrumen.innstrumen_1);
                    }
                    if (innstrumen.innstrumen_2 !== null) {
                        $('#innstrumen-2').val(innstrumen.innstrumen_2);
                    }
                    if (innstrumen.innstrumen_3 !== null) {
                        $('#innstrumen-3').val(innstrumen.innstrumen_3);
                    }
                    if (innstrumen.innstrumen_4 !== null) {
                        $('#innstrumen-4').val(innstrumen.innstrumen_4);
                    }
                    if (innstrumen.innstrumen_5 !== null) {
                        $('#innstrumen-5').val(innstrumen.innstrumen_5);
                    }
                    if (innstrumen.innstrumen_6 !== null) {
                        $('#innstrumen-6').val(innstrumen.innstrumen_6);
                    }
                    if (innstrumen.innstrumen_7 !== null) {
                        $('#innstrumen-7').val(innstrumen.innstrumen_7);
                    }
                    if (innstrumen.innstrumen_8 !== null) {
                        $('#innstrumen-8').val(innstrumen.innstrumen_8);
                    }
                    if (innstrumen.innstrumen_9 !== null) {
                        $('#innstrumen-9').val(innstrumen.innstrumen_9);
                    }
                    if (innstrumen.innstrumen_10 !== null) {
                        $('#innstrumen-10').val(innstrumen.innstrumen_10);
                    }

                    const laint = JSON.parse(data.catatan_perhitungan_kasa_jarum_instrumen.laint);
                    if (laint.laint_1 !== null) {
                        $('#laint-1').val(laint.laint_1);
                    }
                    if (laint.laint_2 !== null) {
                        $('#laint-2').val(laint.laint_2);
                    }
                    if (laint.laint_3 !== null) {
                        $('#laint-3').val(laint.laint_3);
                    }
                    if (laint.laint_4 !== null) {
                        $('#laint-4').val(laint.laint_4);
                    }
                    if (laint.laint_5 !== null) {
                        $('#laint-5').val(laint.laint_5);
                    }
                    if (laint.laint_6 !== null) {
                        $('#laint-6').val(laint.laint_6);
                    }
                    if (laint.laint_7 !== null) {
                        $('#laint-7').val(laint.laint_7);
                    }
                    if (laint.laint_8 !== null) {
                        $('#laint-8').val(laint.laint_8);
                    }
                    if (laint.laint_9 !== null) {
                        $('#laint-9').val(laint.laint_9);
                    }
                    if (laint.laint_10 !== null) {
                        $('#laint-10').val(laint.laint_10);
                    }

                    const ro = JSON.parse(data.catatan_perhitungan_kasa_jarum_instrumen.ro);
                    if (ro.ro_1 !== null) {
                        $('#ro-1').val(ro.ro_1);
                    }
                    if (ro.ro_2 !== null) {
                        $('#ro-2').val(ro.ro_2);
                    }
                    if (ro.ro_3 !== null) {
                        $('#ro-3').val(ro.ro_3);
                    }
                    if (ro.ro_4 !== null) {
                        $('#ro-4').val(ro.ro_4);
                    }
                    if (ro.ro_5 !== null) {
                        $('#ro-5').val(ro.ro_5);
                    }
                    if (ro.ro_6 !== null) {
                        $('#ro-6').val(ro.ro_6);
                    }
                    if (ro.ro_7 !== null) {
                        $('#ro-7').val(ro.ro_7);
                    }
                    if (ro.ro_8 !== null) {
                        $('#ro-8').val(ro.ro_8);
                    }
                    if (ro.ro_9 !== null) {
                        $('#ro-9').val(ro.ro_9);
                    }
                    if (ro.ro_10 !== null) {
                        $('#ro-10').val(ro.ro_10);
                    }
                    if (ro.ro_11 !== null) {
                        $('#ro-11').val(ro.ro_11);
                    }

                    const or = JSON.parse(data.catatan_perhitungan_kasa_jarum_instrumen.or);
                    if (or.or_1 !== null) {
                        $('#or-1').val(or.or_1);
                    }
                    if (or.or_2 !== null) {
                        $('#or-2').val(or.or_2);
                    }
                    if (or.or_3 !== null) {
                        $('#or-3').val(or.or_3);
                    }
                    if (or.or_4 !== null) {
                        $('#or-4').val(or.or_4);
                    }
                    if (or.or_5 !== null) {
                        $('#or-5').val(or.or_5);
                    }
                    if (or.or_6 !== null) {
                        $('#or-6').val(or.or_6);
                    }
                    if (or.or_7 !== null) {
                        $('#or-7').val(or.or_7);
                    }
                    if (or.or_8 !== null) {
                        $('#or-8').val(or.or_8);
                    }
                    if (or.or_9 !== null) {
                        $('#or-9').val(or.or_9);
                    }
                    if (or.or_10 !== null) {
                        $('#or-10').val(or.or_10);
                    }
                    if (or.or_11 !== null) {
                        $('#or-11').val(or.or_11);
                    }

                    $('#peerawat-1').val(data.catatan_perhitungan_kasa_jarum_instrumen.peerawat_1);
                    $('#s2id_peerawat-1 a .select2c-chosen').html(data.catatan_perhitungan_kasa_jarum_instrumen.nama_perawat_1);

                    $('#tanggal-c').val(data.catatan_perhitungan_kasa_jarum_instrumen.tanggal_c);
                    $('#jenis-operasi').val(data.catatan_perhitungan_kasa_jarum_instrumen.jenis_operasi);
                    $('#jam-mulai-c').val(data.catatan_perhitungan_kasa_jarum_instrumen.jam_mulai_c);
                    $('#jam-selesai-c').val(data.catatan_perhitungan_kasa_jarum_instrumen.jam_selesai_c);
                    $('#lain-c').val(data.catatan_perhitungan_kasa_jarum_instrumen.lain_c);

                    const jummlah_c = JSON.parse(data.catatan_perhitungan_kasa_jarum_instrumen.jummlah_c);
                    if (jummlah_c.jummlah_c_1 === '1') {
                        $('#jummlah-c-1').prop('checked', true).change()
                    }
                    if (jummlah_c.jummlah_c_1 === '0') {
                        $('#jummlah-c-2').prop('checked', true).change()
                    }
                    if (jummlah_c.jummlah_c_3 === '1') {
                        $('#jummlah-c-3').prop('checked', true).change()
                    }
                    if (jummlah_c.jummlah_c_3 === '0') {
                        $('#jummlah-c-4').prop('checked', true).change()
                    }
                    if (jummlah_c.jummlah_c_5 === '1') {
                        $('#jummlah-c-5').prop('checked', true).change()
                    }
                    if (jummlah_c.jummlah_c_5 === '0') {
                        $('#jummlah-c-6').prop('checked', true).change()
                    }
                    if (jummlah_c.jummlah_c_7 === '1') {
                        $('#jummlah-c-7').prop('checked', true).change()
                    }
                    if (jummlah_c.jummlah_c_7 === '0') {
                        $('#jummlah-c-8').prop('checked', true).change()
                    }
                    if (jummlah_c.jummlah_c_9 === '1') {
                        $('#jummlah-c-9').prop('checked', true).change()
                    }
                    if (jummlah_c.jummlah_c_9 === '0') {
                        $('#jummlah-c-10').prop('checked', true).change()
                    }

                    $('#dokterr-1').val(data.catatan_perhitungan_kasa_jarum_instrumen.dokterr_1);
                    $('#s2id_dokterr-1 a .select2c-chosen').html(data.catatan_perhitungan_kasa_jarum_instrumen.nama_dokter_1);

                    $('#peerawat-2').val(data.catatan_perhitungan_kasa_jarum_instrumen.peerawat_2);
                    $('#s2id_peerawat-2 a .select2c-chosen').html(data.catatan_perhitungan_kasa_jarum_instrumen.nama_perawat_2);

                    $('#peerawat-3').val(data.catatan_perhitungan_kasa_jarum_instrumen.peerawat_3);
                    $('#s2id_peerawat-3 a .select2c-chosen').html(data.catatan_perhitungan_kasa_jarum_instrumen.nama_perawat_3);

                    if (catatan_perhitungan_kasa_jarum_instrumen.ttd_1 == '1') {
                        $('#ttd-1').prop('checked', true);
                    }
                    if (catatan_perhitungan_kasa_jarum_instrumen.ttd_2 == '1') {
                        $('#ttd-2').prop('checked', true);
                    }
                    if (catatan_perhitungan_kasa_jarum_instrumen.ttd_3 == '1') {
                        $('#ttd-3').prop('checked', true);
                    }
                }

                // CATATAN PERHITUNGAN KASA / JARUM / INSTRUMEN AKHIR

                $('.raytecc').on('keyup', function() {
                    let sum = 0
                    $('.raytecc').each(function() {
                        sum += Number($(this).val());
                    });

                    if ($(this).attr('id') === 'raytec-8') {
                        $('#raytec-9').val(sum);
                        return false;
                    }

                    $('#raytec-7, #raytec-9').val(sum);
                })

                $('.lap').on('keyup', function() {
                    let sum = 0
                    $('.lap').each(function() {
                        sum += Number($(this).val());
                    });

                    if ($(this).attr('id') === 'laps-8') {
                        $('#laps-9').val(sum);
                        return false;
                    }

                    $('#laps-7, #laps-9').val(sum);
                })

                $('.deppe').on('keyup', function() {
                    let sum = 0
                    $('.deppe').each(function() {
                        sum += Number($(this).val());
                    });

                    if ($(this).attr('id') === 'depper-8') {
                        $('#depper-9').val(sum);
                        return false;
                    }

                    $('#depper-7, #depper-9').val(sum);
                })

                $('.blad').on('keyup', function() {
                    let sum = 0
                    $('.blad').each(function() {
                        sum += Number($(this).val());
                    });

                    if ($(this).attr('id') === 'blade-8') {
                        $('#blade-9').val(sum);
                        return false;
                    }

                    $('#blade-7, #blade-9').val(sum);
                })

                $('.tap').on('keyup', function() {
                    let sum = 0
                    $('.tap').each(function() {
                        sum += Number($(this).val());
                    });

                    if ($(this).attr('id') === 'tape-8') {
                        $('#tape-9').val(sum);
                        return false;
                    }

                    $('#tape-7, #tape-9').val(sum);
                })

                $('.jarum').on('keyup', function() {
                    let sum = 0
                    $('.jarum').each(function() {
                        sum += Number($(this).val());
                    });

                    if ($(this).attr('id') === 'jjarum-8') {
                        $('#jjarum-9').val(sum);
                        return false;
                    }

                    $('#jjarum-7, #jjarum-9').val(sum);
                })

                $('.pledge').on('keyup', function() {
                    let sum = 0
                    $('.pledge').each(function() {
                        sum += Number($(this).val());
                    });

                    if ($(this).attr('id') === 'pledget-8') {
                        $('#pledget-9').val(sum);
                        return false;
                    }

                    $('#pledget-7, #pledget-9').val(sum);
                })

                $('.drai').on('keyup', function() {
                    let sum = 0
                    $('.drai').each(function() {
                        sum += Number($(this).val());
                    });

                    if ($(this).attr('id') === 'drain-8') {
                        $('#drain-9').val(sum);
                        return false;
                    }

                    $('#drain-7, #drain-9').val(sum);
                })

                $('.instrume').on('keyup', function() {
                    let sum = 0
                    $('.instrume').each(function() {
                        sum += Number($(this).val());
                    });

                    if ($(this).attr('id') === 'innstrumen-8') {
                        $('#innstrumen-9').val(sum);
                        return false;
                    }

                    $('#innstrumen-7, #innstrumen-9').val(sum);
                })

                $('.lain').on('keyup', function() {
                    let sum = 0
                    $('.lain').each(function() {
                        sum += Number($(this).val());
                    });

                    if ($(this).attr('id') === 'laint-8') {
                        $('#laint-9').val(sum);
                        return false;
                    }

                    $('#laint-7, #laint-9').val(sum);
                })

                $('.ro').on('keyup', function() {
                    let sum = 0
                    $('.ro').each(function() {
                        sum += Number($(this).val());
                    });

                    if ($(this).attr('id') === 'ro-9') {
                        $('#ro-10').val(sum);
                        return false;
                    }

                    $('#ro-8, #ro-10').val(sum);
                })

                $('.or').on('keyup', function() {
                    let sum = 0
                    $('.or').each(function() {
                        sum += Number($(this).val());
                    });

                    if ($(this).attr('id') === 'or-9') {
                        $('#or-10').val(sum);
                        return false;
                    }

                    $('#or-8, #or-10').val(sum);
                })

                // SSCKO 7 show surgical safety ceklis kamar operasi
                if (typeof data.surgical_safety_ceklis_kamar_operasi !== 'undefined' | data.surgical_safety_ceklis_kamar_operasi !== null) {

                    showSurgicalSafetyCeklisKamarOperasi(data.surgical_safety_ceklis_kamar_operasi, id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    $('tabel-surgical-safety-ceklis-kamar-operasi').empty();
                }


                // lokasi operasi
                let plo = data.lokasi_operasi;
                // console.log(plo); 
                if (plo !== null) {
                    $('#id-plo').val(plo.id);
                    $('#plo-prosedur').val(plo.plo_prosedur);
                    $('#plo-tanggal').val(datefmysql(plo.plo_tanggal));

                    let plo_gambar = plo.plo_gambar;
                    // console.log(plo_gambar);
                    if (plo_gambar !== null) {
                        // $('#lokasi-operasi').hide();
                        $('#hasil-lokasi-operasi').show();
                        $('#gambar-plo').attr('src', '<?php echo base_url('resources/images/lokasi_operasi/'); ?>' + plo_gambar);
                        $('#gambar-lama').val(plo_gambar);
                    }

                    let tgl_pasien = plo.plo_tanggal_pasien;
                    let tgl_dokter = plo.plo_tanggal_dokter;

                    if (tgl_pasien !== null) {
                        $('#plo-tanggal-pasien').val(datetimefmysql(tgl_pasien));
                    }
                    if (tgl_dokter !== null) {
                        $('#plo-tanggal-dokter').val(datetimefmysql(tgl_dokter));
                    }
                    // dokter
                    $('#plo-dokter').val(plo.plo_dokter);
                    $('#s2id_plo-dokter a .select2c-chosen').html(plo.dokter);
                }


                $('#bed').text(bed);

                $('#modal-form-operasi').modal('show');
                clearCanvasPlo();

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })

    }

    // SSCKO 8  
    function resetFormOperasi() {
        $('#wizard-operasi').bwizard('show', '0');
        // surgical ceklis reset form

        // dokter / perawat
        $('#apbwh-dokter,#peerawat-1,#peerawat-2,#peerawat-3,dokterr-1')
            .val('');


        // s2id dokter or perawat
        $('#s2id_apbwh-dokter a .select2c-chosen, #s2id_peerawat-1 a .select2c-chosen, #s2id_peerawat-2 a .select2c-chosen, #s2id_peerawat-3 a .select2c-chosen, #s2id_dokterr-1 a .select2c-chosen, #s2id_plo-dokter a .select2c-chosen')
            .empty();


        $('#form_entri_operasi')[0].reset()
        $("input[type='checkbox']").prop('checked', false);
        $("input[type='radio']").prop('checked', false);

        // For non-blocking code (Asyncronous)
        setTimeout(() => {
            $('#form-sscko').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
                if ($(this).is(':disabled')) {
                    $(this).prop('disabled', false);
                }
            })
        }, 100)

        // lokasi operasi
        $('#id-plo').val('');
        $('#plo-tanggal').val('');
        $('#plo-tanggal-pasien').val('');
        $('#plo-tanggal-dokter').val('');
        $('#gambar-lama').val('');
        $('#lokasi-operasi').show();
        $('#hasil-lokasi-operasi').hide();
        // $('#gambar-lokasi-operasi').remove();
        // $('#gambar-plo').prop('hidden', true);
    }

    // SSCKO 9 
    function konfirmasiSimpanEntriOperasi() {

        swal.fire({
            title: 'Simpan Entri Operasi',
            text: "Apakah anda yakin akan menyimpan Resume Operasi ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanEntriOperasi();
            }
        })

    }

    // SSCKO 10
    function simpanEntriOperasi() {
        var dataURL = '0';

        if (isCanvasChanged) {
            var dataURL = canvas.toDataURL("image/png");
        }
        // console.log(dataURL);
        $.ajax({
            type: 'POST',
            url: '<?= base_url("order_operasi/api/Order_operasi/simpan_entri_operasi") ?>',
            data: $('#form_entri_operasi').serialize() + '&grafik_ckp=' + $('#data-chart-ckp').val() + '&imageData=' + dataURL,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {

                        $('#wizard-operasi').bwizard('show', data.respon.show);

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
                        $('#modal-form-operasi').modal('hide');
                        showListForm($('#ok-id-pendaftaran').val(), $('#ok-id-layanan-pendaftaran').val(), $('#ok-id-pasien').val());
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

    // SSCKO 11
    function showFormSurgicalSafetyCeklisKamarOperasi(num) {

        let html = bukaLebar('Form Surgical Safety Ceklis Kamar Operasi', num);

        html += /* html */ `
        <table class="table table-no-border table-sm table-striped" id="form-sscko">
            <thead class="text-center">
                <tr>
                    <th colspan="2">
                        <h4>sign in</h4>
                    </th>
                    <th colspan="2">
                        <h4>time out</h4>
                    </th>
                    <th colspan="2">
                        <h4>sign out</h4>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">(sebelum induksi Anestesi)</th>
                    <th colspan="2">(sebelum insisi kulit)</th>
                    <th colspan="2">(sebelum pasien keluar kamar operasi)</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td colspan="2">Diklakukan oleh perawat dan dokter anestesi
                    </td>
                    <td colspan="2">Diklakukan oleh perawat, dokter anestesi dan
                        ahli bedah</td>
                    <td colspan="2">Diklakukan oleh perawat, dokter anestesi dan
                        ahli bedah</td>
                </tr>
                <tr>
                    <td colspan="2"><b>VERIFIKASI</b></td>
                    <td colspan="2"><b>KELENGKAPAN TIM DAN FASILITAS OPERASI</b>
                    </td>
                    <td colspan="2"><b>BACA SECARA VERBAL</b></td>
                </tr>


                <tr>
                    <td colspan="2">
                    1. Pasien sudah di konfirmasi
                    </td>
                
                    
                    <td colspan="2">
                    1. Konfirmasi seluruh anggota tim (nama dan peran masing-masing)&nbsp; &nbsp; 
                    <input type="checkbox" name="sscko_konfirmasi" id="sscko-konfirmasi" value="1"> ya  
                    </td>

                    <td colspan="2">
                    1. Perawat melakukann konfirmasi secara verbal
                
                        
                    </td>
                </tr>




                <tr>
                    <td colspan="2">
                        - Identitas dan gelang pasien &nbsp; &nbsp;
                        <input type="checkbox" name="sscko_igp" id="sscko-igp" value="1"> ya
                    </td>
                    
                    <td colspan="2">
                            2. Konfirmasi secara verbal 
                    </td>
                
                    <td colspan="2">
                        - Nama prosedur tindakan &nbsp; &nbsp;
                        <input type="checkbox" name="sscko_npt" id="sscko-npt" value="1"> ya
                                
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        - Lokasi operasi  &nbsp; &nbsp;
                        <input type="checkbox" name="sscko_lo" id="sscko-lo" value="1"> ya
                    </td>
    
                    <td colspan="2">
                        - Nama pasien  &nbsp; &nbsp;
                        <input type="checkbox" name="sscko_np" id="sscko-np" value="1"> ya
                    </td>
                
                    <td colspan="2">
                        - Instrumen, kasa, dan jarum telah di hitung secara lengkap  &nbsp; &nbsp;
                        <input type="checkbox" name="sscko_instrumen" id="sscko-instrumen" value="1"> ya
                    </td>
                
                </tr>


                <tr>
                    <td colspan="2">
                        - Prosedur &nbsp; &nbsp;
                        <input type="checkbox" name="sscko_prosedur" id="sscko-prosedur" value="1"> ya
                    </td>
            
                    <td colspan="2">
                        - Prosedur &nbsp; &nbsp;
                        <input type="checkbox" name="sscko_prosedurr" id="sscko-prosedurr" value="1"> ya
                    </td>
                
                    <td colspan="2">
                        - Specimen diberi label termasuk nama pasien & asal jaringan spacimen)&nbsp; &nbsp;
                        <input type="checkbox" name="sscko_specimen" id="sscko-specimen" value="1"> ya
                                    
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        - Surat izin operasi  &nbsp; &nbsp;
                        <input type="checkbox" name="sscko_sio" id="sscko-sio" value="1"> ya
                    </td>
            
                    <td colspan="2">
                        - Lokasi dimana insisi akan dibuat &nbsp; &nbsp;
                        <input type="checkbox" name="sscko_lokasi" id="sscko-lokasi" value="1"> ya
                    </td>
                
                    <td colspan="2">
                        - Adakah masalah dengan peralatan selama operasi &nbsp; &nbsp;
                        <input class="mr-1" type="radio" name="sscko_adakah" id="sscko-adakah-ya" value="1">Ya
                        <input class="ml-2 mr-1" type="radio" name="sscko_adakah" id="sscko-adakah-tidak" value="0">Tidak
                        
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        2. Lokasi operasi sudah diberi tanda? &nbsp;
                        <input class="mr-1" type="radio" name="sscko_tanda" id="sscko-tanda-ya" value="1">Ya
                        <input class="ml-2 mr-1" type="radio" name="sscko_tanda" id="sscko-tanda-tidak" value="0">Tidak dilakukan
                    </td>
            
                    <td colspan="2">
                        3. Antibiotik profilaksis telah diberikan dalam 60 menit sebelumnya? &nbsp;
                        <input type="checkbox" name="sscko_antibiotik" id="sscko-antibiotik" value="1"> ya
                    </td>
                    
                    <td colspan="2">
                        2. Operator dokter bedah, dokter anastesi dan perawat melakukan riview masalah utama apa yang harus diperhatikan untuk penyembuhan dan manajemen pasien selanjutnya &nbsp;&nbsp;&nbsp;<input type="checkbox" name="sscko_operator" id="sscko-operator" value="1"> ya
                    </td>               
                </tr>


                <tr>
                    <td colspan="2">
                        3. Mesin anastesi dan obat-obatan sudah di cek lengkap? &nbsp;&nbsp;
                        <input type="checkbox" name="sscko_mesin" id="sscko-mesin" value="1"> ya
                    </td>
                
                    <td colspan="2">
                        4. Antisipasi kejadian kritis : <br>
                            <b>- Review dokter bedah :</b> Langkah apa yang akan dilakukan bila kondisi kritis atau - kejadian yang tidak diharapkan, lamanya operasi, kemungkinan kehilangan darah...? 
                        <input type="text" name="sscko_bedah" id="sscko-bedah"class="custom-form clear-input d-inline-block col-lg-10 ml-2"placeholder="silahkan di isi..."> 
                    </td>
                    <td colspan="2">
                        - Tanggal Tindakan Verivikasi <input type="text" name="sscko_tanggal_tindakan" id="sscko-tanggal-tindakan" class="custom-form clear-input d-inline-block col-lg-3 ml-2"placeholder="isi tanggal"> 
                    </td>
                </tr>
            

                
                <tr>
                    <td colspan="2">
                        4. Monitor anastesi berfungsi baik? &nbsp;&nbsp;
                        <input type="checkbox" name="sscko_monitor" id="sscko-monitor" value="1"> ya
                    </td>
                
                    <td colspan="2">
                        <b>- Review dokter anastesi :</b> apa ada hal khusus yang perlu di perhatikan pada pasien...? <input type="text" name="sscko_anastesiii" id="sscko-anastesiii"class="custom-form clear-input d-inline-block col-lg-10 ml-2"placeholder="silahkan di isi...">
                        
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        5. apakah pasien mempunyai riwayat alergi?
                        <input class="ml-2 mr-1" type="radio" name="sscko_alergi" id="sscko-alergi-tidak" value="0">Tidak
                        <input class="mr-1" type="radio" name="sscko_alergi" id="sscko-alergi-ya" value="1">Ya, <br>
                        Sebutkan<input type="text" name="sscko_sebut" id="sscko-sebut"class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                        placeholder="sebutkan"> 
                    </td>
                
                    <td colspan="2">
                        <b>- Review tim perawat :</b> apakah peralatan sudah seteril, adakah alat-alat yang perlu diperhatikan khusus atau dalam masalah...? <input type="text" name="sscko_perawat" id="sscko-perawat"class="custom-form clear-input d-inline-block col-lg-10 ml-2"placeholder="silahkan di isi...">
                    
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        6. Kemungkinan kesulitan jalan nafas atau resiko aspirasi? <br>
                        <input class="ml-2 mr-1" type="radio" name="sscko_kemungkinan" id="sscko-kemungkinan-tidak" value="0">Tidak &nbsp;&nbsp;&nbsp;
                        <input class="mr-1" type="radio" name="sscko_kemungkinan" id="sscko-kemungkinan-ya" value="1"> Peralatan dan asisten telah tersedia        
                    </td>
                    <td colspan="2">
                        5. Foto Rongent/CT Scan/MRI yang diperlukan telah ditayangkan <br>
                        <input class="ml-2 mr-1" type="radio" name="sscko_foto" id="sscko-foto-tidak" value="0">Tidak dilakukan &nbsp;&nbsp;
                        <input class="mr-1" type="radio" name="sscko_foto" id="sscko-foto-ya" value="1">Ya
                        
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        7. Resiko kehilangan darah > 500ml/kgBB pada anak &nbsp;&nbsp;&nbsp;
                        <input class="ml-2 mr-1" type="radio" name="sscko_resiko" id="sscko-resiko-tidak" value="0">Tidak &nbsp;&nbsp;&nbsp; 
                            <input class="mr-1" type="radio" name="sscko_resiko" id="sscko-resiko-ya" value="1"> ya, Tersedia dua akses intravena/sentral dan terapi cairan sudah di rencanakan                     
                    </td>
                            
                </tr>

                
                <tr>
                    <td colspan="2">
                        8. Rencana Penampilan implant?  
                        <input class="ml-2 mr-1" type="radio" name="sscko_rencana" id="sscko-rencana-tidak" value="0">Tidak &nbsp;
                        <input class="mr-1" type="radio" name="sscko_rencana" id="sscko-rencana-ya" value="1">Ya,
                        jenis<input type="text" name="sscko_jenis" id="sscko-jenis"class="custom-form clear-input d-inline-block col-lg-3 ml-2"
                        placeholder="sebutkan">                   
                                
                    </td>
                </tr>


                <tr>
                        <td colspan="2">
                            9. Rencana anastesi &nbsp;&nbsp;&nbsp;
                            <input class="mr-1" type="radio"name="sscko_anastesi"id="sscko-anastesi-1" value="1">Umum
                            <input class="ml-3 mr-1" type="radio"name="sscko_anastesi" id="sscko-anastesi-2" value="2">Regional
                            <input class="ml-3 mr-1" type="radio"name="sscko_anastesi"id="sscko-anastesi-3" value="3">Blok
                            <input class="ml-3 mr-1" type="radio"name="sscko_anastesi" id="sscko-anastesi-4" value="4">Lokal
                    
                        </td>             
                </tr> 

                

                <tr>
                    <td colspan="2"><b>TANGGAL & JAM VERIFIKASI</b> <br>
                    <input type="text" name="sscko_tanggal_sign_in" id="sscko-tanggal-sign-in"
                        class="custom-form clear-d-inline-block col-lg-4"
                        placeholder="dd/mm/yyyy hh:mm"></td>
                        
                    
                    <td colspan="2"><b>TANGGAL & JAM VERIFIKASI</b> <br>
                    <input type="text" name="sscko_tanggal_time_out" id="sscko-tanggal-time-out"
                        class="custom-form clear-d-inline-block col-lg-4"
                        placeholder="dd/mm/yyyy hh:mm"> 
                        </td>
                        
                    
                    <td colspan="2"><b>TANGGAL & JAM VERIFIKASI</b> <br>
                    <input type="text" name="sscko_tanggal_sign_out" id="sscko-tanggal-sign-out"
                        class="custom-form clear-d-inline-block col-lg-4"
                        placeholder="dd/mm/yyyy hh:mm">
                    
                    </td>
                </tr>



                <tr>
                    <td colspan="2"><b>NAMA DAN TANDA TANGAN</b></td>
                    <td colspan="2"><b>NAMA DAN TANDA TANGAN</b></td>
                    <td colspan="2"><b>NAMA DAN TANDA TANGAN</b></td>
                </tr>


                <tr>
                    <td colspan="2">Tanda tangan &nbsp;&nbsp;
                    
                    
                            <input type="checkbox"
                                name="sscko_paraf_perawat_sign_in"
                                id="sscko-paraf-perawat-sign-in">
                        
                    </td>
                    <td colspan="2">Tanda tangan &nbsp;&nbsp;
                    
                        
                            <input type="checkbox"
                                name="sscko_paraf_perawat_time_out"
                                id="sscko-paraf-perawat-time-out">
                        
                    </td>
                    <td colspan="2">Tanda tangan &nbsp;&nbsp;
                    
                        
                            <input type="checkbox"
                                name="sscko_paraf_perawat_sign_out"
                                id="sscko-paraf-perawat-sign-out">
                        
                    </td>
                </tr>


                <tr>
                    <td>Perawat Sirkuler</td>
                    <td>
                        <input type="text" name="sscko_perawat_sign_in"
                            id="sscko-perawat-sign-in"
                            class="select2c-input">
                    </td>
                    <td>Perawat Sirkuler</td>
                    <td>
                        <input type="text" name="sscko_perawat_time_out"
                            id="sscko-perawat-time-out"
                            class="select2c-input">
                    </td>
                    <td>Perawat Sirkuler</td>
                    <td>
                        <input type="text" name="sscko_perawat_sign_out"
                            id="sscko-perawat-sign-out"
                            class="select2c-input">
                    </td>
                </tr>



                <tr>
                    <td colspan="2">Tanda tangan &nbsp;&nbsp;
                    
                        <input type="checkbox"
                            name="sscko_paraf_dokter_anestesi_sign_in"
                            id="sscko-paraf-dokter-anestesi-sign-in">
                    </td>
                    <td colspan="2">Tanda tangan &nbsp;&nbsp;
                
                        <input type="checkbox"
                            name="sscko_paraf_dokter_anestesi_time_out"
                            id="sscko-paraf-dokter-anestesi-time-out">
                    </td>
                    <td colspan="2">Tanda tangan &nbsp;&nbsp;
                    
                        <input type="checkbox"
                            name="sscko_paraf_dokter_anestesi_sign_out"
                            id="sscko-paraf-dokter-anestesi-sign-out">
                    </td>
                </tr>



                <tr>
                    <td>Dokter Anestesi</td>
                    <td>
                        <input type="text" name="sscko_dokter_anestesi_sign_in"
                            id="sscko-dokter-anestesi-sign-in"
                            class="select2c-input">
                    </td>
                    <td>Dokter Anestesi</td>
                    <td>
                        <input type="text" name="sscko_dokter_anestesi_time_out"
                            id="sscko-dokter-anestesi-time-out"
                            class="select2c-input">
                    </td>
                    <td>Dokter Anestesi</td>
                    <td>
                        <input type="text" name="sscko_dokter_anestesi_sign_out"
                            id="sscko-dokter-anestesi-sign-out"
                            class="select2c-input">
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <button type="button" title="Tambah Surgical Safety Ceklis Kamar Operasi" class="btn btn-info" onclick="tambahSurgicalSafetyCeklisKamarOperasi()"><i class="fas fa-arrow-circle-down mr-1"></i> Tambah Surgical Safety Ceklis Kamar Operasi</button>
                    </td>
                </tr>
            </tbody>
        </table>
        `;
        html += tutupRapet();

        $('#buka-tutup-surgical-safety-ceklis-kamar-operasi').append(html);
    }


    // SSCKO 12
    function tambahSurgicalSafetyCeklisKamarOperasi() {

        if ($('#sscko-tanggal-sign-in').val() === '') {
            syams_validation('#sscko-tanggal-sign-in', 'Tanggal Surgical Safety Ceklis Kamar Operasi harus diisi.');
            return false;
        } else {
            syams_validation_remove('#sscko-tanggal-sign-in');
        }

        if ($('#sscko-dokter-anestesi-sign-in').val() === '') {
            syams_validation('#sscko-dokter-anestesi-sign-in', 'Dokter belum di pillih...!');
            return false;
        } else {
            syams_validation_remove('#sscko-dokter-anestesi-sign-in');
        }

        let html = '';
        let number = $('.nomer-surgical-kamar-operasi').length;

        // sign in =======================================================
        let sscko_igp = $('#sscko-igp').is(':checked');
        let sscko_lo = $('#sscko-lo').is(':checked');
        let sscko_prosedur = $('#sscko-prosedur').is(':checked');
        let sscko_sio = $('#sscko-sio').is(':checked');
        let sscko_tanda = $('[id="sscko-tanda-ya"]:checked,[id="sscko-tanda-tidak"]:checked').val();
        let sscko_mesin = $('#sscko-mesin').is(':checked');
        let sscko_monitor = $('#sscko-monitor').is(':checked');
        let sscko_alergi = $('[id="sscko-alergi-tidak"]:checked,[id="sscko-alergi-ya"]:checked').val();
        let sscko_sebut = $('#sscko-sebut').val();
        let sscko_kemungkinan = $('[id="sscko-kemungkinan-tidak"]:checked,[id="sscko-kemungkinan-ya"]:checked').val();
        let sscko_resiko = $('[id="sscko-resiko-tidak"]:checked,[id="sscko-resiko-ya"]:checked').val();
        let sscko_rencana = $('[id="sscko-rencana-tidak"]:checked,[id="sscko-rencana-ya"]:checked').val();
        let sscko_jenis = $('#sscko-jenis').val();
        let sscko_anastesi = $(
            '[id="sscko-anastesi-1"]:checked,[id="sscko-anastesi-2"]:checked,[id="sscko-anastesi-3"]:checked,[id="sscko-anastesi-4"]:checked').val();

        let sscko_tanggal_sign_in = $('#sscko-tanggal-sign-in').val();
        let sscko_paraf_perawat_sign_in = $('#sscko-paraf-perawat-sign-in').is(':checked');
        let sscko_perawat_sign_in = $('#s2id_sscko-perawat-sign-in a .select2c-chosen').html();
        let sscko_paraf_dokter_anestesi_sign_in = $('#sscko-paraf-dokter-anestesi-sign-in').is(':checked');
        let sscko_dokter_anestesi_sign_in = $('#s2id_sscko-dokter-anestesi-sign-in a .select2c-chosen').html();
        let id_dokter_anestesi_sign_in = $('#sscko-dokter-anestesi-sign-in').val();
        let id_perawat_sign_in = $('#sscko-perawat-sign-in').val();

        // time out ========================================================
        let sscko_konfirmasi = $('#sscko-konfirmasi').is(':checked');
        let sscko_np = $('#sscko-np').is(':checked');
        let sscko_prosedurr = $('#sscko-prosedurr').is(':checked');
        let sscko_lokasi = $('#sscko-lokasi').is(':checked');
        let sscko_antibiotik = $('#sscko-antibiotik').is(':checked');
        let sscko_bedah = $('#sscko-bedah').val();
        let sscko_anastesiii = $('#sscko-anastesiii').val();
        let sscko_perawat = $('#sscko-perawat').val();
        let sscko_review = $('#sscko-review').val();
        let sscko_foto = $('[id="sscko-foto-ya"]:checked,[id="sscko-foto-tidak"]:checked').val();



        let sscko_tanggal_time_out = $('#sscko-tanggal-time-out').val();
        let sscko_paraf_perawat_time_out = $('#sscko-paraf-perawat-time-out').is(':checked');
        let sscko_perawat_time_out = $('#s2id_sscko-perawat-time-out a .select2c-chosen').html();
        let sscko_paraf_dokter_anestesi_time_out = $('#sscko-paraf-dokter-anestesi-time-out').is(':checked');
        let sscko_dokter_anestesi_time_out = $('#s2id_sscko-dokter-anestesi-time-out a .select2c-chosen').html();
        let id_dokter_anestesi_time_out = $('#sscko-dokter-anestesi-time-out').val();
        let id_perawat_time_out = $('#sscko-perawat-time-out').val();

        // sign out ==========================================================
        let sscko_npt = $('#sscko-npt').is(':checked');
        let sscko_instrumen = $('#sscko-instrumen').is(':checked');
        let sscko_specimen = $('#sscko-specimen').is(':checked');
        let sscko_adakah = $('[id="sscko-adakah-ya"]:checked,[id="sscko-adakah-tidak"]:checked').val();
        let sscko_operator = $('#sscko-operator').is(':checked');
        let sscko_tanggal_tindakan = $('#sscko-tanggal-tindakan').val();


        let sscko_tanggal_sign_out = $('#sscko-tanggal-sign-out').val();
        let sscko_paraf_perawat_sign_out = $('#sscko-paraf-perawat-sign-out').is(':checked');
        let sscko_perawat_sign_out = $('#s2id_sscko-perawat-sign-out a .select2c-chosen').html();
        let sscko_paraf_dokter_anestesi_sign_out = $('#sscko-paraf-dokter-anestesi-sign-out').is(':checked');
        let sscko_dokter_anestesi_sign_out = $('#s2id_sscko-dokter-anestesi-sign-out a .select2c-chosen').html();
        let id_dokter_anestesi_sign_out = $('#sscko-dokter-anestesi-sign-out').val();
        let id_perawat_sign_out = $('#sscko-perawat-sign-out').val();

        html = /* html */ `
    <tbody>

        <input type="hidden" name="sscko_igp[]" value="${sscko_igp ? 1 : 0}">
        <input type="hidden" name="sscko_lo[]" value="${sscko_lo ? 1 : 0}">
        <input type="hidden" name="sscko_prosedur[]" value="${sscko_prosedur ? 1 : 0}">
        <input type="hidden" name="sscko_sio[]" value="${sscko_sio ? 1 : 0}">
        <input type="hidden" name="sscko_tanda[]" value="${sscko_tanda}">
        <input type="hidden" name="sscko_mesin[]" value="${sscko_mesin ? 1 : 0}">
        <input type="hidden" name="sscko_monitor[]" value="${sscko_monitor ? 1 : 0}">
        <input type="hidden" name="sscko_alergi[]" value="${sscko_alergi}">
        <input type="hidden" name="sscko_sebut[]" value="${sscko_sebut}">
        <input type="hidden" name="sscko_kemungkinan[]" value="${sscko_kemungkinan}">
        <input type="hidden" name="sscko_resiko[]" value="${sscko_resiko}">
        <input type="hidden" name="sscko_rencana[]" value="${sscko_rencana}">
        <input type="hidden" name="sscko_jenis[]" value="${sscko_jenis}">
        <input type="hidden" name="sscko_anastesi[]" value="${sscko_anastesi}">
        


        <input type="hidden" name="sscko_konfirmasi[]" value="${sscko_konfirmasi ? 1 : 0}">
        <input type="hidden" name="sscko_np[]" value="${sscko_np ? 1 : 0}">
        <input type="hidden" name="sscko_prosedurr[]" value="${sscko_prosedurr ? 1 : 0}">
        <input type="hidden" name="sscko_lokasi[]" value="${sscko_lokasi? 1 : 0}">
        <input type="hidden" name="sscko_antibiotik[]" value="${sscko_antibiotik ? 1 : 0}">
        <input type="hidden" name="sscko_bedah[]" value="${sscko_bedah}">
        <input type="hidden" name="sscko_anastesiii[]" value="${sscko_anastesiii}">
        <input type="hidden" name="sscko_perawat[]" value="${sscko_perawat}">
        <input type="hidden" name="sscko_foto[]" value="${sscko_foto}">
    
        <input type="hidden" name="sscko_npt[]" value="${sscko_npt ? 1 : 0}">
        <input type="hidden" name="sscko_instrumen[]" value="${sscko_instrumen ? 1 : 0}">
        <input type="hidden" name="sscko_specimen[]" value="${sscko_specimen ? 1 : 0}">
        <input type="hidden" name="sscko_adakah[]" value="${sscko_adakah}">
        <input type="hidden" name="sscko_operator[]" value="${sscko_operator ? 1 : 0}">
        <input type="hidden" name="sscko_tanggal_tindakan[]" value="${sscko_tanggal_tindakan}">
        
        <tr>
            <td rowspan="4" class="nomer-surgical-kamar-operasi text-center">${++number}</td>
            <td rowspan="4" class="text-center">
                <input type="hidden" name="sscko_tanggal_sign_in[]" value="${sscko_tanggal_sign_in}">${sscko_tanggal_sign_in}
            </td>
            <td>Dokter Anestesi :</td>
            <td rowspan="4" class="text-center">
                <input type="hidden" name="sscko_tanggal_time_out[]" value="${sscko_tanggal_time_out}">${sscko_tanggal_time_out}
            </td>
            <td>Dokter Anestesi :</td>
            <td rowspan="4" class="text-center">
                <input type="hidden" name="sscko_tanggal_sign_out[]" value="${sscko_tanggal_sign_out}">${sscko_tanggal_sign_out}
            </td>
            <td>Dokter Anestesi :</td>
            <td rowspan="4">
                <?= $this->session->userdata('nama') ?>
                <input type="hidden" name="user_surgical_safety_ceklis[]"
                    value="<?= $this->session->userdata("id_translucent") ?>">
            </td>
            <td rowspan="4" class="text-center">
                <button type="button" class="btn btn-secondary btn-xxs" onclick="removeListTable(this)"><i class="fas fa-trash-alt"></i></button>
            </td>
        </tr>

        <tr>
            <td>
                <input class="mr-2" type="hidden" name="sscko_paraf_dokter_anestesi_sign_in[]" value="${sscko_paraf_dokter_anestesi_sign_in ? 1 : 0}">${sscko_paraf_dokter_anestesi_sign_in ? '&check;':'&#10006;'}
                
                <input type="hidden" name="sscko_dokter_anestesi_sign_in[]" value="${id_dokter_anestesi_sign_in}">${sscko_dokter_anestesi_sign_in}
            </td>
            <td>
                <input class="mr-2" type="hidden" name="sscko_paraf_dokter_anestesi_time_out[]" value="${sscko_paraf_dokter_anestesi_time_out ? 1 : 0}">${sscko_paraf_dokter_anestesi_time_out ? '&check;':'&#10006;'}

                <input type="hidden" name="sscko_dokter_anestesi_time_out[]" value="${id_dokter_anestesi_time_out}">${sscko_dokter_anestesi_time_out}
            </td>
            <td>
                <input class="mr-2" type="hidden" name="sscko_paraf_dokter_anestesi_sign_out[]" value="${sscko_paraf_dokter_anestesi_sign_out ? 1 : 0}">${sscko_paraf_dokter_anestesi_sign_out ? '&check;':'&#10006;'}

                <input type="hidden" name="sscko_dokter_anestesi_sign_out[]" value="${id_dokter_anestesi_sign_out}">${sscko_dokter_anestesi_sign_out}

            </td>
        </tr>

        <tr>
            <td>
            Perawat Sirkuler :
            </td>
            <td>
            Perawat Sirkuler :
            </td>
            <td>
            Perawat Sirkuler :
            </td>
        </tr>
        <tr>
            <td>
                <input class="mr-1" type="hidden" name="sscko_paraf_perawat_sign_in[]" value="${sscko_paraf_perawat_sign_in ? 1 : 0}">${sscko_paraf_perawat_sign_in ? '&check;':'&#10006;'}
                <input type="hidden" name="sscko_perawat_sign_in[]" value="${id_perawat_sign_in}">${sscko_perawat_sign_in}
            </td>
            <td>
                <input class="mr-1" type="hidden" name="sscko_paraf_perawat_time_out[]" value="${sscko_paraf_perawat_time_out ? 1 : 0}">${sscko_paraf_perawat_time_out ? '&check;':'&#10006;'}
                <input type="hidden" name="sscko_perawat_time_out[]" value="${id_perawat_time_out}">${sscko_perawat_time_out}
            </td>
            <td>
                <input class="mr-1" type="hidden" name="sscko_paraf_perawat_sign_out[]" value="${sscko_paraf_perawat_sign_out ? 1 : 0}">${sscko_paraf_perawat_sign_out ? '&check;':'&#10006;'}
                <input type="hidden" name="sscko_perawat_sign_out[]" value="${id_perawat_sign_out}">${sscko_perawat_sign_out}
            </td>
        </tr>
    </tbody>
    `;

        $('#tabel-surgical-safety-ceklis-kamar-operasi').append(html);
    }


    // SSCKO 13  
    function showSurgicalSafetyCeklisKamarOperasi(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#tabel-surgical-safety-ceklis-kamar-operasi tbody').empty();
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";
        if (data !== null) {
            $.each(data, function(i, v) {

                const selOp =
                    '<td align="center" rowspan="4"><button type="button" class="btn btn-secondary btn-xs" onclick="detailSurgicalSafetyCeklisKamarOperasi(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-eye"></i></button> <button type="button" class="btn btn-secondary btn-xs" onclick="editSurgicalSafetyCeklisKamarOperasi(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit"></i></button> <button type="button" class="btn btn-secondary btn-xs" onclick="hapusSurgicalSafetyCeklisKamarOperasi(this, ' +
                    v.id +
                    ')"> <i class="fas fa-trash-alt"></i></button> </td>';

                let html = /* html */ `
            <tbody>
                <tr>
                    <td rowspan="4" class="nomer-surgical-kamar-operasi text-center">${(++i)}</td>
                    <td rowspan="4" class="text-center">
                    ${v.sscko_tanggal_sign_in !== null ? v.sscko_tanggal_sign_in:''}
                    </td>
                    <td>Dokter Anestesi :</td>
                    <td rowspan="4" class="text-center">
                    ${v.sscko_tanggal_time_out !== null ? v.sscko_tanggal_time_out:''}
                    </td>
                    <td>Dokter Anestesi :</td>
                    <td rowspan="4" class="text-center">
                    ${v.sscko_tanggal_sign_out !== null ? v.sscko_tanggal_sign_out:''}
                    </td>
                    <td>Dokter Anestesi :</td>
                    <td rowspan="4">
                        ${v.akun_user}
                    </td>
                    ${selOp}
                </tr>
                <tr>
                    <td>
                        ${v.sscko_paraf_dokter_anestesi_sign_in == '1' ? '&check;':'&#10006;'}
                        ${v.dokter_anestesi_sign_in}
                    </td>
                    <td>
                        ${v.sscko_paraf_dokter_anestesi_time_out == '1' ? '&check;':'&#10006;'}
                        ${v.dokter_anestesi_time_out}
                    </td>
                    <td>
                        ${v.sscko_paraf_dokter_anestesi_sign_out == '1' ? '&check;':'&#10006;'}
                        ${v.dokter_anestesi_sign_out}
                    </td>
                </tr>
                <tr>
                    <td>
                    Perawat Sirkuler :
                    </td>
                    <td>
                    Perawat Sirkuler :
                    </td>
                    <td>
                    Perawat Sirkuler :
                    </td>
                </tr>
                <tr>
                    <td>
                        ${v.sscko_paraf_perawat_sign_in == '1' ? '&check;':'&#10006;'}
                        ${v.perawat_sign_in}
                        </td>
                        <td>
                        ${v.sscko_paraf_perawat_time_out == '1' ? '&check;':'&#10006;'}
                        ${v.perawat_time_out}
                    </td>
                    <td>
                        ${v.sscko_paraf_perawat_sign_out == '1' ? '&check;':'&#10006;'}
                        ${v.perawat_sign_out}
                    </td>
                </tr>
            </tbody>
            `;
                $('#tabel-surgical-safety-ceklis-kamar-operasi').append(html);
            })
        }
    }

    // SSCKO 14
    function detailSurgicalSafetyCeklisKamarOperasi(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_operasi/api/order_operasi/get_surgical_safety_ceklis_kamar_operasi") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                const modal = $('#modal-detail-surgical-safety-ceklis-kamar-operasi').modal('show');
                $('#table-detail-surgical-safety-ceklis-kamar-operasi tbody').empty();
                let html = /* html */ `

            <tbody>
                <tr class="text-center">
                    <td colspan="2">Diklakukan oleh perawat dan dokter anestesi
                    </td>
                    <td colspan="2">Diklakukan oleh perawat, dokter anestesi dan
                        ahli bedah</td>
                    <td colspan="2">Diklakukan oleh perawat, dokter anestesi dan
                        ahli bedah</td>
                </tr>
                <tr>
                    <td colspan="2"><b>VERIFIKASI</b></td>
                    <td colspan="2"><b>KELENGKAPAN TIM DAN FASILITAS OPERASI</b>
                    </td>
                    <td colspan="2"><b>BACA SECARA VERBAL</b></td>
                </tr>


                <tr>
                    <td>
                    1. Pasien sudah di konfirmasi
                    </td>
                    <td>
                        
                    </td>
                    <td>
                    1. Konfirmasi seluruh anggota tim (nama dan peran masing-masing)
                    </td>
                    <td>
                        <span id="dsscko-konfirmasi"></span> 
                    </td>
                    <td>
                    1. Perawat melakukann konfirmasi secara verbal
                    </td>
                    <td>
                        
                    </td>
                </tr>


                <tr>
                    <td>
                        - Identitas dan gelang pasien
                    </td>
                    <td>
                        <span id="dsscko-igp"></span> 
                    </td>
                    <td>
                            2. Konfirmasi secara verbal 
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        - Nama prosedur tindakan
                    </td>
                    <td>
                         <span id="dsscko-npt"></span> 
                    </td>
                </tr>


                <tr>
                    <td>
                        - Lokasi operasi
                    </td>
                    <td>
                        <span id="dsscko-lo"></span>                            
                    </td>
                    <td>
                        - Nama pasien 
                    </td>
                    <td>
                        <span id="dsscko-np"></span> 
                    </td>
                    <td>
                        - Instrumen, kasa, dan jarum telah di hitung secara lengkap 
                    </td>
                    <td>
                        <span id="dsscko-instrumen"></span> 
                    </td>
                </tr>


                <tr>
                    <td>
                        - Prosedur
                    </td>
                    <td>
                         <span id="dsscko-prosedur"></span> 
                    </td>
                    <td>
                        - Prosedur
                    </td>
                    <td>
                        <span id="dsscko-prosedurr"></span> 
                    </td>
                    <td>
                        - Specimen telah diberi label 9 termasuk anma pasien & asal jaringan spacimen)
                    </td>
                    <td>
                        <span id="dsscko-specimen"></span>   
                    </td>
                </tr>


                <tr>
                    <td>
                        - Surat izin operasi
                    </td>
                    <td>
                        <span id="dsscko-sio"></span>    
                    </td>
                    <td>
                        - Lokasi dimana insisi akan dibuat
                    </td>
                    <td>
                        <span id="dsscko-lokasi"></span>  
                    </td>
                    <td>
                        - Adakah masalah dengan peralatan selama operasi
                    </td>
                    <td>
                        <span class="mr-1" id="dsscko-adakah-ya"></span>Ya
                        <span class="mr-1 ml-3" id="dsscko-adakah-tidak"></span>tidak
                    </td>
                </tr>


                <tr>
                    <td>
                        2. Lokasi operasi sudah diberi tanda?
                    </td>
                    <td>
                        <span class="mr-1" id="dsscko-tanda-ya"></span>Ya
                        <span class="mr-1 ml-3" id="dsscko-tanda-tidak"></span>tidak
                    </td>
                    <td>
                        3. Antibiotik profilaksis telah diberikan dalam 60 menit sebelumnya?
                    </td>
                    <td>
                        <span id="dsscko-antibiotik"></span>  
                    </td>
                    <td colspan="2">
                        2. Operator dokter bedah, dokter anastesi dan perawat melakukan riview masalah utama apa yang harus diperhatikan untuk penyembuhan dan manajemen pasien selanjutnya &nbsp;&nbsp;&nbsp; <span id="dsscko-operator"></span>  
                    </td>               
                </tr>


                <tr>
                    <td colspan="2">
                        3. Mesin anastesi dan obat-obatan sudah di cek lengkap?
                        <span id="dsscko-mesin"></span> 
                    </td>
                  
                    <td colspan="2">
                        4. Antisipasi kejadian kritis : <br>
                           <b>- Review dokter bedah :</b> Langkah apa yang akan dilakukan bila kondisi kritis atau - kejadian yang tidak diharapkan, lamanya operasi, kemungkinan kehilangan darah...? 
                            <span id="dsscko-bedah"></span> 
                    </td>
                    <td colspan="2">
                        - Tanggal Tindakan Verivikasi 
                        <span id="dsscko-tanggal-tindakan"></span> 
                    </td>
                </tr>
        

            
                <tr>
                    <td>
                        4. Monitor anastesi berfungsi baik?
                    </td>
                    <td>
                        <span id="dsscko-monitor"></span> 
                    </td>
                    <td colspan="2">
                    <b>- Review dokter anastesi :</b> apa ada hal khusus yang perlu di perhatikan pada pasien...?
                    <span id="dsscko-anastesiii"></span> 

                    </td>
                    <td>
                        
                    </td>
                    <td></td>
                    <td>
                        
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        5. apakah pasien mempunyai riwayat alergi?
                   
                        <span class="mr-1" id="dsscko-alergi-tidak"></span>tidak
                        <span class="mr-1 ml-3" id="dsscko-alergi-ya"></span>ya,<br>
                         Sebutkan  <span id="dsscko-sebut"></span>  
                    </td>

                    
                    <td colspan="2">
                    <b>- Review tim perawat :</b> apakah peralatan sudah seteril, adakah alat-alat yang perlu diperhatikan khusus atau dalam masalah...? 
                    <span id="dsscko-perawat"></span>  
                    </td>
                    <td>
                        
                    </td>
                    <td></td>
                    <td>
                        
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        6. Kemungkinan kesulitan jalan nafas atau resiko aspirasi? <br>
                        <span class="mr-1" id="dsscko-kemungkinan-tidak"></span>Tidak &nbsp;
                        <span class="mr-1 ml-3" id="dsscko-kemungkinan-ya"></span> Peralatan dan asisten telah tersedia     
                    </td>
                    <td colspan="2">
                        5. Foto Rongent/CT Scan/MRI yang diperlukan telah ditayangkan
                        <span class="mr-1" id="dsscko-foto-tidak"></span>Tidak dilakukan
                        <span class="mr-1 ml-3" id="dsscko-foto-ya"></span>ya
                        
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        7. Resiko kehilangan darah > 500ml/kgBB pada anak &nbsp;&nbsp;
                        <span class="mr-1" id="dsscko-resiko-tidak"></span>Tidak &nbsp;
                        <span class="mr-1 ml-3" id="dsscko-resiko-ya"></span>ya, Tersedia dua akses intravena/sentral dan terapi cairan sudah di rencanakan  
                    </td>
                  
                </tr>

            
                <tr>
                    <td colspan="2">
                        8. Rencana Penampilan implant?                
                    </td>
                    </tr>
                    <tr>
                    <td colspan="3">  
                        <span class="mr-1" id="dsscko-rencana-tidak"></span>Tidak &nbsp;&nbsp;&nbsp;
                        <span class="mr-1 ml-3" id="dsscko-rencana-ya"></span>Ya, jenis &nbsp;&nbsp;&nbsp;
                        <span id="dsscko-jenis"></span>               
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        9. Rencana anastesi &nbsp;&nbsp;&nbsp;
                            <span class="mr-1" id="dsscko-anastesi-1"></span>Umum
                            <span class="ml-3 mr-1" id="dsscko-anastesi-2"></span>Spinal
                            <span class="ml-3 mr-1" id="dsscko-anastesi-3"></span>Blok
                            <span class="ml-3 mr-1" id="dsscko-anastesi-4"></span>Lokal
                    </td>
                    <td>
                    
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                </tr>
            
        
            
                <tr>
                        <td>
                            <b>TANGGAL & JAM VERIFIKASI</b>
                        </td>
                        <td>
                            <span id="dsscko-tanggal-sign-in"></span>
                        </td>
                        <td>
                            <b>TANGGAL & JAM VERIFIKASI</b>
                        </td>
                        <td>
                            <span id="dsscko-tanggal-time-out"></span>
                        </td>
                        <td>
                            <b>TANGGAL & JAM VERIFIKASI</b>
                        </td>
                        <td>
                            <span id="dsscko-tanggal-sign-out"></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>NAMA DAN TANDA TANGAN</b></td>
                        <td colspan="2"><b>NAMA DAN TANDA TANGAN</b></td>
                        <td colspan="2"><b>NAMA DAN TANDA TANGAN</b></td>
                    </tr>
                    <tr>
                        <td>
                            Tanda tangan
                        </td>
                        <td>
                            <span id="dsscko-paraf-perawat-sign-in"></span>
                        </td>
                        <td>Tanda tangan</td>
                        <td>
                            <span id="dsscko-paraf-perawat-time-out"></span>
                        </td>
                        <td>Tanda tangan</td>
                        <td>
                            <span id="dsscko-paraf-perawat-sign-out"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Perawat Sirkuler
                        </td>
                        <td>
                            <span id="dsscko-perawat-sign-in"></span>
                        </td>
                        <td>
                            Perawat Sirkuler
                        </td>
                        <td>
                            <span id="dsscko-perawat-time-out"></span>
                        </td>
                        <td>
                            Perawat Sirkuler
                        </td>
                        <td>
                            <span id="dsscko-perawat-sign-out"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tanda tangan
                        </td>
                        <td>
                            <span id="dsscko-paraf-dokter-anestesi-sign-in"></span>
                        </td>
                        <td>Tanda tangan</td>
                        <td>
                            <span id="dsscko-paraf-dokter-anestesi-time-out"></span>
                        </td>
                        <td>
                            Tanda tangan
                        </td>
                        <td>
                            <span id="dsscko-paraf-dokter-anestesi-sign-out"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Dokter Anestesi
                        </td>
                        <td>
                            <span id="dsscko-dokter-sign-in"></span>
                        </td>
                        <td>
                            Dokter Anestesi
                        </td>
                        <td>
                            <span id="dsscko-dokter-time-out"></span>
                        </td>
                        <td>
                            Dokter Anestesi
                        </td>
                        <td>
                            <span id="dsscko-dokter-sign-out"></span>
                        </td>
                    </tr>
            </tbody>
             `;

                $('#table-detail-surgical-safety-ceklis-kamar-operasi').append(html);

                $('#modal-detail-surgical-safety-ceklis-kamar-operasi').modal('show');

                $('#dsscko-igp').html(data.sscko_igp == '1' ? '&check;' : '&#10006;');
                $('#dsscko-lo').html(data.sscko_lo == '1' ? '&check;' : '&#10006;');
                $('#dsscko-prosedur').html(data.sscko_prosedur == '1' ? '&check;' : '&#10006;');
                $('#dsscko-sio').html(data.sscko_sio == '1' ? '&check;' : '&#10006;');
                $('#dsscko-tanda-ya').html(data.sscko_tanda == '1' ? '&check;' : '&#10006;');
                $('#dsscko-tanda-tidak').html(data.sscko_tanda == '0' ? '&check;' : '&#10006;');
                $('#dsscko-mesin').html(data.sscko_mesin == '1' ? '&check;' : '&#10006;');
                $('#dsscko-monitor').html(data.sscko_monitor == '1' ? '&check;' : '&#10006;');
                $('#dsscko-alergi-tidak').html(data.sscko_alergi == '0' ? '&check;' : '&#10006;');
                $('#dsscko-alergi-ya').html(data.sscko_alergi == '1' ? '&check;' : '&#10006;');
                $('#dsscko-sebut').html(data.sscko_sebut);
                $('#dsscko-kemungkinan-tidak').html(data.sscko_kemungkinan == '0' ? '&check;' : '&#10006;');
                $('#dsscko-kemungkinan-ya').html(data.sscko_kemungkinan == '1' ? '&check;' : '&#10006;');
                $('#dsscko-resiko-tidak').html(data.sscko_resiko == '0' ? '&check;' : '&#10006;');
                $('#dsscko-resiko-ya').html(data.sscko_resiko == '1' ? '&check;' : '&#10006;');
                $('#dsscko-rencana-tidak').html(data.sscko_rencana == '0' ? '&check;' : '&#10006;');
                $('#dsscko-rencana-ya').html(data.sscko_rencana == '1' ? '&check;' : '&#10006;');
                $('#dsscko-jenis').html(data.sscko_jenis);
                $('#dsscko-anastesi-1').html(data.sscko_anastesi == '1' ? '&check;' : '&#10006;');
                $('#dsscko-anastesi-2').html(data.sscko_anastesi == '2' ? '&check;' : '&#10006;');
                $('#dsscko-anastesi-3').html(data.sscko_anastesi == '3' ? '&check;' : '&#10006;');
                $('#dsscko-anastesi-4').html(data.sscko_anastesi == '4' ? '&check;' : '&#10006;');

                $('#dsscko-konfirmasi').html(data.sscko_konfirmasi == '1' ? '&check;' : '&#10006;');
                $('#dsscko-np').html(data.sscko_np == '1' ? '&check;' : '&#10006;');
                $('#dsscko-prosedurr').html(data.sscko_prosedurr == '1' ? '&check;' : '&#10006;');
                $('#dsscko-lokasi').html(data.sscko_lokasi == '1' ? '&check;' : '&#10006;');
                $('#dsscko-antibiotik').html(data.sscko_antibiotik == '1' ? '&check;' : '&#10006;');
                $('#dsscko-bedah').html(data.sscko_bedah);
                $('#dsscko-anastesiii').html(data.sscko_anastesiii);
                $('#dsscko-perawat').html(data.sscko_perawat);
                $('#dsscko-foto-tidak').html(data.sscko_foto == '0' ? '&check;' : '&#10006;');
                $('#dsscko-foto-ya').html(data.sscko_foto == '1' ? '&check;' : '&#10006;');

                $('#dsscko-npt').html(data.sscko_npt == '1' ? '&check;' : '&#10006;');
                $('#dsscko-instrumen').html(data.sscko_instrumen == '1' ? '&check;' : '&#10006;');
                $('#dsscko-specimen').html(data.sscko_specimen == '1' ? '&check;' : '&#10006;');
                $('#dsscko-adakah-tidak').html(data.sscko_adakah == '0' ? '&check;' : '&#10006;');
                $('#dsscko-adakah-ya').html(data.sscko_adakah == '1' ? '&check;' : '&#10006;');
                $('#dsscko-operator').html(data.sscko_operator == '1' ? '&check;' : '&#10006;');
                // console.log()
                $('#dsscko-tanggal-tindakan').html(data.sscko_tanggal_tindakan);

                $('#dsscko-paraf-perawat-sign-in').html(data.sscko_paraf_perawat_sign_in == '1' ? '&check;' : '&#10006;');
                $('#dsscko-paraf-perawat-time-out').html(data.sscko_paraf_perawat_time_out == '1' ? '&check;' : '&#10006;');
                $('#dsscko-paraf-perawat-sign-out').html(data.sscko_paraf_perawat_sign_out == '1' ? '&check;' : '&#10006;');

                $('#dsscko-paraf-dokter-anestesi-sign-in').html(data.sscko_paraf_dokter_anestesi_sign_in == '1' ? '&check;' : '&#10006;');
                $('#dsscko-paraf-dokter-anestesi-time-out').html(data.sscko_paraf_dokter_anestesi_time_out == '1' ? '&check;' : '&#10006;');
                $('#dsscko-paraf-dokter-anestesi-sign-out').html(data.sscko_paraf_dokter_anestesi_sign_out == '1' ? '&check;' : '&#10006;');

                $('#dsscko-tanggal-sign-in').html(data.sscko_tanggal_sign_in);
                $('#dsscko-tanggal-time-out').html(data.sscko_tanggal_time_out);
                $('#dsscko-tanggal-sign-out').html(data.sscko_tanggal_sign_out);

                $('#dsscko-perawat-sign-in').html(data.perawat_sign_in);
                $('#dsscko-perawat-time-out').html(data.perawat_time_out);
                $('#dsscko-perawat-sign-out').html(data.perawat_sign_out);

                $('#dsscko-dokter-sign-in').html(data.dokter_anestesi_sign_in);
                $('#dsscko-dokter-time-out').html(data.dokter_anestesi_time_out);
                $('#dsscko-dokter-sign-out').html(data.dokter_anestesi_sign_out);



                $('#detail-sscko').empty();
                let dssc = '';
                dssc =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-detail-surgical-safety-ceklis-kamar-operasi').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
        `;
                $('#detail-sscko').append(dssc);
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }


    // SSCKO 15
    function editSurgicalSafetyCeklisKamarOperasi(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {

        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_operasi/api/order_operasi/get_surgical_safety_ceklis_kamar_operasi") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                const modal = $('#modal-edit-surgical-safety-ceklis-kamar-operasi').modal('show');
                $('#table-edit-surgical-safety-ceklis-kamar-operasi tbody').empty();
                let html = /* html */ `
     <tbody>
            <tr class="text-center">
                <td colspan="2">Diklakukan oleh perawat dan dokter anestesi
                </td>
                <td colspan="2">Diklakukan oleh perawat, dokter anestesi dan
                    ahli bedah</td>
                <td colspan="2">Diklakukan oleh perawat, dokter anestesi dan
                    ahli bedah</td>
            </tr>
            <tr>
                <td colspan="2"><b>VERIFIKASI</b></td>
                <td colspan="2"><b>KELENGKAPAN TIM DAN FASILITAS OPERASI</b>
                </td>
                <td colspan="2"><b>BACA SECARA VERBAL</b></td>
            </tr>



            <tr>
                <td colspan="2">
                1. Pasien sudah di konfirmasi
                </td>
              
                <td colspan="2">
                1. Konfirmasi seluruh anggota tim (nama dan peran masing-masing)&nbsp; &nbsp; 
                <input type="checkbox" name="sscko_konfirmasi" id="esscko-konfirmasi" value="1"> ya  
                </td>
                <td colspan="2">
                1. Perawat melakukann konfirmasi secara verbal                   
                </td>
            </tr>




            <tr>
                <td colspan="2">
                    - Identitas dan gelang pasien &nbsp; &nbsp;
                    <input type="checkbox" name="sscko_igp" id="esscko-igp" value="1"> ya
               
                    
                </td>
                <td colspan="2">
                        2. Konfirmasi secara verbal 
                
                    
                </td>
                <td colspan="2">
                    - Nama prosedur tindakan &nbsp; &nbsp;
                    <input type="checkbox" name="sscko_npt" id="esscko-npt" value="1"> ya
               
                    
                </td>
            </tr>


            <tr>
                <td colspan="2">
                    - Lokasi operasi  &nbsp; &nbsp;
                    <input type="checkbox" name="sscko_lo" id="esscko-lo" value="1"> ya
             
                    
                </td>
                <td colspan="2">
                    - Nama pasien  &nbsp; &nbsp;
                    <input type="checkbox" name="sscko_np" id="esscko-np" value="1"> ya
               
                    
                </td>
                <td colspan="2">
                    - Instrumen, kasa, dan jarum telah di hitung secara lengkap  &nbsp; &nbsp;
                    <input type="checkbox" name="sscko_instrumen" id="esscko-instrumen" value="1"> ya 
              
                </td>
            </tr>


            <tr>
                <td colspan="2">
                    - Prosedur &nbsp; &nbsp;
                    <input type="checkbox" name="sscko_prosedur" id="esscko-prosedur" value="1"> ya
                </td>
               
                <td colspan="2">
                    - Prosedur &nbsp; &nbsp;
                    <input type="checkbox" name="sscko_prosedurr" id="esscko-prosedurr" value="1"> ya
                </td>
              
                <td colspan="2">
                    - Specimen telah diberi label 9 termasuk anma pasien & asal jaringan spacimen) &nbsp; &nbsp;
                    <input type="checkbox" name="sscko_specimen" id="esscko-specimen" value="1"> ya
                </td>
              
            </tr>


            <tr>
                <td colspan="2">
                    - Surat izin operasi  &nbsp; &nbsp;
                    <input type="checkbox" name="sscko_sio" id="esscko-sio" value="1"> ya
                </td>
               
                <td colspan="2">
                    - Lokasi dimana insisi akan dibuat  &nbsp; &nbsp;
                    <input type="checkbox" name="sscko_lokasi" id="esscko-lokasi" value="1"> ya
                </td>
              
                <td colspan="2">
                    - Adakah masalah dengan peralatan selama operasi  &nbsp; &nbsp;
                    <input class="mr-1" type="radio" name="sscko_adakah" id="esscko-adakah-ya" value="1">Ya
                    <input class="ml-2 mr-1" type="radio" name="sscko_adakah" id="esscko-adakah-tidak" value="0">Tidak
                </td>
              
            </tr>


            <tr>
                <td colspan="2">
                    2. Lokasi operasi sudah diberi tanda? &nbsp;
                    <input class="mr-1" type="radio" name="sscko_tanda" id="esscko-tanda-ya" value="1">Ya
                    <input class="ml-2 mr-1" type="radio" name="sscko_tanda" id="esscko-tanda-tidak" value="0">Tidak dilakukan
                </td>
               
                <td colspan="2">
                    3. Antibiotik profilaksis telah diberikan dalam 60 menit sebelumnya? &nbsp;
                    <input type="checkbox" name="sscko_antibiotik" id="esscko-antibiotik" value="1"> ya
                </td>
               
                <td colspan="2">
                    2. Operator dokter bedah, dokter anastesi dan perawat melakukan riview masalah utama apa yang harus diperhatikan untuk penyembuhan dan manajemen pasien selanjutnya &nbsp;&nbsp;&nbsp;<input type="checkbox" name="sscko_operator" id="esscko-operator" value="1"> ya
                </td>               
            </tr>


            <tr>
                <td colspan="2">
                    3. Mesin anastesi dan obat-obatan sudah di cek lengkap? &nbsp;&nbsp;
                    <input type="checkbox" name="sscko_mesin" id="esscko-mesin" value="1"> ya
                </td>
               
                <td colspan="2">
                    4. Antisipasi kejadian kritis : <br>
                       <b>- Review dokter bedah :</b> Langkah apa yang akan dilakukan bila kondisi kritis atau - kejadian yang tidak diharapkan, lamanya operasi, kemungkinan kehilangan darah...? 
                    <input type="text" name="sscko_bedah" id="esscko-bedah"class="custom-form clear-input d-inline-block col-lg-10 ml-2"placeholder="silahkan di isi..............................................."> 
                </td>
                <td colspan="2">
                    - Tanggal Tindakan Verivikasi <input type="text" name="sscko_tanggal_tindakan" id="esscko-tanggal-tindakan" class="custom-form clear-input d-inline-block col-lg-3 ml-2"placeholder="isi tanggal "> 
                </td>
            </tr>
        

            
            <tr>
                <td colspan="2">
                    4. Monitor anastesi berfungsi baik? &nbsp;&nbsp;
                    <input type="checkbox" name="sscko_monitor" id="esscko-monitor" value="1"> ya
                </td>
              
                <td colspan="2">
                <b>- Review dokter anastesi :</b> apa ada hal khusus yang perlu di perhatikan pada pasien...? <input type="text" name="sscko_anastesiii" id="esscko-anastesiii"class="custom-form clear-input d-inline-block col-lg-10 ml-2"placeholder="silahkan di isi...............">              
                    
                </td>
            </tr>


            <tr>
                <td colspan="2">
                    5. apakah pasien mempunyai riwayat alergi?
                    <input class="ml-2 mr-1" type="radio" name="sscko_alergi" id="esscko-alergi-tidak" value="0">Tidak
                    <input class="mr-1" type="radio" name="sscko_alergi" id="esscko-alergi-ya" value="1">Ya, <br>
                    Sebutkan<input type="text" name="sscko_sebut" id="esscko-sebut"class="custom-form clear-input d-inline-block col-lg-5 ml-2"
                    placeholder="sebutkan">
                </td>
               

                
                <td colspan="2">
                <b>- Review tim perawat :</b> apakah peralatan sudah seteril, adakah alat-alat yang perlu diperhatikan khusus atau dalam masalah...? <input type="text" name="sscko_perawat" id="esscko-perawat"class="custom-form clear-input d-inline-block col-lg-9 ml-2"placeholder="silahkan di isi...............">
                                 
                </td>
            </tr>


            <tr>
                <td colspan="2">
                    6. Kemungkinan kesulitan jalan nafas atau resiko aspirasi? <br>
                    <input class="ml-2 mr-1" type="radio" name="sscko_kemungkinan" id="esscko-kemungkinan-tidak" value="0">Tidak &nbsp;&nbsp;&nbsp;
                    <input class="mr-1" type="radio" name="sscko_kemungkinan" id="esscko-kemungkinan-ya" value="1"> Peralatan dan asisten telah tersedia       
                </td>
                <td colspan="2">
                    5. Foto Rongent/CT Scan/MRI yang diperlukan telah ditayangkan <br>
                    <input class="ml-2 mr-1" type="radio" name="sscko_foto" id="esscko-foto-tidak" value="0">Tidak dilakukan
                    <input class="mr-1" type="radio" name="sscko_foto" id="esscko-foto-ya" value="1">Ya           
                    
                </td>
            </tr>


            <tr>
                <td colspan="2">
                    7. Resiko kehilangan darah > 500ml/kgBB pada anak &nbsp;&nbsp;&nbsp;
                    <input class="ml-2 mr-1" type="radio" name="sscko_resiko" id="esscko-resiko-tidak" value="0">Tidak &nbsp;&nbsp;&nbsp; 
                    <input class="mr-1" type="radio" name="sscko_resiko" id="esscko-resiko-ya" value="1"> ya, Tersedia dua akses intravena/sentral dan terapi cairan sudah di rencanakan 
                    
                </td>
               
            </tr>

            
            <tr>
                <td colspan="2">
                    8. Rencana Penampilan implant?   
                    <input class="ml-2 mr-1" type="radio" name="sscko_rencana" id="esscko-rencana-tidak" value="0">Tidak &nbsp;
                    <input class="mr-1" type="radio" name="sscko_rencana" id="esscko-rencana-ya" value="1">Ya,  
                    jenis<input type="text" name="sscko_jenis" id="esscko-jenis"class="custom-form clear-input d-inline-block col-lg-3 ml-2"
                    placeholder="sebutkan">              
                </td>
            </tr>


            <tr>
                <td colspan="2">
                    9. Rencana anastesi &nbsp;&nbsp;&nbsp;
                    <input class="mr-1" type="radio" name="sscko_anastesi"id="esscko-anastesi-1" value="1">Umum
                    <input class="ml-3 mr-1" type="radio"name="sscko_anastesi" id="esscko-anastesi-2" value="2">Regional
                    <input class="ml-3 mr-1" type="radio" name="sscko_anastesi"id="esscko-anastesi-3" value="3">Blok
                    <input class="ml-3 mr-1" type="radio"name="sscko_anastesi" id="esscko-anastesi-4" value="4">Lokal
                    <td colspan="2">
                </td>
            </tr>
                       
            <tr>
                <td colspan="2"><b>TANGGAL & JAM VERIFIKASI</b>
                    <input type="text" name="sscko_tanggal_sign_in" id="esscko-tanggal-sign-in"
                    class="custom-form clear-d-inline-block col-lg-4"
                    placeholder="dd/mm/yyyy hh:mm"></td>


                <td colspan="2"><b>TANGGAL & JAM VERIFIKASI</b>               
                    <input type="text" name="sscko_tanggal_time_out" id="esscko-tanggal-time-out"
                    class="custom-form clear-d-inline-block col-lg-4"
                    placeholder="dd/mm/yyyy hh:mm">
                </td>


                <td colspan="2"><b>TANGGAL & JAM VERIFIKASI</b>
                    <input type="text" name="sscko_tanggal_sign_out" id="esscko-tanggal-sign-out"
                    class="custom-form clear-d-inline-block col-lg-4"
                    placeholder="dd/mm/yyyy hh:mm">
                </td>
            </tr>


            <tr>
                <td colspan="2"><b>NAMA DAN TANDA TANGAN</b></td>
                <td colspan="2"><b>NAMA DAN TANDA TANGAN</b></td>
                <td colspan="2"><b>NAMA DAN TANDA TANGAN</b></td>
            </tr>

            <tr>
                <td colspan="2">Tanda tangan &nbsp;&nbsp;
          
                        <input type="checkbox"
                            name="sscko_paraf_perawat_sign_in"
                            id="esscko-paraf-perawat-sign-in">
                    
                </td>
                <td colspan="2">Tanda tangan &nbsp;&nbsp;
            
                        <input type="checkbox"
                            name="sscko_paraf_perawat_time_out"
                            id="esscko-paraf-perawat-time-out">
                    
                </td>
                <td colspan="2">Tanda tangan &nbsp;&nbsp;
                
                        <input type="checkbox"
                            name="sscko_paraf_perawat_sign_out"
                            id="esscko-paraf-perawat-sign-out">
                    
                </td>
            </tr>


            <tr>
                <td>Perawat Sirkuler</td>
                <td>
                    <input type="text" name="sscko_perawat_sign_in"
                        id="esscko-perawat-sign-in"
                        class="select2c-input">
                </td>
                <td>Perawat Sirkuler</td>
                <td>
                    <input type="text" name="sscko_perawat_time_out"
                        id="esscko-perawat-time-out"
                        class="select2c-input">
                </td>
                <td>Perawat Sirkuler</td>
                <td>
                    <input type="text" name="sscko_perawat_sign_out"
                        id="esscko-perawat-sign-out"
                        class="select2c-input">
                </td>
            </tr>



            <tr>
                <td colspan="2">Tanda tangan &nbsp;&nbsp;
                
                    <input type="checkbox"
                        name="sscko_paraf_dokter_anestesi_sign_in"
                        id="esscko-paraf-dokter-anestesi-sign-in">
                </td>
                <td colspan="2">Tanda tangan &nbsp;&nbsp;
                
                    <input type="checkbox"
                        name="sscko_paraf_dokter_anestesi_time_out"
                        id="esscko-paraf-dokter-anestesi-time-out">
                </td>
                <td colspan="2">Tanda tangan &nbsp;&nbsp;
                
                    <input type="checkbox"
                        name="sscko_paraf_dokter_anestesi_sign_out"
                        id="esscko-paraf-dokter-anestesi-sign-out">
                </td>
            </tr>



            <tr>
                <td>Dokter Anestesi</td>
                <td>
                    <input type="text" name="sscko_dokter_anestesi_sign_in"
                        id="esscko-dokter-anestesi-sign-in"
                        class="select2c-input">
                </td>
                <td>Dokter Anestesi</td>
                <td>
                    <input type="text" name="sscko_dokter_anestesi_time_out"
                        id="esscko-dokter-anestesi-time-out"
                        class="select2c-input">
                </td>
                <td>Dokter Anestesi</td>
                <td>
                    <input type="text" name="sscko_dokter_anestesi_sign_out"
                        id="esscko-dokter-anestesi-sign-out"
                        class="select2c-input">
                </td>
            </tr>
            
        </tbody>

        `;
                $('#table-edit-surgical-safety-ceklis-kamar-operasi').append(html);

                $('#modal-edit-surgical-safety-ceklis-kamar-operasi').modal('show');
                $('#update-sscko').empty();
                $('#id-surgical-safety-ceklis-kamar-operasi').val(id);

                $('#esscko-dokter-anestesi-sign-in, #esscko-dokter-anestesi-time-out, #esscko-dokter-anestesi-sign-out')
                    .select2c({
                        ajax: {
                            url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                            dataType: 'json',
                            quietMillis: 100,
                            data: function(term,
                                page) { // page is the one-based page number tracked by Select2
                                return {
                                    q: term, //search term
                                    page: page, // page number
                                    jenis: 18,
                                };
                            },
                            results: function(data, page) {
                                var more = (page * 20) < data
                                    .total; // whether or not there are more results available

                                // notice we return the value of more so Select2 knows if more results can be loaded
                                return {
                                    results: data.data,
                                    more: more
                                };
                            }
                        },
                        formatResult: function(data) {
                            var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                            return markup;
                        },
                        formatSelection: function(data) {
                            return data.nama;
                        }
                    });

                $('#esscko-perawat-sign-in, #esscko-perawat-time-out, #esscko-perawat-sign-out')
                    .select2c({
                        ajax: {
                            url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                            dataType: 'json',
                            quietMillis: 100,
                            data: function(term,
                                page) { // page is the one-based page number tracked by Select2
                                return {
                                    q: term, //search term
                                    page: page, // page number
                                    jenis: 18,
                                };
                            },
                            results: function(data, page) {
                                var more = (page * 20) < data
                                    .total; // whether or not there are more results available

                                // notice we return the value of more so Select2 knows if more results can be loaded
                                return {
                                    results: data.data,
                                    more: more
                                };
                            }
                        },
                        formatResult: function(data) {
                            var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                            return markup;
                        },
                        formatSelection: function(data) {
                            return data.nama;
                        }
                    });

                $('#esscko-tanggal-sign-in, #esscko-tanggal-time-out, #esscko-tanggal-sign-out')
                    .datetimepicker({
                        format: 'DD/MM/YYYY HH:mm',
                        maxDate: new Date(),
                        beforeShow: function(i) {
                            if ($(i).attr('readonly')) {
                                return false;
                            }
                        }
                    });



                // SSCKO TADI MALAM
                $('#esscko-tanggal-tindakan')
                    .datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: new Date(),
                        beforeShow: function(i) {
                            if ($(i).attr('readonly')) {
                                return false;
                            }
                        }
                    });

                // SSCKO 
                $('input[type=radio][name=sscko_alergi]').change(function() {
                    if (this.value == '0') {
                        $('#esscko-sebut').val('');
                        $('#esscko-sebut').prop('disabled', true);
                    } else {
                        $('#esscko-sebut').val('');
                        $('#esscko-sebut').prop('disabled', false);
                    }
                });

                $('input[type=radio][name=sscko_rencana]').change(function() {
                    if (this.value == '0') {
                        $('#esscko-jenis').val('');
                        $('#esscko-jenis').prop('disabled', true);
                    } else {
                        $('#esscko-jenis').val('');
                        $('#esscko-jenis').prop('disabled', false);
                    }
                });

                let esscko = '';
                esscko =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-surgical-safety-ceklis-kamar-operasi').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
        <button type="button" class="btn btn-info waves-effect" onclick="updateSurgicalSafetyCeklisKamarOperasi(${id}, ${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-sscko').append(esscko);

                function formatTanggaljamKhusus(waktu) {
                    var el = waktu.split(' ');
                    var elem_tgl = el[0].split('-');
                    var elem_waktu = el[1];
                    var tahun = elem_tgl[0];
                    var bulan = elem_tgl[1];
                    var hari = elem_tgl[2];
                    return hari + '/' + bulan + '/' + tahun + ' ' + elem_waktu;
                }

                //  sign in
                if (data.sscko_igp == '1') {
                    $('#esscko-igp').prop('checked', true)
                }
                if (data.sscko_lo == '1') {
                    $('#esscko-lo').prop('checked', true)
                }
                if (data.sscko_prosedur == '1') {
                    $('#esscko-prosedur').prop('checked', true)
                }
                if (data.sscko_sio == '1') {
                    $('#esscko-sio').prop('checked', true)
                }
                if (data.sscko_tanda == '1') {
                    $('#esscko-tanda-ya').prop('checked', true)
                }
                if (data.sscko_tanda == '0') {
                    $('#esscko-tanda-tidak').prop('checked', true)
                }
                if (data.sscko_mesin == '1') {
                    $('#esscko-mesin').prop('checked', true)
                }
                if (data.sscko_monitor == '1') {
                    $('#esscko-monitor').prop('checked', true)
                }
                if (data.sscko_alergi == '0') {
                    $('#esscko-alergi-tidak').prop('checked', true)
                }
                if (data.sscko_alergi == '1') {
                    $('#esscko-alergi-ya').prop('checked', true)
                }
                $('#esscko-sebut').val(data.sscko_sebut);
                if (data.sscko_kemungkinan == '1') {
                    $('#esscko-kemungkinan-ya').prop('checked', true)
                }
                if (data.sscko_kemungkinan == '0') {
                    $('#esscko-kemungkinan-tidak').prop('checked', true)
                }
                if (data.sscko_resiko == '1') {
                    $('#esscko-resiko-ya').prop('checked', true)
                }
                if (data.sscko_resiko == '0') {
                    $('#esscko-resiko-tidak').prop('checked', true)
                }
                if (data.sscko_rencana == '1') {
                    $('#esscko-rencana-ya').prop('checked', true)
                }
                if (data.sscko_rencana == '0') {
                    $('#esscko-rencana-tidak').prop('checked', true)
                }
                $('#esscko-jenis').val(data.sscko_jenis);
                if (data.sscko_anastesi == '1') {
                    $('#esscko-anastesi-1').prop('checked', true)
                }
                if (data.sscko_anastesi == '2') {
                    $('#esscko-anastesi-2').prop('checked', true)
                }
                if (data.sscko_anastesi == '3') {
                    $('#esscko-anastesi-3').prop('checked', true)
                }
                if (data.sscko_anastesi == '4') {
                    $('#esscko-anastesi-4').prop('checked', true)
                }

                if (data.sscko_tanggal_sign_in !== null) {
                    let esscko_tanggal_sign_in = formatTanggaljamKhusus(data.sscko_tanggal_sign_in);
                    $('#esscko-tanggal-sign-in').val(esscko_tanggal_sign_in);
                }
                if (data.sscko_paraf_dokter_anestesi_sign_in == '1') {
                    $('#esscko-paraf-dokter-anestesi-sign-in').prop('checked', true)
                }
                $('#esscko-dokter-anestesi-sign-in').val(data.sscko_dokter_anestesi_sign_in);
                $('#s2id_esscko-dokter-anestesi-sign-in a .select2c-chosen').html(data.dokter_anestesi_sign_in);

                if (data.sscko_paraf_perawat_sign_in == '1') {
                    $('#esscko-paraf-perawat-sign-in').prop('checked', true)
                }
                $('#esscko-perawat-sign-in').val(data.sscko_perawat_sign_in);
                $('#s2id_esscko-perawat-sign-in a .select2c-chosen').html(data.perawat_sign_in);


                //  time out
                if (data.sscko_konfirmasi == '1') {
                    $('#esscko-konfirmasi').prop('checked', true)
                }
                if (data.sscko_np == '1') {
                    $('#esscko-np').prop('checked', true)
                }
                if (data.sscko_prosedurr == '1') {
                    $('#esscko-prosedurr').prop('checked', true)
                }
                if (data.sscko_lokasi == '1') {
                    $('#esscko-lokasi').prop('checked', true)
                }
                if (data.sscko_antibiotik == '1') {
                    $('#esscko-antibiotik').prop('checked', true)
                }
                $('#esscko-bedah').val(data.sscko_bedah);
                $('#esscko-anastesiii').val(data.sscko_anastesiii);
                $('#esscko-perawat').val(data.sscko_perawat);
                if (data.sscko_foto == '1') {
                    $('#esscko-foto-ya').prop('checked', true)
                }
                if (data.sscko_foto == '0') {
                    $('#esscko-foto-tidak').prop('checked', true)
                }
                if (data.sscko_tanggal_time_out !== null) {
                    let esscko_tanggal_time_out = formatTanggaljamKhusus(data.sscko_tanggal_time_out);
                    $('#esscko-tanggal-time-out').val(esscko_tanggal_time_out);
                }

                if (data.sscko_paraf_dokter_anestesi_time_out == '1') {
                    $('#esscko-paraf-dokter-anestesi-time-out').prop('checked', true)
                }

                $('#esscko-dokter-anestesi-time-out').val(data.sscko_dokter_anestesi_time_out);
                $('#s2id_esscko-dokter-anestesi-time-out a .select2c-chosen').html(data.dokter_anestesi_time_out);

                if (data.sscko_paraf_perawat_time_out == '1') {
                    $('#esscko-paraf-perawat-time-out').prop('checked', true)
                }
                $('#esscko-perawat-time-out').val(data.sscko_perawat_time_out);
                $('#s2id_esscko-perawat-time-out a .select2c-chosen').html(data.perawat_time_out);

                //  sign out
                if (data.sscko_npt == '1') {
                    $('#esscko-npt').prop('checked', true)
                }
                if (data.sscko_instrumen == '1') {
                    $('#esscko-instrumen').prop('checked', true)
                }
                if (data.sscko_specimen == '1') {
                    $('#esscko-specimen').prop('checked', true)
                }
                if (data.sscko_adakah == '0') {
                    $('#esscko-adakah-tidak').prop('checked', true)
                }
                if (data.sscko_adakah == '1') {
                    $('#esscko-adakah-ya').prop('checked', true)
                }
                if (data.sscko_operator == '1') {
                    $('#esscko-operator').prop('checked', true)
                }

                $('#esscko-tanggal-tindakan').val(data.sscko_tanggal_tindakan);

                // if (data.sscko_tanggal_tindakan !== null) {
                //     let esscko_tanggal_tindakan = formatTanggaljamKhusus(data.sscko_tanggal_tindakan);
                //     $('#esscko-tanggal-tindakan').val(esscko_tanggal_tindakan);
                // }

                if (data.sscko_tanggal_sign_out !== null) {
                    let esscko_tanggal_sign_out = formatTanggaljamKhusus(data.sscko_tanggal_sign_out);
                    $('#esscko-tanggal-sign-out').val(esscko_tanggal_sign_out);
                }
                if (data.sscko_paraf_dokter_anestesi_sign_out == '1') {
                    $('#esscko-paraf-dokter-anestesi-sign-out').prop('checked', true)
                }
                $('#esscko-dokter-anestesi-sign-out').val(data.sscko_dokter_anestesi_sign_out);
                $('#s2id_esscko-dokter-anestesi-sign-out a .select2c-chosen').html(data.dokter_anestesi_sign_out);
                if (data.sscko_paraf_perawat_sign_out == '1') {
                    $('#esscko-paraf-perawat-sign-out').prop('checked', true)
                }
                $('#esscko-perawat-sign-out').val(data.sscko_perawat_sign_out);
                $('#s2id_esscko-perawat-sign-out a .select2c-chosen').html(data.perawat_sign_out);

                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }


    // SSCKO 16
    function updateSurgicalSafetyCeklisKamarOperasi(id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        // console.log($('#form-edit-surgical-safety-ceklis-kamar-operasi').serialize());return
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("order_operasi/api/order_operasi/update_surgical_safety_ceklis_kamar_operasi") ?>',
            data: $('#form-edit-surgical-safety-ceklis-kamar-operasi').serialize() + '&id=' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    $('#wizard-operasi').bwizard('show', '0');
                    entriOperasi(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-surgical-safety-ceklis-kamar-operasi').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }


    // SSCKO 17
    function hapusSurgicalSafetyCeklisKamarOperasi(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url("order_operasi/api/order_operasi/hapus_surgical_safety_ceklis_kamar_operasi") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeListTable(obj);
                                } else {
                                    customAlert('Hapus Surgical Safety Ceklis Kamar Operasi', data.message);
                                }
                            },
                            error: function(e) {
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }

    // TOTAL ADA 17 

    // GRAFIK  CKP
    // function grafikOperasi(data) {
    //     let result = {
    //         Suhu: {
    //             category: [],
    //             value: []
    //         },
    //         "Tekanan Darah": {
    //             category: [],
    //             value: []
    //         },
    //         Oksigen: {
    //             category: [],
    //             value: []
    //         }
    //     }
    //     let categories = []
    //     if (data !== undefined && data !== null) {
    //         result = JSON.parse(data);
    //         categories = [...result['Suhu'].category, ...result['Tekanan Darah'].category, ...result['Oksigen'].category];
    //         categories = categories.filter((value, index) => categories.indexOf(value) === index)
    //     }

    //     const suhu = {
    //         name: 'Suhu',
    //         data: result['Suhu'].value,
    //         color: '#0000FF',
    //         connectNulls: true
    //     }
    //     const tekananDarah = {
    //         name: 'Tekanan Darah',
    //         data: result['Tekanan Darah'].value,
    //         color: '#FF0000',
    //         connectNulls: true
    //     }

    //     const oksigen = {
    //         name: 'Oksigen',
    //         data: result['Oksigen'].value,
    //         color: '#00FF00',
    //         connectNulls: true

    //     }
    //     const option = {
    //         cart: {
    //             type: 'line',
    //             restZoomButton: {
    //                 position: {
    //                     x: -10,
    //                     y: 10
    //                 }
    //             },
    //             responsive: {
    //                 rules: [{
    //                     condition: {
    //                         maxWidth: 500
    //                     },
    //                     // Set options for small screens
    //                 }, {
    //                     // Set options for larger screens
    //                 }]
    //             }
    //         },
    //         xAxis: {
    //             categories: categories
    //         },
    //         yAxis: [{
    //                 min: 10,
    //                 max: 200,
    //                 tickInterval: 10,
    //                 title: {
    //                     text: 'BP',
    //                     rotation: 0,
    //                     align: 'middle',
    //                     offset: 0,
    //                     y: -155,
    //                     x: -50
    //                 }
    //             },
    //             {
    //                 title: {
    //                     text: 'v',
    //                     rotation: 0,
    //                     align: 'middle',
    //                     offset: 0,
    //                     y: -140,
    //                     x: -9
    //                 }
    //             },
    //             {
    //                 title: {
    //                     text: '^',
    //                     rotation: 0,
    //                     align: 'middle',
    //                     offset: 0,
    //                     y: -113,
    //                     x: -2
    //                 }
    //             },
    //             {
    //                 title: {
    //                     text: 'P/R',
    //                     rotation: 0,
    //                     align: 'middle',
    //                     offset: 0,
    //                     y: 1,
    //                     x: -2
    //                 }
    //             },
    //             {
    //                 title: {
    //                     text: 'Sp02',
    //                     rotation: 0,
    //                     align: 'middle',
    //                     offset: 0,
    //                     y: 50,
    //                     x: +20
    //                 }
    //             },
    //             {
    //                 title: {
    //                     text: 'x',
    //                     rotation: 0,
    //                     align: 'middle',
    //                     offset: 0,
    //                     y: 100,
    //                     x: +55
    //                 }
    //             },
    //         ],
    //         series: [suhu, tekananDarah, oksigen]
    //     }
    //     const grafik = $('#grafik_ckp').highcharts(option);
    //     $('#btn-ckp-chart').on('click', function() {
    //         const valJam = $('#jam-ckp').val();
    //         if (valJam === '') {
    //             syams_validation('#jam-ckp', 'jam harus diisi.');
    //             return false;
    //         } else {
    //             syams_validation_remove('#jam-ckp');
    //         }

    //         const dataJamSebelum = grafik.xAxis[0].categories;
    //         grafik.xAxis[0].update({
    //             categories: [...dataJamSebelum, valJam]
    //         })

    //         const valSuhu = $('#suhu-ckp').val()
    //         const valTD = $('#darah-ckp').val()
    //         const valO2 = $('#oksigen-ckp').val()

    //         const idxSuhu = grafik.series.findIndex(data => data.name === 'Suhu')
    //         const dataSebelumSuhu = grafik.series[idxSuhu].processedYData;
    //         grafik.series[idxSuhu].setData([...dataSebelumSuhu, valSuhu !== '' ? parseInt(valSuhu) : null]);

    //         const idxTD = grafik.series.findIndex(data => data.name === 'Tekanan Darah')
    //         const dataSebelumTD = grafik.series[idxTD].processedYData;
    //         grafik.series[idxTD].setData([...dataSebelumTD, valTD !== '' ? parseInt(valTD) : null]);

    //         const idxOksigen = grafik.series.findIndex(data => data.name === 'Oksigen')
    //         const dataSebelumOksigen = grafik.series[idxOksigen].processedYData;
    //         grafik.series[idxOksigen].setData([...dataSebelumOksigen, valO2 !== '' ? parseInt(valO2) : null]);

    //         let dataCartCkp = {}

    //         if ($('#data-chart-ckp').val() !== '') dataCartCkp = JSON.parse($('#data-chart-ckp').val());

    //         let newDataCartCkp = {
    //             ...dataCartCkp,
    //             [grafik.series[0].name]: grafik.series[0].data.map(point => ({
    //                 category: point.category,
    //                 value: point.y
    //             })).reduce((a, b) => {
    //                 const index = a.findIndex(item => item.key === b.key);
    //                 if (index === -1) {
    //                     a.push({
    //                         category: [b.category],
    //                         value: [b.value]
    //                     })
    //                 } else {
    //                     a[index].value.push(b.value);
    //                     a[index].category.push(b.category);
    //                 }
    //                 return a;
    //             }, [])[0],


    //             [grafik.series[1].name]: grafik.series[1].data.map(point => ({
    //                 category: point.category,
    //                 value: point.y
    //             })).reduce((a, b) => {
    //                 const index = a.findIndex(item => item.key === b.key);
    //                 if (index === -1) {
    //                     a.push({
    //                         category: [b.category],
    //                         value: [b.value]
    //                     })
    //                 } else {
    //                     a[index].value.push(b.value);
    //                     a[index].category.push(b.category);
    //                 }
    //                 return a;
    //             }, [])[0],


    //             [grafik.series[2].name]: grafik.series[2].data.map(point => ({
    //                 category: point.category,
    //                 value: point.y
    //             })).reduce((a, b) => {
    //                 const index = a.findIndex(item => item.key === b.key);
    //                 if (index === -1) {
    //                     a.push({
    //                         category: [b.category],
    //                         value: [b.value]
    //                     })
    //                 } else {
    //                     a[index].value.push(b.value);
    //                     a[index].category.push(b.category);
    //                 }
    //                 return a;
    //             }, [])[0],

    //         }

    //         $('#data-chart-ckp').val(JSON.stringify(newDataCartCkp));
    //         $('#suhu-ckp, #darah-ckp, #oksigen-ckp, #jam-ckp')
    //             .val('');
    //     })

    //     $('#btn-reset-ckp').on('click', function() {
    //         grafik.update(option)
    //     })
    // }
</script>