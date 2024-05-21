<script setup>
import { defineProps } from 'vue';
import HeaderBar from '@/Components/HeaderBar.vue';
import { useForm } from '@inertiajs/vue3';
import QRCode from 'qrcode';
import Papa from 'papaparse';
import { ref } from 'vue';

const csvData = ref([]);

const handleFileUpload = (event) => {
  const file = event.target.files[0];
  if (!file) return;

  Papa.parse(file, {
    complete: (result) => {
      csvData.value = result.data;
    },
    header: true,
  });
};

const props = defineProps({
  portfolio: Array,
});

const form = useForm({
  imageUrl: '',
  name: '',
  description: '',
});

const submit = () => {
  form.submit('post', '/portfolio');
};

const toggleQRCode = async (portfolio) => {
  try {
    const qrCodeText = `${portfolio.name} - ${portfolio.status}`;
    const qrCodeDataURL = await QRCode.toDataURL(qrCodeText);
    const qrCodeImage = new Image();
    qrCodeImage.src = qrCodeDataURL;
    const qrCodeElement = document.getElementById(`qrcode-${portfolio.id}`);
    if (qrCodeElement.innerHTML.trim() === '') {
      qrCodeElement.appendChild(qrCodeImage);
    } else {
      qrCodeElement.innerHTML = '';
    }
  } catch (error) {
    console.error('Error generating QR code:', error);
  }
};
</script>


<template>
  <HeaderBar />
  <div>
    <div class="divv flex justify-between items-center">
      <div class="mt-33 export">
        <a href="portfolio/pdf" class='' type='button'>
        <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 32 32"><path fill="#909090" d="m24.1 2.072l5.564 5.8v22.056H8.879V30h20.856V7.945z"/><path fill="#f4f4f4" d="M24.031 2H8.808v27.928h20.856V7.873z"/><path fill="#7a7b7c" d="M8.655 3.5h-6.39v6.827h20.1V3.5z"/><path fill="#dd2025" d="M22.472 10.211H2.395V3.379h20.077z"/><path fill="#464648" d="M9.052 4.534H7.745v4.8h1.028V7.715L9 7.728a2 2 0 0 0 .647-.117a1.4 1.4 0 0 0 .493-.291a1.2 1.2 0 0 0 .335-.454a2.1 2.1 0 0 0 .105-.908a2.2 2.2 0 0 0-.114-.644a1.17 1.17 0 0 0-.687-.65a2 2 0 0 0-.409-.104a2 2 0 0 0-.319-.026m-.189 2.294h-.089v-1.48h.193a.57.57 0 0 1 .459.181a.92.92 0 0 1 .183.558c0 .246 0 .469-.222.626a.94.94 0 0 1-.524.114m3.671-2.306c-.111 0-.219.008-.295.011L12 4.538h-.78v4.8h.918a2.7 2.7 0 0 0 1.028-.175a1.7 1.7 0 0 0 .68-.491a1.9 1.9 0 0 0 .373-.749a3.7 3.7 0 0 0 .114-.949a4.4 4.4 0 0 0-.087-1.127a1.8 1.8 0 0 0-.4-.733a1.6 1.6 0 0 0-.535-.4a2.4 2.4 0 0 0-.549-.178a1.3 1.3 0 0 0-.228-.017m-.182 3.937h-.1V5.392h.013a1.06 1.06 0 0 1 .6.107a1.2 1.2 0 0 1 .324.4a1.3 1.3 0 0 1 .142.526c.009.22 0 .4 0 .549a3 3 0 0 1-.033.513a1.8 1.8 0 0 1-.169.5a1.1 1.1 0 0 1-.363.36a.67.67 0 0 1-.416.106m5.08-3.915H15v4.8h1.028V7.434h1.3v-.892h-1.3V5.43h1.4v-.892"/><path fill="#dd2025" d="M21.781 20.255s3.188-.578 3.188.511s-1.975.646-3.188-.511m-2.357.083a7.5 7.5 0 0 0-1.473.489l.4-.9c.4-.9.815-2.127.815-2.127a14 14 0 0 0 1.658 2.252a13 13 0 0 0-1.4.288Zm-1.262-6.5c0-.949.307-1.208.546-1.208s.508.115.517.939a10.8 10.8 0 0 1-.517 2.434a4.4 4.4 0 0 1-.547-2.162Zm-4.649 10.516c-.978-.585 2.051-2.386 2.6-2.444c-.003.001-1.576 3.056-2.6 2.444M25.9 20.895c-.01-.1-.1-1.207-2.07-1.16a14 14 0 0 0-2.453.173a12.5 12.5 0 0 1-2.012-2.655a11.8 11.8 0 0 0 .623-3.1c-.029-1.2-.316-1.888-1.236-1.878s-1.054.815-.933 2.013a9.3 9.3 0 0 0 .665 2.338s-.425 1.323-.987 2.639s-.946 2.006-.946 2.006a9.6 9.6 0 0 0-2.725 1.4c-.824.767-1.159 1.356-.725 1.945c.374.508 1.683.623 2.853-.91a23 23 0 0 0 1.7-2.492s1.784-.489 2.339-.623s1.226-.24 1.226-.24s1.629 1.639 3.2 1.581s1.495-.939 1.485-1.035"/><path fill="#909090" d="M23.954 2.077V7.95h5.633z"/><path fill="#f4f4f4" d="M24.031 2v5.873h5.633z"/><path fill="#fff" d="M8.975 4.457H7.668v4.8H8.7V7.639l.228.013a2 2 0 0 0 .647-.117a1.4 1.4 0 0 0 .493-.291a1.2 1.2 0 0 0 .332-.454a2.1 2.1 0 0 0 .105-.908a2.2 2.2 0 0 0-.114-.644a1.17 1.17 0 0 0-.687-.65a2 2 0 0 0-.411-.105a2 2 0 0 0-.319-.026m-.189 2.294h-.089v-1.48h.194a.57.57 0 0 1 .459.181a.92.92 0 0 1 .183.558c0 .246 0 .469-.222.626a.94.94 0 0 1-.524.114m3.67-2.306c-.111 0-.219.008-.295.011l-.235.006h-.78v4.8h.918a2.7 2.7 0 0 0 1.028-.175a1.7 1.7 0 0 0 .68-.491a1.9 1.9 0 0 0 .373-.749a3.7 3.7 0 0 0 .114-.949a4.4 4.4 0 0 0-.087-1.127a1.8 1.8 0 0 0-.4-.733a1.6 1.6 0 0 0-.535-.4a2.4 2.4 0 0 0-.549-.178a1.3 1.3 0 0 0-.228-.017m-.182 3.937h-.1V5.315h.013a1.06 1.06 0 0 1 .6.107a1.2 1.2 0 0 1 .324.4a1.3 1.3 0 0 1 .142.526c.009.22 0 .4 0 .549a3 3 0 0 1-.033.513a1.8 1.8 0 0 1-.169.5a1.1 1.1 0 0 1-.363.36a.67.67 0 0 1-.416.106m5.077-3.915h-2.43v4.8h1.028V7.357h1.3v-.892h-1.3V5.353h1.4v-.892"/></svg>
        </a>
      </div>
    </div>
    <hr>
    <a href="/portfolio/csv-all" class='but' type='button'>
      Generate CSV
    </a>
    
    <input type="file" @change="handleFileUpload" accept=".csv">
    <div v-if="csvData.length > 0">
      <h2>Imported CSV Data:</h2>
      <table>
        <thead>
          <tr>
            <th v-for="header in Object.keys(csvData[0])" :key="header">{{ header }}</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(row, index) in csvData" :key="index">
            <td v-for="(value, key) in row" :key="key">{{ value }}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="overflow-auto min-h-[10vh]">
      <div v-for="portfolio in portfolio" :key="portfolio.id">
        <div class="bg-purple-300 mt-2 border rounded-lg p-4 flex justify-between items-center">
          <div class="flex">
            <img :src="portfolio.imageUrl" alt="Portfolio Image" class="w-40 h-40 object-cover rounded-md">
          </div>
          <div class="ml-4 item-center">
            <div>
              <h1 class="text-2xl font-semibold text-gray-800">{{ portfolio.name }}</h1>
            </div>
            <div>
              <p class="text-lg text-gray-600">{{ portfolio.description }}</p>
              <p class="text-lg text-gray-600">{{ portfolio.status }}</p>
              <p class="text-lg text-gray-600">{{ portfolio.rating }}</p>
            </div>
          </div>
          <div class="qr ml-auto">
            <h4 class="text-right">QRCODE</h4>
            <div :id="`qrcode-${portfolio.id}`"></div>
            <button @click="toggleQRCode(portfolio)" class="text-right">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
</svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<style scoped>
.divv {
  display: flex;
}
.qr {
  text-align: right;
}
.row {
  padding: 20px;
}
.tt {
  font-size: 30px;
}
h1 {
  margin-top: 100px;
  margin-left: 100px;
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


.export {
 margin-left: 1420px;
}
</style>
