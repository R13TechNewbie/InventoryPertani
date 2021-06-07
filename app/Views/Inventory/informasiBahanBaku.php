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
                                            <td><?= $b['nama_bahan_baku']; ?></td>
                                            <td><?= $b['stock_bahan_baku']; ?></td>
                                            <td>
                                                <a href="/input-bahan-baku/<?= $b['id_bahan_baku']; ?>"><button class="btn btn-success"><i class="fa fa-pencil"></i></button></a>
                                                <a href="#"><button class="btn btn-danger"><i class="fa fa-times"></i></button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>