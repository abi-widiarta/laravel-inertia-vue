<script setup>
import { Link } from "@inertiajs/vue3";
import LayoutDashboardAdmin from "../../../Shared/Layout/LayoutDashboardAdmin.vue";
import DashboardHeader from "../../../Shared/Dashboard/DashboardHeader.vue";

let props = defineProps({
    doctors: Object,
});

let getTime = (jadwal_dokter, hari) => {
    if (jadwal_dokter == null) {
        return "-";
    } else if (jadwal_dokter[hari] == "" || jadwal_dokter[hari] == null) {
        return "-";
    } else {
        return jadwal_dokter[hari];
    }
};

function getEditUrl(jadwal_dokter) {
    if (jadwal_dokter != null) {
        return "/admin-jadwal-dokter/" + jadwal_dokter.id + "/edit";
    }
}
</script>

<script>
export default {
    layout: LayoutDashboardAdmin,
};
</script>

<template>
    <div class="h-full">
        <DashboardHeader title="Jadwal Dokter" :name="$page.props.username" />

        <div class="bg-white w-full rounded-xl flex-1 p-6">
            <h2 class="text-lg font-semibold mb-8">Kelola Jadwal Dokter</h2>

            <table class="border-collapse border-2 w-full border-[#E9E9E9]">
                <thead>
                    <tr>
                        <th
                            class="border-2 w-[40px] text-sm font-semibold py-5 border-[#E9E9E9]"
                        >
                            No
                        </th>
                        <th
                            class="border-2 text-sm font-semibold border-[#E9E9E9]"
                        >
                            Nama Dokter
                        </th>
                        <th
                            class="border-2 w-[100px] text-sm font-semibold border-[#E9E9E9]"
                        >
                            Senin
                        </th>

                        <th
                            class="border-2 w-[100px] text-sm font-semibold border-[#E9E9E9]"
                        >
                            Selasa
                        </th>
                        <th
                            class="border-2 w-[100px] text-sm font-semibold border-[#E9E9E9]"
                        >
                            Rabu
                        </th>
                        <th
                            class="border-2 w-[100px] text-sm font-semibold border-[#E9E9E9]"
                        >
                            Kamis
                        </th>
                        <th
                            class="border-2 w-[100px] text-sm font-semibold border-[#E9E9E9]"
                        >
                            Jumat
                        </th>
                        <th
                            class="border-2 w-[100px] text-sm font-semibold border-[#E9E9E9]"
                        >
                            Sabtu
                        </th>
                        <th
                            class="border-2 w-[100px] text-sm font-semibold border-[#E9E9E9]"
                        >
                            Minggu
                        </th>
                        <th
                            class="border-2 w-24 text-sm font-semibold border-[#E9E9E9]"
                        >
                            Poli
                        </th>
                        <th class="border-2 font-semibold border-[#E9E9E9]">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <template
                        :key="doctor.id"
                        v-for="(doctor, index) in props.doctors"
                    >
                        <tr
                            class="text-sm text-center"
                            :class="{
                                'bg-[#F5F5F5]': (index + 1) % 2 != 0,
                            }"
                        >
                            <td class="border-2 border-[#E9E9E9] py-3 px-1">
                                {{ index + 1 }}
                            </td>
                            <td
                                class="border-2 border-[#E9E9E9] py-3 text-start pl-2"
                            >
                                {{ doctor.name }}
                            </td>
                            <td class="border-2 border-[#E9E9E9] py-3 text-sm">
                                {{ getTime(doctor.jadwal_dokter, "senin") }}
                            </td>
                            <td
                                class="border-2 border-[#E9E9E9] py-3 text-sm text-center"
                            >
                                {{ getTime(doctor.jadwal_dokter, "selasa") }}
                            </td>
                            <td class="border-2 border-[#E9E9E9] py-3 text-sm">
                                {{ getTime(doctor.jadwal_dokter, "rabu") }}
                            </td>
                            <td class="border-2 border-[#E9E9E9] py-3 text-sm">
                                {{ getTime(doctor.jadwal_dokter, "kamis") }}
                            </td>
                            <td class="border-2 border-[#E9E9E9] py-3 text-sm">
                                {{ getTime(doctor.jadwal_dokter, "jumat") }}
                            </td>
                            <td class="border-2 border-[#E9E9E9] py-3 text-sm">
                                {{ getTime(doctor.jadwal_dokter, "sabtu") }}
                            </td>
                            <td class="border-2 border-[#E9E9E9] py-3 text-sm">
                                {{ getTime(doctor.jadwal_dokter, "minggu") }}
                            </td>
                            <td class="border-2 border-[#E9E9E9] py-3">
                                {{ doctor.poli }}
                            </td>
                            <td class="border-2 border-[#E9E9E9]">
                                <div
                                    class="flex items-center justify-center space-x-2"
                                >
                                    <Link
                                        :href="getEditUrl(doctor.jadwal_dokter)"
                                        class="w-8 grid place-items-center rounded-md aspect-square bg-gray-400 hover:bg-gray-500"
                                    >
                                        <img
                                            src="img/edit-icon.png"
                                            alt="edit-icon"
                                        />
                                    </Link>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
            <!-- <table class="w-full border-collapse table-auto">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama Pasien</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>asd</td>
                        <td>asd</td>
                        <td>asd</td>
                        <td>asd</td>
                        <td>asd</td>
                        <td>asd</td>
                    </tr>
                    <tr>
                        <td>asd</td>
                        <td>asd</td>
                        <td>asd</td>
                        <td>asd</td>
                        <td>asd</td>
                        <td>asd</td>
                    </tr>
                </tbody>
            </table> -->
        </div>
    </div>
</template>
