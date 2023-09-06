<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Figure Store</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/output.css">
</head>

<body class="body">
    <nav>
        <!-- Sebelah kiri -->
        <div class="nav-tittle-flex-1">
            <?php if ($data['nav'] === "no") : ?>
                <h1 class="nav-tittle">FIGURE STORE</h1>
            <?php else : ?>
                <a href="<?= BASEURL ?>/<?= $data['nav'] ?>">
                    <img src="<?= BASEURL ?>/img/icon/back.png" alt="back" class="nav-a">
                </a>
            <?php endif; ?>
        </div>

        <!-- Sebelah kanan -->
        <div class="nav-tittle-flex-2">
            <?php if ($data['nav-short'] == "yes") : ?>
                <a href="<?= BASEURL ?>/setting">
                    <img src="<?= BASEURL ?>/img/icon/admin.png" class="nav-a">
                </a>
                <a href="<?= BASEURL ?>/logister">
                    <img src="<?= BASEURL ?>/img/icon/user.png" class="nav-a">
                </a>
                <a href="<?= BASEURL ?>/transaction/info">
                    <img src="<?= BASEURL ?>/img/icon/shop.png" class="nav-a">
                </a>
            <?php endif; ?>
        </div>
    </nav>