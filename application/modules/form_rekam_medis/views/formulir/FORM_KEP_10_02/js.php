<!-- // MCOP -->
<script>
    var userLoginId = <?= json_encode($this->session->userdata('nama')) ?>;
    var nomer = 1;
    $(function() {

        nomer++;

        // MCOP
        $('#tanggal-waktu-pagi, #edit-tanggal-waktu-pagi, #tanggal-waktu-sore, #edit-tanggal-waktu-sore, #tanggal-waktu-malam, #edit-tanggal-waktu-malam')
        .datetimepicker({
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

        // PAGI  
        $('#dpjp-utama-pagi, #edit-dpjp-utama-pagi').select2c({
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
                $("#id-dpjp-utama-pagi-hidden").val(data.id);
                return data.nama;
            }
        });

        $('#konsulen-pagi, #edit-konsulen-pagi').select2c({
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
        });

        $('#perawat-mengover-pagi, #edit-perawat-mengover-pagi').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
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
                $("#id-perawat-mengover-pagi-hidden").val(data.id);
                return data.nama;
            }
        });

        $('#perawat-menerima-pagi, #edit-perawat-menerima-pagi').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
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
                $("#id-perawat-menerima-pagi-hidden").val(data.id);
                return data.nama;
            }
        });


        // SORE
        $('#dokter-dpjp-sore, #edit-dokter-dpjp-sore').select2c({
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
                $("#id-dokter-dpjp-sore-hidden").val(data.id);
                return data.nama;
            }
        });

        $('#konsulen-sore, #edit-konsulen-sore').select2c({
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
        });

        $('#perawat-mengover-sore, #edit-perawat-mengover-sore').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
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
                $("#id-perawat-mengover-sore-hidden").val(data.id);
                return data.nama;
            }
        });

        $('#perawat-menerima-sore, #edit-perawat-menerima-sore').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
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
                $("#id-perawat-menerima-sore-hidden").val(data.id);
                return data.nama;
            }
        });



        // MALAM
        $('#dokter-dpjp-malam, #edit-dokter-dpjp-malam').select2c({
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
                $("#id-dokter-dpjp-malam-hidden").val(data.id);
                return data.nama;
            }
        });

        $('#konsulen-malam, #edit-konsulen-malam').select2c({
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
        });  

        $('#perawat-mengover-malam, #edit-perawat-mengover-malam').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
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
                $("#id-perawat-mengover-malam-hidden").val(data.id);
                return data.nama;
            }
        });

        $('#perawat-menerima-malam, #edit-perawat-menerima-malam').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
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
                $("#id-perawat-menerima-malam-hidden").val(data.id);
                return data.nama;
            }
        });

    })

    

    // MCOP
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

    function lihatFORM_KEP_10_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        entriCatatanOperanPerawat(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_10_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        entriCatatanOperanPerawat(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_10_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        entriCatatanOperanPerawat(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriCatatanOperanPerawat(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#wizard_form_resume').bwizard('show', '0');

        $('#btn-simpan').hide();

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat' ) {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_catatan_operan_perawat") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {          
                resetFormentriCatatanOperanPerawat();
                $('#ek_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#ek-id-pendaftaran').val(id_pendaftaran);
                $('#ek-id-bed').val(bed);

                if (data.pasien !== null) {
                    $('#ek_id_pasien').val(data.pasien.id_pasien);
                    $('#ek_pasien_nama').text(data.pasien.nama);
                    $('#ek_pasien_no_rm').text(data.pasien.no_rm);
                    $('#ek_pasien_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data
                        .pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) +
                        ')'));
                    $('#ek_pasien_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' :
                        'Perempuan'));

                    if (data.pasien.alergi !== null) {
                        $('#ek_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#ek_pasien_alamat').text(data.pasien.alamat);
                }

                if (typeof data.catatan_operan_perawat_pagi !== 'undefined' | data.catatan_operan_perawat_pagi !== null) {
                    showCatatanOperanPerawatPagi(data.catatan_operan_perawat_pagi, id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    $('#table-catatan-operan-perawat-pagi tbody').empty();
                }

                if (typeof data.catatan_operan_perawat_sore !== 'undefined' | data.catatan_operan_perawat_sore !== null) {
                    showCatatanOperanPerawatSore(data.catatan_operan_perawat_sore, id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    $('#table-catatan-operan-perawat-sore tbody').empty();
                }

                if (typeof data.catatan_operan_perawat_malam !== 'undefined' | data.catatan_operan_perawat_malam !== null) {
                    showCatatanOperanPerawatMalam(data.catatan_operan_perawat_malam, id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    $('#table-catatan-operan-perawat-malam tbody').empty();
                }

                $('#ek_bed').text(bed);

                $('.ek-logo-pasien-alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.ek-logo-pasien-alergi').show();
                    }
                }


                if (action === 'lihat') {
                    // Disable semua input dan textarea
                    $('#modal_catatan_operan_perawat :input')
                    .not('[data-dismiss="modal"]') // ⛔ Jangan disable tombol close
                    .prop('disabled', true);
                    
                    $('#modal_catatan_operan_perawat textarea').prop('readonly', true);
                    $('#btn-simpan').hide();

                    // Disable select dan Select2
                    $('#modal_catatan_operan_perawat select')
                    .not('[data-dismiss="modal"]') // ⛔ Jangan disable kalau ini tombol close juga
                    .prop('disabled', true)
                    .trigger('change.select2c');

                     $('#modal_catatan_operan_perawat [id^="s2id_"]').css({
                        'pointer-events': 'none',
                        'opacity': 0.6
                    });
                } 

                // INI JANGAN DI HAPUS
                // if (action === 'lihat') {
                //     // Disable semua input dan textarea
                //     $('#modal_catatan_operan_perawat :input')
                //         .not('[data-dismiss="modal"]')
                //         .prop('disabled', true);

                //     $('#modal_catatan_operan_perawat textarea').prop('disabled', true);
                //     $('#btn-simpan').hide();

                //     // Disable select dan Select2
                //     $('#modal_catatan_operan_perawat select')
                //         .not('[data-dismiss="modal"]')
                //         .prop('disabled', true)
                //         .trigger('change.select2c');

                //     // Tambahan khusus untuk Select2C yang pakai s2id_*
                //     // $('#s2id_dpjp-utama-pagi, #s2id_konsulen-pagi, #s2id_perawat-mengover-pagi, #s2id_perawat-menerima-pagi').css({
                //     //     'pointer-events': 'none',
                //     //     'opacity': 0.6
                //     // });

                //     $('#modal_catatan_operan_perawat [id^="s2id_"]').css({
                //         'pointer-events': 'none',
                //         'opacity': 0.6
                //     });

                // }
            
                $('#modal_catatan_operan_perawat').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

    // PAGI
    function tambahRencanaPagi() {
        if ($('#perawat-mengover-pagi').val() === '') {
            syams_validation('#perawat-mengover-pagi', 'Perawat Harus Diisi!.');
            return false;
        }

        if ($('#perawat-menerima-pagi').val() === '') {
            syams_validation('#perawat-menerima-pagi', 'Perawat Harus Diisi!.');
            return false;
        }

        let html = '';
        let operan_diagnosa_keperawatan = $('#operan-diagnosa-keperawatan').val();
        let number = $('.number-rencana-pagi').length;
        let dpjp_utama_pagi = $('#s2id_dpjp-utama-pagi a .select2c-chosen').html();
        let id_dpjp_utama_pagi = $('#id-dpjp-utama-pagi-hidden').val();
        let konsulen_pagi = $('#s2id_konsulen-pagi a .select2c-chosen').html();
        let id_konsulen_pagi = $('#konsulen-pagi').val();
        let tanggal_waktu_pagi = $('#tanggal-waktu-pagi').val();
        let diagnosa_keprawatan_pagi = $('#diagnosa-keperawatan-pagi').val();
        let infus_pagi = $('#infus-pagi').val();
        let rencana_tindakan_pagi = $('#rencana-tindakan-pagi').val();
        let perawat_mengover_pagi = $('#s2id_perawat-mengover-pagi a .select2c-chosen').html();
        let id_perawat_mengover_pagi = $('#perawat-mengover-pagi').val();
        let perawat_menerima_pagi = $('#s2id_perawat-menerima-pagi a .select2c-chosen').html();
        let id_perawat_menerima_pagi = $('#perawat-menerima-pagi').val();

        let accountGroup = "<?= $this->session->userdata('account_group') ?>";

        function tanggalWaktuPagiAja(waktu) {
            var el = waktu.split(' ');
            var tgl = el[0];
            return el[0] + ' ' + el[1];
        }

        function tanggalWaktuPagi(waktu) {
            var el = waktu.split(' ');
            var tgl = el[0];
            var s_tgl = tgl.split('/');
            var tm = el[1].split(':');
            return s_tgl[2] + '-' + s_tgl[1] + '-' + s_tgl[0] + ' ' + tm[0] + ':' + tm[1] + ':' + '00';
        }

        var kirim_tanggal_waktu_pagi = tanggalWaktuPagi(tanggal_waktu_pagi);
        var lihat_tanggal_waktu_pagi = tanggalWaktuPagiAja(tanggal_waktu_pagi);

        html = /* html */ `
            <tr>
                <td width="1%" class="number-pemasangan-alat" align="center">${++number}</td>
                <td width="2%" align="center"><input type="hidden" name="dpjp_utama_pagi[]" value="${id_dpjp_utama_pagi}">${dpjp_utama_pagi}</td>
                <td width="2%" align="center"><input type="hidden" name="konsulen_pagi[]" value="${id_konsulen_pagi}">${konsulen_pagi}</td>
                <td width="2%" align="center"><input type="hidden" name="diagnosa_keprawatan_pagi[]" value="${diagnosa_keprawatan_pagi}">${diagnosa_keprawatan_pagi}</td>
                <td width="1%" align="center"><input type="hidden" name="tanggal_waktu_pagi[]" value="${kirim_tanggal_waktu_pagi}">${lihat_tanggal_waktu_pagi}</td>
                <td width="2%" align="center"><input type="hidden" name="rencana_tindakan_pagi[]" value="${rencana_tindakan_pagi}">${rencana_tindakan_pagi}</td>          
                <td width="2%" align="center"><input type="hidden" name="infus_pagi[]" value="${infus_pagi}">${infus_pagi}</td>
                <td width="2%" align="center"><input type="hidden" name="perawat_mengover_pagi[]" value="${id_perawat_mengover_pagi}">${perawat_mengover_pagi}</td>
                <td width="2%" align="center"><input type="hidden" name="perawat_menerima_pagi[]" value="${id_perawat_menerima_pagi}">${perawat_menerima_pagi}</td>
                <td width="2%" align="center">
                    <input type="hidden" name="user_input_catatan[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>

            </tr>        
        `;
        $('#table-catatan-operan-perawat-pagi tbody').append(html);
    }
    // <td width="2%" align="center"><input type="hidden" name="user_input_catatan[]" value="<!?= $this->session->userdata("id_translucent") ?>"><!?= $this->session->userdata("nama") ?></td>
    // <td width="1%" align="center">
    //     <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
    // </td>

    // PAGI   
    function showCatatanOperanPerawatPagi(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#table-catatan-operan-perawat-pagi tbody').empty();
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";

        if (data !== null) {
            $.each(data, function(i, v) {

                function tanggalCOPPagi(waktu) {
                    var el = waktu.split(' ');
                    var elem_tgl = el[0].split('-');
                    var elem_waktu = el[1].split(':');
                    return `${elem_tgl[2]}/${elem_tgl[1]}/${elem_tgl[0]} ${elem_waktu[0]}:${elem_waktu[1]}`;
                }

                // Update nilai input dengan diagnosa keperawatan
                $('#operan-diagnosa-keperawatan').val(v.operan_diagnosa_keperawatan);

                let selOpPagi = '';
                if (accountGroup === 'Admin') {
                    selOpPagi = `<td width="2%" align="center">${v.tanggal_waktu_pagi ? tanggalCOPPagi(v.tanggal_waktu_pagi) : ''}</td>`;
                } else {
                    selOpPagi = `<td width="2%" align="center">${v.tanggal_waktu_pagi ? tanggalCOPPagi(v.tanggal_waktu_pagi) : ''}</td>`;
                }

                // Variabel html hanya dideklarasikan sekali
                let html = /* html */ `
                    <tr>
                        <td width="1%" class="number-terapi" align="center">${(++i)}</td>
                        <td width="5%" align="center">${v.dokter_dpjp_pagi}</td>
                        <td width="5%" align="center">${v.konsulen_pagi_g}</td>
                        <td width="20%">${v.diagnosa_keperawatan_pagi || '-'}</td>
                        ${selOpPagi}
                        <td width="20%">${v.rencana_tindakan_pagi || '-'}</td>
                        <td width="20%">${v.infus_pagi || '-'}</td>
                        <td width="5%" align="center">${v.petugas_mengover_pagi}</td>
                        <td width="5%" align="center">${v.petugas_menerima_pagi}</td>


                        <td width="5%" align="center">
                            <button type="button" class="btn btn-danger btn-xs" onclick="hapusCatatanOperanPagi(this, ${v.id})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-xs" onclick="editCatatanOperanPagi(this, ${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                `;
                $('#table-catatan-operan-perawat-pagi tbody').append(html);
            });
        }
    }
    // <td width="5%" align="center">${v.akun_user}</td>

    // PAGI 
    function editCatatanOperanPagi(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        const modal = $('#modal-edit-cop-pagi');
        $('#update-cop-pagi').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_catatan_operan_pagi") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-cop-pagi').empty();
                $('#id-cop-pagi').val(id);
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-cop-pagi').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                    <button type="button" class="btn btn-info waves-effect" onclick="updateCatatanOperanPagi(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-cop-pagi').append(cttntndkn);
                $('#edit-operan-diagnosa-keperawatan').val(data.operan_diagnosa_keperawatan);


                $('#s2id_edit-dpjp-utama-pagi a .select2c-chosen').html(data.dokter_dpjp_pagi);
                $('#edit-dpjp-utama-pagi').val(data.dpjp_utama_pagi); 


                $('#s2id_edit-konsulen-pagi a .select2c-chosen').html(data.konsulen_pagi_g);
                $('#edit-konsulen-pagi').val(data.konsulen_pagi);
                $('#edit-tanggal-waktu-pagi').val((data.tanggal_waktu_pagi !== null ? datetimefmysql(data.tanggal_waktu_pagi) : ''));   
                $('#edit-diagnosa-keperawatan-pagi').val(data.diagnosa_keperawatan_pagi);
                $('#edit-infus-pagi').val(data.infus_pagi);
                $('#edit-rencana-tindakan-pagi').val(data.rencana_tindakan_pagi);
                $('#s2id_edit-perawat-mengover-pagi a .select2c-chosen').html(data.petugas_mengover_pagi);
                $('#edit-perawat-mengover-pagi').val(data.perawat_mengover_pagi);
                $('#s2id_edit-perawat-menerima-pagi a .select2c-chosen').html(data.petugas_menerima_pagi);
                $('#edit-perawat-menerima-pagi').val(data.perawat_menerima_pagi);
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    // PAGI
    function updateCatatanOperanPagi(id_pendaftaran, id_layanan_pendaftaran, bed) {
        const formData = $('#form-edit-cop-pagi').serializeArray();

        // Ubah ke objek data
        const dataObj = {};
        $.each(formData, function(_, field) {
            dataObj[field.name] = field.value;
        });

        // Tambahkan ID user yang mengedit
        dataObj['updated_by'] = userLoginId;

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/update_catatan_operan_pagi") ?>',
            data: dataObj,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                console.log('User yang update:', userLoginId); // debug
                if (data.status) {
                    messageEditSuccess();
                    entriCatatanOperanPerawat(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }

                $('#modal-edit-cop-pagi').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    // PAGI
    function hapusCatatanOperanPagi(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary"
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        console.log('User yang hapus:', userLoginId); // debug
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_catatan_operan_pagi") ?>/' + id,
                            data: {
                                deleted_by: userLoginId,
                                _method: 'DELETE'
                            },
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    obj.closest('tr').remove();
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

    // SORE
    function tambahRencanaSore() {
        if ($('#perawat-mengover-sore').val() === '') {
            syams_validation('#perawat-mengover-sore', 'Perawat Harus Diisi!.');
            return false;
        }

        if ($('#perawat-menerima-sore').val() === '') {
            syams_validation('#perawat-menerima-sore', 'Perawat Harus Diisi!.');
            return false;
        }

        let html = '';
        let number = $('.number-rencana-sore').length;
        let dokter_dpjp_sore = $('#s2id_dokter-dpjp-sore a .select2c-chosen').html();
        let id_dokter_dpjp_sore = $('#id-dokter-dpjp-sore-hidden').val();
        let konsulen_sore = $('#s2id_konsulen-sore a .select2c-chosen').html();
        let id_konsulen_sore = $('#konsulen-sore').val();
        let tanggal_waktu_sore = $('#tanggal-waktu-sore').val();
        let diagnosa_keperawatan_sore = $('#diagnosa-keperawatan-sore').val();
        let infus_sore = $('#infus-sore').val();
        let rencana_tindakan_sore = $('#rencana-tindakan-sore').val();
        let perawat_mengover_sore = $('#s2id_perawat-mengover-sore a .select2c-chosen').html();
        let id_perawat_mengover_sore = $('#perawat-mengover-sore').val();
        let perawat_menerima_sore = $('#s2id_perawat-menerima-sore a .select2c-chosen').html();
        let id_perawat_menerima_sore = $('#perawat-menerima-sore').val();

        let accountGroup = "<?= $this->session->userdata('account_group') ?>";

        function tanggalWaktuSoreAja(waktu) {
            var el = waktu.split(' ');
            var tgl = el[0];
            return el[0] + ' ' + el[1];
        }

        function tanggalWaktuSore(waktu) {
            var el = waktu.split(' ');
            var tgl = el[0];
            var s_tgl = tgl.split('/');
            var tm = el[1].split(':');
            return s_tgl[2] + '-' + s_tgl[1] + '-' + s_tgl[0] + ' ' + tm[0] + ':' + tm[1] + ':' + '00';
        }

        var kirim_tanggal_waktu_sore = tanggalWaktuSore(tanggal_waktu_sore);
        var lihat_tanggal_waktu_sore = tanggalWaktuSoreAja(tanggal_waktu_sore);

        html = /* html */ `
            <tr>
                <td width="1%" class="number-pemasangan-alat" align="center">${++number}</td>
                <td width="2%" align="center"><input type="hidden" name="id_dokter_dpjp_sore[]" value="${id_dokter_dpjp_sore}">${dokter_dpjp_sore}</td>
                <td width="2%" align="center"><input type="hidden" name="konsulen_sore[]" value="${id_konsulen_sore}">${konsulen_sore}</td>
                <td width="2%" align="center"><input type="hidden" name="diagnosa_keperawatan_sore[]" value="${diagnosa_keperawatan_sore}">${diagnosa_keperawatan_sore}</td>
                <td width="1%" align="center"><input type="hidden" name="tanggal_waktu_sore[]" value="${kirim_tanggal_waktu_sore}">${lihat_tanggal_waktu_sore}</td>
                <td width="2%" align="center"><input type="hidden" name="rencana_tindakan_sore[]" value="${rencana_tindakan_sore}">${rencana_tindakan_sore}</td>          
                <td width="2%" align="center"><input type="hidden" name="infus_sore[]" value="${infus_sore}">${infus_sore}</td>
                <td width="2%" align="center"><input type="hidden" name="perawat_mengover_sore[]" value="${id_perawat_mengover_sore}">${perawat_mengover_sore}</td>
                <td width="2%" align="center"><input type="hidden" name="perawat_menerima_sore[]" value="${id_perawat_menerima_sore}">${perawat_menerima_sore}</td>

                <td width="2%" align="center">
                    <input type="hidden" name="user_input_catatan[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>

            </tr>        
        `;
        $('#table-catatan-operan-perawat-sore tbody').append(html);
    }

    // <td width="2%" align="center"><input type="hidden" name="user_input_catatan[]" value="<!?= $this->session->userdata("id_translucent") ?>"><!?= $this->session->userdata("nama") ?></td>
    // <td width="1%" align="center">
    //     <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
    // </td>

    // SORE
    function showCatatanOperanPerawatSore(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#table-catatan-operan-perawat-sore tbody').empty();
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";

        if (data !== null) {
            $.each(data, function(i, v) {

                function tanggalCOPSore(waktu) {
                    var el = waktu.split(' ');
                    var elem_tgl = el[0].split('-');
                    var elem_waktu = el[1].split(':');
                    return `${elem_tgl[2]}/${elem_tgl[1]}/${elem_tgl[0]} ${elem_waktu[0]}:${elem_waktu[1]}`;
                }

                let selOpSore = '';
                if (accountGroup === 'Admin') {
                    selOpSore = `<td width="2%" align="center">${v.tanggal_waktu_sore ? tanggalCOPSore(v.tanggal_waktu_sore) : ''}</td>`;
                } else {
                    selOpSore = `<td width="2%" align="center">${v.tanggal_waktu_sore ? tanggalCOPSore(v.tanggal_waktu_sore) : ''}</td>`;
                }

                // Variabel html hanya dideklarasikan sekali
                let html = /* html */ `
                    <tr>
                        <td width="1%" class="number-terapi" align="center">${(++i)}</td>
                        <td width="5%" align="center">${v.dpjp_utama_sore}</td>
                        <td width="5%" align="center">${v.konsulen_sore_g}</td>
                        <td width="20%">${v.diagnosa_keperawatan_sore || '-'}</td>
                        ${selOpSore}
                        <td width="20%">${v.rencana_tindakan_sore || '-'}</td>
                        <td width="20%">${v.infus_sore || '-'}</td>
                        <td width="5%" align="center">${v.petugas_mengover_sore}</td>
                        <td width="5%" align="center">${v.petugas_menerima_sore}</td>
                        <td width="5%" align="center">
                            <button type="button" class="btn btn-danger btn-xs" onclick="hapusCatatanPerawatSore(this, ${v.id})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-xs" onclick="editCatatanOperanSore(this, ${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                `;
                $('#table-catatan-operan-perawat-sore tbody').append(html);
            });
        }
    }
    // <td width="5%" align="center">${v.akun_user}</td>

    // SORE 
    function editCatatanOperanSore(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        const modal = $('#modal-edit-cop-sore');
        $('#update-cop-sore').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_catatan_operan_sore") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-cop-sore').empty();
                $('#id-cop-sore').val(id);
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-cop-sore').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                    <button type="button" class="btn btn-info waves-effect" onclick="updateCatatanOperanSore(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-cop-sore').append(cttntndkn);
                $('#s2id_edit-dokter-dpjp-sore a .select2c-chosen').html(data.dpjp_utama_sore);
                $('#edit-dokter-dpjp-sore').val(data.dokter_dpjp_sore); 
                $('#s2id_edit-konsulen-sore a .select2c-chosen').html(data.konsulen_sore_g);
                $('#edit-konsulen-sore').val(data.konsulen_sore);
                $('#edit-tanggal-waktu-sore').val((data.tanggal_waktu_sore !== null ? datetimefmysql(data.tanggal_waktu_sore) : ''));   
                $('#edit-diagnosa-keperawatan-sore').val(data.diagnosa_keperawatan_sore);
                $('#edit-infus-sore').val(data.infus_sore);
                $('#edit-rencana-tindakan-sore').val(data.rencana_tindakan_sore);
                $('#s2id_edit-perawat-mengover-sore a .select2c-chosen').html(data.petugas_mengover_sore);
                $('#edit-perawat-mengover-sore').val(data.perawat_mengover_sore);
                $('#s2id_edit-perawat-menerima-sore a .select2c-chosen').html(data.petugas_menerima_sore);
                $('#edit-perawat-menerima-sore').val(data.perawat_menerima_sore);
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    // SORE
    function updateCatatanOperanSore(id_pendaftaran, id_layanan_pendaftaran, bed) {
        const formData = $('#form-edit-cop-sore').serializeArray();

        // Ubah ke objek data
        const dataObj = {};
        $.each(formData, function(_, field) {
            dataObj[field.name] = field.value;
        });

        // Tambahkan ID user yang mengedit
        dataObj['updated_by'] = userLoginId;

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/update_catatan_operan_sore") ?>',
            data: dataObj,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                console.log('User yang update:', userLoginId); // debug
                if (data.status) {
                    messageEditSuccess();
                    entriCatatanOperanPerawat(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }

                $('#modal-edit-cop-sore').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    // SORE
    function hapusCatatanPerawatSore(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary"
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        console.log('User yang hapus:', userLoginId); // debug
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_catatan_operan_sore") ?>/' + id,
                            data: {
                                deleted_by: userLoginId,
                                _method: 'DELETE'
                            },
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    obj.closest('tr').remove();
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

    // MALAM
    function tambahRencanaMalam() {
        if ($('#perawat-mengover-malam').val() === '') {
            syams_validation('#sperawat-mengover-malam', 'Perawat Harus Diisi!.');
            return false;
        }

        if ($('#perawat-menerima-malam').val() === '') {
            syams_validation('#perawat-menerima-malam', 'Perawat Harus Diisi!.');
            return false;
        }

        let html = '';
        let number = $('.number-rencana-malam').length;
        let dokter_dpjp_malam = $('#s2id_dokter-dpjp-malam a .select2c-chosen').html();
        let id_dokter_dpjp_malam = $('#id-dokter-dpjp-malam-hidden').val();
        let konsulen_malam = $('#s2id_konsulen-malam a .select2c-chosen').html();
        let id_konsulen_malam = $('#konsulen-malam').val();
        let tanggal_waktu_malam = $('#tanggal-waktu-malam').val();
        let diagnosa_keperawatan_malam = $('#diagnosa-keperawatan-malam').val();
        let infus_malam = $('#infus-malam').val();
        let rencana_tindakan_malam = $('#rencana-tindakan-malam').val();
        let perawat_mengover_malam = $('#s2id_perawat-mengover-malam a .select2c-chosen').html();
        let id_perawat_mengover_malam = $('#perawat-mengover-malam').val();
        let perawat_menerima_malam = $('#s2id_perawat-menerima-malam a .select2c-chosen').html();
        let id_perawat_menerima_malam = $('#perawat-menerima-malam').val();

        let accountGroup = "<?= $this->session->userdata('account_group') ?>";

        function tanggalWaktuMalamAja(waktu) {
            var el = waktu.split(' ');
            var tgl = el[0];
            return el[0] + ' ' + el[1];
        }

        function tanggalWaktuMalam(waktu) {
            var el = waktu.split(' ');
            var tgl = el[0];
            var s_tgl = tgl.split('/');
            var tm = el[1].split(':');
            return s_tgl[2] + '-' + s_tgl[1] + '-' + s_tgl[0] + ' ' + tm[0] + ':' + tm[1] + ':' + '00';
        }

        var kirim_tanggal_waktu_malam = tanggalWaktuMalam(tanggal_waktu_malam);
        var lihat_tanggal_waktu_malam = tanggalWaktuMalamAja(tanggal_waktu_malam);

        html = /* html */ `
            <tr>
                <td width="1%" class="number-pemasangan-alat" align="center">${++number}</td>
                <td width="2%" align="center"><input type="hidden" name="id_dokter_dpjp_malam[]" value="${id_dokter_dpjp_malam}">${dokter_dpjp_malam}</td>
                <td width="2%" align="center"><input type="hidden" name="konsulen_malam[]" value="${id_konsulen_malam}">${konsulen_malam}</td>
                <td width="2%" align="center"><input type="hidden" name="diagnosa_keperawatan_malam[]" value="${diagnosa_keperawatan_malam}">${diagnosa_keperawatan_malam}</td>
                <td width="1%" align="center"><input type="hidden" name="tanggal_waktu_malam[]" value="${kirim_tanggal_waktu_malam}">${lihat_tanggal_waktu_malam}</td>
                <td width="2%" align="center"><input type="hidden" name="rencana_tindakan_malam[]" value="${rencana_tindakan_malam}">${rencana_tindakan_malam}</td>          
                <td width="2%" align="center"><input type="hidden" name="infus_malam[]" value="${infus_malam}">${infus_malam}</td>
                <td width="2%" align="center"><input type="hidden" name="perawat_mengover_malam[]" value="${id_perawat_mengover_malam}">${perawat_mengover_malam}</td>
                <td width="2%" align="center"><input type="hidden" name="perawat_menerima_malam[]" value="${id_perawat_menerima_malam}">${perawat_menerima_malam}</td>
                

                <td width="2%" align="center">
                    <input type="hidden" name="user_input_catatan[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>

            </tr>
            
        `;
        $('#table-catatan-operan-perawat-malam tbody').append(html);

    }
    // <td width="2%" align="center"><input type="hidden" name="user_input_catatan[]" value="<!?= $this->session->userdata("id_translucent") ?>"><!?= $this->session->userdata("nama") ?></td>
    // <td width="1%" align="center">
    //     <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
    // </td>

    // MALAM 
    function showCatatanOperanPerawatMalam(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#table-catatan-operan-perawat-malam tbody').empty();
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";

        if (data !== null) {
            $.each(data, function(i, v) {

                function tanggalCOPMalam(waktu) {
                    var el = waktu.split(' ');
                    var elem_tgl = el[0].split('-');
                    var elem_waktu = el[1].split(':');
                    return `${elem_tgl[2]}/${elem_tgl[1]}/${elem_tgl[0]} ${elem_waktu[0]}:${elem_waktu[1]}`;
                }

                let selOpMalam = '';
                if (accountGroup === 'Admin') {
                    selOpMalam = `<td width="2%" align="center">${v.tanggal_waktu_malam ? tanggalCOPMalam(v.tanggal_waktu_malam) : ''}</td>`;
                } else {
                    selOpMalam = `<td width="2%" align="center">${v.tanggal_waktu_malam ? tanggalCOPMalam(v.tanggal_waktu_malam) : ''}</td>`;
                }

                // Variabel html hanya dideklarasikan sekali
                let html = /* html */ `
                    <tr>
                        <td width="1%" class="number-terapi" align="center">${(++i)}</td>
                        <td width="5%" align="center">${v.dpjp_utama_malam}</td>
                        <td width="5%" align="center">${v.konsulen_malam_g}</td>
                        <td width="20%">${v.diagnosa_keperawatan_malam || '-'}</td>
                        ${selOpMalam}
                        <td width="20%">${v.rencana_tindakan_malam || '-'}</td>
                        <td width="20%">${v.infus_malam || '-'}</td>
                        <td width="5%" align="center">${v.petugas_mengover_malam}</td>
                        <td width="5%" align="center">${v.petugas_menerima_malam}</td>
                        <td width="5%" align="center">
                            <button type="button" class="btn btn-danger btn-xs" onclick="hapusCatatanPerawatMalam(this, ${v.id})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <button type="button" class="btn btn-success btn-xs" onclick="editCatatanOperanMalam(this, ${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                `;
                $('#table-catatan-operan-perawat-malam tbody').append(html);
            });
        }
    }
    // <td width="5%" align="center">${v.akun_user}</td>

    // MALAM 
    function editCatatanOperanMalam(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        const modal = $('#modal-edit-cop-malam');
        $('#update-cop-malam').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_catatan_operan_malam") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-cop-malam').empty();
                $('#id-cop-malam').val(id);
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-cop-malam').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                    <button type="button" class="btn btn-info waves-effect" onclick="updateCatatanOperanMalam(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-cop-malam').append(cttntndkn);
                $('#s2id_edit-dokter-dpjp-malam a .select2c-chosen').html(data.dpjp_utama_malam); 
                $('#edit-dokter-dpjp-malam').val(data.dokter_dpjp_malam); 
                $('#s2id_edit-konsulen-malam a .select2c-chosen').html(data.konsulen_malam_g);
                $('#edit-konsulen-malam').val(data.konsulen_malam);
                $('#edit-tanggal-waktu-malam').val((data.tanggal_waktu_malam !== null ? datetimefmysql(data.tanggal_waktu_malam) : ''));   
                $('#edit-diagnosa-keperawatan-malam').val(data.diagnosa_keperawatan_malam);
                $('#edit-infus-malam').val(data.infus_malam);
                $('#edit-rencana-tindakan-malam').val(data.rencana_tindakan_malam);
                $('#s2id_edit-perawat-mengover-malam a .select2c-chosen').html(data.petugas_mengover_malam);
                $('#edit-perawat-mengover-malam').val(data.perawat_mengover_malam);
                $('#s2id_edit-perawat-menerima-malam a .select2c-chosen').html(data.petugas_menerima_malam);
                $('#edit-perawat-menerima-malam').val(data.perawat_menerima_malam);
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    // MALAM
    function updateCatatanOperanMalam(id_pendaftaran, id_layanan_pendaftaran, bed) {
        const formData = $('#form-edit-cop-malam').serializeArray();

        // Ubah ke objek data
        const dataObj = {};
        $.each(formData, function(_, field) {
            dataObj[field.name] = field.value;
        });

        // Tambahkan ID user yang mengedit
        dataObj['updated_by'] = userLoginId;

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/update_catatan_operan_malam") ?>',
            data: dataObj,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                console.log('User yang update:', userLoginId); // debug
                if (data.status) {
                    messageEditSuccess();
                    entriCatatanOperanPerawat(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }

                $('#modal-edit-cop-malam').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    // MALAM
    function hapusCatatanPerawatMalam(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary"
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        console.log('User yang hapus:', userLoginId); // debug
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_catatan_operan_malam") ?>/' + id,
                            data: {
                                deleted_by: userLoginId,
                                _method: 'DELETE'
                            },
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    obj.closest('tr').remove();
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

    // MCOP
    function resetFormentriCatatanOperanPerawat() {
        $('#form_entri_catatan_operan_perawat')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false); 
    }

    // MCOP 
    function konfirmasiSimpanEntriCatatanOperanPerawat() {
        swal.fire({
            title: 'Simpan Entri Keperawatan',
            text: "Apakah anda yakin akan menyimpan Form Catatan Operan Perawat?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanEntriCatatanOperanPerawat();
            }
        })     
    }

    function simpanEntriCatatanOperanPerawat() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_entri_catatan_operan_perawat") ?>',
            data: $('#form_entri_catatan_operan_perawat').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {

                        $('#wizard_form_resume').bwizard('show', data.respon.show);

                        if (data.respon.add_show !== undefined) {

                            $('#wizard-resume-group').bwizard('show', data.respon.add_show);

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
                        $('#modal_catatan_operan_perawat').modal('hide');
                        showListForm($('#ek-id-pendaftaran').val(), $('#ek_id_layanan_pendaftaran').val(), $('#ek_id_pasien').val());
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