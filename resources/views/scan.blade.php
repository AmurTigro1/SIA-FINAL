<!-- resources/views/scan.blade.php -->
<script setup>
    import HeaderBar from '@/Components/HeaderBar.vue';
    
    </script>

@extends('layouts.app')

@section('content')
<template>
    <HeaderBar />
      

    <div id="scanner-container"></div>

    <script src="{{ asset('js/qrscanner.js') }}"></script>
</template>
@endsection
