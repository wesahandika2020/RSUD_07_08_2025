<div class="row d-flex justify-content-center">
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<div class="container center mt-3">
							<img src="<?= resource_url() ?>images/logos/<?php echo $hospital->logo ?>" width="50%" alt="<?php echo $hospital->nama ?>" class="">
						</div>
						<h2 class="center mt-4"><strong><?php echo $hospital->nama ?></strong></h2>
						<h5 class="center text-muted"><?php echo $hospital->email ?></h5>
						<p class="center mt-4"><?php echo $hospital->alamat ?></p>
						<p class="center"><?php echo $hospital->telp . ' / ' . $hospital->fax ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<strong><i class="fas fa-hospital mr-2"></i>Update Profile Hospital</strong>
					</div>
					<div class="card-body">
						<?php echo form_open(base_url('profile/update_profile_hospital'), 'id=form method=post') ?>
						<input type="hidden" name="id" value="<?php echo $hospital->id ?>">
						<div class="form-group">
							<label class="bold">Nama</label>
							<input type="text" name="nama" class="form-control form-control-sm" value="<?php echo $hospital->nama ?>">
						</div>
						<div class="form-group">
							<label class="bold">Email</label>
							<input type="email" name="email" class="form-control form-control-sm" value="<?php echo $hospital->email ?>">
						</div>
						<div class="form-group">
							<label class="bold">Telp</label>
							<input type="text" name="telp" class="form-control form-control-sm" value="<?php echo $hospital->telp ?>">
						</div>
						<div class="form-group">
							<label class="bold">Fax</label>
							<input type="text" name="fax" class="form-control form-control-sm" value="<?php echo $hospital->fax ?>">
						</div>
						<div class="form-group">
							<label class="bold">Alamat</label>
							<textarea name="alamat" rows="3" class="form-control form-control-sm"><?php echo $hospital->alamat ?></textarea>
						</div>
						<div class="form-group">
							<label class="bold">NIP. Direktur</label>
							<input type="text" name="nip_direktur" class="form-control form-control-sm" value="<?php echo $hospital->nip_direktur ?>">
						</div>
						<div class="form-group">
							<label class="bold">Direktur</label>
							<input type="text" name="nama_direktur" class="form-control form-control-sm" value="<?php echo $hospital->direktur ?>">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save mr-2"></i>Update</button>
						</div>

						<?php echo form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>