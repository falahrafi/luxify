<?php 

   require_once '../../connection.php';

   $sql = "SELECT * FROM contact_us";
   $result = mysqli_query($conn, $sql);

   $rows = [];
   while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
   }

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
   <h1 class="h3 mb-0 text-black">Pesan Pengguna <i class="fas fa-envelope fa-sm"></i></h1>
   <buttton class="btn btn-black d-sm-inline-block shadow-sm ml-auto mr-2 my-3 my-sm-0" id="btnRefresh">
      <i class="fas fa-sync-alt fa-sm text-white"></i>
   </buttton>
</div>

<!-- Tabel Data Produk -->
<div class="card shadow my-4">
   <div class="accent-orange">
   </div>
   <div class="card-body">
      <div class="table-responsive-lg">
         <table class="table table-bordered mt-2" id="messageTable" width="100%" cellspacing="0">
            <thead class="bg-black text-white">
                  <tr>
                     <th style="width: 11%">
                        <i class="fas fa-hashtag fa-sm"></i> ID
                     </th>
                     <th style="width: 15%">
                        <i class="fas fa-user fa-sm"></i> Nama
                     </th>
                     <th style="width: 16%">
                        <i class="fas fa-at fa-sm"></i> Email
                     </th>
                     <th style="width: 36%">
                        <i class="fas fa-envelope fa-sm"></i> Pesan
                     </th>
                     <th style="width: 8%">
                        <i class="fas fa-user-cog"></i>
                     </th>
                  </tr>
            </thead>
            <tbody>

                  <?php 
                     foreach ($rows as $contact):
                  ?>

                  <tr>
                     <th><?= "M-" . sprintf('%04d', $contact['id']); ?></th>
                     <td><?= $contact['name']; ?></td>
                     <td><?= $contact['email']; ?></td>
                     <td>
                        <?= $contact['message']; ?>
                     </td>
                     <td>
                        <div>
                           <a href="functions/contact_us/hapus.php?id=<?= $contact['id']; ?>" class="btn btn-circle btn-danger btn-action" role="button" title="Hapus Data">
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
   // Tombol Refresh
   $('#btnRefresh').click(function(){
         $('.isi-konten-admin').load('pages/data-contact-us.php');
   });
</script>

<script>
   $(document).ready(function() {
      $('#messageTable').DataTable({
         "language": {
            "lengthMenu": 'Tampilkan _MENU_ baris',
            "search": "Cari:",
            "zeroRecords": "Tidak ada data yang cocok",
            "emptyTable": "<h3 class='text-center my-5'>Belum ada pesan dari pengguna.</h3>",
            "paginate": {
               "first":      "First",
               "last":       "Last",
               "next":       "<i class='fas fa-chevron-right'></i>",
               "previous":   "<i class='fas fa-chevron-left'></i>"
            }
         },
         'columnDefs': [ {
            'targets': [4], /* column index */
            'orderable': false, /* true or false */
         }],
         "bDestroy": true,
         dom: 'lpftrip'
      });
   });
</script>