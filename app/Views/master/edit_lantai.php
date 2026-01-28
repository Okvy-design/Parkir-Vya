<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="header-box">
    <h2>Edit Data Lantai</h2>
</div>

<div class="form-card">
    <form action="/master/update_lantai/<?= $lantai['id_lantai'] ?>" method="post">
        <div class="form-group">
            <label>Nama Lantai</label>
            <input type="text" name="nama_lantai" class="form-control" value="<?= $lantai['nama_lantai'] ?>" required>
        </div>
        
        <div class="form-group">
            <label>Kapasitas Maksimal (Slot)</label>
            <input type="number" name="kapasitas" class="form-control" value="<?= $lantai['kapasitas'] ?>" required>
        </div>

        <div class="btn-group">
            <a href="/master/lantai" class="btn-cancel">Batal</a>
            <button type="submit" class="btn-save">Update Data</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>