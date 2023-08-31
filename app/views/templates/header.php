<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Figure Store ~ Client Side</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/output.css">
</head>

<body class="body">
    <nav>
        <div class="nav-tittle-flex-1">
            <?php if ($data['nav'] == "back-button") : ?>
                <a href="<?= BASEURL ?>">
                    <img src="<?= BASEURL ?>/img/icon/back.png" alt="back" class="nav-a">
                </a>
            <?php else : ?>
                <h1 class="nav-tittle">FIGURE STORE</h1>
                <h1 class="nav-sub-tittle">.client side</h1>
            <?php endif; ?>
        </div>
        <div class="nav-tittle-flex-2">
            <a href="<?= BASEURL ?>/logister">
                <img src="<?= BASEURL ?>/img/icon/user.png" class="nav-a">
            </a>
            <a href="<?= BASEURL ?>/transaction/info">
                <img src="<?= BASEURL ?>/img/icon/shop.png" class="nav-a">
            </a>
        </div>
    </nav>