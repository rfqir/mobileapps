<?php

$idp = $_GET['idp'];

if ($idp > 1999999) {
    $get = mysqli_query($conn, "SELECT * FROM gudang_id, product_mentah_id, request_prepare WHERE request_prepare.id_product_finish=product_mentah_id.id_product AND gudang_id.id_product=product_mentah_id.id_product AND id_prepare='$idp' GROUP BY nama ASC");
    $list = mysqli_fetch_array($get);
} elseif ($idp < 2000000) {
    $get = mysqli_query($conn, "SELECT * FROM mateng_id, product_mateng_id, request_prepare WHERE request_prepare.id_product_finish=product_mateng_id.id_product AND mateng_id.id_product=product_mateng_id.id_product AND id_prepare='$idp' GROUP BY nama ASC");
    $list = mysqli_fetch_array($get);
}

?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <p class="mb-0">Item Transaksi <span style="font-weight: bolder;"><?= $list['nama']; ?></span></p>
                </div>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <p class="text-uppercase text-sm">Transaksi Information</p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Name Item</label>
                                <input class="form-control" readonly name="nama" type="text" value="<?= $list['nama']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">SKU Gudang</label>
                                <input class="form-control" readonly name="skug" type="text" value="<?= $list['sku_gudang']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Quantity Persediaan</label>
                                <input class="form-control" readonly name="quantity" type="text" value="<?= $list['quantity']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Quantity Request</label>
                                <input class="form-control" readonly name="nama" type="text" value="<?= $list['quantity_req']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Quantity Mateng</label>
                                <input class="form-control" readonly name="skug" type="text" value="<?= $list['quantity_matang']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Quantity Reject</label>
                                <input class="form-control" readonly name="quantity" type="text" value="<?= $list['quantity_reject']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Requester</label>
                                <input class="form-control" readonly name="nama" type="text" value="<?= $list['requester']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Receiver</label>
                                <input class="form-control" readonly name="skug" type="text" value="<?= $list['receiver']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Worker</label>
                                <input class="form-control" readonly name="quantity" type="text" value="<?= $list['worker']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Time Receive</label>
                                <input class="form-control" readonly name="nama" type="text" value="<?= $list['date_receiver']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Time Start</label>
                                <input class="form-control" readonly name="skug" type="text" value="<?= $list['date_start']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Time Finish</label>
                                <input class="form-control" readonly name="quantity" type="text" value="<?= $list['date_finish']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Type Request</label>
                                <input class="form-control" readonly name="skug" type="text" value="<?= $list['type_req']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Status Request</label>
                                <input class="form-control" readonly name="quantity" type="text" value="<?= $list['status_prepare']; ?>">
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="index.php?url=preparation" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>