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
                        <h4 class="card-title">Penerimaan Bahan Baku</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration setting-defaults">
                                <thead>
                                    <tr>
                                        <th>Id Pesanan</th>
                                        <th>Nama Bahan Baku</th>
                                        <th>Kuantitas</th>
                                        <th>Id Bahan Baku</th>
                                        <th>Tanggal Proses</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bahanBakuKeluar as $b) : ?>
                                        <tr>
                                            <td><?= $b['id_bahan_baku_keluar']; ?></td>
                                            <td><?= $bahanBaku->find($reqBahanBakuTertentu->find($bahanBakuKeluarTertentu->find($b['id_bahan_baku_keluar'])['id_req_bahan_baku'])['id_bahan_baku'])['nama_bahan_baku']; ?></td>
                                            <td><?= $reqBahanBakuTertentu->find($bahanBakuKeluarTertentu->find($b['id_bahan_baku_keluar'])['id_req_bahan_baku'])['kuantitas']; ?></td>
                                            <td><?= $reqBahanBakuTertentu->find($bahanBakuKeluarTertentu->find($b['id_bahan_baku_keluar'])['id_req_bahan_baku'])['id_bahan_baku']; ?></td>
                                            <td><?= $reqBahanBakuTertentu->find($bahanBakuKeluarTertentu->find($b['id_bahan_baku_keluar'])['id_req_bahan_baku'])['tgl_request']; ?></td>
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