<form id="studentplacementregform" name="studentplacementregform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="panel-group myregular-font">
	<div class="row">
		<div class="col-sm-12">
			<div class="well well-sm text-center"><a href="companydetail.php?usrchstr=<?php echo $placompanyrow["companyname"]; ?>" class="pla-company-a"><?php echo $placompanyrow["companyname"]; ?></a> Placement Drive - <?php echo date("F jS, Y",strtotime($plaplacementdetailrow["date"])); ?></div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-8">
		  <div class="panel panel-primary">
			<div class="panel-heading" style="background-color: #2e208f;">
				<div class="row">
					<div class="col-sm-12" style="font-weight: bold;">
						<div class="row">
							<div class="col-sm-12">
							<center><strong>Company Requirements</strong></center>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<hr class="rem-hr" />
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								Eligiblity :
								<?php 
									$eligible = false;
									if( ($plastudentdetailrow1["SSLC"] >= $plaplacementdetailrow["SSLC"]) and ($plastudentdetailrow1["HSC"] >= $plaplacementdetailrow["HSC"]) and ($plastudentdetailrow1["UG"] >= $plaplacementdetailrow["UG"]) )
									{
										$eligible = ($plaplacementdetailrow["arrear"] == "n") ? ( ($plastudentdetailrow1["arrear"] == "n") ? true : false ) : true ;
									
									}
									if($eligible)
										echo "<span style='color: #71ff71;'>Eligible</span>";
									else
										echo "<span style='color: #ffa000; font-weight: bold;'>NOT Eligible</span>";
								?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<hr class="rem-hr" />
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<strong style="color: #70dfff;">Qualification - </strong>
							</div>
							<div class="col-sm-2">
								<strong> <span style="color: #deca41;"> SSLC </span> <?php echo $plaplacementdetailrow["SSLC"]."%"; ?> </strong>
							</div>
							<div class="col-sm-2">
								<strong> <span style="color: #deca41;"> HSC </span> <?php echo $plaplacementdetailrow["HSC"]."%"; ?> </strong>		
							</div>
							<div class="col-sm-2">
								<strong> <span style="color: #deca41;"> UG </span> <?php echo $plaplacementdetailrow["UG"]."%"; ?> </strong>		
							</div>
						</div>		
						<div class="row">
							<div class="col-sm-12">
								<hr class="rem-hr" />
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<strong> <span style="color: #deca41;">Arrear : </span> <?php if($plaplacementdetailrow["arrear"] == "y") echo "<span style='color: #71ff71;'>Allowed</span>"; else echo "<span style='color: #ff7777;'>Not - Allowed</span>"; ?> </strong>
							</div>
							<div class="col-sm-6">
								<strong> <span style="color: #deca41;">Job Profile : </span>  <?php echo ucwords($plaplacementdetailrow["jobinfo"]); ?> </strong>
							</div>
						</div>
					</div>					
				</div>
			</div>
			<div class="panel-body pla-placement-detail-body"><p align="justify"><?php echo $details; ?></p></div>
			<div class="panel-footer">
			<?php
				if( ($eligible) && (($res1->num_rows) != 1) )
				{
					?>
					<div class="row">
						<div class="col-sm-12">
								Do You Want Register For this Drive? 
								<input type="button" id="stuplaregyesbtn" name="stuplaregyesbtn" class="btn btn-success btn-sm" value="Yes" />
								<input type="button" id="stuplaregnobtn" name="stuplaregnobtn" class="btn btn-danger btn-sm" value="No" />
						</div>
					</div>
					<?php
				}
				else if($eligible)
				{
					?>
					<div class="row">
						<div class="col-sm-12">
							Do You Want Edit? 
							<input type="button" id="stuplauptyesbtn" name="stuplauptyesbtn" class="btn btn-success btn-sm" value="Yes" />
							<input type="button" id="stuplauptnobtn" name="stuplauptnobtn" class="btn btn-danger btn-sm" value="No" />
						</div>
					</div>
					<?php
				}
			?>
			</div>
		  </div>
		</div>
		<div class="col-sm-4">
		  <div id="stuplaregappdiv" name="stuplaregresorappdiv" class="panel panel-primary">
		  
			<div class="panel-heading">
				Lastest Aptitude Material For <?php echo $placompanyrow["companyname"]; ?> Company:
			</div>
			<div class="panel-body pla-material-panel-body">
				<div id="CompanyAppFilesTree" class="demo pla-material-panel-body-demo"></div>
			</div>
			<div class="panel-footer">
				<div class="form-group">
					<a href="javascript:void(0)" id="appfilelink" name="appfilelink" download>
						<button type="button" class="btn btn-info btn-block" id="filebuttondownload" name="filebuttondownload" tabindex="4" disabled>
							<span class="glyphicon glyphicon-cloud-download"></span>
						</button>
					</a>
				</div>
			</div>
		  </div>
		  <div id="stuplaregresdiv" name="stuplaregresdiv" class="panel panel-primary">
		
			<div class="panel-heading"><strong>Students Files</strong></div>
			<div class="panel-body">
					<div id="StudentFilesTree" class="demo" style="height: 230px;"></div>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							Choose Resume File : <span id="stuplaregresfilename" name="stuplaregresfilename"></span>
							<input type="hidden" id="stuplaregresfile" name="stuplaregresfile" />
							<input type="hidden" id="stuplaregplacementid" name="stuplaregplacementid" value="<?php echo $placementid; ?>"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							Are You Sure?<br />
							<?php if( ($eligible) && (($res1->num_rows) != 1) ) { ?>
							<input type="submit" id="stuplaregregisterbtn" name="stuplaregregisterbtn" class="btn btn-success btn-sm" value="Register" disabled />
							<?php } else if($eligible){ ?>
							<input type="submit" id="stuplaregupdatebtn" name="stuplaregupdatebtn" class="btn btn-success btn-sm" value="Update" disabled />
							<?php } ?>
							<input type="button" id="stuplaregcnclbtn" name="stuplaregcnclbtn" class="btn btn-danger btn-sm" value="Cancel" />
						</div>
					</div>
				</div>
			</div>
		  </div>
		  
		</div>
	</div>
</div>

</form>