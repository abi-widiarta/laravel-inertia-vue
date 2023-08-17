<script setup>
import { Link, router } from "@inertiajs/vue3";
import { ref } from "vue";
import LayoutDashboardAdmin from "../../../Shared/Layout/LayoutDashboardAdmin.vue";
import DashboardHeader from "../../../Shared/Dashboard/DashboardHeader.vue";
import Swal from "sweetalert2";

const props = defineProps({
    users: Object,
    admin: String,
});

function showAlert(id) {
    Swal.fire({
        title: "Warning",
        text: "Are you sure want to delete this data?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#aaaa",
        cancelButtonColor: "#ED1C24",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            router.post("/admin/delete-dokter", {
                id: id,
            });
        }
    });
}
function getEditUrl(user) {
    return "/admin-data-dokter/" + user.id + "/edit";
}
let search = ref("");
</script>

<script>
export default {
    layout: LayoutDashboardAdmin,
};
</script>

<template>
    <div class="h-full flex flex-col">
        <DashboardHeader title="Data Dokter" :name="$page.props.username" />
        <!-- {{ session }} -->

        <!-- <p>{{ props.admin }}</p> -->
        <div class="bg-white w-full rounded-xl flex-1 p-6">
            <h2 class="text-lg font-semibold mb-8">Kelola Data Dokter</h2>
            <div class="flex justify-between mb-6">
                <Link
                    href="admin-data-dokter/create"
                    class="bg-primary text-sm px-4 py-2 font-semibold text-white rounded-full transition duration-150 hover:opacity-70"
                >
                    Tambah Data
                </Link>
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
                            No
                        </th>
                        <th
                            class="border-2 text-sm font-semibold border-[#E9E9E9]"
                        >
                            Nama Dokter
                        </th>
                        <th
                            class="border-2 text-sm font-semibold border-[#E9E9E9]"
                        >
                            Nomor Induk Dokter
                        </th>

                        <th
                            class="border-2 text-sm font-semibold border-[#E9E9E9]"
                        >
                            Tanggal Lahir
                        </th>
                        <th
                            class="border-2 text-sm font-semibold border-[#E9E9E9]"
                        >
                            Jenis <br />
                            Kelamin
                        </th>
                        <th
                            class="border-2 text-sm font-semibold border-[#E9E9E9]"
                        >
                            Alamat
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
                        :key="user.id"
                        v-for="(user, index) in props.users"
                    >
                        <tr
                            class="text-sm text-center"
                            :class="{
                                'bg-[#F5F5F5]': (index + 1) % 2 != 0,
                            }"
                        >
                            <td class="border-2 border-[#E9E9E9] py-3 px-4">
                                {{ index + 1 }}
                            </td>
                            <td class="border-2 border-[#E9E9E9] py-3 px-4">
                                {{ user.name }}
                            </td>
                            <td class="border-2 border-[#E9E9E9] py-3 px-4">
                                {{ user.nomor_induk_dokter }}
                            </td>
                            <td
                                class="border-2 border-[#E9E9E9] py-3 px-4 text-center"
                            >
                                {{ user.birthdate }}
                            </td>
                            <td class="border-2 border-[#E9E9E9] py-3 px-4">
                                {{ user.gender }}
                            </td>
                            <td class="border-2 border-[#E9E9E9] py-3 px-4">
                                {{ user.address }}
                            </td>
                            <td class="border-2 border-[#E9E9E9] py-3 px-4">
                                {{ user.poli }}
                            </td>
                            <td class="border-2 border-[#E9E9E9]">
                                <div
                                    class="flex items-center justify-center space-x-2"
                                >
                                    <Link
                                        :href="getEditUrl(user)"
                                        class="w-8 grid place-items-center rounded-md aspect-square bg-gray-400 hover:bg-gray-500"
                                    >
                                        <img
                                            src="img/edit-icon.png"
                                            alt="edit-icon"
                                        />
                                    </Link>
                                    <button
                                        @click="showAlert(user.id)"
                                        class="w-8 grid place-items-center rounded-md aspect-square bg-red-500 hover:bg-red-600"
                                    >
                                        <img
                                            src="img/delete-icon.png"
                                            alt="delete-icon"
                                        />
                                    </button>
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
