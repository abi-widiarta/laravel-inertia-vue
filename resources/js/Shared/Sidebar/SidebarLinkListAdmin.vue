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
            router.visit("/logout-admin", {
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
                    :active="$page.component == 'Admin/Dashboard/Dashboard'"
                    to="/admin-dashboard"
                />
            </li>
            <li>
                <SidebarLink
                    title="Data Pasien"
                    imgurl="img/data-pasien-icon.png"
                    :active="
                        $page.component == 'Admin/Dashboard/DataPasien' ||
                        $page.component == 'Admin/Dashboard/DataPasienTambah'
                    "
                    to="/admin-data-pasien"
                />
            </li>
            <li>
                <SidebarLink
                    title="Data Dokter"
                    imgurl="img/data-dokter-icon.png"
                    :active="$page.component == 'Admin/Dashboard/DataDokter'"
                    to="/admin-data-dokter"
                />
            </li>
            <li>
                <SidebarLink
                    title="Jadwal Dokter"
                    imgurl="img/reservasi-saya-icon.png"
                    :active="$page.component == 'Admin/Dashboard/JadwalDokter'"
                    to="/admin-jadwal-dokter"
                />
            </li>
            <li>
                <SidebarLink
                    title="Antrian Pemeriksaan"
                    imgurl="img/antrian-sidebar-icon.png"
                    :active="
                        $page.component == 'Admin/Dashboard/AntrianPemeriksaan'
                    "
                    to="/admin-antrian-pemeriksaan"
                />
            </li>
            <li>
                <SidebarLink
                    title="Pembayaran"
                    imgurl="img/pembayaran-icon.png"
                    :active="$page.component == 'Admin/Dashboard/Pembayaran'"
                    to="/admin-pembayaran"
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
