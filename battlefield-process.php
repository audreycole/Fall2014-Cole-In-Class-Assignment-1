<!--recieve the POST variables: ammo, soldiers, duration, critique -->

<?php 
	$mysqli = new mysqli('localhost', 'wustl_inst', 'wustl_inst', 'battlefield');
 
	if($mysqli->connect_errno) {
		printf("Connection Failed: %s\n", $mysqli->connect_error);
		exit;
	}

	if(isset($_POST['ammo']) {
		$ammo = (int)($_POST['ammo']);
	} else {
		echo "Error! You didn't enter ammo!";
		exit;
	}
	if(isset($_POST['soldiers']) {
		$soldiers = (int)($_POST['soldiers']);
	}else {
		echo "Error! You didn't enter soldiers!";
		exit;
	}
	if(isset($_POST['duration']) {
		$duration = (int)($_POST['duration']);
	}else {
		echo "Error! You didn't enter duration!";
		exit;
	}
	if(isset($_POST['critique']) {
		$critique = (string)($_POST['critique']);
	}else {
		echo "Error! You didn't enter critique!";
		exit;
	}

	$stmt = $mysqli->prepare("insert into reports (ammunition, soldiers, duration, critique) values (?, ?, ?,?)");
		if(!$stmt){
			printf("Query Prep Failed: %s\n", $mysqli->error);
			exit;
		}
				 
	$stmt->bind_param('iiis', $ammo, $soldiers, $duration, $critique);
				 
	$stmt->execute();
				 
	$stmt->close();

	header("Location: battlefield-submit.html");

?>