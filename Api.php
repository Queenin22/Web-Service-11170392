<?php
class Api{

public $conn;

public function __construct(){
	$servername = "localhost";
	$username   = "root";
	$password   = "";
	$database   = "penjualan";
	
	try {
		$this->conn = new PDO ("mysql:host=$servername; dbname=$database", $username, $password);
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Connection failed : ".$e->getMessage();
		
	}
}

public function get($keyword="",$limit=""){
	$limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 0;
	$idbarang  = isset($_GET['idbarang']) ? $_GET['idbarang'] : '';
	
	$sql_limit = (!empty($limit))? ' LIMIT 0,'.$limit : '';
	$sql_idbarang  = (!empty($idbarang))? 'WHERE idbarang='.$idbarang.'':'';
	
	$sql = "SELECT * FROM barang ".$sql_idbarang." ".$sql_limit;
    $data = $this->conn->prepare($sql);
	$data->execute();
	$barang =[];
	while($row = $data->fetch(PDO::FETCH_OBJ)){
		$barang [] = ["idbarang"=>$row->idbarang,
		                "nama_barang"=>$row->nama_barang,
						"harga"=>$row->harga,
						"stok"=>$row->stok,
						"id_supplier"=>$row->id_supplier];
	}
	
	$this->conn = null;
	header('Content-Type: application/json');
	
	$arr = array();
	$arr['info'] = 'success';
	$arr['num'] = count($barang);
	$arr['result'] = $barang;
	
	return json_encode(array('ITEMS'=>$arr), JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}

public function post($url,$params){
	$payload = json_encode ($params);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
	'Content-Length: ' . strlen($payload))
	);
	
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

public function put($url,$params){
	$payload = json_encode ($params);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
	'Content-Length: '. strlen($payload))
	);
	
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

public function cancel($url,$params){
	$payload = json_encode ($params);
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
	'Content-Length: '. strlen($payload))
	);
	
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
}
?>