<?php
ini_set('session.save_path','C:\xampp\tmp');
session_start();
include_once('dbconnection.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!--Bootstrap links-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        hr {
            border: 0;
            clear: both;
            display: block;
            width: 96%;
            background-color: grey;
            height: 1px;
        }
    </style>
</head>
<body style="padding-top: 5em;">
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="searchform.php">WWIIS - Challenge</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="searchform.php">Search Quotes</a></li>
                    </ul>
                </div>
            </div>
        </nav>
<div class="container">

        <h2>Search Quotes:</h2>
<hr>
    

    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
      <div class="form-row">
            <div class="form-group col-md-6">
                <label for="medicalCondition1">Medical Condition 1:</label>
                <input type="text" class="form-control" name="medicalCondition1" id="medicalCondition1" placeholder="Medical condition 1">
            </div>
            <div class="form-group col-md-6">
                <label for="medicalCondition2">Medical Condition 2:</label>
                <input type="text" class="form-control" name="medicalCondition2"  id="medicalCondition2" placeholder="Medical condition 2">
            </div>
        </div>

        <div class="form-group col-md-6">
            <label for="inputExclusion">Exclusions:</label>
            <select class="form-control" name="anyExclusion" id="anyExclusion">
                <option value=""></option>
                <option value="Yes">Yes</option>
                <option value="None">None</option>
            </select></div>
        
        
        <div class="form-group col-md-6">
                <label for="medicalCondition3">Medical Condition 3:</label>
                <input type="text" class="form-control" name="medicalCondition3"  id="medicalCondition3" placeholder="Medical condition 3">
            </div>

        <hr>

        <div class="form-group col-md-3">
            <label for="inputProduct">Product</label>
            <select class="form-control" name="product" id="product">
                <option value=""></option>
                <option value="Lakeland">Lakeland</option>
                <option value="Island">Island</option>
            </select></div>
        
        <div class="form-group col-md-3">
            <label for="inputClass">Travel Class</label>
            <select class="form-control" id="travelClass" name="travelClass">
                <option value=""></option>
                <option value="AMT">AMT</option>
                <option value="Single Trip">Single Trip</option>
            </select></div>
        
        <div class="form-group col-md-3">
            <label for="inputType">Travel Type</label>
            <select class="form-control" id="travelType" name="travelType">
                <option value=""></option>
                <option value="Couple">Couple</option>
                <option value="Group">Group</option>
                <option value="Family1">Family 1</option>
                <option value="Family2">Family 2</option>
                <option value="Family3">Family 3</option>
            </select></div>
    
        <div class="form-group col-md-3">
            <label for="coverArea">Cover Area</label>
            <select class="form-control" id="coverArea" name="coverArea">
                <option value=""></option>
                <option value="Area 1">Area 1</option>
                <option value="Area 2">Area 2</option>
                <option value="Area 3">Area 3</option>
                <option value="Area 4">Area 4</option>
                <option value="Area 5">Area 5</option>
            </select>
            </div>
        
        
        <div class="form-row">
        <div class="form-group col-md-4">
            <label for="affiliate">Affiliate</label>
            <select class="form-control" id="affiliate" name="affiliate">
                <option value=""></option>
                <option value="Baikal">Baikal</option>
                <option value="Malawi">Malawi</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Dalmation">Dalmation</option>
                <option value="Loch lomond">Loch lomond</option>
                <option value="Tanganyika">Tanganyika</option>
                <option value="Palawan">Palawan</option>
            </select>
           </div>
        </div>
        <hr>
        <div class="row">
        <div class="form-row">
        <div class="text-center">
            <input type="submit" class="btn btn-primary" name="btn-Search"/>
            </div>
        </div>
        </div>
    </form>
    <hr>
    <div class="row">
<table class="table table-striped">
            <thead>
            <tr>
                <th>Quote number</th>
                <th>Quote Date</th>
                <th>Product</th>
                <th>Affiliate</th>
                <th>Travel Class</th>
                <th>Travel Type</th>
                <th>Cover Area</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
            </thead>
            <tbody>
          
         
            
<?php

$per_page=15;
if (isset($_GET['page'])) {

    $page = $_GET['page'];

}

else {

    $page=1;

}

// Page will start from 0 and Multiple by Per Page
$start_from = ($page-1) * $per_page;
    
    $medicalCondition1 = '';
    $medicalCondition2 = '';
    $medicalCondition3 = '';
    $anyExclusion = '';
    $product = '';
    $travelClass = '';
    $travelType = '';
    $coverArea = '';
    $affiliate = '';


    if (isset($_GET['medicalCondition1'])){
    $medicalCondition1 = mysqli_escape_string($conn, $_GET['medicalCondition1']);
    }

    if (isset($_GET['medicalCondition2'])){
    $medicalCondition2 = mysqli_escape_string($conn, $_GET['medicalCondition2']);
    }

    if (isset($_GET['medicalCondition3'])){
    $medicalCondition3 = mysqli_escape_string($conn, $_GET['medicalCondition3']);
    }

    if (isset($_GET['anyExclusion'])){
    $anyExclusion = mysqli_escape_string($conn, $_GET['anyExclusion']);
    }

    if (isset($_GET['product'])){
    $product = mysqli_escape_string($conn, $_GET['product']);

    }

    if (isset($_GET['travelClass'])){
    $travelClass = mysqli_escape_string($conn, $_GET['travelClass']);
  
    }

    if (isset($_GET['travelType'])){
    $travelType = mysqli_escape_string($conn, $_GET['travelType']);

    }

    if (isset($_GET['coverArea'])){
    $coverArea = mysqli_escape_string($conn, $_GET['coverArea']);
  
    }

    if (isset($_GET['affiliate'])){
    $affiliate = mysqli_escape_string($conn, $_GET['affiliate']);
 
    }
    
    $sql = "SELECT q.* FROM wwiis_technical_challenge_quotes q JOIN wwiis_technical_challenge_medical m ON m.quote_number = q.quote_number WHERE ExtractValue(medical_xml, '/Screening/ScreeningPath/ScreeningHistory/conditions/Condition/name') = '$medicalCondition1'";
    
    $stmt = "SELECT q.* FROM wwiis_technical_challenge_quotes q JOIN wwiis_technical_challenge_medical m ON m.quote_number = q.quote_number WHERE ExtractValue(medical_xml, '/Screening/ScreeningPath/ScreeningHistory/conditions/Condition/name') = '$medicalCondition1'";

    if ($medicalCondition2 != ""){

        $sql .= " OR ExtractValue(medical_xml, '/Screening/ScreeningPath/ScreeningHistory/conditions/Condition/name') = '$medicalCondition2'";
        $stmt .= " OR ExtractValue(medical_xml, '/Screening/ScreeningPath/ScreeningHistory/conditions/Condition/name') = '$medicalCondition2'";
        
    }

    if ($medicalCondition3 != ""){

        $sql .= " AND ExtractValue(medical_xml, '/Screening/ScreeningPath/ScreeningHistory/conditions/Condition/name') = '$medicalCondition3'";
        $stmt .= " AND ExtractValue(medical_xml, '/Screening/ScreeningPath/ScreeningHistory/conditions/Condition/name') = '$medicalCondition3'";
        
    }
    
    if ($anyExclusion != ""){

        $sql .= " AND ExtractValue(medical_xml, '/Screening/ScreeningPath/ScreeningHistory/conditions/Condition/exclusionType') = '$anyExclusion'";
        $stmt .= " AND ExtractValue(medical_xml, '/Screening/ScreeningPath/ScreeningHistory/conditions/Condition/exclusionType') = '$anyExclusion'";
    }
    
    if ($product != ""){

        $sql .= " AND q.product = '$product'";
        $stmt .= " AND q.product = '$product'";
        //echo $sql;
        
    }

    if ($travelClass != ""){

        $sql .= " AND q.travel_class = '$travelClass'";
        $stmt .= " AND q.travel_class = '$travelClass'";
    }

    if ($travelType != ""){

        $sql .= " AND q.travel_type = '$travelType'";
    }

    if ($coverArea != ""){

        $sql .= " AND q.cover_area = '$coverArea'";
        $stmt .= " AND q.cover_area = '$coverArea'";
    }

    if ($affiliate != ""){

        $sql .= " AND q.affiliate = '$affiliate'";
        $stmt .= " AND q.affiliate = '$affiliate'";
    }
    
    $sql .= "LIMIT $start_from, $per_page";

    
    //$stmt = "SELECT q.* FROM wwiis_technical_challenge_quotes q JOIN wwiis_technical_challenge_medical m ON m.quote_number = q.quote_number WHERE (ExtractValue(medical_xml, '/Screening/ScreeningPath/ScreeningHistory/conditions/Condition/name') = '$medicalCondition1' or ExtractValue(medical_xml, '/Screening/ScreeningPath/ScreeningHistory/conditions/Condition/name') = '$medicalCondition2' or ExtractValue(medical_xml, '/Screening/ScreeningPath/ScreeningHistory/conditions/Condition/name') = '$medicalCondition3' and ExtractValue(medical_xml, '/Screening/ScreeningPath/ScreeningHistory/conditions/Condition/exclusionType') = '$anyExclusion') or (q.product = '$product' and q.travel_type = '$travelType' and q.travel_class = '$travelClass' and q.cover_area = '$coverArea' and q.affiliate = '$affiliate')";

    $res = $conn->query($stmt);

    //$sql = "SELECT q.* FROM wwiis_technical_challenge_quotes q JOIN wwiis_technical_challenge_medical m ON m.quote_number = q.quote_number WHERE (ExtractValue(medical_xml, '/Screening/ScreeningPath/ScreeningHistory/conditions/Condition/name') = '$medicalCondition1' or ExtractValue(medical_xml, '/Screening/ScreeningPath/ScreeningHistory/conditions/Condition/name') = '$medicalCondition2' or ExtractValue(medical_xml, '/Screening/ScreeningPath/ScreeningHistory/conditions/Condition/name') = '$medicalCondition3' and ExtractValue(medical_xml, '/Screening/ScreeningPath/ScreeningHistory/conditions/Condition/exclusionType') = '$anyExclusion') or (q.product = '$product' and q.travel_type = '$travelType' and q.travel_class = '$travelClass' and q.cover_area = '$coverArea' and q.affiliate = '$affiliate') LIMIT $start_from, $per_page";

            $result = $conn->query($sql);
            if (!$result) {
            trigger_error('Invalid query: ' . $conn->error);
             }
            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['quotenumber'] = $row['quote_number'];
            ?>
        
            <tr>
                        <td><?php echo $row['quote_number']; ?></td>
                        <td><?php echo $row['quote_date'] ?></td>
                        <td><?php echo $row['product'] ?></td>
                        <td><?php echo $row['affiliate'] ?></td>
                        <td><?php echo $row['travel_class'] ?></td>
                        <td><?php echo $row['travel_type'] ?></td>
                        <td><?php echo $row['cover_area'] ?></td>
                        <td><?php echo $row['start_date'] ?></td>
                        <td><?php echo $row['end_date'] ?></td>
             </tr>
    <?php          } 
            }
            
            
            else   { ?>
                <tr><td>No Records Found!</td></tr>
    <?php   }
           
             
           ?>
         </tbody>
         </table>

    </div>
</div>

<div class="row">
<div class="text-center">
<ul class="pagination">
    <?php

    // Count the total records
    $total_records = mysqli_num_rows($res);

    //Using ceil function to divide the total records on per page
    $total_pages = ceil($total_records / $per_page);
   
    //Going to first page
    if(isset($_GET['page']) != 1) {
        echo '<li><a href="searchform.php?page=1&medicalCondition1='.$medicalCondition1.'&medicalCondition2='.$medicalCondition2.'&medicalCondition3='.$medicalCondition3.'&product='.$product.'&anyExclusion='.$anyExclusion.'&travelClass='.$travelClass.'&travelType='.$travelType.'&coverArea='.$coverArea.'&affiliate='.$affiliate.'">First Page</a></li> ';
    }
    for ($i=1; $i<=$total_pages; $i++) {

        echo '<li><a href="searchform.php?page='.$i.'&medicalCondition1='.$medicalCondition1.'&medicalCondition2='.$medicalCondition2.'&medicalCondition3='.$medicalCondition3.'&product='.$product.'&anyExclusion='.$anyExclusion.'&travelClass='.$travelClass.'&travelType='.$travelType.'&coverArea='.$coverArea.'&affiliate='.$affiliate.'">'.$i.'</a></li>';
    }
    // Going to last page
    echo '<li><a href="searchform.php?page='.$total_pages.'&medicalCondition1='.$medicalCondition1.'&medicalCondition2='.$medicalCondition2.'&medicalCondition3='.$medicalCondition3.'&product='.$product.'&anyExclusion='.$anyExclusion.'&travelClass='.$travelClass.'&travelType='.$travelType.'&coverArea='.$coverArea.'&affiliate='.$affiliate.'">Last Page</a></li> ';
    ?>

</ul>
</div>

</div>

<hr>
<div class="row">
    <div class="col-sm-12">
        <footer>
        </footer>
    </div>
</div>
</body>
</html>