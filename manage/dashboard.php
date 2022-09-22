<?php
include_once('../functions/helper_function.php');
session_start();
if($_SESSION['role'] == 'Admin') {
if(isset($_REQUEST['id'])) {
    $data = [
        'id' => $_REQUEST['id'],
        'component' => "detail_call",
    ];
        $response1 = curlRequest($data);
        $headers = array(
            // 'Cookie: PHPSESSID='.session_id(),
        );
        $response1 = json_decode($response1);
        if($response1->status == 'success') {
            // $_SESSION['user'] = $response->result->id;
            // print_r($response1->result);
            // header('Location:call_list.php');
        } else {
            echo "<script>alert('Invalid')</script>";
        }
    } 

        $data = ['component' => "all_records"];
        $response2 = curlRequest($data);
        $headers = array(
        // 'Cookie: PHPSESSID='.session_id(),
        );
        $response2 = json_decode($response2);
        if($response2->status == 'success') {
            // $_SESSION['user'] = $response->result->id;
            // print_r($response2->result);
            // header('Location:call_list.php');
        } else {
            echo "<script>alert('Invalid')</script>";
        }
    
        $urlVisit = ['component' => "url_visit"];
        $urlVisitReposne = curlRequest($urlVisit);
        $headers = array(
        // 'Cookie: PHPSESSID='.session_id(),
        );
        $urlVisitReposne = json_decode($urlVisitReposne);
        if($urlVisitReposne->status == 'success') {
            // $_SESSION['user'] = $response->result->id;
            // print_r($urlVisitReposne->result);
            // header('Location:call_list.php');
        } else {
            echo "<script>alert('Invalid')</script>";
        }

        $chemistCount = ['component' => "chemistCount"];
        $chemistCountReposne = curlRequest($chemistCount);
        $headers = array(
        // 'Cookie: PHPSESSID='.session_id(),
        );
        $chemistCountReposne = json_decode($chemistCountReposne);
        if($chemistCountReposne->status == 'success') {
            // $_SESSION['user'] = $response->result->id;
            // print_r($urlVisitReposne->result);
            // header('Location:call_list.php');
        } else {
            echo "<script>alert('Invalid')</script>";
        }
    // print_r($response->result->id);

    
       $callRecords = ['component' => "allCallRecords"];
        $callRecordResult = curlRequest($callRecords);
        $headers = array(
        // 'Cookie: PHPSESSID='.session_id(),
        );
        $callRecordResult = json_decode($callRecordResult);
        if($callRecordResult->status == 'success') {
            // $_SESSION['user'] = $response->result->id;
            // print_r($callRecordResult->result);
            // header('Location:call_list.php');
        } else {
            echo "<script>alert('Invalid')</script>";
        }

} else {
    header('Location:login.php');
}
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="" href="../fonts/css/font-awesome.min.css">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <!-- Bootstrap Icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        
        <!-- Datatable CSS -->
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Custom CSS -->
       <link rel="stylesheet" href="../css/dashboard.css">
        
       <title>Tracking Demo</title>
    </head>
    <body>
    <div class="loader"
        style="position: fixed;
                top: 0;
                left: 0;
                right: 0;
                botom: 0;
                bottom: 0;
                margin: auto;
                justify-content: center;
                align-items: center;
                z-index: 10000;
                backdrop-filter: brightness(0.5);">
            <img src="../image/loader.gif">
        </div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark shadow">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                    <h5 class="px-2">Logo</h5>
                <!-- <img src="image/Danone-Logo.png" alt="" width="80"> -->
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-md-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Analysis</a>
                  </li> -->
                  <li class="nav-item mx-2">
                    <a class="nav-link text-light" href="#">Export</a>
                  </li>
                  <li class="nav-item float-right">
                    <a class="navbar-link btn btn-light" href="../logout.php?xyiudyd" style="vertical-align:sub"><img src="https://img.icons8.com/sf-black-filled/64/228BE6/shutdown.png" alt="" width="30"> Log Out</a>
                  </li>    
                </ul>
              </div>
            </div>
          </nav>
        <section>
            <div class="row justify-content-around align-items-center m-5">

                <div class="col-md-3 col-12 mt-3 border border-danger shadow border-3" style="height: 120px;">
                    <div class="row align-items-center mt-4">
                        <div class="col-6">
                              
                            <h4 class="text-danger px-2 text-bold m-0"><?php echo $urlVisitReposne->result[0]->url_visit?></h4>  
                            <h6 class="text-danger px-2 m-0">URL Visited</h6>
                        </div>
                        <div class="col-6 text-end">
                            <h4 class="text-danger p-2 shadow" style="background-color: red; display: inline-block">
                                <i class="fa fa-link text-white" aria-hidden="true"></i>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12 mt-3 shadow bg-white rounded border border-info border-3" style=" height: 120px;background: #7aff8091;">
                    <div class="row align-items-center mt-4">
                        <div class="col-6">
                            <h4 class="text-info px-2 bg-white text-bold m-0"><?php echo $callRecordResult->result[0]->call_request ?></h4>    
                            <h6 class="text-info px-2 m-0">Call Requests</h6>
                        </div>
                        <div class="col-6 text-end">
                            <h4 class="text-primary p-2 shadow bg-info" style="display: inline-block">
                                <i class="fa fa-phone text-white" aria-hidden="true"></i>
                            </h4>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-12 mt-3 border border-warning border-3 shadow" style="height: 120px;">
                    <div class="row align-items-center mt-4">
                        <div class="col-6">
                            <h4 class="text-warning px-2 text-bold m-0"><?php echo $callRecordResult->result[0]->call_back ?></h4>    
                            <h6 class="text-warning px-2 m-0">Call Back</h6>
                        </div>
                        <div class="col-6 text-end">
                            <h4 class="text-warninng bg-warning p-2 shadow" style="background-color: green; display: inline-block">
                                <i class="fa fa-phone text-white" aria-hidden="true"></i>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Table Start -->
            
                
                    <!-- Grid row -->
                    <div class="row my-3 justify-content-center">
                        <div class="col-md-3 col-10 card shadow m-2">
                            <canvas id="myChart"></canvas>    
                        </div>
                        <div class="col-md-7 col-10 card shadow m-2">
                            <canvas id="myChart2"></canvas>    
                        </div>
                    </div>
                    <div class="card-body row justify-content-center mt-5">
                        <div class="table-responsive col-md-10 col-11">
                            <h5 class="pb-3"><u>Call Records</u></h5>
                            <table id="myTable" class="table table-hover table-bordered table-responsive-sm">
                                <thead class="bg-dark text-dark">
                                    <tr>
                                        <th class="text-white">S.No.</th>
                                        <th class="text-white">NA Name</th>
                                        <th class="text-white">Call Requests</th>
                                        <th class="text-white">Calls (by chemist)</th>
                                        <th class="text-white">Call Back    </th>
                                        <th class="text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($response2->result as $index => $row) {
                                            # code...
                                        
                                    ?>
                                    <tr>
                                        <td><?php echo ++$index; ?></td>
                                        <td class="text-center"><?php echo $row->nutrition_advisor_name; ?></td>
                                        <td class="text-center"><?php echo $row->call_back_requests; ?></td>
                                        <td class="text-center"><?php echo $row->direct_calls; ?></td>
                                        <td class="text-center"><?php echo $row->call_back_responses; ?></td>
                                        <td class="text-center"><a href="dashboard.php?id=<?php echo $row->na_id; ?>"><i class="fa fa-eye text-primary fw-bold"></i></a></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="card-body row justify-content-center mt-5">
                            <div class="table-responsive col-md-10 col-11">
                            <?php if(isset($_REQUEST['id'])): ?>
                            <table id="myTable" class="table table-hover table-bordered table-responsive-sm my-5">
                                <thead class="bg-light text-dark">
                                    <tr>
                                        <th class="text-dark">S.No.</th>
                                        <th class="text-dark">Chemist Name</th>
                                        <th class="text-dark">Call By Chemist</th>
                                        <th class="text-dark">Call Requests</th>
                                        <th class="text-dark">Call Back By NA</th>
                                        <!-- <th class="text-white">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($response1->result as $index => $row) {
                                            # code...
                                        
                                    ?>
                                    <tr>
                                        <td><?php echo ++$index; ?></td>
                                        <td class="text-center"><?php echo $row->chemist_name; ?></td>
                                        <td class="text-center"><?php echo $row->date_of_call; ?></td>
                                        <td class="text-center"><?php echo $row->date_of_call_request; ?></td>
                                        <td class="text-center"><p class="<?php echo ($row->call_back_date) ?? "text-danger fw-bold"; ?>"><?php echo ($row->call_back_date) ?? "No Reposne"; ?></p></td>
                                        <!-- <td class="text-center"><a href="dashboard.php?id=<?php //echo $row->na_id; ?>"><i class="fa fa-eye text-primary fw-bold"></i> </a> <i class="fa fa-trash text-danger fw-bold"></i></td> -->
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            <?php endif; ?>
                            </div>
                    </div>
                </div>
            </section>  
        <!-- Table End -->



        <!-- Javascript Start -->
           
            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            
            <!-- Datatable Js -->
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
           

        <!-- Javascript End -->
    
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

<script>
const ctx = document.getElementById('myChart').getContext('2d');
const ctx2 = document.getElementById('myChart2').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['URL Not visit', 'URL Visited'],
        
        datasets: [{
            label: 'SMS Cmapgin Data',
            data: [<?php echo($chemistCountReposne->result[0]->chemist - $urlVisitReposne->result[0]->url_visit); ?>, <?php echo $urlVisitReposne->result[0]->url_visit?>],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                // 'rgba(255, 206, 86, 1)',
            ],
        }]
    },
    options: {
        responsive : true,
    }
});

const myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: ['Call Direct', 'Call Request', 'Call Back'],
        
        datasets: [{
            axis: 'x',
            label: 'My First Dataset',
            fill: false,
            data: [<?php echo $callRecordResult->result[0]->call_by_chemist ?>, <?php echo $callRecordResult->result[0]->call_request ?>, <?php echo $callRecordResult->result[0]->call_back ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
            ],
        }]
    },
    options: {
        responsive : true,
        indexAxis: 'y',
        // scales: {
        //     xAxes: [{
        //         maxBarThickness: 3,
        //         barPercentage: 0.5, // number (pixels)
                
        //     }]
        // },
        barThickness: 15,  // number (pixels) or 'flex'

    }
});

</script>
<script>
    $(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
<script>
    window.onbeforeunload = (()=>{
                $('.loader').css("display","flex");
            });
            window.onload = () => {
                $('.loader').css("display","none");
            }
</script>
    </body>
</html>