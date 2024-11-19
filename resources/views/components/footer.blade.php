<footer id="Footer" class="text-white"
    style="background-image: url('/lines/mesh4..svg'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="mx-auto w-full max-w-screen-xl px-8 py-5 lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="grid grid-cols-3 gap-8">
                <div>
                    <a href="#">
                        <img src="{{ asset('storage/logo/logo.png') }}" alt="Logo"
                            class="object-contain h-[60px] w-[60px]" />
                    </a>
                </div>
                <div>
                    <h2 class="mb-4 text-sm font-medium uppercase">Created By</h2>
                    <ul class="text-gray-400 font-sm">
                        <li class="mb-2">
                            <a href="https://www.instagram.com/ekizr_/?hl=id" class="hover:underline">
                                Firgi
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/dafyall/?hl=id" class="hover:underline">
                                Satria
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-4 text-sm font-medium uppercase">Follow Us</h2>
                    <ul class="text-gray-400 font-sm">
                        <li class="mb-2">
                            <a href="https://www.instagram.com/acetkjthree/?hl=id" class="hover:underline">
                                Instagram
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/@11TKJ3" class="hover:underline">
                                Youtube
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-2 border-gray-200 dark:border-gray-700 lg:my-8" />
        <div class="flex justify-center mt-4">
            <p class="text-[0.7rem] opacity-70">
                © {{ date('Y') }} Kelas XII RPL | Di Kelola Oleh Siswa RPL
            </p>
        </div>
    </div>
</footer>
