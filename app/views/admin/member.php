<?php
$members = $data['member'];
$no = 1;
?>
<div class="px-3 lg:px-16 pt-16 lg:pt-32 pb-4">
    <!-- tambah -->
    <div class="mb-3">
        <form action="<?= BASEURL ?>/member/settingAdd" method="post">
            <input type="text" placeholder="username" name="username" class="border p-1">
            <input type="text" placeholder="member" name="password" class="border p-1">
            <button type="submit" class="button-green">Add member</button>
        </form>
    </div>
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
                            <a class="button-yellow" href="<?= BASEURL ?>/member/settingUpdatePage/<?= $member['id'] ?>">update</a>
                            <a class="button-red" href="<?= BASEURL ?>/member/settingDelete/<?= $member['id'] ?>">delete</a>
                        </div>
                    </td>
                    <?php $no++ ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>