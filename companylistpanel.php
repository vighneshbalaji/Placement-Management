<ul class="dropdown-menu">
	<?php
		$companylistqr = "SELECT * FROM company";
		
			if(! $companylistres = $db->query($companylistqr)) die("Unable To connect Search Query ");
			while($companylistrows = $companylistres->fetch_assoc())
			{
	?>
				<li><a href="companydetail.php?usrchstr=<?php echo $companylistrows["companyname"]; ?>"><?php echo $companylistrows["companyname"]; ?></a></li>
	<?php
			}
	?>
</ul>