<body>
<antrian-loket base-url="<?= base_url() ?>"></antrian-loket>

<script type="module" src="<?= base_url() ?>resources/web_component/antrian_loket/antrian-loket.es.js"></script>
<script>
window.addEventListener('message', (event) => {
  if (event.data === 'taskCompleteAndClose') {
    if (popupWindow) {  
      popupWindow.close();
    }
    popupWindow = null;
  }
}, false);
</script>
</body>