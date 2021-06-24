<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content-body">

    <!-- <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div> -->
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Permintaan Pembelian Bahan Baku</h4>
                        <?php if (session()->getFlashData('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashData('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration setting-defaults">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Id Pesanan</th>
                                        <th>Nama Bahan Baku</th>
                                        <th>Jumlah</th>
                                        <th>Tgl Request</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($reqBahanBaku as $b) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $b['id_req_bahan_baku']; ?></td>
                                            <td><?= $bahanBaku->find($b['id_bahan_baku'])['nama_bahan_baku']; ?></td>
                                            <td><?= $b['kuantitas']; ?></td>
                                            <td><?= $b['tgl_request']; ?></td>
                                            <td>
                                                <a href="/permintaan-pembelian-terkirim/<?= $b['id_req_bahan_baku']; ?>"><button class="btn btn-success"><i class="fa fa-check fa-change-to-white"></i></button></a>
                                                <a href="/permintaan-pembelian-ditolak/<?= $b['id_req_bahan_baku']; ?>"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration setting-defaults">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama Bahan Baku</th>
                                        <th>Jumlah</th>
                                        <th>status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1410032</th>
                                        <td>Gabah 5KG</td>
                                        <td>3</td>
                                        <td>Ada</td>
                                        <td>
                                            <a href="#"><button class="btn btn-success"><i class="fa fa-check"></i></button></a>
                                            <a href="#"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>1410033</th>
                                        <td>Bibit Tomat 500gr</td>
                                        <td>5</td>
                                        <td>Ada</td>
                                        <td>
                                            <a href="#"><button class="btn btn-success"><i class="fa fa-check"></i></button></a>
                                            <a href="#"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>1410034</th>
                                        <td>Bibit Semangka 500gr</td>
                                        <td>7</td>
                                        <td>Ada</td>
                                        <td>
                                            <a href="#"><button class="btn btn-success"><i class="fa fa-check"></i></button></a>
                                            <a href="#"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>

<?= $this->endSection(); ?>