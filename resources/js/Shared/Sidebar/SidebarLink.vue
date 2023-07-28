<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import autoAnimate from "@formkit/auto-animate";

defineProps({
    title: String,
    imgurl: String,
    active: Boolean,
    to: String,
});

const animate = ref(); // we need a DOM node
const show = ref(false);

onMounted(() => {
    autoAnimate(animate.value); // thats it!
});
</script>

<template>
    <div ref="animate" class="relative">
        <Link
            class="flex justify-start items-center rounded-xl space-x-3 py-4 px-4"
            :href="to"
        >
            <img class="w-[25px] z-10" :src="imgurl" alt="logo" />
            <p class="font-normal z-10 text-sm">{{ title }}</p>
        </Link>
        <div
            v-if="active"
            class="absolute bg-gray-100 w-full top-0 left-0 h-full rounded-xl"
        ></div>
    </div>
</template>
