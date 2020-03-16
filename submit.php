<?php
 include("Api.php");
 $barang = new Api();
 $data =json_decode (file_get_contents ('php://input'), true);
 try {
 	//simpan ke tabel transaksi
 	$sql1 = "INSERT INTO transaksi
 			(id_transaksi, id_barang, id_pembeli, tanggal, keterangan)
 			VALUES (' ".$data["id_transaksi"]."',
 			' ".$data["id_barang"]."',
 			' ".$data["id_pembeli"]."',
 			' ".$data["tanggal"]."',
 			' ".$data["keterangan"]."')";
 	$barang->conn->query($sql1);
 	echo "Successfully";
}catch (PDOException $e) {
	echo "Failed saving to database : ".$e->getMessage(); 			
 			
 }
?>