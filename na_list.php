<?php
ob_start();
session_start();
$msg = $_SESSION['msg'] ?? null;
unset($_SESSION['msg']);
// print_r($_REQUEST);
include_once('functions/helper_function.php');
try {
    $pincode = $_POST['pincode'] ?? throw new Exception("Empty");
    $whereClause = "WHERE pincode = $pincode";
    //code...
    $result = getRows('nutrition_advisor',$whereClause);
} catch (Throwable $th) {
    //throw $th;
    // print_r($th);
    if ($th->getMessage() == 'Empty') {
        $_SESSION['msg'] = "Please, enter pincode";
        // echo "<script>alert('error')</script>";
         header('Location:search.php');
    }
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
            <img src="image/loader.gif">
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <a class="" href="#"><img src="image/shutdown.png" alt="" style="float:right;" width="45" height="45"></a>                
                <h4 class="carde-title text-center mt-3">Nearest Nutritional Advisor</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php
                                if(empty($result)): ?>
                                    <h1>No Nutritional Advisor is availabe at this <b style = 'color: blue'><?php echo  $pincode ?><b></h1>
                               <?php endif;
                            ?>
                            <table class="table hover-table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Mobile No.</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jill</td>
                                        <td>Smith</td>
                                        <td>
                                            <a href="tel://9561788670"><img src="https://img.icons8.com/fluency-systems-filled/48/40C057/phone.png" width="35" height="35">7875745246</a>
                                        </td>
                                        <td class="action">
                                            <div>
                                                <a href=""><button class="btn btn-sm shadow" style="width:auto; background:#abf6b4;">Request For Call</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jill</td>
                                        <td>Smith</td>
                                        <td>
                                            <a href="tel://9561788670"><img src="https://img.icons8.com/fluency-systems-filled/48/40C057/phone.png" width="35" height="35">7875745246</a>
                                        </td>
                                        <td class="action">
                                            <div>
                                                <a href=""><button class="btn btn-sm shadow" style="width:auto; background: #abf6b4;">Request For Call</button></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        
                        </div>
                    </div>
                
            </div>
        </div>
        
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