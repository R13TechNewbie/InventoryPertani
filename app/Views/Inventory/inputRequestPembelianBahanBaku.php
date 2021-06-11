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
                        <h4 class="card-title">Input Request Pembelian Bahan Baku</h4>
                        <?php if (session()->getFlashData('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashData('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-validation">
                            <form class="form-valide" action="input-request-pembelian-bahan-baku/submit" method="post">
                                <?php if (empty($idReqBahanBaku)) : ?>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nama_bahan_baku">Nama Bahan Baku<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="id_bahan_baku" name="id_bahan_baku">
                                                <?php foreach ($bahanBaku as $b) : ?>
                                                    <?php if ($b['id_bahan_baku'] == old('id_bahan_baku')) : ?>
                                                        <option value="<?= $b['id_bahan_baku']; ?>" selected><?= $b['nama_bahan_baku']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $b['id_bahan_baku']; ?>"><?= $b['nama_bahan_baku']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-digits">Jumlah Pesanan<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="kuantitas" name="kuantitas" placeholder="5" value="<?= old('kuantitas'); ?>">
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <input type="hidden" class="form-control" id="id_req_bahan_baku" name="id_req_bahan_baku" placeholder="Bibit Semangka 500gr" value="<?= $idReqBahanBaku; ?>">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nama_bahan_baku">Nama Bahan Baku<span class="text-danger">*</span>
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

                                                    <?php elseif ($b['id_bahan_baku'] == $bahanBakuTertentu['id_bahan_baku']) : ?>
                                                        <option value="<?= $b['id_bahan_baku']; ?>" selected><?= $b['nama_bahan_baku']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $b['id_bahan_baku']; ?>"><?= $b['nama_bahan_baku']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-digits">Jumlah Pesanan<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="kuantitas" name="kuantitas" placeholder="5" value="<?= (old('kuantitas') == '') ? $reqBahanBaku->find($idReqBahanBaku)['kuantitas'] : old('kuantitas'); ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="/request-pembelian-bahan-baku"><button type="button" class="btn btn-danger">Cancel</button></a>
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