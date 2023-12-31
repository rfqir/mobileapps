<div id="desktopTableContainer">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Product Toko</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0" id="myTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gambar</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Item</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SKU Toko</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $querygudang = mysqli_query($conn, "SELECT product_toko_id.id_product AS idp, nama, image, jenis, sku_toko, id_toko AS idt FROM product_toko_id, toko_id WHERE toko_id.id_product = product_toko_id.id_product AND sku_toko<>'-'");
                                $i = 1;
                                while ($list = mysqli_fetch_array($querygudang)) {
                                    $namaFull = $list['nama'];
                                    if (strlen($namaFull) > 10) { // Ubah batas karakter di sini sesuai kebutuhan
                                        $namaShort = substr($namaFull, 0, 40) . '...';
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
                                                <?php if (strlen($namaShort) > 10) : ?>
                                                    <span id="toggler<?= $i; ?>" class="clickable" onclick="toggleNama(<?= $i; ?>)">></span>
                                                <?php endif; ?>
                                            </p>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold"><?= $list['sku_toko']; ?></span>
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
        <div class="row " id="dataContainer">
            <?php

            // Ambil parameter offset dari query string
            $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;

            // Query untuk mengambil 10 data berdasarkan offset
            $query = "SELECT product_toko_id.id_product AS idp, nama, image, jenis, sku_toko, id_toko AS idt FROM product_toko_id, toko_id WHERE toko_id.id_product = product_toko_id.id_product AND sku_toko<>'-' LIMIT 10 OFFSET $offset";
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
                            <hr class="horizontal dark my-3">
                            <a type="button" class="btn btn-primary" href="index.php?url=edit">
                                <h5 class="mb-0"><?= $list['sku_toko']; ?></h5>
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