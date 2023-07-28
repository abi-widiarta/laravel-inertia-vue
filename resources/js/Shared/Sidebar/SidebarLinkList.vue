<script setup>
import { ref, onMounted } from "vue";
import SidebarLink from "./SidebarLink.vue";
import autoAnimate from "@formkit/auto-animate";
import { Link } from "@inertiajs/vue3";

import Swal from "sweetalert2";

function confirm() {
    let isTrue = window.confirm("Are you sure?");

    // Swal.fire({
    //     title: "Logout",
    //     text: "Are you sure want to logout?",
    //     icon: "warning",
    //     showCancelButton: true,
    //     confirmButtonColor: "#aaaa",
    //     cancelButtonColor: "#ED1C24",
    //     confirmButtonText: "Yes",
    // }).then((result) => {
    //     if (result.isConfirmed) {
    //         isTrue = true;
    //     } else {
    //         isTrue = false;
    //     }
    // });

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
                <!-- <div
                    class="bg-red-500"
                    v-if="$page.component == 'Dashboard/Dashboard'"
                >
                    asdasd
                </div> -->
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
                    title="Riwayat Pemeriksaan"
                    imgurl="img/riwayat-pemeriksaan-icon.png"
                    :active="$page.component == 'Dashboard/RiwayatPemeriksaan'"
                    to="/riwayat-pemeriksaan"
                />
            </li>
        </ul>
        <Link
            :onBefore="confirm"
            class="flex justify-start items-center rounded-xl space-x-3 py-4 px-4"
            as="button"
            method="post"
            href="/logout"
            ><img class="w-[25px] z-10" src="img/logout-icon.png" alt="logo" />
            <p class="font-normal z-10 text-sm">Logout</p></Link
        >

        <!-- <Link
            href="/logout"
            method="post"
            as="button"
            type="button"
            :onBefore="() => confirm()"
            >L</Link
        > -->
        <!-- <button @click="remove" class="border rounded-md px-3">Delete</button> -->
    </div>
</template>
