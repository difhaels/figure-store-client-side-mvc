<div class="pt-16 lg:pt-24 px-10 nav-index">
    <h1>Username : <?= $_SESSION["username"] ?></h1>
    <h1>No Telepon : <?= $_SESSION["notlp"] ?></h1>
    <h1>No Whatsapp: <?= $_SESSION["nowa"] ?></h1>
    <h1>Alamat : <?= $_SESSION["address"] ?></h1>
    <h1>Email : <?= $_SESSION["email"] ?></h1>
    <div class="mt-5">
        <a class="button-yellow">Edit</a>
        <a href="logout.php" class="button-red">Logout</a>
    </div>
</div>