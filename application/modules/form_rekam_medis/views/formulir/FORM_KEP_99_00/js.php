<style>
  .btn-action {
    color: white;
    border: none;
    padding: 4px 8px;
    margin: 2px;
    border-radius: 6px;
    font-size: 12px;
    transition: transform 0.15s ease, box-shadow 0.15s ease;
  }

  .btn-action:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.25);
  }

  .btn-action:active {
    transform: scale(0.95);
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
  }

  .btn-edit {
    background-color: #28a745; /* Hijau */
  }

  .btn-edit:hover {
    background-color: #218838;
  }

  .btn-hapus {
    background-color: #ffc107; /* Kuning */
    color: red;
  }

  .btn-hapus:hover {
    background-color: #e0a800;
    color: red;
  }
</style>




<script>
    var nomer = 1;
    $(function() {
        nomer++;
        // DPJP 
        $('#tanggal-mulai-dpjp, #edit-tanggal-mulai-dpjp, #tanggal-mulai-dpjp-utama, #edit-tanggal-mulai-dpjp-utama, #tanggal-akhir-dpjp, #edit-tanggal-akhir-dpjp, #tanggal-akhir-dpjp-utama, #edit-tanggal-akhir-dpjp-utama')
        .datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

        function getNoBed(id_kamar) {
            $.ajax({
                type: 'GET',
                url: '<?= base_url("bed/api/bed/get_no_bed") ?>/' + id_kamar,
                cache: false,
                dataType: 'JSON',
                success: function(data) {
                    if (data !== null) {
                        $('#no-bed').val(data.no_bed);
                    } else {
                        $('#no-bed').val('');
                    }

                    syams_validation_remove('#no-bed');
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            });
        }

        // DPJP
        $('#nama-dokter-dpjp, #edit-nama-dokter-dpjp').select2c({
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
                $('#id_dokter_dpjp_pra_bedah').val(data.id);
                return data.nama;
            }
        });

        // DPJP
        $('#nama-dokter-dpjp-utama, #edit-nama-dokter-dpjp-utama').select2c({
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
                $('#id_dokter_dpjp_pra_bedah').val(data.id);
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

    function lihatFORM_KEP_99_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        entriDaftarDpjp(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_99_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        entriDaftarDpjp(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_99_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        entriDaftarDpjp(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriDaftarDpjp(id_pendaftaran, id_layanan_pendaftaran, bed, action) {
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
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_dokter_penangung_jawab_pasien") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function () {
                showLoader()
            },
            success: function (data) {
                resetFormEntriDpjp();
                $('#ek_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#ek-id-pendaftaran').val(id_pendaftaran);
                $('#ek-id-bed').val(bed);

                if (data.pasien !== null) {
                    $('#ek_id_pasien').val(data.pasien.id_pasien);
                    $('#ek_pasien_nama').text(data.pasien.nama);
                    $('#ek_pasien_no_rm').text(data.pasien.no_rm);
                    $('#ek_pasien_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#ek_pasien_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));

                    if (data.pasien.alergi !== null) {
                        $('#ek_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true);
                    }
                    $('#ek_pasien_alamat').text(data.pasien.alamat);
                }

                if (typeof data.daftar_dokter_dpjp !== 'undefined' || data.daftar_dokter_dpjp !== null) {
                    showDaftarDPJP(data.daftar_dokter_dpjp, id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    $('#table-daftar-dokter-dpjp tbody').empty();
                }

                $('#ek_bed').text(bed);

                $('.ek-logo-pasien-alergi').hide();
                if (data.profil !== null) {
                    if (data.profil.is_alergi == 'Ya') {
                        $('.ek-logo-pasien-alergi').show();
                    }
                }

                // if (action === 'lihat') {
                //     // Disable semua input dan textarea
                //     $('#modal_daftar_dpjp :input')
                //     .not('[data-dismiss="modal"]') // ⛔ Jangan disable tombol close
                //     .prop('disabled', true);
                    
                //     $('#modal_daftar_dpjp textarea').prop('readonly', true);
                //     $('#btn-simpan').hide();

                //     // Disable select dan Select2
                //     $('#modal_daftar_dpjp select')
                //     .not('[data-dismiss="modal"]') // ⛔ Jangan disable kalau ini tombol close juga
                //     .prop('disabled', true)
                //     .trigger('change.select2');
                // }  

                if (action === 'lihat') {
                    // Disable semua input dan textarea
                    $('#modal_daftar_dpjp :input')
                    .not('[data-dismiss="modal"]') // ⛔ Jangan disable tombol close
                    .prop('disabled', true);
                    
                    $('#modal_daftar_dpjp textarea').prop('readonly', true);
                    $('#btn-simpan').hide();

                    // Disable select dan Select2
                    $('#modal_daftar_dpjp select')
                    .not('[data-dismiss="modal"]') // ⛔ Jangan disable kalau ini tombol close juga
                    .prop('disabled', true)
                    .trigger('change.select2c');

                     $('#modal_daftar_dpjp [id^="s2id_"]').css({  // untuk disable bagian dokter / perawat
                        'pointer-events': 'none',
                        'opacity': 0.6
                    });
                } 

                $('#modal_daftar_dpjp').modal('show');
            },
            complete: function () {
                hideLoader()
            },
            error: function (e) {
                accessFailed(e.status);
            },
        });
    }

    // DPJP
    function showDaftarDPJP(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#table-daftar-dokter-dpjp tbody').empty();
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";
        if (data !== null) {
            $.each(data, function(i, v) {

                function tanggalAwalDPJP(waktu) {
                    if (waktu !== undefined && waktu !== null && waktu !== 'null') {
                        var elem = waktu.split('-');
                        var tahun = elem[0];
                        var bulan = elem[1];
                        var hari = elem[2];
                        return hari + '/' + bulan + '/' + tahun;
                    } else {
                        return '';
                    }
                }

                function tanggalAkhirDPJP(waktu) {
                    if (waktu !== undefined && waktu !== null && waktu !== 'null') {
                        var elem = waktu.split('-');
                        var tahun = elem[0];
                        var bulan = elem[1];
                        var hari = elem[2];
                        return hari + '/' + bulan + '/' + tahun;
                    } else {
                        return '';
                    }
                }

                function tanggalAwalDPJPUtama(waktu) {
                    if (waktu !== undefined && waktu !== null && waktu !== 'null') {
                        var elem = waktu.split('-');
                        var tahun = elem[0];
                        var bulan = elem[1];
                        var hari = elem[2];
                        return hari + '/' + bulan + '/' + tahun;
                    } else {
                        return '';
                    }
                }

                function tanggalAkhirDPJPUtama(waktu) {
                    if (waktu !== undefined && waktu !== null && waktu !== 'null') {
                        var elem = waktu.split('-');
                        var tahun = elem[0];
                        var bulan = elem[1];
                        var hari = elem[2];
                        return hari + '/' + bulan + '/' + tahun;
                    } else {
                        return '';
                    }

                }

                function formatTgl(tgl) {
                    return (tgl === '01/01/1970' || tgl === '' || tgl === null) ? '-' : tgl;
                }

                // let selOp = '<td align="center">' + ((v.tanggal_awal_dpjp !== null) ? tanggalAwalDPJP(v.tanggal_awal_dpjp) : '') + '</td>';
                // let selOp2 = '<td align="center">' + ((v.tanggal_akhir_dpjp !== null) ? tanggalAkhirDPJP(v.tanggal_akhir_dpjp) : '') + '</td>';
                // let selOp3 = '<td align="center">' + ((v.tanggal_awal_dpjp_utama !== null) ? tanggalAwalDPJPUtama(v.tanggal_awal_dpjp_utama) : '') + '</td>';
                // let selOp4 = '<td align="center">' + ((v.tanggal_akhir_dpjp_utama !== null) ? tanggalAkhirDPJPUtama(v.tanggal_akhir_dpjp_utama) : '') + '</td>';

                let selOp = '<td align="center">' + (v.tanggal_awal_dpjp ? formatTgl(tanggalAwalDPJP(v.tanggal_awal_dpjp)) : '-') + '</td>';
                let selOp2 = '<td align="center">' + (v.tanggal_akhir_dpjp ? formatTgl(tanggalAkhirDPJP(v.tanggal_akhir_dpjp)) : '-') + '</td>';
                let selOp3 = '<td align="center">' + (v.tanggal_awal_dpjp_utama ? formatTgl(tanggalAwalDPJPUtama(v.tanggal_awal_dpjp_utama)) : '-') + '</td>';
                let selOp4 = '<td align="center">' + (v.tanggal_akhir_dpjp_utama ? formatTgl(tanggalAkhirDPJPUtama(v.tanggal_akhir_dpjp_utama)) : '-') + '</td>';


                let html = /* html */ `
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td align="center">${v.diagnosis_dokter ? v.diagnosis_dokter : '-'}</td>  
                        <td align="center">${v.nama_dokter_dpjp ? v.nama_dokter_dpjp : '-'}</td>   
                        ${selOp}
                        ${selOp2}
                        <td align="center">${v.nama_dokter_dpjp_utama ? v.nama_dokter_dpjp_utama : '-'}</td>   
                        ${selOp3}
                        ${selOp4}
                        <td align="center">${v.keterangan_dpjp ? v.keterangan_dpjp : '-'}</td>   
                        <td width="5%" align="center">${v.akun_user}</td>
                        <td width="5%" align="center">
                            <button type="button" class="btn-action btn-edit" title="Edit"
                                onclick="editDaftarDokterDPJP(this, ${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn-action btn-hapus" title="Hapus"
                                onclick="hapusDaftarDokterDPJP(this, ${v.id})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                `;
                $('#table-daftar-dokter-dpjp tbody').append(html);
            })
        }
    }

    function editDaftarDokterDPJP(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        const modal = $('#modal_edit_daftar_dpjp');
        $('#update-daftar-dpjp').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_edit_data_dokter_penangung_jawab_pasien") ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                // console.log(data);
                $('#update-daftar-dpjp').empty();
                $('#id-daftar-dpjp').val(id);

                // Fungsi aman untuk format tanggal

                // function formatTanggalKhususA(waktu) {
                //     if (!waktu || waktu === '0000-00-00') return '';
                //     var el = waktu.split('-');
                //     return el[2] + '/' + el[1] + '/' + el[0];
                // }
                // function formatTanggalKhususB(waktu) {
                //     if (!waktu || waktu === '0000-00-00') return '';
                //     var el = waktu.split('-');
                //     return el[2] + '/' + el[1] + '/' + el[0];
                // }
                // function formatTanggalKhususC(waktu) {
                //     if (!waktu || waktu === '0000-00-00') return '';
                //     var el = waktu.split('-');
                //     return el[2] + '/' + el[1] + '/' + el[0];
                // }
                // function formatTanggalKhususD(waktu) {
                //     if (!waktu || waktu === '0000-00-00') return '';
                //     var el = waktu.split('-');
                //     return el[2] + '/' + el[1] + '/' + el[0];
                // }

                function tanggalAwalDPJP(waktu) {
                    if (waktu !== undefined && waktu !== null && waktu !== 'null') {
                        var elem = waktu.split('-');
                        var tahun = elem[0];
                        var bulan = elem[1];
                        var hari = elem[2];
                        return hari + '/' + bulan + '/' + tahun;
                    } else {
                        return '';
                    }

                }

                function tanggalAkhirDPJP(waktu) {
                    if (waktu !== undefined && waktu !== null && waktu !== 'null') {
                        var elem = waktu.split('-');
                        var tahun = elem[0];
                        var bulan = elem[1];
                        var hari = elem[2];
                        return hari + '/' + bulan + '/' + tahun;
                    } else {
                        return '';
                    }

                }

                function tanggalAwalDPJPUtama(waktu) {
                    if (waktu !== undefined && waktu !== null && waktu !== 'null') {
                        var elem = waktu.split('-');
                        var tahun = elem[0];
                        var bulan = elem[1];
                        var hari = elem[2];
                        return hari + '/' + bulan + '/' + tahun;
                    } else {
                        return '';
                    }

                }

                function tanggalAkhirDPJPUtama(waktu) {
                    if (waktu !== undefined && waktu !== null && waktu !== 'null') {
                        var elem = waktu.split('-');
                        var tahun = elem[0];
                        var bulan = elem[1];
                        var hari = elem[2];
                        return hari + '/' + bulan + '/' + tahun;
                    } else {
                        return '';
                    }

                }

                // $('#edit-tanggal-mulai-dpjp').val(formatTanggalKhususA(data.tanggal_awal_dpjp));
                // $('#edit-tanggal-akhir-dpjp').val(formatTanggalKhususB(data.tanggal_akhir_dpjp));
                // $('#edit-tanggal-mulai-dpjp-utama').val(formatTanggalKhususC(data.tanggal_awal_dpjp_utama));
                // $('#edit-tanggal-akhir-dpjp-utama').val(formatTanggalKhususD(data.tanggal_akhir_dpjp_utama));

                // $('#edit-tanggal-mulai-dpjp').val(tanggalAwalDPJP(data.tanggal_awal_dpjp));
                // $('#edit-tanggal-akhir-dpjp').val(tanggalAkhirDPJP(data.tanggal_akhir_dpjp));
                // $('#edit-tanggal-mulai-dpjp-utama').val(tanggalAwalDPJPUtama(data.tanggal_awal_dpjp_utama));
                // $('#edit-tanggal-akhir-dpjp-utama').val(tanggalAkhirDPJPUtama(data.tanggal_akhir_dpjp_utama));

                function isValidTanggal(tgl) {
                    if (!tgl || tgl === '1970-01-01' || tgl === '01/01/1970') return false;
                    return true;
                }

                $('#edit-tanggal-mulai-dpjp').val(
                isValidTanggal(data.tanggal_awal_dpjp) ? tanggalAwalDPJP(data.tanggal_awal_dpjp) : ''
                );

                $('#edit-tanggal-akhir-dpjp').val(
                isValidTanggal(data.tanggal_akhir_dpjp) ? tanggalAkhirDPJP(data.tanggal_akhir_dpjp) : ''
                );

                $('#edit-tanggal-mulai-dpjp-utama').val(
                isValidTanggal(data.tanggal_awal_dpjp_utama) ? tanggalAwalDPJPUtama(data.tanggal_awal_dpjp_utama) : ''
                );

                $('#edit-tanggal-akhir-dpjp-utama').val(
                isValidTanggal(data.tanggal_akhir_dpjp_utama) ? tanggalAkhirDPJPUtama(data.tanggal_akhir_dpjp_utama) : ''
                );

                // Tombol
                let cttntndkn = `
                    <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal_edit_daftar_dpjp').modal('hide');">
                        <i class="fas fa-times-circle mr-1"></i>Tutup
                    </button>
                    <button type="button" class="btn btn-info waves-effect" onclick="updateDaftarDpjp(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')">
                        <i class="fas fa-save mr-1"></i>Update
                    </button>`;
                $('#update-daftar-dpjp').append(cttntndkn);
                $('#edit-diagnosis-dokter').val(data.diagnosis_dokter);
                $('#edit-keterangan-dpjp').val(data.keterangan_dpjp);
                $('#edit-nama-dokter-dpjp').val(data.id_dokter_dpjp);
                $('#s2id_edit-nama-dokter-dpjp a .select2c-chosen').html(data.nama_dokter_dpjp);
                $('#edit-nama-dokter-dpjp-utama').val(data.id_dokter_dpjp_utama);
                $('#s2id_edit-nama-dokter-dpjp-utama a .select2c-chosen').html(data.nama_dokter_dpjp_utama);
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function updateDaftarDpjp(id_pendaftaran, id_layanan_pendaftaran, bed) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_data_dokter_penangung_jawab_pasien") ?>',
            data: $('#form-edit-daftar-dpjp').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriDaftarDpjp(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal_edit_daftar_dpjp').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    // DPJP
    function hapusDaftarDokterDPJP(obj, id) {
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
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_daftar_dokter_dpjp") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Daftar Dokter DPJP', data.message);
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

    // DPJP
    function resetFormEntriDpjp() {
        $('#form_dokter_penangung_jawab_pasien')[0].reset();
        $("input[type='checkbox']").prop('checked', false);
        $("input[type='radio']").prop('checked', false);
    }

    // DPJP
    function konfirmasiSimpanDokterPenangungJawabPasien() {
        swal.fire({
            title: 'Simpan Entri Keperawatan',
            text: "Apakah anda yakin akan menyimpan Form Daftar DPJP (Dokter Penanggung Jawab Pasien)?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanDokterPenangungJawabPasien();
            }
        }) 
    }

    // DPJP
    function simpanDokterPenangungJawabPasien() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_data_dokter_penangung_jawab_pasien") ?>',
            data: $('#form_dokter_penangung_jawab_pasien').serialize(),
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
                        $('#modal_daftar_dpjp').modal('hide');
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

    // DPJP
    function tambahDokterDPJP() {
        // if ($('#diagnosa-dpjp').val() === '') {
        //     syams_validation('#diagnosa-dpjp', 'Diagnosa harus diisi.');
        //     return false;
        // }

        // if ($('#keterangan-dpjp').val() === '') {
        //     syams_validation('#keterangan-dpjp', 'Keterangan wajib diisi.');
        //     return false;
        // }

        if ($('#tanggal-mulai-dpjp').val() === '') {
            syams_validation('#tanggal-mulai-dpjp', 'Tanggal Mulai DPJP wajib diisi.');
            return false;
        }

        // if ($('#tanggal-mulai-dpjp-utama').val() === '') {
        //     syams_validation('#tanggal-mulai-dpjp-utama', 'Tanggal MulaiDPJP Utama wajib diisi.');
        //     return false;
        // }

        // if ($('#tanggal-akhir-dpjp').val() === '') {
        //     syams_validation('#tanggal-akhir-dpjp', 'Tanggal Akhir wajib diisi.');
        //     return false;
        // }

        // if ($('#tanggal-akhir-dpjp-utama').val() === '') {
        //     syams_validation('#tanggal-akhir-dpjp-utama', 'Tanggal Akhir DPJP Utama wajib diisi.');
        //     return false;
        // }

        if ($('#nama-dokter-dpjp').val() === '') {
            syams_validation('#nama-dokter-dpjp', 'Nama Dokter DPJP wajib diisi.');
            return false;
        }

        if ($('#nama-dokter-dpjp-utama').val() === '') {
            syams_validation('#nama-dokter-dpjp-utama', 'Nama Dokter DPJP Umum wajib diisi.');
            return false;
        }

        let html = '';
        let number = $('.number-daftar-dpjp').length;
        let diagnosis_dokter = $('#diagnosis-dokter').val();
        let keterangan_dpjp = $('#keterangan-dpjp').val();
        let tanggal_mulai_dpjp = $('#tanggal-mulai-dpjp').val();
        let tanggal_mulai_dpjp_utama = $('#tanggal-mulai-dpjp-utama').val();
        let tanggal_akhir_dpjp = $('#tanggal-akhir-dpjp').val();
        let tanggal_akhir_dpjp_utama = $('#tanggal-akhir-dpjp-utama').val();
        let nama_dokter_dpjp = $('#s2id_nama-dokter-dpjp a .select2c-chosen').html();
        let id_nama_dokter_dpjp = $('#nama-dokter-dpjp').val();
        let nama_dokter_dpjp_utama = $('#s2id_nama-dokter-dpjp-utama a .select2c-chosen').html();
        let id_nama_dokter_dpjp_utama = $('#nama-dokter-dpjp-utama').val();

        html = /* html */ `
            <tr>
                <td width="1%" class="number-daftar-dpjp" align="center">${++number}</td>
                <td width="5%" align="center"><input type="hidden" name="diagnosis_dokter[]" value="${diagnosis_dokter}">${diagnosis_dokter}</td>
                <td width="2%" align="center"><input type="hidden" name="nama_dokter_dpjp[]" value="${id_nama_dokter_dpjp}">${nama_dokter_dpjp}</td>
                <td width="1%" align="center"><input type="hidden" name="tanggal_mulai_dpjp[]" value="${tanggal_mulai_dpjp}">${tanggal_mulai_dpjp}</td>
                <td width="1%" align="center"><input type="hidden" name="tanggal_akhir_dpjp[]" value="${tanggal_akhir_dpjp}">${tanggal_akhir_dpjp}</td>
                <td width="2%" align="center"><input type="hidden" name="nama_dokter_dpjp_utama[]" value="${id_nama_dokter_dpjp_utama}">${nama_dokter_dpjp_utama}</td>
                <td width="1%" align="center"><input type="hidden" name="tanggal_mulai_dpjp_utama[]" value="${tanggal_mulai_dpjp_utama}">${tanggal_mulai_dpjp_utama}</td>
                <td width="1%" align="center"><input type="hidden" name="tanggal_akhir_dpjp_utama[]" value="${tanggal_akhir_dpjp_utama}">${tanggal_akhir_dpjp_utama}</td>
                <td width="5%" align="center"><input type="hidden" name="keterangan_dpjp[]" value="${keterangan_dpjp}">${keterangan_dpjp}</td>
                <td width="4%" align="center"><input type="hidden" name="user_dokter_dpjp[]" value="<?= $this->session->userdata("id_translucent") ?>"><?= $this->session->userdata("nama") ?></td>
                <td width="1%" align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#table-daftar-dokter-dpjp tbody').append(html);
    }
</script>