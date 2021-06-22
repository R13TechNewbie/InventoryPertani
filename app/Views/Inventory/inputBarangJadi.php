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
                        <h4 class="card-title">Input Barang Jadi</h4>
                        <?php if (session()->getFlashData('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashData('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-validation">
                            <form class="form-valide" action="/input-barang-jadi-inventory/submit" method="post">
                                <?php if (empty($idBarangJadi)) : ?>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-items">Nama Barang Jadi<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control <?= ($validation->hasError('nama_barang_jadi')) ? 'is-invalid' : ''; ?>" id="nama_barang_jadi" name="nama_barang_jadi" placeholder="Bibit Semangka 500gr" value="<?= old('nama_barang_jadi'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_barang_jadi'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-items">Jenis Barang Jadi<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="id_jenis_barang_jadi" name="id_jenis_barang_jadi">
                                                <?php foreach ($jenisBarangJadi as $b) : ?>
                                                    <?php if ($b['id_jenis_barang_jadi'] == old('id_jenis_barang_jadi')) : ?>
                                                        <option value="<?= $b['id_jenis_barang_jadi']; ?>" selected><?= $b['jenis_barang_jadi']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $b['id_jenis_barang_jadi']; ?>"><?= $b['jenis_barang_jadi']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#tambahJenisBarangJadiModal"><i class="fa fa-plus fa-change-to-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-digits">Jumlah <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="stock_barang_jadi" name="stock_barang_jadi" placeholder="5" value="<?= old('stock_barang_jadi'); ?>">
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <input type="hidden" class="form-control" id="id_barang_jadi" name="id_barang_jadi" placeholder="Bibit Semangka 500gr" value="<?= $barangJadiTertentu['id_barang_jadi']; ?>">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-items">Nama Barang Jadi<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control <?= ($validation->hasError('nama_barang_jadi')) ? 'is-invalid' : ''; ?>" id="nama_barang_jadi" name="nama_barang_jadi" placeholder="Bibit Semangka 500gr" value="<?= (old('nama_barang_jadi') == '') ? $barangJadiTertentu['nama_barang_jadi'] : old('nama_barang_jadi'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_barang_jadi'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-items">Jenis Barang Jadi<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="id_jenis_barang_jadi" name="id_jenis_barang_jadi" autofocus>
                                                <?php foreach ($jenisBarangJadi as $b) : ?>
                                                    <?php if (!empty(old('id_jenis_barang_jadi'))) : ?>
                                                        <?php if ($b['id_jenis_barang_jadi'] == old('id_jenis_barang_jadi')) : ?>
                                                            <option value="<?= $b['id_jenis_barang_jadi']; ?>" selected><?= $b['jenis_barang_jadi']; ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $b['id_jenis_barang_jadi']; ?>"><?= $b['jenis_barang_jadi']; ?></option>
                                                        <?php endif; ?>

                                                    <?php elseif ($b['id_jenis_barang_jadi'] == $barangJadiTertentu['id_jenis_barang_jadi']) : ?>
                                                        <option value="<?= $b['id_jenis_barang_jadi']; ?>" selected><?= $b['jenis_barang_jadi']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $b['id_jenis_barang_jadi']; ?>"><?= $b['jenis_barang_jadi']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahJenisBahanBakuModal"><i class="fa fa-plus fa-change-to-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-digits">Jumlah <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="stock_barang_jadi" name="stock_barang_jadi" placeholder="5" value="<?= (old('stock_barang_jadi') == '') ? $barangJadiTertentu['stock_barang_jadi'] : old('stock_barang_jadi'); ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="/informasi-barang-jadi-inventory"><button type="button" class="btn btn-danger">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- modal -->
                    <form method="post" action="/input-barang-jadi-inventory/tambah-jenis-barang-jadi">
                        <div class="modal fade" id="tambahJenisBarangJadiModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Buat Jenis Barang Jadi Baru</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label class="col-form-label">Silakan masukkan nama jenis barang jadi baru ke isian dibawah ini : </label>
                                        <input class="col-lg-11" type="text" id="jenis_barang_jadi" name="jenis_barang_jadi" placeholder="Bibit">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button></a>
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