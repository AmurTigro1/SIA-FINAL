<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <div class="bg-purple-400 text-white p-4">
        <div class="w-1020px mx-auto flex">
            <h1 class="font-bold flex-1 p-1 text-center">SIA FINAL PROJECT</h1>
            <nav class="flex gap-5">
                <Link href="/" class="p-1" :class="{'bg-purple-300 text-white font-bold p-1 rounded' : $page.component == 'Landing' }">Home</Link>
                <Link href="/portfolio" class="p-1" :class="{'bg-purple-300 text-white font-bold p-1 rounded' : $page.component == 'Portfolio' }">Manhwa</Link>
                <Link href="/read" class="p-1" :class="{'bg-purple-300 text-white font-bold p-1 rounded' : $page.component == 'Read' }">QR Scanner</Link>

            </nav>
            
        </div>
    </div>
</template>
