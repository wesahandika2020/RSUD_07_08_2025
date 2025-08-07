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

  function getRekapOperasi(page) {
    //Laporan 04
    $('#page-now').val(page)
    openData();
    $('#modal-search').modal('hide')

    if ($('#jenis-laporan').val() == "4") {
      $('.lap-rekap-operasi, #table-lap-rekap-operasi tbody').show()

      $.ajax({
        type: 'GET',
        url: '<?= base_url('laporan_operasi/api/laporan_operasi/get_list_laporan_operasi_04') ?>/page/' + page + '/jenis/',
        data: $('#form-search').serialize(),
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
          showLoader()
        },
        success: function(data) {
          if ((page - 1) & (data.data.length === 0)) {
            getRekapOperasi(page - 1);
            return false;
          }

          $('#jenis-periode').html('Periode : ' + data.periode);
          $('#pagination04').html(pagination(data.jumlah, data.limit, data.page, 1));
          $('#summary04').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
          $('.lap-rekap-operasi, #table-lap-rekap-operasi tbody').show()
          $('#table-lap-rekap-operasi tbody').empty();
          $('#table-lap-rekap-operasi tfoot').empty();

          let TotalSaldoAwal = 0;
          let TotalSaldoAkhir = 0;
          let html = "";
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

            html += /* html */ `
							<tr>
								<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
								<td class="left">${v.spesialisasi}</td>
								<td class="left">${v.list[0].nama_dokter}</td>
								<td class="center">${v.list[0].elektif}</td>
								<td class="center">${v.list[0].cito}</td>
								<td class="center" style="background-color: #dcdcdc;">${v.list[0].total_pasien}</td>
								<td class="center">${v.list[0].tindakan_lain}</td>
								<td class="center">${v.list[0].kecil}</td>
								<td class="center">${v.list[0].sedang}</td>
								<td class="center">${v.list[0].besar}</td>
								<td class="center">${v.list[0].khusus}</td>
								<td class="center" style="background-color: #dcdcdc;">${v.list[0].total_tindakan}</td>
							</tr>
						`;

            let sum_elektif = 0;
            let sum_cito = 0;
            let sum_total_pasien = 0;
            let sum_tindakan_lain = 0;
            let sum_kecil = 0;
            let sum_sedang = 0;
            let sum_besar = 0;
            let sum_khusus = 0;
            let sum_total_tindakan = 0;

            $.each(v.list, function(ind, val) {
              sum_elektif += parseInt(val.elektif);
              sum_cito += parseInt(val.cito);
              sum_total_pasien += parseInt(val.total_pasien);
              sum_tindakan_lain += parseInt(val.tindakan_lain);
              sum_kecil += parseInt(val.kecil);
              sum_sedang += parseInt(val.sedang);
              sum_besar += parseInt(val.besar);
              sum_khusus += parseInt(val.khusus);
              sum_total_tindakan += parseInt(val.total_tindakan);

              if (ind > 0) {
                html += /* html */ `
                  <tr>
                    <td class="center"></td>
                    <td class="left"></td>
                    <td class="left">${val.nama_dokter}</td>
                    <td class="center">${val.elektif}</td>
                    <td class="center">${val.cito}</td>
                    <td class="center" style="background-color: #dcdcdc;">${val.total_pasien}</td>
                    <td class="center">${val.tindakan_lain}</td>
                    <td class="center">${val.kecil}</td>
                    <td class="center">${val.sedang}</td>
                    <td class="center">${val.besar}</td>
                    <td class="center">${val.khusus}</td>
                    <td class="center" style="background-color: #dcdcdc;">${val.total_tindakan}</td>
                  </tr>
                `;
              }
            })

            html += /* html */ `
              <tr>
                <td style="background-color: #a9a9a9;" colspan="3" class="right"><h6 class="m-0"><b>Total ${v.spesialisasi}</b></h6></td>
                <td style="background-color: #a9a9a9;" class="center"><h6 class="m-0"><b>${number_format(sum_elektif, 0, ',', '.')}</b></h6></td>          
                <td style="background-color: #a9a9a9;" class="center"><h6 class="m-0"><b>${number_format(sum_cito, 0, ',', '.')}</b></h6></td>
                <td style="background-color: #a9a9a9;" class="center"><h6 class="m-0"><b>${number_format(sum_total_pasien, 0, ',', '.')}</b></h6></td>
                <td style="background-color: #a9a9a9;" class="center"><h6 class="m-0"><b>${number_format(sum_tindakan_lain, 0, ',', '.')}</b></h6></td>
                <td style="background-color: #a9a9a9;" class="center"><h6 class="m-0"><b>${number_format(sum_kecil, 0, ',', '.')}</b></h6></td>
                <td style="background-color: #a9a9a9;" class="center"><h6 class="m-0"><b>${number_format(sum_sedang, 0, ',', '.')}</b></h6></td>
                <td style="background-color: #a9a9a9;" class="center"><h6 class="m-0"><b>${number_format(sum_besar, 0, ',', '.')}</b></h6></td>
                <td style="background-color: #a9a9a9;" class="center"><h6 class="m-0"><b>${number_format(sum_khusus, 0, ',', '.')}</b></h6></td>
                <td style="background-color: #a9a9a9;" class="center"><h6 class="m-0"><b>${number_format(sum_total_tindakan, 0, ',', '.')}</b></h6></td>
              </tr>`;
          })

          $('#table-lap-rekap-operasi tbody').append(html);

          let footer = /* html */ `
						<tr>
							<td colspan="5" class="right"><h6 class="m-0"><b>GRAND TOTAL</b></h6></td>
							<td style="background-color: #dcdcdc;" class="center"><h6 class="m-0"><b>${number_format(data.sum.total_pasien, 0, ',', '.')}</b></h6></td>
							<td colspan="5" class="center"><h6 class="m-0"><b></b></h6></td>
							<td style="background-color: #dcdcdc;" class="center"><h6 class="m-0"><b>${number_format(data.sum.total_tindakan, 0, ',', '.')}</b></h6></td>
						</tr>
					`;

          $('#table-lap-rekap-operasi tfoot').append(footer);
        },
        complete: function() {
          hideLoader();
          $('#modal-search').modal('hide');
        },
        error: function(e) {
          accessFailed(e.status);
        }
      })

    }
  }
</script>