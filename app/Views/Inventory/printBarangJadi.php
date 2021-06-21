<!DOCTYPE html>
<html lang="en">
<?php

use CodeIgniter\I18n\Time; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Jadi</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            border: 0.5px solid #000;
            text-align: center;
            font-weight: bold;
        }

        td {
            border: 0.5px solid #000;
            text-align: center;
        }
    </style>
</head>

<body>
    <div style="font-size: 42px; width:100%; text-align:center;">LAPORAN BARANG JADI</div>
    <p style="width:100%; text-align:center;"><i> PT. Pertani</i><br><i>Inventory</i></p>
    <hr>
    <p></p>
    Tanggal & Waktu : <?= new Time('now', 'Asia/Jakarta', 'id_ID'); ?>
    <br>
    <b>
        <p style="width: 100%; text-align:center; font-size:20px;">Barang Jadi Masuk</p>
    </b>

    <table cellpadding=6>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama Barang Jadi</th>
                <th>Jumlah</th>
                <th>Tgl Masuk</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            $totalBarangJadiMasuk = 0; ?>
            <?php foreach ($barangJadiMasuk as $d) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $barangJadi->find($d['id_barang_jadi'])['nama_barang_jadi']; ?></td>
                    <td><?= $d['kuantitas'] ?></td>
                    <td><?= $d['tgl_barang_jadi_masuk']; ?></td>
                    <?php $totalBarangJadiMasuk = $totalBarangJadiMasuk + $d['kuantitas'] ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>
    <b>
        <p style="width: 100%; text-align:center; font-size:20px;">Barang Jadi Keluar</p>
    </b>
    <table cellpadding=6>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama Barang Jadi</th>
                <th>Jumlah</th>
                <th>Tgl Keluar</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            $totalBarangJadiKeluar = 0; ?>
            <?php foreach ($barangJadiKeluar as $d) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $barangJadi->find($reqBarangJadi->find($d['id_req_barang_jadi_keluar'])['id_barang_jadi'])['nama_barang_jadi']; ?></td>
                    <td><?= $reqBarangJadi->find($d['id_req_barang_jadi_keluar'])['kuantitas'] ?></td>
                    <td><?= $d['tgl_barang_keluar']; ?></td>
                    <?php $totalBarangJadiKeluar = $totalBarangJadiKeluar + $reqBarangJadi->find($d['id_req_barang_jadi_keluar'])['kuantitas'] ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <b>
        <p style="margin-left:72%; text-align:left; font-size:14px;">Total Barang Jadi Masuk : <?= $totalBarangJadiMasuk; ?><br>Total Barang Jadi Keluar : <?= $totalBarangJadiKeluar; ?><br>Selisih Barang Jadi Masuk dan Keluar : <?= $totalBarangJadiMasuk - $totalBarangJadiKeluar; ?></p>
    </b>
</body>

</html>