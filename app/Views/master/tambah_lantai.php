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
    <h2>🏢 Tambah Lantai Parkir Baru</h2>
</div>

<div class="form-card">
    <form action="/master/simpan_lantai" method="post">
        <div class="form-group">
            <label>Nama Lantai</label>
            <input type="text" name="nama_lantai" class="form-control" placeholder="Contoh: Lantai 3 / Rooftop" required>
        </div>
        
        <div class="form-group">
            <label>Kapasitas Maksimal (Slot)</label>
            <input type="number" name="kapasitas" class="form-control" placeholder="Contoh: 50" required>
        </div>

        <div class="btn-group">
            <a href="/master/lantai" class="btn-cancel">Batal</a>
            <button type="submit" class="btn-save">Simpan Data</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>