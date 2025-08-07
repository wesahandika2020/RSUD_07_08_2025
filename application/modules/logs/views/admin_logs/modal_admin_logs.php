<div id="modal_admin_logs" class="modal fade">
    <div class="modal-dialog" style="max-width: 80%; max-height: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_title">Detail Perubahan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>User : <span id="user_log_dt"></span></h3>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-lg-6">
                        <h3>Before Update</h3>
                        <textarea id="data_area_before" class="form-control" rows="20" readonly></textarea>
                    </div>
                    <div class="col-lg-6">
                        <h3>After Update</h3>
                        <textarea id="data_area_after" class="form-control" rows="20" readonly></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-check-circle m-r-5"></i>OK</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

