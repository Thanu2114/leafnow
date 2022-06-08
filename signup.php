<?php
include("connection.php");



$msg ="";
$passworderror="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    
    $username = $_POST["username"];
    $email=$_POST['email'];
    $phno=$_POST['phno'];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $sql="Select * from user where email= '$email'";
    $result= mysqli_query($con, $sql);
    $num=mysqli_num_rows($result);

    if($num==0)
    {
       if(($password == $cpassword) && $exists==false)
       { 
        
         $sql = "insert into `user` ( `name`, `email`, `phno`, `password`) values ( '$username', '$email', '$phno', '$password')";
         $result = mysqli_query($con, $sql);
          if ($result)
          {
            
            header("Location:/compsoft/login.php");
          }
       }
      else
      {
        $passworderror="passwords donot match";
      }
    }
   if($num>0)
   {
       $msg="email already exists try logging in";
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
    <title>Sign up</title>
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
        <button class="btn1 btn-lightt"><a href=/compsoft/login.php>LogIn<a></button>
        
        
    </nav>
    <div class="pt-5">
        <h1 class="text-center"> SignUp</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="card card-body">
                        <form id="submitForm" action="" method="post" data-parsley-validate=""
                            data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1">
                            <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">
                            <div class="form-group required my-3">
                                
                                <input type="text" class="form-control text-lowercase" id="username" required=""
                                    name="username"  placeholder ="Enter your Name" value="">
                            </div>
                            <div class="form-group required my-3">
                                
                                <input type="email" class="form-control text-lowercase" id="email" required=""
                                    name="email"  placeholder ="Enter your email" value="">
                            </div>
                            <div class="form-group required my-3">
                            
                                <input type="text" class="form-control text-lowercase" id="phno" required=""
                                    name="phno"  placeholder ="Enter your mobile number" value="">
                            </div>
                            <div class="form-group required my-3">
                                
                                <input type="password" class="form-control text-lowercase" id="password" required=""
                                    name="password"  placeholder ="Create password" value="">
                            </div>
                            <div class="form-group required my-3">
                            
                                <input type="password" class="form-control text-lowercase" id="cpassword" required=""
                                    name="cpassword"  placeholder ="Confirm password" value="">
                            </div>
    
                            <div class="form-group pt-1">
                                <button class="btn btn-primary btn-block" type="submit">signup </button>
                                <div class=field_error>
                           <?php echo  $msg?>
                        </div>
                        <div class=field_error>
                           <?php echo  $passworderror?>
                        </div>
                            </div>
                        </form>
                        <p class="small-xl pt-3 text-center">
                            <span class="text-muted"> Have an account? </span>
                            <a href="/compsoft/login.php"> LogIn </a>
                            
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
     </div>
    </body> 
    
    
    </html>
