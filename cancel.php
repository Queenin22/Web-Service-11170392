<?php
 Include ("Api.php");
 $transaksi = new Api();
 $data = ['id_transaksi' =>$_GET["id_transaksi"]];
	echo $transaksi->post("http://localhost/penjualan/savecancel.php",$data);
?>