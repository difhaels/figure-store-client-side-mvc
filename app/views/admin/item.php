<div class="hidden lg:block">
    <div class="px-3 lg:px-16 pt-16 lg:pt-32 pb-10 flex flex-wrap items-center justify-between gap-3">
        <!-- Search -->
        <form action="" method="post" class="flex gap-3">
            <input type="text" name="key" placeholder="Cari Figure disini" autocomplete="off" class="search" id="key">
            <button type="submit" name="search" class="button-blue" id="search">Search</button>
        </form>

        <!-- tambah -->
        <a href="" class="button-green">Tambah Item</a>

        <!-- Sort -->
        <form id="sortForm" action="" method="post">
            <label for="sort" class="text-white">Sort By</label>
            <select id="sort" name="sort" class="mx-2 px-3 py-1 ">
                <option value="">Default</option>
                <option value="newest" <?php if (isset($_POST['sort']) && $_POST['sort'] === 'newest') echo 'selected'; ?>>Newest</option>
                <option value="oldest" <?php if (isset($_POST['sort']) && $_POST['sort'] === 'oldest') echo 'selected'; ?>>Oldest</option>
                <option value="highest" <?php if (isset($_POST['sort']) && $_POST['sort'] === 'highest') echo 'selected'; ?>>Highest Price</option>
                <option value="lowest" <?php if (isset($_POST['sort']) && $_POST['sort'] === 'lowest') echo 'selected'; ?>>Lowest Price</option>

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

    <?php
    if (isset($_POST['search'])) {
        $items = $data['search'];
    } else if (isset($_POST['sort'])) {
        $items = $data['sort'];
    } else {
        $items = $data['items'];
    }
    $no = 1;
    ?>

    <div class="items" id="items">
        <table>
            <thead>
                <tr>
                    <td class="border border-slate-600 p-1">No</td>
                    <td class="border border-slate-600 p-1">image</td>
                    <td class="border border-slate-600 p-1">name</td>
                    <td class="border border-slate-600 p-1">code</td>
                    <td class="border border-slate-600 p-1">stock</td>
                    <td class="border border-slate-600 p-1">price</td>
                    <td class="border border-slate-600 p-1">type</td>
                    <td class="border border-slate-600 p-1">source</td>
                    <td class="border border-slate-600 p-1">dimensions</td>
                    <td class="border border-slate-600 p-1">material</td>
                    <td class="border border-slate-600 p-1">image1</td>
                    <td class="border border-slate-600 p-1">image2</td>
                    <td class="border border-slate-600 p-1">image3</td>
                    <td class="border border-slate-600 p-1">image4</td>
                    <td class="border border-slate-600 p-1">setting</td>
                </tr>
            </thead>
            <?php foreach ($items as $item) : ?>
                <tbody>
                    <tr>
                        <td class="border border-slate-600 p-1"><?= $no ?></td>
                        <td class="border border-slate-600 p-1"><?= $item['item_image'] ?></td>
                        <td class="border border-slate-600 p-1"><?= $item['item_name'] ?></td>
                        <td class="border border-slate-600 p-1"><?= $item['item_code'] ?></td>
                        <td class="border border-slate-600 p-1"><?= $item['item_stock'] ?></td>
                        <td class="border border-slate-600 p-1"><?= $item['item_price'] ?></td>
                        <td class="border border-slate-600 p-1"><?= $item['item_type'] ?></td>
                        <td class="border border-slate-600 p-1"><?= $item['item_source'] ?></td>
                        <td class="border border-slate-600 p-1"><?= $item['item_dimensions'] ?></td>
                        <td class="border border-slate-600 p-1"><?= $item['item_material'] ?></td>
                        <td class="border border-slate-600 p-1"><?= $item['item_image1'] ?></td>
                        <td class="border border-slate-600 p-1"><?= $item['item_image2'] ?></td>
                        <td class="border border-slate-600 p-1"><?= $item['item_image3'] ?></td>
                        <td class="border border-slate-600 p-1"><?= $item['item_image4'] ?></td>
                        <td class="border border-slate-600 p-1">
                            <div class="flex gap-1">
                                <a class="button-yellow" href="<?= BASEURL ?>/admin/itemUpdate/<?= $item['item_id'] ?>">update</a>
                                <a class="button-green" href="<?= BASEURL ?>/admin/itemDelete/<?= $item['item_id'] ?>">delete</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <?php $no++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<div class="lg:hidden nav-index">
    <h1>*anda harus menggunakan komputer untuk mengakses ini</h1>
</div>