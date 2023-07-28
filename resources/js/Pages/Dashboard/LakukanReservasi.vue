<script setup>
import { Link } from "@inertiajs/vue3";
import LayoutDashboard from "../../Shared/Layout/LayoutDashboard.vue";
import DashboardHeader from "../../Shared/Dashboard/DashboardHeader.vue";
import DokterCard from "../../Shared/Dashboard/LakukanReservasi/DokterCard.vue";
</script>

<script>
export default {
    layout: LayoutDashboard,
};
</script>

<template>
    <div class="h-full">
        <DashboardHeader
            title="Lakukan Reservasi"
            :name="$page.props.username"
        />

        <div class="space-y-6">
            <DokterCard />
            <DokterCard />
            <DokterCard />
        </div>
    </div>
</template>
