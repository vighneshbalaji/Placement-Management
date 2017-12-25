<form id="placementuptform" name="placementuptform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

<div class="panel panel-primary">
	<div class="panel-heading"><strong>Placement Details Update Form</strong></div>
	<div class="panel-body">

		<div class="row">
			<div class="col-sm-3">
				<div class="form-group" align="justify"> <!-- Institution -->
					<label for="plauptplacementid">Placement Id & Company</label>
					<select class="form-control" name="plauptplacementid" id="plauptplacementid" tabindex="1" onchange="viewPlacementDetails(plauptplacementid.value);" autofocus required>
					<option value="" selected>Select One</option>
					<?php
						$plaplacementidlistqr1 = "SELECT `placementid`,`companyid`,`jobinfo`,`date` FROM `placementdetails` WHERE status = 1 and `instituteid` LIKE '".$_SESSION["UserInstitute"]."%' ORDER BY `date`";
						
						if(! $plaplacementidlistres1 = $db->query($plaplacementidlistqr1)) die("Unable To connect placement update form Query 1 ");
						
						while($plaplacementidlistrow1 = $plaplacementidlistres1->fetch_assoc())
						{
							$placompanylistqr = "SELECT `companyname` FROM `company` WHERE companyid = '$plaplacementidlistrow1[companyid]'";
						
							if(! $placompanylistres = $db->query($placompanylistqr)) die("Unable To connect placement update form Query 2 ");
							
							$placompanylistrow = $placompanylistres->fetch_assoc();
					?>
					
						<option value="<?php echo $plaplacementidlistrow1["placementid"] ?>"
						title="<?php echo $plaplacementidlistrow1["placementid"]." - ".$placompanylistrow["companyname"]." - ".date("F jS, Y",strtotime($plaplacementidlistrow1["date"]))." - ".$plaplacementidlistrow1["jobinfo"]; ?>" >
						<?php echo $plaplacementidlistrow1["placementid"]." - ".$placompanylistrow["companyname"]; ?>
						</option>
						
					<?php
						}
					?>
					</select>	
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group" align="justify"> <!-- Institution -->
					<label for="plauptcompany">Company</label>
					<select class="form-control" name="plauptcompany" id="plauptcompany" tabindex="2" autofocus required>
					<option value="" selected>Select One</option>
					<?php
						$placompanylistqr3 = "SELECT `companyid`,`companyname` FROM `company`";
						
						if(! $placompanylistres3 = $db->query($placompanylistqr3)) die("Unable To connect placement update form Query 3 ");
						
						while($placompanylistrow3 = $placompanylistres3->fetch_assoc())
						{
					?>
						<option value="<?php echo $placompanylistrow3["companyid"] ?>" ><?php echo ucfirst($placompanylistrow3["companyname"]); ?></option>
					<?php
						}
					?>
					</select>	
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="plauptsslc">SSLC %</label>
					<input type="number" class="form-control" id="plauptsslc" name="plauptsslc" tabindex="3" min="0" max="100" step="1" required />
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="plaupthsc">HSC %</label>
					<input type="number" class="form-control" id="plaupthsc" name="plaupthsc" tabindex="4" min="0" max="100" step="1" required />
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label for="plauptug">UG %</label>
					<input type="number" class="form-control" id="plauptug" name="plauptug" tabindex="5" min="0" max="100" step="1" required />
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group" align="justify"> <!-- Institution -->
					<label for="plauptarrear">Arrear Students</label>
					<select class="form-control" name="plauptarrear" id="plauptarrear" tabindex="6" required>
						<option value="" selected>Select One</option>
						<option value="y">Allowed</option>
						<option value="n">Not - Allowed</option>
					</select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="plauptjobinfo">Job Information</label>
					<input type="text" class="form-control" id="plauptjobinfo" name="plauptjobinfo" tabindex="7" required />
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label for="plauptdate">Date For Placement</label>
					<input type="date" class="form-control" name="plauptdate" id="plauptdate" tabindex="8" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime("+3 months")) ?>" required />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="plauptplacementinfo">Placement Information:</label>
					<textarea class="form-control" rows="5" id="plauptplacementinfo" name="plauptplacementinfo"></textarea>
				</div>
			</div>
		</div>
	
	</div><!-- Panel 1 Body Closed -->
	<div class="panel-footer">
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group" align="right">
					<button id="plauptupdatebtn" name="plauptupdatebtn" type="submit" class="btn btn-info btn-md" tabindex="9" disabled>Update</button>
					<button id="plauptclrbtn" name="plauptclrbtn" type="reset" class="btn btn-primary btn-md" tabindex="10">Clear</button>
					<button id="plauptcnclbtn" name="plauptcnclbtn" type="button" class="btn btn-danger btn-md" tabindex="11">Cancel</button>
				</div>
			</div>
		</div>
	</div><!-- Panel 1 Footer Closed -->
	
</div> <!-- Panel 1 Closed -->

</form>