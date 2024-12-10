<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $price = intval($_POST['price'] ?? 0);
    $stock = intval($_POST['stock'] ?? 0);
    $image = $_POST['image'] ?? 'default.png';

    // Tambahkan produk ke dalam sesi
    $_SESSION['products'][] = [
        'name' => $name,
        'price' => $price,
        'stock' => $stock,
        'image' => $image,
    ];

    $message = "Produk berhasil ditambahkan!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Produk</title>
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
            <h1>Tambah Produk</h1>
            <?php if (isset($message)) : ?>
                <p class="success-message"><?php echo $message; ?></p>
            <?php endif; ?>
            <form action="" method="POST">
                <label for="name">Nama Produk:</label>
                <input type="text" name="name" id="name" required>
                <br><br>
                <label for="price">Harga:</label>
                <input type="number" name="price" id="price" required>
                <br><br>
                <label for="stock">Stok:</label>
                <input type="number" name="stock" id="stock" required>
                <br><br>
                <label for="image">URL Gambar:</label>
                <input type="text" name="image" id="image">
                <br><br>
                <button type="submit">Tambah</button>
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
