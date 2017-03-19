<!DOCTYPE html>
<html>
  <head>
    <title>Nyekrip Form Login</title>
	
	<!-- Skrip CSS -->
   <link rel="stylesheet" href="style.css"/>
  
  </head>	
  <body>
	<div class="container">
		<div class="main">
	      <form action="proses_login.php" method="post">
			<h2>NYEKRIP.COM FORM LOGIN DENGAN PHP</h2><hr/>		
			
			<label>Username :</label>
			<input id="name" name="username" placeholder="username" type="text">
			
			<label>Password :</label>
			<input id="password" name="password" placeholder="**********" type="password">
			
			<input type="submit" name="submit" id="submit" value="Login">
		  </form>
		</div>
   </div>

  </body>
</html>
