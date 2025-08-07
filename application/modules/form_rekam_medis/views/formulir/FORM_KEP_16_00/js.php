<script>
    // CPKJI
    // var nomer = 1;
    $(function() {
        // nomer++;
        $("#wizard-operasi").bwizard();

        $('#dokterr-1')
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

        $('#peerawat-1, #peerawat-2, #peerawat-3')
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

        $('#jam-mulai-c, #jam-selesai-c')
        .on('click', function() {
            $(this).timepicker({
                format: 'HH:mm',
                showInputs: false,
                showMeridian: false
            });
        })
    })

    // function timerzmysql(waktu) {
    //     var tm = waktu.split(':');
    //     return tm[0] + ':' + tm[1];
    // }

    // function bukaLebar(title, num) {
    //     let html = /* html */ `
    //     <div class="accordion">
    //         <div class="card">
    //             <div class="card-header" id="heading-${num}">
    //                 <h2 class="mb-0">
    //                     <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-${num}" aria-expanded="false" aria-controls="collapse-${num}">
    //                         ${title}
    //                     </button>
    //                 </h2>
    //             </div>
    //             <div id="collapse-${num}" class="collapse" aria-labelledby="heading-${num}">
    //                 <div class="card-body">       
    //     `;

    //     return html;
    // }

    // function tutupRapet(title, num) {
    //         let html = /* html */ `
    //                     </div>
    //                 </div>
    //             </div>
    //         </div>
    //     `;
    //     return html;
    // }

    // function removeList(el) {
    //     var parent = el.parentNode.parentNode;
    //     parent.parentNode.removeChild(parent);
    // }

    // function removeListTable(el) {
    //     var parent = el.parentNode.parentNode.parentNode;
    //     parent.parentNode.removeChild(parent);
    // }

    function lihatFORM_KEP_16_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';
        entriOperasi(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_16_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';
        entriOperasi(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_16_00(data) {
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

        resetFormCatatanPerhitunganKasa();
        let id_translucent = "<?= $this->session->userdata('id_translucent') ?>";
        let nama = "<?= $this->session->userdata('nama') ?>";
        let id_profesi_nadis = "<?= $this->session->userdata('id_profesi_nadis') ?>";
        let profesi_nadis = "<?= $this->session->userdata('profesi_nadis') ?>";

        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_operasi/api/Order_operasi/get_data_entri_catatan_perhitungan_kasa") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
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
                    $('#nama-pasien-cpkji').text(data.pasien.nama);
                    $('#no-rm-cpkji').text(data.pasien.no_rm);
                    $('#tanggal-lahir-cpkji').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-cpkji').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    $('#agama-cpkji').text(data.pasien.agama);
                    $('#alamat-cpkji').text(data.pasien.alamat);
                }

                let catatan_perhitungan_kasa_jarum_instrumen = data.catatan_perhitungan_kasa_jarum_instrumen;
                if (catatan_perhitungan_kasa_jarum_instrumen !== null) {
                    $('#id-cpkji').val(catatan_perhitungan_kasa_jarum_instrumen.id);

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

                    $('#tanggal-c').val(datefmysql(data.catatan_perhitungan_kasa_jarum_instrumen.tanggal_c));
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

                $('#bed-cpkji').text(bed);
                $('#modal_catatan_perhitungan_kasa').modal('show');

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }


    function resetFormCatatanPerhitunganKasa() {
        $('#form_entri_catatan_perhitungan_kasa')[0].reset()
        $("input[type='checkbox']").prop('checked', false);
        $("input[type='radio']").prop('checked', false);
    }



    function konfirmasiSimpanCatatanPerhitunganKasa() {
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
                simpanCatatanPerhitunganKasa();
            }
        })

    }



    function simpanCatatanPerhitunganKasa() {
        var dataURL = '0';
        $.ajax({
            type: 'POST',
            url: '<?= base_url("order_operasi/api/order_operasi/simpan_entri_catatan_perhitungan_kasa") ?>',
            data: $('#form_entri_catatan_perhitungan_kasa').serialize(),
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
                        $('#modal_catatan_perhitungan_kasa').modal('hide');
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

</script>