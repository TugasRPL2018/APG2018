									<select name='kota' id='kota' class='form-control' >
												<option value='' disabled selected>Pilih Kota</option>";
												  <?php foreach ($option_kota->result() as $row) {  
												  echo "<option value='".$row->kota."'>".$row->kota."</option>";
												  } ?>
										</select>
										