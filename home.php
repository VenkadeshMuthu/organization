<?php session_start(); ?>
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
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	</head>

	<body>
<?php if(isset($_SESSION["id"]) && $_SESSION["id"] != NULL || $_SESSION["status"] == 'User Login Successfull' && !empty($_SESSION["id"])){?>
		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<!-- <a class="navbar-brand" href="index.html">Furni<span>.</span></a> -->

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1){ ?>
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
		<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
              	<?php
									    if(isset($_SESSION['status'])){ ?>
						            <div class="alert alert-warning alert-dismissible fade show" role="alert">
						              	<?= $_SESSION['status']; ?>
						            </div>
									<?php 
									    unset($_SESSION['status']);}?>
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Name</th>
                          <th class="product-name">Email</th>
                          <th class="product-price">Phone</th>
                          <th class="product-quantity">Address</th>
                          <th class="product-quantity">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
        
            </div>
          </div>
          <?php }else{ header("Location:login.php"); }?>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
		<script type="text/javascript">
			
			$(document).ready(function(){
				fetch_user();
				function fetch_user(){
					$.ajax({
						url:"fetch.php",
						success:function(data)
						{
							$('tbody').html(data);
						}
					})
				}

			});
		</script>
	</body>

</html>
