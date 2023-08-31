<div class="py-20">
    <?php foreach ($data['informations'] as $information) : ?>
        <div class="bg-white w-[80%] lg:w-[35%] mx-auto px-3 py-4 rounded-lg my-5">
            <div class="flex items-center relative">
                <img src="../img/item/<?= $information['item_image'] ?>" alt="<?= $information['item_name'] ?>" class="h-16">
                <h1 class="pl-3"><?= $information['item_name'] ?></h1>
                <h1 class="font-bold absolute right-3">Rp<?= number_format($information['item_price'], 0, ',', '.'); ?></h1>
            </div>

            <div class="bg-slate-200 h-[1px] w-[100%] mx-auto mt-3"></div>

            <?php
            $textColor = "";
            $information["status"] === "sedang diproses!" ? $textColor = "text-green-500" :  $textColor =  "";
            ?>
            <h1 class="inline">Status : </h1>
            <h1 class="<?= $textColor ?> inline"><?= $information['status'] ?></h1>
        </div>
    <?php endforeach; ?>
    <?php if (!$data['informations']) : ?>
        <h1>Anda harus melakukan pemesanan terlebih dahulu</h1>
    <?php endif; ?>
</div>