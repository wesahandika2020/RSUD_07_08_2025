<!-- <style type="text/css">td {border: solid 1px;}</style> -->
<!-- Modal Entri Keperawatan -->
<div class="modal fade" id="modal_LT" role="dialog" data-backdrop="static" aria-labelledby="modal-resume-keperawatan-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
    <div class="modal-content">
      <div class="modal-header">
        <div class="title">
          <h5 class="modal-title bold" id="modal_lt_title">LAPORAN TINDAKAN</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('', 'id=form_laporan_tindakan class="form-horizontal"') ?>
          <input type="hidden" name="lt_id" id="lt_id">
          <input type="hidden" name="id_layanan_pendaftaran" id="lt_id_layanan_pendaftaran">
          <input type="hidden" name="id_pendaftaran" id="lt_id_pendaftaran">
          <input type="hidden" name="id_pasien" id="lt_id_pasien">
          <input type="hidden" name="id_bed" id="lt_id_bed">
          <input type="hidden" name="id_users" id="lt_id_users">
          <input type="hidden" name="action" id="action_lap_tindakan">

          <!-- header -->
          <div class="row">
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <tr>
                    <td width="20%" class="bold">Nama Pasien</td>
                    <td wdith="80%">: <span id="lt_nama_pasien"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">No. RM</td>
                    <td>: <span id="lt_no_rm"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Tanggal Lahir</td>
                    <td>: <span id="lt_tanggal_lahir"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Jenis Kelamin</td>
                    <td>: <span id="lt_jenis_kelamin"></span></td>
                  </tr>
                  <tr>
                    <td class="bold">Alamat</td>
                    <td>: <span id="lt_alamat"></span></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                  <tr>
                    <td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
                    <td wdith="70%">: <span id="lt_bed"></span></td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <div class="lt_logo_alergi">
                        <img src="<?= resource_url() ?>images/diagnosa/alergi.jpg" alt="lt_logo_alergi" class="img-thumbnail rounded" width="20%">
                        <!-- logo pasien alergi -->
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <!-- end header -->

          <!-- content -->
          <div class="row">
            <div class="col-lg-12">
              <div class="widget-body">
                <div class="laporan-tindakan">
                  <table class="table table-no-border table-sm table-striped">
                    <tr>
                      <td width="20%"">Nama Tindakan</td>
                      <td width="1%">:</td>
                      <td><input type="text" name="lt_nama_tindakan" id="lt_nama_tindakan" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    </tr>
                    <tr>
                      <td width="20%">Diagnosa Sebelum Tindakan</td>
                      <td width="1%">:</td>
                      <td><input type="text" name="lt_diagnosa_sebelum" id="lt_diagnosa_sebelum" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    </tr>
                    <tr>
                      <td width="20%">Diagnosa Sesudah Tindakan</td>
                      <td width="1%">:</td>
                      <td><input type="text" name="lt_diagnosa_sesudah" id="lt_diagnosa_sesudah" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    </tr>
                    <tr>
                      <td width="20%">Pemeriksaan PA</td>
                      <td width="1%">:</td>
                      <td><input type="text" name="lt_pa" id="lt_pa" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    </tr>
                    <tr>
                      <td width="20%">Komplikasi</td>
                      <td width="1%">:</td>
                      <td><input type="text" name="lt_komplikasi" id="lt_komplikasi" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    </tr>
                    <tr>
                      <td width="20%">Pendarahan</td>
                      <td width="1%">:</td>
                      <td><input type="text" name="lt_pendarahan" id="lt_pendarahan" class="custom-form clear-input d-inline-block col-lg-12"></td>
                    </tr>
                  </table>
                  <table class="table table-no-border table-sm table-striped">
                    <tr>
                      <td>Tanggal</td>
                      <td width="1%">:</td>
                      <td><input type="text" name="lt_tanggal" id="lt_tanggal" class="custom-form clear-input d-inline-block col-lg-6" placeholder="dd/mm/yyyy"></td>
                      <td>Jam Mulai</td>
                      <td width="1%">:</td>
                      <td><input type="text" name="lt_waktu_mulai" id="lt_waktu_mulai" class="custom-form clear-input d-inline-block col-lg-6" placeholder="hh:mm"></td>
                      <td>Jam Selesai</td>
                      <td width="1%">:</td>
                      <td><input type="text" name="lt_waktu_selesai" id="lt_waktu_selesai" class="custom-form clear-input d-inline-block col-lg-6" placeholder="hh:mm"></td>
                      <td>Lamaynya Tindakan</td>
                      <td width="1%">:</td>
                      <td><input type="text" name="lt_lama_waktu" id="lt_lama_waktu" class="custom-form clear-input d-inline-block col-lg-6" readonly></td>
                    </tr>
                    <tr>
                      <td colspan="12">LAPORAN TINDAKAN</td>
                    </tr>
                    <tr>
                      <td colspan="12"><textarea name="lt_laporan_tindakan" id="lt_laporan_tindakan" rows="20" class="form-control clear-input">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus dicta accusantium qui dolore, quaerat excepturi maiores aut, rerum voluptas ab doloremque, nam dolores molestiae ducimus aliquam nesciunt error perspiciatis debitis! Soluta rerum magni suscipit a, dicta quia, laborum esse harum sunt temporibus nemo quo mollitia sequi expedita quasi eveniet neque? Maiores voluptatem, rem itaque perspiciatis at temporibus. Molestiae facere perspiciatis aspernatur totam sequi non, voluptatibus natus blanditiis expedita, magni quidem ducimus reiciendis labore quia! Excepturi, sapiente eos, porro officiis pariatur alias dolore iste laudantium quasi recusandae temporibus in eum nisi repellat inventore unde? Quae consequatur provident repudiandae quisquam tenetur aperiam iste. Fugiat non dignissimos explicabo aliquid dolorem similique natus id nisi repudiandae! Doloribus facere ab, natus exercitationem commodi expedita! Nisi obcaecati facere voluptate nemo non illum labore molestias vitae a, vel repellendus dolore consequatur blanditiis. Architecto recusandae similique aperiam minus quidem, distinctio quo possimus nemo amet est modi exercitationem alias! Magni nam nostrum enim perspiciatis placeat, unde pariatur praesentium labore, quae repudiandae neque, architecto dolore harum provident eaque asperiores minima repellat corrupti dolores error? Quo nemo corrupti odio eius eum. Enim consequuntur laboriosam tempore sint reprehenderit eveniet, deserunt maiores? Qui magni itaque, asperiores soluta vero ipsa ea neque nihil dicta commodi, veritatis, corporis sit unde delectus voluptas facilis blanditiis laborum sunt eum molestias facere inventore necessitatibus. Hic reiciendis nam quae delectus, itaque aliquid provident, vel ducimus nulla quo neque fugit? Sint, nobis! Unde voluptatem quam quaerat magnam deserunt assumenda adipisci earum vitae delectus aliquid, sit velit corporis corrupti eveniet qui natus commodi reiciendis architecto dolore odit vero dolores accusantium pariatur! Error, esse. Officiis quos distinctio et? Expedita odit quibusdam, doloremque dolore reprehenderit incidunt dicta quas rerum fugit vel, excepturi aut similique obcaecati assumenda. Aspernatur eos excepturi esse sequi repellat quia magnam doloribus voluptatum provident obcaecati, nesciunt distinctio est mollitia voluptatem, soluta nobis praesentium dicta officia illo veritatis! Tempora, molestiae odio quam iste, illo autem quod id error praesentium accusamus facilis architecto quos dolor ullam eveniet nemo harum dolore natus omnis, est eius a delectus esse? Mollitia quos corporis nulla quo saepe aut ratione ad provident magnam dicta illo consectetur, nostrum assumenda maxime possimus dolorum, vel odit ducimus incidunt! Eligendi possimus provident numquam est architecto? Fuga vero eveniet placeat ex. Sint aliquid hic eum maxime tenetur ratione soluta delectus deserunt nemo alias est labore iste molestiae quia quam odio suscipit a, exercitationem adipisci debitis. Veniam vitae aperiam quibusdam ut odit animi quos in similique earum atque obcaecati reprehenderit, magni quia. Atque assumenda, ex veritatis itaque voluptatem molestiae ipsa. Quod ut ipsam illo vitae labore modi dolores debitis deserunt magnam natus fugit saepe ipsum mollitia dolorum consequatur sapiente aut perferendis, ducimus explicabo consectetur, hic molestiae rerum voluptatibus. A, vel corrupti distinctio, excepturi veniam maxime modi saepe reprehenderit accusantium commodi odit ut aperiam iste sapiente earum eum cupiditate rerum. Odit libero, nisi provident eligendi itaque debitis perferendis, sit beatae maiores sed ea voluptatum nostrum rerum repudiandae quae ullam consequuntur. Inventore excepturi ad et eum, veniam exercitationem ullam praesentium labore debitis sed tempora sunt, at earum. Ducimus nihil excepturi nostrum, repellendus in possimus ex cupiditate debitis, vero repellat minima aliquid eius pariatur accusamus tempora atque eligendi sapiente consequatur officiis blanditiis! Optio recusandae accusamus enim voluptates similique voluptatum eos rem doloribus necessitatibus nisi laboriosam fuga iusto odit officia maiores ullam, aperiam nostrum labore nam illum reprehenderit! Fuga et suscipit unde aut, quo nam esse illum animi praesentium repellat quia ea consequatur quaerat exercitationem est similique laudantium odio nisi odit accusantium eius quae nemo! Possimus reprehenderit obcaecati ipsam suscipit, eveniet aut rem? Quam nulla exercitationem incidunt iure reprehenderit excepturi sapiente deleniti odit, fugiat provident, quia amet! Obcaecati sapiente, delectus animi eos aliquam voluptas inventore omnis ex corporis, rerum, facere a. Et soluta aperiam necessitatibus fuga tempora, iusto sit dolore quia quis neque, impedit deleniti voluptates quisquam, repellendus totam doloribus amet error ea esse iure ducimus. Doloribus consectetur tenetur autem reprehenderit dolores eius libero magni vel quae inventore provident vitae, harum labore nisi. Doloribus molestiae unde adipisci dicta quisquam voluptate maxime iste reprehenderit nulla odit eveniet ex quibusdam perferendis at temporibus alias suscipit, mollitia corporis optio excepturi, eos asperiores repellat. Cum et distinctio eum suscipit commodi itaque ad, corrupti nostrum id expedita non voluptas, blanditiis obcaecati aliquid optio, eos vero. Blanditiis animi facere, omnis temporibus veritatis, iure, quia deserunt adipisci amet enim culpa id corrupti ullam sequi eligendi. Cupiditate magnam fugit explicabo nihil minima aut consectetur cumque ut beatae atque facere, labore reiciendis eius quia harum itaque quas perspiciatis nam reprehenderit in voluptas saepe, ipsam aperiam odit! Corrupti, quis, vitae molestiae magni recusandae earum repudiandae totam ipsam, laboriosam culpa mollitia optio quia sit. Perspiciatis accusantium, fuga dignissimos ad error at. Ipsa magni ex sequi dicta saepe iste nam tempora recusandae rerum suscipit, officiis similique? Expedita soluta eveniet voluptatem minima tenetur vel nostrum iusto dignissimos accusantium harum, dolor reprehenderit illo similique, sunt libero nisi unde numquam voluptate non sit aut minus ab eum? Veniam praesentium illum aliquam exercitationem ducimus at. Ipsum modi dignissimos commodi ut quaerat explicabo quia adipisci, quo at unde repellat, labore earum impedit fuga. Esse hic dolores eaque magnam, animi sit excepturi quibusdam itaque, rem cum rerum minus distinctio explicabo perspiciatis aliquid vero amet enim delectus repellat. Odio fugiat molestias ut dolor vel est error excepturi harum illum earum eligendi dolorum eveniet magni, quasi dolore inventore aliquam. Ipsa laboriosam perferendis quibusdam nostrum omnis praesentium cum labore et ipsum ullam veniam sapiente eveniet inventore ratione, laborum esse officia facere hic doloribus voluptatum ex? Saepe, quia quod reprehenderit debitis eligendi officia, non placeat autem animi minus magnam cumque earum itaque consequatur architecto in odio. Eligendi porro voluptates vero natus vitae id veniam rem iure est earum ducimus in similique, atque commodi reiciendis laudantium incidunt sit omnis ut blanditiis ipsam! Mollitia placeat voluptatum veniam amet, optio cum? Et earum deserunt voluptatibus tempora iusto tenetur dolore natus accusamus beatae, id maiores officiis, sunt laborum commodi, est omnis ratione dolorem atque sequi? Veniam nobis rerum delectus reprehenderit id voluptates perferendis cum praesentium sit modi ex facilis, provident ratione sequi voluptatibus.</textarea></td>
                    </tr>
                  </table>
                  <table class="table table-no-border table-sm table-striped">
                    <tr>
                      <td class="text-center">Dokter Spesialis</td>
                      <td class="text-center">Bidan</td>
                      <td class="text-center">Perawat</td>
                    </tr>
                    <tr>
                      <td class="text-center"><input type="checkbox" name="lt_paraf_dokter" id="lt_paraf_dokter" value="1"></td>
                      <td class="text-center"><input type="checkbox" name="lt_paraf_bidan" id="lt_paraf_bidan" value="1"></td>
                      <td class="text-center"><input type="checkbox" name="lt_paraf_perawat" id="lt_paraf_perawat" value="1"></td>
                    </tr>
                    <tr>
                      <td class="text-center"><input type="text" name="lt_dokter" id="lt_dokter" class="select2c-input"></td>
                      <td class="text-center"><input type="text" name="lt_bidan" id="lt_bidan" class="select2c-input"></td>
                      <td class="text-center"><input type="text" name="lt_perawat" id="lt_perawat" class="select2c-input"></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- end content -->
        <?= form_close() ?>
        <div class="row">
					<table width="100%">
						<tr>
							<td class="text-right pr-3">
                <button type="button" class="btn btn-secondary mr-2" id="btn_reset" onclick="resetFormLT()"><i class="fas fa-history mr-1"></i>Reset Form</button>
                <button type="button" class="btn btn-info" onclick="konfirmasiSimpanEntriLT()" id="btn_simpan"><i class="fas fa-fw fa-plus mr-1"></i>Tambah Laporan</button>
								<button type="button" class="btn btn-success hide" onclick="konfirmasiSimpanEntriLT()" id="btn_update_lt"> <i class="fas fa-edit mr-1"></i>Update Laporan</button>
							</td>
						</tr>
						<tr>
							<td colspan="3">&nbsp;</td>
						</tr>
					</table>
				</div>



				<div class="widget-body mt-4">
					<div class="row">
						<div class="table-responsive">
							<table id="table-list-lap-tindakan" class="table table-sm table-striped table-bordered">
								<thead style="background-color:rgba(158, 196, 245, 1);">
									<tr>
										<th width="3%" class="center">No</th>
										<th width="5%" class="center">Tanggal</th>
										<th width="15%" class="center">Nama Tindakan</th>
										<th width="15%" class="center">Diagnosa Sebelum Tindakan</th>
										<th width="15%" class="center">Diagnosa Setelah Tindakan</th>
                    <th width="10%" class="center">Dokter Spesialis</th>
										<th width="10%" class="center">Alat</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Entri Keperawatan -->
