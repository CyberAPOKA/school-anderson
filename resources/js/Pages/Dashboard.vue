<script setup>
import { ref, onMounted } from "vue";
import { useForm } from 'laravel-precognition-vue-inertia';
import AppLayout from '@/Layouts/AppLayout.vue';
import Select from 'primevue/select';
import IftaLabel from 'primevue/iftalabel';
import Button from 'primevue/button';
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';
const toast = useToast();

const products = ref([]);

onMounted(() => {
    axios.get('https://fakestoreapi.com/products')
        .then(function (response) {
            // manipula o sucesso da requisição
            console.log(response);
            products.value = response.data;
        })
        .catch(function (error) {
            // manipula erros da requisição
            console.error(error);
        });
});

const form = useForm('post', route('save.product'), {
    product: '',
});

const submit = () => form.submit({
    preserveScroll: true,
    onSuccess: () => {
        toast.add({ severity: 'success', summary: 'Sucesso', detail: 'Produto criado com sucesso!!', life: 5000 });
    },
    onError: () => {
        toast.add({ severity: 'error', summary: 'Erro', detail: 'Erro ao criar produto', life: 5000 });
    }
});
</script>
<template>
    <Toast />
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <form @submit.prevent="submit">

                            <div class="flex flex-col gap-y-4">
                                <IftaLabel>
                                    <Select id="product" v-model="form.product" :options="products" optionLabel="title"
                                        optionValue="title" placeholder="Select a product" fluid
                                        @change="form.validate('product')" filter />
                                    <label for="product">Produto</label>
                                </IftaLabel>
                                <div v-if="form.invalid('product')" class="text-red-500 font-bold text-xl">
                                    {{ form.errors.product }}
                                </div>
                                <Button type="submit" label="Submit" severity="success" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>