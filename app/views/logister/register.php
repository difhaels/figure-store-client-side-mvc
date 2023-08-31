<div class="bg-[#1B6B93] flex justify-center items-center h-screen nav-index">
    <div class="bg-white w-[500px] rounded-xl shadow-2xl">
        <form action="<?= BASEURL ?>/logister/register" method="post">
            <ul class="p-5">
                <li class="py-1">
                    <input type="text" name="username" placeholder="Username" required class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1">
                    <input type="password" name="password" placeholder="Password" required class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1">
                    <input type="password" name="password2" placeholder="Confirm Password" required class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1">
                    <input type="text" name="notlp" placeholder="Nomer Telepon" required class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1">
                    <input type="text" name="nowa" placeholder="Nomer Whatsapp" required class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1">
                    <input type="text" name="address" placeholder="Alamat" required class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1">
                    <input type="text" name="email" placeholder="Email" required class="w-full h-10 border-2 border-black rounded-lg px-3">
                </li>
                <li class="py-1">Already have account? <a href="<?= BASEURL ?>/logister" class="text-red-500">login</a></li>
                <li class="py-1">
                    <button type="submit" class="button-yellow">Register</button>
                </li>
            </ul>
        </form>
    </div>
</div>