<?php 

    require_once '../../../connection.php';

    $coffeeID = $_GET['id'];

    // Mengambil data dari input user
    $name = htmlspecialchars($_POST["name"]);
    $category = htmlspecialchars($_POST["category"]);
    $price = htmlspecialchars($_POST["price"]);
    $description = htmlspecialchars($_POST["description"]);

    $query = "UPDATE coffees SET
                  name = '$name', category = '$category', price = $price, description = '$description'
               WHERE id = $coffeeID;";

    mysqli_query($conn, $query);

    echo "
            <script>
                document.location.href = '../../index.php';
            </script>
        ";

?>