<script setup>
import { Link, router, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import LayoutDashboardAdmin from "../../../Shared/Layout/LayoutDashboardAdmin.vue";
import DashboardHeader from "../../../Shared/Dashboard/DashboardHeader.vue";
import Swal from "sweetalert2";

let props = defineProps({
    id: String,
    name: String,
    email: String,
    gender: String,
    birthdate: String,
});

let form = useForm({
    name: props.name,
    email: props.email,
    gender: props.gender,
    birthdate: props.birthdate,
});

let submit = () => {
    // console.log(form);
    form.post("/admin-data-pasien/" + props.id + "/update");
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
        <DashboardHeader title="Data Pasien" :name="$page.props.username" />
        <!-- {{ session }} -->

        <!-- <p>{{ props.admin }}</p> -->
        <div class="bg-white w-full rounded-xl flex-1 p-6">
            <div class="flex justify-between mb-4">
                <Link
                    href="/admin-data-pasien"
                    class="bg-gray-500 flex space-x-2 text-sm px-4 py-2 font-semibold text-white rounded-full transition duration-150 hover:opacity-70"
                >
                    <p>◀</p>
                    <p>Kembali</p>
                </Link>
            </div>
            <h2 class="text-primary font-semibold text-2xl text-center mb-10">
                Ubah Data Pasien
            </h2>
            <div class="flex-1 flex justify-center items-center">
                <form @submit.prevent="submit" class="w-72">
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
                            for="email"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Email</label
                        >
                        <input
                            disabled
                            type="email"
                            id="email"
                            name="email"
                            v-model="form.email"
                            class="bg-white disabled:bg-slate-100 disabled:text-gray-500 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 focus:outline-primary/50"
                            required
                        />
                    </div>

                    <div class="mb-6">
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
                                    ><p class="text-sm">Female</p></label
                                >
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label
                            for="birthdate"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Birhdate</label
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

                    <button
                        type="submit"
                        class="w-full text-white rounded-full bg-primary font-medium shadow-lg transition duration-200 hover:shadow-primary/50 shadow-primary/30 text-sm px-5 py-2.5 text-center"
                    >
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
