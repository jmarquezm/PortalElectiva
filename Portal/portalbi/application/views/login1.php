<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Portal</title>
  
  
  
      <link rel="stylesheet" href="<?php echo base_url().'public/css/style1.css'; ?>">

  
</head>

<body>
  <div class="wrapper">
	<div class="container">
		<h1>Bienvenido</h1>
		
		<form class="form"  action="<?php echo base_url().'Usuarios/Login' ?>" method="post">
			<input type="text" id="user" name="user" placeholder="Username">
			<input type="password" id="pass" name="pass" placeholder="Password">
			<button type="submit" id="login-button">Login</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
</html>
