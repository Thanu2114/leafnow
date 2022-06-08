<?php
include("connection.php");

if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $mail=$_POST['email'];
  $contact_no=$_POST['contact_no'];
  $description=$_POST['description'];
  
  $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],'./media/product/'.$image);
			$sql = "insert into `seller` ( `name`, `email`, `contact_no`, `description`,`image`) values ( '$name', '$email', '$contact_no', '$description','$image')";


  
  $result = mysqli_query($con, $sql);
  mysqli_error($result);
   if ($result)
   {
     
     header("location:indexafterlogin.php");
   }
  else{
    echo"error";
  }
  
}





?>









<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>SELLERS FORM</title>
</head>

<body>
  <nav class="navibar bg-lightt">
    <div class="container-fluidd">
      <a class="navbar-brand" href="#"><strong>LeafNow</strong></a>

    </div>
    <button class="btn1 btn-lightt">Log out</button>
  </nav>
  <section class="form-container">
    <div class="forminnercontainer1">
      <div class="forminnercontainer2">
        <h1 class="h-primary center">HELLO!</h1>
        <form action="" enctype="multipart/form-data">
          <div class="form-group form-group1">
            <label for="exampleFormControlInput1">NAME</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="John Smith" name="name">
          </div>
          <div class="form-group form-group1 ">
            <label for="exampleFormControlInput1">EMAIL</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@gmail.com" name="email">
          </div>
          <div class="form-group form-group1">
            <label for="exampleFormControlInput1">CONTACT NO</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="contact_no">
          </div>
          <div class="form-group form-group1">
            <label for="exampleFormControlInput1">PLANT NAME</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="lily" name="plantname">
          </div>
          <div class="form-group form-group1">
            <label for="exampleFormControlTextarea1">WRITE SMALL DESCRIPTION ABOUT PLANT</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
          </div>
          <br>
          <br>
          <div class="custom-file form-group1">
            <input type="file" class="custom-file-input" id="customFile" name="image">
            <label class="custom-file-label" for="customFile"></label>
          </div>
          <div class="form-group form-group1">
            <input type="Submit" class="btn1 btn-darkk" name="submit">
            
          </div>
        </form>
      </div>

    </div>
  </section>

</body>

</html>