<script setup>
import { Link } from "@inertiajs/vue3";
import LayoutDashboard from "../../Shared/Layout/LayoutDashboard.vue";
import DashboardHeader from "../../Shared/Dashboard/DashboardHeader.vue";
</script>

<script>
// ES6 Modules or TypeScript

// CommonJS
export default {
    layout: LayoutDashboard,
};
</script>

<template>
    <div>
        <DashboardHeader title="Dashboard" :name="$page.props.username" />
        <div
            class="px-6 pt-6 pb-8 w-full bg-gradient-to-r from-primary/90 via-primary/90 to-primary/20 text-white rounded-xl"
        >
            <h1 class="text-xl font-semibold mb-2">
                Selamat Datang! {{ $page.props.username }}
            </h1>
            <p class="text-xs">
                Anda memiliki 3 reservasi pemeriksaan hari ini
            </p>
        </div>
    </div>
</template>
