<?php 

    require_once '../../../connection.php';

    // Mengambil data dari input user
    $contactID = htmlspecialchars($_GET["id"]);

    $query = "DELETE FROM contact_us WHERE id = $contactID";

    mysqli_query($conn, $query);

    echo "
            <script>
                document.location.href = '../../index.php';
            </script>
        ";

?>