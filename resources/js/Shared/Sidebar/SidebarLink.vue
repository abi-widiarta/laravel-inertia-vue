<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";

defineProps({
    title: String,
    imgurl: String,
    active: Boolean,
    to: String,
});
</script>

<template>
    <Link
        class="flex justify-start items-center rounded-xl space-x-3 py-4 px-4 transition duration-150 hover:bg-gray-100 hover:transition"
        :class="{
            'bg-gradient-to-r from-primary/90 via-primary/90 to-primary/50 text-white':
                active,
        }"
        :href="to"
    >
        <img
            class="w-[25px] z-10"
            :class="{ invert: active }"
            :src="imgurl"
            alt="logo"
        />
        <p class="z-10 text-sm" :class="{ 'font-medium': active }">
            {{ title }}
        </p>
    </Link>
</template>
