<script>
    var profesi = '<?= $this->session->userdata('account_group') ?>'
	$(function() {
		$('#tindakan-operasi').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pelayanan_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis_pemeriksaan: 'Pelayanan Pembedahan',
                        page: page, // page number
                        kelas: ''
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var total = data.total;
                var kelas = (data.kelas !== null)?(', kelas ')+data.kelas:'';
                var markup = '<b>'+data.layanan+'</b> <br/>'+data.jenis+', '+data.bobot+' - '+kelas+'<br/>'+numberToCurrency(total);
                return markup;
            }, 
            formatSelection: function(data){
                $('#tarif-tindakan').val(data.total);
                if (data.bobot === 'Khusus') { var nilai = 'Khusus'; }
                if (data.bobot === 'Besar') { var nilai = 'Major'; }
                if (data.bobot === 'Sedang') { var nilai = 'Standard'; }
                if (data.bobot === 'Kecil') { var nilai = 'Minor'; }
                $('#bobot').val(nilai);
                $('#tarif-operasi').val(data.total);
                return data.layanan;
            }
        });
    })
    
    function addOrderOperasi() {
        let id_tarif    = $('#tindakan-operasi').val()
        let nama_tarif  = $('#s2id_tindakan-operasi a .select2c-chosen').html()
        let bobot       = 'Belum ditentukan';
        let timing      = $('#timing-operasi').val()
        let harga       = $('#tarif-operasi').val()
        let id_icd9_ok  = $('#tindakan-icd9-ok').val()
        let icd9_ok     = $('#s2id_tindakan-icd9-ok a .select2c-chosen').html()
        if (id_tarif === '') {
            syams_validation('#tindakan-operasi', 'Silahkan pilih nama operasi!')
            return false;
        }
        resetTindakanOperasi()
        let urut        = $('.rows-operasi').length + 1;
        addRowOperasi(urut, id_tarif, nama_tarif, bobot, timing, harga, id_icd9_ok, icd9_ok)
		
		$('#tindakan-icd9-ok').val('');
        $('#s2id_tindakan-icd9-ok a .select2c-chosen').html('');
    }

    function resetTindakanOperasi() {
        $('#tindakan-operasi').val('')
        $('#s2id_tindakan-operasi a .select2c-chosen').html('Pilih Tindakan Operasi')
        $('#timing-operasi').val('Terjadwal')
        syams_validation_remove('#tindakan-operasi')
    }

    function addRowOperasi(urut, id_tarif, nama_tarif, bobot, timing, harga, id_icd9_ok, icd9_ok) {
        let html = /* html */ `
            <tr class="rows-operasi">
                <td class="center">${urut}</td>
                <td>${nama_tarif}<input type="hidden" name="id_tarif_operasi[]" id="id-tarif-operasi-${urut}" value="${id_tarif}" class="id-tarif-operasi"></td>
                <td>${icd9_ok}<input type="hidden" name="icd9-ok[]" id="icd9-ok-${urut}" value="${id_icd9_ok}" class="icd9-ok"></td>
                <td>${bobot}<input type="hidden" name="bobot[]" id="bobot-${urut}" value="${bobot}" class="bobot"></td>
                <td>${timing}<input type="hidden" name="timing[]" id="timing-${urut}" value="${timing}" class="timing"></td>
                <td class="right">${numberToCurrency(harga)}</td>
                <td class="center"><em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Request</em></td>
                <td class="right">
                    <button title="Hapus Order Operasi" type="button" class="btn btn-secondary btn-xs" onclick="removeOperasiList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#table-order-operasi tbody').append(html)
    }

    function removeOperasiList(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent)
        var jml = $('.rows-operasi').length;
        for (i = 0; i <= jml; i++) {
            $('.rows-operasi:eq('+i+')').children('td:eq(0)').html(i + 1)
        }
    }

    function getPemeriksaanOperasi(id_layanan_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_load_data_operasi") ?>/id_layanan/' + id_layanan_pendaftaran + '/jenis/OK',
            dataType: 'JSON',
            success: function(data) {
                $('#table-order-operasi tbody').empty()
                $.each(data, function(i, v) {
                    let klasifikasi = '';
					if (v.klasifikasi === 'Standard') { klasifikasi = 'Sedang' }
					if (v.klasifikasi === 'Minor') { klasifikasi = 'Kecil' }
					if (v.klasifikasi === 'Mayor') { klasifikasi = 'Besar' }
                    if (v.klasifikasi === 'Khusus') { klasifikasi = 'Khusus' }
                    
                    let status = v.status;
					if (v.status === 'Request') {
						status = '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>' + v.status + '</em>';
					}
					if (v.status === 'Canceled') {
						background = 'style="background-color:#E46A76;color:#FFFFFF"';
						button = 'disabled';
					}
					if (v.status === 'Confirmed') {
						status = '<h5><span class="label label-success"><i class="fas fa-fw fa-thumbs-up mr-1"></i>Dikonfirmasi</span></h5>';
						button = 'disabled';
					}
                    let html = /* html */ `
                        <tr class="rows-operasi">
                            <td class="center">${i + 1}</td>
                            <td>${v.operasi}</td>
							<td>${v.icd9 != null ? v.icd9 : '-'}</td>
                            <td>${klasifikasi}</td>
                            <td>${v.timing}</td>
                            <td class="right">${numberToCurrency(v.total)}</td>
                            <td class="center">${status}</td>
                            <td class="right">
                                <button title="Klik untuk mengisi form perioperatif pra" type="button" class="btn btn-secondary btn-xs" onclick="entriFormPerioperatifPra(${v.id})"><i class="fas fa-pencil-alt"></i></button>
                                ${profesi === 'Admin' | profesi === 'Programmer' ? '<button title="Hapus Order Operasi" type="button" class="btn btn-secondary btn-xs" onclick="removeJadwalOperasi('+v.id+', '+v.id_layanan_pendaftaran+')"><i class="fas fa-trash-alt"></i></button>' : ''}
                            </td>
                        </tr>
                    `;
                    $('#table-order-operasi tbody').append(html)
                })
            }
        })
    }

    function removeJadwalOperasi(id, id_layanan_pendaftaran) {
        swal.fire({
			title: 'Hapus Operasi',
			html: "Apakah anda yakin akan menghapus <br> data order operasi ini ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
                    type: 'DELETE',
                    url: '<?= base_url('pelayanan/api/pelayanan/hapus_jadwal_operasi') ?>',
                    data: 'id=' + id + '&id_layanan_pendaftaran=' + id_layanan_pendaftaran + '&jenis=OK',
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(data) {
                        if (data) {
                            getPemeriksaanOperasi(id_layanan_pendaftaran)
                            messageCustom('Berhasil menghapus jadwal operasi', 'Success')
                        } else {
                            swalAlert('warning', 'Validation', 'Data jadwal operasi tidak dapat dihapus karena <h4 style="display:inline-block;font-weight:500;">Sudah dikonfirmasi oleh Kamar Operasi !</h4>')
                        }
                    },
                    complete: function() {
                        hideLoader()
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan saat menghapus jadwal operasi.', 'Error')
                    }
                })
			}
		})
    }

    // VK
    function addOrderVK() {
        let status = $('#status-vk').text()
        if (status === '') {
            let i = $('.rows-vk').length;
            let html = /* html */ `
                <tr class="rows-vk">
                    <td class="center">${i + 1}</td>
                    <td class="left"><?php echo date("d/m/Y H:i") ?></td>
                    <td class="left">Kamar Bersalin</td>
                    <td class="center">
                        <em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i><span id="status-vk">Request</span></em>
                        <input type="hidden" name="jml_order_vk[]" id="jml-order-vk">
                    </td>
                    <td class="right">
                        <button title="Hapus Order VK" type="button" class="btn btn-secondary btn-xs" onclick="removeOrderVK(this)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            `;
            $('#table-order-vk tbody').append(html)
        } else {
            swalAlert('info', 'Informasi', 'Harap simpan dan selesaikan Orderan VK terlebih dahulu!')
        }
    }
    // END VK

    function removeOrderVK(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
        var jml = $('.rows-vk').length;
        for (i = 0; i <= jml; i++) {
            $('.rows-vk:eq('+i+')').children('td:eq(0)').html(i + 1)
        }
    }

    function getPemeriksaanVK(id_layanan_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_load_data_operasi") ?>/id_layanan/' + id_layanan_pendaftaran + '/jenis/VK',
            dataType: 'JSON',
            success: function(data) {
                $('#table-order-vk tbody').empty()
                $.each(data, function(i, v) {
                    let status = v.status;
					if (v.status === 'Request') {
						status = '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>' + v.status + '</em>';
					}
					if (v.status === 'Canceled') {
						background = 'style="background-color:#E46A76;color:#FFFFFF"';
						button = 'disabled';
					}
					if (v.status === 'Confirmed') {
						status = '<h5><span class="label label-success"><i class="fas fa-fw fa-thumbs-up mr-1"></i>Dikonfirmasi</span></h5>';
						button = 'disabled';
					}
                    let html = /* html */ `
                        <tr class="rows-vk">
                            <td class="center">${i + 1}</td>
                            <td>${datetimefmysql(v.waktu)}</td>
                            <td>Kamar Bersalin</td>
                            <td class="center">${status}</td>
                            <td class="right">${profesi === 'Admin' | profesi === 'Programmer' ? '<button title="Hapus Order Operasi" type="button" class="btn btn-secondary btn-xs" onclick="removeOperasiVK('+v.id+', '+v.id_layanan_pendaftaran+')"><i class="fas fa-trash-alt"></i></button></td>' : ''}</td>
                        </tr>
                    `;
                    $('#table-order-vk tbody').append(html)
                })
            }
        })
    }

    function removeOperasiVK(id, id_layanan_pendaftaran) {
        swal.fire({
			title: 'Hapus Order VK',
			html: "Apakah anda yakin akan menghapus <br>data order VK ini ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
                    type: 'DELETE',
                    url: '<?= base_url('pelayanan/api/pelayanan/hapus_jadwal_operasi') ?>',
                    data: 'id=' + id + '&id_layanan_pendaftaran=' + id_layanan_pendaftaran + '&jenis=VK',
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(data) {
                        if (data) {
                            getPemeriksaanVK(id_layanan_pendaftaran)
                            messageCustom('Berhasil menghapus orderan VK', 'Success')
                        } else {
                            swalAlert('warning', 'Validation', 'Data order VK tidak dapat dihapus karena <h4 style="display:inline-block;font-weight:500;">Sudah mendapat tindakan oleh Kamar Bersalin !</h4>')
                        }
                    },
                    complete: function() {
                        hideLoader()
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan saat menghapus orderan VK.', 'Error')
                    }
                })
			}
		})
    }

</script>