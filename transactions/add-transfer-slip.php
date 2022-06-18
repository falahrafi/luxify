<?php

   require_once '../connection.php';

   $transactionID = $_GET['id'];

   // Generate nama file baru
   $imageNameNew = uniqid() . ".png";
   $imagePathNew = "assets/uploads/transfer_slips/" . $imageNameNew;

   // Upload file ke directory
   $tmpName = $_FILES["image"]["tmp_name"];
   move_uploaded_file($tmpName, "../" . $imagePathNew);


   $query = "INSERT INTO transfer_slips (slip, transaction_id)
                  VALUES ('$imagePathNew', $transactionID)";

   mysqli_query($conn, $query);

   echo "
            <script>
                  document.location.href = 'invoice.php?id=$transactionID';
            </script>
         ";

?>