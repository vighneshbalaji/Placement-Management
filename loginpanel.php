<?php 
	if($_SESSION["LogFlg"] == 1)
	{		  
?>
		<!-- UserName & Logout option -->
		
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)"><?php echo ucfirst($_SESSION["UserName"]); ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="database/logout.php">Logout</a></li>
          </ul>
        </li>
	  
<?php
	}
	else{
?>
	  <!-- Login DropDown Box-->
	  
		<li class="dropdown"> 
          <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Login <span class="caret"></span></a>
          <ul id="login-box" class="dropdown-menu">
            <li>
				<div class="row">
					<div class="col-sm-12">
					
 <?php 
	if($_SESSION["LogFlg"] == -1) 
	{
		echo "<p style='color: #ff0000; word-spacing: 5px; font-weight: bold;'>Username or Password Wrong</p>"; 
		?>
		<script type='text/javascript'> alertBoxInStuUpdate("<span style='color: #ff0000; word-spacing: 12pt; font-family: courier new; font-weight: bold;'>Username or Password Wrong</span>"); </script>
		<?php
		$_SESSION["LogFlg"] = 0; 
	} 
 ?>
						
						<form name="login" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
						
							<div class="form-group" align="justify"> <!-- User Type -->
							<label for="lusrtype" style="font-family: Bookman Old Style; color: #EF7421;">User Type</label>
							<select class="form-control" tabindex="1" name="lusrtype" id="lusrtype" autofocus required>
							<option value="" selected>Select One</option>
							<option value="in">Institution</option>
							<option value="st">Student</option>
							<option value="ad">Admin</option>
							</select>
							</div>

							<div class="input-group"> <!-- User Email Address -->
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" tabindex="2" class="form-control" name="lusrid" id="lusrid" size="30" pattern="^[a-zA-Z][A-Za-z0-9]+" placeholder="User Id" required />
							</div>

							<div class="input-group"> <!-- User Password -->
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" tabindex="3" title="Password" class="form-control" name="lusrpass" id="lusrpass" class="usrpasseye" size="30" placeholder="User Password" required />
							<div class="input-group-btn">
								   <button class="btn btn-default" style="height: 34px;" type="button" onmousedown="showPass(leyepass,lusrpass);" onmouseup="showPass(leyepass,lusrpass);" >
									<i name="leyepass" id="leyepass" class="glyphicon glyphicon-eye-open"></i>
								   </button>
							</div>
							</div>
							<div class="help-block text-right"><a href="forgetpasswrd.php">Forget the password ?</a></div>
							
							<div class="bottom">	<!-- Login Button -->
							<input type="submit" tabindex="4" class="login-button center-block" name="loginbtn" id="loginbtn" value="Login"\ />
							</div>
							
						</form>
						
					</div><!-- Closed Login div col-sm-12 -->
				</div> <!-- Closed Login div row -->
				
			</li> <!-- Closed Login DropDown li -->
          </ul> <!-- Closed Login DropDown ul -->
		  
        </li><!-- Closed Login DropDown Box -->
<?php
}
?>
