<script setup>
import { Link, router, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import LayoutDashboardAdmin from "../../../Shared/Layout/LayoutDashboardAdmin.vue";
import DashboardHeader from "../../../Shared/Dashboard/DashboardHeader.vue";
import Swal from "sweetalert2";

let props = defineProps({
    users: Object,
});

let form = useForm({
    name: props.users.name,
    address: props.users.address,
    poli: props.users.poli,
    gender: props.users.gender,
    birthdate: props.users.birthdate,
    nid: props.users.nomor_induk_dokter,
});

let submit = () => {
    // console.log(form);
    form.post("/admin-data-dokter/" + props.users.id + "/update");
};

// const props = defineProps({
//     users: Object,
//     admin: String,
// });

// function showAlert(id) {
//     Swal.fire({
//         title: "Warning",
//         text: "Are you sure want to delete this data?",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#aaaa",
//         cancelButtonColor: "#ED1C24",
//         confirmButtonText: "Yes",
//     }).then((result) => {
//         if (result.isConfirmed) {
//             router.post("/admin/delete-pasien", {
//                 id: id,
//             });
//         }
//     });
// }

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
            <div class="flex justify-between mb-4">
                <Link
                    href="/admin-data-dokter"
                    class="bg-gray-500 flex space-x-2 text-sm px-4 py-2 font-semibold text-white rounded-full transition duration-150 hover:opacity-70"
                >
                    <p>◀</p>
                    <p>Kembali</p>
                </Link>
            </div>
            <h2 class="text-primary font-semibold text-2xl text-center mb-12">
                Ubah Data Dokter
            </h2>
            <div class="flex-1 flex justify-center items-center">
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

                                <!-- <p
                              id="outlined_error_help"
                              class="mt-2 text-xs text-red-600 dark:text-red-400"
                          >
                              asd
                          </p> -->
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

                                <!-- <p
                              id="outlined_error_help"
                              class="mt-2 text-xs text-red-600 dark:text-red-400"
                          >
                              asd
                          </p> -->
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

                                <!-- <p
                              id="outlined_error_help"
                              class="mt-2 text-xs text-red-600 dark:text-red-400"
                          >
                              asd
                          </p> -->
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

                                <!-- <p
                              id="outlined_error_help"
                              class="mt-2 text-xs text-red-600 dark:text-red-400"
                          >
                              asd
                          </p> -->
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

                                <!-- <p
                            id="outlined_error_help"
                            class="mt-2 text-xs text-red-600 dark:text-red-400"
                        >
                            asd
                        </p> -->
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
            </div>
        </div>
    </div>
</template>
