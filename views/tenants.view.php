<?php require "partials/head.php" ?>


<?php require "partials/nav.php" ?>

<main class="w-full flex flex-col overflow-hidden"
    x-data="{ isOpen: false, isDeleteConfirmation : false,  isFeedbackOpen: falsem}">

    <?php require "partials/banner.php" ?>

    <!-- View Tenant modal -->
    <?php if (isset($_GET['view_tenant_modal'])): ?>
    <div x-data="{ isBillOpen: true }">
        <div x-show="isBillOpen" x-cloak x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            class="fixed inset-0 z-10 overflow-y-auto">

            <div class="flex items-center justify-center min-h-screen px-4 sm:p-0">

                <div class="fixed inset-0 ">
                    <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block px-4 pt-5 gap-y-5 pb-4 overflow-hidden flex md:max-w-screen-md md:gap-x-4 flex-col align-bottom transition-all transform rounded-lg shadow-xl bg-gray-950 sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                    <div class="w-full flex justify-center items-center">
                        <label class="text-gray-400 text-xl">Tenant Details</label>
                    </div>

                    <hr class="border-gray-500 mt-2">

                    <div class="flex justify-between p-6">
                        <div class="flex flex-col gap-y-6">
                            <label class="text-gray-400">Unit Number:
                                <?= $tenantsIndividual['unit_number'] ?></label>

                            <label class="text-gray-400">Name:
                                <?= $tenantsIndividual['tenant_name'] ?></label>
                            <label class="text-gray-400">Age:
                                <?= $tenantsIndividual['tenant_age'] ?></label>
                            <label class="text-gray-400">Contact Number:
                                <?= $tenantsIndividual['contact_number'] ?>
                            </label>
                            <label class="text-gray-400">Address:
                                <?= $tenantsIndividual['address'] ?></label>
                            <label class="text-gray-400">Move in Date:
                                <?= $tenantsIndividual['moveIn_date'] ?></label>

                        </div>


                    </div>


                    <div class="w-full flex justify-center items-center">
                        <label class="text-gray-400 text-xl">Emergency
                            Contact</label>
                    </div>
                    <hr class="border-gray-500 mb-2">
                    <div class="flex flex-col p-6 gap-y-6">
                        <label class=" text-gray-400">Name:
                            <?= $tenantsIndividual['name'] ?? 'N/A' ?></label>
                        <label class="text-gray-400">Contact Number:
                            <?= $tenantsIndividual['econtact_number'] ?? 'N/A' ?></label>
                        <label class="text-gray-400">Address:
                            <?= $tenantsIndividual['eaddress'] ?? 'N/A' ?> </label>
                    </div>


                    <hr class="border-gray-500 mt-2">


                    <div class="w-full flex justify-center items-center">

                        <a href="/tenants"
                            class="px-10 py-2 mt-3 w-40 cursor-pointer text-white text-sm font-medium border-gray-500 text-center border rounded-md hover:bg-gray-900 transition-colors duration-300 transform">Close</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <section
        class="mx-auto p-12 items-center overflow-hidden w-full max-h-screen overflow-y-scroll justify-items-center"
        style="max-height: calc(100vh - 110px);">


        <!-- SEARCH -->
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        </script> -->

        <!-- SEARCH EXPERIMENT -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



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

        <div class="bg-gray-950 shadow-lg shadow mx-auto rounded-md px-10 py-8 my-auto">

            <div class="flex bg-gray-950 items-center gap-x-3 sm:justify-between">

                <div>

                    <h1 class="text-gray-200 font-bold text-3xl hidden md:flex">Tenants</h1>

                </div>

            </div>


            <div class="flex flex-col mt-6 overflow-hidden">


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
                                                Name
                                            </th>



                                            <th scope="col"
                                                class="min-w-40 py-3.5 px-4 text-md font-semibold text-left rtl:text-right text-gray-300">
                                                Contact Number
                                            </th>
                                            <th scope="col"
                                                class="min-w-40 py-3.5 px-4 text-md font-semibold text-left rtl:text-right text-gray-300">
                                                Move In Date</th>
                                            <th scope="col"
                                                class="max-w-28 py-3.5 px-4 text-md font-semibold text-left rtl:text-right text-gray-300">
                                                View</th>

                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-800 bg-gray-900 ">
                                        <?php foreach ($tenants as $tenant): ?>
                                        <tr
                                            class="cursor-pointer hover:bg-gray-800 transition transition-colors duration-300">
                                            <td
                                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                                <?= $tenant['unit_number'] ?>
                                            </td>
                                            <td
                                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                                <?= $tenant['tenant_name'] ?>
                                            </td>

                                            <td
                                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                                <?= $tenant['contact_number'] ?>
                                            </td>
                                            <td
                                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                                <?= $tenant['moveIn_date'] ?>
                                            </td>
                                            <td
                                                class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                                <a href="/tenants?tenant_id=<?= $tenant['tenant_id'] ?>&view_tenant_modal=true"
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

                                <?php if ($numOfTenants <= 0): ?>

                                <div class="flex items-center p-20 text-center bg-gray-900">

                                    <div class="flex flex-col w-full max-w-sm px-4 mx-auto">
                                        <div class="p-3 mx-auto text-blue-500 bg-blue-100 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                            </svg>
                                        </div>
                                        <h1 class="mt-3 text-lg text-gray-300">This table is empty.</h1>
                                        <p class="mt-2 text-gray-500">Your current table does not have any tenants.</p>
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

            </div>
            <div
                class="mt-6 flex flex-row-reverse justify-end items-center min-[1100px]:justify-between  min-[1200px]:flex-row">

                <span class="text-gray-500 hidden min-[1200px]:flex ">Showing 1 to 10 out of 60 entries</span>


                <div class=" flex justify-between w-full min-[1100px]:max-w-[500px]">

                    <button
                        class="border text-gray-300 rounded-md py-2 px-3 hover:bg-gray-900 transition transition-colors duration-300 border-gray-600 max-w-max">Previous</button>

                    <div class="hidden min-[600px]:flex min-[760px]:hidden min-[840px]:flex gap-x-1">
                        <button
                            class="border text-gray-300 rounded-md py-2 px-3 hover:bg-gray-900 transition transition-colors duration-300 border-gray-600 max-w-max">1</button>
                        <button
                            class="border text-gray-300 rounded-md py-2 px-3 hover:bg-gray-900 transition transition-colors duration-300 border-gray-600 max-w-max">2</button>
                        <button
                            class="border text-gray-300 rounded-md py-2 px-3 hover:bg-gray-900 transition transition-colors duration-300 border-gray-600 max-w-max">...</button>
                        <button
                            class="border text-gray-300 rounded-md py-2 px-3 hover:bg-gray-900 transition transition-colors duration-300 border-gray-600 max-w-max">5</button>
                        <button
                            class="border text-gray-300 rounded-md py-2 px-3 hover:bg-gray-900 transition transition-colors duration-300 border-gray-600 max-w-max">6</button>
                    </div>

                    <button
                        class="border text-gray-300 rounded-md py-2 px-3 hover:bg-gray-900 transition transition-colors duration-300 border-gray-600 min-w-[90px]">Next</button>


                </div>
            </div>
        </div>


    </section>


</main>





<?php require "partials/foot.php" ?>