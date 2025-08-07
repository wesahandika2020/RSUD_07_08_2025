<div class="row d-flex justify-content-center">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header bg-theme py-3">
                <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-info-circle mr-2"></i> <span id="message"></span></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg">
                        <?= form_open('', 'id=formadd role=form class=form-horizontal') ?>
                        <input name="id" type="hidden" id="id" value="<?= $id ?>" />
                        <div class="form-group">
                            <label for="old_password" class="col-lg control-label bold">Old Password</label>
                            <div class="col-lg">
                                <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Your Old Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new_password" class="col-lg control-label bold">New Password</label>
                            <div class="col-lg">
                                <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Your New Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_konf" class="col-lg control-label bold">Confirmation Password</label>
                            <div class="col-lg">
                                <input type="password" name="password_konf" class="form-control" id="password_konf" placeholder="Confirmation New Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-7">
                                <button type="button" class="btn btn-info" id="btnChange"><i class="fas fa-check"></i> Change Password</button>
                                <button type="button" class="btn btn-secondary" onclick="reset()"><i class="fas fa-history"></i> Reset</button>
                            </div>
                        </div>
                        <?= form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('auth/changepassword/js'); ?>