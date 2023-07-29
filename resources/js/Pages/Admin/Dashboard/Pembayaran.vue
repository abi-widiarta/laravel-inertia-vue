<script setup>
import { Link } from "@inertiajs/vue3";
import LayoutDashboardAdmin from "../../../Shared/Layout/LayoutDashboardAdmin.vue";
import DashboardHeader from "../../../Shared/Dashboard/DashboardHeader.vue";
</script>

<script>
export default {
    layout: LayoutDashboardAdmin,
};
</script>

<template>
    <div class="h-full">
        <DashboardHeader title="Pembayaran" :name="$page.props.username" />

        <div class="space-y-6"></div>
    </div>
</template>
