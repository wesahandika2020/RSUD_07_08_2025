<script>
    var profesi = '<?= $this->session->userdata('account_group') ?>'

    $('#waktu-order').datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
        pickSecond: false,
        pick12HourFormat: false,
        maxDate: new Date(),
        beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
    });

	$(function() {
		$('#perawat-order-bimroh').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: 18,
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
    })
    
    function addOrderBimroh() {

        if ($('#perawat-order-bimroh').val() === '') {
            syams_validation('#perawat-order-bimroh', 'Tanggal Kontrol Dokter harus diisi.');
            return false;
        }

        if ($('#waktu-order').val() === '') {
            syams_validation('#waktu-order', 'Pilihan Nama Dokter harus diisi.');
            return false;
        }

        let html = '';
        let number = $('.number-order').length;
        let perawat_order_bimroh = $('#s2id_perawat-order-bimroh a .select2c-chosen').html();
        let id_perawat_order_bimroh = $('#perawat-order-bimroh').val();
        let waktu_order = $('#waktu-order').val();
        let jenis_order = $('#jenis-order-bimroh').val();
        let kondisi_pasien = $('#kondisi-pasien').val();
        let diagnosa_spiritual = $('#diagnosa-spiritual').val();
        let terapi_tindak_lanjut = $('#terapi-tindak-lanjut').val();
        
        resetOrderBimroh()
        
        html = /* html */ `
            <tr>
                <td width="1%" class="number-order" align="center">${++number}</td>
                <td width="5%"><input type="hidden" name="perawat_order_bimroh[]" value="${id_perawat_order_bimroh}">${perawat_order_bimroh}</td>
                <td width="1%" align="left"><input type="hidden" name="tanggal_order[]" value="${waktu_order}">${waktu_order}</td>
                <td width="1%" align="left"><input type="hidden" name="jenis_order[]" value="${jenis_order}">${jenis_order}</td>
                <td width="1%" align="left"><input type="hidden" name="kondisi_pasien[]" value="${kondisi_pasien}">${kondisi_pasien}</td>
                <td width="1%" align="left"><input type="hidden" name="diagnosa_spiritual[]" value="${diagnosa_spiritual}">${diagnosa_spiritual}</td>
                <td width="1%" align="left"><input type="hidden" name="terapi_tindak_lanjut[]" value="${terapi_tindak_lanjut}">${terapi_tindak_lanjut}</td>
                <td width="1%" align="left"><em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Request</em></td>
                <td width="1%" align="left">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeBimrohList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            
        `;
        $('#table-order-bimroh tbody').append(html);        
    }

    function resetOrderBimroh() {
        $('#perawat-order-bimroh').val('')
        $('#s2id_perawat-order-bimroh a .select2c-chosen').html('Pilih Perawat Order')
        $('#jenis-order-bimroh').val('Jenis')
        syams_validation_remove('#perawat-order-bimroh')
    }

    function removeBimrohList() {}

    function getPemeriksaanBimroh(id_layanan_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_load_data_bimroh") ?>/id_layanan/' + id_layanan_pendaftaran,
            dataType: 'JSON',
            success: function(data) {
                $('#table-order-bimroh tbody').empty()
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
                        <tr>
                            <td class="center">${i + 1}</td>
                            <td>${v.waktu_order}</td>
                            <td>${v.nama_perawat}</td>
                            <td>${v.jenis}</td>
                            <td>${v.kondisi_pasien}</td>
                            <td>${v.diagnosa_spiritual}</td>
                            <td>${v.terapi_tindak_lanjut}</td>
                            <td class="center">${status}</td>
                            <td class="right">
                                ${profesi === 'Admin' | profesi === 'Programmer' ? '<button title="Hapus Order Bimroh" type="button" class="btn btn-secondary btn-xs" onclick="removeOrderBimroh('+v.id+', '+v.id_layanan_pendaftaran+')"><i class="fas fa-trash-alt"></i></button>' : ''}
                            </td>
                        </tr>
                    `;
                    $('#table-order-bimroh tbody').append(html)
                })
            }
        })
    }

    function removeOrderBimroh(id, id_layanan_pendaftaran) {
        swal.fire({
			title: 'Hapus Order',
			html: "Apakah anda yakin akan menghapus <br> data order bimroh ini ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
                    type: 'DELETE',
                    url: '<?= base_url('pelayanan/api/pelayanan/hapus_order_bimroh') ?>',
                    data: 'id=' + id + '&id_layanan_pendaftaran=' + id_layanan_pendaftaran + '&jenis=OK',
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(data) {
                        if (data) {
                            getPemeriksaanBimroh(id_layanan_pendaftaran)
                            messageCustom('Berhasil menghapus order bimroh', 'Success')
                        } else {
                            swalAlert('warning', 'Validation', 'Data order bimroh tidak dapat dihapus karena <h4 style="display:inline-block;font-weight:500;">Sudah dikonfirmasi oleh Petugas Pendamping Bimroh !</h4>')
                        }
                    },
                    complete: function() {
                        hideLoader()
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan saat menghapus order bimroh.', 'Error')
                    }
                })
			}
		})
    }  
    
    
</script>