<?php
include("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $categories=mysqli_real_escape_string($con,$_POST['categories']);
    mysqli_query($con,"insert into categories(categories,status) values ('$categories','1')");
    header("location:categories.php");
    die();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css">
    <title>add categories</title>
    <style>
         
    </style>
   
</head>
<body>
<nav class="navibar bg-lightt">
        <div class="container-fluidd">
            <a class="navbar-brand" href="#"><strong>LeafNow</strong></a>

        </div>
        
    </nav>
    <section class="form-container">
    <div class="forminnercontainer1">
      <div class="forminnercontainer2">
        <h1 class="h-primary center">HELLO ADMIN</h1>
        <form method="post" action="">
          <div class="form-group form-group1">
            <label for="exampleFormControlInput1"> CATEGORIES</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="categories" placeholder="Enter categories" required>
          </div>
          
          <div class="form-group form-group1">
            <input type="Submit" class="btn1 btn-darkk" name= "submit">
            
          </div>
        </form>
      </div>

    </div>
  </section>

</body>
</html>