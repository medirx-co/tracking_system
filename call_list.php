<?php
session_start();
unset($_SESSION["msg"]);
// print_r($_SESSION);
$id = $_SESSION['user'];
include_once('functions/helper_function.php');
$data = [
    'component' => 'call_list',
    'id' => $id
];

// print_r($data);
$response = curlRequest($data);
$response = json_decode($response);
if($response->status == 'success') {
    // header('Location: call_list.php');
} else {
    echo "<script>alert('Invalid')</script>";
}

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <!-- Bootstrap Icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <!-- Custom CSS -->
        
        <link rel="stylesheet" href="css/call.css">
        
        <!-- Datatable CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



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
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 10000;
                backdrop-filter: brightness(0.5);">
            <img src="image/loader.gif">
        </div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark shadow fixed">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"><img src="../image/Danone-Logo.png" class="bg-white" alt="" width="80"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-md-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="call_list.php">Call List</a>
                  </li>
                  <li class="nav-item float-right">
                    <a class="navbar-link" href="logout.php" style="vertical-align:sub"><img src="image/shutdown.png" alt="" width="30"></a>
                  </li>    
                </ul>
              </div>
            </div>
          </nav>

        
            

                   
          <div class="px-4 my-5">
            <div class="row">                
                   <div class="col-12">
                        <div class="table-responsive shadow">
                            <table id="myTable" class="table table-responsive-sm" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Chemist Name</th>
                                        <th>Contact Number</th>
                                        <th>Call Request</th>
                                        <th>Call Back Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($response->result as $index => $row):?>
                                            <tr>
                                                <td><?php echo ++$index;?></td>
                                                <td><?php echo $row->chemist_name?></td>
                                                <td><a href="tel://<?php echo ($row->mobile)?>"><i class="bi bi-telephone <?php echo ($row->mobile) ? "text-success" : "d-none"?>"></i> <?php echo $row->mobile?></a></td>
                                                <td><?php echo $row->date_of_call_request?></td>
                                                <td class="<?php echo ($row->call_back_date) ?? "text-danger fw-bold"  ?>"><?php echo ($row->call_back_date) ?? "No Call Back"  ?></td>
                                                <td>
                                                    <div>
                                                        <a href="call_back_form.php?id=<?php echo $row->id; ?>"><i class="bi bi-eye"></i></a>
                                                    </div>
                                                </td>
                                            </tr>                                        
                                       <?php endforeach;
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                   </div>
                
            </div>
        </div>
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
        <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        <!-- Datatable Js -->
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        
    </body>
</html>