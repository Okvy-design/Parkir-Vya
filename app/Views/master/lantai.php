<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    .header-box { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
    .table-card { background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .status-badge { padding: 5px 10px; border-radius: 20px; font-size: 12px; font-weight: bold; }
    .bg-green { background: #e3fcef; color: #27ae60; }
    .bg-red { background: #ffe9e9; color: #e74c3c; }
    .btn-action { text-decoration: none; font-size: 14px; font-weight: bold; margin-right: 10px; }
</style>

<div class="header-box">
    <h2>Kelola Lantai & Kapasitas</h2>
    <a href="/master/tambah_lantai" class="btn btn-primary" style="text-decoration: none;">+ Tambah Lantai</a>
</div>

<div class="table-card">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lantai</th>
                <th>Kapasitas Maksimal</th>
                <th>Terisi Saat Ini</th>
                <th>Sisa Slot</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($lantai as $l): ?>
            <?php $sisa = $l['kapasitas'] - $l['terisi']; ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><b><?= $l['nama_lantai'] ?></b></td>
                <td><?= $l['kapasitas'] ?> Slot</td>
                <td><?= $l['terisi'] ?></td>
                <td><?= $sisa ?></td>
                <td>
                    <span class="status-badge <?= ($sisa > 0) ? 'bg-green' : 'bg-red' ?>">
                        <?= ($sisa > 0) ? 'Tersedia' : 'Penuh' ?>
                    </span>
                </td>
                <td>
                    <a href="/master/edit_lantai/<?= $l['id_lantai'] ?>" class="btn-action" style="color: #3498db;">Edit</a>
                    
                    <a href="/master/hapus_lantai/<?= $l['id_lantai'] ?>" 
                       class="btn-action" 
                       style="color: #e74c3c;" 
                       onclick="return confirm('Apakah Anda yakin ingin menghapus data lantai ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>