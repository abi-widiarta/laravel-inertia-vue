<script setup>
import LayoutAuth from "../Shared/Layout/LayoutAuth.vue";
import { Link, useForm } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();

const userName = computed(() => page.props.username);
const userEmail = computed(() => page.props.email);

let form = useForm({
    name: userName,
    email: userEmail,
    gender: "",
    birthdate: "",
});

let submit = () => {
    // console.log(form);
    form.post("/login/profiling");
};
</script>

<script>
export default {
    layout: LayoutAuth,
};
</script>

<template>
    <section class="bg-white flex items-center mt-6">
        <div
            class="flex flex-col md:flex-row md:items-center py-8 px-4 mx-auto max-w-screen-xl"
        >
            <div class="flex-1">
                <img src="/img/login-img.png" alt="hero" />
            </div>
            <span class="w-[2px] h-96 bg-gray-200 translate-x-20"></span>
            <div class="flex-1 flex justify-center items-center">
                <form @submit.prevent="submit" class="w-72">
                    <div class="mb-10 space-y-4">
                        <h1
                            class="text-primary text-4xl font-semibold text-center"
                        >
                            Login
                        </h1>
                        <p class="text-center text-base font-medium">
                            Please Complete Your Profile
                        </p>
                    </div>
                    <div class="mb-6">
                        <!-- <p
                            id="outlined_error_help"
                            class="mt-2 text-xs text-red-600 dark:text-red-400"
                        >
                            asd
                        </p> -->
                    </div>
                    <div class="mb-6">
                        <label
                            for="name"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >{{ $page.props.username }}</label
                        >
                        <input
                            disabled
                            type="text"
                            id="name"
                            name="name"
                            v-model="form.name"
                            class="bg-white disabled:bg-slate-100 disabled:text-gray-500 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-primary/50"
                            required
                        />

                        <!-- <p
                            id="outlined_error_help"
                            class="mt-2 text-xs text-red-600 dark:text-red-400"
                        >
                            asd
                        </p> -->
                    </div>

                    <div class="mb-6">
                        <label
                            for="email"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Email</label
                        >
                        <input
                            disabled
                            type="email"
                            id="email"
                            name="email"
                            v-model="form.email"
                            class="bg-white disabled:bg-slate-100 disabled:text-gray-500 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-primary/50"
                            required
                        />
                    </div>

                    <div class="mb-6">
                        <label
                            for="email"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Gender</label
                        >
                        <div class="flex space-x-4">
                            <div class="flex space-x-1 items-center">
                                <input
                                    class="cursor-pointer"
                                    type="radio"
                                    name="gender"
                                    id="gender-male"
                                    value="L"
                                    v-model="form.gender"
                                />
                                <label for="gender-male"
                                    ><p class="text-sm">Male</p></label
                                >
                            </div>
                            <div class="flex space-x-1 items-center">
                                <input
                                    class="cursor-pointer"
                                    type="radio"
                                    name="gender"
                                    value="P"
                                    v-model="form.gender"
                                    id="gender-female"
                                />
                                <label for="gender-female"
                                    ><p class="text-sm">Female</p></label
                                >
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label
                            for="birthdate"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Birhdate</label
                        >
                        <input
                            type="date"
                            id="birthdate"
                            name="birthdate"
                            v-model="form.birthdate"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:border-primary focus:border-1"
                            required
                        />

                        <!-- <p
                            id="outlined_error_help"
                            class="mt-2 text-xs text-red-600 dark:text-red-400"
                        >
                            asd
                        </p> -->
                    </div>

                    <button
                        type="submit"
                        class="w-full text-white rounded-full bg-primary font-medium shadow-lg transition duration-200 hover:shadow-primary/50 shadow-primary/30 text-sm px-5 py-2.5 text-center"
                    >
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </section>
</template>
