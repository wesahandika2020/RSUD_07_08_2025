<script>
    var nomer = 1;
        nomer++;

    function removeList(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    } 

    function removeListTable(el) {
        var parent = el.parentNode.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

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

    function lihatFORM_KEP_109_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        } else {
            bed = `${layanan.jenis_layanan}`;
        }
        
        let action = 'lihat';
        entriPemantauanAnestesiLokal(layanan.id_pendaftaran, layanan.id, layanan.layanan,  bed, action);
    }

    function editFORM_KEP_109_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        } else {
            bed = `${layanan.jenis_layanan}`;
        }
        
        let action = 'edit';
        entriPemantauanAnestesiLokal(layanan.id_pendaftaran, layanan.id, layanan.layanan,  bed, action);
    }

    function tambahFORM_KEP_109_01(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        } else {
            bed = `${layanan.jenis_layanan}`;
        }
        
        let action = 'tambah';
        entriPemantauanAnestesiLokal(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed,  action);
    }

    function entriPemantauanAnestesiLokal(id_pendaftaran, id_layanan_pendaftaran, layanan,  bed, action) {
        // $('#modal_pemantauan_anestesi_lokal').modal('show');
        // showPemantauanAnestesiLokalC(nomer);     
        $('#btn-simpan').hide();
        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesi_nadis') ?>';
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
            url: '<?= base_url("order_operasi/api/Order_operasi/get_data_pemantauan_anestesi_lokal") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetPemantauanAnestesiLokal(); 
                $('#id-layanan-pendaftaran-pal').val(id_layanan_pendaftaran);
                $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-pal').val(id_pendaftaran);
                
                if (data.pasien !== null) {
                    $('#id-pasien-pal').val(data.pasien.id_pasien);
                    $('#nama-pasien-pal').text(data.pasien.nama);
                    $('#no-rm-pal').text(data.pasien.no_rm);
                    $('#tgl-lahir-pal').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-pal').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                }

                // TANGGAL
                $('#data-pemantauan-anestesi-lokal').one('click', function() {
                        $('#tanggal-pemantauan-pal, #edit-tanggal-pemantauan-pal').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: new Date(),
                        beforeShow: function(i) {
                            if ($(i).attr('readonly')) {
                                return false;
                            }
                        }
                    });
                })

                // JAM
                $('#data-pemantauan-anestesi-lokal').one('click', function()  {
                    $('#jam-mulai-pal, #edit-jam-mulai-pal, #jam-selesai-pal, #edit-jam-selesai-pal, #jam-pal-1, #jam-pal-2, #jam-pal-3, #jam-pal-4, #jam-pal-5, #jam-pal-6, #jam-pal-7, #jam-pal-8, #jam-pal-9, #jam-pal-10, #jam-pal-11, #jam-pal-12,   #edit-jam-pal-1, #edit-jam-pal-2, #edit-jam-pal-3, #edit-jam-pal-4, #edit-jam-pal-5, #edit-jam-pal-6, #edit-jam-pal-7, #edit-jam-pal-8, #edit-jam-pal-9, #edit-jam-pal-10, #edit-jam-pal-11, #edit-jam-pal-12' )
                    .on('click', function() {
                        $(this).timepicker({
                            format: 'HH:mm',
                            showInputs: false,
                            showMeridian: false
                        });
                    })
                })
            
                // Perawat
                $('#data-pemantauan-anestesi-lokal').one('click', function() {
                    $('#perawat-pal, #edit-perawat-pal')
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
                })

                // Dokter
                $('#data-pemantauan-anestesi-lokal').one('click', function() {
                    $('#dokter-pal, #edit-dokter-pal')
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
                })

                // obat
                $('#data-pemantauan-anestesi-lokal').one('click', function() {
                    $('#obat-pal-1, #obat-pal-2, #obat-pal-3, #obat-pal-4, #obat-pal-5, #edit-obat-pal-1, #edit-obat-pal-2, #edit-obat-pal-3, #edit-obat-pal-4, #edit-obat-pal-5').select2c({
                        minimumInputLength: 2,
                        ajax: {
                            url: "<?= base_url('masterdata/api/masterdata_auto/obat_untuk_keperawatan') ?>",
                            dataType: 'json',
                            quietMillis: 100,
                            data: function(term,
                                page) { // page is the one-based page number tracked by Select2

                                return {
                                    q: term, //search term
                                    page: page // page number
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
                            var markup = data.nama;

                            return markup;
                        },
                        formatSelection: function(data) {
                            return data.nama;
                        }
                    });
                })
                if (typeof data.pemantauan_anestesi_lokal !== 'undefined' && data.pemantauan_anestesi_lokal !== null) {
                    showPPemantauanAnestesiLokalB(data.pemantauan_anestesi_lokal, id_pendaftaran, id_layanan_pendaftaran, bed, action);
                    showPemantauanAnestesiLokalC(nomer);                 
                } else {
                    $('#tabel-pal .body-table').empty();
                    // showPemantauanAnestesiLokalC(nomer);
                }
                $('#bed-pal').text(bed);
               
                $('#modal_pemantauan_anestesi_lokal').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function showPemantauanAnestesiLokalC(num) {
        let html = bukaLebar('Form Pemantauan Anestesi Lokal');
        html += /* html */ `
            <div class="modal-body"> 
                <div class="row">
                    <div class="from-group">
                        <label for="tanggal-pemantauan-pal">Tanggal Tindakan: </label>
                        <input type="text" name="tanggal_pemantauan_pal"id="tanggal-pemantauan-pal" class="custom-form clear-input d-inline-block col-lg-4 ml-2" placeholder="dd/mm/yyyy">
                    </div>
                    <p>
                    <div class="from-group">
                        <label for="jam-mulai-pal">Jam Mulai Operasi : </label>
                        <input type="text" name="jam_mulai_pal"id="jam-mulai-pal" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="hh/mm">
                    </div>
                    <p>
                    <div class="from-group">
                        <label for="jam-selesai-pal">Jam Selesai Operasi : </label>
                        <input type="text" name="jam_selesai_pal"id="jam-selesai-pal" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="hh/mm">
                    </div>
                    <hr>
                    <table class="table table-no-border table-sm table-striped">
                        <thead>
                            <tr>
                                <th class="center" rowspan="2"><b>Nama Obat yang Diberikan</b></th>
                                <th class="center" colspan="3">Dosis</th>
                                <th class="center" colspan="2">Vital Sign</th>
                                <th class="center" colspan="12">Jam Pemantauan</th>
                            </tr>
                            <tr>
                                <th class="center">I</th>
                                <th class="center">II</th>
                                <th class="center">III</th>
                                <th class="center">RR (o)</th>
                                <th class="center">HR (●)</th>
                                <td class="center"><input type="text" name="jam_pal_1" id="jam-pal-1" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>
                                <td class="center"><input type="text" name="jam_pal_2" id="jam-pal-2" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_3" id="jam-pal-3" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_4" id="jam-pal-4" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_5" id="jam-pal-5" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_6" id="jam-pal-6" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_7" id="jam-pal-7" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_8" id="jam-pal-8" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_9" id="jam-pal-9" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_10" id="jam-pal-10" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_11" id="jam-pal-11" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jam_pal_12" id="jam-pal-12" class=" custom-form clear-input d-inline-block col-lg-12"placeholder="hh/mm"></td>  
                            </tr>
                        </thead>
                        <tbody>            
                            <tr>
                                <td class="center"><input type="text" name="obat_pal_1" id="obat-pal-1" class="select2c-input"></td>
                                <td class="center"><input type="text" name="dosis_pal_1" id="dosis-pal-1" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_2" id="dosis-pal-2" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_3" id="dosis-pal-3" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 8 </td>
                                <td class="center"> 200 </td>
                                <td class="center"><input type="text" name="stjp_pal_1" id="stjp-pal-1" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_2" id="stjp-pal-2" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_3" id="stjp-pal-3" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_4" id="stjp-pal-4" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_5" id="stjp-pal-5" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_6" id="stjp-pal-6" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_7" id="stjp-pal-7" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_8" id="stjp-pal-8" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_9" id="stjp-pal-9" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_10" id="stjp-pal-10" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_11" id="stjp-pal-11" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_12" id="stjp-pal-12" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                      
                            </tr>
                            <tr>
                                <td class="center"><input type="text" name="obat_pal_2" id="obat-pal-2" class="select2c-input"></td>
                                <td class="center"><input type="text" name="dosis_pal_4" id="dosis-pal-4" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_5" id="dosis-pal-5" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_6" id="dosis-pal-6" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 10 </td>
                                <td class="center"> 180 </td>
                                <td class="center"><input type="text" name="stjp_pal_13" id="stjp-pal-13" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_14" id="stjp-pal-14" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_15" id="stjp-pal-15" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_16" id="stjp-pal-16" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_17" id="stjp-pal-17" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_18" id="stjp-pal-18" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_19" id="stjp-pal-19" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_20" id="stjp-pal-20" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_21" id="stjp-pal-21" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_22" id="stjp-pal-22" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_23" id="stjp-pal-23" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_24" id="stjp-pal-24" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                 
                            </tr>
                            <tr>
                                <td class="center"><input type="text" name="obat_pal_3" id="obat-pal-3" class="select2c-input"></td>
                                <td class="center"><input type="text" name="dosis_pal_7" id="dosis-pal-7" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_8" id="dosis-pal-8" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_9" id="dosis-pal-9" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 12 </td>
                                <td class="center"> 160 </td>
                                <td class="center"><input type="text" name="stjp_pal_25" id="stjp-pal-25" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_26" id="stjp-pal-26" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_27" id="stjp-pal-27" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_28" id="stjp-pal-28" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_29" id="stjp-pal-29" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_30" id="stjp-pal-30" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_31" id="stjp-pal-31" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_32" id="stjp-pal-32" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_33" id="stjp-pal-33" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_34" id="stjp-pal-34" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_35" id="stjp-pal-35" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_36" id="stjp-pal-36" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                 
                            </tr>
                            <tr>
                                <td class="center"><input type="text" name="obat_pal_4" id="obat-pal-4" class="select2c-input"></td>
                                <td class="center"><input type="text" name="dosis_pal_10" id="dosis-pal-10" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_11" id="dosis-pal-11" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_12" id="dosis-pal-12" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 14 </td>
                                <td class="center"> 140 </td>
                                <td class="center"><input type="text" name="stjp_pal_37" id="stjp-pal-37" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_38" id="stjp-pal-38" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_39" id="stjp-pal-39" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_40" id="stjp-pal-40" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_41" id="stjp-pal-41" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_42" id="stjp-pal-42" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_43" id="stjp-pal-43" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_44" id="stjp-pal-44" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_45" id="stjp-pal-45" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_46" id="stjp-pal-46" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_47" id="stjp-pal-47" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_48" id="stjp-pal-48" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                 
                            </tr>
                            <tr>
                                <td class="center"><input type="text" name="obat_pal_5" id="obat-pal-5" class="select2c-input"></td>
                                <td class="center"><input type="text" name="dosis_pal_13" id="dosis-pal-13" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_14" id="dosis-pal-14" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_15" id="dosis-pal-15" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 16 </td>
                                <td class="center"> 120 </td>
                                <td class="center"><input type="text" name="stjp_pal_49" id="stjp-pal-49" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_50" id="stjp-pal-50" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_51" id="stjp-pal-51" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_52" id="stjp-pal-52" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_53" id="stjp-pal-53" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_54" id="stjp-pal-54" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_55" id="stjp-pal-55" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_56" id="stjp-pal-56" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_57" id="stjp-pal-57" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_58" id="stjp-pal-58" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_59" id="stjp-pal-59" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_60" id="stjp-pal-60" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                 
                            </tr>
                            <tr>
                                <td class="center"><textarea name="obat_pal_6" id="obat-pal-6" class="form-control" rows="1"></textarea></</td>
                                <td class="center"><input type="text" name="dosis_pal_16" id="dosis-pal-16" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_17" id="dosis-pal-17" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_18" id="dosis-pal-18" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 18 </td>
                                <td class="center"> 100 </td>
                                <td class="center"><input type="text" name="stjp_pal_61" id="stjp-pal-61" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_62" id="stjp-pal-62" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_63" id="stjp-pal-63" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_64" id="stjp-pal-64" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_65" id="stjp-pal-65" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_66" id="stjp-pal-66" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_67" id="stjp-pal-67" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_68" id="stjp-pal-68" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_69" id="stjp-pal-69" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_70" id="stjp-pal-70" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_71" id="stjp-pal-71" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_72" id="stjp-pal-72" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                 
                            </tr>
                            <tr>
                                <td class="center"><textarea name="obat_pal_7" id="obat-pal-7" class="form-control" rows="1"></textarea></</td>
                                <td class="center"><input type="text" name="dosis_pal_19" id="dosis-pal-19" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_20" id="dosis-pal-20" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_21" id="dosis-pal-21" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 20 </td>
                                <td class="center"> 80 </td>
                                <td class="center"><input type="text" name="stjp_pal_73" id="stjp-pal-73" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_74" id="stjp-pal-74" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_75" id="stjp-pal-75" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_76" id="stjp-pal-76" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_77" id="stjp-pal-77" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_78" id="stjp-pal-78" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_79" id="stjp-pal-79" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_80" id="stjp-pal-80" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_81" id="stjp-pal-81" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_82" id="stjp-pal-82" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_83" id="stjp-pal-83" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_84" id="stjp-pal-84" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                 
                            </tr>
                            <tr>
                                <td class="center"><textarea name="obat_pal_8" id="obat-pal-8" class="form-control" rows="1"></textarea></</td>
                                <td class="center"><input type="text" name="dosis_pal_22" id="dosis-pal-22" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_23" id="dosis-pal-23" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_24" id="dosis-pal-24" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 22 </td>
                                <td class="center"> 60 </td>
                                <td class="center"><input type="text" name="stjp_pal_85" id="stjp-pal-85" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_86" id="stjp-pal-86" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_87" id="stjp-pal-87" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_88" id="stjp-pal-88" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_89" id="stjp-pal-89" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_90" id="stjp-pal-90" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_91" id="stjp-pal-91" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_92" id="stjp-pal-92" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_93" id="stjp-pal-93" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_94" id="stjp-pal-94" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_95" id="stjp-pal-95" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_96" id="stjp-pal-96" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                 
                            </tr>
                            <tr>
                                <td class="center"><textarea name="obat_pal_9" id="obat-pal-9" class="form-control" rows="1"></textarea></</td>
                                <td class="center"><input type="text" name="dosis_pal_25" id="dosis-pal-25" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_26" id="dosis-pal-26" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_27" id="dosis-pal-27" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 24 </td>
                                <td class="center"> 40 </td>
                                <td class="center"><input type="text" name="stjp_pal_97" id="stjp-pal-97" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_98" id="stjp-pal-98" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_99" id="stjp-pal-99" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_100" id="stjp-pal-100" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_101" id="stjp-pal-101" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_102" id="stjp-pal-102" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_103" id="stjp-pal-103" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_104" id="stjp-pal-104" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_105" id="stjp-pal-105" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_106" id="stjp-pal-106" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_107" id="stjp-pal-107" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_108" id="stjp-pal-108" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                                            
                            </tr>
                            <tr>
                                <td class="center"><textarea name="obat_pal_10" id="obat-pal-10" class="form-control" rows="1"></textarea></</td>
                                <td class="center"><input type="text" name="dosis_pal_28" id="dosis-pal-28" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_29" id="dosis-pal-29" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"><input type="text" name="dosis_pal_30" id="dosis-pal-30" class=" custom-form clear-input d-inline-block col-lg-10"></td>
                                <td class="center"> 26 </td>
                                <td class="center"> 20 </td>         
                                <td class="center"><input type="text" name="stjp_pal_109" id="stjp-pal-109" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_110" id="stjp-pal-110" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_111" id="stjp-pal-111" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_112" id="stjp-pal-112" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_113" id="stjp-pal-113" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_114" id="stjp-pal-114" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_115" id="stjp-pal-115" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_116" id="stjp-pal-116" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_117" id="stjp-pal-117" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_118" id="stjp-pal-118" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_119" id="stjp-pal-119" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="stjp_pal_120" id="stjp-pal-120" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                                                            
                            </tr>                                         
                            <tr>
                                <td class="center"> Tekanan Darah</td>
                                <td class="center"><input type="text" name="td_pal_1" id="td-pal-1" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_2" id="td-pal-2" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_3" id="td-pal-3" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_4" id="td-pal-4" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_5" id="td-pal-5" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_6" id="td-pal-6" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_7" id="td-pal-7" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_8" id="td-pal-8" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_9" id="td-pal-9" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_10" id="td-pal-10" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_11" id="td-pal-11" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_12" id="td-pal-12" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_13" id="td-pal-13" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_14" id="td-pal-14" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_15" id="td-pal-15" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_16" id="td-pal-16" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="td_pal_17" id="td-pal-17" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                              
                            </tr>
                            <tr>
                                <td class="center"> Saturasi O2</td>
                                <td class="center"><input type="text" name="so2_pal_1" id="so2-pal-1" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_2" id="so2-pal-2" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_3" id="so2-pal-3" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_4" id="so2-pal-4" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_5" id="so2-pal-5" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_6" id="so2-pal-6" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_7" id="so2-pal-7" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_8" id="so2-pal-8" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_9" id="so2-pal-9" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_10" id="so2-pal-10" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_11" id="so2-pal-11" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_12" id="so2-pal-12" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_13" id="so2-pal-13" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_14" id="so2-pal-14" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_15" id="so2-pal-15" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_16" id="so2-pal-16" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="so2_pal_17" id="so2-pal-17" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                              
                            </tr>
                            <tr>
                                <td class="center"> Kesadaran</td>
                                <td class="center"><input type="text" name="kd_pal_1" id="kd-pal-1" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_2" id="kd-pal-2" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_3" id="kd-pal-3" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_4" id="kd-pal-4" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_5" id="kd-pal-5" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_6" id="kd-pal-6" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_7" id="kd-pal-7" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_8" id="kd-pal-8" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_9" id="kd-pal-9" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_10" id="kd-pal-10" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_11" id="kd-pal-11" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_12" id="kd-pal-12" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_13" id="kd-pal-13" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_14" id="kd-pal-14" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_15" id="kd-pal-15" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_16" id="kd-pal-16" class=" custom-form clear-input d-inline-block col-lg-12"></td>
                                <td class="center"><input type="text" name="kd_pal_17" id="kd-pal-17" class=" custom-form clear-input d-inline-block col-lg-12"></td>                                                                              
                            </tr>
                        </tbody>  
                    </table>
                    <table class="table table-no-border table-sm table-striped">
                        </tbody>
                            <tr>
                                <td> <b> Perawat / Bidan</td>
                                <td colspan="2">
                                    <div class="input-group">
                                        <input type="text" name="perawat_pal" id= "perawat-pal" class="select2c-input ml-2">  
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td> <b> Dokter</td>
                                <td colspan="2">
                                    <div class="input-group">
                                        <input type="text" name="dokter_pal" id= "dokter-pal" class="select2c-input ml-2">  
                                    </div>
                                </td>
                            </tr>
                            <p>
                            <tr>
                                <td colspan="8">
                                    <button type="button" title="Tambah Pemantauan Anestesi Lokal" class="btn btn-info" onclick="tambahPemantauanAnestesiLokal()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Pemantauan Anestesi Lokal</button>
                                </td>
                            </tr>
                        </tbody>                      
                    </table>

                </div>
            </div>
        `;           
        html += tutupRapet();
        $('#buka-tutup-pal').append(html);
    }

    function showPPemantauanAnestesiLokalB(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#tabel-pal .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                let btnAksesLihat = '';
                if (action != 'lihat') {
                    btnAksesLihat = '<button type="button" class="btn btn-Success btn-xs" onclick="editPemantauanAnestesiLokal(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-Warning btn-xs" onclick="hapusPemantauanAnestesiLokal(this, ' +
                    v.id +
                    ')"> <i class="fas fa-trash-alt"></i> Hapus</button>';
                }
                const selOp =
                '<td align="center"><button type="button" class="btn btn-Primary btn-xs" onclick="lihatPemantauanAnestesiLokal(this, ' +
                v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                '\')"><i class="fas fa-eye"></i> Lihat</button>' +
                btnAksesLihat + 
                '</td>';
                let html = /* html */ `     
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td align="center">${v.tanggal_pemantauan_pal}</td>  
                        <td align="center">${v.jam_mulai_pal || '-'}</td>                       
                        <td align="center">${v.jam_selesai_pal || '-'}</td>
                        <td align="center">${v.perawat || '-'}</td>                            
                        <td align="center">${v.dokter || '-'}</td>
                        <td align="center">${v.akun_user}</td>
                        ${selOp} 
                    </tr>
                `;
                $('#tabel-pal tbody').append(html);
                numberPal = i;
            })
        }
    }

    function konfirmasiSimpanPemantauanAnestesiLokal() {
        if ($('#tanggal-pemantauan-pal').val() === '') {
            syams_validation('#tanggal-pemantauan-pal', 'Tanggal tindakan wajib diisi <br> klik tombol Tambah Pemantauan Anestesi Lokal sebelum klik tombol konfirmasi.!!!');
            return false;
        } else {
            syams_validation_remove('#tanggal-pemantauan-pal');
        }

        swal.fire({
            title: 'Simpan Entri Operasi',
            text: "Apakah anda yakin akan menyimpan data Operasi ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanPemantauanAnestesiLokal();
            }
        })
    }

    function simpanPemantauanAnestesiLokal() {
        var id_layanan_pendaftaran_pal = $('#id-layanan-pendaftaran-pal').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("order_operasi/api/Order_operasi/simpan_data_pemantauan_anestesi_lokal") ?>',
            data: $('#form_pemantauan_anestesi_lokal').serialize() + '&id-layanan-pendaftaran-pal=' + id_layanan_pendaftaran_pal,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.respon !== null) {
                    if (data.respon.show !== null) {
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
                        $('#modal_pemantauan_anestesi_lokal').modal('hide');
                        showListForm($('#id-pendaftaran-pal').val(), $('#id-layanan-pendaftaran-pal').val(), $('#id-pasien-pal').val());
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

    function resetPemantauanAnestesiLokal() {
        $('#form_pemantauan_anestesi_lokal')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);       
        $('#tanggal-pemantauan-pal').val('');
        $('#jam-mulai-pal, #jam-selesai-pal').val('');
        $('#jam-pal-1, #jam-pal-2, #jam-pal-3, #jam-pal-4, #jam-pal-5, #jam-pal-6, #jam-pal-7, #jam-pal-8, #jam-pal-9, #jam-pal-10, #jam-pal-11, #jam-pal-12').val('');  
        $('#s2id_obat-pal-1 a .select2c-chosen, #s2id_obat-pal-2 a .select2c-chosen, #s2id_obat-pal-3 a .select2c-chosen, #s2id_obat-pal-4 a .select2c-chosen, #s2id_obat-pal-5 a .select2c-chosen').empty();      
        $('#obat-pal-1, #obat-pal-2, #obat-pal-3, #obat-pal-4, #obat-pal-5').val('');
        $('#s2id_perawat-pal a .select2c-chosen, #s2id_dokter-pal a .select2c-chosen').empty();
        $('#perawat-pal, #dokter-pal').val('');    
        setTimeout(() => {
            $('')
                .val('#obat-pal-6, #obat-pal-7, #obat-pal-8, #obat-pal-9, #obat-pal-10,    #dosis-pal-1, #dosis-pal-2, #dosis-pal-3, #dosis-pal-4, #dosis-pal-5, #dosis-pal-6, #dosis-pal-7, #dosis-pal-8, #dosis-pal-9, #dosis-pal-10, #dosis-pal-11, #dosis-pal-12, #dosis-pal-13, #dosis-pal-14, #dosis-pal-15, #dosis-pal-16, #dosis-pal-17, #dosis-pal-18, #dosis-pal-19, #dosis-pal-20, #dosis-pal-21, #dosis-pal-22, #dosis-pal-23, #dosis-pal-24, #dosis-pal-25, #dosis-pal-26, #dosis-pal-27, #dosis-pal-28, #dosis-pal-29, #dosis-pal-30,   #stjp-pal-1, #stjp-pal-2, #stjp-pal-3, #stjp-pal-4, #stjp-pal-5, #stjp-pal-6, #stjp-pal-7, #stjp-pal-8, #stjp-pal-9, #stjp-pal-10, #stjp-pal-11, #stjp-pal-12, #stjp-pal-13, #stjp-pal-14, #stjp-pal-15, #stjp-pal-16, #stjp-pal-17, #stjp-pal-18, #stjp-pal-19, #stjp-pal-20, #stjp-pal-21, #stjp-pal-22, #stjp-pal-23, #stjp-pal-24, #stjp-pal-25, #stjp-pal-26, #stjp-pal-27, #stjp-pal-28, #stjp-pal-29, #stjp-pal-30, #stjp-pal-31, #stjp-pal-32, #stjp-pal-33, #stjp-pal-34, #stjp-pal-35, #stjp-pal-36, #stjp-pal-37, #stjp-pal-38, #stjp-pal-39, #stjp-pal-40, #stjp-pal-41, #stjp-pal-42, #stjp-pal-43, #stjp-pal-44, #stjp-pal-45, #stjp-pal-46, #stjp-pal-47, #stjp-pal-48, #stjp-pal-49, #stjp-pal-50, #stjp-pal-51, #stjp-pal-52, #stjp-pal-53, #stjp-pal-54, #stjp-pal-55, #stjp-pal-56, #stjp-pal-57, #stjp-pal-58, #stjp-pal-59, #stjp-pal-60, #stjp-pal-61, #stjp-pal-62, #stjp-pal-63, #stjp-pal-64, #stjp-pal-65, #stjp-pal-66, #stjp-pal-67, #stjp-pal-68, #stjp-pal-69, #stjp-pal-70, #stjp-pal-71, #stjp-pal-72, #stjp-pal-73, #stjp-pal-74, #stjp-pal-75, #stjp-pal-76, #stjp-pal-77, #stjp-pal-78, #stjp-pal-79, #stjp-pal-80, #stjp-pal-81, #stjp-pal-82, #stjp-pal-83, #stjp-pal-84, #stjp-pal-85, #stjp-pal-86, #stjp-pal-87, #stjp-pal-88, #stjp-pal-89, #stjp-pal-90,  #stjp-pal-91, #stjp-pal-92, #stjp-pal-93, #stjp-pal-94, #stjp-pal-95, #stjp-pal-96, #stjp-pal-97, #stjp-pal-98, #stjp-pal-99, #stjp-pal-100, #stjp-pal-101, #stjp-pal-102, #stjp-pal-103, #stjp-pal-104, #stjp-pal-105, #stjp-pal-106, #stjp-pal-107, #stjp-pal-108, #stjp-pal-109, #stjp-pal-110, #stjp-pal-111, #stjp-pal-112, #stjp-pal-113, #stjp-pal-114, #stjp-pal-115, #stjp-pal-116, #stjp-pal-117, #stjp-pal-118, #stjp-pal-119, #stjp-pal-120,   #td-pal-1, #td-pal-2, #td-pal-3, #td-pal-4, #td-pal-5, #td-pal-6, #td-pal-7, #td-pal-8, #td-pal-9, #td-pal-10, #td-pal-11, #td-pal-12, #td-pal-13, #td-pal-14, #td-pal-15, #td-pal-16, #td-pal-17,  #so2-pal-1, #so2-pal-2, #so2-pal-3, #so2-pal-4, #so2-pal-5, #so2-pal-6, #so2-pal-7, #so2-pal-8, #so2-pal-9, #so2-pal-10, #so2-pal-11, #so2-pal-12, #so2-pal-13, #so2-pal-14, #so2-pal-15, #so2-pal-16, #so2-pal-17,   #kd-pal-1, #kd-pal-2, #kd-pal-3, #kd-pal-4, #kd-pal-5, #kd-pal-6, #kd-pal-7, #kd-pal-8, #kd-pal-9, #kd-pal-10, #kd-pal-11, #kd-pal-12, #kd-pal-13, #kd-pal-14, #kd-pal-15, #kd-pal-16, #kd-pal-17, ');
            $('#form-pal').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)

        $('#buka-tutup-pal').empty();      
    }

    function lihatPemantauanAnestesiLokal(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {   
         $('#modal-edit-pemantauan-anestesi-lokal').modal('show');
         $.ajax({
            type: 'GET',
            url: '<?= base_url("order_operasi/api/Order_operasi/get_pemantauan_anestesi_lokal") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-pal').empty();
                $('#id-pemantauan-anestesi-lokal').val(id);
                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }
                let edit_tanggal_pemantauan_pal = formatTanggalKhusus(data.tanggal_pemantauan_pal);
                $('#edit-tanggal-pemantauan-pal').val(edit_tanggal_pemantauan_pal);                 
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-pemantauan-anestesi-lokal').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                  `;
                $('#update-pal').append(cttntndkn);             
                $('#edit-jam-mulai-pal').val(data.jam_mulai_pal);
                $('#edit-jam-selesai-pal').val(data.jam_selesai_pal);         

                $('#edit-dokter-pal').val(data.dokter_pal);
                $('#s2id_edit-dokter-pal a .select2c-chosen').html(data.dokter);
                $('#edit-perawat-pal').val(data.perawat_pal);
                $('#s2id_edit-perawat-pal a .select2c-chosen').html(data.perawat);      
                
                $('#edit-obat-pal-1').val(data.obat_pal_1);
                $('#s2id_edit-obat-pal-1 a .select2c-chosen').html(data.obat_1)
                $('#edit-obat-pal-2').val(data.obat_pal_2);
                $('#s2id_edit-obat-pal-2 a .select2c-chosen').html(data.obat_2)
                $('#edit-obat-pal-3').val(data.obat_pal_3);
                $('#s2id_edit-obat-pal-3 a .select2c-chosen').html(data.obat_3)
                $('#edit-obat-pal-4').val(data.obat_pal_4);
                $('#s2id_edit-obat-pal-4 a .select2c-chosen').html(data.obat_4)
                $('#edit-obat-pal-5').val(data.obat_pal_5);
                $('#s2id_edit-obat-pal-5 a .select2c-chosen').html(data.obat_5)

                $('#edit-obat-pal-6').val(data.obat_pal_6);
                $('#edit-obat-pal-7').val(data.obat_pal_7);
                $('#edit-obat-pal-8').val(data.obat_pal_8);
                $('#edit-obat-pal-9').val(data.obat_pal_9);
                $('#edit-obat-pal-10').val(data.obat_pal_10);

                $('#edit-jam-pal-1').val(data.jam_pal_1);
                $('#edit-jam-pal-2').val(data.jam_pal_2);
                $('#edit-jam-pal-3').val(data.jam_pal_3);
                $('#edit-jam-pal-4').val(data.jam_pal_4);
                $('#edit-jam-pal-5').val(data.jam_pal_5);
                $('#edit-jam-pal-6').val(data.jam_pal_6);
                $('#edit-jam-pal-7').val(data.jam_pal_7);
                $('#edit-jam-pal-8').val(data.jam_pal_8);
                $('#edit-jam-pal-9').val(data.jam_pal_9);
                $('#edit-jam-pal-10').val(data.jam_pal_10);
                $('#edit-jam-pal-11').val(data.jam_pal_11);
                $('#edit-jam-pal-12').val(data.jam_pal_12);

                $('#edit-dosis-pal-1').val(data.dosis_pal_1);
                $('#edit-dosis-pal-2').val(data.dosis_pal_2);
                $('#edit-dosis-pal-3').val(data.dosis_pal_3);
                $('#edit-dosis-pal-4').val(data.dosis_pal_4);
                $('#edit-dosis-pal-5').val(data.dosis_pal_5);
                $('#edit-dosis-pal-6').val(data.dosis_pal_6);
                $('#edit-dosis-pal-7').val(data.dosis_pal_7);
                $('#edit-dosis-pal-8').val(data.dosis_pal_8);
                $('#edit-dosis-pal-9').val(data.dosis_pal_9);
                $('#edit-dosis-pal-10').val(data.dosis_pal_10);

                $('#edit-dosis-pal-11').val(data.dosis_pal_11);
                $('#edit-dosis-pal-12').val(data.dosis_pal_12);
                $('#edit-dosis-pal-13').val(data.dosis_pal_13);
                $('#edit-dosis-pal-14').val(data.dosis_pal_14);
                $('#edit-dosis-pal-15').val(data.dosis_pal_15);
                $('#edit-dosis-pal-16').val(data.dosis_pal_16);
                $('#edit-dosis-pal-17').val(data.dosis_pal_17);
                $('#edit-dosis-pal-18').val(data.dosis_pal_18);
                $('#edit-dosis-pal-19').val(data.dosis_pal_19);
                $('#edit-dosis-pal-20').val(data.dosis_pal_20);

                $('#edit-dosis-pal-21').val(data.dosis_pal_21);
                $('#edit-dosis-pal-22').val(data.dosis_pal_22);
                $('#edit-dosis-pal-23').val(data.dosis_pal_23);
                $('#edit-dosis-pal-24').val(data.dosis_pal_24);
                $('#edit-dosis-pal-25').val(data.dosis_pal_25);
                $('#edit-dosis-pal-26').val(data.dosis_pal_26);
                $('#edit-dosis-pal-27').val(data.dosis_pal_27);
                $('#edit-dosis-pal-28').val(data.dosis_pal_28);
                $('#edit-dosis-pal-29').val(data.dosis_pal_29);
                $('#edit-dosis-pal-30').val(data.dosis_pal_30);

                // data.rr_pal_1 == '8' ? $('#edit-rr-pal-1').prop('checked', true)   : $('#edit-rr-pal-1').prop('checked', false);
                // data.hr_pal_2 == '200' ? $('#edit-hr-pal-2').prop('checked', true)   : $('#edit-hr-pal-2').prop('checked', false);
                // data.rr_pal_3 == '10' ? $('#edit-rr-pal-3').prop('checked', true)   : $('#edit-rr-pal-3').prop('checked', false);
                // data.hr_pal_4 == '180' ? $('#edit-hr-pal-4').prop('checked', true)   : $('#edit-hr-pal-4').prop('checked', false);
                // data.rr_pal_5 == '12' ? $('#edit-rr-pal-5').prop('checked', true)   : $('#edit-rr-pal-5').prop('checked', false);
                // data.hr_pal_6 == '160' ? $('#edit-hr-pal-6').prop('checked', true)   : $('#edit-hr-pal-6').prop('checked', false);
                // data.rr_pal_7 == '14' ? $('#edit-rr-pal-7').prop('checked', true)   : $('#edit-rr-pal-7').prop('checked', false);
                // data.hr_pal_8 == '140' ? $('#edit-hr-pal-8').prop('checked', true)   : $('#edit-hr-pal-8').prop('checked', false);
                // data.rr_pal_9 == '16' ? $('#edit-rr-pal-9').prop('checked', true)   : $('#edit-rr-pal-9').prop('checked', false);
                // data.hr_pal_10 == '120' ? $('#edit-hr-pal-10').prop('checked', true)   : $('#edit-hr-pal-10').prop('checked', false);

                // data.rr_pal_11 == '18' ? $('#edit-rr-pal-11').prop('checked', true)   : $('#edit-rr-pal-11').prop('checked', false);
                // data.hr_pal_12 == '100' ? $('#edit-hr-pal-12').prop('checked', true)   : $('#edit-hr-pal-12').prop('checked', false);
                // data.rr_pal_13 == '20' ? $('#edit-rr-pal-13').prop('checked', true)   : $('#edit-rr-pal-13').prop('checked', false);
                // data.hr_pal_14 == '80' ? $('#edit-hr-pal-14').prop('checked', true)   : $('#edit-hr-pal-14').prop('checked', false);
                // data.rr_pal_15 == '22' ? $('#edit-rr-pal-15').prop('checked', true)   : $('#edit-rr-pal-15').prop('checked', false);
                // data.hr_pal_16 == '60' ? $('#edit-hr-pal-16').prop('checked', true)   : $('#edit-hr-pal-16').prop('checked', false);
                // data.rr_pal_17 == '24' ? $('#edit-rr-pal-17').prop('checked', true)   : $('#edit-rr-pal-17').prop('checked', false);
                // data.hr_pal_18 == '40' ? $('#edit-hr-pal-18').prop('checked', true)   : $('#edit-hr-pal-18').prop('checked', false);
                // data.rr_pal_19 == '26' ? $('#edit-rr-pal-19').prop('checked', true)   : $('#edit-rr-pal-19').prop('checked', false);
                // data.hr_pal_20 == '20' ? $('#edit-hr-pal-20').prop('checked', true)   : $('#edit-hr-pal-20').prop('checked', false);

                $('#edit-stjp-pal-1').val(data.stjp_pal_1);
                $('#edit-stjp-pal-2').val(data.stjp_pal_2);
                $('#edit-stjp-pal-3').val(data.stjp_pal_3);
                $('#edit-stjp-pal-4').val(data.stjp_pal_4);
                $('#edit-stjp-pal-5').val(data.stjp_pal_5);
                $('#edit-stjp-pal-6').val(data.stjp_pal_6);
                $('#edit-stjp-pal-7').val(data.stjp_pal_7);
                $('#edit-stjp-pal-8').val(data.stjp_pal_8);
                $('#edit-stjp-pal-9').val(data.stjp_pal_9);
                $('#edit-stjp-pal-10').val(data.stjp_pal_10);

                $('#edit-stjp-pal-11').val(data.stjp_pal_11);
                $('#edit-stjp-pal-12').val(data.stjp_pal_12);
                $('#edit-stjp-pal-13').val(data.stjp_pal_13);
                $('#edit-stjp-pal-14').val(data.stjp_pal_14);
                $('#edit-stjp-pal-15').val(data.stjp_pal_15);
                $('#edit-stjp-pal-16').val(data.stjp_pal_16);
                $('#edit-stjp-pal-17').val(data.stjp_pal_17);
                $('#edit-stjp-pal-18').val(data.stjp_pal_18);
                $('#edit-stjp-pal-19').val(data.stjp_pal_19);
                $('#edit-stjp-pal-20').val(data.stjp_pal_20);

                $('#edit-stjp-pal-21').val(data.stjp_pal_21);
                $('#edit-stjp-pal-22').val(data.stjp_pal_22);
                $('#edit-stjp-pal-23').val(data.stjp_pal_23);
                $('#edit-stjp-pal-24').val(data.stjp_pal_24);
                $('#edit-stjp-pal-25').val(data.stjp_pal_25);
                $('#edit-stjp-pal-26').val(data.stjp_pal_26);
                $('#edit-stjp-pal-27').val(data.stjp_pal_27);
                $('#edit-stjp-pal-28').val(data.stjp_pal_28);
                $('#edit-stjp-pal-29').val(data.stjp_pal_29);
                $('#edit-stjp-pal-30').val(data.stjp_pal_30);

                $('#edit-stjp-pal-31').val(data.stjp_pal_31);
                $('#edit-stjp-pal-32').val(data.stjp_pal_32);
                $('#edit-stjp-pal-33').val(data.stjp_pal_33);
                $('#edit-stjp-pal-34').val(data.stjp_pal_34);
                $('#edit-stjp-pal-35').val(data.stjp_pal_35);
                $('#edit-stjp-pal-36').val(data.stjp_pal_36);
                $('#edit-stjp-pal-37').val(data.stjp_pal_37);
                $('#edit-stjp-pal-38').val(data.stjp_pal_38);
                $('#edit-stjp-pal-39').val(data.stjp_pal_39);
                $('#edit-stjp-pal-40').val(data.stjp_pal_40);

                $('#edit-stjp-pal-41').val(data.stjp_pal_41);
                $('#edit-stjp-pal-42').val(data.stjp_pal_42);
                $('#edit-stjp-pal-43').val(data.stjp_pal_43);
                $('#edit-stjp-pal-44').val(data.stjp_pal_44);
                $('#edit-stjp-pal-45').val(data.stjp_pal_45);
                $('#edit-stjp-pal-46').val(data.stjp_pal_46);
                $('#edit-stjp-pal-47').val(data.stjp_pal_47);
                $('#edit-stjp-pal-48').val(data.stjp_pal_48);
                $('#edit-stjp-pal-49').val(data.stjp_pal_49);
                $('#edit-stjp-pal-50').val(data.stjp_pal_50);

                $('#edit-stjp-pal-51').val(data.stjp_pal_51);
                $('#edit-stjp-pal-52').val(data.stjp_pal_52);
                $('#edit-stjp-pal-53').val(data.stjp_pal_53);
                $('#edit-stjp-pal-54').val(data.stjp_pal_54);
                $('#edit-stjp-pal-55').val(data.stjp_pal_55);
                $('#edit-stjp-pal-56').val(data.stjp_pal_56);
                $('#edit-stjp-pal-57').val(data.stjp_pal_57);
                $('#edit-stjp-pal-58').val(data.stjp_pal_58);
                $('#edit-stjp-pal-59').val(data.stjp_pal_59);
                $('#edit-stjp-pal-60').val(data.stjp_pal_60);

                $('#edit-stjp-pal-61').val(data.stjp_pal_61);
                $('#edit-stjp-pal-62').val(data.stjp_pal_62);
                $('#edit-stjp-pal-63').val(data.stjp_pal_63);
                $('#edit-stjp-pal-64').val(data.stjp_pal_64);
                $('#edit-stjp-pal-65').val(data.stjp_pal_65);
                $('#edit-stjp-pal-66').val(data.stjp_pal_66);
                $('#edit-stjp-pal-67').val(data.stjp_pal_67);
                $('#edit-stjp-pal-68').val(data.stjp_pal_68);
                $('#edit-stjp-pal-69').val(data.stjp_pal_69);
                $('#edit-stjp-pal-70').val(data.stjp_pal_70);

                $('#edit-stjp-pal-71').val(data.stjp_pal_71);
                $('#edit-stjp-pal-72').val(data.stjp_pal_72);
                $('#edit-stjp-pal-73').val(data.stjp_pal_73);
                $('#edit-stjp-pal-74').val(data.stjp_pal_74);
                $('#edit-stjp-pal-75').val(data.stjp_pal_75);
                $('#edit-stjp-pal-76').val(data.stjp_pal_76);
                $('#edit-stjp-pal-77').val(data.stjp_pal_77);
                $('#edit-stjp-pal-78').val(data.stjp_pal_78);
                $('#edit-stjp-pal-79').val(data.stjp_pal_79);
                $('#edit-stjp-pal-80').val(data.stjp_pal_80);

                $('#edit-stjp-pal-81').val(data.stjp_pal_81);
                $('#edit-stjp-pal-82').val(data.stjp_pal_82);
                $('#edit-stjp-pal-83').val(data.stjp_pal_83);
                $('#edit-stjp-pal-84').val(data.stjp_pal_84);
                $('#edit-stjp-pal-85').val(data.stjp_pal_85);
                $('#edit-stjp-pal-86').val(data.stjp_pal_86);
                $('#edit-stjp-pal-87').val(data.stjp_pal_87);
                $('#edit-stjp-pal-88').val(data.stjp_pal_88);
                $('#edit-stjp-pal-89').val(data.stjp_pal_89);
                $('#edit-stjp-pal-90').val(data.stjp_pal_90);

                $('#edit-stjp-pal-91').val(data.stjp_pal_91);
                $('#edit-stjp-pal-92').val(data.stjp_pal_92);
                $('#edit-stjp-pal-93').val(data.stjp_pal_93);
                $('#edit-stjp-pal-94').val(data.stjp_pal_94);
                $('#edit-stjp-pal-95').val(data.stjp_pal_95);
                $('#edit-stjp-pal-96').val(data.stjp_pal_96);
                $('#edit-stjp-pal-97').val(data.stjp_pal_97);
                $('#edit-stjp-pal-98').val(data.stjp_pal_98);
                $('#edit-stjp-pal-99').val(data.stjp_pal_99);
                $('#edit-stjp-pal-100').val(data.stjp_pal_100);

                $('#edit-stjp-pal-101').val(data.stjp_pal_101);
                $('#edit-stjp-pal-102').val(data.stjp_pal_102);
                $('#edit-stjp-pal-103').val(data.stjp_pal_103);
                $('#edit-stjp-pal-104').val(data.stjp_pal_104);
                $('#edit-stjp-pal-105').val(data.stjp_pal_105);
                $('#edit-stjp-pal-106').val(data.stjp_pal_106);
                $('#edit-stjp-pal-107').val(data.stjp_pal_107);
                $('#edit-stjp-pal-108').val(data.stjp_pal_108);
                $('#edit-stjp-pal-109').val(data.stjp_pal_109);
                $('#edit-stjp-pal-110').val(data.stjp_pal_110);

                $('#edit-stjp-pal-111').val(data.stjp_pal_111);
                $('#edit-stjp-pal-112').val(data.stjp_pal_112);
                $('#edit-stjp-pal-113').val(data.stjp_pal_113);
                $('#edit-stjp-pal-114').val(data.stjp_pal_114);
                $('#edit-stjp-pal-115').val(data.stjp_pal_115);
                $('#edit-stjp-pal-116').val(data.stjp_pal_116);
                $('#edit-stjp-pal-117').val(data.stjp_pal_117);
                $('#edit-stjp-pal-118').val(data.stjp_pal_118);
                $('#edit-stjp-pal-119').val(data.stjp_pal_119);
                $('#edit-stjp-pal-120').val(data.stjp_pal_120);

                $('#edit-td-pal-1').val(data.td_pal_1);
                $('#edit-td-pal-2').val(data.td_pal_2);
                $('#edit-td-pal-3').val(data.td_pal_3);
                $('#edit-td-pal-4').val(data.td_pal_4);
                $('#edit-td-pal-5').val(data.td_pal_5);
                $('#edit-td-pal-6').val(data.td_pal_6);
                $('#edit-td-pal-7').val(data.td_pal_7);
                $('#edit-td-pal-8').val(data.td_pal_8);
                $('#edit-td-pal-9').val(data.td_pal_9);
                $('#edit-td-pal-10').val(data.td_pal_10);
                $('#edit-td-pal-11').val(data.td_pal_11);
                $('#edit-td-pal-12').val(data.td_pal_12);
                $('#edit-td-pal-13').val(data.td_pal_13);
                $('#edit-td-pal-14').val(data.td_pal_14);
                $('#edit-td-pal-15').val(data.td_pal_15);
                $('#edit-td-pal-16').val(data.td_pal_16);
                $('#edit-td-pal-17').val(data.td_pal_17);

                $('#edit-so2-pal-1').val(data.so2_pal_1);
                $('#edit-so2-pal-2').val(data.so2_pal_2);
                $('#edit-so2-pal-3').val(data.so2_pal_3);
                $('#edit-so2-pal-4').val(data.so2_pal_4);
                $('#edit-so2-pal-5').val(data.so2_pal_5);
                $('#edit-so2-pal-6').val(data.so2_pal_6);
                $('#edit-so2-pal-7').val(data.so2_pal_7);
                $('#edit-so2-pal-8').val(data.so2_pal_8);
                $('#edit-so2-pal-9').val(data.so2_pal_9);
                $('#edit-so2-pal-10').val(data.so2_pal_10);
                $('#edit-so2-pal-11').val(data.so2_pal_11);
                $('#edit-so2-pal-12').val(data.so2_pal_12);
                $('#edit-so2-pal-13').val(data.so2_pal_13);
                $('#edit-so2-pal-14').val(data.so2_pal_14);
                $('#edit-so2-pal-15').val(data.so2_pal_15);
                $('#edit-so2-pal-16').val(data.so2_pal_16);
                $('#edit-so2-pal-17').val(data.so2_pal_17);

                $('#edit-kd-pal-1').val(data.kd_pal_1);
                $('#edit-kd-pal-2').val(data.kd_pal_2);
                $('#edit-kd-pal-3').val(data.kd_pal_3);
                $('#edit-kd-pal-4').val(data.kd_pal_4);
                $('#edit-kd-pal-5').val(data.kd_pal_5);
                $('#edit-kd-pal-6').val(data.kd_pal_6);
                $('#edit-kd-pal-7').val(data.kd_pal_7);
                $('#edit-kd-pal-8').val(data.kd_pal_8);
                $('#edit-kd-pal-9').val(data.kd_pal_9);
                $('#edit-kd-pal-10').val(data.kd_pal_10);
                $('#edit-kd-pal-11').val(data.kd_pal_11);
                $('#edit-kd-pal-12').val(data.kd_pal_12);
                $('#edit-kd-pal-13').val(data.kd_pal_13);
                $('#edit-kd-pal-14').val(data.kd_pal_14);
                $('#edit-kd-pal-15').val(data.kd_pal_15);
                $('#edit-kd-pal-16').val(data.kd_pal_16);
                $('#edit-kd-pal-17').val(data.kd_pal_17);
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })      
    }

    function editPemantauanAnestesiLokal(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {   
        const modal = $('#modal-edit-pemantauan-anestesi-lokal');
        $('#update-pal').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_operasi/api/Order_operasi/get_pemantauan_anestesi_lokal") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                // console.log(data);
                $('#update-pal').empty();
                $('#id-pemantauan-anestesi-lokal').val(id);
                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }
                let edit_tanggal_pemantauan_pal = formatTanggalKhusus(data.tanggal_pemantauan_pal);
                $('#edit-tanggal-pemantauan-pal').val(edit_tanggal_pemantauan_pal);                 
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-pemantauan-anestesi-lokal').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                    <button type="button" class="btn btn-info waves-effect" onclick="updatePemantauanAnestesiLokal(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-pal').append(cttntndkn);                  
                $('#edit-jam-mulai-pal').val(data.jam_mulai_pal);
                $('#edit-jam-selesai-pal').val(data.jam_selesai_pal);
            
                $('#edit-dokter-pal').val(data.dokter_pal);
                $('#s2id_edit-dokter-pal a .select2c-chosen').html(data.dokter);
                $('#edit-perawat-pal').val(data.perawat_pal);
                $('#s2id_edit-perawat-pal a .select2c-chosen').html(data.perawat);      
                
                $('#edit-obat-pal-1').val(data.obat_pal_1);
                $('#s2id_edit-obat-pal-1 a .select2c-chosen').html(data.obat_1)
                $('#edit-obat-pal-2').val(data.obat_pal_2);
                $('#s2id_edit-obat-pal-2 a .select2c-chosen').html(data.obat_2)
                $('#edit-obat-pal-3').val(data.obat_pal_3);
                $('#s2id_edit-obat-pal-3 a .select2c-chosen').html(data.obat_3)
                $('#edit-obat-pal-4').val(data.obat_pal_4);
                $('#s2id_edit-obat-pal-4 a .select2c-chosen').html(data.obat_4)
                $('#edit-obat-pal-5').val(data.obat_pal_5);
                $('#s2id_edit-obat-pal-5 a .select2c-chosen').html(data.obat_5)

                $('#edit-obat-pal-6').val(data.obat_pal_6);
                $('#edit-obat-pal-7').val(data.obat_pal_7);
                $('#edit-obat-pal-8').val(data.obat_pal_8);
                $('#edit-obat-pal-9').val(data.obat_pal_9);
                $('#edit-obat-pal-10').val(data.obat_pal_10);
               
                $('#edit-jam-pal-1').val(data.jam_pal_1);
                $('#edit-jam-pal-2').val(data.jam_pal_2);
                $('#edit-jam-pal-3').val(data.jam_pal_3);
                $('#edit-jam-pal-4').val(data.jam_pal_4);
                $('#edit-jam-pal-5').val(data.jam_pal_5);
                $('#edit-jam-pal-6').val(data.jam_pal_6);
                $('#edit-jam-pal-7').val(data.jam_pal_7);
                $('#edit-jam-pal-8').val(data.jam_pal_8);
                $('#edit-jam-pal-9').val(data.jam_pal_9);
                $('#edit-jam-pal-10').val(data.jam_pal_10);
                $('#edit-jam-pal-11').val(data.jam_pal_11);
                $('#edit-jam-pal-12').val(data.jam_pal_12);

                $('#edit-dosis-pal-1').val(data.dosis_pal_1);
                $('#edit-dosis-pal-2').val(data.dosis_pal_2);
                $('#edit-dosis-pal-3').val(data.dosis_pal_3);
                $('#edit-dosis-pal-4').val(data.dosis_pal_4);
                $('#edit-dosis-pal-5').val(data.dosis_pal_5);
                $('#edit-dosis-pal-6').val(data.dosis_pal_6);
                $('#edit-dosis-pal-7').val(data.dosis_pal_7);
                $('#edit-dosis-pal-8').val(data.dosis_pal_8);
                $('#edit-dosis-pal-9').val(data.dosis_pal_9);
                $('#edit-dosis-pal-10').val(data.dosis_pal_10);

                $('#edit-dosis-pal-11').val(data.dosis_pal_11);
                $('#edit-dosis-pal-12').val(data.dosis_pal_12);
                $('#edit-dosis-pal-13').val(data.dosis_pal_13);
                $('#edit-dosis-pal-14').val(data.dosis_pal_14);
                $('#edit-dosis-pal-15').val(data.dosis_pal_15);
                $('#edit-dosis-pal-16').val(data.dosis_pal_16);
                $('#edit-dosis-pal-17').val(data.dosis_pal_17);
                $('#edit-dosis-pal-18').val(data.dosis_pal_18);
                $('#edit-dosis-pal-19').val(data.dosis_pal_19);
                $('#edit-dosis-pal-20').val(data.dosis_pal_20);

                $('#edit-dosis-pal-21').val(data.dosis_pal_21);
                $('#edit-dosis-pal-22').val(data.dosis_pal_22);
                $('#edit-dosis-pal-23').val(data.dosis_pal_23);
                $('#edit-dosis-pal-24').val(data.dosis_pal_24);
                $('#edit-dosis-pal-25').val(data.dosis_pal_25);
                $('#edit-dosis-pal-26').val(data.dosis_pal_26);
                $('#edit-dosis-pal-27').val(data.dosis_pal_27);
                $('#edit-dosis-pal-28').val(data.dosis_pal_28);
                $('#edit-dosis-pal-29').val(data.dosis_pal_29);
                $('#edit-dosis-pal-30').val(data.dosis_pal_30);

                // data.rr_pal_1 == '8' ? $('#edit-rr-pal-1').prop('checked', true)   : $('#edit-rr-pal-1').prop('checked', false);
                // data.hr_pal_2 == '200' ? $('#edit-hr-pal-2').prop('checked', true)   : $('#edit-hr-pal-2').prop('checked', false);
                // data.rr_pal_3 == '10' ? $('#edit-rr-pal-3').prop('checked', true)   : $('#edit-rr-pal-3').prop('checked', false);
                // data.hr_pal_4 == '180' ? $('#edit-hr-pal-4').prop('checked', true)   : $('#edit-hr-pal-4').prop('checked', false);
                // data.rr_pal_5 == '12' ? $('#edit-rr-pal-5').prop('checked', true)   : $('#edit-rr-pal-5').prop('checked', false);
                // data.hr_pal_6 == '160' ? $('#edit-hr-pal-6').prop('checked', true)   : $('#edit-hr-pal-6').prop('checked', false);
                // data.rr_pal_7 == '14' ? $('#edit-rr-pal-7').prop('checked', true)   : $('#edit-rr-pal-7').prop('checked', false);
                // data.hr_pal_8 == '140' ? $('#edit-hr-pal-8').prop('checked', true)   : $('#edit-hr-pal-8').prop('checked', false);
                // data.rr_pal_9 == '16' ? $('#edit-rr-pal-9').prop('checked', true)   : $('#edit-rr-pal-9').prop('checked', false);
                // data.hr_pal_10 == '120' ? $('#edit-hr-pal-10').prop('checked', true)   : $('#edit-hr-pal-10').prop('checked', false);

                // data.rr_pal_11 == '18' ? $('#edit-rr-pal-11').prop('checked', true)   : $('#edit-rr-pal-11').prop('checked', false);
                // data.hr_pal_12 == '100' ? $('#edit-hr-pal-12').prop('checked', true)   : $('#edit-hr-pal-12').prop('checked', false);
                // data.rr_pal_13 == '20' ? $('#edit-rr-pal-13').prop('checked', true)   : $('#edit-rr-pal-13').prop('checked', false);
                // data.hr_pal_14 == '80' ? $('#edit-hr-pal-14').prop('checked', true)   : $('#edit-hr-pal-14').prop('checked', false);
                // data.rr_pal_15 == '22' ? $('#edit-rr-pal-15').prop('checked', true)   : $('#edit-rr-pal-15').prop('checked', false);
                // data.hr_pal_16 == '60' ? $('#edit-hr-pal-16').prop('checked', true)   : $('#edit-hr-pal-16').prop('checked', false);
                // data.rr_pal_17 == '24' ? $('#edit-rr-pal-17').prop('checked', true)   : $('#edit-rr-pal-17').prop('checked', false);
                // data.hr_pal_18 == '40' ? $('#edit-hr-pal-18').prop('checked', true)   : $('#edit-hr-pal-18').prop('checked', false);
                // data.rr_pal_19 == '26' ? $('#edit-rr-pal-19').prop('checked', true)   : $('#edit-rr-pal-19').prop('checked', false);
                // data.hr_pal_20 == '20' ? $('#edit-hr-pal-20').prop('checked', true)   : $('#edit-hr-pal-20').prop('checked', false);

                $('#edit-stjp-pal-1').val(data.stjp_pal_1);
                $('#edit-stjp-pal-2').val(data.stjp_pal_2);
                $('#edit-stjp-pal-3').val(data.stjp_pal_3);
                $('#edit-stjp-pal-4').val(data.stjp_pal_4);
                $('#edit-stjp-pal-5').val(data.stjp_pal_5);
                $('#edit-stjp-pal-6').val(data.stjp_pal_6);
                $('#edit-stjp-pal-7').val(data.stjp_pal_7);
                $('#edit-stjp-pal-8').val(data.stjp_pal_8);
                $('#edit-stjp-pal-9').val(data.stjp_pal_9);
                $('#edit-stjp-pal-10').val(data.stjp_pal_10);

                $('#edit-stjp-pal-11').val(data.stjp_pal_11);
                $('#edit-stjp-pal-12').val(data.stjp_pal_12);
                $('#edit-stjp-pal-13').val(data.stjp_pal_13);
                $('#edit-stjp-pal-14').val(data.stjp_pal_14);
                $('#edit-stjp-pal-15').val(data.stjp_pal_15);
                $('#edit-stjp-pal-16').val(data.stjp_pal_16);
                $('#edit-stjp-pal-17').val(data.stjp_pal_17);
                $('#edit-stjp-pal-18').val(data.stjp_pal_18);
                $('#edit-stjp-pal-19').val(data.stjp_pal_19);
                $('#edit-stjp-pal-20').val(data.stjp_pal_20);

                $('#edit-stjp-pal-21').val(data.stjp_pal_21);
                $('#edit-stjp-pal-22').val(data.stjp_pal_22);
                $('#edit-stjp-pal-23').val(data.stjp_pal_23);
                $('#edit-stjp-pal-24').val(data.stjp_pal_24);
                $('#edit-stjp-pal-25').val(data.stjp_pal_25);
                $('#edit-stjp-pal-26').val(data.stjp_pal_26);
                $('#edit-stjp-pal-27').val(data.stjp_pal_27);
                $('#edit-stjp-pal-28').val(data.stjp_pal_28);
                $('#edit-stjp-pal-29').val(data.stjp_pal_29);
                $('#edit-stjp-pal-30').val(data.stjp_pal_30);

                $('#edit-stjp-pal-31').val(data.stjp_pal_31);
                $('#edit-stjp-pal-32').val(data.stjp_pal_32);
                $('#edit-stjp-pal-33').val(data.stjp_pal_33);
                $('#edit-stjp-pal-34').val(data.stjp_pal_34);
                $('#edit-stjp-pal-35').val(data.stjp_pal_35);
                $('#edit-stjp-pal-36').val(data.stjp_pal_36);
                $('#edit-stjp-pal-37').val(data.stjp_pal_37);
                $('#edit-stjp-pal-38').val(data.stjp_pal_38);
                $('#edit-stjp-pal-39').val(data.stjp_pal_39);
                $('#edit-stjp-pal-40').val(data.stjp_pal_40);

                $('#edit-stjp-pal-41').val(data.stjp_pal_41);
                $('#edit-stjp-pal-42').val(data.stjp_pal_42);
                $('#edit-stjp-pal-43').val(data.stjp_pal_43);
                $('#edit-stjp-pal-44').val(data.stjp_pal_44);
                $('#edit-stjp-pal-45').val(data.stjp_pal_45);
                $('#edit-stjp-pal-46').val(data.stjp_pal_46);
                $('#edit-stjp-pal-47').val(data.stjp_pal_47);
                $('#edit-stjp-pal-48').val(data.stjp_pal_48);
                $('#edit-stjp-pal-49').val(data.stjp_pal_49);
                $('#edit-stjp-pal-50').val(data.stjp_pal_50);

                $('#edit-stjp-pal-51').val(data.stjp_pal_51);
                $('#edit-stjp-pal-52').val(data.stjp_pal_52);
                $('#edit-stjp-pal-53').val(data.stjp_pal_53);
                $('#edit-stjp-pal-54').val(data.stjp_pal_54);
                $('#edit-stjp-pal-55').val(data.stjp_pal_55);
                $('#edit-stjp-pal-56').val(data.stjp_pal_56);
                $('#edit-stjp-pal-57').val(data.stjp_pal_57);
                $('#edit-stjp-pal-58').val(data.stjp_pal_58);
                $('#edit-stjp-pal-59').val(data.stjp_pal_59);
                $('#edit-stjp-pal-60').val(data.stjp_pal_60);

                $('#edit-stjp-pal-61').val(data.stjp_pal_61);
                $('#edit-stjp-pal-62').val(data.stjp_pal_62);
                $('#edit-stjp-pal-63').val(data.stjp_pal_63);
                $('#edit-stjp-pal-64').val(data.stjp_pal_64);
                $('#edit-stjp-pal-65').val(data.stjp_pal_65);
                $('#edit-stjp-pal-66').val(data.stjp_pal_66);
                $('#edit-stjp-pal-67').val(data.stjp_pal_67);
                $('#edit-stjp-pal-68').val(data.stjp_pal_68);
                $('#edit-stjp-pal-69').val(data.stjp_pal_69);
                $('#edit-stjp-pal-70').val(data.stjp_pal_70);

                $('#edit-stjp-pal-71').val(data.stjp_pal_71);
                $('#edit-stjp-pal-72').val(data.stjp_pal_72);
                $('#edit-stjp-pal-73').val(data.stjp_pal_73);
                $('#edit-stjp-pal-74').val(data.stjp_pal_74);
                $('#edit-stjp-pal-75').val(data.stjp_pal_75);
                $('#edit-stjp-pal-76').val(data.stjp_pal_76);
                $('#edit-stjp-pal-77').val(data.stjp_pal_77);
                $('#edit-stjp-pal-78').val(data.stjp_pal_78);
                $('#edit-stjp-pal-79').val(data.stjp_pal_79);
                $('#edit-stjp-pal-80').val(data.stjp_pal_80);

                $('#edit-stjp-pal-81').val(data.stjp_pal_81);
                $('#edit-stjp-pal-82').val(data.stjp_pal_82);
                $('#edit-stjp-pal-83').val(data.stjp_pal_83);
                $('#edit-stjp-pal-84').val(data.stjp_pal_84);
                $('#edit-stjp-pal-85').val(data.stjp_pal_85);
                $('#edit-stjp-pal-86').val(data.stjp_pal_86);
                $('#edit-stjp-pal-87').val(data.stjp_pal_87);
                $('#edit-stjp-pal-88').val(data.stjp_pal_88);
                $('#edit-stjp-pal-89').val(data.stjp_pal_89);
                $('#edit-stjp-pal-90').val(data.stjp_pal_90);

                $('#edit-stjp-pal-91').val(data.stjp_pal_91);
                $('#edit-stjp-pal-92').val(data.stjp_pal_92);
                $('#edit-stjp-pal-93').val(data.stjp_pal_93);
                $('#edit-stjp-pal-94').val(data.stjp_pal_94);
                $('#edit-stjp-pal-95').val(data.stjp_pal_95);
                $('#edit-stjp-pal-96').val(data.stjp_pal_96);
                $('#edit-stjp-pal-97').val(data.stjp_pal_97);
                $('#edit-stjp-pal-98').val(data.stjp_pal_98);
                $('#edit-stjp-pal-99').val(data.stjp_pal_99);
                $('#edit-stjp-pal-100').val(data.stjp_pal_100);

                $('#edit-stjp-pal-101').val(data.stjp_pal_101);
                $('#edit-stjp-pal-102').val(data.stjp_pal_102);
                $('#edit-stjp-pal-103').val(data.stjp_pal_103);
                $('#edit-stjp-pal-104').val(data.stjp_pal_104);
                $('#edit-stjp-pal-105').val(data.stjp_pal_105);
                $('#edit-stjp-pal-106').val(data.stjp_pal_106);
                $('#edit-stjp-pal-107').val(data.stjp_pal_107);
                $('#edit-stjp-pal-108').val(data.stjp_pal_108);
                $('#edit-stjp-pal-109').val(data.stjp_pal_109);
                $('#edit-stjp-pal-110').val(data.stjp_pal_110);

                $('#edit-stjp-pal-111').val(data.stjp_pal_111);
                $('#edit-stjp-pal-112').val(data.stjp_pal_112);
                $('#edit-stjp-pal-113').val(data.stjp_pal_113);
                $('#edit-stjp-pal-114').val(data.stjp_pal_114);
                $('#edit-stjp-pal-115').val(data.stjp_pal_115);
                $('#edit-stjp-pal-116').val(data.stjp_pal_116);
                $('#edit-stjp-pal-117').val(data.stjp_pal_117);
                $('#edit-stjp-pal-118').val(data.stjp_pal_118);
                $('#edit-stjp-pal-119').val(data.stjp_pal_119);
                $('#edit-stjp-pal-120').val(data.stjp_pal_120);

                $('#edit-td-pal-1').val(data.td_pal_1);
                $('#edit-td-pal-2').val(data.td_pal_2);
                $('#edit-td-pal-3').val(data.td_pal_3);
                $('#edit-td-pal-4').val(data.td_pal_4);
                $('#edit-td-pal-5').val(data.td_pal_5);
                $('#edit-td-pal-6').val(data.td_pal_6);
                $('#edit-td-pal-7').val(data.td_pal_7);
                $('#edit-td-pal-8').val(data.td_pal_8);
                $('#edit-td-pal-9').val(data.td_pal_9);
                $('#edit-td-pal-10').val(data.td_pal_10);
                $('#edit-td-pal-11').val(data.td_pal_11);
                $('#edit-td-pal-12').val(data.td_pal_12);
                $('#edit-td-pal-13').val(data.td_pal_13);
                $('#edit-td-pal-14').val(data.td_pal_14);
                $('#edit-td-pal-15').val(data.td_pal_15);
                $('#edit-td-pal-16').val(data.td_pal_16);
                $('#edit-td-pal-17').val(data.td_pal_17);

                $('#edit-so2-pal-1').val(data.so2_pal_1);
                $('#edit-so2-pal-2').val(data.so2_pal_2);
                $('#edit-so2-pal-3').val(data.so2_pal_3);
                $('#edit-so2-pal-4').val(data.so2_pal_4);
                $('#edit-so2-pal-5').val(data.so2_pal_5);
                $('#edit-so2-pal-6').val(data.so2_pal_6);
                $('#edit-so2-pal-7').val(data.so2_pal_7);
                $('#edit-so2-pal-8').val(data.so2_pal_8);
                $('#edit-so2-pal-9').val(data.so2_pal_9);
                $('#edit-so2-pal-10').val(data.so2_pal_10);
                $('#edit-so2-pal-11').val(data.so2_pal_11);
                $('#edit-so2-pal-12').val(data.so2_pal_12);
                $('#edit-so2-pal-13').val(data.so2_pal_13);
                $('#edit-so2-pal-14').val(data.so2_pal_14);
                $('#edit-so2-pal-15').val(data.so2_pal_15);
                $('#edit-so2-pal-16').val(data.so2_pal_16);
                $('#edit-so2-pal-17').val(data.so2_pal_17);

                $('#edit-kd-pal-1').val(data.kd_pal_1);
                $('#edit-kd-pal-2').val(data.kd_pal_2);
                $('#edit-kd-pal-3').val(data.kd_pal_3);
                $('#edit-kd-pal-4').val(data.kd_pal_4);
                $('#edit-kd-pal-5').val(data.kd_pal_5);
                $('#edit-kd-pal-6').val(data.kd_pal_6);
                $('#edit-kd-pal-7').val(data.kd_pal_7);
                $('#edit-kd-pal-8').val(data.kd_pal_8);
                $('#edit-kd-pal-9').val(data.kd_pal_9);
                $('#edit-kd-pal-10').val(data.kd_pal_10);
                $('#edit-kd-pal-11').val(data.kd_pal_11);
                $('#edit-kd-pal-12').val(data.kd_pal_12);
                $('#edit-kd-pal-13').val(data.kd_pal_13);
                $('#edit-kd-pal-14').val(data.kd_pal_14);
                $('#edit-kd-pal-15').val(data.kd_pal_15);
                $('#edit-kd-pal-16').val(data.kd_pal_16);
                $('#edit-kd-pal-17').val(data.kd_pal_17);             
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }


    function updatePemantauanAnestesiLokal(id_pendaftaran, id_layanan_pendaftaran, bed) {
        // console.log($('#form-edit-pemantauan-anestesi-lokal').serialize());
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("order_operasi/api/Order_operasi/update_pemantauan_anestesi_lokal") ?>',
            data: $('#form-edit-pemantauan-anestesi-lokal').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriPemantauanAnestesiLokal(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-pemantauan-anestesi-lokal').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    if (typeof numberPal === 'undefined') {
        var numberPal = 1;
    }

    function tambahPemantauanAnestesiLokal() {      
        if ($('#tanggal-pemantauan-pal').val() === '') {
            syams_validation('#tanggal-pemantauan-pal', 'Tanggal Tindakan harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-pemantauan-pal');
        }
        if ($('#perawat-pal').val() === '') {
            syams_validation('#perawat-pal', 'Nama Perawat Belum dipilih.');
            return false;
        } else {
            syams_validation_remove('#perawat-pal');
        }
        if ($('#dokter-pal').val() === '') {
            syams_validation('#dokter-pal', 'Nama Dokter belum di pilih.');
            return false;
        } else {
            syams_validation_remove('#dokter-pal');
        }

        let html = '';
        let tanggal_pemantauan_pal = $('#tanggal-pemantauan-pal').val();   
        let jam_mulai_pal = $('#jam-mulai-pal').val();
        let jam_selesai_pal = $('#jam-selesai-pal').val();
               
        let dokter = $('#s2id_dokter-pal a .select2c-chosen').html();   
        let dokter_pal = $('#dokter-pal').val();
        let perawat = $('#s2id_perawat-pal a .select2c-chosen').html();   
        let perawat_pal = $('#perawat-pal').val();

        let obat_1 = $('#s2id_obat-pal-1 a .select2c-chosen').html();   
        let obat_pal_1 = $('#obat-pal-1').val();
        let obat_2 = $('#s2id_obat-pal-2 a .select2c-chosen').html();   
        let obat_pal_2 = $('#obat-pal-2').val();
        let obat_3 = $('#s2id_obat-pal-3 a .select2c-chosen').html();   
        let obat_pal_3 = $('#obat-pal-3').val();
        let obat_4 = $('#s2id_obat-pal-4 a .select2c-chosen').html();   
        let obat_pal_4 = $('#obat-pal-4').val();
        let obat_5 = $('#s2id_obat-pal-5 a .select2c-chosen').html();   
        let obat_pal_5 = $('#obat-pal-5').val();

        let obat_pal_6 = $('#obat-pal-6').val();
        let obat_pal_7 = $('#obat-pal-7').val();
        let obat_pal_8 = $('#obat-pal-8').val();
        let obat_pal_9 = $('#obat-pal-9').val();
        let obat_pal_10 = $('#obat-pal-10').val();

        let jam_pal_1 = $('#jam-pal-1').val();
        let jam_pal_2 = $('#jam-pal-2').val();
        let jam_pal_3 = $('#jam-pal-3').val();
        let jam_pal_4 = $('#jam-pal-4').val();
        let jam_pal_5 = $('#jam-pal-5').val();
        let jam_pal_6 = $('#jam-pal-6').val();
        let jam_pal_7 = $('#jam-pal-7').val();
        let jam_pal_8 = $('#jam-pal-8').val();
        let jam_pal_9 = $('#jam-pal-9').val();
        let jam_pal_10 = $('#jam-pal-10').val();
        let jam_pal_11 = $('#jam-pal-11').val();
        let jam_pal_12 = $('#jam-pal-12').val();

        let dosis_pal_1 = $('#dosis-pal-1').val();
        let dosis_pal_2 = $('#dosis-pal-2').val();
        let dosis_pal_3 = $('#dosis-pal-3').val();
        let dosis_pal_4 = $('#dosis-pal-4').val();
        let dosis_pal_5 = $('#dosis-pal-5').val();
        let dosis_pal_6 = $('#dosis-pal-6').val();
        let dosis_pal_7 = $('#dosis-pal-7').val();
        let dosis_pal_8 = $('#dosis-pal-8').val();
        let dosis_pal_9 = $('#dosis-pal-9').val();
        let dosis_pal_10 = $('#dosis-pal-10').val();

        let dosis_pal_11 = $('#dosis-pal-11').val();
        let dosis_pal_12 = $('#dosis-pal-12').val();
        let dosis_pal_13 = $('#dosis-pal-13').val();
        let dosis_pal_14 = $('#dosis-pal-14').val();
        let dosis_pal_15 = $('#dosis-pal-15').val();
        let dosis_pal_16 = $('#dosis-pal-16').val();
        let dosis_pal_17 = $('#dosis-pal-17').val();
        let dosis_pal_18 = $('#dosis-pal-18').val();
        let dosis_pal_19 = $('#dosis-pal-19').val();
        let dosis_pal_20 = $('#dosis-pal-20').val();

        let dosis_pal_21 = $('#dosis-pal-21').val();
        let dosis_pal_22 = $('#dosis-pal-22').val();
        let dosis_pal_23 = $('#dosis-pal-23').val();
        let dosis_pal_24 = $('#dosis-pal-24').val();
        let dosis_pal_25 = $('#dosis-pal-25').val();
        let dosis_pal_26 = $('#dosis-pal-26').val();
        let dosis_pal_27 = $('#dosis-pal-27').val();
        let dosis_pal_28 = $('#dosis-pal-28').val();
        let dosis_pal_29 = $('#dosis-pal-29').val();
        let dosis_pal_30 = $('#dosis-pal-30').val();

        // let rr_pal_1 = $('#rr-pal-1').is(':checked');
        // let hr_pal_2 = $('#hr-pal-2').is(':checked');
        // let rr_pal_3 = $('#rr-pal-3').is(':checked');
        // let hr_pal_4 = $('#hr-pal-4').is(':checked');
        // let rr_pal_5 = $('#rr-pal-5').is(':checked');
        // let hr_pal_6 = $('#hr-pal-6').is(':checked');
        // let rr_pal_7 = $('#rr-pal-7').is(':checked');
        // let hr_pal_8 = $('#hr-pal-8').is(':checked');
        // let rr_pal_9 = $('#rr-pal-9').is(':checked');
        // let hr_pal_10 = $('#hr-pal-10').is(':checked');

        // let rr_pal_11 = $('#rr-pal-11').is(':checked');
        // let hr_pal_12 = $('#hr-pal-12').is(':checked');
        // let rr_pal_13 = $('#rr-pal-13').is(':checked');
        // let hr_pal_14 = $('#hr-pal-14').is(':checked');
        // let rr_pal_15 = $('#rr-pal-15').is(':checked');
        // let hr_pal_16 = $('#hr-pal-16').is(':checked');
        // let rr_pal_17 = $('#rr-pal-17').is(':checked');
        // let hr_pal_18 = $('#hr-pal-18').is(':checked');
        // let rr_pal_19 = $('#rr-pal-19').is(':checked');
        // let hr_pal_20 = $('#hr-pal-20').is(':checked');

        let stjp_pal_1 = $('#stjp-pal-1').val();
        let stjp_pal_2 = $('#stjp-pal-2').val();
        let stjp_pal_3 = $('#stjp-pal-3').val();
        let stjp_pal_4 = $('#stjp-pal-4').val();
        let stjp_pal_5 = $('#stjp-pal-5').val();
        let stjp_pal_6 = $('#stjp-pal-6').val();
        let stjp_pal_7 = $('#stjp-pal-7').val();
        let stjp_pal_8 = $('#stjp-pal-8').val();
        let stjp_pal_9 = $('#stjp-pal-9').val();
        let stjp_pal_10 = $('#stjp-pal-10').val();

        let stjp_pal_11 = $('#stjp-pal-11').val();
        let stjp_pal_12 = $('#stjp-pal-12').val();
        let stjp_pal_13 = $('#stjp-pal-13').val();
        let stjp_pal_14 = $('#stjp-pal-14').val();
        let stjp_pal_15 = $('#stjp-pal-15').val();
        let stjp_pal_16 = $('#stjp-pal-16').val();
        let stjp_pal_17 = $('#stjp-pal-17').val();
        let stjp_pal_18 = $('#stjp-pal-18').val();
        let stjp_pal_19 = $('#stjp-pal-19').val();
        let stjp_pal_20 = $('#stjp-pal-20').val();

        let stjp_pal_21 = $('#stjp-pal-21').val();
        let stjp_pal_22 = $('#stjp-pal-22').val();
        let stjp_pal_23 = $('#stjp-pal-23').val();
        let stjp_pal_24 = $('#stjp-pal-24').val();
        let stjp_pal_25 = $('#stjp-pal-25').val();
        let stjp_pal_26 = $('#stjp-pal-26').val();
        let stjp_pal_27 = $('#stjp-pal-27').val();
        let stjp_pal_28 = $('#stjp-pal-28').val();
        let stjp_pal_29 = $('#stjp-pal-29').val();
        let stjp_pal_30 = $('#stjp-pal-30').val();

        let stjp_pal_31 = $('#stjp-pal-31').val();
        let stjp_pal_32 = $('#stjp-pal-32').val();
        let stjp_pal_33 = $('#stjp-pal-33').val();
        let stjp_pal_34 = $('#stjp-pal-34').val();
        let stjp_pal_35 = $('#stjp-pal-35').val();
        let stjp_pal_36 = $('#stjp-pal-36').val();
        let stjp_pal_37 = $('#stjp-pal-37').val();
        let stjp_pal_38 = $('#stjp-pal-38').val();
        let stjp_pal_39 = $('#stjp-pal-39').val();
        let stjp_pal_40 = $('#stjp-pal-40').val();

        let stjp_pal_41 = $('#stjp-pal-41').val();
        let stjp_pal_42 = $('#stjp-pal-42').val();
        let stjp_pal_43 = $('#stjp-pal-43').val();
        let stjp_pal_44 = $('#stjp-pal-44').val();
        let stjp_pal_45 = $('#stjp-pal-45').val();
        let stjp_pal_46 = $('#stjp-pal-46').val();
        let stjp_pal_47 = $('#stjp-pal-47').val();
        let stjp_pal_48 = $('#stjp-pal-48').val();
        let stjp_pal_49 = $('#stjp-pal-49').val();
        let stjp_pal_50 = $('#stjp-pal-50').val();

        let stjp_pal_51 = $('#stjp-pal-51').val();
        let stjp_pal_52 = $('#stjp-pal-52').val();
        let stjp_pal_53 = $('#stjp-pal-53').val();
        let stjp_pal_54 = $('#stjp-pal-54').val();
        let stjp_pal_55 = $('#stjp-pal-55').val();
        let stjp_pal_56 = $('#stjp-pal-56').val();
        let stjp_pal_57 = $('#stjp-pal-57').val();
        let stjp_pal_58 = $('#stjp-pal-58').val();
        let stjp_pal_59 = $('#stjp-pal-59').val();
        let stjp_pal_60 = $('#stjp-pal-60').val();

        let stjp_pal_61 = $('#stjp-pal-61').val();
        let stjp_pal_62 = $('#stjp-pal-62').val();
        let stjp_pal_63 = $('#stjp-pal-63').val();
        let stjp_pal_64 = $('#stjp-pal-64').val();
        let stjp_pal_65 = $('#stjp-pal-65').val();
        let stjp_pal_66 = $('#stjp-pal-66').val();
        let stjp_pal_67 = $('#stjp-pal-67').val();
        let stjp_pal_68 = $('#stjp-pal-68').val();
        let stjp_pal_69 = $('#stjp-pal-69').val();
        let stjp_pal_70 = $('#stjp-pal-70').val();

        let stjp_pal_71 = $('#stjp-pal-71').val();
        let stjp_pal_72 = $('#stjp-pal-72').val();
        let stjp_pal_73 = $('#stjp-pal-73').val();
        let stjp_pal_74 = $('#stjp-pal-74').val();
        let stjp_pal_75 = $('#stjp-pal-75').val();
        let stjp_pal_76 = $('#stjp-pal-76').val();
        let stjp_pal_77 = $('#stjp-pal-77').val();
        let stjp_pal_78 = $('#stjp-pal-78').val();
        let stjp_pal_79 = $('#stjp-pal-79').val();
        let stjp_pal_80 = $('#stjp-pal-80').val();

        let stjp_pal_81 = $('#stjp-pal-81').val();
        let stjp_pal_82 = $('#stjp-pal-82').val();
        let stjp_pal_83 = $('#stjp-pal-83').val();
        let stjp_pal_84 = $('#stjp-pal-84').val();
        let stjp_pal_85 = $('#stjp-pal-85').val();
        let stjp_pal_86 = $('#stjp-pal-86').val();
        let stjp_pal_87 = $('#stjp-pal-87').val();
        let stjp_pal_88 = $('#stjp-pal-88').val();
        let stjp_pal_89 = $('#stjp-pal-89').val();
        let stjp_pal_90 = $('#stjp-pal-90').val();

        let stjp_pal_91 = $('#stjp-pal-91').val();
        let stjp_pal_92 = $('#stjp-pal-92').val();
        let stjp_pal_93 = $('#stjp-pal-93').val();
        let stjp_pal_94 = $('#stjp-pal-94').val();
        let stjp_pal_95 = $('#stjp-pal-95').val();
        let stjp_pal_96 = $('#stjp-pal-96').val();
        let stjp_pal_97 = $('#stjp-pal-97').val();
        let stjp_pal_98 = $('#stjp-pal-98').val();
        let stjp_pal_99 = $('#stjp-pal-99').val();
        let stjp_pal_100 = $('#stjp-pal-100').val();

        let stjp_pal_101 = $('#stjp-pal-101').val();
        let stjp_pal_102 = $('#stjp-pal-102').val();
        let stjp_pal_103 = $('#stjp-pal-103').val();
        let stjp_pal_104 = $('#stjp-pal-104').val();
        let stjp_pal_105 = $('#stjp-pal-105').val();
        let stjp_pal_106 = $('#stjp-pal-106').val();
        let stjp_pal_107 = $('#stjp-pal-107').val();
        let stjp_pal_108 = $('#stjp-pal-108').val();
        let stjp_pal_109 = $('#stjp-pal-109').val();
        let stjp_pal_110 = $('#stjp-pal-110').val();

        let stjp_pal_111 = $('#stjp-pal-111').val();
        let stjp_pal_112 = $('#stjp-pal-112').val();
        let stjp_pal_113 = $('#stjp-pal-113').val();
        let stjp_pal_114 = $('#stjp-pal-114').val();
        let stjp_pal_115 = $('#stjp-pal-115').val();
        let stjp_pal_116 = $('#stjp-pal-116').val();
        let stjp_pal_117 = $('#stjp-pal-117').val();
        let stjp_pal_118 = $('#stjp-pal-118').val();
        let stjp_pal_119 = $('#stjp-pal-119').val();
        let stjp_pal_120 = $('#stjp-pal-120').val();
        
        let td_pal_1 = $('#td-pal-1').val();
        let td_pal_2 = $('#td-pal-2').val();
        let td_pal_3 = $('#td-pal-3').val();
        let td_pal_4 = $('#td-pal-4').val();
        let td_pal_5 = $('#td-pal-5').val();
        let td_pal_6 = $('#td-pal-6').val();
        let td_pal_7 = $('#td-pal-7').val();
        let td_pal_8 = $('#td-pal-8').val();
        let td_pal_9 = $('#td-pal-9').val();
        let td_pal_10 = $('#td-pal-10').val();
        let td_pal_11 = $('#td-pal-11').val();
        let td_pal_12 = $('#td-pal-12').val();
        let td_pal_13 = $('#td-pal-13').val();
        let td_pal_14 = $('#td-pal-14').val();
        let td_pal_15 = $('#td-pal-15').val();
        let td_pal_16 = $('#td-pal-16').val();
        let td_pal_17 = $('#td-pal-17').val();

        let so2_pal_1 = $('#so2-pal-1').val();
        let so2_pal_2 = $('#so2-pal-2').val();
        let so2_pal_3 = $('#so2-pal-3').val();
        let so2_pal_4 = $('#so2-pal-4').val();
        let so2_pal_5 = $('#so2-pal-5').val();
        let so2_pal_6 = $('#so2-pal-6').val();
        let so2_pal_7 = $('#so2-pal-7').val();
        let so2_pal_8 = $('#so2-pal-8').val();
        let so2_pal_9 = $('#so2-pal-9').val();
        let so2_pal_10 = $('#so2-pal-10').val();
        let so2_pal_11 = $('#so2-pal-11').val();
        let so2_pal_12 = $('#so2-pal-12').val();
        let so2_pal_13 = $('#so2-pal-13').val();
        let so2_pal_14 = $('#so2-pal-14').val();
        let so2_pal_15 = $('#so2-pal-15').val();
        let so2_pal_16 = $('#so2-pal-16').val();
        let so2_pal_17 = $('#so2-pal-17').val();

        let kd_pal_1 = $('#kd-pal-1').val();
        let kd_pal_2 = $('#kd-pal-2').val();
        let kd_pal_3 = $('#kd-pal-3').val();
        let kd_pal_4 = $('#kd-pal-4').val();
        let kd_pal_5 = $('#kd-pal-5').val();
        let kd_pal_6 = $('#kd-pal-6').val();
        let kd_pal_7 = $('#kd-pal-7').val();
        let kd_pal_8 = $('#kd-pal-8').val();
        let kd_pal_9 = $('#kd-pal-9').val();
        let kd_pal_10 = $('#kd-pal-10').val();
        let kd_pal_11 = $('#kd-pal-11').val();
        let kd_pal_12 = $('#kd-pal-12').val();
        let kd_pal_13 = $('#kd-pal-13').val();
        let kd_pal_14 = $('#kd-pal-14').val();
        let kd_pal_15 = $('#kd-pal-15').val();
        let kd_pal_16 = $('#kd-pal-16').val();
        let kd_pal_17 = $('#kd-pal-17').val();
        html = /* html */ `
            <tr class="row-in-${++numberPal}">
                <td class="number-pengkajian" align="center">${numberPal++}</td>
                <td align="center">
                    <input type="hidden" name="tanggal_pemantauan_pal[]" value="${tanggal_pemantauan_pal}">${tanggal_pemantauan_pal}
                </td>
                <td align="center">
                    <input type="hidden" name="jam_mulai_pal[]" value="${jam_mulai_pal}">${jam_mulai_pal}
                </td>
                <td align="center">
                    <input type="hidden" name="jam_selesai_pal[]" value="${jam_selesai_pal}">${jam_selesai_pal}
                </td>
                <td align="center">
                    <input type="hidden" name="perawat_pal[]" value="${perawat_pal}">${perawat}
                </td>
                <td align="center">
                    <input type="hidden" name="dokter_pal[]" value="${dokter_pal}">${dokter}
                </td>               
                <td align="center">
                    <?= $this->session->userdata('nama') ?>
                    <input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="pengkajian_date_anestesi_lokal[]" value="<?= date("Y-m-d H:i:s") ?>">  
                    <input type="hidden" name="obat_pal_1[]" value="${obat_pal_1}">
                    <input type="hidden" name="obat_pal_2[]" value="${obat_pal_2}">
                    <input type="hidden" name="obat_pal_3[]" value="${obat_pal_3}">
                    <input type="hidden" name="obat_pal_4[]" value="${obat_pal_4}">
                    <input type="hidden" name="obat_pal_5[]" value="${obat_pal_5}">
                    <input type="hidden" name="obat_pal_6[]" value="${obat_pal_6}">
                    <input type="hidden" name="obat_pal_7[]" value="${obat_pal_7}">
                    <input type="hidden" name="obat_pal_8[]" value="${obat_pal_8}">
                    <input type="hidden" name="obat_pal_9[]" value="${obat_pal_9}">
                    <input type="hidden" name="obat_pal_10[]" value="${obat_pal_10}">

                    <input type="hidden" name="jam_pal_1[]" value="${jam_pal_1}">
                    <input type="hidden" name="jam_pal_2[]" value="${jam_pal_2}">
                    <input type="hidden" name="jam_pal_3[]" value="${jam_pal_3}">
                    <input type="hidden" name="jam_pal_4[]" value="${jam_pal_4}">
                    <input type="hidden" name="jam_pal_5[]" value="${jam_pal_5}">
                    <input type="hidden" name="jam_pal_6[]" value="${jam_pal_6}">
                    <input type="hidden" name="jam_pal_7[]" value="${jam_pal_7}">
                    <input type="hidden" name="jam_pal_8[]" value="${jam_pal_8}">
                    <input type="hidden" name="jam_pal_9[]" value="${jam_pal_9}">
                    <input type="hidden" name="jam_pal_10[]" value="${jam_pal_10}">
                    <input type="hidden" name="jam_pal_11[]" value="${jam_pal_11}">
                    <input type="hidden" name="jam_pal_12[]" value="${jam_pal_12}">

                    <input type="hidden" name="dosis_pal_1[]" value="${dosis_pal_1}">
                    <input type="hidden" name="dosis_pal_2[]" value="${dosis_pal_2}">
                    <input type="hidden" name="dosis_pal_3[]" value="${dosis_pal_3}">
                    <input type="hidden" name="dosis_pal_4[]" value="${dosis_pal_4}">
                    <input type="hidden" name="dosis_pal_5[]" value="${dosis_pal_5}">
                    <input type="hidden" name="dosis_pal_6[]" value="${dosis_pal_6}">
                    <input type="hidden" name="dosis_pal_7[]" value="${dosis_pal_7}">
                    <input type="hidden" name="dosis_pal_8[]" value="${dosis_pal_8}">
                    <input type="hidden" name="dosis_pal_9[]" value="${dosis_pal_9}">
                    <input type="hidden" name="dosis_pal_10[]" value="${dosis_pal_10}">

                    <input type="hidden" name="dosis_pal_11[]" value="${dosis_pal_11}">
                    <input type="hidden" name="dosis_pal_12[]" value="${dosis_pal_12}">
                    <input type="hidden" name="dosis_pal_13[]" value="${dosis_pal_13}">
                    <input type="hidden" name="dosis_pal_14[]" value="${dosis_pal_14}">
                    <input type="hidden" name="dosis_pal_15[]" value="${dosis_pal_15}">
                    <input type="hidden" name="dosis_pal_16[]" value="${dosis_pal_16}">
                    <input type="hidden" name="dosis_pal_17[]" value="${dosis_pal_17}">
                    <input type="hidden" name="dosis_pal_18[]" value="${dosis_pal_18}">
                    <input type="hidden" name="dosis_pal_19[]" value="${dosis_pal_19}">                  
                    <input type="hidden" name="dosis_pal_20[]" value="${dosis_pal_20}">

                    <input type="hidden" name="dosis_pal_21[]" value="${dosis_pal_21}">
                    <input type="hidden" name="dosis_pal_22[]" value="${dosis_pal_22}">
                    <input type="hidden" name="dosis_pal_23[]" value="${dosis_pal_23}">
                    <input type="hidden" name="dosis_pal_24[]" value="${dosis_pal_24}">
                    <input type="hidden" name="dosis_pal_25[]" value="${dosis_pal_25}">
                    <input type="hidden" name="dosis_pal_26[]" value="${dosis_pal_26}">
                    <input type="hidden" name="dosis_pal_27[]" value="${dosis_pal_27}">
                    <input type="hidden" name="dosis_pal_28[]" value="${dosis_pal_28}">
                    <input type="hidden" name="dosis_pal_29[]" value="${dosis_pal_29}">
                    <input type="hidden" name="dosis_pal_30[]" value="${dosis_pal_30}">


                    <input type="hidden" name="stjp_pal_1[]" value="${stjp_pal_1}">
                    <input type="hidden" name="stjp_pal_2[]" value="${stjp_pal_2}">
                    <input type="hidden" name="stjp_pal_3[]" value="${stjp_pal_3}">
                    <input type="hidden" name="stjp_pal_4[]" value="${stjp_pal_4}">
                    <input type="hidden" name="stjp_pal_5[]" value="${stjp_pal_5}">
                    <input type="hidden" name="stjp_pal_6[]" value="${stjp_pal_6}">
                    <input type="hidden" name="stjp_pal_7[]" value="${stjp_pal_7}">
                    <input type="hidden" name="stjp_pal_8[]" value="${stjp_pal_8}">
                    <input type="hidden" name="stjp_pal_9[]" value="${stjp_pal_9}">
                    <input type="hidden" name="stjp_pal_10[]" value="${stjp_pal_10}">

                    <input type="hidden" name="stjp_pal_11[]" value="${stjp_pal_11}">
                    <input type="hidden" name="stjp_pal_12[]" value="${stjp_pal_12}">
                    <input type="hidden" name="stjp_pal_13[]" value="${stjp_pal_13}">
                    <input type="hidden" name="stjp_pal_14[]" value="${stjp_pal_14}">
                    <input type="hidden" name="stjp_pal_15[]" value="${stjp_pal_15}">
                    <input type="hidden" name="stjp_pal_16[]" value="${stjp_pal_16}">
                    <input type="hidden" name="stjp_pal_17[]" value="${stjp_pal_17}">
                    <input type="hidden" name="stjp_pal_18[]" value="${stjp_pal_18}">
                    <input type="hidden" name="stjp_pal_19[]" value="${stjp_pal_19}">                  
                    <input type="hidden" name="stjp_pal_20[]" value="${stjp_pal_20}">

                    <input type="hidden" name="stjp_pal_21[]" value="${stjp_pal_21}">
                    <input type="hidden" name="stjp_pal_22[]" value="${stjp_pal_22}">
                    <input type="hidden" name="stjp_pal_23[]" value="${stjp_pal_23}">
                    <input type="hidden" name="stjp_pal_24[]" value="${stjp_pal_24}">
                    <input type="hidden" name="stjp_pal_25[]" value="${stjp_pal_25}">
                    <input type="hidden" name="stjp_pal_26[]" value="${stjp_pal_26}">
                    <input type="hidden" name="stjp_pal_27[]" value="${stjp_pal_27}">
                    <input type="hidden" name="stjp_pal_28[]" value="${stjp_pal_28}">
                    <input type="hidden" name="stjp_pal_29[]" value="${stjp_pal_29}">
                    <input type="hidden" name="stjp_pal_30[]" value="${stjp_pal_30}">

                    <input type="hidden" name="stjp_pal_31[]" value="${stjp_pal_31}">
                    <input type="hidden" name="stjp_pal_32[]" value="${stjp_pal_32}">
                    <input type="hidden" name="stjp_pal_33[]" value="${stjp_pal_33}">
                    <input type="hidden" name="stjp_pal_34[]" value="${stjp_pal_34}">
                    <input type="hidden" name="stjp_pal_35[]" value="${stjp_pal_35}">
                    <input type="hidden" name="stjp_pal_36[]" value="${stjp_pal_36}">
                    <input type="hidden" name="stjp_pal_37[]" value="${stjp_pal_37}">
                    <input type="hidden" name="stjp_pal_38[]" value="${stjp_pal_38}">
                    <input type="hidden" name="stjp_pal_39[]" value="${stjp_pal_39}">
                    <input type="hidden" name="stjp_pal_40[]" value="${stjp_pal_40}">

                    <input type="hidden" name="stjp_pal_41[]" value="${stjp_pal_41}">
                    <input type="hidden" name="stjp_pal_42[]" value="${stjp_pal_42}">
                    <input type="hidden" name="stjp_pal_43[]" value="${stjp_pal_43}">
                    <input type="hidden" name="stjp_pal_44[]" value="${stjp_pal_44}">
                    <input type="hidden" name="stjp_pal_45[]" value="${stjp_pal_45}">
                    <input type="hidden" name="stjp_pal_46[]" value="${stjp_pal_46}">
                    <input type="hidden" name="stjp_pal_47[]" value="${stjp_pal_47}">
                    <input type="hidden" name="stjp_pal_48[]" value="${stjp_pal_48}">
                    <input type="hidden" name="stjp_pal_49[]" value="${stjp_pal_49}">
                    <input type="hidden" name="stjp_pal_50[]" value="${stjp_pal_50}">

                    <input type="hidden" name="stjp_pal_51[]" value="${stjp_pal_51}">
                    <input type="hidden" name="stjp_pal_52[]" value="${stjp_pal_52}">
                    <input type="hidden" name="stjp_pal_53[]" value="${stjp_pal_53}">
                    <input type="hidden" name="stjp_pal_54[]" value="${stjp_pal_54}">
                    <input type="hidden" name="stjp_pal_55[]" value="${stjp_pal_55}">
                    <input type="hidden" name="stjp_pal_56[]" value="${stjp_pal_56}">
                    <input type="hidden" name="stjp_pal_57[]" value="${stjp_pal_57}">
                    <input type="hidden" name="stjp_pal_58[]" value="${stjp_pal_58}">
                    <input type="hidden" name="stjp_pal_59[]" value="${stjp_pal_59}">
                    <input type="hidden" name="stjp_pal_60[]" value="${stjp_pal_60}">

                    <input type="hidden" name="stjp_pal_61[]" value="${stjp_pal_61}">
                    <input type="hidden" name="stjp_pal_62[]" value="${stjp_pal_62}">
                    <input type="hidden" name="stjp_pal_63[]" value="${stjp_pal_63}">
                    <input type="hidden" name="stjp_pal_64[]" value="${stjp_pal_64}">
                    <input type="hidden" name="stjp_pal_65[]" value="${stjp_pal_65}">
                    <input type="hidden" name="stjp_pal_66[]" value="${stjp_pal_66}">
                    <input type="hidden" name="stjp_pal_67[]" value="${stjp_pal_67}">
                    <input type="hidden" name="stjp_pal_68[]" value="${stjp_pal_68}">
                    <input type="hidden" name="stjp_pal_69[]" value="${stjp_pal_69}">
                    <input type="hidden" name="stjp_pal_70[]" value="${stjp_pal_70}">

                    <input type="hidden" name="stjp_pal_71[]" value="${stjp_pal_71}">
                    <input type="hidden" name="stjp_pal_72[]" value="${stjp_pal_72}">
                    <input type="hidden" name="stjp_pal_73[]" value="${stjp_pal_73}">
                    <input type="hidden" name="stjp_pal_74[]" value="${stjp_pal_74}">
                    <input type="hidden" name="stjp_pal_75[]" value="${stjp_pal_75}">
                    <input type="hidden" name="stjp_pal_76[]" value="${stjp_pal_76}">
                    <input type="hidden" name="stjp_pal_77[]" value="${stjp_pal_77}">
                    <input type="hidden" name="stjp_pal_78[]" value="${stjp_pal_78}">
                    <input type="hidden" name="stjp_pal_79[]" value="${stjp_pal_79}">
                    <input type="hidden" name="stjp_pal_80[]" value="${stjp_pal_80}">

                    <input type="hidden" name="stjp_pal_81[]" value="${stjp_pal_81}">
                    <input type="hidden" name="stjp_pal_82[]" value="${stjp_pal_82}">
                    <input type="hidden" name="stjp_pal_83[]" value="${stjp_pal_83}">
                    <input type="hidden" name="stjp_pal_84[]" value="${stjp_pal_84}">
                    <input type="hidden" name="stjp_pal_85[]" value="${stjp_pal_85}">
                    <input type="hidden" name="stjp_pal_86[]" value="${stjp_pal_86}">
                    <input type="hidden" name="stjp_pal_87[]" value="${stjp_pal_87}">
                    <input type="hidden" name="stjp_pal_88[]" value="${stjp_pal_88}">
                    <input type="hidden" name="stjp_pal_89[]" value="${stjp_pal_89}">
                    <input type="hidden" name="stjp_pal_90[]" value="${stjp_pal_90}">

                    <input type="hidden" name="stjp_pal_91[]" value="${stjp_pal_91}">
                    <input type="hidden" name="stjp_pal_92[]" value="${stjp_pal_92}">
                    <input type="hidden" name="stjp_pal_93[]" value="${stjp_pal_93}">
                    <input type="hidden" name="stjp_pal_94[]" value="${stjp_pal_94}">
                    <input type="hidden" name="stjp_pal_95[]" value="${stjp_pal_95}">
                    <input type="hidden" name="stjp_pal_96[]" value="${stjp_pal_96}">
                    <input type="hidden" name="stjp_pal_97[]" value="${stjp_pal_97}">
                    <input type="hidden" name="stjp_pal_98[]" value="${stjp_pal_98}">
                    <input type="hidden" name="stjp_pal_99[]" value="${stjp_pal_99}">
                    <input type="hidden" name="stjp_pal_100[]" value="${stjp_pal_100}">

                    <input type="hidden" name="stjp_pal_101[]" value="${stjp_pal_101}">
                    <input type="hidden" name="stjp_pal_102[]" value="${stjp_pal_102}">
                    <input type="hidden" name="stjp_pal_103[]" value="${stjp_pal_103}">
                    <input type="hidden" name="stjp_pal_104[]" value="${stjp_pal_104}">
                    <input type="hidden" name="stjp_pal_105[]" value="${stjp_pal_105}">
                    <input type="hidden" name="stjp_pal_106[]" value="${stjp_pal_106}">
                    <input type="hidden" name="stjp_pal_107[]" value="${stjp_pal_107}">
                    <input type="hidden" name="stjp_pal_108[]" value="${stjp_pal_108}">
                    <input type="hidden" name="stjp_pal_109[]" value="${stjp_pal_109}">
                    <input type="hidden" name="stjp_pal_110[]" value="${stjp_pal_110}">

                    <input type="hidden" name="stjp_pal_111[]" value="${stjp_pal_111}">
                    <input type="hidden" name="stjp_pal_112[]" value="${stjp_pal_112}">
                    <input type="hidden" name="stjp_pal_113[]" value="${stjp_pal_113}">
                    <input type="hidden" name="stjp_pal_114[]" value="${stjp_pal_114}">
                    <input type="hidden" name="stjp_pal_115[]" value="${stjp_pal_115}">
                    <input type="hidden" name="stjp_pal_116[]" value="${stjp_pal_116}">
                    <input type="hidden" name="stjp_pal_117[]" value="${stjp_pal_117}">
                    <input type="hidden" name="stjp_pal_118[]" value="${stjp_pal_118}">
                    <input type="hidden" name="stjp_pal_119[]" value="${stjp_pal_119}">
                    <input type="hidden" name="stjp_pal_120[]" value="${stjp_pal_120}">

                    <input type="hidden" name="td_pal_1[]" value="${td_pal_1}">
                    <input type="hidden" name="td_pal_2[]" value="${td_pal_2}">
                    <input type="hidden" name="td_pal_3[]" value="${td_pal_3}">
                    <input type="hidden" name="td_pal_4[]" value="${td_pal_4}">
                    <input type="hidden" name="td_pal_5[]" value="${td_pal_5}">
                    <input type="hidden" name="td_pal_6[]" value="${td_pal_6}">
                    <input type="hidden" name="td_pal_7[]" value="${td_pal_7}">
                    <input type="hidden" name="td_pal_8[]" value="${td_pal_8}">
                    <input type="hidden" name="td_pal_9[]" value="${td_pal_9}">
                    <input type="hidden" name="td_pal_10[]" value="${td_pal_10}">
                    <input type="hidden" name="td_pal_11[]" value="${td_pal_11}">
                    <input type="hidden" name="td_pal_12[]" value="${td_pal_12}">
                    <input type="hidden" name="td_pal_13[]" value="${td_pal_13}">
                    <input type="hidden" name="td_pal_14[]" value="${td_pal_14}">
                    <input type="hidden" name="td_pal_15[]" value="${td_pal_15}">
                    <input type="hidden" name="td_pal_16[]" value="${td_pal_16}">
                    <input type="hidden" name="td_pal_17[]" value="${td_pal_17}">

                    <input type="hidden" name="so2_pal_1[]" value="${so2_pal_1}">
                    <input type="hidden" name="so2_pal_2[]" value="${so2_pal_2}">
                    <input type="hidden" name="so2_pal_3[]" value="${so2_pal_3}">
                    <input type="hidden" name="so2_pal_4[]" value="${so2_pal_4}">
                    <input type="hidden" name="so2_pal_5[]" value="${so2_pal_5}">
                    <input type="hidden" name="so2_pal_6[]" value="${so2_pal_6}">
                    <input type="hidden" name="so2_pal_7[]" value="${so2_pal_7}">
                    <input type="hidden" name="so2_pal_8[]" value="${so2_pal_8}">
                    <input type="hidden" name="so2_pal_9[]" value="${so2_pal_9}">
                    <input type="hidden" name="so2_pal_10[]" value="${so2_pal_10}">
                    <input type="hidden" name="so2_pal_11[]" value="${so2_pal_11}">
                    <input type="hidden" name="so2_pal_12[]" value="${so2_pal_12}">
                    <input type="hidden" name="so2_pal_13[]" value="${so2_pal_13}">
                    <input type="hidden" name="so2_pal_14[]" value="${so2_pal_14}">
                    <input type="hidden" name="so2_pal_15[]" value="${so2_pal_15}">
                    <input type="hidden" name="so2_pal_16[]" value="${so2_pal_16}">
                    <input type="hidden" name="so2_pal_17[]" value="${so2_pal_17}">

                    <input type="hidden" name="kd_pal_1[]" value="${kd_pal_1}">
                    <input type="hidden" name="kd_pal_2[]" value="${kd_pal_2}">
                    <input type="hidden" name="kd_pal_3[]" value="${kd_pal_3}">
                    <input type="hidden" name="kd_pal_4[]" value="${kd_pal_4}">
                    <input type="hidden" name="kd_pal_5[]" value="${kd_pal_5}">
                    <input type="hidden" name="kd_pal_6[]" value="${kd_pal_6}">
                    <input type="hidden" name="kd_pal_7[]" value="${kd_pal_7}">
                    <input type="hidden" name="kd_pal_8[]" value="${kd_pal_8}">
                    <input type="hidden" name="kd_pal_9[]" value="${kd_pal_9}">
                    <input type="hidden" name="kd_pal_10[]" value="${kd_pal_10}">
                    <input type="hidden" name="kd_pal_11[]" value="${kd_pal_11}">
                    <input type="hidden" name="kd_pal_12[]" value="${kd_pal_12}">
                    <input type="hidden" name="kd_pal_13[]" value="${kd_pal_13}">
                    <input type="hidden" name="kd_pal_14[]" value="${kd_pal_14}">
                    <input type="hidden" name="kd_pal_15[]" value="${kd_pal_15}">
                    <input type="hidden" name="kd_pal_16[]" value="${kd_pal_16}">
                    <input type="hidden" name="kd_pal_17[]" value="${kd_pal_17}">                                          
                </td>
                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#tabel-pal .body-table').append(html);
    }

    function hapusPemantauanAnestesiLokal(obj, id) {
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
                            url: '<?= base_url("order_operasi/api/Order_operasi/hapus_pemantauan_anestesi_lokal") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Pemantauan Anestesi Lokal', data
                                        .message);
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

<!-- //  <input type="hidden" name="rr_pal_1[]" value="${rr_pal_1 ? 8 : 0}">
                    // <input type="hidden" name="hr_pal_2[]" value="${hr_pal_2 ? 200 : 0}">
                    // <input type="hidden" name="rr_pal_3[]" value="${rr_pal_3 ? 10 : 0}">
                    // <input type="hidden" name="hr_pal_4[]" value="${hr_pal_4 ? 180 : 0}">
                    // <input type="hidden" name="rr_pal_5[]" value="${rr_pal_5 ? 12 : 0}">
                    // <input type="hidden" name="hr_pal_6[]" value="${hr_pal_6 ? 160 : 0}">
                    // <input type="hidden" name="rr_pal_7[]" value="${rr_pal_7 ? 14 : 0}">
                    // <input type="hidden" name="hr_pal_8[]" value="${hr_pal_8 ? 140 : 0}">
                    // <input type="hidden" name="rr_pal_9[]" value="${rr_pal_9 ? 16 : 0}">
                    // <input type="hidden" name="hr_pal_10[]" value="${hr_pal_10 ? 120 : 0}">

                    // <input type="hidden" name="rr_pal_11[]" value="${rr_pal_11 ? 18 : 0}">
                    // <input type="hidden" name="hr_pal_12[]" value="${hr_pal_12 ? 100 : 0}">
                    // <input type="hidden" name="rr_pal_13[]" value="${rr_pal_13 ? 20 : 0}">
                    // <input type="hidden" name="hr_pal_14[]" value="${hr_pal_14 ? 80 : 0}">
                    // <input type="hidden" name="rr_pal_15[]" value="${rr_pal_15 ? 22 : 0}">
                    // <input type="hidden" name="hr_pal_16[]" value="${hr_pal_16 ? 60 : 0}">
                    // <input type="hidden" name="rr_pal_17[]" value="${rr_pal_17 ? 24 : 0}">
                    // <input type="hidden" name="hr_pal_18[]" value="${hr_pal_18 ? 40 : 0}">
                    // <input type="hidden" name="rr_pal_19[]" value="${rr_pal_19 ? 26 : 0}">
                    // <input type="hidden" name="hr_pal_20[]" value="${hr_pal_20 ? 20 : 0}"> -->