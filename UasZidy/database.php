<?php
//koneksi ke database mysql, silahkan di rubah dengan koneksi agan sendiri
$koneksi = mysqli_connect("localhost","root","1234","uas_kelompok_web");
 
//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()){
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}


// try {
// 	//Connect to Mongo
// 	$this -> mongo = new Mongo('127.0.0.1:27017');

// 	$this -> db = $this -> mongo -> selectDB('toko');

// 	$tableName = 'barang';
// 	$this -> table = $this -> db -> $tableName;
// } catch(Exception $e) {
// 	alert("Something Went Wrong.");
// 	exit();
// }
?>