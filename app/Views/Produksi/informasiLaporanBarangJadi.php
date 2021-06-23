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
                        <h4 class="card-title">Laporan Barang Jadi</h4>
                        <?php if (session()->getFlashData('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashData('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <a href="/input-barang-jadi-produksi"><button type="button" class="btn mb-1 btn-primary mt-2" style="width: 100%;">Input Laporan Barang Jadi</button></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration setting-defaults">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Barang Jadi</th>
                                        <th>Jumlah</th>
                                        <th>Tgl Produksi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($barangJadiMasuk as $b) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $barangJadi->find($b['id_barang_jadi'])['nama_barang_jadi']; ?></td>
                                            <td><?= $b['kuantitas']; ?></td>
                                            <td><?= $b['tgl_barang_jadi_masuk']; ?></td>
                                            <td>
                                                <a href="/input-barang-jadi-produksi/<?= $b['id_barang_jadi']; ?>"><button class="btn btn-success"><i class="fa fa-pencil fa-change-to-white"></i></button></a>
                                                <a href="#"><button class="btn btn-danger delete-row" value="<?= $b['id_barang_jadi_masuk']; ?>"><i class="fa fa-trash"></i></button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- modal -->
                    <form id="FormHapus" action="/informasi-laporan-barang-jadi/delete/<?= $b['id_barang_jadi_masuk']; ?>" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="modal fade" id="ModalHapus">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Apakah anda yakin akan menghapus laporan barang jadi ini beserta jumlahnya?</div>
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
            var action = "/informasi-laporan-barang-jadi/delete/" + id;

            $('#ModalHapus').modal('show');
            $('#FormHapus').attr('action', action);
        });
    });
</script>

<?= $this->endSection(); ?>