<div id="desktopTableContainer">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Check Box</p>
                                <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success mt-3">Check</a>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Check Box</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="post" action="index.php?url=boxquantity">
                                                <div class="modal-body">
                                                    <table class="table align-items-center justify-content-center mb-0" id="dataModal" width="100%" cellspacing="0">

                                                        <thead>
                                                            <tr>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10">No</th>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10 ps-2">Resi</th>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10 ps-2">Invoice</th>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10 ps-2">Box</th>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10 ps-2">Checklist</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $box = mysqli_query($conn, "SELECT id_box, resi, invoice, box FROM boxorder_id WHERE status_box='Not Approved'");
                                                            $i = 1;
                                                            while ($data = mysqli_fetch_array($box)) {
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0"><?= $i++; ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0"><?= $data['resi']; ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0"><?= $data['invoice']; ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0"><?= $data['box']; ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <input type="checkbox" class="form-check-label" value="<?= $data['id_box']; ?>" name="cekboxcount[]">
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="fas fa-clipboard-check text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Item Pending</p>
                                <a data-bs-toggle="modal" data-bs-target="#quantityModal" class="btn btn-warning mt-3">Check</a>
                                <div class="modal fade" id="quantityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Select Item Pending</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="post">
                                                <div class="modal-body">
                                                    <table class="table align-items-center justify-content-center mb-0" id="dataModal" width="100%" cellspacing="0">

                                                        <thead>
                                                            <tr>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10">No</th>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10 ps-1">Image</th>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10 ps-2">Item Name</th>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10 ps-2">Quantity</th>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10 ps-2">>>></th>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10 ps-2">SKU Gudang</th>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10 ps-2">Quantity</th>
                                                                <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-10 ps-2">Gudang</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $box = mysqli_query($conn, "SELECT  id_item, nama, image, quantity_count, unit, product_mentah_id.id_product AS idp FROM product_mentah_id, item_id WHERE item_id.id_product = product_mentah_id.id_product AND quantity_count<>0 AND status_item='Approved'");
                                                            $i = 1;
                                                            while ($data = mysqli_fetch_array($box)) {
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0"><?= $i++; ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex px-0">
                                                                            <div>
                                                                                <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0"><?= $data['nama']; ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0"><?= $data['quantity_count']; ?> <?= $data['unit']; ?></p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0">>>></p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0">
                                                                            <input type="text" class="form-control" name="skug[]">
                                                                        </p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0">
                                                                            <input type="text" class="form-control" name="quantity[]" value="0" maxlength="<?= $data['quantity_count']; ?>">
                                                                        </p>
                                                                    </td>
                                                                    <td>
                                                                        <p class="text-sm font-weight-bold mb-0">
                                                                            <input type="number" class="form-control" name="gudang[]">
                                                                            <input type="hidden" value="<?= $data['idp']; ?>" name="idp[]">
                                                                            <input type="hidden" value="<?= $data['unit']; ?>" name="unit[]">
                                                                            <input type="hidden" value="<?= $data['id_item']; ?>" name="idi[]">
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="boxselectitem" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="fas fa-exclamation text-lg opacity-10" aria-hidden="true"></i>
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
                    <h6>Box Order</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0" id="myTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Resi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Invoice</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Box</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $querygudang = mysqli_query($conn, "SELECT id_box, invoice, resi, box, status_box FROM boxorder_id GROUP BY invoice ASC");
                                $i = 1;
                                while ($list = mysqli_fetch_array($querygudang)) {
                                    $idbox = $list['id_box'];

                                ?>
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0"><?= $i++; ?></p>
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
                                                <span class="text-xs font-weight-bold"><?= $list['box']; ?></span>
                                            </p>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold"><?= $list['status_box']; ?></span>
                                        </td>
                                        <?php
                                        if ($list['status_box'] == 'Not Approved') {
                                            echo "<td class='align-middle'>
                                            </td>";
                                        } else {
                                            echo "<td class='align-middle'>
                                                <a class='btn btn-link text-secondary mb-0' href='index.php?url=boxdetail&idb=$idbox'>
                                                    <i class='fa fa-ellipsis-v text-xs'></i>
                                                </a>
                                            </td>";
                                        }
                                        ?>

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
<?php
// Check if a specific link is clicked
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Handle the box link click
    if ($action === 'box') {
        // Add your logic here for the box link click event
        // For example:
        header('location:?url=index.php');
    }

    // Handle the add item link click
    if ($action === 'add_item') {
        // Add your logic here for the add item link click event
        // For example:
        echo "Add item link clicked";
    }

    // Handle the mutasi link click
    if ($action === 'mutasi') {
        // Add your logic here for the mutasi link click event
        // For example:
        echo "Mutasi link clicked";
    }
    if ($action === 'Edit') {
        // Add your logic here for the mutasi link click event
        // For example:
        echo "Edit Php";
    }

    // Redirect back to the main page
    header("Location: index.php");
    exit();
}
?>
<div id="mobileCardContainer" class="d-none">
    <div class="col-xl-6">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fas fa-clipboard-check text-lg opacity-10" aria-hidden="true"></i></a>
                                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Check Box</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form id="myForm" method="post" action="index.php?url=boxquantity">
                                                    <div class="modal-body">
                                                        <?php
                                                        $box = mysqli_query($conn, "SELECT id_box, resi, invoice, box, status_box FROM boxorder_id WHERE status_box='Not Approved'");
                                                        $i = 1;
                                                        while ($data = mysqli_fetch_array($box)) {
                                                        ?>
                                                            <ul class="list-group">
                                                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                                                    <div class="d-flex flex-column text-start">
                                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Invoice : <?= $data['invoice']; ?></h6>
                                                                        <span class="text-xs">Resi : <?= $data['resi']; ?></span>
                                                                        <span class="text-xs">Box : <?= $data['box']; ?></span>
                                                                        <span class="text-xs">Status : <?= $data['status_box']; ?></span>
                                                                    </div>
                                                                    <div class='ms-auto text-end'>
                                                                        <input type="checkbox" class="form-check-input checkbox-input" value="<?= $data['id_box']; ?>" name="cekboxcount[]">
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" onclick="handleFormSubmit()">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <a data-bs-toggle="modal" data-bs-target="#quantityModal1"><i class="fas fa-exclamation text-lg opacity-10" aria-hidden="true"></i></a>
                                    <div class="modal fade" id="quantityModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Select Item Pending</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <ul class="list-group">
                                                            <?php
                                                            $box = mysqli_query($conn, "SELECT  id_item, nama, image, quantity_count, unit, product_mentah_id.id_product AS idp FROM product_mentah_id, item_id WHERE item_id.id_product = product_mentah_id.id_product AND quantity_count<>0 AND status_item='Approved'");
                                                            $i = 1;
                                                            while ($data = mysqli_fetch_array($box)) {
                                                            ?>
                                                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                                    <div class="d-flex flex-column">
                                                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Resi : <?= $data['resi']; ?></h6>
                                                                        <span class="text-xs">Invoice : <?= $data['invoice']; ?></span>
                                                                        <span class="text-xs">Box : <?= $data['box']; ?></span>
                                                                        <span class="text-xs">Cheklist : <input type="checkbox" class="form-check-label" value="<?= $data['id_box']; ?>" name="cekboxcount[]"></span>
                                                                    </div>
                                                                </li>
                                                            <?php
                                                            }
                                                            ?>

                                                        </ul>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="boxselectitem" class="btn btn-primary">Submit</button>
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
        <?php
        // Check if a specific link is clicked
        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            // Handle the box link click
            if ($action === 'boxdetail') {
                // Add your logic here for the box link click event
                // For example:
                echo "Box List clicked";
            }

            // Redirect back to the main page
            header("Location: index.php");
            exit();
        }
        ?>
        <div class="row" id="dataContainer">
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Box Order</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-0">
                        <ul class="list-group">
                            <?php

                            // Ambil parameter offset dari query string
                            $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;

                            // Query untuk mengambil 10 data berdasarkan offset
                            $query = "SELECT id_box, invoice, resi, box, status_box FROM boxorder_id GROUP BY invoice ASC LIMIT 10 OFFSET $offset";
                            $result = mysqli_query($conn, $query);

                            // Tampilkan data dalam markup HTML
                            while ($list = mysqli_fetch_array($result)) {

                            ?>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Invoice : <?= $list['invoice']; ?></h6>
                                        <span class="text-xs">Resi : <?= $list['resi']; ?></span>
                                        <span class="text-xs">Box : <?= $list['box']; ?></span>
                                        <span class="text-xs">Status : <?= $list['status_box']; ?></span>
                                    </div>
                                    <div class="d-flex align-items-center text-sm">
                                        <a href="index.php?action=boxdetail" data-id="<?= $list['id_box']; ?>" id="detailBoxLink" class="btn btn-link text-primary text-sm mb-0 px-0 ms-4 box-detail">Detail</a>
                                    </div>
                                </li>
                            <?php
                            }

                            // Tambahkan link untuk memuat data selanjutnya
                            $nextOffset = $offset + 10;
                            $nextLink = "index.php?url=inventory&offset=$nextOffset";
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                <?php if (mysqli_num_rows($result) == 10) { ?>
                    <a href="<?= $nextLink; ?>" class="btn btn-primary">Load More</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
    function handleFormSubmit() {
        var checkboxes = document.getElementsByName('cekboxcount[]');
        var selectedCheckboxes = [];

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                selectedCheckboxes.push(checkboxes[i].value);
            }
        }

        // Create a hidden input field dynamically to send the selected checkboxes
        var hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'selectedCheckboxes';
        hiddenInput.value = selectedCheckboxes.join(',');

        // Append the hidden input field to the form
        var form = document.getElementById('myForm');
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>