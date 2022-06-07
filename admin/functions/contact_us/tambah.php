<?php 

    require_once '../../../connection.php';

    // Mengambil data dari input user
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $query = "INSERT INTO contact_us (name, email, message)
                VALUES ('$name', '$email', '$message')";

    mysqli_query($conn, $query);

    echo "
            <script>
               alert('Pesan anda berhasil dikirim!');
               document.location.href = '../../../index.php';
            </script>
        ";

?>