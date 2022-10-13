<?php 

include "connection.php";

$nama_barang=$_POST['nama_barang'];
$type_barang=$_POST['type_barang'];
$harga=$_POST['harga'];
$id=$_POST['id'];

$sql = "UPDATE barang SET 
		nama_barang ='".$nama_barang."', 
		type_barang='".$type_barang."',
		harga='".$harga."'
		WHERE id_barang'".$id."'";

if ($connect->query($sql) === TRUE) {
    echo "berhasil";
    header("location:account.php");
}else{
    echo "gagal";
    header("location:account.php");
}

?>