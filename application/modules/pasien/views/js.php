<script>
    $(function() {
        getListDataPasien(1, '');

		// btn add
        $('#bt_pasien_add').click(function() {
            $('#nama_add').val('');
            $('#kelamin_add').val('');
            $('#tanggal_lahir_add').val('');
            $('#agama_add').val('');
            $('#pendidikan_add').val('');
            $('#no_identitas_add').val('');
            $('#modal_pasien_add').modal('show');
            $('#modal_pasien_add_label').html('Form Tambah Pasien Baru');
            $('#bt_reset_tbl_add').click();
        });        

        $('#bt_reset_tbl_add').click(function() {  
            $('#form-tambah-pasien').hide();         
            $('#pencarian_total_add').html('');
            $('#pencarian_nama_add').val('');
            $('#pencarian_ktp_add').val('');        
            $('#table_pasien_add tbody').empty();
        });

        $('#bt_search_tbl_add').click(function() {  
            getListDataPasienAdd();
        });
		
        // btn search
        $('#bt_search_data').click(function() {
            $('#modal_search').modal('show');
            $('#modal_search_label').html('Parameter Pencarian');
        });

        // btn reload
        $('#bt_reload_data').click(function() {
            resetData();
            getListDataPasien(1, '');
        });

        // btn export
        $('#bt_export_data').click(function() {
            exportDataPasien();
        });

        // tanggal lahir
        $("#tanggal_lahir, #tanggal_lahir_add").datepicker({
            format: 'dd/mm/yyyy',
            endDate: "1d"
        }).on('changeDate', function() {
            var tgl = $(this).val();
            $('#umur_label').html('');
            if (tgl !== '') {
                var umur = hitungUmur(date2mysql(tgl));
                $('#umur_label').html(umur);
            }

            $(this).datepicker('hide');
        });

        // Wilayah
        $('#provinsi').change(function() {
            let no_prop = $('#provinsi').val();
            let nama_prop = $('#provinsi option:selected').text();
            if (no_prop) {
                $('#nama_provinsi').val(nama_prop);
                getKabupaten(no_prop);
            } else {
                $('#kabupaten').empty();
                $('#kecamatan').empty();
                $('#kelurahan').empty();
            }
            // $('#kabupaten').attr('readonly', false);
        });

        $('#kabupaten').change(function() {
            let no_prop = $('#provinsi').val();
            let no_kab = $('#kabupaten').val();
            let nama_kab = $('#kabupaten option:selected').text();
            if (no_kab) {
                $('#nama_kabupaten').val(nama_kab);
                getKecamatan(no_prop, no_kab);
            } else {
                $('#kecamatan').empty();
                $('#kelurahan').empty();
            }
            // $('#kecamatan').attr('readonly', false);
        });

        $('#kecamatan').change(function() {
            let no_prop = $('#provinsi').val();
            let no_kab = $('#kabupaten').val();
            let no_kec = $('#kecamatan').val();
            let nama_kec = $('#kecamatan option:selected').text();
            if (no_kab) {
                $('#nama_kecamatan').val(nama_kec);
                getKelurahan(no_prop, no_kab, no_kec);
            } else {
                $('#kelurahan').empty();
            }
            // $('#kelurahan').attr('readonly', false);
        });

        $('#kelurahan').change(function() {
            let nama_kel = $('#kelurahan option:selected').text();
            $('#nama_kelurahan').val(nama_kel);
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('.custom-select').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('#statuspasien').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
                $('#telp').focus();
            }
        });

    });

    function resetData() {
        $('.form-control, .custom-select').val('');
    }

    function getListDataPasien(p, id) {
        $('#page_now').val(p);
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pasien/api/pasien/get_list_pasien/page/') ?>' + p,
            data: 'search=' + $('#form_search').serialize() + '&id=' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListDataPasien(p - 1);
                    return false;
                }

                $('#pasien_pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#pasien_summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table_pasien tbody').empty();

                let tglBridging = '';
                let backGround = '';
                let border = '';
                let color = '';
                let buttonConsent = '';
                let html = '';

                $.each(data.data, function(i, v) {

                    tglBridging = ((v.tgl_bridging !== null) ? datetimefmysql(v.tgl_bridging) : 'Belum Cek!') ;

                    let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let kelamin = '';
                    if (v.kelamin == 'L') {
                        kelamin = 'Laki - laki';
                    } else {
                        kelamin = 'Perempuan';
                    }

                    if(v.consentid !== null && v.consentid !== ''){

                        backGround = '#00c292';
                        border = '#00c292';
                        color = '#fff';

                        buttonConsent = '<button type="button" title="Pasien Sudah melakukan consent untuk Satu Sehat"  class="btn waves-effect waves-light btn-secondary btn-xs mr-1" style="background-color: ' + backGround + ';color: ' + color + ';border-color: ' + border + ';" onclick="informConsent(\''+v.id+'\', ' + data.page + ')">Consent</button>';

                    } else {

                        backGround = '#1981cd';
                        border = '#1981cd';
                        color = '#fff';

                        buttonConsent = '<button type="button" title="Klik untuk menampilkan inform consent Satu Sehat"  class="btn waves-effect waves-light btn-secondary btn-xs mr-1" style="background-color: ' + backGround + ';color: ' + color + ';border-color: ' + border + ';" onclick="informConsent(\''+v.id+'\', ' + data.page + ')">Consent</button>';

                    }

                    let html = '<tr>' +
                        '<td align="center">' + no + '</td>' +
                        '<td>' + v.id + '</td>' +
                        '<td>' + v.no_identitas + '</td>' +
                        '<td>' + ((v.no_polish != null) ? v.no_polish : '') + '</td>' +
                        '<td>' + v.nama + '</td>' +
                        '<td>' + kelamin + '</td>' +
                        '<td>' + datefmysql((v.tanggal_lahir !== null) ? v.tanggal_lahir : '') + '</td>' +
                        '<td>' + v.telp + '</td>' +
                        '<td>' + v.alamat + '</td>' +
                        '<td>' + v.wilayah + '</td>' +
                        '<td>' + ((v.status_finger === '1') ? 'Terdaftar' : '') + '</td>' +
                        '<td align="right" class="nowrap">' +
                         buttonConsent +
                        '<button type="button" title="'+tglBridging+'" class="btn btn-secondary btn-xs waves-effect waves-light nowrap mr-1" onclick="listBridging(\''+v.id+'\', ' + data.page + ')"><i class="fas fa-sync-alt"></i></button>' +
                        '<button type="button" title="Klik untuk melihat riwayat kunjungan pasien" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="riwayatPasien(\'' + v.id + '\')"><i class="fas fa-eye"></i></button> ' +
                        '<button type="button" title="Klik untuk melihat kartu pasien" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="kartuPasien(\'' + v.id + '\')"><i class="fas fa-address-card"></i></button> ' +
                        '<button type="button" title="Klik untuk melihat penjamin pasien" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="penjaminPasien(\'' + v.id + '\')"><i class="fas fa-umbrella"></i></button> ' +
                        '<button type="button" title="Klik untuk edit" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="editPasien(\'' + v.id + '\', ' + data.page + ')"><i class="fas fa-edit"></i></button> ' +
                        '</td>' +
                        '</tr>';
                    $('#table_pasien tbody').append(html);
                });
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function paging(p) {
        getListDataPasien(p, '');
    }

    function informConsent(id, p) {
        $('#check-consent').prop('checked', false)
        $.ajax({
            type: 'GET',
            url: '<?= base_url('satu_sehat/api/satu_sehat/cek_inform_consent') ?>',
            data: 'id=' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (typeof data.metaData !== 'undefined') {

                    if (data.metaData.code === 200) {

                        messageCustom(data.metaData.message, 'Success');
                        getListDataPasien(p, '');
                        
                    } else {

                        messageCustom(data.metaData.message, 'Error');
                        $('#modal-consent').modal('show');
                        getListDataPasien(p, '');
                        $('#id-consent').val(id);
                        $('#page-consent').val(p);
                    
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

    function listBridging(d, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pasien/api/pasien/list_bridging') ?>',
            data: 'id=' + d,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (typeof data.metaData !== 'undefined') {

                    if (data.metaData.code === 200) {

                        messageCustom(data.metaData.message, 'Success');
                        getListDataPasien(p, '');
                        
                    } else {

                        swalAlert('warning', data.metaData.code, data.metaData.message);
                        getListDataPasien(p, '');
                    
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

    function editPasien(id, p) {
        $('#page_now').val(p);
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pasien/api/pasien/get_pasien') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#no_rm').html('<b>' + data.data.id + '</b>');
                $('#nama').val(data.data.nama);
                $('#kelamin').val(data.data.kelamin);
                $('#tempat_lahir').val(data.data.tempat_lahir);
                $('#tanggal_lahir').val(datefmysql((data.data.tanggal_lahir) ? data.data.tanggal_lahir : ''));
                $('#alamat').val(data.data.alamat);
                $('#no_rt').val(data.data.no_rt);
                $('#no_rw').val(data.data.no_rw);
                $('#no_rumah').val(data.data.no_rumah);
                $('#kode_pos').val(data.data.kode_pos);
                $('#no-bpjs').val(data.data.no_polish);

                $('#provinsi, #kabupaten, #kecamatan, #kelurahan').val('')
                if (data.data.no_prop !== null && data.data.no_kab !== null && data.data.no_kec !== null && data.data.no_kel !== null) {
                    getProvinsi(data.data.no_prop, data.data.nama_prop);
                    getKabupaten(data.data.no_prop, data.data.no_kab, data.data.nama_kab);
                    getKecamatan(data.data.no_prop, data.data.no_kab, data.data.no_kec, data.data.nama_kec);
                    getKelurahan(data.data.no_prop, data.data.no_kab, data.data.no_kec, data.data.no_kel, data.data.nama_kel);
                } else {
                    getProvinsi()
                }

                $('#agama').val(data.data.agama);
                $('#gol_darah').val(data.data.gol_darah);
                $('#pendidikan').val(data.data.id_pendidikan);
                $('#pekerjaan').val(data.data.id_pekerjaan);
                $('#pernikahan').val(data.data.status_kawin);
                $('#telp').val(data.data.telp);
                $('#no_identitas').val(data.data.no_identitas);
                $('#ayah').val(data.data.nama_ayah);
                $('#ibu').val(data.data.nama_ibu);
                $('#status').val(data.data.status);
                $('#etnis').val(data.data.id_etnis);
                $('#statuspasien').val(data.data.status_pasien);
                $('#email').val(data.data.email);

                $('#modal_pasien').modal('show');
                $('#modal_pasien_label').html('Form Edit Pasien');
            },
            error: function() {
                accessFailed(e.status);
            }
        });
    }

    function updateDataPasien() {
        var update = '';
        if ($('#id').val() !== '') {
            update = '/id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('pasien/api/pasien/update_data_pasien') ?>' + update,
            data: $('#form_pasien').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.validasi == false) {
                    $('input[name=csrf_syam]').val(data.token);
                    showErrorValidate('#no_identitas', 'no_identitas', data);
                    showErrorValidate('#nama', 'nama', data);
                    showErrorValidate('#kelamin', 'kelamin', data);
                    showErrorValidate('#tanggal_lahir', 'tanggal_lahir', data);
                    showErrorValidate('#alamat', 'alamat', data);
                    showErrorValidate('#agama', 'agama', data);
                    showErrorValidate('#provinsi', 'provinsi', data);
                    showErrorValidate('#kabupaten', 'kabupaten', data);
                    showErrorValidate('#kecamatan', 'kecamatan', data);
                    showErrorValidate('#kelurahan', 'kelurahan', data);
                    showErrorValidate('#pendidikan', 'pendidikan', data);
                    showErrorValidate('#telp', 'telp', data);
                    showErrorValidate('#etnis', 'etnis', data);

                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if (data.status == false) {
                        messageEditFailed();
                    } else {
                        messageEditSuccess();
                        getListDataPasien($('#page_now').val(), data.id);

                        resetData();
                        $('#modal_pasien').modal('hide');
                    }
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

    // All Provinsi
    function getProvinsi(no_prop = null, nama_prop = null) {
        $.ajax({
            url: '<?= base_url('opendata/api/opendata/get_provinsi') ?>',
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';
                html += '<option value="">Pilih Provinsi</option>';
                $.each(data.data, function(i, v) {
                    html += '<option value="' + v.NO_PROP + '">' + v.NAMA_PROP + '</option>';
                });

                $('#provinsi').html(html);

                if (no_prop) {
                    $('#provinsi').val(no_prop);
                }

                if (nama_prop) {
                    $('#nama_provinsi').val(nama_prop);
                }else{
                    $('#nama_provinsi').val($('#provinsi option:selected').text())
                }
            },
        });
    }

    // All Kabupaten
    function getKabupaten(no_prop, no_kab = null, nama_kab = null) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('opendata/api/opendata/get_list_kabupaten') ?>/no_prop/' + no_prop,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';
                html += '<option value="">Pilih Kabupaten</option>';
                $.each(data.data, function(i, v) {
                    html += '<option value="' + v.NO_KAB + '">' + v.NAMA_KAB + '</option>';
                });

                $('#kabupaten').html(html);

                if (no_kab) {
                    $('#kabupaten').val(no_kab);
                }

                if (nama_kab) {
                    $('#nama_kabupaten').val(nama_kab);
                }else{
                    $('#nama_kabupaten').val($('#kabupaten option:selected').text())
                }
            },
        });
    }

    // All Kecamatan
    function getKecamatan(no_prop, no_kab, no_kec = null, nama_kec = null) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('opendata/api/opendata/get_list_kecamatan') ?>/no_prop/' + no_prop + '/no_kab/' + no_kab,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';
                html += '<option value="">Pilih Kecamatan</option>';
                $.each(data.data, function(i, v) {
                    html += '<option value="' + v.NO_KEC + '">' + v.NAMA_KEC + '</option>';
                });

                $('#kecamatan').html(html);

                if (no_kec) {
                    $('#kecamatan').val(no_kec);
                }

                if (nama_kec) {
                    $('#nama_kecamatan').val(nama_kec);
                }else{
                    $('#nama_kecamatan').val($('#kecamatan option:selected').text())
                }
            },
        });
    }

    // All Kelurahan
    function getKelurahan(no_prop, no_kab, no_kec, no_kel = null, nama_kel = null) {
        $.ajax({
            url: '<?= base_url('opendata/api/opendata/get_list_kelurahan') ?>/no_prop/' + no_prop + '/no_kab/' + no_kab + '/no_kec/' + no_kec,
            type: 'GET',
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = '';
                html += '<option value="">Pilih Kelurahan</option>';
                $.each(data.data, function(i, v) {
                    html += '<option value="' + v.NO_KEL + '">' + v.NAMA_KEL + '</option>';
                });

                $('#kelurahan').html(html);

                if (no_kel) {
                    $('#kelurahan').val(no_kel);
                }

                if (nama_kel) {
                    $('#nama_kelurahan').val(nama_kel);
                }else{
                    $('#nama_kelurahan').val($('#kelurahan option:selected').text())
                }
            },
        });
    }

    // Export
    function exportDataPasien() {
        location.href = '<?= base_url() ?>pasien/export_data_pasien?search=' + $('#form_search').serialize();
    }

    function kartuPasien(id) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pasien/api/pasien/get_pasien') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let html = `<div class="container" style="position: relative;text-align: center;color: black;">
                                <img src="<?= resource_url() ?>images/backgrounds/kartu_pasien.png" style="height:290px;">
                                <table style="position: absolute;top: 60%;left: 50%;transform: translate(-50%, -50%);border: 0;width: 80%;">
                                    <tr>
                                        <td colspan="3"><h3><strong>Kartu Pasien</strong></h3></td>
                                    </tr>
                                    <br>
                                    <tr>
                                        <td width="30%" align="left">Nomor RM</td>
                                        <td width="1%">:</td>
                                        <td width="69%" align="left"><b>` + data.data.id + `</b></td>
                                    </tr>
                                    <tr>
                                        <td align="left">Nama</td>
                                        <td>:</td>
                                        <td align="left">` + data.data.nama + `</td>
                                    </tr>
                                    <tr>
                                        <td align="left">Tgl Lahir</td>
                                        <td>:</td>
                                        <td align="left">` + indo_tgl(data.data.tanggal_lahir) + `</td>
                                    </tr>
                                    <tr>
                                        <td align="left">Jenis Kelamin</td>
                                        <td>:</td>
                                        <td align="left">` + data.data.kelamin + `</td>
                                    </tr>
                                    <tr>
                                        <td align="left">Alamat</td>
                                        <td>:</td>
                                        <td align="left">` + data.data.alamat + `</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="10px"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><img src="<?= base_url() ?>pendaftaran_poli/generate_barcode_v2/` + data.data.id + `"></td>
                                    </tr>
                                </table>
                            </div>`;

                Swal.fire({
                    html: html,
                    // confirmButtonText: '<i class="fas fa-check-circle m-r-5"></i>Close',
                    showConfirmButton: false,
                });
            },
            error: function() {
                accessFailed(e.status);
            }
        });
    }
	
	function addDataPasien() {    
        $.ajax({
            type: 'POST',
            url: '<?= base_url('pasien/api/pasien/add_data_pasien') ?>',
            data: $('#form_pasien_add').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status == false) {
                    messageEditFailed();
                } else {
                    swalAlert('info', 'Data pasien', 'No RM = ' + data.id);
                    resetData();
                    $('#modal_pasien_add').modal('hide');
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
	
	function getListDataPasienAdd() {        
        $nama = $('#pencarian_nama_add').val();
        $ktp  = $('#pencarian_ktp_add').val();

        if($nama == '' && $ktp == ''){
            swalAlert('info', 'Cek Data pasien', 'Pilih pencarian minimal memilih salah satu, Nama / No KTP !');
        } else {
            $.ajax({
                type: 'GET',
                url: '<?= base_url('pasien/api/pasien/get_list_pasien_add') ?>',
                data: 'nama=' + $nama + '&ktp=' + $ktp,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    $('#table_pasien_add tbody').empty();
                    $('#pencarian_total_add').html('Jumlah Data : ' + data.jumlah);
                    data.jumlah == 0 ? $('#form-tambah-pasien').show() : $('#form-tambah-pasien').hide() ;                
                    $('#nama_add').val($nama);
                    $('#no_identitas_add').val($ktp);
                    let html = '';

                    $.each(data.data, function(i, v) {
                        let kelamin = v.kelamin == 'L' ? 'Laki - laki' : 'Perempuan';

                        let html = '<tr>' +
                            '<td align="center">' + (i + 1)+ '</td>' +
                            '<td>' + v.id + '</td>' +
                            '<td>' + v.no_identitas + '</td>' +
                            '<td>' + v.nama + '</td>' +
                            '<td>' + kelamin + '</td>' +
                            '<td>' + datefmysql((v.tanggal_lahir !== null) ? v.tanggal_lahir : '') + '</td>' +
                            '<td>' + v.telp + '</td>' +
                            '<td>' + v.alamat + '</td>' +
                            '<td>' + v.wilayah + '</td>' +
                            '</tr>';
                        $('#table_pasien_add tbody').append(html);
                    });
                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    accessFailed(e.status);
                    hideLoader();
                }
            });
        }
    }

    function kycPasien() {

        $.ajax({
            type: 'GET',
            url: '<?= base_url('pasien/api/pasien/kycPasien') ?>',
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                window.open(data,"_blank")

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
            }

        });

    }
	
</script>