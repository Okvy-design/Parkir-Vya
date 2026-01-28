<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    .table-card { width: 100%; border-collapse: collapse; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
    th { background: #3498db; color: white; }
    .status-badge { padding: 5px 10px; border-radius: 20px; font-size: 12px; font-weight: bold; }
    .bg-green { background: #e3fcef; color: #27ae60; }
    .price-tag { color: #e67e22; font-weight: bold; font-size: 16px; }
</style>

<h2>Gate Keluar</h2>
<p>Pilih kendaraan yang akan keluar (Tarif dihitung per 3 jam):</p>

<table class="table-card">
    <thead>
        <tr>
            <th>RFID / Nopol</th>
            <th>Jenis</th>
            <th>Jam Masuk</th>
            <th>Tarif </th>
            <th>Total Bayar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($parkir_aktif as $p): 
            $awal  = new DateTime($p['jam_masuk']);
            $akhir = new DateTime(); 
            $diff  = $awal->diff($akhir);
            
            $total_jam = $diff->h + ($diff->days * 24);
            
            if ($diff->i > 0 || $diff->s > 0) { $total_jam++; }

            $periode = ceil($total_jam / 3);
            if ($periode < 1) $periode = 1; 
            
            $total_bayar = $periode * $p['tarif'];
        ?>
        <tr>
            <td><code><?= $p['rfid_code'] ?></code> - <b><?= $p['nopol'] ?></b></td>
            <td><span class="status-badge bg-green"><?= $p['nama_jenis'] ?></span></td>
            <td><?= date('d M Y, H:i', strtotime($p['jam_masuk'])) ?></td>
            <td>Rp <?= number_format($p['tarif'], 0, ',', '.') ?></td>
            <td><span class="price-tag">Rp <?= number_format($total_bayar, 0, ',', '.') ?></span></td>
            <td>
                <form action="/parkir/proses_keluar" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_transaksi" value="<?= $p['id_transaksi'] ?>">
                    <input type="hidden" name="total_bayar" value="<?= $total_bayar ?>">
                    <input type="hidden" name="rfid_code" value="<?= $p['rfid_code'] ?>">
                    <input type="hidden" name="id_lantai" value="<?= $p['id_lantai'] ?>">
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Konfirmasi pembayaran & keluar?')">Proses Keluar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php if(empty($parkir_aktif)): ?>
            <tr><td colspan="6" style="text-align:center;">Tidak ada kendaraan di dalam area parkir.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>