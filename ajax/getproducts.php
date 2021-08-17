<?php 
include '../include/connect.php';
switch($_REQUEST["action"])
	{

		case"get_product":
		   $sql = "SELECT * FROM `product` order by productId desc";
           $result = mysqli_query($conn, $sql);
		  // print_r($result);
		   $records["data"] = array();           
		   if (mysqli_num_rows($result) > 0)
           {
			 	// output data of each row
				$memberdisabled="";
				$feespaidicon="";
                  while($row = mysqli_fetch_assoc($result))
                  {
					  $productId= $row["productId"];
					  $Name=$row["Name"];
					  $description=$row["description"];
					  $image =$row["image"];
					  //$category_id=$row["category_id"];
					  $quantity=$row["quantity"];
					  $brand=$row["brand"];
					 // $model=trim($row["model"]);
					  $price=$row["price"];
					 
					  
					  
					  $image=$row['image'];
					  if($image=="")
					  {
						  $image_url ="images/profile_pic.png";
					  }
					  else
					  {
							$image_url=$row['image'];
					  }
					 
						$records['data'][] = array(
							"<span>". $productId ."</span>",
							"<span><img src=".stripslashes($image_url)." alt='' width='50' height='50'> </span>",
							"<span>". $Name ."</span>",
							"<span>". $description ."</span>",
							"<span>". $quantity ."</span>",
							"<span >".$brand."</span>",
							//"<span>". $model ."</span>",
							"<span >".$price."</span>",
							"
							<a class='edit-product' title='Edit details' data-toggle='modal' data-target='#EditModal' data-id='".$productId ."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> </a>&nbsp;
							
							<a class='' href='javascript:void(0);' onclick='deleteProduct(". $productId .")' title='Delete Student'><i class='fa fa-trash' aria-hidden='true'></i></a>&nbsp;
							"
							
						);
					}
			}
			echo json_encode($records);
		break;
		case "edit_product":		
		     $product_id=$_REQUEST["product_id"];
				
			 $sql = "SELECT `productId`, `Name`, `description`, `image`, `quantity`, `brand`, `price`, `created_at` FROM `product` WHERE `productId`=$product_id";
			 $result = mysqli_query($conn, $sql);		
				      
			 if (mysqli_num_rows($result) > 0)
			 {
				  while($row = mysqli_fetch_assoc($result))
                  {
					echo $return='<form action="#" method="post"  enctype="multipart/form-data" class="frmproduct1" >
					<fieldset>
						<input type="hidden" name="product_id" id="product_id" value="'. $product_id .'">
						<div class="row">
							<div class="col-sm-4"><b> Product Name:</b><span class="error" required>*</span></div>
							<div class="col-sm-8">
								<input type="text" placeholder="Product Name..." class="form-control" name="pname" value="'.$row['Name'].'" data-value-missing=”Translate(‘Required’)”  required=" " >
							</div>
							
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4"><b> Product Description:</b><span class="error" required>*</span></div>
							<div class="col-sm-8">
								<input type="textarea" placeholder=" Product Description..." class="form-control" name="pdescription" value="'.$row['description'].'" data-value-missing=”Translate(‘Required’)”  required=" " >
							</div>
							
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4"><b> Quantity:</b><span class="error" required>*</span></div>
							<div class="col-sm-2">
								<input type="number" placeholder="Quantity..." class="form-control" name="pquantity" value="'.$row['quantity'].'" data-value-missing=”Translate(‘Required’)”  required=" " >
							</div>
							
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4"><b> Brand:</b><span class="error" required>*</span></div>
							<div class="col-sm-8">
								<input type="textarea" placeholder="Brand..." class="form-control" name="pbrand" value="'.$row['brand'].'" data-value-missing=”Translate(‘Required’)”  required=" " >
							</div>
							
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4"><b> Price:</b><span class="error" required>*</span></div>
							<div class="col-sm-3">
								<input type="textarea" placeholder="Price.." class="form-control" name="pprice" value="'.$row['price'].'" data-value-missing=”Translate(‘Required’)”  required=" " >
							</div>
							
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4"><b> Image:</b><span class="error" required>*</span></div>
							<div class="col-sm-8">
								<input type="file" id="product_image" value="'.$row['image'].'" name="product_image" accept=".png,.jpeg,.jpg" multiple >
								<a href="'.$row['image'].'">  </a>
							</div>
							
						</div>
						<br>
						</div>
						</div>
						<br>
						 <button type="submit"  class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
						 <button type="submit" name="Save" id="Save" value="Save"   class="btn btn-primary btn-outline pull-right ">Save</button>
					</fieldset>
					</form>';
					}
			    }
		break;
		case "save_product":
			    $pname=$_POST["pname"];
				$pdescription=$_POST["pdescription"];
				$pquantity=$_POST["pquantity"];
				$pbrand=$_POST["pbrand"];
				$pprice=$_POST["pprice"];
				
				$filename = date("dmYHis").rand(0,50);
			    $target_dir = "../images/";
				$target_file = $target_dir . basename($_FILES["product_image"]["name"]);
				$file_name ="images/". basename($_FILES["product_image"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				// Check if image file is a actual image or fake image
				
				 $check = getimagesize($_FILES["product_image"]["tmp_name"]);
								 
				// Check file size
				if ($_FILES["product_image"]["size"] > 500000) {
				  echo "Sorry, your file is too large.";
				  $uploadOk = 0;
				}

				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				  $uploadOk = 0;
				}

				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					 
				// if everything is ok, try to upload file
				} else {
				  if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
					  $sql="INSERT INTO `product`(`Name`, `description`, `image`, `quantity`, `brand`, `price`, `created_at`) 
					VALUES ('$pname','$pdescription','$file_name','$pquantity','$pbrand','$pprice',now())";
				    if ($conn->query($sql) === TRUE) {
						echo "Product added successfully!";
					} else {
					  echo "Error: " . $sql . "<br>" . $conn->error;
					}
					
				  } else {
					echo "Sorry, there was an error uploading your file.";
				  }
				}
				
		break;
		case "save_edited":
				$product_id=$_POST["product_id"];
				$pname=$_POST["pname"];
				$pdescription=$_POST["pdescription"];
				$pquantity=$_POST["pquantity"];
				$pbrand=$_POST["pbrand"];
				$pprice=$_POST["pprice"];
				
				$filename = date("dmYHis").rand(0,50);
			    $target_dir = "../images/";
				$target_file = $target_dir . basename($_FILES["product_image"]["name"]);
				$file_name ="images/". basename($_FILES["product_image"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				// Check if image file is a actual image or fake image
				
				 $check = getimagesize($_FILES["product_image"]["tmp_name"]);
				if($_FILES["product_image"]["name"]!="")
				{					
					// Check file size
					if ($_FILES["product_image"]["size"] > 500000) {
						echo "Sorry, your file is too large.";
						$uploadOk = 0;
					}

					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
						echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
						$uploadOk = 0;
					}

					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						 
					// if everything is ok, try to upload file
					} else {
					  if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
						    $sql1="UPDATE `product` SET `Name`='$pname',`description`='$pdescription',`image`='$file_name',
						  `quantity`='$pquantity',`brand`='$pbrand',`price`='$pprice',`created_at`=now() WHERE `productId`=$product_id";
						if ($conn->query($sql1) === TRUE) {
							echo "Product updated successfully!";
						} else {
						  echo "Error: " . $sql . "<br>" . $conn->error;
						}
						
					  } else {
						echo "Sorry, there was an error uploading your file.";
					  }
					}
				}
				else{
					     $sql="UPDATE `product` SET `Name`='$pname',`description`='$pdescription',`quantity`='$pquantity',
					   `brand`='$pbrand',`price`='$pprice',`created_at`=now() WHERE `productId`=$product_id";
						if ($conn->query($sql) === TRUE) {
							echo "Product updated successfully!";
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
				}
		break;
		case "deleteProduct":
				$id=$_REQUEST["id"];
			    $sql="DELETE FROM `product` WHERE `productId`='". $id ."'";
				
				if ($conn->query($sql) === TRUE) {
				  echo "Record deleted successfully";
				} else {
				  echo "Error deleting record: " . $conn->error;
				}
		break;
	}
 ?>