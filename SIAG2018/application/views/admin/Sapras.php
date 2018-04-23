<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard Administration</title>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/images/logo.png" />

   <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<script src="<?php echo base_url() ?>assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url() ?>assets/isi/jquery/jquery-2.1.4.min.js"></script>
   <link href="<?php echo base_url('assets/isi/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/isi/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
   <link href="<?php echo base_url('assets/isi/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
   <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		
 
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url().'dashboard/index'?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>NAM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ENAM</b>Administration</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Ari Putra</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
				  <li><a href="<?php echo base_url().'dashboard/index'?>"><i class="fa fa-book"></i> <span>Information</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-suitcase"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'dashboard/provinsi'?>"><i class="fa fa-soccer-ball-o"></i> Provinsi</a></li>
            <li><a href="<?php echo base_url().'dashboard/kota'?>"><i class="fa fa-soccer-ball-o"></i>Kota</a></li>
			<li><a href="<?php echo base_url().'dashboard/cabor'?>"><i class="fa fa-soccer-ball-o"></i>Cabang Olahraga</a></li>
			<li><a href="<?php echo base_url().'dashboard/operator'?>"><i class="fa fa-soccer-ball-o"></i>Operator</a></li>
          </ul>
        </li>
        
		<li class="treeview">
          <a href="#">
            <i class="fa  fa-folder-open-o"></i> <span>Sarana &amp Prasarana</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'dashboard/jenis'?>"><i class="fa fa-soccer-ball-o"></i>Jenis Sarana &amp Prasarana</a></li>
			<li><a href="<?php echo base_url().'dashboard/sapras'?>"><i class="fa fa-soccer-ball-o"></i>Sarana &amp Prasarana</a></li>
		 </ul>
        </li>
		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'dashboard/ubahpassword'?>"><i class="fa fa-soccer-ball-o"></i> Ubah Password</a></li>
            <li><a href="<?php echo base_url().'dashboard/logout'?>"><i class="fa fa-soccer-ball-o"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
    <div class="container"><br>
	<div class="panel panel-warning">
	  <div class="panel-heading">
		<h3 class="panel-title">Sarana &amp Prasarana</h3>
	  </div>
	  <div class="panel-body">
		
        <h1 align=center>Data Sarana &amp Prasarana <i class="fa  fa-building " style="color:#fceecc"></i></h1>
        <br />
        <button class="btn btn-success" onclick="add_sapras()"><i class="glyphicon glyphicon-plus"></i>Tambah Sarana &amp Prasarana</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Refresh Data</button>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID sapras</th>
                    <th>Nama sapras</th>
					<th>Jenis </th>
					<th>Provinsi</th>
					<th>Kota</th>
					<th>Latitude</th>
					<th>Longitude</th>
					<th>Cabang Olahraga</th>
					<th>Foto</th>
					<th>Konten</th>
                    <th  style="max-width:125px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
            <tr>
					<th>ID sapras</th>
                    <th>Nama sapras</th>
					<th>Jenis</th>
					<th>Provinsi</th>
					<th>Kota</th>
					<th>Latitude</th>
					<th>Longitude</th>
					<th>Cabang Olahraga</th>
					<th>Foto</th>
					<th>Konten</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div>

	
	<script src="<?php echo base_url('assets/isi/bootstrap/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/isi/datatables/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/isi/datatables/js/dataTables.bootstrap.js')?>"></script>
	<script src="<?php echo base_url('assets/isi/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
	<script type="text/javascript">

	var save_method; //for save method string
	var table;
	var base_url = '<?php echo base_url();?>';

	$(document).ready(function() {

		//datatables
		table = $('#table').DataTable({ 

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('master/sapras/ajax_list')?>",
				"type": "POST"
			},

			//Set column definition initialisation properties.
			"columnDefs": [
				{ 
					"targets": [ -1 ], //last column
					"orderable": false, //set not orderable
				},
				{ 
					"targets": [ -2 ], //2 last column (photo)
					"orderable": false, //set not orderable
				},
			],

		});

		//datepicker

		//set input/textarea/select event when change value, remove class error and remove text help block 

	});



	function add_sapras()
	{
		save_method = 'add';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form').modal('show'); // show bootstrap modal
		$('.modal-title').text('Add Sapras'); // Set Title to Bootstrap modal title

		$('#photo-preview').hide(); // hide photo preview modal

		$('#label-photo').text('Upload Photo'); // label photo upload
	}

	function edit_sapras(id)
	{
	save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('master/sapras/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="sapras_id"]').val(data.sapras_id);
            $('[name="sapras"]').val(data.sapras);
            $('[name="jenis"]').val(data.jenis);
            //$('[name="provinsi1"]').val(data.provinsi);
            $('[name="kota"]').val(data.kota);
            $('[name="lat"]').val(data.lat);
            $('[name="lng"]').val(data.lng);
            $('[name="cabor"]').val(data.cabor);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Sapras'); // Set title to Bootstrap modal title

            $('#photo-preview').show(); // show photo preview modal

            if(data.foto)
            {
                $('#label-photo').text('Change Foto'); // label photo upload
                $('#foto-preview div').html('<img src="'+base_url+'assets/images/upload/'+data.foto+'" class="img-responsive">'); // show foto
                $('#foto-preview div').append('<input type="checkbox" name="remove_foto" value="'+data.foto+'"/> Remove foto when saving'); // remove foto

            }
            else
            {
                $('#label-foto').text('Upload foto'); // label foto upload
                $('#foto-preview div').text('(No foto)');
            }
			$('[name="konten"]').val(data.konten);


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
	}

	function reload_table()
	{
		table.ajax.reload(null,false); //reload datatable ajax 
	}

	function save()
	{
		 $('#btnSave').text('saving...'); //change button text
			$('#btnSave').attr('disabled',true); //set button disable 
			var url;

			if(save_method == 'add') {
				url = "<?php echo site_url('master/sapras/ajax_add')?>";
			} else {
				url = "<?php echo site_url('master/sapras/ajax_update')?>";
			}

			// ajax adding data to database

			var formData = new FormData($('#form')[0]);
			$.ajax({
				url : url,
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				dataType: "JSON",
				success: function(data)
				{

					if(data.status) //if success close modal and reload ajax table
					{
						$('#modal_form').modal('hide');
						reload_table();
					}
					else
					{
						for (var i = 0; i < data.inputerror.length; i++) 
						{
							$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
							$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
						}
					}
					$('#btnSave').text('save'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable 


				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Semua data harus di isi!!!');
					$('#btnSave').text('save'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable 

				}
			});
	}

	function delete_sapras(id)
	{
		if(confirm('Are you sure delete this data?'))
		{
			// ajax delete data to database
			$.ajax({
				url : "<?php echo site_url('master/sapras/ajax_delete')?>/"+id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					//if success reload ajax table
					$('#modal_form').modal('hide');
					reload_table();
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error deleting data');
				}
			});

		}
	}

	</script>
	
	<!-- Bootstrap modal -->
	<div class="modal fade" id="modal_form" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title">Insert Sarana &amp Prasarana</h3>
				</div>
				<div class="modal-body form">
					<form action="#" id="form" class="form-horizontal" method="post">
						<input type="hidden" value="" name="id"/> 
						<div class="form-body">
							
									<input name="sapras_id" class="form-control" type="hidden">
								   
							<div class="form-group">
								<label class="control-label col-md-3">Nama Sarana &amp Prasarana</label>
								<div class="col-md-9">
									<input name="sapras" placeholder="Nama Sarana &amp Prasarana" class="form-control" type="text">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Jenis Sapras</label>
									<div class="col-md-9" id="jenis" name="jenis">
										<select name='jenis' id="jenis" class='form-control'>
												<option value='' disabled selected>Pilih Jenis Sapras</option>";
												  <?php foreach ($jenis->result() as $row) {  
												  echo "<option value='".$row->jenis."'>".$row->jenis."</option>";
												  } ?>
										</select>
										
									</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Provinsi</label>
									<div class="col-md-9" id="provinsi" name="provinsi">
										<select name="provinsi1" id="provinsi1" class='form-control'>
												<option value='' disabled selected>Pilih Provinsi</option>";
												  <?php foreach ($provinsi->result() as $row) {  
												  echo "<option value='".$row->provinsi."'>".$row->provinsi."</option>";
												  } ?>
										</select>
										
									</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Kota</label>
								<div class="col-md-9" id="kota" name="kota">
									<select  class='form-control' disabled>
												<option value='' disabled selected>Pilih Kota</option>";	  
									</select>
									
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-md-3">Latitude</label>
								<div class="col-md-9">
									<input name="lat" placeholder="Latitude" class="form-control" type="text">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Longitude</label>
								<div class="col-md-9">
									<input name="lng" placeholder="Longitude" class="form-control" type="text">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Cabang Olahraga</label>
								<div class="col-md-9">
									<select name='cabor' class='form-control'>
											<option value='' disabled selected>Pilih Cabang Olahraga</option>";
											  <?php foreach ($cabor->result() as $row) {  
											  echo "<option value='".$row->cabor."'>".$row->cabor."</option>";
											  } ?>
											</select>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group" id="foto-preview">
								<label class="control-label col-md-3">Photo</label>
								<div class="col-md-9">
									(No photo)
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Foto</label>
								<div class="col-md-9">
									<input name="foto"  placeholder="Upload.." class="form-control" type="file">
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Konten</label>
								<div class="col-md-9">
									<textarea rows="4" cols="4" name="konten" placeholder="Masukan Konten" class="form-control"></textarea>
									<span class="help-block"></span>
								</div>
							</div>
						</div>

					</form>
					<script type="text/javascript">
					$("#provinsi1").change(function(){
							var selectValues = $("#provinsi1").val();
							if (selectValues == 0){
								var msg = "Kota / Kabupaten :<br><select name=\"kota\" disabled><option value=\"Pilih Kota / Kabupaten\">Pilih Propinsi Dahulu</option></select>";
								$('#kota').html(msg);
							}else{
								var provinsi = {provinsi:$("#provinsi1").val()};
								$('#kota').attr("disabled",true);
								$.ajax({
										type: "POST",
										url : "<?php echo site_url('master/sapras/select_kota')?>",
										data: provinsi,
										success: function(msg){
											$('#kota').html(msg);
										}
								});
							}
					});
				   </script>
				</div>
				<div class="modal-footer">
					<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- End Bootstrap modal -->
      <!-- /.box -->

    </section>
	  </div>
	</div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
     
    </div>
    <strong>Copyright &copy; 2017 Ari Putra.</strong> All rights
    reserved.
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() ?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/admin/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/demo.js"></script>
</body>
</html>
