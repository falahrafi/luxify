<?php

require_once '../../connection.php';

$productID = $_GET['id'];

$sql = "SELECT * FROM products WHERE id = $productID";
$result = mysqli_query($conn, $sql);

$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
$product = $rows[0];

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-dark">
        <a href="index.php" class="btn-back" role="button"><i class="fas fa-long-arrow-alt-left"></i></a>
        Ubah Produk
    </h1>
</div>

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header bg-black py-3">
        <h6 class="m-0 font-weight-bold text-white">Form Ubah Produk</h6>
    </div>
    <div class="card-body text-black">

        <form action="functions/coffee/ubah.php?id=<?= $productID; ?>" method="POST">
            <div class="form-row">
                <div class="form-group col">
                    <label for="inputName">
                        <i class="fas fa-air-freshener"></i>&ensp;<b>Nama</b>
                    </label>
                    <input type="name" name="name" class="form-control" id="inputName" value="<?= $product['name']; ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCategory">
                        <i class="fas fa-tags fa-sm"></i>&ensp;<b>Kategori</b>
                    </label>
                    <select id="inputCategory" class="form-control" name="category" required>
                        <option value="Men" <?= $product['category'] == 'Men' ? 'selected' : ''; ?>>For Men</option>
                        <option value="Women" <?= $product['category'] == 'Women' ? 'selected' : ''; ?>>For Women</option>
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
                        <input type="number" name="price" class="form-control" id="inputPrice" value="<?= $product['price']; ?>" step="100" required>
                    </div>
                </div>
                <div class="form-group col">
                    <label for="inputDescription">
                        <i class="fas fa-align-left fa-sm"></i>&ensp;<b>Deskripsi</b>
                    </label>
                    <textarea class="form-control" id="inputDescription" name="description" rows="6"><?= $product['description']; ?></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-black">
                <i class="fas fa-pencil-alt"></i>&ensp;<b>Ubah</b>
            </button>
        </form>

    </div>
</div>