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
                        <h4 class="card-title">Input Barang Jadi Keluar</h4>
                        <div class="form-validation">
                            <form class="form-valide" action="/input-barang-jadi-keluar/submit" method="post">
                                <?php if (empty($idBarangJadiKeluar)) : ?>
                                    <div class="form-group row">
                                        <input type="hidden" class="form-control" id="id_req_barang_jadi_keluar" name="id_req_barang_jadi_keluar" value="<?= $idReqBarangJadiKeluar; ?>" readonly="true">
                                        <label class="col-lg-4 col-form-label" for="nama_barang_jadi">Nama Barang Jadi<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nama_barang_jadi" name="nama_barang_jadi" value="<?= $namaBarangJadi; ?>" readonly="true">
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
                                        <label class="col-lg-4 col-form-label" for="id_barang_jadi">Id. Produk<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="id_barang_jadi" name="id_barang_jadi" value="<?= $idBarangJadi; ?>" readonly="true">
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
                                    <input type="hidden" class="form-control" id="id_barang_jadi_keluar" name="id_barang_jadi_keluar" value="<?= $idBarangJadiKeluar; ?>" readonly="true">
                                    <input type="hidden" class="form-control" id="id_req_barang_jadi_keluar" name="id_req_barang_jadi_keluar" value="<?= $idReqBarangJadiKeluar; ?>" readonly="true">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="nama_barang_jadi">Nama Barang Jadi<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="nama_barang_jadi" name="nama_barang_jadi" value="<?= $namaBarangJadi; ?>" readonly="true">
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
                                        <label class="col-lg-4 col-form-label" for="id_barang_jadi">Id. Produk<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="id_barang_jadi" name="id_barang_jadi" value="<?= $idBarangJadi; ?>" readonly="true">
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
                                        <a href="/request-barang-jadi-keluar"><button type="button" class="btn btn-danger">Cancel</button></a>
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