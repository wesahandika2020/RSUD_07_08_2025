<!-- Modal Import CSV MCU -->
<div id="modal-csv-mcu" class="modal fade" role="dialog" aria-labelledby="modal-csv-mcu-label" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 650px">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-csv-mcu-label">Form Parameter Pencarian</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('', 'id=form_import_csv_mcu role=form class=form-horizontal') ?>
        <input name="id" type="hidden" id="id_layanan_search" />
        <div class="form-group row">
          <label for="csv-file" class="col-sm-2 col-form-label">File CSV</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" id="csv-file" name="csv_file" accept=".csv">
          </div>
        </div>
        <?= form_close() ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
        <button type="button" class="btn btn-info waves-effect" onclick="simpanUploadFileCSVMCU()" id="simpan-upload"><i class="fas fa-upload mr-1"></i>Import CSV</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End Modal Import CSV MCU -->


<script>
  function inportCSVHasilMCU() {

    $('#csv-file').val("");
    $('#modal-csv-mcu').modal('show');
  }

  function simpanUploadFileCSVMCU() {
    if ($('#csv-file').val() === '') {
      syams_validation('#csv-file', 'File belum diisi.');
      return false;
    } else {
      syams_validation_remove('#csv-file');
    }

    var fileInput = $('#csv-file');
    var fileImage = fileInput.prop('files')[0];
    var formInputData = $('#form_import_csv_mcu').serialize();

    bootbox.dialog({
      message: 'Anda yakin akan menyimpan Data dari CSV?',
      title: 'Simpan Upload Data CSV',
      buttons: {
        batal: {
          label: '<i class="fas fa-fw fa-window-close"></i> Batal',
          className: "btn-secondary",
          callback: function() {

          }
        },
        masuk: {
          label: '<i class="fas fa-fw fa-check-circle"></i> Simpan',
          className: "btn-info",
          callback: function() {
            // Proses upload file ke server
            var formData = new FormData();
            formData.append('csv_file', fileImage);

            // Menambahkan data form input ke formData
            $.each(formInputData.split('&'), function(index, field) {
              var [key, value] = field.split('=');
              formData.append(key, decodeURIComponent(value.replace(/\+/g, ' ')));
            });

            $.ajax({
              type: 'POST',
              url: '<?= base_url('upload_csv/api/upload_csv/upload_gform_csv_mcu/') ?>',
              // data: $('#form-pemeriksaan').serialize(),
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              dataType: 'JSON',
              beforeSend: function() {
                showLoader();
              },
              success: function(data) {
                if (data.metadata.code !== 200) {
                  swalAlert('warning', data.metadata.code, data.metadata.message);
                } else {
                  // messageEditSuccess();
                  $('#csv-file').val('');
                  $('#modal-csv-mcu').modal('hide');
                  swalAlert('success', data.metadata.code, data.metadata.message);
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
        }
      }
    });
  }
</script>