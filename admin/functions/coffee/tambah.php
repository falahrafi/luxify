<?php 

    require_once '../../../connection.php';

    // Mengambil data dari input user
    $name = htmlspecialchars($_POST["name"]);
    $category = htmlspecialchars($_POST["category"]);
    $price = htmlspecialchars($_POST["price"]);
    $description = htmlspecialchars($_POST["description"]);

    $query = "INSERT INTO coffees (name, category, price, description)
                VALUES ('$name', '$category', $price, '$description')";

    mysqli_query($conn, $query);

    echo "
            <script>
                document.location.href = '../../index.php';
            </script>
        ";

?>