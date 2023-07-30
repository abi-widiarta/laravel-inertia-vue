<script setup>
import { ref, onMounted } from "vue";
import SidebarAdmin from "../Sidebar/SidebarAdmin.vue";
</script>

<template>
    <main class="flex bg-veryLightGray min-h-screen">
        <div class="w-[270px]">
            <SidebarAdmin />
        </div>

        <section class="flex-1 py-10 px-12">
            <slot />
        </section>
    </main>
</template>
