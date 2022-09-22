<?php
ob_start();
session_start();
$msg = $_SESSION['msg'] ?? null;
// print_r($_SESSION);
unset($_SESSION['msg']);
include_once('functions/helper_function.php');

try {
        $pincode = $_REQUEST['pincode'] ?? throw new Exception("Empty");
        $whereClause = "WHERE pincode = $pincode";
        //code...
        $getHq = getRows('`[NUTRITIONAL ADVISOR]`',$whereClause);
        if(isset($_REQUEST['hq'])) {
            $hq = $_REQUEST['hq'];
            $whereClause = "WHERE hq = '".$_REQUEST['hq']."'"; 
            $result = getRows('`[NUTRITIONAL ADVISOR]`',$whereClause);
            // print_r($result);
        } else {
            $pincode = $_REQUEST['pincode'] ?? throw new Exception("Empty");
            $whereClause = "WHERE pincode = $pincode";
            //code...
            $result = getRows('`[NUTRITIONAL ADVISOR]`',$whereClause);

        }
    // print_r($result);
} catch (Throwable $th) {
    //throw $th;
    // print_r($th);
    if ($th->getMessage() == 'Empty') {
        $_SESSION['msg'] = "Please, enter pincode";
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
        <link rel="stylesheet" href="css/advisor.css">
        <link rel="stylesheet" href="css/call.css">

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
                justify-content: center;
                align-items: center;
                z-index: 10000;
                backdrop-filter: brightness(0.5);">
            <img src="image/loader.gif">
        </div>
        <div class="container">
        <div class="logo text-center mt-5">
            <img src="image/Danone-Logo.png" alt="user-profile" width="100">
        </div>
        <h1 class="text-primary mt-5 px-2"><u>Nearest Nutritional Advisor</u></h1>
        <div class="p-3">
            <form action="" method="get">
                <input type="hidden" name="pincode" value="<?php echo $pincode?>">
                <div class="row g-3 align-items-center justify-content-center mt-5">
                    <div class="col-10 col-md-3 form-group">
                        <?php if(!$getHq){?>
                            <h3 for="" class="form-label text-danger text-center"><strong>No Data Found</strong></h3>
                            <p class="text-center text-secondary">Please,wait we are redirecting you..!</p>
                            <p class="text-center"><img src="image/loader.gif"></p>
                       <?php ?>
                            <script type="text/javascript">
                                setTimeout(()=>{
                                    window.history.back(1);
                                }, 3000)
                                </script>
                       <?php     // header("Refresh:0.8; url=search.php");
                    } else { ?>
                        <label for="" class="form-label"><strong>Select Headquater</strong></label>
                        <select class="form-control my-2" name="hq" onchange="this.form.submit()">
                            <option selected disabled>-- select --</option>
                            <?php
                                foreach ($getHq as $row): ?>
                                    <option <?php echo (($_REQUEST['hq'] ?? null) == $row['hq']) ? "selected" : ""?>><?php echo $row['hq'];?></option>
                               <?php endforeach ;?>
                        </select>
                    <?php }?>
                    </div>
                    
                </div>
                
            </form>
        </div>
        <div class="row justify-content-center align-items-center">
            <?php foreach ($result as $row): ?>
                <div class="col-md-4 col-10">
                    <div class="userprofile">
                        <div class="user-profile">
                            <img src="https://res.cloudinary.com/merobusts/image/upload/v1518264117/head-659651_640.png" alt="user-profile" width="90" height="90">                   
                        </div>
                        <h2 class="na_name"><?php echo $row['name']; ?></h2>
                        <div class="text-center">
                            <a href="" class="fs-4"><?php echo $row['mobile']; ?></a>
                        </div>
                        <form>
                            <div class="row justify-content-center align-items-center text-center mt-5">
                                <div class="col-lg-6 col-10">
                                    <a href="tel://<?php echo $row['mobile']; ?>" type="button" class="make_call btn shadow mt-2 mb-4 p-2 w-100 text-success" style="background:#abf6b4;" call_id = <?php echo $row['id']; ?>>
                                        <img src="https://img.icons8.com/fluency-systems-filled/48/40C057/phone.png" width="25" height="25">Make a Call
                                    </a>
                                </div>
                                <div class="col-lg-6 col-10">
                                    <button type="button" class="btn shadow mt-2 mb-4 p-2 w-100 bg-warning request_call" request_call = <?php echo $row['id']; ?>>
                                        <img src="https://img.icons8.com/fluency-systems-filled/48/40C057/phone.png" height="25">Request For Call
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
               
           <?php endforeach; ?>
           
            <div class="text-center mb-5">
                <a class="btn btn-secondary" onclick="history.back(2);">Back</a>            
            </div>
            
        </div>
        
        </div>
        
                <script>
                    $('.make_call').click((e)=>{
                        var id = $(e.target).attr("call_id");
                        // console.log(id);
                        $.ajax({url: "ajax.php?action=call_action&id="+id, 
                            success : (result)=>{
                                window.location.href = 'search.php'
                             },
                            error : (XMLHttpRequest, textStatus, errorThrown) => {
                                console.log(XMLHttpRequest)}
                        });
                    });
                    

                    $('.request_call').click((e)=>{
                        var id = $(e.target).attr("request_call");
                        // console.log(id);
                        $.ajax({url: "ajax.php?action=call_request&id="+id, 
                            success : (result)=>{
                                window.location.href = 'thankyou.php'
                             },
                            error : (response) => {
                                console.log(response);}
                        });
                    });

                    window.onbeforeunload = (()=>{
                        $('.loader').css("display","flex");
                    });
                    window.onload = () => {
                        $('.loader').css("display","none");
                    }
                </script>
    </body>
</html>