<div class="row d-flex justify-content-center">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header bg-theme text-white">
				<h5 class="center mb-0" style="font-weight:500">Profile Biodata</h5>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12 mb-4">
						<div class="center">
							<?php if ($this->avatar !== NULL && $this->avatar !== '') : ?>
								<img id="image_upload" src="<?= resource_url() ?>images/avatars/<?= $this->avatar ?>" alt="" class="img-thumbnail img-circle" width="200px" height="200px">
							<?php else : ?>
								<img id="image_upload" src="<?= resource_url() ?>images/avatars/ava.png" alt="">
							<?php endif ?>
						</div>
					</div>
					<div class="col-md-12 center">
						<h3 class="bold"><?php echo $biodata->nama ?></h3>
						<h5><?php echo $biodata->jabatan ?></h5>
						<p class="mt-4">Update Your Photo Here</p>
					</div>
					<div class="col-md-9">
						<input type="file" name="file_image" id="file_image" accept=".jpg, .jpeg, .png" class="form-control form-control-sm" placeholder="Choose File...">
						<input type="hidden" name="nama_image" id="nama_image">
					</div>
					<div class="col-md-3">
						<button class="btn btn-info" onclick="uploadFoto()"><i class="fas fa-fw fa-paper-plane mr-1"></i> Upload</button>
					</div>
					<div class="col-md-12 center mt-5">
						<b>Update Tanda Tangan</b>
					</div>
					<div style="display: flex; flex-direction:column; align-items:center; width:100%">
						<div>
							<canvas id="signature" name="signature_dokter" width="500" height="200" disabled style="background-color: white; border: 1px solid black;"></canvas>
						</div>
						<div style="display: flex; gap: .4rem">
							<button id="save-signature" class="btn btn-info" type="button" >Update Tanda Tangan</button>
							<button id="clear-signature" class="btn btn-danger" type="button">Hapus Tanda Tangan</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(function() {
		$('#save-signature').on('click', function(){
			var canvas = $('#signature')[0];
			var dataURL = canvas.toDataURL();
			$.ajax({
				type: 'POST',
				url: '<?= base_url('profile/api/profile/save_signature_dokter') ?>',
				data: {
					signature: dataURL
				},
				dataType: 'JSON',
				success: function(data) {
					messageCustom('Tanda Tangan Berhasil Disimpan!', 'Success');
				},
				error: function(e) {
					messageCustom(e.status, 'Error');
				}
			})
		})

		getTtdDokter()
	})

	var canvas1 = $('#signature')[0];

	ttdCanvas(canvas1);

	function clearSignatureTtd(){
		var canvas = $('#signature')[0];
		var context = canvas.getContext('2d');
		var img = new Image();
		context.clearRect(0, 0, canvas.width, canvas.height);
		context.drawImage(img, 0, 0, canvas.width, canvas.height);
	}

	$('#clear-signature').click(function() {
		clearSignatureTtd()
	});

	function ttdCanvas(canvas){
		var context = canvas.getContext('2d');
		var isCanvasChanged = false;

		var isDrawing = false;
		var lastX = 0;
		var lastY = 0;
		var color = "black";
		var lineWidth = 2;
		var img = new Image();
		img.onload = function() {
			// Menggambar gambar sebagai latar belakang
			context.drawImage(img, 0, 0, canvas.width, canvas.height);
		}

		canvas.addEventListener("mousedown", function(e) {
			isDrawing = true;
			lastX = e.offsetX;
			lastY = e.offsetY;
		});

		canvas.addEventListener("mousemove", function(e) {
			if (isDrawing) {
				context.beginPath();
				context.moveTo(lastX, lastY);
				context.lineTo(e.offsetX, e.offsetY);
				context.strokeStyle = color;
				context.lineWidth = lineWidth;
				context.stroke();
				lastX = e.offsetX;
				lastY = e.offsetY;
				isCanvasChanged = true; // Mengubah status perubahan canvas menjadi true
			}
		});

		canvas.addEventListener("mouseup", function(e) {
			isDrawing = false;
		});


		canvas.addEventListener("mouseleave", function(e) {
			isDrawing = false;
		});

		// Touch Events
		canvas.addEventListener("touchstart", function(e) {
			isDrawing = true;
			var touch = e.touches[0];
			lastX = touch.clientX - canvas.getBoundingClientRect().left;
			lastY = touch.clientY - canvas.getBoundingClientRect().top;
		});

		canvas.addEventListener("touchmove", function(e) {
			e.preventDefault();
			if (isDrawing) {
				var touch = e.touches[0];
				context.beginPath();
				context.moveTo(lastX, lastY);
				context.lineTo(touch.clientX - canvas.getBoundingClientRect().left, touch.clientY - canvas.getBoundingClientRect().top);
				context.strokeStyle = color;
				context.lineWidth = lineWidth;
				context.stroke();
				lastX = touch.clientX - canvas.getBoundingClientRect().left;
				lastY = touch.clientY - canvas.getBoundingClientRect().top;
				isCanvasChanged = true;
			}
		});

		canvas.addEventListener("touchend", function(e) {
			isDrawing = false;
		});
	}

	function uploadFoto() {
		if ($('#file_image').val() === '') {
			swalAlert('warning', 'Information', 'Pilih file terlebih dahulu');
			return false;
		}

		let fileImage = $('#file_image').prop('files')[0];

		// validasi ukuran file
		if (fileImage.size > 1000000) {
			$('#file_image').val('');
			messageCustom('File yang diunggah terlalu besar ! | Maximal gambar 1 MB', 'Error');
		} else {
			// proses upload file ke server
			let data = new FormData();
			data.append('file_image', fileImage);
			data.append('nama_image', $('#nama_image').val());
			// console.log(data); return false;
			$.ajax({
				type: 'POST',
				url: '<?= base_url('profile/upload_image') ?>',
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader();
				},
				success: function(data) {
					if (data.status === false) {
						messageCustom(data.error, 'Error');
						$('#file_image').val();
						$('#nama_image').val();
					} else {
						deleteImageOld('#nama_image');

						let url_image = '<?= resource_url() ?>images/avatars/' + data.file_name;
						$('#image_upload').attr('src', url_image);
						$('#nama_image').val(data.file_name);
						// deleteImageOld('#nama_image');


						messageCustom(data.success, 'Success');
						location.reload();
						hideLoader();
					}
				},
				error: function(e) {
					accessFailed(e.status);
					hideLoader();
				}
			});
		}

		function deleteImageOld(param) {
			let file_tmp = $(param).val();
			$.ajax({
				type: 'POST',
				url: '<?= base_url('profile/delete_image_old') ?>',
				data: {
					file_tmp: file_tmp
				},
				dataType: 'JSON',
				success: function(data) {
					messageCustom('Image lama telah terhapus!', 'Success');
				},
				error: function(e) {
					messageCustom(e.status, 'Error');
				}
			})
		}
	}

	function getTtdDokter(){
		$.ajax({
			type: 'GET',
			url: '<?= base_url('profile/api/profile/get_ttd_dokter') ?>',
			dataType: 'JSON',
			success: function(data) {
				if(data.tanda_tangan !== null){
					var canvas = $('#signature')[0];
					var context = canvas.getContext('2d');
					var img = new Image();
					img.onload = function() {
						// Menggambar gambar sebagai latar belakang
						context.drawImage(img, 0, 0, canvas.width, canvas.height);
					}
					img.src = '<?= resource_url() ?>images/ttd_dokter/' + data.tanda_tangan;
				}
			},
			error: function(e) {
				messageCustom(e.status, 'Error');
			}
		})
	}
</script>