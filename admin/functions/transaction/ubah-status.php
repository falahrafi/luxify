<?php
   
   require_once '../../../connection.php';

   $status = $_POST['s'];
   $transactionID = $_POST['id'];

   echo $status . '<br>' . $transactionID;

   $query = "UPDATE transactions SET status = '$status'
               WHERE id = $transactionID;";

    mysqli_query($conn, $query);

?>