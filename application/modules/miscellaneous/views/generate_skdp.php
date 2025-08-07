<script>
    var ID_PASIEN_RUJUK = '';

    $(function() {
        $('#form_skdp').submit(function() {
            return false;
        });

    });

    function generateSKDP(id_pasien, jenis, kode_poli, id_layanan_pendaftaran) {
        $('#id_pasien_skdp').val(id_pasien);
        $('#jenis_skdp').val(jenis);
        $('#id_layanan_pendaftaran_skdp').val(id_layanan_pendaftaran);

        if (kode_poli === null) {
            $('#jenis_pelayanan_skdp').val('1');
        } else {
            $('#jenis_pelayanan_skdp').val('2');
        }

        $('#kode_poli_skdp').val(kode_poli);
        $('#modal_skdp').modal('show');
    }

    function prosesGenerateSKDP() {
        let id_pasien = $('#id_pasien_skdp').val();
        let jenis = $('#jenis_skdp').val();
        let id_layanan_pendaftaran = $('#id_layanan_pendaftaran_skdp').val();

        Swal.fire({
            title: 'Pembuatan No. Rujukan',
            text: "Apakah anda yakin akan membuat nomor rujukan " + jenis + "?",
            icon: 'question',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#28A745',
            confirmButtonText: '<i class="fas fa-play-circle"></i> Proses'
        }).then((result) => {
            if (result.value) {
                let data = {
                    'id_pasien': id_pasien,
                    'jenis': jenis,
                    'id_layanan_pendaftaran': id_layanan_pendaftaran,
                }

                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("miscellaneous/api/miscellaneous/generate_skdp") ?>',
                    data: JSON.stringify(data),
                    cache: false,
                    dataType: 'JSON',
                    success: function(data) {
                        $('input[name=csrf_syam]').val(data.token);
                        if (data.status) {
                            $('.skdp_input').val('');
                            $('#modal_skdp').modal('hide');

                            swalCustom('success', 'Pembuatan No. Rujukan', data.message);
                            $('#modal_norujukan').modal('hide');
                        } else {
                            swalCustom('warning', 'Pembuatan No. Rujukan', data.message);
                        }
                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e) {
                        messageEditFailed()
                    }
                })
            }
        });
    }
</script>

<!-- Modal No Rujukan -->
<div id="modal_no_rujukan" class="modal fade" role="dialog" aria-labelledby="modal_no_rujukan_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_no_rujukan_label">Pencarian Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-striped table-sm" id="table_rujukan">
                    <thead>
                        <tr>
                            <td class="text-center" width="5%">No.</td>
                            <td width="20%">Tanggal Terbit</td>
                            <td width="35%">No Rujukan</td>
                            <td width="20%">Jenis</td>
                            <td width="10%">Digunakan</td>
                            <td class="text-right" width="10%"></td>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

                <div class="page_summary" id="page_summary_rujukan"></div>
                <div id="pagination_rujukan"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal"><i class="fas fa-check-circle"></i> OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal No Rujukan -->

<!-- Modal SKDP -->
<div id="modal_skdp" class="modal fade" role="dialog" aria-labelledby="modal_skdp_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 33%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_skdp_label">Pembuatan No. Rujukan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_skdp role=form class=form-horizontal') ?>
                <input type="hidden" name="id_pasien" id="id_pasien_skdp" class="skdp_input">
                <input type="hidden" name="jenis" id="jenis_skdp" class="skdp_input">
                <input type="hidden" name="kode_poli" id="kode_poli_skdp" class="skdp_input">
                <input type="hidden" name="jenis_pelayanan" id="jenis_pelayanan_skdp" class="skdp_input">
                <input type="hidden" name="id_layanan_pendaftaran" id="id_layanan_pendaftaran_skdp" class="skdp_input">

                Klik lanjut untuk membuat No. Rujukan
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="prosesGenerateSKDP()" data-dismiss="modal"><i class="fas fa-check-circle"></i> Lanjut</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal SKDP -->