<?php require "partials/head.php" ?>


<section class="flex justify-center items-center m-auto min-h-screen"
    x-data="{isFeedLoggedIn: false, isNotEmpty: false, isRegisterSuccessful: false }">


    <div class="w-full max-w-sm py-6 px-8 m-auto mx-auto rounded-lg shadow-md bg-gray-950">
        <div class="flex flex-col mx-auto gap-y-3 items-center">

            <img class="w-auto h-11" src="art_logo.png" alt="">

            <label class="block text-lg text-gray-400 ">Apartment Admin Suite</label>
        </div>

        <div class="flex-col text-center ">
            <h1 class="text-2xl text-red-700 my-9 font-medium">Unauthorized Access!</h1>
            <p class="text-sm font-light text-gray-400"> Please <a href="/"
                    class="font-medium text-gray-200 hover:underline">Log in</a> or <a href="/register"
                    class="font-medium text-gray-200 hover:underline">Register</a>.</p>


        </div>


    </div>

</section>






<?php require "partials/foot.php" ?>