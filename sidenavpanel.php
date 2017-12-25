
<!-- User Details & Help, Side Navigation -->
	
		<div id="mySidenav" class="sidenav">
		  <a href="javascript:void(0)" id="closeBtn" class="closebtn">&times;</a>
		  <?php if($_SESSION["LogFlg"] == 1) 
		    {		  
		  ?>
				<img src="<?php
				if(file_exists("profilephoto/".$_SESSION["UserId"].".jpg"))
					echo "profilephoto/".$_SESSION["UserId"].".jpg";
				else 
					echo "profilephoto/placeholder-profile.jpg";
				?>" class="profile-photo" alt="<?php echo $_SESSION["UserName"]; ?>" />
				<a href="javascript:void(0)"><?php echo ucfirst($_SESSION["UserName"]); ?></a>
		  <?php
				if($_SESSION["UserType"] == "st")
				{
					?>
					<a id="mysidenavdropdowntitleforprdet" href="javascript:void(0)">Personal Details <span class="caret"></span></a>
					<div id="mysidenavdropdownforprdet">
							<a style="font-size: 12pt;" href="studentstuupdate.php">Personal Details Update</a>
							<a style="font-size: 12pt;" href="studentfiles.php">Personal Files Upload</a>				
					</div>					
					<?php
				}
				else if(($_SESSION["UserType"] == "in") || ($_SESSION["UserType"] == "ad"))
				{
					?>
					<a id="mysidenavdropdowntitleforstudet" href="javascript:void(0)">Student Details <span class="caret"></span></a>
					<div id="mysidenavdropdownforstudet">
							<a style="font-size: 12pt;" href="studentregister.php">Student Registration</a>
							<a style="font-size: 12pt;" href="studentupdate.php">Student Update Details</a>				
					</div>
					<a id="mysidenavdropdowntitleforpladet" href="javascript:void(0)">Placement Details <span class="caret"></span></a>
					<div id="mysidenavdropdownforpladet">
							<a style="font-size: 12pt;" href="placementregister.php">On-Campus Details Registration</a>
							<a style="font-size: 12pt;" href="placementupdate.php">On-Campus Details Update</a>
							<a style="font-size: 12pt;" href="placementremove.php">On-Campus Details Remove</a>
							<a style="font-size: 12pt;" href="placementresultupdate.php">Placement Result Update</a>
							<a style="font-size: 12pt;" href="placementresultcorrection.php">Placement Result Correction</a>
					</div>
					<a id="mysidenavdropdowntitleforreportgen" href="javascript:void(0)">Student Details <span class="caret"></span></a>
					<div id="mysidenavdropdownforreportgen">
							<a style="font-size: 12pt;" href="studentreport.php">Student Report</a>
							<a style="font-size: 12pt;" href="placementreport.php">Placement Report</a>
							<a style="font-size: 12pt;" href="placementresultreport.php">Placement Result Report</a>			
					</div>
					<a id="mysidenavdropdowntitleformateup" href="javascript:void(0)">Company Details<span class="caret"></span></a>
					<div id="mysidenavdropdownformateup">
							<a style="font-size: 12pt;" href="companyregister.php">Company Registration</a>
							<a style="font-size: 12pt;" href="companydetailupload.php">Company Details Upload</a>
							<a style="font-size: 12pt;" href="materialupload.php">Material upload</a>
					</div>
					<a id="mysidenavdropdowntitleforcompanyup" href="javascript:void(0)">Institute<span class="caret"></span></a>
					<div id="mysidenavdropdownforcompanyup">
						<a style="font-size: 12pt;" href="institutedetailupload.php">Institute Details Upload</a>
					</div>
					<?php
				}
				?>
				<a href="resetpasswrd.php">Reset Password</a>
				<?php
			}
		  ?>
		  <a id="mysidenavdropdowntitleforcompany" href="javascript:void(0)">Company <span class="caret"></span></a>
					<div id="mysidenavdropdownforcompany">
							<?php
								$companylistqr = "SELECT * FROM company";
								
									if(! $companylistres = $db->query($companylistqr)) die("Unable To connect Search Query ");
									while($companylistrows = $companylistres->fetch_assoc())
									{
							?>
										<a style="font-size: 12pt;" href="companydetail.php?usrchstr=<?php echo $companylistrows["companyname"]; ?>"><?php echo $companylistrows["companyname"]; ?></a>
							<?php
									}
							?>
					</div>					
		 <a href="aboutme.php">About</a>
		</div>
	
	
<!-- Closed User Details & Help -->


<div id="mask" class="sidenavmask"></div>