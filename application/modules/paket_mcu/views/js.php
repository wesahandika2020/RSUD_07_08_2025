<script src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
	$(function() {
		getList(1);

		$('#btn-tambah').click(function() {
			resetForm();
            $('#modal-add').modal('show');
            $('#modal-add-label').html('Tambah Paket Medical Check Up');
			$('#input-tindakan').show();
			$('.input-paket').val('');
			$('.input-paket').prop('readonly', false);
			$('#table-list tbody').empty();
			
			let htmlFooter = /* html */ `
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i
						class="fas fa-window-close"></i> Batal</button>
				<button type="button" class="btn btn-info waves-effect" onclick="confirmation()"><i
						class="fas fa-save"></i> Simpan</button>
			`;  

			$('#footer').append(htmlFooter);

			let htmlButton = /* html */ `
				<div class="col-lg-9">
					<button type="button" class="btn btn-info" onclick="addToForm()"><i class="fa fa-arrow-circle-down"></i> Tambahkan</button>
				</div>
			`;  

			$('#button').append(htmlButton);            
        });

		$('#tindakan-auto').select2c({
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
                var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
                return data.layanan + ', ' + data.jenis + ', ' + (data.bobot !== null ? data.bobot : '') + kelas + ' ' + (data.keterangan !== null ? data.keterangan : '')
            }
        });		
	});

	function resetForm() {
		$('#footer').empty();
		$('#button').empty();
        $('input[type=text], select, textarea, #id').val('');
        $('input[type=radio]').removeAttr('checked');
        $('a .select2-chosen').html('');                     
    }

	function addListTindakan(idTindakan, namaTindakan) {
		syams_validation_remove('#tindakan-auto');

        let i = $('.tr-rows').length+1;
        let html = /* html */ `
            <tr class="tr-rows">
                <td class="center">${i}</td>
                <td>${namaTindakan}<input type="hidden" name="list_tindakan[]" value="${idTindakan}" /></td>
                <td class="right"><button type="button" class="btn btn-secondary btn-xs" onclick="removeThisItem(this)"><i class="fa fa-trash-alt"></i></button></td>
            </tr>
        `;

        $('#table-list tbody').append(html);
    }

	function removeThisItem(el) {
        let parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

	function confirmation() {
        bootbox.dialog({
            message: "Anda yakin akan menyimpan data ini?",
            title: "Konfirmasi",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                simpan: {
                    label: '<i class="fas fa-check-circle mr-1"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        save();
                    }
                }
            }
        });
    }

	function save() {
		if ($('#nama-paket').val() === '') {
            syams_validation('#nama-paket', 'Kolom nama paket harus diisi.');
            $('#nama-paket').focus();            
            return false;
        }

		syams_validation_remove('#nama-paket');

		if ($('#harga-paket').val() === '') {
            syams_validation('#harga-paket', 'Kolom harga paket harus diisi.');
            $('#harga-paket').focus();            
            return false;
        }

		syams_validation_remove('#harga-paket');

		let jumlah = $('.tr-rows').length;
        if (jumlah === 0) {
            swalAlert('warning', 'Validasi', 'Belum ada data tindakan yang dipilih.');
			return false;
        }

		$.ajax({
            type: 'POST',
            url: '<?= base_url('paket_mcu/api/paket_mcu/store') ?>',
            data: $('#form-add-paket').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
					messageCustom(data.message, 'Success');
					$('#modal-add').modal('hide');
					getList(1);		
				} else {
					messageCustom(data.message, 'Error');
				}
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
	}

	function getList(p) {
		$('#page-now').val(p);

        $.ajax({
            type: 'GET',
            url: '<?= base_url('paket_mcu/api/paket_mcu/get_list/page/') ?>' + p,
            data: 'keyword=' + $('#keyword').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getList(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table-data tbody').empty();

                $.each(data.data, function(i, v) {                    
                    let active = /* html */ `
                        <button type="button" class="btn btn-secondary btn-xs" title="Klik untuk mengaktifkan" onclick="confirmationActivate(${v.id}, '1')">
                            <i class="fas fa-toggle-off"></i>
                        </button>`;
                    let redBlock = 'style="background:red; color:white;"';

                    if (v.is_active == 1) {
                        active = /* html */ `
                        <button type="button" class="btn btn-secondary btn-xs" title="Klik untuk me-nonaktifkan" onclick="confirmationActivate(${v.id}, '0')">
                            <i class="fas fa-toggle-on"></i>
                        </button>`;
                        redBlock = '';
                    }

                    let html = /* html */ `
                        <tr ${redBlock}>
                            <td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
                            <td class="center">${v.nama}</td>                            
                            <td class="center">Rp. ${v.harga}</td>                            
                            <td class="center aksi">
                                <button type="button" class="btn btn-secondary btn-xs" onclick="readPaket(${v.id})"><i class="fa fa-eye"></i></button>
                                <button type="button" class="btn btn-secondary btn-xs" onclick="editPaket(${v.id})"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-secondary btn-xs" onclick="confirmationDelete(${v.id})"><i class="fa fa-trash-alt"></i></button>
                                ${active}
                            </td>
                        </tr>
                    `;  

                    $('#table-data tbody').append(html);
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

	function readPaket(id)
	{
		$('#footer').empty();
		$('#button').empty();
		$('#input-tindakan').hide();
		$('.input-paket').prop('readonly', true);

		getListTindakanPaket(id, 'read')

		$('#modal-add-label').html('Detail Paket Medical Check Up');
		$('#modal-add').modal('show');		
	}

	function addToForm()
	{
		let idTindakan      = $('#tindakan-auto').val();
		let namaTindakan    = $('#s2id_tindakan-auto a .select2c-chosen').html();
		
		if (idTindakan === '') {
			syams_validation('#tindakan-auto', 'Tindakan harus dipilih!'); return false;
		}
		addListTindakan(idTindakan, namaTindakan);
		$('#tindakan-auto').val('');
		$('#s2id_tindakan-auto a .select2c-chosen').html('');
	}

	function confirmationDelete(id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Konfirmasi",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                simpan: {
                    label: '<i class="fas fa-check-circle mr-1"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        deletePaket(id);
                    }
                }
            }
        });
    }

	function deletePaket(id)
	{
		$.ajax({
            type: 'POST',			
            url: '<?= base_url("paket_mcu/api/paket_mcu/delete_paket") ?>',
            data: {
				idPaket : id
			},
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
					messageCustom(data.message, 'Success');					
					getList(1);			
				} else {
					messageCustom(data.message, 'Error');
				}
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
	}

	function confirmationActivate(id, status)
	{
		var message = '';

		if (status == 1) {
			message = 'Anda yakin akan mengaktifkan data ini?';
		}else {
			message = 'Anda yakin akan mengnonaktifkan data ini?';
		}

		bootbox.dialog({
            message: message,
            title: "Konfirmasi",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                simpan: {
                    label: '<i class="fas fa-check-circle mr-1"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        activatePaket(id, status);
                    }
                }
            }
        });
	}

	function activatePaket(id, status)
	{
		$.ajax({
            type: 'POST',			
            url: '<?= base_url("paket_mcu/api/paket_mcu/activate_paket") ?>',
            data: {
				id : id,
				status : status
			},
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
					messageCustom(data.message, 'Success');					
					getList(1);			
				} else {
					messageCustom(data.message, 'Error');
				}
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
	}

	function editPaket(id)
	{		
		resetForm()
		$('#input-tindakan').show()		
		$('.input-paket').prop('readonly', false)		
		$('#table-list tbody').empty()					

		let htmlButton = /* html */ `
			<div class="col-lg-9">
				<button type="button" class="btn btn-info" onclick="addToForm()"><i class="fa fa-arrow-circle-down"></i> Tambahkan</button>
			</div>
		`;  

		$('#button').append(htmlButton)				

		$.ajax({
			type: 'GET',
			url: '<?= base_url("paket_mcu/api/paket_mcu/get_detail") ?>/id_paket/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				
				$('#table-list tbody').empty();
				
				$.each(data, function(i, v) {
					$('#id-paket').val(v.id_paket);
					$('#nama-paket').val(v.nama_paket);	
					$('#harga-paket').val(v.harga_paket);

					let j = $('.tr-rows').length+1;
					let htmlReadTindakan = /* html */ `
						<tr class="tr-rows">
							<td class="center">${j}</td>
							<td>${v.nama_tindakan}<input type="hidden" name="list_tindakan[]" value="${v.id_tindakan}" /></td>
							<td class="right"><button type="button" class="btn btn-secondary btn-xs" onclick="confirmationRemoveTindakan(${v.id_paket}, ${v.id_tindakan})"><i class="fa fa-trash-alt"></i></button></td>
						</tr>
					`;

					$('#table-list tbody').append(htmlReadTindakan);					
				});							

				let htmlFooter = /* html */ `
					<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i
							class="fas fa-window-close"></i> Batal</button>
					<button type="button" class="btn btn-info waves-effect" onclick="confirmationEdit()"><i
							class="fas fa-save"></i> Simpan</button>
				`;  

				$('#footer').append(htmlFooter)
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});

		$('#modal-add-label').html('Edit Paket Medical Check Up')
		$('#modal-add').modal('show')
	}

	function confirmationEdit()
	{		
        bootbox.dialog({
            message: "Anda yakin akan mengubah data ini?",
            title: "Konfirmasi",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                simpan: {
                    label: '<i class="fas fa-check-circle mr-1"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        updatePaket();
                    }
                }
            }
        });
    }

	function updatePaket()
	{
		if ($('#nama-paket').val() === '') {
            syams_validation('#nama-paket', 'Kolom nama paket harus diisi.');
            $('#nama-paket').focus();            
            return false;
        }

		syams_validation_remove('#nama-paket');

		if ($('#harga-paket').val() === '') {
            syams_validation('#harga-paket', 'Kolom harga paket harus diisi.');
            $('#harga-paket').focus();            
            return false;
        }

		syams_validation_remove('#harga-paket');

		let jumlah = $('.tr-rows').length;
        if (jumlah === 0) {
            swalAlert('warning', 'Validasi', 'Belum ada data tindakan yang dipilih.');
			return false;
        }

		$.ajax({
            type: 'POST',			
            url: '<?= base_url("paket_mcu/api/paket_mcu/update_paket") ?>',			
            data: $('#form-add-paket').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
					messageCustom(data.message, 'Success');
					$('#modal-add').modal('hide');				
					getList(1);			
				} else {
					messageCustom(data.message, 'Error');
				}
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
	}

	function confirmationRemoveTindakan(idPaket, idTindakan)
	{
		bootbox.dialog({
            message: "Anda yakin akan menghapus tindakan ini?",
            title: "Konfirmasi",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                simpan: {
                    label: '<i class="fas fa-check-circle mr-1"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        removeTindakan(idPaket, idTindakan);
                    }
                }
            }
        });
	}

	function removeTindakan(idPaket, idTindakan)
	{
		$.ajax({
            type: 'POST',			
            url: '<?= base_url("paket_mcu/api/paket_mcu/delete_tindakan_paket") ?>',
            data: {
				idPaket : idPaket,
				idTindakan : idTindakan
			},
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
					messageCustom(data.message, 'Success');					
					getListTindakanPaket(idPaket, 'edit');			
				} else {
					messageCustom(data.message, 'Error');
				}
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
	}

	function getListTindakanPaket(id, option)
	{
		$.ajax({
			type: 'GET',
			url: '<?= base_url("paket_mcu/api/paket_mcu/get_detail") ?>/id_paket/' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
								
				var action = '';

				$('#table-list tbody').empty();
				
				if(option == 'read') {
					action = '<td class="right"></td>';
				}else if(option == 'edit'){
					action = '<td class="right"><button type="button" class="btn btn-secondary btn-xs" onclick="confirmationRemoveTindakan(${v.id_paket}, ${v.id_tindakan})"><i class="fa fa-trash-alt"></i></button></td>';
				}

				$.each(data, function(i, v) {
					$('#nama-paket').val(v.nama_paket);	
					$('#harga-paket').val(v.harga_paket);

					let j = $('.tr-rows').length+1;
					let htmlReadTindakan = /* html */ `
						<tr class="tr-rows">
							<td class="center">${j}</td>
							<td>${v.nama_tindakan}<input type="hidden" name="list_tindakan[]" value="${v.id_tindakan}" /></td>
							${action}
						</tr>
					`;

					$('#table-list tbody').append(htmlReadTindakan);
				});						
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}
</script>
