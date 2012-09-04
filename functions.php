<?php

function connect() {
	global $pdo;
	$pdo = new PDO("mysql:host=localhost;dbname=autostop;","root","bruselee");
}

function create_table() {
	global $pdo;

	$stmt = $pdo->prepare('
		CREATE TABLE test (start VARCHAR(100), end VARCHAR(100));
		');
	$stmt->execute();
}

function get_json($origin, $destination, $seats, $price, $date) {
	if(isset($origin,$destination)) {
		$or_city_name = explode(' ',trim($origin));
		$origin_city_name = $or_city_name[0];
		$dest_city_name = explode(' ',trim($destination));
		$destination_city_name = $dest_city_name[0];
		$json_url = 'http://maps.googleapis.com/maps/api/directions/json?';
		$json_url .= 'origin='.urldecode($origin_city_name);
		$json_url .= '&destination='.urldecode($destination_city_name).'&sensor=false&language=uk';
		$get = file_get_contents($json_url);
		$output = json_decode($get, true);
	}
	$start = $output["routes"][0]["legs"][0]["start_address"];
	$end = $output["routes"][0]["legs"][0]["end_address"];
	global $result;
	$result = array($start, $end, $seats, $price, $date);
	/*return $result;*/
	print_r($result);
}

function new_route() {
	global $pdo;
	global $result;
	
	if($result[0] != '' and $result[1] != '' and $result[2]=='') {
		$stmt = $pdo->prepare('
			INSERT INTO routes (start, end, seats, price, type, date) 
			VALUES (:start, :end, :seats, :price, :type, :date);
			');
		$stmt->execute(array(':start'=>$result[0],':end'=>$result[1], ':seats'=>null, ':price'=>$result[3], ':type'=>'passenger', ':date'=>$result[4]) );
		return $stmt->fetchAll(PDO::FETCH_OBJ);
		print_r($stmt);
	}
	elseif ($result[0] != '' and $result[1] != '' and $result[2]!='') {
		$stmt = $pdo->prepare('
			INSERT INTO routes (start, end, seats, price, type, date) 
			VALUES (:start, :end, :seats, :price, :type, :date);
			');
		$stmt->execute(array(':start'=>$result[0],':end'=>$result[1], ':seats'=>$result[2], ':price'=>$result[3], ':type'=>'driver', ':date'=>$result[4]) );
		return $stmt->fetchAll(PDO::FETCH_OBJ);
		print_r($stmt);
	};
}

function show_routes() {
	global $pdo;

	$stmt = $pdo->prepare('
		SELECT route_id, start, end FROM routes;
		');
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function render_route($id) {
	global $pdo;

	$stmt = $pdo->prepare('
		SELECT * FROM routes WHERE route_id = :route_id;
		');
	$stmt->execute(array(':route_id'=>$id));
	return $stmt->fetch(PDO::FETCH_OBJ);
}

function search($search) {
	global $pdo;
	if(empty($search)) {
		return $stmt = null;
	}
	else {
		$stmt = $pdo->prepare('
			SELECT start, end, id FROM test
			WHERE (start LIKE :search OR end LIKE :search);
			');
		$stmt-> execute(array(':search'=>$search . '%'));
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
}