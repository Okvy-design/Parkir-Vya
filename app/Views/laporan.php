<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    @media print {
        .sidebar, .btn-print, h2 p { display: none !important; }
        .content { margin-left: 0 !important; padding: 0 !important; }
        .table-card { box-shadow: none !important; border: 1px solid #000; }
    }
    .btn-print { background: #27ae60; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block; margin-bottom: 20px; border: none; cursor: pointer; }
</style>

<div class="header-box">
    <h2>Laporan Transaksi Parkir</h2>
    <p>Daftar pendapatan dan log kendaraan keluar.</p>
</div>

<button onclick="window.print()" class="btn-print">Cetak Laporan</button>

<table class="table-card" style="width:100%; border-collapse: collapse;">
    <thead>
        <tr style="background: #34495e; color: white;">
            <th>No</th>
            <th>RFID / Nopol</th>
            <th>Jenis</th>
            <th>Lantai</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
            <th>Total Bayar</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; $grand_total=0; foreach($transaksi as $t): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $t['rfid_code'] ?> - <b><?= $t['nopol'] ?></b></td>
            <td><?= $t['nama_jenis'] ?></td>
            <td><?= $t['nama_lantai'] ?></td>
            <td><?= date('d/m/H:i', strtotime($t['jam_masuk'])) ?></td>
            <td><?= date('d/m/H:i', strtotime($t['jam_keluar'])) ?></td>
            <td style="text-align: right;">Rp <?= number_format($t['total_bayar'], 0, ',', '.') ?></td>
        </tr>
        <?php $grand_total += $t['total_bayar']; endforeach; ?>
    </tbody>
    <tfoot>
        <tr style="background: #f1f1f1; font-weight: bold;">
            <td colspan="6" style="text-align: center;">TOTAL PENDAPATAN</td>
            <td style="text-align: right; color: #e67e22;">Rp <?= number_format($grand_total, 0, ',', '.') ?></td>
        </tr>
    </tfoot>
</table>

<?= $this->endSection() ?>