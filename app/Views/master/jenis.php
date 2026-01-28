<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="header-box" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2> Kelola Jenis Kendaraan</h2>
    <a href="/master/tambah_jenis" class="btn btn-primary" style="text-decoration: none;">+ Tambah Jenis</a>
</div>

<div class="table-card" style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kendaraan</th>
                <th>Tarif Per Jam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($jenis as $j): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><b><?= $j['nama_jenis'] ?></b></td>
                <td>Rp <?= number_format($j['tarif'], 0, ',', '.') ?></td>
                <td>
                    <a href="/master/edit_jenis/<?= $j['id_jenis'] ?>" style="color: #3498db; text-decoration: none; margin-right: 10px;">Edit</a>
                    <a href="/master/hapus_jenis/<?= $j['id_jenis'] ?>" style="color: #e74c3c; text-decoration: none;" onclick="return confirm('Hapus jenis kendaraan ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>