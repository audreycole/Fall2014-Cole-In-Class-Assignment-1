<!DOCTYPE html>
<head>
<title>Battlefield Analysis</title>
<style type="text/css">
.heading {
	text-align: center;
}
body{
	width: 760px; /* how wide to make your web page */
	background-color: teal; /* what color to make the background */
	margin: 0 auto;
	padding: 0;
	font:12px/16px Verdana, sans-serif; /* default font */
}
div#main{
	background-color: #FFF;
	margin: 0;
	padding: 10px;
}
</style>
</head>
<body><div id="main">
 
<!-- CONTENT HERE -->
<h1 class="heading"> Battlefield Analysis </h1>
<h2> Latest Critiques </h2> 

<?php
// Content of database.php
 
$mysqli = new mysqli('localhost', 'wustl_inst', 'wustl_pass', 'reports');
 
if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}

$stmt = $mysqli->prepare("select * from reports order by posted");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->execute();
 
$stmt->bind_result($first, $last);

echo "<ul>\n";
while($stmt->fetch()){
	printf("\t<li>%s %s</li>\n",
		htmlspecialchars($ammo),
		htmlspecialchars($soldiers),
		htmlspecialchars($duration),
		htmlspecialchars($critque)
	);
}
echo "</ul>\n";

$stmt->close();

</div></body>
</html>