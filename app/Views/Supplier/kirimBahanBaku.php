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
                        <!-- php($validation->listErrors();) -->
                        <h4 class="card-title">Kirim Bahan Baku</h4>
                        <?php if (session()->getFlashData('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashData('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-validation">
                            <form class="form-valide" action="/kirim-bahan-baku/submit" method="post">
                                <?php if (empty($idBahanBakuMasuk)) : ?>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-items">Nama Bahan Baku<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="id_bahan_baku" name="id_bahan_baku" autofocus>
                                                <?php foreach ($bahanBaku as $b) : ?>
                                                    <?php if (!empty(old('id_bahan_baku'))) : ?>
                                                        <?php if ($b['id_bahan_baku'] == old('id_bahan_baku')) : ?>
                                                            <option value="<?= $b['id_bahan_baku']; ?>" selected><?= $b['nama_bahan_baku']; ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $b['id_bahan_baku']; ?>"><?= $b['nama_bahan_baku']; ?></option>
                                                        <?php endif; ?>
                                                    <?php else : ?>
                                                        <option value="<?= $b['id_bahan_baku']; ?>"><?= $b['nama_bahan_baku']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <!-- <div class="col-lg-2">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahJenisBahanBakuModal"><i class="fa fa-plus fa-change-to-white"></i></button>
                                    </div> -->
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-items">Jenis Bahan Baku<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="id_jenis_bahan_baku" name="id_jenis_bahan_baku">
                                                <?php foreach ($jenisBahanBaku as $b) : ?>
                                                    <?php if ($b['id_jenis_bahan_baku'] == old('id_jenis_bahan_baku')) : ?>
                                                        <option value="<?= $b['id_jenis_bahan_baku']; ?>" selected><?= $b['jenis_bahan_baku']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $b['id_jenis_bahan_baku']; ?>"><?= $b['jenis_bahan_baku']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <!-- <div class="col-lg-2">
                                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#tambahJenisBahanBakuModal"><i class="fa fa-plus fa-change-to-white"></i></button>
                                    </div> -->
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-digits">Jumlah <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="kuantitas" name="kuantitas" placeholder="5" value="<?= old('kuantitas'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-items">ID Purchase Order<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="id_po" name="id_po">
                                                <?php foreach ($purchaseOrder as $b) : ?>
                                                    <?php if ($b['id_po'] == old('id_po')) : ?>
                                                        <option value="<?= $b['id_po']; ?>" selected><?= $b['id_po']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $b['id_po']; ?>"><?= $b['id_po']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-items">Nama Bahan Baku<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="id_bahan_baku" name="id_bahan_baku" autofocus>
                                                <?php foreach ($bahanBaku as $b) : ?>
                                                    <?php if (!empty(old('id_bahan_baku'))) : ?>
                                                        <?php if ($b['id_bahan_baku'] == old('id_bahan_baku')) : ?>
                                                            <option value="<?= $b['id_bahan_baku']; ?>" selected><?= $b['nama_bahan_baku']; ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $b['id_bahan_baku']; ?>"><?= $b['nama_bahan_baku']; ?></option>
                                                        <?php endif; ?>

                                                    <?php elseif ($b['id_bahan_baku'] == $bahanBakuMasukTertentu['id_bahan_baku']) : ?>
                                                        <option value="<?= $b['id_bahan_baku']; ?>" selected><?= $b['nama_bahan_baku']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $b['id_bahan_baku']; ?>"><?= $b['nama_bahan_baku']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <!-- <div class="col-lg-2">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahJenisBahanBakuModal"><i class="fa fa-plus fa-change-to-white"></i></button>
                                        </div> -->
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-items">Jenis Bahan Baku<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="id_jenis_bahan_baku" name="id_jenis_bahan_baku" autofocus>
                                                <?php foreach ($jenisBahanBaku as $b) : ?>
                                                    <?php if (!empty(old('id_jenis_bahan_baku'))) : ?>
                                                        <?php if ($b['id_jenis_bahan_baku'] == old('id_jenis_bahan_baku')) : ?>
                                                            <option value="<?= $b['id_jenis_bahan_baku']; ?>" selected><?= $b['jenis_bahan_baku']; ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $b['id_jenis_bahan_baku']; ?>"><?= $b['jenis_bahan_baku']; ?></option>
                                                        <?php endif; ?>

                                                    <?php elseif ($b['id_jenis_bahan_baku'] == $bahanBakuTertentu->find($bahanBakuMasukTertentu['id_bahan_baku'])['id_jenis_bahan_baku']) : ?>
                                                        <option value="<?= $b['id_jenis_bahan_baku']; ?>" selected><?= $b['jenis_bahan_baku']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $b['id_jenis_bahan_baku']; ?>"><?= $b['jenis_bahan_baku']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <!-- <div class="col-lg-2">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahJenisBahanBakuModal"><i class="fa fa-plus fa-change-to-white"></i></button>
                                        </div> -->
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-digits">Jumlah <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="kuantitas" name="kuantitas" placeholder="5" value="<?= (old('kuantitas') == '') ? $bahanBakuMasukTertentu['kuantitas'] : old('stock_bahan_baku'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-items">Id Purchase Order<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="id_po" name="id_po">
                                                <?php foreach ($purchaseOrder as $b) : ?>
                                                    <?php if ($b['id_po'] == old('id_po')) : ?>
                                                        <option value="<?= $b['id_po']; ?>" selected><?= $b['id_po']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $b['id_po']; ?>"><?= $b['id_po']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" id="id_bahan_baku_masuk" name="id_bahan_baku_masuk" value="<?= $idBahanBakuMasuk; ?>">
                                <?php endif; ?>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="/informasi-supplier"><button type="button" class="btn btn-danger">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                            <!-- modal -->
                            <form method="post" action="/input-bahan-baku/tambah-jenis-bahan-baku">
                                <div class="modal fade" id="tambahJenisBahanBakuModal">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Buat Jenis Bahan Baku Baru</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <label class="col-form-label">Silakan masukkan nama jenis bahan baku baru ke isian dibawah ini : </label>
                                                <input class="col-lg-11" type="text" id="tambahJenisBahanBaku" name="tambahJenisBahanBaku" placeholder="Bibit">
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
        </div>
    </div>
    <!-- #/ container -->
</div>
<?= $this->endSection(); ?>