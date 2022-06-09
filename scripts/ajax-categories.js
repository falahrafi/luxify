// AJAX sesuai URL

var url = window.location.href;
url = url.split("#");
$categorySection = url.at(1);

if($categorySection == 'category-men') {
   $("#category-men").prop("checked", true);
   $('#product-catalogues').load('ajax/product-categories.php?q=men');
}
else if($categorySection == 'category-women') {
   $("#category-women").prop("checked", true);
   $('#product-catalogues').load('ajax/product-categories.php?q=women');
} else {
   // AJAX pada saat belum ada tombol kategori yang ditekan
   $('#product-catalogues').load('ajax/product-categories.php?q=all');
}



// AJAX tombol kategori dipilih

$('input[type=radio][name=coffee-category]').change(function() {

   let category;

   if (this.value == 'all') { category = 'all'; }
   else if (this.value == 'men') { category = 'men'; }
   else if (this.value == 'women') { category = 'women'; }

   // AJAX setelah memilih kategori
   $('#product-catalogues').load('ajax/product-categories.php?q=' + category);

});


// AJAX untuk kategori pada footer

$('.btn-arabica').click(function() {
   $("#category-men").prop("checked", true);
   $('#product-catalogues').load('ajax/product-categories.php?q=men');
});
$('.btn-liberica').click(function() {
   $("#category-women").prop("checked", true);
   $('#product-catalogues').load('ajax/product-categories.php?q=women');
});