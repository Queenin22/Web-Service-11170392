<?php
 Include ("Api.php");
 $transaksi = new Api();
 $data = json_decode(file_get_contents ('php://input'), true);
 try {
	 //simpan ke tabel transaksi
	 $sql = "UPDATE transaksi SET
			id_barang = '".$data["id_barang"]."',
			id_pembeli = '".$data["id_pembeli"]."',
			tanggal ='".$data["tanggal"]."',
			keterangan ='".$data["keterangan"]."'
			WHERE id_transaksi = '".$data["id_transaksi"]."' ";
		$transaksi->conn->query($sql);
		echo "Successfully.Query : ".$sql;
 }
	catch (PDOException $e) {
		echo "Failed saving to database : ",$e->getMessage();
	}
?>