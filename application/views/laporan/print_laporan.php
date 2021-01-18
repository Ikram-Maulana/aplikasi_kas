<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print Laporan</title>
</head>

<body onload="window.print()">

  <h1><?= $title; ?></h1>
  <h2><?= $subtitle; ?></h2>

  <br><br>
  <hr>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Keterangan</th>
        <th>Tanggal</th>
        <th>Nomor Bukti</th>
        <th>Debit</th>
        <th>Kredit</th>
        <th>Saldo Saat Ini</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $_saldo = 0;
      foreach ($saldo_awal as $s) :
        if ($s['debit'] == 0) {
          $nominal = $s['kredit'];
          $_saldo = $_saldo - $nominal;
        } else {
          $nominal = $s['debit'];
          $_saldo = $_saldo + $nominal;
        }
      ?>
      <tr>
        <td>-</td>
        <td>Saldo Kas Terakhir</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>Rp <?= number_format($_saldo, 0, ',', '.') ?></td>
      </tr>
      <?php endforeach; ?>

      <?php
      $no = 1;
      $saldo = 0;
      foreach ($filter as $df) :
        $date = date_create($df->tgl_transaksi);

        $debit = $df->debit;
        $kredit = $df->kredit;

        if ($debit == 0) {
          $nominal = $kredit;

          $saldo = $saldo - $nominal;
        } else {
          $nominal = $df->debit;
          $saldo = $saldo + $nominal;
        }
      ?>

      <tr>
        <td><?= $no++; ?></td>
        <td><?= $df->keterangan ?></td>
        <td><?= date_format($date, "d F Y") ?></td>
        <td><?= $df->id_transaksi; ?></td>
        <td><?= number_format($df->debit, 0, ',', '.') ?></td>
        <td><?= number_format($df->kredit, 0, ',', '.') ?></td>
        <td>Rp <?= number_format($saldo, 0, ',', '.') ?></td>
      </tr>

      <?php endforeach; ?>
    </tbody>
  </table>


</body>

</html>