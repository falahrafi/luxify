<?php 

    require_once '../../../connection.php';

    // Mengambil data dari input user
    $galleryID = htmlspecialchars($_GET["id"]);

    $query = "DELETE FROM galleries WHERE id = $galleryID";

    mysqli_query($conn, $query);

    echo "
            <script>
                document.location.href = '../../index.php';
            </script>
        ";

?>