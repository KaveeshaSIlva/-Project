
<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<?php include "editDoctor.php"; ?>
		<?php include "Doctor.php";?>
		
		<title>Doctor Profile</title>
		
		
		<!--=====================================================
			CSS Stylesheets
		=====================================================-->
		<link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.min.css' >
		<link rel='stylesheet' type='text/css' href='css/linea.css' >
		<link rel='stylesheet' type='text/css' href='css/ionicons.min.css' >
		<link rel='stylesheet' type='text/css' href='css/owl.carousel.css' >
		<link rel='stylesheet' type='text/css' href='css/magnific-popup.css' >
		<link rel='stylesheet' type='text/css' href='css/style.css' >
		
	</head>
	<body>

		
		
		<!--=====================================================
			Preloader
		=====================================================-->
		<div id='preloader' >
			<div class='loader' ></div>
			<div class='left' ></div>
			<div class='right' ></div>
		</div>
		
		
		<div class='main-content' >
			
			<!--====================================================
				Page Borders
			=====================================================-->
			<div class='page-border border-left' ></div>
			<div class='page-border border-right' ></div>
			<div class='page-border border-top' ></div>
			<div class='page-border border-bottom' ></div>
			
			
			<?php include "connectDoctorDB.php";?>
			<?php $doc= new Doctor($first_name,$last_name,$speciality,$district,$qualifications,$regNo,$sex)?>
			<!--=====================================================
				Sections
			=====================================================-->
			<div class='sections' >
				
				<!--====================================================
					Main Section
				=====================================================-->
				<section id='intro' class='section section-main active' >
					
					<div class='container-fluid' >
						
						<div class='v-align'>
							<div class='inner'>
								<div class='intro-text'>
								<h1><?php $doc->getName();?></h1>	
                                <div class='col-md-4' >
									
									<ul class='info-list' >
                            			
										<li>
											<strong>Speciality:</strong>
											<span><?php $doc->getSpeciality(); ?></span>
										
										<li>
											<strong>District:</strong>
											<span><?php $doc->getDistrict(); ?></span>
				
										</li>
										
										<li>
											<strong>Qualifications:</strong>
											<span><?php $doc->getQualifications(); ?></span>
										</li>
										<li>
											<strong>registration No:</strong>
											<span><?php $doc->getRegNo(); ?></span>
										</li>
										<li>
											<strong>Gender:</strong>
											<span><?php $doc->getSex(); ?></span>
										</li>
										
										
										
									</ul>
									
								</div>
								
									<div class='intro-btns' >
										
										<a href='addDoctor.php' class='btn-custom section-toggle' data-section='about' >
												Channel
										</a>
										<!-- include "editDoctor.php"; -->
										<button class='btn-custom section-toggle' data-section='about' onclick="openForm()">edit</button>
										
									</div>
									
								</div>
							</div>
							
						</div>
						
					</div>
				
				</section>
				
				
		
				<p class="comment-form-author">
					<label for="author">Speciality <span class="required">*</span></label>
					<input type="text" required="required" size="30" value="" name="speciality">
            	</p>
		<!--=====================================================
			JavaScript Files
		=====================================================-->
		<script src='js/jquery.min.js' ></script>
		<script src='js/jquery.shuffle.min.js' ></script>
		<script src='js/owl.carousel.min.js' ></script>
		<script src='js/jquery.magnific-popup.min.js' ></script>
		<script src='js/validator.min.js' ></script>
		<script src='js/script.js' ></script>
		
	</body>
</html>
