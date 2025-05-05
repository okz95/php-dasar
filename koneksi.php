<?php 

$host = "localhost";
$username = "root";
$pass = "admin";
$database="php-dasar";

$koneksi = mysqli_connect($host, $username, $pass, $database);

if ($koneksi){

}else{
    echo "Koneksi Gagal : ". mysqli_connect_error();
}


?>