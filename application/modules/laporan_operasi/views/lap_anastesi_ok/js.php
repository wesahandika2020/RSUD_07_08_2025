<script>
  var dWidth = $(window).width();
  var dHeight = $(window).height();
  var x = screen.width / 2 - dWidth / 2;
  var y = screen.height / 2 - dHeight / 2;
  var baseUrl = '<?= base_url('laporan_inventory/api/laporan_inventory') ?>';

  $('#spesialisasi-search').select2({
    ajax: {
      url: "<?= base_url('masterdata/api/masterdata_auto/spesialisasi_auto') ?>",
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
      var markup = data.nama;
      return markup;
    },
    formatSelection: function(data) {
      return data.nama;
    }
  })

  function getAnastesiOK(page) {
    //Laporan 03
    $('#page-now').val(page)
    openData();

    if ($('#jenis-laporan').val() == "3") {
      $('.lap-anastesi-ok, #table-lap-anastesi-ok tbody').show()

      $.ajax({
        type: 'GET',
        url: '<?= base_url('laporan_operasi/api/laporan_operasi/get_list_laporan_operasi_03') ?>/page/' + page + '/jenis/',
        data: $('#form-search').serialize(),
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
          showLoader()
        },
        success: function(data) {
          if ((page - 1) & (data.data.length === 0)) {
            getAnastesiOK(page - 1);
            return false;
          }

          $('#jenis-periode').html('Periode : ' + data.periode);
          $('#pagination03').html(pagination(data.jumlah, data.limit, data.page, 1));
          $('#summary03').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
          $('.lap-anastesi-ok, #table-lap-anastesi-ok tbody').show()
          $('#table-lap-anastesi-ok tbody').empty();
          $('#table-lap-anastesi-ok tfoot').empty();

          let TotalSaldoAwal = 0;
          let TotalSaldoAkhir = 0;
          $.each(data.data, function(i, v) {
            TotalSaldoAwal += parseInt(v.harga_satuan * v.awal);
            TotalSaldoAkhir += parseInt(v.harga_satuan * v.sisa);

            let periode = '';
            if ($('#periode-laporan').val() == 'Harian') {
              periode = 'Laporan Harian';
            }
            if ($('#periode-laporan').val() == 'Bulanan') {
              periode = 'Laporan Bulanan';
            }
            if ($('#periode-laporan').val() == 'Rentang Waktu') {
              periode = 'Laporan Rentang Waktu';
            }

            let html = /* html */ `
							<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="left">${v.nama}</td>
								<td class="center">${v.general}</td>
								<td class="center">${v.regional}</td>
								<td class="center">${v.lokal}</td>
								<td class="center">${v.total_pasien}</td>
							</tr>
						`;

            $('#table-lap-anastesi-ok tbody').append(html);
          })

          let html = /* html */ `
						<tr>
							<td colspan="2" class="center"><h6 class="m-0"><b>TOTAL</b></h6></td>
							<td class="center"><h6 class="m-0"><b>${number_format(data.sum.general, 0, ',', '.')}</b></h6></td>
							<td class="center"><h6 class="m-0"><b>${number_format(data.sum.regional, 0, ',', '.')}</b></h6></td>
							<td class="center"><h6 class="m-0"><b>${number_format(data.sum.lokal, 0, ',', '.')}</b></h6></td>
							<td class="center"><h6 class="m-0"><b>${number_format(data.sum.total_pasien, 0, ',', '.')}</b></h6></td>
						</tr>
					`;

          $('#table-lap-anastesi-ok tfoot').append(html);
        },
        complete: function() {
          hideLoader()
          $('#modal-search').modal('hide')
        },
        error: function(e) {
          accessFailed(e.status)
        }
      })

    }
  }
</script>