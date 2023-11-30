<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link rel="stylesheet" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/dist/mdb5/standard/core.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<style type="text/css">
		#example1 {
		   background: url(image/pexels-chris-schippers-950003.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		.boxsadow{
			background: #46d8ff8a;
			border-radius: 30px;
			margin-top: 50px;
			padding: 20px;
			box-shadow: inset 0 -3em 3em rgb(0 0 0 / 30%), 0 0 0 2px white, 0.3em 0.3em 1em rgb(0 0 0 / 60%);
		}
		html { overflow-y: hidden; }
	</style>
</head>
<body id="example1">	
<form action="create" method="POST">
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
                <h3 class="mb-4 text-uppercase" style="text-align: center;">Registration</h3>
	                	<div class="row">
		                  <div class="col-md-12">
		                    <div class="form">
		                    	<label class="form-label" for="form3Example1m">Name</label>
		                      <input type="text" name="name" id="form3Example1m" class="form-control form-control-lg" required />
		                    </div>
		                  </div>
	                	</div>
	                	<div class="row">
		                  <div class="col-md-12">
		                    <div class="form">
		                    	<label class="form-label" for="form3Example1n">Email</label>
		                      <input type="Email" name="email" id="form3Example1n" class="form-control form-control-lg" required/>
		                    </div>
		                  </div>
	              		</div>
	             		<div class="row">
		                <div class="col-md-6">
		                    <div class="form">
		                    	<label class="form-label" for="form3Example1n">Password</label>
		                      <input type="text" name="password" id="form3Example1n" class="form-control form-control-lg" required/>
		                    </div>
		                </div>
		                <div class="col-md-6">
		                	<div class="form ">
					            	<label class="form-label" for="form3Example8">Phone</label>
					              <input type="text" name="phone" id="form3Example1n" class="form-control form-control-lg" required/>
				            	</div>
				            </div>	
				        	</div>
				        	<div class="row">  
				            <div class="col-md-12">
					            <div class="form ">
					            	<label class="form-label" for="form3Example8">Address</label>
					              	<textarea name="address" id="form3Example1n" class="form-control form-control-lg" required></textarea>
					          	</div>
					        	</div> 
					        </div>
					        <div class="row">
						            <div class="form ">
							            <div class="d-flex justify-content-end pt-3">
							            	<div class="col-md-6">
							              <a href="login"><button type="button" class="btn btn-lg btn-light ">Login</button></a>
							            </div>
							            <div class="col-md-6">
							              <button type="submit" class="btn btn-warning btn-lg ms-2">Registar</button>
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

</body>
<script type="text/javascript">
	$(document).submit(function(){
				fetch_response();
				function fetch_response(){
					$.ajax({
						url:"create",
						success:function(data)
						{
							window.location.href = "./home";
						}
					})
				}

			});
</script>
</html>