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
    .input-prefix { position: relative; }
    .input-prefix span { position: absolute; left: 12px; top: 12px; color: #7f8c8d; }
    .input-prefix input { padding-left: 40px; }
</style>

<div class="header-box">
    <h2>Tambah Jenis Kendaraan</h2>
</div>

<div class="form-card">
    <form action="/master/simpan_jenis" method="post">
        <div class="form-group">
            <label>Nama Jenis Kendaraan</label>
            <input type="text" name="nama_jenis" class="form-control" placeholder="Contoh: Mobil, Motor, Truck" required autofocus>
        </div>
        
        <div class="form-group">
            <label>Tarif Parkir (Per Jam)</label>
            <div class="input-prefix">
                <span>Rp</span>
                <input type="number" name="tarif" class="form-control" placeholder="Contoh: 5000" required>
            </div>
            <p style="font-size: 12px; color: #7f8c8d; margin-top: 5px;">*Tarif ini akan digunakan untuk menghitung biaya saat kendaraan keluar.</p>
        </div>

        <div class="btn-group">
            <a href="/master/jenis" class="btn-cancel">Batal</a>
            <button type="submit" class="btn-save">Simpan Jenis</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>