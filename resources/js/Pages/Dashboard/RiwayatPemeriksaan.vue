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
        <DashboardHeader
            title="Riwayat Pemeriksaan"
            :name="$page.props.username"
        />
        <div class="flex">
            <div
                class="flex space-x-6 bg-white pl-6 pr-10 py-6 rounded-xl shadow-lg shadow-gray-100"
            >
                <img
                    class="w-[212px] rounded-lg"
                    src="img/doctor-1.png"
                    alt="doctor-1"
                />
                <div class="flex flex-col justify-between items-start">
                    <div>
                        <h1 class="text-lg font-bold">Dr.Chika</h1>
                        <p class="text-base font-medium mb-5">Poli Umum</p>
                        <div class="space-y-3 mt-6">
                            <div class="flex items-center space-x-2">
                                <img
                                    class="w-6"
                                    src="img/reservasi-saya-icon.png"
                                    alt="antrian"
                                />
                                <p class="text-sm">Sabtu - 20 Mei 2023</p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-6">
                                    <img
                                        class="w-4 mx-auto"
                                        src="img/checklist-icon.png"
                                        alt="checklist"
                                    />
                                </div>
                                <p class="text-sm text-gray-500">
                                    Surat Dokter
                                </p>
                            </div>
                        </div>
                    </div>
                    <button
                        class="py-3 font-medium px-10 text-white shadow-lg bg-gradient-to-r from-primary/90 to-primary/50 rounded-lg transition duration-200 hover:bg-primary"
                    >
                        Detail
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>
