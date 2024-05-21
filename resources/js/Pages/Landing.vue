<script setup>
import HeaderBar from '@/Components/HeaderBar.vue';
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
];

const currentSlideIndex = ref(0);

const currentSlide = computed(() => slides[currentSlideIndex.value]);

const slideNext = () => {
  currentSlideIndex.value = (currentSlideIndex.value + 1) % slides.length;
};

const slidePrev = () => {
  currentSlideIndex.value = (currentSlideIndex.value - 1 + slides.length) % slides.length;
};

const intervalId = setInterval(slideNext, 2500);

onMounted(() => {
  return () => clearInterval(intervalId);
});

const gridData = [
  { image: 'https://i.pinimg.com/474x/c3/7f/2a/c37f2aa4a23a8096dddb8609b4a92a6f.jpg', title: 'Solo Leveling', rating: '⭐⭐⭐⭐⭐' },
  { image: 'https://i.pinimg.com/236x/1e/33/7b/1e337b5ed9a52b3b3d981baebe2feff2.jpg', title: 'Return Of Mount Hua Sect', rating: '⭐⭐⭐⭐' },
  { image: 'https://i.pinimg.com/236x/00/1b/e5/001be5f0a36d61ee8cae9044c5a153a3.jpg', title: 'Return Of The Crazy Demon', rating: '⭐⭐⭐⭐' },
  { image: 'https://i.pinimg.com/236x/f9/31/de/f931ded26b6c29bd04d3fc0f3f22f698.jpg', title: 'Sakamoto Days', rating: '⭐⭐⭐⭐⭐' },
  { image: 'https://i.pinimg.com/236x/92/02/dd/9202ddc2549ff92d01d96e6f3f7b6437.jpg', title: "Nano Machine", rating: '⭐⭐⭐⭐⭐' }
];

const additionalData = [
  { image: 'https://i.pinimg.com/236x/0e/5b/26/0e5b261abf537cd435376a4f66ed94a7.jpg', title: 'Killer Peter', rating: '⭐⭐⭐' },
  { image: 'https://i.pinimg.com/236x/09/ee/35/09ee355cfcd8deac70abb5990b179f8a.jpg', title: 'Windbreaker', rating: '⭐⭐⭐⭐⭐' },
  { image: 'https://i.pinimg.com/236x/93/f9/c0/93f9c0bd5949538f1a2e0240dc607c59.jpg', title: 'Eleceed', rating: '⭐⭐⭐⭐⭐' },
  { image: 'https://i.pinimg.com/236x/af/41/49/af414950e613b2d18f4f8f74ade95a54.jpg', title: 'Lookism', rating: '⭐⭐⭐⭐⭐' },
  { image: 'https://i.pinimg.com/236x/20/04/0c/20040c00a7f0bc43d9d8bd948310655d.jpg', title: 'Legend Of The Northern Blade', rating: '⭐⭐⭐⭐⭐' }

]

</script>

<template>
  <HeaderBar />
  <div class="container mx-auto p-4 flex">
  
   
    <div id="main-wrapper" class="flex flex-col">
    
      <div id="sidebar" class="w-full max-w-xs rounded-lg shadow-lg">
   
        <div id="slide-content" class="flex flex-col items-center p-2 bg-purple-300 rounded-lg shadow-lg backdrop-filter backdrop-blur-lg">
     
          <img :src="currentSlide.image" alt="Slide Image" class="w-full h-32 object-contain">
  
          <h1 class="text-gray-800 font-bold text-base mb-1 text-center">{{ currentSlide.title }}</h1>
      
          <p class="text-gray-700 text-xs text-center mb-1">{{ currentSlide.summary }}</p>
      
          <p class="text-gray-700 text-xs mb-1">Status: {{ currentSlide.status }}</p>
 
          <div class="flex items-center mb-2">
            <span class="text-gray-700 text-xs mr-1">Ratings:</span>
            <span class="text-gray-700 text-xs">{{ currentSlide.ratings }}</span>
          </div>
        
          <div class="flex space-x-2">
            <button @click="slidePrev" class="but">&lt;</button>
            <button @click="slideNext" class="but">&gt;</button>
          </div>
        </div>
      </div>
    </div>
    

    <div class="overflow-auto min-h-[10vh] mt-4">
      <div v-for="portfolio in portfolio" :key="portfolio.id" class="bg-white mt-2 border rounded-lg p-4 flex items-center">
        <div class="flex-shrink-0">
          <img :src="portfolio.imageUrl" alt="Portfolio Image" class="w-32 h-32 object-cover rounded-md">
        </div>
        <div class="ml-4">
  <h1 class="text-4xl font-semibold text-gray-800">{{ portfolio.name }}</h1>
  <p class="text-xl text-gray-600">{{ portfolio.description }}</p>
  <p class="text-xl text-gray-600">{{ portfolio.status }}</p>
  <p class="text-xl text-gray-600">{{ portfolio.rating }}</p>
</div>
      </div>
    </div>      
  </div>
  <h1 class="ml-8 mb-2 font-bold text-gray-800 popular">Popular Today</h1>

  <div class="below-data grid grid-cols-5 gap-4">
    <div v-for="(item, index) in gridData" :key="index" class="bg-purple-400 p-4 border rounded-lg flex flex-col items-center">
      <img :src="item.image" alt="" class="w-24 h-24 object-cover rounded-md mb-2">
      <h1 class="text-lg font-semibold text-gray-800">{{ item.title }}</h1>
      <p class="text-sm text-gray-600">{{ item.rating }}</p>
    </div>
  </div>

  <!-- Additional Data Section -->
  <div class="additional-data grid grid-cols-5 gap-4 mt-4">
    <div v-for="(item, index) in additionalData" :key="index" class="bg-purple-400 p-4 border rounded-lg flex flex-col items-center">
      <img :src="item.image" alt="" class="w-24 h-24 object-cover rounded-md mb-2">
      <h1 class="text-lg font-semibold text-gray-800">{{ item.title }}</h1>
      <p class="text-sm text-gray-600">{{ item.rating }}</p>
    </div>
  </div>
</template>

<style scoped>
.buttons {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 20px;
}
.contain {
  background-color: red;
  height: 100vh;
  width: 800px;
}
.popular {
  font-size: 24px;
}

.but {
  background-color: transparent;
  border: 1px solid black;
  padding: 5px 10px;
  text-align: center;
  cursor: pointer;
  transition: background-color 0.3s;
}

.but:hover {
  background-color: rgba(0, 0, 0, 0.1);
}

#main-wrapper {
  width: 100%;
  position: relative;
}

#sidebar {
  width: 100%;
  max-width: 1000px;
  padding: 10px;
  margin-left: 120px;
}

#slide-content img {
  width: 100%;
  height: 8rem;
}

h1 {
  font-size: 1rem;
}
.picture img{
  margin-right: 700px;
}
</style>
