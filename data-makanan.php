<?php 
include "koneksi.php";


?>

<html>
<head>
    <title>Data Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <center><h1>Data Makanan</h1></center>
    <br>
    
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="makanan-tambah.php" class="me-2">
                    <button type="button" class="btn btn-sm btn-primary">Tambah Data</button>
                </a>

                <a href="#" class="me-2" onclick="cetak()">
                    <button type="button" class="btn btn-sm btn-success">Cetak</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">
                <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Opsi</th>
                            <th>Id Makanan</th>
                            <th>Nama Makanan</th>
                            <th>Harga</th>
                            <th>Tanggal Dibuat</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th>Stok</th>
                            <th>Gambar</th>
                        </tr>
                        <?php
                            $sql = mysqli_query($koneksi, "SELECT * FROM makanan");
                            $no=1;
                            while($data = mysqli_fetch_assoc($sql)){
                        ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td>
                            <a href="makanan-ubah.php?id_makanan=<?=$data['id_makanan']?>">
                            <span class="badge rounded-pill bg-warning text-dark mb-1">Ubah</span>
                            </a>
                            <br>
                            <a href="crud-makanan.php?aksi=hapus&id_makanan=<?=$data['id_makanan']?>"
                            onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data??');">
                            <span class="badge rounded-pill bg-danger mb-1">Hapus</span>
                            </a>
                            </td>
                            <td><?=$data['id_makanan']?></td>
                            <td><?=$data['nama']?></td>
                            <td><?=$data['harga']?></td>
                            <td><?=$data['tgl_buat']?></td>
                            <td><?=$data['tgl_exp']?></td>
                            <td><?=$data['stok']?></td>
                            <td>
                                    <!-- Button trigger modal -->
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#upload<?=$data['id_makanan']?>">

                                    <img src="gambar-makanan/<?=$data['gambar']?>" alt="<?=$data['gambar']?>" height="40px" >
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="upload<?=$data['id_makanan']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Upload Gambar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <!-- Form -->
                                        <form method="POST" action="crud-makanan.php?aksi=upload" 
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <center>
                                                <img src="gambar-makanan/<?=$data['gambar']?>" alt="<?=$data['gambar']?>" width="500px">
                                            </center>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="id_makanan" placeholder="Masukan Id Makanan" name="id_makanan" autocomplete="off" hidden value="<?=$data['id_makanan']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="gambar" class="form-label">
                                                    Gambar
                                                </label>
                                                <input type="file" class="form-control" id="gambar" placeholder="Masukan gambar" name="gambar" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Upload</button>
                                        </div>
                                        </form>
                                        <!-- Tutup Form -->
                                        </div>
                                    </div>
                                    </div>
                                    <!-- Tutup Modal -->


                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>  

    <script>
        function cetak() {
                myWindow = window.open("makanan-cetak.php", "_blank", "width=900, height=800");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>