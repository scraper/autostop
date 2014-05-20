<?php

//getting json result from google maps and pushing to array route info, new.php
function get_json($origin, $destination, $waypoint_0, $waypoint_1, $waypoint_2, $waypoint_3, $waypoint_4, $seats, $price, $type, $date, $fb_id) {
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
	if (empty($seats)) {
		$seats = 0;
	}
	$start = $output["routes"][0]["legs"][0]["start_address"];
	$end = $output["routes"][0]["legs"][0]["end_address"];
	global $result;
	$result = array($start, $end, $waypoint_0, $waypoint_1, $waypoint_2, $waypoint_3, $waypoint_4, $seats, $price, $type, $date, $fb_id);
	/*return $result;*/
	/*print_r($result);*/
}
//get user fb_id and return user_table.user_pk
function get_user_pk($fb_id) {
	global $pdo;

	$stmt = $pdo->prepare("
		SELECT user_pk FROM user_table WHERE user_id = :fb_id;
		");
	$stmt->execute(array(':fb_id'=>$fb_id));
	$user_pk = $stmt->fetch(PDO::FETCH_BOTH);
	return $user_pk;
}
//adding a new route, new.php
function new_route() {
	global $pdo;
	global $result;
	
	$pdo->beginTransaction();

	try {

		try {
			$stmt = $pdo->prepare("
				insert into s_city (s_city_id) values (:start_c);
			");
			$stmt->bindParam(':start_c', $result[0], PDO::PARAM_STR);
			$stmt->execute();
		}
		catch (Exception $e) {
			
		};
		
		try {
			$stmt = $pdo->prepare("
				insert into e_city (e_city_id) values (:end_c);
				");
			$stmt->bindParam(':end_c',$result[1], PDO::PARAM_STR);
			$stmt->execute();
		} 
		catch (Exception $e) {
			
		};
		try {
			$stmt = $pdo->prepare("
				insert into waypoints (waypoint_id,waypoint_id,waypoint_id,waypoint_id,waypoint_id,)
				values (:waypoint_0,:waypoint_1,:waypoint_2,:waypoint_3,:waypoint_4);
				");
			$stmt->bindParam(':waypoint_0',$result[2], PDO::PARAM_STR);
			$stmt->bindParam(':waypoint_1',$result[3], PDO::PARAM_STR);
			$stmt->bindParam(':waypoint_2',$result[4], PDO::PARAM_STR);
			$stmt->bindParam(':waypoint_3',$result[5], PDO::PARAM_STR);
			$stmt->bindParam(':waypoint_4',$result[6], PDO::PARAM_STR);
			$stmt->execute();
		}
		catch (Exception $e) {

		};


		$stmt = $pdo->prepare("
			insert into routes (s_city, e_city, waypoint_0, waypoint_1, waypoint_2, waypoint_3, waypoint_4, seats, price, type, date, fb_id)
			values ( 	(select s_city_pk from s_city where s_city_id like :start),
						(select e_city_pk from e_city where e_city_id like :end),
						(select waypoint_pk from waypoints where waypoint_0 like :waypoint_0),
						(select waypoint_pk from waypoints where waypoint_1 like :waypoint_1),
						(select waypoint_pk from waypoints where waypoint_2 like :waypoint_2),
						(select waypoint_pk from waypoints where waypoint_3 like :waypoint_3),
						(select waypoint_pk from waypoints where waypoint_4 like :waypoint_4),
        				:seats, :price, :type, :date,
        				(select user_pk from user_table where user_id = :fb_id));
			");
		$s = $result[0]. "%";
		$e = $result[1]. "%";

		$stmt->bindParam(':start',$s, PDO::PARAM_STR);
		$stmt->bindParam(':end',$e, PDO::PARAM_STR);
		$stmt->bindParam(':waypoint_0',$result[2], PDO::PARAM_STR);
		$stmt->bindParam(':waypoint_1',$result[3], PDO::PARAM_STR);
		$stmt->bindParam(':waypoint_2',$result[4], PDO::PARAM_STR);
		$stmt->bindParam(':waypoint_3',$result[5], PDO::PARAM_STR);
		$stmt->bindParam(':waypoint_4',$result[6], PDO::PARAM_STR);
		$stmt->bindParam(':seats',$result[7], PDO::PARAM_INT);
		$stmt->bindParam(':price',$result[8], PDO::PARAM_INT);
		$stmt->bindParam(':type',$result[9], PDO::PARAM_STR);
		$stmt->bindParam(':date',$result[10], PDO::PARAM_STR);
		$stmt->bindParam(':fb_id',$result[11], PDO::PARAM_STR);
		$stmt->execute();
		$route_pk = $pdo->lastInsertId();
		//newr_route.log - user_id, route_id
		$file = 'new_route.log';
		$route_log_msg = "\r\nRoute was added:";
		file_put_contents($file, $route_log_msg, FILE_APPEND | LOCK_EX);
		$route_log_id = $route_pk;
		file_put_contents($file, $route_log_id, FILE_APPEND | LOCK_EX);
		$route_log_msg_user_id = "\r\nAdded by user_id:";
		file_put_contents($file, $route_log_msg_user_id, FILE_APPEND | LOCK_EX);
		file_put_contents($file, $result[6], FILE_APPEND | LOCK_EX);
		$pdo->commit();
		header("Location: /route.php?q=$route_pk");

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
			insert into routes (s_city, e_city, waypoint_0, waypoint_1, waypoint_2, waypoint_3, waypoint_4, seats, price, type, date, user_id)
			values ( 	(select s_city_pk from s_city where s_city_id like :start),
						(select e_city_pk from e_city where e_city_id like :end),
						(select waypoint_pk from waypoints where waypoint_id like :waypoint_0),
						(select waypoint_pk from waypoints where waypoint_id like :waypoint_1),
						(select waypoint_pk from waypoints where waypoint_id like :waypoint_2),
						(select waypoint_pk from waypoints where waypoint_id like :waypoint_3),
						(select waypoint_pk from waypoints where waypoint_id like :waypoint_4),
        				:seats, :price, :type, :date, 
        				(select user_pk from user_table where user_id = :fb_id));
			");
			$s = $result[0]. "%";
			$e = $result[1]. "%";

			$stmt->bindParam(':start',$s, PDO::PARAM_STR);
			$stmt->bindParam(':end',$e, PDO::PARAM_STR);
			$stmt->bindParam(':waypoint_0',$result[2], PDO::PARAM_STR);
			$stmt->bindParam(':waypoint_1',$result[3], PDO::PARAM_STR);
			$stmt->bindParam(':waypoint_2',$result[4], PDO::PARAM_STR);
			$stmt->bindParam(':waypoint_3',$result[5], PDO::PARAM_STR);
			$stmt->bindParam(':waypoint_4',$result[6], PDO::PARAM_STR);
			$stmt->bindParam(':seats',$result[7], PDO::PARAM_INT);
			$stmt->bindParam(':price',$result[8], PDO::PARAM_INT);
			$stmt->bindParam(':type',$result[9], PDO::PARAM_STR);
			$stmt->bindParam(':date',$result[10], PDO::PARAM_STR);
			$stmt->bindParam(':fb_id',$result[11], PDO::PARAM_STR);
			$stmt->execute();
			$route_pk = $pdo->lastInsertId();
			//newr_route.log - user_id, route_id
			$file = 'new_route.log';
			$route_log_msg = "\r\nRoute was added:";
			file_put_contents($file, $route_log_msg, FILE_APPEND | LOCK_EX);
			$route_log_id = $route_pk;
			file_put_contents($file, $route_log_id, FILE_APPEND | LOCK_EX);
			$route_log_msg_user_id = "\r\nAdded by user_id:";
			file_put_contents($file, $route_log_msg_user_id, FILE_APPEND | LOCK_EX);
			file_put_contents($file, $result[6], FILE_APPEND | LOCK_EX);
			$pdo->commit();
			header("Location: /route.php?q=$route_pk");
		}
		catch (PDOException $e) {
			$file = 'new_route.log';
			$new_line = "\r\n";
			file_put_contents($file, $new_line, FILE_APPEND | LOCK_EX);
			file_put_contents($file, $e, FILE_APPEND | LOCK_EX);
		}
	}


}
//new route if user is not registered
function new_route_unregistered($vehicle, $v_color, $climat, $smoking, $email, $phone, $experience) {
	global $pdo;
	global $result;
	global $u_user_data;
	global $user_pk;
	$u_user_data = array($vehicle, $v_color, $climat, $smoking, $email, $phone, $experience);

	$pdo->beginTransaction();

	try {
		$stmt = $pdo->prepare("
			insert into unregistered_user_data (vehicle,v_color, climat, smoking, email, phone, experience)
			values (:vehicle, :v_color, :climat, :smoking, :email, :phone, :experience)
			");
		$stmt->bindParam(':vehicle', $u_user_data[0], PDO::PARAM_STR);
		$stmt->bindParam(':v_color', $u_user_data[1], PDO::PARAM_STR);
		$stmt->bindParam(':climat', $u_user_data[2], PDO::PARAM_STR);
		$stmt->bindParam(':smoking', $u_user_data[3], PDO::PARAM_STR);
		$stmt->bindParam(':email', $u_user_data[4], PDO::PARAM_STR);
		$stmt->bindParam(':phone', $u_user_data[5], PDO::PARAM_STR);
		$stmt->bindParam(':experience', $u_user_data[6], PDO::PARAM_STR);
		$stmt->execute();
		$user_pk = $pdo->lastInsertId();
	} catch (Exception $e) {
		$file = 'new_route.log';
		$route_log_msg = "\r\nUnregistered user data was not saved because of unknown error";
		file_put_contents($file, $route_log_msg, FILE_APPEND | LOCK_EX);
	};

	try {

		try {
			$stmt = $pdo->prepare("
				insert into s_city (s_city_id) values (:start_c);
			");
			$stmt->bindParam(':start_c', $result[0], PDO::PARAM_STR);
			$stmt->execute();
		} catch (Exception $e) {
			
		};
		
		try {
			$stmt = $pdo->prepare("
				insert into e_city (e_city_id) values (:end_c);
				");
			$stmt->bindParam(':end_c',$result[1], PDO::PARAM_STR);
			$stmt->execute();
		} catch (Exception $e) {
			
		};

		$stmt = $pdo->prepare("
			insert into routes (s_city, e_city, seats, price, type, date, unregistered_id)
			values ( 	(select s_city_pk from s_city where s_city_id like :start),
						(select e_city_pk from e_city where e_city_id like :end),
        				:seats, :price, :type, :date, :user_pk);
			");
		$s = $result[0]. "%";
		$e = $result[1]. "%";

		$stmt->bindParam(':start',$s, PDO::PARAM_STR);
		$stmt->bindParam(':end',$e, PDO::PARAM_STR);
		$stmt->bindParam(':seats',$result[2], PDO::PARAM_INT);
		$stmt->bindParam(':price',$result[3], PDO::PARAM_INT);
		$stmt->bindParam(':type',$result[4], PDO::PARAM_STR);
		$stmt->bindParam(':date',$result[5], PDO::PARAM_STR);
		$stmt->bindParam(':user_pk',$user_pk, PDO::PARAM_STR);
		$stmt->execute();
		$route_pk = $pdo->lastInsertId();
		//newr_route.log - user_id, route_id
		$file = 'new_route.log';
		$route_log_msg = "\r\nRoute was added:";
		file_put_contents($file, $route_log_msg, FILE_APPEND | LOCK_EX);
		$route_log_id = $route_pk;
		file_put_contents($file, $route_log_id, FILE_APPEND | LOCK_EX);
		$route_log_msg_user_id = "\r\nAdded by unregistered user_pk:";
		file_put_contents($file, $route_log_msg_user_id, FILE_APPEND | LOCK_EX);
		file_put_contents($file, $user_pk, FILE_APPEND | LOCK_EX);
		$pdo->commit();
		header("Location: /route.php?q=$route_pk");

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
			insert into routes (s_city, e_city, seats, price, type, date, unregistered_id)
			values ( 	(select s_city_pk from s_city where s_city_id like :start),
						(select e_city_pk from e_city where e_city_id like :end),
        				:seats, :price, :type, :date, :user_pk);
			");
			$s = $result[0]. "%";
			$e = $result[1]. "%";

			$stmt->bindParam(':start',$s, PDO::PARAM_STR);
			$stmt->bindParam(':end',$e, PDO::PARAM_STR);
			$stmt->bindParam(':seats',$result[2], PDO::PARAM_INT);
			$stmt->bindParam(':price',$result[3], PDO::PARAM_INT);
			$stmt->bindParam(':type',$result[4], PDO::PARAM_STR);
			$stmt->bindParam(':date',$result[5], PDO::PARAM_STR);
			$stmt->bindParam(':user_pk',$user_pk, PDO::PARAM_STR);
			$stmt->execute();
			$route_pk = $pdo->lastInsertId();
			//newr_route.log - user_id, route_id
			$file = 'new_route.log';
			$route_log_msg = "\r\nRoute was added:";
			file_put_contents($file, $route_log_msg, FILE_APPEND | LOCK_EX);
			$route_log_id = $route_pk;
			file_put_contents($file, $route_log_id, FILE_APPEND | LOCK_EX);
			$route_log_msg_user_id = "\r\nAdded by unregistered user_pk:";
			file_put_contents($file, $route_log_msg_user_id, FILE_APPEND | LOCK_EX);
			file_put_contents($file, $user_pk, FILE_APPEND | LOCK_EX);
			$pdo->commit();
			header("Location: /route.php?q=$route_pk");
		}
		catch (PDOException $e) {
			$file = 'new_route.log';
			$new_line = "\r\n";
			file_put_contents($file, $new_line, FILE_APPEND | LOCK_EX);
			file_put_contents($file, $e, FILE_APPEND | LOCK_EX);
		}
	}
}

//show top 10 routes
function top_routes($uid) {
	// global $pdo;

	// $stmt = $pdo->prepare("
	// 	select routes.route_id, s_city.s_city_id, e_city.e_city_id, routes.type
	// 	from routes
	// 	join s_city on routes.s_city = s_city.s_city_pk
	// 	join e_city on routes.e_city = e_city.e_city_pk
	// 	where routes.date >= curdate()
	// 	order by route_id desc
	// 	limit 7;
	// 	");
	// $stmt->execute();
	// $top = $stmt->fetchALL(PDO::FETCH_OBJ);
	// return $top;

	switch ($uid) {
		case null:
			$sqlQuery = "where routes.date >= curdate() order by route_id desc ";
			return core_search($sqlQuery,0);
			break;
		
		default:
			$sqlQuery = "where user_id = (select user_pk from user_table where user_id = '" . $uid . "') order by route_id desc ";
			return core_search($sqlQuery,0);
			break;
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
//get number of rows
function row_count($sql) {
	global $pdo;
	
	// error_log($sql,0);
	$pre_stmt = $pdo->prepare($sql);
	$pre_stmt->execute();
	$countRow = $pre_stmt->rowCount();
	
	return $countRow;
}
//core search
function core_search($sqlQuery,$start) {
	global $pdo;
	$sql = "select routes.route_id, s_city.s_city_id, e_city.e_city_id, routes.seats, routes.price, routes.type, routes.date
			from routes
			join s_city on routes.s_city = s_city.s_city_pk
			join e_city on routes.e_city = e_city.e_city_pk "
			. $sqlQuery;

	$stmt = $pdo->prepare($sql . "limit " . $start . ",10;");
	$stmt->execute();
	$search = $stmt->fetchALL(PDO::FETCH_OBJ);
	
	return [$search,row_count($sql)];
}

//return the results of search query, search.php page shows, /search/index.php processes
function search($query,$start) {
	$sqlQuery = "where routes.date >= curdate() and (s_city.s_city_id like '" . $query . "%' or e_city.e_city_id like '" . $query . "%')";	
	switch ($start) {
		case null:
			$start = "0";
			return core_search($sqlQuery,$start);
			break;
		
		default:
			return core_search($sqlQuery,$start);
			break;
	}
	// if ($start == null) {
	// 	$start = "0";
	// 	if ($query != "" && $query != null) {
	// 		return core_search($sqlQuery,$start);
	// 	}
	// 	else {
	// 		return false;
	// 	};
	// }
	// elseif ($start != null) {
	// 	if ($query != "" && $query != null) {
	// 		return core_search($sqlQuery,$start);
	// 	}
	// 	else {
	// 		return false;
	// 	};
	// };
}
//show user routes
function showUserRoute($uid,$start) {
	$sqlQuery = "where user_id = (select user_pk from user_table where user_id = '" . $uid . "') ";
	
	switch ($start) {
		case null:
			$start = "0";
			return core_search($sqlQuery,$start);
			break;
		
		default:
			return core_search($sqlQuery,$start);
			break;
	};
	// if ($start == null) {
	// 	$start = "0";
	// 	if ($uid != "" && $uid != null) {
			
	// 		return core_search($sqlQuery,$start);
	// 	}
	// 	else {
	// 		return false;
	// 	};
	// }
	// elseif ($start != null) {
	// 	if ($uid != "" && $uid != null) {
	// 		return core_search($sqlQuery,$start);
	// 	}
	// 	else {
	// 		return false;
	// 	};
	// };
}

function advanced_search($s_city,$e_city,$s_date,$e_date,$type) {
	global $pdo;

	$stmt = $pdo->prepare("
		select routes.route_id, s_city.s_city_id, e_city.e_city_id, routes.seats, routes.price, routes.type, routes.date
		from routes
		join s_city on routes.s_city = s_city.s_city_pk
		join e_city on routes.e_city = e_city.e_city_pk
		where (routes.date >= :s_date and routes.date <= :e_date) 
			and routes.type = :type
			and (s_city.s_city_id like :s_city and e_city.e_city_id like :e_city);
		");
	$stmt->execute(array(':s_city'=>$s_city. '%', ':e_city'=>$e_city. '%', ':s_date'=>$s_date,':e_date'=>$e_date,':type'=>$type));
	$advanced_search_result = $stmt->fetchAll(PDO::FETCH_OBJ);
	return $advanced_search_result;

}

//return route info by route_id
function render_route($id) {
	global $pdo;

	$stmt = $pdo->prepare('
		select 
			user_id,
			unregistered_id,
			type
		from routes
		where routes.route_id = :q;
		');
	$stmt->execute(array(':q'=>$id));
	$reg_result = $stmt->fetch(PDO::FETCH_BOTH);
	//if route is driver
	if ($reg_result[2] == "Водій" || $reg_result[2] == "1") {
		//if user is registered
		if ($reg_result[0] != null) {
			$stmt1 = $pdo->prepare('
				select 
					routes.route_id,
					routes.seats, 
					routes.price, 
					routes.type, 
					routes.date,
					routes.user_id,
					s_city.s_city_id, 
					e_city.e_city_id, 
					user_table.name, 
					user_table.vehicle, 
					user_table.v_color,
					user_table.climat, 
					user_table.smoking, 
					user_table.email, 
					user_table.phone, 
					user_table.experience
				from routes
				join s_city on routes.s_city = s_city.s_city_pk
				join e_city on routes.e_city = e_city.e_city_pk
				join user_table on routes.user_id = user_table.user_pk
				where routes.route_id = :q;
				');
			$stmt1->execute(array(':q'=>$id));
			$result = $stmt1->fetch(PDO::FETCH_OBJ);
			return $result;
		}
		//if user is unregistered
		else if ($reg_result[1] != null) {
			$stmt2 = $pdo->prepare('
				select 
					routes.route_id, 
					routes.seats, 
					routes.price, 
					routes.type, 
					routes.date,
					s_city.s_city_id,
					e_city.e_city_id,
					unregistered_user_data.vehicle, 
					unregistered_user_data.v_color, 
					unregistered_user_data.climat,
					unregistered_user_data.smoking, 
					unregistered_user_data.email, 
					unregistered_user_data.phone, 
					unregistered_user_data.experience
				from routes
				join s_city on routes.s_city = s_city.s_city_pk
				join e_city on routes.e_city = e_city.e_city_pk
				join unregistered_user_data on routes.unregistered_id = unregistered_user_data.user_pk
				where routes.route_id = :q;
				');
			$stmt2->execute(array(':q'=>$id));
			$result = $stmt2->fetch(PDO::FETCH_OBJ);
			return $result;
		}
		//should not happen, but if happen show some result
		else {
			return $reg_result;
		};
	}
	//if route is passenger
	else if ($reg_result[2] == "Пасажир" || $reg_result[2] == "0") {
		//if user is registered
		if ($reg_result[0] != null) {
			$stmt1 = $pdo->prepare('
				select 
					routes.route_id,
					routes.seats, 
					routes.price, 
					routes.type, 
					routes.date,
					routes.user_id,
					s_city.s_city_id, 
					e_city.e_city_id, 
					user_table.name, 
					user_table.smoking, 
					user_table.email, 
					user_table.phone
				from routes
				join s_city on routes.s_city = s_city.s_city_pk
				join e_city on routes.e_city = e_city.e_city_pk
				join user_table on routes.user_id = user_table.user_pk
				where routes.route_id = :q;
				');
			$stmt1->execute(array(':q'=>$id));
			$result = $stmt1->fetch(PDO::FETCH_OBJ);
			return $result;
		}
		//if user is unregistered
		else if ($reg_result[1] != null) {
			$stmt2 = $pdo->prepare('
				select 
					routes.route_id, 
					routes.seats, 
					routes.price, 
					routes.type, 
					routes.date,
					routes.user_id,
					s_city.s_city_id,
					e_city.e_city_id,
					unregistered_user_data.smoking, 
					unregistered_user_data.email, 
					unregistered_user_data.phone
				from routes
				join s_city on routes.s_city = s_city.s_city_pk
				join e_city on routes.e_city = e_city.e_city_pk
				join unregistered_user_data on routes.unregistered_id = unregistered_user_data.user_pk
				where routes.route_id = :q;
				');
			$stmt2->execute(array(':q'=>$id));
			$result = $stmt2->fetch(PDO::FETCH_OBJ);
			return $result;
		}
		//should not happen, but if happen show some result
		else {
			return $reg_result;
		};		
	};
}
//create user after he logins first time from FB
function new_user($id,$name,$username) {
	global $pdo;

	$pdo->beginTransaction();
	try {
		$stmt = $pdo->prepare('
			insert into user_table(user_id,name,username) values(:id,:name,:username)
			');
		$stmt->bindParam(':id',$id, PDO::PARAM_STR);
		$stmt->bindParam(':name',$name,PDO::PARAM_STR);
		$stmt->bindParam(':username',$username,PDO::PARAM_STR);
		$stmt->execute();
		$user_pk = $pdo->lastInsertId();
		$pdo->commit();
		error_log("new_user function was executed",0);
		// header("Location: ./user.php?q=$user_pk");
	} catch (Exception $e) {
		throw new Exception("ID already exists", 1);
		throw Exception($e);
	};
}
//save user detailed information
function update_user_profile($id,$isDriver,$vehicle,$v_color,$climat,$experience,$smoking,$email,$phone) {
	global $pdo;

	$pdo->beginTransaction();
	try {
	 	$stmt = $pdo->prepare('
			update user_table 
			set 
				is_driver = :isDriver, 
				vehicle = :vehicle, 
				v_color = :v_color, 
				climat = :climat, 
				experience = :experience, 
				smoking = :smoking, 
				email = :email, 
				phone = :phone
			where user_id = :id
			');
	$stmt->bindParam(':id', $id, PDO::PARAM_STR);
	$stmt->bindParam(':isDriver', $isDriver, PDO::PARAM_STR);
	$stmt->bindParam(':vehicle', $vehicle, PDO::PARAM_STR);
	$stmt->bindParam(':v_color', $v_color, PDO::PARAM_STR);
	$stmt->bindParam(':climat', $climat, PDO::PARAM_STR);
	$stmt->bindParam(':experience', $experience, PDO::PARAM_STR);
	$stmt->bindParam(':smoking', $smoking, PDO::PARAM_STR);
	$stmt->bindParam(':email', $email, PDO::PARAM_STR);
	$stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
	$stmt->execute();
	$pdo->commit();	
	} catch (Exception $e) {
		// throw new Exception("Unable to update user profile detailes", 1);
		throw Exception($e);	
	};
}
function user_profile($id) {
	global $pdo;

	$stmt = $pdo->prepare('
		select * from user_table where user_id = :id
		');
	$stmt->execute(array(':id'=>$id));
	return $stmt->fetch(PDO::FETCH_OBJ);
}