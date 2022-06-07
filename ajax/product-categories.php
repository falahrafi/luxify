<?php 

   require_once '../connection.php';

   $category = $_GET['q'];

   $sql = "SELECT coffees.id AS 'coffeeID', coffees.name, coffees.category, coffees.price, galleries.image
            FROM coffees INNER JOIN galleries ON coffees.id = galleries.coffee_id
            WHERE galleries.type = 'main'";

   if($category == 'all') { $sql .= ";"; }
   else if($category == 'arabica') { $sql .= "AND coffees.category = 'arabica';"; }
   else if($category == 'liberica') { $sql .= "AND coffees.category = 'liberica';"; }
   else if($category == 'robusta') { $sql .= "AND coffees.category = 'robusta';"; }

   $result = mysqli_query($conn, $sql);

?>



<!-- RESPONSE -->

<?php 
   if (mysqli_num_rows($result) > 0):
      // output data of each row
      while($coffee = mysqli_fetch_assoc($result)):
?>

<div class="col-xl-3 col-md-4 col-sm-6 col-10 offset-1 offset-sm-0 card-container">
   <div class="product-card-container text-center">
      <div class="product-card pb-4">
         <div>
            <img src="<?= $coffee['image']; ?>" alt="" class="product-image">
         </div>
         <div class="btn product-category mb-1">
            <?= $coffee['category']; ?>
         </div>
         <div class="product-name mb-1">
            <a href="details.php?id=<?= $coffee['coffeeID']; ?>" class="stretched-link">
               <?= $coffee['name']; ?>
            </a>
         </div>
         <div class="product-price">
            <?= "Rp. " . number_format($coffee['price'],0,',','.'); ?>
         </div>
      </div>
         <a href="details.php?id=<?= $coffee['coffeeID']; ?>" class="btn btn-cart">
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