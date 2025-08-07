<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-10">
						<div class="row">
							<div class="col-lg-3">
								<div class="bs-docs-sidebar hidden-print" role="complementary">
									<span class="title_nav_side">List Bangsal</span>
									<div id="bangsalScroll">
										<ul class="nav bs-docs-sidenav">
											<?php foreach ($bangsal as $key => $value) : ?>
												<li class="li_side pointer" onclick="getAvailableBed('<?= $key ?>')">
													<a style="font-size: 14pt"><?= $value ?></a>
												</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-9" role="main" id="bedScroll">
								<div id="bed-status-area" class="mb-10"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="bs-docs-sidebar hidden-print" role="complementary">
							<h6><b>Keterangan :</b></h6>
							<div class="row">
								<div class="col-lg-12">
									<img class="bed-icon bed-icon-available"><br>
									<div class="bed-title">Bed Tersedia</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<img class="bed-icon bed-icon-male-used"><br>
									<div class="bed-title">Bed Dipakai (LK)</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<img class="bed-icon bed-icon-female-used"><br>
									<div class="bed-title">Bed Dipakai (PR)</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<img class="bed-icon bed-icon-waiting"><br>
									<div class="bed-title">Bed Menunggu</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<img class="bed-icon bed-icon-reserved"><br>
									<div class="bed-title">Bed Dipesan</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<img class="bed-icon bed-icon-waiting-confirmation"><br>
									<div class="bed-title">Menunggu Konfirmasi</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<img class="bed-icon bed-icon-broken"><br>
									<div class="bed-title">Bed sedang dalam<br>perbaikan / rusak</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<img class="bed-icon bed-icon-over-capacity"><br>
									<div class="bed-title">Bed yang melebihi<br>kapasitas</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('js') ?>