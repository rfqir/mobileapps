<div id="desktopTableContainer">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">New Mutasi</p>
                                <a href="#" class="btn btn-primary mt-3">Add</a>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fas fa-plus text-lg opacity-10" aria-hidden="true"></i>
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
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Mutasi Approve</p>
                                <a href="#" class="btn btn-success mt-3">Approve</a>
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
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Mutasi SKU Item</h6>
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">>>>>></th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SKU Gudang</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gudang</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Quantity</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $querygudang = mysqli_query($conn, "(SELECT * FROM mutasi_id, gudang_id, product_mentah_id WHERE mutasi_id.id_gudang=gudang_id.id_gudang AND gudang_id.id_product=product_mentah_id.id_product AND mutasi_id.jenis='mentah' ORDER BY datetime DESC)
                                UNION ALL
                                (SELECT * FROM mutasi_id, mateng_id, product_mateng_id WHERE mutasi_id.id_gudang=mateng_id.id_gudang AND mateng_id.id_product=product_mateng_id.id_product AND mutasi_id.jenis='mateng' ORDER BY datetime DESC)");
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
                                            <span class="text-xs font-weight-bold"><?= $list['skug_lama']; ?></span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">>>>>></span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold"><?= $list['skug_baru']; ?></span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold"><?= $list['lokasi_mutasi']; ?></span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold"><?= $list['quantity_out']; ?><?= $list['unit']; ?></span>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold"><?= $list['jenis']; ?></span>
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
                            <h5 class="mb-0"><?= $list['sku_gudang']; ?></h5>
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


<script>
    // JavaScript code

    // Function to initialize the DataTable
    function initializeDataTable() {
        const dataTable = $('#myTable').DataTable({
            // Add your DataTable initialization options here
        });
    }

    // Function to handle card clicks
    function handleCardClick(event) {
        event.preventDefault();
        // Add your logic here for card click event
    }

    // Check the viewport width and show/hide elements based on screen size
    function updateLayout() {
        const desktopTableContainer = document.getElementById('desktopTableContainer');
        const mobileCardContainer = document.getElementById('mobileCardContainer');

        if (window.innerWidth < 1024 && window.innerHeight < 768) {
            desktopTableContainer.style.display = 'none';
            mobileCardContainer.classList.remove('d-none');
            mobileCardContainer.classList.add('block');

            // Get all the card elements
            const cards = document.querySelectorAll('#mobileCardContainer .card');

            // Attach click event listeners to each card
            cards.forEach(function(card) {
                card.addEventListener('click', handleCardClick);
            });
        } else {
            desktopTableContainer.style.display = 'block';
            mobileCardContainer.classList.remove('block');
            mobileCardContainer.classList.add('d-none');

            // Call the initializeDataTable function
            initializeDataTable();
        }
    }

    // Initial layout update on page load
    updateLayout();

    // Listen for window resize events and update layout accordingly
    window.addEventListener('resize', updateLayout);
</script>
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