<?php

$conn = mysqli_connect("localhost", "root", "", "mirorim");

//Input Delivery &  Quantity Box
if (isset($_POST['boxbutton'])) {
    $quantity = $_POST['totalbox'];
    $kubik = $_POST['totalkubik'];
    $pengiriman = $_POST['pengiriman'];
    $idb = $_POST['idb'];

    $jum = count($idb);
    $insert = mysqli_query($conn, "INSERT INTO delivery_id(box_total, kubik_total, pengiriman) VALUES('$quantity','$kubik','$pengiriman')");
    for ($i = 0; $i < $jum; $i++) {

        $select = mysqli_query($conn, "SELECT id_delivery FROM delivery_id WHERE date = (SELECT MAX(date) FROM delivery_id)");
        $data = mysqli_fetch_array($select);
        $idd = $data['id_delivery'];

        if ($select) {
            $update = mysqli_query($conn, "UPDATE boxorder_id SET id_delivery='$idd' WHERE id_box='$idb[$i]'");
            header('location:?url=box');
        } else {
        }
    } {
    }
}

//Input Quantity Item Box
if (isset($_POST['boxquantityitem'])) {
    $quantity = $_POST['quantity'];
    $idb = $_POST['idb'];
    $list = $_POST['list'];
    $jum = count($list);

    for ($i = 0; $i < $jum; $i++) {
        if ($quantity[$i] == '0') {
        } else {
            $update = mysqli_query($conn, "UPDATE item_id SET quantity_count='$quantity[$i]' WHERE id_item='$list[$i]'");
            header('location:?url=boxdetail&idb=' . $idb);
        }
    } {
    }
}

//Input Quantity Item Ke Gudang
if (isset($_POST['boxselectitem'])) {
    $idp = $_POST['idp'];
    $skug = $_POST['skug'];
    $quantity = $_POST['quantity'];
    $unit = $_POST['unit'];
    $gudang = $_POST['gudang'];
    $idi = $_POST['idi'];

    $count = count($idi);

    for ($i = 0; $i < $count; $i++) {

        $selectskug = mysqli_query($conn, "SELECT sku_gudang, id_product FROM gudang_id WHERE sku_gudang='$skug[$i]'");
        $list = mysqli_fetch_array($selectskug);
        $idproduct = $list['id_product'];
        $sku = mysqli_num_rows($selectskug);

        if ($quantity[$i] == '0') {
            
        } else {

            if ($sku == '0') {
                $insert = mysqli_query($conn, "INSERT INTO gudang_id(id_product, sku_gudang, lokasi_gudang, quantity, unit) VALUES('$idp[$i]','$skug[$i]','$gudang[$i]','$quantity[$i]','$unit[$i]')");
                if ($insert) {
                    $select = mysqli_query($conn, "SELECT quantity_count FROM item_id WHERE id_product='$idp[$i]'");
                    $data = mysqli_fetch_array($select);
                    $quantityitem = $data['quantity_count'];
                    $kurang = $quantityitem - $quantity[$i];
                    if ($quantity[$i] > $quantityitem) {
                        echo '
                    <script>
                        alert("Quantity Melebihi");
                        window.location.href="?url=box";
                    </script>';
                    } else {
                        $update = mysqli_query($conn, "UPDATE item_id SET quantity_count='$kurang' WHERE id_product='$idp[$i]'");
                        header('location:?url=inventory');
                    }
                } else {
                }
            } else {
                if ($idproduct == $idp[$i]) {
                    $ambilqty = mysqli_query($conn, "SELECT quantity FROM gudang_id WHERE sku_gudang='$skug[$i]'");
                    $data = mysqli_fetch_array($ambilqty);
                    $qty = $data['quantity'];

                    $tambah  = $qty + $quantity[$i];
                    if ($ambilqty) {
                        $update = mysqli_query($conn, "UPDATE gudang_id SET quantity='$tambah' WHERE sku_gudang='$skug[$i]'");
                        if ($update) {
                            $select = mysqli_query($conn, "SELECT * FROM item_id WHERE id_product='$idp[$i]'");
                            $data = mysqli_fetch_array($select);
                            $quantityitem = $data['quantity_count'];

                            $kurang = $quantityitem - $quantity[$i];
                            if ($select) {
                                $update = mysqli_query($conn, "UPDATE item_id SET quantity_count='$kurang' WHERE id_product='$idp[$i]'");
                                header('location:?url=inventory');
                            } else {
                            }
                        } else {
                        }
                    } else {
                    }
                } else {
                    echo '
                    <script>
                        alert("Barang Tidak Sama");
                        window.location.href="?url=box";
                    </script>';
                }
            }
        }
    } {
    }
}

if (isset($_POST['edititem'])) {
    $nama = $_POST['nama'];
    $skug = $_POST['skug'];
    $quantity = $_POST['quantity'];
    $lokasi = $_POST['lokasi'];
    $unit = $_POST['unit'];
    $idp = $_POST['idp'];
    $idg = $_POST['idg'];

    //gambar

    $allowed_extension = array('png', 'jpg', 'jpeg', 'svg', 'webp');

    $namaimage = $_FILES['file']['name']; //ambil gambar

    $dot = explode('.', $namaimage);

    $ekstensi = strtolower(end($dot)); //ambil ekstensi

    $ukuran = $_FILES['file']['size']; //ambil size

    $file_tmp = $_FILES['file']['tmp_name']; //lokasi



    //nama acak

    $image = md5(uniqid($namaimage, true) . time()) . '.' . $ekstensi; //compile


    if ($idp > 1999999) {

        if ($ukuran == 0) {

            $update = mysqli_query($conn, "UPDATE product_mentah_id SET nama='$nama' WHERE id_product='$idp'");

            if ($update) {

                $select = mysqli_query($conn, "SELECT sku_gudang FROM gudang_id WHERE sku_gudang='$skug'");

                $hitung = mysqli_num_rows($select);
                if ($hitung > 1 && $skug !== '--') {
                    echo '

            <script>

                alert("SKU Gudang Telah ada");

                window.location.href="?url=inventory";

            </script>';
                } else {
                    $update2 = mysqli_query($conn, "UPDATE gudang_id SET sku_gudang='$skug', lokasi_gudang='$lokasi', quantity='$quantity' WHERE id_gudang='$idg'");

                    header('location:?url=inventory');
                }
            } else {

                echo '

            <script>

                alert("Barang Tidak bisa di update");

                window.location.href="?url=inventory";

            </script>';
            }
        } else {

            move_uploaded_file($file_tmp, '../assets/img/' . $image);

            $update = mysqli_query($conn, "UPDATE product_mentah_id SET nama='$nama', image='$image' WHERE id_product='$idp'");

            if ($update) {


                $select = mysqli_query($conn, "SELECT sku_gudang FROM gudang_id WHERE sku_gudang='$skug'");
                $hitung = mysqli_num_rows($select);
                if ($hitung > 1 && $skug !== '--') {
                    header('location:?url=inventory');
                } else {
                    $update2 = mysqli_query($conn, "UPDATE gudang_id SET sku_gudang='$skug', lokasi_gudang='$gudang', quantity='$quantity' WHERE id_gudang='$idg'");

                    header('location:?url=inventory');
                }
            } else {

                echo '

            <script>

                alert("Barang dan Gambar Tidak bisa di update");

                window.location.href="?url=inventory";

            </script>';
            }
        }
    } else {
        if ($ukuran == 0) {

            $update = mysqli_query($conn, "UPDATE product_mateng_id SET nama='$nama' WHERE id_product='$idp'");

            if ($update) {

                $select = mysqli_query($conn, "SELECT sku_gudang FROM mateng_id WHERE sku_gudang='$skug'");

                $hitung = mysqli_num_rows($select);
                if ($hitung > 1 && $skug !== '--') {
                    echo '

        <script>

            alert("SKU Gudang Telah ada");

            window.location.href="?url=inventory5";

        </script>';
                } else {
                    $update2 = mysqli_query($conn, "UPDATE mateng_id SET sku_gudang='$skug', lokasi_gudang='$gudang', quantity='$quantity' WHERE id_gudang='$idg'");

                    header('location:?url=inventory5');
                }
            } else {

                echo '

        <script>

            alert("Barang Tidak bisa di update");

            window.location.href="?url=inventory5";

        </script>';
            }
        } else {

            move_uploaded_file($file_tmp, '../assets/img/' . $image);

            $update = mysqli_query($conn, "UPDATE product_mateng_id SET nama='$nama', image='$image' WHERE id_product='$idp'");

            if ($update) {


                $select = mysqli_query($conn, "SELECT sku_gudang FROM mateng_id WHERE sku_gudang='$skug'");
                $hitung = mysqli_num_rows($select);
                if ($hitung > 1 && $skug !== '--') {
                    header('location:?url=inventory5');
                } else {
                    $update2 = mysqli_query($conn, "UPDATE mateng_id SET sku_gudang='$skug', lokasi_gudang='$gudang', quantity='$quantity' WHERE id_gudang='$idg'");

                    header('location:?url=inventory5');
                }
            } else {

                echo '

        <script>

            alert("Barang dan Gambar Tidak bisa di update");

            window.location.href="?url=inventory5";

        </script>';
            }
        }
    }
}
