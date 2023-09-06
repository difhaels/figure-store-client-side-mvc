<div class="nav-index px-10 pb-10">
    <h1>*Jangan diedit jika tidak ingin diedit</h1>
    <form action="<?= BASEURL ?>/item/update" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $data['update']["item_id"]; ?>">
        <input type="hidden" name="oldImage" value="<?= $data['update']["item_image"]; ?>">
        <input type="hidden" name="oldImage1" value="<?= $data['update']["item_image1"]; ?>">
        <input type="hidden" name="oldImage2" value="<?= $data['update']["item_image2"]; ?>">
        <input type="hidden" name="oldImage3" value="<?= $data['update']["item_image3"]; ?>">
        <input type="hidden" name="oldImage4" value="<?= $data['update']["item_image4"]; ?>">

        <div class="flex flex-wrap gap-3">

            <div class="border-2 border-black text-center w-[200px]">
                <h1 class="bg-[#E7230D] text-white">NAME</h1>
                <h1 class="bg-purple-500 text-white">OLD VALUE</h1>
                <h1>NEW VALUE (INPUT HERE)</h1>
            </div>

            <div class="border-2 border-black text-center w-[s200px]">
                <h1 class="bg-[#E7230D] text-white">Name</h1>
                <h1 class="bg-purple-500 text-white"><?= $data['update']["item_name"]; ?></h1>
                <input type="text" name="name" id="name" required value="<?= $data['update']["item_name"]; ?>" class="w-[80%]">
            </div>

            <div class="border-2 border-black text-center w-[200px]">
                <h1 class="bg-[#E7230D] text-white">Code</h1>
                <h1 class="bg-purple-500 text-white"><?= $data['update']["item_code"]; ?></h1>
                <input type="text" name="code" id="code" required value="<?= $data['update']["item_code"]; ?>" class="w-[80%]">
            </div>

            <div class="border-2 border-black text-center w-[200px]">
                <h1 class="bg-[#E7230D] text-white">Stock</h1>
                <h1 class="bg-purple-500 text-white"><?= $data['update']["item_stock"]; ?></h1>
                <input type="text" name="stock" id="stock" required value="<?= $data['update']["item_stock"]; ?>" class="w-[80%]">
            </div>

            <div class="border-2 border-black text-center w-[200px]">
                <h1 class="bg-[#E7230D] text-white">Price</h1>
                <h1 class="bg-purple-500 text-white"><?= $data['update']["item_price"]; ?></h1>
                <input type="text" name="price" id="price" required value="<?= $data['update']["item_price"]; ?>" class="w-[80%]">
            </div>

            <div class="border-2 border-black text-center w-[200px]">
                <h1 class="bg-[#E7230D] text-white">Type</h1>
                <h1 class="bg-purple-500 text-white"><?= $data['update']["item_type"]; ?></h1>
                <input type="text" name="type" id="type" required value="<?= $data['update']["item_type"]; ?>" class="w-[80%]">
            </div>

            <div class="border-2 border-black text-center w-[200px]">
                <h1 class="bg-[#E7230D] text-white">Source</h1>
                <h1 class="bg-purple-500 text-white"><?= $data['update']["item_source"]; ?></h1>
                <input type="text" name="source" id="source" required value="<?= $data['update']["item_source"]; ?>" class="w-[80%]">
            </div>

            <div class="border-2 border-black text-center w-[200px]">
                <h1 class="bg-[#E7230D] text-white">Dimensions</h1>
                <h1 class="bg-purple-500 text-white"><?= $data['update']["item_dimensions"]; ?></h1>
                <input type="text" name="dimensions" id="dimensions" required value="<?= $data['update']["item_dimensions"]; ?>" class="w-[80%]">
            </div>

            <div class="border-2 border-black text-center w-[200px]">
                <h1 class="bg-[#E7230D] text-white">Material</h1>
                <h1 class="bg-purple-500 text-white"><?= $data['update']["item_material"]; ?></h1>
                <input type="text" name="material" id="material" required value="<?= $data['update']["item_material"]; ?>" class="w-[80%]">
            </div>

        </div>

        <h1 class="pt-10 pb-1">*image, sub image diisi jika ada foto tambahan</h1>
        <h1 class="pb-3">*Refresh setelah update image, untuk melihat hasil</h1>

        <div class="flex flex-wrap gap-3">

            <div class="border-2 border-black text-center w-[200px]">
                <h1 class="bg-[#E7230D] text-white">Image</h1>
                <div class="bg-purple-500">
                    <img src="<?= BASEURL ?>/img/item/<?= $data['update']['item_image'] ?>" alt="image" class="h-32 ">
                </div>
                <input type="file" name="image" id="image">
            </div>

            <div class="border-2 border-black text-center w-[200px]">
                <h1 class="bg-[#E7230D] text-white">Sub-image1</h1>
                <div class="bg-purple-500">
                    <img src="<?= BASEURL ?>/img/sub/<?= $data['update']['item_image1'] ?>" alt="image1" class="h-32 ">
                </div>
                <input type="file" name="image1" id="image1">
            </div>

            <div class="border-2 border-black text-center w-[200px]">
                <h1 class="bg-[#E7230D] text-white">Sub-image2</h1>
                <div class="bg-purple-500">
                    <img src="<?= BASEURL ?>/img/sub/<?= $data['update']['item_image2'] ?>" alt="image2" class="h-32 ">
                </div>
                <input type="file" name="image2" id="image2">
            </div>

            <div class="border-2 border-black text-center w-[200px]">
                <h1 class="bg-[#E7230D] text-white">Sub-image3</h1>
                <div class="bg-purple-500">
                    <img src="<?= BASEURL ?>/img/sub/<?= $data['update']['item_image3'] ?>" alt="image3" class="h-32 ">
                </div>
                <input type="file" name="image3" id="image3">
            </div>

            <div class="border-2 border-black text-center w-[200px]">
                <h1 class="bg-[#E7230D] text-white">Sub-image4</h1>
                <div class="bg-purple-500">
                    <img src="<?= BASEURL ?>/img/sub/<?= $data['update']['item_image4'] ?>" alt="image4" class="h-32 ">
                </div>
                <input type="file" name="image4" id="image4">
            </div>

        </div>

        <button type="submit" name="submit" class="button-red mt-5">Submit</button>
    </form>
</div>