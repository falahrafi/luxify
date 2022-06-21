<?php 
  session_start();

  if (!isset($_POST['user'])) {
    header('location: ./'); exit();
  }

  $error = "";

  require "connection.php";

  $usern = $_POST['user'];
  $passw = md5($_POST['pass']);

  if (strlen($usern) < 1) {
    echo "<script language='javascript'>alert('Username atau Password tidak boleh kosong!'); location.assign('./')</script>";
  } else if (strlen($passw) < 1) {
    echo "<script language='javascript'>alert('Username atau Password tidak boleh kosong!'); location.assign('./')</script>";
  } else {
    $sql = "SELECT * FROM user WHERE usern = '$usern' AND passw = '$passw'";

    $result = $conn -> query($sql);

    if (!$result) {
      die("Koneksi ke database gagal!" . $conn -> error);
    }

    if ($result -> num_rows == 1) {
      $row = $result -> fetch_array();

      $_SESSION['id'] = $row['id'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['usern'] = $row['usern'];
      $_SESSION['level'] = $row['level'];
      
      header('location: ./');
      exit();
    } else {
      echo "<script language='javascript'>alert('Username atau Password salah!'); location.assign('./')</script>"; 
    }
  }

  if (!empty($error)) {
    $_SESSION['error'] = $error;
    header('location:'.$url.'./');
    exit();
  }
?>