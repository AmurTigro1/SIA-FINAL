<template>
    <div id="main-wrapper">
      <div id="sidebar" class="max-w-[500px] bg-purple-500 flex flex-col items-center relative">
        <div id="slide-content" class="flex flex-col items-center mt-1 p-6 bg-purple-300 rounded-lg shadow-lg" style="backdrop-filter: blur(500px);">

          <!-- Square Image -->
          <img :src="currentSlide.image" alt="Slide Image" class="max-w-[100%] max-h-[200px] object-contain rounded-lg shadow-lg">
  
          <!-- Title -->
          <h1 class="text-gray-800 font-bold max-w-[500px]">{{ currentSlide.title }}</h1>
  
          <!-- Summary -->
          <p class="text-gray-700 ml-2">{{ currentSlide.summary }}</p>
  
          <!-- Status -->
          <p class="text-gray-700 mt-2">Status: {{ currentSlide.status }}</p>
  
          <!-- Ratings -->
          <div class="flex items-center mt-2">
            <span class="text-gray-700 mr-2">Ratings:</span>
            <span class="text-gray-700">{{ currentSlide.ratings }}</span>
          </div>
          <div class="space-x-1">
          <span
            v-for="(slide, index) in slides"
            :key="index"
            class="inline-block w-4 h-4 rounded-full bg-black bg-opacity-50"
            :class="{ 'bg-opacity-100': index === currentSlideIndex }"
          ></span>
        </div>
        </div>
            
      </div>
      <div id="content" class="flex flex-col flex-1">
        <div class="flex-1 p-8">
          <slot />
        </div>
        <footer class="py-4 text-gray-900 text-center">
          Copyright &copy; 2024. Stern's Comics, Inc.
        </footer>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, computed, onMounted } from 'vue';
  
  const slides = [
    {
      image: 'https://i.pinimg.com/236x/25/18/22/2518222c2edb62a0f640005d62f2984f.jpg',
      title: "Academy's Genius Swordmaster",
      summary: 'Ronan lived a wasteful life filled with regrets.',
      status: 'Ongoing',
      ratings: '⭐⭐⭐⭐'
    },
    {
      image: 'https://i.pinimg.com/236x/1e/33/7b/1e337b5ed9a52b3b3d981baebe2feff2.jpg',
      title: 'Return Of Mount Hua Sect',
      summary: 'Chung Myung, The 13th Disciple of the Great Flowery Mountain Sect',
      status: 'Completed',
      ratings: '⭐⭐⭐⭐'
    },
    {
      image: 'https://i.pinimg.com/236x/00/1b/e5/001be5f0a36d61ee8cae9044c5a153a3.jpg',
      title: 'Return Of The Crazy Demon',
      summary: 'The Mad Demon, Jaha Lee, dreams of becoming the God of Martial Arts',
      status: 'Completed',
      ratings: '⭐⭐⭐⭐⭐'
    },
    {
      image: 'https://i.pinimg.com/236x/20/04/0c/20040c00a7f0bc43d9d8bd948310655d.jpg',
      title: 'Legend Of The Northern Blade',
      summary: 'Legend Of The Northern Blade (북검전기) is a Korean novel series created by Woo-Gak.',
      status: 'Completed',
      ratings: '⭐⭐⭐⭐⭐'
    }
    // Add more slide data as needed
  ];
  
  const currentSlideIndex = ref(0);
  
  const currentSlide = computed(() => slides[currentSlideIndex.value]);
  
  const slideNext = () => {
    currentSlideIndex.value = (currentSlideIndex.value + 1) % slides.length;
  };
  
  const slidePrev = () => {
    currentSlideIndex.value = (currentSlideIndex.value - 1 + slides.length) % slides.length;
  };
  
  // Automatic sliding every 5 seconds
  const intervalId = setInterval(slideNext, 2000);
  
  // Clear interval on component unmount
  onMounted(() => {
    return () => clearInterval(intervalId);
  });
  </script>
  
  <style scoped>
  #main-wrapper {
    min-height: 100vh;
    display: flex;
    position: relative;
  }
  
  /* #background-container {
    position: absolute;
    inset: 0;
    background-image: url('https://source.unsplash.com/random');
  } */
  
  #sidebar {
    padding: 20px;
  }
  /* img {
    width: 100%;
  } */
  
  h1 {
    font-size: 2rem;
  }
  
  </style>
  