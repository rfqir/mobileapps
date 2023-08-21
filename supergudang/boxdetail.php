<?php

$idb = $_GET['idb'];

$select = mysqli_query($conn, "SELECT id_delivery, invoice, resi, box, status_box FROM boxorder_id WHERE id_box='$idb'");
$list = mysqli_fetch_array($select);
$box = $list['box'];


?>

<div id="desktopTableContainer">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Insert Quantity</p>
                                <a data-bs-toggle="modal" data-bs-target="#quantityModal" class="btn btn-primary mt-3">Insert</a>
                                <div class="modal fade" id="quantityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Check Box : <?= $list['box']; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="post" action="index.php?url=boxquantity">
                                                <div class="modal-body">
                                                    <table class="table align-items-center justify-content-center mb-0" id="dataModal" width="100%" cellspacing="0">

                                                        <thead>
                                                            <tr>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10">No</th>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10 ps-2">Invoice</th>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10 ps-2">Item Name</th>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10 ps-2">Quantity</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $query = mysqli_query($conn, "SELECT invoice, box, nama, quantity_count, id_item FROM item_id, boxorder_id, product_mentah_id WHERE item_id.id_box=boxorder_id.id_box AND item_id.id_product=product_mentah_id.id_product AND box='$box' AND status_item='Not Approved'");
                                                            $i = 1;
                                                            while ($data = mysqli_fetch_array($query)) {
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0"><?= $i++; ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0"><?= $data['invoice']; ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0"><?= $data['nama']; ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="number" class="form-control" value="<?= $data['quantity_count']; ?>" name="quantity[]">
                                                                        <input type="hidden" value="<?= $data['id_item']; ?>" name="list[]">
                                                                        <input type="hidden" value="<?= $idb; ?>" name="idb">
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="boxquantityitem" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fas fa-calculator text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Box Order : <?= $list['box']; ?></h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0" id="myTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Resi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Invoice</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Item Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Quantity Count</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $querygudang = mysqli_query($conn, "SELECT id_box, quantity_count, status_item, nama FROM product_mentah_id, item_id WHERE product_mentah_id.id_product=item_id.id_product AND id_box='$idb'");
                                $i = 1;
                                while ($listitem = mysqli_fetch_array($querygudang)) {

                                ?>
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0"><?= $i++; ?></p>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2">
                                                <div>
                                                    <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0" style="font-size: 5px;">
                                                <span class="text-xs font-weight-bold"><?= $list['resi']; ?></span>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0" style="font-size: 5px;">
                                                <span class="text-xs font-weight-bold"><?= $list['invoice']; ?></span>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0" style="font-size: 5px;">
                                                <span class="text-xs font-weight-bold"><?= $listitem['nama']; ?></span>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0" style="font-size: 5px;">
                                                <span class="text-xs font-weight-bold"><?= $listitem['quantity_count']; ?></span>
                                            </p>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold"><?= $listitem['status_item']; ?></span>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <!-- Rows for other data -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="mobileCardContainer" class="d-none">
    <div class="col-xl-6">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <a data-bs-toggle="modal" data-bs-target="#quantityModal1"><i class="fas fa-calculator text-lg opacity-10" aria-hidden="true"></i></a>
                                    <div class="modal fade" id="quantityModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Check Box : <?= $list['box']; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post" action="index.php?url=boxquantity">
                                                    <div class="modal-body">
                                                        <div class="card-body pt-2 p-3">
                                                            <ul class="list-group">
                                                                <?php
                                                                $query = mysqli_query($conn, "SELECT invoice, box, nama, quantity_count, id_item FROM item_id, boxorder_id, product_mentah_id WHERE item_id.id_box=boxorder_id.id_box AND item_id.id_product=product_mentah_id.id_product AND box='$box' AND status_item='Not Approved'");
                                                                $i = 1;
                                                                while ($data = mysqli_fetch_array($query)) {
                                                                ?>
                                                                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                                                        <div class="d-flex flex-column">
                                                                            <h6 class="mb-3 text-sm">Invoice : <?= $data['invoice']; ?></h6>
                                                                            <span class="text-xs">Item Name : <span class="text-dark ms-sm-2 font-weight-bold"><?= $data['nama']; ?></span></span>
                                                                            <span class="text-xs">Quantity : <span class="text-dark ms-sm-2 font-weight-bold"><input type="number" class="form-control" value="<?= $data['quantity_count']; ?>" name="quantity[]"></span></span>
                                                                        </div>
                                                                        <div class="ms-auto text-end">
                                                                            <div>
                                                                                <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-xl rounded-circle me-auto" alt="spotify">
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <td>
                                                                        
                                                                        <input type="hidden" value="<?= $data['id_item']; ?>" name="list[]">
                                                                        <input type="hidden" value="<?= $idb; ?>" name="idb">
                                                                    </td>
                                                                <?php
                                                                }
                                                                ?>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="boxquantityitem" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
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
        <div class="row" id="dataContainer">
            <div class="col-md-7 mt-1">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Box Order : <?= $list['box']; ?></h6>
                    </div>
                    <?php

                    // Ambil parameter offset dari query string
                    $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;

                    // Query untuk mengambil 10 data berdasarkan offset
                    $query = "SELECT id_box, quantity_count, status_item, nama FROM product_mentah_id, item_id WHERE product_mentah_id.id_product=item_id.id_product AND id_box='$idb' LIMIT 10 OFFSET $offset";
                    $result = mysqli_query($conn, $query);

                    // Tampilkan data dalam markup HTML
                    while ($listbox = mysqli_fetch_array($result)) {

                    ?>
                        <div class="card-body pt-2 p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">Invoice : <?= $list['invoice']; ?></h6>
                                        <span class="text-xs">Resi : <span class="text-dark ms-sm-2 font-weight-bold"><?= $list['resi']; ?></span></span>
                                        <span class="text-xs">Item Name : <span class="text-dark ms-sm-2 font-weight-bold"><?= $listbox['nama']; ?></span></span>
                                        <span class="text-xs">Quantity Count : <span class="text-dark ms-sm-2 font-weight-bold"><?= $listbox['quantity_count']; ?></span></span>
                                        <span class="text-xs">Status : <span class="text-dark ms-sm-2 font-weight-bold"><?= $listbox['status_item']; ?></span></span>
                                    </div>
                                    <div class="ms-auto text-end">
                                        <div>
                                            <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-xl rounded-circle me-auto" alt="spotify">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    <?php
                    }

                    // Tambahkan link untuk memuat data selanjutnya
                    $nextOffset = $offset + 10;
                    $nextLink = "index.php?url=inventory&offset=$nextOffset";
                    ?>
                    <div class="col-12 text-center">
                        <?php if (mysqli_num_rows($result) == 10) { ?>
                            <a href="<?= $nextLink; ?>" class="btn btn-primary">Load More</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>