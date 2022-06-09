<?php 

    require_once '../../../connection.php';

    // Mengambil data dari input user
    $productID = htmlspecialchars($_GET["id"]);

    $query = "DELETE FROM products WHERE id = $productID";

    mysqli_query($conn, $query);

    echo "
            <script>
                document.location.href = '../../index.php';
            </script>
        ";

?>