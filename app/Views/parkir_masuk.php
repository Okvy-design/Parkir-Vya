<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    .form-container {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        max-width: 600px;
        margin-top: 20px;
    }
    
    .form-title {
        margin-bottom: 25px;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-group {
        margin-bottom: 15px;
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        font-weight: 600;
        margin-bottom: 8px;
        color: #34495e;
        font-size: 14px;
    }

    .form-control {
        padding: 12px;
        border: 1px solid #dcdde1;
        border-radius: 8px;
        font-size: 15px;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #3498db;
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        background: #27ae60;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 10px;
        transition: background 0.3s;
    }

    .btn-submit:hover {
        background: #219150;
    }

    .badge-info {
        font-size: 12px;
        color: #7f8c8d;
        margin-top: 5px;
    }
</style>

<div class="form-container">
    <div class="form-title">
        <h2>Gate Masuk Kendaraan</h2>
    </div>

    <form action="/parkir/proses_masuk" method="post">
        <div class="form-group">
            <label>Pilih Kartu RFID (Master)</label>
            <select name="rfid_code" class="form-control" required>
                <option value="" disabled selected>-- Pilih Kartu --</option>
                <?php foreach($kartu as $k): ?>
                    <option value="<?= $k['rfid_code'] ?>"><?= $k['rfid_code'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Nomor Polisi</label>
            <input type="text" name="nopol" class="form-control" placeholder="Contoh: B 1234 ABC" required>
        </div>

        <div class="form-group">
            <label>Jenis Kendaraan</label>
            <select name="id_jenis" class="form-control">
                <?php foreach($jenis as $j): ?>
                    <option value="<?= $j['id_jenis'] ?>"><?= $j['nama_jenis'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Pilih Lantai Parkir</label>
            <select name="id_lantai" class="form-control">
                <?php foreach($lantai as $l): ?>
                    <?php $sisa = $l['kapasitas'] - $l['terisi']; ?>
                    <option value="<?= $l['id_lantai'] ?>" <?= ($sisa <= 0) ? 'disabled' : '' ?>>
                        <?= $l['nama_lantai'] ?> (Sisa Slot: <?= $sisa ?>)
                    </option>
                <?php endforeach; ?>
            </select>
            <span class="badge-info">*Lantai yang penuh tidak dapat dipilih</span>
        </div>

        <button type="submit" class="btn-submit">Konfirmasi</button>
    </form>
</div>

<?= $this->endSection() ?>