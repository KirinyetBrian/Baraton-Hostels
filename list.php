<?php  
include("file_upload.php");
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:login.php");
}
?> 

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen">
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
<link rel="stylesheet" href="css/jquery-ui.css" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
<!--fonts-->
<link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
 
  <title>PHP 8 Upload Multiple Files Example</title>
  <style>
    .container {
      max-width: 450px;
    }
    .imgGallery img {
      padding: 8px;
      max-width: 100px;
    }    
  </style>
</head>
<body>
    <!-- header -->
<div class="banner-top">		
		
	<div class="w3_navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<h1><a class="navbar-brand" href="index.php">BARA <span>TON</span><p class="logo_w3l_agile_caption">The Best Hostels</p></a></h1>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				
			</nav>

		</div>
	</div>
    
<!-- //header -->
  <div class="container mt-5">
    <form action="" method="post" enctype="multipart/form-data" class="mb-3">
      <h3 class="text-center mb-5">List Vacancy</h3>
      <div class="form-group">
        <label>Property Name</label>
        <input type="text" name="propertyname" class="form-control" value=" " >
        <span class="invalid-feedback"></span>
         </div>

         <div class="form-group">
        <label>Room Type</label>
        <input type="text" name="Room_Type" class="form-control" value="">
        <span class="invalid-feedback">></span>
         </div>


         <div class="form-group">
        <label>location</label>
        <input type="text" name="location" class="form-control" value="">
        <span class="invalid-feedback"><?php echo $name_err;?></span>
         </div>


         <div class="form-group">
        <label>Contact</label>
        <input type="number" name="contact" class="form-control " value="">
        <span class="invalid-feedback"></span>
         </div>

         <div class="form-group">
        <label>Cost</label>
        <input type="text" name="cost" class="form-control " value="">
        <span class="invalid-feedback"></span>
         </div>
      <div class="user-image mb-3 text-center">
        <div class="imgGallery"> 
          <!-- Image preview -->
        </div>
      </div>
      <div class="custom-file">

        <input type="file" name="fileUpload[]" class="custom-file-input" id="chooseFile" multiple>
        <label class="custom-file-label" for="chooseFile">Select file</label>
      </div>
      <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
        Upload Files
      </button>
    </form>
    <div class="copy">
		        <p>© <?php echo date('Y') ?> BARATON . All Rights Reserved | Design by <a href="index.php">Emmanuel Kiptoo</a> </p>
		    </div>
    <!-- Display response messages -->
    <?php if(!empty($response)) {?>
        <div class="alert <?php echo $response["status"]; ?>">
           <?php echo $response["message"]; ?>
        </div>
    <?php }?>
  </div>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script>
    $(function() {
    // Multiple images preview with JavaScript
    var multiImgPreview = function(input, imgPreviewPlaceholder) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
      $('#chooseFile').on('change', function() {
        multiImgPreview(this, 'div.imgGallery');
      });
    });    
  </script>
  
</body>
</html>

<?php 

include('db.php');

?>