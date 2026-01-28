<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    .form-card {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        max-width: 500px;
    }
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; margin-bottom: 8px; font-weight: bold; color: #2c3e50; }
    .form-control {
        width: 100%;
        padding: 12px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-sizing: border-box;
    }
    .btn-group { display: flex; gap: 10px; margin-top: 10px; }
    .btn-save { background: #3498db; color: white; border: none; padding: 12px 25px; border-radius: 8px; cursor: pointer; flex: 2; font-weight: bold; }
    .btn-cancel { background: #95a5a6; color: white; text-decoration: none; padding: 12px 25px; border-radius: 8px; flex: 1; text-align: center; font-size: 14px; }
</style>

<div class="header-box">
    <h2>Registrasi Kartu RFID Baru</h2>
</div>

<div class="form-card">
    <form action="/master/simpan_rfid" method="post">
        <div class="form-group">
            <label>Kode Unik RFID</label>
            <input type="text" name="rfid_code" class="form-control" placeholder="Contoh: RFID004" required autofocus>
            <p style="font-size: 12px; color: #7f8c8d; margin-top: 5px;">*Gunakan scanner atau input manual kode kartu.</p>
        </div>

        <div class="btn-group">
            <a href="/master/rfid" class="btn-cancel">Batal</a>
            <button type="submit" class="btn-save">Daftarkan Kartu</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>