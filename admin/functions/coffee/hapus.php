<?php 

    require_once '../../../connection.php';

    // Mengambil data dari input user
    $coffeeID = htmlspecialchars($_GET["id"]);

    $query = "DELETE FROM coffees WHERE id = $coffeeID";

    mysqli_query($conn, $query);

    echo "
            <script>
                document.location.href = '../../index.php';
            </script>
        ";

?>