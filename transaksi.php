<?php
include("Api.php");
$barang = new Api();
$data = [ 
     'id_transaksi' => $_GET["id_transaksi"],
	 'id_barang' => $_GET["id_barang"],
	 'id_pembeli' => $_GET["id_pembeli"],
	 'tanggal'  => date('Y-m-d'),
	 'keterangan' => $_GET['keterangan']];
echo $barang->post("http://localhost/penjualan/submit.php",$data);
?> 