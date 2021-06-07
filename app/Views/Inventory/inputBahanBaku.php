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
                        <h4 class="card-title">Input Bahan Baku</h4>
                        <div class="form-validation">
                            <form class="form-valide" action="/input-bahan-baku/submit" method="post">
                                <?php if (empty($idBahanBaku)) : ?>
                                    <div class="form-group row">
                                        <!-- <label class="col-lg-4 col-form-label" for="val-items">Nama Bahan Baku<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="id_bahan_baku" name="id_bahan_baku" autofocus>
                                                <option value="">Please select</option>
                                                <?php foreach ($bahanBaku as $b) : ?>
                                                    <option value="<?= $b['id_bahan_baku']; ?>"><?= $b['nama_bahan_baku']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div> -->
                                        <label class="col-lg-4 col-form-label" for="val-items">Nama Bahan Baku<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nama_bahan_baku" name="nama_bahan_baku" placeholder="Bibit Semangka 500gr">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-items">Jenis Bahan Baku<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="id_jenis_bahan_baku" name="id_jenis_bahan_baku" autofocus>
                                                <?php foreach ($jenisBahanBaku as $b) : ?>
                                                    <option value="<?= $b['id_jenis_bahan_baku']; ?>"><?= $b['jenis_bahan_baku']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-digits">Jumlah <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="stock_bahan_baku" name="stock_bahan_baku" placeholder="5">
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="form-group row">

                                        <label class="col-lg-4 col-form-label" for="val-items">Nama Bahan Baku<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="hidden" class="form-control" id="id_bahan_baku" name="id_bahan_baku" placeholder="Bibit Semangka 500gr" value="<?= $bahanBakuTertentu['id_bahan_baku']; ?>">
                                            <input type="text" class="form-control" id="nama_bahan_baku" name="nama_bahan_baku" placeholder="Bibit Semangka 500gr" value="<?= $bahanBakuTertentu['nama_bahan_baku']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-items">Jenis Bahan Baku<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="id_jenis_bahan_baku" name="id_jenis_bahan_baku" autofocus>
                                                <option value="<?= $bahanBakuTertentu['id_jenis_bahan_baku'] ?>"><?= $jenisBahanBakuTertentu['jenis_bahan_baku']; ?></option>
                                                <?php foreach ($jenisBahanBaku as $b) : ?>
                                                    <?php if ($b['id_jenis_bahan_baku'] != $bahanBakuTertentu['id_jenis_bahan_baku']) : ?>
                                                        <option value="<?= $b['id_jenis_bahan_baku']; ?>"><?= $b['jenis_bahan_baku']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-digits">Jumlah <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="stock_bahan_baku" name="stock_bahan_baku" placeholder="5" value="<?= $bahanBakuTertentu['stock_bahan_baku']; ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="/informasi-bahan-baku"><button type="button" class="btn btn-danger">Cancel</button></a>
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