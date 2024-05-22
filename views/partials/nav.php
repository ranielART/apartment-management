<?php
require 'head.php';
?>

<div x-data="{ open: false }" class="relative">
    <div class="md:hidden h-full flex justify-center items-center inset-0 z-50 absolute ml-4">
        <button @click="open = !open" class="md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="h-9 w-auto text-white">
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path
                    d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z">
                </path>
            </svg>
    </div>


    <div x-cloak
        class="sidebar fixed inset-0 z-50 min-w-56 transform transition-transform duration-300 h-screen ease-in-out md:relative md:z-auto md:translate-x-0 md:flex 2xl:min-w-72"
        :class="{'translate-x-0': open, '-translate-x-full': !open}">

        <aside x-cloak
            class="sm:flex sm:flex-col min-w-56 md:transition-transform md:duration-300 transform h-screen px-5 py-8 overflow-y-auto bg-gray-950 shadow-lg 2xl:min-w-72">
            <div class="flex justify-between items-center">
                <a href="/">
                    <img class="w-auto h-7 2xl:h-9" src="https://merakiui.com/images/logo.svg" alt="">
                </a>
                <button @click="open = !open" class="md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-7 h-7 md:hidden text-gray-300">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path
                            d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z">
                        </path>
                    </svg>
                </button>


            </div>

            <div class="flex flex-col justify-between flex-1 mt-6">
                <nav class="flex-1 -mx-3 space-y-3">
                    <a class="flex items-center px-3 py-2 <?= isCurrent("/dashboard"); ?>" href="/dashboard">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 2xl:w-6 2xl:h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                        </svg>
                        <span class="mx-2 text-sm 2xl:text-lg font-medium">Dashboard</span>
                    </a>

                    <a class="flex items-center px-3 py-2 <?= isCurrent("/floors"); ?>" href="/floors">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-5 h-5 2xl:w-6 2xl:h-6">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path
                                d="M21 20H23V22H1V20H3V3C3 2.44772 3.44772 2 4 2H20C20.5523 2 21 2.44772 21 3V20ZM19 20V4H5V20H19ZM8 11H11V13H8V11ZM8 7H11V9H8V7ZM8 15H11V17H8V15ZM13 15H16V17H13V15ZM13 11H16V13H13V11ZM13 7H16V9H13V7Z">
                            </path>
                        </svg>
                        <span class=" mx-2 text-sm 2xl:text-lg font-medium">Floors</span>
                    </a>

                    <a class="flex items-center px-3 py-2 <?= isCurrent("/unitTypes"); ?>" href="/unitTypes">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-5 h-5 2xl:w-6 2xl:h-6">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path
                                d="M21 19H23V21H1V19H3V4C3 3.44772 3.44772 3 4 3H14C14.5523 3 15 3.44772 15 4V19H19V11H17V9H20C20.5523 9 21 9.44772 21 10V19ZM5 5V19H13V5H5ZM7 11H11V13H7V11ZM7 7H11V9H7V7Z">
                            </path>
                        </svg>
                        <span class=" mx-2 text-sm 2xl:text-lg font-medium">Unit Types</span>
                    </a>

                    <a class="flex items-center px-3 py-2 <?= isCurrent("/tenants"); ?>" href="/tenants">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-5 h-5 2xl:w-6 2xl:h-6">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path
                                d="M20 22H18V20C18 18.3431 16.6569 17 15 17H9C7.34315 17 6 18.3431 6 20V22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13ZM12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z">
                            </path>
                        </svg>
                        <span class="mx-2 text-sm 2xl:text-lg font-medium">Tenants</span>
                    </a>

                    <a class="flex items-center px-3 py-2 <?= isCurrent("/pendingPayments"); ?>"
                        href="/pendingPayments">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-5 h-5 2xl:w-6 2xl:h-6">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path
                                d="M12.0049 22.0027C6.48204 22.0027 2.00488 17.5256 2.00488 12.0027C2.00488 6.4799 6.48204 2.00275 12.0049 2.00275C17.5277 2.00275 22.0049 6.4799 22.0049 12.0027C22.0049 17.5256 17.5277 22.0027 12.0049 22.0027ZM12.0049 20.0027C16.4232 20.0027 20.0049 16.421 20.0049 12.0027C20.0049 7.58447 16.4232 4.00275 12.0049 4.00275C7.5866 4.00275 4.00488 7.58447 4.00488 12.0027C4.00488 16.421 7.5866 20.0027 12.0049 20.0027ZM8.50488 14.0027H14.0049C14.281 14.0027 14.5049 13.7789 14.5049 13.5027C14.5049 13.2266 14.281 13.0027 14.0049 13.0027H10.0049C8.62417 13.0027 7.50488 11.8835 7.50488 10.5027C7.50488 9.12203 8.62417 8.00275 10.0049 8.00275H11.0049V6.00275H13.0049V8.00275H15.5049V10.0027H10.0049C9.72874 10.0027 9.50488 10.2266 9.50488 10.5027C9.50488 10.7789 9.72874 11.0027 10.0049 11.0027H14.0049C15.3856 11.0027 16.5049 12.122 16.5049 13.5027C16.5049 14.8835 15.3856 16.0027 14.0049 16.0027H13.0049V18.0027H11.0049V16.0027H8.50488V14.0027Z">
                            </path>
                        </svg>
                        <span class="mx-2 text-sm 2xl:text-lg font-medium">Pending Payments</span>
                    </a>

                    <a class="flex items-center px-3 py-2 <?= isCurrent("/paymentHistory"); ?>" href="/paymentHistory">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-5 h-5 2xl:w-6 2xl:h-6">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path
                                d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12H4C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C9.25022 4 6.82447 5.38734 5.38451 7.50024L8 7.5V9.5H2V3.5H4L3.99989 5.99918C5.82434 3.57075 8.72873 2 12 2ZM13 7L12.9998 11.585L16.2426 14.8284L14.8284 16.2426L10.9998 12.413L11 7H13Z">
                            </path>
                        </svg>
                        <span class="mx-2 text-sm 2xl:text-lg font-medium">Payment History</span>
                    </a>
                </nav>

                <div class="flex items-center justify-between mt-6">
                    <a href="/" class="flex items-center gap-x-2">
                        <img class="object-cover rounded-full h-7 w-7 2xl:h-8 2xl:w-8"
                            src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&h=634&q=80"
                            alt="avatar" />
                        <span class="text-sm font-medium text-gray-500 2xl:text-lg"><?= $_SESSION['username'] ?></span>
                    </a>
                </div>
            </div>
        </aside>
    </div>
</div>