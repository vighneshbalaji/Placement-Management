<nav class="navbar navbar-custom">
  <div class="container-fluid">
    <div class="navbar-header">
	
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
	  
	  
	  <a id="sidenavicon" class="navbar-brand" href="javascript:void(0)">
		  <div class="container">
			<div class="bar"></div>
			<div class="bar"></div>
			<div class="bar"></div>
		  </div>
	  </a>
	  
    </div><!-- Navbar Header Closed -->
	
	<!-- navbar left side -->
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">Company <span class="caret"></span></a>
          <?php require("companylistpanel.php"); ?>
        </li>
		
		<?php
			if( ($_SESSION["LogFlg"] == 1) && ( ($_SESSION["UserType"] == "in") || ($_SESSION["UserType"] == "ad") ) )
			{
				require("institutenavoption.php");
			}
			else if( ($_SESSION["LogFlg"] == 1) && ($_SESSION["UserType"] == "st") )
			{
				require("studentnavoption.php");
			}
			
			if($_SESSION["LogFlg"] == 1)
			{
				?>
				<li><a href="resetpasswrd.php">Reset Password</a></li>
				<?php
			}
		?>
      </ul>
	  <!-- Search Box -->
	  <form class="navbar-form navbar-left" method="post" action="companydetail.php">
		  <div class="input-group">
			<input list="companies" name="usrchstr" id="usrchstr" type="search" class="form-control" placeholder="Search Company" required />
			<?php require("searchboxlist.php"); ?>
			<div class="input-group-btn">
			  <button class="btn btn-danger srchbtn" type="submit">
				<i class="glyphicon glyphicon-search"></i>
			  </button>
			</div>
		  </div>
	  </form> <!-- End Search Box -->
	  
	  <!-- Navbar Right Side -->
      <ul class="nav navbar-nav navbar-right">
	  
	  <!-- Login DropBox -->
	  <?php require("loginpanel.php"); ?>
	  
      </ul>
    </div>
  </div>
</nav>
