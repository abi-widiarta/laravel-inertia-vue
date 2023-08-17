<script setup>
let props = defineProps({
    name: String,
    poli: String,
    hari: Object,
});

let allHari = ["senin", "selasa", "rabu", "kamis", "jumat", "sabtu", "minggu"];

let getHariJam = (hari_ini) => {
    if (props.hari[hari_ini] != null) {
        return props.hari[hari_ini];
    } else {
        return "-";
    }
};
</script>

<template>
    <div
        class="flex space-x-4 bg-white pl-6 pr-10 py-6 rounded-xl shadow-lg shadow-gray-100"
    >
        <div class="text-center space-y-4">
            <img
                class="w-36 rounded-lg"
                src="img/doctor-1.png"
                alt="doctor-1"
            />
            <h1 class="font-semibold">{{ props.name }}</h1>
        </div>
        <span class="block w-[2px] h-52 bg-gray-200"></span>
        <div class="px-2 py-2 flex-1 flex flex-col justify-between">
            <div>
                <h2 class="text-base font-semibold mb-4">Jadwal Praktek</h2>
                <ul class="flex justify-between" :key="index">
                    <template v-for="(hari_ini, index) in allHari" :key="index">
                        <li class="w-32">
                            <h3 class="text-base font-semibold mb-2 capitalize">
                                {{ hari_ini }}
                            </h3>
                            <p class="text-base">{{ getHariJam(hari_ini) }}</p>
                        </li>
                    </template>
                </ul>
            </div>
            <div class="flex justify-between items-end">
                <div class="space-y-3">
                    <h3 class="text-base font-semibold">Poli {{ poli }}</h3>
                    <div class="flex space-x-2 items-end">
                        <img src="img/star-icon.png" alt="star-icon" />
                        <p class="inline-block text-sm translate-y-[2px]">
                            4.6
                        </p>
                    </div>
                </div>
                <button
                    class="py-3 text-white px-10 shadow-lg bg-gradient-to-r from-primary/90 to-primary/50 rounded-xl transition duration-200 hover:bg-primary"
                >
                    Reservasi
                </button>
            </div>
        </div>
    </div>
</template>
