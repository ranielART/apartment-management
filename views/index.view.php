<?php require "partials/head.php" ?>


<section class="flex justify-center items-center m-auto min-h-screen"
    x-data="{isFeedLoggedIn: false, isNotEmpty: false, isRegisterSuccessful: false }">

    <!-- Register successful Modal -->
    <?php if (isset($_GET['register_successful_msg'])): ?>
        <div x-data="{isRegisterSuccessful: true }">
            <div x-show="isRegisterSuccessful" x-cloak x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start=" opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
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
                        <label class="text-md text-green-500 " for="floorNumber">User Registered Successfully!</label>
                        <label class="text-md text-green-500 mb-5" for="floorNumber">You can
                            now log in using your Username and Password.</label>

                        <div>
                            <a href="/"
                                class="px-10 py-2 cursor-pointer mt-3 w-40 text-white text-sm font-medium border-gray-500 text-center border rounded-md hover:bg-gray-900 transition-colors duration-300 transform">
                                Close
                            </a>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    <?php endif; ?>


    <!-- Empty Input -->
    <?php if (isset($errors['input'])): ?>

        <?php if (Validator::string($_POST['username']) || Validator::string($_POST['password'])): ?>
            <div x-data="{isNotEmpty: true }">
                <div x-show="isNotEmpty" x-cloak x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start=" opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
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

                            <label class="text-md text-red-500 mb-5" for="floorNumber">Please fill out all the inputs.</label>

                            <div>
                                <button
                                    class="px-10 py-2 cursor-pointer mt-3 w-40 text-white text-sm font-medium border-gray-500 text-center border rounded-md hover:bg-gray-900 transition-colors duration-300 transform"
                                    @click="isNotEmpty = false">
                                    Close
                                </button>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        <?php endif; ?>
    <?php endif; ?>

    <!-- Add Logout feedback -->
    <?php if (isset($_GET['logout_success'])): ?>
        <div x-data="{isLoggedOut: true }">
            <div x-show="isLoggedOut" x-cloak x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start=" opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
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

                        <label class="text-md font-medium text-green-500 mb-5" for="floorNumber">Log out
                            successfully.</label>

                        <div>
                            <a href="/"
                                class="px-10 py-2 cursor-pointer mt-3 w-40 text-white text-sm font-medium border-gray-500 text-center border rounded-md hover:bg-gray-900 transition-colors duration-300 transform"
                                @click="isLoggedOut = false">
                                Close
                            </a>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    <?php endif; ?>


    <!-- Add login unsuccessful feedback -->
    <?php if (isset($errors['userNamePassword'])): ?>
        <div x-data="{isFeedLoggedIn: true }">
            <div x-show="isFeedLoggedIn" x-cloak x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start=" opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
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

                        <label class="text-md text-red-500 mb-5" for="floorNumber">Wrong Username or Password</label>

                        <div>
                            <button
                                class="px-10 py-2 cursor-pointer mt-3 w-40 text-white text-sm font-medium border-gray-500 text-center border rounded-md hover:bg-gray-900 transition-colors duration-300 transform"
                                @click="isFeedLoggedIn = false">
                                Close
                            </button>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    <?php endif; ?>


    <div class="w-full max-w-sm py-6 px-8 m-auto mx-auto rounded-lg shadow-md bg-gray-950">
        <div class="flex flex-col mx-auto gap-y-3 items-center">

            <img class="w-auto h-11" src="art_logo.png" alt="">

            <label class="block text-lg text-gray-400 ">Apartment Admin Suite</label>
        </div>


        <form class="mt-6" method="POST">
            <div>
                <label for="username" class="block text-sm text-gray-200">Username</label>
                <input type="text" name="username" value="<?= $_POST['username'] ?? '' ?>"
                    class="block w-full px-4 py-2 mt-2 text-gray-400 border border-gray-700 <?= isEmpty('username') ?> rounded-lg bg-gray-900" />
            </div>

            <div class="mt-4">
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm text-gray-200">Password</label>

                </div>

                <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>"
                    class="block w-full px-4 py-2 mt-2 text-gray-400 border border-gray-700 <?= isEmpty('password') ?> rounded-lg bg-gray-900" />
            </div>

            <div class="mt-6">
                <button name="signIn"
                    class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                    Sign in
                </button>
            </div>
        </form>



        <p class="mt-8 text-xs font-light text-center text-gray-400"> Don't have an account? <a href="/register"
                class="font-medium text-gray-200 hover:underline">Create One</a></p>
    </div>

</section>






<?php require "partials/foot.php" ?>