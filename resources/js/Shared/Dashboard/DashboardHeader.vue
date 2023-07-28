<script setup>
import { reactive, ref } from "vue";
const props = defineProps({
    title: String,
    name: String,
});

let profileName = ref(props.name[0]);

// function profileName() {
//     return ref(props.name[0]);
// }

// let profileName = ref(props.name[0]);
</script>

<template>
    <header class="flex mb-4 items-end justify-between">
        <h1 class="font-semibold text-xl">{{ title }}</h1>
        <div>
            <img src="" alt="" />
            <div
                class="py-1 pl-4 pr-2 border-2 space-x-4 border-primary rounded-full flex items-center justify-between"
            >
                <p class="text-sm font-semibold">{{ name }}</p>
                <div
                    class="grid place-items-center w-8 aspect-square bg-gray-600 rounded-full"
                >
                    <p class="m-0 font-base text-white">{{ profileName }}</p>
                </div>
            </div>
        </div>
    </header>
</template>
