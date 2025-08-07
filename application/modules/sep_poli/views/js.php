<script>
    var jenisLayanan = 'Poliklinik';

    $(function() {
        getListPendaftaran(1);

        $('#bt_search_data').click(function() {
            $('#modal_search').modal('show');
        });

        $('#bt_reload_data').click(function() {
            location.reload();
        });

        $("#tanggal_awal, #tanggal_akhir, #tanggal_pulang_update, #tanggal_meninggal_update").datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        $('#klinik').change(function() {
            getListPendaftaran(1);
        });

        $('#status_pulang_update').change(function() {
            if ($(this).val() == 4) {
                $('.meninggal_bpjs').show()
            } else {
                $('.meninggal_bpjs').hide()
            }
        })
    });

    function getListPendaftaran(p) {
        $('#page_now').val(p);
        $.ajax({
            type: 'GET',
            url: '<?= base_url("sep_poli/api/sep_poli/get_list_sep_poli") ?>/page/' + p,
            data: $('#form_search').serialize() + '&layanan=' + $('#klinik').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListPendaftaran(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));


                let html = '';
                let disable = '';
                let disable_sep = '';
                let disable_edit = '';
                let nosep = '';
                let btn_sep = '';
                let btn_rujukan = '';

                $('#table_data tbody').empty();
                $.each(data.data, function(i, v) {
                    if (v.tanggal_keluar !== null) {
                        disable = 'disabled';
                        disable_edit = 'disabled';
                    }

                    if (v.cara_bayar == 'Tunai') {
                        disable = 'disabled';
                        disable_sep = 'disabled';
                        disable_edit = 'disabled';
                    }

                    if (v.no_sep !== null) {
                        nosep = v.no_sep;
                        disable_sep = '';
                        btn_sep = '<a class="dropdown-item ' + disable + ' waves-effect waves-light btn-xs" href="javascript:void(0)" title="Update SEP" onclick="formUpdateSEP(\'' + v.no_sep + '\', \'' + v.klinik + '\', \'poli\')"><i class="fas fa-edit m-r-5"></i>Update SEP</a> ';
                        btn_rujukan = '<a title="Update Rujukan" class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="updateRujukan(\'' + v.id_pendaftaran + '\', \'' + nosep + '\', \'' + '' + '\')"><i class="fas fa-plus-circle m-r-5"></i>Buat Surat Rujukan</a></li>';
                    } else {
                        nosep = '';
                        disable_sep = 'disabled';
                        btn_sep = '<a title="Klik untuk membuat SEP" class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembuatanSEP(\'' + v.id_pasien + '\' ,' + v.id + ', \'' + v.no_polish + '\', \'' + v.kode_bpjs + '\', \'' + v.klinik + '\', \'' + v.no_rujukan + '\' )"><i class="fas fa-plus-circle m-r-5"></i>Buat SEP</a> ';
                        btn_rujukan = '';
                    }

                    if (v.no_rujukan != null) {
                        btn_rujukan = '<a title="Update Rujukan" class="dropdown-item waves-effect waves-light btn-xs" onclick="updateRujukan(\'' + v.id_pendaftaran + '\', \'' + nosep + '\', \'' + v.no_rujukan + '\')"><i class="fas fa-edit m-r-5"></i>Update Surat Rujukan</a>' +
                            '<a title="Hapus Rujukan" class="dropdown-item waves-effect waves-light btn-xs" onclick="hapusRujukan(\'' + v.no_rujukan + '\')"><i class="fas fa-trash m-r-5"></i>Hapus Surat Rujukan</a>' +
                            '<a title="Cetak Rujukan" class="dropdown-item waves-effect waves-light btn-xs" onclick="cetakRujukan(\'' + v.no_rujukan + '\')"><i class="fas fa-print m-r-5"></i>Cetak Surat Rujukan</a>';
                    }

                    html = '<tr>' +
                        '<td>' + v.no_register + '</td>' +
                        '<td>' + ((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '') + '</td>' +
                        '<td>' + v.id_pasien + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + v.klinik + '</td>' +
                        '<td>' + v.cara_bayar + '</td>' +
                        '<td>' + v.penjamin + '</td>' +
                        '<td>' + ((v.no_polish !== null) ? v.no_polish : '') + '</td>' +
                        '<td>' + ((v.no_sep !== null) ? v.no_sep : '') + '</td>' +
                        '<td>' + ((v.username !== null) ? v.username : '') + '</td>' +
                        '<td align="right">' +
                        '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-cog"></i></button> ' +
                        '<div class="dropdown-menu">' +
                        btn_sep +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editNoPolish(' + v.id + ',\'' + ((v.no_polish !== null) ? v.no_polish : '') + '\', ' + data.page + ')"><i class="fas fa-edit m-r-5"></i>Edit No Kartu Peserta</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editNoSEP(' + v.id + ',\'' + ((v.no_sep !== null) ? v.no_sep : '') + '\', ' + data.page + ')"><i class="fas fa-edit m-r-5"></i>Edit No SEP Peserta</a>' +
                        // '<a class="dropdown-item ' + disable_sep + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="updateTglPulangSEP(\'' + ((v.no_sep !== null) ? v.no_sep : '') + '\', ' + data.page + ')"><i class="fas fa-edit m-r-5"></i>Update Tgl Pulang SEP</a>' +
                        '<a class="dropdown-item ' + disable_sep + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakNotaSEP(\'' + ((v.no_sep !== null) ? v.no_sep : '') + '\')"><i class="fas fa-print m-r-5"></i>Cetak Nota SEP</a>' +
                        '<a class="dropdown-item ' + disable_sep + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="hapusSEP(\'' + ((v.no_sep !== null) ? v.no_sep : '') + '\', ' + data.page + ', ' + v.id_pendaftaran + ')"><i class="fas fa-trash m-r-5"></i>Hapus Data SEP</a>' +
                        btn_rujukan +
                        '</div>' +
                        '</div>' +
                        '</>' +
                        '</tr>';
                    $('#table_data tbody').append(html);
                });
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }
    
    function paging(p) {
        getListPendaftaran(p)
    }

    function hapusSEP(no_sep = '', page, id_pendaftaran) {
        if (no_sep) {
            Swal.fire({
                title: 'Hapus SEP?',
                text: "Apakah anda yakin ingin menghapus SEP",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: '<i class="fas fa-window-close"></i> Batal',
                confirmButtonText: '<i class="fas fa-check-circle"></i> Ya, Hapus!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'DELETE',
                        url: '<?= base_url(URL_VCLAIM."hapus_sep") ?>',
                        data: 'no_sep=' + no_sep + '&id_pendaftaran=' + id_pendaftaran,
                        cache: false,
                        dataType: 'JSON',
                        success: function(data) {
                            var hasil = data[0];
                            if (hasil.metaData.code === "200") {
                                swalCustom('success', 'Hapus Data', 'No SEP. ' + hasil.response + ' telah berhasil dihapus');
                                getListPendaftaran(page);
                            } else {
                                swalCustom('warning', 'Hapus Data', hasil.metaData.message);
                            }
                        },
                        error: function(e) {
                            messageDeleteFailed();
                        }
                    });
                }
            });
        } else {
            swalCustom('warning', 'Hapus SEP', 'No. SEP Tidak ada, Silahkan buat SEP terlebih dahulu');
        }
    }

    function updateTglPulangSEP(no_sep, page) {
        if (no_sep === '') {
            swalCustom('warning', 'Informasi', 'No. SEP Tidak ada, Silahkan buat SEP terlebih dahulu');
            return false;
        }
        $('#no_sep_update').val(no_sep);
        $('#modal_tgl_pulang_sep').modal('show');
    }

    function doUpdateTglPulang() {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url(URL_VCLAIM."update_tgl_pulang_sep") ?>',
            data: $('#form_tgl_pulang_sep').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                let hasil = data[0];
                if (hasil.metaData.code === "200") {
                    swalCustom('success', 'Update Tanggal Pulang SEP', 'Tgl Pulang dengan No SEP.' + hasil.response + ' telah berhasil diupdate');
                    getListPendaftaran(1);
                    $('#tanggal_pulang_update').val('');
                    $('#modal_tgl_pulang_sep').modal('hide');
                } else {
                    swalCustom('warning', 'Update Tanggal Pulang SEP', hasil.metaData.message);
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function pembuatanSEP(no_rm, id_layanan, nopol, kode_poli, layanan, no_rujukan) {
        $('#no_rm_bpjs').val(no_rm);
        $('#no_rm2_bpjs').val(no_rm);
        $('#kode_poli').val(kode_poli);
        $('#id_layanan_pendaftaran_bpjs').val(id_layanan);
        $('#nokartu_bpjs').val(nopol);

        if (nopol === '') {
            swalAlert('warning', 'Validasi', 'Peserta belum memasukkan no. kartu asuransi');
        } else {
            getDataPesertaBPJS(nopol, 'nopolish', 'poli', layanan, no_rm);
        }
    }
</script>