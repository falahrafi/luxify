<?php 

   require_once '../../connection.php';

    // COFFEES
   $sqlCoffee = "SELECT * FROM coffees ORDER BY category ASC";
   $resultCoffee = mysqli_query($conn, $sqlCoffee);

   $rowsCoffee = [];
   while($rowCoffee = mysqli_fetch_assoc($resultCoffee)){
      $rowsCoffee[] = $rowCoffee;
   }

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-black">Tambah Gambar <i class="fas fa-images fa-sm"></i></h1>
</div>

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header bg-black py-3">
        <h6 class="m-0 font-weight-bold text-white">Form Tambah Gambar</h6>
    </div>
    <div class="card-body text-black py-4 px-3 px-sm-5">
        
        <form action="functions/gallery/tambah.php" method="POST" enctype="multipart/form-data" class="text-center">
            <div class="form-row text-left">
                <div class="form-group col-md-6">
                    <label for="inputProduct">
                        <i class="fas fa-coffee fa-sm"></i>&ensp;<b>Untuk Produk Apa?</b>
                    </label>
                    <select id="inputProduct" class="form-control" name="coffee_id" required>
                        <?php foreach ($rowsCoffee as $coffee): ?>
                            <option value="<?= $coffee['id']; ?>">
                                <?= $coffee['category'] . " " . $coffee['name'] . " #P-". sprintf('%04d',$coffee['id']);?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputImageType">
                        <i class="far fa-image fa-sm"></i>&ensp;<b>Jenis Gambar</b>
                    </label>
                    <select id="inputImageType" class="form-control" name="type" required>
                        <option value="main" selected>Jadikan Gambar Utama (Main)</option>
                        <option value="gallery">Gallery</option>
                    </select>
                </div>
            </div>
            <div class="form-row text-center mb-3">
                <div class="col-sm-6 col-lg-3 col-xl-2 mx-auto">
                    <img alt="" width="100%" id="gambarPreview" class="d-none">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text d-none d-md-block" id="inputGambarPrepend">Upload Gambar</span>
                        </div>
                        <div class="custom-file text-left">
                            <input 
                                type="file"
                                name="image"
                                class="custom-file-input"
                                id="inputGambar" 
                                aria-describedby="inputGambarPrepend"
                                accept=".png"
                                required
                            >
                            <label class="custom-file-label" for="inputGambar" id="inputGambarLabel">
                                Pilih gambar (*.png)
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-black">
                <i class="fas fa-plus"></i>&ensp;<b>Tambahkan Gambar</b>
            </button>
        </form>

    </div>
</div>

<!-- Mengatur Preview Gambar -->
<script>
    $('#inputGambar').change(function(){

        if(this.files[0].size > 2097152) {

            alert('File Gambar Terlalu Besar! (Max: 2 MB)');
            this.value = "";

        } else {

            $('#gambarPreview').attr('class', 'd-block');
            
            let imageName = this.value;
            imageName = imageName.split('\\');
            $('#inputGambarLabel').html(imageName.at(-1));
            $('#gambarPreview').attr("src", URL.createObjectURL(this.files[0]));  
        
        }

    });
</script>