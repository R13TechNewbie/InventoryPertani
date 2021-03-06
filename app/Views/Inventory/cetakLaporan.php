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
                        <h4 class="card-title">Cetak Laporan </h4>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-1 mt-2 float-right" data-toggle="modal" data-target="#basicModal">Cetak</button>
                        <!-- Nav tabs -->
                        <div class="default-tab">
                            <ul class="nav nav-tabs mb-3" style="width: 100%;" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#bahan-baku">Bahan Baku</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#barang-jadi">Barang Jadi</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="bahan-baku" role="tabpanel">
                                    <div class="p-t-15">
                                        <h4 class="card-title">Bahan Baku Masuk </h4>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration setting-defaults">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Nama Bahan Baku</th>
                                                        <th>Jumlah</th>
                                                        <th>Tgl Masuk</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($bahanBakuMasuk as $d) : ?>
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td><?= $bahanBaku->find($d['id_bahan_baku'])['nama_bahan_baku']; ?></td>
                                                            <td><?= $d['kuantitas']; ?></td>
                                                            <td><?= $d['tgl_bahan_baku_masuk']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="pembatasTabelAtasTabelBawah" style="padding: 30px;"></div>
                                    <div class="p-t-15">
                                        <h4 class="card-title">Bahan Baku Keluar</h4>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration setting-defaults">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Nama Bahan Baku</th>
                                                        <th>Jumlah</th>
                                                        <th>Tgl Keluar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($bahanBakuKeluar as $d) : ?>
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td><?= $bahanBaku->find($reqBahanBaku->find($d['id_req_bahan_baku'])['id_bahan_baku'])['nama_bahan_baku']; ?></td>
                                                            <td><?= $reqBahanBaku->find($d['id_req_bahan_baku'])['kuantitas'] ?></td>
                                                            <td><?= $d['tgl_bahan_baku_keluar']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="barang-jadi">
                                    <div class="p-t-15">
                                        <h4 class="card-title">Barang Jadi Masuk</h4>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration setting-defaults">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Nama Barang Jadi</th>
                                                        <th>Jumlah</th>
                                                        <th>Tgl Masuk</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($barangJadiMasuk as $d) : ?>
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td><?= $barangJadi->find($d['id_barang_jadi'])['nama_barang_jadi']; ?></td>
                                                            <td><?= $d['kuantitas'] ?></td>
                                                            <td><?= $d['tgl_barang_jadi_masuk']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="pembatasTabelAtasTabelBawah" style="padding: 30px;"></div>
                                    <div class="p-t-15">
                                        <h4 class="card-title">Barang Jadi Keluar</h4>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration setting-defaults">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Nama Barang Jadi</th>
                                                        <th>Jumlah</th>
                                                        <th>Tgl Keluar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($barangJadiKeluar as $d) : ?>
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td><?= $barangJadi->find($reqBarangJadi->find($d['id_req_barang_jadi_keluar'])['id_barang_jadi'])['nama_barang_jadi']; ?></td>
                                                            <td><?= $reqBarangJadi->find($d['id_req_barang_jadi_keluar'])['kuantitas'] ?></td>
                                                            <td><?= $d['tgl_barang_keluar']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bootstrap-modal">
                            <!-- Modal -->
                            <form action="/cetak-laporan/handler" method="post" target="__blank">
                                <div class="modal fade" id="basicModal" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Cetak</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>??</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Pilih Opsi Cetak:</label>
                                                    <select class="form-control" id="printfile" name="printfile" autofocus>
                                                        <option value="bahanbaku">Cetak Laporan Bahan Baku Saja</option>
                                                        <option value="barangjadi">Cetak Laporan Barang Jadi Saja</option>
                                                        <option value="bahanbakubarangjadi">Cetak Laporan Bahan Baku dan Barang Jadi</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Cetak</button>
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