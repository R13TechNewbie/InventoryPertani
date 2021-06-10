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
                        <h4 class="card-title">Request Barang Jadi Keluar dari Sales & Marketing</h4>
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
                                        <th>Nama Barang Jadi</th>
                                        <th>Kuantitas</th>
                                        <th>Id. Produk</th>
                                        <th>Tanggal Request</th>
                                        <th>Proses ke Barang Jadi Keluar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($requestBarangJadiKeluar as $b) : ?>
                                        <tr>
                                            <th><?= $i++; ?></th>
                                            <td><?= $barangJadi->find($b['id_barang_jadi'])['nama_barang_jadi']; ?></td>
                                            <td><?= $b['kuantitas']; ?></td>
                                            <td><?= $b['id_barang_jadi']; ?></td>
                                            <td><?= $b['tgl_request']; ?></td>
                                            <td>
                                                <center><a class="" href="/input-barang-jadi-keluar/<?= $b['id_req_barang_jadi_keluar']; ?>"><button class="btn btn-success"><i class="fa fa-plus fa-change-to-white"></i></button></a></center>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Barang Jadi Keluar</h4>
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
                                        <th>Aksi</th>
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
                                            <td>
                                                <a href="/input-barang-jadi-keluar/<?= $b['id_req_barang_jadi_keluar']; ?>/<?= $b['id_barang_jadi_keluar']; ?>"><button class="btn btn-success"><i class="fa fa-pencil fa-change-to-white"></i></button></a>
                                                <a href="#"><button class="btn btn-danger" data-toggle="modal" data-target="#ModalHapus"><i class="fa fa-trash"></i></button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- modal -->
                    <form action="/request-barang-jadi-keluar/delete/<?= $b['id_barang_jadi_keluar']; ?>" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="modal fade" id="ModalHapus">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Apakah anda yakin akan menghapus data barang jadi keluar "<?= $barangJadi->find($requestBarangJadiKeluarTertentu->find($b['id_req_barang_jadi_keluar'])['id_barang_jadi'])['nama_barang_jadi']; ?>" beserta kuantitasnya?</div>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                        <!-- <a href="informasi-bahan-baku/delete/$b(id_barang_jadi)"> -->
                                        <button type="submit" class="btn btn-danger">Ya</button>
                                        <!-- </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>

<?= $this->endSection(); ?>