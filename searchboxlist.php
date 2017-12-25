<datalist id="companies">
<?php 
			$searchlistqr = "SELECT * FROM company";
			if(! $searchlistres = $db->query($searchlistqr)) die("Unable To connect Search Query ");
			while($searchlistrows = $searchlistres->fetch_assoc())
			{
?>				<option value="<?php echo $searchlistrows["companyname"]; ?>"></option>
<?php
			}
?>
</datalist>