<script setup>
import HeaderBar from '@/Components/HeaderBar.vue';

function onScanSuccess(decodedText, decodedResult) {

  alert(`QR Code data: ${decodedText}`);
}

function startScanner() {
  const html5QrcodeScanner = new Html5QrcodeScanner("scanner-container", {
    fps: 10,
    qrbos: 250,
  });
  html5QrcodeScanner.render(onScanSuccess);
}

function stopScanner() {
  Html5Qrcode.stopScanning();
}
</script>

<template>
  <HeaderBar />
  <div class="buttons">
  <button @click="startScanner">Start scanner</button>
  <button @click="stopScanner">Stop scanner</button>
</div>
  <div id="scanner-container"></div>
</template>

<style scoped>
#scanner-container {
  width: 100%;
  max-width: 300px;
  margin: 50px auto;
  padding-left: 20px;
  border: 1px solid #ccc;
  border-radius: 4px;
  text-align: center;
}

.buttons {
  display: flex;
  justify-content: center;
  gap: 100px;
  padding: 100px 200px;
}
button {
  border: 1px solid black;
  padding: 5px 20px;
  text-decoration: none;
  color: rgb(236, 204, 204);
}

button:hover {
  background-color: rgb(135, 9, 118);
}
</style>