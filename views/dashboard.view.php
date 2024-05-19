<?php require "partials/head.php" ?>


<?php require "partials/nav.php" ?>

<main class="w-full flex flex-col">

    <?php require "partials/banner.php" ?>

    <section
        class="grid mx-auto md-10 mb-auto  p-12 grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 items-center overflow-hidden w-full max-h-screen overflow-y-scroll justify-items-center">

        <div
            class="min-w-64 md:min-w-56 lg:max-w-md border 2xl:min-w-64 rounded-lg bg-gray-950 border-gray-700 shadow-lg ">

            <div class="p-5">

                <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-200 tracking-wider">
                    Floors
                </h5>
                <hr class="border-blue-700">
                <ul>
                    <li class="my-3 font-normal text-gray-500 ">
                        Total: <?= $numOfFloors ?>
                    </li>

                </ul>


            </div>
        </div>

        <div
            class="min-w-64 md:min-w-56 lg:max-w-md border 2xl:min-w-64 rounded-lg bg-gray-950 border-gray-700 shadow-lg ">

            <div class="p-5">

                <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-200 tracking-wider">
                    Units
                </h5>
                <hr class="border-blue-700">
                <ul>
                    <li class="my-3 font-normal text-gray-500 ">
                        Total: <?= $numOfUnits ?>
                    </li>

                </ul>


            </div>
        </div>

        <div
            class="min-w-64 md:min-w-56 lg:max-w-md border 2xl:min-w-64 rounded-lg bg-gray-950 border-gray-700 shadow-lg ">

            <div class="p-5">

                <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-200 tracking-wider">
                    Tenants
                </h5>
                <hr class="border-blue-700">
                <ul>
                    <li class="my-3 font-normal text-gray-500 ">
                        Total: <?= $numOfTenants ?>
                    </li>

                </ul>


            </div>
        </div>

        <div class="min-w-64 md:min-w-56 border 2xl:min-w-64 rounded-lg bg-gray-950 border-gray-700 shadow-lg ">

            <div class="p-5">

                <h5 class="mb-2 text-4xl font-bold tracking-tight text-gray-200 tracking-wider">
                    Unit Types
                </h5>
                <hr class="border-blue-700">
                <ul>
                    <li class="my-3 font-normal text-gray-500 ">
                        Total: <?= $numOfTypes ?>
                    </li>

                </ul>


            </div>
        </div>
    </section>
</main>





<?php require "partials/foot.php" ?>