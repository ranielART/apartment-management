<?php require "partials/head.php" ?>


<?php require "partials/nav.php" ?>

<main class="w-full flex flex-col overflow-hidden" x-data="{ isOpen: false, isFeedbackOpen: false }">

    <?php require "partials/tenant-add-banner.php" ?>

    <section
        class="mx-auto p-12 items-center overflow-hidden w-full max-h-screen overflow-y-scroll justify-items-center"
        style="max-height: calc(100vh - 110px);">

        <div class="mx-auto bg-gray-950 rounded-md p-8 max-w-lg">
            <form method="POST">
                <div class="space-y-12">

                    <div class="border-b border-gray-900/10">
                        <h2 class="text-xl font-bold leading-7 text-gray-300">Tenant Details</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-400">You can edit the personal information of tenants
                            in this section.
                        </p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 ">

                            <div class="sm:col-span-3">
                                <label for="tenantName" class="block text-sm  font-medium leading-6 text-gray-300">
                                    Name</label>
                                <div class="mt-2">
                                    <input type="text" name="tenantName" id="tenantName" placeholder="Name"
                                        value="<?= $tenant['tenant_name'] ?>"
                                        class="block bg-gray-800 w-full  rounded-md border border-gray-600 <?= isEmpty('tenantName'); ?> py-1.5 text-gray-300 shadow-sm placeholder:text-gray-500 sm:text-sm sm:leading-6">

                                </div>
                            </div>

                            <div class="flex justify-between items-center gap-x-6 sm:col-span-3">
                                <div>

                                    <label for="tenantAge" class="block text-sm font-medium leading-6 text-gray-300">
                                        Age</label>
                                    <div class="mt-2">
                                        <input type="number" name="tenantAge" id="tenantAge" placeholder="Age"
                                            value="<?= $tenant['tenant_age'] ?>"
                                            class="py-1.5 ps-3 block bg-gray-800 w-full max-w-32 rounded-md border border-gray-600 <?= isEmpty('tenantAge'); ?> text-gray-300 shadow-sm placeholder:text-gray-500 sm:text-sm sm:leading-6">

                                    </div>

                                </div>

                                <div>

                                    <label for="moveInDate" class="block text-sm  font-medium leading-6 text-gray-300">
                                        Move In Date</label>

                                    <div class="relative max-w-sm">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center px-3.5 pointer-events-none">
                                            <svg class="w-4 mt-2 h-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>

                                        <input datepicker datepicker-format="yyyy/mm/dd" type="text" name="moveInDate"
                                            value="<?= $tenant['moveIn_date'] ?>" id="moveInDate"
                                            class="bg-gray-800 mt-2 border placeholder:text-gray-500 border-gray-600 text-gray-300 text-sm rounded-lg w-full px-10 <?= isEmpty('moveInDate'); ?>"
                                            placeholder="Select date">

                                    </div>

                                </div>

                            </div>


                            <div class="sm:col-span-3 ">

                                <label for="contactNumber" class="block text-sm  font-medium leading-6 text-gray-300">
                                    Contact Number</label>
                                <div class="mt-2">
                                    <input type="text" name="contactNumber" id="contactNumber"
                                        value="<?= $tenant['contact_number'] ?>" placeholder="Contact Number"
                                        class="block bg-gray-800 w-full  rounded-md border border-gray-600 <?= isEmpty('contactNumber'); ?> py-1.5 text-gray-300 shadow-sm placeholder:text-gray-500 sm:text-sm sm:leading-6">

                                </div>

                            </div>

                            <div class="sm:col-span-3 ">

                                <label for="address" class="block text-sm  font-medium leading-6 text-gray-300">
                                    Address</label>
                                <div class="mt-2">
                                    <input type="text" name="address" id="address" placeholder="Address"
                                        value="<?= $tenant['address'] ?>"
                                        class="block bg-gray-800 w-full  rounded-md border border-gray-600 <?= isEmpty('address'); ?> py-1.5 text-gray-300 shadow-sm placeholder:text-gray-500 sm:text-sm sm:leading-6">

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- EMERGENCY CONTACT -->
                    <hr class="border-gray-800 my-2">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-xl font-bold leading-7 text-gray-300">Emergency Contact</h2>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 ">

                            <div class="sm:col-span-3">
                                <label for="eName" class="block text-sm  font-medium leading-6 text-gray-300">
                                    Name</label>
                                <div class="mt-2">
                                    <input type="text" name="eName" id="eName" placeholder="Name" value=""
                                        class="block bg-gray-800 w-full  rounded-md border border-gray-600 py-1.5 text-gray-300 shadow-sm placeholder:text-gray-500 sm:text-sm sm:leading-6">

                                </div>
                            </div>

                            <div class="sm:col-span-3 ">

                                <label for="eContactNumber" class="block text-sm  font-medium leading-6 text-gray-300">
                                    Contact Number</label>
                                <div class="mt-2">
                                    <input type="text" name="eContactNumber" id="eContactNumber"
                                        placeholder="Contact Number"
                                        class="block bg-gray-800 w-full  rounded-md border border-gray-600  py-1.5 text-gray-300 shadow-sm placeholder:text-gray-500 sm:text-sm sm:leading-6">

                                </div>

                            </div>

                            <div class="sm:col-span-3 ">

                                <label for="eAddress" class="block text-sm  font-medium leading-6 text-gray-300">
                                    Address</label>
                                <div class="mt-2">
                                    <input type="text" name="eAddress" id="eAddress" placeholder="Address"
                                        class="block bg-gray-800 w-full  rounded-md border border-gray-600 py-1.5 text-gray-300 shadow-sm placeholder:text-gray-500 sm:text-sm sm:leading-6">

                                </div>

                            </div>

                        </div>

                    </div>


                </div>
                <hr class="border-gray-800 my-2 mt-12">
                <div class="mt-6 flex items-center justify-end gap-x-2 md:gap-x-4">
                    <label @click="isDeleteConfirmation = !isDeleteConfirmation"
                        class="text-gray-400 hover:bg-red-500 font-medium cursor-pointer text-white transition-colors duration-200 bg-red-700 rounded-lg py-1.5 px-5">Delete</label>
                    <button type="submit" name="updateTenant"
                        class="min-w-10 flex font-medium px-3 md:px-6 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-600 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-sky-500 ">Update</button>
                </div>
            </form>
        </div>

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

    </section>


</main>



<?php require "partials/foot.php" ?>