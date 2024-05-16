<?php require "partials/head.php" ?>


<?php require "partials/nav.php" ?>

<main class="w-full flex flex-col overflow-hidden" x-data="{ isOpen: false }">

    <?php require "partials/unit-add-banner.php" ?>


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
                                    <input type="text" name="unitNumber" id="unitNumber"
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
                                    <?php if (isset($errors['body'])): ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                                    <?php endif; ?>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

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


</main>



<?php require "partials/foot.php" ?>