									<?php foreach ($option_map->result() as $row) {  ?>
									
									<h1><br><center><?php echo $row->sapras; ?><hr></h1>
									<img src="<?php base_url() ?>assets/images/upload/<?php echo $row->foto ?>" width="20%" height="20%" style="float:right">
									<p><b>Nama Sarana &amp Prasarana : <?php echo $row->sapras; ?></p>
									<p><b>Cabang Olahraga : <?php echo $row->cabor; ?></p>
									<p><b>Provinsi Sarana &amp Prasarana : <?php echo $row->provinsi; ?></p>
									<p><b>Kota Sarana &amp Prasarana : <?php echo $row->kota; ?></p>
									<p><b>Lokasi : <?php echo $row->lat." , ". $row->lng ?></p>
									
									<p><?php echo $row->konten; ?></p>

									

										<script type="text/javascript">
										  function updateMarkerPosition(latLng) {
										  document.getElementById('lat').value = [latLng.lat()];
										  document.getElementById('lng').value = [latLng.lng()];
										  }
										  
											var myOptions = {
											  zoom: 15,
												scaleControl: true,
											  center:  new google.maps.LatLng(<?php echo "$row->lat, $row->lng"; ?>),
											  mapTypeId: google.maps.MapTypeId.ROADMAP
											};

										 
											var map = new google.maps.Map(document.getElementById("map"),
												myOptions);

										 var marker1 = new google.maps.Marker({
										 position : new google.maps.LatLng(<?php echo "$row->lat, $row->lng"; ?>),
										 title : 'lokasi',
										 map : map,
										 draggable : true
										 });
										 
										 //updateMarkerPosition(latLng);

										 google.maps.event.addListener(marker1, 'drag', function() {
										  updateMarkerPosition(marker1.getPosition());
										 });
										</script>

									<?php } ?>