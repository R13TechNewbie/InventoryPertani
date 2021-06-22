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
                        <h4 class="card-title">Informasi Barang Jadi</h4>
                        <?php if (session()->getFlashData('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashData('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <h5 class="card-title">Daftar Barang Jadi Masuk</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration setting-defaults">
                                    <thead>
                                        <tr>
                                            <th>Id Barang Jadi Masuk</th>
                                            <th>Id. Produk</th>
                                            <th>Nama Barang Jadi</th>
                                            <th>Kuantitas</th>
                                            <th>Tgl Masuk</th>
                                            <th>Proses ke Stok Barang Jadi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($barangJadiMasuk as $b) : ?>
                                            <tr>
                                                <th><?= $b['id_barang_jadi_masuk']; ?></th>
                                                <td><?= $b['id_barang_jadi']; ?></td>
                                                <td><?= $barangJadiTertentu->find($b['id_barang_jadi'])['nama_barang_jadi']; ?></td>
                                                <td><?= $b['kuantitas']; ?></td>
                                                <td><?= $b['tgl_barang_jadi_masuk']; ?></td>
                                                <td>
                                                    <center><a class="" href="/input-barang-jadi-inventory/<?= $b['id_barang_jadi']; ?>"><button class="btn btn-success"><i class="fa fa-plus fa-change-to-white"></i></button></a></center>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Input Barang Jadi</h5>
                        <a href="/input-barang-jadi-inventory"><button type="button" class="btn mb-1 btn-primary mt-2" style="width: 100%;">Input Barang Jadi</button></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration setting-defaults">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Nama Barang Jadi</th>
                                        <th>Jenis Produk</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($barangJadi as $b) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $b['nama_barang_jadi']; ?></td>
                                            <td><?= $jenisBarangJadi->find($b['id_jenis_barang_jadi'])['jenis_barang_jadi']; ?></td>
                                            <td><?= $b['stock_barang_jadi']; ?></td>
                                            <td>
                                                <a href="/input-barang-jadi-inventory/<?= $b['id_barang_jadi']; ?>"><button class="btn btn-success"><i class="fa fa-pencil fa-change-to-white"></i></button></a>
                                                <a href="#"><button class="btn btn-danger delete-row" value="<?= $b['id_barang_jadi']; ?>"><i class="fa fa-trash"></i></button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- modal -->
                <form id="FormHapus" action="/informasi-barang-jadi-inventory/delete/<?= $b['id_barang_jadi']; ?>" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="modal fade" id="ModalHapus">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">Apakah anda yakin akan menghapus data beserta jumlahnya?</div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.delete-row', function() {
            var id = $(this).val();
            var action = "/informasi-barang-jadi-inventory/delete/" + id;

            $('#ModalHapus').modal('show');
            $('#FormHapus').attr('action', action);
        });
    });
</script>


<?= $this->endSection(); ?>