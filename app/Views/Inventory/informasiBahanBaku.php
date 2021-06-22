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
                        <h4 class="card-title">Informasi Bahan Baku</h4>
                        <?php if (session()->getFlashData('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashData('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <h5 class="card-title mt-2">Daftar Bahan Baku Masuk</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration setting-defaults">
                                <thead>
                                    <tr>
                                        <th>Id Bahan Baku Masuk</th>
                                        <th>Nama Bahan Baku</th>
                                        <th>Id PO</th>
                                        <th>Kuantitas</th>
                                        <th>Tanggal Bahan Baku Masuk</th>
                                        <th>Proses ke Stok Bahan Baku</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bahanBakuMasuk as $b) : ?>
                                        <tr>
                                            <th><?= $b['id_bahan_baku_masuk']; ?></th>
                                            <td><?= $bahanBakuTertentu->find($b['id_bahan_baku'])['nama_bahan_baku']; ?></td>
                                            <td><?= $b['id_po']; ?></td>
                                            <td><?= $b['kuantitas']; ?></td>
                                            <td><?= $b['tgl_bahan_baku_masuk']; ?></td>
                                            <td>
                                                <center><a class="" href="/input-bahan-baku/<?= $b['id_bahan_baku']; ?>"><button class="btn btn-success"><i class="fa fa-plus fa-change-to-white"></i></button></a></center>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mt-2">Input Bahan Baku</h5>
                        <a href="/input-bahan-baku"><button type="button" class="btn mb-1 btn-primary mt-2" style="width: 100%;">Input Bahan Baku</button></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration setting-defaults">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Bahan Baku</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($bahanBaku as $b) : ?>
                                        <tr>
                                            <th><?= $i++; ?></th>
                                            <td id="data-nama-td"><?= $b['nama_bahan_baku']; ?></td>
                                            <td><?= $b['stock_bahan_baku']; ?></td>
                                            <td>
                                                <a href="/input-bahan-baku/<?= $b['id_bahan_baku']; ?>"><button class="btn btn-success"><i class="fa fa-pencil fa-change-to-white"></i></button></a>
                                                <a href="#"><button class="btn btn-danger delete-row" value="<?= $b['id_bahan_baku']; ?>"><i class="fa fa-trash"></i></button></a>
                                                <!-- data-toggle="modal" data-target="#ModalHapus" -->
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- modal -->
                <form id="FormHapus" action="/informasi-bahan-baku/delete/<?= $b['id_bahan_baku']; ?>" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <div class="modal fade" id="ModalHapus">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">Apakah anda yakin akan menghapus data ini beserta jumlahnya?</div>
                                <input type="hidden" name="_method" value="DELETE">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                    <!-- <a href="informasi-bahan-baku/delete/$b(id_bahan_Baku)"> -->
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
            var action = "/informasi-bahan-baku/delete/" + id;

            $('#ModalHapus').modal('show');
            $('#FormHapus').attr('action', action);
        });
    });
</script>

<?= $this->endSection(); ?>