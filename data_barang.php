<?php
session_start();

// Mendapatkan data produk dari sesi
$products = $_SESSION['products'] ?? [];

// Fungsi untuk menghapus produk
if (isset($_GET['delete'])) {
    $deleteIndex = $_GET['delete'];
    if (isset($products[$deleteIndex])) {
        unset($products[$deleteIndex]);
        $_SESSION['products'] = array_values($products); // Re-index array
    }
    // Redirect setelah menghapus
    header('Location: data_barang.php');
    exit;
}

// Fungsi untuk mengedit produk (bisa dikembangkan sesuai kebutuhan)
if (isset($_GET['edit'])) {
    $editIndex = $_GET['edit'];
    // Anda dapat mengarahkan pengguna ke halaman edit produk di sini, misalnya:
    header("Location: edit_product.php?index=$editIndex");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Data Barang</title>
</head>
<body>
    <!-- Header Section with Navbar -->
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
            <h1>Data Barang</h1>
            <div class="actions">
                <a href="add_product.php" class="btn">Tambah Produk</a>
                <a href="add_stock.php" class="btn">Tambah Stok</a>
                <a href="index.php" class="btn">Kembali ke Home</a>
            </div>
            
            <!-- Tabel Data Barang -->
            <table class="product-table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products)) : ?>
                        <?php foreach ($products as $index => $product) : ?>
                            <tr>
                                <td><img src="<?php echo $product['image'] ?? 'default.png'; ?>" alt="Product Image" class="product-image"></td>
                                <td><?php echo $product['name'] ?? 'Nama Tidak Tersedia'; ?></td>
                                <td>Rp <?php echo isset($product['price']) ? number_format($product['price'], 2) : '0.00'; ?></td>
                                <td><?php echo $product['stock'] ?? 0; ?></td>
                                <td>
                                    <a href="?edit=<?php echo $index; ?>" class="btn btn-edit">Edit</a>
                                    <a href="?delete=<?php echo $index; ?>" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">Tidak ada produk untuk ditampilkan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
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
