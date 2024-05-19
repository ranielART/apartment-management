<?php
require 'head.php';
?>

<header class="bg-gray-950 shadow-lg shadow mx-10 mt-8 rounded-md">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between">
        <h1 class="text-3xl font-bold tracking-tight text-gray-200">
            <?= $heading; ?>
        </h1>

        <a href="/unit?unit_id=<?= $_GET['unit_id'] ?>"
            class="inline-flex items-center gap-x-2 px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 hover:bg-sky-500 rounded-lg transition-colors duration-300 transform">

            <span class="hidden sm:flex">Go Back</span>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path
                    d="M7.82843 10.9999H20V12.9999H7.82843L13.1924 18.3638L11.7782 19.778L4 11.9999L11.7782 4.22168L13.1924 5.63589L7.82843 10.9999Z">
                </path>
            </svg>
        </a>

    </div>
</header>