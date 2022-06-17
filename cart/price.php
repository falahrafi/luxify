<?php

function price($weights, $harga)
{
   if ($weights == "50 ml") {
      $price = $harga * 1;
   } else if ($weights == "100 ml") {
      $price = $harga * 2;
   } else if ($weights == "150 ml") {
      $price = $harga * 3;
   }

   return $price;
}

?>