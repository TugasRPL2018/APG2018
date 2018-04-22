<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>ENAM</title>
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/images/logo.png" />

  
  <link rel='stylesheet prefetch' href='<?php echo base_url()?>assets/login/bootstrap.min.css'>

      <link rel="stylesheet" href="<?php echo base_url()?>assets/login/style.css">

  
</head>

<body background="<?php echo base_url() ?>assets/images/login-bg.jpg" style="background-size:cover;">
    <div class="wrapper">
    <form class="form-signin" action="<?php echo base_url();?>login/do_login" method="post">       
      <h2 class="form-signin-heading" align="center">  <img src="<?php echo base_url() ?>assets/images/logo.png" style="max-width:50px;max-height:50px;"/>ENAM</h2>
      <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" /><br>
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   <br>
      <a href="<?php echo base_url();?>enam/index">Back To Home Page</a>   

    </form>
  </div>
  
  
</body>
</html>
