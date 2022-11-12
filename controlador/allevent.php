<?php
	// include config file
	require_once '../lib/dbconn.php';

	// SQL Statement
	$sql = "SELECT * FROM evento,sports WHERE evento.idDeporte = sports.idDeporte  ORDER BY rand() LIMIT 3 " ;

	// Process the query
	$results = $conn->query($sql);

	// Fetch Associative array
	$row = $results->fetch_all(MYSQLI_ASSOC);

	// Free result set
	$results->free_result();

	// Close the connection after using it
	$conn->close();

	// Encode array into json format
	echo json_encode($row);
?>