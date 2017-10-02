<?php
//load the database configuration file
include 'dbConfig.php';

if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'CSV report has been inserted successfully.';
            break;
        case 'err':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
}
?>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>
<div class="container-fluid">
    <?php if(!empty($statusMsg)){
        echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
    } ?>
    <div class="card">
        <div class="card-header">
            <h1>CSV import</h1>
        </div>
        <div class="card-body">
            <form action="importData.php" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                      <th>SKU</th>
                      <th>SKU0</th>
                      <th>SKU1</th>
                      <th>SKU2</th>
                      <th>SKU3</th>
                      <th>Product name</th>
                      <th>ASIN</th>
                      <th>Alert name</th>
                      <th>Alert type</th>
                      <th>Field Name</th>
                      <th>Internal Field Name</th>
                      <th>Corrected Value</th>
                      <th>Explanation</th>
                      <th>Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //get records from database
                    $query = $db->query("SELECT * FROM suppressed ORDER BY SKU DESC");
                    if($query->num_rows > 0){ 
                        while($row = $query->fetch_assoc()){ ?>
                    <tr>
                      <td><?php echo $row['SKU']; ?></td>
                      <td><?php echo $row['SKU0']; ?></td>
                      <td><?php echo $row['SKU1']; ?></td>
                      <td><?php echo $row['SKU2']; ?></td>
                      <td><?php echo $row['SKU3']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['ASIN']; ?></td>
                      <td><?php echo $row['alert_name']; ?></td>
                      <td><?php echo $row['alert_type']; ?></td>
                      <td><?php echo $row['field_name']; ?></td>
                      <td><?php echo $row['internal_name']; ?></td>
                      <td><?php echo $row['correct_value']; ?></td>
                      <td><?php echo $row['explanation']; ?></td>
                      <td><?php echo $row['date_value']; ?></td>
                    </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="14">No records found...</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>