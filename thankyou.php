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
       <link rel="stylesheet" href="css/thankyou.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
       <title>Tracking Demo</title>
       <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background: rgba(230, 230, 230, 0.821);
        }
    </style>

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
        <div class="logo mb-2 mt-1 mx-1">
            <img src="image/Danone-Logo.png" alt="logo" width="90" height="60">
        </div>
        <div class="row justify-content-center align-items-center m-5">
            <div class="col-md-6">
                <div class="card mt-5" style="background-image: linear-gradient(to right,#13278ff0,#0f7a9b);border:none ;">
                    <div class="row justify-content-center align-items-center mt-5">
                        <div class="col-6 text-center">
                            <img src="image/icons8-done.gif" alt="" width="90" height="90">
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center mt-4">
                        <div class="col-6">
                            <h1 class="text-center text-white">Thank You</h1>
                            <p>We will get back to you soon !</p>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-secondary" onclick="history.back(2);">Back</button>            
        </div>
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