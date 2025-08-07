<!-- Modal Search -->
<div id="modal-search" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 650px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-search-label">Form Parameter Pencarian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                <?= form_open('', 'id=form-search role=form class=form-horizontal') ?>
                <input name="tampilkan" type="hidden" id="tampilkan" value="Perfaktur">
                <div class="form-group row">
                    <label for="awal" class="col-3 col-form-label">Tanggal</label>
                    <div class="col-4">
                        <!-- <!?= date('01/m/Y') ?> -->
                        <input type="text" name="tanggal_awal" id="tanggal-awal" class="form-control" value="">
                    </div>
                    <div class="col-1">
                        <h5 class="m-t-10">s/d</h5>
                    </div>
                    <div class="col-4">
                        <input type="text" name="tanggal_akhir" id="tanggal-akhir" class="form-control" value="<?= date('d/m/Y') ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no-penerimaan-search" class="col-3 col-form-label">No. Penerimaan</label>
                    <div class="col">
                        <input type="text" name="no_penerimaan" id="no-penerimaan-search" class="form-control" placeholder="No. Penerimaan...">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no-faktur-search" class="col-3 col-form-label">No. Faktur</label>
                    <div class="col">
                        <input type="text" name="no_faktur" id="no-faktur-search" class="form-control" placeholder="No. Faktur...">
                    </div>
                </div>
				<div class="form-group row">
                    <label for="supplier-search" class="col-3 col-form-label">Supplier</label>
                    <div class="col">
                        <input type="text" name="supplier" id="supplier-search" class="select2-input" placeholder="Pilih Supplier...">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kategori-barang-search" class="col-3 col-form-label">Kategori Barang</label>
                    <div class="col">
						<select name="kategori_barang" id="kategori-barang-search" class="form-control">
							<?php foreach ($kategori_barang as $data) : echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; endforeach ?>
						</select>
                    </div>
                </div>
				<div class="form-group row">
                    <label for="barang-search" class="col-3 col-form-label">Barang</label>
                    <div class="col">
                        <input type="text" name="barang" id="barang-search" class="select2-input" placeholder="Pilih Barang...">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="getListPenerimaan(1)"><i class="fas fa-search mr-1"></i>Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->

<script>
	$(function() {
		$('#supplier-search').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/supplier_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page // page number
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.nama;
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
		})
		
		$('#barang-search').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/barang_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenissppb: $('#kategori-barang-search').val()
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.nama;
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama+' '+data.kekuatan+' '+data.satuan_kekuatan;
            }
        })
	})
</script>