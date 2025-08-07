<style>
  .btn-tooltip {
    position: relative;
    display: inline-block;
  }

  .tooltip-text {
    visibility: hidden;
    font-weight: bold;
    background-color: transparent;
    color: #000;
    text-shadow: 0 0 2px #fff;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    white-space: nowrap;
    z-index: 1000;
    pointer-events: none;
  }

  .btn-tooltip:hover .tooltip-text {
    visibility: visible;
  }

  .tooltip-left {
    right: 80%; /* Tooltip ke kiri */
    left: auto;
    text-align: right;
  }

  .tooltip-right {
    left: 100%; /* Tooltip ke kanan */
    right: auto;
    text-align: left;
  }
</style>
<!-- // CTKN -->
<script>
    // CTKN
    var userLoginId = <?= json_encode($this->session->userdata('nama')) ?>;
    var nomer = 1;
        nomer++;

    $("#wizard-resume-group").bwizard();


    $(function() {
        
        // TANGGAL DAN JAM 
        $('#ek-tanggal-catatan-tindakan, #ek-edit-tanggal-catatan-tindakan ')
            .datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });
        

        $('#ek-jam-pagi, #ek-jam-sore, #ek-jam-malam, #ek-edit-jam-pagi, #ek-edit-jam-sore, #ek-edit-jam-malam')
        .on('click', function() {
            $(this).timepicker({
                format: 'HH:mm',
                showInputs: false,
                showMeridian: false
            });
        })

        $('#ctk_btn_expand_all').click(function() {
            $('.multi-collapse').addClass('show');
        });


        $('#ctk_btn_collapse_all').click(function() {
            $('.multi-collapse').removeClass('show');
        });   

        // NAMA PERAWAT
        $('#ek-edit-perawat-tindakan-pagi, #ek-edit-perawat-tindakan-sore, #ek-edit-perawat-tindakan-malam, #ek-perawat-tindakan-pagi, #ek-perawat-tindakan-sore, #ek-perawat-tindakan-malam').select2c({
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
                return data.nama;
            }
        });

        // NAMA TINDAKAN
        $('#ek-catatan-tindakan, #ek-edit-catatan-tindakan').select2c({
            ajax: {
                url: "<?= base_url('pelayanan/api/pelayanan/catatan_tindakan_keperawatan') ?>",
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

    function lihatFORM_KEP_86a_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';
        catatanTindakanKeperawatanNursenote(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_86a_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';
        catatanTindakanKeperawatanNursenote(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_86a_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        catatanTindakanKeperawatanNursenote(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function catatanTindakanKeperawatanNursenote(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

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
            url: '<?= base_url("pelayanan/api/pelayanan/get_catatan_tindakan_keperawatan_nursenote") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                // console.log(data);
                resetFormCatatanTindakanKeperawatanNursenote();
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

                if (typeof data.catatan_tindakan_keperawatan_nursenote !== 'undefined' | data.catatan_tindakan_keperawatan_nursenote !== null) {

                    showCatatanTindakanKeperawatanNursenote(data.catatan_tindakan_keperawatan_nursenote, id_pendaftaran, id_layanan_pendaftaran, bed, action);

                } else {

                    $('#tabel-catatan-tindakan-keperawatan tbody').empty();

                }

                $('#ek_bed').text(bed);

                $('.ek-logo-pasien-alergi').hide();
                if (data.profil !== null) {
                    if (data.profil.is_alergi == 'Ya') {
                        $('.ek-logo-pasien-alergi').show();
                    }
                }

                if (action === 'lihat') {
                    // Disable semua input dan textarea, tapi biarkan tombol expand/collapse tetap aktif
                    $('#modal_nurse_note :input')
                        .not('[data-dismiss="modal"], #ctk_btn_expand_all, #ctk_btn_collapse_all')
                        .prop('disabled', true);

                    $('#modal_nurse_note textarea').prop('readonly', true);
                    $('#btn-simpan').hide();

                    // Disable select dan Select2
                    $('#modal_nurse_note select')
                        .not('[data-dismiss="modal"]')
                        .prop('disabled', true)
                        .trigger('change.select2c');

                    $('#modal_nurse_note [id^="s2id_"]').css({
                        'pointer-events': 'none',
                        'opacity': 0.6
                    });
                }

                $('#modal_nurse_note').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

    // JANGAN DI HAPUS KALAU PAKAI YANG INI TANGGALNYA YANG BARU PALING BAWAH
    // function showCatatanTindakanKeperawatanNursenote(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {
    //     $('#tabel-catatan-tindakan-keperawatan tbody').empty(); 
    //     if (data !== null) {

    //         $('#tindakan-manual').attr('hidden', true);

    //         $('#ek-cek-tindakan-manual').on('change', function() {

    //             if ($('#ek-cek-tindakan-manual').prop('checked')) {
    //                 $('#s2id_ek-catatan-tindakan a .select2c-chosen').empty();
    //                 $('#ek-catatan-tindakan').val('');
    //                 $('#tindakan-manual').removeAttr('hidden');
    //                 $('#catatan-tindakan').attr('hidden', true);
    //             } else {
    //                 $('#ek-catatan-tindakan-manual').val('');
    //                 $('#catatan-tindakan').removeAttr('hidden');
    //                 $('#tindakan-manual').attr('hidden', true);
    //             }
    //         });

    //         $.each(data, function(i, v) {         
    //             const selOp = `
    //                 <td align="center">
    //                     <button type="button" class="btn btn-success btn-xs btn-tooltip" onclick="editCatatanTindakan(this, ${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')">
    //                         <i class="fas fa-edit" style="color:rgb(39, 44, 49);"></i>
    //                         <span class="tooltip-text tooltip-left">Edit</span>
    //                     </button>
    //                     <button type="button" class="btn btn-danger btn-xs btn-tooltip" onclick="hapusCatatanTindakan(this, ${v.id})">
    //                         <i class="fas fa-trash-alt" style="color:rgb(39, 44, 49);"></i>
    //                         <span class="tooltip-text tooltip-right">Hapus</span>
    //                     </button>
    //                 </td>
    //             `;
    //             let html = /* html */ `
    //                 <tr>
    //                     <td width="1%" class="number-terapi" align="center">${(++i)}</td>
    //                     <td width="8%" align="left">${v.nama_tindakan == null ? v.ek_catatan_tindakan_keperawatan_manual : v.nama_tindakan}</td>   
    //                     <td align="center">${v.ek_keterangan_catatan || '-'}</td>
    //                     <td class="center">${datefmysql(v.ek_tanggal_catatan_tindakan)}</td>

    //                     <td align="center">${v.ek_bismillah_pagi == '1' ? '<span style="color: navy;">✔</span>' : ''}</td>
    //                     <td align="center">${v.ek_cek_pagi == '1' ? '<span style="color: navy;">✔</span>' : ''}</td>
    //                     <td align="center">${v.ek_jam_pagi || ''}</td>
    //                     <td align="center">${v.ek_paraf_pagi == '1' ? '<span style="color: navy;">✔</span>' : ''}</td>
    //                     <td align="center">${v.ek_perawat_tindakan_pagi === '442' ? '' : v.perawat_pagi || ''}</td>
    //                     <td align="center">${v.ek_hamdalah_pagi == '1' ? '<span style="color: navy;">✔</span>' : ''}</td>

    //                     <td align="center">${v.ek_bismillah_sore == '1' ? '<span style="color: purple;">✔</span>' : ''}</td>
    //                     <td align="center">${v.ek_cek_sore == '1' ? '<span style="color: purple;">✔</span>' : ''}</td>
    //                     <td align="center">${v.ek_jam_sore || ''}</td>
    //                     <td align="center">${v.ek_paraf_sore == '1' ? '<span style="color: purple;">✔</span>' : ''}</td>
    //                     <td align="center">${v.ek_perawat_tindakan_sore === '442' ? '' : v.perawat_sore || ''}</td>
    //                     <td align="center">${v.ek_hamdalah_sore == '1' ? '<span style="color: purple;">✔</span>' : ''}</td>

    //                     <td align="center">${v.ek_bismillah_malam == '1' ? '<span style="color: red;">✔</span>' : ''}</td>
    //                     <td align="center">${v.ek_cek_malam == '1' ? '<span style="color: red;">✔</span>' : ''}</td>
    //                     <td align="center">${v.ek_jam_malam || ''}</td>
    //                     <td align="center">${v.ek_paraf_malam == '1' ? '<span style="color: red;">✔</span>' : ''}</td>
    //                     <td align="center">${v.ek_perawat_tindakan_malam === '442' ? '' : v.perawat_malam || ''}</td>
    //                     <td align="center">${v.ek_hamdalah_malam == '1' ? '<span style="color: red;">✔</span>' : ''}</td>
    //                     ${selOp}
    //                 </tr>
    //             `;
    //             $('#tabel-catatan-tindakan-keperawatan tbody').append(html);
    //             numberNote = i;
    //         })
    //     }
    // }


    function formatJamTampil(jam) {
        if (!jam) return '';
        const parts = jam.split(':');
        if (parts.length === 3) {
            const [h, m, s] = parts;
            if (s === '00') {
                return `${h}:${m}`; // detik 00 → tampil jam & menit aja
            } else {
                return `${h}:${m}:${s}`; // kalau ada detiknya → tampil semua
            }
        }
        return jam; // fallback kalau format aneh
    }

    // <td align="center">${v.ek_jam_pagi || ''}</td>
    function showCatatanTindakanKeperawatanNursenote(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#tabel-catatan-tindakan-keperawatan tbody').empty(); 
        if (data !== null) {

            // 🔁 Balik urutan data biar yang terbaru di atas
            data.reverse();

            $('#tindakan-manual').attr('hidden', true);

            $('#ek-cek-tindakan-manual').on('change', function() {
                if ($('#ek-cek-tindakan-manual').prop('checked')) {
                    $('#s2id_ek-catatan-tindakan a .select2c-chosen').empty();
                    $('#ek-catatan-tindakan').val('');
                    $('#tindakan-manual').removeAttr('hidden');
                    $('#catatan-tindakan').attr('hidden', true);
                } else {
                    $('#ek-catatan-tindakan-manual').val('');
                    $('#catatan-tindakan').removeAttr('hidden');
                    $('#tindakan-manual').attr('hidden', true);
                }
            });

            $.each(data, function(i, v) {         
                const selOp = `
                    <td align="center">
                        <button type="button" class="btn btn-success btn-xs btn-tooltip" onclick="editCatatanTindakan(this, ${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')">
                            <i class="fas fa-edit" style="color:rgb(39, 44, 49);"></i>
                            <span class="tooltip-text tooltip-left">Edit</span>
                        </button>
                        <button type="button" class="btn btn-danger btn-xs btn-tooltip" onclick="hapusCatatanTindakan(this, ${v.id})">
                            <i class="fas fa-trash-alt" style="color:rgb(39, 44, 49);"></i>
                            <span class="tooltip-text tooltip-right">Hapus</span>
                        </button>
                    </td>
                `;
                let html = /* html */ `
                    <tr>
                        <td width="1%" class="number-terapi" align="center">${(++i)}</td>
                        <td width="8%" align="left">${v.nama_tindakan == null ? v.ek_catatan_tindakan_keperawatan_manual : v.nama_tindakan}</td>   
                        <td align="center">${v.ek_keterangan_catatan || '-'}</td>
                        <td class="center">${datefmysql(v.ek_tanggal_catatan_tindakan)}</td>

                        <td align="center">${v.ek_bismillah_pagi == '1' ? '<span style="color: navy;">✔</span>' : ''}</td>
                        <td align="center">${v.ek_cek_pagi == '1' ? '<span style="color: navy;">✔</span>' : ''}</td>
                        <td align="center">${formatJamTampil(v.ek_jam_pagi)}</td>
                        <td align="center">${v.ek_paraf_pagi == '1' ? '<span style="color: navy;">✔</span>' : ''}</td>
                        <td align="center">${v.ek_perawat_tindakan_pagi === '442' ? '' : v.perawat_pagi || ''}</td>
                        <td align="center">${v.ek_hamdalah_pagi == '1' ? '<span style="color: navy;">✔</span>' : ''}</td>

                        <td align="center">${v.ek_bismillah_sore == '1' ? '<span style="color: purple;">✔</span>' : ''}</td>
                        <td align="center">${v.ek_cek_sore == '1' ? '<span style="color: purple;">✔</span>' : ''}</td>
                        <td align="center">${formatJamTampil(v.ek_jam_sore)}</td>
                        <td align="center">${v.ek_paraf_sore == '1' ? '<span style="color: purple;">✔</span>' : ''}</td>
                        <td align="center">${v.ek_perawat_tindakan_sore === '442' ? '' : v.perawat_sore || ''}</td>
                        <td align="center">${v.ek_hamdalah_sore == '1' ? '<span style="color: purple;">✔</span>' : ''}</td>

                        <td align="center">${v.ek_bismillah_malam == '1' ? '<span style="color: red;">✔</span>' : ''}</td>
                        <td align="center">${v.ek_cek_malam == '1' ? '<span style="color: red;">✔</span>' : ''}</td>
                        <td align="center">${formatJamTampil(v.ek_jam_malam)}</td>
                        <td align="center">${v.ek_paraf_malam == '1' ? '<span style="color: red;">✔</span>' : ''}</td>
                        <td align="center">${v.ek_perawat_tindakan_malam === '442' ? '' : v.perawat_malam || ''}</td>
                        <td align="center">${v.ek_hamdalah_malam == '1' ? '<span style="color: red;">✔</span>' : ''}</td>
                        ${selOp}
                    </tr>
                `;
                $('#tabel-catatan-tindakan-keperawatan tbody').append(html);
                numberNote = i;
            });
        }
    }

    function resetFormCatatanTindakanKeperawatanNursenote() {
        // Reset semua input dalam form
        $('#form_entri_catatan_tindakan_keperawatan_nursenote')[0].reset();
        $("input[type='checkbox']").prop('checked', false);
        $("input[type='radio']").prop('checked', false);
        
        // Reset nilai input teks
        $('#ek-keterangan-catatan').val('');
        $('#ek-jam-pagi').val('');
        $('#ek-jam-sore').val('');
        $('#ek-jam-malam').val('');
        $('#ek-catatan-tindakan').val('').trigger('change'); // Menggunakan trigger 'change' untuk Select2
        $('#ek-perawat-tindakan-pagi').val('').trigger('change'); // Reset Select2
        $('#ek-perawat-tindakan-sore').val('').trigger('change'); // Reset Select2
        // $('#ek-perawat-tindakan-malam').val('').trigger('change'); // Reset Select2
        $('#ek-tanggal-catatan-tindakan').val('');

        // Reset checkbox dan textarea untuk tindakan manual
        $('#ek-cek-tindakan-manual').prop('checked', false);
        $('#ek-catatan-tindakan-manual').val('');

        // Atur visibilitas elemen berdasarkan checkbox ek-cek-tindakan-manual
        if ($('#ek-cek-tindakan-manual').prop('checked')) {
            $('#tindakan-manual').prop('hidden', false);
            $('#catatan-tindakan').prop('hidden', true);
        } else {
            $('#catatan-tindakan').prop('hidden', false);
            $('#tindakan-manual').prop('hidden', true);
        }
    }

    function editCatatanTindakan(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        const modal = $('#modal-edit-catatan-tindakan');
        $('#update-catatan-tdkn').children().remove();

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_catatan_tindakan_keperawatan") ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function (data) {
                $('#update-catatan-tdkn').empty();
                $('#id-catatan-tindakan').val(id);

                function formatJamTanpaDetik(jam) {
                    if (!jam) return '';
                    const parts = jam.split(':');
                    return parts.length >= 2 ? `${parts[0]}:${parts[1]}` : jam;
                }

                function formatTanggalKhusus(waktu) {
                    const el = waktu.split('-');
                    return el[2] + '/' + el[1] + '/' + el[0];
                }

                const edit_tanggal_tindakan = formatTanggalKhusus(data.ek_tanggal_catatan_tindakan);
                $('#ek-edit-tanggal-catatan-tindakan').val(edit_tanggal_tindakan);

                let tombol = `
                    <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-catatan-tindakan').modal('hide');">
                        <i class="fas fa-times-circle mr-1"></i>Tutup
                    </button>
                    <button type="button" class="btn btn-info waves-effect" onclick="updateCatatanTindakanKeperawatan(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')">
                        <i class="fas fa-save mr-1"></i>Update
                    </button>`;
                $('#update-catatan-tdkn').append(tombol);

                $('#edit-catatan-tindakan').removeAttr('hidden');
                $('#edit-tindakan-manual').removeAttr('hidden');

                // Tentukan apakah pakai input manual atau dari select2
                if (data.ek_catatan_tindakan_keperawatan === null || data.ek_catatan_tindakan_keperawatan === '') {
                    // Manual aktif
                    $('#edit-catatan-tindakan').attr('hidden', true);
                    $('#ek-edit-catatan-tindakan').val('');
                    $('#s2id_ek-edit-catatan-tindakan a .select2c-chosen').html('');
                    $('#ek-edit-catatan-tindakan-manual').val(data.ek_catatan_tindakan_keperawatan_manual);
                    $('#ek-edit-cek-tindakan-manual').prop('checked', true);
                } else {
                    // Select aktif
                    $('#edit-tindakan-manual').attr('hidden', true);
                    $('#ek-edit-catatan-tindakan').val(data.ek_catatan_tindakan_keperawatan);
                    $('#s2id_ek-edit-catatan-tindakan a .select2c-chosen').html(data.nama_tindakan);
                    $('#ek-edit-catatan-tindakan-manual').val('');
                    $('#ek-edit-cek-tindakan-manual').prop('checked', false);
                }

                // Toggle manual/select saat diubah
                $('#ek-edit-cek-tindakan-manual').on('change', function () {
                    const checked = $(this).is(':checked');
                    if (checked) {
                        $('#ek-edit-catatan-tindakan').val('');
                        $('#s2id_ek-edit-catatan-tindakan a .select2c-chosen').html('');
                        $('#edit-tindakan-manual').removeAttr('hidden');
                        $('#edit-catatan-tindakan').attr('hidden', true);
                    } else {
                        $('#ek-edit-catatan-tindakan-manual').val('');
                        $('#ek-edit-catatan-tindakan').val(data.ek_catatan_tindakan_keperawatan);
                        $('#s2id_ek-edit-catatan-tindakan a .select2c-chosen').html(data.nama_tindakan);
                        $('#edit-catatan-tindakan').removeAttr('hidden');
                        $('#edit-tindakan-manual').attr('hidden', true);
                    }
                });

                syams_validation_remove('#ek-edit-catatan-tindakan-manual');
                syams_validation_remove('#ek-edit-catatan-tindakan');

                // Isi perawat
                $('#ek-edit-perawat-tindakan-pagi').val(data.ek_perawat_tindakan_pagi);
                $('#s2id_ek-edit-perawat-tindakan-pagi a .select2c-chosen').html(data.perawat_pagi);
                $('#ek-edit-perawat-tindakan-sore').val(data.ek_perawat_tindakan_sore);
                $('#s2id_ek-edit-perawat-tindakan-sore a .select2c-chosen').html(data.perawat_sore);
                $('#ek-edit-perawat-tindakan-malam').val(data.ek_perawat_tindakan_malam);
                $('#s2id_ek-edit-perawat-tindakan-malam a .select2c-chosen').html(data.perawat_malam);

                // Lain-lain
                $('#ek-edit-keterangan-catatan').val(data.ek_keterangan_catatan);
                // $('#ek-edit-jam-pagi').val(data.ek_jam_pagi);
                // $('#ek-edit-jam-sore').val(data.ek_jam_sore);
                // $('#ek-edit-jam-malam').val(data.ek_jam_malam);

                $('#ek-edit-jam-pagi').val(formatJamTanpaDetik(data.ek_jam_pagi));
                $('#ek-edit-jam-sore').val(formatJamTanpaDetik(data.ek_jam_sore));
                $('#ek-edit-jam-malam').val(formatJamTanpaDetik(data.ek_jam_malam));


                // PAGI
                $('#ek-edit-bismillah-pagi').prop('checked', data.ek_bismillah_pagi == 1);
                $('#ek-edit-cek-pagi').prop('checked', data.ek_cek_pagi == 1);
                $('#ek-edit-paraf-pagi').prop('checked', data.ek_paraf_pagi == 1);
                $('#ek-edit-hamdalah-pagi').prop('checked', data.ek_hamdalah_pagi == 1);

                // SORE
                $('#ek-edit-bismillah-sore').prop('checked', data.ek_bismillah_sore == 1);
                $('#ek-edit-cek-sore').prop('checked', data.ek_cek_sore == 1);
                $('#ek-edit-paraf-sore').prop('checked', data.ek_paraf_sore == 1);
                $('#ek-edit-hamdalah-sore').prop('checked', data.ek_hamdalah_sore == 1);

                // MALAM
                $('#ek-edit-bismillah-malam').prop('checked', data.ek_bismillah_malam == 1);
                $('#ek-edit-cek-malam').prop('checked', data.ek_cek_malam == 1);
                $('#ek-edit-paraf-malam').prop('checked', data.ek_paraf_malam == 1);
                $('#ek-edit-hamdalah-malam').prop('checked', data.ek_hamdalah_malam == 1);

                modal.modal('show');
            },
            error: function (e) {
                accessFailed(e.status);
            }
        });
    }

    if (typeof numberNote === 'undefined') {
        var numberNote = 1;
    }

    function resetNomorCatatanTindakan() {
        $('.number-cttn-tindakan').each(function(index) {
            $(this).text(index + 1);
        });
    }

    function hapusBarisIni(btn) {
        $(btn).closest('tr').remove();
        resetNomorCatatanTindakan();
    }

    function tambahCatatanTindakan() {
        if ($('#ek-cek-tindakan-manual').prop('checked')) {
            if ($('#ek-catatan-tindakan-manual').val() === '') {
                syams_validation('#ek-catatan-tindakan-manual', 'Catatan Tindakan manual harus diisi.');
                return false;
            }
        } else {
            if ($('#ek-catatan-tindakan').val() === '') {
                syams_validation('#ek-catatan-tindakan', 'Catatan Tindakan harus dipilih.');
                return false;
            }
        }

        if ($('#ek-tanggal-catatan-tindakan').val() === '') {
            syams_validation('#ek-tanggal-catatan-tindakan', 'Tanggal Catatan Tindakan harus diisi.');
            return false;
        }

        let html = '';
        let number = $('.number-cttn-tindakan').length + 1; // Penomoran otomatis urut

        let ek_catatan_tindakan = $('#s2id_ek-catatan-tindakan a .select2c-chosen').html();
        let id_ek_catatan_tindakan = $('#ek-catatan-tindakan').val();
        let ek_catatan_tindakan_manual = $('#ek-catatan-tindakan-manual').val();
        let ek_keterangan_catatan = $('#ek-keterangan-catatan').val();
        let ek_tanggal_catatan_tindakan = $('#ek-tanggal-catatan-tindakan').val();

        let ek_bismillah_pagi = $('#ek-bismillah-pagi').is(':checked');
        let ek_cek_pagi = $('#ek-cek-pagi').is(':checked');
        let ek_jam_pagi = $('#ek-jam-pagi').val();
        let ek_paraf_pagi = $('#ek-paraf-pagi').is(':checked');
        let ek_hamdalah_pagi = $('#ek-hamdalah-pagi').is(':checked');
        let ek_perawat_tindakan_pagi = $('#s2id_ek-perawat-tindakan-pagi a .select2c-chosen').html();
        let perawat_pagi = $('#ek-perawat-tindakan-pagi').val();

        let ek_bismillah_sore = $('#ek-bismillah-sore').is(':checked');
        let ek_cek_sore = $('#ek-cek-sore').is(':checked');
        let ek_jam_sore = $('#ek-jam-sore').val();
        let ek_paraf_sore = $('#ek-paraf-sore').is(':checked');
        let ek_hamdalah_sore = $('#ek-hamdalah-sore').is(':checked');
        let ek_perawat_tindakan_sore = $('#s2id_ek-perawat-tindakan-sore a .select2c-chosen').html();
        let perawat_sore = $('#ek-perawat-tindakan-sore').val();

        let ek_bismillah_malam = $('#ek-bismillah-malam').is(':checked');
        let ek_cek_malam = $('#ek-cek-malam').is(':checked');
        let ek_jam_malam = $('#ek-jam-malam').val();
        let ek_paraf_malam = $('#ek-paraf-malam').is(':checked');
        let ek_hamdalah_malam = $('#ek-hamdalah-malam').is(':checked');
        let ek_perawat_tindakan_malam = $('#s2id_ek-perawat-tindakan-malam a .select2c-chosen').html();
        let perawat_malam = $('#ek-perawat-tindakan-malam').val();

        let catatan_tindakan = $('#ek-cek-tindakan-manual').prop('checked')
            ? `<td width="5%" align="left">${ek_catatan_tindakan_manual}</td>`
            : `<td width="5%" align="left">${ek_catatan_tindakan}</td>`;

        html = `
            <tr>
                <td width="1%" class="number-cttn-tindakan" align="center">${number}</td>
                <input type="hidden" name="ek_catatan_tindakan_keperawatan_manual[]" value="${ek_catatan_tindakan_manual}">
                <input type="hidden" name="ek_catatan_tindakan_keperawatan[]" value="${id_ek_catatan_tindakan}">
                ${catatan_tindakan}
                <input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
                <input type="hidden" name="pengkajian_date_tindakan[]" value="<?= date("Y-m-d H:i:s") ?>">

                <td align="left"><input type="hidden" name="ek_keterangan_catatan[]" value="${ek_keterangan_catatan}">${ek_keterangan_catatan}</td>
                <td align="center"><input type="hidden" name="ek_tanggal_catatan_tindakan[]" value="${ek_tanggal_catatan_tindakan}">${ek_tanggal_catatan_tindakan}</td>

                <td align="center"><input type="hidden" name="ek_bismillah_pagi[]" value="${ek_bismillah_pagi}">${ek_bismillah_pagi ? '✔' : ''}</td>
                <td align="center"><input type="hidden" name="ek_cek_pagi[]" value="${ek_cek_pagi}">${ek_cek_pagi ? '✔' : ''}</td>
                <td align="center"><input type="hidden" name="ek_jam_pagi[]" value="${ek_jam_pagi}">${ek_jam_pagi}</td>
                <td align="center"><input type="hidden" name="ek_paraf_pagi[]" value="${ek_paraf_pagi}">${ek_paraf_pagi ? '✔' : ''}</td>
                <td align="center"><input type="hidden" name="ek_perawat_tindakan_pagi[]" value="${perawat_pagi}">${ek_perawat_tindakan_pagi}</td>
                <td align="center"><input type="hidden" name="ek_hamdalah_pagi[]" value="${ek_hamdalah_pagi}">${ek_hamdalah_pagi ? '✔' : ''}</td>

                <td align="center"><input type="hidden" name="ek_bismillah_sore[]" value="${ek_bismillah_sore}">${ek_bismillah_sore ? '✔' : ''}</td>
                <td align="center"><input type="hidden" name="ek_cek_sore[]" value="${ek_cek_sore}">${ek_cek_sore ? '✔' : ''}</td>
                <td align="center"><input type="hidden" name="ek_jam_sore[]" value="${ek_jam_sore}">${ek_jam_sore}</td>
                <td align="center"><input type="hidden" name="ek_paraf_sore[]" value="${ek_paraf_sore}">${ek_paraf_sore ? '✔' : ''}</td>
                <td align="center"><input type="hidden" name="ek_perawat_tindakan_sore[]" value="${perawat_sore}">${ek_perawat_tindakan_sore}</td>
                <td align="center"><input type="hidden" name="ek_hamdalah_sore[]" value="${ek_hamdalah_sore}">${ek_hamdalah_sore ? '✔' : ''}</td>

                <td align="center"><input type="hidden" name="ek_bismillah_malam[]" value="${ek_bismillah_malam}">${ek_bismillah_malam ? '✔' : ''}</td>
                <td align="center"><input type="hidden" name="ek_cek_malam[]" value="${ek_cek_malam}">${ek_cek_malam ? '✔' : ''}</td>
                <td align="center"><input type="hidden" name="ek_jam_malam[]" value="${ek_jam_malam}">${ek_jam_malam}</td>
                <td align="center"><input type="hidden" name="ek_paraf_malam[]" value="${ek_paraf_malam}">${ek_paraf_malam ? '✔' : ''}</td>
                <td align="center"><input type="hidden" name="ek_perawat_tindakan_malam[]" value="${perawat_malam}">${ek_perawat_tindakan_malam}</td>
                <td align="center"><input type="hidden" name="ek_hamdalah_malam[]" value="${ek_hamdalah_malam}">${ek_hamdalah_malam ? '✔' : ''}</td>

                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="hapusBarisIni(this)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        `;

        $('#tabel-catatan-tindakan-keperawatan tbody').append(html);
        resetNomorCatatanTindakan(); // supaya nomor selalu urut
    }

    function konfirmasiSimpanCatatanTindakanKeperawatanNursenote() {
        swal.fire({
            title: 'Simpan Entri Keperawatan',
            text: "Apakah anda yakin akan menyimpan Catatan Tindakan Keperawatan / Nurse Note Ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanCatatanTindakanKeperawatanNursenote();
            }
        })   
    }

    function simpanCatatanTindakanKeperawatanNursenote() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_catatan_tindakan_keperawatan_nursenote") ?>',
            data: $('#form_entri_catatan_tindakan_keperawatan_nursenote').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {

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
                        $('#modal_nurse_note').modal('hide');
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

    function updateCatatanTindakanKeperawatan(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        const formData = $('#form-edit-catatan-tindakan').serializeArray();

        // Ubah ke objek data
        const dataObj = {};
        $.each(formData, function(_, field) {
            dataObj[field.name] = field.value;
        });

        // Tambahkan ID user yang mengedit
        dataObj['updated_by'] = userLoginId;

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/update_catatan_tindakan_keperawatan") ?>',
            data: dataObj,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                console.log('User yang update:', userLoginId); // debug
                if (data.status) {
                    messageEditSuccess();
                    catatanTindakanKeperawatanNursenote(id_pendaftaran, id_layanan_pendaftaran, bed, action);
                } else {
                    messageEditFailed();
                }

                $('#modal-edit-catatan-tindakan').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function hapusCatatanTindakan(obj, id) {
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
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_catatan_tindakan_keperawatan") ?>/' + id,
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

</script>