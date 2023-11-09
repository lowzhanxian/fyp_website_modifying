<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CH SC | ADMIN</title>
    <link rel="icon" type="image/x-icon" href="images/title.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/adminDashBoard.css">
    <link rel="stylesheet" href="css/CourtList.css">
    <?php include 'admin_header.php';?>

</head>
<body onload="realtime()">
    <div class="backDiv">
        <a href="admin_Facilities.php">Back</a>
    </div>
    
    <?php
        $dbc=mysqli_connect("localhost","root","");
        mysqli_select_db($dbc,"sport");
        if (isset($_GET['courtType'])) {
            $courtTypeRetrieve = $_GET['courtType'];
        $courtTypeRetrieve = $_GET['courtType'];

        $query = mysqli_query($dbc,"SELECT * FROM facilities WHERE courtType = '$courtTypeRetrieve'");
                   
        echo"<div class=\"listingproduct-section\">";
            while (($row1 = $query->fetch_assoc()) )
                {
                    $courtNumber= $row1['courtNumber'];
                    $facId= $row1['facilityID'];
                   
                    $status = $row1['status'];

                   
                    echo'<div class="card">
                            <a href="CourtDetailsEdit.php?courtType='.$courtTypeRetrieve.'&courtNumber='.$courtNumber.'&facilityID='.$facId.'">
                                <div class="card-content">
                                    <div class="container text-center">
                                        <div class="row">
                                            <div class="col">
                                               <h5>Court Number: <h3>'.$courtNumber.'</h3></h5>
                                            </div>
                                            
                                            <div class="col">
                                                <h5>Status: <h3>'.$status.'</h3></h5>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </a>
                           
                        </div>';
                }
                    echo"</div>";
                }
                else {
                    echo "The 'courtType' parameter is not set in the URL.";
                }



            

    ?>

       
    </div>
</body>