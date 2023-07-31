<script setup>
import { ref, watch, onMounted } from "vue";
import NavAuth from "../Nav/NavAuth.vue";
import NavLandingPage from "../Nav/NavLandingPage.vue";

let animate = ref(false);
let pageComponent = ref("");

onMounted(() => {
    animate = ref(true);
});

// console.log()

// watch($page.component, (value) => {
//     console.log(value);
// });
</script>
<!-- 
<script>
export default {
    data() {
        return {
            animate: false,
        };
    },
    mounted() {
        this.animate = true;
    },
};
</script> -->

<template>
    <NavLandingPage v-if="$page.component == 'Landingpage'" />
    <NavAuth
        v-if="
            $page.component == 'Login' ||
            $page.component == 'Register' ||
            $page.component == 'LoginAdmin' ||
            $page.component == 'LoginProfiling'
        "
    />
    <section>
        <transition name="page">
            <slot />
        </transition>
    </section>
</template>

<style>
.page-enter-active,
.page-leave-active {
    transition: all 0.3s;
}

.page-enter,
.page-leave-active {
    opacity: 0;
}
</style>
