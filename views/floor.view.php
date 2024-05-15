<?php require "partials/head.php" ?>


<?php require "partials/nav.php" ?>

<main class="w-full flex flex-col overflow-hidden" x-data="{ isOpen: false }">

    <?php require "partials/floor-banner.php" ?>


    <section
        class="mx-auto p-12 items-center overflow-hidden w-full max-h-screen overflow-y-scroll justify-items-center"
        style="max-height: calc(100vh - 110px);">

        <div class="flex items-center justify-center mb-5">
            <div class="relative flex items-center">
                <span class="absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </span>
                <input type="text" placeholder="Search"
                    class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
            </div>
        </div>

        <div class="bg-gray-950 shadow-lg shadow mx-auto rounded-md px-10 py-8 my-auto">

            <div class="flex bg-gray-950 items-center gap-x-3 sm:justify-between">

                <div>

                    <h1 class="text-gray-200 font-bold md:text-3xl hidden md:flex">Units Table</h1>

                </div>

                <button
                    class="min-w-10 flex items-center font-medium justify-center  px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-600 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-sky-500 ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="rtl:rotate-180 w-5 h-5 ">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path
                            d="M11 11V7H13V11H17V13H13V17H11V13H7V11H11ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20Z">
                        </path>
                    </svg>

                    <span>Add Unit</span>
                </button>

            </div>


            <div class="flex flex-col mt-6 overflow-hidden">


                <div class="-mx-4 -my-2 overflow-hidden overflow-x-auto sm:-mx-6 lg:-mx-8">

                    <div class="inline-block min-w-full py-2 align-middle px-6 lg:px-8">

                        <div class="overflow-hidden border border-gray-700 overflow-x-scroll rounded-lg max-h-screen">

                            <table
                                class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 lg:overflow-y-scroll">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col"
                                            class="min-w-40 py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                            Unit Number
                                        </th>

                                        <th scope="col"
                                            class="min-w-40 py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                            Unit Type
                                        </th>

                                        <th scope="col"
                                            class="min-w-40 py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                            Availability
                                        </th>

                                        <th scope="col"
                                            class="min-w-28 py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                            Edit</th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">

                                    <?php foreach ($units as $unit): ?>
                                    <tr>
                                        <td
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                            <?= $unit['unit_number'] ?>
                                        </td>
                                        <td
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                            <?= $unit['unit_type'] ?>
                                        </td>
                                        <td
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                            <?= $isAvailable = ($unit['availability'] === 1) ? 'Yes' : 'No' ?>
                                        </td>
                                        <td
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-400">
                                            <a href="/unit?unit_id=<?= $unit['unit_id'] ?>"
                                                class="inline-flex items-center gap-x-2 px-5 py-2 text-sm font-medium text-center text-white bg-blue-700 hover:bg-sky-500 rounded-lg transition-colors duration-300 transform">

                                                <span class="hidden sm:flex">Edit</span>

                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    class="h-5 w-5" fill="currentColor">
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path
                                                        d="M6.41421 15.89L16.5563 5.74785L15.1421 4.33363L5 14.4758V15.89H6.41421ZM7.24264 17.89H3V13.6473L14.435 2.21231C14.8256 1.82179 15.4587 1.82179 15.8492 2.21231L18.6777 5.04074C19.0682 5.43126 19.0682 6.06443 18.6777 6.45495L7.24264 17.89ZM3 19.89H21V21.89H3V19.89Z">
                                                    </path>
                                                </svg>
                                            </a>

                                        </td>

                                    </tr>
                                    <?php endforeach; ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


    </section>


</main>



<?php require "partials/foot.php" ?>