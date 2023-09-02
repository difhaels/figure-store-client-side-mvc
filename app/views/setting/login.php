<div class="bg-[#1B6B93] flex justify-center items-center h-screen nav-index">
    <div class="bg-white w-[500px] rounded-xl shadow-2xl">
        <form action="<?= BASEURL ?>/setting/login" method="post">
            <ul class="p-5">
                <li>Login Admin</li>
                <li class="py-1">
                    <input type="text" name="username" placeholder="Username" class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1">
                    <input type="password" name="password" placeholder="Password" class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1">
                    <button type="submit" class="button-yellow">Login</button>
                </li>
            </ul>
        </form>
    </div>
</div>