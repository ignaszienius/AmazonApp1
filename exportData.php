<?php
//load the database configuration file
include 'dbConfig.php';


if(isset($_POST['exportSubmit'])) {
	$connect = mysqli_connect("localhost", "root", "", "suppressed");
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	$output = fopen("php://output", "w");
	fputcsv($output, array("SKU", "name", "ASIN", "Alert Name", "Alert Type", "Field Name", "Internal Field Name", "Corrected Value", "Explanation", "Last Updated"));
	$query = "SELECT * from suppressed";
	$result = mysqli_query($connect, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		fputcsv($output, $row);
	}
	fclose($output);
}	
//redirect to the listing page
?>