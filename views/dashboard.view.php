<?php require "partials/head.php" ?>


<?php require "partials/nav.php" ?>

<main class="w-full flex flex-col">

    <?php require "partials/banner.php" ?>

    <section
        class="grid mx-auto md-10 mb-auto  p-12 grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 items-center overflow-hidden w-full max-h-screen overflow-y-scroll justify-items-center"
        x-data="{isFeedLoggedIn: false }">

        <!-- Modal Log out Confirmation -->
        <?php if (isset($_GET['logout_msg'])): ?>
            <div x-data="{isLogOut: true }" x-show="isLogOut" x-cloak
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex items-center justify-center min-h-screen px-4 text-center sm:p-0">
                    <div class="fixed inset-0">
                        <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform rounded-lg shadow-xl bg-gray-950 sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">

                        <form method="POST">
                            <div class="flex justify-center">
                                <label class="text-red-500 font-medium">Are you sure you want to log out?</label>
                            </div>

                            <div class="mt-4 sm:mt-6 grid grid-cols-1 gap-x-2 sm:grid-cols-2 sm:w-full" @click="
    isOpen=false">

                                <a @click="isLogOut = false" href="/dashboard"
                                    class="px-4 py-2 mt-3 text-white cursor-pointer text-sm font-medium border-gray-500 text-center border rounded-md hover:bg-gray-900 transition-colors duration-300 transform">Cancel</a>



                                <button type="submit" name="logOut"
                                    class="text-center px-4 py-2 mt-3 text-white text-sm font-medium rounded-md bg-blue-700 hover:bg-blue-900 transition-colors duration-300 transform">
                                    Proceed
                                </button>


                            </div>

                        </form>

                    </div>
                </div>
            </div>


        <?php endif; ?>


        <!-- Add login success feedback -->
        <?php if (isset($_GET['login_successful_msg'])): ?>

            <div x-data="{isFeedLoggedIn: true }" x-show=" isFeedLoggedIn" x-cloak
                x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0
                scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="fixed inset-0 z-10 overflow-y-auto">

                <div class="flex items-center justify-center min-h-screen px-4 text-center sm:p-0">
                    <div class="fixed inset-0">
                        <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block px-4 pt-5 pb-4 overflow-hidden flex flex-col text-center align-bottom transition-all transform rounded-lg shadow-xl bg-gray-950 sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">

                        <label class="text-md text-green-400 mb-5" for="floorNumber">Log in Successful.</label>

                        <div>

                            <label @click="isFeedLoggedIn = false"
                                class="px-10 py-2 mt-3 w-40 cursor-pointer text-white text-sm font-medium border-gray-500 text-center border rounded-md hover:bg-gray-900 transition-colors duration-300 transform">Close</a>
                        </div>

                    </div>
                </div>
            </div>



        <?php endif; ?>








        <div
            class="min-w-64 md:min-w-56 lg:max-w-md border 2xl:min-w-64 rounded-lg bg-gray-950 border-gray-700 shadow-lg ">

            <div class="p-5">

                <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-200 tracking-wider">
                    Floors
                </h5>
                <hr class="border-blue-700">
                <ul>
                    <li class="my-3 font-normal text-gray-500 ">
                        Total: <?= $numOfFloors ?>
                    </li>

                </ul>

            </div>
        </div>

        <div
            class="min-w-64 md:min-w-56 lg:max-w-md border 2xl:min-w-64 rounded-lg bg-gray-950 border-gray-700 shadow-lg ">

            <div class="p-5">

                <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-200 tracking-wider">
                    Units
                </h5>
                <hr class="border-blue-700">
                <ul>
                    <li class="my-3 font-normal text-gray-500 ">
                        Total: <?= $numOfUnits ?>
                    </li>

                </ul>


            </div>
        </div>

        <div
            class="min-w-64 md:min-w-56 lg:max-w-md border 2xl:min-w-64 rounded-lg bg-gray-950 border-gray-700 shadow-lg ">

            <div class="p-5">

                <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-200 tracking-wider">
                    Tenants
                </h5>
                <hr class="border-blue-700">
                <ul>
                    <li class="my-3 font-normal text-gray-500 ">
                        Total: <?= $numOfTenants ?>
                    </li>

                </ul>


            </div>
        </div>

        <div class="min-w-64 md:min-w-56 border 2xl:min-w-64 rounded-lg bg-gray-950 border-gray-700 shadow-lg ">

            <div class="p-5">

                <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-200 tracking-wider">
                    Unit Types
                </h5>
                <hr class="border-blue-700">
                <ul>
                    <li class="my-3 font-normal text-gray-500 ">
                        Total: <?= $numOfTypes ?>
                    </li>

                </ul>


            </div>
        </div>
    </section>
</main>





<?php require "partials/foot.php" ?>