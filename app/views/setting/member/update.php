<div class="px-3 lg:px-16 pt-16 lg:pt-32 pb-4">
    <h1 class="mb-3">Update Member</h1>
    <form action="<?= BASEURL ?>/member/update" method="post">
        <input type="hidden" name="id" value="<?= $data['member']['id'] ?>">
        <input type="text" class="border p-1" name="username" placeholder=" <?= $data['member']['username'] ?>" required>
        <input type="text" class="border p-1" name="password" placeholder=" <?= $data['member']['password'] ?>" required>
        <input type="text" class="border p-1" name="notlp" placeholder=" <?= $data['member']['notlp'] ?>" required>
        <input type="text" class="border p-1" name="nowa" placeholder=" <?= $data['member']['nowa'] ?>" required>
        <input type="text" class="border p-1" name="address" placeholder=" <?= $data['member']['address'] ?>" required>
        <input type="text" class="border p-1" name="email" placeholder=" <?= $data['member']['email'] ?>" required>
        <button type="submit" class="button-green">Update</button>
    </form>
</div>