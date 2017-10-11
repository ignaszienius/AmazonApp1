<?php
//load the database configuration file
include 'dbConfig.php';

if(isset($_POST['importSubmit'])) {

<<<<<<< HEAD
                    
                    switch ($array1[0]) {
                        case "color_map":
                        switch ($array2[0]) { 
                            case 'white':
                                $db->query("UPDATE suppressed SET correct_value = 'white'");
                                break;
                            case 'grey':
                                $db->query("UPDATE suppressed SET correct_value = 'grey'");
                                break;
                            case 'black':
                                $db->query("UPDATE suppressed SET correct_value = 'black'");
                                break;
                            case 'red':
                                $db->query("UPDATE suppressed SET correct_value = 'red'");
                                break;
                            case 'yellow':
                                $db->query("UPDATE suppressed SET correct_value = 'yellow'");
                                break;
                            case 'pink':
                                $db->query("UPDATE suppressed SET correct_value = 'pink'");
                                break;
                            case 'dark grey':
                                $db->query("UPDATE suppressed SET correct_value = 'dark grey'");
                                break;
                            case 'navy blue':
                                $db->query("UPDATE suppressed SET correct_value = 'navy blue'");
                                break;
                            case 'purple':
                                $db->query("UPDATE suppressed SET correct_value = 'purple'");
                                break;       
                            default:
                                break;
=======
	//validate whether uploaded file is a csv file
	$csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
	if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
		if (is_uploaded_file($_FILES['file']['tmp_name'])) {
			//deletes all records from db table
			$db->query("TRUNCATE suppressed");
			//open uploaded csv file with read only mode
			$csvFile = fopen($_FILES['file']['tmp_name'], 'r');
>>>>>>> 76e2ec0e175ba8014787254f6b9fa4bf4064be81

			//skip first line
			fgetcsv($csvFile);


			//parse data from csv file line by line
			while (($line = fgetcsv($csvFile)) !== FALSE) {
				//insert data into database
				$db->query("INSERT INTO suppressed (SKU, name, ASIN, alert_name, alert_type, field_name, internal_name, correct_value, explanation, date_value) VALUES ('" . $line[0] . "','" . $line[1] . "','" . $line[2] . "','" . $line[3] . "','" . $line[4] . "','" . $line[5] . "','" . $line[6] . "','" . explode('-', $line[0])[1] . "','" . $line[7] . "','" . $line[8] . "')");
			}

			//close opened csv file
			fclose($csvFile);

			$status = 'succ';
		} else {
			$status = 'err';
		}
	} else {
		$status = 'invalid_file';
	}

}
//redirect to the listing page
header("Location: index.php?status=".$status);
