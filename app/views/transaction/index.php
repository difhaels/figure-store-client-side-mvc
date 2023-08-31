<div class="flex justify-center flex-wrap">
    <div class="w-full lg:w-2/5 pt-16 lg:pt-28 bg-slate-200 pb-10 lg:pb-24">

        <div class="relative pb-5">
            <div class="bg-slate-600 h-[3px] w-[90%] mx-auto my-5"></div>
            <div class="flex items-center text-slate-600 text-lg absolute -top-[14px] left-9 lg:left-16">
                <div class="bg-slate-200 border-2 border-slate-600 rounded-full mr-5 w-7 h-7 flex justify-center items-center">
                    <h1>1</h1>
                </div>
                <h1 class="bg-slate-200">Item Information</h1>
            </div>
        </div>

        <div class="bg-white flex items-center w-[80%] mx-auto px-3 py-4 rounded-lg relative">
            <img src="<?= BASEURL ?>/img/item/<?= $_POST["item_image"] ?>" alt="image" class="h-16 pr-3">
            <div class="pr-32">
                <h1><?= $_POST["item_type"] ?> <?= $_POST["item_source"] ?> <?= $_POST["item_name"] ?></h1>
            </div>
            <h1 class="font-bold absolute right-3">Rp<?= number_format($_POST['item_price'], 0, ',', '.'); ?></h1>
        </div>

        <div class="bg-white flex items-center w-[80%] mx-auto px-3 py-4 rounded-lg mt-3 relative">
            <img src="<?= BASEURL ?>/img/icon/cost.png" alt="image" class="h-16 pr-3">
            <div>
                <h1>Shipping cost</h1>
            </div>
            <h1 class="font-bold absolute right-3">Rp 9.999.999</h1>
        </div>

        <div class="bg-slate-300 h-[2px] w-[80%] mx-auto mt-3"></div>

        <div class="w-[80%] mx-auto mt-3 flex justify-between px-1 font-bold text-lg">
            <h1>Total</h1>
            <?php
            $total = $_POST["item_price"] + 9999999;
            ?>
            <h1>Rp<?= number_format($total, 0, ',', '.'); ?></h1>
        </div>

    </div>

    <div class="w-full lg:w-3/5 pt-16 lg:pt-28 pb-24">
        <div class="relative pb-5">
            <div class="bg-slate-600 h-[3px] w-[90%] mx-auto my-5"></div>
            <div class="flex items-center text-slate-600 text-lg absolute -top-[14px] left-9 lg:left-16">
                <div class="bg-white border-2 border-slate-600 rounded-full mr-5 w-7 h-7 flex justify-center items-center">
                    <h1>2</h1>
                </div>
                <h1 class="bg-white">Client Information</h1>
            </div>
        </div>

        <form action="transaction/process" method="post" enctype="multipart/form-data" class="px-10">
            <input type="hidden" name="username" value="<?= $_SESSION["username"] ?>">
            <input type="hidden" name="notlp" value="<?= $_SESSION["notlp"] ?>">
            <input type="hidden" name="address" value="<?= $_SESSION["address"] ?>">
            <input type="hidden" name="item_image" value="<?= $_POST["item_image"] ?>">
            <input type="hidden" name="item_name" value="<?= $_POST["item_name"] ?>">

            <input type="hidden" name="item_price" value="<?= $total ?>">

            <div class="border border-slate-600 px-3 py-2 rounded-lg mb-3">
                <h1 class="text-slate-600">Username</h1>
                <input type="text" placeholder="<?= $_SESSION["username"] ?>" name="transaction_name" class="w-full focus:outline-none">
            </div>
            <div class="border border-slate-600 px-3 py-1 rounded-lg mb-3">
                <h1 class="text-slate-600">Nomer telepon</h1>
                <input type="text" placeholder="<?= $_SESSION["notlp"] ?>" name="transaction_notlp" class="w-full focus:outline-none">
            </div>
            <div class="border border-slate-600 px-3 py-1 rounded-lg mb-3">
                <h1 class="text-slate-600">Alamat</h1>
                <input type="text" placeholder="<?= $_SESSION["address"] ?>" name="transaction_address" class="w-full focus:outline-none">
            </div>
            <div class="py-3">
                <div class="p-1 border border-slate-600">
                    <h1>Tranfer hanya ke REK BCA : 8888UwU8888</h1>
                    <h1>Tranfer harus sesuai total yang sudah ditentukan</h1>
                    <h1>Upload bukti tranfer diperlukan</h1>
                </div>
                <label for="transaction_info">Upload proof of payment</label>
                <input type="file" name="transaction_info" id="transaction_info" required class="py-3">
            </div>
            <button type="submit" class="button-green">Send</button>
        </form>

    </div>
</div>