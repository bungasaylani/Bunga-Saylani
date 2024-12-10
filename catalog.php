<?php
session_start();

// Assuming you have products in your session
$products = $_SESSION['products'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Katalog - CORKCICLE</title>
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

    <!-- Main Section -->
    <main>
        <section class="product-preview">
            <div class="container">
                <h2>Katalog Produk</h2>
                <div class="product-grid">
                    <?php if (!empty($products)) : ?>
                        <?php foreach ($products as $product) : ?>
                            <div class="product">
                                <img src="<?php echo $product['image'] ?? 'default.png'; ?>" alt="<?php echo $product['name'] ?? 'Produk'; ?>">
                                <h3><?php echo $product['name'] ?? 'Nama Tidak Tersedia'; ?></h3>
                                <p>Rp <?php echo isset($product['price']) ? number_format($product['price'], 2) : '0.00'; ?></p>
                                <p>Stok: <?php echo $product['stock'] ?? 0; ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>Tidak ada produk untuk ditampilkan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <p>&copy; 2024 E-Commerce. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
