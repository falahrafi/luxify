<?php 

   require_once '../../connection.php';

   $sql = "SELECT galleries.id AS 'galleryID', galleries.image, galleries.type, galleries.coffee_id, coffees.name, coffees.category FROM galleries INNER JOIN coffees ON coffees.id = galleries.coffee_id";
   
   if(isset($_GET['q'])){
      $coffeeID = $_GET['q'];
      $sql .= " WHERE coffee_id=" . $coffeeID;
   }

   $result = mysqli_query($conn, $sql);

   $rows = [];
   while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
   }

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-black">Gambar <i class="fas fa-images fa-sm"></i></h1>
   <buttton class="btn btn-black d-sm-inline-block shadow-sm ml-auto mr-2" id="btnRefresh">
      <i class="fas fa-sync-alt fa-sm text-white"></i>
   </buttton>
   <a class="d-sm-inline-block btn btn-black shadow-sm my-3 my-sm-0" id="btnTambahGambar" role="button">
        <i class="fas fa-plus fa-sm"></i>&ensp;<b>Tambah</b>
   </a>
</div>

<!-- Tabel Data Produk -->
<div class="card shadow mb-4">
   <div class="accent-orange">
   </div>
   <div class="card-body">
      <div class="table-responsive-lg">
         <table class="table table-bordered mt-2" id="galleryTable" width="100%" cellspacing="0">
            <thead class="bg-black text-white">
                  <tr>
                     <th>
                        <i class="fas fa-hashtag fa-sm"></i> ID
                     </th>
                     <th>
                        <i class="fas fa-images fa-sm"></i> Gambar
                     </th>
                     <th>
                        <i class="fas fa-signature fa-sm"></i> Type
                     </th>
                     <th>
                        <i class="fas fa-coffee fa-sm"></i> Produk
                     </th>
                     <th style="width: 8%">
                        <i class="fas fa-user-cog"></i>
                     </th>
                  </tr>
            </thead>
            <tbody>

                  <?php 
                     foreach ($rows as $gallery):
                  ?>

                  <tr>
                     <th><?= "G-" . sprintf('%04d', $gallery['galleryID']); ?></th>
                     <td><img src="../<?= $gallery['image']; ?>" alt="" height="160"></td>
                     <td><?= $gallery['type']; ?></td>
                     <td><?= $gallery['category'] . " " . $gallery['name'] . " <b>#P-" . sprintf('%04d', $gallery['coffee_id']) . "</b>"; ?></td>
                     <td>
                        <div class="mb-2">
                           <a onclick="keUbahGambar(<?= $gallery['galleryID']; ?>)" id="ubahGambar" class="btn btn-circle btn-success btn-action mb-2 mb-xl-0" role="button" title="Ubah Data">
                                 <i class="fas fa-pencil-alt"></i>
                           </a>                           
                        </div>
                        <div>
                           <a href="functions/gallery/hapus.php?id=<?= $gallery['galleryID']; ?>" class="btn btn-circle btn-danger btn-action" role="button" title="Hapus Data">
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
   // Menggunakan tombol
   $('#btnTambahGambar').click(function(){
         $('.isi-konten-admin').load('pages/tambah-gambar.php');
   });
   // Tombol Refresh
   $('#btnRefresh').click(function(){
         $('.isi-konten-admin').load('pages/data-gambar.php');
   });
</script>

<script>
   // Ke halaman 'ubah-produk.php'
   function keUbahGambar(galleryID){
      $('.isi-konten-admin').load('pages/ubah-gambar.php?id='+galleryID);
   }
</script>

<script>
   $(document).ready(function() {
      $('#galleryTable').DataTable({
         "language": {
            "lengthMenu": 'Tampilkan _MENU_ baris',
            "search": "Cari:",
            "zeroRecords": "Tidak ada data yang cocok",
            "emptyTable": "<h3 class='text-center my-5'>Belum ada gambar, silakan tambahkan terlebih dahulu!</h3>",
            "paginate": {
               "first":      "First",
               "last":       "Last",
               "next":       "<i class='fas fa-chevron-right'></i>",
               "previous":   "<i class='fas fa-chevron-left'></i>"
            }
         },
         'columnDefs': [ {
            'targets': [1,4], /* column index */
            'orderable': false, /* true or false */
         }],
         "bDestroy": true,
         dom: 'lpftrip'
      });
   });
</script>