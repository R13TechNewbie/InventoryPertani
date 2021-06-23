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
                        <h4 class="card-title">Stok Barang Jadi Keluar</h4>
                        <?php if (session()->getFlashData('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashData('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration setting-defaults">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama Barang Jadi</th>
                                        <th>Kuantitas</th>
                                        <th>Id. Produk</th>
                                        <th>Tgl Barang Keluar</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($barangJadiKeluar as $b) : ?>
                                        <tr>
                                            <th><?= $i++; ?></th>
                                            <td><?= $barangJadi->find($requestBarangJadiKeluarTertentu->find($b['id_req_barang_jadi_keluar'])['id_barang_jadi'])['nama_barang_jadi']; ?></td>
                                            <td><?= $requestBarangJadiKeluarTertentu->find($b['id_req_barang_jadi_keluar'])['kuantitas']; ?></td>
                                            <td><?= $requestBarangJadiKeluarTertentu->find($b['id_req_barang_jadi_keluar'])['id_barang_jadi']; ?></td>
                                            <td><?= $requestBarangJadiKeluarTertentu->find($b['id_req_barang_jadi_keluar'])['tgl_request']; ?></td>
                                            <td><?= $b['status']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>

<?= $this->endSection(); ?>