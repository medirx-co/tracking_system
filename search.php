<?php ob_start(); ?>
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
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href ="css/loginform.css">

        <!-- Datatable CSS -->
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->



    <title>Tracking Demo</title>
    </head>
    <body>
        <?php
        ?>
        <div class="p-3 pb-5">
            <div class="w-100">
                <img src="/image/1.jpg" alt="" style="width:inherit;">
            </div>
            <div class="content row justify-content-center rounded">
                <div class="form mt-5 col-12 col-md-4">
                    <form action="na_list.php" method="post">
                        <div class="form-group">
                            <input type="number"class="shadow mt-1 form-control border-0" placeholder="Enter Pincode" name="pincode"/>

                        </div>
                        <div class="text-center mt-3">
                            <button class="btn btn-lg btn-warning shadow text-white w-100 form-control"  name="submit"type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>

    

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        <!-- Datatable Js -->
        <!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
        
    </body>
</html>
