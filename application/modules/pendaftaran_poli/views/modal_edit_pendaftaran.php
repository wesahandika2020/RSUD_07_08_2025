<script>
    $(function() {
        $('#instansi_rujukan_edit').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/instansi_auto') ?>",
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
                var markup = data.nama + '<br/><i>' + data.alamat + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });
    });

    function konfirmasiSimpanPjawab() {
        bootbox.dialog({
            message: "Anda akan mengedit data penanggung jawab pasien ?",
            title: "Edit Pendaftaran",
            buttons: {
                batal: {
                    label: '<i class="fas fa-window-close m-r-5"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                masuk: {
                    label: '<i class="fas fa-check-circle m-r-5"></i>Simpan',
                    className: "btn-info",
                    callback: function() {
                        simpanPjawab();
                    }
                }
            }
        });
    }

    function simpanPjawab() {
        let id_pendaftaran = $('#id_pendaftaran_pjwb').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pendaftaran/api/pendaftaran/edit_penanggung_jawab") ?>/' + id_pendaftaran,
            data: $('#form_edit_pjawab').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                $('#modal_edit_pjawab').modal('hide');
                if (data.pjawab !== null) {
                    setPJawab(data.pjawab);
                    messageEditSuccess();
                }

                $('.reset-field').val('');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function setPJawab(hasil) {
        $('#id_pendaftaran_pjwb').val(hasil.id);

        $('#instansi_perujuk_detail').html(hasil.instansi_perujuk);
        $('#nadis_perujuk_detail').html(hasil.nadis_perujuk);

        $('#nik_pjwb_detail').html(hasil.nik_pjwb);
        $('#nama_pjwb_detail').html(hasil.nama_pjwb);
        $('#kelamin_pjwb_detail').html(hasil.kelamin_pjwb);
        $('#alamat_pjwb_detail').html(hasil.alamat_pjwb);
        $('#telp_pjwb_detail').html(hasil.telp_pjwb);

        $('#nik_pjwb_detail_finansial').html(hasil.nik_pjwb_finansial);
        $('#nama_pjwb_detail_finansial').html(hasil.nama_pjwb_finansial);
        $('#kelamin_pjwb_detail_finansial').html(hasil.nama_pjwb_finansial);
        $('#alamat_pjwb_detail_finansial').html(hasil.alamat_pjwb_finansial);
        $('#telp_pjwb_detail_finansial').html(hasil.telp_pjwb_finansial);
    }
</script>



<!-- Modal Edit Penanggung Jawab Pendaftaran Poliklinik -->
<div id="modal_edit_pjawab" class="modal fade" role="dialog" aria-labelledby="modal_edit_pjawab_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_edit_pjawab_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_edit_pjawab role=form class=form-horizontal') ?>
                <input type="hidden" name="id_pendaftaran" id="id_pendaftaran_pjwb" />
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">Nama Instansi Perujuk</label>
                    <div class="col">
                        <input type="text" name="instansi_rujukan" id="instansi_rujukan_edit" class="select2-input" placeholder="">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">Nama Tenaga Perujuk</label>
                    <div class="col">
                        <input type="text" name="nadis_perujuk" id="nadis_perujuk_edit" class="form-control reset-field" placeholder="Nama Tenaga Kesehatan Perujuk">
                    </div>
                </div>
                <br>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">NIK P. Jawab</label>
                    <div class="col">
                        <input type="text" name="nik_pjwb"  maxlength="16" onkeypress="return hanyaAngka(event)" class="form-control reset-field" id="nik_pjwb_edit" placeholder="NIK Penanggung Jawab">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">Nama P. Jawab</label>
                    <div class="col">
                        <input type="text" name="nama_pjwb" class="form-control reset-field" id="nama_pjwb_edit" placeholder="Nama Penanggung Jawab">
                    </div>
                </div>
				<div class="form-group row tight">
					<label for="tgl_lahir_pjwb_edit" class="col-3 col-form-label">Tanggal Lahir P. Jawab</label>
					<div class="col">
						<input type="date" name="tgl_lahir_pjwb" class="form-control reset-field" id="tgl_lahir_pjwb_edit">
					</div>
				</div>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">Kelamin P. Jawab</label>
                    <div class="col">
                        <?= form_dropdown('kelamin_pjwb', $kelamin, array(), 'class="custom-select reset-select" id=kelamin_pjwb_edit') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">Telp. P. Jawab</label>
                    <div class="col">
                        <input type="text" name="telp_pjwb" class="form-control reset-field" id="telp_pjwb_edit" onkeypress="return hanyaAngka(event)" placeholder="No. Telp Penanggung Jawab">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">Alamat P. Jawab</label>
                    <div class="col">
                        <textarea name="alamat_pjwb" class="form-control reset-field" id="alamat_pjwb_edit" placeholder="Alamat Penanggung Jawab"></textarea>
                    </div>
                </div>
				<div class="form-group row tight">
					<label for="hubungan_pjwb_edit" class="col-3 col-form-label">Hubungan P. Jawab</label>
					<div class="col">
						<input type="text" name="hubungan_pjwb" class="form-control reset-field" id="hubungan_pjwb_edit" placeholder="Hubungan Penanggung Jawab">
					</div>
				</div>
                <br>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">NIK P. Jawab Finansial</label>
                    <div class="col">
                        <input type="text" name="nik_pjwb_finansial" maxlength="16" onkeypress="return hanyaAngka(event)" class="form-control reset-field" id="nik_pjwb_finansial_edit" placeholder="NIK Penanggung Jawab Finansial">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">Nama P. Jawab Finansial</label>
                    <div class="col">
                        <input type="text" name="nama_pjwb_finansial" class="form-control reset-field" id="nama_pjwb_finansial_edit" placeholder="Nama Penanggung Jawab Finansial">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">Kelamin P. Jawab Finansial</label>
                    <div class="col">
                        <?= form_dropdown('kelamin_pjwb_finansial', $kelamin, array(), 'class="custom-select reset-select" id=kelamin_pjwb_finansial_edit') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">Telp. P. Jawab Finansial</label>
                    <div class="col">
                        <input type="text" name="telp_pjwb_finansial" class="form-control reset-field" id="telp_pjwb_finansial_edit" onkeypress="return hanyaAngka(event)" placeholder="No. Telp Penanggung Jawab Finansial">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">Alamat P. Jawab Finansial</label>
                    <div class="col">
                        <textarea name="alamat_pjwb_finansial" class="form-control reset-field" id="alamat_pjwb_finansial_edit" placeholder="Alamat Penanggung Jawab Finansial"></textarea>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanPjawab()"><i class="fas fa-save"></i> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Penanggung Jawab Pendaftaran Poliklinik -->
