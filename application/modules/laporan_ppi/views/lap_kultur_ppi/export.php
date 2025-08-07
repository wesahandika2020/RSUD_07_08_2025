<?php

header_excel(
  "Rekaapan Kultur " . $periode . " " . $unit
);
?>
<style>
  .center {
    text-align: center;
  }

  .left {
    text-align: left;
  }

  .right {
    text-align: right;
  }

  .align-top {
    vertical-align: top;
  }

  .align-center {
    vertical-align: center;
  }
</style>

<body>
  <h4>RSUD KOTA TANGERANG
    <br> Jl. Pulau Putri Raya, Perumahan Modernland, Tangerang
    <br> Telepon (021) 29720201-03
  </h4>
  <div style="text-align: center;">
    <h4 style="text-transform: uppercase;">REKAPAN BULANAN
      <br>DATA PEMAKAIAN KULTUR
    </h4>
  </div>
  <div class="left">
    <p>
      <b>Unit &emsp;&emsp; : </b><?= $unit ?>
      <br><b>Periode &emsp;: </b><?= $periode ?>
    </p>
  </div>

  <?php
  $data_head = $header;
  $header_ = "";
  foreach ($data_head as $key => $value) {
    if (isset($data_head[$key])) {
      $header_ .= '<th class="center">' . $data_head[$key] . '</th>';
    }
  }

  $data_body = $detail;
  $tbody = "";

  $total = array();
  foreach ($data_body as $i => $v) {
    $tbody .= '
		<tr>
			<td class="center">' . ($i + 1) . '</td>
	';
    foreach ($v as $key => $value) {
      // var_dump($v);

      if (isset($value)) {
        $tbody .= '
			<td class="center">' . $value . '</td>
		';
      }

      if ($key !== 'tanggal' && $value !== NULL) {
        $total[$key] = ($total[$key] ?? 0) + floatval($value);
      }
    }
    $tbody .= '</tr>';
  }

  $tfoot = "";
  foreach ($total as $key => $value) {
    if (isset($total[$key])) {
      $tfoot .= '<td class="center"><b>' . $total[$key] . '</b></td>';
    }
  }

  $html = '
    <table width="100%" border="1">
      <thead>
        <tr style="top: 0;">
          <th width="3%" class="center">No.</th>
          ' . $header_ . '
        </tr>
      </thead>
      <tbody>
        ' . $tbody . '
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2" class="center"> </td>
          ' . $tfoot . '
        </tr>
      </tfoot>
    </table>
  ';

  echo '<div id="table-lap-kultur-ppi">' . $html . '</div>';
  ?>

  <br><br>
  <table width="40%">
    <tr>
      <th colspan="5" class="center font-large"><b>DATA ANGKA KULTUR</b></th>
    </tr>
    <tr>
      <th class="center font-large"><b></b></th>
    </tr>
  </table>
  <table width="40%" border="1">
    <thead>
      <tr style="top: 0;">
        <th colspan="3" width="50%" class="center font-large">ANGKA KULTUR</th>
        <th colspan="2" width="50%" class="center font-large">PER MIL</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $array_nama = array();
      $array_jumlah = array();
      foreach ($kultur as $i => $v) {
        $html_angka_kultur = '
          <tr>
            <td colspan="3" class="font-large left">' . $v->nama . '</td>
            <td colspan="2" class="font-large center">' . $v->jumlah . '</td>
          </tr>
        ';

        echo '<div id="table-angka-kultur">' . $html_angka_kultur . '</div>';
      } ?>
    </tbody>
  </table>
</body>