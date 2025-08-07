<script>
    var profesi = '<?= $this->session->userdata('account_group') ?>'

    $('#waktu-order-talqin').datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
        pickSecond: false,
        pick12HourFormat: false,
        maxDate: new Date(),
        beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
    });

	$(function() {
		$('#perawat-order-talqin').select2c({
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
    
    function addOrderTalqin() {

        if ($('#perawat-order-talqin').val() === '') {
            syams_validation('#perawat-order-talqin', 'Perawat order harus diisi.');
            return false;
        }

        if ($('#waktu-order-talqin').val() === '') {
            syams_validation('#waktu-order', 'Waktu order harus diisi.');
            return false;
        }

        let html = '';
        let number = $('.number-order-talqin').length;
        let perawat_order_talqin = $('#s2id_perawat-order-talqin a .select2c-chosen').html();
        let id_perawat_order_talqin = $('#perawat-order-talqin').val();
        let waktu_order_talqin = $('#waktu-order-talqin').val();
        let kondisi_pasien_talqin = $('#kondisi-pasien-talqin').val();
        let terapi_advice_talqin = $('#terapi-advice-talqin').val();       
        
        html = /* html */ `
            <tr>
                <td width="1%" class="number-order-talqin" align="center">${++number}</td>
                <td width="1%" align="left"><input type="hidden" name="waktu_order_talqin[]" value="${waktu_order_talqin}">${waktu_order_talqin}</td>
                <td width="5%"><input type="hidden" name="perawat_order_talqin[]" value="${id_perawat_order_talqin}">${perawat_order_talqin}</td>
                <td width="1%" align="left"><input type="hidden" name="kondisi_pasien_talqin[]" value="${kondisi_pasien_talqin}">${kondisi_pasien_talqin}</td>
                <td width="1%" align="left"><input type="hidden" name="terapi_advice_talqin[]" value="${terapi_advice_talqin}">${terapi_advice_talqin}</td>
                <td width="1%" align="left"><em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Request</em></td>
                <td width="1%" align="left">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeTalqinList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            
        `;
        $('#table-order-talqin tbody').append(html);        
    }

    function resetOrderTalqin() {
        $('#perawat-order-talqin').val('')
        $('#s2id_perawat-order-talqin a .select2c-chosen').html('Pilih Perawat Order')
        syams_validation_remove('#perawat-order-talqin')
    }

    function removeTalqinList() {}

    function getPemeriksaanTalqin(id_layanan_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_load_data_talqin") ?>/id_layanan/' + id_layanan_pendaftaran,
            dataType: 'JSON',
            success: function(data) {
                $('#table-order-talqin tbody').empty()
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
                            <td>${v.waktu_order_talqin}</td>
                            <td>${v.nama_perawat}</td>
                            <td>${v.kondisi_pasien_talqin}</td>
                            <td>${v.terapi_advice_talqin}</td>
                            <td class="center">${status}</td>
                            <td class="right">
                                ${profesi === 'Admin' | profesi === 'Programmer' ? '<button title="Hapus Order Talqin" type="button" class="btn btn-secondary btn-xs" onclick="removeOrderTalqin('+v.id+', '+v.id_layanan_pendaftaran+')"><i class="fas fa-trash-alt"></i></button>' : ''}
                            </td>
                        </tr>
                    `;
                    $('#table-order-talqin tbody').append(html)
                })
            }
        })
    }

    function removeOrderTalqin(id, id_layanan_pendaftaran) {
        swal.fire({
			title: 'Hapus Order',
			html: "Apakah anda yakin akan menghapus <br> data order talqin ini ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
			cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				$.ajax({
                    type: 'DELETE',
                    url: '<?= base_url('pelayanan/api/pelayanan/hapus_order_talqin') ?>',
                    data: 'id=' + id + '&id_layanan_pendaftaran=' + id_layanan_pendaftaran + '&jenis=OK',
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(data) {
                        if (data) {
                            getPemeriksaanTalqin(id_layanan_pendaftaran)
                            messageCustom('Berhasil menghapus order talqin', 'Success')
                        } else {
                            swalAlert('warning', 'Validation', 'Data order talqin tidak dapat dihapus karena <h4 style="display:inline-block;font-weight:500;">Sudah dikonfirmasi oleh Petugas Pendamping talqin !</h4>')
                        }
                    },
                    complete: function() {
                        hideLoader()
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan saat menghapus order talqin.', 'Error')
                    }
                })
			}
		})
    }  


    
</script>