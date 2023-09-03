<div class="pt-16 pb-32 lg:pt-24 px-10 nav-index">
    <h1>Username : <?= $data['client']["username"] ?></h1>
    <h1>No Telepon : <?= $data['client']["notlp"] ?></h1>
    <h1>No Whatsapp: <?= $data['client']["nowa"] ?></h1>
    <h1>Alamat : <?= $data['client']["address"] ?></h1>
    <h1>Email : <?= $data['client']["email"] ?></h1>
    <div class="mt-5">
        <a href="<?= BASEURL ?>/member/updatePage/<?= $_SESSION['id-login'] ?>" class="button-yellow">Update Data</a>
        <a href="<?= BASEURL ?>/logister/logout" class="button-red">Logout</a>
    </div>
</div>