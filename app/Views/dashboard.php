<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h1>Monitor Ketersediaan Parkir</h1>

<div class="card-container">
    <?php foreach($lantai as $l): ?>
    <div class="card">
        <h3><?= $l['nama_lantai'] ?></h3>
        <h1 style="font-size: 48px; margin: 10px 0;">
            <?= $l['kapasitas'] - $l['terisi'] ?>
        </h1>
        <p>Sisa dari total <b> <?= $l['kapasitas'] - $l['terisi'] ?></b> slot</p>
        <span class="<?= ($l['terisi'] >= $l['kapasitas']) ? 'status-full' : 'status-avail' ?>">
            <?= ($l['terisi'] >= $l['kapasitas']) ? 'LANTAI PENUH' : 'TERSEDIA' ?>
        </span>
    </div>
    <?php endforeach; ?>
</div>

<h3>Kendaraan Sedang Parkir</h3>
<table>
    <tr>
        <th>RFID</th>
        <th>No. Polisi</th>
        <th>Jenis</th>
        <th>Lokasi</th>
        <th>Jam Masuk</th>
    </tr>
    <?php foreach($parkir_aktif as $p): ?>
    <tr>
        <td><?= $p['rfid_code'] ?></td>
        <td><b><?= $p['nopol'] ?></b></td>
        <td><?= $p['nama_jenis'] ?></td>
        <td><?= $p['nama_lantai'] ?></td>
        <td><?= $p['jam_masuk'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?= $this->endSection() ?>