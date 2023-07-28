<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <nav
        class="bg-white/80 z-50 backdrop-blur-lg border-gray-200 sm:px-5 sticky top-0 shadow-lg shadow-gray-100/50"
    >
        <div
            class="max-w-screen-xl h-[70px] flex flex-wrap items-center justify-between mx-auto"
        >
            <Link href="/" class="flex items-center">
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap text-primary"
                    >MyTelkomedika</span
                >
            </Link>
            <button
                data-collapse-toggle="navbar-default"
                type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-primary hover:text-white transition duration-150 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-default"
                aria-expanded="false"
            >
                <span class="sr-only">Open main menu</span>
                <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 17 14"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15"
                    />
                </svg>
            </button>
            <div
                class="hidden w-full md:block md:w-auto mt-3 md:mt-0"
                id="navbar-default"
            >
                <ul
                    class="font-medium bg-gray-50 md:bg-transparent flex flex-col justify-center py-4 md:p-0 rounded-lg md:flex-row md:space-x-12 md:align-middle md:items-center"
                >
                    <li class="relative">
                        <Link
                            href="/"
                            class="block py-2 transition duration-250 pl-3 pr-4 font-medium text-gray-900 md:hover:bg-transparent rounded md:bg-transparent md:p-0 md:hover:text-primary hover:bg-gray-100 md:border-0"
                            aria-current="page"
                            >Beranda</Link
                        >
                        <span
                            class="h-1 w-full {{ Request::is('/') ? 'md:block' : '' }}  hidden rounded bg-primary absolute"
                        ></span>
                    </li>
                    <li class="relative">
                        <Link
                            href="/contact"
                            class="block py-2 transition font-medium duration-250 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-primary md:p-0"
                            >Contact</Link
                        >
                        <span
                            class="h-1 w-full {{ Request::is('contact') ? 'md:block' : '' }}  hidden rounded bg-primary absolute"
                        ></span>
                    </li>
                    <li class="mt-5 md:mt-0">
                        <Link
                            href="/login"
                            class="text-white transition duration-300 shadow-lg hover:shadow-primary/40 text-base bg-primary rounded-full block md:px-7 py-2.5 text-center"
                            >Login</Link
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
