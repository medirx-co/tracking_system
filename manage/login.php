<?php
ob_start();
session_start();
include_once('../functions/helper_function.php');
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
        <link rel="stylesheet" href="../css/loginform.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


        <title>Tracking Demo</title>
        <style>
            body {
                font-family: Verdana, Geneva, Tahoma, sans-serif;
            }
        </style>
    </head>

    <?php
    if(isset($_REQUEST['username'], $_REQUEST['password'])) {
        $data = [
            'ecode' => $_REQUEST['username'],
            'password' => $_REQUEST['password'],
            'component' => "adminLogin",
        ];
        // $data = implode(',' , $data);
        $headers = array(
            // 'Cookie: PHPSESSID='.session_id(),
        );
    
        
        $response = curlRequest($data);
        // echo "hi";
        $response = json_decode($response);
        if($response->status == 'success') {
            $_SESSION['user'] = $response->result->id;
            $_SESSION['role'] = "Admin";
            header('Location:dashboard.php');
        } else {
            echo "<script>alert('Invalid')</script>";
        }
        // print_r($response->result->id);
    }
        
    
        ?>
    <body>
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            
            <div class="cont col-md-6 col-10 mb-0">        
                <div class="form">
                    <form action="" method="post" id="loginForm">
                        <div class="avatar shadow">
                            <img src="https://res.cloudinary.com/merobusts/image/upload/v1518264117/head-659651_640.png" alt="avatar">
                        </div>
                        <h3 class="text-center mt-5 mb-3 text-primary">Login</h3>
                        <div class="pt-3">
                            <div class="form-group my-3">
                                <label for="" >Enter Emplyoee Code</label>
                                <input type="text"class="form-control mt-1" placeholder="" name="username"/>
                            </div>
                            <div class="form-group my-2">
                                <label for="" >Enter Password</label>
                                <input type="password" class="mt-1 form-control"placeholder="" name="password"/>
                            </div>
                            <div class="text-center mt-3">
                                <button type="button" class="btn btn-warning shadow text-white login" name="login">Login</button>
                            </div>
                        </div>
                        
                    </form>
                </div>    
            </div>
            <footer class="text-center mb-5">
                <small>Powered by</small>
                <p><img src="../images/medirx-logo.png" width="50"></p>
            </footer>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <script>
            var isValid = false;
            $($("[name = 'username']")).blur((e)=>{
                if($("[name = 'username']").val() != "")
                {
                    $("[name = 'username']").css('border', '1px solid #ced4da');
                    
                } else {
                    $("[name = 'username']").css('box-shadow', '0 0 0 0.25rem #ef53504a');
                }
            });
            
            $("[name = 'password']").blur((e)=>{
            if($("[name = 'password']").val() != "") {
                    $("[name = 'password']").css('border', '1px solid #ced4da');
                }else {
                    $("[name = 'password']").css('box-shadow', '0 0 0 0.25rem #ef53504a');
                }
            });
            $('.login').click((e)=>{
                if($("[name = 'username']").val() == "")
                {
                    $("[name = 'username']").css('box-shadow', '0 0 0 0.25rem #ef53504a');
                    
                }
                if($("[name = 'password']").val() == "") {
                    $("[name = 'password']").css('box-shadow', '0 0 0 0.25rem #ef53504a');
                }
                else {
                       // console.log('non-empty');
                       $('#loginForm').submit();
                    }
                });
                // $('#loginForm').on('submit', (e)=>{
                //     e.preventDefault();
                //     if (!isValid) return console.log("Please fill all the required inputs.");
                //     formData = $(e.target).serialize();
                //     // console.log(formData);
                // });
        </script>
    </body>
</html>