<?php 
include "koneksi.php";
$sql = mysqli_query($koneksi, 
"SELECT * FROM makanan 
WHERE id_makanan IN (SELECT MAX(id_makanan) FROM makanan)");
$data = mysqli_fetch_assoc($sql);
if(empty($data)){
    $id_makanan = "M-001";
}else{
    $pecah = explode("-", $data['id_makanan']);
    $pecah[1] += 1;
    $bagian1 = $pecah[0];
    $bagian2 = "";
    $bagian3 = $pecah[1];

    if($bagian3 < 10){
        $bagian2 = "-00";
    }else if($bagian3 < 100){
        $bagian2 = "-0";
    }else{
        $bagian2 = "-";
    }

    $id_makanan = $bagian1.$bagian2.$bagian3;
}
?>

<html>
<head>
    <title>Data Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <center><h1>Tambah Data Makanan</h1></center>
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
                <form method="POST" action="crud-makanan.php?aksi=tambah" 
                enctype="multipart/form-data">
                <div class="mb-3">
                        <label for="id_makanan" class="form-label">
                            Id Makanan
                        </label>
                        <input type="text" class="form-control" id="id_makanan" placeholder="Masukan Id Makanan" name="id_makanan" autocomplete="off" readonly value="<?=$id_makanan?>">
                    </div>
                    <div class="mb-3">
                        <label for="Nama Makanan" class="form-label">
                            Nama Makanan
                        </label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Makanan" name="nama" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="Harga" class="form-label">
                            Harga
                        </label>
                        <input type="number" class="form-control" id="harga" placeholder="Masukan Harga" name="harga" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="tgl_buat" class="form-label">
                            Tanggal Dibuat
                        </label>
                        <input type="date" class="form-control" id="tgl_buat" placeholder="Masukan Tanggal Dibuat" name="tgl_buat" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="tgl_exp" class="form-label">
                            Tanggal Kadaluarsa
                        </label>
                        <input type="date" class="form-control" id="tgl_exp" placeholder="Masukan Tanggal Kadaluarsa" name="tgl_exp" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">
                            Stok
                        </label>
                        <input type="number" class="form-control" id="stok" placeholder="Masukan stok" name="stok" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">
                            Gambar
                        </label>
                        <input type="file" class="form-control" id="gambar" placeholder="Masukan gambar" name="gambar" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                        <button type="reset" class="btn btn-sm btn-warning">Ulangi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>   
</body>
</html>