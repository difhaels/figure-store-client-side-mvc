<?php
$admins = $data['admin'];
$no = 1;
?>
<div class="px-3 lg:px-16 pt-16 lg:pt-32 pb-4">
    <!-- tambah -->
    <div class="mb-3">
        <form action="<?= BASEURL ?>/admin/add" method="post">
            <input type="text" placeholder="username" name="username" class="border p-1">
            <input type="text" placeholder="admin" name="password" class="border p-1">
            <button type="submit" class="button-green">Add admin</button>
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
                <td class="border border-slate-600 p-1">setting</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($admins as $admin) : ?>
                <tr>
                    <td class="border border-slate-600 p-1"><?= $no ?></td class="border border-slate-600 p-1">
                    <td class="border border-slate-600 p-1"><?= $admin['username'] ?></td class="border border-slate-600 p-1">
                    <td class="border border-slate-600 p-1"><?= $admin['password'] ?></td class="border border-slate-600 p-1">
                    <td class="border border-slate-600 p-1">
                        <div class="flex gap-1">
                            <a class="button-yellow" href="<?= BASEURL ?>/admin/updatePage/<?= $admin['id'] ?>">update</a>
                            <a class="button-red" href="<?= BASEURL ?>/admin/delete/<?= $admin['id'] ?>">delete</a>
                        </div>
                    </td>
                    <?php $no++ ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>