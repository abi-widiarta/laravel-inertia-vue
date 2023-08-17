<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import { reactive } from "vue";
import LayoutDashboardAdmin from "../../../Shared/Layout/LayoutDashboardAdmin.vue";
import DashboardHeader from "../../../Shared/Dashboard/DashboardHeader.vue";

let props = defineProps({
    jadwal: Object,
});

let allHari = ["senin", "selasa", "rabu", "kamis", "jumat", "sabtu", "minggu"];

let getTime = (jadwal_dokter, hari, time) => {
    if (time == "start") {
        if (jadwal_dokter[hari] == null) {
            return "-";
        } else if (jadwal_dokter[hari] == "") {
            return "-";
        } else {
            return jadwal_dokter[hari].slice(0, 5);
        }
    } else if (time == "end") {
        if (jadwal_dokter[hari] == null) {
            return "-";
        } else if (jadwal_dokter[hari] == "") {
            return "-";
        } else {
            return jadwal_dokter[hari].slice(8, 14);
        }
    }
};

const jadwalComplete = reactive({
    senin: {
        start: getTime(props.jadwal, "senin", "start"),
        end: getTime(props.jadwal, "senin", "end"),
    },
    selasa: {
        start: getTime(props.jadwal, "selasa", "start"),
        end: getTime(props.jadwal, "selasa", "end"),
    },
    rabu: {
        start: getTime(props.jadwal, "rabu", "start"),
        end: getTime(props.jadwal, "rabu", "end"),
    },
    kamis: {
        start: getTime(props.jadwal, "kamis", "start"),
        end: getTime(props.jadwal, "kamis", "end"),
    },
    jumat: {
        start: getTime(props.jadwal, "jumat", "start"),
        end: getTime(props.jadwal, "jumat", "end"),
    },
    sabtu: {
        start: getTime(props.jadwal, "sabtu", "start"),
        end: getTime(props.jadwal, "sabtu", "end"),
    },
    minggu: {
        start: getTime(props.jadwal, "minggu", "start"),
        end: getTime(props.jadwal, "minggu", "end"),
    },
});

const summaryJadwal = (jadwalComplete) => {
    let initialSummary = {};

    allHari.forEach((el) => {
        initialSummary[el] =
            jadwalComplete[el].start == "-"
                ? "-"
                : `${jadwalComplete[el].start} - ${jadwalComplete[el].end}`;
    });

    return initialSummary;
};

let submit = () => {
    let form = useForm(summaryJadwal(jadwalComplete));
    form.post("/admin-jadwal-dokter/" + props.jadwal.id + "/update");
};
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
            <div class="flex justify-between mb-4">
                <Link
                    href="/admin-jadwal-dokter"
                    class="bg-gray-500 flex space-x-2 text-sm px-4 py-2 font-semibold text-white rounded-full transition duration-150 hover:opacity-70"
                >
                    <p>◀</p>
                    <p>Kembali</p>
                </Link>
            </div>
            <h2
                class="text-primary font-semibold text-2xl text-center mb-8 -mt-10"
            >
                Ubah Data Jadwal Dokter
            </h2>
            <!-- <p>Jadwal senin {{ props.jadwal }}</p> -->
            <!-- <table>
                <thead>
                    <tr>
                        <th>Tes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="text-sm text-center"
                        :class="{
                            'bg-[#F5F5F5]': (index + 1) % 2 != 0,
                        }"
                    >
                        <td class="border-2 border-[#E9E9E9] py-3 text-sm">
                            {{ getTime(jadwal, "senin") }}
                        </td>
                        <td
                            class="border-2 border-[#E9E9E9] py-3 text-sm text-center"
                        >
                            {{ getTime(jadwal, "selasa") }}
                        </td>
                        <td class="border-2 border-[#E9E9E9] py-3 text-sm">
                            {{ getTime(jadwal, "rabu") }}
                        </td>
                        <td class="border-2 border-[#E9E9E9] py-3 text-sm">
                            {{ getTime(jadwal, "kamis") }}
                        </td>
                        <td class="border-2 border-[#E9E9E9] py-3 text-sm">
                            {{ getTime(jadwal, "jumat") }}
                        </td>
                        <td class="border-2 border-[#E9E9E9] py-3 text-sm">
                            {{ getTime(jadwal, "sabtu") }}
                        </td>
                        <td class="border-2 border-[#E9E9E9] py-3 text-sm">
                            {{ getTime(jadwal, "minggu") }}
                        </td>
                    </tr>
                </tbody>
            </table> -->
            <div class="flex justify-center">
                <form @submit.prevent="submit" action="#" class="rounded-lg">
                    <h2 class="font-semibold text-base mb-2">Dr. Santuy</h2>
                    <table class="border-collapse border-spacing-0 mb-10">
                        <thead>
                            <tr>
                                <th
                                    class="border font-medium bg-gray-100 border-slate-300 py-3 rounded-tl-lg w-32"
                                >
                                    Hari
                                </th>
                                <th
                                    class="border font-medium bg-gray-100 border-slate-300 w-40"
                                >
                                    Start
                                </th>
                                <th
                                    class="border font-medium bg-gray-100 border-slate-300 w-40"
                                >
                                    End
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(hari, index) in allHari" :key="index">
                                <td
                                    class="border border-slate-300 capitalize text-center py-4 bg-gray-100"
                                >
                                    {{ hari }}
                                </td>
                                <td class="border border-slate-300 text-center">
                                    <input
                                        v-model="jadwalComplete[hari].start"
                                        type="time"
                                        class="border border-gray-300 rounded-lg px-2 py-1 text-sm"
                                    />
                                </td>
                                <td class="border border-slate-300 text-center">
                                    <input
                                        v-model="jadwalComplete[hari].end"
                                        type="time"
                                        class="border border-gray-300 rounded-lg px-2 py-1 text-sm"
                                    />
                                </td>
                            </tr>
                            <!-- <tr
                                v-for="(hari, index) in allHari"
                                :key="index"
                                class="flex items-center gap-8"
                            >
                                <td
                                    for="senin"
                                    class="font-semibold capitalize border border-slate-500"
                                >
                                    {{ hari }}
                                </td>
                                <td class="border border-slate-500">
                                    
                                </td>
                                <td class="border border-slate-500">
                                    <p class="text-center text-sm">End</p>
                                    <input
                                        :value="
                                            getTime(props.jadwal, hari, 'end')
                                        "
                                        type="time"
                                        class="border border-gray-300 rounded-lg px-2 py-1 text-xs"
                                    />
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                    <button
                        type="submit"
                        class="block text-white w-64 mx-auto rounded-full bg-primary font-medium shadow-lg transition duration-200 hover:shadow-primary/50 shadow-primary/30 text-sm px-5 py-2.5 text-center"
                    >
                        Update
                    </button>
                </form>
            </div>
            <!-- <div class="flex-1 flex justify-center items-center">
                <form @submit.prevent="submit" class="w-full space-y-8">
                    <div
                        class="flex mx-auto justify-between space-x-12 max-w-[650px]"
                    >
                        <div class="flex-1">
                            <div class="mb-6">
                                <label
                                    for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Nama</label
                                >
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    v-model="form.name"
                                    class="bg-white disabled:bg-slate-100 disabled:text-gray-500 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-primary/50"
                                    required
                                />
                            </div>
                            <div class="mb-6">
                                <label
                                    for="address"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Alamat</label
                                >
                                <input
                                    type="text"
                                    id="address"
                                    name="address"
                                    v-model="form.address"
                                    class="bg-white disabled:bg-slate-100 disabled:text-gray-500 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-primary/50"
                                    required
                                />
                            </div>

                            <div class="mb-6">
                                <label
                                    for="poli"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Poli</label
                                >
                                <select
                                    v-model="form.poli"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:border-primary focus:border-1"
                                >
                                    <option
                                        value="Umum"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:border-primary focus:border-1"
                                    >
                                        Umum
                                    </option>
                                    <option
                                        value="Gigi"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:border-primary focus:border-1"
                                    >
                                        Gigi
                                    </option>
                                    <option
                                        value="Mata"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:border-primary focus:border-1"
                                    >
                                        Mata
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="flex-1">
                            <div class="mb-6">
                                <label
                                    for="nid"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Nomor Induk Dokter</label
                                >
                                <input
                                    type="text"
                                    id="nid"
                                    name="nid"
                                    v-model="form.nid"
                                    class="bg-white disabled:bg-slate-100 disabled:text-gray-500 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-primary/50"
                                    required
                                />
                            </div>

                            <div class="mb-7">
                                <label
                                    for="birthdate"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Birthdate</label
                                >
                                <input
                                    type="date"
                                    id="birthdate"
                                    name="birthdate"
                                    v-model="form.birthdate"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:border-primary focus:border-1"
                                    required
                                />
                            </div>

                            <div class="mb-6 space-y-2">
                                <label
                                    for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                    >Gender</label
                                >
                                <div class="flex space-x-4">
                                    <div class="flex space-x-1 items-center">
                                        <input
                                            class="cursor-pointer"
                                            type="radio"
                                            name="gender"
                                            id="gender-male"
                                            value="L"
                                            v-model="form.gender"
                                        />
                                        <label for="gender-male"
                                            ><p class="text-sm">Male</p></label
                                        >
                                    </div>
                                    <div class="flex space-x-1 items-center">
                                        <input
                                            class="cursor-pointer"
                                            type="radio"
                                            name="gender"
                                            value="P"
                                            v-model="form.gender"
                                            id="gender-female"
                                        />
                                        <label for="gender-female"
                                            ><p class="text-sm">
                                                Female
                                            </p></label
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="block text-white w-64 mx-auto rounded-full bg-primary font-medium shadow-lg transition duration-200 hover:shadow-primary/50 shadow-primary/30 text-sm px-5 py-2.5 text-center"
                    >
                        Update
                    </button>
                </form>
            </div> -->
        </div>
    </div>
</template>
