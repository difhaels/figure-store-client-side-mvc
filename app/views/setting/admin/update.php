<div class="px-3 lg:px-16 pt-16 lg:pt-32 pb-4">
    <h1 class="mb-3">Update Admin</h1>
    <form action="<?= BASEURL ?>/admin/update" method="post">
        <input type="hidden" name="id" value="<?= $data['admin']['id'] ?>">
        <input type="text" class="border p-1" name="username" placeholder=" <?= $data['admin']['username'] ?>" required>
        <input type="text" class="border p-1" name="password" placeholder=" <?= $data['admin']['password'] ?>" required>
        <button type="submit" class="button-green">Update</button>
    </form>
</div>