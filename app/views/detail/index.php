<div class="navigate">
    <h1><a href="../index.php">Home</a> > <a href="../index.php">item</a> > <span class="text-sky-500"><?= $data['item_name'] ?>#<?= $data['item_code'] ?></span></h1>
</div>
<div class="flex flex-wrap justify-center px-5">
    <div class="px-10">
        <img src="<?= BASEURL ?>/img/item/<?= $data['item_image'] ?>" alt="<?= $data['item_code'] ?>" class="detail-image mx-auto">
        <div class="flex justify-center gap-2 mt-2">
            <img src="<?= BASEURL ?>/img/sub/<?= $data['item_image1'] ?>" alt="<?= $data['item_code'] ?>1" class="detail-image">
            <img src="<?= BASEURL ?>/img/sub/<?= $data['item_image2'] ?>" alt="<?= $data['item_code'] ?>2" class="detail-image">
        </div>
        <div class="flex justify-center gap-2 mt-2">
            <img src="<?= BASEURL ?>/img/sub/<?= $data['item_image3'] ?>" alt="<?= $data['item_code'] ?>3" class="detail-image">
            <img src="<?= BASEURL ?>/img/sub/<?= $data['item_image4'] ?>" alt="<?= $data['item_code'] ?>4" class="detail-image">
        </div>
    </div>
    <div class="px-10 pt-[50px]">

        <h1 class="text-xl"><?= $data['item_source'] ?> - <?= $data['item_name'] ?> - <?= $data['item_type'] ?> #<?= $data['item_code'] ?></h1>

        <!-- Form untuk mengirim data item ke transaction -->
        <form action="../client/transaction.php" method="post">
            <input type="hidden" name="item_id" value="<?= $data['item_id'] ?>">
            <input type="hidden" name="item_name" value="<?= $data['item_name'] ?>">
            <input type="hidden" name="item_source" value="<?= $data['item_source'] ?>">
            <input type="hidden" name="item_type" value="<?= $data['item_type'] ?>">
            <input type="hidden" name="item_image" value="<?= $data['item_image'] ?>">
            <input type="hidden" name="item_price" value="<?= $data['item_price'] ?>">
            <button type="submit" class="mt-3  w-[210px] font-semibold flex justify-between button-red">
                <h1>Buy Now</h1>
                <h1>Rp <?= number_format($data['item_price'], 0, ',', '.'); ?></h1>
            </button>
        </form>

        <div class="flow">
            <h1 class="flow-text">Transaction Flow</h1>
            <div class="flex flex-wrap justify-center gap-2 lg:gap-3 pb-5">
                <div class="flow-icon">
                    <img src="<?= BASEURL ?>/img/icon/transfer.png" alt="transfer" class="h-10">
                    <h1>Transfer</h1>
                </div>
                <div class="flow-icon">
                    <img src="<?= BASEURL ?>/img/icon/send.png" alt="send" class="h-10">
                    <h1>Send</h1>
                </div>
                <div class="flow-icon">
                    <img src="<?= BASEURL ?>/img/icon/receive.png" alt="receive" class="h-10">
                    <h1>Receive</h1>
                </div>
            </div>
        </div>

        <div class="pt-7 flex gap-10">
            <div>
                <h1 class="text-slate-400">Type</h1>
                <h1><?= $data['item_type'] ?></h1>
            </div>
            <div>
                <h1 class="text-slate-400">Dimensions</h1>
                <h1><?= $data['item_dimensions'] ?></h1>
            </div>
            <div>
                <h1 class="text-slate-400">Material</h1>
                <h1><?= $data['item_material'] ?></h1>
            </div>
        </div>
    </div>
</div>