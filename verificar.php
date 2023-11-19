<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
    	require_once('dbconfig.php');
    	if ($_SERVER['REQUEST_METHOD'] == 'POST') {                                                              
    	$username = $_POST['user'];
    	$password = $_POST['pass'];

    	$query = "SELECT * FROM usuarios WHERE usuario = :username AND password = :password";
    	$stmt = $dbh->prepare($query);
    	$stmt->bindParam(':username', $username, PDO::PARAM_STR);
    	$stmt->bindParam(':password', $password, PDO::PARAM_STR);
    	$stmt->execute();

    	$count = $stmt->rowCount();

   		 if ($count > 0) {
			echo "<script>
            		localStorage.setItem('user', '" . $username . "');
            		window.location.href = 'main.html';
          		</script>";
            		
		} else {
        		$error_message = "Usuario o contraseña incorrectos.";
  			echo '<script>
			localStorage.clear();
  			userName=undefined;
			</script>';
		};
	}
?>
<!DOCTYPE html>
<!-- saved from url=(0049)https://getbootstrap.com/docs/4.3/examples/album/ -->
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>eMercado - Todo lo que busques está aquí</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/album/">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="https://almacenamientorecursosweb.s3.amazonaws.com/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://almacenamientorecursosweb.s3.amazonaws.com/css/styles.css" rel="stylesheet">
  <style>
    html, body{
      height: 100%;
    }

    body {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }
  </style>
</head>
<body class="text-center">
 <?php
    if (isset($error_message)) {
        echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
        <strong>$error_message</strong> 
        </div>";
    }
    ?>
  <div class="container p-5">
      <hr>
      <p class="mb-0">      
        <form action="verificar.php" method="POST">
            <p>Usuario <input type="text" placeholder="Ingrese aquí su usuario" class="form-control" name="user" required="true" id="username" ></p>
            <p>Contraseña<input type="password" placeholder="Ingrese aquí su contraseña" class="form-control" name="pass" required="true" id="password" ></p>
            <p><input type="submit" name="btn-login" class="btn btn-primary btn-lg" value="Iniciar sesión" id="idBtnLogin">
            </form>
           <a href="registro.html">
	    <input type="submit" name="btn-login" class="btn btn-primary btn-lg" value="Registrarse"></p>
      	   </a>
	   </p>
  </div>
</body>
</html>
