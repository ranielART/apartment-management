<?php require "partials/head.php" ?>


<?php require "partials/nav.php" ?>

<main class="w-full flex flex-col overflow-hidden"
    x-data="{ isOpen: false, isFeedbackOpen: false, isDeleteConfirmation: false, isAddBillConfirm: false, isBillOpen: false }">

    <?php require "partials/unit-add-banner.php" ?>

    <section
        class="mx-auto p-12 items-center overflow-hidden w-full max-h-screen overflow-y-scroll justify-items-center"
        style="max-height: calc(100vh - 110px);">

        <!-- View Bill Modal -->
        <?php if (isset($_GET['view_bill_modal'])): ?>
        <div x-data="{ isBillOpen: <?= $_GET['view_bill_modal'] ?> }">
            <div x-show="isBillOpen" x-cloak x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="fixed inset-0 z-10 overflow-y-auto">

                <div class="flex items-center justify-center min-h-screen px-4 sm:p-0">

                    <div class="fixed inset-0">
                        <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                    </div>

                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block px-4 pt-5 gap-y-5 pb-4 overflow-hidden flex flex-col align-bottom transition-all transform rounded-lg shadow-xl bg-gray-950 sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                        <div class="w-full flex justify-center items-center">
                            <label class="text-gray-400 text-xl">Bill Details</label>
                        </div>

                        <hr class="border-gray-500 mt-2">

                        <div class="flex justify-between p-6">
                            <div class="flex flex-col gap-y-6">
                                <label class="text-gray-400">Unit Number: </label>
                                <label class="text-gray-400">Issue Date: </label>
                                <label class="text-gray-400">Billing Period Start:
                                </label>
                                <label class="text-gray-400">Due Date: </label>
                                <label class="text-gray-400">Unit Bill: </label>
                                <label class="text-gray-400">Utilities Bill: </label>
                                <label class="text-gray-400 font-bold">Total: </label>
                            </div>

                            <div class="flex flex-col gap-y-6">

                                <label class="text-gray-400"><?= $billPerUnit['unit_number'] ?></label>
                                <label class="text-gray-400"><?= $billPerUnit['issue_date'] ?></label>
                                <label class="text-gray-400">
                                    <?= $billPerUnit['billing_period_start'] ?></label>
                                <label class="text-gray-400"><?= $billPerUnit['due_date'] ?></label>
                                <label class="text-gray-400">₱<?= $billPerUnit['unit_bill'] ?></label>
                                <label class="text-gray-400">₱<?= $billPerUnit['utilities_bill'] ?></label>
                                <label class="text-gray-400 font-bold">₱<?= $billPerUnit['total_bill'] ?></label>

                            </div>
                        </div>



                        <hr class="border-gray-500 mb-2">


                        <div class="w-full flex justify-center items-center">

                            <a href="/bill?floor_id=<?= $_GET['floor_id'] ?>&unit_id=<?= $_GET['unit_id'] ?>"
                                class="px-10 py-2 mt-3 w-40 cursor-pointer text-white text-sm font-medium border-gray-500 text-center border rounded-md hover:bg-gray-900 transition-colors duration-300 transform">Close</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>




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
                                    placeholder="Utilities" value="<?= $_POST['utilitiesBill'] ?? '' ?>"
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
                                    value="<?= $_POST['billingPeriodStart'] ?? '' ?>"
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
                                    value="<?= $_POST['dueDate'] ?? '' ?>" name="dueDate" id="dueDate"
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

                <hr class="border-gray-700 my-7">
                <h2 class="text-2xl font-bold leading-7 text-gray-300">Pending Bills</h2>
                <!-- SEARCH -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                $(document).ready(function() {
                    $('#searchInput').keyup(function() {
                        var searchText = $(this).val().toLowerCase();
                        var hasMatches = false;

                        $('tbody tr').each(function() {
                            var rowText = $(this).text().toLowerCase();
                            if (rowText.indexOf(searchText) !== -1) {
                                $(this).show();
                                hasMatches = true;
                            } else {
                                $(this).hide();
                            }
                        });

                        if (hasMatches) {
                            $('#noMatchesMessage').hide();
                        } else {
                            $('#noMatchesMessage')
                                .show();
                        }
                    });
                });
                </script>

                <div class="flex items-center justify-center mb-5">
                    <div class="relative flex items-center">
                        <span class="absolute">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </span>
                        <input type="text" placeholder="Search" id="searchInput" name="searchInput"
                            class="block w-full py-1.5 pr-5 text-gray-300 bg-gray-700 border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
                    </div>
                </div>



                <div class="-mx-4 -my-2 overflow-hidden overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="max-h-[24rem] overflow-y-auto">
                        <div class="inline-block min-w-full py-2 align-middle px-6 lg:px-8">

                            <div class="overflow-hidden shadow-lg rounded-lg">

                                <table class="min-w-full divide-y divide-gray-700 ">
                                    <thead class="bg-gray-800">
                                        <tr>

                                            <th scope="col"
                                                class="min-w-40 py-3.5 px-4 text-md font-semibold text-left rtl:text-right text-gray-300">
                                                Unit Number
                                            </th>

                                            <th scope="col"
                                                class="min-w-40 py-3.5 px-4 text-md font-semibold text-left rtl:text-right text-gray-300">
                                                Total Bill
                                            </th>

                                            <th scope="col"
                                                class="min-w-40 py-3.5 px-4 text-md font-semibold text-left rtl:text-right text-gray-300">
                                                Due Date
                                            </th>
                                            <th scope="col"
                                                class="min-w-28 py-3.5 px-4 text-md font-semibold text-left rtl:text-right text-gray-300">
                                                View</th>


                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-800 bg-gray-900 overflow-y-scroll">

                                        <?php foreach ($bills as $bill): ?>
                                        <tr>
                                            <td
                                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                                <?= $bill['unit_number'] ?>
                                            </td>
                                            <td
                                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                                ₱<?= $bill['total_bill'] ?>
                                            </td>
                                            <td
                                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                                <?= $bill['due_date'] ?>
                                            </td>
                                            <td
                                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">

                                                <a href="/bill?floor_id=<?= $_GET['floor_id'] ?>&unit_id=<?= $_GET['unit_id'] ?>&bill_id=<?= $bill['bill_id'] ?>&view_bill_modal=true"
                                                    class="inline-flex items-center gap-x-2 px-5 py-2 text-sm font-medium text-center text-white bg-blue-700 hover:bg-sky-500 rounded-lg transition-colors duration-300 transform">

                                                    <span class="hidden sm:flex">View</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        class="h-5 w-5" fill="currentColor">
                                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                                        <path
                                                            d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z">
                                                        </path>
                                                    </svg>

                                                </a>


                                            </td>


                                        </tr>
                                        <?php endforeach; ?>



                                    </tbody>

                                </table>

                                <?php if ($numberOfPending <= 0): ?>

                                <div class="flex items-center p-20 text-center bg-gray-900">

                                    <div class="flex flex-col w-full max-w-sm px-4 mx-auto">
                                        <div class="p-3 mx-auto text-blue-500 bg-blue-100 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                            </svg>
                                        </div>
                                        <h1 class="mt-3 text-lg text-gray-300">Pending Payments is empty.</h1>
                                        <p class="mt-2 text-gray-500">Your current table does not have any pending
                                            payments.</p>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <div id="noMatchesMessage" class="flex items-center p-20 text-center bg-gray-900"
                                    style="display:none;">
                                    <div class="flex flex-col w-full max-w-sm px-4 mx-auto">
                                        <div class="p-3 mx-auto text-blue-500 bg-blue-100 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                            </svg>
                                        </div>
                                        <h1 class="mt-3 text-lg text-gray-300">No matches.</h1>
                                        <p class="mt-2 text-gray-500">The data you entered does not exist in the table.
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-gray-700 my-7">


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