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
                        <h4 class="card-title">Request Barang Jadi</h4>
                        <div class="form-validation">
                            <form class="form-valide" action="/request-barang-jadi/submit" method="post">
                                <?php if (empty($idReqBarangJadiKeluar)) : ?>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Nama Barang Jadi<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="id_barang_jadi" name="id_barang_jadi">
                                                <?php foreach ($barangJadi as $b) : ?>
                                                    <?php if ($b['id_barang_jadi'] == old('id_barang_jadi')) : ?>
                                                        <option value="<?= $b['id_barang_jadi']; ?>" selected><?= $b['nama_barang_jadi']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $b['id_barang_jadi']; ?>"><?= $b['nama_barang_jadi']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="kuantitas">Kuantitas<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="kuantitas" name="kuantitas" placeholder="5" value="<?= old('kuantitas'); ?>">
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <input type="hidden" class="form-control" id="id_req_barang_jadi_keluar" name="id_req_barang_jadi_keluar" placeholder="Bibit Semangka 500gr" value="<?= $reqBarangJadiKeluarTertentu['id_request_barang_jadi_keluar']; ?>">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-skill">Nama Barang Jadi<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="form-control" id="id_barang_jadi" name="id_barang_jadi">
                                                <?php foreach ($barangJadi as $b) : ?>
                                                    <?php if (!empty(old('id_barang_jadi'))) : ?>
                                                        <?php if ($b['id_barang_jadi'] == old('id_barang_jadi')) : ?>
                                                            <option value="<?= $b['id_barang_jadi']; ?>" selected><?= $b['nama_barang_jadi']; ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $b['id_barang_jadi']; ?>"><?= $b['nama_barang_jadi']; ?></option>
                                                        <?php endif; ?>
                                                    <?php elseif ($b['id_barang_jadi'] == $barangJadiTertentu['id_barang_jadi']) : ?>
                                                        <option value="<?= $b['id_barang_jadi']; ?>" selected><?= $b['nama_barang_jadi']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $b['id_barang_jadi']; ?>"><?= $b['nama_barang_jadi']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="kuantitas">Kuantitas<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="kuantitas" name="kuantitas" placeholder="5" value="<?= $old('kuantitas'); ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="/informasi-request-barang-jadi"><button type="button" class="btn btn-danger">Cancel</button></a>
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