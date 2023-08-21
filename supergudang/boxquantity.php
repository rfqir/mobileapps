    <div class="row mt-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Input Box</h6>
                </div>
                <form method="post">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Resi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Invoice</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Box</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $resi = $_POST['cekboxcount'];
                                $hitung = count($resi);
                                $k = 1;

                                for ($i = 0; $i < $hitung; $i++) {
                                    $query = mysqli_query($conn, "SELECT * FROM boxorder_id WHERE id_box='$resi[$i]'");
                                    $list = mysqli_fetch_array($query);

                                ?>
                                    <tr>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0" style="font-size: 5px;">
                                                <span class="text-xs font-weight-bold"><?= $k++; ?></span>
                                            </p>
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
                                                <input type="hidden" name="idb[]" value="<?= $list['id_box']; ?>">
                                            </p>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <!-- Rows for other data -->
                            </tbody>
                            <br>
                            <tfoot>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pengiriman</th>
                                <td></td>
                                <td></td>
                                <td><input type="text" class="form-control" name="pengiriman" require></td>

                                </tr>
                            </tfoot>
                            <tfoot>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Quantity Box Total</th>
                                <td></td>
                                <td></td>
                                <td><input type="text" pattern="[0-9.]*" class="form-control" name="totalbox" require></td>

                                </tr>
                            </tfoot>
                            <tfoot>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kubikasi Box Total</th>
                                <td></td>
                                <td></td>
                                <td class="form-group col-md-3"><input type="text" class="form-control" pattern="[0-9.]*" name="totalkubik" require></td>

                                </tr>
                            </tfoot>
                        </table>
                        <div class="text-end m-4">
                            <button type="submit" name="boxbutton" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                </form>
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