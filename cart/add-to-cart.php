<?php

    error_reporting(0);

   require_once '../connection.php';

    session_start();
    $userid = $_SESSION['id'];

    // Mengambil data berdasarkan halaman 'details.php'
    $weights = htmlspecialchars($_POST["weights"]);
    $productID = htmlspecialchars($_GET["id"]);

    // Mengambil data yang sama dengan data dari halaman 'details.php'
    $cart = "SELECT * FROM `carts` WHERE weights = '$weights' AND product_id = $productID AND transaction_id IS NULL;";
    $resultCart = mysqli_query($conn, $cart);
    $rowCart = mysqli_fetch_assoc($resultCart);
    $cartID = $rowCart['id'];

    // Untuk data yang sudah ada, quantity ditambah 1
    $quantityNew = (int) $rowCart['quantity'] + 1;

    // Mencari tahu apakah data yang sama sudah ada atau belum
    $cartExists = "SELECT EXISTS (SELECT * FROM `carts` WHERE weights = '$weights' AND product_id = $productID AND transaction_id IS NULL) AS 'exists';";
    $resultCartExists = mysqli_query($conn, $cartExists);
    $rowCartExists = mysqli_fetch_assoc($resultCartExists);

    // Jika data yang sama sudah ada, ubah saja quantity dengan ditambah 1
    // Jika data yang sama belum ada, buat baris baris baru dengan quantity 1
    if($rowCartExists['exists'] == '1') {
        $query = "UPDATE carts SET quantity = $quantityNew WHERE id = $cartID";
    } else {
        $query = "INSERT INTO carts (weights, quantity, product_id, transaction_id, user_id)
                    VALUES ('$weights' , 1, '$productID', null, $userid)";
    }

   mysqli_query($conn, $query);

   echo "
            <script>
                document.location.href = '../cart';
            </script>
        ";

?>