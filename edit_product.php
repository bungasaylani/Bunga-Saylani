<?php
session_start();

// Mendapatkan data produk dari sesi
$products = $_SESSION['products'] ?? [];

// Menangani proses pengeditan produk
if (isset($_GET['index'])) {
    $index = $_GET['index'];
    if (isset($products[$index])) {
        $product = $products[$index];
    } else {
        echo "Produk tidak ditemukan.";
        exit;
    }
} else {
    echo "Index produk tidak diberikan.";
    exit;
}

// Memproses pembaruan data produk
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updatedProduct = [
        'name' => $_POST['name'],
        'price' => $_POST['price'],
        'stock' => $_POST['stock'],
        'image' => $_POST['image'] ?? $product['image'], // Menggunakan gambar lama jika tidak diubah
    ];

    // Memperbarui produk dalam array
    $products[$index] = $updatedProduct;
    $_SESSION['products'] = $products; // Menyimpan kembali produk ke sesi

    // Redirect kembali ke halaman data barang setelah berhasil
    header("Location: data_barang.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Produk</title>
</head>
<body>
    <!-- Header Section -->
    <header>
        <nav class="navbar">
            <div class="container">
                <div class="logo">
                    <h1>CORKCICLE</h1>
                </div>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="catalog.php">Katalog</a></li>
                    <li><a href="data_barang.php">Data Barang</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main>
        <div class="container">
            <h1>Edit Produk</h1>
            <form action="edit_product.php?index=<?php echo $index; ?>" method="POST">
                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" id="price" name="price" value="<?php echo $product['price']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stok</label>
                    <input type="number" id="stock" name="stock" value="<?php echo $product['stock']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="image">Gambar (URL)</label>
                    <input type="text" id="image" name="image" value="<?php echo $product['image']; ?>">
                </div>
                <button type="submit" class="btn">Simpan Perubahan</button>
            </form>
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <div class="container">
        <p>&copy; 2024 CORKCICLE.By Bunga.</p>
        </div>
    </footer>
</body>
</html>
