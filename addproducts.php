<?php
include("connection.php");
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc	='';
$description	='';
$meta_title	='';
$meta_description	='';
$meta_keyword='';

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=mysqli_real_escape_string($con,$_GET['id']);
	$res=mysqli_query($con,"select * from product where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['categories_id'];
		$name=$row['name'];
		$mrp=$row['mrp'];
		$price=$row['selling_price'];
		$qty=$row['quantity'];
		$short_desc=$row['short_desc'];
		$description=$row['description'];
		$meta_title=$row['meta_title'];
		$meta_desc=$row['meta_desc'];
		$meta_keyword=$row['meta_keyword'];
		$image=$row['image'];
		
	}else{
		header('location:product.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories_id=mysqli_real_escape_string($con,$_POST['categories_id']);
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$mrp=mysqli_real_escape_string($con,$_POST['mrp']);
	$price=mysqli_real_escape_string($con,$_POST['price']);
	$qty=mysqli_real_escape_string($con,$_POST['qty']);
	$short_desc=mysqli_real_escape_string($con,$_POST['short_desc']);
	$description=mysqli_real_escape_string($con,$_POST['description']);
	$meta_title=mysqli_real_escape_string($con,$_POST['meta_title']);
	$meta_desc=mysqli_real_escape_string($con,$_POST['meta_desc']);
	$meta_keyword=mysqli_real_escape_string($con,$_POST['meta_keyword']);
	
	
	
	$res=mysqli_query($con,"select * from product where name='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
	
	
	if(isset($_GET['id'])==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image format";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],'./media/product/'.$image);
				$update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image' where id='$id'";

				echo "hi";
			}else{
				$update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id'";
				echo "hi";
			}
			mysqli_query($con,$update_sql);
		}else{
			$image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],'./media/product/'.$image);
			$sql="insert into `product` ( `categories_id`, `name`, `mrp`, `selling_price`, `quantity`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES ('$categories_id','$name','$mrp','$price','$qty','$image','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1)";
		
			mysqli_query($con,$sql);
			if($sql)
			{
				echo "hi";
			}
		
			else{
				echo "heylo";
			}
			
		}
		header('location:product.php');
		die();
		

		
	}
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
    <title>add Products</title>
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
        <form method="post" action="" enctype="multipart/form-data">
          <div class="form-group form-group1">
            <label for="exampleFormControlInput1"> CATEGORIES</label>
            <select class ="form-control" name=categories_id>
                <option value="">Select category</option>
                <?php
										$res=mysqli_query($con,"select id,categories from categories order by categories asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['categories']."</option>";
											}
											
										}
				?>
                </select>
          
          </div>
          
          
          <div class="form-group form-group1">
            <label for="exampleFormControlInput1"> PRODUCT NAME</label>
            <input type="text" name="name" placeholder="Enter product name" class="form-control" id="exampleFormControlInput1" required value="<?php echo $name?>">
          </div>
        
          <div class="form-group form-group1">
            <label for="exampleFormControlInput1"> MRP</label>
            <input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" id="exampleFormControlInput1" required value="<?php echo $mrp?>">
          </div>
          <div class="form-group form-group1">
            <label for="exampleFormControlInput1"> PRICE</label>
            <input type="text" name="price" placeholder="Enter product price" class="form-control" id="exampleFormControlInput1" required value="<?php echo $price?>">
          </div>
          <div class="form-group form-group1">
            <label for="exampleFormControlInput1"> QUANTITY</label>
            <input type="text" name="qty" placeholder="Enter qty" class="form-control" id="exampleFormControlInput1" required value="<?php echo $qty?>">
          </div>
          <div class="form-group form-group1">
            <label for="exampleFormControlInput1"> IMAGE</label>
            <input type="file" name="image" class="form-control" <?php echo  $image_required?>>
          </div>

          <div class="form-group form-group1">
            <label for="exampleFormControlInput1"> SHORT DESCRIPTION</label>
            <textarea name="short_desc" placeholder="Enter product short description" class="form-control" required><?php echo $short_desc?></textarea>
          </div>

          <div class="form-group form-group1">
            <label for="exampleFormControlInput1"> DESCRIPTION</label>
            <textarea name="description" placeholder="Enter product description" class="form-control" required><?php echo $description?></textarea>
          </div>

          <div class="form-group form-group1">
            <label for="exampleFormControlInput1"> META TITLE</label>
            <textarea name="meta_title" placeholder="Enter product meta title" class="form-control"><?php echo $meta_title?></textarea>
          </div>

          <div class="form-group form-group1">
            <label for="exampleFormControlInput1"> META DESCRIPTION</label>
            <textarea name="meta_desc" placeholder="Enter product meta description" class="form-control"><?php echo $meta_description?></textarea>
          </div>

          <div class="form-group form-group1">
            <label for="exampleFormControlInput1"> META KEYWORD</label>
            <textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"><?php echo $meta_keyword?></textarea>
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