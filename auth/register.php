<?php 

    require_once '../connection.php';

    // Mengambil data dari input user
    $name = htmlspecialchars($_POST["name"]);
    $usern = htmlspecialchars($_POST["user"]);
    $passw = md5($_POST["pass"]);

    $query = "INSERT INTO user (name, usern, passw, level)
                VALUES ('$name', '$usern', '$passw', 'user')";

    mysqli_query($conn, $query);

    echo "
            <script>
               alert('Berhasil membuat akun!');
               document.location.href = '../index.php';
            </script>
        ";

?>