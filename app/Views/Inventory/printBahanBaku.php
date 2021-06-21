<!DOCTYPE html>
<html lang="en">
<?php

use CodeIgniter\I18n\Time; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bahan Baku</title>
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
    <div style="font-size: 42px; width:100%; text-align:center;">LAPORAN BAHAN BAKU</div>
    <p style="width:100%; text-align:center;"><i> PT. Pertani</i><br><i>Inventory</i></p>
    <hr>
    <p></p>
    Tanggal & Waktu : <?= new Time('now', 'Asia/Jakarta', 'id_ID'); ?>
    <br>
    <b>
        <p style="width: 100%; text-align:center; font-size:20px;">Bahan Baku Masuk</p>
    </b>

    <table cellpadding=6>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama Bahan Baku</th>
                <th>Jumlah</th>
                <th>Tgl Masuk</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            $totalBahanBakuMasuk = 0; ?>
            <?php foreach ($bahanBakuMasuk as $d) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $bahanBaku->find($d['id_bahan_baku'])['nama_bahan_baku']; ?></td>
                    <td><?= $d['kuantitas']; ?></td>
                    <td><?= $d['tgl_bahan_baku_masuk']; ?></td>
                    <?php $totalBahanBakuMasuk = $totalBahanBakuMasuk + $d['kuantitas']; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>
    <b>
        <p style="width: 100%; text-align:center; font-size:20px;">Bahan Baku Keluar</p>
    </b>
    <table cellpadding=6>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama Bahan Baku</th>
                <th>Jumlah</th>
                <th>Tgl Keluar</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            $totalBahanBakuKeluar = 0; ?>
            <?php foreach ($bahanBakuKeluar as $d) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $bahanBaku->find($reqBahanBaku->find($d['id_req_bahan_baku'])['id_bahan_baku'])['nama_bahan_baku']; ?></td>
                    <td><?= $reqBahanBaku->find($d['id_req_bahan_baku'])['kuantitas'] ?></td>
                    <td><?= $d['tgl_bahan_baku_keluar']; ?></td>
                    <?php $totalBahanBakuKeluar = $totalBahanBakuKeluar + $reqBahanBaku->find($d['id_req_bahan_baku'])['kuantitas']; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <b>
        <p style="margin-left:72%; text-align:left; font-size:14px;">Total Bahan Baku Masuk : <?= $totalBahanBakuMasuk; ?><br>Total Bahan Baku Keluar : <?= $totalBahanBakuKeluar; ?><br>Selisih Bahan Baku Masuk dan Keluar : <?= $totalBahanBakuMasuk - $totalBahanBakuKeluar; ?></p>
    </b>
</body>

</html>