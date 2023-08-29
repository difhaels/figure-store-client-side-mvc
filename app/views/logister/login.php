<div class="bg-[#1B6B93] flex justify-center items-center h-screen nav-index">
    <ul>
        <?php foreach ($data['user'] as $name) : ?>
            <li><?= $name['username'] ?></li>
        <?php endforeach; ?>
    </ul>
    <div class="bg-white w-[500px] rounded-xl shadow-2xl">
        <form action="" method="post">
            <ul class="p-5">
                <li class="py-1">
                    <input type="text" name="username" placeholder="Username" class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1">
                    <input type="password" name="password" placeholder="Password" class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1 px-1 flex justify-between">
                    <div>
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="<?= BASEURL ?>/logister/register" class="text-red-500">register</a>
                </li>
                <li class="py-1">
                    <button type="submit" name="login" class="button-yellow">Login</button>
                </li>
            </ul>
        </form>
    </div>
</div>