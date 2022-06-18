<?php

require_once '../../connection.php';

$sql = "SELECT transactions.id AS 'transactionID', user.id AS 'userID', user.name AS 'userName',
         transfer_slips.slip AS 'buktiPembayaran', transactions.payment AS 'pembayaran',
         transactions.status AS 'status'
         FROM `transactions`
         INNER JOIN `user` ON transactions.user_id = user.id
         INNER JOIN `transfer_slips` ON transactions.id = transfer_slips.transaction_id;";

$result = mysqli_query($conn, $sql);

$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
   $rows[] = $row;
}

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-black"><b>Transaksi</b> <i class="fas fa-receipt"></i></h1>
   <buttton class="btn btn-black d-sm-inline-block shadow-sm ml-auto mr-2" id="btnRefresh">
      <i class="fas fa-sync-alt fa-sm text-white"></i>
   </buttton>
</div>

<!-- Tabel Data Produk -->
<div class="card shadow mb-4">
   <div class="accent-blue">
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
                     <i class="fas fa-hashtag fa-sm"></i> User
                  </th>
                  <th>
                     <i class="fas fa-images fa-sm"></i> Bukti Transfer
                  </th>
                  <th>
                     <i class="fas fa-signature fa-sm"></i> Pembayaran
                  </th>
                  <th>
                     <i class="fas fa-air-freshener"></i> Status
                  </th>
               </tr>
            </thead>
            <tbody>

               <?php
               foreach ($rows as $transaction) :
               ?>

                  <tr>
                     <th><?= $transaction['transactionID']; ?></th>
                     <td><?= $transaction['userID'] . ' - ' . $transaction['userName']; ?></td>
                     <td><img src="../<?= $transaction['buktiPembayaran']; ?>" alt="" height="200"></td>
                     <td>
                        <?php if ($transaction['pembayaran'] == 'bca') { ?>
                           <?= "Bank BCA"; ?>
                        <?php } else if ($transaction['pembayaran'] == 'mandiri') { ?>
                           <?= "Bank Mandiri"; ?>
                        <?php } else if ($transaction['pembayaran'] == 'cod') { ?>
                           <?= "COD"; ?>
                        <?php } else { ?>
                           <?= $transaction['pembayaran']; ?>
                        <?php } ?>
                     </td>
                     <td>
                        <div class="status-container position-relative">

                           <select class="form-select status-transaksi status-yellow" onload="aturStatus(this,'<?= $transaction['status']; ?>');" onclick="ubahStatus(this,<?= $transaction['transactionID']; ?>,'<?= $transaction['status']; ?>');">
                              <option value="pending" selected>Pending</option>
                              <option value="success">Success</option>
                              <option value="failed">Failed</option>
                           </select>

                           <i class="fas fa-caret-down select-arrow"></i>

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
   $('#btnTambahGambar').click(function() {
      $('.isi-konten-admin').load('pages/tambah-gambar.php');
   });
   // Tombol Refresh
   $('#btnRefresh').click(function() {
      $('.isi-konten-admin').load('pages/data-transaksi.php');
   });
</script>

<script>
   // Ke halaman 'ubah-produk.php'
   function keUbahGambar(galleryID) {
      $('.isi-konten-admin').load('pages/ubah-gambar.php?id=' + galleryID);
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
               "first": "First",
               "last": "Last",
               "next": "<i class='fas fa-chevron-right'></i>",
               "previous": "<i class='fas fa-chevron-left'></i>"
            }
         },
         'columnDefs': [{
            'targets': [1, 4],
            /* column index */
            'orderable': true,
            /* true or false */
         }],
         "bDestroy": true,
         dom: 'lpftrip'
      });
   });
</script>

<script>
   // Fungsi ketika bagian select status pembayaran di-click
   function ubahStatus(_this, transactionID, status) {
      var selectStatus = $(_this).find(":selected").val();

      $.post("functions/transaction/ubah-status.php", {
         s: selectStatus,
         id: transactionID
      }, function(data) {
         if (status != selectStatus) {
            $('.isi-konten-admin').load('pages/data-transaksi.php');
         }
      });
   }

   // Load bagian bagian select status pembayaran secara otomatis,
   // sehingga fungsi 'aturStatus()' dapat berjalan
   $(document).ready(function() {
      $('.status-transaksi').trigger('load');
   });

   // Fungsi ketika bagian select status pembayaran di-load
   function aturStatus(_this, status) {
      if (status == 'pending') {
         $(_this).val('pending').change();
         $(_this).addClass('status-yellow');
         $(_this).removeClass('status-red');
         $(_this).removeClass('status-green');
      } else if (status == 'success') {
         $(_this).val('success').change();
         $(_this).addClass('status-green');
         $(_this).removeClass('status-red');
         $(_this).removeClass('status-yellow');
      } else if (status == 'failed') {
         $(_this).val('failed').change();
         $(_this).addClass('status-red');
         $(_this).removeClass('status-yellow');
         $(_this).removeClass('status-green');
      }
   }
</script>