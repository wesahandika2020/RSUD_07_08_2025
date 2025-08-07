<script>
    $(function() {
        getJadwalDokterHFIS();

        $('#filter-jadwal').click(function() {
            $('#modal-filter-jadwal').modal('show');
            $('#modal-jadwal-label').html('Filter Jadwal Dokter');
        });

        $('#jam-hfis-buka, #jam-hfis-tutup').timepicker({
            format: 'HH:mm',
            showInputs: true,
            showMeridian: false
        });
        
        $('#btn-reload').click(function() {
            resetAll();
            getJadwalDokterHFIS();
        });

        $('#button-cari').click(function() {
            $('#modal-filter-jadwal').modal('hide');
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('.form-control, .select2-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        let tindakanDate = new Date();
        $('#tanggal-jadwal').datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: new Date(tindakanDate.getFullYear(), tindakanDate.getMonth()+3, 0),
            beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
            
        });

        $('#layanan-auto').select2({
            width: '100%',
            ajax: {
                url: "<?= base_url('jadwal_dokter_hfis/api/jadwal_dokter_hfis/kode_bpjs') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var kode = '';
                if (data.kode !== '') {
                    kode = '<b>' + data.kode + '</b> - ';
                };
                var markup = kode + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                $('#kode-bpjs').val(data.kode_bpjs);
                return data.nama;
            }
        });

        
        
    });

    function resetAll() {
        $('input[type=text], #keyword').val('');
        syams_validation_remove('.form-control, .select2-input');
    }

    function getJadwalDokterHFIS() {

        let tanggal = $('#tanggal-jadwal').val();
        let layananAuto = $('#kode-bpjs').val();

        if ($('#tanggal-jadwal').val() == '') {
            syams_validation('#tanggal-jadwal', 'Silahkan pilih Tanggal terlebih dahulu');
            return false;
        }

        if ($('#kode-bpjs').val() == '') {
            syams_validation('#layanan-auto', 'Silahkan pilih Klinik terlebih dahulu');
            return false;
        }

        let tanggalJadwal = '';
        let tanggalJudul = '';

        tanggalJadwal = date2mysql(tanggal);
        
        $('#table-jadwal-dokter tbody').empty();
        $('#jadwal-label').empty();

        $('#jadwal-label').html('Tanggal : ' + tanggal);

        $.ajax({
            type: 'GET',
            url: '<?= base_url('jadwal_dokter_hfis/api/jadwal_dokter_hfis/jadwal_dokter_hfis') ?>/tanggal_jadwal/' + tanggalJadwal + '/kode/' + layananAuto,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if(data.response === null){

                    swalAlert('warning', 'Validasi', 'Tidak terhubung dengan Server BPJS, Server BPJS sedang bermasalah. Silahkan Hubungi Pihak IT BPJS');

                }

                let accountGroup = "<?= $this->session->userdata('account_group') ?>";

                if (typeof data.metaData !== 'undefined') {

                    if (data.metaData.code !== 200) {

                        swalAlert('warning', data.metaData.code, data.metaData.message);

                    } else {

                        $.each(data.response, function(i, v) {

                            let selOp = '';

                            if(accountGroup === 'Admin'){

                                selOp = `<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="editJadwalHFIS(\'${v.kodepoli}\', \'${v.kodesubspesialis}\', ${v.kodedokter}, \'${v.namadokter}\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i> Pengajuan</a>`;

                                selOp += `<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPengajuan(${v.kodedokter}, \'${v.namadokter}\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i> Detail Pengajuan</a>`;
                                    
                            } else {

                                selOp = '';
                            }

                            let html = /* html */ `
                                <tr>
                                    <td class="jadwal-hfis" align="center">${++i}</td>
                                    <td align="center">${v.kodesubspesialis}</td>
                                    <td align="center">${v.hari}</td>
                                    <td align="center">${v.kapasitaspasien}</td>
                                    <td align="center">${v.libur}</td>
                                    <td align="left">${v.namahari}</td>
                                    <td align="left">${v.jadwal}</td>
                                    <td align="center">${v.namasubspesialis}</td>
                                    <td align="left">${v.namadokter}</td>
                                    <td align="center">${v.kodepoli}</td>
                                    <td align="center">${v.namapoli}</td>
                                    <td align="center">${v.kodedokter}</td>
                                    <td class="center" style="display:flex;float:right">
                                        <div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle"  data-toggle="dropdown"><i class="fas fa-cog"></i></button>
                                            <div class="dropdown-menu">
                                             ${selOp}
                                            </div>
                                        </div>
                                    </td>
                                   
                                </tr>
                            `;
                            $('#table-jadwal-dokter tbody').append(html);

                        })

                    }

                }

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function detailPengajuan(id_bpjs, namadokter) {

        $('#modal-detail-pengajuan').modal('show');
        $('#table-detail-pengajuan tbody').empty();

        $.ajax({
            url: '<?= base_url('jadwal_dokter_hfis/api/jadwal_dokter_hfis/detail_pengajuan') ?>/id/' + id_bpjs,
            data: $('#form_search').serialize(),
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                $('#modal_detail_pengajuan_label').html('dr. ' + namadokter);

                if(data.metaData.code === '200'){
                    
                    $.each(data.metaData.message, function(i, v) {

                        let html = 
                            '<tr>' +
                                '<td class="center">' + (++i) + '</td>' +
                                '<td class="center">' + v.response + '</td>' +
                                '<td class="left">' + v.keterangan_respon + '</td>' +
                                '<td class="center">' + v.kode_poli + '</td>' +
                                '<td class="center">' + v.kode_subspesialis + '</td>' + 
                                '<td class="center">' + v.bpjs_dokter + '</td>' +
                                '<td class="center">' + ((v.waktu !== null) ? datetimefmysql(v.waktu) : '-') + '</td>' +
                                '<td class="center" style="display:flex;float:right">' +
                                    '<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle"  data-toggle="dropdown"><i class="fas fa-cog"></i></button>' +
                                        '<div class="dropdown-menu">' +
                                            '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailJadwal(' + v.id + ',' +  '\'' + namadokter + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i> Detail Pengajuan</a>' +
                                        '</div>' +
                                    '</div>' +
                                '</td>' +
                            '</tr>';
                        $('#table-detail-pengajuan tbody').append(html);

                    });

                } else {

                    messageCustom('Belum ada Pengajuan data', 'Success');

                }



            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

    }

    function detailJadwal(id, namadokter) {

        $('#modal-detail-jadwal').modal('show');
        $('#table-detail-jadwal tbody').empty();

        $.ajax({
            url: '<?= base_url('jadwal_dokter_hfis/api/jadwal_dokter_hfis/detail_jadwal') ?>/id/' + id,
            data: $('#form_search').serialize(),
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                $('#modal_detail_jadwal_label').html('dr. ' + namadokter);

                function hari_indo(day) {
                    var hari = ''
                    switch (day) {
                        case '1': hari = 'Senin'; break;
                        case '2': hari = 'Selasa'; break;
                        case '3': hari = 'Rabu'; break;
                        case '4': hari = 'Kamis'; break;
                        case '5': hari = 'Jumat'; break;
                        case '6': hari = 'Sabtu'; break;
                        case '7': hari = 'Minggu'; break;
                        
                        default:
                            break;
                    }

                    return hari;
                }

                $.each(data, function(i, v) {



                    let html = 
                        '<tr>' +
                            '<td class="center">' + (++i) + '</td>' +
                            '<td class="center">' + hari_indo(v.hari) + '</td>' +
                            '<td class="center">' + v.buka + '</td>' +
                            '<td class="center">' + v.tutup + '</td>' +
                        '</tr>';
                    $('#table-detail-jadwal tbody').append(html);

                });



            },
            error: function(e) {
                accessFailed(e.status);
            }
        });


    }

    function editJadwalHFIS(kode_poli, kode_sub, dokter, namadokter) {
        
        $('#modal-jadwal-dokter').modal('show');
        $('#modal-jadwal-dokter-label').html('Edit Jadwal Dokter HFIS ' + namadokter);
        $('#hfis-kode-poli').val(kode_poli);
        $('#hfis-kode-sub').val(kode_sub);
        $('#hfis-bpjs-dokter').val(dokter);

    }

    function tambahPerubahanJadwal() {

        if ($('#jadwal-hari').val() === '') {
            syams_validation('#jadwal-hari', 'Silakan isi Hari');
            return false;
        }

        if ($('#jam-hfis-buka').val() === '') {
            syams_validation('#jam-hfis-buka', 'Silakan isi Jam Buka.');
            return false;
        }

        if ($('#jam-hfis-tutup').val() === '') {
            syams_validation('#jam-hfis-tutup', 'Silakan isi Jam Tutup.');
            return false;
        } 

        let html = '';
        let nomor = $('.nomor-tambah-jadwal').length;
        let ubah_hari = $('#jadwal-hari').val();
        let view_ubah_hari = $('#jadwal-hari :selected').text();
        let jam_buka = $('#jam-hfis-buka').val();
        let jam_tutup = $('#jam-hfis-tutup').val();

        html = /* html */ `
                    <tr>
                        <td width="1%" class="nomor-tambah-jadwal" align="center">${++nomor}</td>
                        <td width="2%" align="center"><input type="hidden" name="ubah_hari[]" value="${ubah_hari}">${view_ubah_hari}</td>
                        <td width="2%" align="center"><input type="hidden" name="ubah_jam_buka[]" value="${jam_buka}">${jam_buka}</td>
                        <td width="2%" align="center"><input type="hidden" name="ubah_jam_tutup[]" value="${jam_tutup}">${jam_tutup}</td>
                        <td width="1%" align="center">
                            <button type="button" class="btn btn-secondary btn-xxs" onclick="hapusIni(this)"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    
                `;
        $('#table-perubahan-jadwal-hfis tbody').append(html);      

    }

    function hapusIni(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function editJadwalHFISDokter() {

        swal.fire({
            title: 'Simpan Perubahan Jadwal',
            text: "Apakah anda akan menyimpan Perubahan Jadwal ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanPerubahanJadwal();
            }
        })

    }

    function simpanPerubahanJadwal() {

        $.ajax({
            type: 'POST',
            url: '<?= base_url("jadwal_dokter_hfis/api/jadwal_dokter_hfis/simpan_perubahan_jadwal") ?>',
            data: $('#form-edit-dokter').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code !== 200){

                        swalAlert('warning', data.metaData.code, data.metaData.message);
                        

                    } else {

                        $('#modal-jadwal-dokter').modal('hide');
                        getJadwalDokterHFIS();
                        messageCustom('Pengajuan Jadwal Dokter HFIS Berhasil', 'Success');
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