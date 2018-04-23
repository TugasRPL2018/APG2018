								<label>Sarana &amp Prasarana :</label>
								
								<select name='sapras1' id='sapras1' class='form-control' >
												<option value='' disabled selected>Pilih Sarana &amp Prasarana</option>";
												  <?php foreach ($option_sapras->result() as $row) {  
												  echo "<option value='".$row->sapras."'>".$row->sapras." | ".$row->provinsi."</option>";
												  } ?>
										</select>
						<script type="text/javascript">
				$("#sapras1").change(function(){
							var selectValues = $("#sapras1").val();
							if (selectValues == 0){
								var msg = "gagal";
								$('#lat').html(msg);
							}else{
								var sapras = {sapras:$("#sapras1").val()};
								$('#lat').attr("disabled",true);
								$.ajax({
										type: "POST",
										url : "<?php echo site_url('master/sapras/select_map')?>",
										data: sapras,
										success: function(msg){
											$('#lat').html(msg);
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
								$('#lng').html(msg);
							}else{
								var sapras = {sapras:$("#sapras1").val()};
								$('#lng').attr("disabled",true);
								$.ajax({
										type: "POST",
										url : "<?php echo site_url('master/sapras/select_map')?>",
										data: sapras,
										success: function(msg){
											$('#lng').html(msg);
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
								$('#nama').html(msg);
							}else{
								var sapras = {sapras:$("#sapras1").val()};
								$('#nama').attr("disabled",true);
								$.ajax({
										type: "POST",
										url : "<?php echo site_url('master/sapras/select_map')?>",
										data: sapras,
										success: function(msg){
											$('#nama').html(msg);
										}
								});
							}
					});
				   </script>