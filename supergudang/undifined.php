<div id="desktopTableContainer">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Undefined Product</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-hover table-bordered" id="myTable" width="100%" cellspacing="0">

                            <thead>

                                <tr>

                                    <th>No</th>

                                    <th>Image</th>

                                    <th>Name Item</th>
                                    <th>Quantity</th>

                                    <th>SKU Warehouse</th>
                                    <th>Status</th>
                                </tr>

                            </thead>





                            <tbody>
                                <?php
                                $select = mysqli_query($conn, "SELECT gudang_id.id_product, product_mentah_id.image, product_mentah_id.nama, gudang_id.unit, sku_gudang, product_mentah_id.jenis, quantity, lokasi_gudang, id_gudang AS idg, product_mentah_id.id_product AS idp FROM gudang_id, product_mentah_id WHERE gudang_id.id_product=product_mentah_id.id_product GROUP BY sku_gudang ASC ORDER BY quantity DESC");

                                $i = 1;

                                while ($data = mysqli_fetch_array($select)) {
                                    $idp = $data['id_product'];
                                    $gambar = $data['image'];
                                    $showRow = true; // Flag to determine whether to show the row

                                    //cek data gambar ada apa kagak
                                    if ($gambar == null) {
                                        $img = '<img src="../assets/img/noimageavailable.png" class="zoomable">';
                                    } else {
                                        $img = '<img src="../assets/img/' . $gambar . '" class="zoomable">';
                                    }

                                    $selectkomp = mysqli_query($conn, "SELECT id_komponen FROM list_komponen WHERE id_komponen='$idp'");
                                    $hitung = mysqli_num_rows($selectkomp);

                                    // Check if the data should be shown
                                    if ($hitung > 0) {
                                        $showRow = false;
                                    }

                                    // Only display the row if $showRow is true
                                    if ($showRow) {
                                ?>
                                        <tr data-bs-toggle="modal" data-bs-target="#largeModal">
                                            <th><?= $i++; ?></th>
                                            <td><?= $img; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['quantity']; ?></td>
                                            <td class="text-uppercase"><?= $data['sku_gudang']; ?></td>
                                            <td style="color: purple;"><?= $hitung > 0 ? '' : 'Undefinied'; ?></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
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
                                $select = mysqli_query($conn, "SELECT gudang_id.id_product, product_mentah_id.image, product_mentah_id.nama, gudang_id.unit, sku_gudang, product_mentah_id.jenis, quantity, lokasi_gudang, id_gudang AS idg, product_mentah_id.id_product AS idp FROM gudang_id, product_mentah_id WHERE gudang_id.id_product=product_mentah_id.id_product GROUP BY sku_gudang ASC ORDER BY quantity DESC");

                                $i = 1;

                                while ($data = mysqli_fetch_array($select)) {
                                    $idp = $data['id_product'];
                                    $gambar = $data['image'];
                                    $showRow = true; // Flag to determine whether to show the row

                                    //cek data gambar ada apa kagak
                                    if ($gambar == null) {
                                        $img = '<img src="../assets/img/noimageavailable.png" class="zoomable">';
                                    } else {
                                        $img = '<img src="../assets/img/' . $gambar . '" class="zoomable">';
                                    }

                                    $selectkomp = mysqli_query($conn, "SELECT id_komponen FROM list_komponen WHERE id_komponen='$idp'");
                                    $hitung = mysqli_num_rows($selectkomp);

                                    // Check if the data should be shown
                                    if ($hitung > 0) {
                                        $showRow = false;
                                    }

                                    // Only display the row if $showRow is true
                                    if ($showRow) {
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
                            <span class="text-xs"><?= $data['quantity']; ?></span>
                            <hr class="horizontal dark my-3">
                            <a class="btn btn-primary edit-link" data-id="<?= $data['id_product']; ?>" href="index.php?url=edit">
                                <h5 class="mb-0"><?= $data['sku_gudang']; ?></h5>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
                }
            }

            // Tambahkan link untuk memuat data selanjutnya
            ?>

        </div>
    </div>
</div>