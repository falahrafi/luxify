<?php 

   require_once '../../connection.php';

   $sql = "SELECT * FROM coffees";
   $result = mysqli_query($conn, $sql);

   $rows = [];
   while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
   }

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
   <h1 class="h3 mb-0 text-black">Produk <i class="fas fa-mug-hot fa-sm"></i></h1>
   <buttton class="btn btn-black d-sm-inline-block shadow-sm ml-auto mr-2 my-3 my-sm-0" id="btnRefresh">
      <i class="fas fa-sync-alt fa-sm text-white"></i>
   </buttton>
   <a class="d-inline-block btn btn-black shadow-sm my-3 my-sm-0" id="btnTambahProduk" role="button">
      <i class="fas fa-plus fa-sm"></i>&ensp;<b>Tambah</b>
   </a>
</div>

<p class="d-block text-black mb-4 w-75">Data-data produk ini hanya akan ditampilkan ke halaman katalog jika <b>gambar utama / main</b> sudah ditambahkan pada masing-masing produk.</p>

<!-- Tabel Data Produk -->
<div class="card shadow mb-4">
   <div class="accent-orange">
   </div>
   <div class="card-body">
      <div class="table-responsive-lg">
         <table class="table table-bordered mt-2" id="productTable" width="100%" cellspacing="0">
            <thead class="bg-black text-white">
                  <tr>
                     <th style="width: 11%">
                        <i class="fas fa-hashtag fa-sm"></i> ID
                     </th>
                     <th style="width: 20%">
                        <i class="fas fa-coffee fa-sm"></i> Nama
                     </th>
                     <th style="width: 16%">
                        <i class="fas fa-tags fa-sm"></i> Kategori
                     </th>
                     <th style="width: 14%">
                        <i class="fas fa-dollar-sign fa-sm"></i> Harga
                     </th>
                     <th style="width: 31%">
                        <i class="fas fa-align-left fa-sm"></i> Deskripsi
                     </th>
                     <th style="width: 8%">
                        <i class="fas fa-user-cog"></i>
                     </th>
                  </tr>
            </thead>
            <tbody>

                  <?php 
                     foreach ($rows as $coffee):
                  ?>

                  <tr>
                     <th><?= "P-" . sprintf('%04d', $coffee['id']); ?></th>
                     <td><?= $coffee['name']; ?></td>
                     <td><?= $coffee['category']; ?></td>
                     <td>Rp. <?= number_format($coffee['price'],0,',','.'); ?></td>
                     <td>
                        <p class="deskripsi">
                              <?= $coffee['description']; ?>
                        </p>
                     </td>
                     <td>
                        <div class="mb-2">
                           <a class="btn btn-circle btn-primary btn-action" onclick="produkToGambar(<?= $coffee['id']; ?>)" role="button" title="Gambar">
                              <i class="fas fa-images"></i>
                           </a>                           
                        </div>
                        <div class="mb-2">
                           <a onclick="keUbahProduk(<?= $coffee['id']; ?>)" id="ubahProduk" class="btn btn-circle btn-success btn-action" role="button" title="Ubah Data">
                              <i class="fas fa-pencil-alt"></i>
                           </a>
                        </div>
                        <div>
                           <a href="functions/coffee/hapus.php?id=<?= $coffee['id']; ?>" class="btn btn-circle btn-danger btn-action" role="button" title="Hapus Data">
                              <i class="fas fa-trash"></i>
                           </a>                           
                        </div>
                     </td>
                  </tr>

                  <?php
                     endforeach;
                  ?>
                  
            </tbody>
         </table>
      </div>
   </div>
</div>


<!-- Javascript untuk mengubah isi konten -->
<script>
   // Tombol Tambah
   $('#btnTambahProduk').click(function(){
         $('.isi-konten-admin').load('pages/tambah-produk.php');
   });
   // Tombol Refresh
   $('#btnRefresh').click(function(){
         $('.isi-konten-admin').load('pages/data-produk.php');
   });
</script>

<script>
   // Ke halaman 'ubah-produk.php'
   function keUbahProduk(coffeeID){
      $('.isi-konten-admin').load('pages/ubah-produk.php?id='+coffeeID);
   }
</script>

<script>
   $(document).ready(function() {
      $('#productTable').DataTable({
         "language": {
            "lengthMenu": 'Tampilkan _MENU_ baris',
            "search": "Cari:",
            "zeroRecords": "Tidak ada data yang cocok",
            "emptyTable": "<h3 class='text-center my-5'>Belum ada produk, silakan tambahkan terlebih dahulu!</h3>",
            "paginate": {
               "first":      "First",
               "last":       "Last",
               "next":       "<i class='fas fa-chevron-right'></i>",
               "previous":   "<i class='fas fa-chevron-left'></i>"
            }
         },
         'columnDefs': [ {
            'targets': [5], /* column index */
            'orderable': false, /* true or false */
         }],
         "bDestroy": true,
         dom: 'lpftrip'
      });
   });
</script>

<script>
   // Ketika icon gambar ditekan, muat data gambar
   function produkToGambar(coffeeID){
      $('.isi-konten-admin').load('pages/data-gambar.php?q='+coffeeID);
      window.location.href = "#gambar";
      if (sidebarMenu != 'gambar') {
         window.location.reload();
      }
   }
</script>