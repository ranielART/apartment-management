<?php require "partials/head.php" ?>


<?php require "partials/nav.php" ?>

<main class="w-full flex flex-col overflow-hidden"
    x-data="{ isOpen: false, isFeedbackOpen: false, isDeleteConfirmation: false, isAddBillConfirm: false }">

    <?php require "partials/unit-add-banner.php" ?>

    <section
        class="mx-auto p-12 items-center overflow-hidden w-full max-h-screen overflow-y-scroll justify-items-center"
        style="max-height: calc(100vh - 110px);">


        <!-- Empty input modal feedback -->

        <form method="POST">
            <div class="flex justify-center flex-col bg-gray-950 rounded-md px-10 py-8 gap-y-3">
                <h2 class="text-2xl font-bold leading-7 text-gray-300">Bill Details</h2>
                <p class="mt-1 text-md leading-6 text-gray-500 mb-7">Enter all the necessary details about this
                    unit's bill.
                </p>

                <div class="grid grid-cols-1 gap-x-6 gap-y-8 ">

                    <div class="flex gap-x-6 md:grid md:grid-cols-6 gap-y-8 flex-col sm:col-span-3">
                        <div class="sm:col-span-3">
                            <label for="unitNum" class="block text-sm  font-medium leading-6 text-gray-300">
                                Unit Number</label>
                            <div class="mt-2">
                                <input type="text" readonly name="unitNum" id="unitNum" placeholder="Name"
                                    value="<?= $unitDetails['unit_number'] ?>"
                                    class="block bg-gray-900 w-full rounded-md outline-none focus:ring-0 border border-gray-800 py-1.5 text-gray-500 shadow-sm placeholder:text-gray-500 sm:text-sm sm:leading-6">

                            </div>
                        </div>

                        <div class="sm:col-span-3">

                            <label for="moveInDate" class="block text-sm  font-medium leading-6 text-gray-300">
                                Issue Date</label>

                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center px-3.5 pointer-events-none">
                                    <svg class="w-4 mt-2 h-4 text-gray-600" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>

                                <input datepicker-format="yyyy/mm/dd" type="text" readonly name="issueDate"
                                    value="<?= date('Y-m-d'); ?>" id="issueDate"
                                    class="bg-gray-900 mt-2 border focus:ring-0 placeholder:text-gray-500 border-gray-800 text-gray-500 text-sm rounded-lg w-full px-10"
                                    placeholder="Select date">
                            </div>

                        </div>

                    </div>

                    <div class="flex gap-x-6 md:grid md:grid-cols-6 gap-y-8 flex-col sm:col-span-3">

                        <div class="sm:col-span-3">
                            <label for="rentPrice" class="block text-sm  font-medium leading-6 text-gray-300">
                                Unit Price</label>
                            <div class="mt-2">
                                <input type="text" readonly name="rentPrice" id="rentPrice" placeholder="Name"
                                    value="<?= $unitDetails['rent_price'] ?>"
                                    class="block bg-gray-900 w-full rounded-md border border-gray-800 focus:ring-0 py-1.5 text-gray-500 shadow-sm placeholder:text-gray-500 sm:text-sm sm:leading-6">

                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="utilitiesBill" class="block text-sm  font-medium leading-6 text-gray-300">
                                Utilities Total</label>
                            <div class="mt-2">
                                <input type="number" name="utilitiesBill" id="utilitiesBill" autocomplete="off"
                                    placeholder="Name" value="<?= $unitDetails['unit_number'] ?>"
                                    class="block bg-gray-900 w-full rounded-md border border-gray-500 <?= isEmpty('utilitiesBill'); ?> py-1.5 text-gray-300 shadow-sm placeholder:text-gray-500 sm:text-sm sm:leading-6">

                            </div>
                        </div>

                    </div>

                    <div class="flex gap-x-6 md:grid md:grid-cols-6 gap-y-8 flex-col sm:col-span-3">
                        <div class="sm:col-span-3">

                            <label for="moveInDate" class="block text-sm  font-medium leading-6 text-gray-300">
                                Biling Period Start</label>

                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center px-3.5 pointer-events-none">
                                    <svg class="w-4 mt-2 h-4 text-gray-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>

                                <input datepicker datepicker-format="yyyy/mm/dd" type="text" name="billingPeriodStart"
                                    id="billingPeriodStart" autocomplete="off"
                                    class="bg-gray-900 mt-2 border placeholder:text-gray-500 border-gray-500 text-gray-300 text-sm rounded-lg w-full px-10 <?= isEmpty('billingPeriodStart'); ?>"
                                    placeholder="Select date">

                            </div>

                        </div>

                        <div class="sm:col-span-3">

                            <label for="moveInDate" class="block text-sm  font-medium leading-6 text-gray-300">
                                Due Date</label>

                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center px-3.5 pointer-events-none">
                                    <svg class="w-4 mt-2 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>

                                <input datepicker datepicker-format="yyyy/mm/dd" type="text" autocomplete="off"
                                    name="dueDate" id="dueDate"
                                    class="bg-gray-900 mt-2 border placeholder:text-gray-500 border-gray-500 text-gray-300 text-sm rounded-lg w-full px-10 <?= isEmpty('dueDate'); ?>"
                                    placeholder="Select date">

                            </div>

                        </div>

                    </div>

                </div>

                <hr class="border-gray-700 my-7">

                <div class="flex flex-row-reverse gap-x-2">

                    <label @click="isAddBillConfirm = true"
                        class="text-gray-400 cursor-pointer hover:bg-sky-500 font-medium text-white transition-colors duration-200 bg-blue-600 rounded-lg py-2 px-4">Add
                        Bill</label>

                    <a href="/floor?floor_id=<?= $_GET['floor_id'] ?>"
                        class="text-gray-400 hover:bg-red-500 font-medium cursor-pointer text-white transition-colors duration-200 bg-red-700 rounded-lg py-2 px-5">Cancel</a>

                </div>
            </div>

            <!-- Modal Add Bill Confirmation -->
            <div class="relative flex justify-center">

                <div x-show="isAddBillConfirm" x-cloak x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen px-4 text-center sm:p-0">
                        <div class="fixed inset-0">
                            <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                            aria-hidden="true">&#8203;</span>
                        <div
                            class="inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform rounded-lg shadow-xl bg-gray-950 sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">


                            <div class="flex justify-center">
                                <label class="text-yellow-500 font-medium">Are you sure you want to add this
                                    bill?</label>
                            </div>

                            <div class="mt-4 sm:mt-6 grid grid-cols-1 gap-x-2 sm:grid-cols-2 sm:w-full" @click="
                    isOpen=false">

                                <label @click="isAddBillConfirm = false"
                                    class="px-4 py-2 mt-3 text-white cursor-pointer text-sm font-medium border-gray-500 text-center border rounded-md hover:bg-gray-900 transition-colors duration-300 transform">Cancel</label>
                                <form method="POST">

                                    <button type="submit" name="addBill"
                                        class="text-center px-4 py-2 mt-3 text-white text-sm font-medium rounded-md bg-blue-700 hover:bg-blue-900 transition-colors duration-300 transform">
                                        Proceed
                                    </button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </form>

    </section>





    <!-- Empty Input Feedback Warning -->
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

    <!-- Invalid Date -->
    <?php if (isset($errors['date'])): ?>
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

                    <label class="text-md text-yellow-400 mb-5" for="floorNumber">Please fill a valid date format
                        YYYY-MM-DD!</label>

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