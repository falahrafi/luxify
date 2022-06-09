<?php 

   require_once '../../../connection.php';

   // Mengambil data dari input user
   $productID = htmlspecialchars($_POST["product_id"]);
   $imageType = htmlspecialchars($_POST["type"]);


   if($imageType == "main") {

      error_reporting(0);

      $sqlTypeMain = "SELECT id FROM galleries WHERE EXISTS(SELECT * FROM galleries WHERE product_id = $productID AND type = 'main') AND type = 'main' AND product_id = $productID";
      $resultTypeMain = mysqli_query($conn, $sqlTypeMain);

      $rowsTypeMain = [];
      while($rowTypeMain = mysqli_fetch_assoc($resultTypeMain)){
         $rowsTypeMain[] = $rowTypeMain;
      }

      $idTypeMain = $rowsTypeMain[0]["id"];

      if(isset($rowsTypeMain[0]["id"])) {
         $queryUpdateMain = "UPDATE galleries SET type = 'gallery' WHERE id = $idTypeMain";
         mysqli_query($conn, $queryUpdateMain);
      }

   }


   // Generate nama file baru
   $imageNameNew = uniqid() . ".png";
   $imagePathNew = "assets/uploads/" . $imageNameNew;

   // Upload file ke directory
   $tmpName = $_FILES["image"]["tmp_name"];
   move_uploaded_file($tmpName, "../../../" . $imagePathNew);


   $query = "INSERT INTO galleries (image, type, product_id)
               VALUES ('$imagePathNew', '$imageType', $productID)";

   mysqli_query($conn, $query);

   echo "
         <script>
               document.location.href = '../../index.php';
         </script>
      ";

?>