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
    
                <table class="table">
                        <tr>
                            <th>No</th>
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
                            <td><?=$data['id_makanan']?></td>
                            <td><?=$data['nama']?></td>
                            <td><?=$data['harga']?></td>
                            <td><?=$data['tgl_buat']?></td>
                            <td><?=$data['tgl_exp']?></td>
                            <td><?=$data['stok']?></td>
                            <td><?=$data['gambar']?></td>
                        </tr>
                    <?php } ?>
                </table>
<script>
window.print();
setTimeout(function() {
    alert('Dokumen Sudah Dicetak');
    window.close();
}, 1000);
</script>
</body>
</html>