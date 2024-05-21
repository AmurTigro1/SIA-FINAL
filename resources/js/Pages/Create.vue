<script setup>
    import MyLayout from '@/Layouts/MyLayout.vue';
    import { Link } from '@inertiajs/vue3';
    import HeaderBar from '@/Components/HeaderBar.vue';
    import { useForm } from '@inertiajs/vue3';
    import 'tailwindcss/tailwind.css';

    defineOptions({
        layout: MyLayout
    });

    const form = useForm({
        name: '',
        description: '',
        imageUrl: '',
    });

    const submit = () => {
        form.submit('post', '/portfolio');
    };

    const props = defineProps({
        portfolio: Object
    })
</script>

<template>
    <h1 class="text-4xl mt-2 ml-1">New Project</h1>
    <HeaderBar />


<div style="max.width: 400px;" class="p-4">
    <form @submit.prevent="submit">
        <div class="mb-3">
            <label for="name">Name: </label>
            <input type="text" id="name" class="w-full" v-model="form.name">
        </div>
        <div class="mb-3">
            <label for="description">Description: </label>
            <input type="text" id="description" class="w-full" v-model="form.description">
        </div>
        <div class="mb-3">
            <label for="imageUrl">Image URL: </label>
            <input type="text" id="imageUrl" class="w-full" v-model="form.imageUrl">
        </div>
        
        <button type="submit" class="bg-pink-500 text-white py-2 px-4 rounded">Submit</button>
         
        <Link href="/portfolio" class="btn btn-primary py-2 px-4 rounded ml-2">Back
        </Link>

    </form>        
</div>
</template>