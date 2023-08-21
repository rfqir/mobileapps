<div class="row">
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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Item</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SKU Gudang</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Receiver</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Quantity</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Matang</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Receive</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Done</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $querygudang = mysqli_query($conn, "(SELECT id_prepare, image, nama, sku_gudang, requester, receiver, worker, quantity_req, quantity_matang, quantity_reject, date_receiver, date_start, date_finish, status_prepare FROM product_mentah_id, gudang_id, request_prepare WHERE request_prepare.id_product_finish=product_mentah_id.id_product AND product_mentah_id.id_product=gudang_id.id_product ORDER BY date_receiver DESC)
                            UNION ALL
                            (SELECT id_prepare, image, nama, sku_gudang, requester, receiver, worker, quantity_req, quantity_matang, quantity_reject, date_receiver, date_start, date_finish, status_prepare FROM product_mateng_id, mateng_id, request_prepare WHERE request_prepare.id_product_finish=product_mateng_id.id_product AND product_mateng_id.id_product=mateng_id.id_product ORDER BY date_receiver DESC)");
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
                                        <span class="text-sm font-weight-bold"><?= $list['sku_gudang']; ?></span>
                                    </td>
                                    <td>
                                        <span class="text-sm font-weight-bold"><?= $list['receiver']; ?></span>
                                    </td>
                                    <td>
                                        <span class="text-sm font-weight-bold"><?= $list['quantity_req']; ?></span>
                                    </td>
                                    <td>
                                        <span class="text-sm font-weight-bold"><?= $list['quantity_matang']; ?></span>
                                    </td>
                                    <td>
                                        <span class="text-sm font-weight-bold"><?= $list['date_receiver']; ?></span>
                                    </td>
                                    <td>
                                        <span class="text-sm font-weight-bold"><?= $list['date_finish']; ?></span>
                                    </td>
                                    <td>
                                        <span class="text-sm font-weight-bold"><?= $list['status_prepare']; ?></span>
                                    </td>
                                    <td class="align-middle">
                                        <a class="btn btn-link text-secondary mb-0" href="?url=detail&idp=<?= $list['id_prepare']; ?>">
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