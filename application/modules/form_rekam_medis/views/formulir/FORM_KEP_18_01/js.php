<script>
    // TI
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

    function lihatFORM_KEP_18_01(data) {
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
        entriTerapiInsulin(layanan.id_pendaftaran, layanan.id, layanan.layanan,  bed, action);
    }

    function editFORM_KEP_18_01(data) {
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
        entriTerapiInsulin(layanan.id_pendaftaran, layanan.id, layanan.layanan,  bed, action);
    }

    function tambahFORM_KEP_18_01(data) {
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
        entriTerapiInsulin(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed,  action);
    }

    function entriTerapiInsulin(id_pendaftaran, id_layanan_pendaftaran, layanan,  bed, action) {
        // $('#modal_terapi_insulin').modal('show');
        // showTerapiInsulin(nomer);       

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
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_terapi_insulin") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetTerapiInsulin(); 
                $('#id-layanan-pendaftaran-ti').val(id_layanan_pendaftaran);
                $('#id-layanan-pendaftaran').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-ti').val(id_pendaftaran);
                
                if (data.pasien !== null) {
                    $('#id-pasien-ti').val(data.pasien.id_pasien);
                    $('#nama-pasien-ti').text(data.pasien.nama);
                    $('#no-rm-ti').text(data.pasien.no_rm);
                    $('#tgl-lahir-ti').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-ti').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                }

                // TANGGAL
                $('#data-terapi-insulin').one('click', function() {
                        $('#ti-tanggal-pengkajian, #edit-ti-tanggal-pengkajian').datetimepicker({
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
                $('#data-terapi-insulin').one('click', function()  {
                    $('#jam-ti, #edit-jam-ti' )
                    .on('click', function() {
                        $(this).timepicker({
                            format: 'HH:mm',
                            showInputs: false,
                            showMeridian: false
                        });
                    })
                })

                // Dokter              
                $('#data-terapi-insulin').one('click', function() {
                    $('#dokter-ti, #edit-dokter-ti')
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

                    // $('#dokter-ti').val("17");
                    // $('#s2id_dokter-ti a .select2c-chosen').html("dr.IKHA NOOR RAKHMAWATI");  
                    
                    // UNTUK MENAMPILKAN NAMA DOKTER BENTU ARAY
                    if (data.terapi_insulin.length > 0) {
                        $('#dokter-ti').val(data.terapi_insulin[0].dokter_ti);
                        $('#s2id_dokter-ti a .select2c-chosen').html(data.terapi_insulin[0].dokter);
                    } else {
                        // Jika tidak ada isinya, atur nilai menjadi null
                        $('#dokter-ti').val(null);
                        $('#s2id_dokter-ti a .select2c-chosen').html(null);
                    }
                })

                // Perawat
                $('#data-terapi-insulin').one('click', function() {
                    $('#perawat-ti, #edit-perawat-ti')
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

                if (typeof data.terapi_insulin !== 'undefined' && data.terapi_insulin !== null) {
                    showTTerapiInsulin(data.terapi_insulin, id_pendaftaran, id_layanan_pendaftaran, bed, action);
                    showTerapiInsulin(nomer);                                  
                } else {
                    $('#tabel-ti .body-table').empty();
                }

               // console.log(data.terapi_insulin[0].dokter); UNTUK MENCOBA CONSOLE

                $('#bed-ti').text(bed);
               
                $('#modal_terapi_insulin').modal('show');
            },

            
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function showTerapiInsulin(num) {
        let html = bukaLebar('FORM TERAPI INSULIN ⤩');             
        html += /* html */ `
            <div class="modal-body"> 
                <div class="row">
                    <table class="table table-no-border table-sm table-striped">
                        </tbody>
                            <tr>
                                <td class="center"> <b> DOKTER ( DPJP ) </td>  
                                <td> 
                                    <div class="input-group">
                                        <input type="text" name="dokter_ti" id= "dokter-ti" class="select2c-input ml-2">  
                                    </div>   
                                </td>                    
                                <td></td>
                                <td></td>
                                <td></td>                                                        
                            </tr>
                        </tbody>                      
                    </table>
                    <table class="table table-no-border table-sm table-striped">
                        <thead>
                            <tr>
                                <th class="center">Tanggal</th>
                                <th class="center">Jam</th>
                                <th class="center">Jenis Insulin</th>
                                <th class="center">Dosis</th>
                                <th class="center">Gula Darah</th>
                                <th class="center">Reduksi</th>
                                <th class="center">Keterangan</th>
                                <th class="center">Tanda tangan</th>
                                <th class="center">Nama Perawat</th>
                            </tr>
                            <tr>                             
                                <td class="center"><input type="text" name="ti_tanggal_pengkajian" id="ti-tanggal-pengkajian" class=" custom-form clear-input d-inline-block col-lg-10"placeholder="dd/mm/yy"></td>
                                <td class="center"><input type="text" name="jam_ti" id="jam-ti" class=" custom-form clear-input d-inline-block col-lg-8"placeholder="hh/mm"></td>  
                                <td class="center"><input type="text" name="jenis_insulin_ti" id="jenis-insulin-ti" class=" custom-form clear-input d-inline-block col-lg-12"></td>  
                                <td class="center"><input type="text" name="dosis_ti" id="dosis-ti" class=" custom-form clear-input d-inline-block col-lg-12"></td>  
                                <td class="center"><input type="text" name="gula_darah_ti" id="gula-darah-ti" class=" custom-form clear-input d-inline-block col-lg-12"></td>  
                                <td class="center"><input type="text" name="reduksi_ti" id="reduksi-ti" class=" custom-form clear-input d-inline-block col-lg-12"></td> 
                                <td class="center"><textarea name="keterangan_ti" id="keterangan-ti"rows="5" class="form-control clear-input"placeholder=""></textarea></td>  
                                <td class="center"><input type="checkbox" name="ttd_ti" id="ttd-ti" value="1" class="mr-1 "></td>  
                                <td class="center"><input type="text" name="perawat_ti" id= "perawat-ti" class="select2c-input ml-2"> </td>   
                            </tr>
                        </thead>
                    </table
                    <table class="table table-no-border table-sm table-striped">
                        <tbody>                       
                            <tr>
                                <td colspan="8">
                                    <button type="button" title="Tambah Terapi Insulin" class="btn btn-info" onclick="tambahTerapiInsulin()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Terapi Insulin</button>
                                </td>
                            </tr>          
                        </tbody>  
                    </table>                   
                </div>
            </div>
        `;                 
        html += tutupRapet();
        $('#buka-tutup-ti').append(html);       
    }

    function showTTerapiInsulin(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        function formatTanggalKhusus(waktu) {
            var el = waktu.split('-');
            var tahun = el[0];
            var bulan = el[1];
            var hari = el[2];
            return hari + '/' + bulan + '/' + tahun;
        }

        $('#tabel-ti .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                let btnAksesLihat = '';
                if (action != 'lihat') {
                    btnAksesLihat = '<button type="button" class="btn btn-success btn-xs"onclick="editTerapiInsulin(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-danger btn-xs" onclick="hapusTerapiInsulin(this, ' +
                    v.id +
                    ')"> <i class="fas fa-trash-alt"></i> Hapus</button>';
                }
                const selOp =
                '<td align="center"><button type="button" class="btn btn-secondary btn-xs" onclick="lihatTerapiInsulin(this, ' +
                v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                '\')"><i class="fas fa-eye"></i> Lihat</button>' +
                btnAksesLihat + 
                '</td>';
                let html = /* html */ `     
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td align="center">` + ((v.tanggal_pengkajian !== null) ? formatTanggalKhusus(v.tanggal_pengkajian) : '') + `</td>
                        <td align="center">${v.jam_ti || '-'}</td>                       
                        <td align="center">${v.dokter || '-'}</td>                       
                        <td align="center">${v.perawat || '-'}</td>                            
                        <td align="center">${v.akun_user}</td>
                        ${selOp} 
                    </tr>
                `;
                $('#tabel-ti tbody').append(html);
                numberTi = i;
            })
        }
    }

    function konfirmasiSimpanTerapiInsulin() {
        if ($('#ti-tanggal-pengkajian').val() === '') {
            syams_validation('#ti-tanggal-pengkajian', 'Tanggal wajib diisi <br> klik tombol Tambah Terapi Insulin sebelum klik tombol konfirmasi.!!!');
            return false;
        } else {
            syams_validation_remove('#ti-tanggal-pengkajian');
        }

        swal.fire({
            title: 'Simpan Data',
            text: "Apakah anda yakin akan menyimpan data ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanTerapiInsulin();
            }
        })
    }

    function simpanTerapiInsulin() {
        var id_layanan_pendaftaran_ti = $('#id-layanan-pendaftaran-ti').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_data_terapi_insulin") ?>',
            data: $('#form_modal_terapi_insulin').serialize() + '&id-layanan-pendaftaran-ti=' + id_layanan_pendaftaran_ti,

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
                        $('#modal_terapi_insulin').modal('hide');
                        showListForm($('#id-pendaftaran-ti').val(), $('#id-layanan-pendaftaran-ti').val(), $('#id-pasien-ti').val());
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

    function resetTerapiInsulin() {
        $('#form_modal_terapi_insulin')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);       
        $('#ti-tanggal-pengkajian').val('');
        $('#jam-ti').val('');
        $('#s2id_perawat-ti a .select2c-chosen, #s2id_dokter-ti a .select2c-chosen').empty();
        $('#perawat-ti, #dokter-ti').val('');    
        setTimeout(() => {
            $('')
                .val('#jenis-insulin-ti, #dosis-ti, #gula-darah-ti, #reduksi-ti, #keterangan-ti');
            $('#form-ti').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)

        $('#buka-tutup-ti').empty();      
    }

    function lihatTerapiInsulin(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {   
         $('#modal-edit-terapi-insulin').modal('show');
         $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_terapi_insulin") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-ti').empty();
                $('#id-terapi-insulin').val(id);
                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }

                let edit_tanggal_pengkajian = formatTanggalKhusus(data.tanggal_pengkajian);
                $('#edit-ti-tanggal-pengkajian').val(edit_tanggal_pengkajian);                 
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-terapi-insulin').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                  `;
                $('#update-ti').append(cttntndkn);             
                $('#edit-jam-ti').val(data.jam_ti);
                $('#edit-dokter-ti').val(data.dokter_ti);
                $('#s2id_edit-dokter-ti a .select2c-chosen').html(data.dokter);
                $('#edit-perawat-ti').val(data.perawat_ti);
                $('#s2id_edit-perawat-ti a .select2c-chosen').html(data.perawat);      
                $('#edit-jenis-insulin-ti').val(data.jenis_insulin_ti);
                $('#edit-dosis-ti').val(data.dosis_ti);
                $('#edit-gula-darah-ti').val(data.gula_darah_ti);
                $('#edit-reduksi-ti').val(data.reduksi_ti);
                $('#edit-keterangan-ti').val(data.keterangan_ti);
                data.ttd_ti == '1' ? $('#edit-ttd-ti').prop('checked', true)   : $('#edit-ttd-ti').prop('checked', false);              
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })      
    }

    function editTerapiInsulin(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {   
        const modal = $('#modal-edit-terapi-insulin');
        $('#update-ti').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_terapi_insulin") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                // console.log(data);
                $('#update-ti').empty();
                $('#id-terapi-insulin').val(id);
                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }
                let edit_tanggal_pengkajian = formatTanggalKhusus(data.tanggal_pengkajian);
                $('#edit-ti-tanggal-pengkajian').val(edit_tanggal_pengkajian);                 
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-terapi-insulin').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                    <button type="button" class="btn btn-info waves-effect" onclick="updateTerapiInsulin(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;

                $('#update-ti').append(cttntndkn);             
                $('#edit-jam-ti').val(data.jam_ti);
                $('#edit-dokter-ti').val(data.dokter_ti);
                $('#s2id_edit-dokter-ti a .select2c-chosen').html(data.dokter);
                $('#edit-perawat-ti').val(data.perawat_ti);
                $('#s2id_edit-perawat-ti a .select2c-chosen').html(data.perawat);      
                $('#edit-jenis-insulin-ti').val(data.jenis_insulin_ti);
                $('#edit-dosis-ti').val(data.dosis_ti);
                $('#edit-gula-darah-ti').val(data.gula_darah_ti);
                $('#edit-reduksi-ti').val(data.reduksi_ti);
                $('#edit-keterangan-ti').val(data.keterangan_ti);
                data.ttd_ti == '1' ? $('#edit-ttd-ti').prop('checked', true) : $('#edit-ttd-ti').prop('checked', false);     
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function updateTerapiInsulin(id_pendaftaran, id_layanan_pendaftaran, bed) {
        // console.log($('#form-edit-terapi-insulin').serialize());
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_terapi_insulin") ?>',
            data: $('#form-edit-terapi-insulin').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriTerapiInsulin(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-terapi-insulin').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    if (typeof numberTi === 'undefined') {
        var numberTi = 1;
    }

    function tambahTerapiInsulin() {      
        if ($('#ti-tanggal-pengkajian').val() === '') {
            syams_validation('#ti-tanggal-pengkajian', 'Tanggal Tindakan harus diisi.');
            return false;
        } else {
            syams_validation_remove('#ti-tanggal-pengkajian');
        }
        if ($('#perawat-ti').val() === '') {
            syams_validation('#perawat-ti', 'Nama Perawat Belum dipilih.');
            return false;
        } else {
            syams_validation_remove('#perawat-ti');
        }
        if ($('#dokter-ti').val() === '') {
            syams_validation('#dokter-ti', 'Nama Dokter belum di pilih.');
            return false;
        } else {
            syams_validation_remove('#dokter-ti');
        }

        let html = '';
        let ti_tanggal_pengkajian = $('#ti-tanggal-pengkajian').val();   
        let jam_ti = $('#jam-ti').val();
               
        let dokter = $('#s2id_dokter-ti a .select2c-chosen').html();   
        let dokter_ti = $('#dokter-ti').val();
        let perawat = $('#s2id_perawat-ti a .select2c-chosen').html();   
        let perawat_ti = $('#perawat-ti').val();

        let jenis_insulin_ti = $('#jenis-insulin-ti').val();
        let dosis_ti = $('#dosis-ti').val();
        let gula_darah_ti = $('#gula-darah-ti').val();
        let reduksi_ti = $('#reduksi-ti').val();
        let keterangan_ti = $('#keterangan-ti').val();
        let ttd_ti = $('#ttd-ti').is(':checked');
     
        html = /* html */ `
            <tr class="row-in-${++numberTi}">
                <td class="number-pengkajian" align="center">${numberTi++}</td>
                <td align="center">
                    <input type="hidden" name="ti_tanggal_pengkajian[]" value="${ti_tanggal_pengkajian}">${ti_tanggal_pengkajian}
                </td>
                <td align="center">
                    <input type="hidden" name="jam_ti[]" value="${jam_ti}">${jam_ti}
                </td>           
                <td align="center">
                    <input type="hidden" name="perawat_ti[]" value="${perawat_ti}">${perawat}
                </td>              
                <td align="center">
                    <?= $this->session->userdata('nama') ?>
                    <input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="pengkajian_date_terapi_insulin[]" value="<?= date("Y-m-d H:i:s") ?>">  
                    <input type="hidden" name="dokter_ti[]" value="${dokter_ti}">
                    <input type="hidden" name="jenis_insulin_ti[]" value="${jenis_insulin_ti}">
                    <input type="hidden" name="dosis_ti[]" value="${dosis_ti}">
                    <input type="hidden" name="gula_darah_ti[]" value="${gula_darah_ti}">
                    <input type="hidden" name="reduksi_ti[]" value="${reduksi_ti}">
                    <input type="hidden" name="keterangan_ti[]" value="${keterangan_ti}">
                    <input type="hidden" name="ttd_ti[]" value="${ttd_ti ? 1 : 0}">                                    
                </td>
                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#tabel-ti .body-table').append(html);
    }

    function hapusTerapiInsulin(obj, id) {
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
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_terapi_insulin") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Terapi Insulin', data
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
