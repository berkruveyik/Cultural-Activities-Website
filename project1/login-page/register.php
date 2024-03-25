<!DOCTYPE html>
<?php 
  session_start();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		
		
	</head>
<body>
		
		
		
	<div class="signupFrm">
		<!-- Registration Form start -->
		<form method="POST" action="save_member.php"  class="form">	
			<div class="title">Registration</div>
			<a href="../index.php" class="a">Already a member? Log in here...</a>
      
			<div class="form-group">
				
				<input type="text" name="username" class="form-control" required="required" placeholder="a"/>
				<label for="" class="label">username</label>
			</div>
			<div class="form-group">
				
				<input type="password" name="password" class="form-control" required="required" placeholder="a"/>
				<label for="" class="label">password</label>
            
			
			</div>
			<div class="form-group">
				
				<input type="text" name="firstname" class="form-control" required="required" placeholder="a"/>
				<label for="" class="label">first name</label>
			</div>
			<div class="form-group">
				
				<input type="text" name="lastname" class="form-control" required="required" placeholder="a"/>
				<label for="" class="label">last name</label>

			</div>
			<?php
				//checking if the session 'success' is set. Success session is the message that the credetials are successfully saved.
        
				if(ISSET($_SESSION['success'])){
			?>
			<!-- Display registration success message -->
			<div class="alert alert-success"><?php echo $_SESSION['success']?></div>
			<?php
				//Unsetting the 'success' session after displaying the message. 
				unset($_SESSION['success']);
				}
			?>
      
			<button class="btn btn-primary btn-block" name="register"><span class="glyphicon glyphicon-save"></span> Register</button>
      
		</form>	
		<!-- Registration Form end -->
	</div>
	
</body>
<footer>
  <p style="text-align: center;">Creater by Mahir Berker Üveyik / Sefa Uygun</p>
  <p style="text-align: center;">190218500</p>
</footer>
</html>

<style>
 body {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  background-color: white;
  font-family: "lato", sans-serif;
}
.signupFrm {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}
.form {
  background-color: white;
  width: 400px;
  border-radius: 8px;
  padding: 20px 40px;
  box-shadow: 0 10px 25px rgba(92, 99, 105, .2);
}

.title {
  font-size: 50px;
  margin-bottom: 50px;
}
.form-group {
  position: relative;
  height: 45px;
  width: 90%;
  margin-bottom: 17px;
}
.form-control {
  position: absolute;
  top: 0px;
  left: 0px;
  height: 100%;
  width: 100%;
  border: 1px solid #DADCE0;
  border-radius: 7px;
  font-size: 16px;
  padding: 0 20px;
  outline: none;
  background: none;
  z-index: 1;
}

/* Hide the placeholder texts (a) */

::placeholder {
  color: transparent;
}
.label {
  position: absolute;
  top: 15px;
  left: 15px;
  padding: 0 4px;
  background-color: white;
  color: #DADCE0;
  font-size: 16px;
  transition: 0.5s;
  z-index: 0;
}
.btn {
  display: block;
  margin-left: auto;
  padding: 15px 30px;
  border: none;
  background-color: #7b3c3c;;
  color: white;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
  margin-top: 30px;
}

.btn:hover {
  background-color: #7b3c3c;;
  transform: translateY(-2px);
}
.form-control:focus + .label {
  top: -7px;
  left: 3px;
  z-index: 10;
  font-size: 14px;
  font-weight: 600;
  color: rgb(255, 166, 0);
}
.form-control:focus {
  border: 2px solid rgb(255, 153, 0);
}
.form-control:not(:placeholder-shown)+ .label {
  top: -7px;
  left: 3px;
  z-index: 10;
  font-size: 14px;
  font-weight: 600;
}

.a{
  display: block;
  margin-left: auto;
  padding: 10px 70px;
  border: none;
  background-color: #7b3c3c;;
  color: white;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
  text-decoration: none;
  margin-bottom: 50px;
}
.a:focus {
  border: 2px solid rgb(255, 153, 0);
}



.alert {
  width: 93%;
  padding: 12px 16px;
  border-radius: 4px;
  border-style: solid;
  border-width: 1px;
  margin-bottom: 12px;
  font-size: 16px;
}

.alert.alert-success {
  background-color: #7b3c3c;;
  border-color: rgba(38, 179, 3, 1);
  color: rgba(60, 118, 61, 1);
}
.shopping{
  
  margin-left: auto;
  padding: 6px 10px;
  display: block;
  background-color: #7b3c3c;;
  color: white;
  border-radius: 6px;
  cursor: pointer;
  font-size: 14px;
  text-decoration: none;
  margin-bottom: 15px;
  height: 15px;
  width: 25%;
}
</style>