<div id="desktopTableContainer">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Add From Box </p>
                                <a href="?url=box" class="btn btn-success mt-3">Add</a>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="fas fa-box text-lg opacity-10" aria-hidden="true"></i>
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
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Add New Item</p>
                                <a href="#" class="btn btn-primary mt-3">Add</a>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fa fa-plus text-lg opacity-10" aria-hidden="true"></i>
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
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Mutasi SKU</p>
                                <a href="index.php" class="btn btn-danger mt-3">Mutasi</a>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="fas fa-dolly text-lg opacity-10" aria-hidden="true"></i>
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
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Laporan Stok</p>
                                <a href="#" class="btn btn-secondary mt-3">Download</a>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-secondary shadow-secondary text-center rounded-circle">
                                <i class="fas fa-download text-lg opacity-10" aria-hidden="true"></i>
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
                    <h6>Gudang Mentah</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0" id="myTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gambar</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Item</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SKU Gudang</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gudang</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Quantity</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $querygudang = mysqli_query($conn, "SELECT * FROM gudang_id, product_mentah_id WHERE gudang_id.id_product=product_mentah_id.id_product ORDER BY sku_gudang ASC");
                                $i = 1;
                                while ($list = mysqli_fetch_array($querygudang)) {
                                    $namaFull = $list['nama'];
                                    if (strlen($namaFull) > 40) { // Ubah batas karakter di sini sesuai kebutuhan
                                        $namaShort = substr($namaFull, 0, 40) . '...';
                                    } else { // Ubah batas karakter di sini sesuai kebutuhan
                                        $namaShort = substr($namaFull, 0, 40) . '';
                                    }
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
                                                <span id="nama<?= $i; ?>" data-short="<?= $namaShort; ?>" data-full="<?= $namaFull; ?>">
                                                    <?= $namaShort; ?>
                                                </span>
                                                <?php if (strlen($namaShort) > 40) : ?>
                                                    <span style="cursor: pointer;" id="toggler<?= $i; ?>" class="clickable" onclick="toggleNama(<?= $i; ?>)">></span>
                                                <?php endif; ?>
                                            </p>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold"><?= $list['sku_gudang']; ?></span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold"><?= $list['lokasi_gudang']; ?></span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold"><?= $list['quantity']; ?><?= $list['unit']; ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <a class="btn btn-link text-secondary mb-0" href="index.php?url=edit&idp=<?= $list['id_product']; ?>">
                                                <i class="fa fa-ellipsis-v text-xs"></i>
                                            </a>
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
<?php
// Check if a specific link is clicked
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    // Handle the box link click
    if ($action === 'box') {
        // Add your logic here for the box link click event
        // For example:
        echo "Box List clicked";
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
                                    <a href="index.php?action=box" id="boxLink"><i class="fas fa-box text-lg opacity-10" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <a href="index.php?action=newitem" id="newItemLink"><i class="fas fa-plus text-lg opacity-10" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <a href="index.php?action=mutasi" id="mutasiLink"><i class="fas fa-dolly text-lg opacity-10" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="dataContainer">
            <?php

            // Ambil parameter offset dari query string
            $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;

            // Query untuk mengambil 10 data berdasarkan offset
            $query = "SELECT * FROM gudang_id, product_mentah_id WHERE gudang_id.id_product=product_mentah_id.id_product GROUP BY sku_gudang ASC LIMIT 10 OFFSET $offset";
            $result = mysqli_query($conn, $query);

            // Tampilkan data dalam markup HTML
            while ($list = mysqli_fetch_array($result)) {
                $nama = $list['nama'];
                if (strlen($nama) > 10) { // Ubah batas karakter di sini sesuai kebutuhan
                    $nama = substr($nama, 0, 10) . '...';
                }
            ?>
                <div class="col-6 mb-2">
                    <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                            </div>
                        </div>
                        <div class="card-body pt-0 p-3 text-center">
                            <h6 class="text-center mb-0"><?= $nama; ?></h6>
                            <span class="text-xs"><?= $list['quantity']; ?><?= $list['unit']; ?></span>
                            <hr class="horizontal dark my-3">
                            <a class="btn btn-primary edit-link" data-id="<?= $list['id_product']; ?>" href="index.php?url=edit">
                                <h5 class="mb-0"><?= $list['sku_gudang']; ?></h5>
                            </a>
                        </div>
                    </div>
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