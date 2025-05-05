<?php 
include "koneksi.php";

$aksi = $_GET['aksi'];

if($aksi == "tambah"){
    $id_makanan = $_POST['id_makanan'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $tgl_buat = $_POST['tgl_buat'];
    $tgl_exp = $_POST['tgl_exp'];
    $stok = $_POST['stok'];


    if($_FILES['gambar']){
        $ekstensi = array ('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
        $nama_gambar = $_FILES['gambar']['name'];
        $pecah = explode('.', $nama_gambar);
        $format = end($pecah);
        $ukuran = $_FILES['gambar']['size'];
        $temp = $_FILES['gambar']['tmp_name'];

        if (in_array($format, $ekstensi ) === true){
                if($ukuran <= 6000000 ){
                    move_uploaded_file($temp, 'gambar-makanan/'. $nama_gambar);

                    $sql = mysqli_query($koneksi, "INSERT INTO makanan 
                    (id_makanan, nama, harga, tgl_buat, tgl_exp, stok, gambar ) VALUES
                    ('$id_makanan','$nama','$harga','$tgl_buat','$tgl_exp','$stok','$nama_gambar' )
                    ");

                if($sql){
                    echo "
                            <script>
                            alert('Data Berhasil Ditambahkan!!');

                            window.location.href = 'data-makanan.php';
                            </script>
                            ";
                        }else{
                            echo "
                            <script>
                            alert('Data Gagal Ditambahkan!!');
                            </script>
                            ";
                            
                        }
                }else{
                    echo "
                            <script>
                            alert('Ukuran Gambar Minimal 5 MB!');
                            </script>
                            ";
                }
        }else{
            echo "
                <script>
                alert('Format Gambar Tidak Sesuai!!');
                </script>
                ";
        }
    }else{
        echo "
            <script>
                alert('Gambar Tidak Diupload!!');
            </script>
            ";
    }

}

if($aksi == "ubah"){
    $id_makanan = $_POST['id_makanan'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $tgl_buat = $_POST['tgl_buat'];
    $tgl_exp = $_POST['tgl_exp'];
    $stok = $_POST['stok'];

    $sql = mysqli_query($koneksi, "UPDATE makanan 
    SET
    nama = '$nama',
    harga = '$harga',
    tgl_buat = '$tgl_buat',
    tgl_exp = '$tgl_exp',
    stok = '$stok',
    WHERE id_makanan = '$id_makanan'
    ");

    if($sql){
        echo "
        <script>
        alert('Data Berhasil Diubah!!');

        window.location.href = 'data-makanan.php';
        </script>
        ";
    }else{
        echo "
        <script>
        alert('Data Gagal Diubah!!');
        </script>
        ";
        
    }
}

if($aksi == "hapus"){
    $id_makanan = $_GET['id_makanan'];
    $sql = mysqli_query($koneksi, "DELETE FROM makanan WHERE id_makanan = '$id_makanan'");

    if($sql){
        echo "
        <script>
        alert('Data Berhasil Dihapus!!');

        window.location.href = 'data-makanan.php';
        </script>
        ";
    }else{
        echo "
        <script>
        alert('Data Gagal Dihapus!!');
        </script>
        ";
        
    }
}

if($aksi == "upload"){
    $id_makanan = $_POST['id_makanan'];

    if($_FILES['gambar']){
        $ekstensi = array ('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');
        $nama_gambar = $_FILES['gambar']['name'];
        $pecah = explode('.', $nama_gambar);
        $format = end($pecah);
        $ukuran = $_FILES['gambar']['size'];
        $temp = $_FILES['gambar']['tmp_name'];

        if (in_array($format, $ekstensi ) === true){
                if($ukuran <= 6000000 ){
                    move_uploaded_file($temp, 'gambar-makanan/'. $nama_gambar);

                    $sql = mysqli_query($koneksi, "UPDATE makanan 
                    SET
                    gambar = '$nama_gambar'
                    WHERE id_makanan = '$id_makanan'
                    ");

                if($sql){
                    echo "
                            <script>
                            alert('Gambar Berhasil Diupload!!');

                            window.location.href = 'data-makanan.php';
                            </script>
                            ";
                        }else{
                            echo "
                            <script>
                            alert('Gambar Gagal Diupload!!');
                            </script>
                            ";
                            
                        }
                }else{
                    echo "
                            <script>
                            alert('Ukuran Gambar Minimal 5 MB!');
                            </script>
                            ";
                }
        }else{
            echo "
                <script>
                alert('Format Gambar Tidak Sesuai!!');
                </script>
                ";
        }
    }else{
        echo "
            <script>
                alert('Gambar Tidak Diupload!!');
            </script>
            ";
    }
}

?>