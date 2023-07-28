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
            ></div>
        </div>
    </nav>
</template>
