<?php
//load the database configuration file
include 'dbConfig.php';

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
                    $db->query("UPDATE suppressed SET SKU".$key." = '".$item."'"); 
                    }
                    //check alert type and fill correct value into db
                    $lol1 = $db->query("SELECT DISTINCT internal_name FROM suppressed");
                    $array1 =  mysqli_fetch_array($lol1);
                    if ($array1[0] == "color_map") {
                        $lol2 = $db->query("SELECT DISTINCT SKU1 FROM suppressed");
                        $array2 =  mysqli_fetch_array($lol2);
                        if ($array2[0] == "black") {
                            $db->query("UPDATE suppressed SET correct_value = 'black'");
                        }
                    }
                }
            }
            
            //close opened csv file
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }


//redirect to the listing page
header("Location: index.php".$qstring);