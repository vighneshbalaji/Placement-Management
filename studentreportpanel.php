<?php
	$tempinstituteid = "in".substr($_SESSION["UserId"],2);
	
	$institutedetailqr1 = "SELECT `departmentname`,`years` FROM `departmentinfo` WHERE instituteid = '$tempinstituteid' ORDER BY `departmentname`";
						
	if(! $institutedetailresult1 = $db->query($institutedetailqr1)) die("Unable To connect Search Query 1 ");
	
	$institutedetailqr2 = "SELECT MAX(`sections`) as `sections` FROM `departmentinfo` WHERE instituteid = '$tempinstituteid'";
						
	if(! $institutedetailresult2 = $db->query($institutedetailqr2)) die("Unable To connect Search Query 1 ");
	
	$tabindex = 1;
?>

<form id="studentreportform" name="studentreportform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

<div class="panel panel-primary">
	<div class="panel-heading">Student Report Generate</div>			
	<div class="panel-body">
		<div class="form-group row">
		
			<div class="col-sm-3">
				<label for="stureportyearofjoin">Year Of Join</label>
				<input type="month" class="form-control" name="stureportyearofjoin" id="stureportyearofjoin" tabindex="<?php echo $tabindex++; ?>" step="12"
				max="<?php if(date("m") < 6) echo (date("Y") - 3); else echo (date("Y") - 2); ?>-06" 
				min="2000-06" />
			</div>
		
			<div class="col-sm-6">
		
			<label for="stureportdepartment">Department</label><br />
				<?php
					while($institutedetailrow1 = $institutedetailresult1->fetch_assoc())
					{				
				?>
						<label class="checkbox-inline">
						<input name="stureportdepartment[]" id="stureportdepartment[]" class="form-check-input" type="checkbox" value="<?php echo $institutedetailrow1["departmentname"];?>" tabindex="<?php echo $tabindex++; ?>" /><?php echo strtoupper($institutedetailrow1["departmentname"]); ?>
						</label>
				<?php
					}
				?>
				
			</div>
			
			<div class="col-sm-3">
				<label for="stureportsection">Section</label><br />
				<?php
					$institutedetailrow2 = $institutedetailresult2->fetch_assoc();
					for($i = 0; $i < $institutedetailrow2["sections"]; $i++)			
					{
				?>
						<label class="checkbox-inline">
						<input name="stureportsection[]" id="stureportsection[]" class="form-check-input" type="checkbox" tabindex="<?php echo $tabindex++; ?>" value="<?php echo chr(97+$i);?>"><?php echo chr(65+$i); ?>
						</label>
				<?php
					}
				?>
			</div>
			
		</div> <!-- End form-group and row div -->
	</div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">Marks and Arrear</div>			
	<div class="panel-body" style="padding-top: 0px; padding-bottom: 0px;">
	
		<div class="form-group row" style="margin-top: 10px;">
		
			<div class="col-sm-6">
				<label for="studentreportarrear">Arrear - Non Arrear</label><br /><br />
					<select class="form-control" name="studentreportarrear" id="studentreportarrear" tabindex="<?php echo $tabindex++; ?>" >
						<option value="" selected>ALL</option>
						<option value="y">Arrear Student</option>
						<option value="n">Non - Arrear Student</option>
				</select>
			</div>
			
			<div class="col-sm-6">
				<label for="studentreportug">UG</label><br /><br /><br />
				<div id="studentreportug" style="margin-left: 10px; margin-right: 10px;"></div>
				<input type="hidden" name="studentreportughid[0]" id="studentreportughid[0]" value="5" />
				<input type="hidden" name="studentreportughid[1]" id="studentreportughid[1]" value="5" />
			</div> 
			</div>
			
			<div class="form-group row" style=" margin-top: 25px;">			
			<div class="col-sm-6">
				<label for="studentreporthsc">HSC</label><br /><br /><br />
				<div id="studentreporthsc" style="margin-left: 10px; margin-right: 10px;"></div>
				<input type="hidden" name="studentreporthschid[0]" id="studentreporthschid[0]" />
				<input type="hidden" name="studentreporthschid[1]" id="studentreporthschid[1]" />
			</div>
			
			<div class="col-sm-6">
				<label for="studentreportsslc">SSLC</label><br /><br /><br />
				<div id="studentreportsslc" style="margin-left: 10px; margin-right: 10px;"></div>
				<input type="hidden" name="studentreportsslchid[0]" id="studentreportsslchid[0]" />
				<input type="hidden" name="studentreportsslchid[1]" id="studentreportsslchid[1]" />
			</div>
			
			<script type='text/javascript'>
				 var tabindex = parseInt(<?php echo $tabindex; ?>);			
			</script>
			<script src="js/nouislider-create.js"></script>
			<?php $tabindex += 6; ?>
			
		</div> <!-- End form-group and row div -->
	</div>
	<div class="panel-footer">
		<div class="row">
			<div class="col-sm-12">
				<div align="right">
					<button id="studentreportgeneratebtn" name="studentreportgeneratebtn" type="submit" tabindex="<?php echo $tabindex++; ?>" class="btn btn-info btn-md" >Generate</button>				
					<button id="studentreportclrbtn" name="studentreportclrbtn" type="reset" tabindex="<?php echo $tabindex++; ?>" class="btn btn-primary btn-md" >Clear</button>
					<button id="studentreportcnclbtn" name="studentreportcnclbtn" type="button" tabindex="<?php echo $tabindex++; ?>" class="btn btn-danger btn-md" >Cancel</button>				
				</div>
			</div>
		</div>
	</div>
</div>

</form>