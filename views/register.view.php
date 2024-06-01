<?php require "partials/head.php" ?>


<section class="flex justify-center items-center m-auto min-h-screen"
    x-data="{isFeedLoggedIn: false, isNotEmpty: false, isUsernameUnique = false, isPassConfrimSame = false }">

    <!-- Empty Input -->
    <?php if (isset($errors['input'])): ?>

    <?php if (Validator::string($_POST['name']) || Validator::string($_POST['username']) || Validator::string($_POST['password']) || Validator::string($_POST['passwordConfirm'])): ?>
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

    <!-- Passowrd and Confirm Password Not match  -->
    <?php if (isset($errors['notSamePass'])): ?>

    <div x-data="{isPassConfrimSame: true }">
        <div x-show="isPassConfrimSame" x-cloak x-transition:enter="transition ease-out duration-300 transform"
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

                    <label class="text-md text-red-500 mb-5" for="floorNumber">Password and Confirm Password does not
                        match.</label>

                    <div>
                        <button
                            class="px-10 py-2 cursor-pointer mt-3 w-40 text-white text-sm font-medium border-gray-500 text-center border rounded-md hover:bg-gray-900 transition-colors duration-300 transform"
                            @click="isPassConfrimSame = false">
                            Close
                        </button>

                    </div>

                </div>
            </div>
        </div>

    </div>

    <?php endif; ?>



    <!-- User Name exist Input -->
    <?php if (isset($errors['userName'])): ?>

    <div x-data="{isUsernameUnique: true }">
        <div x-show="isUsernameUnique" x-cloak x-transition:enter="transition ease-out duration-300 transform"
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

                    <label class="text-md text-red-500 mb-5" for="floorNumber">Username Already Exist.</label>

                    <div>
                        <button
                            class="px-10 py-2 cursor-pointer mt-3 w-40 text-white text-sm font-medium border-gray-500 text-center border rounded-md hover:bg-gray-900 transition-colors duration-300 transform"
                            @click="isUsernameUnique = false">
                            Close
                        </button>

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


    <div class="w-full max-w-xl py-6 px-8 m-auto mx-auto rounded-lg shadow-md bg-gray-950">
        <div class="flex flex-col mx-auto gap-y-3 items-center">
            <img class="w-auto h-11" src="art_logo.png " alt="">
            <label class="block text-lg text-gray-200 ">Apartment Admin Suite</label>
        </div>


        <form method="POST">

            <div class="mt-6 md:grid md:grid-cols-6 w-full md:gap-x-9 md:gap-y-6">

                <div class="mt-4 md:mt-0 col-span-3">
                    <label for="name" class="block text-sm text-gray-200">Name</label>
                    <input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-400 border border-gray-700 <?= isEmpty('name') ?> rounded-lg bg-gray-900" />
                </div>

                <div class="mt-4 md:mt-0 col-span-3">
                    <label for="username" class="block text-sm text-gray-200">Username</label>
                    <input type="text" name="username" value="<?= $_POST['username'] ?? '' ?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-400 border <?php echo $isUnique = (isset($errors['userName']) ? 'border-red-500 border-2' : 'border-gray-700') ?> <?= isEmpty('username') ?> rounded-lg bg-gray-900" />
                </div>

                <div class="mt-4 md:mt-0 col-span-3">
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm text-gray-200">Password</label>

                    </div>

                    <input type="password" name="password" value="<?= $_POST['password'] ?? '' ?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-400 border <?php echo $isMatched = (isset($errors['notSamePass']) ? 'border-red-500 border-2' : 'border-gray-700') ?> <?= isEmpty('username') ?> <?= isEmpty('password') ?> rounded-lg bg-gray-900" />
                </div>

                <div class="mt-4 md:mt-0 col-span-3">
                    <div class="flex items-center justify-between">
                        <label for="passwordConfirm" class="block text-sm text-gray-200">Confirm Password</label>

                    </div>

                    <input type="password" name="passwordConfirm" value="<?= $_POST['passwordConfirm'] ?? '' ?>"
                        class="block w-full px-4 py-2 mt-2 text-gray-400 border <?php echo $isMatched = (isset($errors['notSamePass']) ? 'border-red-500 border-2' : 'border-gray-700') ?> <?= isEmpty('passwordConfirm') ?> rounded-lg bg-gray-900" />
                </div>

            </div>
            <div class="mt-6 flex justify-center text-center">
                <button name="register"
                    class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                    Register
                </button>
            </div>
        </form>



        <p class="mt-8 text-xs font-light text-center text-gray-400"> Already have an account? <a href="/"
                class="font-medium text-gray-200 hover:underline">Log in</a></p>
    </div>

</section>






<?php require "partials/foot.php" ?>