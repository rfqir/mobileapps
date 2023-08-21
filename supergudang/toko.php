<div id="desktopTableContainer">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Check Request </p>
                                <a href="#" class="btn btn-success mt-3">Add</a>
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
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Laporan</p>
                                <a href="#" class="btn btn-primary mt-3">Add</a>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fas fa-file-alt text-lg opacity-10" aria-hidden="true"></i>
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Gambar</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Toko</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Item</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SKU Toko</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Quantity</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Requester</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Approval</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $querygudang = mysqli_query($conn, "SELECT nama, image, image_toko, sku_toko, requester, date, picker, quantity_req, type_req, status_req FROM request_id, toko_id, product_toko_id WHERE request_id.id_toko=toko_id.id_product AND toko_id.id_product=product_toko_id.id_product ORDER BY date DESC");
                                $i = 1;
                                while ($list = mysqli_fetch_array($querygudang)) {
                                    $namaFull = $list['nama'];
                                    if (strlen($namaFull) > 10) { // Ubah batas karakter di sini sesuai kebutuhan
                                        $namaShort = substr($namaFull, 0, 10) . '...';
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
                                                <?php if (strlen($namaShort) > 10) : ?>
                                                    <span id="toggler<?= $i; ?>" class="clickable" onclick="toggleNama(<?= $i; ?>)">></span>
                                                <?php endif; ?>
                                            </p>
                                        </td>


                                        <td>
                                            <span class="text-sm font-weight-bold"><?= $list['sku_toko']; ?></span>
                                        </td>
                                        <td>
                                            <span class="text-sm font-weight-bold"><?= $list['quantity_req']; ?></span>
                                        </td>
                                        <td>
                                            <span class="text-sm font-weight-bold"><?= $list['type_req']; ?></span>
                                        </td>
                                        <td>
                                            <span class="text-sm font-weight-bold"><?= $list['date']; ?></span>
                                        </td>
                                        <td>
                                            <span class="text-sm font-weight-bold"><?= $list['requester']; ?></span>
                                        </td>
                                        <td>
                                            <span class="text-sm font-weight-bold"><?= $list['status_req']; ?></span>
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
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <a><i class="fas fa-box text-lg opacity-10" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <a><i class="fas fa-plus text-lg opacity-10" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <a><i class="fas fa-dolly text-lg opacity-10" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row " id="dataContainer">
            <div class="col-md-7 mt-1">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Transaksi Toko</h6>
                    </div>
                    <?php

                    // Ambil parameter offset dari query string
                    $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;

                    // Query untuk mengambil 10 data berdasarkan offset
                    $query = "SELECT * FROM request_id, toko_id, product_toko_id WHERE request_id.id_toko=toko_id.id_toko AND product_toko_id.id_product=toko_id.id_product ORDER BY date DESC LIMIT 10 OFFSET $offset";
                    $result = mysqli_query($conn, $query);

                    // Tampilkan data dalam markup HTML
                    while ($list = mysqli_fetch_array($result)) {
                        $invoice = $list['invoice'];
                        $sku = $list['sku_toko'];
                        $stat = $list['status_req'];
                        $quantity = $list['quantity_req'];
                        $nama = $list['nama'];
                        if (strlen($nama) > 10) { // Ubah batas karakter di sini sesuai kebutuhan
                            $nama = substr($nama, 0, 10) . '...';
                        }
                    ?>

                        <?php
                        if ($list['invoice'] <> '') {
                            echo "<div class='card-body pt-2 p-3'>
                                <ul class='list-group'>
                                    <li class='list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg'>
                                        <div class='d-flex flex-column'>
                                            <h6 class='mb-3 text-sm'>Invoice : $invoice</h6>
                                            <span class='text-xs'>Item Name: <span class='text-dark ms-sm-2 font-weight-bold'>$nama</span></span>
                                            <span class='text-xs'>SKU Toko: <span class='text-dark ms-sm-2 font-weight-bold'>$sku</span></span>
                                            <span class='text-xs'>Status: <span class='text-dark ms-sm-2 font-weight-bold'>$stat</span></span>
                                            <span class='text-xs'>Quantity: <span class='text-dark ms-sm-2 font-weight-bold'>$quantity</span></span>
                                        </div>
                                        <div class='ms-auto text-end'>
                                            <div>
                                                <img src='../assets/img/small-logos/logo-spotify.svg' class='avatar avatar-xl rounded-circle me-auto' alt='spotify'>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>";
                        } else {
                            echo "<div class='card-body pt-2 p-3'>
                                <ul class='list-group'>
                                    <li class='list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg'>
                                        <div class='d-flex flex-column'>
                                            <span class='text-xs'>Item Name: <span class='text-dark ms-sm-2 font-weight-bold'>$nama</span></span>
                                            <span class='text-xs'>SKU Toko: <span class='text-dark ms-sm-2 font-weight-bold'>$sku</span></span>
                                            <span class='text-xs'>Status: <span class='text-dark ms-sm-2 font-weight-bold'>$stat</span></span>
                                            <span class='text-xs'>Quantity: <span class='text-dark ms-sm-2 font-weight-bold'>$quantity</span></span>
                                        </div>
                                        <div class='ms-auto text-end'>
                                            <div>
                                                <img src='../assets/img/small-logos/logo-spotify.svg' class='avatar avatar-xl rounded-circle me-auto' alt='spotify'>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>";
                        }
                        ?>
                    <?php
                    }

                    // Tambahkan link untuk memuat data selanjutnya
                    $nextOffset = $offset + 10;
                    $nextLink = "index.php?url=inventory&offset=$nextOffset";
                    ?>
                    <div class="col-7 text-center">
                        <?php if (mysqli_num_rows($result) == 10) { ?>
                            <a href="<?= $nextLink; ?>" class="btn btn-primary">Load More</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function toggleNama(index) {
        var nama = document.getElementById('nama' + index);
        var toggler = document.getElementById('toggler' + index);

        if (nama.textContent === nama.dataset.short) {
            nama.textContent = nama.dataset.full;
            toggler.textContent = '<';
        } else {
            nama.textContent = nama.dataset.short;
            toggler.textContent = '>';
        }
    }
</script>