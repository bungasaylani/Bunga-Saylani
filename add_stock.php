<?php
session_start();

$products = $_SESSION['products'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productIndex = $_POST['product'] ?? null;
    $additionalStock = intval($_POST['stock'] ?? 0);

    if ($productIndex !== null && isset($products[$productIndex])) {
        $products[$productIndex]['stock'] += $additionalStock;
        $_SESSION['products'] = $products;
        $message = "Stok berhasil ditambahkan!";
    } else {
        $message = "Produk tidak ditemukan.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Stok</title>
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
            <h1>Tambah Stok</h1>
            <?php if (isset($message)) : ?>
                <p class="success-message"><?php echo $message; ?></p>
            <?php endif; ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="product">Pilih Produk:</label>
                    <select name="product" id="product" required>
                        <option value="" disabled selected>Pilih produk untuk menambah stok</option>
                        <?php foreach ($products as $index => $product) : ?>
                            <option value="<?php echo $index; ?>">
                                <?php echo $product['name'] ?? 'Produk Tidak Bernama'; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="stock">Tambahkan Stok:</label>
                    <input type="number" name="stock" id="stock" min="1" required>
                </div>
                <br>
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
