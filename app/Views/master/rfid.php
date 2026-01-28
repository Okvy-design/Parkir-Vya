<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="header-box">
    <h2>Stok Kartu RFID</h2>
    <a href="/master/tambah_rfid" class="btn btn-primary" style="text-decoration: none;">+ Registrasi Kartu Baru</a>
</div>

<div class="table-card">
    <p style="color: #7f8c8d; margin-bottom: 15px;">Daftar kartu yang tersedia di sistem untuk dipasangkan ke kendaraan.</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode RFID</th>
                <th>Status Kartu</th>
                <th>Terakhir Digunakan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($kartu as $k): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><code><?= $k['rfid_code'] ?></code></td>
                <td>
                    <span class="status-badge <?= ($k['status'] == 'tersedia') ? 'bg-green' : 'bg-red' ?>">
                        <?= ucfirst($k['status']) ?>
                    </span>
                </td>
                <td>-</td>
                <td>
                    <a href="<?= base_url('master/hapus_rfid/' . $k['rfid_code']) ?>" 
                    style="color: #e74c3c; text-decoration: none;"
                    onclick="return confirm('Yakin ingin menghapus kartu <?= $k['rfid_code'] ?>?')">
                    Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>