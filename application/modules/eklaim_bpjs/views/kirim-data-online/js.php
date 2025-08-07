<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
  $(document).ready(function() {

    summaryDataKlaim();

    $('#tanggal_seacrh_kdo').datepicker({
      format: 'dd/mm/yyyy'
    }).on('changeDate', function() {
      $(this).datepicker('hide')
    })

    $('#jenis_rawat_kdo, #filter_kdo, #tanggal_seacrh_kdo').change(function() {
      summaryDataKlaim();
      $('.table-klaim-data-kdo').hide();
    })

    $('#btn-tampil-klaim-kdo').click(function() {
      getListDataKlaim(1);
    })

    $('#btn-cari-data').click(function() {
      kirimKlaimOnline();
    })

  });


  function umurHanyaTahun(dateString) {
    const targetDate = new Date(dateString); // Ubah string tanggal jadi objek Date
    const currentDate = new Date(); // Tanggal sekarang

    // Selisih tahun
    return currentDate.getFullYear() - targetDate.getFullYear();
  }

  function summaryDataKlaim() {

    $.ajax({
      type: 'GET',
      url: '<?= base_url('eklaim_bpjs/api/Kirim_data_online/get_summary_data_klaim') ?>',
      data: $('#form-search-kdo').serialize(),
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader()
      },
      success: function(data) {
        $('#table-summary-kdo').show();

        $('#label-jumlah-kdo').empty().append('( ' + data.total_data + ' klaim )');
        $('#lbl-ranap-total').empty().append(money_format(data.total_ranap));
        $('#lbl-rajal-total').empty().append(money_format(data.total_rajal));
        $('#lbl-total').empty().append(money_format(data.total_data));
        $('#lbl-belum-kirim').empty().append(data.belum_kirim);
        $('#lbl-terkirim').empty().append(data.terkirim);

      },
      complete: function() {
        hideLoader()
      },
      error: function(e) {
        accessFailed(e.status)
      }
    })
  }

  function getListDataKlaim(page) {
    $('#page-now-kdo').val(page)

    $('#table-summary-kdo').hide();
    $('.table-klaim-data-kdo').show();

    $.ajax({
      type: 'GET',
      url: '<?= base_url('eklaim_bpjs/api/Kirim_data_online/get_list_data_klaim') ?>/page/' + page,
      data: $('#form-search-kdo').serialize(),
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader()
      },
      success: function(data) {
        if ((page - 1) & (data.data.length === 0)) {
          getListDataKlaim(page - 1);
          return false;
        }

        $('#pagination-kdo').html(paginationKDO(data.jumlah, data.limit, data.page, 1));
        $('#summary-kdo').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

        $('#table-klaim-data-kdo tbody').empty();
        $('#table-klaim-data-kdo tfoot').empty();

        $.each(data.data, function(i, v) {
          let jenisRawat = (v.rawat == '2' ? 'Jalan' : 'Inap');

          let html = /* html */ `
              <tr>
                <td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
                <td class="center"><span onclick="setClaimData('${v.id_pendaftaran}', '${jenisRawat}')" class="pointer">${dateIndo(v.tgl_masuk)}</span></td>
                <td class="left">${v.nomor_sep}</td>
                <td class="left">${v.nama_pasien} <br><small>${v.nomor_rm}</small></td>
                <td class="left">${v.cbg}</td>
                <td class="left">${v.special_cmg ?? '-'}</td>
                <td class="right">${money_format(v.tarif_klaim)}</td>
                <td class="right">${money_format(v.tarif_rs)}</td>
                <td class="left">${v.status_klaim}</td>
            `;

          $('#table-klaim-data-kdo tbody').append(html);
        });

        $('#table-klaim-data-kdo tfoot').append(`
          <tr>
            <td colspan="6" class="right">Total :</td>
            <td class="right">${money_format(data.total_tarif_klaim)}</td>
            <td class="right">${money_format(data.total_tarif_rs)}</td>
          </tr>
        `);

      },
      complete: function() {
        hideLoader()
      },
      error: function(e) {
        accessFailed(e.status)
      }
    })
  }

  function pagingCustom(page) {
    getListEklaim(page)
  }


  function paginationKDO(total_data, limit, page, tab) {
    var str = '';
    var total_page = Math.ceil(total_data / limit);

    var first = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="pagingCustom(1,' + tab + ')">First</a></li>';
    var last = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="pagingCustom(' + ((total_page === 0) ? 1 : total_page) + ',' + tab + ')">Last</a></li>';
    var click_prev = '';
    if (page > 1) {
      click_prev = 'onclick="pagingCustom(' + (page - 1) + ',' + tab + ')"';
    };
    var prev = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_prev + '>&laquo;</a></li>';

    var click_next = '';
    if (page < total_page) {
      click_next = 'onclick="pagingCustom(' + (page + 1) + ',' + tab + ')"';
    };
    var next = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_next + '>&raquo;</a></li>';

    var page_numb = '';
    var act_click = '';
    var start = page - 2;
    var finish = page + 2;
    if (start < 1) {
      start = 1;
    }

    if (finish > total_page) {
      finish = total_page;
    }

    for (var p = start; p <= finish; p++) {

      if (p !== page) {
        page_numb += '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="pagingCustom(' + p + ',' + tab + ')">' + p + '</a></li>';
      } else {
        page_numb += '<li class="active"><input min="1" class="form-control-paging" onkeyup="KuduAngka(this)" type="number" value="' + page + '" style="width:60px;"/><button type="button" class="btn btn-primary btn-sm mb-1" title="Lompat ke halaman" onclick="gotopageCustomKDO(this, ' + tab + ')"><i class="fas fa-search"></i></button></li>' + '';
      }

    };

    return '<ul class="pagination pagination-sm">' + first + prev + page_numb + next + last + '</ul>';
  }

  function gotopageCustomKDO(obj, tab) {
    var a = $(obj).prev().val();
    var b = parseInt(a);
    if (b === 0) {
      b = 1;
    };
    pagingCustom(b, tab);
  }
</script>