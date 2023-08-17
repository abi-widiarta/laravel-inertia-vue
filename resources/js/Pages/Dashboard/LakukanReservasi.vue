<script setup>
import { Link } from "@inertiajs/vue3";
import LayoutDashboard from "../../Shared/Layout/LayoutDashboard.vue";
import DashboardHeader from "../../Shared/Dashboard/DashboardHeader.vue";
import DokterCard from "../../Shared/Dashboard/LakukanReservasi/DokterCard.vue";

let props = defineProps({
    doctors: Object,
});

let allHari = ["senin", "selasa", "rabu", "kamis", "jumat", "sabtu", "minggu"];

let isReady = (jadwal_dokter) => {
    let isReady = false;
    allHari.forEach((hari) => {
        if (jadwal_dokter[hari] != null) {
            console.log(jadwal_dokter[hari]);
            isReady = true;
        }
    });

    return isReady;
};
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
            <template v-for="doctor in props.doctors" :key="doctor.id">
                <DokterCard
                    v-if="isReady(doctor.jadwal_dokter)"
                    :name="doctor.name"
                    :poli="doctor.poli"
                    :hari="doctor.jadwal_dokter"
                />
            </template>
        </div>
    </div>
</template>
