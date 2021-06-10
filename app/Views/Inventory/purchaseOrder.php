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
                        <h4 class="card-title">Purchase Order</h4>
                        <!-- <a href="/input-bahan-baku-keluar"><button type="button" class="btn mb-1 btn-primary mt-2" style="width: 100%;">Input Bahan Baku Keluar</button></a> -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration setting-defaults">
                                <thead>
                                    <tr>
                                        <th>Id Purchase Order</th>
                                        <th>Nama Supplier</th>
                                        <th>Total Harga</th>
                                        <th>Tanggal PO</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1710010</th>
                                        <td>PT. Permata</td>
                                        <td>Rp.260.000</td>
                                        <td>15 Maret 2021</td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modal-informasi-1"><i class="fa fa-info fa-change-to-white"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>1710011</th>
                                        <td>PT Permata</td>
                                        <td>Rp.150.000</td>
                                        <td>27 Maret 2021</td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modal-informasi-2"><i class="fa fa-info fa-change-to-white"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>1710012</th>
                                        <td>PT Permata</td>
                                        <td>Rp.95.000</td>
                                        <td>31 Maret 2021</td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modal-informasi-3"><i class="fa fa-info fa-change-to-white"></i></button>
                                            <!-- modal -->

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="bootstrap-modal">
                            <!-- Large modal -->
                            <!-- Large Modal 1 -->
                            <div class="modal fade modal-informasi-1" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Purchase Order 1710010</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <div class="basic-form">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="col">
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <label class="col-form-label">No. PO</label>
                                                                    </div>
                                                                    <div class="col-xs-1"><label class="col-form-label">:</label>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label class="col-form-label">1710010</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <label class="col-form-label">Id. Supplier</label>
                                                                    </div>
                                                                    <div class="col-xs-1"><label class="col-form-label">:</label>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label class="col-form-label">12345</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <label class="col-form-label">Nama Supplier</label>
                                                                    </div>
                                                                    <div class="col-xs-1"><label class="col-form-label">:</label>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label class="col-form-label">PT. Permata</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2"></div>
                                                            <div class="col">
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <label class="col-form-label">Tanggal</label>
                                                                    </div>
                                                                    <div class="col-xs-1"><label class="col-form-label">:</label>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label class="col-form-label">15 Maret 2021</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <label class="col-form-label">Alamat</label>
                                                                    </div>
                                                                    <div class="col-xs-1"><label class="col-form-label">:</label>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label class="col-form-label">Jl. Marga Satwa no. 23</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered zero-configuration footer-callback-purchase-order-inventory">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Id Barang</th>
                                                                        <th>Nama Bahan Baku</th>
                                                                        <th>Jumlah</th>
                                                                        <th>Harga</th>
                                                                        <th>Total Harga</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th>1</th>
                                                                        <td>110003</td>
                                                                        <td>Gabah 1KG</td>
                                                                        <td>3</td>
                                                                        <td>Rp.15.000</td>
                                                                        <td>Rp.45.000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>2</th>
                                                                        <td>110004</td>
                                                                        <td>Bibit Tomat 500gr</td>
                                                                        <td>5</td>
                                                                        <td>Rp.15.000</td>
                                                                        <td>Rp.75.000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>3</th>
                                                                        <td>110005</td>
                                                                        <td>Bibit Semangka 500gr</td>
                                                                        <td>7</td>
                                                                        <td>Rp.20.000</td>
                                                                        <td>Rp.140.000</td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th colspan="5" style="text-align:right">Total:</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                            <!-- <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <th></th>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>Total Tagihan</td>
                                                                        <td>Rp.260.000</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table> -->
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Large Modal 2 -->
                            <div class="modal fade modal-informasi-2" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Purchase Order 1710011</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <div class="basic-form">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="col">
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <label class="col-form-label">No. PO</label>
                                                                    </div>
                                                                    <div class="col-xs-1"><label class="col-form-label">:</label>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label class="col-form-label">1710011</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <label class="col-form-label">Id. Supplier</label>
                                                                    </div>
                                                                    <div class="col-xs-1"><label class="col-form-label">:</label>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label class="col-form-label">12345</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <label class="col-form-label">Nama Supplier</label>
                                                                    </div>
                                                                    <div class="col-xs-1"><label class="col-form-label">:</label>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label class="col-form-label">PT. Permata</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2"></div>
                                                            <div class="col">
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <label class="col-form-label">Tanggal</label>
                                                                    </div>
                                                                    <div class="col-xs-1"><label class="col-form-label">:</label>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label class="col-form-label">27 Maret 2021</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <label class="col-form-label">Alamat</label>
                                                                    </div>
                                                                    <div class="col-xs-1"><label class="col-form-label">:</label>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label class="col-form-label">Jl. Marga Satwa no. 23</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered zero-configuration footer-callback-purchase-order-inventory">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Id Barang</th>
                                                                        <th>Nama Bahan Baku</th>
                                                                        <th>Jumlah</th>
                                                                        <th>Harga</th>
                                                                        <th>Total Harga</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th>1</th>
                                                                        <td>110003</td>
                                                                        <td>Gabah 1KG</td>
                                                                        <td>5</td>
                                                                        <td>Rp.15.000</td>
                                                                        <td>Rp.75.000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>2</th>
                                                                        <td>110004</td>
                                                                        <td>Bibit Tomat 500gr</td>
                                                                        <td>1</td>
                                                                        <td>Rp.15.000</td>
                                                                        <td>Rp.15.000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>3</th>
                                                                        <td>110005</td>
                                                                        <td>Bibit Semangka 500gr</td>
                                                                        <td>3</td>
                                                                        <td>Rp.20.000</td>
                                                                        <td>Rp.60.000</td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th colspan="5" style="text-align:right">Total:</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Large Modal 3 -->
                            <div class="modal fade modal-informasi-3" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Purchase Order 1710012</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card-body">
                                                <div class="basic-form">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="col">
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <label class="col-form-label">No. PO</label>
                                                                    </div>
                                                                    <div class="col-xs-1"><label class="col-form-label">:</label>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label class="col-form-label">1710012</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <label class="col-form-label">Id. Supplier</label>
                                                                    </div>
                                                                    <div class="col-xs-1"><label class="col-form-label">:</label>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label class="col-form-label">12345</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <label class="col-form-label">Nama Supplier</label>
                                                                    </div>
                                                                    <div class="col-xs-1"><label class="col-form-label">:</label>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label class="col-form-label">PT. Permata</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2"></div>
                                                            <div class="col">
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <label class="col-form-label">Tanggal</label>
                                                                    </div>
                                                                    <div class="col-xs-1"><label class="col-form-label">:</label>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label class="col-form-label">31 Maret 2021</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <label class="col-form-label">Alamat</label>
                                                                    </div>
                                                                    <div class="col-xs-1"><label class="col-form-label">:</label>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label class="col-form-label">Jl. Marga Satwa no. 23</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-bordered zero-configuration footer-callback-purchase-order-inventory">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Id Barang</th>
                                                                        <th>Nama Bahan Baku</th>
                                                                        <th>Jumlah</th>
                                                                        <th>Harga</th>
                                                                        <th>Total Harga</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th>1</th>
                                                                        <td>110003</td>
                                                                        <td>Gabah 1KG</td>
                                                                        <td>3</td>
                                                                        <td>Rp.15.000</td>
                                                                        <td>Rp.45.000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>2</th>
                                                                        <td>110004</td>
                                                                        <td>Bibit Tomat 500gr</td>
                                                                        <td>2</td>
                                                                        <td>Rp.15.000</td>
                                                                        <td>Rp.30.000</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>3</th>
                                                                        <td>110005</td>
                                                                        <td>Bibit Semangka 500gr</td>
                                                                        <td>1</td>
                                                                        <td>Rp.20.000</td>
                                                                        <td>Rp.20.000</td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th colspan="5" style="text-align:right">Total:</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                            <!-- <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <th></th>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>Total Tagihan</td>
                                                                        <td>Rp.260.000</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table> -->
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>