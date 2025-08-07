<script>
    var nomer = 1;
    $(function() {

        nomer++;

        $('#ak_btn_expand_all').click(function() {
            $('.multi-collapse').addClass('show');
        });

        $('#ak_btn_collapse_all').click(function() {
            $('.multi-collapse').removeClass('show');
        });

        $('#ek-tanggal-mulai, #ek-tanggal-selesai, #ek-tanggal-mulai-edit, #ek-tanggal-selesai-edit')
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

        $('#jam-tindakan')
        .on('click', function() {
            $(this).timepicker({
                format: 'HH:mm',
                showInputs: false,
                showMeridian: false
            });
        })

        let tindakanDate = new Date();
        $('#ek-tanggal-tindakan-satu').datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: new Date(tindakanDate.getFullYear(), tindakanDate.getMonth() + 3, 0),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }

        });

        
        // $('#ek-tanggal-tindakan-satu').datetimepicker({
        //     format: 'DD/MM/YYYY',
        //     pickSecond: false,
        //     pick12HourFormat: false,
        //     maxDate: new Date(),
        //     beforeShow: function(i) {
        //         if ($(i).attr('readonly')) {
        //             return false
        //         }
        //     }
        // })

        // INI DIA
        // $('#ek-rencana-tindakan').select2c({
        //     ajax: {
        //         url: "<?= base_url('pelayanan/api/pelayanan/rencana_tindakan_keperawatan') ?>",
        //         dataType: 'json',
        //         quietMillis: 100,
        //         data: function(term, page) { // page is the one-based page number tracked by Select2
        //             return {
        //                 q: term, //search term
        //                 page: page, // page number

        //             };
        //         },
        //         results: function(data, page) {
        //             var more = (page * 20) < data
        //                 .total; // whether or not there are more results available

        //             // notice we return the value of more so Select2 knows if more results can be loaded
        //             return {
        //                 results: data.data,
        //                 more: more
        //             };
        //         }
        //     },
        //     formatResult: function(data) {
        //         var markup = data.nama;
        //         return markup;
        //     },
        //     formatSelection: function(data) {
        //         return data.nama;
        //     }
        // });

        $('#ek-rencana-tindakan').select2c({ // Inisialisasi Select2 untuk elemen dengan ID 'ek-rencana-tindakan'
            ajax: { // Konfigurasi pengambilan data melalui AJAX
                url: "<?= base_url('pelayanan/api/pelayanan/rencana_tindakan_keperawatan') ?>", // URL API untuk mengambil data
                dataType: 'json', // Format data yang diterima dari server
                quietMillis: 100, // Waktu tunda sebelum request dikirim ke server setelah user mengetik
                data: function(term, page) { // Fungsi untuk mengirim parameter pencarian dan halaman ke server
                    return {
                        q: term, // Kata kunci pencarian yang diketik user
                        page: page, // Nomor halaman yang diminta
                    };
                },
                results: function(data, page) { // Fungsi untuk memproses data dari server
                    var more = (page * 10) < data.total; // Mengecek apakah masih ada data lain yang bisa dimuat (pagination)

                    return {
                        results: data.data, // Menampilkan data hasil pencarian
                        more: more // Memberitahu Select2 apakah ada data tambahan
                    };
                }
            },
            formatResult: function(data) { // Fungsi untuk menampilkan setiap item di daftar hasil pencarian
                var markup = data.nama; // Mengambil properti 'nama' dari data yang diterima
                return markup;
            },
            formatSelection: function(data) { // Fungsi untuk menampilkan item yang dipilih di dalam input Select2
                return data.nama; // Menampilkan properti 'nama' dari item yang dipilih
            }
        });

        // INI DIA
        $('#ek-masalah-keperawatan, #ek-masalah-keperawatan-edit').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/masalah_keperawatan_auto') ?>",
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
                var markup = data.nama;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

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

    function lihatFORM_KEP_49_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        entriRencanaAsuhanKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_49_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        entriRencanaAsuhanKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_49_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        entriRencanaAsuhanKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriRencanaAsuhanKeperawatan(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

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
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_rencana_asuhan_keperawatan") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
    
                resetFormEntriRencanaAsuhanKeperawatan();
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

                if (typeof data.masalah_keperawatan !== 'undefined' | data.masalah_keperawatan !== null) {

                    showMasalahRawat(data.masalah_keperawatan, id_pendaftaran, id_layanan_pendaftaran, bed);

                } else {

                    $('#tabel-masalah-keperawatan tbody').empty();

                }

                if (typeof data.rencana_tindakan_keperawatan !== 'undefined' | data.rencana_tindakan_keperawatan !== null) {

                    showRencanaTindakanKeperawatan(data.rencana_tindakan_keperawatan, id_pendaftaran,
                        id_layanan_pendaftaran, bed);

                } else {

                    $('#tabel-ek-rencana-tindakan tbody').empty();

                }

                $('#ek_bed').text(bed);

                $('.ek-logo-pasien-alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.ek-logo-pasien-alergi').show();
                    }
                }

                $('#modal_rencana_asuhan_keperawatan').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

    function tambahDiagnosa() {
        if ($('#ek-masalah-keperawatan').val() === '') {
            syams_validation('#ek-masalah-keperawatan', 'Masalah Keperawatan harus diisi.');
            return false;
        }

        if ($('#ek-tanggal-mulai').val() === '') {
            syams_validation('#ek-tanggal-mulai', 'Tanggal mulai harus diisi.');
            return false;
        }

        let html = '';
        let number = $('.number-masalah').length;
        let tanggal_mulai = $('#ek-tanggal-mulai').val();
        let tanggal_selesai = $('#ek-tanggal-selesai').val();
        let ek_masalah_keperawatan = $('#s2id_ek-masalah-keperawatan a .select2c-chosen').html();
        let id_ek_masalah_keperawatan = $('#ek-masalah-keperawatan').val();
        let kirim_tanggal_selesai = '';
        let lihat_tanggal_selesai = '';

        function tanggalMasalahAja(waktu) {
            var el = waktu.split(' ');
            var tgl = el[0];
            return el[0] + ' ' + el[1];
        }

        function tanggalMasalah(waktu) {
            var el = waktu.split(' ');
            var tgl = el[0];
            var s_tgl = tgl.split('/');
            var tm = el[1].split(':');
            return s_tgl[2] + '-' + s_tgl[1] + '-' + s_tgl[0] + ' ' + tm[0] + ':' + tm[1] + ':' + '00';
        }

        var kirim_tanggal_mulai = tanggalMasalah(tanggal_mulai);
        var lihat_tanggal_mulai = tanggalMasalahAja(tanggal_mulai);

        if ($('#ek-tanggal-selesai').val() !== '') {

            kirim_tanggal_selesai = tanggalMasalah(tanggal_selesai);
            lihat_tanggal_selesai = tanggalMasalahAja(tanggal_selesai);

        } else {

            kirim_tanggal_selesai = '';
            lihat_tanggal_selesai = '';

        }

        html = /* html */ `
            <tr>
                <td width="1%" class="number-masalah" align="center">${++number}</td>
                <td width="5%"><input type="hidden" name="masalah_keperawatan[]" value="${id_ek_masalah_keperawatan}">${ek_masalah_keperawatan}</td>
                <td width="1%" align="center"><input type="hidden" name="tanggal_mulai[]" value="${kirim_tanggal_mulai}">${lihat_tanggal_mulai}</td>
                <td width="1%" align="center"><input type="hidden" name="tanggal_selesai[]" value="${kirim_tanggal_selesai}">${lihat_tanggal_selesai}</td>
                <td width="5%" align="center"><?= $this->session->userdata('nama') ?><input type="hidden" name="ek_operator_masalah[]" value="<?= $this->session->userdata("id_translucent") ?>"><input type="hidden" name="tanggal_masalah_dibuat[]" value="<?= date("Y-m-d H:i:s") ?>"></td>
                <td width="1%" align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            
        `;
        $('#tabel-masalah-keperawatan tbody').append(html);
    }

    function showMasalahRawat(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#tabel-masalah-keperawatan tbody').empty();
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";
        if (data !== null) {
            $.each(data, function(i, v) {

                function formatTanggalTertentu(waktu) {

                    var el = waktu.split(' ');
                    var elem_tgl = el[0].split('-');
                    var elem_waktu = el[1].split(':');
                    var tahun = elem_tgl[0];
                    var bulan = elem_tgl[1];
                    var hari = elem_tgl[2];
                    return hari + '/' + bulan + '/' + tahun + ' ' + elem_waktu[0] + ':' + elem_waktu[1];

                }

                let tanggal_mulai = v.tanggal_mulai;
                let tanggal_selesai = v.tanggal_selesai;

                let lihat_tanggal_mulai = formatTanggalTertentu(tanggal_mulai);

                let lihat_tanggal_selesai = '';

                if (tanggal_selesai !== null) {

                    lihat_tanggal_selesai = formatTanggalTertentu(tanggal_selesai);

                } else {

                    lihat_tanggal_selesai = '';

                }

                let html = /* html */ `
            <tr>
                <td width="1%" class="number-terapi" align="center">${(++i)}</td>
                <td width="5%" align="left">${v.masalah_keperawatan}</td>
                <td width="1%" align="center">${lihat_tanggal_mulai}</td>
                <td width="1%" align="center">${lihat_tanggal_selesai}</td>
                <td width="5%" align="center">${v.akun_user}</td>
                <td width="1%" align="center"><button type="button" class="btn btn-secondary btn-xs" onclick="editMasalahRawat(this, ${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-secondary btn-xs" onclick="hapusMasalahRawat(this, ${v.id})"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        `;
                $('#tabel-masalah-keperawatan tbody').append(html);
            })
        }
    }

    function hapusMasalahRawat(obj, id) {
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
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_masalah_rawat") ?>/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Kontrol Kembali', data.message);
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

    function editMasalahRawat(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_masalah_rawat") ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data !== null) {

                    $('#update-masalah-kprwtn').empty();
                    $('#id-masalah-rawat').val(id);

   

                    let mslhkprwtn = '';
                    mslhkprwtn =
                        `  <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                                <button type="button" class="btn btn-info waves-effect" onclick="updateMasalahKeperawatan(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                    $('#update-masalah-kprwtn').append(mslhkprwtn);

                    if (data.masalah_keperawatan === '') {
                        $('#s2id_ek-masalah-keperawatan-edit a .select2c-chosen').html();
                        $('#ek-masalah-keperawatan-edit').val();
                    } else {
                        $('#ek-masalah-keperawatan-edit').val(data.id_masalah);
                        $('#s2id_ek-masalah-keperawatan-edit a .select2c-chosen').html(data
                            .masalah_keperawatan);
                    }

                    function formatTanggalTertentu(waktu) {

                        var el = waktu.split(' ');
                        var elem_tgl = el[0].split('-');
                        var elem_waktu = el[1].split(':');
                        var tahun = elem_tgl[0];
                        var bulan = elem_tgl[1];
                        var hari = elem_tgl[2];
                        return hari + '/' + bulan + '/' + tahun + ' ' + elem_waktu[0] + ':' + elem_waktu[1];

                    }

                    var lihat_tanggal_mulai = formatTanggalTertentu(data.tanggal_mulai);

                    let lihat_tanggal_selesai = data.tanggal_selesai;

                    if (lihat_tanggal_selesai !== null) {

                        tanggal_selesai = formatTanggalTertentu(lihat_tanggal_selesai);

                    } else {

                        tanggal_selesai = '';

                    }

                    $('#ek-tanggal-mulai-edit').val(lihat_tanggal_mulai);
                    $('#ek-tanggal-selesai-edit').val(tanggal_selesai);

                    $('#modal-edit-masalah-rawat').modal('show');
                }
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function updateMasalahKeperawatan(id_pendaftaran, id_layanan_pendaftaran, bed) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_masalah_keperawatan") ?>',
            data: $('#form-edit-masalah-rawat').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriRencanaAsuhanKeperawatan(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }

                $('#modal-edit-masalah-rawat').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }


    function showRencanaTindakanKeperawatan(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#tabel-ek-rencana-tindakan tbody').empty();
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";
        if (data !== null) {
           
            $.each(data, function(i, v) {

                // function formatTanggalRencanaTIND(waktu) {
                //     var el = waktu.split(' ');
                //     var elem_tgl = el[0].split('-');
                //     var elem_waktu = el[1].split(':');
                //     var tahun = elem_tgl[0];
                //     var bulan = elem_tgl[1];
                //     var hari = elem_tgl[2];
                //     return hari + '/' + bulan + '/' + tahun + ' ' + elem_waktu[0] + ':' + elem_waktu[1];
                // }

                function formatWaktuSaja(waktu) {
                    // Pisahkan tanggal dan waktu menggunakan spasi
                    var el = waktu.split(' ');

                    // Ambil bagian waktu saja (jam, menit, detik)
                    var elem_waktu = el[1].split(':');

                    // Format waktu hanya jam dan menit
                    return elem_waktu[0] + ':' + elem_waktu[1];
                }

                // Contoh penggunaan
                var hasil = formatWaktuSaja('2024-11-19 14:35:45');
                console.log(hasil); // Output: 14:35


                function formatTanggalRTIND(waktu) {
                    var elem_tgl = waktu.split('-');
                    var tahun = elem_tgl[0];
                    var bulan = elem_tgl[1];
                    var hari = elem_tgl[2];
                    return hari + '/' + bulan + '/' + tahun;
                }

                let selOp = '';
                let ek_waktu_pagi = '';
                let ek_waktu_siang = '';
                let ek_waktu_malam = '';

                // if (v.ek_waktu_pagi === '1') {
                //     ek_waktu_pagi = '<span style="color: Navy;">(✔)</span>';
                // } else {
                //     ek_waktu_pagi = '';
                // }
                // if (v.ek_waktu_siang === '1') {

                //     ek_waktu_siang = '<span style="color: Purple;">(✔)</span>';
                // } else {
                //     ek_waktu_siang = '';
                // }
                // if (v.ek_waktu_malam === '1') {
                //     ek_waktu_malam = '<span style="color: Red;">(✔)</span>';
                // } else {
                //     ek_waktu_malam = '';
                // }



                if (v.ek_waktu_pagi === '1' || v.ek_waktu_pagi_dua === '1' || v.ek_waktu_pagi_tiga === '1') {
                    ek_waktu_pagi = '<span style="color: Navy;">(✔)</span>';
                } else {
                    ek_waktu_pagi = '';
                }

                if (v.ek_waktu_siang === '1' || v.ek_waktu_siang_dua === '1' || v.ek_waktu_siang_tiga === '1') {
                    ek_waktu_siang = '<span style="color: Purple;">(✔)</span>';
                } else {
                    ek_waktu_siang = '';
                }

                if (v.ek_waktu_malam === '1' || v.ek_waktu_malam_dua === '1' || v.ek_waktu_malam_tiga === '1') {
                    ek_waktu_malam = '<span style="color: Red;">(✔)</span>';
                } else {
                    ek_waktu_malam = '';
                }

                // <td width="1%" align="center">${v.jam_tindakan || "-"}</td>
                let html = /* html */ `
                    <tr>
                        <td width="1%" class="number-terapi" align="center">${(++i)}</td>
                        ${selOp}
                        <td width="1%">
                            ${v.jam_tindakan || (v.created_date ? formatWaktuSaja(v.created_date) : "-")}
                        </td>
                        <td width="1%" align="center">${datefmysql(v.tanggal_tindakan_satu)}</td>
                        <td width="7%" >${v.nama_tindakan}</td>
                        <td width="7%" >${v.rencana_tindakan_lainya || "-"}</td>
                        <td width="7%" >${v.keterangan || "-"}</td>
                        <td width="1%" align="center">${ek_waktu_pagi || "-"}</td>
                        <td width="1%" align="center">${ek_waktu_siang || "-"}</td>
                        <td width="1%" align="center">${ek_waktu_malam || "-"}</td>
                        <td width="5%" align="center">${v.akun_user}</td>
                        <td width="3%" align="center"><button type="button" class="btn btn-secondary btn-xs" onclick="hapusRencanaTindakan(this, ${v.id})"><i class="fas fa-trash-alt"></i></button></td>
                    </tr>
                `;
                $('#tabel-ek-rencana-tindakan tbody').append(html);
            })
        }
    }

  

    // <td width="1%" align="center">${v.jam_tindakan}</td>


    function hapusRencanaTindakan(obj, id) {
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
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_rencana_tindakan_keperawatan") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Rencana Tindakan Keperawatan', data.message);
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

    function resetFormEntriRencanaAsuhanKeperawatan() {
        // Reset semua input dalam form
        $('#form_entri_rencana_asuhan_keperawatan')[0].reset();
        $("input[type='checkbox']").prop('checked', false);
        $("input[type='radio']").prop('checked', false);
    }

    function konfirmasiSimpanRencanaAsuhanKeperawatan() {
        swal.fire({
            title: 'Simpan Entri Keperawatan',
            text: "Apakah anda yakin akan menyimpan Form Rencana Asuhan Keperawatan ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanRencanaAsuhanKeperawatan();
            }
        })    
    }

    function simpanRencanaAsuhanKeperawatan() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_entri_rencana_asuhan_keperawatan") ?>',
            data: $('#form_entri_rencana_asuhan_keperawatan').serialize(),
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
                        $('#modal_rencana_asuhan_keperawatan').modal('hide');
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

    function tambahRTINDK() {
        if ($('#ek-rencana-tindakan').val() === '') {
            syams_validation('#ek-rencana-tindakan', 'Rencana Tindakan harus diisi.');
            return false;
        }

        if ($('#ek-tanggal-tindakan-satu').val() === '') {
            syams_validation('#ek-tanggal-tindakan-satu', 'Tanggal Rencana Tindakan awal harus diisi.');
            return false;
        }

        if ($('#jam-tindakan').val() === '') {
            syams_validation('#jam-tindakan', 'Jam tindakan harus diisi.');
            return false;
        }

        let html = '';
        let number = $('.number-rcn-tindakan').length;
        let jam_tindakan = $('#jam-tindakan').val();
        let tanggal_tindakan_satu = $('#ek-tanggal-tindakan-satu').val();
        let ek_waktu_pagi = $('#ek-waktu-pagi').is(':checked');

        // let ek_waktu_malam = $('#ek-waktu-malam').is(':checked') || 
        //                     $('#ek-waktu-malam-dua').is(':checked') || 
        //                     $('#ek-waktu-malam-tiga').is(':checked');

        let ek_waktu_siang = $('#ek-waktu-siang').is(':checked');
        let ek_waktu_malam = $('#ek-waktu-malam').is(':checked');
        let ek_rencana_tindakan = $('#s2id_ek-rencana-tindakan a .select2c-chosen').html();
        let id_ek_rencana_tindakan = $('#ek-rencana-tindakan').val();
        let rencana_tindakan_lainya = $('#rencana-tindakan-lainya').val();
        let ek_keterangan_tambahan = $('#ek-keterangan-tambahan').val();
        let kirim_tanggal_selesai = '';
        let lihat_tanggal_selesai = '';
        let kirim_tanggal_tindakan_satu = '';
        let kirim_tanggal_tindakan_dua = '';
        let kirim_tanggal_tindakan_tiga = '';

        function tanggalRTIND(waktu) {
            var el = waktu.split('/');
            return el[2] + '-' + el[1] + '-' + el[0];
        }

        let ek_jadwal_pagi = '';
        let ek_val_pagi = '';
        if (ek_waktu_pagi === true) {
            ek_jadwal_pagi = '<span style="color: Navy;">(✔)</span>';
            ek_val_pagi = 1;
        } else {
            ek_jadwal_pagi = '';
            ek_val_pagi = 0;
        }

        let ek_jadwal_siang = '';
        let ek_val_siang = '';
        if (ek_waktu_siang === true) {
            ek_jadwal_siang = '<span style="color: Purple;">(✔)</span>';
            ek_val_siang = 1;
        } else {
            ek_jadwal_siang = '';
            ek_val_siang = 0;
        }

        let ek_jadwal_malam = '';
        let ek_val_malam = '';
        if (ek_waktu_malam === true) {
            ek_jadwal_malam = '<span style="color: Red;">(✔)</span>';
            ek_val_malam = 1;
        } else {
            ek_jadwal_malam = '';
            ek_val_malam = 0;
        }
        tanggal_tindakan_satu = tanggalRTIND(tanggal_tindakan_satu);

        let selOp = '';
        html = /* html */ `
            <tr>
                <td width="1%" class="number-rcn-tindakan" align="center">${++number}</td>
                ${selOp}
                <td width="1%" align="center"><input type="hidden" name="jam_tindakan[]" value="${jam_tindakan}">${jam_tindakan}</td>
                <td width="1%" align="center"><input type="hidden" name="tanggal_tindakan_satu[]" value="${tanggal_tindakan_satu}">${tanggal_tindakan_satu}</td>
                <td width="7%" align="center"><input type="hidden" name="rencana_tindakan_keperawatan[]" value="${id_ek_rencana_tindakan}">${ek_rencana_tindakan}</td>
                <td width="7%" align="center"><input type="hidden" name="rencana_tindakan_lainya[]" value="${rencana_tindakan_lainya}">${rencana_tindakan_lainya}</td>
                <td width="7%" align="center"><input type="hidden" name="ek_keterangan_tambahan[]" value="${ek_keterangan_tambahan}">${ek_keterangan_tambahan}</td>
                <td width="1%" align="center"><input type="hidden" name="ek_waktu_pagi[]" value="${ek_val_pagi}">${ek_jadwal_pagi}</td>
                <td width="1%" align="center"><input type="hidden" name="ek_waktu_siang[]" value="${ek_val_siang}">${ek_jadwal_siang}</td>
                <td width="1%" align="center"><input type="hidden" name="ek_waktu_malam[]" value="${ek_val_malam}">${ek_jadwal_malam}</td>
                <td width="5%" align="center"> <?= $this->session->userdata('nama') ?>
                    <input type="hidden" name="ek_operator_rencana_tindakan[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="tanggal_rencana_dibuat[]" value="<?= date("Y-m-d H:i:s") ?>"> 
                </td>

                <td width="1%" align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>           
        `;
        $('#tabel-ek-rencana-tindakan tbody').append(html);
    }
</script>

