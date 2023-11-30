<?php 
include 'api.php';
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$users = "SELECT * FROM users WHERE id = ".$id." order by id ASC";
		$result =  mysqli_query($conn,$users);
		$data = mysqli_fetch_assoc($result);

	  $name = $data['name'];
	 	$email = $data['email'];
	 	$password = password_hash($data['password'],PASSWORD_DEFAULT);
	 	$phone = $data['phone'];
	 	$address = $data['address'];
		}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
	</head>

	<body>
		<?php if(isset($_SESSION["id"]) && $_SESSION["id"] != ""){?>
		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<!-- <a class="navbar-brand" href="index.html">Furni<span>.</span></a> -->

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<?php if(isset($admin["admin"]) && $admin["admin"] == 1){ ?>
								<h1 style="color: white;">Admin</h1>
								<?php }else{?>
									<h1 style="color: white;">Users</h1>
								<?php }?>
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						
						<li class="nav-item ">
								
							<a class="nav-link" href="home.php">Home</a>
						</li>
						<li><a class="nav-link" href="logout.php">Logout</a></li>
						<!-- <li><a class="nav-link" href="about.html">About us</a></li>
						<li><a class="nav-link" href="services.html">Services</a></li>
						<li><a class="nav-link" href="blog.html">Blog</a></li>
						<li><a class="nav-link" href="contact.html">Contact us</a></li> -->
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<!-- <li><a class="nav-link" href="#"><img src="images/user.svg"></a></li> -->
					</ul>
				</div>
			</div>
				
		</nav>
<body id="example1">	
<form action="update_data.php" method="POST">
<section class="h-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col" style="margin-top: -56px;">
        <!-- <div class="card card-registration my-2"> -->
          <div class="row">
            <!-- <div class="col-xl-5 d-none d-xl-block">
              <img style="max-width: 73%;" src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div> -->
             <div class="col-xl-3">
              	
              </div>
            <div class="col-xl-6 boxsadow">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-4 text-uppercase" style="text-align: center;">Update User</h3>
	                	<div class="row">
		                  <div class="col-md-12">
		                    <div class="form">
		                    	<label class="form-label" for="form3Example1m">Name</label>
		                      <input type="text" name="name" value="<?php echo $name;?>" id="form3Example1m" class="form-control form-control-lg" required />
		                    </div>
		                  </div>
	                	</div>
	                	<div class="row">
		                  <div class="col-md-12">
		                    <div class="form">
		                    	<label class="form-label" for="form3Example1n">Email</label>
		                      <input type="Email" name="email" value="<?php echo $email;?>" id="form3Example1n" class="form-control form-control-lg" required/>
		                    </div>
		                  </div>
	              		</div>
	             		<div class="row">
		                <div class="col-md-12">
		                	<div class="form ">
					            	<label class="form-label" for="form3Example8">Phone</label>
					              <input type="text" name="phone" value="<?php echo $phone;?>" id="form3Example1n" class="form-control form-control-lg" required/>
				            	</div>
				            </div>	
				        	</div>
				        	<div class="row">  
				            <div class="col-md-12">
					            <div class="form ">
					            	<label class="form-label" for="form3Example8">Address</label>
					              	<textarea name="address" id="form3Example1n" class="form-control form-control-lg" required><?php echo $address;?></textarea>
					          	</div>
					        	</div> 
					        </div>
					        <div class="row">
						            <div class="form ">
							            <div class="d-flex justify-content-end pt-3">
							            	<div class="col-md-3">
							              <button type="submit" class="btn btn-success ">Update</button>
							              <input type="hidden" name="id" value="<?php echo $id;?>"/>
							            </div>
							            <div class="col-md-9">
							              <a href="home"><button type="button" class="btn btn-danger  ms-2">Cancel</button></a>
							            </div>
						        		</div>
			                </div>
					        </div> 	
					            
			               </div> 
            			</div>
            </div>
          </div>
        </div>
      </div>
   </div>
</section>
</form>
<?php }else{ header("Location:index.php"); }?>
</body>
</html>