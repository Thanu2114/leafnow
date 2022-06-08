<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
    <title>Interface</title>
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
        a{
            color: #fff;
        }

        body {
            /* background: #28a745 !important; */
            background: url('/bus.jpg');
            font-family: 'Muli', sans-serif;
            background-size: cover;
        }

        h1 {
            color: #fff;
            padding-bottom: 2rem;
            font-weight: bold;
        }

        

        a:hover {
            color: #E8D426;
            text-decoration: none;
        }

        .form-control:focus {
            color: #fff;
            background-color: #fff;
            border: 2px solid #E8D426;
            outline: 0;
            box-shadow: none;
        }

        .btn {
            background: #28a745;
            border: #E8D426;
            text-align: center;
        }

        .btn:hover {
            background: #28a745;
            border: #E8D426;
        }

        .container {
            margin: 257px auto;
            justify-content: center;
        }
        .card2
        {
            padding-left: 55px;
        }
    </style>
    <style>
        .navbar{
            background: #fff;
    transition: all 0.5s;
    z-index: 997;
    padding: 20px 0;
        }
        body{
            font-family: "Open Sans", sans-serif;
    color: #444444;
        }
        .collapse ul {
            padding-left: 50rem;
        }
        .collapse ul li{
            color: #fff;
        }
        nav{
            background-color: #333;
            color: #fff;
        }
        .mx-2 a{
            padding-right: 1.75rem;
        }
        .nav-link{
            color: #fff;
        }
    </style>
</head>
<body>
<nav class="navibar bg-lightt">
        <div class="container-fluidd">
            <a class="navbar-brand" href="#"><strong>LeafNow</strong></a>

        </div>
        <button class="btn1 btn-lightt">Log out</button>
        
    </nav>
    <div class="container d-flex align-items-center my-7 justify-content-center">

    <div class="card1">
        <div class="card" style="width: 18rem;">
            
            <div class="card-body">
                <h5 class="card-title">ADMIN</h5>
                <p class="card-text">Please Login here if ypu are admin
                    </p>
                <a href="/compsoft/adminlogin.php" class="btn btn-primary"> login</a>
            </div>
        </div>
    </div>
    <div class="card2">
        <div class="card" style="width: 18rem;">
            
            <div class="card-body">
                <h5 class="card-title">CUSTOMER</h5>
            <p class="card-text">Please login to coninue if you are a customer</p>
                <a href="/compsoft/login.php" class="btn btn-primary">login</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>