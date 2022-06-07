<?php 

   require_once '../../connection.php';

   $galleryID = $_GET['id'];

    // COFFEES
   $sqlGambar = "SELECT * FROM galleries INNER JOIN coffees ON coffees.id = galleries.coffee_id WHERE galleries.id = $galleryID";
   $resultGambar = mysqli_query($conn, $sqlGambar);

   $rowsGambar = [];
   while($rowGambar = mysqli_fetch_assoc($resultGambar)){
      $rowsGambar[] = $rowGambar;
   }
   $gambar = $rowsGambar[0];

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-dark">Ubah Gambar</h1>
</div>

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header bg-black py-3">
        <h6 class="m-0 font-weight-bold text-white">Form Ubah Gambar</h6>
    </div>
    <div class="card-body text-black py-4 px-3 px-sm-5">
        
        <form action="functions/gallery/ubah.php?id=<?= $galleryID; ?>" method="POST" enctype="multipart/form-data" class="text-center">
            <div class="form-row text-left">
               <input type="hidden" value="<?= $gambar['coffee_id']; ?>" name="coffee_id">
               <fieldset disabled class=" col-md-6">
                  <div class="form-group">
                     <label for="inputProduct">
                           <i class="fas fa-coffee fa-sm"></i>&ensp;<b>Untuk Produk Apa?</b>
                     </label>
                     <select id="inputProduct" class="form-control" required>
                        <option value="<?= $gambar['coffee_id']; ?>">
                           <?= $gambar['category'] . " " . $gambar['name'] . " #P-". sprintf('%04d',$gambar['coffee_id']);?>
                        </option>
                     </select>
                  </div>
               </fieldset>
                <div class="form-group col-md-6">
                    <label for="inputImageType">
                        <i class="far fa-image fa-sm"></i>&ensp;<b>Jenis Gambar</b>
                    </label>
                    <select id="inputImageType" class="form-control" name="type" required>
                        <option value="gallery" <?= $gambar['type'] == 'gallery' ? 'selected' : ''; ?>>Gallery</option>
                        <option value="main" <?= $gambar['type'] == 'main' ? 'selected' : ''; ?>>Jadikan Gambar Utama (Main)</option>
                    </select>
                </div>
            </div>
            <div class="form-row text-center mb-3">
                <div class="col-sm-6 col-lg-3 col-xl-2 mx-auto">
                    <img src="../<?= $gambar['image']; ?>" alt="" width="100%" id="gambarPreview">
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
                            >
                            <label class="custom-file-label" for="inputGambar" id="inputGambarLabel">
                                Pilih gambar (*.png)
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-black">
                <i class="fas fa-pencil-alt"></i>&ensp;<b>Ubah Gambar</b>
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
            
            let imageName = this.value;
            imageName = imageName.split('\\');
            $('#inputGambarLabel').html(imageName.at(-1));
            $('#gambarPreview').attr("src", URL.createObjectURL(this.files[0]));  
        
        }

    });
</script>