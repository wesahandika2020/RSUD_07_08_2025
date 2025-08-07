<script>
    $(function() {
        $('#operator').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#profesi').val(),
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.nama+'<br/><i>'+data.spesialisasi+'</i>';
                return markup;
            },
            formatSelection: function(data){
                return data.nama;
            }
        });

        $('#tindakan').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pemeriksaan_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        kelas: $('#kelas-tindakan').val(),
                        //penjamin: id_pj,
                        jenis: $('#jenis-rawat').val(),
                        unit: $('#unit').val(),
                        page: page, // page number
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var total = (data.total !== '') ? ('Rp. ') + numberToCurrency(data.total) : '';

                var kelas = (data.kelas !== null) ? (' kelas ') + data.kelas : '';
                var bobot = (data.bobot !== null) ? (' ') + data.bobot : '';
                var instalasi = (data.instalasi !== null) ? (' '+data.instalasi+' ') : '';
                var markup = '<b>' + data.layanan+'</b> <br/>' + data.layanan_parent + '<br/>' + instalasi + data.jenis + bobot + ' ' + kelas + (data.keterangan !== null ? ' ' + data.keterangan : '') + '<br/>' + total;

                return markup;
            },
            formatSelection: function(data){
                $('#tarif-tindakan').val(data.total);
                var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
                return data.layanan + ', ' + data.jenis + ', ' + data.bobot + kelas + ' ' + (data.keterangan !== null ? data.keterangan : '')
            }
        });
		
		$('#tindakan-icd9').select2c({
			ajax: {
				url: "<?= base_url('pengkodean_icd_x/api/Pengkodean_icd_x_auto/code_icd9_auto') ?>",
				dataType: 'JSON',
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
				var markup = '<b>' + data.icd9 + '</b> <br/>' + data.nama;
				return markup;
			},
			formatSelection: function(data) {
				$('#tindakan-icd9').val(data.id);
				return '['+data.icd9+'] '+data.nama;
			}
		});
		
		$('#tindakan-icd9-ok').select2c({
            ajax: {
                url: "<?= base_url('pengkodean_icd_x/api/Pengkodean_icd_x_auto/code_icd9_auto') ?>",
                dataType: 'JSON',
                quietMillis: 100,
                data: function(term, page) { // pag e is the one-based page number tracked by Select2
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
                var markup = '<b>' + data.icd9 + '</b> <br/>' + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                $('#tindakan-icd9-ok').val(data.id);
                return '['+data.icd9+'] '+data.nama;
            }
        });

        // $('#unit').select2c({
        //     ajax: {
        //         url: "<?= base_url('masterdata/api/masterdata_auto/unit_auto') ?>",
        //         dataType: 'json',
        //         quietMillis: 100,
        //         data: function (term, page) { // page is the one-based page number tracked by Select2
        //             return {
        //                 q: term, //search term
        //                 page: page, // page number
        //             };
        //         },
        //         results: function (data, page) {
        //             var more = (page * 20) < data.total; // whether or not there are more results available

        //             // notice we return the value of more so Select2 knows if more results can be loaded
        //             return {results: data.data, more: more};
        //         }
        //     },
        //     formatResult: function(data){
        //         var markup = data.nama;
        //         return markup;
        //     },
        //     formatSelection: function(data){
        //         return data.nama;
        //     }
        // });

        // Operator Edit
        $('#operator-eo').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#profesi-eo').val(),
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.nama+'<br/><i>'+data.spesialisasi+'</i>';
                return markup;
            },
            formatSelection: function(data){
                return data.nama;
            }
        });

        // remove validation
        $('.form-control').keyup(function() {
            if ($(this).val() === '') {
                syams_validation_remove(this);
            }
        });

        $('.select2c-input, .select2-input').change(function() {
            if ($(this).val() === '') {
                syams_validation_remove(this);
            }
        });
    });

    function addTindakan() {
        if ($('#operator').val() === '') {
            syams_validation('#operator', 'Kolom dokter harus diisi.');
            return false;
        }

        if ($('#tindakan').val() === '') {
            syams_validation('#tindakan', 'Kolom tindakan harus diisi.');
            return false;
        }

        let html = '';
        let qty = $('#jumlah-tindakan').val();
        let number = $('.number-tindakan').length;
        let operator = $('#s2id_operator a .select2c-chosen').html();
        let id_operator = $('#operator').val();
        let tindakan = $('#s2id_tindakan a .select2c-chosen').html();
        let id_tindakan = $('#tindakan').val();
        let tarif_item = $('#tarif-tindakan').val();
        let tarif = parseInt(tarif_item) * parseInt(qty);
		
		let tindakan_icd9   = $('#s2id_tindakan-icd9 a .select2c-chosen').html();
        let id_tindakan_icd9= $('#tindakan-icd9').val();
        if (typeof id_tindakan_icd9 == 'undefined' || id_tindakan_icd9 == 'undefined') {
            tindakan_icd9   = '';
            id_tindakan_icd9= '';
        }

        const id_layanan_pendaftaran = $('#id-layanan').val();

        let tindakanData = [];

        $('#table-tindakan tbody tr').each(function() {
            let row = $(this);
            
            let operatorId = row.find('input[name="id_operator[]"]').val();
            let tindakanId = row.find('input[name="id_tindakan[]"]').val();

            if(!operatorId && !tindakanId){
                return;
            }
            
            tindakanData.push({
                operator: operatorId,
                tindakan: tindakanId
            });
        });

        $.get('<?= base_url("pelayanan/api/pelayanan/check_tindakan_dokter_spesialis") ?>', {
            tindakan_data: tindakanData,
            id_tindakan,
            id_layanan_pendaftaran,
            id_operator,
        }, function(res){
            if(!res.success){
                swalAlert('info', 'Informasi', 'Tindakan pemeriksaan dan konsultasi tidak dapat diinput lebih dari satu kali untuk dokter yang sama dalam satu kunjungan (visit) yang sama.')
            }else{
                html = /* html */ `
                    <tr>
                        <td class="number-tindakan" align="center">${++number}</td>
                        <?php if($this->session->userdata('account_group') === 'Admin'){ ?>
                        <td class="center"></td>
                        <?php } else { ?>
                        <?php } ?>
                        <td><input type="hidden" name="id_operator[]" value="${id_operator}">${operator}</td>
                        <td><input type="hidden" name="id_tindakan[]" value="${id_tindakan}">${tindakan}</td>
                        <td><input type="hidden" name="id_tindakan_icd9[]" value="${id_tindakan_icd9}">${tindakan_icd9}</td>
                        <td><input type="text" name="qty[]" id="qty${number}" value="${qty}" class="jumlah custom-form col-lg-5 mx-auto" style="text-align: center"></td>
                        <td class="right"><input type="hidden" id="trfh${number}" value="${tarif_item}" style="text-align: right"><span id="trf${number}">${numberToCurrency(tarif)}</span></td>
                        <td><?= $this->session->userdata("nama") ?></td>
                        <td align="right">
                            <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                `;
                $('#table-tindakan tbody').append(html);
                $('#qty' + number).keyup(function() {
                    let jml = $(this).val();
                    let trf = $('#trfh' + number).val();
                    if (jml !== '') {
                        $('#trf' + number).html(numberToCurrency(parseInt(trf) * parseInt(jml)));
                    }
                });

                $('#jumlah-tindakan').val(1);
                $('#tindakan, #tindakan-icd9, #tarif-tindakan').val('');
                $('#s2id_tindakan a .select2c-chosen').html('');
                $('#s2id_tindakan-icd9 a .select2c-chosen').html('');
            }
        })		

        // updateScroll('tindakan-scroll');
    }

    function removeList(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function showTindakan(data) {
        $('#table-tindakan tbody').empty();
        if (data !== null) {
            let waktu = '';
            let btnHapus = '';
            let btnDokter = '';
            
            $.each(data, function(i, v) {

                num = ++i;
                waktu = ((v.tanggal !== null) ? datetimefmysql(v.tanggal) : '');
                onclik_waktu = `onclick="editWaktuTindakan('${v.id}', '${waktu}')" style="text-decoration: underline"`;
                onclik_operator = `onclick="editOperator(${v.id})" style="text-decoration: underline"`;
                operator = v.operator;
                list_tindakan = `${v.layanan}&nbsp;${(v.keterangan !== null ? v.keterangan : '')}`;
                list_tindakan_icd9 = `${(v.icd9 !== null ? v.icd9 : '')}`;
                jumlah_tindakan = '1';
                total_tarif_tindakan = `${numberToCurrency(v.total)}`;
                users_tindakan = v.nama_users;
                disable_btnHapus = '';

                if (v.log != '0') {
                    num = `<s> ${num} </s>`;
                    waktu = `<s> ${waktu} </s>`;
                    onclik_waktu = '';
                    onclik_operator = '';
                    operator = `<s> ${operator} </s>`;
                    list_tindakan = `<s> ${list_tindakan} </s>`;
                    list_tindakan_icd9 = `<s> ${list_tindakan_icd9} </s>`;
                    jumlah_tindakan = `<s> ${jumlah_tindakan} </s>`;
                    total_tarif_tindakan = `<s> ${total_tarif_tindakan} </s>`;
                    users_tindakan = `<s> ${users_tindakan} </s>`;
                    disable_btnHapus = `disabled`;
                }

                if (v.id_history_pembayaran === null) {
                    btnHapus = `<button type="button" class="btn btn-secondary btn-xxs" ${disable_btnHapus} onclick="removeTindakan(this, ${v.id})"><i class="fas fa-trash-alt"></i></button>`;
                }

                // </?php //else : ?>
                // <td class="center">${waktu}</td> *INI IF STATMENT YG DIBAWAH*
                let html = /* html */ `
                    <tr>
                        <td class="number-tindakan" align="center">${num}</td>
                        
                        </?php if ($this->session->userdata('account_group') === 'Admin') : ?>
                        <td class="center"><span class="pointer" ${onclik_waktu} title="Klik untuk mengedit waktu entri tindakan">${waktu}</span></td>
                        </?php endif ?>
                        
						<?php
                        // $allowed_groups = ['Admin'];
                        $allowed_groups = ['Admin', 'Dokter Spesialis', 'Dokter Spesialis RM', 'Dokter Umum'];
                        if (in_array($this->session->userdata('account_group'), $allowed_groups)) { ?>
                            <td><span class="pointer" ${onclik_operator} title="Klik untuk mengedit operator">${operator}</span></td>
                        <?php } else { ?>
                            <td><span class="pointer"  title="Ubah operator hanya bisa dilakukan Admin">${operator}</span></td>
                        <?php } ?>

                        <td>${list_tindakan}</td>
                        <td>${list_tindakan_icd9}</td>
                        <td class="center">${jumlah_tindakan}</td>
                        <td class="right">${total_tarif_tindakan}</td>
                        <td>${users_tindakan}</td>
                        <td class="right">${btnHapus}</td>
                    </tr>
                `;

                $('#table-tindakan tbody').append(html);
            });
        }
    }

    function removeTindakan(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-window-close"></i> Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt"></i>  Hapus',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type : 'DELETE',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_tindakan_pemeriksaan") ?>/'+id+'/'+JENIS_LAYANAN,
                            cache: false,
                            dataType : 'json',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                }else{
                                    customAlert('Hapus Tindakan', data.message);
                                }
                            },
                            error: function(e){
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }

    // edit operator
    function editOperator(id) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_tindakan_detail") ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.data !== null) {
                    $('#id-tarif-tindakan-eo').val(id);
                    $('#tindakan-label-eo').html('<b>' + data.data.layanan + '</b>');
                    $('#operator-eo').val(data.data.id_operator);
                    $('#s2id_operator-eo a .select2-input').html(data.data.operator);
                    $('#modal-edit-operator').modal('show');
                } else {
                    customAlert('Edit Operator', 'Data tidak ditemukan !');
                }
            },
            error: function(e) {
                accessFailed(e.statusText);
            }
        });
    }

    // simpan edit operator
    function simpanEditOperator() {
        if ($('#operator-eo').val() === '') {
            syams_validation('#operator-eo', 'Kolom operator harus diisi.');
            return false;
        }

        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_operator_tindakan") ?>',
            data: $('#form-edit-operator').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {

                $('#table-tindakan tbody').empty();
                listTindakan($('#id-layanan').val());
                messageEditSuccess();
                $('#modal-edit-operator').modal('hide');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function listTindakan(id_layanan) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_tindakan_list") ?>/id_layanan/' + id_layanan,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                showTindakan(data.data);
            },
            error: function(e) {
                accessFailed();
            }
        });
    }

    function editWaktuTindakan(id, waktu) {
        bootbox.dialog({
            title : 'Edit Waktu Input Tindakan',
            message: /* html */ `
                <div class="row">
                    <div class="col-lg-12">
                        <form class="horizontal" id="form-edit-waktu-tindakan">
                            <div class="form-group">
                                <label>Waktu</label>
                                <input type="text" name="waktu" id="waktu-input-edit" value="${waktu}" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            `,

            buttons: {
                success: {
                    label: '<i class="fas fa-save mr-2"></i>Simpan',
                    className: 'btn-info',
                    callback: function() {
                        let waktuInputEdit = $('#waktu-input-edit').val();
                        simpanWaktuTindakan(id, waktuInputEdit);
                    }
                }
            }
        });

        $('#waktu-input-edit').datetimepicker({
            format: 'DD/MM/YYYY HH:mm'
        }).on('changeDate', function() {
            $(this).datetimepicker('hide');
        });

        $('#form-edit-waktu-tindakan').submit(function() {
            let waktuInputEdits = $('#waktu-input-edit').val();
            simpanWaktuTindakan(id, waktuInputEdits);
            $('.bootbox').modal('hide');
            return false;
        });
    }

    function simpanWaktuTindakan(id, waktu) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_waktu_tindakan") ?>',
            data: 'id=' + id + '&waktu=' + datetime2mysql(waktu),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    $('#table-tindakan tbody').empty();
                    listTindakan(data.id_layanan_pendaftaran);
                    messageEditSuccess();
                } else {
                    messageEditFailed();
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
</script>