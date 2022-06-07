// AJAX sesuai URL

var url = window.location.href;
url = url.split("#");
$categorySection = url.at(1);

if($categorySection == 'category-arabica') {
   $("#category-arabica").prop("checked", true);
   $('#product-catalogues').load('ajax/product-categories.php?q=arabica');
}
else if($categorySection == 'category-liberica') {
   $("#category-liberica").prop("checked", true);
   $('#product-catalogues').load('ajax/product-categories.php?q=liberica');
}
else if($categorySection == 'category-robusta') {
   $("#category-robusta").prop("checked", true);
   $('#product-catalogues').load('ajax/product-categories.php?q=robusta');
} else {
   // AJAX pada saat belum ada tombol kategori yang ditekan
   $('#product-catalogues').load('ajax/product-categories.php?q=all');
}



// AJAX tombol kategori dipilih

$('input[type=radio][name=coffee-category]').change(function() {

   let category;

   if (this.value == 'all') { category = 'all'; }
   else if (this.value == 'arabica') { category = 'arabica'; }
   else if (this.value == 'liberica') { category = 'liberica'; }
   else if (this.value == 'robusta') { category = 'robusta'; }

   // AJAX setelah memilih kategori
   $('#product-catalogues').load('ajax/product-categories.php?q=' + category);

});


// AJAX untuk kategori pada footer

$('.btn-arabica').click(function() {
   $("#category-arabica").prop("checked", true);
   $('#product-catalogues').load('ajax/product-categories.php?q=arabica');
});
$('.btn-liberica').click(function() {
   $("#category-liberica").prop("checked", true);
   $('#product-catalogues').load('ajax/product-categories.php?q=liberica');
});
$('.btn-robusta').click(function() {
   $("#category-robusta").prop("checked", true);
   $('#product-catalogues').load('ajax/product-categories.php?q=robusta');
});