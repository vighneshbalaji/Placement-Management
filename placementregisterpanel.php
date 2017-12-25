<?php
	$placementinfo = "Reporting Time: \n\nVenue: \n\nInterview Phases: \n\n\nJob Profile \na) Job Profile: \nb) Work Location: \nc) Salary: \n".PHP_EOL."Required Documents: ".PHP_EOL."Resume - 2 Copies.".PHP_EOL."All Mark Sheets - Xerox - 2 Copies. ".PHP_EOL."Two Passport Size Photo.".PHP_EOL."Govt. ID proof - Xerox - 2 Copies. ";
?>
<form id="placementregform" name="placementregform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

<div class="panel panel-primary">
	<div class="panel-heading"><strong>Placement Details Registration Form</strong></div>
	<div class="panel-body">
	
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group" align="justify"> <!-- Institution -->
					<label for="plaregcompany">Company</label>
					<select class="form-control" name="plaregcompany" id="plaregcompany" tabindex="1" autofocus required>
					<option value="" selected>Select One</option>
					<?php
						$placompanylistqr1 = "SELECT `companyid`,`companyname` FROM `company`";
						
						if(! $placompanylistres1 = $db->query($placompanylistqr1)) die("Unable To connect placement registration form Query 1 ");
						
						while($placompanylistrow1 = $placompanylistres1->fetch_assoc())
						{
					?>
						<option value="<?php echo $placompanylistrow1["companyid"] ?>" ><?php echo ucfirst($placompanylistrow1["companyname"]); ?></option>
					<?php
						}
					?>
					</select>	
				</div>
			</div>
			
			<div class="col-sm-3">
				<div class="form-group">
					<label for="plaregsslc">SSLC %</label>
					<input type="number" class="form-control" id="plaregsslc" name="plaregsslc" tabindex="2" min="0" max="100" step="1" required />
				</div>
			</div>		
			
			<div class="col-sm-3">
				<div class="form-group">
					<label for="plareghsc">HSC %</label>
					<input type="number" class="form-control" id="plareghsc" name="plareghsc" tabindex="3" min="0" max="100" step="1" required />
				</div>
			</div>		
			
			<div class="col-sm-3">
				<div class="form-group">
					<label for="plaregug">UG %</label>
					<input type="number" class="form-control" id="plaregug" name="plaregug" tabindex="4" min="0" max="100" step="1" required />
				</div>
			</div>
			
		</div>
		
		<div class="row">
		
			<div class="col-sm-4">
				<div class="form-group" align="justify"> <!-- Institution -->
					<label for="plaregarrear">Arrear Students</label>
					<select class="form-control" name="plaregarrear" id="plaregarrear" tabindex="5" required>
						<option value="" selected>Select One</option>
						<option value="y">Allowed</option>
						<option value="n">Not - Allowed</option>
					</select>
				</div>
			</div>
			
			<div class="col-sm-4">
				<div class="form-group">
					<label for="plaregjobinfo">Job Information</label>
					<input type="text" class="form-control" id="plaregjobinfo" name="plaregjobinfo" tabindex="6" required />
				</div>
			</div>
			
			<div class="col-sm-4">
				<div class="form-group">
					<label for="plaregdate">Date For Placement</label>
					<input type="date" class="form-control" name="plaregdate" id="plaregdate" tabindex="7" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime("+3 months")) ?>" required />
				</div>
			</div>
			
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="plaregplacementinfo">Placement Information:</label>
					<textarea class="form-control" rows="5" id="plaregplacementinfo" name="plaregplacementinfo" tabindex="8"><?php echo $placementinfo; ?></textarea>
				</div>
			</div>
		</div>
		
	</div> <!-- Panel 1 Body Closed -->
	
	<div class="panel-footer">
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group" align="right">
					<button id="plaregregisterbtn" name="plaregregisterbtn" type="submit" class="btn btn-info btn-md" tabindex="9">Register</button>
					<button id="plaregclrbtn" name="plaregclrbtn" type="reset" class="btn btn-primary btn-md" tabindex="10">Clear</button>
					<button id="plaregcnclbtn" name="plaregcnclbtn" type="button" class="btn btn-danger btn-md" tabindex="11">Cancel</button>
				</div>
			</div>
		</div>
	</div><!-- Panel 1 Footer Closed -->
	
</div> <!-- Panel 1 Closed -->

</form>