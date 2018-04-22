<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ENAM</title>
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/images/logo.png" />
  <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/images/logo.png" />

	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/nivo-lightbox.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/login/style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhqOvD7rEtY6YxM3lEGLC2qN912XyrM0&sensor=false" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>
<body>

<!-- preloader section -->
<section class="preloader">
	<div class="sk-spinner sk-spinner-pulse"></div>
</section>

<!-- navigation section -->
<section class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand"> <img src="<?php echo base_url() ?>assets/images/logo.png" style="float:left;max-width:30px;max-height:30px;"/>ENAM</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#home" class="smoothScroll">HOME</a></li>
				<li><a href="#gallery" class="smoothScroll">GALLERY</a></li>
				<li><a href="#menu" class="smoothScroll">SARANA & PRASARANA</a></li>
				<li><a href="#team" class="smoothScroll">TEAM</a></li>
				<li><a href="#contact" class="smoothScroll">CONTACT</a></li>
				<li><a href="<?php echo base_url().'enam/login' ?>">LOGIN</a></li>
			</ul>
		</div>
	</div>
</section>


<!-- home section -->
<section id="home" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
			<img src="<?php echo base_url() ?>assets/images/logo.png" style="max-width:100px;max-height:100px;"/>
				<h1 class="judul">ENAM</h1>
				<h2>SARANA &amp; PRASARANA</h2>
				<a href="#gallery" class="smoothScroll btn btn-default">LEARN MORE</a>
			</div>
		</div>
	</div>		
</section>


<!-- gallery section -->
<section id="gallery" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1 class="heading">Gallery</h1>
				<hr>
			</div>
			<?php foreach($sapras as $rowdata){ ?>
			
			<div class="col-md-4 col-sm-4 wow fadeInUp " data-wow-delay="0.3s">
				<center><a href="<?php echo base_url() ?>assets/images/upload/<?php echo $rowdata->foto; ?>" data-lightbox-gallery="zenda-gallery"><img src="<?php echo base_url() ?>assets/images/upload/<?php echo $rowdata->foto; ?>" alt="gallery img" style="width:200px;height:200px;"></a>
				<div>
					<h3><?php echo $rowdata->sapras ?></h3>
				</div>
			</div>
			
			<?php } ?>
		</div>
	</div>
</section>


<!-- menu section -->
<section id="menu" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1 class="heading">Sarana &amp Prasarana</h1>
				<hr>
			</div>
		</div>		
				<form action="#" id="form" class="form-horizontal" method="post">

				<div  class="col-md-3" id="cabor" name="cabor" style="float:left;">
								<label>Cabang Olah Raga :</label>
										<select name="cabor1" id="cabor1" class='form-control'>
												<option value='' disabled selected>Pilih Cabang Olahraga</option>";
												  <?php foreach ($cabor->result() as $row) {  
												  echo "<option value='".$row->cabor."'>".$row->cabor."</option>";
												  } ?>
										</select>
				</div>
				<div class="col-md-3" id="sapras" name="sapras" style="float:left;padding-left:10px;">
										<label >Sarana &amp Prasarana</label>
									<select  class='form-control' disabled>
												<option value='' disabled selected>Pilih Sarana &amp Prasarana</option>";	  
									</select>
								</div>
				

				<br><br><br>
				<div id="lat" name="lat" >
									
								</div>
			<div id="lng" name="lng" style="display: none;" >
									
								</div>
				<br><br>
		<div id="map" style="width:100%;height: 300px;"></div>
		</div>
									
								</div>
		
		<script type="text/javascript">
				$("#cabor1").change(function(){
							var selectValues = $("#cabor1").val();
							if (selectValues == 0){
								var msg = "gagal";
								$('#sapras').html(msg);
							}else{
								var cabor = {cabor:$("#cabor1").val()};
								$('#sapras').attr("disabled",true);
								$.ajax({
										type: "POST",
										url : "<?php echo site_url('master/sapras/select_sapras')?>",
										data: cabor,
										success: function(msg){
											$('#sapras').html(msg);
										}
								});
							}
					});
				   </script>
				  <script type="text/javascript">
				$("#sapras1").change(function(){
							var selectValues = $("#sapras1").val();
							if (selectValues == 0){
								var msg = "gagal";
								$('#map').html(msg);
							}else{
								var sapras = {sapras:$("#sapras1").val()};
								$('#map').attr("disabled",true);
								$.ajax({
										type: "POST",
										url : "<?php echo site_url('master/sapras/select_map')?>",
										data: sapras,
										success: function(msg){
											$('#map').html(msg);
										}
								});
							}
					});
				   </script>
		<script type="text/javascript">
		  function updateMarkerPosition(latLng) {
		  document.getElementById('lat').value = [latLng.lat()];
		  document.getElementById('lng').value = [latLng.lng()];
		  }
		  
			var myOptions = {
			  zoom: 4,
				scaleControl: true,
			  center:  new google.maps.LatLng(-4.93196,113.9551023),
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			};

		 
			var map = new google.maps.Map(document.getElementById("map"),
				myOptions);

		 var marker1 = new google.maps.Marker({
		 position : new google.maps.LatLng(-4.93196,113.9551023),
		 title : 'lokasi',
		 map : map,
		 draggable : true
		 });
		 
		 //updateMarkerPosition(latLng);

		 google.maps.event.addListener(marker1, 'drag', function() {
		  updateMarkerPosition(marker1.getPosition());
		 });
		</script>
	
	</div>
</section>		


<!-- team section -->
<section id="team" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1 class="heading">Team</h1>
				<hr>
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
				<img src="<?php echo base_url() ?>assets/images/team1.jpg" class="img-responsive center-block" alt="team img">
				<h4>Ari Putra</h4>
				<h3>Creator</h3>
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<img src="<?php echo base_url() ?>assets/images/team2.jpg" class="img-responsive center-block" alt="team img">
				<h4>Andri Fahmi</h4>
				<h3>Creator</h3>
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.9s">
				<img src="<?php echo base_url() ?>assets/images/team3.jpg" class="img-responsive center-block" alt="team img">
				<h4>Novi</h4>
				<h3>Creator</h3>
			</div>
		</div>
	</div>
</section>


<!-- contact section -->

<!-- footer section -->
<footer class="parallax-section"  id="contact" >
	<div class="container">
	<div class="col-md-offset-1 col-md-10 col-sm-12 ">
	<h1 class="heading" align="center">Contact</h1>
				<hr>
		<div class="row">
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<h2 class="heading">Contact Info.</h2>
				<div class="ph">
					<p><i class="fa fa-phone"></i> Phone</p>
					<h4>0896-5651-4492</h4>
				</div>
				<div class="address">
					<p><i class="fa fa-map-marker"></i> Our Location</p>
					<h4>Griya Parung Panjang Blok D1/J No.12</h4>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.627004449056!2d106.57645189616971!3d-6.3611617640321425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1f98133afe1ac52b!2sFarrafa+NET.!5e0!3m2!1sid!2sid!4v1485932333251" width="300" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div> 
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<h2 class="heading" style="padding-left:50px">Follow Us</h2>
				<ul class="social-icon"  style="padding-left:50px">
					<li><a href="http://www.fb.com/anbusetia" target="_blank" class="fa fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li>
					<li><a href="http://www.instagram.com/ariechemot" target="_blank" class="fa fa-instagram wow bounceIn" data-wow-delay="0.6s"></a></li>
					<li><a href="https://github.com/ariechemot" target="_blank" class="fa fa-github wow bounceIn" data-wow-delay="0.9s"></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>


<!-- copyright section -->
<section id="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h3>ENAM</h3>
				<p>Design with <i class="fa fa-heart" style="color:pink"></i>   by Ari Putra 2017 </p>
			</div>
		</div>
	</div>
</section>

<!-- JAVASCRIPT JS FILES -->	
<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.parallax.js"></script>
<script src="<?php echo base_url() ?>assets/js/smoothscroll.js"></script>
<script src="<?php echo base_url() ?>assets/js/nivo-lightbox.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/wow.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/custom.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>


</body>
</html>