<?php
	if(isset($_REQUEST["plaresultreportgeneratebtn"]))
	{
		require('plugin/pdf/mysql_report.php');

		$pdf = new PDF('P','pt','A4');
		$pdf->SetFont('Arial','',10);
		
		
		$host = 'localhost';
		$username = 'root';
		$password = '';
		$database = 'placement';

		$pdf->connect($host, $username, $password, $database);
		
		 
		 /* SELECT c.`companyname` ,`p`.`SSLC`,`p`.`HSC`,`p`.`UG`,p.arrear,`p`.`jobinfo`,`p`.`date` from placementdetails as p INNER JOIN company as c on c.companyid = p.companyid and p.placementid = 5 */
		 
		$qr = "SELECT c.`companyname` as `CompanyName`,`p`.`SSLC` as `SSLC`,`p`.`HSC` as `HSC`,`p`.`UG` as `UG`,if(p.`arrear` = 'y','Allowed','NOT - Allowed') as `Arrear`,`p`.`jobinfo` as `Job`,`p`.`date` as `PlacementDate` from placementdetails as p INNER JOIN company as c on c.companyid = p.companyid and p.placementid = '$_REQUEST[plaresultreportplacementid]'";
		if(! $res = $db->query($qr)) die("Unable To connect Placement Report Query ");
			
		$rows = $res->fetch_assoc();
		
		$title1 = $rows["CompanyName"]." DRIVE - ".$rows["Job"]." - ".date("d/m/Y",strtotime($rows["PlacementDate"]));
		$title2 = "            Qualification: UG - ".$rows["UG"]."%"." HSC - ".$rows["HSC"]."%"." SSLC - ".$rows["SSLC"]."%";
		$title3 = " Arrear - ".$rows["Arrear"];
		
		$attr = array('titleFontSize'=>10, 'titleText'=>$title1.$title2.$title3);
		
		
		/* SELECT s.`studentname` as `NAME`, S.`SSLC` AS `SSLC`,S.`HSC` AS `HSC`,S.`UG` AS `UG`,IF(S.`arrear` = 'y','Yes','None') AS `Arrear`
		FROM `student` as s
		INNER JOIN `placementdetails` as p on s.`UG` >= p.`UG` and s.`SSLC` >= p.`SSLC` and s.`hsc` >= p.`HSC` 
		and s.`arrear` LIKE IF(p.`arrear` <> 'y','n','_') and p.`placementid` = 8 
		LEFT JOIN `placementresult` as t on s.`studentid` = t.`studentid` and t.`placementid` = 8 
		WHERE t.`placementid` IS NOT NULL and s.`studentid` LIKE 's115csb_'
		 */
		
		$sql_statement = 
		"SELECT s.`studentid` AS `Student ID`, s.`studentname` as `NAME`, S.`SSLC` AS `SSLC`,S.`HSC` AS `HSC`,S.`UG` AS `UG`,IF(S.`arrear` = 'y','Yes','None') AS `Arrear`
		FROM `student` as s
		INNER JOIN `placementdetails` as p on s.`UG` >= p.`UG` and s.`SSLC` >= p.`SSLC` and s.`hsc` >= p.`HSC` 
		and s.`arrear` LIKE IF(p.`arrear` <> 'y','n','_') and p.`placementid` = '$_REQUEST[plaresultreportplacementid]'
		LEFT JOIN `placementresult` as t on s.`studentid` = t.`studentid` and t.`placementid` = '$_REQUEST[plaresultreportplacementid]'
		WHERE ";
		
		$stuid = "s".substr($_SESSION["UserId"],2);
		$whrclause = "";
		
		if(! empty($_REQUEST["plaresultreportplanoplaopt"]))
		{
			if($_REQUEST["plaresultreportplanoplaopt"] == "y")
			{
				$whrclause .= "t.`placementid` IS NOT NULL AND ";
			}
			else
			{
				$whrclause .= "t.`placementid` IS NULL AND ";
			}
		}		
		
		if(! empty($_REQUEST["plaresultreportyearofjoin"]))
		{
			$year = substr($_REQUEST["plaresultreportyearofjoin"],2,2);
		
			$stuid .= $year;			
						
			if(!empty($_REQUEST["plaresultreportdepartment"])) {
				
				foreach ($_REQUEST["plaresultreportdepartment"] as $department){
					if(!empty($_REQUEST["plaresultreportsection"])) {
						foreach ($_REQUEST["plaresultreportsection"] as $section){
							$whrclause .= "s.`studentid` LIKE '".$stuid.$department.$section."%"."' OR ";
						}
					}
					else
					{
						$whrclause .= "s.`studentid` LIKE '".$stuid.$department."_%"."' OR ";
					}
					
				}
			}
			else
			{
				$stuid .= "__";
				
				if(!empty($_REQUEST["plaresultreportsection"])) {
					
					foreach ($_REQUEST["plaresultreportsection"] as $section){
						$whrclause .= "s.`studentid` LIKE '".$stuid.$section."%"."' OR ";
					}
				}
				else
				{
					$whrclause .= "s.`studentid` LIKE '".$stuid."%"."' OR ";
				}
				
			}
		}
		else
		{
			$stuid .= "__";
			
			if(!empty($_REQUEST["plaresultreportdepartment"])) {
				foreach ($_REQUEST["plaresultreportdepartment"] as $department){
					if(!empty($_REQUEST["plaresultreportsection"])) {
						foreach ($_REQUEST["plaresultreportsection"] as $section){
							$whrclause .= "s.`studentid` LIKE '".$stuid.$department.$section."%"."' OR ";
						}
					}
					else
					{
						$whrclause .= "s.`studentid` LIKE '".$stuid.$department."_%"."' OR ";
					}
					
				}
			}		
			else
			{
				$stuid .= "__";
				
				if(!empty($_REQUEST["plaresultreportsection"])) {
					
					foreach ($_REQUEST["plaresultreportsection"] as $section){
						$whrclause .= "s.`studentid` LIKE '".$stuid.$section."%"."' OR ";
					}
				}
				else
				{
					$whrclause .= "s.`studentid` LIKE '".$stuid."%"."' OR ";
				}
				
			}
		}
		
		
		$whrclause = substr($whrclause,0,(strlen($whrclause)-4));
		
		$sql_statement .= $whrclause;

		$pdf->mysql_report($sql_statement, false, $attr );

		$pdf->Output("D","Placement Result Report.pdf");
		
		
	}
?>