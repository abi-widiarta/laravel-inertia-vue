<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import LayoutDashboardAdmin from "../../../Shared/Layout/LayoutDashboardAdmin.vue";
import DashboardHeader from "../../../Shared/Dashboard/DashboardHeader.vue";

const props = defineProps({
    users: Object,
});

let search = ref("");
</script>

<script>
export default {
    layout: LayoutDashboardAdmin,
};
</script>

<template>
    <div class="h-full flex flex-col">
        <DashboardHeader title="Data Pasien" :name="$page.props.username" />

        <div class="bg-white w-full rounded-xl flex-1 p-6">
            <h2 class="text-lg font-semibold mb-8">Kelola Data Pasien</h2>
            <div class="flex justify-between mb-6">
                <button
                    class="bg-primary text-sm px-4 py-2 font-semibold text-white rounded-full transition duration-150 hover:opacity-70"
                >
                    Tambah Data
                </button>
                <input
                    type="text"
                    v-model="search"
                    class="p-1 text-sm rounded-md border-2 border-gray-300 focus:border-gray-600"
                    placeholder="Search..."
                />
            </div>
            <table class="border-collapse border-2 w-full border-[#E9E9E9]">
                <thead>
                    <tr>
                        <th
                            class="border-2 w-1 text-sm font-semibold py-5 border-[#E9E9E9]"
                        >
                            NIM
                        </th>
                        <th
                            class="border-2 text-sm font-semibold border-[#E9E9E9]"
                        >
                            Nama Pasien
                        </th>
                        <th
                            class="border-2 text-sm font-semibold border-[#E9E9E9]"
                        >
                            Email
                        </th>
                        <th
                            class="border-2 w-24 text-sm font-semibold border-[#E9E9E9]"
                        >
                            Jenis <br />
                            Kelamin
                        </th>
                        <th
                            class="border-2 text-sm font-semibold border-[#E9E9E9]"
                        >
                            Tempat <br />
                            Tanggal Lahir
                        </th>
                        <th class="border-2 font-semibold border-[#E9E9E9]">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="text-sm"
                        v-for="(user, index) in props.users"
                        :key="user.id"
                        :class="{
                            'bg-[#F5F5F5]': (index + 1) % 2 != 0,
                        }"
                    >
                        <td class="border-2 border-[#E9E9E9] py-3 px-4">
                            {{ user.nim }}
                        </td>
                        <td class="border-2 border-[#E9E9E9] py-3 px-4">
                            {{ user.name }}
                        </td>
                        <td class="border-2 border-[#E9E9E9] py-3 px-4">
                            {{ user.email }}
                        </td>
                        <td
                            class="border-2 border-[#E9E9E9] py-3 px-4 text-center"
                        >
                            L
                        </td>
                        <td class="border-2 border-[#E9E9E9] py-3 px-4">
                            Jl.asdad asdasdas
                        </td>
                        <td class="border-2 border-[#E9E9E9]">
                            <div
                                class="flex items-center justify-center space-x-2"
                            >
                                <button
                                    class="w-8 rounded-md aspect-square bg-gray-400"
                                ></button>
                                <button
                                    class="w-8 rounded-md aspect-square bg-red-500"
                                ></button>
                            </div>
                        </td>
                    </tr>
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
