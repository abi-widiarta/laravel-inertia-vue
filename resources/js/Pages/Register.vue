<script setup>
import LayoutAuth from "../Shared/Layout/LayoutAuth.vue";
import { Link, useForm } from "@inertiajs/vue3";

let form = useForm({
    nim: "",
    name: "",
    username: "",
    email: "",
    password: "",
});

let submit = () => {
    form.post("/register");
};
</script>

<script>
export default {
    layout: LayoutAuth,
};
</script>

<template>
    <section class="bg-white flex items-center">
        <div
            class="flex flex-col md:flex-row md:items-center py-8 px-4 mx-auto max-w-screen-xl"
        >
            <div class="flex-1">
                <img src="/img/login-img.png" alt="hero" />
            </div>
            <span class="w-[2px] h-96 bg-gray-200 translate-x-20"></span>
            <div class="flex-1 flex justify-center items-center">
                <form @submit.prevent="submit" class="w-72">
                    <h1
                        class="text-primary text-4xl font-semibold text-center mb-10"
                    >
                        Register
                    </h1>
                    <div class="mb-6">
                        <label
                            for="nim"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >NIM</label
                        >
                        <input
                            type="text"
                            id="nim"
                            name="nim"
                            v-model="form.nim"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-primary/50"
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
                            for="name"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Name</label
                        >
                        <input
                            type="text"
                            id="name"
                            name="name"
                            v-model="form.name"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-primary/50"
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
                            for="username"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Username</label
                        >
                        <input
                            type="text"
                            id="username"
                            name="username"
                            v-model="form.username"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-primary/50"
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
                            type="email"
                            id="email"
                            name="email"
                            v-model="form.email"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-primary/50"
                            required
                        />
                        <!-- 
                        <p
                            id="outlined_error_help"
                            class="mt-2 text-xs text-red-600 dark:text-red-400"
                        >
                            asd
                        </p> -->
                    </div>
                    <div class="mb-6">
                        <label
                            for="password"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Password</label
                        >
                        <input
                            type="password"
                            id="password"
                            name="password"
                            v-model="form.password"
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
                    <div class="flex items-start mb-6">
                        <p class="text-xs">
                            Already have an account?
                            <Link href="/login" class="text-primary"
                                >Login Here!</Link
                            >
                        </p>
                    </div>
                    <button
                        type="submit"
                        class="text-white rounded-full bg-primary font-medium shadow-lg transition duration-200 hover:shadow-primary/50 shadow-primary/30 text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                    >
                        Register
                    </button>
                </form>
            </div>
        </div>
    </section>
</template>
