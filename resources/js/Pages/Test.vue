<script setup>
import { ref } from "vue";
import { MeterGroup } from "primevue";

const apps = ref(2);
const messages = ref(10);
const media = ref(24);
const system = ref(24);

const value = ref([
    { label: 'Apps', color: '#34d399', value: apps },
    { label: 'Messages', color: '#fbbf24', value: messages },
    { label: 'Media', color: '#60a5fa', value: media },
    { label: 'System', color: '#c084fc', value: system }
]);

const addValue = (type) => {
    console.log('tipo recebido', type);

    switch (type) {
        case 'apps':
            if (apps.value + messages.value + media.value + system.value >= 100) {
                break;
            }
            apps.value++;
            break;
        case 'messages':
            if (apps.value + messages.value + media.value + system.value >= 100) {
                break;
            }
            messages.value++;
            break;
        case 'media':
            if (apps.value + messages.value + media.value + system.value >= 100) {
                break;
            }
            media.value++;
            break;
        case 'system':
            if (apps.value + messages.value + media.value + system.value >= 100) {
                break;
            }
            system.value++;
            break;
        default:
            break;
    }
}

const removeValue = (type) => {
    console.log('tipo recebido', type);

    switch (type) {
        case 'apps':
            if (apps.value + messages.value + media.value + system.value <= 0 || apps.value <= 0) {
                break;
            }
            apps.value--;
            break;
        case 'messages':
            if (apps.value + messages.value + media.value + system.value <= 0 || messages.value <= 0) {
                break;
            }
            messages.value--;
            break;
        case 'media':
            if (apps.value + messages.value + media.value + system.value <= 0 || media.value <= 0) {
                break;
            }
            media.value--;
            break;
        case 'system':
            if (apps.value + messages.value + media.value + system.value <= 0 ) {
                break;
            }
            system.value--;
            break;
        default:
            break;
    }
}
</script>
<template>
    <div class="container mx-auto flex flex-col items-center justify-center w-full min-h-screen">
        <MeterGroup :value="value" />

        <div class="mt-8">
            <button class="bg-[#34d399] p-4 rounded-full" @click="addValue('apps')">ADD APP +</button>
            <button class="bg-[#fbbf24] p-4 rounded-full" @click="addValue('messages')">ADD MESSAGE +</button>
            <button class="bg-[#60a5fa] p-4 rounded-full" @click="addValue('media')">ADD MEDIA +</button>
            <button class="bg-[#c084fc] p-4 rounded-full" @click="addValue('system')">ADD SYSTEM +</button>
        </div>
        <div class="mt-8">
            <button class="bg-[#34d399] p-4 rounded-full" @click="removeValue('apps')">REMOVE APP -</button>
            <button class="bg-[#fbbf24] p-4 rounded-full" @click="removeValue('messages')">REMOVE MESSAGE -</button>
            <button class="bg-[#60a5fa] p-4 rounded-full" @click="removeValue('media')">REMOVE MEDIA -</button>
            <button class="bg-[#c084fc] p-4 rounded-full" @click="removeValue('system')">REMOVE SYSTEM -</button>
        </div>
        <div>
            {{ apps }}
        </div>
        <div>
            {{ apps + messages + media + system }}
        </div>
    </div>

</template>