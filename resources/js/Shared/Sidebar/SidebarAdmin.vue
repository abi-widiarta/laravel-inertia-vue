<script setup>
import { Link } from "@inertiajs/vue3";
import SidebarLink from "./SidebarLink.vue";
import SidebarLinkListAdmin from "./SidebarLinkListAdmin.vue";
</script>

<template>
    <aside
        class="w-[270px] h-screen fixed bg-white flex flex-col py-7 px-6 items-center border-r-2 border-gray-300"
    >
        <div class="flex flex-col h-full">
            <div class="pb-4 px-3 mb-4">
                <h1 class="text-2xl text-center text-primary font-bold">
                    MyTelkomedika
                    <span class="block text-black text-end text-base pr-1"
                        >Admin</span
                    >
                </h1>
                <span class="block mt-4 h-[1px] w-full bg-gray-300"> </span>
                <!-- <span class="block h-[1px] w-full bg-gray-500"></span> -->
            </div>
            <SidebarLinkListAdmin class="flex-1" />
        </div>
    </aside>
</template>
