<?php
include("connection.php");
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=mysqli_real_escape_string($con,$_GET['type']);
	if($type=='status'){
		$operation=mysqli_real_escape_string($con,$_GET['operation']);
		$id=mysqli_real_escape_string($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update product set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=mysqli_real_escape_string($con,$_GET['id']);
		$delete_sql="delete from product where id='$id'";
		mysqli_query($con,$delete_sql);
	}


}
$sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";
$res=mysqli_query($con,$sql);

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
    <title>Products</title>
    <style>
         
    </style>
   
</head>
<body>
<nav class="navibar bg-lightt">
        <div class="container-fluidd">
            <a class="navbar-brand" href="#"><strong>LeafNow</strong></a>

        </div>
        <button class="btn1 btn-lightt">Log in</button>
        <button class="btn1 btn-lightt">Sign up</button>
    </nav>

<section  >
    <h1 class="h-primary center mt-2">Products</h1>
    <h3><a href="/compsoft/addproducts.php">Add Products</a></h2>
<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">CATEGORY</th>
      <th scope="col">NAME</th>
      <th scope="col">IMAGE</th>
      <th scope="col">MRP</th>
      <th scope="col">PRICE</th>
      <th scope="col">QTY</th>
      <th scope="col">STATUS</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $i=1;
      while($row=mysqli_fetch_assoc($res)) {?>
       
    <tr>
      <th scope="row"><? echo $i ?></th>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['categories']?></td>
      <td><?php echo $row['name']?></td>
      <td><img src="./media/product/<?php echo $row['image']?>"/></td>
      <td><?php echo $row['mrp']?></td>
      <td><?php echo $row['selling_price']?></td>
      <td><?php echo $row['quantity']?></td>
      <td><?php echo $row['status']?></td>

      <td>
         <?php
								if($row['status']==1){
									echo "<span  ><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp";
								}else{
									echo "<span ><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp &nbsp &nbsp &nbsp ";
								}
								echo "<span ><a href='manage_categories.php?id=".$row['id']."'>Edit</a></span>&nbsp &nbsp &nbsp &nbsp ";
								
								echo "<span class=><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>




</section>

    
</body>
</html>

