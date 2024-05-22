<?php require "partials/head.php" ?>


<?php require "partials/nav.php" ?>

<main class="w-full flex flex-col overflow-hidden" x-data="{ isOpen: false, isFeedbackOpen = false }">

    <?php require "partials/unit-add-banner.php" ?>

    <!-- Add login success feedback -->
    <?php if (isset($errors['alreadyExist'])): ?>

        <div x-data="{isExist: true }" x-show=" isExist" x-cloak
            x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0
    scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95" class="fixed inset-0 z-10 overflow-y-auto">

            <div class="flex items-center justify-center min-h-screen px-4 text-center sm:p-0">
                <div class="fixed inset-0">
                    <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block px-4 pt-5 pb-4 overflow-hidden flex flex-col text-center align-bottom transition-all transform rounded-lg shadow-xl bg-gray-950 sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">

                    <label class="text-md text-red-500 mb-5" for="floorNumber">This Unit Already Exist.</label>

                    <div>

                        <label @click="isExist = false"
                            class="px-10 py-2 mt-3 w-40 cursor-pointer text-white text-sm font-medium border-gray-500 text-center border rounded-md hover:bg-gray-900 transition-colors duration-300 transform">Close</a>
                    </div>

                </div>
            </div>
        </div>



    <?php endif; ?>

    <section
        class="mx-auto p-12 items-center overflow-hidden w-full max-h-screen overflow-y-scroll justify-items-center"
        style="max-height: calc(100vh - 110px);">

        <div class="bg-gray-950 rounded-md p-6">
            <form method="POST">
                <div class="space-y-12">

                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-xl font-bold leading-7 text-gray-300">Unit</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-400">Fill out all the necessary details about the
                            unit.
                        </p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 md:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="unitNumber" class="block text-sm font-medium leading-6 text-gray-300">
                                    Unit Number</label>
                                <div class="mt-2">
                                    <input type="text" name="unitNumber" id="unitNumber" placeholder="Unit Number"
                                        value="<?= $_POST['unitNumber'] ?? '' ?>"
                                        class="block bg-gray-800 w-full rounded-md border border-gray-600 <?= isEmpty('unitNumber'); ?> py-1.5 text-gray-300 shadow-sm placeholder:text-gray-400 sm:text-sm sm:leading-6">
                                    <?php if (isset($errors['body'])): ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="sm:col-span-3">

                                <label for="unitType" class="block text-sm font-medium leading-6 text-gray-300">Unit
                                    Type</label>
                                <div class="mt-2">

                                    <select name="unitType" id="unitType"
                                        class="w-full rounded-md bg-gray-800 text-gray-300 py-1.5 <?= isEmpty('unitType'); ?>">

                                        <option value="">Select Unit Type</option>

                                        <?php foreach ($unitTypes as $unitType): ?>
                                            <option value="<?= $unitType['type_id'] ?>"><?= $unitType['unit_type'] ?>
                                            </option>
                                        <?php endforeach; ?>


                                    </select>
                                    <?php if (isset($errors['unitType'])): ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['unitType'] ?></p>
                                    <?php endif; ?>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <hr class="border-gray-800 my-2">
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="/floor?floor_id=<?= $floor['floor_id'] ?>" class=" min-w-10 flex font-medium px-5 border border-gray-200 py-2 text-sm text-gray-200
                        hover:bg-gray-900 transition-colors duration-200 rounded-lg shrink-0 sm:w-auto">Cancel</a>
                    <button type="submit" name="addUnit"
                        class="min-w-10 flex font-medium px-6 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-600 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-sky-500 ">Add
                        Unit</button>
                </div>
            </form>
        </div>

    </section>

    <?php if (isset($errors['body'])): ?>
        <div x-data="{ isFeedbackOpen: true }">
            <div x-show="isFeedbackOpen" x-cloak x-transition:enter="transition ease-out duration-300 transform"
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
                        class="inline-block px-4 pt-5 pb-4 overflow-hidden flex flex-col text-center align-bottom transition-all transform rounded-lg shadow-xl bg-gray-950 sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">

                        <label class="text-md text-yellow-400 mb-5" for="floorNumber">Please fill out all the necessary
                            information!</label>

                        <div>
                            <button @click="isFeedbackOpen = false"
                                class="px-10 py-2 mt-3 w-40 cursor-pointer text-white text-sm font-medium border-gray-500 text-center border rounded-md hover:bg-gray-900 transition-colors duration-300 transform">
                                OK
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>



<?php require "partials/foot.php" ?>