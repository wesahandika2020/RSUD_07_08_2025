<style>
    /* Start Custom Error Modal  */
    .modal-overlay {
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0, 0, 0, 0.4);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .modal-box {
        background: white;
        padding: 30px;
        width: 300px;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }

    .icon-box {
        font-size: 50px;
        color: red;
        margin-bottom: 10px;
    }

    .btn-red {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 8px 16px;
        margin-top: 10px;
        margin-bottom: 10px;
        cursor: pointer;
        border-radius: 5px;
    }

    .btn-outline {
        background-color: transparent;
        color: #3498db;
        border: 1px solid #3498db;
        padding: 6px 14px;
        cursor: pointer;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .error-detail {
        background: #c3e5fd;
        color: #000000;
        padding: 10px;
        border-radius: 5px;
        margin-top: 10px;
        text-align: left;
    }

    .hidden {
        display: none;
    }
    /* End Custom Error Modal */

</style>

<!-- Start Custom Error Modal -->
<div id="customModal" class="modal-overlay">
  <div class="modal-box">
    <div class="icon-box">
      <span class="icon-cross">✖</span>
    </div>
    <h2>Ooops!</h2>
    <p id="customModalMessage">Gagal menandatangani surat</p>
    <button type="button" onclick="closeModal()" class="btn btn-secondary waves-effect">Tutup</button>
    <button type="button" onclick="toggleDetail()" class="btn btn-info waves-effect">Lihat Detail Error</button>

    
    <div id="errorDetail" class="error-detail hidden">
      <p><strong>Code</strong>: <span id="errorCode"></span></p>
      <p><strong>Message</strong>: <span id="errorText" style="white-space: pre-wrap; word-break: break-word; display: block;"></span></p>
    </div>

  </div>
</div>
<!-- End Custom Error Modal -->

