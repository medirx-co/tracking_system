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
        <link rel="stylesheet" href="css/loginform.css">




        <title>Tracking Demo</title>
        <style>
            body {
                font-family: Verdana, Geneva, Tahoma, sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="row justify-content-center align-items-center mt-5" style="height: 100vh">
            
            <div class="shadow col-md-6 col-8 mb-0 p-3">        
                <div class="form">
                    <form action="" method="">
                        <h3 class="text-center mt-3 mb-3 text-dark">Have you called back ?</h3>
                        <div class="pt-3">
                            <div class="row justify-content-center align-items-center mx-4">
                                <div class="col-8 text-center">
                                    <button class="btn btn-success shadow text-white" type="submit">Yes</button>
                                    <button class="btn btn-danger shadow text-white" type="button" onclick="myFunction()">No</button>
                                </div>
                            </div>
                            <div class="form-group" id="myDIV" style="display: none;">
                                <label for="" >Reason(optional)</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                    </form>
                    <form action="">
                        <div class="text-center mt-3">
                            <input class="btn btn-warning shadow text-white" type="submit">
                        </div>
                    </form>
                </div>    
            </div>
            <!-- <footer class="text-center mb-5">
                <small>Powered by</small>
                <p><img src="images/medirx-logo.png" width="50"></p>
            </footer> -->
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        <script>
            function myFunction() {
                var x = document.getElementById("myDIV");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
        
    </body>
</html>