<script setup>
import { Link } from "@inertiajs/vue3";
import LayoutDashboard from "../../Shared/Layout/LayoutDashboard.vue";
import DashboardHeader from "../../Shared/Dashboard/DashboardHeader.vue";
</script>

<script>
export default {
    layout: LayoutDashboard,
};
</script>

<template>
    <section>
        <DashboardHeader title="Reservasi Saya" :name="$page.props.username" />
        <div>Reservasi Saya</div>
    </section>
</template>
