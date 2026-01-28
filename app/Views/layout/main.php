<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Parking - Ada Aja</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; margin: 0; display: flex; }
        .sidebar { width: 250px; background: #2c3e50; height: 100vh; color: white; padding: 20px; position: fixed; }
        .sidebar h2 { font-size: 20px; border-bottom: 1px solid #555; padding-bottom: 10px; }
        .sidebar a { color: #bdc3c7; display: block; padding: 12px 0; text-decoration: none; border-bottom: 0.5px solid #34495e; }
        .sidebar a:hover { color: white; background: #34495e; padding-left: 10px; transition: 0.3s; }
        
        .main-content { margin-left: 280px; padding: 30px; width: 100%; }
        .card-container { display: flex; gap: 20px; margin-bottom: 30px; }
        .card { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); flex: 1; text-align: center; }
        
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #3498db; color: white; }
        .btn { padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-success { background: #27ae60; color: white; }
        .btn-primary { background: #3498db; color: white; }
        .status-full { color: #e74c3c; font-weight: bold; }
        .status-avail { color: #27ae60; font-weight: bold; }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Parking System</h2>
    <a href="/dashboard">Dashboard</a>
    <a href="/parkir/masuk">Gate Masuk</a>
    <a href="/parkir/keluar">Gate Keluar</a>
    <hr>
    <p style="font-size: 12px; color: #7f8c8d;">DATA MASTER</p>
    <a href="/master/jenis">Jenis Kendaraan</a>
    <a href="/master/lantai">Kelola Lantai</a>
    <a href="/master/rfid">Stok Kartu RFID</a>
    <hr>
    <a href="/laporan">Laporan</a>
</div>

<div class="main-content">
    <?= $this->renderSection('content') ?>
</div>

</body>
</html>