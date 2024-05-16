<?php require "partials/head.php" ?>


<section class="flex justify-center items-center m-auto">

    <div class="flex min-h-full flex-col justify-center bg-gray-950 rounded-md px-6 py-12 lg:px-8 mt-10 mb-10">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-7 w-auto" src="https://merakiui.com/images/logo.svg" alt="">

            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-300">Apartment Admin
                Suite
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="#" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-300">Username</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="block w-full bg-gray-800 rounded-md py-1.5 border  text-gray-400 border-gray-600 shadow-sm placeholder:text-gray-400  sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-300">Password</label>

                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full bg-gray-800 rounded-md py-1.5 border  text-gray-400 border-gray-600 shadow-sm placeholder:text-gray-400  sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-300">Confirm
                            Password</label>

                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full bg-gray-800 rounded-md py-1.5 border  text-gray-400 border-gray-600 shadow-sm placeholder:text-gray-400  sm:text-sm sm:leading-6">
                    </div>
                </div>


                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">

                <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign In</a>
            </p>
        </div>
    </div>

</section>






<?php require "partials/foot.php" ?>