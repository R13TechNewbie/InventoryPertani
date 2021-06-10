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
                        <h4 class="card-title">Request Bahan Baku</h4>
                        <?php if (session()->getFlashData('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashData('pesan'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-validation">
                            <form class="form-valide" action="/request-bahan-baku/submit" method="post">
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
                                        <div class="col-lg-2">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahBahanBakuModal"><i class="fa fa-plus fa-change-to-white"></i></button>
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
                                    <input type="hidden" class="form-control" id="id_req_bahan_baku" name="id_req_bahan_baku" placeholder="Bibit Semangka 500gr" value="<?= $reqBahanBakuTertentu['id_req_bahan_baku']; ?>">
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
                                        <div class="col-lg-2">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahBahanBakuModal"><i class="fa fa-plus fa-change-to-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-digits">Jumlah Pesanan<span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" id="stock_bahan_baku" name="stock_bahan_baku" placeholder="5" value="<?= (old('kuantitas') == '') ? $reqBahanBaku['kuantitas'] : old('kuantitas'); ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="/"><button type="button" class="btn btn-danger">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                            <!-- modal -->
                            <form method="post" action="/request-bahan-baku/tambah-bahan-baku">
                                <div class="modal fade" id="tambahBahanBakuModal">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Buat Bahan Baku Baru</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <label class="col-form-label">Silakan masukkan nama bahan baku baru ke isian dibawah ini : </label>
                                                <input class="col-lg-11" type="text" id="tambahBahanBaku" name="tambahBahanBaku" placeholder="Gabah 1 Kg">
                                                <label class="col-form-label">Pilih jenis bahan baku</label>
                                                <select class="col-lg-11 form-control" id="id_jenis_bahan_baku" name="id_jenis_bahan_baku">
                                                    <?php foreach ($jenisBahanBaku as $b) : ?>
                                                        <?php if ($b['id_jenis_bahan_baku'] == old('id_jenis_bahan_baku')) : ?>
                                                            <option value="<?= $b['id_jenis_bahan_baku']; ?>" selected><?= $b['jenis_bahan_baku']; ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $b['id_jenis_bahan_baku']; ?>"><?= $b['jenis_bahan_baku']; ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach ?>
                                                </select>
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