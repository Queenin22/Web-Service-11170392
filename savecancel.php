<?php
 Include ("Api.php");
 $transaksi = new Api();
 $data = json_decode(file_get_contents ('php://input'), true);
 try {
	 //simpan ke tabel order_detail
	 $sql = "DELETE FROM transaksi WHERE id_transaksi = '".$data["id_transaksi"]."' ";
	 $transaksi->conn->query($sql);
	echo "Successfully.Query : ".$sql;
 }
	catch (PDOException $e) {
		echo "Failed saving to database : ",$e->getMessage();
	}

?>