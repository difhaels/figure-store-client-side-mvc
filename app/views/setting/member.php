<?php
if (isset($_POST['search'])) {
    $members = $data['search'];
} else {
    $members = $data['member'];
}
$no = 1;
?>
<div class="px-3 lg:px-16 pt-16 lg:pt-32 pb-4">
    <!-- Search -->
    <form action="" method="post" class="flex gap-3">
        <input type="text" name="key" placeholder="Cari Figure disini" autocomplete="off" class="search" id="key">
        <button type="submit" name="search" class="button-blue" id="search">Search</button>
    </form>
</div>

<div class="px-3 lg:px-16 pb-10">
    <table>
        <thead>
            <tr class="bg-slate-300 text-slate-600">
                <td class="border border-slate-600 p-1">No</td class="border border-slate-600 p-1">
                <td class="border border-slate-600 p-1">Username</td class="border border-slate-600 p-1">
                <td class="border border-slate-600 p-1">Password</td class="border border-slate-600 p-1">
                <td class="border border-slate-600 p-1">Nomer Telepon</td class="border border-slate-600 p-1">
                <td class="border border-slate-600 p-1">Nomer WA</td class="border border-slate-600 p-1">
                <td class="border border-slate-600 p-1">Address</td class="border border-slate-600 p-1">
                <td class="border border-slate-600 p-1">Email</td class="border border-slate-600 p-1">
                <td class="border border-slate-600 p-1">setting</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $member) : ?>
                <tr>
                    <td class="border border-slate-600 p-1"><?= $no ?></td class="border border-slate-600 p-1">
                    <td class="border border-slate-600 p-1"><?= $member['username'] ?></td class="border border-slate-600 p-1">
                    <td class="border border-slate-600 p-1"><?= $member['password'] ?></td class="border border-slate-600 p-1">
                    <td class="border border-slate-600 p-1"><?= $member['notlp'] ?></td class="border border-slate-600 p-1">
                    <td class="border border-slate-600 p-1"><?= $member['nowa'] ?></td class="border border-slate-600 p-1">
                    <td class="border border-slate-600 p-1"><?= $member['address'] ?></td class="border border-slate-600 p-1">
                    <td class="border border-slate-600 p-1"><?= $member['email'] ?></td class="border border-slate-600 p-1">
                    <td class="border border-slate-600 p-1">
                        <div class="flex gap-1">
                            <a class="button-yellow" href="<?= BASEURL ?>/member/updatePage/<?= $member['id'] ?>">update</a>
                            <a class="button-red" href="<?= BASEURL ?>/member/delete/<?= $member['id'] ?>">delete</a>
                        </div>
                    </td>
                    <?php $no++ ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>