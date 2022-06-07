$(document).ready(function(){
   
   // Saat file pertama kali di-load
   $('.isi-konten-admin').load('pages/data-produk.php');
   // localStorage.removeItem("buttonClicked");
   if(localStorage.getItem("buttonClicked") == null){
      localStorage.setItem("buttonClicked", "data-produk");
   }

   // Sidebar : Produk

   $('#sidebarDataProduk').click(function(){
      $('.isi-konten-admin').load('pages/data-produk.php');
      $('li').removeClass('active');
      $('#menuProduk').addClass('active');
      localStorage.setItem("buttonClicked", "data-produk"); 
   });

   $('#sidebarTambahProduk').click(function(){
      $('.isi-konten-admin').load('pages/tambah-produk.php');
      $('li').removeClass('active');
      $('#menuProduk').addClass('active');
      localStorage.setItem("buttonClicked", "tambah-produk"); 
   });


   // Sidebar : Gambar Produk

   $('#sidebarDataGambar').click(function(){
      $('.isi-konten-admin').load('pages/data-gambar.php');
      $('li').removeClass('active');
      $('#menuGambar').addClass('active');
      localStorage.setItem("buttonClicked", "data-gambar"); 
   });
   
   $('#sidebarTambahGambar').click(function(){
      $('.isi-konten-admin').load('pages/tambah-gambar.php');
      $('li').removeClass('active');
      $('#menuGambar').addClass('active');
      localStorage.setItem("buttonClicked", "tambah-gambar"); 
   });


   // Sidebar : Pesan Pengguna

   $('#sidebarDataPesan').click(function(){
      $('.isi-konten-admin').load('pages/data-contact-us.php');
      $('li').removeClass('active');
      $('#menuPesan').addClass('active');
      localStorage.setItem("buttonClicked", "data-pesan");
   });


   // This function will run on every page reload, but the conditions will only 
   // happen on if the buttonClicked variable in localStorage == "..."
   if(localStorage.getItem("buttonClicked") == "data-produk") {
      $('.isi-konten-admin').load('pages/data-produk.php');
      $('li').removeClass('active');
      $('#menuProduk').addClass('active');
   } else if(localStorage.getItem("buttonClicked") == "tambah-produk") {
      $('.isi-konten-admin').load('pages/tambah-produk.php');
      $('li').removeClass('active');
      $('#menuProduk').addClass('active');
   } else if(localStorage.getItem("buttonClicked") == "data-gambar") {
      $('.isi-konten-admin').load('pages/data-gambar.php');
      $('li').removeClass('active');
      $('#menuGambar').addClass('active');
   } else if(localStorage.getItem("buttonClicked") == "tambah-gambar") {
      $('.isi-konten-admin').load('pages/tambah-gambar.php');
      $('li').removeClass('active');
      $('#menuGambar').addClass('active');
   } else if(localStorage.getItem("buttonClicked") == "data-pesan") {
      $('.isi-konten-admin').load('pages/data-contact-us.php');
      $('li').removeClass('active');
      $('#menuPesan').addClass('active');
   }

});