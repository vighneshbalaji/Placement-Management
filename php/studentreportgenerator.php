<?php
	if(isset($_REQUEST["studentreportgeneratebtn"]))
	{
		require('plugin/pdf/mysql_report.php');

		$pdf = new PDF('P','pt','A4');
		$pdf->SetFont('Arial','',10);

		$host = 'localhost';
		$username = 'root';
		$password = '';
		$database = 'placement';

		$pdf->connect($host, $username, $password, $database);

		$attr = array('titleFontSize'=>18, 'titleText'=>'StudentS Report.');
		
		$sql_statement = "SELECT `studentid` as `ID`,`studentname` as `Name`,`UG`,`HSC`,`SSLC`,IF(`arrear` = 'y','Yes','None') AS `Arrear`,`mobileno` as `Mobile Number`,`email` as `Mail - ID` FROM `student` WHERE ( ";
		
		$stuid = "s".substr($_SESSION["UserId"],2);
		$whrclause = "";
		
		if(! empty($_REQUEST["stureportyearofjoin"]))
		{
			$year = substr($_REQUEST["stureportyearofjoin"],2,2);
		
			$stuid .= $year;			
						
			if(!empty($_REQUEST["stureportdepartment"])) {
				
				foreach ($_REQUEST["stureportdepartment"] as $department){
					if(!empty($_REQUEST["stureportsection"])) {
						foreach ($_REQUEST["stureportsection"] as $section){
							$whrclause .= "`studentid` LIKE '".$stuid.$department.$section."%"."' OR ";
						}
					}
					else
					{
						$whrclause .= "`studentid` LIKE '".$stuid.$department."_%"."' OR ";
					}
					
				}
			}
			else
			{
				$stuid .= "__";
				
				if(!empty($_REQUEST["stureportsection"])) {
					
					foreach ($_REQUEST["stureportsection"] as $section){
						$whrclause .= "`studentid` LIKE '".$stuid.$section."%"."' OR ";
					}
				}
				else
				{
					$whrclause .= "`studentid` LIKE '".$stuid."%"."' OR ";
				}
				
			}
		}
		else
		{
			$stuid .= "__";
			
			if(!empty($_REQUEST["stureportdepartment"])) {
				foreach ($_REQUEST["stureportdepartment"] as $department){
					if(!empty($_REQUEST["stureportsection"])) {
						foreach ($_REQUEST["stureportsection"] as $section){
							$whrclause .= "`studentid` LIKE '".$stuid.$department.$section."%"."' OR ";
						}
					}
					else
					{
						$whrclause .= "`studentid` LIKE '".$stuid.$department."_%"."' OR ";
					}
					
				}
			}		
			else
			{
				$stuid .= "__";
				
				if(!empty($_REQUEST["stureportsection"])) {
					
					foreach ($_REQUEST["stureportsection"] as $section){
						$whrclause .= "`studentid` LIKE '".$stuid.$section."%"."' OR ";
					}
				}
				else
				{
					$whrclause .= "`studentid` LIKE '".$stuid."%"."' OR ";
				}
				
			}
		}
		
		
		$whrclause = substr($whrclause,0,(strlen($whrclause)-4))." )";
		
		if( !empty($_REQUEST["studentreportarrear"]) )
		{
			$whrclause .= " AND ( `arrear` = '$_REQUEST[studentreportarrear]' )";
		}
	
		$whrclause .= " AND ( `UG` BETWEEN ".$_REQUEST["studentreportughid"][0]." AND ".$_REQUEST["studentreportughid"][1]." )";
			
		$whrclause .= " AND ( `HSC` BETWEEN ".$_REQUEST["studentreporthschid"][0]." AND ".$_REQUEST["studentreporthschid"][1]." )";
	
		$whrclause .= " AND ( `SSLC` BETWEEN ".$_REQUEST["studentreportsslchid"][0]." AND ".$_REQUEST["studentreportsslchid"][1]." )"; 
		
		$sql_statement .= $whrclause;

		$pdf->mysql_report($sql_statement, false, $attr );

		$pdf->Output("D","Student Report.pdf");
	}
?>