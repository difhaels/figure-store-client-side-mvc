<h1 class="nav-index">Daftar nama figure</h1>
<ul>
    <?php foreach ($data['item'] as $item) : ?>
        <li><?= $item['item_name'] ?></li>
    <?php endforeach; ?>
</ul>