<?php 

   require_once '../connection.php';

   $category = $_GET['q'];

   $sql = "SELECT products.id AS 'productID', products.name, products.category, products.price, galleries.image
            FROM products INNER JOIN galleries ON products.id = galleries.product_id
            WHERE galleries.type = 'main'";

   if($category == 'all') { $sql .= ";"; }
   else if($category == 'arabica') { $sql .= "AND products.category = 'arabica';"; }
   else if($category == 'liberica') { $sql .= "AND products.category = 'liberica';"; }
   else if($category == 'robusta') { $sql .= "AND products.category = 'robusta';"; }

   $result = mysqli_query($conn, $sql);

?>



<!-- RESPONSE -->

<?php 
   if (mysqli_num_rows($result) > 0):
      // output data of each row
      while($product = mysqli_fetch_assoc($result)):
?>

<div class="col-xl-3 col-md-4 col-sm-6 col-10 offset-1 offset-sm-0 card-container">
   <div class="product-card-container text-center">
      <div class="product-card pb-4">
         <div>
            <img src="<?= $product['image']; ?>" alt="" class="product-image">
         </div>
         <div class="btn product-category mb-1">
            <?= $product['category']; ?>
         </div>
         <div class="product-name mb-1">
            <a href="details.php?id=<?= $product['productID']; ?>" class="stretched-link">
               <?= $product['name']; ?>
            </a>
         </div>
         <div class="product-price">
            <?= "Rp. " . number_format($product['price'],0,',','.'); ?>
         </div>
      </div>
         <a href="details.php?id=<?= $product['productID']; ?>" class="btn btn-cart">
            <i class="fas fa-chevron-down"></i>
         </a>
   </div>
</div>

<?php 
      endwhile;
   else:
      echo "0 results";
   endif;
?>

<script type="text/javascript" src="scripts/tilt-effect.js"></script>