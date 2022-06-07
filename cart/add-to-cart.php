<?php 

   require_once '../connection.php';

    // Mengambil data berdasarkan halaman 'details.php'
    $weights = htmlspecialchars($_POST["weights"]);
    $grindLevel = htmlspecialchars($_POST["grind_level"]);
    $coffeeID = htmlspecialchars($_GET["id"]);

    // Mengambil data yang sama dengan data dari halaman 'details.php'
    $cart = "SELECT * FROM `carts` WHERE weights = '$weights' AND grind_level = '$grindLevel' AND coffee_id = $coffeeID;";
    $resultCart = mysqli_query($conn, $cart);
    $rowCart = mysqli_fetch_assoc($resultCart);
    $cartID = $rowCart['id'];

    // Untuk data yang sudah ada, quantity ditambah 1
    $quantityNew = (int) $rowCart['quantity'] + 1;

    // Mencari tahu apakah data yang sama sudah ada atau belum
    $cartExists = "SELECT EXISTS (SELECT * FROM `carts` WHERE weights = '$weights' AND grind_level = '$grindLevel' AND coffee_id = $coffeeID) AS 'exists';";
    $resultCartExists = mysqli_query($conn, $cartExists);
    $rowCartExists = mysqli_fetch_assoc($resultCartExists);

    // Jika data yang sama sudah ada, ubah saja quantity dengan ditambah 1
    // Jika data yang sama belum ada, buat baris baris baru dengan quantity 1
    if($rowCartExists['exists'] == '1') {
        $query = "UPDATE carts SET quantity = $quantityNew WHERE id = $cartID";
    } else {
        $query = "INSERT INTO carts (weights, grind_level, quantity, coffee_id)
                    VALUES ('$weights', '$grindLevel', 1, '$coffeeID')";
    }

   mysqli_query($conn, $query);

   echo "
            <script>
                document.location.href = '../cart';
            </script>
        ";

?>