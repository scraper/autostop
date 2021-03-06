<?php

function connect() {
	global $pdo;
	$pdo = new PDO("mysql:host=localhost;dbname=test;","root","bruselee", array(
  					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

function create_table() {
	global $pdo;

	$stmt = $pdo->prepare('
		CREATE TABLE test (start VARCHAR(100), end VARCHAR(100));
		');
	$stmt->execute();
}
//getting json result from google maps and pushing to array route info, new.php
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
	/*print_r($result);*/
}
//adding a new route, new.php
function new_route() {
	global $pdo;
	global $result;
	$pdo->beginTransaction();
	
	try {


		$stmt = $pdo->prepare("
			insert into s_city (s_city_id) values (:start_c);
		");
		$stmt->bindParam(':start_c', $result[0], PDO::PARAM_STR);
		$stmt->execute();

		$stmt = $pdo->prepare("
			insert into e_city (e_city_id) values (:end_c);
			");
		$stmt->bindParam(':end_c',$result[1], PDO::PARAM_STR);
		$stmt->execute();

		$stmt = $pdo->prepare("
			insert into routes (s_city, e_city, seats, price, type, date)
			values ( 	(select s_city_pk from s_city where s_city_id like :start),
						(select e_city_pk from e_city where e_city_id like :end),
        				:seats, :price, :type, :date);
			");
		$p = 'driver';
		$s = $result[0]. "%";
		$e = $result[1]. "%";

		$stmt->bindParam(':start',$s, PDO::PARAM_STR);
		$stmt->bindParam(':end',$e, PDO::PARAM_STR);
		$stmt->bindParam(':seats',$result[2], PDO::PARAM_INT);
		$stmt->bindParam(':price',$result[3], PDO::PARAM_INT);
		$stmt->bindParam(':type',$p, PDO::PARAM_STR);
		$stmt->bindParam(':date',$result[4], PDO::PARAM_STR);
		$stmt->execute();
		$route_pk = $pdo->lastInsertId();
		$file = 'new_route.log';
		$route_log_msg = "\r\nRoute was added:";
		file_put_contents($file, $route_log_msg, FILE_APPEND | LOCK_EX);
		$route_log_id = $route_pk;
		file_put_contents($file, $route_log_id, FILE_APPEND | LOCK_EX);

		$pdo->commit();
		header("Location: ./route.php?q=$route_pk");

	}
	catch (PDOException $e) {
		//write log
		// echo $e->getMessage();
		// $file = 'new_route.log';
		// $msg = "\r\nNew route with existing city was added\r\n";
		// file_put_contents($file, $msg, FILE_APPEND | LOCK_EX);
		// file_put_contents($file, $e, FILE_APPEND | LOCK_EX);
		try {
			$stmt = $pdo->prepare("
			insert into routes (s_city, e_city, seats, price, type, date)
			values ( 	(select s_city_pk from s_city where s_city_id like :start),
						(select e_city_pk from e_city where e_city_id like :end),
        				:seats, :price, :type, :date);
			");
			$p = 'driver';
			$s = $result[0]. "%";
			$e = $result[1]. "%";

			$stmt->bindParam(':start',$s, PDO::PARAM_STR);
			$stmt->bindParam(':end',$e, PDO::PARAM_STR);
			$stmt->bindParam(':seats',$result[2], PDO::PARAM_INT);
			$stmt->bindParam(':price',$result[3], PDO::PARAM_INT);
			$stmt->bindParam(':type',$p, PDO::PARAM_STR);
			$stmt->bindParam(':date',$result[4], PDO::PARAM_STR);
			$stmt->execute();
			$route_pk = $pdo->lastInsertId();
			$file = 'new_route.log';
			$route_log_msg = "\r\nRoute was added:";
			file_put_contents($file, $route_log_msg, FILE_APPEND | LOCK_EX);
			$route_log_id = $route_pk;
			file_put_contents($file, $route_log_id, FILE_APPEND | LOCK_EX);

			$pdo->commit();
			header("Location: ./route.php?q=$route_pk");
		}
		catch (PDOException $e) {
			$file = 'new_route.log';
			$error = $e + "\nUnexpected error\n";
			file_put_contents($file, $error, FILE_APPEND | LOCK_EX);
		}
	}


}
//push results to typeahead prediction, search.js uses
function typeahead_search($query) {
	global $pdo;

	$stmt = $pdo->prepare("
		SELECT s_city_id FROM s_city WHERE s_city_id LIKE :query
		UNION
		SELECT e_city_id FROM e_city WHERE e_city_id LIKE :query;
		");
	$stmt->execute(array(':query'=>$query. '%'));
	$result = $stmt->fetchAll(PDO::FETCH_OBJ);
	return $result;
}
//return the results of search query, search.php page shows, /search/index.php processes
function search($query) {
	global $pdo;

	$stmt = $pdo->prepare("
		select routes.route_id, s_city.s_city_id, e_city.e_city_id, routes.seats, routes.price, routes.type, routes.date
		from routes
		join s_city on routes.s_city = s_city.s_city_pk
		join e_city on routes.e_city = e_city.e_city_pk
		where s_city.s_city_id like :query or e_city.e_city_id like :query;
		");
	$stmt->execute(array(':query'=>$query. '%'));
	$search = $stmt->fetchALL(PDO::FETCH_OBJ);
	return $search;
}

//return route info by route_id
function render_route($id) {
	global $pdo;

	$stmt = $pdo->prepare('
		select routes.route_id, s_city.s_city_id, e_city.e_city_id, routes.seats, routes.price, routes.type, routes.date
		from routes
		join s_city on routes.s_city = s_city.s_city_pk
		join e_city on routes.e_city = e_city.e_city_pk
		where routes.route_id = :q;
		');
	$stmt->execute(array(':q'=>$id));
	return $stmt->fetch(PDO::FETCH_OBJ);
}

/*function search($search) {
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

function show_routes() {
	global $pdo;

	$stmt = $pdo->prepare('
		SELECT route_id, start, end FROM routes;
		');
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_OBJ);
}
*/