<script>
    var data_merge = null;
    $(function() {
        $('#bt_merge_pasien').click(function() {
            resetPasienUtama();
            resetPasienMerge();
            $('#modal_merge').modal('show');
            $('#modal_merge_label').html('Form Penggabungan Pasien');
        });

		$('#bt_merge_pasien_history').click(function() {            
            $('#pasien_log').val('');
            $('#table_utama_log tbody').empty();
            $('#table_gabungan_log tbody').empty();
            $('#modal_merge_log').modal('show');
            $('#modal_merge_log_label').html('Form Penggabungan Data Pasien (History)');
        });
		
        $('#pasien_utama').select2({
            ajax: {
                url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
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
                var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '<br/>' + data.alamat;
                return markup;
            },
            formatSelection: function(data) {
				var umur = '';
				if (data.tanggal_lahir !== null) {
					umur = hitungUmur(data.tanggal_lahir) + ' (' + datefmysql(data.tanggal_lahir) + ')';
				}

                $('#nik_gabung').html(data.no_identitas);
                $('#tgllahir_gabung').html(umur);
                $('#alamat_gabung').html(data.alamat);
                return '<b>' + data.id + '</b> ' + data.nama;
            }
        });

        $('#pasien_gabung').select2({
            ajax: {
                url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
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
                var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '<br/>' + data.alamat;
                return markup;
            },
            formatSelection: function(data) {
                data_merge = data;
                return '<b>' + data.id + '</b> ' + data.nama;
            }
        });
    });

    function resetPasienUtama() {
        $('#nik_gabung').html('');
        $('#tgllahir_gabung').html('');
        $('#alamat_gabung').html('');
        $('#pasien_utama').val('');
        $('#s2id_pasien_utama a .select2-chosen').html('');
    }

    function resetPasienMerge() {
        $('#pasien_gabung').val('');
        $('#s2id_pasien_gabung a .select2-chosen').html('');
        syams_validation_remove('#pasien_gabung');
        data_merge = null;
        $('#table_merge tbody').empty();
    }

    function resetPasienMergeV2() {
        $('#pasien_gabung').val('');
        $('#s2id_pasien_gabung a .select2-chosen').html('');
        syams_validation_remove('#pasien_gabung');
        data_merge = null;
    }

    function pilihPasienMerge() {
        if (data_merge != null) {
            let kelamin = '';
            let ktp ='';

            if (data_merge.kelamin == 'L') {
                kelamin = 'Laki - laki';
            } else if (data_merge.kelamin == 'P') {
                kelamin = 'Perempuan';
            }

			if($('#nik_gabung').html()!=data_merge.no_identitas){
                ktp='<b style="color:red"> (Tidak Sama)</b>'
            }
			
            let html = '<tr class="number_merge">' +
                '<td align="center">' + data_merge.id + '<input type="hidden" name="pasien_merge[]" value="' + data_merge.id + '"></td>' +
                '<td>' + data_merge.no_identitas + ktp + '</td>' +
                '<td>' + data_merge.nama + '</td>' +
                '<td>' + kelamin + '</td>' +
                '<td>' + ((data_merge.tanggal_lahir !== null) ? datefmysql(data_merge.tanggal_lahir) : '') + '</td>' +
                '<td>' + data_merge.alamat + '</td>' +
                '</tr>';
            $('#table_merge tbody').append(html);
            resetPasienMergeV2();
        } else {
            syams_validation('#pasien_gabung', 'Pilih pasien terlebih dahulu');
        }
    }

    function prosesMerge() {
        let stop = false;

        if ($('#pasien_utama').val() === '') {
            syams_validation('#pasien_utama', 'Pilih pasien terlebih dahulu');
            stop = true;
        }

        if ($('.number_merge').length < 1) {
            syams_validation('#pasien_gabung', 'Pilih pasien terlebih dahulu');
            stop = true;
        }

        if (stop) {
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('pasien/api/pasien/proses_merge_pasien') ?>',
            data: $('#form_merge').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.pasien_utama == false) {
                    syams_validation('#pasien_utama', data.message)
                } else {
                    let type = 'Success';
                    if (data.status == false) {
                        type = 'Error';
                        messageCustom(data.message, type);
                    } else {
                        messageCustom(data.message, type);
                        getListDataPasien($('#page_now').val(), '');
                        $('#modal_merge').modal('hide');
                    }
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Gagal melakukan penggabungan pasien', 'Error')
            }
        });
    }
	
	function getMergeHistory(){
        let stop = false;   

        if ($('#pasien_log').val() === '') {
            syams_validation('#pasien_log', 'Pilih pasien terlebih dahulu');
            stop = true;
        }

        if (stop) {
            return false;
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url('pasien/api/pasien/get_merge_history') ?>',
            data: 'id_pasien=' + $('#pasien_log').val() ,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },  
            success: function(data) {                               
                
                $('#table_utama_log tbody').empty();
                $('#table_gabungan_log tbody').empty();

                $.each(data.utama, function(i, v) {
                    var html = /* html */
                        '<tr>' +
                        '<th class="center">' + v.id + '</th>' +
                        '<th class="left">' + v.no_identitas + '</th>' +
                        '<th class="left">' + (v.no_polish !== null ? v.no_polish : '-') + '</th>' +
                        '<th align="left">' + v.nama+ '</th>' +
                        '<th align="left">' + (v.kelamin == 'P' ? 'Perempuan' : (v.kelamin == 'L' ? 'Laki-Laki' : '-'))+ '</th>' +
                        '<th align="left">' + v.tanggal_lahir+ '</th>' +
                        '<th align="left">' + (v.alamat_lengkap !== null ? v.alamat_lengkap : '-')+ '</th>' +
                        '</tr>';
                    $('#table_utama_log tbody').append(html);
                })

                $.each(data.log, function(i, v) {
                    var html = /* html */
                        '<tr>' +
                        '<th class="center">' + v.id_lama + '</th>' +
                        '<th class="left">' + v.no_identitas + '</th>' +
                        '<th class="left">' + (v.no_polish !== null ? v.no_polish : '-') + '</th>' +
                        '<th align="left">' + v.nama+ '</th>' +
                        '<th align="left">' + (v.kelamin == 'P' ? 'Perempuan' : (v.kelamin == 'L' ? 'Laki-Laki' : '-'))+ '</th>' +
                        '<th align="left">' + v.tanggal_lahir+ '</th>' +
                        '<th align="left">' + (v.alamat_lengkap !== null ? v.alamat_lengkap : '-')+ '</th>' +
                        '<th align="left">' + v.petugas+ '</th>' +
                        '<th align="left">' + v.created_date+ '</th>' +
                        '</tr>';
                    $('#table_gabungan_log tbody').append(html);
                })

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Gagal melakukan penggabungan pasien', 'Error')
            }
        });
    }
</script>