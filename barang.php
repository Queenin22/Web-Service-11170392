<?php
include ("Api.php");
$limit	 = isset ($_GET ['limit']) ? (int) $_GET ['limit'] : 0;
$keyword = isset ($_GET ['idbarang']) ? (int) $_GET ['idbarang'] : '';
$barang = new Api();
echo $barang->get ($keyword,$limit);
?>