<script>
    var nomer = 1;
    $(function() {

        nomer++;

        $("#wizard-operasi").bwizard();

        // RPPPP TANGGAL JAM TAHUN dan HARI / CKP
        $('#jam-tanggal-po, #tanggal-jam-ckio, #jam-tanggal-cpo').datetimepicker({
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

        // CKP 
        $('#dokter-operator-ckp')
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
        $('#tim-perawatt-1, #tim-perawatt-2, #tim-perawatt-3, #perawat-ruangan-pfp, #perawat-penerima-ot-ppo, #perawat-ot-po, #perawwat-ruangan-pr, #perawwat-anastesi-pa, #perawwat-kamar-bedah, #perawat-instrument-1, #perawat-instrument-2, #perawwat-ruangan-prr, #perawwat-anastesi-paa, #perawwat-kamar-bedahh, #perawat-cpo, #perawatt-cpo, #perawwat-ruangan-prrr, #perawwat-ruangan-sirkuler, #perawwat-anastesi-paaa, #perawwat-kamar-bedahhh, #aaas-perawat, #aaas-pemeriksa-asesmen-anestesi, #perawwat-2, #peerawat-1, #peerawat-2, #peerawat-3')
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



        // , #catatan-keperawatan-sesudah-op-6, #catatan-keperawatan-sesudah-op-12, #catatan-keperawatan-sesudah-op-19, #catatan-keperawatan-sesudah-op-28

        // CKP JAM / CKPJI
        $('#jam-pfp, #jam-ppo, #time-out-ckio-2, #time-out-ckio-5, #time-out-ckio-8, #time-out-ckio-11, #catatan-keperawatan-intra-operasi-81, #catatan-keperawatan-intra-operasi-93, #catatan-keperawatan-intra-operasi-84, #catatan-keperawatan-intra-operasi-87, #catatan-keperawatan-intra-operasi-90, #catatan-keperawatan-sesudah-operasi-2, #catatan-keperawatan-sesudah-operasi-5, #ceklis-persiapan-operasiii-1, #ceklis-persiapan-operasiii-4, #ceklis-persiapan-operasiii-7, #jam-cpo-1, #jam-cpo-2, #time-out-ckio-10, #jam-mulai-c, #jam-selesai-c')
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
    })
 
    // CKP BARU

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

    function lihatFORM_KEP_24_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetFormCkp();
        entriFormCkp(layanan.id_pendaftaran, layanan.id, bed, action);
        setTimeout(function() {
            $('#hapus-catatan-perioperatif-cp').hide();
        }, 1500);
        setTimeout(function() {
            $('#edit-catatan-perioperatif-cp').hide();
        }, 1500);


    }

    function editFORM_KEP_24_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetFormCkp();
        entriFormCkp(layanan.id_pendaftaran, layanan.id, bed, action);
        setTimeout(function() {
            $('#lihat-catatan-perioperatif-cp').hide();
        }, 1500);

    }

    function tambahFORM_KEP_24_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';
        
        resetFormCkp();
        entriFormCkp(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriFormCkp(id_pendaftaran, id_layanan_pendaftaran, bed, action, page) {
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
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_operasi/api/Order_operasi/get_data_entri_ckp") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetFormCkp();
                getListDataCatatanPerioperatif(id_pendaftaran, bed, 1);
                $('#id_data_catatan_perioperatift').val(data.id_data_catatan_perioperatift);

                $('#id-pasien-ckp').val(data.pasien.no_rm);
                $('#id-pendaftaran-ckp').val(id_pendaftaran);
                $('#id-layanan-pendaftaran-ckp').val(id_layanan_pendaftaran);
                if (data.pasien !== null) {
                    $('#nama-pasien-ckp').text(data.pasien.nama);
                    $('#no-rm-ckp').text(data.pasien.no_rm);
                    $('#tanggal-lahir-ckp').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-ckp').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    $('#agama-ckp').text(data.pasien.agama);
                    $('#alamat-ckp').text(data.pasien.alamat);
                }




                // ini data lama jangan di hapus agar data di tabble database tampil di tampilan aplikasinya JANGAN DI HAPUS X WESA
                // let catatan_keperawatan_perioperatif = data.catatan_keperawatan_perioperatif;
                // if (catatan_keperawatan_perioperatif !== null) {
                //     $('#id-cpt').val(data.catatan_keperawatan_perioperatif.id);     
                //     const suhu_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.suhu_ckp);
                //     if (suhu_ckp.suhu_ckp_1 !== null) {
                //         $('#suhu-ckp-1').val(suhu_ckp.suhu_ckp_1);
                //     }
                //     if (suhu_ckp.suhu_ckp_2 !== null) {
                //         $('#suhu-ckp-2').val(suhu_ckp.suhu_ckp_2);
                //     }
                //     if (suhu_ckp.suhu_ckp_3 !== null) {
                //         $('#suhu-ckp-3').val(suhu_ckp.suhu_ckp_3);
                //     }
                //     if (suhu_ckp.suhu_ckp_4 !== null) {
                //         $('#suhu-ckp-4').val(suhu_ckp.suhu_ckp_4);
                //     }
                //     if (suhu_ckp.suhu_ckp_5 !== null) {
                //         $('#suhu-ckp-5').val(suhu_ckp.suhu_ckp_5);
                //     }
                //     if (suhu_ckp.suhu_ckp_6 !== null) {
                //         $('#suhu-ckp-6').val(suhu_ckp.suhu_ckp_6);
                //     }
                //     if (suhu_ckp.suhu_ckp_7 !== null) {
                //         $('#suhu-ckp-7').val(suhu_ckp.suhu_ckp_7);
                //     }    

                //     const status_mental_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.status_mental_ckp);
                //     if (status_mental_ckp.status_mental_ckp_1 !== null) {
                //         $('#status-mental-ckp-1').prop('checked', true)
                //     }
                //     if (status_mental_ckp.status_mental_ckp_2 !== null) {
                //         $('#status-mental-ckp-2').prop('checked', true)
                //     }
                //     if (status_mental_ckp.status_mental_ckp_3 !== null) {
                //         $('#status-mental-ckp-3').prop('checked', true)
                //     }
                //     if (status_mental_ckp.status_mental_ckp_4 !== null) {
                //         $('#status-mental-ckp-4').prop('checked', true)
                //     }
                //     if (status_mental_ckp.status_mental_ckp_5 !== null) {
                //         $('#status-mental-ckp-5').prop('checked', true)
                //     }

                //     const riwayat_penyakit_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.riwayat_penyakit_ckp);
                //     if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_1 === '0') {
                //         $('#riwayat-penyakit-ckp-1').prop('checked', true).change()
                //     }
                //     if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_1 === '1') {
                //         $('#riwayat-penyakit-ckp-2').prop('checked', true).change()
                //     }
                //     if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_3 !== null) {
                //         $('#riwayat-penyakit-ckp-3').prop('checked', true).change()
                //     }
                //     if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_4 !== null) {
                //         $('#riwayat-penyakit-ckp-4').prop('checked', true).change()
                //     }
                //     if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_5 !== null) {
                //         $('#riwayat-penyakit-ckp-5').prop('checked', true).change()
                //     }
                //     if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_6 !== null) {
                //         $('#riwayat-penyakit-ckp-6').prop('checked', true).change()
                //     }
                //     if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_7 !== null) {
                //         $('#riwayat-penyakit-ckp-7').prop('checked', true).change()
                //     }
                //     if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_8 !== null) {
                //         $('#riwayat-penyakit-ckp-8').prop('checked', true).change()
                //     }
                //     if (riwayat_penyakit_ckp.riwayat_penyakit_ckp_9 !== null) {
                //         $('#riwayat-penyakit-ckp-9').val(riwayat_penyakit_ckp.riwayat_penyakit_ckp_9);
                //     }

                    
                //     $('#pengobatan-saat-ini-ckp').val(data.catatan_keperawatan_perioperatif.pengobatan_saat_ini_ckp);
                //     $('#operasi-sebelumnya-ckp').val(data.catatan_keperawatan_perioperatif.operasi_sebelumnya_ckp);

                //     const alergi_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.alergi_ckp);
                //     if (alergi_ckp.alergi_ckp === '0') {
                //         $('#alergi-ckp-1').prop('checked', true).change()
                //     }
                //     if (alergi_ckp.alergi_ckp === '1') {
                //         $('#alergi-ckp-2').prop('checked', true).change()
                //     }
                //     if (alergi_ckp.alergi_ckp_3 !== null) {
                //         $('#alergi-ckp-3').val(alergi_ckp.alergi_ckp_3);
                //     }
                //     if (alergi_ckp.alergi_ckp_4 !== null) {
                //         $('#alergi-ckp-4').val(alergi_ckp.alergi_ckp_4);
                //     }

                //     const gol_darah_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.gol_darah_ckp);
                //     if (gol_darah_ckp.gol_darah_ckp_1 !== null) {
                //         $('#gol-darah-ckp-1').val(gol_darah_ckp.gol_darah_ckp_1);
                //     }
                //     if (gol_darah_ckp.gol_darah_ckp_2 !== null) {
                //         $('#gol-darah-ckp-2').val(gol_darah_ckp.gol_darah_ckp_2);
                //     }

                //     const standar_kewaspadaan_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.standar_kewaspadaan_ckp);
                //     if (standar_kewaspadaan_ckp.standar_kewaspadaan_ckp_1 !== null) {
                //         $('#standar-kewaspadaan-ckp-1').val(standar_kewaspadaan_ckp.standar_kewaspadaan_ckp_1);
                //     }
                //     if (standar_kewaspadaan_ckp.standar_kewaspadaan_ckp_2 !== null) {
                //         $('#standar-kewaspadaan-ckp-2').val(standar_kewaspadaan_ckp.standar_kewaspadaan_ckp_2);
                //     }

                //     $('#rencana-tindakan-operasi-ckp').val(data.catatan_keperawatan_perioperatif.rencana_tindakan_operasi_ckp);
                //     $('#dokter-operator-ckp').val(data.catatan_keperawatan_perioperatif.dokter_operator_ckp);
                //     $('#s2id_dokter-operator-ckp a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_dokter_1);
                //     $('#rencana-perawatan-pasca-operasi-ckp').val(data.catatan_keperawatan_perioperatif.rencana_perawatan_pasca_operasi_ckp);
                //     // BATAS A AKHIR

                //     // BATAS B AWAL
                //     const verifikasi_pasien_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.verifikasi_pasien_ckp);
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_1 !== null) {
                //         $('#verifikasi-pasien-1').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_1 !== null) {
                //         $('#verifikasi-pasien-2').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_3 !== null) {
                //         $('#verifikasi-pasien-3').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_4 !== null) {
                //         $('#verifikasi-pasien-4').val(verifikasi_pasien_ckp.verifikasi_pasien_4);
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_5 !== null) {
                //         $('#verifikasi-pasien-5').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_6 !== null) {
                //         $('#verifikasi-pasien-6').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_7 !== null) {
                //         $('#verifikasi-pasien-7').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_8 !== null) {
                //         $('#verifikasi-pasien-8').val(verifikasi_pasien_ckp.verifikasi_pasien_8);
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_9 !== null) {
                //         $('#verifikasi-pasien-9').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_10 !== null) {
                //         $('#verifikasi-pasien-10').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_11 !== null) {
                //         $('#verifikasi-pasien-11').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_12 !== null) {
                //         $('#verifikasi-pasien-12').val(verifikasi_pasien_ckp.verifikasi_pasien_12);
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_13 !== null) {
                //         $('#verifikasi-pasien-13').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_14 !== null) {
                //         $('#verifikasi-pasien-14').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_15 !== null) {
                //         $('#verifikasi-pasien-15').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_16 !== null) {
                //         $('#verifikasi-pasien-16').val(verifikasi_pasien_ckp.verifikasi_pasien_16);
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_17 !== null) {
                //         $('#verifikasi-pasien-17').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_18 !== null) {
                //         $('#verifikasi-pasien-18').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_19 !== null) {
                //         $('#verifikasi-pasien-19').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_20 !== null) {
                //         $('#verifikasi-pasien-20').val(verifikasi_pasien_ckp.verifikasi_pasien_20);
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_21 !== null) {
                //         $('#verifikasi-pasien-21').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_22 !== null) {
                //         $('#verifikasi-pasien-22').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_23 !== null) {
                //         $('#verifikasi-pasien-23').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_24 !== null) {
                //         $('#verifikasi-pasien-24').val(verifikasi_pasien_ckp.verifikasi_pasien_24);
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_25 !== null) {
                //         $('#verifikasi-pasien-25').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_26 !== null) {
                //         $('#verifikasi-pasien-26').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_27 !== null) {
                //         $('#verifikasi-pasien-27').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_28 !== null) {
                //         $('#verifikasi-pasien-28').val(verifikasi_pasien_ckp.verifikasi_pasien_28);
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_29 !== null) {
                //         $('#verifikasi-pasien-29').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_30 !== null) {
                //         $('#verifikasi-pasien-30').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_31 !== null) {
                //         $('#verifikasi-pasien-31').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_32 !== null) {
                //         $('#verifikasi-pasien-32').val(verifikasi_pasien_ckp.verifikasi_pasien_32);
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_33 !== null) {
                //         $('#verifikasi-pasien-33').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_34 !== null) {
                //         $('#verifikasi-pasien-34').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_35 !== null) {
                //         $('#verifikasi-pasien-35').prop('checked', true)
                //     }
                //     if (verifikasi_pasien_ckp.verifikasi_pasien_36 !== null) {
                //         $('#verifikasi-pasien-36').val(verifikasi_pasien_ckp.verifikasi_pasien_36);
                //     }

                //     const persiapan_fisik_pasien_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.persiapan_fisik_pasien_ckp);
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_1 !== null) {
                //         $('#persiapan-fisik-pasien-1').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_2 !== null) {
                //         $('#persiapan-fisik-pasien-2').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_3 !== null) {
                //         $('#persiapan-fisik-pasien-3').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_4 !== null) {
                //         $('#persiapan-fisik-pasien-4').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_4);
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_5 !== null) {
                //         $('#persiapan-fisik-pasien-5').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_6 !== null) {
                //         $('#persiapan-fisik-pasien-6').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_7 !== null) {
                //         $('#persiapan-fisik-pasien-7').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_8 !== null) {
                //         $('#persiapan-fisik-pasien-8').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_8);
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_9 !== null) {
                //         $('#persiapan-fisik-pasien-9').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_10 !== null) {
                //         $('#persiapan-fisik-pasien-10').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_11 !== null) {
                //         $('#persiapan-fisik-pasien-11').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_12 !== null) {
                //         $('#persiapan-fisik-pasien-12').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_12);
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_13 !== null) {
                //         $('#persiapan-fisik-pasien-13').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_14 !== null) {
                //         $('#persiapan-fisik-pasien-14').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_15 !== null) {
                //         $('#persiapan-fisik-pasien-15').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_16 !== null) {
                //         $('#persiapan-fisik-pasien-16').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_16);
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_17 !== null) {
                //         $('#persiapan-fisik-pasien-17').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_18 !== null) {
                //         $('#persiapan-fisik-pasien-18').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_19 !== null) {
                //         $('#persiapan-fisik-pasien-19').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_20 !== null) {
                //         $('#persiapan-fisik-pasien-20').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_20);
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_21 !== null) {
                //         $('#persiapan-fisik-pasien-21').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_22 !== null) {
                //         $('#persiapan-fisik-pasien-22').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_23 !== null) {
                //         $('#persiapan-fisik-pasien-23').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_24 !== null) {
                //         $('#persiapan-fisik-pasien-24').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_24);
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_25 !== null) {
                //         $('#persiapan-fisik-pasien-25').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_26 !== null) {
                //         $('#persiapan-fisik-pasien-26').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_27 !== null) {
                //         $('#persiapan-fisik-pasien-27').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_28 !== null) {
                //         $('#persiapan-fisik-pasien-28').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_28);
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_29 !== null) {
                //         $('#persiapan-fisik-pasien-29').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_30 !== null) {
                //         $('#persiapan-fisik-pasien-30').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_31 !== null) {
                //         $('#persiapan-fisik-pasien-31').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_32 !== null) {
                //         $('#persiapan-fisik-pasien-32').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_32);
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_33 !== null) {
                //         $('#persiapan-fisik-pasien-33').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_34 !== null) {
                //         $('#persiapan-fisik-pasien-34').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_35 !== null) {
                //         $('#persiapan-fisik-pasien-35').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_36 !== null) {
                //         $('#persiapan-fisik-pasien-36').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_36);
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_37 !== null) {
                //         $('#persiapan-fisik-pasien-37').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_38 !== null) {
                //         $('#persiapan-fisik-pasien-38').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_39 !== null) {
                //         $('#persiapan-fisik-pasien-39').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_40 !== null) {
                //         $('#persiapan-fisik-pasien-40').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_40);
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_41 !== null) {
                //         $('#persiapan-fisik-pasien-41').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_41);
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_42 !== null) {
                //         $('#persiapan-fisik-pasien-42').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_43 !== null) {
                //         $('#persiapan-fisik-pasien-43').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_44 !== null) {
                //         $('#persiapan-fisik-pasien-44').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_45 !== null) {
                //         $('#persiapan-fisik-pasien-45').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_45);
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_46 !== null) {
                //         $('#persiapan-fisik-pasien-46').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_47 !== null) {
                //         $('#persiapan-fisik-pasien-47').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_48 !== null) {
                //         $('#persiapan-fisik-pasien-48').prop('checked', true)
                //     }
                //     if (persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_49 !== null) {
                //         $('#persiapan-fisik-pasien-49').val(persiapan_fisik_pasien_ckp.persiapan_fisik_pasien_49);
                //     }

                //     $('#perawat-ruangan-pfp').val(data.catatan_keperawatan_perioperatif.perawat_ruangan_pfp);
                //     $('#s2id_perawat-ruangan-pfp a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_1);
                //     $('#jam-pfp').val(data.catatan_keperawatan_perioperatif.jam_pfp);
                //     $('#perawat-penerima-ot-ppo').val(data.catatan_keperawatan_perioperatif.perawat_penerima_ot_ppo);
                //     $('#s2id_perawat-penerima-ot-ppo a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_2);
                //     $('#jam-ppo').val(data.catatan_keperawatan_perioperatif.jam_ppo);

                //     const site_marketing = JSON.parse(data.catatan_keperawatan_perioperatif.site_marketing);
                //     if (site_marketing.site_marketing === '1') {
                //         $('#site-marketing-1').prop('checked', true).change()
                //     }
                //     if (site_marketing.site_marketing === '0') {
                //         $('#site-marketing-2').prop('checked', true).change()
                //     }

                //     $('#perawat-ot-po').val(data.catatan_keperawatan_perioperatif.perawat_ot_po);
                //     $('#s2id_perawat-ot-po a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_3);
                //     $('#jam-tanggal-po').val((data.catatan_keperawatan_perioperatif.jam_tanggal_po !== null ? datetimefmysql(data.catatan_keperawatan_perioperatif.jam_tanggal_po) : ''));
                //     // BATAS B AKHIR

                //     //  ASUHAN KEPERAWATAN 1 AWAL
                //     const asuhan_keperawatan_ak_1 = JSON.parse(data.catatan_keperawatan_perioperatif.asuhan_keperawatan_ak_1);
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_1 !== null) {
                //         $('#asuhan-keperawatan-ak-1').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_2 !== null) {
                //         $('#asuhan-keperawatan-ak-2').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_3 !== null) {
                //         $('#asuhan-keperawatan-ak-3').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_4 !== null) {
                //         $('#asuhan-keperawatan-ak-4').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_5 !== null) {
                //         $('#asuhan-keperawatan-ak-5').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_6 !== null) {
                //         $('#asuhan-keperawatan-ak-6').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_7 !== null) {
                //         $('#asuhan-keperawatan-ak-7').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_8 !== null) {
                //         $('#asuhan-keperawatan-ak-8').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_9 !== null) {
                //         $('#asuhan-keperawatan-ak-9').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_10 !== null) {
                //         $('#asuhan-keperawatan-ak-10').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_11 !== null) {
                //         $('#asuhan-keperawatan-ak-11').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_12 !== null) {
                //         $('#asuhan-keperawatan-ak-12').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_13 !== null) {
                //         $('#asuhan-keperawatan-ak-13').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_14 !== null) {
                //         $('#asuhan-keperawatan-ak-14').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_15 !== null) {
                //         $('#asuhan-keperawatan-ak-15').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_16 !== null) {
                //         $('#asuhan-keperawatan-ak-16').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_17 !== null) {
                //         $('#asuhan-keperawatan-ak-17').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_18 !== null) {
                //         $('#asuhan-keperawatan-ak-18').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_19 !== null) {
                //         $('#asuhan-keperawatan-ak-19').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_20 !== null) {
                //         $('#asuhan-keperawatan-ak-20').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_21 !== null) {
                //         $('#asuhan-keperawatan-ak-21').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_22 !== null) {
                //         $('#asuhan-keperawatan-ak-22').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_23 !== null) {
                //         $('#asuhan-keperawatan-ak-23').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_24 !== null) {
                //         $('#asuhan-keperawatan-ak-24').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_25 !== null) {
                //         $('#asuhan-keperawatan-ak-25').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_26 !== null) {
                //         $('#asuhan-keperawatan-ak-26').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_27 !== null) {
                //         $('#asuhan-keperawatan-ak-27').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_28 !== null) {
                //         $('#asuhan-keperawatan-ak-28').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_29 !== null) {
                //         $('#asuhan-keperawatan-ak-29').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_30 !== null) {
                //         $('#asuhan-keperawatan-ak-30').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_31 !== null) {
                //         $('#asuhan-keperawatan-ak-31').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_32 !== null) {
                //         $('#asuhan-keperawatan-ak-32').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_33 !== null) {
                //         $('#asuhan-keperawatan-ak-33').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_58 !== null) {
                //         $('#asuhan-keperawatan-ak-58').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_34 !== null) {
                //         $('#asuhan-keperawatan-ak-34').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_35 !== null) {
                //         $('#asuhan-keperawatan-ak-35').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_36 !== null) {
                //         $('#asuhan-keperawatan-ak-36').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_37 !== null) {
                //         $('#asuhan-keperawatan-ak-37').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_38 !== null) {
                //         $('#asuhan-keperawatan-ak-38').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_39 !== null) {
                //         $('#asuhan-keperawatan-ak-39').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_40 !== null) {
                //         $('#asuhan-keperawatan-ak-40').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_41 !== null) {
                //         $('#asuhan-keperawatan-ak-41').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_42 !== null) {
                //         $('#asuhan-keperawatan-ak-42').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_43 !== null) {
                //         $('#asuhan-keperawatan-ak-43').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_44 !== null) {
                //         $('#asuhan-keperawatan-ak-44').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_45 !== null) {
                //         $('#asuhan-keperawatan-ak-45').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_46 !== null) {
                //         $('#asuhan-keperawatan-ak-46').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_47 !== null) {
                //         $('#asuhan-keperawatan-ak-47').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_48 !== null) {
                //         $('#asuhan-keperawatan-ak-48').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_49 !== null) {
                //         $('#asuhan-keperawatan-ak-49').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_50 !== null) {
                //         $('#asuhan-keperawatan-ak-50').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_51 !== null) {
                //         $('#asuhan-keperawatan-ak-51').val(asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_51);
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_52 !== null) {
                //         $('#asuhan-keperawatan-ak-52').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_53 !== null) {
                //         $('#asuhan-keperawatan-ak-53').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_54 !== null) {
                //         $('#asuhan-keperawatan-ak-54').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_55 !== null) {
                //         $('#asuhan-keperawatan-ak-55').val(asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_55);
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_56 !== null) {
                //         $('#asuhan-keperawatan-ak-56').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_57 !== null) {
                //         $('#asuhan-keperawatan-ak-57').val(asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_57);
                //     }

                //     $('#perawwat-ruangan-pr').val(data.catatan_keperawatan_perioperatif.perawwat_ruangan_pr);
                //     $('#s2id_perawwat-ruangan-pr a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_4);
                //     $('#perawwat-anastesi-pa').val(data.catatan_keperawatan_perioperatif.perawwat_anastesi_pa);
                //     $('#s2id_perawwat-anastesi-pa a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_5);
                //     $('#perawwat-kamar-bedah').val(data.catatan_keperawatan_perioperatif.perawwat_kamar_bedah);
                //     $('#s2id_perawwat-kamar-bedah a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_6);
                //     //  ASUHAN KEPERAWATAN 1 AKHIR

                //     // CATATAN KEPEERAWATAN INTARA OPERASI AWAL
                //     const time_out_ckio = JSON.parse(data.catatan_keperawatan_perioperatif.time_out_ckio);
                //     if (time_out_ckio.time_out_ckio_1 === '1') {
                //         $('#time-out-ckio-1').prop('checked', true).change()
                //     }
                //     if (time_out_ckio.time_out_ckio_2 !== null) {
                //         $('#time-out-ckio-2').val(time_out_ckio.time_out_ckio_2);
                //     }
                //     if (time_out_ckio.time_out_ckio_1 === '0') {
                //         $('#time-out-ckio-3').prop('checked', true).change()
                //     }
                //     if (time_out_ckio.time_out_ckio_4 === '1') {
                //         $('#time-out-ckio-4').prop('checked', true).change()
                //     }
                //     if (time_out_ckio.time_out_ckio_5 !== null) {
                //         $('#time-out-ckio-5').val(time_out_ckio.time_out_ckio_5);
                //     }
                //     if (time_out_ckio.time_out_ckio_4 === '0') {
                //         $('#time-out-ckio-6').prop('checked', true).change()
                //     }
                //     if (time_out_ckio.time_out_ckio_7 === '1') {
                //         $('#time-out-ckio-7').prop('checked', true).change()
                //     }
                //     if (time_out_ckio.time_out_ckio_8 !== null) {
                //         $('#time-out-ckio-8').val(time_out_ckio.time_out_ckio_8);
                //     }
                //     if (time_out_ckio.time_out_ckio_7 === '0') {
                //         $('#time-out-ckio-9').prop('checked', true).change()
                //     }
                //     if (time_out_ckio.time_out_ckio_10 !== null) {
                //         $('#time-out-ckio-10').val(time_out_ckio.time_out_ckio_10);
                //     }
                //     if (time_out_ckio.time_out_ckio_11 !== null) {
                //         $('#time-out-ckio-11').val(time_out_ckio.time_out_ckio_11);
                //     }

                //     const catatan_keperawatan_intra_operasi = JSON.parse(data.catatan_keperawatan_perioperatif.catatan_keperawatan_intra_operasi);
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_1 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-1').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_1);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_2 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-2').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_3 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-3').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_4 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-4').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_5 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-5').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_6 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-6').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_7 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-7').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_8 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-8').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_9 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-9').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_10 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-10').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_11 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-11').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_11);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_12 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-12').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_13 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-13').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_14 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-14').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_15 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-15').prop('checked', true)
                //     }
                //     // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_16 === 'kiri') {
                //     //     $('#catatan-keperawatan-intra-operasi-16').prop('checked', true).change()
                //     // }
                //     // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_16 === 'kanan') {
                //     //     $('#catatan-keperawatan-intra-operasi-17').prop('checked', true).change()
                //     // }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_18 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-18').prop('checked', true)
                //     }
                //     // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_19 === '1') {
                //     //     $('#catatan-keperawatan-intra-operasi-19').prop('checked', true).change()
                //     // }
                //     // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_19 === '2') {
                //     //     $('#catatan-keperawatan-intra-operasi-20').prop('checked', true).change()
                //     // }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_21 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-21').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_22 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-22').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_23 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-23').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_24 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-24').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_24);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_25 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-25').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_25);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_26 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-26').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_27 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-27').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_28 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-28').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_29 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-29').prop('checked', true)
                //     }
                //     // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_30 === '1') {
                //     //     $('#catatan-keperawatan-intra-operasi-30').prop('checked', true).change()
                //     // }
                //     // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_30 === '2') {
                //     //     $('#catatan-keperawatan-intra-operasi-31').prop('checked', true).change()
                //     // }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_32 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-32').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_33 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-33').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_33);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_34 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-34').prop('checked', true)
                //     }
                //     // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_35 === '1') {
                //     //     $('#catatan-keperawatan-intra-operasi-35').prop('checked', true).change()
                //     // }
                //     // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_35 === '2') {
                //     //     $('#catatan-keperawatan-intra-operasi-36').prop('checked', true).change()
                //     // }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_37 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-37').prop('checked', true)
                //     }
                //     // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_38 === '1') {
                //     //     $('#catatan-keperawatan-intra-operasi-38').prop('checked', true).change()
                //     // }
                //     // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_38 === '2') {
                //     //     $('#catatan-keperawatan-intra-operasi-39').prop('checked', true).change()
                //     // }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_40 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-40').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_41 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-41').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_41);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_42 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-42').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_43 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-43').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_44 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-44').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_45 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-45').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_45);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_46 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-46').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_47 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-47').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_48 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-48').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_49 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-49').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_50 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-50').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_51 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-51').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_52 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-52').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_53 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-53').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_54 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-54').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_55 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-55').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_56 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-56').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_57 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-57').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_57);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_58 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-58').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_59 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-59').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_60 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-60').prop('checked', true)
                //     }
                //     // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_61 === '1') {
                //     //     $('#catatan-keperawatan-intra-operasi-61').prop('checked', true)
                //     // }
                //     // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_61 === '2') {
                //     //     $('#catatan-keperawatan-intra-operasi-62').prop('checked', true)
                //     // }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_63 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-63').prop('checked', true)
                //     }
                //     // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_64 === '1') {
                //     //     $('#catatan-keperawatan-intra-operasi-64').prop('checked', true)
                //     // }
                //     // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_64 === '2') {
                //     //     $('#catatan-keperawatan-intra-operasi-65').prop('checked', true)
                //     // }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_66 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-66').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_67 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-67').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_67);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_68 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-68').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_68);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_69 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-69').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_70 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-70').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_71 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-71').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_72 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-72').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_72);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_73 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-73').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_74 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-74').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_75 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-75').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_76 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-76').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_76);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_77 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-77').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_77);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_78 === '1') {
                //         $('#catatan-keperawatan-intra-operasi-78').prop('checked', true).change()
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_78 === '0') {
                //         $('#catatan-keperawatan-intra-operasi-79').prop('checked', true).change()
                //     }



                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_92 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-92').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_92);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_93 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-93').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_93);
                //     }



                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_80 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-80').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_81 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-81').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_81);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_82 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-82').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_82);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_83 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-83').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_84 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-84').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_84);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_85 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-85').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_85);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_86 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-86').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_87 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-87').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_87);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_88 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-88').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_88);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_89 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-89').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_90 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-90').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_90);
                //     }
                //     if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_91 !== null) {
                //         $('#catatan-keperawatan-intra-operasi-91').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_91);
                //     }

                //     const catatan_keperawatan_intra_op = JSON.parse(data.catatan_keperawatan_perioperatif.catatan_keperawatan_intra_op);
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_1 !== null) {
                //         $('#catatan-keperawatan-intra-op-1').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_1);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_2 !== null) {
                //         $('#catatan-keperawatan-intra-op-2').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_2);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_3 !== null) {
                //         $('#catatan-keperawatan-intra-op-3').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_3);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_4 !== null) {
                //         $('#catatan-keperawatan-intra-op-4').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_5 !== null) {
                //         $('#catatan-keperawatan-intra-op-5').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_6 !== null) {
                //         $('#catatan-keperawatan-intra-op-6').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_7 !== null) {
                //         $('#catatan-keperawatan-intra-op-7').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_8 !== null) {
                //         $('#catatan-keperawatan-intra-op-8').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_9 !== null) {
                //         $('#catatan-keperawatan-intra-op-9').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_10 !== null) {
                //         $('#catatan-keperawatan-intra-op-10').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_11 !== null) {
                //         $('#catatan-keperawatan-intra-op-11').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_12 !== null) {
                //         $('#catatan-keperawatan-intra-op-12').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_12);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_13 !== null) {
                //         $('#catatan-keperawatan-intra-op-13').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_14 !== null) {
                //         $('#catatan-keperawatan-intra-op-14').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_15 !== null) {
                //         $('#catatan-keperawatan-intra-op-15').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_16 !== null) {
                //         $('#catatan-keperawatan-intra-op-16').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_16);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_17 !== null) {
                //         $('#catatan-keperawatan-intra-op-17').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_18 !== null) {
                //         $('#catatan-keperawatan-intra-op-18').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_18);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_19 !== null) {
                //         $('#catatan-keperawatan-intra-op-19').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_20 !== null) {
                //         $('#catatan-keperawatan-intra-op-20').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_20);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_21 !== null) {
                //         $('#catatan-keperawatan-intra-op-21').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_22 !== null) {
                //         $('#catatan-keperawatan-intra-op-22').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_23 !== null) {
                //         $('#catatan-keperawatan-intra-op-23').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_23);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_24 !== null) {
                //         $('#catatan-keperawatan-intra-op-24').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_24);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_25 !== null) {
                //         $('#catatan-keperawatan-intra-op-25').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_25);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_26 !== null) {
                //         $('#catatan-keperawatan-intra-op-26').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_27 !== null) {
                //         $('#catatan-keperawatan-intra-op-27').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_27);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_28 !== null) {
                //         $('#catatan-keperawatan-intra-op-28').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_29 !== null) {
                //         $('#catatan-keperawatan-intra-op-29').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_29);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_30 !== null) {
                //         $('#catatan-keperawatan-intra-op-30').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_30);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_31 !== null) {
                //         $('#catatan-keperawatan-intra-op-31').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_32 !== null) {
                //         $('#catatan-keperawatan-intra-op-32').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_33 !== null) {
                //         $('#catatan-keperawatan-intra-op-33').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_34 !== null) {
                //         $('#catatan-keperawatan-intra-op-34').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_34);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_35 !== null) {
                //         $('#catatan-keperawatan-intra-op-35').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_36 !== null) {
                //         $('#catatan-keperawatan-intra-op-36').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_36);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_37 !== null) {
                //         $('#catatan-keperawatan-intra-op-37').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_38 !== null) {
                //         $('#catatan-keperawatan-intra-op-38').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_39 !== null) {
                //         $('#catatan-keperawatan-intra-op-39').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_40 !== null) {
                //         $('#catatan-keperawatan-intra-op-40').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_40);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_41 !== null) {
                //         $('#catatan-keperawatan-intra-op-41').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_42 !== null) {
                //         $('#catatan-keperawatan-intra-op-42').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_42);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_43 !== null) {
                //         $('#catatan-keperawatan-intra-op-43').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_44 !== null) {
                //         $('#catatan-keperawatan-intra-op-44').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_45 !== null) {
                //         $('#catatan-keperawatan-intra-op-45').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_45);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_46 !== null) {
                //         $('#catatan-keperawatan-intra-op-46').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_46);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_47 !== null) {
                //         $('#catatan-keperawatan-intra-op-47').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_47);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_48 !== null) {
                //         $('#catatan-keperawatan-intra-op-48').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_48);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_49 !== null) {
                //         $('#catatan-keperawatan-intra-op-49').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_49);
                //     }
                //     if (catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_50 !== null) {
                //         $('#catatan-keperawatan-intra-op-50').val(catatan_keperawatan_intra_op.catatan_keperawatan_intra_op_50);
                //     }
                //     $('#tanggal-jam-ckio').val((data.catatan_keperawatan_perioperatif.tanggal_jam_ckio !== null ? datetimefmysql(data.catatan_keperawatan_perioperatif.tanggal_jam_ckio) : ''));
                //     $('#perawat-instrument-1').val(data.catatan_keperawatan_perioperatif.perawat_instrument_1);
                //     $('#s2id_perawat-instrument-1 a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_7);
                //     $('#perawat-instrument-2').val(data.catatan_keperawatan_perioperatif.perawat_instrument_2);
                //     $('#s2id_perawat-instrument-2 a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_8);
                //     // CATATAN KEPEERAWATAN INTARA OPERASI AKHIR

                //     // ASUHAN KEPERAWATAN 2 AWAL
                //     const asuhan_keperawatan_ak_2 = JSON.parse(data.catatan_keperawatan_perioperatif.asuhan_keperawatan_ak_2);
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_1 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-1').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_2 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-2').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_3 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-3').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_4 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-4').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_5 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-5').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_6 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-6').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_7 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-7').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_8 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-8').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_9 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-9').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_10 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-10').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_11 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-11').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_12 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-12').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_13 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-13').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_14 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-14').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_15 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-15').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_16 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-16').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_17 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-17').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_17);
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_18 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-18').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_19 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-19').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_20 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-20').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_20);
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_21 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-21').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_22 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-22').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_23 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-23').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_23);
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_24 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-24').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_25 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-25').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_26 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-26').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_27 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-27').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_28 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-28').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_29 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-29').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_30 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-30').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_31 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-31').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_32 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-32').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_33 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-33').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_34 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-34').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_35 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-35').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_36 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-36').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_37 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-37').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_38 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-38').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_39 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-39').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_40 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-40').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_41 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-41').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_41);
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_42 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-42').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_43 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-43').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_43);
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_44 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-44').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_45 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-45').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_46 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-46').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_47 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-47').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_48 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-48').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_49 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-49').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_50 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-50').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_51 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-51').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_52 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-52').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_53 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-53').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_54 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-54').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_55 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-55').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_56 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-56').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_57 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-57').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_58 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-58').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_59 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-59').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_60 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-60').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_61 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-61').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_62 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-62').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_63 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-63').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_63);
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_64 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-64').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_65 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-65').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_66 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-66').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_67 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-67').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_68 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-68').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_68);
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_69 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-69').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_70 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-70').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_70);
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_71 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-71').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_72 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-72').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_73 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-73').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_74 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-74').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_75 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-75').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_76 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-76').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_77 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-77').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_78 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-78').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_79 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-79').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_80 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-80').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_81 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-81').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_82 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-82').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_82);
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_83 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-83').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_84 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-84').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_85 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-85').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_86 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-86').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_87 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-87').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_87);
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_88 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-88').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_89 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-89').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_89);
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_90 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-90').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_91 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-91').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_92 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-92').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_93 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-93').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_94 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-94').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_95 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-95').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_96 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-96').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_97 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-97').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_98 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-98').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_99 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-99').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_99);
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_100 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-100').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_101 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-101').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_101);
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_102 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-102').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_103 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-103').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_104 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-104').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_105 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-105').prop('checked', true)
                //     }
                //     if (asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_106 !== null) {
                //         $('#asuhan-keperawatannnnn-ak-106').val(asuhan_keperawatan_ak_2.asuhan_keperawatannnnn_ak_106);
                //     }

                //     $('#perawwat-ruangan-prr').val(data.catatan_keperawatan_perioperatif.perawwat_ruangan_prr);
                //     $('#s2id_perawwat-ruangan-prr a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_9);
                //     $('#perawwat-anastesi-paa').val(data.catatan_keperawatan_perioperatif.perawwat_anastesi_paa);
                //     $('#s2id_perawwat-anastesi-paa a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_10);
                //     $('#perawwat-kamar-bedahh').val(data.catatan_keperawatan_perioperatif.perawwat_kamar_bedahh);
                //     $('#s2id_perawwat-kamar-bedahh a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_11);
                //     // ASUHAN KEPERAWATAN 2 AKHIR

                //     // CATATAN KEPERAWATAN SESUDAH OPERASI AWAL  
                //     const catatan_keperawatan_sesudah_operasi = JSON.parse(data.catatan_keperawatan_perioperatif.catatan_keperawatan_sesudah_operasi);
                //     if (catatan_keperawatan_sesudah_operasi.catatan_keperawatan_sesudah_operasi_1 !== null) {
                //         $('#catatan-keperawatan-sesudah-operasi-1').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_operasi.catatan_keperawatan_sesudah_operasi_2 !== null) {
                //         $('#catatan-keperawatan-sesudah-operasi-2').val(catatan_keperawatan_sesudah_operasi.catatan_keperawatan_sesudah_operasi_2);
                //     }
                //     if (catatan_keperawatan_sesudah_operasi.catatan_keperawatan_sesudah_operasi_3 !== null) {
                //         $('#catatan-keperawatan-sesudah-operasi-3').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_operasi.catatan_keperawatan_sesudah_operasi_4 !== null) {
                //         $('#catatan-keperawatan-sesudah-operasi-4').val(catatan_keperawatan_sesudah_operasi.catatan_keperawatan_sesudah_operasi_4);
                //     }
                //     if (catatan_keperawatan_sesudah_operasi.catatan_keperawatan_sesudah_operasi_5 !== null) {
                //         $('#catatan-keperawatan-sesudah-operasi-5').val(catatan_keperawatan_sesudah_operasi.catatan_keperawatan_sesudah_operasi_5);
                //     }


                //     const catatan_keperawatan_sesudah_op = JSON.parse(data.catatan_keperawatan_perioperatif.catatan_keperawatan_sesudah_op);
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_1 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-1').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_2 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-2').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_3 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-3').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_4 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-4').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_5 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-5').prop('checked', true)
                //     }

                //     // if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_6 !== null) {
                //     //     $('#catatan-keperawatan-sesudah-op-6').prop('checked', true)
                //     // }

                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_6 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-6').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_6);
                //     }

                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_7 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-7').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_8 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-8').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_9 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-9').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_10 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-10').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_11 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-11').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_11);
                //     }
                //     // if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_12 !== null) {
                //     //     $('#catatan-keperawatan-sesudah-op-12').prop('checked', true)
                //     // }

                    
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_12 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-12').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_12);
                //     }

                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_13 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-13').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_13);
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_14 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-14').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_15 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-15').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_16 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-16').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_17 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-17').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_18 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-18').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_18);
                //     }
                //     // if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_19 !== null) {
                //     //     $('#catatan-keperawatan-sesudah-op-19').prop('checked', true)
                //     // }

                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_19 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-19').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_19);
                //     }


                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_20 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-20').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_21 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-21').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_22 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-22').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_23 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-23').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_24 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-24').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_25 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-25').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_26 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-26').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_27 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-27').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_27);
                //     }
                //     // if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_28 !== null) {
                //     //     $('#catatan-keperawatan-sesudah-op-28').prop('checked', true)
                //     // }

                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_28 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-28').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_28);
                //     }

                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_29 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-29').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_30 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-30').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_31 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-31').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_32 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-32').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_33 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-33').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_34 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-34').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_35 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-35').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_36 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-36').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_36);
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_37 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-37').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_38 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-38').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_39 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-39').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_40 === '1') {
                //         $('#catatan-keperawatan-sesudah-op-40').prop('checked', true).change
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_40 === '2') {
                //         $('#catatan-keperawatan-sesudah-op-41').prop('checked', true).change
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_42 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-42').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_43 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-43').prop('checked', true)
                //     }
                //     if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_44 !== null) {
                //         $('#catatan-keperawatan-sesudah-op-44').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_44);
                //     }
                //     // CATATAN KEPERAWATAN SESUDAH OPERASI AKHIR    

                //     // CEKLIS PERSIAPAN OPERASI AWAL
                //     const ceklis_persiapan_operasi = JSON.parse(data.catatan_keperawatan_perioperatif.ceklis_persiapan_operasi);
                //     if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_1 !== null) {
                //         $('#ceklis-persiapan-operasi-1').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_2 !== null) {
                //         $('#ceklis-persiapan-operasi-2').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_3 !== null) {
                //         $('#ceklis-persiapan-operasi-3').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_4 !== null) {
                //         $('#ceklis-persiapan-operasi-4').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_5 !== null) {
                //         $('#ceklis-persiapan-operasi-5').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_6 !== null) {
                //         $('#ceklis-persiapan-operasi-6').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_7 !== null) {
                //         $('#ceklis-persiapan-operasi-7').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_8 !== null) {
                //         $('#ceklis-persiapan-operasi-8').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_9 !== null) {
                //         $('#ceklis-persiapan-operasi-9').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_10 !== null) {
                //         $('#ceklis-persiapan-operasi-10').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_11 !== null) {
                //         $('#ceklis-persiapan-operasi-11').val(ceklis_persiapan_operasi.ceklis_persiapan_operasi_11);
                //     }
                //     if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_12 !== null) {
                //         $('#ceklis-persiapan-operasi-12').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_13 !== null) {
                //         $('#ceklis-persiapan-operasi-13').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_14 !== null) {
                //         $('#ceklis-persiapan-operasi-14').val(ceklis_persiapan_operasi.ceklis_persiapan_operasi_14);
                //     }
                //     if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_15 !== null) {
                //         $('#ceklis-persiapan-operasi-15').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasi.ceklis_persiapan_operasi_16 !== null) {
                //         $('#ceklis-persiapan-operasi-16').prop('checked', true)
                //     }

                //     const ceklis_persiapan_operasii = JSON.parse(data.catatan_keperawatan_perioperatif.ceklis_persiapan_operasii);
                //     if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_1 !== null) {
                //         $('#ceklis-persiapan-operasii-1').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_2 !== null) {
                //         $('#ceklis-persiapan-operasii-2').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_3 !== null) {
                //         $('#ceklis-persiapan-operasii-3').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_4 !== null) {
                //         $('#ceklis-persiapan-operasii-4').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_5 !== null) {
                //         $('#ceklis-persiapan-operasii-5').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_6 !== null) {
                //         $('#ceklis-persiapan-operasii-6').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_7 !== null) {
                //         $('#ceklis-persiapan-operasii-7').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_8 !== null) {
                //         $('#ceklis-persiapan-operasii-8').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_9 !== null) {
                //         $('#ceklis-persiapan-operasii-9').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_10 !== null) {
                //         $('#ceklis-persiapan-operasii-10').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_11 !== null) {
                //         $('#ceklis-persiapan-operasii-11').val(ceklis_persiapan_operasii.ceklis_persiapan_operasii_11);
                //     }
                //     if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_12 !== null) {
                //         $('#ceklis-persiapan-operasii-12').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_13 !== null) {
                //         $('#ceklis-persiapan-operasii-13').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_14 !== null) {
                //         $('#ceklis-persiapan-operasii-14').val(ceklis_persiapan_operasii.ceklis_persiapan_operasii_14);
                //     }
                //     if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_15 !== null) {
                //         $('#ceklis-persiapan-operasii-15').prop('checked', true)
                //     }
                //     if (ceklis_persiapan_operasii.ceklis_persiapan_operasii_16 !== null) {
                //         $('#ceklis-persiapan-operasii-16').prop('checked', true)
                //     }

                //     const ceklis_persiapan_operasiii = JSON.parse(data.catatan_keperawatan_perioperatif.ceklis_persiapan_operasiii);
                //     if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_1 !== null) {
                //         $('#ceklis-persiapan-operasiii-1').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_1);
                //     }
                //     if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_2 !== null) {
                //         $('#ceklis-persiapan-operasiii-2').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_2);
                //     }
                //     if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_3 !== null) {
                //         $('#ceklis-persiapan-operasiii-3').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_3);
                //     }
                //     if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_4 !== null) {
                //         $('#ceklis-persiapan-operasiii-4').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_4);
                //     }
                //     if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_5 !== null) {
                //         $('#ceklis-persiapan-operasiii-5').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_5);
                //     }
                //     if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_6 !== null) {
                //         $('#ceklis-persiapan-operasiii-6').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_6);
                //     }
                //     if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_7 !== null) {
                //         $('#ceklis-persiapan-operasiii-7').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_7);
                //     }
                //     if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_8 !== null) {
                //         $('#ceklis-persiapan-operasiii-8').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_8);
                //     }
                //     if (ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_9 !== null) {
                //         $('#ceklis-persiapan-operasiii-9').val(ceklis_persiapan_operasiii.ceklis_persiapan_operasiii_9);
                //     }

                //     $('#keterangan-cpo').val(data.catatan_keperawatan_perioperatif.keterangan_cpo);

                //     const jam_cpo = JSON.parse(data.catatan_keperawatan_perioperatif.jam_cpo);
                //     if (jam_cpo.jam_cpo_1 !== null) {
                //         $('#jam-cpo-1').val(jam_cpo.jam_cpo_1);
                //     }
                //     if (jam_cpo.jam_cpo_2 !== null) {
                //         $('#jam-cpo-2').val(jam_cpo.jam_cpo_2);
                //     }

                //     $('#perawat-cpo').val(data.catatan_keperawatan_perioperatif.perawat_cpo);
                //     $('#s2id_perawat-cpo a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_12);
                //     $('#barang-cpo').val(data.catatan_keperawatan_perioperatif.barang_cpo);

                //     $('#perawatt-cpo').val(data.catatan_keperawatan_perioperatif.perawatt_cpo);
                //     $('#s2id_perawatt-cpo a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_13);
                //     $('#jam-tanggal-cpo').val((data.catatan_keperawatan_perioperatif.jam_tanggal_cpo !== null ? datetimefmysql(data.catatan_keperawatan_perioperatif.jam_tanggal_cpo) : ''));
                //     // CEKLIS PERSIAPAN OPERASI AWAL  

                //     //   ASUHAN KEPERAWATAN 3 AWAL
                //     const asssuhan_keperawatan_ak_3 = JSON.parse(data.catatan_keperawatan_perioperatif.asssuhan_keperawatan_ak_3);
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_1 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-1').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_2 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-2').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_3 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-3').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_4 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-4').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_5 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-5').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_6 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-6').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_7 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-7').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_8 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-8').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_9 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-9').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_10 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-10').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_11 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-11').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_12 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-12').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_13 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-13').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_14 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-14').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_15 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-15').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_16 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-16').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_17 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-17').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_17);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_18 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-18').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_19 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-19').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_20 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-20').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_20);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_21 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-21').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_22 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-22').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_23 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-23').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_23);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_24 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-24').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_25 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-25').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_26 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-26').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_27 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-27').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_28 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-28').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_29 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-29').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_30 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-30').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_31 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-31').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_32 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-32').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_33 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-33').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_34 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-34').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_35 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-35').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_36 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-36').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_37 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-37').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_38 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-38').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_39 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-39').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_40 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-40').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_41 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-41').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_41);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_42 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-42').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_43 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-43').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_44 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-44').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_44);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_45 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-45').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_46 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-46').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_47 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-47').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_47);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_48 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-48').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_49 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-49').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_50 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-50').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_51 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-51').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_52 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-52').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_53 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-53').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_53);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_54 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-54').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_55 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-55').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_56 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-56').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_57 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-57').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_58 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-58').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_59 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-59').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_60 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-60').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_61 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-61').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_62 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-62').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_62);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_63 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-63').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_64 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-64').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_65 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-65').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_65);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_66 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-66').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_67 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-67').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_68 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-68').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_68);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_69 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-69').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_70 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-70').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_71 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-71').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_72 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-72').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_73 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-73').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_74 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-74').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_75 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-75').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_76 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-76').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_77 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-77').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_77);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_78 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-78').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_79 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-79').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_80 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-80').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_80);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_81 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-81').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_82 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-82').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_83 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-83').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_84 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-84').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_85 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-85').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_86 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-86').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_86);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_87 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-87').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_88 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-88').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_89 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-89').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_90 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-90').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_91 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-91').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_92 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-92').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_92);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_93 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-93').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_94 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-94').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_95 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-95').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_96 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-96').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_97 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-97').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_98 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-98').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_98);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_99 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-99').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_100 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-100').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_101 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-101').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_102 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-102').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_103 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-103').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_103);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_104 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-104').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_105 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-105').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_105);
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_106 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-106').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_107 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-107').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_108 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-108').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_109 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-109').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_110 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-110').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_111 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-111').prop('checked', true)
                //     }
                //     if (asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_112 !== null) {
                //         $('#asssuhan-keperawatannnnn-ak-112').val(asssuhan_keperawatan_ak_3.asssuhan_keperawatannnnn_ak_112);
                //     }

                //     $('#perawwat-ruangan-prrr').val(data.catatan_keperawatan_perioperatif.perawwat_ruangan_prrr);
                //     $('#s2id_perawwat-ruangan-prrr a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_14);

                //     $('#perawwat-anastesi-paaa').val(data.catatan_keperawatan_perioperatif.perawwat_anastesi_paaa);
                //     $('#s2id_perawwat-anastesi-paaa a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_15);

                //     $('#perawwat-kamar-bedahhh').val(data.catatan_keperawatan_perioperatif.perawwat_kamar_bedahhh);
                //     $('#s2id_perawwat-kamar-bedahhh a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.nama_perawat_16);                     
                // } 



                // Membuat salinan data lama dari data.catatan_keperawatan_perioperatif  JANGAN DI HAPUS INI DATA BARU  jika user butuh data lama buka kodingan di atas
                if (data.catatan_keperawatan_perioperatif !== null) {
                    data.catatan_keperawatan_perioperatif.id = null;
                    data.catatan_keperawatan_perioperatif.suhu_ckp = '{}'; // Setel string JSON ke objek kosong
                    data.catatan_keperawatan_perioperatif.status_mental_ckp = '{}'; 
                    data.catatan_keperawatan_perioperatif.riwayat_penyakit_ckp = '{}'; 
                    data.catatan_keperawatan_perioperatif.alergi_ckp = '{}'; 
                    data.catatan_keperawatan_perioperatif.gol_darah_ckp = '{}'; 
                    data.catatan_keperawatan_perioperatif.standar_kewaspadaan_ckp = '{}'; 
                    data.catatan_keperawatan_perioperatif.verifikasi_pasien_ckp = '{}'; 
                    data.catatan_keperawatan_perioperatif.persiapan_fisik_pasien_ckp = '{}'; 
                    data.catatan_keperawatan_perioperatif.site_marketing = '{}'; 
                    data.catatan_keperawatan_perioperatif.asuhan_keperawatan_ak_1 = '{}'; 
                    data.catatan_keperawatan_perioperatif.time_out_ckio = '{}'; 
                    data.catatan_keperawatan_perioperatif.catatan_keperawatan_intra_operasi = '{}'; 
                    data.catatan_keperawatan_perioperatif.catatan_keperawatan_intra_op = '{}'; 
                    data.catatan_keperawatan_perioperatif.asuhan_keperawatan_ak_2 = '{}'; 
                    data.catatan_keperawatan_perioperatif.catatan_keperawatan_sesudah_operasi = '{}'; 
                    data.catatan_keperawatan_perioperatif.catatan_keperawatan_sesudah_op = '{}'; 
                    data.catatan_keperawatan_perioperatif.ceklis_persiapan_operasi = '{}'; 
                    data.catatan_keperawatan_perioperatif.ceklis_persiapan_operasii = '{}'; 
                    data.catatan_keperawatan_perioperatif.ceklis_persiapan_operasiii = '{}'; 
                    data.catatan_keperawatan_perioperatif.jam_cpo = '{}'; 
                    data.catatan_keperawatan_perioperatif.asssuhan_keperawatan_ak_3 = '{}'; 
                   
                    data.catatan_keperawatan_perioperatif.pengobatan_saat_ini_ckp = '';
                    data.catatan_keperawatan_perioperatif.operasi_sebelumnya_ckp = '';
                    data.catatan_keperawatan_perioperatif.rencana_tindakan_operasi_ckp = '';
                    data.catatan_keperawatan_perioperatif.rencana_perawatan_pasca_operasi_ckp = '';
                    data.catatan_keperawatan_perioperatif.jam_pfp = '';
                    data.catatan_keperawatan_perioperatif.jam_ppo = '';
                    data.catatan_keperawatan_perioperatif.jam_tanggal_po = '';
                    data.catatan_keperawatan_perioperatif.tanggal_jam_ckio = '';
                    data.catatan_keperawatan_perioperatif.keterangan_cpo = '';
                    data.catatan_keperawatan_perioperatif.barang_cpo = '';
                    data.catatan_keperawatan_perioperatif.jam_tanggal_cpo = '';

                    data.catatan_keperawatan_perioperatif.dokter_operator_ckp = '';
                    data.catatan_keperawatan_perioperatif.nama_dokter_1 = '';
                    data.catatan_keperawatan_perioperatif.perawat_ruangan_pfp = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_1 = '';
                    data.catatan_keperawatan_perioperatif.perawat_penerima_ot_ppo = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_2 = '';
                    data.catatan_keperawatan_perioperatif.perawat_ot_po = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_3 = '';
                    data.catatan_keperawatan_perioperatif.perawwat_ruangan_pr = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_4 = '';
                    data.catatan_keperawatan_perioperatif.perawwat_anastesi_pa = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_5 = '';
                    data.catatan_keperawatan_perioperatif.perawwat_kamar_bedah = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_6 = '';
                    data.catatan_keperawatan_perioperatif.perawat_instrument_1 = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_7 = '';
                    data.catatan_keperawatan_perioperatif.perawat_instrument_2 = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_8 = '';
                    data.catatan_keperawatan_perioperatif.perawwat_ruangan_prr = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_9 = '';
                    data.catatan_keperawatan_perioperatif.perawwat_anastesi_paa = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_10 = '';
                    data.catatan_keperawatan_perioperatif.perawwat_kamar_bedahh = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_11 = '';
                    data.catatan_keperawatan_perioperatif.perawat_cpo = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_12 = '';
                    data.catatan_keperawatan_perioperatif.perawatt_cpo = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_13 = '';
                    data.catatan_keperawatan_perioperatif.perawwat_ruangan_prrr = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_14 = '';
                    data.catatan_keperawatan_perioperatif.perawwat_anastesi_paaa = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_15 = '';
                    data.catatan_keperawatan_perioperatif.perawwat_kamar_bedahhh = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_16 = '';

                    data.catatan_keperawatan_perioperatif.perawwat_ruangan_sirkuler = '';
                    data.catatan_keperawatan_perioperatif.nama_perawat_17 = '';
                }


                $('#bed-ckp').text(bed);
                $('#modal_form_ckp').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function resetFormCkp() {
        $('#wizard-operasi').bwizard('show', '0');
        $('#form_entri_ckp_kamar_operasi')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);       
    }


    function konfirmasiSimpanEntriCkp() {
        var stop = false;
        if (!stop) {
            var id_ckp = $('#id-ckp').val();
            var text;
            var btnTextConfirmCKP;


            if (id_ckp) {
                text = 'Apakah anda yakin ingin mengupdate data ini ?';
                btnTextConfirmCKP = 'Update';
            } else {
                text = 'Apakah anda yakin ingin menyimpan data ini ?';
                btnTextConfirmCKP = 'Simpan';
            }
            swal.fire({
                title: 'Konfirmasi ?',
                html: text,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>' + btnTextConfirmCKP,
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    SimpanEntriCkp();
                }
            });
        }

    }

    function SimpanEntriCkp() {
        var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-ckp').val(); 
        // console.log(id_layanan_pendaftaran);
        $.ajax({
            type: 'POST',
            url: '<?= base_url("order_operasi/api/Order_operasi/simpan_entri_ckp") ?>',
            data: $('#form_entri_ckp_kamar_operasi').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
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
                        $('#modal_form_ckp').modal('hide');
                        showListForm($('#id-pendaftaran-ckp').val(), $('#id-layanan-pendaftaran-ckp').val(), $('#id-pasien-ckp').val());
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

    // GRAFIK  CKP
    function grafikOperasi(data) {
        let result = {
            Suhu: {
                category: [],
                value: []
            },
            "Tekanan Darah": {
                category: [],
                value: []
            },
            Oksigen: {
                category: [],
                value: []
            }
        }
        let categories = []
        if (data !== undefined && data !== null) {
            result = JSON.parse(data);
            categories = [...result['Suhu'].category, ...result['Tekanan Darah'].category, ...result['Oksigen'].category];
            categories = categories.filter((value, index) => categories.indexOf(value) === index)
        }

        const suhu = {
            name: 'Suhu',
            data: result['Suhu'].value,
            color: '#0000FF',
            connectNulls: true
        }
        const tekananDarah = {
            name: 'Tekanan Darah',
            data: result['Tekanan Darah'].value,
            color: '#FF0000',
            connectNulls: true
        }

        const oksigen = {
            name: 'Oksigen',
            data: result['Oksigen'].value,
            color: '#00FF00',
            connectNulls: true

        }
        const option = {
            cart: {
                type: 'line',
                restZoomButton: {
                    position: {
                        x: -10,
                        y: 10
                    }
                },
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        // Set options for small screens
                    }, {
                        // Set options for larger screens
                    }]
                }
            },
            xAxis: {
                categories: categories
            },
            yAxis: [{
                    min: 10,
                    max: 200,
                    tickInterval: 10,
                    title: {
                        text: 'BP',
                        rotation: 0,
                        align: 'middle',
                        offset: 0,
                        y: -155,
                        x: -50
                    }
                },
                {
                    title: {
                        text: 'v',
                        rotation: 0,
                        align: 'middle',
                        offset: 0,
                        y: -140,
                        x: -9
                    }
                },
                {
                    title: {
                        text: '^',
                        rotation: 0,
                        align: 'middle',
                        offset: 0,
                        y: -113,
                        x: -2
                    }
                },
                {
                    title: {
                        text: 'P/R',
                        rotation: 0,
                        align: 'middle',
                        offset: 0,
                        y: 1,
                        x: -2
                    }
                },
                {
                    title: {
                        text: 'Sp02',
                        rotation: 0,
                        align: 'middle',
                        offset: 0,
                        y: 50,
                        x: +20
                    }
                },
                {
                    title: {
                        text: 'x',
                        rotation: 0,
                        align: 'middle',
                        offset: 0,
                        y: 100,
                        x: +55
                    }
                },
            ],
            series: [suhu, tekananDarah, oksigen]
        }

        $('#btn-reset-ckp').on('click', function() {
            grafik.update(option)
        })
    }

    // <td class="center">${((v.updated_at !== null) ? datetime2date(v.updated_at) : '')}</td> ini munculkan tgl ajah

    // <td class="center">${((v.updated_at !== null) ? v.updated_at : '')}</td> ini munculkan tgl/jam tapi kebalik    

    // CKP BARU
    function getListDataCatatanPerioperatif (id_pendaftaran, bed, page) {
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_operasi/api/order_operasi/get_list_data_catatan_perioperatif") ?>/page/' + page +
                '/id_pendaftaran/' + id_pendaftaran,       
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                $('#wizard-operasi').bwizard('show', '1');
                $('#table-catatan-perioperatif tbody').empty();
                $.each(data.data, function(i, v) {
                    let selPetugas = '';
                    let idEkLayanan = $('#id-layanan-pendaftaran-ckp').val();
                    let butHapus = '';
                    if (v.id_layanan_pendaftaran === idEkLayanan) {
                        butHapus =
                            `<button id="hapus-catatan-perioperatif-cp" type="button" class="btn btn-secondary btn-xs" onclick="hapusDataCatatanPerioperatif(this, ${v.id_data_catatan_perioperatift})" ><i class="fas fa-fw fa-trash-alt mr-1"></i>Hapus</button>`;
                    } else {
                        butHapus = '';
                    }
                    let html = /* html */ `
                        <tr>
                            <td class="center">${(++i)}</td>   
                            <td class="center">${((v.updated_at !== null) ? v.updated_at : '')}</td>                                 
                            <td class="center">${((v.user !== null) ? v.user : '')}</td>
                            <td class="Alat">                                                         
                                <button id="lihat-catatan-perioperatif-cp" type="button" class="btn btn-secondary btn-xxs" onclick="lihatDataCatatanPerioperatif(${v.id_data_catatan_perioperatift},'${v.id_pendaftaran}','${v.id_layanan_pendaftaran}')"><i class="fas fa-eye m-r-5"></i>Lihat</button>           
                                <button id="edit-catatan-perioperatif-cp" type="button" class="btn btn-secondary btn-xxs" onclick="editDataCatatanPerioperatif(${v.id_data_catatan_perioperatift},'${v.id_pendaftaran}','${v.id_layanan_pendaftaran}')"><i class="fas fa-edit m-r-5"></i>Edit</button>
                                ${butHapus}
                            </td>
                        </tr>
                    `;
                    $('#table-catatan-perioperatif tbody').append(html);
                })

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed('Gagal mendapatkan data!');
            }
        });
    }


    // CKP BARU EDIT
    function editDataCatatanPerioperatif(id, id_pendaftaran, id_layanan_pendaftaran, bed, action) {   
        $('#wizard-operasi').bwizard('show', '0');
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_operasi/api/order_operasi/get_edit_data_catatan_perioperatif") ?>/id_pendaftaran/' + id_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },   
            success: function(data) {             
                // console.log(data);
                $('#id_data_catatan_perioperatift').val(data.id_data_catatan_perioperatift);
                $('#cdp_id_layanan_pendaftaran').val(data.id_layanan_pendaftaran);

                let catatan_keperawatan_perioperatif = data.catatan_keperawatan_perioperatif;
                if (catatan_keperawatan_perioperatif !== null) {
                    $('#id-cpt').val(data.catatan_keperawatan_perioperatif.data.id);     
                    $('#id_data_catatan_perioperatift').val(data.catatan_keperawatan_perioperatif.data.id_data_catatan_perioperatift);

                    const suhu_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.data.suhu_ckp);
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

                    const status_mental_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.data.status_mental_ckp);
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

                    const riwayat_penyakit_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.data.riwayat_penyakit_ckp);
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

                    
                    $('#pengobatan-saat-ini-ckp').val(data.catatan_keperawatan_perioperatif.data.pengobatan_saat_ini_ckp);
                    $('#operasi-sebelumnya-ckp').val(data.catatan_keperawatan_perioperatif.data.operasi_sebelumnya_ckp);

                    const alergi_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.data.alergi_ckp);
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

                    const gol_darah_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.data.gol_darah_ckp);
                    if (gol_darah_ckp.gol_darah_ckp_1 !== null) {
                        $('#gol-darah-ckp-1').val(gol_darah_ckp.gol_darah_ckp_1);
                    }
                    if (gol_darah_ckp.gol_darah_ckp_2 !== null) {
                        $('#gol-darah-ckp-2').val(gol_darah_ckp.gol_darah_ckp_2);
                    }

                    const standar_kewaspadaan_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.data.standar_kewaspadaan_ckp);
                    if (standar_kewaspadaan_ckp.standar_kewaspadaan_ckp_1 !== null) {
                        $('#standar-kewaspadaan-ckp-1').val(standar_kewaspadaan_ckp.standar_kewaspadaan_ckp_1);
                    }
                    if (standar_kewaspadaan_ckp.standar_kewaspadaan_ckp_2 !== null) {
                        $('#standar-kewaspadaan-ckp-2').val(standar_kewaspadaan_ckp.standar_kewaspadaan_ckp_2);
                    }

                    $('#rencana-tindakan-operasi-ckp').val(data.catatan_keperawatan_perioperatif.data.rencana_tindakan_operasi_ckp);
                    $('#dokter-operator-ckp').val(data.catatan_keperawatan_perioperatif.data.dokter_operator_ckp);
                    $('#s2id_dokter-operator-ckp a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_dokter_1);
                    $('#rencana-perawatan-pasca-operasi-ckp').val(data.catatan_keperawatan_perioperatif.data.rencana_perawatan_pasca_operasi_ckp);
                    // BATAS A AKHIR

                    // BATAS B AWAL
                    const verifikasi_pasien_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.data.verifikasi_pasien_ckp);
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

                    const persiapan_fisik_pasien_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.data.persiapan_fisik_pasien_ckp);
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

                    $('#perawat-ruangan-pfp').val(data.catatan_keperawatan_perioperatif.data.perawat_ruangan_pfp);
                    $('#s2id_perawat-ruangan-pfp a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_1);
                    $('#jam-pfp').val(data.catatan_keperawatan_perioperatif.data.jam_pfp);
                    $('#perawat-penerima-ot-ppo').val(data.catatan_keperawatan_perioperatif.data.perawat_penerima_ot_ppo);
                    $('#s2id_perawat-penerima-ot-ppo a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_2);
                    $('#jam-ppo').val(data.catatan_keperawatan_perioperatif.data.jam_ppo);

                    const site_marketing = JSON.parse(data.catatan_keperawatan_perioperatif.data.site_marketing);
                    if (site_marketing.site_marketing === '1') {
                        $('#site-marketing-1').prop('checked', true).change()
                    }
                    if (site_marketing.site_marketing === '0') {
                        $('#site-marketing-2').prop('checked', true).change()
                    }

                    $('#perawat-ot-po').val(data.catatan_keperawatan_perioperatif.data.perawat_ot_po);
                    $('#s2id_perawat-ot-po a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_3);
                    $('#jam-tanggal-po').val((data.catatan_keperawatan_perioperatif.data.jam_tanggal_po !== null ? datetimefmysql(data.catatan_keperawatan_perioperatif.data.jam_tanggal_po) : ''));
                    // BATAS B AKHIR

                    //  ASUHAN KEPERAWATAN 1 AWAL
                    const asuhan_keperawatan_ak_1 = JSON.parse(data.catatan_keperawatan_perioperatif.data.asuhan_keperawatan_ak_1);
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
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_58 !== null) {
                        $('#asuhan-keperawatan-ak-58').prop('checked', true)
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

                    $('#perawwat-ruangan-pr').val(data.catatan_keperawatan_perioperatif.data.perawwat_ruangan_pr);
                    $('#s2id_perawwat-ruangan-pr a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_4);
                    $('#perawwat-anastesi-pa').val(data.catatan_keperawatan_perioperatif.data.perawwat_anastesi_pa);
                    $('#s2id_perawwat-anastesi-pa a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_5);
                    $('#perawwat-kamar-bedah').val(data.catatan_keperawatan_perioperatif.data.perawwat_kamar_bedah);
                    $('#s2id_perawwat-kamar-bedah a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_6);
                    //  ASUHAN KEPERAWATAN 1 AKHIR

                    // CATATAN KEPEERAWATAN INTARA OPERASI AWAL
                    const time_out_ckio = JSON.parse(data.catatan_keperawatan_perioperatif.data.time_out_ckio);
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

                    const catatan_keperawatan_intra_operasi = JSON.parse(data.catatan_keperawatan_perioperatif.data.catatan_keperawatan_intra_operasi);
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
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_16 === 'kiri') {
                    //     $('#catatan-keperawatan-intra-operasi-16').prop('checked', true).change()
                    // }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_16 === 'kanan') {
                    //     $('#catatan-keperawatan-intra-operasi-17').prop('checked', true).change()
                    // }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_18 !== null) {
                        $('#catatan-keperawatan-intra-operasi-18').prop('checked', true)
                    }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_19 === '1') {
                    //     $('#catatan-keperawatan-intra-operasi-19').prop('checked', true).change()
                    // }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_19 === '2') {
                    //     $('#catatan-keperawatan-intra-operasi-20').prop('checked', true).change()
                    // }
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
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_30 === '1') {
                    //     $('#catatan-keperawatan-intra-operasi-30').prop('checked', true).change()
                    // }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_30 === '2') {
                    //     $('#catatan-keperawatan-intra-operasi-31').prop('checked', true).change()
                    // }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_32 !== null) {
                        $('#catatan-keperawatan-intra-operasi-32').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_33 !== null) {
                        $('#catatan-keperawatan-intra-operasi-33').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_33);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_34 !== null) {
                        $('#catatan-keperawatan-intra-operasi-34').prop('checked', true)
                    }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_35 === '1') {
                    //     $('#catatan-keperawatan-intra-operasi-35').prop('checked', true).change()
                    // }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_35 === '2') {
                    //     $('#catatan-keperawatan-intra-operasi-36').prop('checked', true).change()
                    // }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_37 !== null) {
                        $('#catatan-keperawatan-intra-operasi-37').prop('checked', true)
                    }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_38 === '1') {
                    //     $('#catatan-keperawatan-intra-operasi-38').prop('checked', true).change()
                    // }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_38 === '2') {
                    //     $('#catatan-keperawatan-intra-operasi-39').prop('checked', true).change()
                    // }
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
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_61 === '1') {
                    //     $('#catatan-keperawatan-intra-operasi-61').prop('checked', true)
                    // }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_61 === '2') {
                    //     $('#catatan-keperawatan-intra-operasi-62').prop('checked', true)
                    // }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_63 !== null) {
                        $('#catatan-keperawatan-intra-operasi-63').prop('checked', true)
                    }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_64 === '1') {
                    //     $('#catatan-keperawatan-intra-operasi-64').prop('checked', true)
                    // }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_64 === '2') {
                    //     $('#catatan-keperawatan-intra-operasi-65').prop('checked', true)
                    // }
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

                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_92 !== null) {
                        $('#catatan-keperawatan-intra-operasi-92').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_92);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_93 !== null) {
                        $('#catatan-keperawatan-intra-operasi-93').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_93);
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

                    const catatan_keperawatan_intra_op = JSON.parse(data.catatan_keperawatan_perioperatif.data.catatan_keperawatan_intra_op);
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
                    $('#tanggal-jam-ckio').val((data.catatan_keperawatan_perioperatif.data.tanggal_jam_ckio !== null ? datetimefmysql(data.catatan_keperawatan_perioperatif.data.tanggal_jam_ckio) : ''));
                    $('#perawat-instrument-1').val(data.catatan_keperawatan_perioperatif.data.perawat_instrument_1);
                    $('#s2id_perawat-instrument-1 a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_7);
                    $('#perawat-instrument-2').val(data.catatan_keperawatan_perioperatif.data.perawat_instrument_2);
                    $('#s2id_perawat-instrument-2 a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_8);
                    // CATATAN KEPEERAWATAN INTARA OPERASI AKHIR

                    // ASUHAN KEPERAWATAN 2 AWAL
                    const asuhan_keperawatan_ak_2 = JSON.parse(data.catatan_keperawatan_perioperatif.data.asuhan_keperawatan_ak_2);
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

                    $('#perawwat-ruangan-prr').val(data.catatan_keperawatan_perioperatif.data.perawwat_ruangan_prr);
                    $('#s2id_perawwat-ruangan-prr a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_9);
                    $('#perawwat-anastesi-paa').val(data.catatan_keperawatan_perioperatif.data.perawwat_anastesi_paa);
                    $('#s2id_perawwat-anastesi-paa a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_10);
                    $('#perawwat-kamar-bedahh').val(data.catatan_keperawatan_perioperatif.data.perawwat_kamar_bedahh);
                    $('#s2id_perawwat-kamar-bedahh a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_11);
                    // ASUHAN KEPERAWATAN 2 AKHIR

                    // CATATAN KEPERAWATAN SESUDAH OPERASI AWAL  
                    const catatan_keperawatan_sesudah_operasi = JSON.parse(data.catatan_keperawatan_perioperatif.data.catatan_keperawatan_sesudah_operasi);
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


                    const catatan_keperawatan_sesudah_op = JSON.parse(data.catatan_keperawatan_perioperatif.data.catatan_keperawatan_sesudah_op);
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
                    // if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_6 !== null) {
                    //     $('#catatan-keperawatan-sesudah-op-6').prop('checked', true)
                    // }

                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_6 !== null) {
                        $('#catatan-keperawatan-sesudah-op-6').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_6);
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
                    // if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_12 !== null) {
                    //     $('#catatan-keperawatan-sesudah-op-12').prop('checked', true)
                    // }

                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_12 !== null) {
                        $('#catatan-keperawatan-sesudah-op-12').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_12);
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
                    // if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_19 !== null) {
                    //     $('#catatan-keperawatan-sesudah-op-19').prop('checked', true)
                    // }

                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_19 !== null) {
                        $('#catatan-keperawatan-sesudah-op-19').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_19);
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
                    // if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_28 !== null) {
                    //     $('#catatan-keperawatan-sesudah-op-28').prop('checked', true)
                    // }

                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_28 !== null) {
                        $('#catatan-keperawatan-sesudah-op-28').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_28);
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
                    const ceklis_persiapan_operasi = JSON.parse(data.catatan_keperawatan_perioperatif.data.ceklis_persiapan_operasi);
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

                    const ceklis_persiapan_operasii = JSON.parse(data.catatan_keperawatan_perioperatif.data.ceklis_persiapan_operasii);
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

                    const ceklis_persiapan_operasiii = JSON.parse(data.catatan_keperawatan_perioperatif.data.ceklis_persiapan_operasiii);
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

                    $('#keterangan-cpo').val(data.catatan_keperawatan_perioperatif.data.keterangan_cpo);

                    const jam_cpo = JSON.parse(data.catatan_keperawatan_perioperatif.data.jam_cpo);
                    if (jam_cpo.jam_cpo_1 !== null) {
                        $('#jam-cpo-1').val(jam_cpo.jam_cpo_1);
                    }
                    if (jam_cpo.jam_cpo_2 !== null) {
                        $('#jam-cpo-2').val(jam_cpo.jam_cpo_2);
                    }

                    $('#perawat-cpo').val(data.catatan_keperawatan_perioperatif.data.perawat_cpo);
                    $('#s2id_perawat-cpo a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_12);
                    $('#barang-cpo').val(data.catatan_keperawatan_perioperatif.data.barang_cpo);

                    $('#perawatt-cpo').val(data.catatan_keperawatan_perioperatif.data.perawatt_cpo);
                    $('#s2id_perawatt-cpo a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_13);
                    $('#jam-tanggal-cpo').val((data.catatan_keperawatan_perioperatif.data.jam_tanggal_cpo !== null ? datetimefmysql(data.catatan_keperawatan_perioperatif.data.jam_tanggal_cpo) : ''));
                    // CEKLIS PERSIAPAN OPERASI AWAL  

                    //   ASUHAN KEPERAWATAN 3 AWAL
                    const asssuhan_keperawatan_ak_3 = JSON.parse(data.catatan_keperawatan_perioperatif.data.asssuhan_keperawatan_ak_3);
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

                    $('#perawwat-ruangan-sirkuler').val(data.catatan_keperawatan_perioperatif.data.perawwat_ruangan_sirkuler);
                    $('#s2id_perawwat-ruangan-sirkuler a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_17);

                    $('#perawwat-ruangan-prrr').val(data.catatan_keperawatan_perioperatif.data.perawwat_ruangan_prrr);
                    $('#s2id_perawwat-ruangan-prrr a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_14);

                    $('#perawwat-anastesi-paaa').val(data.catatan_keperawatan_perioperatif.data.perawwat_anastesi_paaa);
                    $('#s2id_perawwat-anastesi-paaa a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_15);

                    $('#perawwat-kamar-bedahhh').val(data.catatan_keperawatan_perioperatif.data.perawwat_kamar_bedahhh);
                    $('#s2id_perawwat-kamar-bedahhh a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_16);                  
                }     

                    
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }


    // BARU CKP LIHATTT
    function lihatDataCatatanPerioperatif(id, id_pendaftaran, id_layanan_pendaftaran, bed, action) {   
        $('#wizard-operasi').bwizard('show', '0');
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_operasi/api/order_operasi/get_edit_data_catatan_perioperatif") ?>/id_pendaftaran/' + id_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },   
            success: function(data) {
                // console.log(data);
                $('#id_data_catatan_perioperatift').val(data.id_data_catatan_perioperatift);
                $('#cdp_id_layanan_pendaftaran').val(data.id_layanan_pendaftaran);

                let catatan_keperawatan_perioperatif = data.catatan_keperawatan_perioperatif;
                if (catatan_keperawatan_perioperatif !== null) {
                    $('#id-cpt').val(data.catatan_keperawatan_perioperatif.data.id);     
                    $('#id_data_catatan_perioperatift').val(data.catatan_keperawatan_perioperatif.data.id_data_catatan_perioperatift);

                    const suhu_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.data.suhu_ckp);
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

                    const status_mental_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.data.status_mental_ckp);
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

                    const riwayat_penyakit_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.data.riwayat_penyakit_ckp);
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

                    
                    $('#pengobatan-saat-ini-ckp').val(data.catatan_keperawatan_perioperatif.data.pengobatan_saat_ini_ckp);
                    $('#operasi-sebelumnya-ckp').val(data.catatan_keperawatan_perioperatif.data.operasi_sebelumnya_ckp);

                    const alergi_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.data.alergi_ckp);
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

                    const gol_darah_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.data.gol_darah_ckp);
                    if (gol_darah_ckp.gol_darah_ckp_1 !== null) {
                        $('#gol-darah-ckp-1').val(gol_darah_ckp.gol_darah_ckp_1);
                    }
                    if (gol_darah_ckp.gol_darah_ckp_2 !== null) {
                        $('#gol-darah-ckp-2').val(gol_darah_ckp.gol_darah_ckp_2);
                    }

                    const standar_kewaspadaan_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.data.standar_kewaspadaan_ckp);
                    if (standar_kewaspadaan_ckp.standar_kewaspadaan_ckp_1 !== null) {
                        $('#standar-kewaspadaan-ckp-1').val(standar_kewaspadaan_ckp.standar_kewaspadaan_ckp_1);
                    }
                    if (standar_kewaspadaan_ckp.standar_kewaspadaan_ckp_2 !== null) {
                        $('#standar-kewaspadaan-ckp-2').val(standar_kewaspadaan_ckp.standar_kewaspadaan_ckp_2);
                    }

                    $('#rencana-tindakan-operasi-ckp').val(data.catatan_keperawatan_perioperatif.data.rencana_tindakan_operasi_ckp);
                    $('#dokter-operator-ckp').val(data.catatan_keperawatan_perioperatif.data.dokter_operator_ckp);
                    $('#s2id_dokter-operator-ckp a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_dokter_1);
                    $('#rencana-perawatan-pasca-operasi-ckp').val(data.catatan_keperawatan_perioperatif.data.rencana_perawatan_pasca_operasi_ckp);
                    // BATAS A AKHIR

                    // BATAS B AWAL
                    const verifikasi_pasien_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.data.verifikasi_pasien_ckp);
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

                    const persiapan_fisik_pasien_ckp = JSON.parse(data.catatan_keperawatan_perioperatif.data.persiapan_fisik_pasien_ckp);
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

                    $('#perawat-ruangan-pfp').val(data.catatan_keperawatan_perioperatif.data.perawat_ruangan_pfp);
                    $('#s2id_perawat-ruangan-pfp a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_1);
                    $('#jam-pfp').val(data.catatan_keperawatan_perioperatif.data.jam_pfp);
                    $('#perawat-penerima-ot-ppo').val(data.catatan_keperawatan_perioperatif.data.perawat_penerima_ot_ppo);
                    $('#s2id_perawat-penerima-ot-ppo a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_2);
                    $('#jam-ppo').val(data.catatan_keperawatan_perioperatif.data.jam_ppo);

                    const site_marketing = JSON.parse(data.catatan_keperawatan_perioperatif.data.site_marketing);
                    if (site_marketing.site_marketing === '1') {
                        $('#site-marketing-1').prop('checked', true).change()
                    }
                    if (site_marketing.site_marketing === '0') {
                        $('#site-marketing-2').prop('checked', true).change()
                    }

                    $('#perawat-ot-po').val(data.catatan_keperawatan_perioperatif.data.perawat_ot_po);
                    $('#s2id_perawat-ot-po a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_3);
                    $('#jam-tanggal-po').val((data.catatan_keperawatan_perioperatif.data.jam_tanggal_po !== null ? datetimefmysql(data.catatan_keperawatan_perioperatif.data.jam_tanggal_po) : ''));
                    // BATAS B AKHIR

                    //  ASUHAN KEPERAWATAN 1 AWAL
                    const asuhan_keperawatan_ak_1 = JSON.parse(data.catatan_keperawatan_perioperatif.data.asuhan_keperawatan_ak_1);
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
                    if (asuhan_keperawatan_ak_1.asuhan_keperawatan_ak_58 !== null) {
                        $('#asuhan-keperawatan-ak-58').prop('checked', true)
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

                    $('#perawwat-ruangan-pr').val(data.catatan_keperawatan_perioperatif.data.perawwat_ruangan_pr);
                    $('#s2id_perawwat-ruangan-pr a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_4);
                    $('#perawwat-anastesi-pa').val(data.catatan_keperawatan_perioperatif.data.perawwat_anastesi_pa);
                    $('#s2id_perawwat-anastesi-pa a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_5);
                    $('#perawwat-kamar-bedah').val(data.catatan_keperawatan_perioperatif.data.perawwat_kamar_bedah);
                    $('#s2id_perawwat-kamar-bedah a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_6);
                    //  ASUHAN KEPERAWATAN 1 AKHIR

                    // CATATAN KEPEERAWATAN INTARA OPERASI AWAL
                    const time_out_ckio = JSON.parse(data.catatan_keperawatan_perioperatif.data.time_out_ckio);
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

                    const catatan_keperawatan_intra_operasi = JSON.parse(data.catatan_keperawatan_perioperatif.data.catatan_keperawatan_intra_operasi);
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
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_16 === 'kiri') {
                    //     $('#catatan-keperawatan-intra-operasi-16').prop('checked', true).change()
                    // }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_16 === 'kanan') {
                    //     $('#catatan-keperawatan-intra-operasi-17').prop('checked', true).change()
                    // }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_18 !== null) {
                        $('#catatan-keperawatan-intra-operasi-18').prop('checked', true)
                    }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_19 === '1') {
                    //     $('#catatan-keperawatan-intra-operasi-19').prop('checked', true).change()
                    // }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_19 === '2') {
                    //     $('#catatan-keperawatan-intra-operasi-20').prop('checked', true).change()
                    // }
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
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_30 === '1') {
                    //     $('#catatan-keperawatan-intra-operasi-30').prop('checked', true).change()
                    // }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_30 === '2') {
                    //     $('#catatan-keperawatan-intra-operasi-31').prop('checked', true).change()
                    // }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_32 !== null) {
                        $('#catatan-keperawatan-intra-operasi-32').prop('checked', true)
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_33 !== null) {
                        $('#catatan-keperawatan-intra-operasi-33').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_33);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_34 !== null) {
                        $('#catatan-keperawatan-intra-operasi-34').prop('checked', true)
                    }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_35 === '1') {
                    //     $('#catatan-keperawatan-intra-operasi-35').prop('checked', true).change()
                    // }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_35 === '2') {
                    //     $('#catatan-keperawatan-intra-operasi-36').prop('checked', true).change()
                    // }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_37 !== null) {
                        $('#catatan-keperawatan-intra-operasi-37').prop('checked', true)
                    }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_38 === '1') {
                    //     $('#catatan-keperawatan-intra-operasi-38').prop('checked', true).change()
                    // }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_38 === '2') {
                    //     $('#catatan-keperawatan-intra-operasi-39').prop('checked', true).change()
                    // }
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
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_61 === '1') {
                    //     $('#catatan-keperawatan-intra-operasi-61').prop('checked', true)
                    // }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_61 === '2') {
                    //     $('#catatan-keperawatan-intra-operasi-62').prop('checked', true)
                    // }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_63 !== null) {
                        $('#catatan-keperawatan-intra-operasi-63').prop('checked', true)
                    }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_64 === '1') {
                    //     $('#catatan-keperawatan-intra-operasi-64').prop('checked', true)
                    // }
                    // if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_64 === '2') {
                    //     $('#catatan-keperawatan-intra-operasi-65').prop('checked', true)
                    // }
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

                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_92 !== null) {
                        $('#catatan-keperawatan-intra-operasi-92').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_92);
                    }
                    if (catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_93 !== null) {
                        $('#catatan-keperawatan-intra-operasi-93').val(catatan_keperawatan_intra_operasi.catatan_keperawatan_intra_operasi_93);
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

                    const catatan_keperawatan_intra_op = JSON.parse(data.catatan_keperawatan_perioperatif.data.catatan_keperawatan_intra_op);
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
                    $('#tanggal-jam-ckio').val((data.catatan_keperawatan_perioperatif.data.tanggal_jam_ckio !== null ? datetimefmysql(data.catatan_keperawatan_perioperatif.data.tanggal_jam_ckio) : ''));
                    $('#perawat-instrument-1').val(data.catatan_keperawatan_perioperatif.data.perawat_instrument_1);
                    $('#s2id_perawat-instrument-1 a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_7);
                    $('#perawat-instrument-2').val(data.catatan_keperawatan_perioperatif.data.perawat_instrument_2);
                    $('#s2id_perawat-instrument-2 a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_8);
                    // CATATAN KEPEERAWATAN INTARA OPERASI AKHIR

                    // ASUHAN KEPERAWATAN 2 AWAL
                    const asuhan_keperawatan_ak_2 = JSON.parse(data.catatan_keperawatan_perioperatif.data.asuhan_keperawatan_ak_2);
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

                    $('#perawwat-ruangan-prr').val(data.catatan_keperawatan_perioperatif.data.perawwat_ruangan_prr);
                    $('#s2id_perawwat-ruangan-prr a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_9);
                    $('#perawwat-anastesi-paa').val(data.catatan_keperawatan_perioperatif.data.perawwat_anastesi_paa);
                    $('#s2id_perawwat-anastesi-paa a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_10);
                    $('#perawwat-kamar-bedahh').val(data.catatan_keperawatan_perioperatif.data.perawwat_kamar_bedahh);
                    $('#s2id_perawwat-kamar-bedahh a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_11);
                    // ASUHAN KEPERAWATAN 2 AKHIR

                    // CATATAN KEPERAWATAN SESUDAH OPERASI AWAL  
                    const catatan_keperawatan_sesudah_operasi = JSON.parse(data.catatan_keperawatan_perioperatif.data.catatan_keperawatan_sesudah_operasi);
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


                    const catatan_keperawatan_sesudah_op = JSON.parse(data.catatan_keperawatan_perioperatif.data.catatan_keperawatan_sesudah_op);
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
                    // if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_6 !== null) {
                    //     $('#catatan-keperawatan-sesudah-op-6').prop('checked', true)
                    // }

                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_6 !== null) {
                        $('#catatan-keperawatan-sesudah-op-6').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_6);
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
                    // if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_12 !== null) {
                    //     $('#catatan-keperawatan-sesudah-op-12').prop('checked', true)
                    // }

                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_12 !== null) {
                        $('#catatan-keperawatan-sesudah-op-12').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_12);
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
                    // if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_19 !== null) {
                    //     $('#catatan-keperawatan-sesudah-op-19').prop('checked', true)
                    // }

                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_19 !== null) {
                        $('#catatan-keperawatan-sesudah-op-19').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_19);
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
                    // if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_28 !== null) {
                    //     $('#catatan-keperawatan-sesudah-op-28').prop('checked', true)
                    // }

                    if (catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_28 !== null) {
                        $('#catatan-keperawatan-sesudah-op-28').val(catatan_keperawatan_sesudah_op.catatan_keperawatan_sesudah_op_28);
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
                    const ceklis_persiapan_operasi = JSON.parse(data.catatan_keperawatan_perioperatif.data.ceklis_persiapan_operasi);
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

                    const ceklis_persiapan_operasii = JSON.parse(data.catatan_keperawatan_perioperatif.data.ceklis_persiapan_operasii);
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

                    const ceklis_persiapan_operasiii = JSON.parse(data.catatan_keperawatan_perioperatif.data.ceklis_persiapan_operasiii);
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

                    $('#keterangan-cpo').val(data.catatan_keperawatan_perioperatif.data.keterangan_cpo);

                    const jam_cpo = JSON.parse(data.catatan_keperawatan_perioperatif.data.jam_cpo);
                    if (jam_cpo.jam_cpo_1 !== null) {
                        $('#jam-cpo-1').val(jam_cpo.jam_cpo_1);
                    }
                    if (jam_cpo.jam_cpo_2 !== null) {
                        $('#jam-cpo-2').val(jam_cpo.jam_cpo_2);
                    }

                    $('#perawat-cpo').val(data.catatan_keperawatan_perioperatif.data.perawat_cpo);
                    $('#s2id_perawat-cpo a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_12);
                    $('#barang-cpo').val(data.catatan_keperawatan_perioperatif.data.barang_cpo);

                    $('#perawatt-cpo').val(data.catatan_keperawatan_perioperatif.data.perawatt_cpo);
                    $('#s2id_perawatt-cpo a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_13);
                    $('#jam-tanggal-cpo').val((data.catatan_keperawatan_perioperatif.data.jam_tanggal_cpo !== null ? datetimefmysql(data.catatan_keperawatan_perioperatif.data.jam_tanggal_cpo) : ''));
                    // CEKLIS PERSIAPAN OPERASI AWAL  

                    //   ASUHAN KEPERAWATAN 3 AWAL
                    const asssuhan_keperawatan_ak_3 = JSON.parse(data.catatan_keperawatan_perioperatif.data.asssuhan_keperawatan_ak_3);
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

                    $('#perawwat-ruangan-sirkuler').val(data.catatan_keperawatan_perioperatif.data.perawwat_ruangan_sirkuler);
                    $('#s2id_perawwat-ruangan-sirkuler a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_17);

                    $('#perawwat-ruangan-prrr').val(data.catatan_keperawatan_perioperatif.data.perawwat_ruangan_prrr);
                    $('#s2id_perawwat-ruangan-prrr a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_14);

                    $('#perawwat-anastesi-paaa').val(data.catatan_keperawatan_perioperatif.data.perawwat_anastesi_paaa);
                    $('#s2id_perawwat-anastesi-paaa a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_15);

                    $('#perawwat-kamar-bedahhh').val(data.catatan_keperawatan_perioperatif.data.perawwat_kamar_bedahhh);
                    $('#s2id_perawwat-kamar-bedahhh a .select2c-chosen').html(data.catatan_keperawatan_perioperatif.data.nama_perawat_16);                  
                }            
                    
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }


    // BARU CKP HAPUS
    function hapusDataCatatanPerioperatif(obj, id) {
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
                            url: '<?= base_url("order_operasi/api/order_operasi/hapus_catatan_perioperatif") ?>/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Data', data.message);
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

</script>