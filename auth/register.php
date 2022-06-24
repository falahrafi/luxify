<?php 

    require_once '../connection.php';

    // Mengambil data dari input user
    $name = htmlspecialchars($_POST["name"]);
    $usern = htmlspecialchars($_POST["user"]);
    $passw = md5($_POST["pass"]);

    // Apakah terdapat username yang sama pada database?
    $usernameExists = "SELECT EXISTS (SELECT * FROM `user` WHERE usern = '$usern') AS 'exists';";
    $resultExists = mysqli_query($conn, $usernameExists);
    $rowExists = mysqli_fetch_assoc($resultExists);

    // Jika YA, jangan menambahkan user baru, redirect ke halaman login
    if ($rowExists['exists'] == '1') {
        echo "
        <script>
        alert('Username yang anda masukkan sudah terdaftar pada sistem kami, Silahkan Login!');
        document.location.href = '../index.php';
        </script>
        ";
    } else {
        // Jika TIDAK, lanjutkan menambahkan user baru

        $query = "INSERT INTO user (name, usern, passw, level)
                    VALUES ('$name', '$usern', '$passw', 'user')";

        mysqli_query($conn, $query);

        echo "
                <script>
                alert('Berhasil membuat akun!');
                document.location.href = '../index.php';
                </script>
            ";
    }

?>