<?php $tempinstituteid = "in1"; ?>

<div class="panel-group">
	<div class="row">
		<div class="col-sm-12">
		  <div class="panel panel-primary">
			<div class="panel-heading" style="background-color: darkslategrey;">
				<img src="institutedetails/<?php echo $tempinstituteid."/".$tempinstituteid.".png" ?>" alt="KGCAS" class="img-responsive" style="height: 60px;" />
			</div>
			<div class="panel-body">
				 <?php require("php/institutefileread.php") ?>
			</div>
		  </div>
		</div>
		
	</div>
</div>