<script setup>
import { Link } from "@inertiajs/vue3";
import LayoutDashboard from "../../Shared/Layout/LayoutDashboard.vue";
import DashboardHeader from "../../Shared/Dashboard/DashboardHeader.vue";
import ReservasiCard from "../../Shared/Dashboard/Rerservasi Saya/ReservasiCard.vue";
</script>

<script>
export default {
    layout: LayoutDashboard,
};
</script>

<template>
    <section>
        <DashboardHeader title="Reservasi Saya" :name="$page.props.username" />
        <div class="flex flex-wrap gap-8">
            <ReservasiCard />
        </div>
    </section>
</template>
