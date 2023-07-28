<script setup>
import Sidebar from "../Sidebar/Sidebar.vue";
</script>

<template>
    <main class="flex bg-veryLightGray min-h-screen">
        <div class="w-[270px]">
            <Sidebar />
        </div>

        <section class="flex-1 py-6 px-8">
            <slot />
        </section>
    </main>
</template>
