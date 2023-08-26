<div class="px-3 lg:px-16 pt-16 lg:pt-32 pb-10 flex flex-wrap items-center justify-between gap-3">
    <!-- Search -->
    <form action="" method="post" class="flex gap-3">
        <input type="text" name="key" placeholder="Cari Figure disini" autocomplete="off" class="search" id="key">
        <button type="submit" name="search" class="button-blue" id="search">Search</button>
        <img src="./img/icon/loader.gif" class="h-8 loader hidden">
    </form>

    <!-- Sort -->
    <form id="sortForm" action="" method="get">
        <label for="sort" class="text-white">Sort By</label>
        <select id="sort" name="sort" class="mx-2 px-3 py-1 ">
            <option value="">Normal</option>
            <option value="newest" <?php if (isset($_GET['sort']) && $_GET['sort'] === 'newest') echo 'selected'; ?>>Newest</option>
            <option value="oldest" <?php if (isset($_GET['sort']) && $_GET['sort'] === 'oldest') echo 'selected'; ?>>Oldest</option>
            <option value="highest" <?php if (isset($_GET['sort']) && $_GET['sort'] === 'highest') echo 'selected'; ?>>Highest Price</option>
            <option value="lowest" <?php if (isset($_GET['sort']) && $_GET['sort'] === 'lowest') echo 'selected'; ?>>Lowest Price</option>
        </select>
    </form>
    <script>
        const selectElement = document.getElementById('sort');

        selectElement.addEventListener('change', function() {
            // Submit form secara otomatis saat pilihan dipilih
            document.getElementById('sortForm').submit();
        });
    </script>
</div>
<div class="items" id="items">

    <?php foreach ($data['item'] as $item) : ?>
        <div class="item">
            <a href="item/detail.php?item_id=<?= $item['item_id'] ?>">
                <img src="<?= BASEURL ?>/img/item/<?= $item["item_image"] ?>" alt="<?= $item["item_name"] ?>" class="item-image">
                <h1 class="text-center py-2"><?= $item["item_name"] ?></h1>
            </a>
            <div class="px-5 flex justify-center items-center gap-5 mb-4">
                <a href="item/detail.php?item_id=<?= $item['item_id'] ?>" class="button-red">
                    <div class="text-center text-[13px]">
                        <h1>PRE-ORDER</h1>
                        <strong>Rp. <?= number_format($item['item_price'], 0, ',', '.'); ?></strong>
                    </div>
                </a>
            </div>
        </div>
    <?php endforeach; ?>

</div>