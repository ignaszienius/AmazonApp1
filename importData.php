<?php
//load the database configuration file
include 'dbConfig.php';

<<<<<<< HEAD
if(isset($_POST['importSubmit'])){
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            //deletes all records from db table
            $db->query("TRUNCATE suppressed");
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                    //insert data into database
                    $db->query("INSERT INTO suppressed (SKU, name, ASIN, alert_name, alert_type, field_name, internal_name, correct_value, explanation, date_value) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."','".$line[7]."','".$line[8]."','".$line[9]."')");
                    //explode SKU into pieces and update into already created rows
                    $array=explode('-', $line[0]);
                    foreach ($array as $key=>$item) {
                    $db->query("UPDATE suppressed SET SKU".$key." = '".$item."' WHERE ASIN = '".$line[2]."' "); 
                    }
                    //check alert type and fill correct value into db
                    $lol1 = $db->query("SELECT  internal_name FROM suppressed");
                    $array1 =  mysqli_fetch_array($lol1);
                    $lol2 = $db->query("SELECT  SKU1 FROM suppressed");
                    $array2 =  mysqli_fetch_array($lol2);

                    switch ($array1[0]) {
                        case "color_map":
                        switch ($array2[0]) { 
                            case 'white':
                                $db->query("UPDATE suppressed SET correct_value = 'white' WHERE SKU1 = 'white'");
                                break;
                            case 'grey':
                                $db->query("UPDATE suppressed SET correct_value = 'grey' WHERE SKU1 = 'grey'");
                                break;
                            case 'black':
                                $db->query("UPDATE suppressed SET correct_value = 'black' WHERE SKU1 = 'black'");
                                break;
                            case 'red':
                                $db->query("UPDATE suppressed SET correct_value = 'red' WHERE SKU1 = 'white'");
                                break;
                            case 'yellow':
                                $db->query("UPDATE suppressed SET correct_value = 'yellow' WHERE SKU1 = 'white'");
                                break;
                            case 'pink':
                                $db->query("UPDATE suppressed SET correct_value = 'pink' WHERE SKU1 = 'white'");
                                break;
                            case 'dark grey':
                                $db->query("UPDATE suppressed SET correct_value = 'dark grey' WHERE SKU1 = 'white'");
                                break;
                            case 'navy blue':
                                $db->query("UPDATE suppressed SET correct_value = 'navy blue' WHERE SKU1 = 'white'");
                                break;
                            case 'purple':
                                $db->query("UPDATE suppressed SET correct_value = 'purple' WHERE SKU1 = 'white'");
                                break;        
                            default:
                                break;
=======
if(isset($_POST['importSubmit'])) {

	//validate whether uploaded file is a csv file
	$csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
	if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
		if (is_uploaded_file($_FILES['file']['tmp_name'])) {
			//deletes all records from db table
			$db->query("TRUNCATE suppressed");
			//open uploaded csv file with read only mode
			$csvFile = fopen($_FILES['file']['tmp_name'], 'r');
>>>>>>> 4c5ea6ced0831ea005ee2ad3302ec16809bf650b

			//skip first line
			fgetcsv($csvFile);

<<<<<<< HEAD
                        case "color_name":
                        switch ($array2[0]) {
                            case 'white':
                                $db->query("UPDATE suppressed SET correct_value = 'white' WHERE SKU1 = 'white'");
                                break;
                            case 'grey':
                                $db->query("UPDATE suppressed SET correct_value = 'grey' WHERE SKU1 = 'grey'");
                                break;
                            case 'black':
                                $db->query("UPDATE suppressed SET correct_value = 'black' WHERE SKU1 = 'black'");
                                break;
                            case 'red':
                                $db->query("UPDATE suppressed SET correct_value = 'red' WHERE SKU1 = 'white'");
                                break;
                            case 'yellow':
                                $db->query("UPDATE suppressed SET correct_value = 'yellow' WHERE SKU1 = 'white'");
                                break;
                            case 'pink':
                                $db->query("UPDATE suppressed SET correct_value = 'pink' WHERE SKU1 = 'white'");
                                break;
                            case 'dark grey':
                                $db->query("UPDATE suppressed SET correct_value = 'dark grey' WHERE SKU1 = 'white'");
                                break;
                            case 'navy blue':
                                $db->query("UPDATE suppressed SET correct_value = 'navy blue' WHERE SKU1 = 'white'");
                                break;
                            case 'purple':
                                $db->query("UPDATE suppressed SET correct_value = 'purple' WHERE SKU1 = 'white'");
                                break;        
                            default:
                                break;
                        }
                    default:
                        break;
                    }
                }
            }
            
            //close opened csv file
            fclose($csvFile);
=======
			//parse data from csv file line by line
			while (($line = fgetcsv($csvFile)) !== FALSE) {
				//insert data into database
				$db->query("INSERT INTO suppressed (SKU, name, ASIN, alert_name, alert_type, field_name, internal_name, correct_value, explanation, date_value) VALUES ('" . $line[0] . "','" . $line[1] . "','" . $line[2] . "','" . $line[3] . "','" . $line[4] . "','" . $line[5] . "','" . $line[6] . "','" . explode('-', $line[0])[1] . "','" . $line[7] . "','" . $line[8] . "')");
			}
>>>>>>> 4c5ea6ced0831ea005ee2ad3302ec16809bf650b

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