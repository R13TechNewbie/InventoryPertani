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
                        <h4 class="card-title">Input Bahan Baku Keluar</h4>
                        <div class="form-validation">
                            <form class="form-valide" action="/input-bahan-baku-keluar/submit" method="post">
                                <?php if (empty($idBahanBakuKeluar)) : ?>
                                    <input type="hidden" class="form-control" id="id_req_bahan_baku" name="id_req_bahan_baku" value="<?= $idReqBahanBaku; ?>" readonly="true">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nama_bahan_baku">Nama Bahan Baku<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nama_bahan_baku" name="nama_bahan_baku" value="<?= $namaBahanBaku; ?>" readonly="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="kuantitas">Kuantitas<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="kuantitas" name="kuantitas" value="<?= $kuantitas; ?>" readonly="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="id_bahan_baku">Id Bahan Baku<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="id_bahan_baku" name="id_bahan_baku" value="<?= $idBahanBaku; ?>" readonly="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="status">Status<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="status" name="status">
                                                <option value="Diproses">Diproses</option>
                                                <option value="Terkirim">Terkirim</option>
                                            </select>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <input type="hidden" class="form-control" id="id_bahan_baku_keluar" name="id_bahan_baku_keluar" value="<?= $idBahanBakuKeluar; ?>" readonly="true">
                                    <input type="hidden" class="form-control" id="id_req_bahan_baku" name="id_req_bahan_baku" value="<?= $idReqBahanBaku; ?>" readonly="true">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nama_bahan_baku">Nama Bahan Baku<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nama_bahan_baku" name="nama_bahan_baku" value="<?= $namaBahanBaku; ?>" readonly="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="kuantitas">Kuantitas<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="kuantitas" name="kuantitas" value="<?= $kuantitas; ?>" readonly="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="id_bahan_baku">Id Bahan Baku<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="id_bahan_baku" name="id_bahan_baku" value="<?= $idBahanBaku; ?>" readonly="true">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="status">Status<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="status" name="status">
                                                <?php if ($status == 'Diproses') : ?>
                                                    <option value="Diproses" selected>Diproses</option>
                                                    <option value="Terkirim">Terkirim</option>
                                                <?php else : ?>
                                                    <option value="Diproses">Diproses</option>
                                                    <option value="Terkirim" selected>Terkirim</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="/informasi-bahan-baku-keluar"><button type="button" class="btn btn-danger">Cancel</button></a>
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