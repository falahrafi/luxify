<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-black">Tambah Produk <i class="fas fa-mug-hot fa-sm"></i></h1>
</div>

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header bg-black py-3">
        <h6 class="m-0 font-weight-bold text-white">Form Tambah Produk</h6>
    </div>
    <div class="card-body text-black">
        
        <form action="functions/coffee/tambah.php" method="POST">
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputName">
                        <i class="fas fa-coffee fa-sm"></i>&ensp;<b>Nama</b>
                    </label>
                    <input type="name" name="name" class="form-control" id="inputName" placeholder="* Contoh : 'Aceh Gayo'" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCategory">
                        <i class="fas fa-tags fa-sm"></i>&ensp;<b>Kategori</b>
                    </label>
                    <select id="inputCategory" class="form-control" name="category" required>
                        <option value="Arabica" selected>Arabica</option>
                        <option value="Liberica">Liberica</option>
                        <option value="Robusta">Robusta</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPrice">
                        <i class="fas fa-dollar-sign fa-sm"></i>&ensp;<b>Harga</b>
                    </label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="number" name="price" class="form-control" id="inputPrice" placeholder="0" step="100" required>
                    </div>
                </div>
                <div class="form-group col">
                    <label for="inputDescription">
                        <i class="fas fa-align-left fa-sm"></i>&ensp;<b>Deskripsi</b>
                    </label>
                    <textarea class="form-control" id="inputDescription" name="description" rows="6" placeholder="Tuliskan deskripsi yang menarik..."></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-black">
                <i class="fas fa-plus"></i>&ensp;<b>Tambahkan</b>
            </button>
        </form>

    </div>
</div>