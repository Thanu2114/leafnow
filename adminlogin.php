<?php
include('connection.php');
$msg='';



if($_SERVER["REQUEST_METHOD"] == "POST")
{
   
    $email =mysqli_real_escape_string($con,$_POST["email"]) ;
    $password =mysqli_real_escape_string($con,$_POST["password"]) ; 
    $sql = "SELECT * FROM `admin_panel` where username= '$email' and password='$password'";
    
    $res=mysqli_query($con,$sql);
    $count=mysqli_num_rows($res);
    
    if($count>0)
    {
          $_SESSION['ADMIN_LOGIN']='yes';
          header('location:/compsoft/categories:php');
          die();
    }
    else{
        $msg="please enter valid credentials";
    }
    

   
}
    



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="/script.js"></script>
    <title>login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .btn-danger a {
            text-decoration: none;
            color: white;
        }

        .pass {
            margin: 13px;
        }

        .pass a {
            padding-left: 43px;
        }

        body {
            /* background: #28a745 !important; */
            background:url('/bus.jpg');
            font-family: 'Muli', sans-serif;
            background-size: cover;
        }

        h1 {
            color: #fff;
            padding-bottom: 2rem;
            font-weight: bold;
        }

        a {
            color: #333;
        }

        a:hover {
            color: #E8D426;
            text-decoration: none;
        }

        .form-control:focus {
            color: #000;
            background-color: #fff;
            border: 2px solid #E8D426;
            outline: 0;
            box-shadow: none;
        }

        .btn {
            background: #28a745;
            border: #E8D426;
        }

        .btn:hover {
            background: #28a745;
            border: #E8D426;
        }
        .field_error{
            color:red;
            margin-top:15px;
        }
        .btn1 a{
            color:black;
        }
    </style>
</head>

<body>
    
    <nav class="navibar bg-lightt">
        <div class="container-fluidd">
            <a class="navbar-brand" href="#"><strong>LeafNow</strong></a>

        </div>
        <button class="btn1 btn-lightt"><a href="/compsoft/logout.php">Log out</a></button>
        
    </nav>
    <div class="pt-5">
        <h1 class="text-center"> Login</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card card-body">
                        <form id="submitForm" action="" method="post" data-parsley-validate=""
                            data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1">
                            <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">
                            <div class="form-group required my-3">
                                
                                <input type="email" class="form-control text-lowercase" id="email" 
                                    name="email"  placeholder ="Enter your Email" value="" required>
                            </div>
                            <div class="form-group required my-3">
                                
                                <input type="password" class="form-control text-lowercase" id="password" required=""
                                    name="password"  placeholder ="Enter your password" value="" required>
                            </div>
                            
                            <div class="form-group mt-4 mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember-me" name="remember-me"
                                        data-parsley-multiple="remember-me">
                                    <label clss="custom-control-label" for="remember-me"> Remember me? </label>
                                </div>
                            </div> 
                            <p class="small-xl pt-3">
                            <span class="text-muted"> forgot possword? </span>
                            <a href="/dbms/recover.html"> Click here </a>
                        </p>
                            <div class="form-group pt-1">
                                <button class="btn btn-primary btn-block" type="submit" name="submit">Login</button>
                            </div>
                            
                        </form>
                        <div class=field_error>
                           <?php echo  $msg?>
                        </div>
                        
                       
                        <p class="small-xl pt-3 text-center">
                            <span class="text-muted"> Not a member? </span>
                            <a href="#"> Signup </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

    
</body>
</html>