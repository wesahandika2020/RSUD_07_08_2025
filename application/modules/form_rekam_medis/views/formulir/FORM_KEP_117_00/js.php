<script>
    var nomer = 1;
    $(function() {

        nomer++;
        showPengkajianUlangRisikoJatuhPasienLansia(nomer);
        showUpayaPencegahanRisikoJatuhPasienLansia(nomer);

        // LANSIA
        $('#pur-btn-expand-all').click(function() {
            $('.multi-collapse').addClass('show');
        });

        $('#pur-btn-collapse-all').click(function() {
            $('.multi-collapse').removeClass('show');
        });

        function timerzmysql(waktu) {
            var tm = waktu.split(':');
            return tm[0] + ':' + tm[1];
        }

        function bukaLebar(title, num) {
            let html = /* html */ `
                <div class="accordion">
                    <div class="card">
                        <div class="card-header" id="heading-${num}">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-${num}" aria-expanded="false" aria-controls="collapse-${num}">
                                    ${title}
                                </button>
                            </h2>
                        </div>
                        <div id="collapse-${num}" class="collapse" aria-labelledby="heading-${num}">
                            <div class="card-body">       
            `;

            return html;
        }

        function tutupRapet(title, num) {
            let html = /* html */ `
                            </div>
                        </div>
                    </div>
                </div>
            `;

            return html;
        }

        function removeList(el) {
            var parent = el.parentNode.parentNode;
            parent.parentNode.removeChild(parent);
        }

        function removeListTable(el) {
            var parent = el.parentNode.parentNode.parentNode;
            parent.parentNode.removeChild(parent);
        }

        // PENGKAJIAN LANSIA
        function showPengkajianUlangRisikoJatuhPasienLansia(num) {
            let html = bukaLebar('Form Pengkajian Ulang Lansia', num);
            // console.log(num);
            html += /* html */ `
                    <table class="table table-no-border table-sm table-striped">
                        <tr>
                            <td>
                                Tanggal Pengkajian
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <input type="text" name="purjpl_tanggal_pengkajian" id="purjpl-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy">
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-purjpl">
                        <thead>
                            <tr>
                                <th width="5%" class="center">no</th>
                                <th width="15%" class="center"><b>Parameter</b></th>
                                <th width="60%" class="center"><b>Skrining</b></th>
                                <th width="10%" class="center"><b>Jawaban</b></th>
                                <th width="10%" class="center"><b>Skor</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="center" rowspan="2">1</td>
                                <td rowspan="2"><input type="hidden" id="purjpl-riwayat-jatuh">Riwayat Jatuh</td>
                                <td>
                                    <input type="hidden" id="purjpl-pasien-datang-karena-jatuh">Apakah pasien datang ke RS karena jatuh?
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_pasien_datang_karena_jatuh" id="purjpl-pasien-datang-karena-jatuh-1" value="6" class="mr-1" onchange="calcscorepurjpl()">
                                    Ya
                                    <input type="radio" name="purjpl_pasien_datang_karena_jatuh" id="purjpl-pasien-datang-karena-jatuh-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                    Tidak
                                </td>
                                <td rowspan="2">
                                    Salah satu jawaban ya = 6
                                </td>
                            </tr>
                                <tr>
                                <td>
                                    <input type="hidden" id="purjpl-jatuh-2-bulan-terakhir">Jika tidak, apakah pasien mengalami jatuh dalam 2 bulan terakhir?
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_jatuh_2_bulan_terakhir" id="purjpl-jatuh-2-bulan-terakhir-1" value="6" class="mr-1" onchange="calcscorepurjpl()">
                                    Ya
                                    <input type="radio" name="purjpl_jatuh_2_bulan_terakhir" id="purjpl-jatuh-2-bulan-terakhir-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                    Tidak
                                </td>
                            </tr>
                            <tr>
                                <td class="center" rowspan="3">2</td>
                                <td rowspan="3"><input type="hidden" id="purjpl-mental">Status Mental</td>
                                <td>
                                    <input type="hidden" id="purjpl-pasien-delirium">Apakah pasien delirium? (Tidak dapat membuat keputusan, pola pikir tidak terorganisir, gangguan daya ingat)
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_pasien_delirium" id="purjpl-pasien-delirium-1" value="14" class="mr-1" onchange="calcscorepurjpl()">
                                    Ya
                                    <input type="radio" name="purjpl_pasien_delirium" id="purjpl-pasien-delirium-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                    Tidak
                                </td>
                                <td rowspan="3">
                                    Salah satu jawaban ya = 14
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" id="purjpl-pasien-disorientasi">Apakah pasien disorientasi? (salah menyebutkan waktu, tempat atau orang)
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_pasien_disorientasi" id="purjpl-pasien-disorientasi-1" value="14" class="mr-1" onchange="calcscorepurjpl()">
                                    Ya
                                    <input type="radio" name="purjpl_pasien_disorientasi" id="purjpl-pasien-disorientasi-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                    Tidak
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" id="purjpl-pasien-agitasi">Apakah pasien mengalami agitasi? (ketakutan, gelisah, dan cemas)
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_pasien_agitasi" id="purjpl-pasien-agitasi-1" value="14" class="mr-1" onchange="calcscorepurjpl()">
                                    Ya
                                    <input type="radio" name="purjpl_pasien_agitasi" id="purjpl-pasien-agitasi-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                    Tidak
                                </td>
                            </tr>
                            <tr>
                                <td class="center" rowspan="3">3</td>
                                <td rowspan="3"><input type="hidden" id="purjpl-penglihatan">Penglihatan</td>
                                <td>
                                    <input type="hidden" id="purjpl-pasien-kacamata">Apakah pasien memakai kacamata?
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_pasien_kacamata" id="purjpl-pasien-kacamata-1" value="1" class="mr-1" onchange="calcscorepurjpl()">
                                    Ya
                                    <input type="radio" name="purjpl_pasien_kacamata" id="purjpl-pasien-kacamata-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                    Tidak
                                </td>
                                <td rowspan="3">
                                    Salah satu jawaban ya = 1
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" id="purjpl-pasien-buram">Apakah pasien mengeluh adanya penglihatan buram?
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_pasien_buram" id="purjpl-pasien-buram-1" value="1" class="mr-1" onchange="calcscorepurjpl()">
                                    Ya
                                    <input type="radio" name="purjpl_pasien_buram" id="purjpl-pasien-buram-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                    Tidak
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" id="purjpl-pasien-glaukoma">Apakah pasien mempunyai glaukoma? Katarak / degenerasi makula?
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_pasien_glaukoma" id="purjpl-pasien-glaukoma-1" value="1" class="mr-1" onchange="calcscorepurjpl()">
                                    Ya
                                    <input type="radio" name="purjpl_pasien_glaukoma" id="purjpl-pasien-glaukoma-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                    Tidak
                                </td>
                            </tr>
                            <tr>
                                <td class="center">4</td>
                                <td><input type="hidden" id="purjpl-berkemih">Kebiasaan Berkemih</td>
                                <td>
                                    <input type="hidden" id="purjpl-pasien-berkemih">Apakah terdapat perubahan perilaku berkemih? (frekuensi, urgensi, inkontinensia, nokturia)
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_pasien_berkemih" id="purjpl-pasien-berkemih-1" value="2" class="mr-1" onchange="calcscorepurjpl()">
                                    Ya
                                    <input type="radio" name="purjpl_pasien_berkemih" id="purjpl-pasien-berkemih-2" value="0" class="mr-1" onchange="calcscorepurjpl()">
                                    Tidak
                                </td>
                                <td>
                                    Salah satu jawaban ya = 2
                                </td>
                            </tr>
                            <tr>
                                <td class="center" rowspan="4">5</td>
                                <td rowspan="4">Transfer (dari tempat tidur ke kursi dan kembali lagi ketempat tidur)</td>
                                <td>
                                    <input type="hidden" id="purjpl-pasien-mandirit">Mandiri (boleh memakai alat bantu jalan)
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_pasien_mandirit" id="purjpl-pasien-mandirit-0" value="0" class="mr-1" onchange="calcscorepurjpl()"> 0
                                </td>
                                <td rowspan="8">
                                    <div style="display: flex;flex-direction: column;">
                                        Jumlah nilai transfer dan mobilitas jika
                                        <span>nilai total 0 - 3 = 0</span>
                                        <span>nilai total 4 - 6 = 7</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Memerlukan sedikit bantuan (1 orang) / dalam pengawasan
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_pasien_mandirit" id="purjpl-pasien-mandirit-1" value="1" class="mr-1" onchange="calcscorepurjpl()"> 1
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Memerlukan bantuan yang nyata (2 orang)
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_pasien_mandirit" id="purjpl-pasien-mandirit-2" value="2" class="mr-1" onchange="calcscorepurjpl()"> 2
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tidak dapat duduk dengan seimbang, perlu bantuan total
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_pasien_mandirit" id="purjpl-pasien-mandirit-3" value="3" class="mr-1" onchange="calcscorepurjpl()"> 3
                                </td>
                            </tr>
                            <tr>
                                <td class="center" rowspan="4">6</td>
                                <td rowspan="4">Mobilitas</td>
                                <td>
                                    <input type="hidden" id="purjpl-pasien-m-mandiri">Mandiri (boleh memakai alat bantu jalan)
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_pasien_m_mandiri" id="purjpl-pasien-m-mandiri-0" value="0" class="mr-1" onchange="calcscorepurjpl()"> 0
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Berjalan dengan bantuan 1 orang (verbal/fisik)
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_pasien_m_mandiri" id="purjpl-pasien-m-mandiri-1" value="1" class="mr-1" onchange="calcscorepurjpl()"> 1
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Menggunakan kursi roda
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_pasien_m_mandiri" id="purjpl-pasien-m-mandiri-2" value="2" class="mr-1" onchange="calcscorepurjpl()"> 2
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Imobilisasi
                                </td>
                                <td class="center">
                                    <input type="radio" name="purjpl_pasien_m_mandiri" id="purjpl-pasien-m-mandiri-3" value="3" class="mr-1" onchange="calcscorepurjpl()"> 3
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="bold">JUMLAH SKOR</td>
                                <td colspan="2" class="center"><input type="number" min="0" name="purjpl_jumlah_skor" id="purjpl-jumlah-skor" class="custom-form clear-input center" placeholder="Jumlah" value="0" readonly></td>
                            </tr>
                            <tr>
                                <td class="bold">Paraf</td>
                                <td colspan="2"><input type="checkbox" id="purjpl-paraf" aria-label="Checkbox for paraf"/></td>
                            </tr>
                            <tr>
                                <td class="bold">Perawat</td>
                                <td colspan="5">
                                    <div class="input-group">
                                        <input type="text" name="purjpl_perawat" id="purjpl-perawat" class="select2c-input ml-2">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <button type="button" title="Tambah Pengkajian" class="btn btn-info" onclick="tambahPengkajianLansia()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Pengkajian</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>`;
            html += tutupRapet();

            $('#buka-tutup-purjpl').append(html);
        }

        // UPAYA LANSIA
        function showUpayaPencegahanRisikoJatuhPasienLansia(num) {

            let html = bukaLebar('Form Upaya Pencegahan Lansia', num);

            html += /* html */ `
                    <div class="from-group">
                        <label for="uprjpl-tanggal-pengkajian">Tanggal Tindakan Pencegahan : </label>
                        <input type="text" name="uprjpl_tanggal_pengkajian" id="uprjpl-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
                    </div>
                    <hr>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-uprjpl">
                        <thead>
                            <tr>
                                <th class="center" rowspan="2"><b>Tindakan Pencegahan</b></th>
                                <th class="center" colspan="2">Pagi</th>
                                <th class="center" colspan="2">Siang</th>
                                <th class="center" colspan="3">Malam</th>
                            </tr>
                            <tr>
                                <th class="center">Hand Over</th>
                                <th class="center">Jam 10</th>
                                <th class="center">Hand Over</th>
                                <th class="center">Jam 18</th>
                                <th class="center">Hand Over</th>
                                <th class="center">Jam 23</th>
                                <th class="center">Jam 4</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="8" class="bold text-uppercase">Risiko Rendah</td>
                            </tr>
                            <tr>
                                <td>Bel berfungsi dan mudah dijangkau</td>
                                <td class="center"><input type="checkbox" name="uprjpl_bel_p_ho" id="uprjpl-bel-p-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_bel_p_10" id="uprjpl-bel-p-10"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_bel_s_ho" id="uprjpl-bel-s-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_bel_s_18" id="uprjpl-bel-s-18"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_bel_m_ho" id="uprjpl-bel-m-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_bel_m_23" id="uprjpl-bel-m-23"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_bel_m_4" id="uprjpl-bel-m-4"></td>
                            </tr>
                            <tr>
                                <td>Roda tempat tidur terkunci</td>
                                <td class="center"><input type="checkbox" name="uprjpl_roda_p_ho" id="uprjpl-roda-p-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_roda_p_10" id="uprjpl-roda-p-10"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_roda_s_ho" id="uprjpl-roda-s-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_roda_s_18" id="uprjpl-roda-s-18"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_roda_m_ho" id="uprjpl-roda-m-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_roda_m_23" id="uprjpl-roda-m-23"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_roda_m_4" id="uprjpl-roda-m-4"></td>
                            </tr>
                            <tr>
                                <td>Posisikan tempat tidur pada posisi terendah</td>
                                <td class="center"><input type="checkbox" name="uprjpl_ptt_p_ho" id="uprjpl-ptt-p-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_ptt_p_10" id="uprjpl-ptt-p-10"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_ptt_s_ho" id="uprjpl-ptt-s-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_ptt_s_18" id="uprjpl-ptt-s-18"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_ptt_m_ho" id="uprjpl-ptt-m-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_ptt_m_23" id="uprjpl-ptt-m-23"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_ptt_m_4" id="uprjpl-ptt-m-4"></td>
                            </tr>
                            <tr>
                                <td>Pagar pengaman tempat tidur dinaikan</td>
                                <td class="center"><input type="checkbox" name="uprjpl_ppt_p_ho" id="uprjpl-ppt-p-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_ppt_p_10" id="uprjpl-ppt-p-10"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_ppt_s_ho" id="uprjpl-ppt-s-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_ppt_s_18" id="uprjpl-ppt-s-18"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_ppt_m_ho" id="uprjpl-ppt-m-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_ppt_m_23" id="uprjpl-ppt-m-23"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_ppt_m_4" id="uprjpl-ppt-m-4"></td>
                            </tr>
                            <tr>
                                <td>Penerangan cukup</td>
                                <td class="center"><input type="checkbox" name="uprjpl_penerangan_p_ho" id="uprjpl-penerangan-p-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_penerangan_p_10" id="uprjpl-penerangan-p-10"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_penerangan_s_ho" id="uprjpl-penerangan-s-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_penerangan_s_18" id="uprjpl-penerangan-s-18"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_penerangan_m_ho" id="uprjpl-penerangan-m-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_penerangan_m_23" id="uprjpl-penerangan-m-23"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_penerangan_m_4" id="uprjpl-penerangan-m-4"></td>
                            </tr>
                            <tr>
                                <td>Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan</td>
                                <td class="center"><input type="checkbox" name="uprjpl_alas_p_ho" id="uprjpl-alas-p-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_alas_p_10" id="uprjpl-alas-p-10"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_alas_s_ho" id="uprjpl-alas-s-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_alas_s_18" id="uprjpl-alas-s-18"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_alas_m_ho" id="uprjpl-alas-m-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_alas_m_23" id="uprjpl-alas-m-23"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_alas_m_4" id="uprjpl-alas-m-4"></td>
                            </tr>
                            <tr>
                                <td>Lantai kering dan tidak licin</td>
                                <td class="center"><input type="checkbox" name="uprjpl_lantai_p_ho" id="uprjpl-lantai-p-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_lantai_p_10" id="uprjpl-lantai-p-10"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_lantai_s_ho" id="uprjpl-lantai-s-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_lantai_s_18" id="uprjpl-lantai-s-18"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_lantai_m_ho" id="uprjpl-lantai-m-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_lantai_m_23" id="uprjpl-lantai-m-23"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_lantai_m_4" id="uprjpl-lantai-m-4"></td>
                            </tr>
                            <tr>
                                <td colspan="8" class="bold text-uppercase">Risiko Sedang</td>
                            </tr>
                            <tr>
                                <td>Dekatkan alat-alat pasien</td>
                                <td class="center"><input type="checkbox" name="uprjpl_alat_p_ho" id="uprjpl-alat-p-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_alat_p_10" id="uprjpl-alat-p-10"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_alat_s_ho" id="uprjpl-alat-s-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_alat_s_18" id="uprjpl-alat-s-18"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_alat_m_ho" id="uprjpl-alat-m-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_alat_m_23" id="uprjpl-alat-m-23"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_alat_m_4" id="uprjpl-alat-m-4"></td>
                            </tr>
                            <tr>
                                <td>Edukasi pasien tentang efek samping obat yang diberikan</td>
                                <td class="center"><input type="checkbox" name="uprjpl_edukasi_p_ho" id="uprjpl-edukasi-p-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_edukasi_p_10" id="uprjpl-edukasi-p-10"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_edukasi_s_ho" id="uprjpl-edukasi-s-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_edukasi_s_18" id="uprjpl-edukasi-s-18"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_edukasi_m_ho" id="uprjpl-edukasi-m-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_edukasi_m_23" id="uprjpl-edukasi-m-23"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_edukasi_m_4" id="uprjpl-edukasi-m-4"></td>
                            </tr>
                            <tr>
                                <td>Tidak meninggalkan pasien di kamar mandi saat menggunakan commode</td>
                                <td class="center"><input type="checkbox" name="uprjpl_commode_p_ho" id="uprjpl-commode-p-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_commode_p_10" id="uprjpl-commode-p-10"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_commode_s_ho" id="uprjpl-commode-s-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_commode_s_18" id="uprjpl-commode-s-18"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_commode_m_ho" id="uprjpl-commode-m-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_commode_m_23" id="uprjpl-commode-m-23"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_commode_m_4" id="uprjpl-commode-m-4"></td>
                            </tr>
                            <tr>
                                <td colspan="8" class="bold text-uppercase">Risiko Tinggi</td>
                            </tr>
                            <tr>
                                <td>Pasang gelang khusus (Warna Kuning)</td>
                                <td class="center"><input type="checkbox" name="uprjpl_gelang_p_ho" id="uprjpl-gelang-p-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_gelang_p_10" id="uprjpl-gelang-p-10"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_gelang_s_ho" id="uprjpl-gelang-s-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_gelang_s_18" id="uprjpl-gelang-s-18"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_gelang_m_ho" id="uprjpl-gelang-m-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_gelang_m_23" id="uprjpl-gelang-m-23"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_gelang_m_4" id="uprjpl-gelang-m-4"></td>
                            </tr>
                            <tr>
                                <td>Tempatkan pasien di kamar yang paling dekat dengan Nurse Station (jika memungkinkan)</td>
                                <td class="center"><input type="checkbox" name="uprjpl_station_p_ho" id="uprjpl-station-p-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_station_p_10" id="uprjpl-station-p-10"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_station_s_ho" id="uprjpl-station-s-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_station_s_18" id="uprjpl-station-s-18"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_station_m_ho" id="uprjpl-station-m-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_station_m_23" id="uprjpl-station-m-23"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_station_m_4" id="uprjpl-station-m-4"></td>
                            </tr>
                            <tr>
                                <td class="bold">Paraf</td>
                                <td class="center"><input type="checkbox" name="uprjpl_paraf_p_ho" id="uprjpl-paraf-p-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_paraf_p_10" id="uprjpl-paraf-p-10"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_paraf_s_ho" id="uprjpl-paraf-s-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_paraf_s_18" id="uprjpl-paraf-s-18"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_paraf_m_ho" id="uprjpl-paraf-m-ho"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_paraf_m_23" id="uprjpl-paraf-m-23"></td>
                                <td class="center"><input type="checkbox" name="uprjpl_paraf_m_4" id="uprjpl-paraf-m-4"></td>
                            </tr>
                            <tr>
                                <td class="bold">Perawat</td>
                                <td colspan="2">
                                    <div class="input-group">
                                        <input type="text" name="uprjpl_perawat_p" id="uprjpl-perawat-p" class="select2c-input ml-2">
                                    </div>
                                </td>
                                <td colspan="2">
                                    <div class="input-group">
                                        <input type="text" name="uprjpl_perawat_s" id="uprjpl-perawat-s" class="select2c-input ml-2">
                                    </div>
                                </td>
                                <td colspan="3">
                                    <div class="input-group">
                                        <input type="text" name="uprjpl_perawat_m" id="uprjpl-perawat-m" class="select2c-input ml-2">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <button type="button" title="Tambah Upaya Pencegahan" class="btn btn-info" onclick="tambahUpayaPencegahanLansia()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Upaya Pencegahan</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>`;

            html += tutupRapet();

            $('#buka-tutup-uprjpl').append(html);
        }

        // UPAYA LANSIA
        $('#data-upaya-pencegahan-risiko-jatuh-pasien-lansia').one('click', function() {
            $('#uprjpl-perawat-p, #uprjpl-perawat-s, #uprjpl-perawat-m, #uprjpl-edit-perawat-p, #uprjpl-edit-perawat-s, #uprjpl-edit-perawat-m')
                .select2c({
                    ajax: {
                        url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                        dataType: 'json',
                        quietMillis: 100,
                        data: function(term,
                            page) { // page is the one-based page number tracked by Select2
                            return {
                                q: term, //search term
                                page: page, // page number
                                jenis: $('#c_profesi').val(),
                            };
                        },
                        results: function(data, page) {
                            var more = (page * 20) < data
                                .total; // whether or not there are more results available

                            // notice we return the value of more so Select2 knows if more results can be loaded
                            return {
                                results: data.data,
                                more: more
                            };
                        }
                    },
                    formatResult: function(data) {
                        var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                        return markup;
                    },
                    formatSelection: function(data) {
                        return data.nama;
                    }
                });
        })

        // PENGKAJIAN LANSIA
        $('#data-pengkajian-ulang-risiko-jatuh-pasien-lansia').one('click', function() {
            $('#purjpl-perawat, #purjpl-edit-perawat').select2c({
                ajax: {
                    url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                    dataType: 'json',
                    quietMillis: 100,
                    data: function(term,
                        page) { // page is the one-based page number tracked by Select2
                        return {
                            q: term, //search term
                            page: page, // page number
                            jenis: $('#c_profesi').val(),
                        };
                    },
                    results: function(data, page) {
                        var more = (page * 20) < data
                            .total; // whether or not there are more results available

                        // notice we return the value of more so Select2 knows if more results can be loaded
                        return {
                            results: data.data,
                            more: more
                        };
                    }
                },
                formatResult: function(data) {
                    var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                    return markup;
                },
                formatSelection: function(data) {
                    return data.nama;
                }
            });
        })
    })

    function lihatFORM_KEP_117_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        $('#action').val(action);

        entriKeperawatanLansia(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_117_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        entriKeperawatanLansia(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_117_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        entriKeperawatanLansia(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriKeperawatanLansia(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        // console.log(id_pendaftaran, id_layanan_pendaftaran, bed, action);

        // $('#wizard_form_resume').bwizard('show', '0');

        $('#btn-simpan').hide();


        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat' ) {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_lansia") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {

                
                // LANSIA
                $('#purjpl-tanggal-pengkajian, #purjpl-edit-tanggal-pengkajian, #uprjpl-tanggal-pengkajian, #uprjpl-edit-tanggal-pengkajian')
                .datetimepicker({
                    format: 'DD/MM/YYYY',
                    maxDate: new Date(),
                    beforeShow: function(i) {
                        if ($(i).attr('readonly')) {
                            return false;
                        }
                    }
                });


                resetFormEntriKeperawatanLansia();
                $('#ek_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#ek-id-pendaftaran').val(id_pendaftaran);
                $('#ek-id-bed').val(bed);



                if (data.pasien !== null) {
                    $('#ek_id_pasien').val(data.pasien.id_pasien);
                    $('#ek_pasien_nama').text(data.pasien.nama);
                    $('#ek_pasien_no_rm').text(data.pasien.no_rm);
                    $('#ek_pasien_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data
                        .pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) +
                        ')'));
                    $('#ek_pasien_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' :
                        'Perempuan'));

                    if (data.pasien.alergi !== null) {
                        $('#ek_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#ek_pasien_alamat').text(data.pasien.alamat);
                }



                if (typeof data.pengkajian_ulang_resiko_jatuh_pasien_lansia !== 'undefined' || data
                    .pengkajian_ulang_resiko_jatuh_pasien_lansia !== null) {

                    showPengkajianUlangRisikoJatuhPasienLansia(data.pengkajian_ulang_resiko_jatuh_pasien_lansia,
                        id_pendaftaran, id_layanan_pendaftaran, bed, action);

                } else {

                    $('#tabel-purjpl tbody').empty();

                }

                if (typeof data.upaya_pencegahan_risiko_jatuh_pasien_lansia !== 'undefined' || data
                    .upaya_pencegahan_risiko_jatuh_pasien_lansia !== null) {

                    showUpayaPencegahanRisikoJatuhPasienLansia(data.upaya_pencegahan_risiko_jatuh_pasien_lansia,
                        id_pendaftaran, id_layanan_pendaftaran, bed, action);

                } else {

                    $('#tabel-uprjpl .body-table').empty();

                }
        
                $('#ek_bed').text(bed);

                $('.ek-logo-pasien-alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.ek-logo-pasien-alergi').show();
                    }
                }

                $('#modal_entri_keperawatan_rm').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }
    
    // PENGKAJIAN LANSIA
    // function calcscorepurjpl() {
    //     let score = 0;

    //     // Fungsi umum untuk menambahkan nilai berdasarkan checkbox
    //     function addScoreByName(name, valueMap, inputId, preventDuplicate = false, selectedSet = new Set()) {
    //         const selectedValue = $(`input[name='${name}']:checked`).val();
    //         if (!preventDuplicate || !selectedSet.has(selectedValue)) {
    //             const valueToAdd = parseInt(valueMap[selectedValue] || 0);
    //             score += valueToAdd;
    //             if (preventDuplicate) selectedSet.add(selectedValue);
    //             // Update nilai ke elemen input tersembunyi
    //             if (inputId) {
    //                 $(`#${inputId}`).val(valueToAdd || 0);
    //             }
    //         }
    //     }

    //     const uniqueValuesSet = new Set(); // Untuk mencegah duplikasi nilai

    //     // Riwayat jatuh
    //     addScoreByName("purjpl_pasien_datang_karena_jatuh", { "6": 6 }, "purjpl-pasien-datang-karena-jatuh", true, uniqueValuesSet);
    //     addScoreByName("purjpl_jatuh_2_bulan_terakhir", { "6": 6 }, "purjpl-jatuh-2-bulan-terakhir", true, uniqueValuesSet);

    //     // Status mental
    //     addScoreByName("purjpl_pasien_delirium", { "14": 14 }, "purjpl-pasien-delirium", true, uniqueValuesSet);
    //     addScoreByName("purjpl_pasien_disorientasi", { "14": 14 }, "purjpl-pasien-disorientasi", true, uniqueValuesSet);
    //     addScoreByName("purjpl_pasien_agitasi", { "14": 14 }, "purjpl-pasien-agitasi", true, uniqueValuesSet);

    //     // Penglihatan
    //     addScoreByName("purjpl_pasien_kacamata", { "1": 1 }, "purjpl-pasien-kacamata", true, uniqueValuesSet);
    //     addScoreByName("purjpl_pasien_buram", { "1": 1 }, "purjpl-pasien-buram", true, uniqueValuesSet);
    //     addScoreByName("purjpl_pasien_glaukoma", { "1": 1 }, "purjpl-pasien-glaukoma", true, uniqueValuesSet);

    //     // Berkemih
    //     addScoreByName("purjpl_pasien_berkemih", { "2": 2, "0": 0 }, "purjpl-pasien-berkemih");

    //     // Transfer
    //     addScoreByName("purjpl_pasien_mandirit", { "0": 0, "1": 1, "2": 2, "3": 3 }, "purjpl-pasien-mandirit");

    //     // Mobilitas
    //     addScoreByName("purjpl_pasien_m_mandiri", { "0": 0, "1": 1, "2": 2, "3": 3 }, "purjpl-pasien-m-mandiri");

    //     // Masukkan skor total ke input
    //     $('#purjpl-jumlah-skor, #purjpl-edit-jumlah-skor').val(score);
    // }

    function calcscorepurjpl() {
        let score = 0;
  
        function addScoreByName(name, valueMap, inputId, preventDuplicate = false, selectedSet = new Set()) { // Fungsi umum untuk menambahkan nilai berdasarkan checkbox
            
            const selectedValue = $(`input[name='${name}']:checked`).val();// Mengambil nilai dari checkbox yang dipilih berdasarkan 'name'

            
            if (!preventDuplicate || !selectedSet.has(selectedValue)) { // Jika tidak ada duplikasi atau preventDuplicate false, maka lanjutkan menambahkan nilai
                const valueToAdd = parseInt(valueMap[selectedValue] || 0); // Ambil nilai sesuai dengan valueMap
                score += valueToAdd; // Tambahkan nilai ke total score

                // Jika preventDuplicate aktif, tambahkan nilai yang sudah dipilih ke dalam selectedSet agar tidak duplikat
                if (preventDuplicate) selectedSet.add(selectedValue);

                // Update nilai ke elemen input tersembunyi jika ada inputId
                if (inputId) {
                    $(`#${inputId}`).val(valueToAdd || 0);
                }
            }
        }

        
        const uniqueValuesSet = new Set(); // Set untuk mencegah duplikasi nilai (misalnya jika ada pilihan yang sama)

        // Riwayat jatuh - Menambahkan nilai berdasarkan kondisi riwayat jatuh pasien
        addScoreByName("purjpl_pasien_datang_karena_jatuh", { "6": 6 }, "purjpl-pasien-datang-karena-jatuh", true, uniqueValuesSet);
        addScoreByName("purjpl_jatuh_2_bulan_terakhir", { "6": 6 }, "purjpl-jatuh-2-bulan-terakhir", true, uniqueValuesSet);

        // Status mental - Menambahkan nilai untuk kondisi status mental pasien
        addScoreByName("purjpl_pasien_delirium", { "14": 14 }, "purjpl-pasien-delirium", true, uniqueValuesSet);
        addScoreByName("purjpl_pasien_disorientasi", { "14": 14 }, "purjpl-pasien-disorientasi", true, uniqueValuesSet);
        addScoreByName("purjpl_pasien_agitasi", { "14": 14 }, "purjpl-pasien-agitasi", true, uniqueValuesSet);

        // Penglihatan - Menambahkan nilai berdasarkan kondisi penglihatan pasien
        addScoreByName("purjpl_pasien_kacamata", { "1": 1 }, "purjpl-pasien-kacamata", true, uniqueValuesSet);
        addScoreByName("purjpl_pasien_buram", { "1": 1 }, "purjpl-pasien-buram", true, uniqueValuesSet);
        addScoreByName("purjpl_pasien_glaukoma", { "1": 1 }, "purjpl-pasien-glaukoma", true, uniqueValuesSet);

        // Berkemih - Menambahkan nilai berdasarkan kondisi berkemih pasien
        addScoreByName("purjpl_pasien_berkemih", { "2": 2, "0": 0 }, "purjpl-pasien-berkemih");

        // Transfer - Menambahkan nilai berdasarkan tingkat mandiri pasien
        addScoreByName("purjpl_pasien_mandirit", { "0": 0, "1": 1, "2": 2, "3": 3 }, "purjpl-pasien-mandirit");

        // Mobilitas - Menambahkan nilai berdasarkan tingkat mobilitas pasien
        addScoreByName("purjpl_pasien_m_mandiri", { "0": 0, "1": 1, "2": 2, "3": 3 }, "purjpl-pasien-m-mandiri");

        // Masukkan skor total ke input tersembunyi untuk menampilkan hasil
        $('#purjpl-jumlah-skor, #purjpl-edit-jumlah-skor').val(score);
    }

    // PENGKAJIAN LANSIA
    function editPengkajianUlangResikoJatuhPasienLansia(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        const modal = $('#modal-edit-pengkajian-ulang-risiko-jatuh-pasien-lansia');
        $('#update-purjpl').children().remove();

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_pengkajian_ulang_resiko_jatuh_pasien_lansia") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-purjpl').empty();
                $('#id-pengkajian-ulang-risiko-jatuh-pasien-lansia').val(id);

                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;

                }

                let edit_tanggal_pengkajian = formatTanggalKhusus(data.tanggal_pengkajian);
                $('#purjpl-edit-tanggal-pengkajian').val(edit_tanggal_pengkajian);

                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-pengkajian-ulang-risiko-jatuh-pasien-lansia').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
							<button type="button" class="btn btn-info waves-effect" onclick="updatePengkajianUalngRisikoJatuhPasienLansia(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-purjpl').append(cttntndkn);

                // Pasien datang karena jatuh
                $('#purjpl-edit-pasien-datang-karena-jatuh').val(data.pasien_datang_karena_jatuh);
                modal.find('table input[name="purjpl_pasien_datang_karena_jatuh"]').each(function() {
                    if ($(this).val() === data.pasien_datang_karena_jatuh) $(this).prop('checked',
                        true);
                });

                // Pasien jatuh 2 bulan terakhir
                $('#purjpl-edit-jatuh-2-bulan-terakhir').val(data.jatuh_dua_bulan_terakhir);
                modal.find('table input[name="purjpl_jatuh_2_bulan_terakhir"]').each(function() {
                    if ($(this).val() === data.jatuh_dua_bulan_terakhir) $(this).prop('checked', true);
                });

                // Pasien delirium
                $('#purjpl-edit-pasien-delirium').val(data.delirium);
                modal.find('table input[name="purjpl_pasien_delirium"]').each(function() {
                    if ($(this).val() === data.delirium) $(this).prop('checked', true);
                });

                // Pasien disorientasi
                $('#purjpl-edit-pasien-disorientasi').val(data.disorientasi)
                modal.find('table input[name="purjpl_pasien_disorientasi"]').each(function() {
                    if ($(this).val() === data.disorientasi) $(this).prop('checked', true);
                });

                // Pasien agitasi
                $('#purjpl-edit-pasien-agitasi').val(data.agitasi);
                modal.find('table input[name="purjpl_pasien_agitasi"]').each(function() {
                    if ($(this).val() === data.agitasi) $(this).prop('checked', true);
                });


                // Pasien kacamata
                $('#purjpl-edit-pasien-kacamata').val(data.kacamata);
                modal.find('table input[name="purjpl_pasien_kacamata"]').each(function() {
                    if ($(this).val() === data.kacamata) $(this).prop('checked',
                        true);
                });

                // Pasien buram
                $('#purjpl-edit-pasien-buram').val(data.buram);
                modal.find('table input[name="purjpl_pasien_buram"]').each(function() {
                    if ($(this).val() === data.buram) $(this).prop('checked', true);
                });

                // Pasien glaukoma
                $('#purjpl-edit-pasien-glaukoma').val(data.galukoma);
                modal.find('table input[name="purjpl_pasien_glaukoma"]').each(function() {
                    if ($(this).val() === data.galukoma) $(this).prop('checked', true);
                });

                // Pasien berkemih
                $('#purjpl-edit-pasien-berkemih').val(data.berkemih);
                modal.find('table input[name="purjpl_pasien_berkemih"]').each(function() {
                    if ($(this).val() === data.berkemih) $(this).prop('checked', true);
                });


                $('#purjpl-edit-pasien-mandirit').val(data.purjpl_pasien_mandirit);
                modal.find('table input[name="purjpl_pasien_mandirit"]').each(function() {
                    if ($(this).val() === data.purjpl_pasien_mandirit) $(this).prop('checked', true);
                });


                $('#purjpl-pasien-m-mandiri').val(data.purjpl_pasien_m_mandiri);
                modal.find('table input[name="purjpl_pasien_m_mandiri"]').each(function() {
                    if ($(this).val() === data.purjpl_pasien_m_mandiri) $(this).prop('checked', true);
                });


         













                // // Pasien mandiri
                // $('#purjpl-edit-mandiri').val(data.mandiri);
                // if ($('#purjpl-edit-pasien-mandiri').val() === data.mandiri) {
                //     $('#purjpl-edit-pasien-mandiri').prop('checked', true);
                // } else {
                //     $('#purjpl-edit-pasien-mandiri').prop('checked', false);
                // }

                // // Pasien sedikit bantuan
                // $('#purjpl-edit-sedikit-bantuan').val(data.sedikit_bantuan);
                // if ($('#purjpl-edit-pasien-sedikit-bantuan').val() === data.sedikit_bantuan) {
                //     $('#purjpl-edit-pasien-sedikit-bantuan').prop('checked', true);
                // } else {
                //     $('#purjpl-edit-pasien-sedikit-bantuan').prop('checked', false);
                // }

                // // Pasien bantuan nyata
                // $('#purjpl-edit-bantuan-nyata').val(data.bantuan_nyata);
                // if ($('#purjpl-edit-pasien-bantuan-nyata').val() === data.bantuan_nyata) {
                //     $('#purjpl-edit-pasien-bantuan-nyata').prop('checked', true);
                // } else {
                //     $('#purjpl-edit-pasien-bantuan-nyata').prop('checked', false);
                // }

                // // Pasien bantuan total
                // $('#purjpl-edit-bantuan-total').val(data.bantuan_total);
                // if ($('#purjpl-edit-pasien-bantuan-total').val() === data.bantuan_total) {
                //     $('#purjpl-edit-pasien-bantuan-total').prop('checked', true);
                // } else {
                //     $('#purjpl-edit-pasien-bantuan-total').prop('checked', false);
                // }

                // Pasien mobilitas mandiri
                // $('#purjpl-edit-m-mandiri').val(data.m_mandiri);
                // if ($('#purjpl-edit-pasien-m-mandiri').val() === data.m_mandiri) {
                //     $('#purjpl-edit-pasien-m-mandiri').prop('checked', true);
                // } else {
                //     $('#purjpl-edit-pasien-m-mandiri').prop('checked', false);
                // }

                // // Pasien mobilitas sedikit bantuan
                // $('#purjpl-edit-m-sedikit-bantuan').val(data.m_sedikit_bantuan);
                // if ($('#purjpl-edit-pasien-m-sedikit-bantuan').val() === data.m_sedikit_bantuan) {
                //     $('#purjpl-edit-pasien-m-sedikit-bantuan').prop('checked', true);
                // } else {
                //     $('#purjpl-edit-pasien-m-sedikit-bantuan').prop('checked', false);
                // }

                // // Pasien kursi roda
                // $('#purjpl-edit-kursi-roda').val(data.kursi_roda);
                // if ($('#purjpl-edit-pasien-kursi-roda').val() === data.kursi_roda) {
                //     $('#purjpl-edit-pasien-kursi-roda').prop('checked', true);
                // } else {
                //     $('#purjpl-edit-pasien-kursi-roda').prop('checked', false);
                // }

                // // Pasien imobilisasi
                // $('#purjpl-edit-imobilisasi').val(data.imobilisasi);
                // if ($('#purjpl-edit-pasien-imobilisasi').val() === data.imobilisasi) {
                //     $('#purjpl-edit-pasien-imobilisasi').prop('checked', true);
                // } else {
                //     $('#purjpl-edit-pasien-imobilisasi').prop('checked', false);
                // }


                $('#purjpl-edit-jumlah-skor').val(data.jumlah_skor);


                $('#purjpl-edit-paraf').prop('checked', true);

                $('#purjpl-edit-perawat').val(data.id_perawat);
                $('#s2id_purjpl-edit-perawat a .select2c-chosen').html(data.nama_perawat);

                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    // PENGKAJIAN LANSIA 
    // function showPengkajianUlangRisikoJatuhPasienLansia(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
    //     $('#tabel-purjpl tbody').empty();
    //     if (data !== null) {
    //         $.each(data, function(i, v) {
    //             const selOp =
    //                 '<td align="center"><button type="button" class="btn btn-success btn-xs" onclick="editPengkajianUlangResikoJatuhPasienLansia(this, ' +
    //                 v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
    //                 '\')"><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-danger btn-xs" onclick="hapusPengkajianUlangResikoJatuhPasienLansia(this, ' +
    //                 v.id + ')"> <i class="fas fa-trash-alt"></i> Hapus</button> </td>';

    //             let html = /* html */ `
    //                 <tr>
    //                     <td class="number-terapi" align="center">${(++i)}</td>
    //                     <td align="center">${v.tanggal_pengkajian ? datefmysql(v.tanggal_pengkajian) : '-'}</td>
    //                     <td align="center">${v.paraf == '1' ? '&check;' : '&#10006;'}</td>
    //                     <td align="center">${v.perawat}</td>
    //                     <td align="center">${v.jumlah_skor}</td>
    //                     <td align="center">${v.akun_user}</td>
    //                     ${selOp}
    //                 </tr>
    //             `;
    //             $('#tabel-purjpl tbody').append(html);
    //         })
    //     }
    // }

    function showPengkajianUlangRisikoJatuhPasienLansia(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        // console.log(data, id_pendaftaran, id_layanan_pendaftaran, bed, action);
        $('#tabel-purjpl tbody').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                // const selOp = (action === '#action') ? // Jika aksi "lihat", sembunyikan tombol
                //     '<td align="center"><button type="button" class="btn btn-success btn-xs" style="display: none;"> <i class="fas fa-edit"></i> Edit</button> ' +
                //     '<button type="button" class="btn btn-danger btn-xs" style="display: none;"> <i class="fas fa-trash-alt"></i> Hapus</button> </td>' :
                //     '<td align="center"><button type="button" class="btn btn-success btn-xs" onclick="editPengkajianUlangResikoJatuhPasienLansia(this, ' +
                //     v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                //     '\')"><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-danger btn-xs" onclick="hapusPengkajianUlangResikoJatuhPasienLansia(this, ' +
                //     v.id + ')"> <i class="fas fa-trash-alt"></i> Hapus</button> </td>';

                const selOp = (action === 'lihat') ? 
                    '<td align="center"><button type="button" class="btn btn-success btn-xs" style="display: none;"> <i class="fas fa-edit"></i> Edit</button> ' +
                    '<button type="button" class="btn btn-danger btn-xs" style="display: none;"> <i class="fas fa-trash-alt"></i> Hapus</button> </td>' :
                    '<td align="center"><button type="button" class="btn btn-success btn-xs" onclick="editPengkajianUlangResikoJatuhPasienLansia(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-danger btn-xs" onclick="hapusPengkajianUlangResikoJatuhPasienLansia(this, ' +
                    v.id + ')"> <i class="fas fa-trash-alt"></i> Hapus</button> </td>';

                let html = /* html */ `
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td align="center">${v.tanggal_pengkajian ? datefmysql(v.tanggal_pengkajian) : '-'}</td>
                        <td align="center">${v.paraf == '1' ? '&check;' : '&#10006;'}</td>
                        <td align="center">${v.perawat}</td>
                        <td align="center">${v.jumlah_skor}</td>
                        <td align="center">${v.akun_user}</td>
                        ${selOp}
                    </tr>
                `;
                $('#tabel-purjpl tbody').append(html);
            });
        }
    }

    // PENGKAJIAN LANSIA
    if (typeof numberPurjpl === 'undefined') {
        var numberPurjpl = 1;
    }

    // PENGKAJIAN LANSIA
    function tambahPengkajianLansia() {
        if ($('#purjpl-tanggal-pengkajian').val() === '') {
            syams_validation('#purjpl-tanggal-pengkajian', 'Tanggal Pengkajian harus diisi.');
            return false;
        } else {
            syams_validation_remove('#purjpl-tanggal-pengkajian');
        }

        let html = '';
        let number = $('.nomer-pengkajian').length;
        let purjpl_tanggal_pengkajian = $('#purjpl-tanggal-pengkajian').val();
        let jumlah_skor = $('#purjpl-jumlah-skor').val();
        // let purjpl_pasien_datang_karena_jatuh = $('#purjpl-pasien-datang-karena-jatuh').val();
        // let purjpl_jatuh_2_bulan_terakhir = $('#purjpl-jatuh-2-bulan-terakhir').val();
        // let purjpl_pasien_delirium = $('#purjpl-pasien-delirium').val();
        // let purjpl_pasien_disorientasi = $('#purjpl-pasien-disorientasi').val();
        // let purjpl_pasien_agitasi = $('#purjpl-pasien-agitasi').val();
        // let purjpl_pasien_kacamata = $('#purjpl-pasien-kacamata').val();
        // let purjpl_pasien_buram = $('#purjpl-pasien-buram').val();
        // let purjpl_pasien_galukoma = $('#purjpl-pasien-glaukoma').val();

        let purjpl_pasien_datang_karena_jatuh = $('input[name="purjpl_pasien_datang_karena_jatuh"]:checked').val() || 0;
        let purjpl_jatuh_2_bulan_terakhir = $('input[name="purjpl_pasien_datang_karena_jatuh"]:checked').val() || 0;
        let purjpl_pasien_delirium = $('input[name="purjpl_pasien_delirium"]:checked').val() || 0;
        let purjpl_pasien_disorientasi = $('input[name="purjpl_pasien_delirium"]:checked').val() || 0;
        let purjpl_pasien_agitasi = $('input[name="purjpl_pasien_delirium"]:checked').val() || 0;
        let purjpl_pasien_kacamata = $('input[name="purjpl_pasien_kacamata"]:checked').val() || 0;
        let purjpl_pasien_buram = $('input[name="purjpl_pasien_kacamata"]:checked').val() || 0;
        let purjpl_pasien_galukoma = $('input[name="purjpl_pasien_kacamata"]:checked').val() || 0;

        // console.log(purjpl_pasien_datang_karena_jatuh);
        // console.log(purjpl_jatuh_2_bulan_terakhir);
        // console.log(purjpl_pasien_delirium);
        // console.log(purjpl_pasien_disorientasi);
        // console.log(purjpl_pasien_agitasi);
        // console.log(purjpl_pasien_kacamata);
        // console.log(purjpl_pasien_buram);
        // console.log(purjpl_pasien_galukoma);

        let purjpl_berkemih = $('#purjpl-pasien-berkemih').val();
        let purjpl_pasien_mandirit = $('#purjpl-pasien-mandirit').val();
        let purjpl_pasien_m_mandiri = $('#purjpl-pasien-m-mandiri').val();
        let nama_perawat = $('#s2id_purjpl-perawat a .select2c-chosen').html();
        let id_perawat = $('#purjpl-perawat').val();
        let paraf = $('#purjpl-paraf').is(':checked');        
        html = /* html */ `
            <tr>
                <td class="number-pengkajian" align="center">${numberPurjpl++}</td>
                <td align="center">
                	<input type="hidden" name="purjpl_tanggal_pengkajian[]" value="${purjpl_tanggal_pengkajian}">${purjpl_tanggal_pengkajian}
                </td>
                <td align="center">
                	<input type="hidden" name="purjpl_paraf[]" value="${paraf ? 1 : 0}">${paraf ? '&check;' : '&#10006;'}
                </td>
                <td align="center">
                	<input type="hidden" name="purjpl_perawat[]" value="${id_perawat}">${nama_perawat}
                </td>
                <td align="center">
                	<input type="hidden" name="jumlah_skor[]" value="${jumlah_skor}">
                	${jumlah_skor}
                </td>
                <td align="center">
					<?= $this->session->userdata('nama') ?>
					<input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
					<input type="hidden" name="pengkajian_date_lansia[]" value="<?= date("Y-m-d H:i:s") ?>">
					<input type="hidden" name="purjpl_pasien_datang_karena_jatuh[]" value="${purjpl_pasien_datang_karena_jatuh}">
					<input type="hidden" name="purjpl_jatuh_2_bulan_terakhir[]" value="${purjpl_jatuh_2_bulan_terakhir}">
					<input type="hidden" name="purjpl_pasien_delirium[]" value="${purjpl_pasien_delirium}">
					<input type="hidden" name="purjpl_pasien_disorientasi[]" value="${purjpl_pasien_disorientasi}">
					<input type="hidden" name="purjpl_pasien_agitasi[]" value="${purjpl_pasien_agitasi}">
					<input type="hidden" name="purjpl_pasien_kacamata[]" value="${purjpl_pasien_kacamata}">
					<input type="hidden" name="purjpl_pasien_buram[]" value="${purjpl_pasien_buram}">
					<input type="hidden" name="purjpl_pasien_galukoma[]" value="${purjpl_pasien_galukoma}">
					<input type="hidden" name="purjpl_berkemih[]" value="${purjpl_berkemih}">
					<input type="hidden" name="purjpl_pasien_mandirit[]" value="${purjpl_pasien_mandirit}">
					<input type="hidden" name="purjpl_pasien_m_mandiri[]" value="${purjpl_pasien_m_mandiri}">				
                </td>
                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#tabel-purjpl tbody').append(html);
    }

    // PENGKAJIAN LANSIA
    function hapusPengkajianUlangResikoJatuhPasienLansia(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_pengkajian_ulang_resiko_jatuh_pasien_lansia") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Pengkajian Uang Resiko Jatuh Lansia', data
                                        .message);
                                }
                            },
                            error: function(e) {
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }






  

    function resetFormEntriKeperawatanLansia() {
        $('#form_entri_keperawatan_lansia')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false); 

        // Pengkajian Ulang Resiko Jatuh Pasien lansia
        $('#s2id_purjpl-perawat a .select2c-chosen').empty();
        $('#purjpl-tanggal-pengkajian').val('');
        $('#purjpl-jumlah-skor').val('');
        $('#purjpl-perawat').val('');

        // For non-blocking code (Asyncronous)
        setTimeout(() => {
            $('#purjpl-riwayat-jatuh, #purjpl-pasien-datang-karena-jatuh, #purjpl-jatuh-2-bulan-terakhir, #purjpl-mental, #purjpl-pasien-delirium, #purjpl-pasien-disorientasi, #purjpl-pasien-agitasi, #purjpl-penglihatan, #purjpl-pasien-kacamata, #purjpl-pasien-buram, #purjpl-pasien-glaukoma, #purjpl-berkemih, #purjpl-pasien-berkemih, #purjpl-transfer, #purjpl-mandiri, #purjpl-sedikit-bantuan, #purjpl-bantuan-nyata, #purjpl-bantuan-total, #purjpl-mobilitas, #purjpl-m-mandiri, #purjpl-m-sedikit-bantuan, #purjpl-kursi-roda, #purjpl-imobilisasi')
                .val('');
            $('#form-purjpl').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)

        // Upaya Pencegahan Resiko Jatuh Pasien lansia
        $('#s2id_uprjpl-perawat-p a .select2c-chosen').empty();
        $('#s2id_uprjpl-perawat-s a .select2c-chosen').empty();
        $('#s2id_uprjpl-perawat-m a .select2c-chosen').empty();
        $('#uprjpl-tanggal-pengkajian').val('');
        $('#uprjpl-perawat-p').val('');
        $('#uprjpl-perawat-s').val('');
        $('#uprjpl-perawat-m').val('');

        // For non-blocking code (Asyncronous)
        setTimeout(() => {
            $('#form-uprjpl').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)
    }

    function konfirmasiSimpanEntriLansia() {
        swal.fire({
            title: 'Simpan Entri Keperawatan',
            text: "Apakah anda yakin akan menyimpan Form Pengkajian Ulang Dan Pemantauan Risiko Jatuh Pasien Lansia?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanEntriLansia();
            }
        })

      
    }


    function simpanEntriLansia() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_resiko_jatuh_pasien_lansia") ?>',
            data: $('#form_entri_keperawatan_lansia').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {

                        $('#wizard_form_resume').bwizard('show', data.respon.show);

                        if (data.respon.add_show !== undefined) {

                            $('#wizard-resume-group').bwizard('show', data.respon.add_show);

                            if (data.respon.id !== undefined) {
                                $(data.respon.id).addClass('show');
                            }

                        } else {

                            if (data.respon.id !== undefined) {
                                $(data.respon.id).addClass('show');
                            }

                        }

                        if (data.respon.status === false) {

                            bootbox.dialog({
                                message: data.respon.message,
                                title: "Penyimpanan Data Gagal",
                                buttons: {
                                    batal: {
                                        label: '<i class=" fas fa-times-circle"></i> Close',
                                        className: "btn-danger",
                                        callback: function() {

                                        }
                                    }

                                }
                            });

                        }

                    }

                } else {

                    $('input[name=csrf_syam]').val(data.token);
                    if (data.status) {
                        messageAddSuccess();
                        $('#modal_entri_keperawatan_rm').modal('hide');
                        showListForm($('#ek-id-pendaftaran').val(), $('#ek_id_layanan_pendaftaran').val(), $('#ek_id_pasien').val());
                    } else {
                        messageAddFailed();
                    }
                }

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed();
            }
        });
    }

    // UPAYA LANSIA
    function editUpayaPencegahanRisikoJatuhPasienLansia(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        const modal = $('#modal-edit-upaya-pencegahan-risiko-jatuh-pasien-lansia');
        $('#update-uprjpl').children().remove();

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_upaya_pencegahan_risiko_jatuh_pasien_lansia") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-purjpl').empty();
                $('#id-upaya-pencegahan-risiko-jatuh-pasien-lansia').val(id);

                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;

                }

                let edit_tanggal_pengkajian = formatTanggalKhusus(data.tanggal_pengkajian);
                $('#uprjpl-edit-tanggal-pengkajian').val(edit_tanggal_pengkajian);

                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-upaya-pencegahan-risiko-jatuh-pasien-lansia').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
							<button type="button" class="btn btn-info waves-effect" onclick="updateUpayaPencegahanRisikoJatuhPasienLansia(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-uprjpl').append(cttntndkn);

                // Bel berfungsi dan mudah dihangkau
                data.bel_p_ho == '1' ? $('#uprjpl-edit-bel-p-ho').prop('checked', true) : $(
                    '#uprjpl-edit-bel-p-ho').prop('checked', false);
                data.bel_p_10 == '1' ? $('#uprjpl-edit-bel-p-10').prop('checked', true) : $(
                    '#uprjpl-edit-bel-p-10').prop('checked', false);
                data.bel_s_ho == '1' ? $('#uprjpl-edit-bel-s-ho').prop('checked', true) : $(
                    '#uprjpl-edit-bel-s-ho').prop('checked', false);
                data.bel_s_18 == '1' ? $('#uprjpl-edit-bel-s-18').prop('checked', true) : $(
                    '#uprjpl-edit-bel-s-18').prop('checked', false);
                data.bel_m_ho == '1' ? $('#uprjpl-edit-bel-m-ho').prop('checked', true) : $(
                    '#uprjpl-edit-bel-m-ho').prop('checked', false);
                data.bel_m_23 == '1' ? $('#uprjpl-edit-bel-m-23').prop('checked', true) : $(
                    '#uprjpl-edit-bel-m-23').prop('checked', false);
                data.bel_m_4 == '1' ? $('#uprjpl-edit-bel-m-4').prop('checked', true) : $(
                    '#uprjpl-edit-bel-m-4').prop('checked', false);

                // Roda tempat tidur terkunci
                data.roda_p_ho == '1' ? $('#uprjpl-edit-roda-p-ho').prop('checked', true) : $(
                    '#uprjpl-edit-roda-p-ho').prop('checked', false);
                data.roda_p_10 == '1' ? $('#uprjpl-edit-roda-p-10').prop('checked', true) : $(
                    '#uprjpl-edit-roda-p-10').prop('checked', false);
                data.roda_s_ho == '1' ? $('#uprjpl-edit-roda-s-ho').prop('checked', true) : $(
                    '#uprjpl-edit-roda-s-ho').prop('checked', false);
                data.roda_s_18 == '1' ? $('#uprjpl-edit-roda-s-18').prop('checked', true) : $(
                    '#uprjpl-edit-roda-s-18').prop('checked', false);
                data.roda_m_ho == '1' ? $('#uprjpl-edit-roda-m-ho').prop('checked', true) : $(
                    '#uprjpl-edit-roda-m-ho').prop('checked', false);
                data.roda_m_23 == '1' ? $('#uprjpl-edit-roda-m-23').prop('checked', true) : $(
                    '#uprjpl-edit-roda-m-23').prop('checked', false);
                data.roda_m_4 == '1' ? $('#uprjpl-edit-roda-m-4').prop('checked', true) : $(
                    '#uprjpl-edit-roda-m-4').prop('checked', false);

                // Posisikan tempat tidur pada posisi terendah
                data.ptt_p_ho == '1' ? $('#uprjpl-edit-ptt-p-ho').prop('checked', true) : $(
                    '#uprjpl-edit-ptt-p-ho').prop('checked', false);
                data.ptt_p_10 == '1' ? $('#uprjpl-edit-ptt-p-10').prop('checked', true) : $(
                    '#uprjpl-edit-ptt-p-10').prop('checked', false);
                data.ptt_s_ho == '1' ? $('#uprjpl-edit-ptt-s-ho').prop('checked', true) : $(
                    '#uprjpl-edit-ptt-s-ho').prop('checked', false);
                data.ptt_s_18 == '1' ? $('#uprjpl-edit-ptt-s-18').prop('checked', true) : $(
                    '#uprjpl-edit-ptt-s-18').prop('checked', false);
                data.ptt_m_ho == '1' ? $('#uprjpl-edit-ptt-m-ho').prop('checked', true) : $(
                    '#uprjpl-edit-ptt-m-ho').prop('checked', false);
                data.ptt_m_23 == '1' ? $('#uprjpl-edit-ptt-m-23').prop('checked', true) : $(
                    '#uprjpl-edit-ptt-m-23').prop('checked', false);
                data.ptt_m_4 == '1' ? $('#uprjpl-edit-ptt-m-4').prop('checked', true) : $(
                    '#uprjpl-edit-ptt-m-4').prop('checked', false);

                // Pagar pengaman tempat tidur dinaikan
                data.ppt_p_ho == '1' ? $('#uprjpl-edit-ppt-p-ho').prop('checked', true) : $(
                    '#uprjpl-edit-ppt-p-ho').prop('checked', false);
                data.ppt_p_10 == '1' ? $('#uprjpl-edit-ppt-p-10').prop('checked', true) : $(
                    '#uprjpl-edit-ppt-p-10').prop('checked', false);
                data.ppt_s_ho == '1' ? $('#uprjpl-edit-ppt-s-ho').prop('checked', true) : $(
                    '#uprjpl-edit-ppt-s-ho').prop('checked', false);
                data.ppt_s_18 == '1' ? $('#uprjpl-edit-ppt-s-18').prop('checked', true) : $(
                    '#uprjpl-edit-ppt-s-18').prop('checked', false);
                data.ppt_m_ho == '1' ? $('#uprjpl-edit-ppt-m-ho').prop('checked', true) : $(
                    '#uprjpl-edit-ppt-m-ho').prop('checked', false);
                data.ppt_m_23 == '1' ? $('#uprjpl-edit-ppt-m-23').prop('checked', true) : $(
                    '#uprjpl-edit-ppt-m-23').prop('checked', false);
                data.ppt_m_4 == '1' ? $('#uprjpl-edit-ppt-m-4').prop('checked', true) : $(
                    '#uprjpl-edit-ppt-m-4').prop('checked', false);

                // Penerang cukup
                data.penerangan_p_ho == '1' ? $('#uprjpl-edit-penerangan-p-ho').prop('checked', true) : $(
                    '#uprjpl-edit-penerangan-p-ho').prop('checked', false);
                data.penerangan_p_10 == '1' ? $('#uprjpl-edit-penerangan-p-10').prop('checked', true) : $(
                    '#uprjpl-edit-penerangan-p-10').prop('checked', false);
                data.penerangan_s_ho == '1' ? $('#uprjpl-edit-penerangan-s-ho').prop('checked', true) : $(
                    '#uprjpl-edit-penerangan-s-ho').prop('checked', false);
                data.penerangan_s_18 == '1' ? $('#uprjpl-edit-penerangan-s-18').prop('checked', true) : $(
                    '#uprjpl-edit-penerangan-s-18').prop('checked', false);
                data.penerangan_m_ho == '1' ? $('#uprjpl-edit-penerangan-m-ho').prop('checked', true) : $(
                    '#uprjpl-edit-penerangan-m-ho').prop('checked', false);
                data.penerangan_m_23 == '1' ? $('#uprjpl-edit-penerangan-m-23').prop('checked', true) : $(
                    '#uprjpl-edit-penerangan-m-23').prop('checked', false);
                data.penerangan_m_4 == '1' ? $('#uprjpl-edit-penerangan-m-4').prop('checked', true) : $(
                    '#uprjpl-edit-penerangan-m-4').prop('checked', false);

                // Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan
                data.alas_p_ho == '1' ? $('#uprjpl-edit-alas-p-ho').prop('checked', true) : $(
                    '#uprjpl-edit-alas-p-ho').prop('checked', false);
                data.alas_p_10 == '1' ? $('#uprjpl-edit-alas-p-10').prop('checked', true) : $(
                    '#uprjpl-edit-alas-p-10').prop('checked', false);
                data.alas_s_ho == '1' ? $('#uprjpl-edit-alas-s-ho').prop('checked', true) : $(
                    '#uprjpl-edit-alas-s-ho').prop('checked', false);
                data.alas_s_18 == '1' ? $('#uprjpl-edit-alas-s-18').prop('checked', true) : $(
                    '#uprjpl-edit-alas-s-18').prop('checked', false);
                data.alas_m_ho == '1' ? $('#uprjpl-edit-alas-m-ho').prop('checked', true) : $(
                    '#uprjpl-edit-alas-m-ho').prop('checked', false);
                data.alas_m_23 == '1' ? $('#uprjpl-edit-alas-m-23').prop('checked', true) : $(
                    '#uprjpl-edit-alas-m-23').prop('checked', false);
                data.alas_m_4 == '1' ? $('#uprjpl-edit-alas-m-4').prop('checked', true) : $(
                    '#uprjpl-edit-alas-m-4').prop('checked', false);

                // Lantai kering dan tidak licin
                data.lantai_p_ho == '1' ? $('#uprjpl-edit-lantai-p-ho').prop('checked', true) : $(
                    '#uprjpl-edit-lantai-p-ho').prop('checked', false);
                data.lantai_p_10 == '1' ? $('#uprjpl-edit-lantai-p-10').prop('checked', true) : $(
                    '#uprjpl-edit-lantai-p-10').prop('checked', false);
                data.lantai_s_ho == '1' ? $('#uprjpl-edit-lantai-s-ho').prop('checked', true) : $(
                    '#uprjpl-edit-lantai-s-ho').prop('checked', false);
                data.lantai_s_18 == '1' ? $('#uprjpl-edit-lantai-s-18').prop('checked', true) : $(
                    '#uprjpl-edit-lantai-s-18').prop('checked', false);
                data.lantai_m_ho == '1' ? $('#uprjpl-edit-lantai-m-ho').prop('checked', true) : $(
                    '#uprjpl-edit-lantai-m-ho').prop('checked', false);
                data.lantai_m_23 == '1' ? $('#uprjpl-edit-lantai-m-23').prop('checked', true) : $(
                    '#uprjpl-edit-lantai-m-23').prop('checked', false);
                data.lantai_m_4 == '1' ? $('#uprjpl-edit-lantai-m-4').prop('checked', true) : $(
                    '#uprjpl-edit-lantai-m-4').prop('checked', false);

                // Dekatkan alat-alat pasien
                data.alat_p_ho == '1' ? $('#uprjpl-edit-alat-p-ho').prop('checked', true) : $(
                    '#uprjpl-edit-alat-p-ho').prop('checked', false);
                data.alat_p_10 == '1' ? $('#uprjpl-edit-alat-p-10').prop('checked', true) : $(
                    '#uprjpl-edit-alat-p-10').prop('checked', false);
                data.alat_s_ho == '1' ? $('#uprjpl-edit-alat-s-ho').prop('checked', true) : $(
                    '#uprjpl-edit-alat-s-ho').prop('checked', false);
                data.alat_s_18 == '1' ? $('#uprjpl-edit-alat-s-18').prop('checked', true) : $(
                    '#uprjpl-edit-alat-s-18').prop('checked', false);
                data.alat_m_ho == '1' ? $('#uprjpl-edit-alat-m-ho').prop('checked', true) : $(
                    '#uprjpl-edit-alat-m-ho').prop('checked', false);
                data.alat_m_23 == '1' ? $('#uprjpl-edit-alat-m-23').prop('checked', true) : $(
                    '#uprjpl-edit-alat-m-23').prop('checked', false);
                data.alat_m_4 == '1' ? $('#uprjpl-edit-alat-m-4').prop('checked', true) : $(
                    '#uprjpl-edit-alat-m-4').prop('checked', false);

                // Edukasi pasien tentang efek samping obat yang diberikan
                data.edukasi_p_ho == '1' ? $('#uprjpl-edit-edukasi-p-ho').prop('checked', true) : $(
                    '#uprjpl-edit-edukasi-p-ho').prop('checked', false);
                data.edukasi_p_10 == '1' ? $('#uprjpl-edit-edukasi-p-10').prop('checked', true) : $(
                    '#uprjpl-edit-edukasi-p-10').prop('checked', false);
                data.edukasi_s_ho == '1' ? $('#uprjpl-edit-edukasi-s-ho').prop('checked', true) : $(
                    '#uprjpl-edit-edukasi-s-ho').prop('checked', false);
                data.edukasi_s_18 == '1' ? $('#uprjpl-edit-edukasi-s-18').prop('checked', true) : $(
                    '#uprjpl-edit-edukasi-s-18').prop('checked', false);
                data.edukasi_m_ho == '1' ? $('#uprjpl-edit-edukasi-m-ho').prop('checked', true) : $(
                    '#uprjpl-edit-edukasi-m-ho').prop('checked', false);
                data.edukasi_m_23 == '1' ? $('#uprjpl-edit-edukasi-m-23').prop('checked', true) : $(
                    '#uprjpl-edit-edukasi-m-23').prop('checked', false);
                data.edukasi_m_4 == '1' ? $('#uprjpl-edit-edukasi-m-4').prop('checked', true) : $(
                    '#uprjpl-edit-edukasi-m-4').prop('checked', false);

                // Tidak meninggalkan pasien di kamar mandi saat menggunakan commode
                data.commode_p_ho == '1' ? $('#uprjpl-edit-commode-p-ho').prop('checked', true) : $(
                    '#uprjpl-edit-commode-p-ho').prop('checked', false);
                data.commode_p_10 == '1' ? $('#uprjpl-edit-commode-p-10').prop('checked', true) : $(
                    '#uprjpl-edit-commode-p-10').prop('checked', false);
                data.commode_s_ho == '1' ? $('#uprjpl-edit-commode-s-ho').prop('checked', true) : $(
                    '#uprjpl-edit-commode-s-ho').prop('checked', false);
                data.commode_s_18 == '1' ? $('#uprjpl-edit-commode-s-18').prop('checked', true) : $(
                    '#uprjpl-edit-commode-s-18').prop('checked', false);
                data.commode_m_ho == '1' ? $('#uprjpl-edit-commode-m-ho').prop('checked', true) : $(
                    '#uprjpl-edit-commode-m-ho').prop('checked', false);
                data.commode_m_23 == '1' ? $('#uprjpl-edit-commode-m-23').prop('checked', true) : $(
                    '#uprjpl-edit-commode-m-23').prop('checked', false);
                data.commode_m_4 == '1' ? $('#uprjpl-edit-commode-m-4').prop('checked', true) : $(
                    '#uprjpl-edit-commode-m-4').prop('checked', false);

                // Pasang gelang khusus
                data.gelang_p_ho == '1' ? $('#uprjpl-edit-gelang-p-ho').prop('checked', true) : $(
                    '#uprjpl-edit-gelang-p-ho').prop('checked', false);
                data.gelang_p_10 == '1' ? $('#uprjpl-edit-gelang-p-10').prop('checked', true) : $(
                    '#uprjpl-edit-gelang-p-10').prop('checked', false);
                data.gelang_s_ho == '1' ? $('#uprjpl-edit-gelang-s-ho').prop('checked', true) : $(
                    '#uprjpl-edit-gelang-s-ho').prop('checked', false);
                data.gelang_s_18 == '1' ? $('#uprjpl-edit-gelang-s-18').prop('checked', true) : $(
                    '#uprjpl-edit-gelang-s-18').prop('checked', false);
                data.gelang_m_ho == '1' ? $('#uprjpl-edit-gelang-m-ho').prop('checked', true) : $(
                    '#uprjpl-edit-gelang-m-ho').prop('checked', false);
                data.gelang_m_23 == '1' ? $('#uprjpl-edit-gelang-m-23').prop('checked', true) : $(
                    '#uprjpl-edit-gelang-m-23').prop('checked', false);
                data.gelang_m_4 == '1' ? $('#uprjpl-edit-gelang-m-4').prop('checked', true) : $(
                    '#uprjpl-edit-gelang-m-4').prop('checked', false);

                // Tempatkan pasien di kamar yang paling dekat dengan Nurse Station
                data.station_p_ho == '1' ? $('#uprjpl-edit-station-p-ho').prop('checked', true) : $(
                    '#uprjpl-edit-station-p-ho').prop('checked', false);
                data.station_p_10 == '1' ? $('#uprjpl-edit-station-p-10').prop('checked', true) : $(
                    '#uprjpl-edit-station-p-10').prop('checked', false);
                data.station_s_ho == '1' ? $('#uprjpl-edit-station-s-ho').prop('checked', true) : $(
                    '#uprjpl-edit-station-s-ho').prop('checked', false);
                data.station_s_18 == '1' ? $('#uprjpl-edit-station-s-18').prop('checked', true) : $(
                    '#uprjpl-edit-station-s-18').prop('checked', false);
                data.station_m_ho == '1' ? $('#uprjpl-edit-station-m-ho').prop('checked', true) : $(
                    '#uprjpl-edit-station-m-ho').prop('checked', false);
                data.station_m_23 == '1' ? $('#uprjpl-edit-station-m-23').prop('checked', true) : $(
                    '#uprjpl-edit-station-m-23').prop('checked', false);
                data.station_m_4 == '1' ? $('#uprjpl-edit-station-m-4').prop('checked', true) : $(
                    '#uprjpl-edit-station-m-4').prop('checked', false);

                // Paraf
                data.paraf_p_ho == '1' ? $('#uprjpl-edit-paraf-p-ho').prop('checked', true) : $(
                    '#uprjpl-edit-paraf-p-ho').prop('checked', false);
                data.paraf_p_10 == '1' ? $('#uprjpl-edit-paraf-p-10').prop('checked', true) : $(
                    '#uprjpl-edit-paraf-p-10').prop('checked', false);
                data.paraf_s_ho == '1' ? $('#uprjpl-edit-paraf-s-ho').prop('checked', true) : $(
                    '#uprjpl-edit-paraf-s-ho').prop('checked', false);
                data.paraf_s_18 == '1' ? $('#uprjpl-edit-paraf-s-18').prop('checked', true) : $(
                    '#uprjpl-edit-paraf-s-18').prop('checked', false);
                data.paraf_m_ho == '1' ? $('#uprjpl-edit-paraf-m-ho').prop('checked', true) : $(
                    '#uprjpl-edit-paraf-m-ho').prop('checked', false);
                data.paraf_m_23 == '1' ? $('#uprjpl-edit-paraf-m-23').prop('checked', true) : $(
                    '#uprjpl-edit-paraf-m-23').prop('checked', false);
                data.paraf_m_4 == '1' ? $('#uprjpl-edit-paraf-m-4').prop('checked', true) : $(
                    '#uprjpl-edit-paraf-m-4').prop('checked', false);

                $('#uprjpl-edit-perawat-p').val(data.id_perawat_p);
                $('#s2id_uprjpl-edit-perawat-p a .select2c-chosen').html(data.perawat_p);

                $('#uprjpl-edit-perawat-s').val(data.id_perawat_s);
                $('#s2id_uprjpl-edit-perawat-s a .select2c-chosen').html(data.perawat_s);

                $('#uprjpl-edit-perawat-m').val(data.id_perawat_m);
                $('#s2id_uprjpl-edit-perawat-m a .select2c-chosen').html(data.perawat_m);

                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    // <td align="center"><button type="button" class="btn btn-info btn-xxs" data-toggle="collapse" data-target="#data-collapse-${i}" aria-expanded="false" aria-controls="data-collapse-${i}"><i class="fas fa-expand"></i> Lihat</button></td>

    // UPAYA LANSIA
    function toggleLihatTutup(button, targetId) {
        const target = document.querySelector(targetId);
        const icon = button.querySelector('i');

        if (target.classList.contains('show')) {
        // Collapse jika terbuka
        $(target).collapse('hide');
        button.innerHTML = '<i class="fas fa-expand"></i> Lihat';
        } else {
        // Expand jika tertutup
        $(target).collapse('show');
        button.innerHTML = '<i class="fas fa-compress"></i> Tutup';
        }
    }

    // UPAYA LANSIA
    function showUpayaPencegahanRisikoJatuhPasienLansia(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        console.log(data, id_pendaftaran, id_layanan_pendaftaran, bed, action);

        $('#tabel-uprjpl .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {

                // const selOp =
                //     '<td align="center"><button type="button" class="btn btn-success btn-xs" onclick="editUpayaPencegahanRisikoJatuhPasienLansia(this, ' +
                //     v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                //     '\')"><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-danger btn-xs" onclick="hapusUpayaPencegahanResikoJatuhPasienLansia(this, ' +
                //     v.id + ')"> <i class="fas fa-trash-alt"></i> Hapus</button> </td>';

                const selOp = (action === 'lihat') ? 
                    '<td align="center"><button type="button" class="btn btn-success btn-xs" style="display: none;"> <i class="fas fa-edit"></i> Edit</button> ' +
                    '<button type="button" class="btn btn-danger btn-xs" style="display: none;"> <i class="fas fa-trash-alt"></i> Hapus</button> </td>' :
                    '<td align="center"><button type="button" class="btn btn-success btn-xs" onclick="editUpayaPencegahanRisikoJatuhPasienLansia(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-danger btn-xs" onclick="hapusUpayaPencegahanResikoJatuhPasienLansia(this, ' +
                    v.id + ')"> <i class="fas fa-trash-alt"></i> Hapus</button> </td>';

                let html = /* html */ `
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td align="center">${v.tanggal_pengkajian ? datefmysql(v.tanggal_pengkajian) : '-'}</td>
                        <td align="center">${v.perawat_p || '-' }</td>
                        <td align="center">${v.perawat_s || '-'}</td>
                        <td align="center">${v.perawat_m || '-'}</td>
                        <td align="center">${v.akun_user}</td>
                        ${selOp}
                        <td align="center"><button type="button" class="btn btn-info btn-xxs" data-toggle="collapse"data-target="#data-collapse-${i}" aria-expanded="false" aria-controls="data-collapse-${i}" onclick="toggleLihatTutup(this, '#data-collapse-${i}')"><i class="fas fa-expand"></i> Lihat</button></td>
                    </tr>
					<tr class="collapse" id="data-collapse-${i}">
						<td colspan="8">
							<table class="table table-sm table-striped table-bordered" style="margin-top: .5rem">
								<thead>
								<tr>
									<th class="center" rowspan="2"><b>Tindakan Pencegahan</b></th>
									<th class="center" colspan="2">Pagi</th>
									<th class="center" colspan="2">Siang</th>
									<th class="center" colspan="3">Malam</th>
								</tr>
								<tr>
									<th class="center">Hand Over</th>
									<th class="center">Jam 10</th>
									<th class="center">Hand Over</th>
									<th class="center">Jam 18</th>
									<th class="center">Hand Over</th>
									<th class="center">Jam 23</th>
									<th class="center">Jam 4</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td colspan="8" class="bold text-uppercase">Risiko Rendah/Sedang</td>
								</tr>
								<tr>
									<td>Bel berfungsi dan mudah dijangkau</td>
									<td class="center">${v.bel_p_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.bel_p_10 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.bel_s_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.bel_s_18 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.bel_m_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.bel_m_23 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.bel_m_4 == '1' ? '&check;' : ''}</td>
								</tr>
								<tr>
									<td>Roda tempat tidur terkunci</td>
									<td class="center">${v.roda_p_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.roda_p_10 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.roda_s_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.roda_s_18 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.roda_m_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.roda_m_23 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.roda_m_4 == '1' ? '&check;' : ''}</td>
								</tr>
								<tr>
									<td>Posisikan tempat tidur pada posisi terendah</td>
									<td class="center">${v.ptt_p_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.ptt_p_10 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.ptt_s_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.ptt_s_18 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.ptt_m_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.ptt_m_23 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.ptt_m_4 == '1' ? '&check;' : ''}</td>
								</tr>
								<tr>
									<td>Pagar pengaman tempat tidur dinaikan</td>
									<td class="center">${v.ppt_p_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.ppt_p_10 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.ppt_s_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.ppt_s_18 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.ppt_m_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.ppt_m_23 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.ppt_m_4 == '1' ? '&check;' : ''}</td>
								</tr>
								<tr>
									<td>Penerangan cukup</td>
									<td class="center">${v.penerangan_p_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.penerangan_p_10 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.penerangan_s_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.penerangan_s_18 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.penerangan_m_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.penerangan_m_23 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.penerangan_m_4 == '1' ? '&check;' : ''}</td>
								</tr>
								<tr>
									<td>Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan</td>
									<td class="center">${v.alas_p_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.alas_p_10 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.alas_s_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.alas_s_18 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.alas_m_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.alas_m_23 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.alas_m_4 == '1' ? '&check;' : ''}</td>
								</tr>
								<tr>
									<td>Lantai kering dan tidak licin</td>
									<td class="center">${v.lantai_p_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.lantai_p_10 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.lantai_s_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.lantai_s_18 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.lantai_m_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.lantai_m_23 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.lantai_m_4 == '1' ? '&check;' : ''}</td>
								</tr>
                                <tr>
                                    <td colspan="8" class="bold text-uppercase">Risiko Sedang</td>
                                </tr>
								<tr>
									<td>Dekatkan alat-alat pasien</td>
									<td class="center">${v.alat_p_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.alat_p_10 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.alat_s_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.alat_s_18 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.alat_m_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.alat_m_23 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.alat_m_4 == '1' ? '&check;' : ''}</td>
								</tr>
								<tr>
									<td>Edukasi pasien tentang efek samping obat yang diberikan</td>
									<td class="center">${v.edukasi_p_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.edukasi_p_10 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.edukasi_s_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.edukasi_s_18 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.edukasi_m_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.edukasi_m_23 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.edukasi_m_4 == '1' ? '&check;' : ''}</td>
								</tr>
								<tr>
									<td>Tidak meninggalkan pasien di kamar mandi saat menggunakan commode</td>
									<td class="center">${v.commode_p_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.commode_p_10 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.commode_s_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.commode_s_18 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.commode_m_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.commode_m_23 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.commode_m_4 == '1' ? '&check;' : ''}</td>
								</tr>
								<tr>
									<td colspan="8" class="bold text-uppercase">Risiko Tinggi</td>
								</tr>
								<tr>
									<td>Pasang gelang khusus (Warna Kuning)</td>
									<td class="center">${v.gelang_p_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.gelang_p_10 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.gelang_s_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.gelang_s_18 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.gelang_m_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.gelang_m_23 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.gelang_m_4 == '1' ? '&check;' : ''}</td>
								</tr>
								<tr>
									<td>Tempatkan pasien di kamar yang paling dekat dengan Nurse Station (jika memungkinkan)</td>
									<td class="center">${v.station_p_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.station_p_10 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.station_s_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.station_s_18 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.station_m_ho == '1' ? '&check;' : ''}</td>
									<td class="center">${v.station_m_23 == '1' ? '&check;' : ''}</td>
									<td class="center">${v.station_m_4 == '1' ? '&check;' : ''}</td>
								</tr>
								<tr>
									<td class="bold">Paraf</td>
									<td class="center">${v.paraf_p_ho == '1' ? '&check;' : '&#10006;'}</td>
									<td class="center">${v.paraf_p_10 == '1' ? '&check;' : '&#10006;'}</td>
									<td class="center">${v.paraf_s_ho == '1' ? '&check;' : '&#10006;'}</td>
									<td class="center">${v.paraf_s_18 == '1' ? '&check;' : '&#10006;'}</td>
									<td class="center">${v.paraf_m_ho == '1' ? '&check;' : '&#10006;'}</td>
									<td class="center">${v.paraf_m_23 == '1' ? '&check;' : '&#10006;'}</td>
									<td class="center">${v.paraf_m_4 == '1' ? '&check;' : '&#10006;'}</td>
								</tr>
								</tbody>
							</table>
						</td>
					</tr>
                `;

                $('#tabel-uprjpl .body-table').append(html);

                numberUprjpl = i;
            })
        }
    }

    // UPAYA LANSIA
    function updatePengkajianUalngRisikoJatuhPasienLansia(id_pendaftaran, id_layanan_pendaftaran, bed) {
        console.log($('#form-edit-pengkajian-ulang-risiko-jatuh-pasien-lansia').serializeArray())
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_pengkajian_ulang_risiko_jatuh_pasien_lansia") ?>',
            data: $('#form-edit-pengkajian-ulang-risiko-jatuh-pasien-lansia').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    $('#wizard_form_resume').bwizard('show', '3');
                    entriKeperawatanLansia(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }

                $('#modal-edit-pengkajian-ulang-risiko-jatuh-pasien-lansia').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    // UPAYA LANSIA
    function updateUpayaPencegahanRisikoJatuhPasienLansia(id_pendaftaran, id_layanan_pendaftaran, bed) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_upaya_pencegahan_risiko_jatuh_pasien_lansia") ?>',
            data: $('#form-edit-upaya-pencegahan-risiko-jatuh-pasien-lansia').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    $('#wizard_form_resume').bwizard('show', '3');
                    entriKeperawatanLansia(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }

                $('#modal-edit-upaya-pencegahan-risiko-jatuh-pasien-lansia').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    // UPAYA LANSIA
    if (typeof numberUprjpl === 'undefined') {
        var numberUprjpl = 1;
    }

    // UPAYA LANSIA
    function tambahUpayaPencegahanLansia() {
        if ($('#uprjpl-tanggal-pengkajian').val() === '') {
            syams_validation('#uprjpl-tanggal-pengkajian', 'Tanggal Pengkajian harus diisi.');
            return false;
        } else {
            syams_validation_remove('#uprjpl-tanggal-pengkajian');
        }

        if ($('#uprjpl-perawat').val() === '') {
            syams_validation('#uprjpl-perawat', 'Nama perawat belum diisi.');
            return false;
        } else {
            syams_validation_remove('#uprjpl-perawat');
        }

        let html = '';
        let uprjpl_tanggal_pengkajian = $('#uprjpl-tanggal-pengkajian').val();
        let nama_perawat_p = $('#s2id_uprjpl-perawat-p a .select2c-chosen').html();
        let nama_perawat_s = $('#s2id_uprjpl-perawat-s a .select2c-chosen').html();
        let nama_perawat_m = $('#s2id_uprjpl-perawat-m a .select2c-chosen').html();
        let id_perawat_p = $('#uprjpl-perawat-p').val();
        let id_perawat_s = $('#uprjpl-perawat-s').val();
        let id_perawat_m = $('#uprjpl-perawat-m').val();

        // Bel berfungsi dan mudah dihangkau
        let bel_p_ho = $('#uprjpl-bel-p-ho').is(':checked');
        let bel_p_10 = $('#uprjpl-bel-p-10').is(':checked');
        let bel_s_ho = $('#uprjpl-bel-s-ho').is(':checked');
        let bel_s_18 = $('#uprjpl-bel-s-18').is(':checked');
        let bel_m_ho = $('#uprjpl-bel-m-ho').is(':checked');
        let bel_m_23 = $('#uprjpl-bel-m-23').is(':checked');
        let bel_m_4 = $('#uprjpl-bel-m-4').is(':checked');

        // Roda tempat tidur terkunci
        let roda_p_ho = $('#uprjpl-roda-p-ho').is(':checked');
        let roda_p_10 = $('#uprjpl-roda-p-10').is(':checked');
        let roda_s_ho = $('#uprjpl-roda-s-ho').is(':checked');
        let roda_s_18 = $('#uprjpl-roda-s-18').is(':checked');
        let roda_m_ho = $('#uprjpl-roda-m-ho').is(':checked');
        let roda_m_23 = $('#uprjpl-roda-m-23').is(':checked');
        let roda_m_4 = $('#uprjpl-roda-m-4').is(':checked');

        // Posisikan tempat tidur pada posisi terendah
        let ptt_p_ho = $('#uprjpl-ptt-p-ho').is(':checked');
        let ptt_p_10 = $('#uprjpl-ptt-p-10').is(':checked');
        let ptt_s_ho = $('#uprjpl-ptt-s-ho').is(':checked');
        let ptt_s_18 = $('#uprjpl-ptt-s-18').is(':checked');
        let ptt_m_ho = $('#uprjpl-ptt-m-ho').is(':checked');
        let ptt_m_23 = $('#uprjpl-ptt-m-23').is(':checked');
        let ptt_m_4 = $('#uprjpl-ptt-m-4').is(':checked');

        // Pagar pengaman tempat tidur dinaikan
        let ppt_p_ho = $('#uprjpl-ppt-p-ho').is(':checked');
        let ppt_p_10 = $('#uprjpl-ppt-p-10').is(':checked');
        let ppt_s_ho = $('#uprjpl-ppt-s-ho').is(':checked');
        let ppt_s_18 = $('#uprjpl-ppt-s-18').is(':checked');
        let ppt_m_ho = $('#uprjpl-ppt-m-ho').is(':checked');
        let ppt_m_23 = $('#uprjpl-ppt-m-23').is(':checked');
        let ppt_m_4 = $('#uprjpl-ppt-m-4').is(':checked');

        // Penerang cukup
        let penerangan_p_ho = $('#uprjpl-penerangan-p-ho').is(':checked');
        let penerangan_p_10 = $('#uprjpl-penerangan-p-10').is(':checked');
        let penerangan_s_ho = $('#uprjpl-penerangan-s-ho').is(':checked');
        let penerangan_s_18 = $('#uprjpl-penerangan-s-18').is(':checked');
        let penerangan_m_ho = $('#uprjpl-penerangan-m-ho').is(':checked');
        let penerangan_m_23 = $('#uprjpl-penerangan-m-23').is(':checked');
        let penerangan_m_4 = $('#uprjpl-penerangan-m-4').is(':checked');

        // Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan
        let alas_p_ho = $('#uprjpl-alas-p-ho').is(':checked');
        let alas_p_10 = $('#uprjpl-alas-p-10').is(':checked');
        let alas_s_ho = $('#uprjpl-alas-s-ho').is(':checked');
        let alas_s_18 = $('#uprjpl-alas-s-18').is(':checked');
        let alas_m_ho = $('#uprjpl-alas-m-ho').is(':checked');
        let alas_m_23 = $('#uprjpl-alas-m-23').is(':checked');
        let alas_m_4 = $('#uprjpl-alas-m-4').is(':checked');

        // Lantai kering dan tidak licin
        let lantai_p_ho = $('#uprjpl-lantai-p-ho').is(':checked');
        let lantai_p_10 = $('#uprjpl-lantai-p-10').is(':checked');
        let lantai_s_ho = $('#uprjpl-lantai-s-ho').is(':checked');
        let lantai_s_18 = $('#uprjpl-lantai-s-18').is(':checked');
        let lantai_m_ho = $('#uprjpl-lantai-m-ho').is(':checked');
        let lantai_m_23 = $('#uprjpl-lantai-m-23').is(':checked');
        let lantai_m_4 = $('#uprjpl-lantai-m-4').is(':checked');

        // Dekatkan alat-alat pasien
        let alat_p_ho = $('#uprjpl-alat-p-ho').is(':checked');
        let alat_p_10 = $('#uprjpl-alat-p-10').is(':checked');
        let alat_s_ho = $('#uprjpl-alat-s-ho').is(':checked');
        let alat_s_18 = $('#uprjpl-alat-s-18').is(':checked');
        let alat_m_ho = $('#uprjpl-alat-m-ho').is(':checked');
        let alat_m_23 = $('#uprjpl-alat-m-23').is(':checked');
        let alat_m_4 = $('#uprjpl-alat-m-4').is(':checked');

        // Edukasi pasien tentang efek samping obat yang diberikan
        let edukasi_p_ho = $('#uprjpl-edukasi-p-ho').is(':checked');
        let edukasi_p_10 = $('#uprjpl-edukasi-p-10').is(':checked');
        let edukasi_s_ho = $('#uprjpl-edukasi-s-ho').is(':checked');
        let edukasi_s_18 = $('#uprjpl-edukasi-s-18').is(':checked');
        let edukasi_m_ho = $('#uprjpl-edukasi-m-ho').is(':checked');
        let edukasi_m_23 = $('#uprjpl-edukasi-m-23').is(':checked');
        let edukasi_m_4 = $('#uprjpl-edukasi-m-4').is(':checked');

        // Tidak meninggalkan pasien di kamar mandi saat menggunakan commode
        let commode_p_ho = $('#uprjpl-commode-p-ho').is(':checked');
        let commode_p_10 = $('#uprjpl-commode-p-10').is(':checked');
        let commode_s_ho = $('#uprjpl-commode-s-ho').is(':checked');
        let commode_s_18 = $('#uprjpl-commode-s-18').is(':checked');
        let commode_m_ho = $('#uprjpl-commode-m-ho').is(':checked');
        let commode_m_23 = $('#uprjpl-commode-m-23').is(':checked');
        let commode_m_4 = $('#uprjpl-commode-m-4').is(':checked');

        // Pasang gelang khusus
        let gelang_p_ho = $('#uprjpl-gelang-p-ho').is(':checked');
        let gelang_p_10 = $('#uprjpl-gelang-p-10').is(':checked');
        let gelang_s_ho = $('#uprjpl-gelang-s-ho').is(':checked');
        let gelang_s_18 = $('#uprjpl-gelang-s-18').is(':checked');
        let gelang_m_ho = $('#uprjpl-gelang-m-ho').is(':checked');
        let gelang_m_23 = $('#uprjpl-gelang-m-23').is(':checked');
        let gelang_m_4 = $('#uprjpl-gelang-m-4').is(':checked');

        // Tempatkan pasien di kamar yang paling dekat dengan Nurse Station
        let station_p_ho = $('#uprjpl-station-p-ho').is(':checked');
        let station_p_10 = $('#uprjpl-station-p-10').is(':checked');
        let station_s_ho = $('#uprjpl-station-s-ho').is(':checked');
        let station_s_18 = $('#uprjpl-station-s-18').is(':checked');
        let station_m_ho = $('#uprjpl-station-m-ho').is(':checked');
        let station_m_23 = $('#uprjpl-station-m-23').is(':checked');
        let station_m_4 = $('#uprjpl-station-m-4').is(':checked');

        // Paraf
        let paraf_p_ho = $('#uprjpl-paraf-p-ho').is(':checked');
        let paraf_p_10 = $('#uprjpl-paraf-p-10').is(':checked');
        let paraf_s_ho = $('#uprjpl-paraf-s-ho').is(':checked');
        let paraf_s_18 = $('#uprjpl-paraf-s-18').is(':checked');
        let paraf_m_ho = $('#uprjpl-paraf-m-ho').is(':checked');
        let paraf_m_23 = $('#uprjpl-paraf-m-23').is(':checked');
        let paraf_m_4 = $('#uprjpl-paraf-m-4').is(':checked');

        html = /* html */ `
            <tr class="row-in-${++numberUprjpl}">
                <td class="number-pengkajian" align="center">${numberUprjpl}</td>
                <td align="center">
                	<input type="hidden" name="uprjpl_tanggal_pengkajian[]" value="${uprjpl_tanggal_pengkajian}">${uprjpl_tanggal_pengkajian}
                </td>
                <td align="center">
                	<input type="hidden" name="uprjpl_perawat_p[]" value="${id_perawat_p}">${nama_perawat_p}
                </td>
                <td align="center">
                	<input type="hidden" name="uprjpl_perawat_s[]" value="${id_perawat_s}">${nama_perawat_s}
                </td>
                <td align="center">
                	<input type="hidden" name="uprjpl_perawat_m[]" value="${id_perawat_m}">${nama_perawat_m}
                </td>
                <td align="center">
					<?= $this->session->userdata('nama') ?>
					<input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
					<input type="hidden" name="pencegahan_date_lansia[]" value="<?= date("Y-m-d H:i:s") ?>">

					<input type="hidden" name="uprjpl_bel_p_ho[]" value="${bel_p_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_bel_p_10[]" value="${bel_p_10 ? 1 : 0}">
					<input type="hidden" name="uprjpl_bel_s_ho[]" value="${bel_s_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_bel_s_18[]" value="${bel_s_18 ? 1 : 0}">
					<input type="hidden" name="uprjpl_bel_m_ho[]" value="${bel_m_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_bel_m_23[]" value="${bel_m_23 ? 1 : 0}">
					<input type="hidden" name="uprjpl_bel_m_4[]" value="${bel_m_4 ? 1 : 0}">

					<input type="hidden" name="uprjpl_roda_p_ho[]" value="${roda_p_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_roda_p_10[]" value="${roda_p_10 ? 1 : 0}">
					<input type="hidden" name="uprjpl_roda_s_ho[]" value="${roda_s_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_roda_s_18[]" value="${roda_s_18 ? 1 : 0}">
					<input type="hidden" name="uprjpl_roda_m_ho[]" value="${roda_m_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_roda_m_23[]" value="${roda_m_23 ? 1 : 0}">
					<input type="hidden" name="uprjpl_roda_m_4[]" value="${roda_m_4 ? 1 : 0}">

					<input type="hidden" name="uprjpl_ptt_p_ho[]" value="${ptt_p_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_ptt_p_10[]" value="${ptt_p_10 ? 1 : 0}">
					<input type="hidden" name="uprjpl_ptt_s_ho[]" value="${ptt_s_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_ptt_s_18[]" value="${ptt_s_18 ? 1 : 0}">
					<input type="hidden" name="uprjpl_ptt_m_ho[]" value="${ptt_m_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_ptt_m_23[]" value="${ptt_m_23 ? 1 : 0}">
					<input type="hidden" name="uprjpl_ptt_m_4[]" value="${ptt_m_4 ? 1 : 0}">

					<input type="hidden" name="uprjpl_ppt_p_ho[]" value="${ppt_p_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_ppt_p_10[]" value="${ppt_p_10 ? 1 : 0}">
					<input type="hidden" name="uprjpl_ppt_s_ho[]" value="${ppt_s_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_ppt_s_18[]" value="${ppt_s_18 ? 1 : 0}">
					<input type="hidden" name="uprjpl_ppt_m_ho[]" value="${ppt_m_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_ppt_m_23[]" value="${ppt_m_23 ? 1 : 0}">
					<input type="hidden" name="uprjpl_ppt_m_4[]" value="${ppt_m_4 ? 1 : 0}">

					<input type="hidden" name="uprjpl_penerangan_p_ho[]" value="${penerangan_p_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_penerangan_p_10[]" value="${penerangan_p_10 ? 1 : 0}">
					<input type="hidden" name="uprjpl_penerangan_s_ho[]" value="${penerangan_s_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_penerangan_s_18[]" value="${penerangan_s_18 ? 1 : 0}">
					<input type="hidden" name="uprjpl_penerangan_m_ho[]" value="${penerangan_m_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_penerangan_m_23[]" value="${penerangan_m_23 ? 1 : 0}">
					<input type="hidden" name="uprjpl_penerangan_m_4[]" value="${penerangan_m_4 ? 1 : 0}">

					<input type="hidden" name="uprjpl_alas_p_ho[]" value="${alas_p_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_alas_p_10[]" value="${alas_p_10 ? 1 : 0}">
					<input type="hidden" name="uprjpl_alas_s_ho[]" value="${alas_s_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_alas_s_18[]" value="${alas_s_18 ? 1 : 0}">
					<input type="hidden" name="uprjpl_alas_m_ho[]" value="${alas_m_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_alas_m_23[]" value="${alas_m_23 ? 1 : 0}">
					<input type="hidden" name="uprjpl_alas_m_4[]" value="${alas_m_4 ? 1 : 0}">

					<input type="hidden" name="uprjpl_lantai_p_ho[]" value="${lantai_p_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_lantai_p_10[]" value="${lantai_p_10 ? 1 : 0}">
					<input type="hidden" name="uprjpl_lantai_s_ho[]" value="${lantai_s_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_lantai_s_18[]" value="${lantai_s_18 ? 1 : 0}">
					<input type="hidden" name="uprjpl_lantai_m_ho[]" value="${lantai_m_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_lantai_m_23[]" value="${lantai_m_23 ? 1 : 0}">
					<input type="hidden" name="uprjpl_lantai_m_4[]" value="${lantai_m_4 ? 1 : 0}">

					<input type="hidden" name="uprjpl_alat_p_ho[]" value="${alat_p_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_alat_p_10[]" value="${alat_p_10 ? 1 : 0}">
					<input type="hidden" name="uprjpl_alat_s_ho[]" value="${alat_s_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_alat_s_18[]" value="${alat_s_18 ? 1 : 0}">
					<input type="hidden" name="uprjpl_alat_m_ho[]" value="${alat_m_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_alat_m_23[]" value="${alat_m_23 ? 1 : 0}">
					<input type="hidden" name="uprjpl_alat_m_4[]" value="${alat_m_4 ? 1 : 0}">

					<input type="hidden" name="uprjpl_edukasi_p_ho[]" value="${edukasi_p_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_edukasi_p_10[]" value="${edukasi_p_10 ? 1 : 0}">
					<input type="hidden" name="uprjpl_edukasi_s_ho[]" value="${edukasi_s_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_edukasi_s_18[]" value="${edukasi_s_18 ? 1 : 0}">
					<input type="hidden" name="uprjpl_edukasi_m_ho[]" value="${edukasi_m_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_edukasi_m_23[]" value="${edukasi_m_23 ? 1 : 0}">
					<input type="hidden" name="uprjpl_edukasi_m_4[]" value="${edukasi_m_4 ? 1 : 0}">

					<input type="hidden" name="uprjpl_commode_p_ho[]" value="${commode_p_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_commode_p_10[]" value="${commode_p_10 ? 1 : 0}">
					<input type="hidden" name="uprjpl_commode_s_ho[]" value="${commode_s_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_commode_s_18[]" value="${commode_s_18 ? 1 : 0}">
					<input type="hidden" name="uprjpl_commode_m_ho[]" value="${commode_m_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_commode_m_23[]" value="${commode_m_23 ? 1 : 0}">
					<input type="hidden" name="uprjpl_commode_m_4[]" value="${commode_m_4 ? 1 : 0}">

					<input type="hidden" name="uprjpl_gelang_p_ho[]" value="${gelang_p_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_gelang_p_10[]" value="${gelang_p_10 ? 1 : 0}">
					<input type="hidden" name="uprjpl_gelang_s_ho[]" value="${gelang_s_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_gelang_s_18[]" value="${gelang_s_18 ? 1 : 0}">
					<input type="hidden" name="uprjpl_gelang_m_ho[]" value="${gelang_m_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_gelang_m_23[]" value="${gelang_m_23 ? 1 : 0}">
					<input type="hidden" name="uprjpl_gelang_m_4[]" value="${gelang_m_4 ? 1 : 0}">

					<input type="hidden" name="uprjpl_station_p_ho[]" value="${station_p_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_station_p_10[]" value="${station_p_10 ? 1 : 0}">
					<input type="hidden" name="uprjpl_station_s_ho[]" value="${station_s_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_station_s_18[]" value="${station_s_18 ? 1 : 0}">
					<input type="hidden" name="uprjpl_station_m_ho[]" value="${station_m_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_station_m_23[]" value="${station_m_23 ? 1 : 0}">
					<input type="hidden" name="uprjpl_station_m_4[]" value="${station_m_4 ? 1 : 0}">

					<input type="hidden" name="uprjpl_paraf_p_ho[]" value="${paraf_p_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_paraf_p_10[]" value="${paraf_p_10 ? 1 : 0}">
					<input type="hidden" name="uprjpl_paraf_s_ho[]" value="${paraf_s_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_paraf_s_18[]" value="${paraf_s_18 ? 1 : 0}">
					<input type="hidden" name="uprjpl_paraf_m_ho[]" value="${paraf_m_ho ? 1 : 0}">
					<input type="hidden" name="uprjpl_paraf_m_23[]" value="${paraf_m_23 ? 1 : 0}">
					<input type="hidden" name="uprjpl_paraf_m_4[]" value="${paraf_m_4 ? 1 : 0}">
                </td>
                <td align="center">
                    <button type="button" id="pepel" class="btn btn-secondary btn-xxs" onclick="(() => {$(this).parent().parent().parent().find('.row-in-' + numberUprjpl).remove(); numberUprjpl--;})()"><i class="fas fa-trash-alt"></i></button>
                </td>
                <td align="center"><button type="button" class="btn btn-info btn-xxs" data-toggle="collapse" data-target="#data-collapse-${numberUprjpl}" aria-expanded="false" aria-controls="data-collapse-${numberUprjpl}"><i class="fas fa-expand"></i> Expand</button></td>
            </tr>
            <tr class="collapse row-in-${numberUprjpl}" id="data-collapse-${numberUprjpl}">
            	<td colspan="8">
            		<table class="table table-sm table-striped table-bordered" style="margin-top: .5rem">
						<thead>
						<tr>
							<th class="center" rowspan="2"><b>Tindakan Pencegahan</b></th>
							<th class="center" colspan="2">Pagi</th>
							<th class="center" colspan="2">Siang</th>
							<th class="center" colspan="3">Malam</th>
						</tr>
						<tr>
							<th class="center">Hand Over</th>
							<th class="center">Jam 10</th>
							<th class="center">Hand Over</th>
							<th class="center">Jam 18</th>
							<th class="center">Hand Over</th>
							<th class="center">Jam 23</th>
							<th class="center">Jam 4</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td colspan="8" class="bold text-uppercase">Risiko Rendah/Sedang</td>
						</tr>
						<tr>
							<td>Bel berfungsi dan mudah dijangkau</td>
							<td class="center">${bel_p_ho ? '&check;' : ''}</td>
							<td class="center">${bel_p_10 ? '&check;' : ''}</td>
							<td class="center">${bel_s_ho ? '&check;' : ''}</td>
							<td class="center">${bel_s_18 ? '&check;' : ''}</td>
							<td class="center">${bel_m_ho ? '&check;' : ''}</td>
							<td class="center">${bel_m_23 ? '&check;' : ''}</td>
							<td class="center">${bel_m_4 ? '&check;' : ''}</td>
						</tr>
						<tr>
							<td>Roda tempat tidur terkunci</td>
							<td class="center">${roda_p_ho ? '&check;' : ''}</td>
							<td class="center">${roda_p_10 ? '&check;' : ''}</td>
							<td class="center">${roda_s_ho ? '&check;' : ''}</td>
							<td class="center">${roda_s_18 ? '&check;' : ''}</td>
							<td class="center">${roda_m_ho ? '&check;' : ''}</td>
							<td class="center">${roda_m_23 ? '&check;' : ''}</td>
							<td class="center">${roda_m_4 ? '&check;' : ''}</td>
						</tr>
						<tr>
							<td>Posisikan tempat tidur pada posisi terendah</td>
							<td class="center">${ptt_p_ho ? '&check;' : ''}</td>
							<td class="center">${ptt_p_10 ? '&check;' : ''}</td>
							<td class="center">${ptt_s_ho ? '&check;' : ''}</td>
							<td class="center">${ptt_s_18 ? '&check;' : ''}</td>
							<td class="center">${ptt_m_ho ? '&check;' : ''}</td>
							<td class="center">${ptt_m_23 ? '&check;' : ''}</td>
							<td class="center">${ptt_m_4 ? '&check;' : ''}</td>
						</tr>
						<tr>
							<td>Pagar pengaman tempat tidur dinaikan</td>
							<td class="center">${ppt_p_ho ? '&check;' : ''}</td>
							<td class="center">${ppt_p_10 ? '&check;' : ''}</td>
							<td class="center">${ppt_s_ho ? '&check;' : ''}</td>
							<td class="center">${ppt_s_18 ? '&check;' : ''}</td>
							<td class="center">${ppt_m_ho ? '&check;' : ''}</td>
							<td class="center">${ppt_m_23 ? '&check;' : ''}</td>
							<td class="center">${ppt_m_4 ? '&check;' : ''}</td>
						</tr>
						<tr>
							<td>Penerangan cukup</td>
							<td class="center">${penerangan_p_ho ? '&check;' : ''}</td>
							<td class="center">${penerangan_p_10 ? '&check;' : ''}</td>
							<td class="center">${penerangan_s_ho ? '&check;' : ''}</td>
							<td class="center">${penerangan_s_18 ? '&check;' : ''}</td>
							<td class="center">${penerangan_m_ho ? '&check;' : ''}</td>
							<td class="center">${penerangan_m_23 ? '&check;' : ''}</td>
							<td class="center">${penerangan_m_4 ? '&check;' : ''}</td>
						</tr>
						<tr>
							<td>Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan</td>
							<td class="center">${alas_p_ho ? '&check;' : ''}</td>
							<td class="center">${alas_p_10 ? '&check;' : ''}</td>
							<td class="center">${alas_s_ho ? '&check;' : ''}</td>
							<td class="center">${alas_s_18 ? '&check;' : ''}</td>
							<td class="center">${alas_m_ho ? '&check;' : ''}</td>
							<td class="center">${alas_m_23 ? '&check;' : ''}</td>
							<td class="center">${alas_m_4 ? '&check;' : ''}</td>
						</tr>
						<tr>
							<td>Lantai kering dan tidak licin</td>
							<td class="center">${lantai_p_ho ? '&check;' : ''}</td>
							<td class="center">${lantai_p_10 ? '&check;' : ''}</td>
							<td class="center">${lantai_s_ho ? '&check;' : ''}</td>
							<td class="center">${lantai_s_18 ? '&check;' : ''}</td>
							<td class="center">${lantai_m_ho ? '&check;' : ''}</td>
							<td class="center">${lantai_m_23 ? '&check;' : ''}</td>
							<td class="center">${lantai_m_4 ? '&check;' : ''}</td>
						</tr>
                            <tr>
								<td colspan="8" class="bold text-uppercase">Risiko Sedang</td>
							</tr>
						<tr>
							<td>Dekatkan alat-alat pasien</td>
							<td class="center">${alat_p_ho ? '&check;' : ''}</td>
							<td class="center">${alat_p_10 ? '&check;' : ''}</td>
							<td class="center">${alat_s_ho ? '&check;' : ''}</td>
							<td class="center">${alat_s_18 ? '&check;' : ''}</td>
							<td class="center">${alat_m_ho ? '&check;' : ''}</td>
							<td class="center">${alat_m_23 ? '&check;' : ''}</td>
							<td class="center">${alat_m_4 ? '&check;' : ''}</td>
						</tr>
						<tr>
							<td>Edukasi pasien tentang efek samping obat yang diberikan</td>
							<td class="center">${edukasi_p_ho ? '&check;' : ''}</td>
							<td class="center">${edukasi_p_10 ? '&check;' : ''}</td>
							<td class="center">${edukasi_s_ho ? '&check;' : ''}</td>
							<td class="center">${edukasi_s_18 ? '&check;' : ''}</td>
							<td class="center">${edukasi_m_ho ? '&check;' : ''}</td>
							<td class="center">${edukasi_m_23 ? '&check;' : ''}</td>
							<td class="center">${edukasi_m_4 ? '&check;' : ''}</td>
						</tr>
						<tr>
							<td>Tidak meninggalkan pasien di kamar mandi saat menggunakan commode</td>
							<td class="center">${commode_p_ho ? '&check;' : ''}</td>
							<td class="center">${commode_p_10 ? '&check;' : ''}</td>
							<td class="center">${commode_s_ho ? '&check;' : ''}</td>
							<td class="center">${commode_s_18 ? '&check;' : ''}</td>
							<td class="center">${commode_m_ho ? '&check;' : ''}</td>
							<td class="center">${commode_m_23 ? '&check;' : ''}</td>
							<td class="center">${commode_m_4 ? '&check;' : ''}</td>
						</tr>
						<tr>
							<td colspan="8" class="bold text-uppercase">Risiko Tinggi</td>
						</tr>
						<tr>
							<td>Pasang gelang khusus (Warna Kuning)</td>
							<td class="center">${gelang_p_ho ? '&check;' : ''}</td>
							<td class="center">${gelang_p_10 ? '&check;' : ''}</td>
							<td class="center">${gelang_s_ho ? '&check;' : ''}</td>
							<td class="center">${gelang_s_18 ? '&check;' : ''}</td>
							<td class="center">${gelang_m_ho ? '&check;' : ''}</td>
							<td class="center">${gelang_m_23 ? '&check;' : ''}</td>
							<td class="center">${gelang_m_4 ? '&check;' : ''}</td>
						</tr>
						<tr>
							<td>Tempatkan pasien di kamar yang paling dekat dengan Nurse Station (jika memungkinkan)</td>
							<td class="center">${station_p_ho ? '&check;' : ''}</td>
							<td class="center">${station_p_10 ? '&check;' : ''}</td>
							<td class="center">${station_s_ho ? '&check;' : ''}</td>
							<td class="center">${station_s_18 ? '&check;' : ''}</td>
							<td class="center">${station_m_ho ? '&check;' : ''}</td>
							<td class="center">${station_m_23 ? '&check;' : ''}</td>
							<td class="center">${station_m_4 ? '&check;' : ''}</td>
						</tr>
						<tr>
							<td class="bold">Paraf</td>
							<td class="center">${paraf_p_ho ? '&check;' : '&#10006;'}</td>
							<td class="center">${paraf_p_10 ? '&check;' : '&#10006;'}</td>
							<td class="center">${paraf_s_ho ? '&check;' : '&#10006;'}</td>
							<td class="center">${paraf_s_18 ? '&check;' : '&#10006;'}</td>
							<td class="center">${paraf_m_ho ? '&check;' : '&#10006;'}</td>
							<td class="center">${paraf_m_23 ? '&check;' : '&#10006;'}</td>
							<td class="center">${paraf_m_4 ? '&check;' : '&#10006;'}</td>
						</tr>
						</tbody>
					</table>
            	</td>
            </tr>
        `;
        $('#tabel-uprjpl .body-table').append(html);
    }

    // UPAYA LANSIA
    function hapusUpayaPencegahanResikoJatuhPasienLansia(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_upaya_pencegahan_risiko_jatuh_pasien_lansia") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Pengkajian Uang Resiko Jatuh Lansia', data
                                        .message);
                                }
                            },
                            error: function(e) {
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }

</script>