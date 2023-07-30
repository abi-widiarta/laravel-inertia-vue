<script setup>
import LayoutAuth from "../Shared/Layout/LayoutAuth.vue";
import { Link, useForm } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import autoAnimate from "@formkit/auto-animate";

const props = defineProps({
    errors: Object,
    fail: String,
});

// const animate = ref(); // we need a DOM node
// const show = ref(false);

// onMounted(() => {
//     autoAnimate(animate.value); // thats it!
// });

// let form = useForm({
//     username: "",
//     password: "",
// });

// let submit = () => {
//     form.post("/login");
// };

if (props.fail) {
    console.log("true");
} else {
    console.log("false");
}
</script>

<template>
    <section
        class="bg-white flex items-center min-h-screen bg-[url('/img/hero-pattern.svg')]"
    >
        <div
            class="flex shadow-primary/10 shadow-2xl w-[500px] border-t-8 border-b-8 border-primary rounded-2xl flex-col justify-center items-center pt-10 pb-6 px-8 text-center mx-auto"
        >
            <div class="space-y-2 mb-4">
                <h1 class="text-primary text-4xl font-semibold">
                    MyTelkomedika
                </h1>
                <p class="text-sm font-medium">
                    "One Stop Health Care For Telyutizen"
                </p>
            </div>
            <img class="w-80 mb-6" src="/img/login-img.png" alt="hero" />
            <div class="space-y-4">
                <h2 class="text-primary text-2xl font-semibold">Login</h2>
                <a
                    href="/auth/redirect"
                    class="text-black flex items-center space-x-4 rounded-full bg-white font-medium shadow-xl transition duration-200 hover:shadow-gray-300/70 shadow-gray-200/70 text-sm w-full px-10 py-2.5 border border-gray-100 text-center"
                >
                    <img src="img/google-icon.png" alt="google-icon" />
                    <p>Login With Google SSO</p>
                </a>
                <p class="text-primary" v-if="errors.error">
                    {{ errors.error }}
                </p>
            </div>
            <div class="space-y-2 mt-16">
                <p>Follow Us</p>
                <div class="flex space-x-4 items-center">
                    <a href="#">
                        <img
                            src="img/facebook-icon.png"
                            alt="social media logo"
                        />
                    </a>
                    <a href="#">
                        <img
                            src="img/youtube-icon.png"
                            alt="social media logo"
                        />
                    </a>
                    <a href="#">
                        <img
                            src="img/instagram-icon.png"
                            alt="social media logo"
                        />
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>
