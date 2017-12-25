<form id="placementremoveform" name="placementremoveform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

<div class="panel panel-primary">
	<div class="panel-heading">Placement Details Remove</div>			
	<div class="panel-body">
		<div class="form-group row">
		
			<div class="col-sm-6">
				<label for="plaremoveplacementid">Placement Id & Company</label>
					<select class="form-control" name="plaremoveplacementid" id="plaremoveplacementid" tabindex="1" autofocus required>
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
		
			<div class="col-sm-6 plaremovebtns" align="right">
					<button id="plaremovermvbtn" name="plaremovermvbtn" type="submit" tabindex="2" class="btn btn-info btn-md" >Remove</button>				
					<button id="plaremoveclrbtn" name="plaremoveclrbtn" type="reset" tabindex="3" class="btn btn-primary btn-md" >Clear</button>
					<button id="plaremovecnclbtn" name="plaremovecnclbtn" type="button" tabindex="4" class="btn btn-danger btn-md" >Cancel</button>		
			</div>

		</div> <!-- End form-group and row div -->
	</div>
</div>

</form>