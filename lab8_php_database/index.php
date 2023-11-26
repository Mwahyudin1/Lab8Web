<?php
    include("koneksi.php");

    // query untuk menampilkan data
    $sql = 'SELECT * FROM data_barang';
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>

    <!-- Style css -->
    <style>
        body {
        font-family: cursive;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .main {
            margin-top: 20px;
        }

        .main .tambah {
            background-color: darkgrey;
            color: #333;
            border-radius: 15px;
            margin: 0 25px;
            padding: 0 10px;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #f2f2f2;
            color: #333;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .aksi {
            text-align: center;
        }

        .aksi a {
            padding: 0 10px;
            text-decoration: none;
            color: #333;
            
        }

        .aksi a:hover {
            color: #ff0000; /* Ganti warna yang diinginkan saat hover */
            text-decoration: underline; /* Atau efek lain saat hover */
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Data Barang</h1>
        <div class="main">
            <a class="tambah" href="tambah.php">Tambah Barang</a>
            <table>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Katagori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php if($result): ?>
                <?php while($row = mysqli_fetch_array($result)): ?>
                <tr>
                    <td>
                        <img src="gambar/<?= $row['gambar'];?>" alt="<?= $row['nama'];?>">
                    </td>
                    <td><?= $row['nama'];?></td>
                    <td><?= $row['kategori'];?></td>
                    <td><?= $row['harga_beli'];?></td>
                    <td><?= $row['harga_jual'];?></td>
                    <td><?= $row['stok'];?></td>
                    <td class="aksi">
                        <a href="ubah.php?id=<?= $row['id_barang']; ?>">Ubah</a>
                        <a href="hapus.php?id=<?= $row['id_barang']; ?>">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; else: ?>
                <tr>
                    <td colspan="7">Belum ada data</td>
                </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</body>
</html>