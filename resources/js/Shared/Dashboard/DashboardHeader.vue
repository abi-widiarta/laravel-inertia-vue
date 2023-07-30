<script setup>
import { reactive, ref } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();

const props = defineProps({
    title: String,
    name: String,
    role: String,
});

let profileImg = page.props.flash.message;
// console.log(page.props.flash.message);
let profileName = ref(props.name[0]);
</script>

<template>
    <header class="flex mb-4 items-center justify-between">
        <h1 class="font-semibold text-xl">{{ title }}</h1>
        <div class="flex items-center space-x-4">
            <p v-if="props.role == 'admin'" class="font-semibold text-gray-500">
                Admin
            </p>
            <p v-if="props.role == 'user'" class="font-semibold text-gray-500">
                Patient
            </p>
            <div
                class="py-1 pl-4 pr-2 border-2 space-x-4 border-primary rounded-full flex items-center justify-between"
            >
                <p class="text-sm font-semibold">{{ name }}</p>
                <div
                    class="grid place-items-center w-8 aspect-square bg-gray-600 rounded-full"
                >
                    <img
                        v-if="profileImg"
                        class="rounded-full"
                        :src="profileImg"
                        alt="profile"
                    />
                    <p v-if="!profileImg" class="m-0 font-base text-white">
                        {{ profileName }}
                    </p>
                </div>
            </div>
        </div>
    </header>
</template>
