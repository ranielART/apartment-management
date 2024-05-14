<?php require "partials/head.php" ?>


<?php require "partials/nav.php" ?>

<main class="w-full flex flex-col overflow-hidden" x-data="{ isOpen: false }">

    <header class="bg-gray-950 shadow-lg shadow mx-10 mt-8 rounded-md overflow-hidden">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-gray-200">
                <?= $heading; ?>
            </h1>



            <div>


                <button @click="isOpen = !isOpen" type="button"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 hover:bg-blue-900 rounded-lg">
                    Add Floor
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="rtl:rotate-180 w-5 h-5 ms-2">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path
                            d="M11 11V7H13V11H17V13H13V17H11V13H7V11H11ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20Z">
                        </path>
                    </svg>
                </button>

            </div>
        </div>
    </header>


    <!-- Add Floor Modal -->







    <div class="relative flex justify-center">

        <div x-show="isOpen" x-cloak x-transition:enter="transition ease-out duration-300 transform"
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

                        <div class="mt-4">
                            <label class="text-md text-gray-400 " for="floorNumber">Floor
                                Name:</label>

                            <div class="flex flex-col mt-2">
                                <input type="text" name="floorNumber"
                                    class="w-full h-10 px-4 text-sm text-gray-300 bg-gray-950 border <?= isEmpty('floorNumber') ?> rounded-md"
                                    placeholder="Enter the floor number...">

                                <?php if (isset($errors['floorNumber'])): ?>
                                <p class="text-red-500 text-xs"><?= $errors['floorNumber'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="mt-4 sm:mt-6 grid grid-cols-1 gap-x-2 sm:grid-cols-2 sm:w-full">

                            <button @click="isOpen = false"
                                class=" px-4 py-2 mt-3 text-white text-sm font-medium border-gray-500 border rounded-md hover:bg-gray-900 transition-colors duration-300 transform">
                                Cancel
                            </button>

                            <button type="submit" name="addFloor"
                                class="text-center px-4 py-2 mt-3 text-white text-sm font-medium rounded-md bg-blue-700 hover:bg-blue-900 transition-colors duration-300 transform">
                                Add Floor
                            </button>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


    <section
        class="relative grid mx-auto md-10 mb-auto p-12 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-4 gap-6 items-center overflow-hidden w-full max-h-screen overflow-y-scroll justify-items-center">

        <?php foreach ($floors as $floor): ?>
        <div
            class="min-w-64 md:min-w-56 lg:max-w-md border 2xl:min-w-64 rounded-lg bg-gray-950 border-gray-700 shadow-lg">

            <div class="p-5">

                <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-200 tracking-wider">
                    <?= $floor['floor_number'] ?>
                </h5>

                <ul>
                    <li class="mb-2 font-normal text-gray-500 ">Total Units:
                        <?= $floor['total_units'] ?? '0' ?>
                    </li>
                    <li class="mb-5 font-normal text-gray-500 ">Units Occupied:
                        <?= $floor['units_occupied'] ?? '0' ?>
                    </li>
                </ul>

                <div>
                    <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        View Floor
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>

            </div>
        </div>
        <?php endforeach; ?>



    </section>
</main>





<?php require "partials/foot.php" ?>