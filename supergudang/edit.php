<?php

$idp = $_GET['idp'];

if ($idp > 1999999) {
    $get = mysqli_query($conn, "SELECT * FROM gudang_id, product_mentah_id WHERE gudang_id.id_product=product_mentah_id.id_product AND product_mentah_id.id_product='$idp' GROUP BY nama ASC");
    $list = mysqli_fetch_array($get);
} elseif ($idp < 2000000) {
    $get = mysqli_query($conn, "SELECT * FROM mateng_id, product_mateng_id WHERE mateng_id.id_product=product_mateng_id.id_product AND product_mateng_id.id_product='$idp' GROUP BY nama ASC");
    $list = mysqli_fetch_array($get);
}

?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Item <span style="font-weight: bolder;"><?= $list['nama']; ?></span></p>
                    </div>
                </div>
                <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <p class="text-uppercase text-sm">Item Information</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Image</label>
                                <input class="form-control" name="file" type="file">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Image</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Name Item</label>
                                <input class="form-control" name="nama" type="text" value="<?= $list['nama']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">SKU Gudang</label>
                                <input class="form-control" name="skug" type="text" value="<?= $list['sku_gudang']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Lokasi Gudang</label>
                                <input class="form-control" name="lokasi" type="text" value="<?= $list['lokasi_gudang']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Quantity</label>
                                <input class="form-control" name="quantity" type="text" value="<?= $list['quantity']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Unit</label>
                                <input class="form-control" name="unit" type="text" value="<?= $list['unit']; ?>">
                            </div>
                        </div>
                        <input type="hidden" name="idp" value="<?=$idp;?>">
                        <input type="hidden" name="idg" value="<?=$list['id_gudang'];?>">
                        <div class="text-end">
                            <button class="btn btn-primary" name="edititem">Submit</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>