<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<link rel="stylesheet" href="css/header.css"> 
<body>
<?php include"layout/header.php"?>
    
    <div class="title">
        <center>
        <h3>Product</h3>
        </center>
      </div>
		<div class="container text-center update-form">
      
			<div class="errorMessage">
				<!-- Show Error Message -->
					<p style="color: red;">
            <?php
							if(isset($_SESSION['error']))
							{
								echo $_SESSION['error'];

								//tidak menunjukan error lagi
								unset($_SESSION['error']);
							}
						?> 
          </p>
			</div>
			<form class="form-horizontal" method="POST" action="./controller/insertproductcontroller.php" enctype="multipart/form-data">
			<input type="hidden" name="id"> <!-- id from selected product -->
            <div class="form-group">
              <label class="control-label col-sm-2" for="productname">Product Name:</label>
              <div class="col-sm-10">
                <!-- Show selected brand in value input type -->
                <input type="text" class="form-control" id="productname" name="productname" placeholder="Enter Product Name">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="brand">Brand:</label>
              <div class="col-sm-10">
                <!-- Show selected brand in value input type -->
                <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter Brand">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="category">Category:</label>
              <div class="col-sm-10">
				<!-- Show selected type in value input category -->
                <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="price">Price:</label>
              <div class="col-sm-10">
				<!-- Show selected price in value input type -->
                <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="image">Image:</label>
              <div class="col-sm-10">
                <input type="file" id="image" name="image">
              </div>
            <div>
            <div>
            <button type = "submit" name="upload">Upload</button>
            </div>
            <?php
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
          </form>
		</div>
    </div>
</body>
</html>