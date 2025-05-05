<?php 
include "koneksi.php";
$id_makanan = $_GET['id_makanan'];
$sql = mysqli_query($koneksi, 
"SELECT * FROM makanan 
WHERE id_makanan = '$id_makanan' ");
?>

<html>
<head>
    <title>Data Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <center><h1>Ubah Data Makanan</h1></center>
    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="data-makanan.php" class="mt-3">
                    <button type="button" class="btn btn-sm btn-primary">Kembali</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mt-3">
                <form method="POST" action="crud-makanan.php?aksi=ubah">
                    <?php
                    while($data = mysqli_fetch_assoc($sql)){ 
                        ?>
                <div class="mb-3">
                        <label for="id_makanan" class="form-label">
                            Id Makanan
                        </label>
                        <input type="text" class="form-control" id="id_makanan" placeholder="Masukan Id Makanan" name="id_makanan" autocomplete="off" readonly value="<?=$data['id_makanan']?>">
                    </div>
                    <div class="mb-3">
                        <label for="Nama Makanan" class="form-label">
                            Nama Makanan
                        </label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Makanan" name="nama" autocomplete="off" required value="<?=$data['nama']?>">
                    </div>

                    <div class="mb-3">
                        <label for="Harga" class="form-label">
                            Harga
                        </label>
                        <input type="number" class="form-control" id="harga" placeholder="Masukan Harga" name="harga" autocomplete="off" required value="<?=$data['harga']?>">
                    </div>

                    <div class="mb-3">
                        <label for="tgl_buat" class="form-label">
                            Tanggal Dibuat
                        </label>
                        <input type="date" class="form-control" id="tgl_buat" placeholder="Masukan Tanggal Dibuat" name="tgl_buat" autocomplete="off" required value="<?=$data['tgl_buat']?>">
                    </div>

                    <div class="mb-3">
                        <label for="tgl_exp" class="form-label">
                            Tanggal Kadaluarsa
                        </label>
                        <input type="date" class="form-control" id="tgl_exp" placeholder="Masukan Tanggal Kadaluarsa" name="tgl_exp" autocomplete="off" required value="<?=$data['tgl_exp']?>">
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">
                            Stok
                        </label>
                        <input type="number" class="form-control" id="stok" placeholder="Masukan stok" name="stok" autocomplete="off" required value="<?=$data['stok']?>">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                        <button type="reset" class="btn btn-sm btn-warning">Ulangi</button>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>   
</body>
</html>