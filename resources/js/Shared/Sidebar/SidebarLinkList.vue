<script setup>
import { ref, onMounted } from "vue";
import SidebarLink from "./SidebarLink.vue";
import autoAnimate from "@formkit/auto-animate";
import { Link, router } from "@inertiajs/vue3";

import Swal from "sweetalert2";

function showAlert() {
    Swal.fire({
        title: "Logout",
        text: "Are you sure want to logout?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#aaaa",
        cancelButtonColor: "#ED1C24",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            router.visit("/logout", {
                method: "post",
            });
        }
    });

    return isTrue;
}
</script>

<template>
    <div class="flex flex-col justify-between w-56">
        <ul class="space-y-1">
            <li>
                <SidebarLink
                    title="Dashboard"
                    imgurl="img/dashboard-icon.png"
                    :active="$page.component == 'Dashboard/Dashboard'"
                    to="/dashboard"
                />
            </li>
            <li>
                <SidebarLink
                    title="Lakukan Reservasi"
                    imgurl="img/lakukan-reservasi-icon.png"
                    :active="$page.component == 'Dashboard/LakukanReservasi'"
                    to="/lakukan-reservasi"
                />
            </li>
            <li>
                <SidebarLink
                    title="Reservasi Saya"
                    imgurl="img/reservasi-saya-icon.png"
                    :active="$page.component == 'Dashboard/ReservasiSaya'"
                    to="/reservasi-saya"
                />
            </li>
            <li>
                <SidebarLink
                    title="Antrian"
                    imgurl="img/antrian-sidebar-icon.png"
                    :active="$page.component == 'Dashboard/Antrian'"
                    to="/antrian"
                />
            </li>
            <li>
                <SidebarLink
                    title="Riwayat Pemeriksaan"
                    imgurl="img/riwayat-pemeriksaan-icon.png"
                    :active="$page.component == 'Dashboard/RiwayatPemeriksaan'"
                    to="/riwayat-pemeriksaan"
                />
            </li>
        </ul>
        <button
            @click="showAlert"
            class="flex justify-start items-center rounded-xl space-x-3 py-4 px-4"
        >
            <img class="w-[25px] z-10" src="img/logout-icon.png" alt="logo" />
            <p class="font-normal z-10 text-sm">Logout</p>
        </button>
        <!-- <button @click="remove" class="border rounded-md px-3">Delete</button> -->
    </div>
</template>
